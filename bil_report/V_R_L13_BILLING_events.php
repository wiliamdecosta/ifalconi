<?php
//BindEvents Method @1-650C599C
function BindEvents()
{
    global $V_R_L13_BILLINGGrid;
    global $CCSEvents;
    $V_R_L13_BILLINGGrid->CCSEvents["BeforeShowRow"] = "V_R_L13_BILLINGGrid_BeforeShowRow";
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

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	$nama = "ACCRUE_".date("Ymd")."_".date("His");
//DEL  	//echo ($nama);
//DEL  	$BATCH1->FILE_NAME->SetValue($nama);
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	$dbConn = new clsDBConn();
//DEL   	$query = "SELECT CODE AS BACTH_TYPE FROM v_bill_creation_data_class";
//DEL  	$dbConn->query($query);
//DEL  	$dbConn->next_record();
//DEL  	$hasil = $dbConn->Record;
//DEL  
//DEL  	$first = $hasil[BACTH_TYPE];
//DEL  	$midle = $BATCH1->FINANCE_PERIOD_CODE->GetValue();
//DEL  	$last = $BATCH1->BILL_CYCLE_CODE->GetValue();
//DEL  
//DEL  	$nama = $first . "-" . $midle . "-" . $last;
//DEL  	$BATCH1->INPUT_FILE_NAME->SetValue($nama);
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	//$dbConn = new clsDBConnPNOSA(); 
//DEL  	//$id = $P_YEAR_PERIOD1->P_YEAR_PERIOD_ID->GetValue();
//DEL  	//$queryDelete = "DELETE FORM P_YEAR_PERIOD WHERE P_YEAR_PERIOD_ID = ".$id.";";
//DEL  	//$dbConn->query($queryDelete);
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_start();
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_end_clean();
//DEL  	//exit;
//DEL  	if(is_array($BATCH1->DataSource->Provider->Error)) {
//DEL  		$error_msg = $BATCH1->DataSource->Provider->Error['message'];
//DEL  		$BATCH1->Errors->addError($error_msg);
//DEL  	};
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	global $FileName;
//DEL  	$V_INPUT_DATA_CONTROL_BILL->BATCH_Insert1->Page = $FileName;
//DEL  	$V_INPUT_DATA_CONTROL_BILL->BATCH_Insert1->Parameters = CCGetQueryString("QueryString", "");
//DEL  	$V_INPUT_DATA_CONTROL_BILL->BATCH_Insert1->Parameters = CCRemoveParam($V_INPUT_DATA_CONTROL_BILL->BATCH_Insert1->Parameters, "V_INPUT_DATA_CONTROL_BILL");
//DEL  	$V_INPUT_DATA_CONTROL_BILL->BATCH_Insert1->Parameters = CCAddParam($V_INPUT_DATA_CONTROL_BILL->BATCH_Insert1->Parameters, "TAMBAH", "1");
//DEL  // -------------------------

//V_R_L13_BILLINGGrid_BeforeShowRow @282-7AAE9758
function V_R_L13_BILLINGGrid_BeforeShowRow(& $sender)
{
    $V_R_L13_BILLINGGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_R_L13_BILLINGGrid; //Compatibility
//End V_R_L13_BILLINGGrid_BeforeShowRow

//Set Row Style @283-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close V_R_L13_BILLINGGrid_BeforeShowRow @282-CA2F78A7
    return $V_R_L13_BILLINGGrid_BeforeShowRow;
}
//End Close V_R_L13_BILLINGGrid_BeforeShowRow

//Page_BeforeShow @1-6F32B55E
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_R_L13_BILLING; //Compatibility
//End Page_BeforeShow

//Custom Code @129-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
