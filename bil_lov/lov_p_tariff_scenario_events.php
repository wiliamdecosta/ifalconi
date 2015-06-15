<?php
//BindEvents Method @1-D4BEC39E
function BindEvents()
{
    global $P_TARIFF_SCENARIO;
    $P_TARIFF_SCENARIO->CCSEvents["BeforeShowRow"] = "P_TARIFF_SCENARIO_BeforeShowRow";
}
//End BindEvents Method

//P_TARIFF_SCENARIO_BeforeShowRow @2-099FB9FC
function P_TARIFF_SCENARIO_BeforeShowRow(& $sender)
{
    $P_TARIFF_SCENARIO_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_TARIFF_SCENARIO; //Compatibility
//End P_TARIFF_SCENARIO_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_TARIFF_SCENARIO->P_TARIFF_SCENARIO_ID->GetValue()."#~#".str_replace(" ","",$P_TARIFF_SCENARIO->CODE->GetValue());
	$P_TARIFF_SCENARIO->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_TARIFF_SCENARIO_BeforeShowRow @2-A0C03998
    return $P_TARIFF_SCENARIO_BeforeShowRow;
}
//End Close P_TARIFF_SCENARIO_BeforeShowRow
?>
