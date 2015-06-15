<?php
//BindEvents Method @1-4D67CB8B
function BindEvents()
{
    global $P_PAYMENT_METHOD_TYPE;
    $P_PAYMENT_METHOD_TYPE->CCSEvents["BeforeShowRow"] = "P_PAYMENT_METHOD_TYPE_BeforeShowRow";
}
//End BindEvents Method

//P_PAYMENT_METHOD_TYPE_BeforeShowRow @2-5F5D0DAC
function P_PAYMENT_METHOD_TYPE_BeforeShowRow(& $sender)
{
    $P_PAYMENT_METHOD_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_PAYMENT_METHOD_TYPE; //Compatibility
//End P_PAYMENT_METHOD_TYPE_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_PAYMENT_METHOD_TYPE->P_PAYMENT_METHOD_TYPE_ID->GetValue()."#~#".str_replace(" ","_",$P_PAYMENT_METHOD_TYPE->CODE->GetValue());
	$P_PAYMENT_METHOD_TYPE->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_PAYMENT_METHOD_TYPE_BeforeShowRow @2-46A5C7A4
    return $P_PAYMENT_METHOD_TYPE_BeforeShowRow;
}
//End Close P_PAYMENT_METHOD_TYPE_BeforeShowRow
?>
