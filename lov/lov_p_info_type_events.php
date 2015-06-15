<?php
//BindEvents Method @1-684382F7
function BindEvents()
{
    global $P_INFO_TYPE;
    $P_INFO_TYPE->CCSEvents["BeforeShowRow"] = "P_INFO_TYPE_BeforeShowRow";
}
//End BindEvents Method

//P_INFO_TYPE_BeforeShowRow @2-70BFBD3A
function P_INFO_TYPE_BeforeShowRow(& $sender)
{
    $P_INFO_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_INFO_TYPE; //Compatibility
//End P_INFO_TYPE_BeforeShowRow

//Custom Code @22-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=str_replace(" ","",$P_INFO_TYPE->CODE->GetValue())."#~#".str_replace(" ","",$P_INFO_TYPE->P_REFERENCE_LIST_ID->GetValue() );
	$P_INFO_TYPE->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
	//$nilai=$P_COMPANY->P_COMPANY_ID->GetValue()."#~#".str_replace(" ","",$P_COMPANY->COMPANY_NAME->GetValue());
	//$P_COMPANY->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_INFO_TYPE_BeforeShowRow @2-40AA2961
    return $P_INFO_TYPE_BeforeShowRow;
}
//End Close P_INFO_TYPE_BeforeShowRow
?>