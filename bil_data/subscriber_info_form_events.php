<?php
//BindEvents Method @1-9F1F86D3
function BindEvents()
{
    global $CUSTOMER_INFOrecord;
    global $CCSEvents;
    $CUSTOMER_INFOrecord->INFO_DESC_1->CCSEvents["OnValidate"] = "CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate";
    $CUSTOMER_INFOrecord->ds->CCSEvents["BeforeExecuteInsert"] = "CUSTOMER_INFOrecord_ds_BeforeExecuteInsert";
    $CUSTOMER_INFOrecord->ds->CCSEvents["AfterExecuteInsert"] = "CUSTOMER_INFOrecord_ds_AfterExecuteInsert";
    $CUSTOMER_INFOrecord->ds->CCSEvents["BeforeExecuteUpdate"] = "CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate";
    $CUSTOMER_INFOrecord->ds->CCSEvents["AfterExecuteUpdate"] = "CUSTOMER_INFOrecord_ds_AfterExecuteUpdate";
    $CUSTOMER_INFOrecord->ds->CCSEvents["BeforeExecuteDelete"] = "CUSTOMER_INFOrecord_ds_BeforeExecuteDelete";
    $CUSTOMER_INFOrecord->ds->CCSEvents["AfterExecuteDelete"] = "CUSTOMER_INFOrecord_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate @181-17F6A04B
function CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate(& $sender)
{
    $CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOrecord; //Compatibility
//End CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate

//Custom Code @182-2A29BDB7
// -------------------------
    // Write your own code here.
	$CODE = $CUSTOMER_INFOrecord->INFO_TYPE_CODE->GetText();
	switch ($CODE){
	case "EMAIL":
		global $CCSLocales;
	    if (CCStrLen($Component->GetText()) && !preg_match("/^[\w\.-]{1,}\@([\da-zA-Z-]{1,}\.){1,}[\da-zA-Z-]+$/", $Component->GetText()))
	    {
	        $Component->Errors->addError($CCSLocales->GetText("CCS_IncorrectEmailFormat", $Component->Caption));
	    }
	break;

	case "NO HP";
		global $CCSLocales;
	    if (CCStrLen($Component->GetText()) && !preg_match("/^[0-9]+$/", $Component->GetText())) {
	        $Component->Errors->addError($CCSLocales->GetText("CCS_IncorrectPhoneFormat", $Component->Caption));
	    }
	break;
	case "NO TELEPON RUMAH";
		global $CCSLocales;
	    if (CCStrLen($Component->GetText()) && !preg_match("/^[0-9\-]+$/", $Component->GetText())) {
	        $Component->Errors->addError($CCSLocales->GetText("CCS_IncorrectPhoneFormat", $Component->Caption));
	    }
	break;

	}
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate @181-699512D9
    return $CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate;
}
//End Close CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate

//CUSTOMER_INFOrecord_ds_BeforeExecuteInsert @172-7EF1BE95
function CUSTOMER_INFOrecord_ds_BeforeExecuteInsert(& $sender)
{
    $CUSTOMER_INFOrecord_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOrecord; //Compatibility
//End CUSTOMER_INFOrecord_ds_BeforeExecuteInsert

//Custom Code @188-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOrecord_ds_BeforeExecuteInsert @172-17B7F45A
    return $CUSTOMER_INFOrecord_ds_BeforeExecuteInsert;
}
//End Close CUSTOMER_INFOrecord_ds_BeforeExecuteInsert

//CUSTOMER_INFOrecord_ds_AfterExecuteInsert @172-BF83B410
function CUSTOMER_INFOrecord_ds_AfterExecuteInsert(& $sender)
{
    $CUSTOMER_INFOrecord_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOrecord; //Compatibility
//End CUSTOMER_INFOrecord_ds_AfterExecuteInsert

//Custom Code @189-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($CUSTOMER_INFOrecord->DataSource->Provider->Error)) {
		$error_msg = $CUSTOMER_INFOrecord->DataSource->Provider->Error['message'];
		$CUSTOMER_INFOrecord->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOrecord_ds_AfterExecuteInsert @172-5577B742
    return $CUSTOMER_INFOrecord_ds_AfterExecuteInsert;
}
//End Close CUSTOMER_INFOrecord_ds_AfterExecuteInsert

//CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate @172-3A6321EF
function CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate(& $sender)
{
    $CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOrecord; //Compatibility
//End CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate

//Custom Code @190-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate @172-D89E35D5
    return $CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate;
}
//End Close CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate

//CUSTOMER_INFOrecord_ds_AfterExecuteUpdate @172-C963AC02
function CUSTOMER_INFOrecord_ds_AfterExecuteUpdate(& $sender)
{
    $CUSTOMER_INFOrecord_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOrecord; //Compatibility
//End CUSTOMER_INFOrecord_ds_AfterExecuteUpdate

//Custom Code @191-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($CUSTOMER_INFOrecord->DataSource->Provider->Error)) {
		$error_msg = $CUSTOMER_INFOrecord->DataSource->Provider->Error['message'];
		$CUSTOMER_INFOrecord->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOrecord_ds_AfterExecuteUpdate @172-9A5E76CD
    return $CUSTOMER_INFOrecord_ds_AfterExecuteUpdate;
}
//End Close CUSTOMER_INFOrecord_ds_AfterExecuteUpdate

//CUSTOMER_INFOrecord_ds_BeforeExecuteDelete @172-415FB765
function CUSTOMER_INFOrecord_ds_BeforeExecuteDelete(& $sender)
{
    $CUSTOMER_INFOrecord_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOrecord; //Compatibility
//End CUSTOMER_INFOrecord_ds_BeforeExecuteDelete

//Custom Code @192-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOrecord_ds_BeforeExecuteDelete @172-44BA93A4
    return $CUSTOMER_INFOrecord_ds_BeforeExecuteDelete;
}
//End Close CUSTOMER_INFOrecord_ds_BeforeExecuteDelete

//CUSTOMER_INFOrecord_ds_AfterExecuteDelete @172-DC2C628E
function CUSTOMER_INFOrecord_ds_AfterExecuteDelete(& $sender)
{
    $CUSTOMER_INFOrecord_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOrecord; //Compatibility
//End CUSTOMER_INFOrecord_ds_AfterExecuteDelete

//Custom Code @193-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($CUSTOMER_INFOrecord->DataSource->Provider->Error)) {
		$error_msg = $CUSTOMER_INFOrecord->DataSource->Provider->Error['message'];
		$CUSTOMER_INFOrecord->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOrecord_ds_AfterExecuteDelete @172-067AD0BC
    return $CUSTOMER_INFOrecord_ds_AfterExecuteDelete;
}
//End Close CUSTOMER_INFOrecord_ds_AfterExecuteDelete

//Page_OnInitializeView @1-A992F55A
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $subscriber_info_form; //Compatibility
//End Page_OnInitializeView

//Custom Code @166-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("SUBSCRIBER_INFO_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView
?>
