<?php
//BindEvents Method @1-B47D30B5
function BindEvents()
{
    global $P_DETAIL_FEATURE;
    global $P_BILL_COMP;
    global $CCSEvents;
    $P_DETAIL_FEATURE->Navigator->CCSEvents["BeforeShow"] = "P_DETAIL_FEATURE_Navigator_BeforeShow";
    $P_DETAIL_FEATURE->skenarioDel->CCSEvents["BeforeShow"] = "P_DETAIL_FEATURE_skenarioDel_BeforeShow";
    $P_DETAIL_FEATURE->CCSEvents["BeforeShowRow"] = "P_DETAIL_FEATURE_BeforeShowRow";
    $P_BILL_COMP->skenarioDel->CCSEvents["BeforeShow"] = "P_BILL_COMP_skenarioDel_BeforeShow";
    $P_BILL_COMP->ST_NEW->CCSEvents["BeforeShow"] = "P_BILL_COMP_ST_NEW_BeforeShow";
    $P_BILL_COMP->Navigator->CCSEvents["BeforeShow"] = "P_BILL_COMP_Navigator_BeforeShow";
    $P_BILL_COMP->CCSEvents["BeforeShowRow"] = "P_BILL_COMP_BeforeShowRow";
    $P_BILL_COMP->CCSEvents["BeforeShow"] = "P_BILL_COMP_BeforeShow";
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

//P_DETAIL_FEATURE_skenarioDel_BeforeShow @145-B5B63330
function P_DETAIL_FEATURE_skenarioDel_BeforeShow(& $sender)
{
    $P_DETAIL_FEATURE_skenarioDel_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DETAIL_FEATURE; //Compatibility
//End P_DETAIL_FEATURE_skenarioDel_BeforeShow

//Custom Code @219-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close P_DETAIL_FEATURE_skenarioDel_BeforeShow @145-EB461AC6
    return $P_DETAIL_FEATURE_skenarioDel_BeforeShow;
}
//End Close P_DETAIL_FEATURE_skenarioDel_BeforeShow

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
//	global $P_DETAIL_FEATURE1;
    global $selected_id;
    global $add_flag;
	global $P_BILL_COMP;
	global $Tess;
	global $id;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_RECU_TARIFF_BUNDLED_FEAT_ID->GetValue();
       // $P_DETAIL_FEATURE1->DataSource->Parameters["urlP_RECU_TARIFF_BUNDLED_FEAT_ID"] = $selected_id;
        
   }
    $img_radio= "<img border='0' src='../images/radio.gif'>";
    
// -------------------------
//End Custom Code



//Set Row Style @15-982C9472

   $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_RECU_TARIFF_BUNDLED_FEAT_ID->GetValue()== $selected_id) {
    	$img_radio= "<img border='0' src='../images/radio_s.gif'>";
        $Style = $styles[1];
    }	
    
    if (count($styles)) {
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
	
	
	//die($selected_id);
	$Component->DLink->SetValue($img_radio);
//End Set Row Style

//Close P_DETAIL_FEATURE_BeforeShowRow @2-3527A9EE
    return $P_DETAIL_FEATURE_BeforeShowRow;
}
//End Close P_DETAIL_FEATURE_BeforeShowRow

//P_BILL_COMP_skenarioDel_BeforeShow @303-28504DD4
function P_BILL_COMP_skenarioDel_BeforeShow(& $sender)
{
    $P_BILL_COMP_skenarioDel_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_COMP; //Compatibility
//End P_BILL_COMP_skenarioDel_BeforeShow

//Custom Code @304-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close P_BILL_COMP_skenarioDel_BeforeShow @303-F7D3F44E
    return $P_BILL_COMP_skenarioDel_BeforeShow;
}
//End Close P_BILL_COMP_skenarioDel_BeforeShow

//P_BILL_COMP_ST_NEW_BeforeShow @296-D16B2E1F
function P_BILL_COMP_ST_NEW_BeforeShow(& $sender)
{
    $P_BILL_COMP_ST_NEW_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_COMP; //Compatibility
//End P_BILL_COMP_ST_NEW_BeforeShow

//Custom Code @317-2A29BDB7
// -------------------------
	global $selected_id;
    // Write your own code here.
	
	global $FileName;
	$P_BILL_COMP->ST_NEW->Parameters = CCAddParam($P_BILL_COMP->ST_NEW->Parameters, "P_RECU_TARIFF_BUNDLED_FEAT_ID", $selected_id);
// -------------------------
//End Custom Code

//Close P_BILL_COMP_ST_NEW_BeforeShow @296-28E99F14
    return $P_BILL_COMP_ST_NEW_BeforeShow;
}
//End Close P_BILL_COMP_ST_NEW_BeforeShow

//P_BILL_COMP_Navigator_BeforeShow @294-18D3AE09
function P_BILL_COMP_Navigator_BeforeShow(& $sender)
{
    $P_BILL_COMP_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_COMP; //Compatibility
//End P_BILL_COMP_Navigator_BeforeShow

//Custom Code @295-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_BILL_COMP_Navigator_BeforeShow @294-020DD7DF
    return $P_BILL_COMP_Navigator_BeforeShow;
}
//End Close P_BILL_COMP_Navigator_BeforeShow

//P_BILL_COMP_BeforeShowRow @288-20DE0044
function P_BILL_COMP_BeforeShowRow(& $sender)
{
    $P_BILL_COMP_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_COMP; //Compatibility
//End P_BILL_COMP_BeforeShowRow

//Custom Code @307-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close P_BILL_COMP_BeforeShowRow @288-0DE8DDD0
    return $P_BILL_COMP_BeforeShowRow;
}
//End Close P_BILL_COMP_BeforeShowRow

//P_BILL_COMP_BeforeShow @288-92518115
function P_BILL_COMP_BeforeShow(& $sender)
{
    $P_BILL_COMP_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_COMP; //Compatibility
//End P_BILL_COMP_BeforeShow

//Custom Code @312-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close P_BILL_COMP_BeforeShow @288-C8FDEC89
    return $P_BILL_COMP_BeforeShow;
}
//End Close P_BILL_COMP_BeforeShow

//Page_OnInitializeView @1-513C9FD4
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bundled_tariff; //Compatibility
//End Page_OnInitializeView

//Custom Code @79-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_RECU_TARIFF_BUNDLED_FEAT_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
	
		

	global $selected_id2;
    global $add_flag;
    $selected_id2 = -1;
    $selected_id2=CCGetFromGet("P_RT_BUND_FEAT_BILL_COMP_ID", $selected_id2);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-DAC3064F
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bundled_tariff; //Compatibility
//End Page_BeforeShow

//Custom Code @80-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_BeforeInitialize @1-FB434CB7
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bundled_tariff; //Compatibility
//End Page_BeforeInitialize

//Custom Code @287-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;

	if(CCGetFromGET('action_delete')==true){
		$addQueryString = CCGetQueryString('QueryString');
		$addQueryString = CCRemoveParam($addQueryString,"action_delete");
		$addQueryString = CCRemoveParam($addQueryString,"P_RECU_TARIFF_BUNDLED_FEAT_ID");
		
		$dbConn = new clsDBConn();
	 	$query = "DELETE FROM P_RECU_TARIFF_BUNDLED_FEAT WHERE  P_RECU_TARIFF_BUNDLED_FEAT_ID =" . CCGetFromGet('P_RECU_TARIFF_BUNDLED_FEAT_ID');
		$dbConn->query($query);

		//ob_end_clean();
	  	if(is_array($P_DETAIL_FEATURE->DataSource->Provider->Error)) {
	 		$error_msg = $P_DETAIL_FEATURE->DataSource->Provider->Error['message'];
	  		$P_DETAIL_FEATURE->Errors->addError($error_msg);
	  	};
		$Redirect = $FileName."?".$addQueryString;
		//die($Redirect);
		header("Location: ".$Redirect);
		echo $addQueryString;

		exit;
	}

	if(CCGetFromGET('action_delete2')==true){
		$addQueryString = CCGetQueryString('QueryString');
		$addQueryString = CCRemoveParam($addQueryString,"action_delete2");
		$addQueryString = CCRemoveParam($addQueryString,"P_RT_BUND_FEAT_BILL_COMP_ID");
		
		$dbConn = new clsDBConn();
	 	$query = "DELETE FROM P_RT_BUND_FEAT_BILL_COMP WHERE  P_RT_BUND_FEAT_BILL_COMP_ID =" . CCGetFromGet('P_RT_BUND_FEAT_BILL_COMP_ID');
		$dbConn->query($query);


		$Redirect = $FileName."?".$addQueryString;
		//die($Redirect);
		header("Location: ".$Redirect);
		echo $addQueryString;

		exit;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize


?>
