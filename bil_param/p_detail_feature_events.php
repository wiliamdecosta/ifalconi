<?php
//BindEvents Method @1-68C99D44
function BindEvents()
{
    global $P_DETAIL_FEATURE;
    global $P_DETAIL_FEATURE1;
    global $CCSEvents;
    $P_DETAIL_FEATURE->Navigator->CCSEvents["BeforeShow"] = "P_DETAIL_FEATURE_Navigator_BeforeShow";
    $P_DETAIL_FEATURE->ST_NEW->CCSEvents["BeforeShow"] = "P_DETAIL_FEATURE_ST_NEW_BeforeShow";
    $P_DETAIL_FEATURE->CCSEvents["BeforeShowRow"] = "P_DETAIL_FEATURE_BeforeShowRow";
    $P_DETAIL_FEATURE1->ds->CCSEvents["BeforeExecuteInsert"] = "P_DETAIL_FEATURE1_ds_BeforeExecuteInsert";
    $P_DETAIL_FEATURE1->ds->CCSEvents["AfterExecuteInsert"] = "P_DETAIL_FEATURE1_ds_AfterExecuteInsert";
    $P_DETAIL_FEATURE1->ds->CCSEvents["BeforeExecuteUpdate"] = "P_DETAIL_FEATURE1_ds_BeforeExecuteUpdate";
    $P_DETAIL_FEATURE1->ds->CCSEvents["AfterExecuteUpdate"] = "P_DETAIL_FEATURE1_ds_AfterExecuteUpdate";
    $P_DETAIL_FEATURE1->ds->CCSEvents["BeforeExecuteDelete"] = "P_DETAIL_FEATURE1_ds_BeforeExecuteDelete";
    $P_DETAIL_FEATURE1->ds->CCSEvents["AfterExecuteDelete"] = "P_DETAIL_FEATURE1_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_DETAIL_FEATURE_Navigator_BeforeShow @65-52A0EDBA
function P_DETAIL_FEATURE_Navigator_BeforeShow(& $sender)
{
    $P_DETAIL_FEATURE_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DETAIL_FEATURE; //Compatibility
//End P_DETAIL_FEATURE_Navigator_BeforeShow

//Custom Code @66-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_DETAIL_FEATURE_Navigator_BeforeShow @65-3438E943
    return $P_DETAIL_FEATURE_Navigator_BeforeShow;
}
//End Close P_DETAIL_FEATURE_Navigator_BeforeShow

//P_DETAIL_FEATURE_ST_NEW_BeforeShow @72-185BB06E
function P_DETAIL_FEATURE_ST_NEW_BeforeShow(& $sender)
{
    $P_DETAIL_FEATURE_ST_NEW_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DETAIL_FEATURE; //Compatibility
//End P_DETAIL_FEATURE_ST_NEW_BeforeShow

//Custom Code @73-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_DETAIL_FEATURE->ST_NEW->Page = $FileName;
  	$P_DETAIL_FEATURE->ST_NEW->Parameters = CCGetQueryString("QueryString", "");
  	$P_DETAIL_FEATURE->ST_NEW->Parameters = CCRemoveParam($P_DETAIL_FEATURE->ST_NEW->Parameters, "P_BUNDLED_FEATURE_DETAIL_ID");
  	$P_DETAIL_FEATURE->ST_NEW->Parameters = CCAddParam($P_DETAIL_FEATURE->ST_NEW->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_DETAIL_FEATURE_ST_NEW_BeforeShow @72-0F85A315
    return $P_DETAIL_FEATURE_ST_NEW_BeforeShow;
}
//End Close P_DETAIL_FEATURE_ST_NEW_BeforeShow

//P_DETAIL_FEATURE_BeforeShowRow @2-2A2985EF
function P_DETAIL_FEATURE_BeforeShowRow(& $sender)
{
    $P_DETAIL_FEATURE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DETAIL_FEATURE; //Compatibility
//End P_DETAIL_FEATURE_BeforeShowRow

//Custom Code @78-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_DETAIL_FEATURE1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_BUNDLED_FEATURE_DETAIL_ID->GetValue();
        $P_DETAIL_FEATURE1->DataSource->Parameters["urlP_BUNDLED_FEATURE_DETAIL_ID"] = $selected_id;
        $P_DETAIL_FEATURE1->DataSource->Prepare();
        $P_DETAIL_FEATURE1->EditMode = $P_DETAIL_FEATURE1->DataSource->AllParametersSet;
        
   }
    $img_radio= "<img border='0' src='../images/radio.gif'>";
    
// -------------------------
//End Custom Code



//Set Row Style @15-982C9472

   $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_BUNDLED_FEATURE_DETAIL_ID->GetValue()== $selected_id) {
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

//Close P_DETAIL_FEATURE_BeforeShowRow @2-3527A9EE
    return $P_DETAIL_FEATURE_BeforeShowRow;
}
//End Close P_DETAIL_FEATURE_BeforeShowRow

//P_DETAIL_FEATURE1_ds_BeforeExecuteInsert @217-4430830F
function P_DETAIL_FEATURE1_ds_BeforeExecuteInsert(& $sender)
{
    $P_DETAIL_FEATURE1_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DETAIL_FEATURE1; //Compatibility
//End P_DETAIL_FEATURE1_ds_BeforeExecuteInsert

//Custom Code @254-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close P_DETAIL_FEATURE1_ds_BeforeExecuteInsert @217-38F87F1A
    return $P_DETAIL_FEATURE1_ds_BeforeExecuteInsert;
}
//End Close P_DETAIL_FEATURE1_ds_BeforeExecuteInsert

//P_DETAIL_FEATURE1_ds_AfterExecuteInsert @217-87897500
function P_DETAIL_FEATURE1_ds_AfterExecuteInsert(& $sender)
{
    $P_DETAIL_FEATURE1_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DETAIL_FEATURE1; //Compatibility
//End P_DETAIL_FEATURE1_ds_AfterExecuteInsert

//Custom Code @255-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
  	if(is_array($P_DETAIL_FEATURE1->DataSource->Provider->Error)) {
 		$error_msg = $P_DETAIL_FEATURE1->DataSource->Provider->Error['message'];
  		$P_DETAIL_FEATURE1->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close P_DETAIL_FEATURE1_ds_AfterExecuteInsert @217-7580707E
    return $P_DETAIL_FEATURE1_ds_AfterExecuteInsert;
}
//End Close P_DETAIL_FEATURE1_ds_AfterExecuteInsert

//P_DETAIL_FEATURE1_ds_BeforeExecuteUpdate @217-D7BD6460
function P_DETAIL_FEATURE1_ds_BeforeExecuteUpdate(& $sender)
{
    $P_DETAIL_FEATURE1_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DETAIL_FEATURE1; //Compatibility
//End P_DETAIL_FEATURE1_ds_BeforeExecuteUpdate

//Custom Code @256-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close P_DETAIL_FEATURE1_ds_BeforeExecuteUpdate @217-F7D1BE95
    return $P_DETAIL_FEATURE1_ds_BeforeExecuteUpdate;
}
//End Close P_DETAIL_FEATURE1_ds_BeforeExecuteUpdate

//P_DETAIL_FEATURE1_ds_AfterExecuteUpdate @217-F3525F1C
function P_DETAIL_FEATURE1_ds_AfterExecuteUpdate(& $sender)
{
    $P_DETAIL_FEATURE1_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DETAIL_FEATURE1; //Compatibility
//End P_DETAIL_FEATURE1_ds_AfterExecuteUpdate

//Custom Code @257-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
  	if(is_array($P_DETAIL_FEATURE1->DataSource->Provider->Error)) {
 		$error_msg = $P_DETAIL_FEATURE1->DataSource->Provider->Error['message'];
  		$P_DETAIL_FEATURE1->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close P_DETAIL_FEATURE1_ds_AfterExecuteUpdate @217-BAA9B1F1
    return $P_DETAIL_FEATURE1_ds_AfterExecuteUpdate;
}
//End Close P_DETAIL_FEATURE1_ds_AfterExecuteUpdate

//P_DETAIL_FEATURE1_ds_BeforeExecuteDelete @217-4E7759AE
function P_DETAIL_FEATURE1_ds_BeforeExecuteDelete(& $sender)
{
    $P_DETAIL_FEATURE1_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DETAIL_FEATURE1; //Compatibility
//End P_DETAIL_FEATURE1_ds_BeforeExecuteDelete

//Custom Code @258-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close P_DETAIL_FEATURE1_ds_BeforeExecuteDelete @217-6BF518E4
    return $P_DETAIL_FEATURE1_ds_BeforeExecuteDelete;
}
//End Close P_DETAIL_FEATURE1_ds_BeforeExecuteDelete

//P_DETAIL_FEATURE1_ds_AfterExecuteDelete @217-9541DA6A
function P_DETAIL_FEATURE1_ds_AfterExecuteDelete(& $sender)
{
    $P_DETAIL_FEATURE1_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DETAIL_FEATURE1; //Compatibility
//End P_DETAIL_FEATURE1_ds_AfterExecuteDelete

//Custom Code @259-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
  	if(is_array($P_DETAIL_FEATURE1->DataSource->Provider->Error)) {
 		$error_msg = $P_DETAIL_FEATURE1->DataSource->Provider->Error['message'];
  		$P_DETAIL_FEATURE1->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close P_DETAIL_FEATURE1_ds_AfterExecuteDelete @217-268D1780
    return $P_DETAIL_FEATURE1_ds_AfterExecuteDelete;
}
//End Close P_DETAIL_FEATURE1_ds_AfterExecuteDelete

//Page_OnInitializeView @1-2CFCA743
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_detail_feature; //Compatibility
//End Page_OnInitializeView

//Custom Code @79-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_BUNDLED_FEATURE_DETAIL_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-A7033ED8
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_detail_feature; //Compatibility
//End Page_BeforeShow

//Custom Code @80-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_DETAIL_FEATURE;
	global $P_DETAIL_FEATURE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$V_P_SERVICE_CATEGORYSearch->Visible = false;
		$P_DETAIL_FEATURE->Visible = false;
		$P_DETAIL_FEATURE1->Visible = true;
		$P_DETAIL_FEATURE1->ds->SQL = "";
	} else {
		$P_DETAIL_FEATURE->Visible = true;
		$P_DETAIL_FEATURE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
