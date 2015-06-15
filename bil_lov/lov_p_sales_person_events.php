<?php
//BindEvents Method @1-2821432D
function BindEvents()
{
    global $P_SALES_PERSON;
    $P_SALES_PERSON->CCSEvents["BeforeShowRow"] = "P_SALES_PERSON_BeforeShowRow";
}
//End BindEvents Method

//P_SALES_PERSON_BeforeShowRow @2-4A7D45C0
function P_SALES_PERSON_BeforeShowRow(& $sender)
{
    $P_SALES_PERSON_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SALES_PERSON; //Compatibility
//End P_SALES_PERSON_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_SALES_PERSON->P_SALES_PERSON_ID->GetValue()."#~#".$P_SALES_PERSON->CODE->GetValue()."#~#".$P_SALES_PERSON->SALES_COMPANY->GetValue();
	$P_SALES_PERSON->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close P_SALES_PERSON_BeforeShowRow @2-5B3ED6D6
    return $P_SALES_PERSON_BeforeShowRow;
}
//End Close P_SALES_PERSON_BeforeShowRow
?>
