<?php
//BindEvents Method @1-71736E17
function BindEvents()
{
    global $P_BUSINESS_AREA;
    global $P_BUSINESS_AREA1;
    global $CCSEvents;
    $P_BUSINESS_AREA->Navigator->CCSEvents["BeforeShow"] = "P_BUSINESS_AREA_Navigator_BeforeShow";
    $P_BUSINESS_AREA->P_BUSINESS_AREA_Insert->CCSEvents["BeforeShow"] = "P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow";
    $P_BUSINESS_AREA->CCSEvents["BeforeShowRow"] = "P_BUSINESS_AREA_BeforeShowRow";
    $P_BUSINESS_AREA1->ds->CCSEvents["BeforeExecuteInsert"] = "P_BUSINESS_AREA1_ds_BeforeExecuteInsert";
    $P_BUSINESS_AREA1->ds->CCSEvents["AfterExecuteInsert"] = "P_BUSINESS_AREA1_ds_AfterExecuteInsert";
    $P_BUSINESS_AREA1->ds->CCSEvents["BeforeExecuteUpdate"] = "P_BUSINESS_AREA1_ds_BeforeExecuteUpdate";
    $P_BUSINESS_AREA1->ds->CCSEvents["AfterExecuteUpdate"] = "P_BUSINESS_AREA1_ds_AfterExecuteUpdate";
    $P_BUSINESS_AREA1->ds->CCSEvents["BeforeExecuteDelete"] = "P_BUSINESS_AREA1_ds_BeforeExecuteDelete";
    $P_BUSINESS_AREA1->ds->CCSEvents["AfterExecuteDelete"] = "P_BUSINESS_AREA1_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_BUSINESS_AREA_Navigator_BeforeShow @26-D46211C2
function P_BUSINESS_AREA_Navigator_BeforeShow(& $sender)
{
    $P_BUSINESS_AREA_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_AREA; //Compatibility
//End P_BUSINESS_AREA_Navigator_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_BUSINESS_AREA_Navigator_BeforeShow @26-91DF29D7
    return $P_BUSINESS_AREA_Navigator_BeforeShow;
}
//End Close P_BUSINESS_AREA_Navigator_BeforeShow

//P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow @50-99E75EA5
function P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow(& $sender)
{
    $P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_AREA; //Compatibility
//End P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow

//Custom Code @51-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_BUSINESS_AREA->P_BUSINESS_AREA_Insert->Page = $FileName;
  	$P_BUSINESS_AREA->P_BUSINESS_AREA_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_BUSINESS_AREA->P_BUSINESS_AREA_Insert->Parameters = CCRemoveParam($P_BUSINESS_AREA->P_BUSINESS_AREA_Insert->Parameters, "P_BUSINESS_AREA_ID");
  	$P_BUSINESS_AREA->P_BUSINESS_AREA_Insert->Parameters = CCAddParam($P_BUSINESS_AREA->P_BUSINESS_AREA_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow @50-14A3E971
    return $P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow;
}
//End Close P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow

//P_BUSINESS_AREA_BeforeShowRow @2-1129FB69
function P_BUSINESS_AREA_BeforeShowRow(& $sender)
{
    $P_BUSINESS_AREA_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_AREA; //Compatibility
//End P_BUSINESS_AREA_BeforeShowRow
	
	global $P_BUSINESS_AREA1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_BUSINESS_AREA_ID->GetValue();
        $P_BUSINESS_AREA1->DataSource->Parameters["urlP_BUSINESS_AREA_ID"] = $selected_id;
        $P_BUSINESS_AREA1->DataSource->Prepare();
        $P_BUSINESS_AREA1->EditMode = $P_BUSINESS_AREA1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

//Set Row Style @55-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_BUSINESS_AREA_ID->GetValue()== $selected_id) {
    	$img_radio= "<img border='0' src='../images/radio_s.gif'>";
        $Style = $styles[1];
    }	
    
    if (count($styles)) {
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }

	$Component->DLink->SetValue($img_radio);  // Bdr
//End Set Row Style

//Custom Code @56-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close P_BUSINESS_AREA_BeforeShowRow @2-65865B9C
    return $P_BUSINESS_AREA_BeforeShowRow;
}
//End Close P_BUSINESS_AREA_BeforeShowRow

//P_BUSINESS_AREA1_ds_BeforeExecuteInsert @27-D4522ADB
function P_BUSINESS_AREA1_ds_BeforeExecuteInsert(& $sender)
{
    $P_BUSINESS_AREA1_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_AREA1; //Compatibility
//End P_BUSINESS_AREA1_ds_BeforeExecuteInsert

//Custom Code @97-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close P_BUSINESS_AREA1_ds_BeforeExecuteInsert @27-3776CF06
    return $P_BUSINESS_AREA1_ds_BeforeExecuteInsert;
}
//End Close P_BUSINESS_AREA1_ds_BeforeExecuteInsert

//P_BUSINESS_AREA1_ds_AfterExecuteInsert @27-ACA8BD56
function P_BUSINESS_AREA1_ds_AfterExecuteInsert(& $sender)
{
    $P_BUSINESS_AREA1_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_AREA1; //Compatibility
//End P_BUSINESS_AREA1_ds_AfterExecuteInsert

//Custom Code @98-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($P_BUSINESS_AREA1->DataSource->Provider->Error)) {
		$error_msg = $P_BUSINESS_AREA1->DataSource->Provider->Error['message'];
		$P_BUSINESS_AREA1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close P_BUSINESS_AREA1_ds_AfterExecuteInsert @27-FBC95837
    return $P_BUSINESS_AREA1_ds_AfterExecuteInsert;
}
//End Close P_BUSINESS_AREA1_ds_AfterExecuteInsert

//P_BUSINESS_AREA1_ds_BeforeExecuteUpdate @27-BEAAAC58
function P_BUSINESS_AREA1_ds_BeforeExecuteUpdate(& $sender)
{
    $P_BUSINESS_AREA1_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_AREA1; //Compatibility
//End P_BUSINESS_AREA1_ds_BeforeExecuteUpdate

//Custom Code @99-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close P_BUSINESS_AREA1_ds_BeforeExecuteUpdate @27-F85F0E89
    return $P_BUSINESS_AREA1_ds_BeforeExecuteUpdate;
}
//End Close P_BUSINESS_AREA1_ds_BeforeExecuteUpdate

//P_BUSINESS_AREA1_ds_AfterExecuteUpdate @27-284519D7
function P_BUSINESS_AREA1_ds_AfterExecuteUpdate(& $sender)
{
    $P_BUSINESS_AREA1_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_AREA1; //Compatibility
//End P_BUSINESS_AREA1_ds_AfterExecuteUpdate

//Custom Code @100-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($P_BUSINESS_AREA1->DataSource->Provider->Error)) {
		$error_msg = $P_BUSINESS_AREA1->DataSource->Provider->Error['message'];
		$P_BUSINESS_AREA1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close P_BUSINESS_AREA1_ds_AfterExecuteUpdate @27-34E099B8
    return $P_BUSINESS_AREA1_ds_AfterExecuteUpdate;
}
//End Close P_BUSINESS_AREA1_ds_AfterExecuteUpdate

//P_BUSINESS_AREA1_ds_BeforeExecuteDelete @27-AB141082
function P_BUSINESS_AREA1_ds_BeforeExecuteDelete(& $sender)
{
    $P_BUSINESS_AREA1_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_AREA1; //Compatibility
//End P_BUSINESS_AREA1_ds_BeforeExecuteDelete

//Custom Code @101-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close P_BUSINESS_AREA1_ds_BeforeExecuteDelete @27-647BA8F8
    return $P_BUSINESS_AREA1_ds_BeforeExecuteDelete;
}
//End Close P_BUSINESS_AREA1_ds_BeforeExecuteDelete

//P_BUSINESS_AREA1_ds_AfterExecuteDelete @27-399094AD
function P_BUSINESS_AREA1_ds_AfterExecuteDelete(& $sender)
{
    $P_BUSINESS_AREA1_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_AREA1; //Compatibility
//End P_BUSINESS_AREA1_ds_AfterExecuteDelete

//Custom Code @102-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($P_BUSINESS_AREA1->DataSource->Provider->Error)) {
		$error_msg = $P_BUSINESS_AREA1->DataSource->Provider->Error['message'];
		$P_BUSINESS_AREA1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close P_BUSINESS_AREA1_ds_AfterExecuteDelete @27-A8C43FC9
    return $P_BUSINESS_AREA1_ds_AfterExecuteDelete;
}
//End Close P_BUSINESS_AREA1_ds_AfterExecuteDelete

//Page_OnInitializeView @1-B1847BBD
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_business_area; //Compatibility
//End Page_OnInitializeView

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_BUSINESS_AREA_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-F0A50AE7
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_business_area; //Compatibility
//End Page_BeforeShow

//Custom Code @59-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_BUSINESS_AREASearch;
	global $P_BUSINESS_AREA;
	global $P_BUSINESS_AREA1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_BUSINESS_AREASearch->Visible = false;
		$P_BUSINESS_AREA->Visible = false;
		$P_BUSINESS_AREA1->Visible = true;
		$P_BUSINESS_AREA1->ds->SQL = "";
	} else {
		$P_BUSINESS_AREASearch->Visible = true;
		$P_BUSINESS_AREA->Visible = true;
		$P_BUSINESS_AREA1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
