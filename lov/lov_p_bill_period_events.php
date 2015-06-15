<?php
//BindEvents Method @1-21B4168E
function BindEvents()
{
    global $P_BILL_PERIOD_UNIT;
    $P_BILL_PERIOD_UNIT->CCSEvents["BeforeShowRow"] = "P_BILL_PERIOD_UNIT_BeforeShowRow";
}
//End BindEvents Method

//P_BILL_PERIOD_UNIT_BeforeShowRow @2-3A3A4C39
function P_BILL_PERIOD_UNIT_BeforeShowRow(& $sender)
{
    $P_BILL_PERIOD_UNIT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_PERIOD_UNIT; //Compatibility
//End P_BILL_PERIOD_UNIT_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_BILL_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_ID->GetValue()."#~#".str_replace(" ","_",$P_BILL_PERIOD_UNIT->CODE->GetValue());
	$P_BILL_PERIOD_UNIT->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_BILL_PERIOD_UNIT_BeforeShowRow @2-56A17D23
    return $P_BILL_PERIOD_UNIT_BeforeShowRow;
}
//End Close P_BILL_PERIOD_UNIT_BeforeShowRow
?>
