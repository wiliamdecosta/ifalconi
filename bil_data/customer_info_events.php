<?php
//BindEvents Method @1-8860C7E2
function BindEvents()
{
    global $CUSTOMER_INFOgrid;
    global $CUSTOMER_INFOrecord;
    global $CCSEvents;
    $CUSTOMER_INFOgrid->Navigator->CCSEvents["BeforeShow"] = "CUSTOMER_INFOgrid_Navigator_BeforeShow";
    $CUSTOMER_INFOgrid->P_CUSTOMERINFO_Insert->CCSEvents["BeforeShow"] = "CUSTOMER_INFOgrid_P_CUSTOMERINFO_Insert_BeforeShow";
    $CUSTOMER_INFOgrid->CCSEvents["BeforeShowRow"] = "CUSTOMER_INFOgrid_BeforeShowRow";
    $CUSTOMER_INFOrecord->INFO_DESC_1->CCSEvents["OnValidate"] = "CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate";
    $CUSTOMER_INFOrecord->ds->CCSEvents["BeforeExecuteInsert"] = "CUSTOMER_INFOrecord_ds_BeforeExecuteInsert";
    $CUSTOMER_INFOrecord->ds->CCSEvents["AfterExecuteInsert"] = "CUSTOMER_INFOrecord_ds_AfterExecuteInsert";
    $CUSTOMER_INFOrecord->ds->CCSEvents["BeforeExecuteUpdate"] = "CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate";
    $CUSTOMER_INFOrecord->ds->CCSEvents["AfterExecuteUpdate"] = "CUSTOMER_INFOrecord_ds_AfterExecuteUpdate";
    $CUSTOMER_INFOrecord->ds->CCSEvents["BeforeExecuteDelete"] = "CUSTOMER_INFOrecord_ds_BeforeExecuteDelete";
    $CUSTOMER_INFOrecord->ds->CCSEvents["AfterExecuteDelete"] = "CUSTOMER_INFOrecord_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//CUSTOMER_INFOgrid_Navigator_BeforeShow @134-DB65AEDB
function CUSTOMER_INFOgrid_Navigator_BeforeShow(& $sender)
{
    $CUSTOMER_INFOgrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOgrid; //Compatibility
//End CUSTOMER_INFOgrid_Navigator_BeforeShow

//Custom Code @135-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOgrid_Navigator_BeforeShow @134-332DDFAE
    return $CUSTOMER_INFOgrid_Navigator_BeforeShow;
}
//End Close CUSTOMER_INFOgrid_Navigator_BeforeShow

//CUSTOMER_INFOgrid_P_CUSTOMERINFO_Insert_BeforeShow @145-956B826E
function CUSTOMER_INFOgrid_P_CUSTOMERINFO_Insert_BeforeShow(& $sender)
{
    $CUSTOMER_INFOgrid_P_CUSTOMERINFO_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOgrid; //Compatibility
//End CUSTOMER_INFOgrid_P_CUSTOMERINFO_Insert_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$CUSTOMER_INFOgrid->P_CUSTOMERINFO_Insert->Page = $FileName;
	$CUSTOMER_INFOgrid->P_CUSTOMERINFO_Insert->Parameters = CCGetQueryString("QueryString", "");
	$CUSTOMER_INFOgrid->P_CUSTOMERINFO_Insert->Parameters = CCRemoveParam($CUSTOMER_INFOgrid->P_CUSTOMERINFO_Insert->Parameters, "CUSTOMER_INFO_ID");
	$CUSTOMER_INFOgrid->P_CUSTOMERINFO_Insert->Parameters = CCAddParam($CUSTOMER_INFOgrid->P_CUSTOMERINFO_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOgrid_P_CUSTOMERINFO_Insert_BeforeShow @145-4787DC35
    return $CUSTOMER_INFOgrid_P_CUSTOMERINFO_Insert_BeforeShow;
}
//End Close CUSTOMER_INFOgrid_P_CUSTOMERINFO_Insert_BeforeShow

//CUSTOMER_INFOgrid_BeforeShowRow @2-4D539E1A
function CUSTOMER_INFOgrid_BeforeShowRow(& $sender)
{
    $CUSTOMER_INFOgrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOgrid; //Compatibility
//End CUSTOMER_INFOgrid_BeforeShowRow	
	global $CUSTOMER_INFOrecord;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->CUSTOMER_INFO_ID->GetValue();
        $CUSTOMER_INFOrecord->DataSource->Parameters["urlCUSTOMER_INFO_ID"] = $selected_id;
        $CUSTOMER_INFOrecord->DataSource->Prepare();
        $CUSTOMER_INFOrecord->EditMode = $CUSTOMER_INFOrecord->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

//Set Row Style @37-982C9472
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->CUSTOMER_INFO_ID->GetValue()== $selected_id) {
    	$img_radio= "<img border='0' src='../images/radio_s.gif'>";
        $Style = $styles[1];
    }	
    
    if (count($styles)) {
//        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style
    $Component->DLink->SetValue($img_radio);  // Bdr
//End Set Row Style

//Close CUSTOMER_INFOgrid_BeforeShowRow @2-72D01009
    return $CUSTOMER_INFOgrid_BeforeShowRow;
}
//End Close CUSTOMER_INFOgrid_BeforeShowRow

//CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate @337-17F6A04B
function CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate(& $sender)
{
    $CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOrecord; //Compatibility
//End CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate

//Custom Code @432-2A29BDB7
// -------------------------
    // Write your own code here.
	$CODE = $CUSTOMER_INFOrecord->INFO_TYPE_CODE->GetText();
	switch ($CODE){
	case "EMAIL":
		global $CCSLocales;
	    if (CCStrLen($Component->GetText()) && !preg_match("/^[\w\.-]{1,}\@([\da-zA-Z-]{1,}\.){1,}[\da-zA-Z-]+$/", $Component->GetText()))
	    {
	        $Component->Errors->addError($CCSLocales->GetText("CCS_IncorrectEmailFormat", $Component->Caption));
	    }
	break;

	case "NO HP";
		global $CCSLocales;
	    if (CCStrLen($Component->GetText()) && !preg_match("/^[0-9]+$/", $Component->GetText())) {
	        $Component->Errors->addError($CCSLocales->GetText("CCS_IncorrectPhoneFormat", $Component->Caption));
	    }
	break;
	case "NO TELEPON RUMAH";
		global $CCSLocales;
	    if (CCStrLen($Component->GetText()) && !preg_match("/^[0-9\-]+$/", $Component->GetText())) {
	        $Component->Errors->addError($CCSLocales->GetText("CCS_IncorrectPhoneFormat", $Component->Caption));
	    }
	break;

	}
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate @337-699512D9
    return $CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate;
}
//End Close CUSTOMER_INFOrecord_INFO_DESC_1_OnValidate

   

//CUSTOMER_INFOrecord_ds_BeforeExecuteInsert @97-7EF1BE95
function CUSTOMER_INFOrecord_ds_BeforeExecuteInsert(& $sender)
{
    $CUSTOMER_INFOrecord_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOrecord; //Compatibility
//End CUSTOMER_INFOrecord_ds_BeforeExecuteInsert

//Custom Code @426-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOrecord_ds_BeforeExecuteInsert @97-17B7F45A
    return $CUSTOMER_INFOrecord_ds_BeforeExecuteInsert;
}
//End Close CUSTOMER_INFOrecord_ds_BeforeExecuteInsert

//CUSTOMER_INFOrecord_ds_AfterExecuteInsert @97-BF83B410
function CUSTOMER_INFOrecord_ds_AfterExecuteInsert(& $sender)
{
    $CUSTOMER_INFOrecord_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOrecord; //Compatibility
//End CUSTOMER_INFOrecord_ds_AfterExecuteInsert

//Custom Code @427-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($CUSTOMER_INFOrecord->DataSource->Provider->Error)) {
		$error_msg = $CUSTOMER_INFOrecord->DataSource->Provider->Error['message'];
		$CUSTOMER_INFOrecord->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOrecord_ds_AfterExecuteInsert @97-5577B742
    return $CUSTOMER_INFOrecord_ds_AfterExecuteInsert;
}
//End Close CUSTOMER_INFOrecord_ds_AfterExecuteInsert

//CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate @97-3A6321EF
function CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate(& $sender)
{
    $CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOrecord; //Compatibility
//End CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate

//Custom Code @428-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate @97-D89E35D5
    return $CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate;
}
//End Close CUSTOMER_INFOrecord_ds_BeforeExecuteUpdate

//CUSTOMER_INFOrecord_ds_AfterExecuteUpdate @97-C963AC02
function CUSTOMER_INFOrecord_ds_AfterExecuteUpdate(& $sender)
{
    $CUSTOMER_INFOrecord_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOrecord; //Compatibility
//End CUSTOMER_INFOrecord_ds_AfterExecuteUpdate

//Custom Code @429-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($CUSTOMER_INFOrecord->DataSource->Provider->Error)) {
		$error_msg = $CUSTOMER_INFOrecord->DataSource->Provider->Error['message'];
		$CUSTOMER_INFOrecord->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOrecord_ds_AfterExecuteUpdate @97-9A5E76CD
    return $CUSTOMER_INFOrecord_ds_AfterExecuteUpdate;
}
//End Close CUSTOMER_INFOrecord_ds_AfterExecuteUpdate

//CUSTOMER_INFOrecord_ds_BeforeExecuteDelete @97-415FB765
function CUSTOMER_INFOrecord_ds_BeforeExecuteDelete(& $sender)
{
    $CUSTOMER_INFOrecord_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOrecord; //Compatibility
//End CUSTOMER_INFOrecord_ds_BeforeExecuteDelete

//Custom Code @430-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOrecord_ds_BeforeExecuteDelete @97-44BA93A4
    return $CUSTOMER_INFOrecord_ds_BeforeExecuteDelete;
}
//End Close CUSTOMER_INFOrecord_ds_BeforeExecuteDelete

//CUSTOMER_INFOrecord_ds_AfterExecuteDelete @97-DC2C628E
function CUSTOMER_INFOrecord_ds_AfterExecuteDelete(& $sender)
{
    $CUSTOMER_INFOrecord_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CUSTOMER_INFOrecord; //Compatibility
//End CUSTOMER_INFOrecord_ds_AfterExecuteDelete

//Custom Code @431-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($CUSTOMER_INFOrecord->DataSource->Provider->Error)) {
		$error_msg = $CUSTOMER_INFOrecord->DataSource->Provider->Error['message'];
		$CUSTOMER_INFOrecord->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close CUSTOMER_INFOrecord_ds_AfterExecuteDelete @97-067AD0BC
    return $CUSTOMER_INFOrecord_ds_AfterExecuteDelete;
}
//End Close CUSTOMER_INFOrecord_ds_AfterExecuteDelete


//Page_OnInitializeView @1-FEDFC72B
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $customer_info; //Compatibility
//End Page_OnInitializeView

//Custom Code @142-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("CUSTOMER_INFO_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-9A37CC99
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $customer_info; //Compatibility
//End Page_BeforeShow

//Custom Code @273-2A29BDB7
// -------------------------
    // Write your own code here.
	global $V_CUSTOMERINFOSearch;
	global $CUSTOMER_INFOgrid;
	global $CUSTOMER_INFOrecord;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$V_CUSTOMERINFOSearch->Visible = false;
		$CUSTOMER_INFOgrid->Visible = false;
		$CUSTOMER_INFOrecord->Visible = true;
		$CUSTOMER_INFOrecord->ds->SQL = "";
	} else {
		$V_CUSTOMERINFOSearch->Visible = true;
		$CUSTOMER_INFOgrid->Visible = true;
		$CUSTOMER_INFOrecord->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
