<?php
//BindEvents Method @1-E87106D6
function BindEvents()
{
    global $V_SUBS_OVERRIDE_RECU_TARI;
    $V_SUBS_OVERRIDE_RECU_TARI->ds->CCSEvents["BeforeExecuteInsert"] = "V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteInsert";
    $V_SUBS_OVERRIDE_RECU_TARI->ds->CCSEvents["AfterExecuteInsert"] = "V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteInsert";
    $V_SUBS_OVERRIDE_RECU_TARI->ds->CCSEvents["BeforeExecuteUpdate"] = "V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteUpdate";
    $V_SUBS_OVERRIDE_RECU_TARI->ds->CCSEvents["AfterExecuteUpdate"] = "V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteUpdate";
    $V_SUBS_OVERRIDE_RECU_TARI->ds->CCSEvents["BeforeExecuteDelete"] = "V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteDelete";
    $V_SUBS_OVERRIDE_RECU_TARI->ds->CCSEvents["AfterExecuteDelete"] = "V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteDelete";
}
//End BindEvents Method

//V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteInsert @110-E92B9524
function V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteInsert(& $sender)
{
    $V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OVERRIDE_RECU_TARI; //Compatibility
//End V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteInsert

//Custom Code @139-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------

//End Custom Code

//Close V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteInsert @110-D56ACB7F
    return $V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteInsert;
}
//End Close V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteInsert

//V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteInsert @110-BD36149C
function V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteInsert(& $sender)
{
    $V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OVERRIDE_RECU_TARI; //Compatibility
//End V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteInsert

//Custom Code @140-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($V_SUBS_OVERRIDE_RECU_TARI->DataSource->Provider->Error)) {
		$error_msg = $V_SUBS_OVERRIDE_RECU_TARI->DataSource->Provider->Error['message'];
		$V_SUBS_OVERRIDE_RECU_TARI->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteInsert @110-5FB735FE
    return $V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteInsert;
}
//End Close V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteInsert

//V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteUpdate @110-2977144A
function V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteUpdate(& $sender)
{
    $V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OVERRIDE_RECU_TARI; //Compatibility
//End V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteUpdate

//Custom Code @141-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteUpdate @110-1A430AF0
    return $V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteUpdate;
}
//End Close V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteUpdate

//V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteUpdate @110-FF9512E9
function V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteUpdate(& $sender)
{
    $V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OVERRIDE_RECU_TARI; //Compatibility
//End V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteUpdate

//Custom Code @142-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($V_SUBS_OVERRIDE_RECU_TARI->DataSource->Provider->Error)) {
		$error_msg = $V_SUBS_OVERRIDE_RECU_TARI->DataSource->Provider->Error['message'];
		$V_SUBS_OVERRIDE_RECU_TARI->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteUpdate @110-909EF471
    return $V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteUpdate;
}
//End Close V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteUpdate

//V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteDelete @110-7CE737BA
function V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteDelete(& $sender)
{
    $V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OVERRIDE_RECU_TARI; //Compatibility
//End V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteDelete

//Custom Code @143-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteDelete @110-8667AC81
    return $V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteDelete;
}
//End Close V_SUBS_OVERRIDE_RECU_TARI_ds_BeforeExecuteDelete

//V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteDelete @110-0E9ACC35
function V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteDelete(& $sender)
{
    $V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OVERRIDE_RECU_TARI; //Compatibility
//End V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteDelete

//Custom Code @144-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($V_SUBS_OVERRIDE_RECU_TARI->DataSource->Provider->Error)) {
		$error_msg = $V_SUBS_OVERRIDE_RECU_TARI->DataSource->Provider->Error['message'];
		$V_SUBS_OVERRIDE_RECU_TARI->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteDelete @110-0CBA5200
    return $V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteDelete;
}
//End Close V_SUBS_OVERRIDE_RECU_TARI_ds_AfterExecuteDelete


?>
