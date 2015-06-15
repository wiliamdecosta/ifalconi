<?php
//BindEvents Method @1-B56D2223
function BindEvents()
{
    global $P_STATUS_LIST;
    global $p_status_list1;
    global $CCSEvents;
    $P_STATUS_LIST->P_STATUS_LIST_Insert->CCSEvents["BeforeShow"] = "P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow";
    $P_STATUS_LIST->Navigator->CCSEvents["BeforeShow"] = "P_STATUS_LIST_Navigator_BeforeShow";
    $P_STATUS_LIST->CCSEvents["BeforeShowRow"] = "P_STATUS_LIST_BeforeShowRow";
    $p_status_list1->ds->CCSEvents["BeforeExecuteInsert"] = "p_status_list1_ds_BeforeExecuteInsert";
    $p_status_list1->ds->CCSEvents["AfterExecuteInsert"] = "p_status_list1_ds_AfterExecuteInsert";
    $p_status_list1->ds->CCSEvents["BeforeExecuteUpdate"] = "p_status_list1_ds_BeforeExecuteUpdate";
    $p_status_list1->ds->CCSEvents["AfterExecuteUpdate"] = "p_status_list1_ds_AfterExecuteUpdate";
    $p_status_list1->ds->CCSEvents["BeforeExecuteDelete"] = "p_status_list1_ds_BeforeExecuteDelete";
    $p_status_list1->ds->CCSEvents["AfterExecuteDelete"] = "p_status_list1_ds_AfterExecuteDelete";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow @7-B168EE04
function P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow(& $sender)
{
    $P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_STATUS_LIST; //Compatibility
//End P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow

//Custom Code @43-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

global $FileName;
	$P_STATUS_LIST->P_STATUS_LIST_Insert->Page = $FileName;
	$P_STATUS_LIST->P_STATUS_LIST_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_STATUS_LIST->P_STATUS_LIST_Insert->Parameters = CCRemoveParam($P_STATUS_LIST->P_STATUS_LIST_Insert->Parameters, "P_STATUS_LIST_ID");
	$P_STATUS_LIST->P_STATUS_LIST_Insert->Parameters = CCAddParam($P_STATUS_LIST->P_STATUS_LIST_Insert->Parameters, "TAMBAH", "1");

//Close P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow @7-DE7C5638
    return $P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow;
}
//End Close P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow

//P_STATUS_LIST_Navigator_BeforeShow @92-605FD397
function P_STATUS_LIST_Navigator_BeforeShow(& $sender)
{
    $P_STATUS_LIST_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_STATUS_LIST; //Compatibility
//End P_STATUS_LIST_Navigator_BeforeShow

//Custom Code @93-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_STATUS_LIST_Navigator_BeforeShow @92-7B3CF928
    return $P_STATUS_LIST_Navigator_BeforeShow;
}
//End Close P_STATUS_LIST_Navigator_BeforeShow

//P_STATUS_LIST_BeforeShowRow @2-0E1D1037
function P_STATUS_LIST_BeforeShowRow(& $sender)
{
    $P_STATUS_LIST_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_STATUS_LIST; //Compatibility
//End P_STATUS_LIST_BeforeShowRow

//Set Row Style @49-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @50-2A29BDB7

	$keyId = CCGetFromGet("P_STATUS_LIST_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_STATUS_LIST->P_STATUS_LIST_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_STATUS_LIST_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_STATUS_LIST->P_STATUS_LIST_ID->GetValue() == $keyId) {
		$P_STATUS_LIST->ADLink->Visible = true;
		$P_STATUS_LIST->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_STATUS_LIST->ADLink->Visible = false;
		$P_STATUS_LIST->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_STATUS_LIST_BeforeShowRow @2-0E24005D
    return $P_STATUS_LIST_BeforeShowRow;
}
//End Close P_STATUS_LIST_BeforeShowRow

//p_status_list1_ds_BeforeExecuteInsert @22-AE4368B9
function p_status_list1_ds_BeforeExecuteInsert(& $sender)
{
    $p_status_list1_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_list1; //Compatibility
//End p_status_list1_ds_BeforeExecuteInsert

//Custom Code @84-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close p_status_list1_ds_BeforeExecuteInsert @22-B0905E11
    return $p_status_list1_ds_BeforeExecuteInsert;
}
//End Close p_status_list1_ds_BeforeExecuteInsert

//p_status_list1_ds_AfterExecuteInsert @22-3B21DD23
function p_status_list1_ds_AfterExecuteInsert(& $sender)
{
    $p_status_list1_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_list1; //Compatibility
//End p_status_list1_ds_AfterExecuteInsert

//Custom Code @85-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
  	if(is_array($p_status_list1->DataSource->Provider->Error)) {
 		$error_msg = $p_status_list1->DataSource->Provider->Error['message'];
  		$p_status_list1->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close p_status_list1_ds_AfterExecuteInsert @22-15FB9DA6
    return $p_status_list1_ds_AfterExecuteInsert;
}
//End Close p_status_list1_ds_AfterExecuteInsert

//p_status_list1_ds_BeforeExecuteUpdate @22-C16E7262
function p_status_list1_ds_BeforeExecuteUpdate(& $sender)
{
    $p_status_list1_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_list1; //Compatibility
//End p_status_list1_ds_BeforeExecuteUpdate

//Custom Code @86-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close p_status_list1_ds_BeforeExecuteUpdate @22-7FB99F9E
    return $p_status_list1_ds_BeforeExecuteUpdate;
}
//End Close p_status_list1_ds_BeforeExecuteUpdate

//p_status_list1_ds_AfterExecuteUpdate @22-B6862C1B
function p_status_list1_ds_AfterExecuteUpdate(& $sender)
{
    $p_status_list1_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_list1; //Compatibility
//End p_status_list1_ds_AfterExecuteUpdate

//Custom Code @87-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
  	if(is_array($p_status_list1->DataSource->Provider->Error)) {
 		$error_msg = $p_status_list1->DataSource->Provider->Error['message'];
  		$p_status_list1->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close p_status_list1_ds_AfterExecuteUpdate @22-DAD25C29
    return $p_status_list1_ds_AfterExecuteUpdate;
}
//End Close p_status_list1_ds_AfterExecuteUpdate

//p_status_list1_ds_BeforeExecuteDelete @22-0674857A
function p_status_list1_ds_BeforeExecuteDelete(& $sender)
{
    $p_status_list1_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_list1; //Compatibility
//End p_status_list1_ds_BeforeExecuteDelete

//Custom Code @88-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close p_status_list1_ds_BeforeExecuteDelete @22-E39D39EF
    return $p_status_list1_ds_BeforeExecuteDelete;
}
//End Close p_status_list1_ds_BeforeExecuteDelete

//p_status_list1_ds_AfterExecuteDelete @22-726FC31D
function p_status_list1_ds_AfterExecuteDelete(& $sender)
{
    $p_status_list1_ds_AfterExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_list1; //Compatibility
//End p_status_list1_ds_AfterExecuteDelete

//Custom Code @89-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
  	if(is_array($p_status_list1->DataSource->Provider->Error)) {
 		$error_msg = $p_status_list1->DataSource->Provider->Error['message'];
  		$p_status_list1->Errors->addError($error_msg);
  	};
// -------------------------
//End Custom Code

//Close p_status_list1_ds_AfterExecuteDelete @22-46F6FA58
    return $p_status_list1_ds_AfterExecuteDelete;
}
//End Close p_status_list1_ds_AfterExecuteDelete

//Page_OnInitializeView @1-919B40C5
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_list; //Compatibility
//End Page_OnInitializeView

//Custom Code @51-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-F5734B77
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_list; //Compatibility
//End Page_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
  global $P_STATUS_LISTSearch;
	global $P_STATUS_LIST;
	global $P_STATUS_LIST1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_STATUS_LISTSearch->Visible = false;
		$P_STATUS_LIST->Visible = false;
		//$P_STATUS_LIST1->Visible = true;
		//$P_STATUS_LIST1->ds->SQL = "";
	} else {
		$P_STATUS_LISTSearch->Visible = true;
		$P_STATUS_LIST->Visible = true;
		//$P_STATUS_LIST1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
