<?php
//BindEvents Method @1-2E7EF898
function BindEvents()
{
    global $Acc_RepGrid;
    global $Acc_RepRecord;
    global $CCSEvents;
    $Acc_RepGrid->Navigator->CCSEvents["BeforeShow"] = "Acc_RepGrid_Navigator_BeforeShow";
    $Acc_RepGrid->P_ACC_REP_Insert->CCSEvents["BeforeShow"] = "Acc_RepGrid_P_ACC_REP_Insert_BeforeShow";
    $Acc_RepGrid->CCSEvents["BeforeShowRow"] = "Acc_RepGrid_BeforeShowRow";
    $Acc_RepRecord->ds->CCSEvents["BeforeExecuteInsert"] = "Acc_RepRecord_ds_BeforeExecuteInsert";
    $Acc_RepRecord->ds->CCSEvents["AfterExecuteInsert"] = "Acc_RepRecord_ds_AfterExecuteInsert";
    $Acc_RepRecord->ds->CCSEvents["BeforeExecuteUpdate"] = "Acc_RepRecord_ds_BeforeExecuteUpdate";
    $Acc_RepRecord->ds->CCSEvents["AfterExecuteUpdate"] = "Acc_RepRecord_ds_AfterExecuteUpdate";
    $Acc_RepRecord->ds->CCSEvents["BeforeExecuteDelete"] = "Acc_RepRecord_ds_BeforeExecuteDelete";
    $Acc_RepRecord->ds->CCSEvents["AfterExecuteDelete"] = "Acc_RepRecord_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Acc_RepGrid_Navigator_BeforeShow @134-26B3F2B9
function Acc_RepGrid_Navigator_BeforeShow(& $sender)
{
    $Acc_RepGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Acc_RepGrid; //Compatibility
//End Acc_RepGrid_Navigator_BeforeShow

//Custom Code @135-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close Acc_RepGrid_Navigator_BeforeShow @134-9CC82EE5
    return $Acc_RepGrid_Navigator_BeforeShow;
}
//End Close Acc_RepGrid_Navigator_BeforeShow

//Acc_RepGrid_P_ACC_REP_Insert_BeforeShow @145-565A5A9F
function Acc_RepGrid_P_ACC_REP_Insert_BeforeShow(& $sender)
{
    $Acc_RepGrid_P_ACC_REP_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Acc_RepGrid; //Compatibility
//End Acc_RepGrid_P_ACC_REP_Insert_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$Acc_RepGrid->P_ACC_REP_Insert->Page = $FileName;
	$Acc_RepGrid->P_ACC_REP_Insert->Parameters = CCGetQueryString("QueryString", "");
	$Acc_RepGrid->P_ACC_REP_Insert->Parameters = CCRemoveParam($Acc_RepGrid->P_ACC_REP_Insert->Parameters, "CUSTOMER_ACC_REP_ID");
	$Acc_RepGrid->P_ACC_REP_Insert->Parameters = CCAddParam($Acc_RepGrid->P_ACC_REP_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close Acc_RepGrid_P_ACC_REP_Insert_BeforeShow @145-4273FC3A
    return $Acc_RepGrid_P_ACC_REP_Insert_BeforeShow;
}
//End Close Acc_RepGrid_P_ACC_REP_Insert_BeforeShow

//Acc_RepGrid_BeforeShowRow @2-7114E876
function Acc_RepGrid_BeforeShowRow(& $sender)
{
    $Acc_RepGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Acc_RepGrid; //Compatibility
//End Acc_RepGrid_BeforeShowRow	
	global $Acc_RepRecord;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->CUSTOMER_ACC_REP_ID->GetValue();
        $Acc_RepRecord->DataSource->Parameters["urlCUSTOMER_ACC_REP_ID"] = $selected_id;
        $Acc_RepRecord->DataSource->Prepare();
        $Acc_RepRecord->EditMode = $Acc_RepRecord->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

//Set Row Style @37-982C9472
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->CUSTOMER_ACC_REP_ID->GetValue()== $selected_id) {
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

//Close Acc_RepGrid_BeforeShowRow @2-FCE5D633
    return $Acc_RepGrid_BeforeShowRow;
}
//End Close Acc_RepGrid_BeforeShowRow

//Acc_RepRecord_ds_BeforeExecuteInsert @97-E43F639D
function Acc_RepRecord_ds_BeforeExecuteInsert(& $sender)
{
    $Acc_RepRecord_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Acc_RepRecord; //Compatibility
//End Acc_RepRecord_ds_BeforeExecuteInsert

//Custom Code @457-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close Acc_RepRecord_ds_BeforeExecuteInsert @97-8AC48B51
    return $Acc_RepRecord_ds_BeforeExecuteInsert;
}
//End Close Acc_RepRecord_ds_BeforeExecuteInsert

//Acc_RepRecord_ds_AfterExecuteInsert @97-B3405F1C
function Acc_RepRecord_ds_AfterExecuteInsert(& $sender)
{
    $Acc_RepRecord_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Acc_RepRecord; //Compatibility
//End Acc_RepRecord_ds_AfterExecuteInsert

//Custom Code @458-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($Acc_RepRecord->DataSource->Provider->Error)) {
		$error_msg = $Acc_RepRecord->DataSource->Provider->Error['message'];
		$Acc_RepRecord->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close Acc_RepRecord_ds_AfterExecuteInsert @97-F47F13C7
    return $Acc_RepRecord_ds_AfterExecuteInsert;
}
//End Close Acc_RepRecord_ds_AfterExecuteInsert

//Acc_RepRecord_ds_BeforeExecuteUpdate @97-4BC3AE82
function Acc_RepRecord_ds_BeforeExecuteUpdate(& $sender)
{
    $Acc_RepRecord_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Acc_RepRecord; //Compatibility
//End Acc_RepRecord_ds_BeforeExecuteUpdate

//Custom Code @459-2A29BDB7
// -------------------------
    // Write your own code here.
	
	ob_start();
// -------------------------
//End Custom Code

//Close Acc_RepRecord_ds_BeforeExecuteUpdate @97-45ED4ADE
    return $Acc_RepRecord_ds_BeforeExecuteUpdate;
}
//End Close Acc_RepRecord_ds_BeforeExecuteUpdate

//Acc_RepRecord_ds_AfterExecuteUpdate @97-5527B82F
function Acc_RepRecord_ds_AfterExecuteUpdate(& $sender)
{
    $Acc_RepRecord_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Acc_RepRecord; //Compatibility
//End Acc_RepRecord_ds_AfterExecuteUpdate

//Custom Code @460-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($Acc_RepRecord->DataSource->Provider->Error)) {
		$error_msg = $Acc_RepRecord->DataSource->Provider->Error['message'];
		$Acc_RepRecord->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close Acc_RepRecord_ds_AfterExecuteUpdate @97-3B56D248
    return $Acc_RepRecord_ds_AfterExecuteUpdate;
}
//End Close Acc_RepRecord_ds_AfterExecuteUpdate

//Acc_RepRecord_ds_BeforeExecuteDelete @97-C366107B
function Acc_RepRecord_ds_BeforeExecuteDelete(& $sender)
{
    $Acc_RepRecord_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Acc_RepRecord; //Compatibility
//End Acc_RepRecord_ds_BeforeExecuteDelete

//Custom Code @461-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close Acc_RepRecord_ds_BeforeExecuteDelete @97-D9C9ECAF
    return $Acc_RepRecord_ds_BeforeExecuteDelete;
}
//End Close Acc_RepRecord_ds_BeforeExecuteDelete

//Acc_RepRecord_ds_AfterExecuteDelete @97-F8CCF1FB
function Acc_RepRecord_ds_AfterExecuteDelete(& $sender)
{
    $Acc_RepRecord_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Acc_RepRecord; //Compatibility
//End Acc_RepRecord_ds_AfterExecuteDelete

//Custom Code @462-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($Acc_RepRecord->DataSource->Provider->Error)) {
		$error_msg = $Acc_RepRecord->DataSource->Provider->Error['message'];
		$Acc_RepRecord->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close Acc_RepRecord_ds_AfterExecuteDelete @97-A7727439
    return $Acc_RepRecord_ds_AfterExecuteDelete;
}
//End Close Acc_RepRecord_ds_AfterExecuteDelete

//Page_OnInitializeView @1-58F11850
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $account_rep; //Compatibility
//End Page_OnInitializeView

//Custom Code @142-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("CUSTOMER_ACC_REP_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-2806C647
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $account_rep; //Compatibility
//End Page_BeforeShow

//Custom Code @273-2A29BDB7
// -------------------------
    // Write your own code here.
	global $Acc_RepSearch;
	global $Acc_RepGrid;
	global $Acc_RepRecord;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$Acc_RepSearch->Visible = false;
		$Acc_RepGrid->Visible = false;
		$Acc_RepRecord->Visible = true;
		$Acc_RepRecord->ds->SQL = "";
	} else {
		$Acc_RepSearch->Visible = true;
		$Acc_RepGrid->Visible = true;
		$Acc_RepRecord->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
