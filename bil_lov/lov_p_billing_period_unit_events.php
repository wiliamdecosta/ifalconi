<?php
//BindEvents Method @1-65EF777C
function BindEvents()
{
    global $P_BILLING_PERIOD_UNIT;
    $P_BILLING_PERIOD_UNIT->CCSEvents["BeforeShowRow"] = "P_BILLING_PERIOD_UNIT_BeforeShowRow";
}
//End BindEvents Method

//P_BILLING_PERIOD_UNIT_BeforeShowRow @2-34305331
function P_BILLING_PERIOD_UNIT_BeforeShowRow(& $sender)
{
    $P_BILLING_PERIOD_UNIT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILLING_PERIOD_UNIT; //Compatibility
//End P_BILLING_PERIOD_UNIT_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_ID->GetValue()."#~#".str_replace(" ","",$P_BILLING_PERIOD_UNIT->CODE->GetValue());
	$P_BILLING_PERIOD_UNIT->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_BILLING_PERIOD_UNIT_BeforeShowRow @2-1BB16ADB
    return $P_BILLING_PERIOD_UNIT_BeforeShowRow;
}
//End Close P_BILLING_PERIOD_UNIT_BeforeShowRow
?>
