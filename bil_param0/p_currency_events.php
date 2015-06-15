<?php
//BindEvents Method @1-AE118849
function BindEvents()
{
    global $P_CURRENCY;
    global $CCSEvents;
    $P_CURRENCY->P_CURRENCY_Insert->CCSEvents["BeforeShow"] = "P_CURRENCY_P_CURRENCY_Insert_BeforeShow";
    $P_CURRENCY->CCSEvents["BeforeShowRow"] = "P_CURRENCY_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_CURRENCY_P_CURRENCY_Insert_BeforeShow @7-D29C3861
function P_CURRENCY_P_CURRENCY_Insert_BeforeShow(& $sender)
{
    $P_CURRENCY_P_CURRENCY_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CURRENCY; //Compatibility
//End P_CURRENCY_P_CURRENCY_Insert_BeforeShow

//Custom Code @54-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_CURRENCY->P_CURRENCY_Insert->Page = $FileName;
	$P_CURRENCY->P_CURRENCY_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_CURRENCY->P_CURRENCY_Insert->Parameters = CCRemoveParam($P_CURRENCY->P_CURRENCY_Insert->Parameters, "P_CURRENCY_ID");
	$P_CURRENCY->P_CURRENCY_Insert->Parameters = CCAddParam($P_CURRENCY->P_CURRENCY_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_CURRENCY_P_CURRENCY_Insert_BeforeShow @7-BA56D05E
    return $P_CURRENCY_P_CURRENCY_Insert_BeforeShow;
}
//End Close P_CURRENCY_P_CURRENCY_Insert_BeforeShow

//P_CURRENCY_BeforeShowRow @2-220D52F6
function P_CURRENCY_BeforeShowRow(& $sender)
{
    $P_CURRENCY_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CURRENCY; //Compatibility
//End P_CURRENCY_BeforeShowRow

//Set Row Style @56-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_CURRENCY_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_CURRENCY->P_CURRENCY_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_CURRENCY_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_CURRENCY->P_CURRENCY_ID->GetValue() == $keyId) {
		$P_CURRENCY->ADLink->Visible = true;
		$P_CURRENCY->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_CURRENCY->ADLink->Visible = false;
		$P_CURRENCY->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_CURRENCY_BeforeShowRow @2-638D280A
    return $P_CURRENCY_BeforeShowRow;
}
//End Close P_CURRENCY_BeforeShowRow

//Page_OnInitializeView @1-A86B1B96
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_currency; //Compatibility
//End Page_OnInitializeView

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-35418393
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_currency; //Compatibility
//End Page_BeforeShow

//Custom Code @59-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CURRENCYSearch;
	global $P_CURRENCY;
	global $P_CURRENCY1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_CURRENCYSearch->Visible = false;
		$P_CURRENCY->Visible = false;
		$P_CURRENCY1->Visible = true;
		$P_CURRENCY1->ds->SQL = "";
	} else {
		$P_CURRENCYSearch->Visible = true;
		$P_CURRENCY->Visible = true;
		$P_CURRENCY1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
