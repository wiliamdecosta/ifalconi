<?php
//BindEvents Method @1-0A47E6B1
function BindEvents()
{
    global $CPE;
    global $CPEREQURRINGTARIFF;
    global $CCSEvents;
    $CPE->Navigator->CCSEvents["BeforeShow"] = "CPE_Navigator_BeforeShow";
    $CPE->CCSEvents["BeforeShowRow"] = "CPE_BeforeShowRow";
    $CPEREQURRINGTARIFF->CPE_REQURRING_TARIF_Insert->CCSEvents["BeforeShow"] = "CPEREQURRINGTARIFF_CPE_REQURRING_TARIF_Insert_BeforeShow";
    $CPEREQURRINGTARIFF->CCSEvents["BeforeShowRow"] = "CPEREQURRINGTARIFF_BeforeShowRow";
    $CPEREQURRINGTARIFF->CCSEvents["BeforeShow"] = "CPEREQURRINGTARIFF_BeforeShow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//CPE_Navigator_BeforeShow @19-C1C05D3F
function CPE_Navigator_BeforeShow(& $sender)
{
    $CPE_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPE; //Compatibility
//End CPE_Navigator_BeforeShow

//Custom Code @175-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close CPE_Navigator_BeforeShow @19-79B9C200
    return $CPE_Navigator_BeforeShow;
}
//End Close CPE_Navigator_BeforeShow

//CPE_BeforeShowRow @2-5E8DDD21
function CPE_BeforeShowRow(& $sender)
{
    $CPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPE; //Compatibility
//End CPE_BeforeShowRow

//Custom Code @165-2A29BDB7
// -------------------------
    // Write your own code here.
	global $CPEREQURRINGTARIFF;
    global $selected_id;
    global $add_flag;


    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->SUBSCRIBER_CPE_ID->GetValue();

        $CPEREQURRINGTARIFF->DataSource->Parameters["urlSUBSCRIBER_CPE_ID"] = $selected_id;
        $CPEREQURRINGTARIFF->DataSource->Prepare();
        $CPEREQURRINGTARIFF->EditMode = $CPEREQURRINGTARIFF->DataSource->AllParametersSet;

   }
	$img_radio= "<img border='0' src='../images/radio.gif'>";



// -------------------------
//End Custom Code

//Set Row Style @10-982C9472
   $styles = array("Row", "AltRow");
    $Style = $styles[0];
    if ($Component->DataSource->SUBSCRIBER_CPE_ID->GetValue()== $selected_id) {
    	$img_radio= "<img border='0' src='../images/radio_s.gif'>";
        $Style = $styles[1];
    }	
    
    if (count($styles)) {
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
	
	$Component->DLink->SetValue($img_radio);
//End Set Row Style

	$keyId = CCGetFromGet("SUBSCRIBER_CPE_ID", "");
		global $id;
		if (empty($keyId)) {
			$id = $CPE->SUBSCRIBER_CPE_ID->GetValue();

			global $FileName;
			global $PathToCurrentPage;
			$param = CCGetQueryString("QueryString", "");
			$param = CCRemoveParam($param,"SUBSCRIBER_CPE_ID");
			$param = CCAddParam($param, "SUBSCRIBER_CPE_ID", $id);

		
			$Redirect = $FileName."?".$param;
			header("Location: ".$Redirect);
			exit;
		}

//Close CPE_BeforeShowRow @2-A7041FB6
    return $CPE_BeforeShowRow;
}
//End Close CPE_BeforeShowRow

//CPEREQURRINGTARIFF_CPE_REQURRING_TARIF_Insert_BeforeShow @115-9F6771B9
function CPEREQURRINGTARIFF_CPE_REQURRING_TARIF_Insert_BeforeShow(& $sender)
{
    $CPEREQURRINGTARIFF_CPE_REQURRING_TARIF_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPEREQURRINGTARIFF; //Compatibility
//End CPEREQURRINGTARIFF_CPE_REQURRING_TARIF_Insert_BeforeShow

//Custom Code @172-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
	global $Redirect;

	$FileName = "subscriber_cpe_form2.php";

	$CPEREQURRINGTARIFF->CPE_REQURRING_TARIF_Insert->Page = $FileName;
	$CPEREQURRINGTARIFF->CPE_REQURRING_TARIF_Insert->Parameters = CCGetQueryString("QueryString", "");
	$CPEREQURRINGTARIFF->CPE_REQURRING_TARIF_Insert->Parameters = CCRemoveParam($CPEREQURRINGTARIFF->CPE_REQURRING_TARIF_Insert->Parameters, "SUBSCRIBER_CPE_TARIFF_ID");
	$CPEREQURRINGTARIFF->CPE_REQURRING_TARIF_Insert->Parameters = CCAddParam($CPEREQURRINGTARIFF->CPE_REQURRING_TARIF_Insert->Parameters, "SUBSCRIBER_CPE_ID", "$selected_id");
	
	
	$Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));

// -------------------------
//End Custom Code

//Close CPEREQURRINGTARIFF_CPE_REQURRING_TARIF_Insert_BeforeShow @115-3D4C58B3
    return $CPEREQURRINGTARIFF_CPE_REQURRING_TARIF_Insert_BeforeShow;
}
//End Close CPEREQURRINGTARIFF_CPE_REQURRING_TARIF_Insert_BeforeShow

//CPEREQURRINGTARIFF_BeforeShowRow @110-5E47E471
function CPEREQURRINGTARIFF_BeforeShowRow(& $sender)
{
    $CPEREQURRINGTARIFF_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPEREQURRINGTARIFF; //Compatibility
//End CPEREQURRINGTARIFF_BeforeShowRow

//Set Row Style @119-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close CPEREQURRINGTARIFF_BeforeShowRow @110-A697AC3D
    return $CPEREQURRINGTARIFF_BeforeShowRow;
}
//End Close CPEREQURRINGTARIFF_BeforeShowRow

//CPEREQURRINGTARIFF_BeforeShow @110-D7D98A3F
function CPEREQURRINGTARIFF_BeforeShow(& $sender)
{
    $CPEREQURRINGTARIFF_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPEREQURRINGTARIFF; //Compatibility
//End CPEREQURRINGTARIFF_BeforeShow

//Custom Code @176-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close CPEREQURRINGTARIFF_BeforeShow @110-C4EFAB0C
    return $CPEREQURRINGTARIFF_BeforeShow;
}
//End Close CPEREQURRINGTARIFF_BeforeShow

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_start();
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_end_clean();
//DEL  	if(is_array($V_SUBSCRIBER_CPE->DataSource->Provider->Error)) {
//DEL  		$error_msg = $V_SUBSCRIBER_CPE->DataSource->Provider->Error['message'];
//DEL  		$V_SUBSCRIBER_CPE->Errors->addError($error_msg);
//DEL  	};
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_start();
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_end_clean();
//DEL  	if(is_array($V_SUBSCRIBER_CPE->DataSource->Provider->Error)) {
//DEL  		$error_msg = $V_SUBSCRIBER_CPE->DataSource->Provider->Error['message'];
//DEL  		$V_SUBSCRIBER_CPE->Errors->addError($error_msg);
//DEL  	};
//DEL  
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_start();
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_end_clean();
//DEL  	if(is_array($V_SUBSCRIBER_CPE->DataSource->Provider->Error)) {
//DEL  		$error_msg = $V_SUBSCRIBER_CPE->DataSource->Provider->Error['message'];
//DEL  		$V_SUBSCRIBER_CPE->Errors->addError($error_msg);
//DEL  	};
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_start();
//DEL  // -------------------------
//DEL

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_start();
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_end_clean();
//DEL  	if(is_array($V_SUBSCRIBER_CPE->DataSource->Provider->Error)) {
//DEL  		$error_msg = $V_SUBSCRIBER_CPE->DataSource->Provider->Error['message'];
//DEL  		$V_SUBSCRIBER_CPE->Errors->addError($error_msg);
//DEL  	};
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_start();
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_end_clean();
//DEL  	if(is_array($V_SUBSCRIBER_CPE->DataSource->Provider->Error)) {
//DEL  		$error_msg = $V_SUBSCRIBER_CPE->DataSource->Provider->Error['message'];
//DEL  		$V_SUBSCRIBER_CPE->Errors->addError($error_msg);
//DEL  	};
//DEL  
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_start();
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  	ob_end_clean();
//DEL  	if(is_array($V_SUBSCRIBER_CPE->DataSource->Provider->Error)) {
//DEL  		$error_msg = $V_SUBSCRIBER_CPE->DataSource->Provider->Error['message'];
//DEL  		$V_SUBSCRIBER_CPE->Errors->addError($error_msg);
//DEL  	};
//DEL  // -------------------------

//Page_OnInitializeView @1-8A014BE4
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $subscriber_cpe; //Compatibility
//End Page_OnInitializeView

//Custom Code @166-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("SUBSCRIBER_CPE_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
