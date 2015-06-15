<?php
//BindEvents Method @1-EC138249
function BindEvents()
{
    global $SERVICETYPE_GRID;
    global $CCSEvents;
    $SERVICETYPE_GRID->Navigator->CCSEvents["BeforeShow"] = "SERVICETYPE_GRID_Navigator_BeforeShow";
    $SERVICETYPE_GRID->ST_NEW->CCSEvents["BeforeShow"] = "SERVICETYPE_GRID_ST_NEW_BeforeShow";
    $SERVICETYPE_GRID->CCSEvents["BeforeShowRow"] = "SERVICETYPE_GRID_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//SERVICETYPE_GRID_Navigator_BeforeShow @31-C204058C
function SERVICETYPE_GRID_Navigator_BeforeShow(& $sender)
{
    $SERVICETYPE_GRID_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SERVICETYPE_GRID; //Compatibility
//End SERVICETYPE_GRID_Navigator_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close SERVICETYPE_GRID_Navigator_BeforeShow @31-8DD70846
    return $SERVICETYPE_GRID_Navigator_BeforeShow;
}
//End Close SERVICETYPE_GRID_Navigator_BeforeShow

//SERVICETYPE_GRID_ST_NEW_BeforeShow @51-19395AB4
function SERVICETYPE_GRID_ST_NEW_BeforeShow(& $sender)
{
    $SERVICETYPE_GRID_ST_NEW_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SERVICETYPE_GRID; //Compatibility
//End SERVICETYPE_GRID_ST_NEW_BeforeShow

//Custom Code @59-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$SERVICETYPE_GRID->ST_NEW->Page = $FileName;
  	$SERVICETYPE_GRID->ST_NEW->Parameters = CCGetQueryString("QueryString", "");
  	$SERVICETYPE_GRID->ST_NEW->Parameters = CCRemoveParam($SERVICETYPE_GRID->ST_NEW->Parameters, "P_SERVICE_TYPE_ID");
  	$SERVICETYPE_GRID->ST_NEW->Parameters = CCAddParam($SERVICETYPE_GRID->ST_NEW->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close SERVICETYPE_GRID_ST_NEW_BeforeShow @51-4B4F3B5A
    return $SERVICETYPE_GRID_ST_NEW_BeforeShow;
}
//End Close SERVICETYPE_GRID_ST_NEW_BeforeShow

//SERVICETYPE_GRID_BeforeShowRow @2-8745BF0A
function SERVICETYPE_GRID_BeforeShowRow(& $sender)
{
    $SERVICETYPE_GRID_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SERVICETYPE_GRID; //Compatibility
//End SERVICETYPE_GRID_BeforeShowRow

//Custom Code @55-2A29BDB7
// -------------------------
    // Write your own code here.
	global $SERVICETYPE_GRID;
	global $P_SERVICE_TYPE_ID2;
    global $selected_id;
    global $add_flag;


//	$id = $Component->DataSource->P_SERVICE_TYPE_ID->GetValue();
//	$SERVICETYPE_GRID->P_SERVICE_TYPE_ID2->SetValue($id);

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_SERVICE_TYPE_ID->GetValue();
		//$SERVICETYPE_RECORD->DataSource->Parameters["urlP_SERVICE_TYPE_ID"] = $selected_id;
		//   
   }
	$SERVICETYPE_GRID->P_SERVICE_TYPE_ID2->SetValue($selected_id);
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @56-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_SERVICE_TYPE_ID->GetValue()== $selected_id) {
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

//Close SERVICETYPE_GRID_BeforeShowRow @2-F0DE13F3
    return $SERVICETYPE_GRID_BeforeShowRow;
}
//End Close SERVICETYPE_GRID_BeforeShowRow

//Page_OnInitializeView @1-5C0D5CF0
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_service_typeRO; //Compatibility
//End Page_OnInitializeView

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_SERVICE_TYPE_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
		
	
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-D7F2C56B
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_service_typeRO; //Compatibility
//End Page_BeforeShow

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FT_SEARCH;
	global $SERVICETYPE_GRID;
	global $SERVICETYPE_RECORD;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$FT_SEARCH->Visible = false;
		$SERVICETYPE_GRID->Visible = false;
		$SERVICETYPE_RECORD->Visible = true;
		$SERVICETYPE_RECORD->ds->SQL = "";
	} else {
		$FT_SEARCH->Visible = true;
		$SERVICETYPE_GRID->Visible = true;
		$SERVICETYPE_RECORD->Visible = true;
	}

// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
