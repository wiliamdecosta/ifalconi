<?php
//BindEvents Method @1-CEB5408F
function BindEvents()
{
    global $CUSTOMER_ACCOUNT;
    $CUSTOMER_ACCOUNT->CCSEvents["BeforeShowRow"] = "CUSTOMER_ACCOUNT_BeforeShowRow";
}
//End BindEvents Method

//CUSTOMER_ACCOUNT_BeforeShowRow @2-7F9EA755
function CUSTOMER_ACCOUNT_BeforeShowRow(& $sender)
{
    $CUSTOMER_ACCOUNT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_ACCOUNT; //Compatibility
//End CUSTOMER_ACCOUNT_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$CUSTOMER_ACCOUNT->CUSTOMER_ACCOUNT_ID->GetValue()."#~#".$CUSTOMER_ACCOUNT->LAST_NAME->GetValue()."#~#".$CUSTOMER_ACCOUNT->ACCOUNT_NO->GetValue();
	$CUSTOMER_ACCOUNT->Label1->SetValue("<input type=button value='PILIH' class=Button onclick=\"javascript:clickReturn('".$nilai."')\">");
// -------------------------
//End Custom Code

//Close CUSTOMER_ACCOUNT_BeforeShowRow @2-EC92FD66
    return $CUSTOMER_ACCOUNT_BeforeShowRow;
}
//End Close CUSTOMER_ACCOUNT_BeforeShowRow
?>
