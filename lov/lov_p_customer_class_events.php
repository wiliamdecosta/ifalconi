<?php
//BindEvents Method @1-1DBE367A
function BindEvents()
{
    global $P_CUSTOMER_CLASS;
    $P_CUSTOMER_CLASS->CCSEvents["BeforeShowRow"] = "P_CUSTOMER_CLASS_BeforeShowRow";
}
//End BindEvents Method

//P_CUSTOMER_CLASS_BeforeShowRow @2-B54C28C6
function P_CUSTOMER_CLASS_BeforeShowRow(& $sender)
{
    $P_CUSTOMER_CLASS_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CUSTOMER_CLASS; //Compatibility
//End P_CUSTOMER_CLASS_BeforeShowRow

//Custom Code @22-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=str_replace(" ","",$P_CUSTOMER_CLASS->CODE->GetValue())."#~#".str_replace(" ","",$P_CUSTOMER_CLASS->P_REFERENCE_LIST_ID->GetValue() );
	$P_CUSTOMER_CLASS->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
	//$nilai=$P_COMPANY->P_COMPANY_ID->GetValue()."#~#".str_replace(" ","",$P_COMPANY->COMPANY_NAME->GetValue());
	//$P_COMPANY->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_CUSTOMER_CLASS_BeforeShowRow @2-BE7B376A
    return $P_CUSTOMER_CLASS_BeforeShowRow;
}
//End Close P_CUSTOMER_CLASS_BeforeShowRow
?>