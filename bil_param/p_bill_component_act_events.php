<?php
//BindEvents Method @1-9C049621
function BindEvents()
{
    global $Bill_CompRecord;
    global $CCSEvents;
    $Bill_CompRecord->ds->CCSEvents["BeforeExecuteInsert"] = "Bill_CompRecord_ds_BeforeExecuteInsert";
    $Bill_CompRecord->ds->CCSEvents["AfterExecuteInsert"] = "Bill_CompRecord_ds_AfterExecuteInsert";
    $Bill_CompRecord->ds->CCSEvents["BeforeExecuteUpdate"] = "Bill_CompRecord_ds_BeforeExecuteUpdate";
    $Bill_CompRecord->ds->CCSEvents["AfterExecuteUpdate"] = "Bill_CompRecord_ds_AfterExecuteUpdate";
    $Bill_CompRecord->ds->CCSEvents["BeforeExecuteDelete"] = "Bill_CompRecord_ds_BeforeExecuteDelete";
    $Bill_CompRecord->ds->CCSEvents["AfterExecuteDelete"] = "Bill_CompRecord_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Bill_CompRecord_ds_BeforeExecuteInsert @39-950546E5
function Bill_CompRecord_ds_BeforeExecuteInsert(& $sender)
{
    $Bill_CompRecord_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Bill_CompRecord; //Compatibility
//End Bill_CompRecord_ds_BeforeExecuteInsert

//Custom Code @85-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close Bill_CompRecord_ds_BeforeExecuteInsert @39-1570FA55
    return $Bill_CompRecord_ds_BeforeExecuteInsert;
}
//End Close Bill_CompRecord_ds_BeforeExecuteInsert

//Bill_CompRecord_ds_AfterExecuteInsert @39-2614420B
function Bill_CompRecord_ds_AfterExecuteInsert(& $sender)
{
    $Bill_CompRecord_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Bill_CompRecord; //Compatibility
//End Bill_CompRecord_ds_AfterExecuteInsert

//Custom Code @86-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($V_P_BUNDLED_FEATURE1->DataSource->Provider->Error)) {
		$error_msg = $V_P_BUNDLED_FEATURE1->DataSource->Provider->Error['message'];
		$V_P_BUNDLED_FEATURE1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close Bill_CompRecord_ds_AfterExecuteInsert @39-FFEAB281
    return $Bill_CompRecord_ds_AfterExecuteInsert;
}
//End Close Bill_CompRecord_ds_AfterExecuteInsert

//Bill_CompRecord_ds_BeforeExecuteUpdate @39-C6E019F6
function Bill_CompRecord_ds_BeforeExecuteUpdate(& $sender)
{
    $Bill_CompRecord_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Bill_CompRecord; //Compatibility
//End Bill_CompRecord_ds_BeforeExecuteUpdate

//Custom Code @87-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close Bill_CompRecord_ds_BeforeExecuteUpdate @39-DA593BDA
    return $Bill_CompRecord_ds_BeforeExecuteUpdate;
}
//End Close Bill_CompRecord_ds_BeforeExecuteUpdate

//Bill_CompRecord_ds_AfterExecuteUpdate @39-377A644D
function Bill_CompRecord_ds_AfterExecuteUpdate(& $sender)
{
    $Bill_CompRecord_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Bill_CompRecord; //Compatibility
//End Bill_CompRecord_ds_AfterExecuteUpdate

//Custom Code @88-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($V_P_BUNDLED_FEATURE1->DataSource->Provider->Error)) {
		$error_msg = $V_P_BUNDLED_FEATURE1->DataSource->Provider->Error['message'];
		$V_P_BUNDLED_FEATURE1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close Bill_CompRecord_ds_AfterExecuteUpdate @39-30C3730E
    return $Bill_CompRecord_ds_AfterExecuteUpdate;
}
//End Close Bill_CompRecord_ds_AfterExecuteUpdate

//Bill_CompRecord_ds_BeforeExecuteDelete @39-12663F2D
function Bill_CompRecord_ds_BeforeExecuteDelete(& $sender)
{
    $Bill_CompRecord_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Bill_CompRecord; //Compatibility
//End Bill_CompRecord_ds_BeforeExecuteDelete

//Custom Code @89-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close Bill_CompRecord_ds_BeforeExecuteDelete @39-467D9DAB
    return $Bill_CompRecord_ds_BeforeExecuteDelete;
}
//End Close Bill_CompRecord_ds_BeforeExecuteDelete

//Bill_CompRecord_ds_AfterExecuteDelete @39-24D1E6EC
function Bill_CompRecord_ds_AfterExecuteDelete(& $sender)
{
    $Bill_CompRecord_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Bill_CompRecord; //Compatibility
//End Bill_CompRecord_ds_AfterExecuteDelete

//Custom Code @90-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($V_P_BUNDLED_FEATURE1->DataSource->Provider->Error)) {
		$error_msg = $V_P_BUNDLED_FEATURE1->DataSource->Provider->Error['message'];
		$V_P_BUNDLED_FEATURE1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close Bill_CompRecord_ds_AfterExecuteDelete @39-ACE7D57F
    return $Bill_CompRecord_ds_AfterExecuteDelete;
}
//End Close Bill_CompRecord_ds_AfterExecuteDelete

//Page_OnInitializeView @1-3BA3C265
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bill_component_act; //Compatibility
//End Page_OnInitializeView

//Custom Code @79-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_BUNDLED_FEATURE_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-4A6E8065
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bill_component_act; //Compatibility
//End Page_BeforeShow

//Custom Code @80-2A29BDB7
// -------------------------
    // Write your own code here.
	global $V_P_SERVICE_CATEGORYSearch;
	global $V_P_BUNDLED_FEATURE;
	global $V_P_BUNDLED_FEATURE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$V_P_SERVICE_CATEGORYSearch->Visible = false;
		$V_P_BUNDLED_FEATURE->Visible = false;
		$V_P_BUNDLED_FEATURE1->Visible = true;
		$V_P_BUNDLED_FEATURE1->ds->SQL = "";
	} else {
		$V_P_SERVICE_CATEGORYSearch->Visible = true;
		$V_P_BUNDLED_FEATURE->Visible = true;
		$V_P_BUNDLED_FEATURE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
