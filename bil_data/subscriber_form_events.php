<?php
//BindEvents Method @1-37C2EDBE
function BindEvents()
{
    global $V_SUBSCRIBER;
    $V_SUBSCRIBER->ds->CCSEvents["BeforeExecuteInsert"] = "V_SUBSCRIBER_ds_BeforeExecuteInsert";
    $V_SUBSCRIBER->ds->CCSEvents["AfterExecuteInsert"] = "V_SUBSCRIBER_ds_AfterExecuteInsert";
}
//End BindEvents Method

//V_SUBSCRIBER_ds_BeforeExecuteInsert @2-EC174905
function V_SUBSCRIBER_ds_BeforeExecuteInsert(& $sender)
{
    $V_SUBSCRIBER_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER; //Compatibility
//End V_SUBSCRIBER_ds_BeforeExecuteInsert

//Custom Code @271-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_ds_BeforeExecuteInsert @2-A59B283B
    return $V_SUBSCRIBER_ds_BeforeExecuteInsert;
}
//End Close V_SUBSCRIBER_ds_BeforeExecuteInsert

//V_SUBSCRIBER_ds_AfterExecuteInsert @2-E7EAE32F
function V_SUBSCRIBER_ds_AfterExecuteInsert(& $sender)
{
    $V_SUBSCRIBER_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER; //Compatibility
//End V_SUBSCRIBER_ds_AfterExecuteInsert

//Custom Code @272-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_SUBSCRIBER->DataSource->Provider->Error)) {
		$error_msg = $V_SUBSCRIBER->DataSource->Provider->Error['message'];
		$V_SUBSCRIBER->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_ds_AfterExecuteInsert @2-C4A0FEFB
    return $V_SUBSCRIBER_ds_AfterExecuteInsert;
}
//End Close V_SUBSCRIBER_ds_AfterExecuteInsert


?>
