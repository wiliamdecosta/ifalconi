<?php
//BindEvents Method @1-AA659488
function BindEvents()
{
    global $P_CUSTOMER;
    $P_CUSTOMER->CCSEvents["BeforeShowRow"] = "P_CUSTOMER_BeforeShowRow";
}
//End BindEvents Method

//P_CUSTOMER_BeforeShowRow @2-94710971
function P_CUSTOMER_BeforeShowRow(& $sender)
{
    $P_CUSTOMER_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CUSTOMER; //Compatibility
//End P_CUSTOMER_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai= $P_CUSTOMER->CUSTOMER_ID->GetValue()."#~#".str_replace(" ","_",$P_CUSTOMER->LAST_NAME->GetValue());
	$P_CUSTOMER->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_CUSTOMER_BeforeShowRow @2-CD2DC704
    return $P_CUSTOMER_BeforeShowRow;
}
//End Close P_CUSTOMER_BeforeShowRow
?>
