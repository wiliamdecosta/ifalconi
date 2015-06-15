<?php
//BindEvents Method @1-5F28D22E
function BindEvents()
{
    global $V_ACCOUNT_DISC;
    global $V_CUST_ACCOUNT_COMP_DISCOUNT;
    global $V_CUST_ACCOUNT_DISCOUNT;
    global $V_CUST_ACCOUNT_COMP_DISCO;
    global $CCSEvents;
    $V_ACCOUNT_DISC->skenarioEdit->CCSEvents["BeforeShow"] = "V_ACCOUNT_DISC_skenarioEdit_BeforeShow";
    $V_ACCOUNT_DISC->skenarioDel->CCSEvents["BeforeShow"] = "V_ACCOUNT_DISC_skenarioDel_BeforeShow";
    $V_ACCOUNT_DISC->V_P_ACCOUNT_DISC_Insert->CCSEvents["BeforeShow"] = "V_ACCOUNT_DISC_V_P_ACCOUNT_DISC_Insert_BeforeShow";
    $V_ACCOUNT_DISC->CCSEvents["BeforeShowRow"] = "V_ACCOUNT_DISC_BeforeShowRow";
    $V_CUST_ACCOUNT_COMP_DISCOUNT->skenarioEdit->CCSEvents["BeforeShow"] = "V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioEdit_BeforeShow";
    $V_CUST_ACCOUNT_COMP_DISCOUNT->skenarioDel->CCSEvents["BeforeShow"] = "V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioDel_BeforeShow";
    $V_CUST_ACCOUNT_COMP_DISCOUNT->V_P_ACC_DISC_COMP_Insert->CCSEvents["BeforeShow"] = "V_CUST_ACCOUNT_COMP_DISCOUNT_V_P_ACC_DISC_COMP_Insert_BeforeShow";
    $V_CUST_ACCOUNT_COMP_DISCOUNT->CCSEvents["BeforeShowRow"] = "V_CUST_ACCOUNT_COMP_DISCOUNT_BeforeShowRow";
    $V_CUST_ACCOUNT_DISCOUNT->Button_Cancel->CCSEvents["OnClick"] = "V_CUST_ACCOUNT_DISCOUNT_Button_Cancel_OnClick";
    $V_CUST_ACCOUNT_DISCOUNT->CCSEvents["BeforeShow"] = "V_CUST_ACCOUNT_DISCOUNT_BeforeShow";
    $V_CUST_ACCOUNT_DISCOUNT->ds->CCSEvents["AfterExecuteInsert"] = "V_CUST_ACCOUNT_DISCOUNT_ds_AfterExecuteInsert";
    $V_CUST_ACCOUNT_DISCOUNT->ds->CCSEvents["BeforeExecuteInsert"] = "V_CUST_ACCOUNT_DISCOUNT_ds_BeforeExecuteInsert";
    $V_CUST_ACCOUNT_COMP_DISCO->Button_Cancel->CCSEvents["OnClick"] = "V_CUST_ACCOUNT_COMP_DISCO_Button_Cancel_OnClick";
    $V_CUST_ACCOUNT_COMP_DISCO->CUSTOMER_ACCOUNT_ID->CCSEvents["BeforeShow"] = "V_CUST_ACCOUNT_COMP_DISCO_CUSTOMER_ACCOUNT_ID_BeforeShow";
    $V_CUST_ACCOUNT_COMP_DISCO->ds->CCSEvents["AfterExecuteInsert"] = "V_CUST_ACCOUNT_COMP_DISCO_ds_AfterExecuteInsert";
    $V_CUST_ACCOUNT_COMP_DISCO->ds->CCSEvents["BeforeExecuteInsert"] = "V_CUST_ACCOUNT_COMP_DISCO_ds_BeforeExecuteInsert";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//V_ACCOUNT_DISC_skenarioEdit_BeforeShow @143-4FED8DC0
function V_ACCOUNT_DISC_skenarioEdit_BeforeShow(& $sender)
{
    $V_ACCOUNT_DISC_skenarioEdit_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_ACCOUNT_DISC; //Compatibility
//End V_ACCOUNT_DISC_skenarioEdit_BeforeShow

//Custom Code @225-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$V_ACCOUNT_DISC->skenarioEdit->Page = $FileName;
	$V_ACCOUNT_DISC->skenarioEdit->Parameters = CCGetQueryString("QueryString", "");
	//$V_ACCOUNT_DISC->skenarioEdit->Parameters = CCRemoveParam($V_ACCOUNT_DISC->skenarioEdit->Parameters, "CUST_ACCOUNT_DISCOUNT_ID");
	$V_ACCOUNT_DISC->skenarioEdit->Parameters = CCAddParam($V_ACCOUNT_DISC->skenarioEdit->Parameters, "EDIT", "1");
// -------------------------
//End Custom Code

//Close V_ACCOUNT_DISC_skenarioEdit_BeforeShow @143-2567042C
    return $V_ACCOUNT_DISC_skenarioEdit_BeforeShow;
}
//End Close V_ACCOUNT_DISC_skenarioEdit_BeforeShow

//V_ACCOUNT_DISC_skenarioDel_BeforeShow @145-022AD69A
function V_ACCOUNT_DISC_skenarioDel_BeforeShow(& $sender)
{
    $V_ACCOUNT_DISC_skenarioDel_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_ACCOUNT_DISC; //Compatibility
//End V_ACCOUNT_DISC_skenarioDel_BeforeShow

//Custom Code @219-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close V_ACCOUNT_DISC_skenarioDel_BeforeShow @145-B73B92F5
    return $V_ACCOUNT_DISC_skenarioDel_BeforeShow;
}
//End Close V_ACCOUNT_DISC_skenarioDel_BeforeShow

//V_ACCOUNT_DISC_V_P_ACCOUNT_DISC_Insert_BeforeShow @179-D295255C
function V_ACCOUNT_DISC_V_P_ACCOUNT_DISC_Insert_BeforeShow(& $sender)
{
    $V_ACCOUNT_DISC_V_P_ACCOUNT_DISC_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_ACCOUNT_DISC; //Compatibility
//End V_ACCOUNT_DISC_V_P_ACCOUNT_DISC_Insert_BeforeShow

//Custom Code @180-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$V_ACCOUNT_DISC->V_P_ACCOUNT_DISC_Insert->Page = $FileName;
	$V_ACCOUNT_DISC->V_P_ACCOUNT_DISC_Insert->Parameters = CCGetQueryString("QueryString", "");
	$V_ACCOUNT_DISC->V_P_ACCOUNT_DISC_Insert->Parameters = CCRemoveParam($V_ACCOUNT_DISC->V_P_ACCOUNT_DISC_Insert->Parameters, "CUST_ACCOUNT_DISCOUNT_ID");
	$V_ACCOUNT_DISC->V_P_ACCOUNT_DISC_Insert->Parameters = CCAddParam($V_ACCOUNT_DISC->V_P_ACCOUNT_DISC_Insert->Parameters, "TAMBAH", "1");
	//die($P_VC_SCENARIO->V_P_VC_SCNENARIO_Insert->Parameters = CCAddParam($P_VC_SCENARIO->V_P_VC_SCNENARIO_Insert->Parameters, "TAMBAH", "1"));
// -------------------------
//End Custom Code

//Close V_ACCOUNT_DISC_V_P_ACCOUNT_DISC_Insert_BeforeShow @179-813A95A8
    return $V_ACCOUNT_DISC_V_P_ACCOUNT_DISC_Insert_BeforeShow;
}
//End Close V_ACCOUNT_DISC_V_P_ACCOUNT_DISC_Insert_BeforeShow

//V_ACCOUNT_DISC_BeforeShowRow @2-C52665CD
function V_ACCOUNT_DISC_BeforeShowRow(& $sender)
{
    $V_ACCOUNT_DISC_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_ACCOUNT_DISC; //Compatibility
//End V_ACCOUNT_DISC_BeforeShowRow

//Set Row Style @3-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Custom Code @65-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("CUST_ACCOUNT_DISCOUNT_ID", 0);
	//echo $keyId;
	//exit;
	
	global $id;
	global $id2;
	if (empty($keyId)) {
		$id = $V_ACCOUNT_DISC->CUST_ACCOUNT_DISCOUNT_ID->GetValue();
		$id2 = $V_ACCOUNT_DISC->CUSTOMER_ACCOUNT_ID->GetValue();
		//echo $id1."||".$id2."||".$id3;
	//	exit;

		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCRemoveParam($param,"CUST_ACCOUNT_DISCOUNT_ID");
		$param = CCAddParam($param, "CUST_ACCOUNT_DISCOUNT_ID", $id);
		$param = CCAddParam($param, "CUSTOMER_ACCOUNT_ID", $id2);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		exit;
	}

	if ($V_ACCOUNT_DISC->CUST_ACCOUNT_DISCOUNT_ID->GetValue() == $keyId) {
		$V_ACCOUNT_DISC->ADLink->Visible = true;
		$V_ACCOUNT_DISC->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$V_ACCOUNT_DISC->ADLink->Visible = false;
		$V_ACCOUNT_DISC->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}

	if($V_ACCOUNT_DISC->IS_BASED_ON_TOTAL->GetValue()=="Y")
		$V_ACCOUNT_DISC->IS_BASED_ON_TOTAL->SetValue("YES");
	else
		$V_ACCOUNT_DISC->IS_BASED_ON_TOTAL->SetValue("NO");

/*	if($V_ACCOUNT_DISC->IS_INVOICED->GetValue()=="Y")
		$V_ACCOUNT_DISC->IS_INVOICED->SetValue("YES");
	else
		$V_ACCOUNT_DISC->IS_INVOICED->SetValue("NO");

	if($V_ACCOUNT_DISC->IS_VAT_EXCEPTION->GetValue()=="Y")
		$V_ACCOUNT_DISC->IS_VAT_EXCEPTION->SetValue("YES");
	else
		$V_ACCOUNT_DISC->IS_VAT_EXCEPTION->SetValue("NO");
		*/
// -------------------------
//End Custom Code

//Close V_ACCOUNT_DISC_BeforeShowRow @2-F0CE455F
    return $V_ACCOUNT_DISC_BeforeShowRow;
}
//End Close V_ACCOUNT_DISC_BeforeShowRow

//V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioEdit_BeforeShow @264-CDD45939
function V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioEdit_BeforeShow(& $sender)
{
    $V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioEdit_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACCOUNT_COMP_DISCOUNT; //Compatibility
//End V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioEdit_BeforeShow

//Custom Code @265-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$V_CUST_ACCOUNT_COMP_DISCOUNT->skenarioEdit->Page = $FileName;
	$V_CUST_ACCOUNT_COMP_DISCOUNT->skenarioEdit->Parameters = CCGetQueryString("QueryString", "");
	//$V_CUST_ACCOUNT_COMP_DISCOUNT->skenarioEdit->Parameters = CCRemoveParam($V_CUST_ACCOUNT_COMP_DISCOUNT->sskenarioEdit->Parameters, "CUST_ACCOUNT_COMP_DISCOUNT_ID");
	$V_CUST_ACCOUNT_COMP_DISCOUNT->skenarioEdit->Parameters = CCAddParam($V_CUST_ACCOUNT_COMP_DISCOUNT->skenarioEdit->Parameters, "EDIT2", "1");
// -------------------------
//End Custom Code

//Close V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioEdit_BeforeShow @264-B6925FDD
    return $V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioEdit_BeforeShow;
}
//End Close V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioEdit_BeforeShow

//V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioDel_BeforeShow @268-1E2FAFBF
function V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioDel_BeforeShow(& $sender)
{
    $V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioDel_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACCOUNT_COMP_DISCOUNT; //Compatibility
//End V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioDel_BeforeShow

//Custom Code @269-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioDel_BeforeShow @268-4B9FFE78
    return $V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioDel_BeforeShow;
}
//End Close V_CUST_ACCOUNT_COMP_DISCOUNT_skenarioDel_BeforeShow

//V_CUST_ACCOUNT_COMP_DISCOUNT_V_P_ACC_DISC_COMP_Insert_BeforeShow @367-4858174E
function V_CUST_ACCOUNT_COMP_DISCOUNT_V_P_ACC_DISC_COMP_Insert_BeforeShow(& $sender)
{
    $V_CUST_ACCOUNT_COMP_DISCOUNT_V_P_ACC_DISC_COMP_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACCOUNT_COMP_DISCOUNT; //Compatibility
//End V_CUST_ACCOUNT_COMP_DISCOUNT_V_P_ACC_DISC_COMP_Insert_BeforeShow

//Custom Code @368-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$V_CUST_ACCOUNT_COMP_DISCOUNT->V_P_ACC_DISC_COMP_Insert->Page = $FileName;
	$V_CUST_ACCOUNT_COMP_DISCOUNT->V_P_ACC_DISC_COMP_Insert->Parameters = CCGetQueryString("QueryString", "");
	$V_CUST_ACCOUNT_COMP_DISCOUNT->V_P_ACC_DISC_COMP_Insert->Parameters = CCRemoveParam($V_CUST_ACCOUNT_COMP_DISCOUNT->V_P_ACC_DISC_COMP_Insert->Parameters, "CUST_ACCOUNT_COMP_DISCOUNT_ID");
	$V_CUST_ACCOUNT_COMP_DISCOUNT->V_P_ACC_DISC_COMP_Insert->Parameters = CCAddParam($V_CUST_ACCOUNT_COMP_DISCOUNT->V_P_ACC_DISC_COMP_Insert->Parameters, "TAMBAH2", "1");
	//die($P_VC_SCENARIO->V_P_VC_SCNENARIO_Insert->Parameters = CCAddParam($P_VC_SCENARIO->V_P_VC_SCNENARIO_Insert->Parameters, "TAMBAH", "1"));
// -------------------------
//End Custom Code

//Close V_CUST_ACCOUNT_COMP_DISCOUNT_V_P_ACC_DISC_COMP_Insert_BeforeShow @367-ADF931B6
    return $V_CUST_ACCOUNT_COMP_DISCOUNT_V_P_ACC_DISC_COMP_Insert_BeforeShow;
}
//End Close V_CUST_ACCOUNT_COMP_DISCOUNT_V_P_ACC_DISC_COMP_Insert_BeforeShow

//V_CUST_ACCOUNT_COMP_DISCOUNT_BeforeShowRow @69-20591481
function V_CUST_ACCOUNT_COMP_DISCOUNT_BeforeShowRow(& $sender)
{
    $V_CUST_ACCOUNT_COMP_DISCOUNT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACCOUNT_COMP_DISCOUNT; //Compatibility
//End V_CUST_ACCOUNT_COMP_DISCOUNT_BeforeShowRow

//Set Row Style @374-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @375-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("CUST_ACCOUNT_COMP_DISCOUNT_ID", 0);
	//echo $keyId;
	//exit;
	global $id3;
	global $id4;
	global $id5;
	if ($keyId == 0) {
		
		$id3 = $V_CUST_ACCOUNT_COMP_DISCOUNT->CUST_ACCOUNT_COMP_DISCOUNT_ID->GetValue();
		$id4 = $V_CUST_ACCOUNT_COMP_DISCOUNT->CUST_ACCOUNT_DISCOUNT_ID->GetValue();
		$id5 = $V_CUST_ACCOUNT_COMP_DISCOUNT->CUSTOMER_ACCOUNT_ID->GetValue();
		//echo $id1."||".$id2."||".$id3;
	//	exit;

		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCRemoveParam($param,"CUST_ACCOUNT_COMP_DISCOUNT_ID");
		$param = CCAddParam($param, "CUST_ACCOUNT_COMP_DISCOUNT_ID", $id3);
		$param = CCAddParam($param, "CUST_ACCOUNT_DISCOUNT_ID", $id4);
		$param = CCAddParam($param, "CUSTOMER_ACCOUNT_ID", $id5);
				
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		exit;
	}

	if ($V_CUST_ACCOUNT_COMP_DISCOUNT->CUST_ACCOUNT_COMP_DISCOUNT_ID->GetValue() == $keyId) {
		$V_CUST_ACCOUNT_COMP_DISCOUNT->ADLink->Visible = true;
		$V_CUST_ACCOUNT_COMP_DISCOUNT->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$V_CUST_ACCOUNT_COMP_DISCOUNT->ADLink->Visible = false;
		$V_CUST_ACCOUNT_COMP_DISCOUNT->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close V_CUST_ACCOUNT_COMP_DISCOUNT_BeforeShowRow @69-5D22D2B4
    return $V_CUST_ACCOUNT_COMP_DISCOUNT_BeforeShowRow;
}
//End Close V_CUST_ACCOUNT_COMP_DISCOUNT_BeforeShowRow

//V_CUST_ACCOUNT_DISCOUNT_Button_Cancel_OnClick @158-970730CE
function V_CUST_ACCOUNT_DISCOUNT_Button_Cancel_OnClick(& $sender)
{
    $V_CUST_ACCOUNT_DISCOUNT_Button_Cancel_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACCOUNT_DISCOUNT; //Compatibility
//End V_CUST_ACCOUNT_DISCOUNT_Button_Cancel_OnClick

 //Custom Code @228-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;

	if(CCGetFromGet("EDIT")){
		$addQueryString = CCGetQueryString("QueryString");
		$addQueryString = CCRemoveParam($addQueryString,"EDIT");
		$addQueryString = CCRemoveParam($addQueryString,"ccsForm");
		
		$Redirect = $FileName."?".$addQueryString;
		//die($Redirect);
		header("Location: ".$Redirect);
		exit;
		//echo $addQueryString;
		//exit;
		
		//$addQueryString = CCRemoveParam($addQueryString,"EDIT");
		
	}
// -------------------------
//End Custom Code

//Close V_CUST_ACCOUNT_DISCOUNT_Button_Cancel_OnClick @158-7826E0C2
    return $V_CUST_ACCOUNT_DISCOUNT_Button_Cancel_OnClick;
}
//End Close V_CUST_ACCOUNT_DISCOUNT_Button_Cancel_OnClick

//V_CUST_ACCOUNT_DISCOUNT_BeforeShow @153-3B324262
function V_CUST_ACCOUNT_DISCOUNT_BeforeShow(& $sender)
{
    $V_CUST_ACCOUNT_DISCOUNT_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACCOUNT_DISCOUNT; //Compatibility
//End V_CUST_ACCOUNT_DISCOUNT_BeforeShow

//Custom Code @227-2A29BDB7
// -------------------------
    // Write your own code here.
	//$V_CUST_ACCOUNT_DISCOUNT->Visible = false;
// -------------------------
//End Custom Code

//Close V_CUST_ACCOUNT_DISCOUNT_BeforeShow @153-3CC4D253
    return $V_CUST_ACCOUNT_DISCOUNT_BeforeShow;
}
//End Close V_CUST_ACCOUNT_DISCOUNT_BeforeShow

//V_CUST_ACCOUNT_DISCOUNT_ds_AfterExecuteInsert @153-B7AB614E
function V_CUST_ACCOUNT_DISCOUNT_ds_AfterExecuteInsert(& $sender)
{
    $V_CUST_ACCOUNT_DISCOUNT_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACCOUNT_DISCOUNT; //Compatibility
//End V_CUST_ACCOUNT_DISCOUNT_ds_AfterExecuteInsert

//Custom Code @384-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($V_CUST_ACCOUNT_DISCOUNT->DataSource->Provider->Error)) {
		$error_msg = $V_CUST_ACCOUNT_DISCOUNT->DataSource->Provider->Error['message'];
		$V_CUST_ACCOUNT_DISCOUNT->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_CUST_ACCOUNT_DISCOUNT_ds_AfterExecuteInsert @153-7819039F
    return $V_CUST_ACCOUNT_DISCOUNT_ds_AfterExecuteInsert;
}
//End Close V_CUST_ACCOUNT_DISCOUNT_ds_AfterExecuteInsert

//V_CUST_ACCOUNT_DISCOUNT_ds_BeforeExecuteInsert @153-9782E690
function V_CUST_ACCOUNT_DISCOUNT_ds_BeforeExecuteInsert(& $sender)
{
    $V_CUST_ACCOUNT_DISCOUNT_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACCOUNT_DISCOUNT; //Compatibility
//End V_CUST_ACCOUNT_DISCOUNT_ds_BeforeExecuteInsert

//Custom Code @385-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_CUST_ACCOUNT_DISCOUNT_ds_BeforeExecuteInsert @153-EFF83487
    return $V_CUST_ACCOUNT_DISCOUNT_ds_BeforeExecuteInsert;
}
//End Close V_CUST_ACCOUNT_DISCOUNT_ds_BeforeExecuteInsert

//V_CUST_ACCOUNT_COMP_DISCO_Button_Cancel_OnClick @297-0E04ABBB
function V_CUST_ACCOUNT_COMP_DISCO_Button_Cancel_OnClick(& $sender)
{
    $V_CUST_ACCOUNT_COMP_DISCO_Button_Cancel_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACCOUNT_COMP_DISCO; //Compatibility
//End V_CUST_ACCOUNT_COMP_DISCO_Button_Cancel_OnClick

//Custom Code @380-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;

	if(CCGetFromGet("EDIT2")){
		$addQueryString = CCGetQueryString("QueryString");
		$addQueryString = CCRemoveParam($addQueryString,"EDIT2");
		$addQueryString = CCRemoveParam($addQueryString,"ccsForm");
		
		$Redirect = $FileName."?".$addQueryString;
		//die($Redirect);
		header("Location: ".$Redirect);
		exit;
		//echo $addQueryString;
		//exit;
		
		//$addQueryString = CCRemoveParam($addQueryString,"EDIT");
		
	}
// -------------------------
//End Custom Code

//Close V_CUST_ACCOUNT_COMP_DISCO_Button_Cancel_OnClick @297-4AC1DD79
    return $V_CUST_ACCOUNT_COMP_DISCO_Button_Cancel_OnClick;
}
//End Close V_CUST_ACCOUNT_COMP_DISCO_Button_Cancel_OnClick

//V_CUST_ACCOUNT_COMP_DISCO_CUSTOMER_ACCOUNT_ID_BeforeShow @386-53695832
function V_CUST_ACCOUNT_COMP_DISCO_CUSTOMER_ACCOUNT_ID_BeforeShow(& $sender)
{
    $V_CUST_ACCOUNT_COMP_DISCO_CUSTOMER_ACCOUNT_ID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACCOUNT_COMP_DISCO; //Compatibility
//End V_CUST_ACCOUNT_COMP_DISCO_CUSTOMER_ACCOUNT_ID_BeforeShow

//Custom Code @387-2A29BDB7
// -------------------------
    // Write your own code here.
	$V_CUST_ACCOUNT_COMP_DISCO->CUSTOMER_ACCOUNT_ID->SetValue(CCGetFromGet("CUSTOMER_ACCOUNT_ID"));
// -------------------------
//End Custom Code

//Close V_CUST_ACCOUNT_COMP_DISCO_CUSTOMER_ACCOUNT_ID_BeforeShow @386-31D5ADFE
    return $V_CUST_ACCOUNT_COMP_DISCO_CUSTOMER_ACCOUNT_ID_BeforeShow;
}
//End Close V_CUST_ACCOUNT_COMP_DISCO_CUSTOMER_ACCOUNT_ID_BeforeShow

//V_CUST_ACCOUNT_COMP_DISCO_ds_AfterExecuteInsert @292-6A136F52
function V_CUST_ACCOUNT_COMP_DISCO_ds_AfterExecuteInsert(& $sender)
{
    $V_CUST_ACCOUNT_COMP_DISCO_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACCOUNT_COMP_DISCO; //Compatibility
//End V_CUST_ACCOUNT_COMP_DISCO_ds_AfterExecuteInsert

//Custom Code @336-2A29BDB7
// -------------------------
    // Write your own code here.
	
	ob_end_clean();
	//exit;
	if(is_array($V_CUST_ACCOUNT_COMP_DISCO->DataSource->Provider->Error)) {
		$error_msg = $V_CUST_ACCOUNT_COMP_DISCO->DataSource->Provider->Error['message'];
		$V_CUST_ACCOUNT_COMP_DISCO->Errors->addError($error_msg);
	};

// -------------------------
//End Custom Code

//Close V_CUST_ACCOUNT_COMP_DISCO_ds_AfterExecuteInsert @292-4AFE3E24
    return $V_CUST_ACCOUNT_COMP_DISCO_ds_AfterExecuteInsert;
}
//End Close V_CUST_ACCOUNT_COMP_DISCO_ds_AfterExecuteInsert

//V_CUST_ACCOUNT_COMP_DISCO_ds_BeforeExecuteInsert @292-55F1957C
function V_CUST_ACCOUNT_COMP_DISCO_ds_BeforeExecuteInsert(& $sender)
{
    $V_CUST_ACCOUNT_COMP_DISCO_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUST_ACCOUNT_COMP_DISCO; //Compatibility
//End V_CUST_ACCOUNT_COMP_DISCO_ds_BeforeExecuteInsert

//Custom Code @337-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_CUST_ACCOUNT_COMP_DISCO_ds_BeforeExecuteInsert @292-B379B9BE
    return $V_CUST_ACCOUNT_COMP_DISCO_ds_BeforeExecuteInsert;
}
//End Close V_CUST_ACCOUNT_COMP_DISCO_ds_BeforeExecuteInsert

//Page_BeforeShow @1-FF92921D
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $account_discount; //Compatibility
//End Page_BeforeShow

//Custom Code @183-2A29BDB7
// -------------------------
    // Write your own code here.
	global $V_ACCOUNT_DISC;
	global $V_CUST_ACCOUNT_DISCOUNT;
	global $id;
	global $V_CUST_ACCOUNT_COMP_DISCOUNT;
	global $V_CUST_ACCOUNT_COMP_DISCO;
	$tambah2 = CCGetFromGet("TAMBAH2","");
	$tambah = CCGetFromGet("TAMBAH", "");
	$edit = CCGetFromGet("EDIT", "");
	$edit2 = CCGetFromGet("EDIT2", "");

	if($tambah == "1") {
		$V_ACCOUNT_DISC->Visible = false;
		$V_CUST_ACCOUNT_DISCOUNT->Visible = true;
		$V_CUST_ACCOUNT_COMP_DISCOUNT->Visible = false;
		$V_CUST_ACCOUNT_COMP_DISCO->Visible = false;
		$V_CUST_ACCOUNT_DISCOUNT->ds->SQL = "";
	}else if($edit == "1"){
		$V_ACCOUNT_DISC->Visible = true;
		$V_CUST_ACCOUNT_DISCOUNT->Visible = true;
		$V_CUST_ACCOUNT_COMP_DISCOUNT->Visible = true;
		$V_CUST_ACCOUNT_COMP_DISCO->Visible = false;
	}else if($tambah2 == "1"){
		$V_ACCOUNT_DISC->Visible = false;
		$V_CUST_ACCOUNT_COMP_DISCOUNT->Visible = false;
		$V_CUST_ACCOUNT_DISCOUNT->Visible = false;
		$V_CUST_ACCOUNT_COMP_DISCO->Visible = true;
		$V_CUST_ACCOUNT_COMP_DISCO->ds->SQL = "";
	}else if($edit2){
		$V_ACCOUNT_DISC->Visible = true;
		$V_CUST_ACCOUNT_DISCOUNT->Visible = false;
		$V_CUST_ACCOUNT_COMP_DISCOUNT->Visible = true;
		$V_CUST_ACCOUNT_COMP_DISCO->Visible = true;
	}
	else{
		$V_ACCOUNT_DISC->Visible = true;
		$V_CUST_ACCOUNT_DISCOUNT->Visible = false;
		$V_CUST_ACCOUNT_COMP_DISCOUNT->Visible = true;
		$V_CUST_ACCOUNT_COMP_DISCO->Visible = false;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_BeforeInitialize @1-DE12D8E5
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $account_discount; //Compatibility
//End Page_BeforeInitialize

//Custom Code @222-2A29BDB7
// -------------------------
    // Write your own code here.

	global $FileName;

	if(CCGetFromGET('action_delete')==true){
		$addQueryString = CCGetQueryString('QueryString');
		$addQueryString = CCRemoveParam($addQueryString,"action_delete");
		
		$dbConn = new clsDBConn();
	 	$query = "DELETE FROM CUST_ACCOUNT_DISCOUNT WHERE  CUST_ACCOUNT_DISCOUNT_ID =" . CCGetFromGet('CUST_ACCOUNT_DISCOUNT_ID');
		$dbConn->query($query);
	
		$addQueryString = CCRemoveParam($addQueryString,"CUST_ACCOUNT_DISCOUNT_ID");
		$Redirect = $FileName."?".$addQueryString;
		//die($Redirect);
		header("Location: ".$Redirect);
		echo $addQueryString;

		exit;
	}

	if(CCGetFromGET('action_delete2')==true){
		
		$addQueryString = CCGetQueryString('QueryString');
		$addQueryString = CCRemoveParam($addQueryString,"action_delete2");
		
		
		$dbConn = new clsDBConn();
	 	$query = "DELETE FROM CUST_ACCOUNT_COMP_DISCOUNT WHERE  CUST_ACCOUNT_COMP_DISCOUNT_ID =" . CCGetFromGet('CUST_ACCOUNT_COMP_DISCOUNT_ID');
		$dbConn->query($query);

		$addQueryString = CCRemoveParam($addQueryString,"CUST_ACCOUNT_COMP_DISCOUNT_ID");
		$Redirect = $FileName."?".$addQueryString;
		//die($Redirect);
		header("Location: ".$Redirect);
		echo $addQueryString;

		exit;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize
?>
