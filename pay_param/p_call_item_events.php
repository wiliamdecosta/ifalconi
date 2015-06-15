<?php
//BindEvents Method @1-1F1D3C14
function BindEvents()
{
    global $P_CALL_ITEMGrid;
    global $CCSEvents;
    $P_CALL_ITEMGrid->Link_Insert->CCSEvents["BeforeShow"] = "P_CALL_ITEMGrid_Link_Insert_BeforeShow";
    $P_CALL_ITEMGrid->CCSEvents["BeforeShowRow"] = "P_CALL_ITEMGrid_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_CALL_ITEMGrid_Link_Insert_BeforeShow @7-CD3A3636
function P_CALL_ITEMGrid_Link_Insert_BeforeShow(& $sender)
{
    $P_CALL_ITEMGrid_Link_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CALL_ITEMGrid; //Compatibility
//End P_CALL_ITEMGrid_Link_Insert_BeforeShow

//Custom Code @68-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_CALL_ITEMGrid->Link_Insert->Page = $FileName;
	$P_CALL_ITEMGrid->Link_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_CALL_ITEMGrid->Link_Insert->Parameters = CCRemoveParam($P_CALL_ITEMGrid->Link_Insert->Parameters, "P_CALL_ITEM_ID");
	$P_CALL_ITEMGrid->Link_Insert->Parameters = CCAddParam($P_CALL_ITEMGrid->Link_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_CALL_ITEMGrid_Link_Insert_BeforeShow @7-F4F56499
    return $P_CALL_ITEMGrid_Link_Insert_BeforeShow;
}
//End Close P_CALL_ITEMGrid_Link_Insert_BeforeShow

//P_CALL_ITEMGrid_BeforeShowRow @2-DDB7622F
function P_CALL_ITEMGrid_BeforeShowRow(& $sender)
{
    $P_CALL_ITEMGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CALL_ITEMGrid; //Compatibility
//End P_CALL_ITEMGrid_BeforeShowRow

//Set Row Style @69-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @70-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_CALL_ITEM_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_CALL_ITEMGrid->P_CALL_ITEM_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_CALL_ITEM_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_CALL_ITEMGrid->P_CALL_ITEM_ID->GetValue() == $keyId) {
		$P_CALL_ITEMGrid->ADLink->Visible = true;
		$P_CALL_ITEMGrid->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_CALL_ITEMGrid->ADLink->Visible = false;
		$P_CALL_ITEMGrid->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_CALL_ITEMGrid_BeforeShowRow @2-E5BED6FE
    return $P_CALL_ITEMGrid_BeforeShowRow;
}
//End Close P_CALL_ITEMGrid_BeforeShowRow

//Page_OnInitializeView @1-CBE589F5
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_call_item; //Compatibility
//End Page_OnInitializeView

//Custom Code @71-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-BB1257E2
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_call_item; //Compatibility
//End Page_BeforeShow

//Custom Code @72-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CALL_ITEMSearch;
	global $P_CALL_ITEMGrid;
	global $P_CALL_ITEMForm;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_CALL_ITEMSearch->Visible = false;
		$P_CALL_ITEMGrid->Visible = false;
		$P_CALL_ITEMForm->Visible = true;
		$P_CALL_ITEMForm->ds->SQL = "";
	} else {
		$P_CALL_ITEMSearch->Visible = true;
		$P_CALL_ITEMGrid->Visible = true;
		$P_CALL_ITEMForm->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
