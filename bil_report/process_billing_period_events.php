<?php
//BindEvents Method @1-92423552
function BindEvents()
{
    global $BATCH1;
    global $V_INPUT_DATA_CONTROL_BILL;
    global $CCSEvents;
    $BATCH1->INPUT_FILE_NAME->CCSEvents["BeforeShow"] = "BATCH1_INPUT_FILE_NAME_BeforeShow";
    $BATCH1->CCSEvents["BeforeShow"] = "BATCH1_BeforeShow";
    $BATCH1->CCSEvents["BeforeInsert"] = "BATCH1_BeforeInsert";
    $BATCH1->ds->CCSEvents["AfterExecuteDelete"] = "BATCH1_ds_AfterExecuteDelete";
    $BATCH1->ds->CCSEvents["BeforeExecuteInsert"] = "BATCH1_ds_BeforeExecuteInsert";
    $BATCH1->ds->CCSEvents["AfterExecuteInsert"] = "BATCH1_ds_AfterExecuteInsert";
    $V_INPUT_DATA_CONTROL_BILL->BATCH_Insert1->CCSEvents["BeforeShow"] = "V_INPUT_DATA_CONTROL_BILL_BATCH_Insert1_BeforeShow";
    $V_INPUT_DATA_CONTROL_BILL->CCSEvents["BeforeShowRow"] = "V_INPUT_DATA_CONTROL_BILL_BeforeShowRow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	global $FileName;
//DEL  	$BATCH->BATCH_Insert->Page = $FileName;
//DEL  	$BATCH->BATCH_Insert->Parameters = CCGetQueryString("QueryString", "");
//DEL  	$BATCH->BATCH_Insert->Parameters = CCRemoveParam($BATCH->BATCH_Insert->Parameters, "BATCH_CONTROL_ID");
//DEL  	$BATCH->BATCH_Insert->Parameters = CCAddParam($BATCH->BATCH_Insert->Parameters, "TAMBAH", "1");
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	$keyId = CCGetFromGet("BATCH_CONTROL_ID", "");
//DEL  	$sCode = CCGetFromGet("s_keyword", "");
//DEL  	global $id;
//DEL  	if (empty($keyId)) {
//DEL  		if (empty($id)) {
//DEL  			$id = $BATCH->BATCH_CONTROL_ID->GetValue();
//DEL  		}
//DEL  		global $FileName;
//DEL  		global $PathToCurrentPage;
//DEL  		$param = CCGetQueryString("QueryString", "");
//DEL  		$param = CCAddParam($param, "BATCH_CONTROL_ID", $id);
//DEL  		
//DEL  		$Redirect = $FileName."?".$param;
//DEL  		//die($Redirect);
//DEL  		header("Location: ".$Redirect);
//DEL  		return;
//DEL  	}
//DEL  
//DEL  	if ($BATCH->BATCH_CONTROL_ID->GetValue() == $keyId) {
//DEL  		$BATCH->ADLink->Visible = true;
//DEL  		$BATCH->DLink->Visible = false;
//DEL  		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
//DEL  	} else {
//DEL  		$BATCH->ADLink->Visible = false;
//DEL  		$BATCH->DLink->Visible = true;
//DEL  		$Component->Attributes->SetValue("rowStyle", "class=Row");
//DEL  	}
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	global $T_BUDGET1;
//DEL  	if(is_null(CCGetFromGet("s_keyword",NULL)))
//DEL  	{
//DEL  		$T_BUDGET->ds->SQL = "";
//DEL  		$T_BUDGET->Visible = false;
//DEL  		$T_BUDGET1->Visible = false;
//DEL  	}
//DEL  // -------------------------

//BATCH1_INPUT_FILE_NAME_BeforeShow @241-2CD31F63
function BATCH1_INPUT_FILE_NAME_BeforeShow(& $sender)
{
    $BATCH1_INPUT_FILE_NAME_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BATCH1; //Compatibility
//End BATCH1_INPUT_FILE_NAME_BeforeShow

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	$nama = "ACCRUE_".date("Ymd")."_".date("His");
//DEL  	//echo ($nama);
//DEL  	$BATCH1->FILE_NAME->SetValue($nama);
//DEL  // -------------------------

//Custom Code @277-2A29BDB7
// -------------------------
    // Write your own code here.
	$dbConn = new clsDBConn();
 	$query = "SELECT CODE AS BACTH_TYPE FROM v_bill_creation_data_class";
	$dbConn->query($query);
	$dbConn->next_record();
	$hasil = $dbConn->Record;

	$first = $hasil[BACTH_TYPE];
	$midle = $BATCH1->FINANCE_PERIOD_CODE->GetValue();
	$last = $BATCH1->BILL_CYCLE_CODE->GetValue();

	$nama = $first . "-" . $midle . "-" . $last;
	$BATCH1->INPUT_FILE_NAME->SetValue($nama);
// -------------------------
//End Custom Code

//Close BATCH1_INPUT_FILE_NAME_BeforeShow @241-E77F7ACB
    return $BATCH1_INPUT_FILE_NAME_BeforeShow;
}
//End Close BATCH1_INPUT_FILE_NAME_BeforeShow

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
	//$dbConn = new clsDBConnPNOSA(); 
	//$id = $P_YEAR_PERIOD1->P_YEAR_PERIOD_ID->GetValue();
	//$queryDelete = "DELETE FORM P_YEAR_PERIOD WHERE P_YEAR_PERIOD_ID = ".$id.";";
	//$dbConn->query($queryDelete);
// -------------------------
//End Custom Code

//Close BATCH1_ds_AfterExecuteDelete @19-AD04BBB0
    return $BATCH1_ds_AfterExecuteDelete;
}
//End Close BATCH1_ds_AfterExecuteDelete

//BATCH1_ds_BeforeExecuteInsert @19-797D1EC1
function BATCH1_ds_BeforeExecuteInsert(& $sender)
{
    $BATCH1_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BATCH1; //Compatibility
//End BATCH1_ds_BeforeExecuteInsert

//Custom Code @385-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close BATCH1_ds_BeforeExecuteInsert @19-1EAAC61A
    return $BATCH1_ds_BeforeExecuteInsert;
}
//End Close BATCH1_ds_BeforeExecuteInsert

//BATCH1_ds_AfterExecuteInsert @19-B92ACEF9
function BATCH1_ds_AfterExecuteInsert(& $sender)
{
    $BATCH1_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BATCH1; //Compatibility
//End BATCH1_ds_AfterExecuteInsert

//Custom Code @386-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($BATCH1->DataSource->Provider->Error)) {
		$error_msg = $BATCH1->DataSource->Provider->Error['message'];
		$BATCH1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close BATCH1_ds_AfterExecuteInsert @19-FE09DC4E
    return $BATCH1_ds_AfterExecuteInsert;
}
//End Close BATCH1_ds_AfterExecuteInsert

//V_INPUT_DATA_CONTROL_BILL_BATCH_Insert1_BeforeShow @318-FF6E515A
function V_INPUT_DATA_CONTROL_BILL_BATCH_Insert1_BeforeShow(& $sender)
{
    $V_INPUT_DATA_CONTROL_BILL_BATCH_Insert1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_INPUT_DATA_CONTROL_BILL; //Compatibility
//End V_INPUT_DATA_CONTROL_BILL_BATCH_Insert1_BeforeShow

//Custom Code @319-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$V_INPUT_DATA_CONTROL_BILL->BATCH_Insert1->Page = $FileName;
	$V_INPUT_DATA_CONTROL_BILL->BATCH_Insert1->Parameters = CCGetQueryString("QueryString", "");
	$V_INPUT_DATA_CONTROL_BILL->BATCH_Insert1->Parameters = CCRemoveParam($V_INPUT_DATA_CONTROL_BILL->BATCH_Insert1->Parameters, "V_INPUT_DATA_CONTROL_BILL");
	$V_INPUT_DATA_CONTROL_BILL->BATCH_Insert1->Parameters = CCAddParam($V_INPUT_DATA_CONTROL_BILL->BATCH_Insert1->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close V_INPUT_DATA_CONTROL_BILL_BATCH_Insert1_BeforeShow @318-2050CADD
    return $V_INPUT_DATA_CONTROL_BILL_BATCH_Insert1_BeforeShow;
}
//End Close V_INPUT_DATA_CONTROL_BILL_BATCH_Insert1_BeforeShow

//V_INPUT_DATA_CONTROL_BILL_BeforeShowRow @282-FC5A1CCC
function V_INPUT_DATA_CONTROL_BILL_BeforeShowRow(& $sender)
{
    $V_INPUT_DATA_CONTROL_BILL_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_INPUT_DATA_CONTROL_BILL; //Compatibility
//End V_INPUT_DATA_CONTROL_BILL_BeforeShowRow

//Set Row Style @283-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Custom Code @317-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("INPUT_DATA_CONTROL_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $V_INPUT_DATA_CONTROL_BILL->INPUT_DATA_CONTROL_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "INPUT_DATA_CONTROL_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($V_INPUT_DATA_CONTROL_BILL->INPUT_DATA_CONTROL_ID->GetValue() == $keyId) {
		$V_INPUT_DATA_CONTROL_BILL->ADLink->Visible = true;
		$V_INPUT_DATA_CONTROL_BILL->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$V_INPUT_DATA_CONTROL_BILL->ADLink->Visible = false;
		$V_INPUT_DATA_CONTROL_BILL->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close V_INPUT_DATA_CONTROL_BILL_BeforeShowRow @282-62AF04E9
    return $V_INPUT_DATA_CONTROL_BILL_BeforeShowRow;
}
//End Close V_INPUT_DATA_CONTROL_BILL_BeforeShowRow

//Page_BeforeShow @1-15760C0E
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $process_billing_period; //Compatibility
//End Page_BeforeShow

//Custom Code @129-2A29BDB7
// -------------------------
    // Write your own code here.
	global $BATCHSearch;
	global $V_INPUT_DATA_CONTROL_BILL;
	global $BATCH1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$BATCHSearch->Visible = false;
		$V_INPUT_DATA_CONTROL_BILL->Visible = false;
		$BATCH1->Visible = true;
		$BATCH1->ds->SQL = "";
	} else {
		$BATCHSearch->Visible = true;
		$V_INPUT_DATA_CONTROL_BILL->Visible = true;
		$BATCH1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
