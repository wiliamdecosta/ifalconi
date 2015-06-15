<?php
//BindEvents Method @1-831FBA3A
function BindEvents()
{
    global $P_TARIFF_LOCATION;
    $P_TARIFF_LOCATION->CCSEvents["BeforeShowRow"] = "P_TARIFF_LOCATION_BeforeShowRow";
}
//End BindEvents Method

//P_TARIFF_LOCATION_BeforeShowRow @2-06A2DA30
function P_TARIFF_LOCATION_BeforeShowRow(& $sender)
{
    $P_TARIFF_LOCATION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_TARIFF_LOCATION; //Compatibility
//End P_TARIFF_LOCATION_BeforeShowRow

//Custom Code @22-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_TARIFF_LOCATION->P_REFERENCE_LIST_ID->GetValue()."#~#".$P_TARIFF_LOCATION->CODE->GetValue();
	$P_TARIFF_LOCATION->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close P_TARIFF_LOCATION_BeforeShowRow @2-F99CD6AD
    return $P_TARIFF_LOCATION_BeforeShowRow;
}
//End Close P_TARIFF_LOCATION_BeforeShowRow
?>