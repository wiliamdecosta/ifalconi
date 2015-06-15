<?php
//BindEvents Method @1-EE573AC0
function BindEvents()
{
    global $V_SUBS_OT_PROMO_SERVICE;
    global $V_SUBS_OT_PROMO_SERVICE1;
    $V_SUBS_OT_PROMO_SERVICE->ServicePromo_Insert->CCSEvents["BeforeShow"] = "V_SUBS_OT_PROMO_SERVICE_ServicePromo_Insert_BeforeShow";
    $V_SUBS_OT_PROMO_SERVICE->CCSEvents["BeforeShowRow"] = "V_SUBS_OT_PROMO_SERVICE_BeforeShowRow";
    $V_SUBS_OT_PROMO_SERVICE1->ServicePromo_Insert->CCSEvents["BeforeShow"] = "V_SUBS_OT_PROMO_SERVICE1_ServicePromo_Insert_BeforeShow";
    $V_SUBS_OT_PROMO_SERVICE1->CCSEvents["BeforeShowRow"] = "V_SUBS_OT_PROMO_SERVICE1_BeforeShowRow";
}
//End BindEvents Method

//V_SUBS_OT_PROMO_SERVICE_ServicePromo_Insert_BeforeShow @7-24575CF2
function V_SUBS_OT_PROMO_SERVICE_ServicePromo_Insert_BeforeShow(& $sender)
{
    $V_SUBS_OT_PROMO_SERVICE_ServicePromo_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_SERVICE; //Compatibility
//End V_SUBS_OT_PROMO_SERVICE_ServicePromo_Insert_BeforeShow

//Custom Code @28-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close V_SUBS_OT_PROMO_SERVICE_ServicePromo_Insert_BeforeShow @7-533D3A5B
    return $V_SUBS_OT_PROMO_SERVICE_ServicePromo_Insert_BeforeShow;
}
//End Close V_SUBS_OT_PROMO_SERVICE_ServicePromo_Insert_BeforeShow

//V_SUBS_OT_PROMO_SERVICE_BeforeShowRow @2-AA5854ED
function V_SUBS_OT_PROMO_SERVICE_BeforeShowRow(& $sender)
{
    $V_SUBS_OT_PROMO_SERVICE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_SERVICE; //Compatibility
//End V_SUBS_OT_PROMO_SERVICE_BeforeShowRow

//Set Row Style @10-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close V_SUBS_OT_PROMO_SERVICE_BeforeShowRow @2-355C0FA3
    return $V_SUBS_OT_PROMO_SERVICE_BeforeShowRow;
}
//End Close V_SUBS_OT_PROMO_SERVICE_BeforeShowRow

//V_SUBS_OT_PROMO_SERVICE1_ServicePromo_Insert_BeforeShow @115-E1908048
function V_SUBS_OT_PROMO_SERVICE1_ServicePromo_Insert_BeforeShow(& $sender)
{
    $V_SUBS_OT_PROMO_SERVICE1_ServicePromo_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_SERVICE1; //Compatibility
//End V_SUBS_OT_PROMO_SERVICE1_ServicePromo_Insert_BeforeShow

//Custom Code @116-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close V_SUBS_OT_PROMO_SERVICE1_ServicePromo_Insert_BeforeShow @115-BFAFE533
    return $V_SUBS_OT_PROMO_SERVICE1_ServicePromo_Insert_BeforeShow;
}
//End Close V_SUBS_OT_PROMO_SERVICE1_ServicePromo_Insert_BeforeShow

//V_SUBS_OT_PROMO_SERVICE1_BeforeShowRow @110-B1D83FA7
function V_SUBS_OT_PROMO_SERVICE1_BeforeShowRow(& $sender)
{
    $V_SUBS_OT_PROMO_SERVICE1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBS_OT_PROMO_SERVICE1; //Compatibility
//End V_SUBS_OT_PROMO_SERVICE1_BeforeShowRow

//Set Row Style @119-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close V_SUBS_OT_PROMO_SERVICE1_BeforeShowRow @110-4019C0C6
    return $V_SUBS_OT_PROMO_SERVICE1_BeforeShowRow;
}
//End Close V_SUBS_OT_PROMO_SERVICE1_BeforeShowRow


?>
