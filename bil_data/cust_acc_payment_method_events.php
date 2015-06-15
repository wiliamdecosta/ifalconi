<?php
//BindEvents Method @1-F58932B6
function BindEvents()
{
    global $V_CUST_ACC_PAYMENT_METHOD;
    global $V_CUST_ACC_PAYMENT_METHOD1;
    global $CCSEvents;
    $V_CUST_ACC_PAYMENT_METHOD->V_P_CUST_ACC_PAY_METHOD_Insert->CCSEvents["BeforeShow"] = "V_CUST_ACC_PAYMENT_METHOD_V_P_CUST_ACC_PAY_METHOD_Insert_BeforeShow";
    $V_CUST_ACC_PAYMENT_METHOD->CCSEvents["BeforeShowRow"] = "V_CUST_ACC_PAYMENT_METHOD_BeforeShowRow";
    $V_CUST_ACC_PAYMENT_METHOD1->ds->CCSEvents["AfterExecuteInsert"] = "V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteInsert";
    $V_CUST_ACC_PAYMENT_METHOD1->ds->CCSEvents["BeforeExecuteInsert"] = "V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteInsert";
    $V_CUST_ACC_PAYMENT_METHOD1->ds->CCSEvents["BeforeExecuteUpdate"] = "V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteUpdate";
    $V_CUST_ACC_PAYMENT_METHOD1->ds->CCSEvents["AfterExecuteUpdate"] = "V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteUpdate";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//V_CUST_ACC_PAYMENT_METHOD_V_P_CUST_ACC_PAY_METHOD_Insert_BeforeShow @63-5F047148
function V_CUST_ACC_PAYMENT_METHOD_V_P_CUST_ACC_PAY_METHOD_Insert_BeforeShow(& $sender)
{
    $V_CUST_ACC_PAYMENT_METHOD_V_P_CUST_ACC_PAY_METHOD_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACC_PAYMENT_METHOD; //Compatibility
//End V_CUST_ACC_PAYMENT_METHOD_V_P_CUST_ACC_PAY_METHOD_Insert_BeforeShow

//Custom Code @172-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$V_CUST_ACC_PAYMENT_METHOD->V_P_CUST_ACC_PAY_METHOD_Insert->Page = $FileName;
	$V_CUST_ACC_PAYMENT_METHOD->V_P_CUST_ACC_PAY_METHOD_Insert->Parameters = CCGetQueryString("QueryString", "");
	$V_CUST_ACC_PAYMENT_METHOD->V_P_CUST_ACC_PAY_METHOD_Insert->Parameters = CCRemoveParam($V_CUST_ACC_PAYMENT_METHOD->V_P_CUST_ACC_PAY_METHOD_Insert->Parameters, "CUST_ACC_PAYMENT_METHOD_ID");
	$V_CUST_ACC_PAYMENT_METHOD->V_P_CUST_ACC_PAY_METHOD_Insert->Parameters = CCAddParam($V_CUST_ACC_PAYMENT_METHOD->V_P_CUST_ACC_PAY_METHOD_Insert->Parameters, "TAMBAH", "1");
	//die($P_VC_SCENARIO->V_P_VC_SCNENARIO_Insert->Parameters = CCAddParam($P_VC_SCENARIO->V_P_VC_SCNENARIO_Insert->Parameters, "TAMBAH", "1"));
// -------------------------
//End Custom Code

//Close V_CUST_ACC_PAYMENT_METHOD_V_P_CUST_ACC_PAY_METHOD_Insert_BeforeShow @63-1154794F
    return $V_CUST_ACC_PAYMENT_METHOD_V_P_CUST_ACC_PAY_METHOD_Insert_BeforeShow;
}
//End Close V_CUST_ACC_PAYMENT_METHOD_V_P_CUST_ACC_PAY_METHOD_Insert_BeforeShow

//V_CUST_ACC_PAYMENT_METHOD_BeforeShowRow @2-7F59CF0F
function V_CUST_ACC_PAYMENT_METHOD_BeforeShowRow(& $sender)
{
    $V_CUST_ACC_PAYMENT_METHOD_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACC_PAYMENT_METHOD; //Compatibility
//End V_CUST_ACC_PAYMENT_METHOD_BeforeShowRow

//Set Row Style @35-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Custom Code @174-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId2 = CCGetFromGet("CUSTOMER_ACCOUNT_ID", "");
	$keyId = CCGetFromGet("CUST_ACC_PAYMENT_METHOD_ID", "");
	global $id;
	global $id2;
	if (empty($keyId)) {
		$id = $V_CUST_ACC_PAYMENT_METHOD->CUST_ACC_PAYMENT_METHOD_ID->GetValue();
		$id2 = $V_CUST_ACC_PAYMENT_METHOD->CUSTOMER_ACCOUNT_ID->GetValue();
		//echo $id1."||".$id2."||".$id3;
	//	exit;

		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCRemoveParam($param,"CUST_ACC_PAYMENT_METHOD_ID");
		$param = CCAddParam($param, "CUSTOMER_ACCOUNT_ID", $id2);
		$param = CCAddParam($param, "CUST_ACC_PAYMENT_METHOD_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		exit;
	}

	if ($V_CUST_ACC_PAYMENT_METHOD->CUST_ACC_PAYMENT_METHOD_ID ->GetValue() == $keyId) {
		$V_CUST_ACC_PAYMENT_METHOD->ADLink->Visible = true;
		$V_CUST_ACC_PAYMENT_METHOD->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$V_CUST_ACC_PAYMENT_METHOD->ADLink->Visible = false;
		$V_CUST_ACC_PAYMENT_METHOD->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close V_CUST_ACC_PAYMENT_METHOD_BeforeShowRow @2-1757A78F
    return $V_CUST_ACC_PAYMENT_METHOD_BeforeShowRow;
}
//End Close V_CUST_ACC_PAYMENT_METHOD_BeforeShowRow

//V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteInsert @395-7EEEE1D7
function V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteInsert(& $sender)
{
    $V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACC_PAYMENT_METHOD1; //Compatibility
//End V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteInsert

//Custom Code @507-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_CUST_ACC_PAYMENT_METHOD1->DataSource->Provider->Error)) {
		$error_msg = $V_CUST_ACC_PAYMENT_METHOD1->DataSource->Provider->Error['message'];
		$V_CUST_ACC_PAYMENT_METHOD1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteInsert @395-8D1E83BD
    return $V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteInsert;
}
//End Close V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteInsert

//V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteInsert @395-22BAD282
function V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteInsert(& $sender)
{
    $V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACC_PAYMENT_METHOD1; //Compatibility
//End V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteInsert

//Custom Code @508-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteInsert @395-3A6D72E3
    return $V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteInsert;
}
//End Close V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteInsert

//V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteUpdate @395-529A9DBA
function V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteUpdate(& $sender)
{
    $V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACC_PAYMENT_METHOD1; //Compatibility
//End V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteUpdate

//Custom Code @509-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteUpdate @395-F544B36C
    return $V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteUpdate;
}
//End Close V_CUST_ACC_PAYMENT_METHOD1_ds_BeforeExecuteUpdate

//V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteUpdate @395-D424F109
function V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteUpdate(& $sender)
{
    $V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACC_PAYMENT_METHOD1; //Compatibility
//End V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteUpdate

//Custom Code @510-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_CUST_ACC_PAYMENT_METHOD1->DataSource->Provider->Error)) {
		$error_msg = $V_CUST_ACC_PAYMENT_METHOD1->DataSource->Provider->Error['message'];
		$V_CUST_ACC_PAYMENT_METHOD1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteUpdate @395-42374232
    return $V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteUpdate;
}
//End Close V_CUST_ACC_PAYMENT_METHOD1_ds_AfterExecuteUpdate

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	str_replace("_"," ",$V_CUSTOMER_ACCOUNT1->CUSTOMER_NAME->GetValue());
//DEL  // -------------------------

//Page_BeforeShow @1-F24AA668
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $cust_acc_payment_method; //Compatibility
//End Page_BeforeShow

//Custom Code @173-2A29BDB7
// -------------------------
    // Write your own code here.
	global $V_CUST_ACC_PAYMENT_METHOD;
	global $V_CUST_ACC_PAYMENT_METHOD1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$V_CUST_ACC_PAYMENT_METHOD->Visible = false;
		$V_CUST_ACC_PAYMENT_METHOD1->Visible = true;
		$V_CUST_ACC_PAYMENT_METHOD1->ds->SQL = "";
	} else {
		$V_CUST_ACC_PAYMENT_METHOD->Visible = true;
		$V_CUST_ACC_PAYMENT_METHOD1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
