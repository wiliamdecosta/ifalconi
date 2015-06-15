<?php
//BindEvents Method @1-B342312E
function BindEvents()
{
    global $FEATUREPROMOTION;
    $FEATUREPROMOTION->CCSEvents["BeforeShowRow"] = "FEATUREPROMOTION_BeforeShowRow";
}
//End BindEvents Method

//FEATUREPROMOTION_BeforeShowRow @2-827AC604
function FEATUREPROMOTION_BeforeShowRow(& $sender)
{
    $FEATUREPROMOTION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATUREPROMOTION; //Compatibility
//End FEATUREPROMOTION_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$FEATUREPROMOTION->P_FEATURE_PROMOTION_ID->GetValue()."#~#".$FEATUREPROMOTION->CODE->GetValue();
	$FEATUREPROMOTION->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close FEATUREPROMOTION_BeforeShowRow @2-81BB27C0
    return $FEATUREPROMOTION_BeforeShowRow;
}
//End Close FEATUREPROMOTION_BeforeShowRow
?>
