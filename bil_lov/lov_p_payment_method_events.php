<?php
//BindEvents Method @1-BF2D8524
function BindEvents()
{
    global $P_PAYMENT_METHOD;
    $P_PAYMENT_METHOD->CCSEvents["BeforeShowRow"] = "P_PAYMENT_METHOD_BeforeShowRow";
}
//End BindEvents Method

//P_PAYMENT_METHOD_BeforeShowRow @2-D4372890
function P_PAYMENT_METHOD_BeforeShowRow(& $sender)
{
    $P_PAYMENT_METHOD_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_PAYMENT_METHOD; //Compatibility
//End P_PAYMENT_METHOD_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_PAYMENT_METHOD->P_PAYMENT_METHOD_ID->GetValue()."#~#".str_replace(" ","_",$P_PAYMENT_METHOD->CODE->GetValue());
	$P_PAYMENT_METHOD->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_PAYMENT_METHOD_BeforeShowRow @2-6025D17A
    return $P_PAYMENT_METHOD_BeforeShowRow;
}
//End Close P_PAYMENT_METHOD_BeforeShowRow
?>
