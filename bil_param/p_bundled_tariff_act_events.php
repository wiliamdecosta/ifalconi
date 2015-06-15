<?php
//BindEvents Method @1-A5349589
function BindEvents()
{
    global $V_P_BUNDLED_FEATURE1;
    global $CCSEvents;
    $V_P_BUNDLED_FEATURE1->ds->CCSEvents["BeforeExecuteInsert"] = "V_P_BUNDLED_FEATURE1_ds_BeforeExecuteInsert";
    $V_P_BUNDLED_FEATURE1->ds->CCSEvents["AfterExecuteInsert"] = "V_P_BUNDLED_FEATURE1_ds_AfterExecuteInsert";
    $V_P_BUNDLED_FEATURE1->ds->CCSEvents["BeforeExecuteUpdate"] = "V_P_BUNDLED_FEATURE1_ds_BeforeExecuteUpdate";
    $V_P_BUNDLED_FEATURE1->ds->CCSEvents["AfterExecuteUpdate"] = "V_P_BUNDLED_FEATURE1_ds_AfterExecuteUpdate";
    $V_P_BUNDLED_FEATURE1->ds->CCSEvents["BeforeExecuteDelete"] = "V_P_BUNDLED_FEATURE1_ds_BeforeExecuteDelete";
    $V_P_BUNDLED_FEATURE1->ds->CCSEvents["AfterExecuteDelete"] = "V_P_BUNDLED_FEATURE1_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method


//V_P_BUNDLED_FEATURE1_ds_BeforeExecuteInsert @39-7602A213
function V_P_BUNDLED_FEATURE1_ds_BeforeExecuteInsert(& $sender)
{
    $V_P_BUNDLED_FEATURE1_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_BUNDLED_FEATURE1; //Compatibility
//End V_P_BUNDLED_FEATURE1_ds_BeforeExecuteInsert

//Custom Code @85-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_P_BUNDLED_FEATURE1_ds_BeforeExecuteInsert @39-E085AE1F
    return $V_P_BUNDLED_FEATURE1_ds_BeforeExecuteInsert;
}
//End Close V_P_BUNDLED_FEATURE1_ds_BeforeExecuteInsert

//V_P_BUNDLED_FEATURE1_ds_AfterExecuteInsert @39-A69DB169
function V_P_BUNDLED_FEATURE1_ds_AfterExecuteInsert(& $sender)
{
    $V_P_BUNDLED_FEATURE1_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_BUNDLED_FEATURE1; //Compatibility
//End V_P_BUNDLED_FEATURE1_ds_AfterExecuteInsert

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

//Close V_P_BUNDLED_FEATURE1_ds_AfterExecuteInsert @39-057AAFD6
    return $V_P_BUNDLED_FEATURE1_ds_AfterExecuteInsert;
}
//End Close V_P_BUNDLED_FEATURE1_ds_AfterExecuteInsert

//V_P_BUNDLED_FEATURE1_ds_BeforeExecuteUpdate @39-186E6DF0
function V_P_BUNDLED_FEATURE1_ds_BeforeExecuteUpdate(& $sender)
{
    $V_P_BUNDLED_FEATURE1_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_BUNDLED_FEATURE1; //Compatibility
//End V_P_BUNDLED_FEATURE1_ds_BeforeExecuteUpdate

//Custom Code @87-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_P_BUNDLED_FEATURE1_ds_BeforeExecuteUpdate @39-2FAC6F90
    return $V_P_BUNDLED_FEATURE1_ds_BeforeExecuteUpdate;
}
//End Close V_P_BUNDLED_FEATURE1_ds_BeforeExecuteUpdate

//V_P_BUNDLED_FEATURE1_ds_AfterExecuteUpdate @39-1609BBD4
function V_P_BUNDLED_FEATURE1_ds_AfterExecuteUpdate(& $sender)
{
    $V_P_BUNDLED_FEATURE1_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_BUNDLED_FEATURE1; //Compatibility
//End V_P_BUNDLED_FEATURE1_ds_AfterExecuteUpdate

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

//Close V_P_BUNDLED_FEATURE1_ds_AfterExecuteUpdate @39-CA536E59
    return $V_P_BUNDLED_FEATURE1_ds_AfterExecuteUpdate;
}
//End Close V_P_BUNDLED_FEATURE1_ds_AfterExecuteUpdate

//V_P_BUNDLED_FEATURE1_ds_BeforeExecuteDelete @39-26922B6B
function V_P_BUNDLED_FEATURE1_ds_BeforeExecuteDelete(& $sender)
{
    $V_P_BUNDLED_FEATURE1_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_BUNDLED_FEATURE1; //Compatibility
//End V_P_BUNDLED_FEATURE1_ds_BeforeExecuteDelete

//Custom Code @89-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_P_BUNDLED_FEATURE1_ds_BeforeExecuteDelete @39-B388C9E1
    return $V_P_BUNDLED_FEATURE1_ds_BeforeExecuteDelete;
}
//End Close V_P_BUNDLED_FEATURE1_ds_BeforeExecuteDelete

//V_P_BUNDLED_FEATURE1_ds_AfterExecuteDelete @39-1B1FED7C
function V_P_BUNDLED_FEATURE1_ds_AfterExecuteDelete(& $sender)
{
    $V_P_BUNDLED_FEATURE1_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_BUNDLED_FEATURE1; //Compatibility
//End V_P_BUNDLED_FEATURE1_ds_AfterExecuteDelete

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

//Close V_P_BUNDLED_FEATURE1_ds_AfterExecuteDelete @39-5677C828
    return $V_P_BUNDLED_FEATURE1_ds_AfterExecuteDelete;
}
//End Close V_P_BUNDLED_FEATURE1_ds_AfterExecuteDelete

//Page_OnInitializeView @1-D11FBE5D
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bundled_tariff_act; //Compatibility
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

//Page_BeforeShow @1-A0D2FC5D
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bundled_tariff_act; //Compatibility
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
