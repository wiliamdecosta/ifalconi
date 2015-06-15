<?php
//BindEvents Method @1-3AADDBDC
function BindEvents()
{
    global $ONETIME_PROMOTION;
    $ONETIME_PROMOTION->CCSEvents["BeforeShowRow"] = "ONETIME_PROMOTION_BeforeShowRow";
}
//End BindEvents Method

//ONETIME_PROMOTION_BeforeShowRow @2-56BF68A3
function ONETIME_PROMOTION_BeforeShowRow(& $sender)
{
    $ONETIME_PROMOTION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ONETIME_PROMOTION; //Compatibility
//End ONETIME_PROMOTION_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$ONETIME_PROMOTION->P_ONETIME_PROMOTION_ID->GetValue()."#~#".$ONETIME_PROMOTION->CODE->GetValue();
	$ONETIME_PROMOTION->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close ONETIME_PROMOTION_BeforeShowRow @2-BA3EDF64
    return $ONETIME_PROMOTION_BeforeShowRow;
}
//End Close ONETIME_PROMOTION_BeforeShowRow
?>
