<?php
//BindEvents Method @1-571EA32E
function BindEvents()
{
    global $T_BILL2;
    global $V_T_DETAIL_BIL;
    global $p_customer_account;
    global $VR_T_INVOICE_COMPONENT;
    $T_BILL2->CCSEvents["BeforeShowRow"] = "T_BILL2_BeforeShowRow";
    $V_T_DETAIL_BIL->CCSEvents["BeforeShowRow"] = "V_T_DETAIL_BIL_BeforeShowRow";
    $p_customer_account->invoice->CCSEvents["BeforeShow"] = "p_customer_account_invoice_BeforeShow";
    $p_customer_account->FINANCE_PERIOD_CODE2->CCSEvents["BeforeShow"] = "p_customer_account_FINANCE_PERIOD_CODE2_BeforeShow";
    $VR_T_INVOICE_COMPONENT->CHRG_AMOUNT->CCSEvents["BeforeShow"] = "VR_T_INVOICE_COMPONENT_CHRG_AMOUNT_BeforeShow";
    $VR_T_INVOICE_COMPONENT->VT_AMOUNT->CCSEvents["BeforeShow"] = "VR_T_INVOICE_COMPONENT_VT_AMOUNT_BeforeShow";
    $VR_T_INVOICE_COMPONENT->PC_AMOUNT->CCSEvents["BeforeShow"] = "VR_T_INVOICE_COMPONENT_PC_AMOUNT_BeforeShow";
    $VR_T_INVOICE_COMPONENT->CCSEvents["BeforeShowRow"] = "VR_T_INVOICE_COMPONENT_BeforeShowRow";
}
//End BindEvents Method

//T_BILL2_BeforeShowRow @201-9AF96504
function T_BILL2_BeforeShowRow(& $sender)
{
    $T_BILL2_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $T_BILL2; //Compatibility
//End T_BILL2_BeforeShowRow

//Set Row Style @219-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Custom Code @220-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("T_INVOICE_ID", "");
    //$T_BILL2->SUBSCRIBER_ID->SetValue(-99);
	global $id;
	global $id2;
	global $id3;
	if (empty($keyId)) {
		$id = $T_BILL2->T_INVOICE_ID->GetValue();
		$id2 = $T_BILL2->INVOICE_DATE2->GetFormattedValue();
		//echo $id1."||".$id2."||".$id3;
		//exit;

		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
	
		//$param = CCRemoveParam($param,"SUBSCRIBER_ID");
		$param = CCAddParam($param, "T_INVOICE_ID", $id);
		$param = CCAddParam($param, "INVOICE_DATE", $id2);
	
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		exit;
	}

	if ($T_BILL2->T_INVOICE_ID->GetValue() == $keyId) {
		$T_BILL2->ADLink->Visible = true;
		$T_BILL2->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$T_BILL2->ADLink->Visible = false;
		$T_BILL2->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close T_BILL2_BeforeShowRow @201-CBBC4FCF
    return $T_BILL2_BeforeShowRow;
}
//End Close T_BILL2_BeforeShowRow

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	$dbConn = new clsDBConn();
//DEL   	$query = "SELECT SUM(AMOUNT) AS jml FROM V_T_DETAIL_BIL WHERE  SUBSCRIBER_ID =" . CCGetFromGet('SUBSCRIBER_ID') . "AND START_BILL_DATE =" . "'" . CCGetFromGet('START_BILL_DATE') . "'";
//DEL  	$dbConn->query($query);
//DEL  	$dbConn->next_record();
//DEL  	$hasil = $dbConn->Record;
//DEL  	//print_r($hasil[JML]);
//DEL  	//exit;
//DEL  	
//DEL  	
//DEL     // echo $dbConn->query($this->DataSource->query->GetValue());
//DEL  //	exit;
//DEL  	
//DEL  	$V_T_DETAIL_BIL->TOT_BILL->SetValue($hasil[JML]);
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	$dbConn = new clsDBConn();
//DEL   	$query = "SELECT SUM(TAX_AMOUNT) AS JML_TAX FROM V_T_DETAIL_BIL WHERE  SUBSCRIBER_ID =" . CCGetFromGet('SUBSCRIBER_ID') . "AND START_BILL_DATE =" . "'" . CCGetFromGet('START_BILL_DATE') . "'";
//DEL  	$dbConn->query($query);
//DEL  	$dbConn->next_record();
//DEL  	$hasil = $dbConn->Record;
//DEL  	//print_r($hasil[JML]);
//DEL  	//exit;
//DEL  	
//DEL  	
//DEL     // echo $dbConn->query($this->DataSource->query->GetValue());
//DEL  //	exit;
//DEL  	
//DEL  	$V_T_DETAIL_BIL->TOT_TAX_BILL->SetValue($hasil[JML_TAX]);
//DEL  // -------------------------

//V_T_DETAIL_BIL_BeforeShowRow @225-3828818A
function V_T_DETAIL_BIL_BeforeShowRow(& $sender)
{
    $V_T_DETAIL_BIL_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_T_DETAIL_BIL; //Compatibility
//End V_T_DETAIL_BIL_BeforeShowRow

//Set Row Style @226-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Custom Code @237-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("T_LINE_INVOICE_ID", "");
	$keyId2 = CCGetFromGet("T_INVOICE_ID", "");
	global $id;
	global $id2;
	global $id3;
	//echo "tes";
	//exit;
	//$V_T_DETAIL_BIL->SUBSCRIBER_ID->SetValue(-99);
	if (empty($keyId) && empty($keyId2)) {
		$id = $V_T_DETAIL_BIL->T_INVOICE_ID->GetValue();
		$id2 = $V_T_DETAIL_BIL->T_LINE_INVOICE_ID->GetValue();
		//echo $id1."||".$id2."||".$id3;
		//exit;

		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
	
		$param = CCRemoveParam($param,"T_LINE_INVOICE_ID");
		$param = CCAddParam($param, "T_INVOICE_ID", $id);
		$param = CCAddParam($param, "T_LINE_INVOICE_ID", $id2);
	
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		exit;
	}

	if ($V_T_DETAIL_BIL->T_LINE_INVOICE_ID->GetValue() == $keyId && $V_T_DETAIL_BIL->T_INVOICE_ID->GetValue() == $keyId2) {
		$V_T_DETAIL_BIL->ADLink->Visible = true;
		$V_T_DETAIL_BIL->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$V_T_DETAIL_BIL->ADLink->Visible = false;
		$V_T_DETAIL_BIL->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close V_T_DETAIL_BIL_BeforeShowRow @225-6BEFF1A2
    return $V_T_DETAIL_BIL_BeforeShowRow;
}
//End Close V_T_DETAIL_BIL_BeforeShowRow

//p_customer_account_invoice_BeforeShow @261-037BEA38
function p_customer_account_invoice_BeforeShow(& $sender)
{
    $p_customer_account_invoice_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_customer_account; //Compatibility
//End p_customer_account_invoice_BeforeShow

//Custom Code @262-2A29BDB7
// -------------------------
    // Write your own code here.
	$param = CCGetFromGet("INVOICE_DATE");
	$p_customer_account->invoice->SetValue($param);
// -------------------------
//End Custom Code

//Close p_customer_account_invoice_BeforeShow @261-DE717093
    return $p_customer_account_invoice_BeforeShow;
}
//End Close p_customer_account_invoice_BeforeShow

//p_customer_account_FINANCE_PERIOD_CODE2_BeforeShow @264-0FBB860D
function p_customer_account_FINANCE_PERIOD_CODE2_BeforeShow(& $sender)
{
    $p_customer_account_FINANCE_PERIOD_CODE2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_customer_account; //Compatibility
//End p_customer_account_FINANCE_PERIOD_CODE2_BeforeShow

//Custom Code @265-2A29BDB7
// -------------------------
    // Write your own code here.
	$param = CCGetFromGet("FINANCE_PERIOD_CODE");
	$p_customer_account->FINANCE_PERIOD_CODE->SetValue($param);
// -------------------------
//End Custom Code

//Close p_customer_account_FINANCE_PERIOD_CODE2_BeforeShow @264-ACF5E8D5
    return $p_customer_account_FINANCE_PERIOD_CODE2_BeforeShow;
}
//End Close p_customer_account_FINANCE_PERIOD_CODE2_BeforeShow

//VR_T_INVOICE_COMPONENT_CHRG_AMOUNT_BeforeShow @254-CABFBBA6
function VR_T_INVOICE_COMPONENT_CHRG_AMOUNT_BeforeShow(& $sender)
{
    $VR_T_INVOICE_COMPONENT_CHRG_AMOUNT_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $VR_T_INVOICE_COMPONENT; //Compatibility
//End VR_T_INVOICE_COMPONENT_CHRG_AMOUNT_BeforeShow

//Custom Code @256-2A29BDB7
// -------------------------
    // Write your own code here.
	$dbConn = new clsDBConn();
 	$query = "SELECT SUM(CHARGE_AMOUNT) AS JML FROM paytv.VR_T_INVOICE_COMPONENT WHERE  T_LINE_INVOICE_ID =" . $VR_T_INVOICE_COMPONENT->T_LINE_INVOICE_ID->GetValue() . "AND T_INVOICE_COMPONENT_ID =" . "'" . $VR_T_INVOICE_COMPONENT->T_INVOICE_COMPONENT_ID->GetValue() . "'";
	$dbConn->query($query);
	$dbConn->next_record();
	$hasil = $dbConn->Record;
	//print_r($hasil[JML]);
	//exit;
		
	$VR_T_INVOICE_COMPONENT->CHRG_AMOUNT->SetValue($hasil[JML]);
// -------------------------
//End Custom Code

//Close VR_T_INVOICE_COMPONENT_CHRG_AMOUNT_BeforeShow @254-1500C878
    return $VR_T_INVOICE_COMPONENT_CHRG_AMOUNT_BeforeShow;
}
//End Close VR_T_INVOICE_COMPONENT_CHRG_AMOUNT_BeforeShow

//VR_T_INVOICE_COMPONENT_VT_AMOUNT_BeforeShow @257-632ABF34
function VR_T_INVOICE_COMPONENT_VT_AMOUNT_BeforeShow(& $sender)
{
    $VR_T_INVOICE_COMPONENT_VT_AMOUNT_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $VR_T_INVOICE_COMPONENT; //Compatibility
//End VR_T_INVOICE_COMPONENT_VT_AMOUNT_BeforeShow

//Custom Code @258-2A29BDB7
// -------------------------
    // Write your own code here.
	$dbConn = new clsDBConn();
 	$query = "SELECT SUM(VAT_AMOUNT) AS JML FROM paytv.VR_T_INVOICE_COMPONENT WHERE  T_LINE_INVOICE_ID =" . $VR_T_INVOICE_COMPONENT->T_LINE_INVOICE_ID->GetValue() . "AND T_INVOICE_COMPONENT_ID =" . "'" . $VR_T_INVOICE_COMPONENT->T_INVOICE_COMPONENT_ID->GetValue() . "'";
	$dbConn->query($query);
	$dbConn->next_record();
	$hasil = $dbConn->Record;
	//print_r($hasil[JML]);
	//exit;
		
	$VR_T_INVOICE_COMPONENT->VT_AMOUNT->SetValue($hasil[JML]);
// -------------------------
//End Custom Code

//Close VR_T_INVOICE_COMPONENT_VT_AMOUNT_BeforeShow @257-E668C42B
    return $VR_T_INVOICE_COMPONENT_VT_AMOUNT_BeforeShow;
}
//End Close VR_T_INVOICE_COMPONENT_VT_AMOUNT_BeforeShow

//VR_T_INVOICE_COMPONENT_PC_AMOUNT_BeforeShow @259-93F74C13
function VR_T_INVOICE_COMPONENT_PC_AMOUNT_BeforeShow(& $sender)
{
    $VR_T_INVOICE_COMPONENT_PC_AMOUNT_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $VR_T_INVOICE_COMPONENT; //Compatibility
//End VR_T_INVOICE_COMPONENT_PC_AMOUNT_BeforeShow

//Custom Code @260-2A29BDB7
// -------------------------
    // Write your own code here.
	$dbConn = new clsDBConn();
 	$query = "SELECT SUM(PAYMENT_CHARGE_AMT) AS JML FROM paytv.VR_T_INVOICE_COMPONENT WHERE  T_LINE_INVOICE_ID =" . $VR_T_INVOICE_COMPONENT->T_LINE_INVOICE_ID->GetValue() . "AND T_INVOICE_COMPONENT_ID =" . "'" . $VR_T_INVOICE_COMPONENT->T_INVOICE_COMPONENT_ID->GetValue() . "'";
	$dbConn->query($query);
	$dbConn->next_record();
	$hasil = $dbConn->Record;
	//print_r($hasil[JML]);
	//exit;
		
	$VR_T_INVOICE_COMPONENT->PC_AMOUNT->SetValue($hasil[JML]);
// -------------------------
//End Custom Code

//Close VR_T_INVOICE_COMPONENT_PC_AMOUNT_BeforeShow @259-B69A0A1F
    return $VR_T_INVOICE_COMPONENT_PC_AMOUNT_BeforeShow;
}
//End Close VR_T_INVOICE_COMPONENT_PC_AMOUNT_BeforeShow

//VR_T_INVOICE_COMPONENT_BeforeShowRow @238-FA709D6E
function VR_T_INVOICE_COMPONENT_BeforeShowRow(& $sender)
{
    $VR_T_INVOICE_COMPONENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $VR_T_INVOICE_COMPONENT; //Compatibility
//End VR_T_INVOICE_COMPONENT_BeforeShowRow

//Custom Code @252-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("T_LINE_INVOICE_ID", "");
	$keyId2 = CCGetFromGet("T_INVOICE_COMPONENT_ID", "");
	global $id;
	global $id2;
	global $id3;
	//echo "tes";
	//exit;
	//$V_T_DETAIL_BIL->SUBSCRIBER_ID->SetValue(-99);
	if (empty($keyId) && empty($keyId2)) {
		$id = $V_T_DETAIL_BIL->T_INVOICE_COMPONENT_ID->GetValue();
		$id2 = $V_T_DETAIL_BIL->T_LINE_INVOICE_ID->GetValue();
		//echo $id1."||".$id2."||".$id3;
		//exit;

		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
	
		$param = CCRemoveParam($param,"T_LINE_INVOICE_ID");
		$param = CCAddParam($param, "T_INVOICE_COMPONENT_ID", $id);
		$param = CCAddParam($param, "T_LINE_INVOICE_ID", $id2);
	
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		exit;
	}
// -------------------------
//End Custom Code

//Close VR_T_INVOICE_COMPONENT_BeforeShowRow @238-492F8270
    return $VR_T_INVOICE_COMPONENT_BeforeShowRow;
}
//End Close VR_T_INVOICE_COMPONENT_BeforeShowRow

?>
