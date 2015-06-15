<?php
//BindEvents Method @1-9D247E84
function BindEvents()
{
    global $P_BILL_CYCLE;
    $P_BILL_CYCLE->CCSEvents["BeforeShowRow"] = "P_BILL_CYCLE_BeforeShowRow";
}
//End BindEvents Method

//P_BILL_CYCLE_BeforeShowRow @2-C215AF65
function P_BILL_CYCLE_BeforeShowRow(& $sender)
{
    $P_BILL_CYCLE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_CYCLE; //Compatibility
//End P_BILL_CYCLE_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_BILL_CYCLE->P_BILL_CYCLE_ID->GetValue()."#~#".str_replace(" ","",$P_BILL_CYCLE->CODE->GetValue());
	$P_BILL_CYCLE->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_BILL_CYCLE_BeforeShowRow @2-5C53B85A
    return $P_BILL_CYCLE_BeforeShowRow;
}
//End Close P_BILL_CYCLE_BeforeShowRow
?>
