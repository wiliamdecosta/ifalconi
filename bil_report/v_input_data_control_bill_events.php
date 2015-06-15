<?php
//BindEvents Method @1-8F24B85F
function BindEvents()
{
    global $v_input_data_control_billGrid;
    global $CCSEvents;
    $v_input_data_control_billGrid->CCSEvents["BeforeShowRow"] = "v_input_data_control_billGrid_BeforeShowRow";
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

//v_input_data_control_billGrid_BeforeShowRow @282-82239827
function v_input_data_control_billGrid_BeforeShowRow(& $sender)
{
    $v_input_data_control_billGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $v_input_data_control_billGrid; //Compatibility
//End v_input_data_control_billGrid_BeforeShowRow

//Set Row Style @283-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//DEL  // -------------------------
//DEL      // Write your own code here.
	$keyId = CCGetFromGet("INPUT_DATA_CONTROL_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $v_input_data_control_billGrid->INPUT_DATA_CONTROL_ID->GetValue();
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

	if ($v_input_data_control_billGrid->INPUT_DATA_CONTROL_ID->GetValue() == $keyId) {
		$v_input_data_control_billGrid->IDCid->SetValue($keyId);
		$v_input_data_control_billGrid->ADLink->Visible = true;
		$v_input_data_control_billGrid->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$v_input_data_control_billGrid->ADLink->Visible = false;
		$v_input_data_control_billGrid->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
//DEL  // -------------------------

//Close v_input_data_control_billGrid_BeforeShowRow @282-1F4261D5
    return $v_input_data_control_billGrid_BeforeShowRow;
}
//End Close v_input_data_control_billGrid_BeforeShowRow

//Page_BeforeShow @1-8C3581B0
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $v_input_data_control_bill; //Compatibility
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
