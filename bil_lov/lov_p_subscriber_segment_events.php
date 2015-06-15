<?php
//BindEvents Method @1-B55E090D
function BindEvents()
{
    global $P_SUBSCRIBER_SEGMENT;
    $P_SUBSCRIBER_SEGMENT->CCSEvents["BeforeShowRow"] = "P_SUBSCRIBER_SEGMENT_BeforeShowRow";
}
//End BindEvents Method

//P_SUBSCRIBER_SEGMENT_BeforeShowRow @2-77C639CF
function P_SUBSCRIBER_SEGMENT_BeforeShowRow(& $sender)
{
    $P_SUBSCRIBER_SEGMENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SUBSCRIBER_SEGMENT; //Compatibility
//End P_SUBSCRIBER_SEGMENT_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_SUBSCRIBER_SEGMENT->P_SUBSCRIBER_SEGMENT_ID->GetValue()."#~#".str_replace(" ","",$P_SUBSCRIBER_SEGMENT->CODE->GetValue());
	$P_SUBSCRIBER_SEGMENT->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_SUBSCRIBER_SEGMENT_BeforeShowRow @2-279F6D7C
    return $P_SUBSCRIBER_SEGMENT_BeforeShowRow;
}
//End Close P_SUBSCRIBER_SEGMENT_BeforeShowRow
?>
