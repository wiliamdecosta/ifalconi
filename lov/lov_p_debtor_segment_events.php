<?php
//BindEvents Method @1-2B08EA12
function BindEvents()
{
    global $P_DEBTOR_SEGMENT;
    $P_DEBTOR_SEGMENT->CCSEvents["BeforeShowRow"] = "P_DEBTOR_SEGMENT_BeforeShowRow";
}
//End BindEvents Method

//P_DEBTOR_SEGMENT_BeforeShowRow @2-5E4F6D0A
function P_DEBTOR_SEGMENT_BeforeShowRow(& $sender)
{
    $P_DEBTOR_SEGMENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DEBTOR_SEGMENT; //Compatibility
//End P_DEBTOR_SEGMENT_BeforeShowRow

//Custom Code @22-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=str_replace(" ","_",$P_DEBTOR_SEGMENT->CODE->GetValue())."#~#".$P_DEBTOR_SEGMENT->P_DEBTOR_SEGMENT_ID->GetValue();
	$P_DEBTOR_SEGMENT->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
	//$nilai=$P_COMPANY->P_COMPANY_ID->GetValue()."#~#".str_replace(" ","",$P_COMPANY->COMPANY_NAME->GetValue());
	//$P_COMPANY->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_DEBTOR_SEGMENT_BeforeShowRow @2-9F916AD5
    return $P_DEBTOR_SEGMENT_BeforeShowRow;
}
//End Close P_DEBTOR_SEGMENT_BeforeShowRow
?>