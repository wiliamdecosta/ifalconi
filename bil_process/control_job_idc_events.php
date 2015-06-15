<?php
//BindEvents Method @1-019ABCB0
function BindEvents()
{
    global $p_application;
    global $Label1;
    global $Label3;
    global $CCSEvents;
    $p_application->CCSEvents["BeforeShow"] = "p_application_BeforeShow";
    $Label1->CCSEvents["BeforeShow"] = "Label1_BeforeShow";
    $Label3->CCSEvents["BeforeShow"] = "Label3_BeforeShow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//p_application_BeforeShow @135-123A219C
function p_application_BeforeShow(& $sender)
{
    $p_application_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_application; //Compatibility
//End p_application_BeforeShow

//Custom Code @147-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close p_application_BeforeShow @135-42E9EEC8
    return $p_application_BeforeShow;
}
//End Close p_application_BeforeShow

//Label1_BeforeShow @138-62EBFD0A
function Label1_BeforeShow(& $sender)
{
    $Label1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Label1; //Compatibility
//End Label1_BeforeShow

//Custom Code @139-2A29BDB7
// -------------------------
    // Write your own code here.
	$id = CCGetFromGet("INPUT_DATA_CONTROL_ID","");
	$Label1->SetValue("<iframe name='framebox' id='framebox' height='456' width='350' frameborder='0' src='pohon_tree.php?INPUT_DATA_CONTROL_ID=".$id."'></iframe>");
	
// -------------------------
//End Custom Code

//Close Label1_BeforeShow @138-B48DF954
    return $Label1_BeforeShow;
}
//End Close Label1_BeforeShow

//Label3_BeforeShow @142-FCE582BF
function Label3_BeforeShow(& $sender)
{
    $Label3_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Label3; //Compatibility
//End Label3_BeforeShow

//Custom Code @143-2A29BDB7
// -------------------------
    // Write your own code here.
	//$iid = CCGetFromGet("JOB_CONTROL_ID","");
	//$id = CCGetFromGet("INPUT_DATA_CONTROL_ID","");

	$Label3->SetValue("<iframe name='framesTarget' id='framesTarget' width='600' height='456'></iframe>");
	
// -------------------------
//End Custom Code

//Close Label3_BeforeShow @142-55E33DF9
    return $Label3_BeforeShow;
}
//End Close Label3_BeforeShow

//Page_OnInitializeView @1-AD171F3C
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $control_job_idc; //Compatibility
//End Page_OnInitializeView

//Custom Code @49-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-EC366E66
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $control_job_idc; //Compatibility
//End Page_BeforeShow

//Custom Code @129-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
