<?php
//BindEvents Method @1-70BFE884
function BindEvents()
{
    global $P_REGION_LEVEL;
    global $p_region_level1;
    global $CCSEvents;
    $P_REGION_LEVEL->Navigator->CCSEvents["BeforeShow"] = "P_REGION_LEVEL_Navigator_BeforeShow";
    $P_REGION_LEVEL->P_APPL_Insert->CCSEvents["BeforeShow"] = "P_REGION_LEVEL_P_APPL_Insert_BeforeShow";
    $P_REGION_LEVEL->CCSEvents["BeforeShowRow"] = "P_REGION_LEVEL_BeforeShowRow";
    $p_region_level1->ds->CCSEvents["AfterExecuteInsert"] = "p_region_level1_ds_AfterExecuteInsert";
    $p_region_level1->ds->CCSEvents["BeforeExecuteInsert"] = "p_region_level1_ds_BeforeExecuteInsert";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_REGION_LEVEL_Navigator_BeforeShow @31-11B0C638
function P_REGION_LEVEL_Navigator_BeforeShow(& $sender)
{
    $P_REGION_LEVEL_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION_LEVEL; //Compatibility
//End P_REGION_LEVEL_Navigator_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_REGION_LEVEL_Navigator_BeforeShow @31-81BE4F40
    return $P_REGION_LEVEL_Navigator_BeforeShow;
}
//End Close P_REGION_LEVEL_Navigator_BeforeShow

//P_REGION_LEVEL_P_APPL_Insert_BeforeShow @51-68CD5411
function P_REGION_LEVEL_P_APPL_Insert_BeforeShow(& $sender)
{
    $P_REGION_LEVEL_P_APPL_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION_LEVEL; //Compatibility
//End P_REGION_LEVEL_P_APPL_Insert_BeforeShow

//Custom Code @59-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_REGION_LEVEL->P_REGION_LEVEL_Insert->Page = $FileName;
  	$P_REGION_LEVEL->P_REGION_LEVEL_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_REGION_LEVEL->P_REGION_LEVEL_Insert->Parameters = CCRemoveParam($P_REGION_LEVEL->P_REGION_LEVEL_Insert->Parameters, "P_REGION_LEVEL_ID");
  	$P_REGION_LEVEL->P_REGION_LEVEL_Insert->Parameters = CCAddParam($P_REGION_LEVEL->P_REGION_LEVEL_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_REGION_LEVEL_P_APPL_Insert_BeforeShow @51-377302FB
    return $P_REGION_LEVEL_P_APPL_Insert_BeforeShow;
}
//End Close P_REGION_LEVEL_P_APPL_Insert_BeforeShow

//P_REGION_LEVEL_BeforeShowRow @2-43B479DD
function P_REGION_LEVEL_BeforeShowRow(& $sender)
{
    $P_REGION_LEVEL_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION_LEVEL; //Compatibility
//End P_REGION_LEVEL_BeforeShowRow

//Custom Code @55-2A29BDB7
// -------------------------
    // Write your own code here.
	global $p_region_level1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_REGION_LEVEL_ID->GetValue();
        $p_region_level1->DataSource->Parameters["urlP_REGION_LEVEL_ID"] = $selected_id;
        $p_region_level1->DataSource->Prepare();
        $p_region_level1->EditMode = $p_region_level1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @56-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_REGION_LEVEL_ID->GetValue()== $selected_id) {
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

//Close P_REGION_LEVEL_BeforeShowRow @2-8A60AF2E
    return $P_REGION_LEVEL_BeforeShowRow;
}
//End Close P_REGION_LEVEL_BeforeShowRow

//p_region_level1_ds_AfterExecuteInsert @32-17F65E7C
function p_region_level1_ds_AfterExecuteInsert(& $sender)
{
    $p_region_level1_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_region_level1; //Compatibility
//End p_region_level1_ds_AfterExecuteInsert

//Custom Code @64-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close p_region_level1_ds_AfterExecuteInsert @32-6F88F39A
    return $p_region_level1_ds_AfterExecuteInsert;
}
//End Close p_region_level1_ds_AfterExecuteInsert

//p_region_level1_ds_BeforeExecuteInsert @32-7DED90A2
function p_region_level1_ds_BeforeExecuteInsert(& $sender)
{
    $p_region_level1_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_region_level1; //Compatibility
//End p_region_level1_ds_BeforeExecuteInsert

//Custom Code @65-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close p_region_level1_ds_BeforeExecuteInsert @32-9F8551F8
    return $p_region_level1_ds_BeforeExecuteInsert;
}
//End Close p_region_level1_ds_BeforeExecuteInsert

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_start();
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_start();
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_end_clean();
//DEL  	//exit;
//DEL  	if(is_array($p_region_level1->DataSource->Provider->Error)) {
//DEL  		$error_msg = $p_region_level1->DataSource->Provider->Error['message'];
//DEL  		$p_region_level1->Errors->addError($error_msg);
//DEL  	};
//DEL  
//DEL  // -------------------------

//Page_OnInitializeView @1-57047B72
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_region_level; //Compatibility
//End Page_OnInitializeView

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_REGION_LEVEL_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
	
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

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_REGION_LEVELSearch;
	global $P_REGION_LEVEL;
	global $p_region_level1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_REGION_LEVELSearch->Visible = false;
		$P_REGION_LEVEL->Visible = false;
		$p_region_level1->Visible = true;
		$p_region_level1->ds->SQL = "";
	} else {
		$P_REGION_LEVELSearch->Visible = true;
		$P_REGION_LEVEL->Visible = true;
		$p_region_level1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
