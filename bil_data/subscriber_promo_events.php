<?php
//BindEvents Method @1-F7FEC792
function BindEvents()
{
    global $SERVICEPROMOTION;
    global $FEATUREPROMOTION;
    $SERVICEPROMOTION->ServicePromo_Insert->CCSEvents["BeforeShow"] = "SERVICEPROMOTION_ServicePromo_Insert_BeforeShow";
    $SERVICEPROMOTION->CCSEvents["BeforeShowRow"] = "SERVICEPROMOTION_BeforeShowRow";
    $FEATUREPROMOTION->ServicePromo_Insert->CCSEvents["BeforeShow"] = "FEATUREPROMOTION_ServicePromo_Insert_BeforeShow";
    $FEATUREPROMOTION->CCSEvents["BeforeShowRow"] = "FEATUREPROMOTION_BeforeShowRow";
}
//End BindEvents Method

//SERVICEPROMOTION_ServicePromo_Insert_BeforeShow @7-81AD880F
function SERVICEPROMOTION_ServicePromo_Insert_BeforeShow(& $sender)
{
    $SERVICEPROMOTION_ServicePromo_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SERVICEPROMOTION; //Compatibility
//End SERVICEPROMOTION_ServicePromo_Insert_BeforeShow

//Custom Code @28-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close SERVICEPROMOTION_ServicePromo_Insert_BeforeShow @7-B02F670A
    return $SERVICEPROMOTION_ServicePromo_Insert_BeforeShow;
}
//End Close SERVICEPROMOTION_ServicePromo_Insert_BeforeShow

//SERVICEPROMOTION_BeforeShowRow @2-F4452E8C
function SERVICEPROMOTION_BeforeShowRow(& $sender)
{
    $SERVICEPROMOTION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SERVICEPROMOTION; //Compatibility
//End SERVICEPROMOTION_BeforeShowRow

	global $selected_id;
	global $add_flag;

	if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->SUBS_OT_PROMO_SERVICE_ID->GetValue();
        
   }
//Set Row Style @10-982C9472
    $styles = array("Row", "AltRow");
    $Style = $styles[0];
    if ($Component->DataSource->SUBS_OT_PROMO_SERVICE_ID->GetValue()== $selected_id) {
        $Style = $styles[1];
    }	
    
    if (count($styles)) {
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close SERVICEPROMOTION_BeforeShowRow @2-CE2F80A3
    return $SERVICEPROMOTION_BeforeShowRow;
}
//End Close SERVICEPROMOTION_BeforeShowRow

//FEATUREPROMOTION_ServicePromo_Insert_BeforeShow @115-25FC404E
function FEATUREPROMOTION_ServicePromo_Insert_BeforeShow(& $sender)
{
    $FEATUREPROMOTION_ServicePromo_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATUREPROMOTION; //Compatibility
//End FEATUREPROMOTION_ServicePromo_Insert_BeforeShow

//Custom Code @127-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close FEATUREPROMOTION_ServicePromo_Insert_BeforeShow @115-B1DF4CEC
    return $FEATUREPROMOTION_ServicePromo_Insert_BeforeShow;
}
//End Close FEATUREPROMOTION_ServicePromo_Insert_BeforeShow

//FEATUREPROMOTION_BeforeShowRow @110-827AC604
function FEATUREPROMOTION_BeforeShowRow(& $sender)
{
    $FEATUREPROMOTION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATUREPROMOTION; //Compatibility
//End FEATUREPROMOTION_BeforeShowRow

//Set Row Style @126-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close FEATUREPROMOTION_BeforeShowRow @110-81BB27C0
    return $FEATUREPROMOTION_BeforeShowRow;
}
//End Close FEATUREPROMOTION_BeforeShowRow
?>
