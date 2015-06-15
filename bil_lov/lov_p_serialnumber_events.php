<?php
//BindEvents Method @1-E99E629B
function BindEvents()
{
    global $SERIAL_NUMBER;
    $SERIAL_NUMBER->CCSEvents["BeforeShowRow"] = "SERIAL_NUMBER_BeforeShowRow";
}
//End BindEvents Method

//SERIAL_NUMBER_BeforeShowRow @2-8C71DAF3
function SERIAL_NUMBER_BeforeShowRow(& $sender)
{
    $SERIAL_NUMBER_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SERIAL_NUMBER; //Compatibility
//End SERIAL_NUMBER_BeforeShowRow

//Custom Code @22-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$SERIAL_NUMBER->CPE_LIST_ID->GetValue()."#~#".$SERIAL_NUMBER->SERIAL_NO->GetValue();
	$SERIAL_NUMBER->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close SERIAL_NUMBER_BeforeShowRow @2-70F042C6
    return $SERIAL_NUMBER_BeforeShowRow;
}
//End Close SERIAL_NUMBER_BeforeShowRow
?>