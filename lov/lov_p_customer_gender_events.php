<?php
//BindEvents Method @1-DC459C67
function BindEvents()
{
    global $P_GENDER;
    $P_GENDER->CCSEvents["BeforeShowRow"] = "P_GENDER_BeforeShowRow";
}
//End BindEvents Method

//P_GENDER_BeforeShowRow @2-96FFB70C
function P_GENDER_BeforeShowRow(& $sender)
{
    $P_GENDER_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_GENDER; //Compatibility
//End P_GENDER_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_GENDER->P_REFERENCE_LIST_ID->GetValue()."#~#".str_replace(" ","_",$P_GENDER->CODE->GetValue());
	$P_GENDER->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_GENDER_BeforeShowRow @2-DA319008
    return $P_GENDER_BeforeShowRow;
}
//End Close P_GENDER_BeforeShowRow
?>
