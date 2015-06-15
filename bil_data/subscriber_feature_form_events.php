<?php
//BindEvents Method @1-5A23031C
function BindEvents()
{
    global $V_SUBSCRIBER_FEAT;
    $V_SUBSCRIBER_FEAT->ds->CCSEvents["BeforeExecuteInsert"] = "V_SUBSCRIBER_FEAT_ds_BeforeExecuteInsert";
    $V_SUBSCRIBER_FEAT->ds->CCSEvents["AfterExecuteInsert"] = "V_SUBSCRIBER_FEAT_ds_AfterExecuteInsert";
    $V_SUBSCRIBER_FEAT->ds->CCSEvents["BeforeExecuteUpdate"] = "V_SUBSCRIBER_FEAT_ds_BeforeExecuteUpdate";
    $V_SUBSCRIBER_FEAT->ds->CCSEvents["AfterExecuteUpdate"] = "V_SUBSCRIBER_FEAT_ds_AfterExecuteUpdate";
    $V_SUBSCRIBER_FEAT->ds->CCSEvents["BeforeExecuteDelete"] = "V_SUBSCRIBER_FEAT_ds_BeforeExecuteDelete";
    $V_SUBSCRIBER_FEAT->ds->CCSEvents["AfterExecuteDelete"] = "V_SUBSCRIBER_FEAT_ds_AfterExecuteDelete";
}
//End BindEvents Method

//V_SUBSCRIBER_FEAT_ds_BeforeExecuteInsert @110-CF8D5B67
function V_SUBSCRIBER_FEAT_ds_BeforeExecuteInsert(& $sender)
{
    $V_SUBSCRIBER_FEAT_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_FEAT; //Compatibility
//End V_SUBSCRIBER_FEAT_ds_BeforeExecuteInsert

//Custom Code @132-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_FEAT_ds_BeforeExecuteInsert @110-54D54B8F
    return $V_SUBSCRIBER_FEAT_ds_BeforeExecuteInsert;
}
//End Close V_SUBSCRIBER_FEAT_ds_BeforeExecuteInsert

//V_SUBSCRIBER_FEAT_ds_AfterExecuteInsert @110-6A7AD181
function V_SUBSCRIBER_FEAT_ds_AfterExecuteInsert(& $sender)
{
    $V_SUBSCRIBER_FEAT_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_FEAT; //Compatibility
//End V_SUBSCRIBER_FEAT_ds_AfterExecuteInsert

//Custom Code @133-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_SUBSCRIBER_FEAT->DataSource->Provider->Error)) {
		$error_msg = $V_SUBSCRIBER_FEAT->DataSource->Provider->Error['message'];
		$V_SUBSCRIBER_FEAT->Errors->addError($error_msg);
	};

// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_FEAT_ds_AfterExecuteInsert @110-5E21082A
    return $V_SUBSCRIBER_FEAT_ds_AfterExecuteInsert;
}
//End Close V_SUBSCRIBER_FEAT_ds_AfterExecuteInsert

//V_SUBSCRIBER_FEAT_ds_BeforeExecuteUpdate @110-5C00BC08
function V_SUBSCRIBER_FEAT_ds_BeforeExecuteUpdate(& $sender)
{
    $V_SUBSCRIBER_FEAT_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_FEAT; //Compatibility
//End V_SUBSCRIBER_FEAT_ds_BeforeExecuteUpdate

//Custom Code @134-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_FEAT_ds_BeforeExecuteUpdate @110-9BFC8A00
    return $V_SUBSCRIBER_FEAT_ds_BeforeExecuteUpdate;
}
//End Close V_SUBSCRIBER_FEAT_ds_BeforeExecuteUpdate

//V_SUBSCRIBER_FEAT_ds_AfterExecuteUpdate @110-1EA1FB9D
function V_SUBSCRIBER_FEAT_ds_AfterExecuteUpdate(& $sender)
{
    $V_SUBSCRIBER_FEAT_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_FEAT; //Compatibility
//End V_SUBSCRIBER_FEAT_ds_AfterExecuteUpdate

//Custom Code @135-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_SUBSCRIBER_FEAT->DataSource->Provider->Error)) {
		$error_msg = $V_SUBSCRIBER_FEAT->DataSource->Provider->Error['message'];
		$V_SUBSCRIBER_FEAT->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_FEAT_ds_AfterExecuteUpdate @110-9108C9A5
    return $V_SUBSCRIBER_FEAT_ds_AfterExecuteUpdate;
}
//End Close V_SUBSCRIBER_FEAT_ds_AfterExecuteUpdate

//V_SUBSCRIBER_FEAT_ds_BeforeExecuteDelete @110-C5CA81C6
function V_SUBSCRIBER_FEAT_ds_BeforeExecuteDelete(& $sender)
{
    $V_SUBSCRIBER_FEAT_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_FEAT; //Compatibility
//End V_SUBSCRIBER_FEAT_ds_BeforeExecuteDelete

//Custom Code @136-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_FEAT_ds_BeforeExecuteDelete @110-07D82C71
    return $V_SUBSCRIBER_FEAT_ds_BeforeExecuteDelete;
}
//End Close V_SUBSCRIBER_FEAT_ds_BeforeExecuteDelete

//V_SUBSCRIBER_FEAT_ds_AfterExecuteDelete @110-78B27EEB
function V_SUBSCRIBER_FEAT_ds_AfterExecuteDelete(& $sender)
{
    $V_SUBSCRIBER_FEAT_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER_FEAT; //Compatibility
//End V_SUBSCRIBER_FEAT_ds_AfterExecuteDelete

//Custom Code @137-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_SUBSCRIBER_FEAT->DataSource->Provider->Error)) {
		$error_msg = $V_SUBSCRIBER_FEAT->DataSource->Provider->Error['message'];
		$V_SUBSCRIBER_FEAT->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_FEAT_ds_AfterExecuteDelete @110-0D2C6FD4
    return $V_SUBSCRIBER_FEAT_ds_AfterExecuteDelete;
}
//End Close V_SUBSCRIBER_FEAT_ds_AfterExecuteDelete
?>
