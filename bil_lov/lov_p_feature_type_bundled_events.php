<?php
//BindEvents Method @1-241A5D35
function BindEvents()
{
    global $P_FEATURE_TYPE;
    $P_FEATURE_TYPE->CCSEvents["BeforeShowRow"] = "P_FEATURE_TYPE_BeforeShowRow";
}
//End BindEvents Method

//P_FEATURE_TYPE_BeforeShowRow @2-F5311AE2
function P_FEATURE_TYPE_BeforeShowRow(& $sender)
{
    $P_FEATURE_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FEATURE_TYPE; //Compatibility
//End P_FEATURE_TYPE_BeforeShowRow

//Custom Code @22-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_FEATURE_TYPE->P_FEATURE_TYPE_ID->GetValue()."#~#".$P_FEATURE_TYPE->FEATURE_TYPE_CODE->GetValue()."#~#".$P_FEATURE_TYPE->FEATURE_GROUP->GetValue();
	$P_FEATURE_TYPE->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close P_FEATURE_TYPE_BeforeShowRow @2-94195823
    return $P_FEATURE_TYPE_BeforeShowRow;
}
//End Close P_FEATURE_TYPE_BeforeShowRow
?>