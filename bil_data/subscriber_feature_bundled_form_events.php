<?php
//BindEvents Method @1-46F0937E
function BindEvents()
{
    global $V_SUBSCRIBER_BUNDLED_FEAT;
    $V_SUBSCRIBER_BUNDLED_FEAT->ds->CCSEvents["BeforeExecuteInsert"] = "V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteInsert";
    $V_SUBSCRIBER_BUNDLED_FEAT->ds->CCSEvents["AfterExecuteInsert"] = "V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteInsert";
    $V_SUBSCRIBER_BUNDLED_FEAT->ds->CCSEvents["BeforeExecuteUpdate"] = "V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteUpdate";
    $V_SUBSCRIBER_BUNDLED_FEAT->ds->CCSEvents["AfterExecuteUpdate"] = "V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteUpdate";
    $V_SUBSCRIBER_BUNDLED_FEAT->ds->CCSEvents["BeforeExecuteDelete"] = "V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteDelete";
    $V_SUBSCRIBER_BUNDLED_FEAT->ds->CCSEvents["AfterExecuteDelete"] = "V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteDelete";
}
//End BindEvents Method

//V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteInsert @110-A8A0B66E
function V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteInsert(& $sender)
{
    $V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_BUNDLED_FEAT; //Compatibility
//End V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteInsert

//Custom Code @132-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteInsert @110-18E362BF
    return $V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteInsert;
}
//End Close V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteInsert

//V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteInsert @110-7D22FA20
function V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteInsert(& $sender)
{
    $V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_BUNDLED_FEAT; //Compatibility
//End V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteInsert

//Custom Code @133-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_SUBSCRIBER_BUNDLED_FEAT->DataSource->Provider->Error)) {
		$error_msg = $V_SUBSCRIBER_BUNDLED_FEAT->DataSource->Provider->Error['message'];
		$V_SUBSCRIBER_BUNDLED_FEAT->Errors->addError($error_msg);
	};

// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteInsert @110-0118660B
    return $V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteInsert;
}
//End Close V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteInsert

//V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteUpdate @110-68FC3700
function V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteUpdate(& $sender)
{
    $V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_BUNDLED_FEAT; //Compatibility
//End V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteUpdate

//Custom Code @134-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteUpdate @110-D7CAA330
    return $V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteUpdate;
}
//End Close V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteUpdate

//V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteUpdate @110-3F81FC55
function V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteUpdate(& $sender)
{
    $V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_BUNDLED_FEAT; //Compatibility
//End V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteUpdate

//Custom Code @135-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_SUBSCRIBER_BUNDLED_FEAT->DataSource->Provider->Error)) {
		$error_msg = $V_SUBSCRIBER_BUNDLED_FEAT->DataSource->Provider->Error['message'];
		$V_SUBSCRIBER_BUNDLED_FEAT->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteUpdate @110-CE31A784
    return $V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteUpdate;
}
//End Close V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteUpdate

//V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteDelete @110-3D6C14F0
function V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteDelete(& $sender)
{
    $V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_BUNDLED_FEAT; //Compatibility
//End V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteDelete

//Custom Code @136-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteDelete @110-4BEE0541
    return $V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteDelete;
}
//End Close V_SUBSCRIBER_BUNDLED_FEAT_ds_BeforeExecuteDelete

//V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteDelete @110-CE8E2289
function V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteDelete(& $sender)
{
    $V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_BUNDLED_FEAT; //Compatibility
//End V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteDelete

//Custom Code @137-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_SUBSCRIBER_BUNDLED_FEAT->DataSource->Provider->Error)) {
		$error_msg = $V_SUBSCRIBER_BUNDLED_FEAT->DataSource->Provider->Error['message'];
		$V_SUBSCRIBER_BUNDLED_FEAT->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteDelete @110-521501F5
    return $V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteDelete;
}
//End Close V_SUBSCRIBER_BUNDLED_FEAT_ds_AfterExecuteDelete


?>
