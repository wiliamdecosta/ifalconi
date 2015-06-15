<?php
//BindEvents Method @1-F9082C1F
function BindEvents()
{
    global $P_BILL_PERIODE;
    $P_BILL_PERIODE->CCSEvents["BeforeShowRow"] = "P_BILL_PERIODE_BeforeShowRow";
}
//End BindEvents Method

//P_BILL_PERIODE_BeforeShowRow @2-5C9F925D
function P_BILL_PERIODE_BeforeShowRow(& $sender)
{
    $P_BILL_PERIODE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_PERIODE; //Compatibility
//End P_BILL_PERIODE_BeforeShowRow

//Custom Code @22-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_BILL_PERIODE->P_BILLING_PERIOD_UNIT_ID->GetValue()."#~#".$P_BILL_PERIODE->CODE->GetValue();
	$P_BILL_PERIODE->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close P_BILL_PERIODE_BeforeShowRow @2-6EC20330
    return $P_BILL_PERIODE_BeforeShowRow;
}
//End Close P_BILL_PERIODE_BeforeShowRow
?>