<?php
//BindEvents Method @1-E8756E20
function BindEvents()
{
    global $PROMOTION;
    $PROMOTION->CCSEvents["BeforeShowRow"] = "PROMOTION_BeforeShowRow";
}
//End BindEvents Method

//PROMOTION_BeforeShowRow @2-4FC00308
function PROMOTION_BeforeShowRow(& $sender)
{
    $PROMOTION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PROMOTION; //Compatibility
//End PROMOTION_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$PROMOTION->SUBS_OT_PROMO_SERVICE_ID->GetValue()."#~#".$PROMOTION->SERVICE_PROMO->GetValue();
	$PROMOTION->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close PROMOTION_BeforeShowRow @2-62CD2350
    return $PROMOTION_BeforeShowRow;
}
//End Close PROMOTION_BeforeShowRow
?>
