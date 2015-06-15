<?php
//BindEvents Method @1-F5B9EE17
function BindEvents()
{
    global $RECURRINGTARIF;
    global $FEATURE;
    global $BUNDLEDFEATURE;
    $RECURRINGTARIF->ServicePromo_Insert->CCSEvents["BeforeShow"] = "RECURRINGTARIF_ServicePromo_Insert_BeforeShow";
    $RECURRINGTARIF->CCSEvents["BeforeShowRow"] = "RECURRINGTARIF_BeforeShowRow";
    $FEATURE->ServicePromo_Insert->CCSEvents["BeforeShow"] = "FEATURE_ServicePromo_Insert_BeforeShow";
    $FEATURE->CCSEvents["BeforeShowRow"] = "FEATURE_BeforeShowRow";
    $BUNDLEDFEATURE->ServicePromo_Insert->CCSEvents["BeforeShow"] = "BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow";
    $BUNDLEDFEATURE->CCSEvents["BeforeShowRow"] = "BUNDLEDFEATURE_BeforeShowRow";
}
//End BindEvents Method

//RECURRINGTARIF_ServicePromo_Insert_BeforeShow @7-A47454A3
function RECURRINGTARIF_ServicePromo_Insert_BeforeShow(& $sender)
{
    $RECURRINGTARIF_ServicePromo_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $RECURRINGTARIF; //Compatibility
//End RECURRINGTARIF_ServicePromo_Insert_BeforeShow

//Custom Code @28-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close RECURRINGTARIF_ServicePromo_Insert_BeforeShow @7-79334B25
    return $RECURRINGTARIF_ServicePromo_Insert_BeforeShow;
}
//End Close RECURRINGTARIF_ServicePromo_Insert_BeforeShow

//RECURRINGTARIF_BeforeShowRow @2-06E4BB57
function RECURRINGTARIF_BeforeShowRow(& $sender)
{
    $RECURRINGTARIF_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $RECURRINGTARIF; //Compatibility
//End RECURRINGTARIF_BeforeShowRow

//Set Row Style @10-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close RECURRINGTARIF_BeforeShowRow @2-39C11891
    return $RECURRINGTARIF_BeforeShowRow;
}
//End Close RECURRINGTARIF_BeforeShowRow

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

//BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow @144-4A8837D6
function BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow(& $sender)
{
    $BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BUNDLEDFEATURE; //Compatibility
//End BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow

//Custom Code @145-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow @144-E0411936
    return $BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow;
}
//End Close BUNDLEDFEATURE_ServicePromo_Insert_BeforeShow

//BUNDLEDFEATURE_BeforeShowRow @141-43269FA0
function BUNDLEDFEATURE_BeforeShowRow(& $sender)
{
    $BUNDLEDFEATURE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BUNDLEDFEATURE; //Compatibility
//End BUNDLEDFEATURE_BeforeShowRow

//Set Row Style @157-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close BUNDLEDFEATURE_BeforeShowRow @141-70AED49A
    return $BUNDLEDFEATURE_BeforeShowRow;
}
//End Close BUNDLEDFEATURE_BeforeShowRow
?>
