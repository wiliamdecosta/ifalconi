<?php
//BindEvents Method @1-E9E05A58
function BindEvents()
{
    global $P_REGIONGridPage;
    global $P_REGION1;
    global $CCSEvents;
    $P_REGIONGridPage->BATCH_Insert1->CCSEvents["BeforeShow"] = "P_REGIONGridPage_BATCH_Insert1_BeforeShow";
    $P_REGIONGridPage->PARENT_ID->CCSEvents["BeforeShow"] = "P_REGIONGridPage_PARENT_ID_BeforeShow";
    $P_REGIONGridPage->CCSEvents["BeforeShowRow"] = "P_REGIONGridPage_BeforeShowRow";
    $P_REGION1->LEVEL_NAME->CCSEvents["BeforeShow"] = "P_REGION1_LEVEL_NAME_BeforeShow";
    $P_REGION1->P_REGION_LEVEL_ID->CCSEvents["BeforeShow"] = "P_REGION1_P_REGION_LEVEL_ID_BeforeShow";
    $P_REGION1->Button_Insert->CCSEvents["OnClick"] = "P_REGION1_Button_Insert_OnClick";
    $P_REGION1->CCSEvents["BeforeShow"] = "P_REGION1_BeforeShow";
    $P_REGION1->ds->CCSEvents["BeforeExecuteInsert"] = "P_REGION1_ds_BeforeExecuteInsert";
    $P_REGION1->ds->CCSEvents["AfterExecuteInsert"] = "P_REGION1_ds_AfterExecuteInsert";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_REGIONGridPage_BATCH_Insert1_BeforeShow @318-7A3E5CDC
function P_REGIONGridPage_BATCH_Insert1_BeforeShow(& $sender)
{
    $P_REGIONGridPage_BATCH_Insert1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGIONGridPage; //Compatibility
//End P_REGIONGridPage_BATCH_Insert1_BeforeShow

//Custom Code @319-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_REGIONGridPage->BATCH_Insert1->Page = $FileName;
	$P_REGIONGridPage->BATCH_Insert1->Parameters = CCGetQueryString("QueryString", "");
	$P_REGIONGridPage->BATCH_Insert1->Parameters = CCRemoveParam($P_REGIONGridPage->BATCH_Insert1->Parameters, "P_REGION_ID");
	$P_REGIONGridPage->BATCH_Insert1->Parameters = CCAddParam($P_REGIONGridPage->BATCH_Insert1->Parameters, "TAMBAH", "1");
	
// -------------------------
//End Custom Code

//Close P_REGIONGridPage_BATCH_Insert1_BeforeShow @318-973EA712
    return $P_REGIONGridPage_BATCH_Insert1_BeforeShow;
}
//End Close P_REGIONGridPage_BATCH_Insert1_BeforeShow

//P_REGIONGridPage_PARENT_ID_BeforeShow @468-88F7FF6C
function P_REGIONGridPage_PARENT_ID_BeforeShow(& $sender)
{
    $P_REGIONGridPage_PARENT_ID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGIONGridPage; //Compatibility
//End P_REGIONGridPage_PARENT_ID_BeforeShow

//Custom Code @477-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close P_REGIONGridPage_PARENT_ID_BeforeShow @468-2D9384C2
    return $P_REGIONGridPage_PARENT_ID_BeforeShow;
}
//End Close P_REGIONGridPage_PARENT_ID_BeforeShow

//P_REGIONGridPage_BeforeShowRow @393-538D91D3
function P_REGIONGridPage_BeforeShowRow(& $sender)
{
    $P_REGIONGridPage_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGIONGridPage; //Compatibility
//End P_REGIONGridPage_BeforeShowRow

//Set Row Style @402-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @403-2A29BDB7
// -------------------------
    // Write your own code here.

	$cek = $P_REGIONGridPage->PARENT_ID->GetValue();
	if(empty($cek)){
		$P_REGIONGridPage->PARENT_ID->SetValue(0);
	}

	$keyId = CCGetFromGet("P_REGION_ID", 0);
	$sCode = CCGetFromGet("s_keyword", "");
	$parent = CCGetFromGet("PARENT_ID", 0);
	$level = CCGetFromGet("P_REGION_LEVEL_ID", 0);
	

	global $id;
	global $ids;
	global $idk;
	global $FileName;
	global $PathToCurrentPage;
	global $P_REGION1;
	
	if ($keyId==0 && $parent==$level && $level==$parent) {
		$ids = $P_REGIONGridPage->PARENT_ID->GetValue();
		$idk = $P_REGIONGridPage->P_REGION_LEVEL_ID->GetValue();
		$param = CCGetQueryString("QueryString", "");
		$param = CCRemoveParam($param,"P_REGION_ID");
		$param = CCAddParam($param, "P_REGION_ID", $id);
		$param = CCAddParam($param, "PARENT_ID", $ids);
		$param = CCAddParam($param, "P_REGION_LEVEL_ID", $idk);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		//header("Location: ".$Redirect);
		//return;
	}
	$fromGET = CCGetFromGet('P_REGION_ID');
	if($id==-1&&empty($fromGET)){
		$id = $P_REGIONGridPage->DataSource->P_REGION_ID->GetValue();
		$P_REGION1->DataSource->Parameters["urlP_REGION_ID"] =$id;
		$P_REGION1->DataSource->Prepare();
		$P_REGION1->EditMode = $P_REGION1->DataSource->AllParametersSet;
	
	}else{
		$id= CCGetFromGet('P_REGION_ID');
	}
	//echo $id .'||'.$P_REGIONGridPage->P_REGION_ID->GetValue();
	//echo '<br>';
	
	if ($id == $P_REGIONGridPage->P_REGION_ID->GetValue() && $P_REGIONGridPage->P_REGION_LEVEL_ID->GetValue() == $level && $P_REGIONGridPage->PARENT_ID->GetValue() == $parent) {
		//die($keyId."-".$P_REGIONGridPage->P_REGION_ID->GetValue());
		$P_REGIONGridPage->ADLink->Visible = true;
		$P_REGIONGridPage->DLink->Visible = false;
		$P_REGIONGridPage->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_REGIONGridPage->ADLink->Visible = false;
		$P_REGIONGridPage->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_REGIONGridPage_BeforeShowRow @393-4AF6D527
    return $P_REGIONGridPage_BeforeShowRow;
}
//End Close P_REGIONGridPage_BeforeShowRow

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  /*	if($P_REGION1->Button_Insert->Pressed){
//DEL  		
//DEL  	}
//DEL  	else{
//DEL  		echo "fail";
//DEL  		exit;
//DEL  	}*/
//DEL  // -------------------------

//P_REGION1_LEVEL_NAME_BeforeShow @415-D5595087
function P_REGION1_LEVEL_NAME_BeforeShow(& $sender)
{
    $P_REGION1_LEVEL_NAME_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION1; //Compatibility
//End P_REGION1_LEVEL_NAME_BeforeShow

//Custom Code @423-2A29BDB7
// -------------------------
    // Write your own code here.
	

	//$P_REGION1->P_REGION_LEVEL_NAME->SetValue();
// -------------------------
//End Custom Code

//Close P_REGION1_LEVEL_NAME_BeforeShow @415-7E933683
    return $P_REGION1_LEVEL_NAME_BeforeShow;
}
//End Close P_REGION1_LEVEL_NAME_BeforeShow

//P_REGION1_P_REGION_LEVEL_ID_BeforeShow @422-60FA3C84
function P_REGION1_P_REGION_LEVEL_ID_BeforeShow(& $sender)
{
    $P_REGION1_P_REGION_LEVEL_ID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION1; //Compatibility
//End P_REGION1_P_REGION_LEVEL_ID_BeforeShow

//Custom Code @469-2A29BDB7
// -------------------------
    // Write your own code here.
	$P_REGION1->P_REGION_LEVEL_ID->SetValue(CCGetFromGet("P_REGION_LEVEL_ID"));
// -------------------------
//End Custom Code

//Close P_REGION1_P_REGION_LEVEL_ID_BeforeShow @422-35E00A36
    return $P_REGION1_P_REGION_LEVEL_ID_BeforeShow;
}
//End Close P_REGION1_P_REGION_LEVEL_ID_BeforeShow

//P_REGION1_Button_Insert_OnClick @478-445AAF95
function P_REGION1_Button_Insert_OnClick(& $sender)
{
    $P_REGION1_Button_Insert_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION1; //Compatibility
//End P_REGION1_Button_Insert_OnClick

//Custom Code @479-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	if($P_REGION1_Button_Insert_OnClick == true){
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "test", "1");		
		$Redirect = $FileName."?".$param;
		header("Location: ".$Redirect);
		
		

		//return;
	}

// -------------------------
//End Custom Code

//Close P_REGION1_Button_Insert_OnClick @478-2E4BD381
    return $P_REGION1_Button_Insert_OnClick;
}
//End Close P_REGION1_Button_Insert_OnClick

//P_REGION1_BeforeShow @407-720358D6
function P_REGION1_BeforeShow(& $sender)
{
    $P_REGION1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION1; //Compatibility
//End P_REGION1_BeforeShow

//Custom Code @424-2A29BDB7
// -------------------------
    // Write your own code here.
	if($P_REGION1->PARENT_ID->GetValue() == 0)
		$P_REGION1->PARENT_ID->SetValue("");
// -------------------------
//End Custom Code

//Close P_REGION1_BeforeShow @407-532BCDA1
    return $P_REGION1_BeforeShow;
}
//End Close P_REGION1_BeforeShow

//P_REGION1_ds_BeforeExecuteInsert @407-D92B7F8A
function P_REGION1_ds_BeforeExecuteInsert(& $sender)
{
    $P_REGION1_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION1; //Compatibility
//End P_REGION1_ds_BeforeExecuteInsert

//Custom Code @464-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_start();
// -------------------------
//End Custom Code

//Close P_REGION1_ds_BeforeExecuteInsert @407-3F736C88
    return $P_REGION1_ds_BeforeExecuteInsert;
}
//End Close P_REGION1_ds_BeforeExecuteInsert

//P_REGION1_ds_AfterExecuteInsert @407-D02A5E92
function P_REGION1_ds_AfterExecuteInsert(& $sender)
{
    $P_REGION1_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION1; //Compatibility
//End P_REGION1_ds_AfterExecuteInsert

//Custom Code @465-2A29BDB7
// -------------------------
    // Write your own code here.
	ob_end_clean();
	//exit;
	if(is_array($P_REGION1->DataSource->Provider->Error)) {
		$error_msg = $P_REGION1->DataSource->Provider->Error['message'];
		$P_REGION1->Errors->addError($error_msg);
	};

	?>
		<script language="javascript">
		  	document.getElementById('f_region_parent').contentWindow.location.reload();
		</script>
	<?php
	global $FileName;
	$param = CCGetQueryString("QueryString", "");	
		$Redirect = $FileName."?".$param;
		header("Location: ".$Redirect);
// -------------------------
//End Custom Code

//Close P_REGION1_ds_AfterExecuteInsert @407-9357FB7A
    return $P_REGION1_ds_AfterExecuteInsert;
}
//End Close P_REGION1_ds_AfterExecuteInsert

//Page_BeforeShow @1-46E9C998
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_region_level_tree; //Compatibility
//End Page_BeforeShow

//Custom Code @446-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_REGIONSearch;
	global $P_REGIONGridPage;
	global $pP_REGION1;
	global $id;

	$id=-1;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_REGIONSearch->Visible = false;
		$P_REGIONGridPage->Visible = false;
		$P_REGION1->Visible = true;
		$P_REGION1->ds->SQL = "";
	} else {
		$P_REGIONSearch->Visible = true;
		$P_REGIONGridPage->Visible = true;
		$P_REGION1->Visible = true;
	}
	
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_BeforeInitialize @1-1A10CF7E
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_region_level_tree; //Compatibility
//End Page_BeforeInitialize

//Custom Code @480-2A29BDB7
// -------------------------
    // Write your own code here.
	$ids = CCGetFromGet("test","");
	if($ids == "1"){
	?>
		<script language="javascript">
		  	alert("masuk");
		</script>
	<?php
	}
// -------------------------
//End Custom Code

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL      global $selected_id;
//DEL      global $add_flag;
//DEL      $selected_id = -1;
//DEL      $selected_id=CCGetFromGet("P_MENU_ID", $selected_id);
//DEL      $add_flag=CCGetFromGet("FLAG", "NONE");
//DEL  // -------------------------



?>
