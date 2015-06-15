<?php
//BindEvents Method @1-6607173C
function BindEvents()
{
    global $V_SUBSCRIBER;
    global $CCSEvents;
    $V_SUBSCRIBER->SUBSCRIBER_Insert->CCSEvents["BeforeShow"] = "V_SUBSCRIBER_SUBSCRIBER_Insert_BeforeShow";
    $V_SUBSCRIBER->CCSEvents["BeforeShowRow"] = "V_SUBSCRIBER_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//V_SUBSCRIBER_SUBSCRIBER_Insert_BeforeShow @7-338F6379
function V_SUBSCRIBER_SUBSCRIBER_Insert_BeforeShow(& $sender)
{
    $V_SUBSCRIBER_SUBSCRIBER_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER; //Compatibility
//End V_SUBSCRIBER_SUBSCRIBER_Insert_BeforeShow

//Custom Code @28-2A29BDB7
// -------------------------
    // Write your own code here.

// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_SUBSCRIBER_Insert_BeforeShow @7-4B31628E
    return $V_SUBSCRIBER_SUBSCRIBER_Insert_BeforeShow;
}
//End Close V_SUBSCRIBER_SUBSCRIBER_Insert_BeforeShow

//V_SUBSCRIBER_BeforeShowRow @2-6B4E0961
function V_SUBSCRIBER_BeforeShowRow(& $sender)
{
    $V_SUBSCRIBER_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER; //Compatibility
//End V_SUBSCRIBER_BeforeShowRow

//Custom Code @25-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
	global $V_SUBSCRIBER;
	global $add_flag;
	global $ID;
	global $SCID;
	global $STID;


	if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->SUBSCRIBER_ID->GetValue();
        $SCID = $Component->DataSource->P_SERVICE_TYPE_ID->GetValue();
		$STID = $Component->DataSource->P_TARIFF_SCENARIO_ID->GetValue();

		
   }
   	$V_SUBSCRIBER->ID->SetValue($selected_id);
	$V_SUBSCRIBER->SCID->SetValue($SCID); 
	$V_SUBSCRIBER->STID->SetValue($STID);
	$img_radio= "<img border='0' src='../images/radio.gif'>";

// -------------------------
//End Custom Code



//Set Row Style @24-E8A92450
    $styles = array("Row", "AltRow");
    $Style = $styles[0];
    if ($Component->DataSource->SUBSCRIBER_ID->GetValue()== $selected_id) {
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

//Close V_SUBSCRIBER_BeforeShowRow @2-EE8C3E66
    return $V_SUBSCRIBER_BeforeShowRow;
}
//End Close V_SUBSCRIBER_BeforeShowRow

//Page_OnInitializeView @1-0C46B197
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $subscriber; //Compatibility
//End Page_OnInitializeView

//Custom Code @35-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
	global $SCID;
	global $STID;

    $selected_id = -1;
	$SCID = -1;
    $selected_id=CCGetFromGet("SUBSCRIBER_ID", $selected_id);
	$SCID=CCGetFromGet("P_SERVICE_TYPE_ID", $SCID);
	$STID=CCGetFromGet("P_TARIFF_SCENARIO_ID", $STID);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
