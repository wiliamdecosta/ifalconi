<?php
//BindEvents Method @1-DC693B23
function BindEvents()
{
    global $P_BUSINESS_SEGMENT;
    $P_BUSINESS_SEGMENT->CCSEvents["BeforeShowRow"] = "P_BUSINESS_SEGMENT_BeforeShowRow";
}
//End BindEvents Method

//P_BUSINESS_SEGMENT_BeforeShowRow @2-F7CCADD7
function P_BUSINESS_SEGMENT_BeforeShowRow(& $sender)
{
    $P_BUSINESS_SEGMENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_SEGMENT; //Compatibility
//End P_BUSINESS_SEGMENT_BeforeShowRow

//Custom Code @22-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_BUSINESS_SEGMENT->P_BUSINESS_SEGMENT_ID->GetValue()."#~#".$P_BUSINESS_SEGMENT->CODE->GetValue();
	$P_BUSINESS_SEGMENT->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close P_BUSINESS_SEGMENT_BeforeShowRow @2-C7C11E7B
    return $P_BUSINESS_SEGMENT_BeforeShowRow;
}
//End Close P_BUSINESS_SEGMENT_BeforeShowRow
?>