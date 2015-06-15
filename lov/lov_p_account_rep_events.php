<?php
//BindEvents Method @1-1FBEE088
function BindEvents()
{
    global $P_ACCOUNT_REP;
    $P_ACCOUNT_REP->CCSEvents["BeforeShowRow"] = "P_ACCOUNT_REP_BeforeShowRow";
}
//End BindEvents Method

//P_ACCOUNT_REP_BeforeShowRow @2-63C104B1
function P_ACCOUNT_REP_BeforeShowRow(& $sender)
{
    $P_ACCOUNT_REP_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ACCOUNT_REP; //Compatibility
//End P_ACCOUNT_REP_BeforeShowRow

//Custom Code @22-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_ACCOUNT_REP->P_ACCOUNT_REP_ID->GetValue()."#~#".str_replace(" ","_",$P_ACCOUNT_REP->ACCOUNT_NAME->GetValue())."#~#".str_replace(" ","_",$P_ACCOUNT_REP->EMPLOYEE_NO->GetValue());
	$P_ACCOUNT_REP->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
	//$nilai=$P_COMPANY->P_COMPANY_ID->GetValue()."#~#".str_replace(" ","",$P_COMPANY->COMPANY_NAME->GetValue());
	//$P_COMPANY->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_ACCOUNT_REP_BeforeShowRow @2-3A1BE0AD
    return $P_ACCOUNT_REP_BeforeShowRow;
}
//End Close P_ACCOUNT_REP_BeforeShowRow
?>