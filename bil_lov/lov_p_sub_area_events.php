<?php
//BindEvents Method @1-B6FF3D9F
function BindEvents()
{
    global $P_BUSINESS_AREA;
    $P_BUSINESS_AREA->CCSEvents["BeforeShowRow"] = "P_BUSINESS_AREA_BeforeShowRow";
}
//End BindEvents Method

//P_BUSINESS_AREA_BeforeShowRow @2-1129FB69
function P_BUSINESS_AREA_BeforeShowRow(& $sender)
{
    $P_BUSINESS_AREA_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_AREA; //Compatibility
//End P_BUSINESS_AREA_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_BUSINESS_AREA->P_SUB_BUSINESS_AREA_ID->GetValue()."#~#".str_replace(" ","",$P_BUSINESS_AREA->CODE->GetValue());
	$P_BUSINESS_AREA->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close P_BUSINESS_AREA_BeforeShowRow @2-65865B9C
    return $P_BUSINESS_AREA_BeforeShowRow;
}
//End Close P_BUSINESS_AREA_BeforeShowRow
?>
