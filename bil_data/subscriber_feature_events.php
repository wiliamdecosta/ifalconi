<?php
//BindEvents Method @1-3E0AA5FD
function BindEvents()
{
    global $BUNDLEDFEATURE;
    global $FEATURE;
    global $CCSEvents;
    $BUNDLEDFEATURE->ServicePromo_Insert->CCSEvents["BeforeShow"] = "BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow";
    $BUNDLEDFEATURE->CCSEvents["BeforeShowRow"] = "BUNDLEDFEATURE_BeforeShowRow";
    $FEATURE->ServicePromo_Insert->CCSEvents["BeforeShow"] = "FEATURE_ServicePromo_Insert_BeforeShow";
    $FEATURE->CCSEvents["BeforeShowRow"] = "FEATURE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow @7-4A8837D6
function BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow(& $sender)
{
    $BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BUNDLEDFEATURE; //Compatibility
//End BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow

//Custom Code @28-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow @7-E0411936
    return $BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow;
}
//End Close BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow

//BUNDLEDFEATURE_BeforeShowRow @2-43269FA0
function BUNDLEDFEATURE_BeforeShowRow(& $sender)
{
    $BUNDLEDFEATURE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BUNDLEDFEATURE; //Compatibility
//End BUNDLEDFEATURE_BeforeShowRow

//Custom Code @137-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
	global $add_flag;

	if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->SUBSCRIBER_BUNDLED_FEATURE_ID->GetValue();
        
   }

// -------------------------
//End Custom Code

//Set Row Style @10-982C9472


    $styles = array("Row", "AltRow");
    $Style = $styles[0];
    if ($Component->DataSource->SUBSCRIBER_BUNDLED_FEATURE_ID->GetValue()== $selected_id) {
		$img_radio= "<img border='0' src='../images/radio_s.gif'>";
        $Style = $styles[1];
    }	
    
    if (count($styles)) {
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close BUNDLEDFEATURE_BeforeShowRow @2-70AED49A
    return $BUNDLEDFEATURE_BeforeShowRow;
}
//End Close BUNDLEDFEATURE_BeforeShowRow

//FEATURE_ServicePromo_Insert_BeforeShow @115-1F569162
function FEATURE_ServicePromo_Insert_BeforeShow(& $sender)
{
    $FEATURE_ServicePromo_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATURE; //Compatibility
//End FEATURE_ServicePromo_Insert_BeforeShow

//Custom Code @116-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close FEATURE_ServicePromo_Insert_BeforeShow @115-A445524A
    return $FEATURE_ServicePromo_Insert_BeforeShow;
}
//End Close FEATURE_ServicePromo_Insert_BeforeShow

//FEATURE_BeforeShowRow @110-0C745D9E
function FEATURE_BeforeShowRow(& $sender)
{
    $FEATURE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATURE; //Compatibility
//End FEATURE_BeforeShowRow

//Set Row Style @119-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close FEATURE_BeforeShowRow @110-8A9CCABE
    return $FEATURE_BeforeShowRow;
}
//End Close FEATURE_BeforeShowRow

//Page_OnInitializeView @1-38572FD3
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $subscriber_feature; //Compatibility
//End Page_OnInitializeView

//Custom Code @138-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("SUBSCRIBER_BUNDLED_FEATURE_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView
?>
