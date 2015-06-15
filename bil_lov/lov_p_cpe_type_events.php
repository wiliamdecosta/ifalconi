<?php
//BindEvents Method @1-5F14E4A8
function BindEvents()
{
    global $CPE_TYPE;
    $CPE_TYPE->CCSEvents["BeforeShowRow"] = "CPE_TYPE_BeforeShowRow";
}
//End BindEvents Method

//CPE_TYPE_BeforeShowRow @2-63E42F00
function CPE_TYPE_BeforeShowRow(& $sender)
{
    $CPE_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPE_TYPE; //Compatibility
//End CPE_TYPE_BeforeShowRow

//Custom Code @22-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$CPE_TYPE->P_CPE_TYPE_ID->GetValue()."#~#".$CPE_TYPE->CODE->GetValue();
	$CPE_TYPE->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close CPE_TYPE_BeforeShowRow @2-41E63615
    return $CPE_TYPE_BeforeShowRow;
}
//End Close CPE_TYPE_BeforeShowRow
?>