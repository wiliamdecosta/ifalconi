<?php
//BindEvents Method @1-600E6B36
function BindEvents()
{
    global $P_STATUS_TYPE;
    global $p_status_type1;
    global $CCSEvents;
    $P_STATUS_TYPE->Navigator->CCSEvents["BeforeShow"] = "P_STATUS_TYPE_Navigator_BeforeShow";
    $P_STATUS_TYPE->P_STATUS_TYPE_Insert->CCSEvents["BeforeShow"] = "P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow";
    $P_STATUS_TYPE->CCSEvents["BeforeShowRow"] = "P_STATUS_TYPE_BeforeShowRow";
    $p_status_type1->ds->CCSEvents["BeforeExecuteInsert"] = "p_status_type1_ds_BeforeExecuteInsert";
    $p_status_type1->ds->CCSEvents["AfterExecuteInsert"] = "p_status_type1_ds_AfterExecuteInsert";
    $p_status_type1->ds->CCSEvents["BeforeExecuteUpdate"] = "p_status_type1_ds_BeforeExecuteUpdate";
    $p_status_type1->ds->CCSEvents["AfterExecuteUpdate"] = "p_status_type1_ds_AfterExecuteUpdate";
    $p_status_type1->ds->CCSEvents["BeforeExecuteDelete"] = "p_status_type1_ds_BeforeExecuteDelete";
    $p_status_type1->ds->CCSEvents["AfterExecuteDelete"] = "p_status_type1_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_STATUS_TYPE_Navigator_BeforeShow @31-6C659FF7
function P_STATUS_TYPE_Navigator_BeforeShow(& $sender)
{
    $P_STATUS_TYPE_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_STATUS_TYPE; //Compatibility
//End P_STATUS_TYPE_Navigator_BeforeShow

//Custom Code @89-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_STATUS_TYPE_Navigator_BeforeShow @31-863B73C6
    return $P_STATUS_TYPE_Navigator_BeforeShow;
}
//End Close P_STATUS_TYPE_Navigator_BeforeShow

//P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow @7-7482286E
function P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow(& $sender)
{
    $P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_STATUS_TYPE; //Compatibility
//End P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_STATUS_TYPE->P_STATUS_TYPE_Insert->Page = $FileName;
  	$P_STATUS_TYPE->P_STATUS_TYPE_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_STATUS_TYPE->P_STATUS_TYPE_Insert->Parameters = CCRemoveParam($P_STATUS_TYPE->P_STATUS_TYPE_Insert->Parameters, "P_STATUS_TYPE_ID");
  	$P_STATUS_TYPE->P_STATUS_TYPE_Insert->Parameters = CCAddParam($P_STATUS_TYPE->P_STATUS_TYPE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
// -------------------------
//End Custom Code

//Close P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow @7-1B45D2FE
    return $P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow;
}
//End Close P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow

//P_STATUS_TYPE_BeforeShowRow @2-814BF8AF
function P_STATUS_TYPE_BeforeShowRow(& $sender)
{
    $P_STATUS_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_STATUS_TYPE; //Compatibility
//End P_STATUS_TYPE_BeforeShowRow

//Custom Code @95-2A29BDB7
// -------------------------
    // Write your own code here.
	global $p_status_type1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_STATUS_TYPE_ID->GetValue();
        $p_status_type1->DataSource->Parameters["urlP_STATUS_TYPE_ID"] = $selected_id;
        $p_status_type1->DataSource->Prepare();
        $p_status_type1->EditMode = $p_status_type1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

// -------------------------
//End Custom Code



//Set Row Style @94-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_STATUS_TYPE_ID->GetValue()== $selected_id) {
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

//Close P_STATUS_TYPE_BeforeShowRow @2-1A0AC99C
    return $P_STATUS_TYPE_BeforeShowRow;
}
//End Close P_STATUS_TYPE_BeforeShowRow

//p_status_type1_ds_BeforeExecuteInsert @32-E239E651
function p_status_type1_ds_BeforeExecuteInsert(& $sender)
{
    $p_status_type1_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_type1; //Compatibility
//End p_status_type1_ds_BeforeExecuteInsert

//Custom Code @97-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close p_status_type1_ds_BeforeExecuteInsert @32-4CE44624
    return $p_status_type1_ds_BeforeExecuteInsert;
}
//End Close p_status_type1_ds_BeforeExecuteInsert

//p_status_type1_ds_AfterExecuteInsert @32-11213B6B
function p_status_type1_ds_AfterExecuteInsert(& $sender)
{
    $p_status_type1_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_type1; //Compatibility
//End p_status_type1_ds_AfterExecuteInsert

//Custom Code @98-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
  	if(is_array($p_status_type1->DataSource->Provider->Error)) {
 		$error_msg = $p_status_type1->DataSource->Provider->Error['message'];
  		$p_status_type1->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close p_status_type1_ds_AfterExecuteInsert @32-D86BD4FD
    return $p_status_type1_ds_AfterExecuteInsert;
}
//End Close p_status_type1_ds_AfterExecuteInsert

//p_status_type1_ds_BeforeExecuteUpdate @32-8D14FC8A
function p_status_type1_ds_BeforeExecuteUpdate(& $sender)
{
    $p_status_type1_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_type1; //Compatibility
//End p_status_type1_ds_BeforeExecuteUpdate

//Custom Code @102-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close p_status_type1_ds_BeforeExecuteUpdate @32-83CD87AB
    return $p_status_type1_ds_BeforeExecuteUpdate;
}
//End Close p_status_type1_ds_BeforeExecuteUpdate

//p_status_type1_ds_AfterExecuteUpdate @32-9C86CA53
function p_status_type1_ds_AfterExecuteUpdate(& $sender)
{
    $p_status_type1_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_type1; //Compatibility
//End p_status_type1_ds_AfterExecuteUpdate

//Custom Code @103-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
  	if(is_array($p_status_type1->DataSource->Provider->Error)) {
 		$error_msg = $p_status_type1->DataSource->Provider->Error['message'];
  		$p_status_type1->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close p_status_type1_ds_AfterExecuteUpdate @32-17421572
    return $p_status_type1_ds_AfterExecuteUpdate;
}
//End Close p_status_type1_ds_AfterExecuteUpdate

//p_status_type1_ds_BeforeExecuteDelete @32-4A0E0B92
function p_status_type1_ds_BeforeExecuteDelete(& $sender)
{
    $p_status_type1_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_type1; //Compatibility
//End p_status_type1_ds_BeforeExecuteDelete

//Custom Code @104-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close p_status_type1_ds_BeforeExecuteDelete @32-1FE921DA
    return $p_status_type1_ds_BeforeExecuteDelete;
}
//End Close p_status_type1_ds_BeforeExecuteDelete

//p_status_type1_ds_AfterExecuteDelete @32-586F2555
function p_status_type1_ds_AfterExecuteDelete(& $sender)
{
    $p_status_type1_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_type1; //Compatibility
//End p_status_type1_ds_AfterExecuteDelete

//Custom Code @105-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
  	if(is_array($p_status_type1->DataSource->Provider->Error)) {
 		$error_msg = $p_status_type1->DataSource->Provider->Error['message'];
  		$p_status_type1->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close p_status_type1_ds_AfterExecuteDelete @32-8B66B303
    return $p_status_type1_ds_AfterExecuteDelete;
}
//End Close p_status_type1_ds_AfterExecuteDelete


//Page_OnInitializeView @1-85B58904
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_type; //Compatibility
//End Page_OnInitializeView

//Custom Code @61-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_STATUS_TYPE_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
	
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-E15D82B6
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_type; //Compatibility
//End Page_BeforeShow

//Custom Code @96-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_STATUS_TYPESearch;
	global $P_STATUS_TYPE;
	global $p_status_type1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_STATUS_TYPESearch->Visible = false;
		$P_STATUS_TYPE->Visible = false;
		$p_status_type1->Visible = true;
		$p_status_type1->ds->SQL = "";
	} else {
		$P_STATUS_TYPESearch->Visible = true;
		$P_STATUS_TYPE->Visible = true;
		$p_status_type1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow



?>
