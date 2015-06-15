<?php
//BindEvents Method @1-A9DBFA99
function BindEvents()
{
    global $FEATUREGROUP_GRID;
    global $FEATUREGROUP_RECORD;
    global $CCSEvents;
    $FEATUREGROUP_GRID->FG_NEW->CCSEvents["BeforeShow"] = "FEATUREGROUP_GRID_FG_NEW_BeforeShow";
    $FEATUREGROUP_GRID->Navigator->CCSEvents["BeforeShow"] = "FEATUREGROUP_GRID_Navigator_BeforeShow";
    $FEATUREGROUP_GRID->CCSEvents["BeforeShowRow"] = "FEATUREGROUP_GRID_BeforeShowRow";
    $FEATUREGROUP_RECORD->ds->CCSEvents["BeforeExecuteInsert"] = "FEATUREGROUP_RECORD_ds_BeforeExecuteInsert";
    $FEATUREGROUP_RECORD->ds->CCSEvents["AfterExecuteInsert"] = "FEATUREGROUP_RECORD_ds_AfterExecuteInsert";
    $FEATUREGROUP_RECORD->ds->CCSEvents["AfterExecuteUpdate"] = "FEATUREGROUP_RECORD_ds_AfterExecuteUpdate";
    $FEATUREGROUP_RECORD->ds->CCSEvents["BeforeExecuteUpdate"] = "FEATUREGROUP_RECORD_ds_BeforeExecuteUpdate";
    $FEATUREGROUP_RECORD->ds->CCSEvents["BeforeExecuteDelete"] = "FEATUREGROUP_RECORD_ds_BeforeExecuteDelete";
    $FEATUREGROUP_RECORD->ds->CCSEvents["AfterExecuteDelete"] = "FEATUREGROUP_RECORD_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method


//FEATUREGROUP_GRID_FG_NEW_BeforeShow @51-F49CB2CF
function FEATUREGROUP_GRID_FG_NEW_BeforeShow(& $sender)
{
    $FEATUREGROUP_GRID_FG_NEW_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATUREGROUP_GRID; //Compatibility
//End FEATUREGROUP_GRID_FG_NEW_BeforeShow

//Custom Code @59-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$FEATUREGROUP_GRID->FG_NEW->Page = $FileName;
  	$FEATUREGROUP_GRID->FG_NEW->Parameters = CCGetQueryString("QueryString", "");
  	$FEATUREGROUP_GRID->FG_NEW->Parameters = CCRemoveParam($FEATUREGROUP_GRID->FG_NEW->Parameters, "P_FEATURE_GROUP_ID");
  	$FEATUREGROUP_GRID->FG_NEW->Parameters = CCAddParam($FEATUREGROUP_GRID->FG_NEW->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close FEATUREGROUP_GRID_FG_NEW_BeforeShow @51-6DD7B93A
    return $FEATUREGROUP_GRID_FG_NEW_BeforeShow;
}
//End Close FEATUREGROUP_GRID_FG_NEW_BeforeShow

//FEATUREGROUP_GRID_Navigator_BeforeShow @133-6AFD96F3
function FEATUREGROUP_GRID_Navigator_BeforeShow(& $sender)
{
    $FEATUREGROUP_GRID_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATUREGROUP_GRID; //Compatibility
//End FEATUREGROUP_GRID_Navigator_BeforeShow

//Custom Code @134-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close FEATUREGROUP_GRID_Navigator_BeforeShow @133-E0E50F71
    return $FEATUREGROUP_GRID_Navigator_BeforeShow;
}
//End Close FEATUREGROUP_GRID_Navigator_BeforeShow

//FEATUREGROUP_GRID_BeforeShowRow @2-2F9CE27E
function FEATUREGROUP_GRID_BeforeShowRow(& $sender)
{
    $FEATUREGROUP_GRID_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATUREGROUP_GRID; //Compatibility
//End FEATUREGROUP_GRID_BeforeShowRow

//Custom Code @55-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FEATUREGROUP_RECORD;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_FEATURE_GROUP_ID->GetValue();
        $FEATUREGROUP_RECORD->DataSource->Parameters["urlP_FEATURE_GROUP_ID"] = $selected_id;
        $FEATUREGROUP_RECORD->DataSource->Prepare();
        $FEATUREGROUP_RECORD->EditMode = $FEATUREGROUP_RECORD->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @56-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_FEATURE_GROUP_ID->GetValue()== $selected_id) {
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

//Close FEATUREGROUP_GRID_BeforeShowRow @2-8068E365
    return $FEATUREGROUP_GRID_BeforeShowRow;
}
//End Close FEATUREGROUP_GRID_BeforeShowRow

//FEATUREGROUP_RECORD_ds_BeforeExecuteInsert @91-CC2A0CA1
function FEATUREGROUP_RECORD_ds_BeforeExecuteInsert(& $sender)
{
    $FEATUREGROUP_RECORD_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATUREGROUP_RECORD; //Compatibility
//End FEATUREGROUP_RECORD_ds_BeforeExecuteInsert

//Custom Code @115-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close FEATUREGROUP_RECORD_ds_BeforeExecuteInsert @91-CBCC5096
    return $FEATUREGROUP_RECORD_ds_BeforeExecuteInsert;
}
//End Close FEATUREGROUP_RECORD_ds_BeforeExecuteInsert

//FEATUREGROUP_RECORD_ds_AfterExecuteInsert @91-285F905B
function FEATUREGROUP_RECORD_ds_AfterExecuteInsert(& $sender)
{
    $FEATUREGROUP_RECORD_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATUREGROUP_RECORD; //Compatibility
//End FEATUREGROUP_RECORD_ds_AfterExecuteInsert

//Custom Code @116-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
  	if(is_array($FEATUREGROUP_RECORD->DataSource->Provider->Error)) {
  		$error_msg = $FEATUREGROUP_RECORD->DataSource->Provider->Error['message'];
  		$FEATUREGROUP_RECORD->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close FEATUREGROUP_RECORD_ds_AfterExecuteInsert @91-F8DEB46C
    return $FEATUREGROUP_RECORD_ds_AfterExecuteInsert;
}
//End Close FEATUREGROUP_RECORD_ds_AfterExecuteInsert

//FEATUREGROUP_RECORD_ds_AfterExecuteUpdate @91-5EBF8849
function FEATUREGROUP_RECORD_ds_AfterExecuteUpdate(& $sender)
{
    $FEATUREGROUP_RECORD_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATUREGROUP_RECORD; //Compatibility
//End FEATUREGROUP_RECORD_ds_AfterExecuteUpdate

//Custom Code @128-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
  	if(is_array($FEATUREGROUP_RECORD->DataSource->Provider->Error)) {
  		$error_msg = $FEATUREGROUP_RECORD->DataSource->Provider->Error['message'];
  		$FEATUREGROUP_RECORD->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close FEATUREGROUP_RECORD_ds_AfterExecuteUpdate @91-37F775E3
    return $FEATUREGROUP_RECORD_ds_AfterExecuteUpdate;
}
//End Close FEATUREGROUP_RECORD_ds_AfterExecuteUpdate

//FEATUREGROUP_RECORD_ds_BeforeExecuteUpdate @91-88B893DB
function FEATUREGROUP_RECORD_ds_BeforeExecuteUpdate(& $sender)
{
    $FEATUREGROUP_RECORD_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATUREGROUP_RECORD; //Compatibility
//End FEATUREGROUP_RECORD_ds_BeforeExecuteUpdate

//Custom Code @129-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close FEATUREGROUP_RECORD_ds_BeforeExecuteUpdate @91-04E59119
    return $FEATUREGROUP_RECORD_ds_BeforeExecuteUpdate;
}
//End Close FEATUREGROUP_RECORD_ds_BeforeExecuteUpdate

//FEATUREGROUP_RECORD_ds_BeforeExecuteDelete @91-F3840551
function FEATUREGROUP_RECORD_ds_BeforeExecuteDelete(& $sender)
{
    $FEATUREGROUP_RECORD_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATUREGROUP_RECORD; //Compatibility
//End FEATUREGROUP_RECORD_ds_BeforeExecuteDelete

//Custom Code @131-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close FEATUREGROUP_RECORD_ds_BeforeExecuteDelete @91-98C13768
    return $FEATUREGROUP_RECORD_ds_BeforeExecuteDelete;
}
//End Close FEATUREGROUP_RECORD_ds_BeforeExecuteDelete

//FEATUREGROUP_RECORD_ds_AfterExecuteDelete @91-4BF046C5
function FEATUREGROUP_RECORD_ds_AfterExecuteDelete(& $sender)
{
    $FEATUREGROUP_RECORD_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $FEATUREGROUP_RECORD; //Compatibility
//End FEATUREGROUP_RECORD_ds_AfterExecuteDelete

//Custom Code @132-2A29BDB7
// -------------------------
    // Write your own code here.
		ob_end_clean();
  	if(is_array($FEATUREGROUP_RECORD->DataSource->Provider->Error)) {
  		$error_msg = $FEATUREGROUP_RECORD->DataSource->Provider->Error['message'];
  		$FEATUREGROUP_RECORD->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close FEATUREGROUP_RECORD_ds_AfterExecuteDelete @91-ABD3D392
    return $FEATUREGROUP_RECORD_ds_AfterExecuteDelete;
}
//End Close FEATUREGROUP_RECORD_ds_AfterExecuteDelete


//Page_OnInitializeView @1-EEE0F76D
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_feature_group; //Compatibility
//End Page_OnInitializeView

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_FEATURE_GROUP_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
	
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-AFC18637
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_feature_group; //Compatibility
//End Page_BeforeShow

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FG_SEARCH;
	global $FEATUREGROUP_GRID;
	global $FEATUREGROUP_RECORD;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$FG_SEARCH->Visible = false;
		$FEATUREGROUP_GRID->Visible = false;
		$FEATUREGROUP_RECORD->Visible = true;
		$FEATUREGROUP_RECORD->ds->SQL = "";
	} else {
		$FG_SEARCH->Visible = true;
		$FEATUREGROUP_GRID->Visible = true;
		$FEATUREGROUP_RECORD->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
