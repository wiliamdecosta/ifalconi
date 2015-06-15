<?php
//BindEvents Method @1-75D04D1C
function BindEvents()
{
    global $V_INVOICE_PERIOD;
    $V_INVOICE_PERIOD->CCSEvents["BeforeShowRow"] = "V_INVOICE_PERIOD_BeforeShowRow";
}
//End BindEvents Method

//V_INVOICE_PERIOD_BeforeShowRow @2-9A83F899
function V_INVOICE_PERIOD_BeforeShowRow(& $sender)
{
    $V_INVOICE_PERIOD_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_INVOICE_PERIOD; //Compatibility
//End V_INVOICE_PERIOD_BeforeShowRow

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
	$keyId = CCGetFromGet("INPUT_DATA_CONTROL_ID", "");
	global $id;
	global $id2;
	global $id3;
	if (empty($keyId)) {
		$id = $V_INVOICE_PERIOD->INPUT_DATA_CONTROL_ID->GetValue();
		$id2 = $V_INVOICE_PERIOD->INVOICE_DATE2->GetFormattedValue();
		$id3 = $V_INVOICE_PERIOD->FINANCE_PERIOD_CODE->GetValue();
		//print_r($id2);
		//echo $id2;
		//exit;
		//echo $id1."||".$id2."||".$id3;
	//	exit;

		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		
		$param = CCAddParam($param, "INPUT_DATA_CONTROL_ID", $id);
	    $param = CCAddParam($param, "INVOICE_DATE", $id2);
		$param = CCAddParam($param, "FINANCE_PERIOD_CODE", $id3);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
	    header("Location: ".$Redirect);
	    exit;
	}

	if ($V_INVOICE_PERIOD->INPUT_DATA_CONTROL_ID->GetValue() == $keyId) {
		$V_INVOICE_PERIOD->ADLink->Visible = true;
		$V_INVOICE_PERIOD->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$V_INVOICE_PERIOD->ADLink->Visible = false;
		$V_INVOICE_PERIOD->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close V_INVOICE_PERIOD_BeforeShowRow @2-2EA6885E
    return $V_INVOICE_PERIOD_BeforeShowRow;
}
//End Close V_INVOICE_PERIOD_BeforeShowRow

?>
