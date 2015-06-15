<?php
//BindEvents Method @1-265CDBC2
function BindEvents()
{
    global $P_FEATURE_CATEGORY;
    $P_FEATURE_CATEGORY->CCSEvents["BeforeShowRow"] = "P_FEATURE_CATEGORY_BeforeShowRow";
}
//End BindEvents Method

//P_FEATURE_CATEGORY_BeforeShowRow @2-1821ECCD
function P_FEATURE_CATEGORY_BeforeShowRow(& $sender)
{
    $P_FEATURE_CATEGORY_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FEATURE_CATEGORY; //Compatibility
//End P_FEATURE_CATEGORY_BeforeShowRow

//Custom Code @22-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_FEATURE_CATEGORY->P_FEATURE_CATEGORY_ID->GetValue()."#~#".$P_FEATURE_CATEGORY->CODE->GetValue();
	$P_FEATURE_CATEGORY->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close P_FEATURE_CATEGORY_BeforeShowRow @2-EEAB9687
    return $P_FEATURE_CATEGORY_BeforeShowRow;
}
//End Close P_FEATURE_CATEGORY_BeforeShowRow
?>