<?php
//BindEvents Method @1-485E1D6C
function BindEvents()
{
    global $P_INVOICE_COMPONENT;
    global $CCSEvents;
    $P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_Insert->CCSEvents["BeforeShow"] = "P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow";
    $P_INVOICE_COMPONENT->CCSEvents["BeforeShowRow"] = "P_INVOICE_COMPONENT_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow @7-CAFAB307
function P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow(& $sender)
{
    $P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_INVOICE_COMPONENT; //Compatibility
//End P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow

//Custom Code @47-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_Insert->Page = $FileName;
	$P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_Insert->Parameters = CCRemoveParam($P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_Insert->Parameters, "P_INVOICE_COMPONENT_ID");
	$P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_Insert->Parameters = CCAddParam($P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow @7-351F9D12
    return $P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow;
}
//End Close P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow

//P_INVOICE_COMPONENT_BeforeShowRow @2-E6BEBB81
function P_INVOICE_COMPONENT_BeforeShowRow(& $sender)
{
    $P_INVOICE_COMPONENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_INVOICE_COMPONENT; //Compatibility
//End P_INVOICE_COMPONENT_BeforeShowRow

//Set Row Style @53-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @54-2A29BDB7
// -------------------------
    // Write your own code here.
		$keyId = CCGetFromGet("P_INVOICE_COMPONENT_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_INVOICE_COMPONENT_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_ID->GetValue() == $keyId) {
		$P_INVOICE_COMPONENT->ADLink->Visible = true;
		$P_INVOICE_COMPONENT->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_INVOICE_COMPONENT->ADLink->Visible = false;
		$P_INVOICE_COMPONENT->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_INVOICE_COMPONENT_BeforeShowRow @2-5E4919BC
    return $P_INVOICE_COMPONENT_BeforeShowRow;
}
//End Close P_INVOICE_COMPONENT_BeforeShowRow

//Page_OnInitializeView @1-722B113D
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_invoice_component; //Compatibility
//End Page_OnInitializeView

//Custom Code @55-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-0EEC9879
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_invoice_component; //Compatibility
//End Page_BeforeShow

//Custom Code @56-2A29BDB7
// -------------------------
    // Write your own code here.
		global $P_INVOICE_COMPONENTSearch;
	global $P_INVOICE_COMPONENT;
	global $P_INVOICE_COMPONENT;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_INVOICE_COMPONENTSearch->Visible = false;
		$P_INVOICE_COMPONENT->Visible = false;
		$P_INVOICE_COMPONENT1->Visible = true;
		$P_INVOICE_COMPONENT1->ds->SQL = "";
	} else {
		$P_INVOICE_COMPONENTSearch->Visible = true;
		$P_INVOICE_COMPONENT->Visible = true;
		$P_INVOICE_COMPONENT1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
