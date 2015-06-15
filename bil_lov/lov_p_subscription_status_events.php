<?php
//BindEvents Method @1-EFD93E24
function BindEvents()
{
    global $P_SUBSCRIPTION_STATUS;
    $P_SUBSCRIPTION_STATUS->CCSEvents["BeforeShowRow"] = "P_SUBSCRIPTION_STATUS_BeforeShowRow";
}
//End BindEvents Method

//P_SUBSCRIPTION_STATUS_BeforeShowRow @2-7160743E
function P_SUBSCRIPTION_STATUS_BeforeShowRow(& $sender)
{
    $P_SUBSCRIPTION_STATUS_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SUBSCRIPTION_STATUS; //Compatibility
//End P_SUBSCRIPTION_STATUS_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_SUBSCRIPTION_STATUS->P_SUBSCRIPTION_STATUS_ID->GetValue()."#~#".str_replace(" ","",$P_SUBSCRIPTION_STATUS->CODE->GetValue());
	$P_SUBSCRIPTION_STATUS->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_SUBSCRIPTION_STATUS_BeforeShowRow @2-EE23BE7F
    return $P_SUBSCRIPTION_STATUS_BeforeShowRow;
}
//End Close P_SUBSCRIPTION_STATUS_BeforeShowRow
?>
