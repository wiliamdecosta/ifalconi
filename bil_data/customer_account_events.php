<?php
//BindEvents Method @1-F498A4DE
function BindEvents()
{
    global $V_CUSTOMER_ACCOUNT;
    global $CCSEvents;
    $V_CUSTOMER_ACCOUNT->V_P_CUSTOMER_ACCOUNT_Insert->CCSEvents["BeforeShow"] = "V_CUSTOMER_ACCOUNT_V_P_CUSTOMER_ACCOUNT_Insert_BeforeShow";
    $V_CUSTOMER_ACCOUNT->CCSEvents["BeforeShowRow"] = "V_CUSTOMER_ACCOUNT_BeforeShowRow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//V_CUSTOMER_ACCOUNT_V_P_CUSTOMER_ACCOUNT_Insert_BeforeShow @63-D0951977
function V_CUSTOMER_ACCOUNT_V_P_CUSTOMER_ACCOUNT_Insert_BeforeShow(& $sender)
{
    $V_CUSTOMER_ACCOUNT_V_P_CUSTOMER_ACCOUNT_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUSTOMER_ACCOUNT; //Compatibility
//End V_CUSTOMER_ACCOUNT_V_P_CUSTOMER_ACCOUNT_Insert_BeforeShow

//Custom Code @172-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$V_CUSTOMER_ACCOUNT->V_P_CUSTOMER_ACCOUNT_Insert->Page = $FileName;
	$V_CUSTOMER_ACCOUNT->V_P_CUSTOMER_ACCOUNT_Insert->Parameters = CCGetQueryString("QueryString", "");
	$V_CUSTOMER_ACCOUNT->V_P_CUSTOMER_ACCOUNT_Insert->Parameters = CCRemoveParam($V_CUSTOMER_ACCOUNT->V_P_CUSTOMER_ACCOUNT_Insert->Parameters, "CUSTOMER_ACCOUNT_ID");
	$V_CUSTOMER_ACCOUNT->V_P_CUSTOMER_ACCOUNT_Insert->Parameters = CCAddParam($V_CUSTOMER_ACCOUNT->V_P_CUSTOMER_ACCOUNT_Insert->Parameters, "TAMBAH", "1");
	//die($P_VC_SCENARIO->V_P_VC_SCNENARIO_Insert->Parameters = CCAddParam($P_VC_SCENARIO->V_P_VC_SCNENARIO_Insert->Parameters, "TAMBAH", "1"));
// -------------------------
//End Custom Code

//Close V_CUSTOMER_ACCOUNT_V_P_CUSTOMER_ACCOUNT_Insert_BeforeShow @63-A326C1A9
    return $V_CUSTOMER_ACCOUNT_V_P_CUSTOMER_ACCOUNT_Insert_BeforeShow;
}
//End Close V_CUSTOMER_ACCOUNT_V_P_CUSTOMER_ACCOUNT_Insert_BeforeShow

//V_CUSTOMER_ACCOUNT_BeforeShowRow @2-F24D6EB5
function V_CUSTOMER_ACCOUNT_BeforeShowRow(& $sender)
{
    $V_CUSTOMER_ACCOUNT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUSTOMER_ACCOUNT; //Compatibility
//End V_CUSTOMER_ACCOUNT_BeforeShowRow

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
	$keyId = CCGetFromGet("CUSTOMER_ACCOUNT_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		$id = $V_CUSTOMER_ACCOUNT->CUSTOMER_ACCOUNT_ID->GetValue();
		//echo $id1."||".$id2."||".$id3;
	//	exit;

		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCRemoveParam($param,"CUSTOMER_ACCOUNT_ID");
		$param = CCAddParam($param, "CUSTOMER_ACCOUNT_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		exit;
	}

	if ($V_CUSTOMER_ACCOUNT->CUSTOMER_ACCOUNT_ID->GetValue() == $keyId) {
		$V_CUSTOMER_ACCOUNT->ADLink->Visible = true;
		$V_CUSTOMER_ACCOUNT->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$V_CUSTOMER_ACCOUNT->ADLink->Visible = false;
		$V_CUSTOMER_ACCOUNT->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close V_CUSTOMER_ACCOUNT_BeforeShowRow @2-573B757F
    return $V_CUSTOMER_ACCOUNT_BeforeShowRow;
}
//End Close V_CUSTOMER_ACCOUNT_BeforeShowRow

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	str_replace("_"," ",$V_CUSTOMER_ACCOUNT1->CUSTOMER_NAME->GetValue());
//DEL  // -------------------------

//Page_BeforeShow @1-793A7631
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $customer_account; //Compatibility
//End Page_BeforeShow

//Custom Code @173-2A29BDB7
// -------------------------
    // Write your own code here.
	global $V_CUSTOMER_ACCOUNTSearch;
	global $V_CUSTOMER_ACCOUNT;
	global $V_CUSTOMER_ACCOUNT1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$V_CUSTOMER_ACCOUNTSearch->Visible = false;
		$V_CUSTOMER_ACCOUNT->Visible = false;
		$V_CUSTOMER_ACCOUNT1->Visible = true;
		$V_CUSTOMER_ACCOUNT1->ds->SQL = "";
	} else {
		$V_CUSTOMER_ACCOUNTSearch->Visible = true;
		$V_CUSTOMER_ACCOUNT->Visible = true;
		$V_CUSTOMER_ACCOUNT1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
