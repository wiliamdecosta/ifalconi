<?php
//BindEvents Method @1-BCA754C5
function BindEvents()
{
    global $P_BILL_CYCLE;
    global $CCSEvents;
    $P_BILL_CYCLE->P_BILL_CYCLE_Insert->CCSEvents["BeforeShow"] = "P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow";
    $P_BILL_CYCLE->CCSEvents["BeforeShowRow"] = "P_BILL_CYCLE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow @7-94A63F5C
function P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow(& $sender)
{
    $P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_CYCLE; //Compatibility
//End P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow

//Custom Code @68-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_BILL_CYCLE->P_BILL_CYCLE_Insert->Page = $FileName;
	$P_BILL_CYCLE->P_BILL_CYCLE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_BILL_CYCLE->P_BILL_CYCLE_Insert->Parameters = CCRemoveParam($P_BILL_CYCLE->P_BILL_CYCLE_Insert->Parameters, "P_BILL_CYCLE_ID");
	$P_BILL_CYCLE->P_BILL_CYCLE_Insert->Parameters = CCAddParam($P_BILL_CYCLE->P_BILL_CYCLE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow @7-37E66161
    return $P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow;
}
//End Close P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow

//P_BILL_CYCLE_BeforeShowRow @2-C215AF65
function P_BILL_CYCLE_BeforeShowRow(& $sender)
{
    $P_BILL_CYCLE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_CYCLE; //Compatibility
//End P_BILL_CYCLE_BeforeShowRow
	global $p_bill_cycle1;
	global $selected_id;
    global $add_flag;
	if ($selected_id=="" && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_BILL_CYCLE_ID->GetValue();
        $p_bill_cycle1->DataSource->Parameters["urlP_BILL_CYCLE_ID"] = $selected_id;
        $p_bill_cycle1->DataSource->Prepare();
        $p_bill_cycle1->EditMode = $p_bill_cycle1->DataSource->AllParametersSet;
   	}
    $img_radio= "<img border='0' src='../images/radio.gif'>";
//Set Row Style @69-E8A92450
    $styles = array("Row", "AltRow");
	$Style = $styles[0];      
    if ($Component->DataSource->P_BILL_CYCLE_ID->GetValue()== $selected_id) {
      	$img_radio= "<img border='0' src='../images/radio_s.gif'>";
          $Style = $styles[1];
    }
    if (count($styles)) {
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
	$Component->DLink->SetValue($img_radio); 
//End Set Row Style

//Custom Code @70-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close P_BILL_CYCLE_BeforeShowRow @2-5C53B85A
    return $P_BILL_CYCLE_BeforeShowRow;
}
//End Close P_BILL_CYCLE_BeforeShowRow

//Page_OnInitializeView @1-38839223
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bill_cycle; //Compatibility
//End Page_OnInitializeView

//Custom Code @71-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = "";
    $selected_id=CCGetFromGet("P_BILL_CYCLE_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-BB20E03A
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bill_cycle; //Compatibility
//End Page_BeforeShow

//Custom Code @72-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_BILL_CYCLESearch;
	global $P_BILL_CYCLE;
	global $P_BILL_CYCLE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_BILL_CYCLESearch->Visible = false;
		$P_BILL_CYCLE->Visible = false;
		$P_BILL_CYCLE1->Visible = true;
		$P_BILL_CYCLE1->ds->SQL = "";
	} else {
		$P_BILL_CYCLESearch->Visible = true;
		$P_BILL_CYCLE->Visible = true;
		$P_BILL_CYCLE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
