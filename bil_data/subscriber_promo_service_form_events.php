<?php
//BindEvents Method @1-378AC243
function BindEvents()
{
    global $V_SUBS_OT_PROMO_SERVICE;
    $V_SUBS_OT_PROMO_SERVICE->ds->CCSEvents["BeforeExecuteInsert"] = "V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteInsert";
    $V_SUBS_OT_PROMO_SERVICE->ds->CCSEvents["AfterExecuteInsert"] = "V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteInsert";
    $V_SUBS_OT_PROMO_SERVICE->ds->CCSEvents["BeforeExecuteUpdate"] = "V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteUpdate";
    $V_SUBS_OT_PROMO_SERVICE->ds->CCSEvents["AfterExecuteUpdate"] = "V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteUpdate";
    $V_SUBS_OT_PROMO_SERVICE->ds->CCSEvents["BeforeExecuteDelete"] = "V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteDelete";
    $V_SUBS_OT_PROMO_SERVICE->ds->CCSEvents["AfterExecuteDelete"] = "V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteDelete";
}
//End BindEvents Method

//V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteInsert @110-84100C5E
function V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteInsert(& $sender)
{
    $V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_SERVICE; //Compatibility
//End V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteInsert

//Custom Code @131-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteInsert @110-CD96D276
    return $V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteInsert;
}
//End Close V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteInsert

//V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteInsert @110-62FA0B6C
function V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteInsert(& $sender)
{
    $V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_SERVICE; //Compatibility
//End V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteInsert

//Custom Code @132-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_SUBS_OT_PROMO_SERVICE->DataSource->Provider->Error)) {
		$error_msg = $V_SUBS_OT_PROMO_SERVICE->DataSource->Provider->Error['message'];
		$V_SUBS_OT_PROMO_SERVICE->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteInsert @110-14E94B29
    return $V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteInsert;
}
//End Close V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteInsert

//V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteUpdate @110-9702B15E
function V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteUpdate(& $sender)
{
    $V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_SERVICE; //Compatibility
//End V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteUpdate

//Custom Code @148-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start;
// -------------------------
//End Custom Code

//Close V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteUpdate @110-02BF13F9
    return $V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteUpdate;
}
//End Close V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteUpdate

//V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteUpdate @110-A25C9E32
function V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteUpdate(& $sender)
{
    $V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_SERVICE; //Compatibility
//End V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteUpdate

//Custom Code @149-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_SUBS_OT_PROMO_SERVICE->DataSource->Provider->Error)) {
		$error_msg = $V_SUBS_OT_PROMO_SERVICE->DataSource->Provider->Error['message'];
		$V_SUBS_OT_PROMO_SERVICE->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteUpdate @110-DBC08AA6
    return $V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteUpdate;
}
//End Close V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteUpdate

//V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteDelete @110-0AF28311
function V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteDelete(& $sender)
{
    $V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_SERVICE; //Compatibility
//End V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteDelete

//Custom Code @150-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteDelete @110-9E9BB588
    return $V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteDelete;
}
//End Close V_SUBS_OT_PROMO_SERVICE_ds_BeforeExecuteDelete

//V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteDelete @110-424DB469
function V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteDelete(& $sender)
{
    $V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_SERVICE; //Compatibility
//End V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteDelete

//Custom Code @151-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_SUBS_OT_PROMO_SERVICE->DataSource->Provider->Error)) {
		$error_msg = $V_SUBS_OT_PROMO_SERVICE->DataSource->Provider->Error['message'];
		$V_SUBS_OT_PROMO_SERVICE->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteDelete @110-47E42CD7
    return $V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteDelete;
}
//End Close V_SUBS_OT_PROMO_SERVICE_ds_AfterExecuteDelete


?>
