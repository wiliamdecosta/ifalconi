<?php
//BindEvents Method @1-CFB00CD2
function BindEvents()
{
    global $CPE_RECURRING_TARIFF;
    $CPE_RECURRING_TARIFF->ds->CCSEvents["BeforeExecuteInsert"] = "CPE_RECURRING_TARIFF_ds_BeforeExecuteInsert";
    $CPE_RECURRING_TARIFF->ds->CCSEvents["AfterExecuteInsert"] = "CPE_RECURRING_TARIFF_ds_AfterExecuteInsert";
    $CPE_RECURRING_TARIFF->ds->CCSEvents["BeforeExecuteUpdate"] = "CPE_RECURRING_TARIFF_ds_BeforeExecuteUpdate";
    $CPE_RECURRING_TARIFF->ds->CCSEvents["AfterExecuteUpdate"] = "CPE_RECURRING_TARIFF_ds_AfterExecuteUpdate";
    $CPE_RECURRING_TARIFF->ds->CCSEvents["BeforeExecuteDelete"] = "CPE_RECURRING_TARIFF_ds_BeforeExecuteDelete";
    $CPE_RECURRING_TARIFF->ds->CCSEvents["AfterExecuteDelete"] = "CPE_RECURRING_TARIFF_ds_AfterExecuteDelete";
}
//End BindEvents Method

//CPE_RECURRING_TARIFF_ds_BeforeExecuteInsert @110-35250B71
function CPE_RECURRING_TARIFF_ds_BeforeExecuteInsert(& $sender)
{
    $CPE_RECURRING_TARIFF_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPE_RECURRING_TARIFF; //Compatibility
//End CPE_RECURRING_TARIFF_ds_BeforeExecuteInsert

//Custom Code @139-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------

//End Custom Code

//Close CPE_RECURRING_TARIFF_ds_BeforeExecuteInsert @110-0E0E2ECA
    return $CPE_RECURRING_TARIFF_ds_BeforeExecuteInsert;
}
//End Close CPE_RECURRING_TARIFF_ds_BeforeExecuteInsert

//CPE_RECURRING_TARIFF_ds_AfterExecuteInsert @110-BAB88DBF
function CPE_RECURRING_TARIFF_ds_AfterExecuteInsert(& $sender)
{
    $CPE_RECURRING_TARIFF_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPE_RECURRING_TARIFF; //Compatibility
//End CPE_RECURRING_TARIFF_ds_AfterExecuteInsert

//Custom Code @140-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($CPE_RECURRING_TARIFF->DataSource->Provider->Error)) {
		$error_msg = $CPE_RECURRING_TARIFF->DataSource->Provider->Error['message'];
		$CPE_RECURRING_TARIFF->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close CPE_RECURRING_TARIFF_ds_AfterExecuteInsert @110-809B56D4
    return $CPE_RECURRING_TARIFF_ds_AfterExecuteInsert;
}
//End Close CPE_RECURRING_TARIFF_ds_AfterExecuteInsert

//CPE_RECURRING_TARIFF_ds_BeforeExecuteUpdate @110-5B49C492
function CPE_RECURRING_TARIFF_ds_BeforeExecuteUpdate(& $sender)
{
    $CPE_RECURRING_TARIFF_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPE_RECURRING_TARIFF; //Compatibility
//End CPE_RECURRING_TARIFF_ds_BeforeExecuteUpdate

//Custom Code @141-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close CPE_RECURRING_TARIFF_ds_BeforeExecuteUpdate @110-C127EF45
    return $CPE_RECURRING_TARIFF_ds_BeforeExecuteUpdate;
}
//End Close CPE_RECURRING_TARIFF_ds_BeforeExecuteUpdate

//CPE_RECURRING_TARIFF_ds_AfterExecuteUpdate @110-0A2C8702
function CPE_RECURRING_TARIFF_ds_AfterExecuteUpdate(& $sender)
{
    $CPE_RECURRING_TARIFF_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPE_RECURRING_TARIFF; //Compatibility
//End CPE_RECURRING_TARIFF_ds_AfterExecuteUpdate

//Custom Code @142-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($CPE_RECURRING_TARIFF->DataSource->Provider->Error)) {
		$error_msg = $CPE_RECURRING_TARIFF->DataSource->Provider->Error['message'];
		$CPE_RECURRING_TARIFF->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close CPE_RECURRING_TARIFF_ds_AfterExecuteUpdate @110-4FB2975B
    return $CPE_RECURRING_TARIFF_ds_AfterExecuteUpdate;
}
//End Close CPE_RECURRING_TARIFF_ds_AfterExecuteUpdate

//CPE_RECURRING_TARIFF_ds_BeforeExecuteDelete @110-65B58209
function CPE_RECURRING_TARIFF_ds_BeforeExecuteDelete(& $sender)
{
    $CPE_RECURRING_TARIFF_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPE_RECURRING_TARIFF; //Compatibility
//End CPE_RECURRING_TARIFF_ds_BeforeExecuteDelete

//Custom Code @143-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close CPE_RECURRING_TARIFF_ds_BeforeExecuteDelete @110-5D034934
    return $CPE_RECURRING_TARIFF_ds_BeforeExecuteDelete;
}
//End Close CPE_RECURRING_TARIFF_ds_BeforeExecuteDelete

//CPE_RECURRING_TARIFF_ds_AfterExecuteDelete @110-073AD1AA
function CPE_RECURRING_TARIFF_ds_AfterExecuteDelete(& $sender)
{
    $CPE_RECURRING_TARIFF_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPE_RECURRING_TARIFF; //Compatibility
//End CPE_RECURRING_TARIFF_ds_AfterExecuteDelete

//Custom Code @144-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($CPE_RECURRING_TARIFF->DataSource->Provider->Error)) {
		$error_msg = $CPE_RECURRING_TARIFF->DataSource->Provider->Error['message'];
		$CPE_RECURRING_TARIFF->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close CPE_RECURRING_TARIFF_ds_AfterExecuteDelete @110-D396312A
    return $CPE_RECURRING_TARIFF_ds_AfterExecuteDelete;
}
//End Close CPE_RECURRING_TARIFF_ds_AfterExecuteDelete
?>
