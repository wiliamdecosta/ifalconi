<?php
//BindEvents Method @1-A081B9FA
function BindEvents()
{
    global $STATUSHISTORY;
    $STATUSHISTORY->CCSEvents["BeforeShowRow"] = "STATUSHISTORY_BeforeShowRow";
}
//End BindEvents Method

//STATUSHISTORY_BeforeShowRow @2-28343143
function STATUSHISTORY_BeforeShowRow(& $sender)
{
    $STATUSHISTORY_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $STATUSHISTORY; //Compatibility
//End STATUSHISTORY_BeforeShowRow

//Set Row Style @10-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close STATUSHISTORY_BeforeShowRow @2-3BA5069D
    return $STATUSHISTORY_BeforeShowRow;
}
//End Close STATUSHISTORY_BeforeShowRow
?>
