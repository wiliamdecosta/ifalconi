<?php
//BindEvents Method @1-1E4C36DE
function BindEvents()
{
    global $P_BILLING_PERIOD_UNIT;
    global $CCSEvents;
    $P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_Insert->CCSEvents["BeforeShow"] = "P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow";
    $P_BILLING_PERIOD_UNIT->CCSEvents["BeforeShowRow"] = "P_BILLING_PERIOD_UNIT_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow @7-1D1AB0F6
function P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow(& $sender)
{
    $P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILLING_PERIOD_UNIT; //Compatibility
//End P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow

//Custom Code @43-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_Insert->Page = $FileName;
	$P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_Insert->Parameters = CCRemoveParam($P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_Insert->Parameters, "P_BILLING_PERIOD_UNIT_ID");
	$P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_Insert->Parameters = CCAddParam($P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow @7-CAF6133D
    return $P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow;
}
//End Close P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow

//P_BILLING_PERIOD_UNIT_BeforeShowRow @2-34305331
function P_BILLING_PERIOD_UNIT_BeforeShowRow(& $sender)
{
    $P_BILLING_PERIOD_UNIT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILLING_PERIOD_UNIT; //Compatibility
//End P_BILLING_PERIOD_UNIT_BeforeShowRow

//Set Row Style @49-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @50-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_BILLING_PERIOD_UNIT_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_BILLING_PERIOD_UNIT_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_ID->GetValue() == $keyId) {
		$P_BILLING_PERIOD_UNIT->ADLink->Visible = true;
		$P_BILLING_PERIOD_UNIT->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_BILLING_PERIOD_UNIT->ADLink->Visible = false;
		$P_BILLING_PERIOD_UNIT->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_BILLING_PERIOD_UNIT_BeforeShowRow @2-1BB16ADB
    return $P_BILLING_PERIOD_UNIT_BeforeShowRow;
}
//End Close P_BILLING_PERIOD_UNIT_BeforeShowRow

//Page_OnInitializeView @1-2E519505
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_billing_period_unit; //Compatibility
//End Page_OnInitializeView

//Custom Code @51-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-2E205847
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_billing_period_unit; //Compatibility
//End Page_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_BILLING_PERIOD_UNITSearch;
	global $P_BILLING_PERIOD_UNIT;
	global $P_BILLING_PERIOD_UNIT1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_BILLING_PERIOD_UNITSearch->Visible = false;
		$P_BILLING_PERIOD_UNIT->Visible = false;
		$P_BILLING_PERIOD_UNIT1->Visible = true;
		$P_BILLING_PERIOD_UNIT1->ds->SQL = "";
	} else {
		$P_BILLING_PERIOD_UNITSearch->Visible = true;
		$P_BILLING_PERIOD_UNIT->Visible = true;
		$P_BILLING_PERIOD_UNIT1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
