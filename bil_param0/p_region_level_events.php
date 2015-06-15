<?php
//BindEvents Method @1-1F90149E
function BindEvents()
{
    global $P_REGION_LEVEL;
    global $CCSEvents;
    $P_REGION_LEVEL->P_REGION_LEVEL_Insert->CCSEvents["BeforeShow"] = "P_REGION_LEVEL_P_REGION_LEVEL_Insert_BeforeShow";
    $P_REGION_LEVEL->CCSEvents["BeforeShowRow"] = "P_REGION_LEVEL_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_REGION_LEVEL_P_REGION_LEVEL_Insert_BeforeShow @7-88668D0C
function P_REGION_LEVEL_P_REGION_LEVEL_Insert_BeforeShow(& $sender)
{
    $P_REGION_LEVEL_P_REGION_LEVEL_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION_LEVEL; //Compatibility
//End P_REGION_LEVEL_P_REGION_LEVEL_Insert_BeforeShow

//Custom Code @47-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_REGION_LEVEL->P_REGION_LEVEL_Insert->Page = $FileName;
	$P_REGION_LEVEL->P_REGION_LEVEL_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_REGION_LEVEL->P_REGION_LEVEL_Insert->Parameters = CCRemoveParam($P_REGION_LEVEL->P_REGION_LEVEL_Insert->Parameters, "P_REGION_LEVEL_ID");
	$P_REGION_LEVEL->P_REGION_LEVEL_Insert->Parameters = CCAddParam($P_REGION_LEVEL->P_REGION_LEVEL_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_REGION_LEVEL_P_REGION_LEVEL_Insert_BeforeShow @7-5211037A
    return $P_REGION_LEVEL_P_REGION_LEVEL_Insert_BeforeShow;
}
//End Close P_REGION_LEVEL_P_REGION_LEVEL_Insert_BeforeShow

//P_REGION_LEVEL_BeforeShowRow @2-43B479DD
function P_REGION_LEVEL_BeforeShowRow(& $sender)
{
    $P_REGION_LEVEL_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION_LEVEL; //Compatibility
//End P_REGION_LEVEL_BeforeShowRow

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
	$keyId = CCGetFromGet("P_REGION_LEVEL_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_REGION_LEVEL->P_REGION_LEVEL_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_REGION_LEVEL_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_REGION_LEVEL->P_REGION_LEVEL_ID->GetValue() == $keyId) {
		$P_REGION_LEVEL->ADLink->Visible = true;
		$P_REGION_LEVEL->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_REGION_LEVEL->ADLink->Visible = false;
		$P_REGION_LEVEL->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_REGION_LEVEL_BeforeShowRow @2-8A60AF2E
    return $P_REGION_LEVEL_BeforeShowRow;
}
//End Close P_REGION_LEVEL_BeforeShowRow

//Page_OnInitializeView @1-57047B72
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_region_level; //Compatibility
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

//Page_BeforeShow @1-720F41D9
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_region_level; //Compatibility
//End Page_BeforeShow

//Custom Code @56-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_REGION_LEVELSearch;
	global $P_REGION_LEVEL;
	global $P_REGION_LEVEL1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_REGION_LEVELSearch->Visible = false;
		$P_REGION_LEVEL->Visible = false;
		$P_REGION_LEVEL1->Visible = true;
		$P_REGION_LEVEL1->ds->SQL = "";
	} else {
		$P_REGION_LEVELSearch->Visible = true;
		$P_REGION_LEVEL->Visible = true;
		$P_REGION_LEVEL1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
