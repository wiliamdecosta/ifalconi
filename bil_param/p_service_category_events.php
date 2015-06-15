<?php
//BindEvents Method @1-BC4AA50A
function BindEvents()
{
    global $V_P_SERVICE_CATEGORY;
    global $V_P_SERVICE_CATEGORY1;
    global $CCSEvents;
    $V_P_SERVICE_CATEGORY->Navigator->CCSEvents["BeforeShow"] = "V_P_SERVICE_CATEGORY_Navigator_BeforeShow";
    $V_P_SERVICE_CATEGORY->ST_NEW->CCSEvents["BeforeShow"] = "V_P_SERVICE_CATEGORY_ST_NEW_BeforeShow";
    $V_P_SERVICE_CATEGORY->CCSEvents["BeforeShowRow"] = "V_P_SERVICE_CATEGORY_BeforeShowRow";
    $V_P_SERVICE_CATEGORY1->ds->CCSEvents["BeforeExecuteInsert"] = "V_P_SERVICE_CATEGORY1_ds_BeforeExecuteInsert";
    $V_P_SERVICE_CATEGORY1->ds->CCSEvents["AfterExecuteInsert"] = "V_P_SERVICE_CATEGORY1_ds_AfterExecuteInsert";
    $V_P_SERVICE_CATEGORY1->ds->CCSEvents["BeforeExecuteUpdate"] = "V_P_SERVICE_CATEGORY1_ds_BeforeExecuteUpdate";
    $V_P_SERVICE_CATEGORY1->ds->CCSEvents["AfterExecuteUpdate"] = "V_P_SERVICE_CATEGORY1_ds_AfterExecuteUpdate";
    $V_P_SERVICE_CATEGORY1->ds->CCSEvents["BeforeExecuteDelete"] = "V_P_SERVICE_CATEGORY1_ds_BeforeExecuteDelete";
    $V_P_SERVICE_CATEGORY1->ds->CCSEvents["AfterExecuteDelete"] = "V_P_SERVICE_CATEGORY1_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//V_P_SERVICE_CATEGORY_Navigator_BeforeShow @65-BBC358FA
function V_P_SERVICE_CATEGORY_Navigator_BeforeShow(& $sender)
{
    $V_P_SERVICE_CATEGORY_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_SERVICE_CATEGORY; //Compatibility
//End V_P_SERVICE_CATEGORY_Navigator_BeforeShow

//Custom Code @66-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close V_P_SERVICE_CATEGORY_Navigator_BeforeShow @65-214C97DD
    return $V_P_SERVICE_CATEGORY_Navigator_BeforeShow;
}
//End Close V_P_SERVICE_CATEGORY_Navigator_BeforeShow

//V_P_SERVICE_CATEGORY_ST_NEW_BeforeShow @72-45A258C2
function V_P_SERVICE_CATEGORY_ST_NEW_BeforeShow(& $sender)
{
    $V_P_SERVICE_CATEGORY_ST_NEW_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_SERVICE_CATEGORY; //Compatibility
//End V_P_SERVICE_CATEGORY_ST_NEW_BeforeShow

//Custom Code @73-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$V_P_SERVICE_CATEGORY->ST_NEW->Page = $FileName;
  	$V_P_SERVICE_CATEGORY->ST_NEW->Parameters = CCGetQueryString("QueryString", "");
  	$V_P_SERVICE_CATEGORY->ST_NEW->Parameters = CCRemoveParam($V_P_SERVICE_CATEGORY->ST_NEW->Parameters, "P_SERVICE_CATEGORY_ID");
  	$V_P_SERVICE_CATEGORY->ST_NEW->Parameters = CCAddParam($V_P_SERVICE_CATEGORY->ST_NEW->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close V_P_SERVICE_CATEGORY_ST_NEW_BeforeShow @72-BA668A43
    return $V_P_SERVICE_CATEGORY_ST_NEW_BeforeShow;
}
//End Close V_P_SERVICE_CATEGORY_ST_NEW_BeforeShow


//V_P_SERVICE_CATEGORY_BeforeShowRow @2-7E46B6AB
function V_P_SERVICE_CATEGORY_BeforeShowRow(& $sender)
{
    $V_P_SERVICE_CATEGORY_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_SERVICE_CATEGORY; //Compatibility
//End V_P_SERVICE_CATEGORY_BeforeShowRow

//Custom Code @78-2A29BDB7
// -------------------------
    // Write your own code here.
	global $V_P_SERVICE_CATEGORY1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_SERVICE_CATEGORY_ID->GetValue();
        $V_P_SERVICE_CATEGORY1->DataSource->Parameters["urlP_SERVICE_CATEGORY_ID"] = $selected_id;
        $V_P_SERVICE_CATEGORY1->DataSource->Prepare();
        $V_P_SERVICE_CATEGORY1->EditMode = $V_P_SERVICE_CATEGORY1->DataSource->AllParametersSet;
        
   }
    $img_radio= "<img border='0' src='../images/radio.gif'>";
    
// -------------------------
//End Custom Code



//Set Row Style @15-982C9472

   $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_SERVICE_CATEGORY_ID->GetValue()== $selected_id) {
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

//Close V_P_SERVICE_CATEGORY_BeforeShowRow @2-D95C2847
    return $V_P_SERVICE_CATEGORY_BeforeShowRow;
}
//End Close V_P_SERVICE_CATEGORY_BeforeShowRow

//V_P_SERVICE_CATEGORY1_ds_BeforeExecuteInsert @39-A68D7BD4
function V_P_SERVICE_CATEGORY1_ds_BeforeExecuteInsert(& $sender)
{
    $V_P_SERVICE_CATEGORY1_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_SERVICE_CATEGORY1; //Compatibility
//End V_P_SERVICE_CATEGORY1_ds_BeforeExecuteInsert

//Custom Code @85-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_P_SERVICE_CATEGORY1_ds_BeforeExecuteInsert @39-29A10BA8
    return $V_P_SERVICE_CATEGORY1_ds_BeforeExecuteInsert;
}
//End Close V_P_SERVICE_CATEGORY1_ds_BeforeExecuteInsert

//V_P_SERVICE_CATEGORY1_ds_AfterExecuteInsert @39-54432A7F
function V_P_SERVICE_CATEGORY1_ds_AfterExecuteInsert(& $sender)
{
    $V_P_SERVICE_CATEGORY1_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_SERVICE_CATEGORY1; //Compatibility
//End V_P_SERVICE_CATEGORY1_ds_AfterExecuteInsert

//Custom Code @86-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($V_P_SERVICE_CATEGORY1->DataSource->Provider->Error)) {
		$error_msg = $V_P_SERVICE_CATEGORY1->DataSource->Provider->Error['message'];
		$V_P_SERVICE_CATEGORY1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_P_SERVICE_CATEGORY1_ds_AfterExecuteInsert @39-2DFF9EA5
    return $V_P_SERVICE_CATEGORY1_ds_AfterExecuteInsert;
}
//End Close V_P_SERVICE_CATEGORY1_ds_AfterExecuteInsert

//V_P_SERVICE_CATEGORY1_ds_BeforeExecuteUpdate @39-50D63CC4
function V_P_SERVICE_CATEGORY1_ds_BeforeExecuteUpdate(& $sender)
{
    $V_P_SERVICE_CATEGORY1_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_SERVICE_CATEGORY1; //Compatibility
//End V_P_SERVICE_CATEGORY1_ds_BeforeExecuteUpdate

//Custom Code @87-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_P_SERVICE_CATEGORY1_ds_BeforeExecuteUpdate @39-E688CA27
    return $V_P_SERVICE_CATEGORY1_ds_BeforeExecuteUpdate;
}
//End Close V_P_SERVICE_CATEGORY1_ds_BeforeExecuteUpdate

//V_P_SERVICE_CATEGORY1_ds_AfterExecuteUpdate @39-6D2EF572
function V_P_SERVICE_CATEGORY1_ds_AfterExecuteUpdate(& $sender)
{
    $V_P_SERVICE_CATEGORY1_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_SERVICE_CATEGORY1; //Compatibility
//End V_P_SERVICE_CATEGORY1_ds_AfterExecuteUpdate

//Custom Code @88-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($V_P_SERVICE_CATEGORY1->DataSource->Provider->Error)) {
		$error_msg = $V_P_SERVICE_CATEGORY1->DataSource->Provider->Error['message'];
		$V_P_SERVICE_CATEGORY1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_P_SERVICE_CATEGORY1_ds_AfterExecuteUpdate @39-E2D65F2A
    return $V_P_SERVICE_CATEGORY1_ds_AfterExecuteUpdate;
}
//End Close V_P_SERVICE_CATEGORY1_ds_AfterExecuteUpdate

//V_P_SERVICE_CATEGORY1_ds_BeforeExecuteDelete @39-DEE9CCF0
function V_P_SERVICE_CATEGORY1_ds_BeforeExecuteDelete(& $sender)
{
    $V_P_SERVICE_CATEGORY1_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_SERVICE_CATEGORY1; //Compatibility
//End V_P_SERVICE_CATEGORY1_ds_BeforeExecuteDelete

//Custom Code @89-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close V_P_SERVICE_CATEGORY1_ds_BeforeExecuteDelete @39-7AAC6C56
    return $V_P_SERVICE_CATEGORY1_ds_BeforeExecuteDelete;
}
//End Close V_P_SERVICE_CATEGORY1_ds_BeforeExecuteDelete

//V_P_SERVICE_CATEGORY1_ds_AfterExecuteDelete @39-0ACD43F8
function V_P_SERVICE_CATEGORY1_ds_AfterExecuteDelete(& $sender)
{
    $V_P_SERVICE_CATEGORY1_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_P_SERVICE_CATEGORY1; //Compatibility
//End V_P_SERVICE_CATEGORY1_ds_AfterExecuteDelete

//Custom Code @90-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($V_P_SERVICE_CATEGORY1->DataSource->Provider->Error)) {
		$error_msg = $V_P_SERVICE_CATEGORY1->DataSource->Provider->Error['message'];
		$V_P_SERVICE_CATEGORY1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close V_P_SERVICE_CATEGORY1_ds_AfterExecuteDelete @39-7EF2F95B
    return $V_P_SERVICE_CATEGORY1_ds_AfterExecuteDelete;
}
//End Close V_P_SERVICE_CATEGORY1_ds_AfterExecuteDelete

//Page_OnInitializeView @1-ECBEEEAD
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_service_category; //Compatibility
//End Page_OnInitializeView

//Custom Code @79-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_SERVICE_CATEGORY_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-F7D81D63
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_service_category; //Compatibility
//End Page_BeforeShow

//Custom Code @80-2A29BDB7
// -------------------------
    // Write your own code here.
	global $V_P_SERVICE_CATEGORYSearch;
	global $V_P_SERVICE_CATEGORY;
	global $V_P_SERVICE_CATEGORY1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$V_P_SERVICE_CATEGORYSearch->Visible = false;
		$V_P_SERVICE_CATEGORY->Visible = false;
		$V_P_SERVICE_CATEGORY1->Visible = true;
		$V_P_SERVICE_CATEGORY1->ds->SQL = "";
	} else {
		$V_P_SERVICE_CATEGORYSearch->Visible = true;
		$V_P_SERVICE_CATEGORY->Visible = true;
		$V_P_SERVICE_CATEGORY1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
