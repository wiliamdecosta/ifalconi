<?php
//BindEvents Method @1-045297C8
function BindEvents()
{
    global $T_BILL2;
    global $V_T_DETAIL_BIL;
    global $V_DETAIL_BILL_BY_ACCOUNT;
    $T_BILL2->CCSEvents["BeforeShowRow"] = "T_BILL2_BeforeShowRow";
    $V_T_DETAIL_BIL->TOT_BILL->CCSEvents["BeforeShow"] = "V_T_DETAIL_BIL_TOT_BILL_BeforeShow";
    $V_T_DETAIL_BIL->TOT_TAX_BILL->CCSEvents["BeforeShow"] = "V_T_DETAIL_BIL_TOT_TAX_BILL_BeforeShow";
    $V_T_DETAIL_BIL->CCSEvents["BeforeShowRow"] = "V_T_DETAIL_BIL_BeforeShowRow";
    $V_DETAIL_BILL_BY_ACCOUNT->TOT_AMOUNT->CCSEvents["BeforeShow"] = "V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT_BeforeShow";
    $V_DETAIL_BILL_BY_ACCOUNT->TOT_AMOUNT1->CCSEvents["BeforeShow"] = "V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT1_BeforeShow";
    $V_DETAIL_BILL_BY_ACCOUNT->CCSEvents["BeforeShowRow"] = "V_DETAIL_BILL_BY_ACCOUNT_BeforeShowRow";
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
	$keyId = CCGetFromGet("SUBSCRIBER_ID", "");
    //$T_BILL2->SUBSCRIBER_ID->SetValue(-99);
	global $id;
	global $id2;
	global $id3;
	global $id4;
	global $id5;
	if (empty($keyId)) {
		$id = $T_BILL2->SUBSCRIBER_ID->GetValue();
		$id2 = $T_BILL2->INVOICE_DATE->GetFormattedValue();
		$id3 = $T_BILL2->INPUT_DATA_CONTROL_ID->GetValue();
		$id4 = $T_BILL2->START_BILL_DATE->GetFormattedValue();
		$id5 = $T_BILL2->ACCOUNT_ID->GetValue();
		//echo $id1."||".$id2."||".$id3;
		//exit;

		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
	
		//$param = CCRemoveParam($param,"SUBSCRIBER_ID");
		$param = CCAddParam($param, "SUBSCRIBER_ID", $id);
		$param = CCAddParam($param, "INVOICE_DATE", $id2);
		$param = CCAddParam($param, "INPUT_DATA_CONTROL_ID", $id3);
		$param = CCAddParam($param, "START_BILL_DATE", $id4);
		$param = CCAddParam($param, "ACCOUNT_ID", $id5);
	
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		exit;
	}

	if ($T_BILL2->SUBSCRIBER_ID->GetValue() == $keyId) {
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

//V_T_DETAIL_BIL_TOT_BILL_BeforeShow @244-DD0D1EEC
function V_T_DETAIL_BIL_TOT_BILL_BeforeShow(& $sender)
{
    $V_T_DETAIL_BIL_TOT_BILL_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_T_DETAIL_BIL; //Compatibility
//End V_T_DETAIL_BIL_TOT_BILL_BeforeShow

//Custom Code @246-2A29BDB7
// -------------------------
    // Write your own code here.
	$dbConn = new clsDBConn();
 	$query = "SELECT SUM(AMOUNT) AS jml FROM V_T_DETAIL_BIL WHERE  SUBSCRIBER_ID =" . CCGetFromGet('SUBSCRIBER_ID') . "AND START_BILL_DATE =" . "'" . CCGetFromGet('START_BILL_DATE') . "'";
	$dbConn->query($query);
	$dbConn->next_record();
	$hasil = $dbConn->Record;
	//print_r($hasil[JML]);
	//exit;
	
	
   // echo $dbConn->query($this->DataSource->query->GetValue());
//	exit;
	
	$V_T_DETAIL_BIL->TOT_BILL->SetValue($hasil[JML]);
// -------------------------
//End Custom Code

//Close V_T_DETAIL_BIL_TOT_BILL_BeforeShow @244-D55FF27B
    return $V_T_DETAIL_BIL_TOT_BILL_BeforeShow;
}
//End Close V_T_DETAIL_BIL_TOT_BILL_BeforeShow

//V_T_DETAIL_BIL_TOT_TAX_BILL_BeforeShow @245-1F02238D
function V_T_DETAIL_BIL_TOT_TAX_BILL_BeforeShow(& $sender)
{
    $V_T_DETAIL_BIL_TOT_TAX_BILL_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_T_DETAIL_BIL; //Compatibility
//End V_T_DETAIL_BIL_TOT_TAX_BILL_BeforeShow

//Custom Code @247-2A29BDB7
// -------------------------
    // Write your own code here.
	$dbConn = new clsDBConn();
 	$query = "SELECT SUM(TAX_AMOUNT) AS JML_TAX FROM V_T_DETAIL_BIL WHERE  SUBSCRIBER_ID =" . CCGetFromGet('SUBSCRIBER_ID') . "AND START_BILL_DATE =" . "'" . CCGetFromGet('START_BILL_DATE') . "'";
	$dbConn->query($query);
	$dbConn->next_record();
	$hasil = $dbConn->Record;
	//print_r($hasil[JML]);
	//exit;

	
	
   // echo $dbConn->query($this->DataSource->query->GetValue());
//	exit;
	
	$V_T_DETAIL_BIL->TOT_TAX_BILL->SetValue($hasil[JML_TAX]);
// -------------------------
//End Custom Code

//Close V_T_DETAIL_BIL_TOT_TAX_BILL_BeforeShow @245-C2336CEA
    return $V_T_DETAIL_BIL_TOT_TAX_BILL_BeforeShow;
}
//End Close V_T_DETAIL_BIL_TOT_TAX_BILL_BeforeShow

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
	$keyId = CCGetFromGet("SUBSCRIBER_ID", "");
    $keyId2 = CCGetFromGet("BILL_COMPONENT_ID", "");
	global $id6;
	global $id7;
	global $id8;
	//echo "tes";
	//exit;
	//$V_T_DETAIL_BIL->SUBSCRIBER_ID->SetValue(-99);
	if (empty($keyId2)) {
		$id6 = $V_T_DETAIL_BIL->SUBSCRIBER_ID->GetValue();
		$id7 = $V_T_DETAIL_BIL->START_BILL_DATE->GetFormattedValue();
		$id8 = $V_T_DETAIL_BIL->BILL_COMPONENT_ID->GetValue();
		//echo $id5;
		//exit;

		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
	
		$param = CCRemoveParam($param,"SUBSCRIBER_ID");
		$param = CCAddParam($param, "SUBSCRIBER_ID", $id6);
		$param = CCAddParam($param, "START_BILL_DATE", $id7);
		$param = CCAddParam($param, "BILL_COMPONENT_ID", $id8);
	
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		exit;
	}
// -------------------------
//End Custom Code

//Close V_T_DETAIL_BIL_BeforeShowRow @225-6BEFF1A2
    return $V_T_DETAIL_BIL_BeforeShowRow;
}
//End Close V_T_DETAIL_BIL_BeforeShowRow

//V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT_BeforeShow @258-5A3E8EF0
function V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT_BeforeShow(& $sender)
{
    $V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_DETAIL_BILL_BY_ACCOUNT; //Compatibility
//End V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT_BeforeShow

//Custom Code @259-2A29BDB7
// -------------------------
    // Write your own code here.
	$dbConn = new clsDBConn();
 	$query = "SELECT SUM(AMOUNT) AS JML FROM V_DETAIL_BILL_BY_ACCOUNT WHERE  CUSTOMER_ACCOUNT_ID =" . $V_DETAIL_BILL_BY_ACCOUNT->CUSTOMER_ACCOUNT_ID->GetValue() . "AND START_BILL_DATE =" . "'" . CCGetFromGet('START_BILL_DATE') . "'";
	$dbConn->query($query);
	$dbConn->next_record();
	$hasil = $dbConn->Record;
	//print_r($query);
	//exit;
	
	
	$V_DETAIL_BILL_BY_ACCOUNT->TOT_AMOUNT->SetValue($hasil[JML]);
// -------------------------
//End Custom Code

//Close V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT_BeforeShow @258-AA6613FE
    return $V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT_BeforeShow;
}
//End Close V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT_BeforeShow

//V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT1_BeforeShow @266-B194535D
function V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT1_BeforeShow(& $sender)
{
    $V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_DETAIL_BILL_BY_ACCOUNT; //Compatibility
//End V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT1_BeforeShow

//Custom Code @267-2A29BDB7
// -------------------------
    // Write your own code here.
	$dbConn = new clsDBConn();
 	$query = "SELECT SUM(AMOUNT) AS JML FROM V_DETAIL_BILL_BY_ACCOUNT WHERE  CUSTOMER_ACCOUNT_ID =" . $V_DETAIL_BILL_BY_ACCOUNT->CUSTOMER_ACCOUNT_ID->GetValue() . "AND START_BILL_DATE =" . "'" . CCGetFromGet('START_BILL_DATE') . "'";
	$dbConn->query($query);
	$dbConn->next_record();
	$hasil = $dbConn->Record;
	
	
	
	$V_DETAIL_BILL_BY_ACCOUNT->TOT_AMOUNT1->SetValue($hasil[JML]);
// -------------------------
//End Custom Code

//Close V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT1_BeforeShow @266-6DFBFDE0
    return $V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT1_BeforeShow;
}
//End Close V_DETAIL_BILL_BY_ACCOUNT_TOT_AMOUNT1_BeforeShow

//V_DETAIL_BILL_BY_ACCOUNT_BeforeShowRow @248-C0A22CB1
function V_DETAIL_BILL_BY_ACCOUNT_BeforeShowRow(& $sender)
{
    $V_DETAIL_BILL_BY_ACCOUNT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_DETAIL_BILL_BY_ACCOUNT; //Compatibility
//End V_DETAIL_BILL_BY_ACCOUNT_BeforeShowRow

//Set Row Style @249-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL      $keyId2 = CCGetFromGet("SUBSCRIBER_ID", "");
//DEL  	$keyId = CCGetFromGet("ACCOUNT_ID", "");
//DEL  	$keyId3 = CCGetFromGet("START_BILL_DATE", "");
//DEL  	global $id6;
//DEL  	global $id7;
//DEL  	global $id8;
//DEL  	
//DEL  	//$V_T_DETAIL_BIL->SUBSCRIBER_ID->SetValue(-99);
//DEL  	if (empty($keyId2) && empty($keyId) && empty($keyId3)) {
//DEL  		$id9 = $V_DETAIL_BILL_BY_ACCOUNT->SUBSCRIBER_ID->GetValue();
//DEL  		$id10 = $V_DETAIL_BILL_BY_ACCOUNT->START_BILL_DATE->GetFormattedValue();
//DEL  		$id11 = $V_DETAIL_BILL_BY_ACCOUNT->CUSTOMER_ACCOUNT_ID->GetValue();
//DEL  		//echo $id5;
//DEL  		//exit;
//DEL  	
//DEL  		global $FileName;
//DEL  		global $PathToCurrentPage;
//DEL  		$param = CCGetQueryString("QueryString", "");
//DEL  		
//DEL  		$param = CCRemoveParam($param,"SUBSCRIBER_ID");
//DEL  		$param = CCAddParam($param, "SUBSCRIBER_ID", $id9);
//DEL  		$param = CCAddParam($param, "START_BILL_DATE", $id10);
//DEL  		$param = CCAddParam($param, "ACCOUNT_ID", $id11);
//DEL  	
//DEL  		$Redirect = $FileName."?".$param;
//DEL  	
//DEL  		//die($Redirect);
//DEL  		header("Location: ".$Redirect);
//DEL  		exit;
//DEL  	}
//DEL  // -------------------------


//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	$keyId = CCGetFromGet("SUBSCRIBER_ID", "");
//DEL  	global $id9;
//DEL  	global $id11;
//DEL  	global $id10;
//DEL  	//echo "tes";
//DEL  	//exit;
//DEL  	//$V_T_DETAIL_BIL->SUBSCRIBER_ID->SetValue(-99);
//DEL  	if (empty($keyId2)) {
//DEL  		$id9 = $V_DETAIL_BILL_BY_ACCOUNT->SUBSCRIBER_ID->GetValue();
//DEL  		$id10 = $V_DETAIL_BILL_BY_ACCOUNT->START_BILL_DATE->GetFormattedValue();
//DEL  		$id11 = $V_DETAIL_BILL_BY_ACCOUNT->CUSTOMER_ACCOUNT_ID->GetValue();
//DEL  		//echo $id5;
//DEL  		//exit;
//DEL  
//DEL  		global $FileName;
//DEL  		global $PathToCurrentPage;
//DEL  		$param = CCGetQueryString("QueryString", "");
//DEL  		
//DEL  	
//DEL  		//$param = CCRemoveParam($param,"SUBSCRIBER_ID");
//DEL  		//$param = CCAddParam($param, "SUBSCRIBER2_ID", $id9);
//DEL  		//$param = CCAddParam($param, "START_BILL_DATE", $id10);
//DEL  		//$param = CCAddParam($param, "ACCOUNT_ID", $id11);
//DEL  	
//DEL  		$Redirect = $FileName."?".$param;
//DEL  		//die($Redirect);
//DEL  		header("Location: ".$Redirect);
//DEL  		exit;
//DEL  	}
//DEL  // -------------------------


//Close V_DETAIL_BILL_BY_ACCOUNT_BeforeShowRow @248-8D4FF768
    return $V_DETAIL_BILL_BY_ACCOUNT_BeforeShowRow;
}
//End Close V_DETAIL_BILL_BY_ACCOUNT_BeforeShowRow

?>
