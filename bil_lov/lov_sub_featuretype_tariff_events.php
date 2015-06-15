<?php
//BindEvents Method @1-0F43EF65
function BindEvents()
{
    global $BUNDLED_FEATURE;
    $BUNDLED_FEATURE->CCSEvents["BeforeShowRow"] = "BUNDLED_FEATURE_BeforeShowRow";
}
//End BindEvents Method

//BUNDLED_FEATURE_BeforeShowRow @2-5F04A95C
function BUNDLED_FEATURE_BeforeShowRow(& $sender)
{
    $BUNDLED_FEATURE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BUNDLED_FEATURE; //Compatibility
//End BUNDLED_FEATURE_BeforeShowRow

  // -------------------------
      // Write your own code here.
  	$nilai=$BUNDLED_FEATURE->P_FEATURE_TYPE_ID->GetValue()."#~#".$BUNDLED_FEATURE->CODE->GetValue();
  	$BUNDLED_FEATURE->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
  // -------------------------

//Custom Code @32-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close BUNDLED_FEATURE_BeforeShowRow @2-28F1AC88
    return $BUNDLED_FEATURE_BeforeShowRow;
}
//End Close BUNDLED_FEATURE_BeforeShowRow
?>