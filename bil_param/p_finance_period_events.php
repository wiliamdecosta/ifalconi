<?php
//BindEvents Method @1-27718CB2
function BindEvents()
{
    global $P_FINANCE_PERIOD;
    global $P_FINANCE_PERIOD1;
    global $CCSEvents;
    $P_FINANCE_PERIOD->Navigator->CCSEvents["BeforeShow"] = "P_FINANCE_PERIOD_Navigator_BeforeShow";
    $P_FINANCE_PERIOD->P_FINANCE_PERIOD_Insert->CCSEvents["BeforeShow"] = "P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow";
    $P_FINANCE_PERIOD->CCSEvents["BeforeShowRow"] = "P_FINANCE_PERIOD_BeforeShowRow";
    $P_FINANCE_PERIOD1->ds->CCSEvents["BeforeExecuteInsert"] = "P_FINANCE_PERIOD1_ds_BeforeExecuteInsert";
    $P_FINANCE_PERIOD1->ds->CCSEvents["AfterExecuteInsert"] = "P_FINANCE_PERIOD1_ds_AfterExecuteInsert";
    $P_FINANCE_PERIOD1->ds->CCSEvents["BeforeExecuteUpdate"] = "P_FINANCE_PERIOD1_ds_BeforeExecuteUpdate";
    $P_FINANCE_PERIOD1->ds->CCSEvents["AfterExecuteUpdate"] = "P_FINANCE_PERIOD1_ds_AfterExecuteUpdate";
    $P_FINANCE_PERIOD1->ds->CCSEvents["BeforeExecuteDelete"] = "P_FINANCE_PERIOD1_ds_BeforeExecuteDelete";
    $P_FINANCE_PERIOD1->ds->CCSEvents["AfterExecuteDelete"] = "P_FINANCE_PERIOD1_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_FINANCE_PERIOD_Navigator_BeforeShow @24-5BF89A27
function P_FINANCE_PERIOD_Navigator_BeforeShow(& $sender)
{
    $P_FINANCE_PERIOD_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FINANCE_PERIOD; //Compatibility
//End P_FINANCE_PERIOD_Navigator_BeforeShow

//Custom Code @61-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_FINANCE_PERIOD_Navigator_BeforeShow @24-3A4C9F61
    return $P_FINANCE_PERIOD_Navigator_BeforeShow;
}
//End Close P_FINANCE_PERIOD_Navigator_BeforeShow

//P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow @55-6EC6DB25
function P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow(& $sender)
{
    $P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FINANCE_PERIOD; //Compatibility
//End P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow

//Custom Code @56-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_FINANCE_PERIOD->P_FINANCE_PERIOD_Insert->Page = $FileName;
  	$P_FINANCE_PERIOD->P_FINANCE_PERIOD_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_FINANCE_PERIOD->P_FINANCE_PERIOD_Insert->Parameters = CCRemoveParam($P_FINANCE_PERIOD->P_FINANCE_PERIOD_Insert->Parameters, "P_FINANCE_PERIOD_ID");
  	$P_FINANCE_PERIOD->P_FINANCE_PERIOD_Insert->Parameters = CCAddParam($P_FINANCE_PERIOD->P_FINANCE_PERIOD_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow @55-E644EECD
    return $P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow;
}
//End Close P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow

//P_FINANCE_PERIOD_BeforeShowRow @2-1C05A5A6
function P_FINANCE_PERIOD_BeforeShowRow(& $sender)
{
    $P_FINANCE_PERIOD_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FINANCE_PERIOD; //Compatibility
//End P_FINANCE_PERIOD_BeforeShowRow

//Custom Code @59-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_FINANCE_PERIOD1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_FINANCE_PERIOD_ID->GetValue();
        $P_FINANCE_PERIOD1->DataSource->Parameters["urlP_FINANCE_PERIOD_ID"] = $selected_id;
        $P_FINANCE_PERIOD1->DataSource->Prepare();
        $P_FINANCE_PERIOD1->EditMode = $P_FINANCE_PERIOD1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @60-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_FINANCE_PERIOD_ID->GetValue()== $selected_id) {
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

//Close P_FINANCE_PERIOD_BeforeShowRow @2-A833E8B6
    return $P_FINANCE_PERIOD_BeforeShowRow;
}
//End Close P_FINANCE_PERIOD_BeforeShowRow

//P_FINANCE_PERIOD1_ds_BeforeExecuteInsert @25-C2A27C08
function P_FINANCE_PERIOD1_ds_BeforeExecuteInsert(& $sender)
{
    $P_FINANCE_PERIOD1_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FINANCE_PERIOD1; //Compatibility
//End P_FINANCE_PERIOD1_ds_BeforeExecuteInsert

//Custom Code @113-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close P_FINANCE_PERIOD1_ds_BeforeExecuteInsert @25-2D3C86CF
    return $P_FINANCE_PERIOD1_ds_BeforeExecuteInsert;
}
//End Close P_FINANCE_PERIOD1_ds_BeforeExecuteInsert

//P_FINANCE_PERIOD1_ds_AfterExecuteInsert @25-748BBD61
function P_FINANCE_PERIOD1_ds_AfterExecuteInsert(& $sender)
{
    $P_FINANCE_PERIOD1_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FINANCE_PERIOD1; //Compatibility
//End P_FINANCE_PERIOD1_ds_AfterExecuteInsert

//Custom Code @114-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($P_FINANCE_PERIOD1->DataSource->Provider->Error)) {
		$error_msg = $P_FINANCE_PERIOD1->DataSource->Provider->Error['message'];
		$P_FINANCE_PERIOD1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close P_FINANCE_PERIOD1_ds_AfterExecuteInsert @25-6B54EC23
    return $P_FINANCE_PERIOD1_ds_AfterExecuteInsert;
}
//End Close P_FINANCE_PERIOD1_ds_AfterExecuteInsert

//P_FINANCE_PERIOD1_ds_BeforeExecuteUpdate @25-512F9B67
function P_FINANCE_PERIOD1_ds_BeforeExecuteUpdate(& $sender)
{
    $P_FINANCE_PERIOD1_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FINANCE_PERIOD1; //Compatibility
//End P_FINANCE_PERIOD1_ds_BeforeExecuteUpdate

//Custom Code @115-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close P_FINANCE_PERIOD1_ds_BeforeExecuteUpdate @25-E2154740
    return $P_FINANCE_PERIOD1_ds_BeforeExecuteUpdate;
}
//End Close P_FINANCE_PERIOD1_ds_BeforeExecuteUpdate

//P_FINANCE_PERIOD1_ds_AfterExecuteUpdate @25-0050977D
function P_FINANCE_PERIOD1_ds_AfterExecuteUpdate(& $sender)
{
    $P_FINANCE_PERIOD1_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FINANCE_PERIOD1; //Compatibility
//End P_FINANCE_PERIOD1_ds_AfterExecuteUpdate

//Custom Code @116-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($P_FINANCE_PERIOD1->DataSource->Provider->Error)) {
		$error_msg = $P_FINANCE_PERIOD1->DataSource->Provider->Error['message'];
		$P_FINANCE_PERIOD1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close P_FINANCE_PERIOD1_ds_AfterExecuteUpdate @25-A47D2DAC
    return $P_FINANCE_PERIOD1_ds_AfterExecuteUpdate;
}
//End Close P_FINANCE_PERIOD1_ds_AfterExecuteUpdate

//P_FINANCE_PERIOD1_ds_BeforeExecuteDelete @25-C8E5A6A9
function P_FINANCE_PERIOD1_ds_BeforeExecuteDelete(& $sender)
{
    $P_FINANCE_PERIOD1_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FINANCE_PERIOD1; //Compatibility
//End P_FINANCE_PERIOD1_ds_BeforeExecuteDelete

//Custom Code @117-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close P_FINANCE_PERIOD1_ds_BeforeExecuteDelete @25-7E31E131
    return $P_FINANCE_PERIOD1_ds_BeforeExecuteDelete;
}
//End Close P_FINANCE_PERIOD1_ds_BeforeExecuteDelete

//P_FINANCE_PERIOD1_ds_AfterExecuteDelete @25-6643120B
function P_FINANCE_PERIOD1_ds_AfterExecuteDelete(& $sender)
{
    $P_FINANCE_PERIOD1_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FINANCE_PERIOD1; //Compatibility
//End P_FINANCE_PERIOD1_ds_AfterExecuteDelete

//Custom Code @118-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	if(is_array($P_FINANCE_PERIOD1->DataSource->Provider->Error)) {
		$error_msg = $P_FINANCE_PERIOD1->DataSource->Provider->Error['message'];
		$P_FINANCE_PERIOD1->Errors->addError($error_msg);
	};
// -------------------------
//End Custom Code

//Close P_FINANCE_PERIOD1_ds_AfterExecuteDelete @25-38598BDD
    return $P_FINANCE_PERIOD1_ds_AfterExecuteDelete;
}
//End Close P_FINANCE_PERIOD1_ds_AfterExecuteDelete

//Page_OnInitializeView @1-4DDB14F9
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_finance_period; //Compatibility
//End Page_OnInitializeView

//Custom Code @62-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_FINANCE_PERIOD_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-C6248D62
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_finance_period; //Compatibility
//End Page_BeforeShow

//Custom Code @63-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_FINANCE_PERIODSearch;
	global $P_FINANCE_PERIOD;
	global $P_FINANCE_PERIOD1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_FINANCE_PERIODSearch->Visible = false;
		$P_FINANCE_PERIOD->Visible = false;
		$P_FINANCE_PERIOD1->Visible = true;
		$P_FINANCE_PERIOD1->ds->SQL = "";
	} else {
		$P_FINANCE_PERIODSearch->Visible = true;
		$P_FINANCE_PERIOD->Visible = true;
		$P_FINANCE_PERIOD1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
