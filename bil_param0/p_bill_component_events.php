<?php
//BindEvents Method @1-4D7D88C6
function BindEvents()
{
    global $P_BILL_COMPONENT;
    global $CCSEvents;
    $P_BILL_COMPONENT->P_BILL_COMPONENT_Insert->CCSEvents["BeforeShow"] = "P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow";
    $P_BILL_COMPONENT->CCSEvents["BeforeShowRow"] = "P_BILL_COMPONENT_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow @7-176829E9
function P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow(& $sender)
{
    $P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_COMPONENT; //Compatibility
//End P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_BILL_COMPONENT->P_BILL_COMPONENT_Insert->Page = $FileName;
	$P_BILL_COMPONENT->P_BILL_COMPONENT_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_BILL_COMPONENT->P_BILL_COMPONENT_Insert->Parameters = CCRemoveParam($P_BILL_COMPONENT->P_BILL_COMPONENT_Insert->Parameters, "P_BILL_COMPONENT_ID");
	$P_BILL_COMPONENT->P_BILL_COMPONENT_Insert->Parameters = CCAddParam($P_BILL_COMPONENT->P_BILL_COMPONENT_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow @7-BE5D11EC
    return $P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow;
}
//End Close P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow

//P_BILL_COMPONENT_BeforeShowRow @2-F571BC76
function P_BILL_COMPONENT_BeforeShowRow(& $sender)
{
    $P_BILL_COMPONENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_COMPONENT; //Compatibility
//End P_BILL_COMPONENT_BeforeShowRow

//Set Row Style @97-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @98-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_BILL_COMPONENT_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_BILL_COMPONENT->P_BILL_COMPONENT_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_BILL_COMPONENT_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_BILL_COMPONENT->P_BILL_COMPONENT_ID->GetValue() == $keyId) {
		$P_BILL_COMPONENT->ADLink->Visible = true;
		$P_BILL_COMPONENT->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_BILL_COMPONENT->ADLink->Visible = false;
		$P_BILL_COMPONENT->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_BILL_COMPONENT_BeforeShowRow @2-D705C1E7
    return $P_BILL_COMPONENT_BeforeShowRow;
}
//End Close P_BILL_COMPONENT_BeforeShowRow

//Page_OnInitializeView @1-BFDD8181
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bill_component; //Compatibility
//End Page_OnInitializeView

//Custom Code @99-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-3422181A
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bill_component; //Compatibility
//End Page_BeforeShow

//Custom Code @100-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_BILL_COMPONENTSearch;
	global $P_BILL_COMPONENT;
	global $P_BILL_COMPONENT1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_BILL_COMPONENTSearch->Visible = false;
		$P_BILL_COMPONENT->Visible = false;
		$P_BILL_COMPONENT1->Visible = true;
		$P_BILL_COMPONENT1->ds->SQL = "";
	} else {
		$P_BILL_COMPONENTSearch->Visible = true;
		$P_BILL_COMPONENT->Visible = true;
		$P_BILL_COMPONENT1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
