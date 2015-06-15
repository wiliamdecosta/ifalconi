<?php
//BindEvents Method @1-3C174A39
function BindEvents()
{
    global $SUBSCRIBERINFO;
    global $CCSEvents;
    $SUBSCRIBERINFO->ServicePromo_Insert->CCSEvents["BeforeShow"] = "SUBSCRIBERINFO_ServicePromo_Insert_BeforeShow";
    $SUBSCRIBERINFO->CCSEvents["BeforeShowRow"] = "SUBSCRIBERINFO_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//SUBSCRIBERINFO_ServicePromo_Insert_BeforeShow @7-E884944F
function SUBSCRIBERINFO_ServicePromo_Insert_BeforeShow(& $sender)
{
    $SUBSCRIBERINFO_ServicePromo_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SUBSCRIBERINFO; //Compatibility
//End SUBSCRIBERINFO_ServicePromo_Insert_BeforeShow

//Custom Code @28-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close SUBSCRIBERINFO_ServicePromo_Insert_BeforeShow @7-F8B134E7
    return $SUBSCRIBERINFO_ServicePromo_Insert_BeforeShow;
}
//End Close SUBSCRIBERINFO_ServicePromo_Insert_BeforeShow

//SUBSCRIBERINFO_BeforeShowRow @2-1F39E93F
function SUBSCRIBERINFO_BeforeShowRow(& $sender)
{
    $SUBSCRIBERINFO_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SUBSCRIBERINFO; //Compatibility
//End SUBSCRIBERINFO_BeforeShowRow

//Custom Code @165-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
	global $add_flag;

	if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->SUBSCRIBER_INFO_ID->GetValue();
        
   }
	$img_radio= "<img border='0' src='../images/radio.gif'>";

// -------------------------
//End Custom Code

//Set Row Style @173-E8A92450
    $styles = array("Row", "AltRow");
    $Style = $styles[0];
    if ($Component->DataSource->SUBSCRIBER_INFO_ID->GetValue()== $selected_id) {
        $Style = $styles[1];
    }	
    
    if (count($styles)) {
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close SUBSCRIBERINFO_BeforeShowRow @2-52DBD830
    return $SUBSCRIBERINFO_BeforeShowRow;
}
//End Close SUBSCRIBERINFO_BeforeShowRow

//Page_OnInitializeView @1-940D5FFE
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $subscriber_info; //Compatibility
//End Page_OnInitializeView

//Custom Code @166-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("SUBSCRIBER_INFO_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView
?>
