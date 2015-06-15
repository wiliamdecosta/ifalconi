<?php
//BindEvents Method @1-B7B51E2F
function BindEvents()
{
    global $LOG_PROSES;
    global $CCSEvents;
    $LOG_PROSES->Navigator->CCSEvents["BeforeShow"] = "LOG_PROSES_Navigator_BeforeShow";
    $LOG_PROSES->CCSEvents["BeforeShowRow"] = "LOG_PROSES_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//LOG_PROSES_Navigator_BeforeShow @18-DE42A429
function LOG_PROSES_Navigator_BeforeShow(& $sender)
{
    $LOG_PROSES_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $LOG_PROSES; //Compatibility
//End LOG_PROSES_Navigator_BeforeShow

//Custom Code @50-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close LOG_PROSES_Navigator_BeforeShow @18-41D527B2
    return $LOG_PROSES_Navigator_BeforeShow;
}
//End Close LOG_PROSES_Navigator_BeforeShow

//LOG_PROSES_BeforeShowRow @2-B0E1CDD5
function LOG_PROSES_BeforeShowRow(& $sender)
{
    $LOG_PROSES_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $LOG_PROSES; //Compatibility
//End LOG_PROSES_BeforeShowRow

//Set Row Style @51-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Custom Code @127-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close LOG_PROSES_BeforeShowRow @2-0B2040B9
    return $LOG_PROSES_BeforeShowRow;
}
//End Close LOG_PROSES_BeforeShowRow

//Page_OnInitializeView @1-E99AD238
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $log_close_bill; //Compatibility
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

//Page_BeforeShow @1-CC91E893
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $log_close_bill; //Compatibility
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
