<?php
//BindEvents Method @1-5F30B997
function BindEvents()
{
    global $FEATURETYPE_GRID;
    global $FEATURETYPE_RECORD;
    global $CCSEvents;
    $FEATURETYPE_GRID->Navigator->CCSEvents["BeforeShow"] = "FEATURETYPE_GRID_Navigator_BeforeShow";
    $FEATURETYPE_GRID->FT_NEW->CCSEvents["BeforeShow"] = "FEATURETYPE_GRID_FT_NEW_BeforeShow";
    $FEATURETYPE_GRID->CCSEvents["BeforeShowRow"] = "FEATURETYPE_GRID_BeforeShowRow";
    $FEATURETYPE_RECORD->ds->CCSEvents["BeforeExecuteInsert"] = "FEATURETYPE_RECORD_ds_BeforeExecuteInsert";
    $FEATURETYPE_RECORD->ds->CCSEvents["AfterExecuteInsert"] = "FEATURETYPE_RECORD_ds_AfterExecuteInsert";
    $FEATURETYPE_RECORD->ds->CCSEvents["AfterExecuteUpdate"] = "FEATURETYPE_RECORD_ds_AfterExecuteUpdate";
    $FEATURETYPE_RECORD->ds->CCSEvents["BeforeExecuteUpdate"] = "FEATURETYPE_RECORD_ds_BeforeExecuteUpdate";
    $FEATURETYPE_RECORD->ds->CCSEvents["BeforeExecuteDelete"] = "FEATURETYPE_RECORD_ds_BeforeExecuteDelete";
    $FEATURETYPE_RECORD->ds->CCSEvents["AfterExecuteDelete"] = "FEATURETYPE_RECORD_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//FEATURETYPE_GRID_Navigator_BeforeShow @31-0AF159C3
function FEATURETYPE_GRID_Navigator_BeforeShow(& $sender)
{
    $FEATURETYPE_GRID_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATURETYPE_GRID; //Compatibility
//End FEATURETYPE_GRID_Navigator_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close FEATURETYPE_GRID_Navigator_BeforeShow @31-D461B6D3
    return $FEATURETYPE_GRID_Navigator_BeforeShow;
}
//End Close FEATURETYPE_GRID_Navigator_BeforeShow

//FEATURETYPE_GRID_FT_NEW_BeforeShow @51-9A3D2060
function FEATURETYPE_GRID_FT_NEW_BeforeShow(& $sender)
{
    $FEATURETYPE_GRID_FT_NEW_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATURETYPE_GRID; //Compatibility
//End FEATURETYPE_GRID_FT_NEW_BeforeShow

//Custom Code @59-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$FEATURETYPE_GRID->FT_NEW->Page = $FileName;
  	$FEATURETYPE_GRID->FT_NEW->Parameters = CCGetQueryString("QueryString", "");
  	$FEATURETYPE_GRID->FT_NEW->Parameters = CCRemoveParam($FEATURETYPE_GRID->FT_NEW->Parameters, "P_FEATURE_TYPE_ID");
  	$FEATURETYPE_GRID->FT_NEW->Parameters = CCAddParam($FEATURETYPE_GRID->FT_NEW->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close FEATURETYPE_GRID_FT_NEW_BeforeShow @51-606D8DFD
    return $FEATURETYPE_GRID_FT_NEW_BeforeShow;
}
//End Close FEATURETYPE_GRID_FT_NEW_BeforeShow

//FEATURETYPE_GRID_BeforeShowRow @2-F17A5782
function FEATURETYPE_GRID_BeforeShowRow(& $sender)
{
    $FEATURETYPE_GRID_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATURETYPE_GRID; //Compatibility
//End FEATURETYPE_GRID_BeforeShowRow

//Custom Code @55-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FEATURETYPE_RECORD;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_FEATURE_TYPE_ID->GetValue();
        $FEATURETYPE_RECORD->DataSource->Parameters["urlP_FEATURE_TYPE_ID"] = $selected_id;
        $FEATURETYPE_RECORD->DataSource->Prepare();
        $FEATURETYPE_RECORD->EditMode = $FEATURETYPE_RECORD->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @56-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_FEATURE_TYPE_ID->GetValue()== $selected_id) {
    	$img_radio= "<img border='0' src='../images/radio_s.gif'>";
        $Style = $styles[1];
    }	
    
    if (count($styles)) {
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }

	$Component->DLink->SetValue($img_radio);  // Bdr
//End Set Row Style

//Close FEATURETYPE_GRID_BeforeShowRow @2-BF4AB490
    return $FEATURETYPE_GRID_BeforeShowRow;
}
//End Close FEATURETYPE_GRID_BeforeShowRow

//FEATURETYPE_RECORD_ds_BeforeExecuteInsert @91-CCA65655
function FEATURETYPE_RECORD_ds_BeforeExecuteInsert(& $sender)
{
    $FEATURETYPE_RECORD_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATURETYPE_RECORD; //Compatibility
//End FEATURETYPE_RECORD_ds_BeforeExecuteInsert

//Custom Code @115-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close FEATURETYPE_RECORD_ds_BeforeExecuteInsert @91-987AED7D
    return $FEATURETYPE_RECORD_ds_BeforeExecuteInsert;
}
//End Close FEATURETYPE_RECORD_ds_BeforeExecuteInsert

//FEATURETYPE_RECORD_ds_AfterExecuteInsert @91-93395389
function FEATURETYPE_RECORD_ds_AfterExecuteInsert(& $sender)
{
    $FEATURETYPE_RECORD_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATURETYPE_RECORD; //Compatibility
//End FEATURETYPE_RECORD_ds_AfterExecuteInsert

//Custom Code @116-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
  	if(is_array($FEATURETYPE_RECORD->DataSource->Provider->Error)) {
  		$error_msg = $FEATURETYPE_RECORD->DataSource->Provider->Error['message'];
  		$FEATURETYPE_RECORD->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close FEATURETYPE_RECORD_ds_AfterExecuteInsert @91-FDF06F9E
    return $FEATURETYPE_RECORD_ds_AfterExecuteInsert;
}
//End Close FEATURETYPE_RECORD_ds_AfterExecuteInsert

//FEATURETYPE_RECORD_ds_AfterExecuteUpdate @91-4EA7A2A7
function FEATURETYPE_RECORD_ds_AfterExecuteUpdate(& $sender)
{
    $FEATURETYPE_RECORD_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATURETYPE_RECORD; //Compatibility
//End FEATURETYPE_RECORD_ds_AfterExecuteUpdate

//Custom Code @128-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
  	if(is_array($FEATURETYPE_RECORD->DataSource->Provider->Error)) {
  		$error_msg = $FEATURETYPE_RECORD->DataSource->Provider->Error['message'];
  		$FEATURETYPE_RECORD->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close FEATURETYPE_RECORD_ds_AfterExecuteUpdate @91-32D9AE11
    return $FEATURETYPE_RECORD_ds_AfterExecuteUpdate;
}
//End Close FEATURETYPE_RECORD_ds_AfterExecuteUpdate

//FEATURETYPE_RECORD_ds_BeforeExecuteUpdate @91-F0FFD415
function FEATURETYPE_RECORD_ds_BeforeExecuteUpdate(& $sender)
{
    $FEATURETYPE_RECORD_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATURETYPE_RECORD; //Compatibility
//End FEATURETYPE_RECORD_ds_BeforeExecuteUpdate

//Custom Code @129-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close FEATURETYPE_RECORD_ds_BeforeExecuteUpdate @91-57532CF2
    return $FEATURETYPE_RECORD_ds_BeforeExecuteUpdate;
}
//End Close FEATURETYPE_RECORD_ds_BeforeExecuteUpdate

//FEATURETYPE_RECORD_ds_BeforeExecuteDelete @91-651C1148
function FEATURETYPE_RECORD_ds_BeforeExecuteDelete(& $sender)
{
    $FEATURETYPE_RECORD_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATURETYPE_RECORD; //Compatibility
//End FEATURETYPE_RECORD_ds_BeforeExecuteDelete

//Custom Code @182-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close FEATURETYPE_RECORD_ds_BeforeExecuteDelete @91-CB778A83
    return $FEATURETYPE_RECORD_ds_BeforeExecuteDelete;
}
//End Close FEATURETYPE_RECORD_ds_BeforeExecuteDelete

//FEATURETYPE_RECORD_ds_AfterExecuteDelete @91-32E2872D
function FEATURETYPE_RECORD_ds_AfterExecuteDelete(& $sender)
{
    $FEATURETYPE_RECORD_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATURETYPE_RECORD; //Compatibility
//End FEATURETYPE_RECORD_ds_AfterExecuteDelete

//Custom Code @183-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
  	if(is_array($FEATURETYPE_RECORD->DataSource->Provider->Error)) {
  		$error_msg = $FEATURETYPE_RECORD->DataSource->Provider->Error['message'];
  		$FEATURETYPE_RECORD->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close FEATURETYPE_RECORD_ds_AfterExecuteDelete @91-AEFD0860
    return $FEATURETYPE_RECORD_ds_AfterExecuteDelete;
}
//End Close FEATURETYPE_RECORD_ds_AfterExecuteDelete

//Page_OnInitializeView @1-562A3B64
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_feature_type; //Compatibility
//End Page_OnInitializeView

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_FEATURE_TYPE_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
	
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-732101CF
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_feature_type; //Compatibility
//End Page_BeforeShow

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FT_SEARCH;
	global $FEATURETYPE_GRID;
	global $FEATURETYPE_RECORD;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$FT_SEARCH->Visible = false;
		$FEATURETYPE_GRID->Visible = false;
		$FEATURETYPE_RECORD->Visible = true;
		$FEATURETYPE_RECORD->ds->SQL = "";
	} else {
		$FT_SEARCH->Visible = true;
		$FEATURETYPE_GRID->Visible = true;
		$FEATURETYPE_RECORD->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
