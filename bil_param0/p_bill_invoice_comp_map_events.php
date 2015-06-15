<?php
//BindEvents Method @1-6F72F0A3
function BindEvents()
{
    global $P_BILL_INVOICE_COMP_MAP;
    global $CCSEvents;
    $P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_Insert->CCSEvents["BeforeShow"] = "P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow";
    $P_BILL_INVOICE_COMP_MAP->CCSEvents["BeforeShowRow"] = "P_BILL_INVOICE_COMP_MAP_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow @7-E46DBB7D
function P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow(& $sender)
{
    $P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_INVOICE_COMP_MAP; //Compatibility
//End P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow

//Custom Code @53-2A29BDB7
// -------------------------b
    // Write your own code here.
	global $FileName;
	$P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_Insert->Page = $FileName;
	$P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_Insert->Parameters = CCRemoveParam($P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_Insert->Parameters, "P_BILL_INVOICE_COMP_MAP_ID");
	$P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_Insert->Parameters = CCAddParam($P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow @7-86EC5AFF
    return $P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow;
}
//End Close P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow

//P_BILL_INVOICE_COMP_MAP_BeforeShowRow @2-C8C369D0
function P_BILL_INVOICE_COMP_MAP_BeforeShowRow(& $sender)
{
    $P_BILL_INVOICE_COMP_MAP_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_INVOICE_COMP_MAP; //Compatibility
//End P_BILL_INVOICE_COMP_MAP_BeforeShowRow

//Set Row Style @59-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
		$keyId = CCGetFromGet("P_BILL_INVOICE_COMP_MAP_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_BILL_INVOICE_COMP_MAP_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_ID->GetValue() == $keyId) {
		$P_BILL_INVOICE_COMP_MAP->ADLink->Visible = true;
		$P_BILL_INVOICE_COMP_MAP->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_BILL_INVOICE_COMP_MAP->ADLink->Visible = false;
		$P_BILL_INVOICE_COMP_MAP->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_BILL_INVOICE_COMP_MAP_BeforeShowRow @2-E75752DD
    return $P_BILL_INVOICE_COMP_MAP_BeforeShowRow;
}
//End Close P_BILL_INVOICE_COMP_MAP_BeforeShowRow

//Page_OnInitializeView @1-7A8DDC13
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bill_invoice_comp_map; //Compatibility
//End Page_OnInitializeView

//Custom Code @61-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-5D174FE8
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bill_invoice_comp_map; //Compatibility
//End Page_BeforeShow

//Custom Code @62-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_BILL_INVOICE_COMP_MAPSearch;
	global $P_BILL_INVOICE_COMP_MAP;
	global $P_BILL_INVOICE_COMP_MAP1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_BILL_INVOICE_COMP_MAPSearch->Visible = false;
		$P_BILL_INVOICE_COMP_MAP->Visible = false;
		$P_BILL_INVOICE_COMP_MAP1->Visible = true;
		$P_BILL_INVOICE_COMP_MAP1->ds->SQL = "";
	} else {
		$P_BILL_INVOICE_COMP_MAPSearch->Visible = true;
		$P_BILL_INVOICE_COMP_MAP->Visible = true;
		$P_BILL_INVOICE_COMP_MAP1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
