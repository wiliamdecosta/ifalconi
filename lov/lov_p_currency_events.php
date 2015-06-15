<?php
//BindEvents Method @1-93B918E9
function BindEvents()
{
    global $P_ACCOUNT_CURRENCY;
    $P_ACCOUNT_CURRENCY->CCSEvents["BeforeShowRow"] = "P_ACCOUNT_CURRENCY_BeforeShowRow";
}
//End BindEvents Method

//P_ACCOUNT_CURRENCY_BeforeShowRow @2-C4E15DB0
function P_ACCOUNT_CURRENCY_BeforeShowRow(& $sender)
{
    $P_ACCOUNT_CURRENCY_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ACCOUNT_CURRENCY; //Compatibility
//End P_ACCOUNT_CURRENCY_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_ACCOUNT_CURRENCY->P_CURRENCY_ID->GetValue()."#~#".str_replace(" ","_",$P_ACCOUNT_CURRENCY->CODE->GetValue());
	$P_ACCOUNT_CURRENCY->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_ACCOUNT_CURRENCY_BeforeShowRow @2-B84A0D9C
    return $P_ACCOUNT_CURRENCY_BeforeShowRow;
}
//End Close P_ACCOUNT_CURRENCY_BeforeShowRow
?>
