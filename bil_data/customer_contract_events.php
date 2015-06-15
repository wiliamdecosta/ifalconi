<?php
//BindEvents Method @1-928952A6
function BindEvents()
{
    global $CustomerContractGrid;
    global $CustomerContractRecord;
    global $CCSEvents;
    $CustomerContractGrid->Navigator->CCSEvents["BeforeShow"] = "CustomerContractGrid_Navigator_BeforeShow";
    $CustomerContractGrid->CustomerContractInsert->CCSEvents["BeforeShow"] = "CustomerContractGrid_CustomerContractInsert_BeforeShow";
    $CustomerContractGrid->CCSEvents["BeforeShowRow"] = "CustomerContractGrid_BeforeShowRow";
    $CustomerContractRecord->ds->CCSEvents["BeforeExecuteInsert"] = "CustomerContractRecord_ds_BeforeExecuteInsert";
    $CustomerContractRecord->ds->CCSEvents["AfterExecuteInsert"] = "CustomerContractRecord_ds_AfterExecuteInsert";
    $CustomerContractRecord->ds->CCSEvents["BeforeExecuteUpdate"] = "CustomerContractRecord_ds_BeforeExecuteUpdate";
    $CustomerContractRecord->ds->CCSEvents["AfterExecuteUpdate"] = "CustomerContractRecord_ds_AfterExecuteUpdate";
    $CustomerContractRecord->ds->CCSEvents["BeforeExecuteDelete"] = "CustomerContractRecord_ds_BeforeExecuteDelete";
    $CustomerContractRecord->ds->CCSEvents["AfterExecuteDelete"] = "CustomerContractRecord_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//CustomerContractGrid_Navigator_BeforeShow @134-BBE165BA
function CustomerContractGrid_Navigator_BeforeShow(& $sender)
{
    $CustomerContractGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CustomerContractGrid; //Compatibility
//End CustomerContractGrid_Navigator_BeforeShow

//Custom Code @135-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close CustomerContractGrid_Navigator_BeforeShow @134-09BC1086
    return $CustomerContractGrid_Navigator_BeforeShow;
}
//End Close CustomerContractGrid_Navigator_BeforeShow

//CustomerContractGrid_CustomerContractInsert_BeforeShow @145-8E21AC1D
function CustomerContractGrid_CustomerContractInsert_BeforeShow(& $sender)
{
    $CustomerContractGrid_CustomerContractInsert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CustomerContractGrid; //Compatibility
//End CustomerContractGrid_CustomerContractInsert_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$CustomerContractGrid->CustomerContractInsert->Page = $FileName;
	$CustomerContractGrid->CustomerContractInsert->Parameters = CCGetQueryString("QueryString", "");
	$CustomerContractGrid->CustomerContractInsert->Parameters = CCRemoveParam($CustomerContractGrid->CustomerContractInsert->Parameters, "CUSTOMER_CONTRACT_ID");
	$CustomerContractGrid->CustomerContractInsert->Parameters = CCAddParam($CustomerContractGrid->CustomerContractInsert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close CustomerContractGrid_CustomerContractInsert_BeforeShow @145-CB0E346E
    return $CustomerContractGrid_CustomerContractInsert_BeforeShow;
}
//End Close CustomerContractGrid_CustomerContractInsert_BeforeShow

//CustomerContractGrid_BeforeShowRow @2-3CD51DCB
function CustomerContractGrid_BeforeShowRow(& $sender)
{
    $CustomerContractGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CustomerContractGrid; //Compatibility
//End CustomerContractGrid_BeforeShowRow	
	global $CustomerContractRecord;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->CUSTOMER_CONTRACT_ID->GetValue();
        $CustomerContractRecord->DataSource->Parameters["urlCUSTOMER_CONTRACT_ID"] = $selected_id;
        $CustomerContractRecord->DataSource->Prepare();
        $CustomerContractRecord->EditMode = $CustomerContractRecord->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

//Set Row Style @37-982C9472
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->CUSTOMER_CONTRACT_ID->GetValue()== $selected_id) {
    	$img_radio= "<img border='0' src='../images/radio_s.gif'>";
        $Style = $styles[1];
    }	
    
    if (count($styles)) {
//        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style
    $Component->DLink->SetValue($img_radio);  // Bdr
//End Set Row Style

//Close CustomerContractGrid_BeforeShowRow @2-AF4479BE
    return $CustomerContractGrid_BeforeShowRow;
}
//End Close CustomerContractGrid_BeforeShowRow

//CustomerContractRecord_ds_BeforeExecuteInsert @97-C66C4813
function CustomerContractRecord_ds_BeforeExecuteInsert(& $sender)
{
    $CustomerContractRecord_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CustomerContractRecord; //Compatibility
//End CustomerContractRecord_ds_BeforeExecuteInsert

//Custom Code @520-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close CustomerContractRecord_ds_BeforeExecuteInsert @97-4694C01F
    return $CustomerContractRecord_ds_BeforeExecuteInsert;
}
//End Close CustomerContractRecord_ds_BeforeExecuteInsert

//CustomerContractRecord_ds_AfterExecuteInsert @97-C61197A4
function CustomerContractRecord_ds_AfterExecuteInsert(& $sender)
{
    $CustomerContractRecord_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CustomerContractRecord; //Compatibility
//End CustomerContractRecord_ds_AfterExecuteInsert

//Custom Code @521-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($CustomerContractRecord->DataSource->Provider->Error)) {
		$error_msg = $CustomerContractRecord->DataSource->Provider->Error['message'];
		$CustomerContractRecord->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close CustomerContractRecord_ds_AfterExecuteInsert @97-A843C873
    return $CustomerContractRecord_ds_AfterExecuteInsert;
}
//End Close CustomerContractRecord_ds_AfterExecuteInsert

//CustomerContractRecord_ds_BeforeExecuteUpdate @97-DA95BB6C
function CustomerContractRecord_ds_BeforeExecuteUpdate(& $sender)
{
    $CustomerContractRecord_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CustomerContractRecord; //Compatibility
//End CustomerContractRecord_ds_BeforeExecuteUpdate

//Custom Code @522-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close CustomerContractRecord_ds_BeforeExecuteUpdate @97-89BD0190
    return $CustomerContractRecord_ds_BeforeExecuteUpdate;
}
//End Close CustomerContractRecord_ds_BeforeExecuteUpdate

//CustomerContractRecord_ds_AfterExecuteUpdate @97-DB50DC87
function CustomerContractRecord_ds_AfterExecuteUpdate(& $sender)
{
    $CustomerContractRecord_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CustomerContractRecord; //Compatibility
//End CustomerContractRecord_ds_AfterExecuteUpdate

//Custom Code @523-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($CustomerContractRecord->DataSource->Provider->Error)) {
		$error_msg = $CustomerContractRecord->DataSource->Provider->Error['message'];
		$CustomerContractRecord->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close CustomerContractRecord_ds_AfterExecuteUpdate @97-676A09FC
    return $CustomerContractRecord_ds_AfterExecuteUpdate;
}
//End Close CustomerContractRecord_ds_AfterExecuteUpdate

//CustomerContractRecord_ds_BeforeExecuteDelete @97-1E56FE66
function CustomerContractRecord_ds_BeforeExecuteDelete(& $sender)
{
    $CustomerContractRecord_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CustomerContractRecord; //Compatibility
//End CustomerContractRecord_ds_BeforeExecuteDelete

//Custom Code @524-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close CustomerContractRecord_ds_BeforeExecuteDelete @97-1599A7E1
    return $CustomerContractRecord_ds_BeforeExecuteDelete;
}
//End Close CustomerContractRecord_ds_BeforeExecuteDelete

//CustomerContractRecord_ds_AfterExecuteDelete @97-FA6A17C2
function CustomerContractRecord_ds_AfterExecuteDelete(& $sender)
{
    $CustomerContractRecord_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CustomerContractRecord; //Compatibility
//End CustomerContractRecord_ds_AfterExecuteDelete

//Custom Code @525-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($CustomerContractRecord->DataSource->Provider->Error)) {
		$error_msg = $CustomerContractRecord->DataSource->Provider->Error['message'];
		$CustomerContractRecord->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close CustomerContractRecord_ds_AfterExecuteDelete @97-FB4EAF8D
    return $CustomerContractRecord_ds_AfterExecuteDelete;
}
//End Close CustomerContractRecord_ds_AfterExecuteDelete

//Page_OnInitializeView @1-CE2C2A48
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $customer_contract; //Compatibility
//End Page_OnInitializeView

//Custom Code @142-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("CUSTOMER_CONTRACT_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-A97A9F1D
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $customer_contract; //Compatibility
//End Page_BeforeShow

//Custom Code @273-2A29BDB7
// -------------------------
    // Write your own code here.
	global $CustomerContractSearch;
	global $CustomerContractGrid;
	global $CustomerContractRecord;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$Acc_RepSearch->Visible = false;
		$CustomerContractGrid->Visible = false;
		$CustomerContractRecord->Visible = true;
		$CustomerContractRecord->ds->SQL = "";
	} else {
		$Acc_RepSearch->Visible = true;
		$CustomerContractGrid->Visible = true;
		$CustomerContractRecord->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
