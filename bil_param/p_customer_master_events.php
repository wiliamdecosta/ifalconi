<?php
//BindEvents Method @1-FDE585A4
function BindEvents()
{
    global $V_CUSTOMER;
    global $CustomerForm;
    global $CCSEvents;
    $V_CUSTOMER->Navigator->CCSEvents["BeforeShow"] = "V_CUSTOMER_Navigator_BeforeShow";
    $V_CUSTOMER->P_CUSTOMER_Insert->CCSEvents["BeforeShow"] = "V_CUSTOMER_P_CUSTOMER_Insert_BeforeShow";
    $V_CUSTOMER->CCSEvents["BeforeShowRow"] = "V_CUSTOMER_BeforeShowRow";
    $CustomerForm->ds->CCSEvents["BeforeExecuteInsert"] = "CustomerForm_ds_BeforeExecuteInsert";
    $CustomerForm->ds->CCSEvents["AfterExecuteInsert"] = "CustomerForm_ds_AfterExecuteInsert";
    $CustomerForm->ds->CCSEvents["BeforeExecuteUpdate"] = "CustomerForm_ds_BeforeExecuteUpdate";
    $CustomerForm->ds->CCSEvents["AfterExecuteUpdate"] = "CustomerForm_ds_AfterExecuteUpdate";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//V_CUSTOMER_Navigator_BeforeShow @134-6C6AE576
function V_CUSTOMER_Navigator_BeforeShow(& $sender)
{
    $V_CUSTOMER_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUSTOMER; //Compatibility
//End V_CUSTOMER_Navigator_BeforeShow

//Custom Code @135-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close V_CUSTOMER_Navigator_BeforeShow @134-1E5B3AF3
    return $V_CUSTOMER_Navigator_BeforeShow;
}
//End Close V_CUSTOMER_Navigator_BeforeShow

//V_CUSTOMER_P_CUSTOMER_Insert_BeforeShow @145-B97D6901
function V_CUSTOMER_P_CUSTOMER_Insert_BeforeShow(& $sender)
{
    $V_CUSTOMER_P_CUSTOMER_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUSTOMER; //Compatibility
//End V_CUSTOMER_P_CUSTOMER_Insert_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	// Write your own code here.
	global $FileName;
	$V_CUSTOMER->P_CUSTOMER_Insert->Page = $FileName;
	$V_CUSTOMER->P_CUSTOMER_Insert->Parameters = CCGetQueryString("QueryString", "");
	$V_CUSTOMER->P_CUSTOMER_Insert->Parameters = CCRemoveParam($V_CUSTOMER->P_CUSTOMER_Insert->Parameters, "CUSTOMER_ID");
	$V_CUSTOMER->P_CUSTOMER_Insert->Parameters = CCAddParam($V_CUSTOMER->P_CUSTOMER_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code
// -------------------------
//End Custom Code

//Close V_CUSTOMER_P_CUSTOMER_Insert_BeforeShow @145-4C26AE5F
    return $V_CUSTOMER_P_CUSTOMER_Insert_BeforeShow;
}
//End Close V_CUSTOMER_P_CUSTOMER_Insert_BeforeShow

//V_CUSTOMER_BeforeShowRow @2-69BD27EC
function V_CUSTOMER_BeforeShowRow(& $sender)
{
    $V_CUSTOMER_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_CUSTOMER; //Compatibility
//End V_CUSTOMER_BeforeShowRow
	
	global $CustomerForm;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->CUSTOMER_ID->GetValue();
        $CustomerForm->DataSource->Parameters["urlCUSTOMER_ID"] = $selected_id;
        $CustomerForm->DataSource->Prepare();
        $CustomerForm->EditMode = $CustomerForm->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

//Set Row Style @37-982C9472
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->CUSTOMER_ID->GetValue()== $selected_id) {
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

//Close V_CUSTOMER_BeforeShowRow @2-F2F31AB5
    return $V_CUSTOMER_BeforeShowRow;
}
//End Close V_CUSTOMER_BeforeShowRow

//CustomerForm_ds_BeforeExecuteInsert @97-656D5836
function CustomerForm_ds_BeforeExecuteInsert(& $sender)
{
    $CustomerForm_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CustomerForm; //Compatibility
//End CustomerForm_ds_BeforeExecuteInsert

//Custom Code @331-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close CustomerForm_ds_BeforeExecuteInsert @97-1DBE5E78
    return $CustomerForm_ds_BeforeExecuteInsert;
}
//End Close CustomerForm_ds_BeforeExecuteInsert

//CustomerForm_ds_AfterExecuteInsert @97-4A3D6DED
function CustomerForm_ds_AfterExecuteInsert(& $sender)
{
    $CustomerForm_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CustomerForm; //Compatibility
//End CustomerForm_ds_AfterExecuteInsert

//Custom Code @332-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($CustomerForm->DataSource->Provider->Error)) {
		$error_msg = $CustomerForm->DataSource->Provider->Error['message'];
		$CustomerForm->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close CustomerForm_ds_AfterExecuteInsert @97-5C73B2CC
    return $CustomerForm_ds_AfterExecuteInsert;
}
//End Close CustomerForm_ds_AfterExecuteInsert

//CustomerForm_ds_BeforeExecuteUpdate @97-61D66A79
function CustomerForm_ds_BeforeExecuteUpdate(& $sender)
{
    $CustomerForm_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CustomerForm; //Compatibility
//End CustomerForm_ds_BeforeExecuteUpdate

//Custom Code @333-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close CustomerForm_ds_BeforeExecuteUpdate @97-D2979FF7
    return $CustomerForm_ds_BeforeExecuteUpdate;
}
//End Close CustomerForm_ds_BeforeExecuteUpdate

//CustomerForm_ds_AfterExecuteUpdate @97-41E7F7F1
function CustomerForm_ds_AfterExecuteUpdate(& $sender)
{
    $CustomerForm_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CustomerForm; //Compatibility
//End CustomerForm_ds_AfterExecuteUpdate

//Custom Code @334-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($CustomerForm->DataSource->Provider->Error)) {
		$error_msg = $CustomerForm->DataSource->Provider->Error['message'];
		$CustomerForm->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close CustomerForm_ds_AfterExecuteUpdate @97-935A7343
    return $CustomerForm_ds_AfterExecuteUpdate;
}
//End Close CustomerForm_ds_AfterExecuteUpdate

//Page_OnInitializeView @1-9845E3B9
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_customer_master; //Compatibility
//End Page_OnInitializeView

//Custom Code @142-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("CUSTOMER_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-FF1356EC
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_customer_master; //Compatibility
//End Page_BeforeShow

//Custom Code @273-2A29BDB7
// -------------------------
    // Write your own code here.
	global $V_CUSTOMERSearch;
	global $V_CUSTOMER;
	global $CustomerForm;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$V_CUSTOMERSearch->Visible = false;
		$V_CUSTOMER->Visible = false;
		$CustomerForm->Visible = true;
		$CustomerForm->ds->SQL = "";
	} else {
		$V_CUSTOMERSearch->Visible = true;
		$V_CUSTOMER->Visible = true;
		$CustomerForm->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
