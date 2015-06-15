<?php
//BindEvents Method @1-6C7376B8
function BindEvents()
{
    global $ENTRY_BILL_TICKET;
    global $BATCH1;
    $ENTRY_BILL_TICKET->Navigator->CCSEvents["BeforeShow"] = "ENTRY_BILL_TICKET_Navigator_BeforeShow";
    $ENTRY_BILL_TICKET->CCSEvents["BeforeShowRow"] = "ENTRY_BILL_TICKET_BeforeShowRow";
    $ENTRY_BILL_TICKET->ds->CCSEvents["BeforeExecuteSelect"] = "ENTRY_BILL_TICKET_ds_BeforeExecuteSelect";
    $BATCH1->Label1->CCSEvents["BeforeShow"] = "BATCH1_Label1_BeforeShow";
    $BATCH1->CCSEvents["BeforeShow"] = "BATCH1_BeforeShow";
    $BATCH1->CCSEvents["BeforeInsert"] = "BATCH1_BeforeInsert";
    $BATCH1->ds->CCSEvents["AfterExecuteDelete"] = "BATCH1_ds_AfterExecuteDelete";
}
//End BindEvents Method

//ENTRY_BILL_TICKET_Navigator_BeforeShow @18-7785B314
function ENTRY_BILL_TICKET_Navigator_BeforeShow(& $sender)
{
    $ENTRY_BILL_TICKET_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ENTRY_BILL_TICKET; //Compatibility
//End ENTRY_BILL_TICKET_Navigator_BeforeShow

//Custom Code @50-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close ENTRY_BILL_TICKET_Navigator_BeforeShow @18-4B4F2DE2
    return $ENTRY_BILL_TICKET_Navigator_BeforeShow;
}
//End Close ENTRY_BILL_TICKET_Navigator_BeforeShow

//ENTRY_BILL_TICKET_BeforeShowRow @2-2DD70B94
function ENTRY_BILL_TICKET_BeforeShowRow(& $sender)
{
    $ENTRY_BILL_TICKET_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ENTRY_BILL_TICKET; //Compatibility
//End ENTRY_BILL_TICKET_BeforeShowRow

//Set Row Style @51-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Custom Code @127-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("T_BILL_TICKET_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $ENTRY_BILL_TICKET->T_BILL_TICKET_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "T_BILL_TICKET_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		exit;
	}

	if ($ENTRY_BILL_TICKET->T_BILL_TICKET_ID->GetValue() == $keyId) {
		$ENTRY_BILL_TICKET->ADLink->Visible = true;
		$ENTRY_BILL_TICKET->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$ENTRY_BILL_TICKET->ADLink->Visible = false;
		$ENTRY_BILL_TICKET->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close ENTRY_BILL_TICKET_BeforeShowRow @2-2BA7DA1C
    return $ENTRY_BILL_TICKET_BeforeShowRow;
}
//End Close ENTRY_BILL_TICKET_BeforeShowRow

//ENTRY_BILL_TICKET_ds_BeforeExecuteSelect @2-55C9E50F
function ENTRY_BILL_TICKET_ds_BeforeExecuteSelect(& $sender)
{
    $ENTRY_BILL_TICKET_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ENTRY_BILL_TICKET; //Compatibility
//End ENTRY_BILL_TICKET_ds_BeforeExecuteSelect

//Custom Code @231-2A29BDB7
// -------------------------
    // Write your own code here.
	global $T_BUDGET1;
	if(is_null(CCGetFromGet("s_keyword",NULL)))
	{
		$T_BUDGET->ds->SQL = "";
		$T_BUDGET->Visible = false;
		$T_BUDGET1->Visible = false;
	}
// -------------------------
//End Custom Code

//Close ENTRY_BILL_TICKET_ds_BeforeExecuteSelect @2-BE4A5127
    return $ENTRY_BILL_TICKET_ds_BeforeExecuteSelect;
}
//End Close ENTRY_BILL_TICKET_ds_BeforeExecuteSelect

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	$dbConn = new clsDBConn();
//DEL   	$cek = "SELECT count(*) as HASIL FROM V_T_BILL_TICKET WHERE VERIFICATION_DATE IS NULL ";
//DEL  	$dbConn->query($cek);
//DEL  	$dbConn->next_record();
//DEL  	$hasil = $dbConn->Record;
//DEL  	$msg = $hasil[HASIL];
//DEL  
//DEL  	if($msg == "0"){
//DEL  		$BATCH1->Button1->Visible = false;
//DEL  	}else{
//DEL  		$BATCH1->Button1->Visible = true;
//DEL  	}
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	global $FileName;
//DEL  	global $PathToCurrentPage;
//DEL  	$param = CCGetQueryString('QueryString');
//DEL  	$param = CCRemoveParam($param,"ccsForm");
//DEL  	//die($param);
//DEL  	$param = CCAddParam($param, "actVerify", 1);
//DEL  	$Redirect = $FileName."?".$param;
//DEL  		//die($Redirect);
//DEL  		header("Location: ".$Redirect);
//DEL  		exit;
//DEL  	//die($param);
//DEL  	// -------------------------

//BATCH1_Label1_BeforeShow @318-1A661371
function BATCH1_Label1_BeforeShow(& $sender)
{
    $BATCH1_Label1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BATCH1; //Compatibility
//End BATCH1_Label1_BeforeShow

//Custom Code @319-2A29BDB7
// -------------------------
    $BATCH1->Label1->SetValue("<a href='JavaScript:test2()' onclick='return confirmVer(this);' ><IMG src='../Styles/trb/Images/en/ButtonProcess.gif'></a>");
	if(CCGetFromGet("CHECK")=="1"){
		if(CCGetFromGet("FINAL_AMOUNT") != null){
			$dbConn = new clsDBConn();
		 	$query = "SELECT f_ticket_verification(" . CCGetFromGet("T_BILL_TICKET_ID") . "," . CCGetFromGet("FINAL_AMOUNT") . ",'" . CCGetFromGet("IS_OK") . "','" . CCGetSession("UserName", "-") . "') as HASIL from dual";
			$dbConn->query($query);
			$dbConn->next_record();
			$hasil = $dbConn->Record;
			$msg = $hasil[HASIL];
			if($msg == "Verification Success."){
				?>
	              <script language="javascript">
				  	var msg = '<? echo $msg; ?>';
					alert(msg);
				    document.location.href='verification_bill_ticket.php';
				  </script>
				<?
			}else{
				?>
	              <script language="javascript">
				  	var msg = '<? echo $msg; ?>';
					alert(msg);
				    document.location.href='verification_bill_ticket.php?T_BILL_TICKET_ID=<? CCGetFromGet("T_BILL_TICKET_ID"); ?>';
				  </script>
				<?
			}
		}else{
			?>
              <script language="javascript">
			  	alert("Verification Failed!!");
			    document.location='javascript:history.back(0);';
			  </script>
			<?
		}
	}
// -------------------------
//End Custom Code

//Close BATCH1_Label1_BeforeShow @318-92571E85
    return $BATCH1_Label1_BeforeShow;
}
//End Close BATCH1_Label1_BeforeShow

//BATCH1_BeforeShow @19-6AA0D32F
function BATCH1_BeforeShow(& $sender)
{
    $BATCH1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BATCH1; //Compatibility
//End BATCH1_BeforeShow

//Custom Code @114-2A29BDB7
// -------------------------
    // Write your own code here.
	$dbConn = new clsDBConn();
   	$cek = "SELECT count(*) as HASIL FROM V_T_BILL_TICKET WHERE VERIFICATION_DATE IS NULL ";
  	$dbConn->query($cek);
  	$dbConn->next_record();
  	$hasil = $dbConn->Record;
  	$msg = $hasil[HASIL];

  	if($msg == "0"){
  		$BATCH1->Label1->Visible = false;
  	}else{
  		$BATCH1->Label1->Visible = true;
  	}
// -------------------------
//End Custom Code

//Close BATCH1_BeforeShow @19-A5670219
    return $BATCH1_BeforeShow;
}
//End Close BATCH1_BeforeShow

//BATCH1_BeforeInsert @19-B8249B46
function BATCH1_BeforeInsert(& $sender)
{
    $BATCH1_BeforeInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BATCH1; //Compatibility
//End BATCH1_BeforeInsert

//Custom Code @130-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close BATCH1_BeforeInsert @19-2F83AFF6
    return $BATCH1_BeforeInsert;
}
//End Close BATCH1_BeforeInsert

//BATCH1_ds_AfterExecuteDelete @19-40F5383C
function BATCH1_ds_AfterExecuteDelete(& $sender)
{
    $BATCH1_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BATCH1; //Compatibility
//End BATCH1_ds_AfterExecuteDelete

//Custom Code @168-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close BATCH1_ds_AfterExecuteDelete @19-AD04BBB0
    return $BATCH1_ds_AfterExecuteDelete;
}
//End Close BATCH1_ds_AfterExecuteDelete

?>