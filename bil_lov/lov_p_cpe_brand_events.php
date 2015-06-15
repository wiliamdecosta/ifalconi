<?php
//BindEvents Method @1-CEB615D2
function BindEvents()
{
    global $CPE_BRAND;
    $CPE_BRAND->CCSEvents["BeforeShowRow"] = "CPE_BRAND_BeforeShowRow";
}
//End BindEvents Method

//CPE_BRAND_BeforeShowRow @2-2CA0B8E2
function CPE_BRAND_BeforeShowRow(& $sender)
{
    $CPE_BRAND_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPE_BRAND; //Compatibility
//End CPE_BRAND_BeforeShowRow

//Custom Code @22-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$CPE_BRAND->P_CPE_BRAND_ID->GetValue()."#~#".$CPE_BRAND->CODE->GetValue();
	$CPE_BRAND->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close CPE_BRAND_BeforeShowRow @2-44A90AD7
    return $CPE_BRAND_BeforeShowRow;
}
//End Close CPE_BRAND_BeforeShowRow
?>