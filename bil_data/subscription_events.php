<?php
//BindEvents Method @1-9E8190B5
function BindEvents()
{
    global $V_SUBSCRIBER;
    $V_SUBSCRIBER->CCSEvents["BeforeShowRow"] = "V_SUBSCRIBER_BeforeShowRow";
}
//End BindEvents Method

//V_SUBSCRIBER_BeforeShowRow @2-6B4E0961
function V_SUBSCRIBER_BeforeShowRow(& $sender)
{
    $V_SUBSCRIBER_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_SUBSCRIBER; //Compatibility
//End V_SUBSCRIBER_BeforeShowRow

//Set Row Style @3-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Custom Code @65-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("SUBSCRIBER_ID", "");
	global $id;
	global $id2;
	if (empty($keyId)) {
		$id = $V_SUBSCRIBER->SUBSCRIBER_ID->GetValue();
		$id2 = $V_SUBSCRIBER->CUSTOMER_ACCOUNT_ID->GetValue();
		//echo $id1."||".$id2."||".$id3;
	//	exit;

		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCRemoveParam($param,"SUBSCRIBER_ID");
		$param = CCAddParam($param, "SUBSCRIBER_ID", $id);
		$param = CCAddParam($param, "CUSTOMER_ACCOUNT_ID", $id2);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		exit;
	}

	if ($V_SUBSCRIBER->SUBSCRIBER_ID->GetValue() == $keyId) {
		$V_SUBSCRIBER->ADLink->Visible = true;
		$V_SUBSCRIBER->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$V_SUBSCRIBER->ADLink->Visible = false;
		$V_SUBSCRIBER->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}

	if($V_SUBSCRIBER->IS_INVOICED->GetValue()=="Y")
		$V_SUBSCRIBER->IS_INVOICED->SetValue("YES");
	else
		$V_SUBSCRIBER->IS_INVOICED->SetValue("NO");

	if($V_SUBSCRIBER->IS_VAT_EXCEPTION->GetValue()=="Y")
		$V_SUBSCRIBER->IS_VAT_EXCEPTION->SetValue("YES");
	else
		$V_SUBSCRIBER->IS_VAT_EXCEPTION->SetValue("NO");
// -------------------------
//End Custom Code

//Close V_SUBSCRIBER_BeforeShowRow @2-EE8C3E66
    return $V_SUBSCRIBER_BeforeShowRow;
}
//End Close V_SUBSCRIBER_BeforeShowRow


?>
