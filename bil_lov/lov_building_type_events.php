<?php
//BindEvents Method @1-5CF694F2
function BindEvents()
{
    global $BUILDING_TYPE;
    $BUILDING_TYPE->CCSEvents["BeforeShowRow"] = "BUILDING_TYPE_BeforeShowRow";
}
//End BindEvents Method

//BUILDING_TYPE_BeforeShowRow @2-34B93784
function BUILDING_TYPE_BeforeShowRow(& $sender)
{
    $BUILDING_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BUILDING_TYPE; //Compatibility
//End BUILDING_TYPE_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$BUILDING_TYPE->P_REFERENCE_LIST_ID->GetValue()."#~#".str_replace(" ","",$BUILDING_TYPE->CODE->GetValue());
	$BUILDING_TYPE->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close BUILDING_TYPE_BeforeShowRow @2-73979E82
    return $BUILDING_TYPE_BeforeShowRow;
}
//End Close BUILDING_TYPE_BeforeShowRow
?>
