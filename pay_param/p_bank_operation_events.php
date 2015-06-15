<?php
//BindEvents Method @1-70C3BB1F
function BindEvents()
{
    global $P_BANK_OPERATIONGrid;
    global $CCSEvents;
    $P_BANK_OPERATIONGrid->Link_Insert->CCSEvents["BeforeShow"] = "P_BANK_OPERATIONGrid_Link_Insert_BeforeShow";
    $P_BANK_OPERATIONGrid->CCSEvents["BeforeShowRow"] = "P_BANK_OPERATIONGrid_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_BANK_OPERATIONGrid_Link_Insert_BeforeShow @7-640A5889
function P_BANK_OPERATIONGrid_Link_Insert_BeforeShow(& $sender)
{
    $P_BANK_OPERATIONGrid_Link_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BANK_OPERATIONGrid; //Compatibility
//End P_BANK_OPERATIONGrid_Link_Insert_BeforeShow

//Custom Code @68-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_BANK_OPERATIONGrid->Link_Insert->Page = $FileName;
	$P_BANK_OPERATIONGrid->Link_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_BANK_OPERATIONGrid->Link_Insert->Parameters = CCRemoveParam($P_BANK_OPERATIONGrid->Link_Insert->Parameters, "P_BANK_OPERATION_ID");
	$P_BANK_OPERATIONGrid->Link_Insert->Parameters = CCAddParam($P_BANK_OPERATIONGrid->Link_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_BANK_OPERATIONGrid_Link_Insert_BeforeShow @7-4CAE7818
    return $P_BANK_OPERATIONGrid_Link_Insert_BeforeShow;
}
//End Close P_BANK_OPERATIONGrid_Link_Insert_BeforeShow

//P_BANK_OPERATIONGrid_BeforeShowRow @2-A1DDF323
function P_BANK_OPERATIONGrid_BeforeShowRow(& $sender)
{
    $P_BANK_OPERATIONGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BANK_OPERATIONGrid; //Compatibility
//End P_BANK_OPERATIONGrid_BeforeShowRow

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
	$keyId = CCGetFromGet("P_BANK_OPERATION_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_BANK_OPERATIONGrid->P_BANK_OPERATION_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_BANK_OPERATION_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_BANK_OPERATIONGrid->P_BANK_OPERATION_ID->GetValue() == $keyId) {
		$P_BANK_OPERATIONGrid->ADLink->Visible = true;
		$P_BANK_OPERATIONGrid->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_BANK_OPERATIONGrid->ADLink->Visible = false;
		$P_BANK_OPERATIONGrid->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_BANK_OPERATIONGrid_BeforeShowRow @2-B6E87705
    return $P_BANK_OPERATIONGrid_BeforeShowRow;
}
//End Close P_BANK_OPERATIONGrid_BeforeShowRow

//Page_OnInitializeView @1-EB643888
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bank_operation; //Compatibility
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

//Page_BeforeShow @1-609BA113
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bank_operation; //Compatibility
//End Page_BeforeShow

//Custom Code @72-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_BANK_OPERATIONSearch;
	global $P_BANK_OPERATIONGrid;
	global $P_BANK_OPERATIONForm;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_BANK_OPERATIONSearch->Visible = false;
		$P_BANK_OPERATIONGrid->Visible = false;
		$P_BANK_OPERATIONForm->Visible = true;
		$P_BANK_OPERATIONForm->ds->SQL = "";
	} else {
		$P_BANK_OPERATIONSearch->Visible = true;
		$P_BANK_OPERATIONGrid->Visible = true;
		$P_BANK_OPERATIONForm->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
