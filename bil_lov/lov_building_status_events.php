<?php
//BindEvents Method @1-9C2BD82E
function BindEvents()
{
    global $BUILDING_STATUS;
    $BUILDING_STATUS->CCSEvents["BeforeShowRow"] = "BUILDING_STATUS_BeforeShowRow";
}
//End BindEvents Method

//BUILDING_STATUS_BeforeShowRow @2-BE12C7D8
function BUILDING_STATUS_BeforeShowRow(& $sender)
{
    $BUILDING_STATUS_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BUILDING_STATUS; //Compatibility
//End BUILDING_STATUS_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$BUILDING_STATUS->P_REFERENCE_LIST_ID->GetValue()."#~#".str_replace(" ","",$BUILDING_STATUS->CODE->GetValue());
	$BUILDING_STATUS->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close BUILDING_STATUS_BeforeShowRow @2-B190A399
    return $BUILDING_STATUS_BeforeShowRow;
}
//End Close BUILDING_STATUS_BeforeShowRow
?>
