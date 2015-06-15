<?php
//BindEvents Method @1-F9758D06
function BindEvents()
{
    global $P_CUSTOMER_TITLE;
    $P_CUSTOMER_TITLE->CCSEvents["BeforeShowRow"] = "P_CUSTOMER_TITLE_BeforeShowRow";
}
//End BindEvents Method

//P_CUSTOMER_TITLE_BeforeShowRow @2-9B0ACBA5
function P_CUSTOMER_TITLE_BeforeShowRow(& $sender)
{
    $P_CUSTOMER_TITLE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CUSTOMER_TITLE; //Compatibility
//End P_CUSTOMER_TITLE_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_CUSTOMER_TITLE->P_CUSTOMER_TITLE_ID->GetValue()."#~#".$P_CUSTOMER_TITLE->CODE->GetValue();
	$P_CUSTOMER_TITLE->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close P_CUSTOMER_TITLE_BeforeShowRow @2-F2831374
    return $P_CUSTOMER_TITLE_BeforeShowRow;
}
//End Close P_CUSTOMER_TITLE_BeforeShowRow
?>
