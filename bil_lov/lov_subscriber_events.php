<?php
//BindEvents Method @1-7F2993C8
function BindEvents()
{
    global $SUBSCRIBER;
    $SUBSCRIBER->CCSEvents["BeforeShowRow"] = "SUBSCRIBER_BeforeShowRow";
}
//End BindEvents Method

//SUBSCRIBER_BeforeShowRow @2-7A8C4EA1
function SUBSCRIBER_BeforeShowRow(& $sender)
{
    $SUBSCRIBER_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SUBSCRIBER; //Compatibility
//End SUBSCRIBER_BeforeShowRow

//Custom Code @15-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$SUBSCRIBER->SUBSCRIBER_ID->GetValue()."#~#".$SUBSCRIBER->SERVICE_NO->GetValue()."#~#".$SUBSCRIBER->SERVICE_TYPE_CODE->GetValue()."#~#".$SUBSCRIBER->SUBSCRIPTION_NAME->GetValue();
	$SUBSCRIBER->Label1->SetValue("<input type=button value=PILIH class=Button onclick=".'"'."clickReturn(" . "'" . $nilai . "'" . ")".'"'.">");
// -------------------------
//End Custom Code

//Close SUBSCRIBER_BeforeShowRow @2-778ECCD7
    return $SUBSCRIBER_BeforeShowRow;
}
//End Close SUBSCRIBER_BeforeShowRow
?>


