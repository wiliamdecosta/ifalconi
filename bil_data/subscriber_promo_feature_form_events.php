<?php
//BindEvents Method @1-E8B7FA22
function BindEvents()
{
    global $V_SUBS_OT_PROMO_FEATURE;
    $V_SUBS_OT_PROMO_FEATURE->ds->CCSEvents["BeforeExecuteInsert"] = "V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteInsert";
    $V_SUBS_OT_PROMO_FEATURE->ds->CCSEvents["AfterExecuteInsert"] = "V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteInsert";
    $V_SUBS_OT_PROMO_FEATURE->ds->CCSEvents["BeforeExecuteUpdate"] = "V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteUpdate";
    $V_SUBS_OT_PROMO_FEATURE->ds->CCSEvents["AfterExecuteUpdate"] = "V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteUpdate";
    $V_SUBS_OT_PROMO_FEATURE->ds->CCSEvents["BeforeExecuteDelete"] = "V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteDelete";
    $V_SUBS_OT_PROMO_FEATURE->ds->CCSEvents["AfterExecuteDelete"] = "V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteDelete";
}
//End BindEvents Method

//V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteInsert @110-B4AB3329
function V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteInsert(& $sender)
{
    $V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_FEATURE; //Compatibility
//End V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteInsert

//Custom Code @131-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteInsert @110-82027515
    return $V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteInsert;
}
//End Close V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteInsert

//V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteInsert @110-FA37C525
function V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteInsert(& $sender)
{
    $V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_FEATURE; //Compatibility
//End V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteInsert

//Custom Code @132-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_SUBS_OT_PROMO_FEATURE->DataSource->Provider->Error)) {
		$error_msg = $V_SUBS_OT_PROMO_FEATURE->DataSource->Provider->Error['message'];
		$V_SUBS_OT_PROMO_FEATURE->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteInsert @110-5FBC7A8A
    return $V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteInsert;
}
//End Close V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteInsert

//V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteUpdate @110-A7B98E29
function V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteUpdate(& $sender)
{
    $V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_FEATURE; //Compatibility
//End V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteUpdate

//Custom Code @148-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start;
// -------------------------
//End Custom Code

//Close V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteUpdate @110-4D2BB49A
    return $V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteUpdate;
}
//End Close V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteUpdate

//V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteUpdate @110-3A91507B
function V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteUpdate(& $sender)
{
    $V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_FEATURE; //Compatibility
//End V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteUpdate

//Custom Code @149-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_SUBS_OT_PROMO_FEATURE->DataSource->Provider->Error)) {
		$error_msg = $V_SUBS_OT_PROMO_FEATURE->DataSource->Provider->Error['message'];
		$V_SUBS_OT_PROMO_FEATURE->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteUpdate @110-9095BB05
    return $V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteUpdate;
}
//End Close V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteUpdate

//V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteDelete @110-3A49BC66
function V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteDelete(& $sender)
{
    $V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_FEATURE; //Compatibility
//End V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteDelete

//Custom Code @150-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteDelete @110-D10F12EB
    return $V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteDelete;
}
//End Close V_SUBS_OT_PROMO_FEATURE_ds_BeforeExecuteDelete

//V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteDelete @110-DA807A20
function V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteDelete(& $sender)
{
    $V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_FEATURE; //Compatibility
//End V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteDelete

//Custom Code @151-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_SUBS_OT_PROMO_FEATURE->DataSource->Provider->Error)) {
		$error_msg = $V_SUBS_OT_PROMO_FEATURE->DataSource->Provider->Error['message'];
		$V_SUBS_OT_PROMO_FEATURE->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteDelete @110-0CB11D74
    return $V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteDelete;
}
//End Close V_SUBS_OT_PROMO_FEATURE_ds_AfterExecuteDelete
?>
