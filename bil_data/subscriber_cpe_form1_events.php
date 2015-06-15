<?php
//BindEvents Method @1-3935BB81
function BindEvents()
{
    global $V_SUBSCRIBER_CPE;
    global $CCSEvents;
    $V_SUBSCRIBER_CPE->ds->CCSEvents["BeforeExecuteInsert"] = "V_SUBSCRIBER_CPE_ds_BeforeExecuteInsert";
    $V_SUBSCRIBER_CPE->ds->CCSEvents["AfterExecuteInsert"] = "V_SUBSCRIBER_CPE_ds_AfterExecuteInsert";
    $V_SUBSCRIBER_CPE->ds->CCSEvents["BeforeExecuteUpdate"] = "V_SUBSCRIBER_CPE_ds_BeforeExecuteUpdate";
    $V_SUBSCRIBER_CPE->ds->CCSEvents["AfterExecuteUpdate"] = "V_SUBSCRIBER_CPE_ds_AfterExecuteUpdate";
    $V_SUBSCRIBER_CPE->ds->CCSEvents["BeforeExecuteDelete"] = "V_SUBSCRIBER_CPE_ds_BeforeExecuteDelete";
    $V_SUBSCRIBER_CPE->ds->CCSEvents["AfterExecuteDelete"] = "V_SUBSCRIBER_CPE_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//V_SUBSCRIBER_CPE_ds_BeforeExecuteInsert @167-68068833
function V_SUBSCRIBER_CPE_ds_BeforeExecuteInsert(& $sender)
{
    $V_SUBSCRIBER_CPE_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_CPE; //Compatibility
//End V_SUBSCRIBER_CPE_ds_BeforeExecuteInsert

//Custom Code @190-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_CPE_ds_BeforeExecuteInsert @167-62DD6F9E
    return $V_SUBSCRIBER_CPE_ds_BeforeExecuteInsert;
}
//End Close V_SUBSCRIBER_CPE_ds_BeforeExecuteInsert

//V_SUBSCRIBER_CPE_ds_AfterExecuteInsert @167-ADB13057
function V_SUBSCRIBER_CPE_ds_AfterExecuteInsert(& $sender)
{
    $V_SUBSCRIBER_CPE_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_CPE; //Compatibility
//End V_SUBSCRIBER_CPE_ds_AfterExecuteInsert

//Custom Code @191-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($V_SUBSCRIBER_CPE->DataSource->Provider->Error)) {
		$error_msg = $V_SUBSCRIBER_CPE->DataSource->Provider->Error['message'];
		$V_SUBSCRIBER_CPE->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_CPE_ds_AfterExecuteInsert @167-554FEF80
    return $V_SUBSCRIBER_CPE_ds_AfterExecuteInsert;
}
//End Close V_SUBSCRIBER_CPE_ds_AfterExecuteInsert

//V_SUBSCRIBER_CPE_ds_BeforeExecuteUpdate @167-02FE0EB0
function V_SUBSCRIBER_CPE_ds_BeforeExecuteUpdate(& $sender)
{
    $V_SUBSCRIBER_CPE_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_CPE; //Compatibility
//End V_SUBSCRIBER_CPE_ds_BeforeExecuteUpdate

//Custom Code @192-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_CPE_ds_BeforeExecuteUpdate @167-ADF4AE11
    return $V_SUBSCRIBER_CPE_ds_BeforeExecuteUpdate;
}
//End Close V_SUBSCRIBER_CPE_ds_BeforeExecuteUpdate

//V_SUBSCRIBER_CPE_ds_AfterExecuteUpdate @167-295C94D6
function V_SUBSCRIBER_CPE_ds_AfterExecuteUpdate(& $sender)
{
    $V_SUBSCRIBER_CPE_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_CPE; //Compatibility
//End V_SUBSCRIBER_CPE_ds_AfterExecuteUpdate

//Custom Code @193-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($V_SUBSCRIBER_CPE->DataSource->Provider->Error)) {
		$error_msg = $V_SUBSCRIBER_CPE->DataSource->Provider->Error['message'];
		$V_SUBSCRIBER_CPE->Errors->addError($error_msg);
	};

// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_CPE_ds_AfterExecuteUpdate @167-9A662E0F
    return $V_SUBSCRIBER_CPE_ds_AfterExecuteUpdate;
}
//End Close V_SUBSCRIBER_CPE_ds_AfterExecuteUpdate

//V_SUBSCRIBER_CPE_ds_BeforeExecuteDelete @167-1740B26A
function V_SUBSCRIBER_CPE_ds_BeforeExecuteDelete(& $sender)
{
    $V_SUBSCRIBER_CPE_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_CPE; //Compatibility
//End V_SUBSCRIBER_CPE_ds_BeforeExecuteDelete

//Custom Code @194-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_CPE_ds_BeforeExecuteDelete @167-31D00860
    return $V_SUBSCRIBER_CPE_ds_BeforeExecuteDelete;
}
//End Close V_SUBSCRIBER_CPE_ds_BeforeExecuteDelete

//V_SUBSCRIBER_CPE_ds_AfterExecuteDelete @167-388919AC
function V_SUBSCRIBER_CPE_ds_AfterExecuteDelete(& $sender)
{
    $V_SUBSCRIBER_CPE_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_CPE; //Compatibility
//End V_SUBSCRIBER_CPE_ds_AfterExecuteDelete

//Custom Code @195-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($V_SUBSCRIBER_CPE->DataSource->Provider->Error)) {
		$error_msg = $V_SUBSCRIBER_CPE->DataSource->Provider->Error['message'];
		$V_SUBSCRIBER_CPE->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_CPE_ds_AfterExecuteDelete @167-0642887E
    return $V_SUBSCRIBER_CPE_ds_AfterExecuteDelete;
}
//End Close V_SUBSCRIBER_CPE_ds_AfterExecuteDelete


//Page_OnInitializeView @1-E22B2769
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $subscriber_cpe_form1; //Compatibility
//End Page_OnInitializeView

//Custom Code @166-2A29BDB7
// -------------------------
    // Write your own code here.
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView
?>
