<?php
//Include Common Files @1-3D4D1FF5
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_process/");
define("FileName", "log_close_bill.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridLOG_PROSES { //LOG_PROSES class @2-C200E1F1

//Variables @2-AC1EDBB9

    // Public variables
    var $ComponentType = "Grid";
    var $ComponentName;
    var $Visible;
    var $Errors;
    var $ErrorBlock;
    var $ds;
    var $DataSource;
    var $PageSize;
    var $IsEmpty;
    var $ForceIteration = false;
    var $HasRecord = false;
    var $SorterName = "";
    var $SorterDirection = "";
    var $PageNumber;
    var $RowNumber;
    var $ControlsVisible = array();

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";
    var $Attributes;

    // Grid Controls
    var $StaticControls;
    var $RowControls;
//End Variables

//Class_Initialize Event @2-9C0CE608
    function clsGridLOG_PROSES($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "LOG_PROSES";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid LOG_PROSES";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsLOG_PROSESDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 15;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->COUNTER_NO = & new clsControl(ccsLabel, "COUNTER_NO", "COUNTER_NO", ccsText, "", CCGetRequestParam("COUNTER_NO", ccsGet, NULL), $this);
        $this->LOG_DATE = & new clsControl(ccsLabel, "LOG_DATE", "LOG_DATE", ccsText, "", CCGetRequestParam("LOG_DATE", ccsGet, NULL), $this);
        $this->LOG_MESSAGE = & new clsControl(ccsLabel, "LOG_MESSAGE", "LOG_MESSAGE", ccsText, "", CCGetRequestParam("LOG_MESSAGE", ccsGet, NULL), $this);
        $this->JOB_CONTROL_ID = & new clsControl(ccsHidden, "JOB_CONTROL_ID", "JOB_CONTROL_ID", ccsText, "", CCGetRequestParam("JOB_CONTROL_ID", ccsGet, NULL), $this);
        $this->INVOICE_DATE = & new clsControl(ccsHidden, "INVOICE_DATE", "INVOICE_DATE", ccsText, "", CCGetRequestParam("INVOICE_DATE", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @2-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @2-245908F4
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlINVOICE_DATE"] = CCGetFromGet("INVOICE_DATE", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["COUNTER_NO"] = $this->COUNTER_NO->Visible;
            $this->ControlsVisible["LOG_DATE"] = $this->LOG_DATE->Visible;
            $this->ControlsVisible["LOG_MESSAGE"] = $this->LOG_MESSAGE->Visible;
            $this->ControlsVisible["JOB_CONTROL_ID"] = $this->JOB_CONTROL_ID->Visible;
            $this->ControlsVisible["INVOICE_DATE"] = $this->INVOICE_DATE->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->COUNTER_NO->SetValue($this->DataSource->COUNTER_NO->GetValue());
                $this->LOG_DATE->SetValue($this->DataSource->LOG_DATE->GetValue());
                $this->LOG_MESSAGE->SetValue($this->DataSource->LOG_MESSAGE->GetValue());
                $this->JOB_CONTROL_ID->SetValue($this->DataSource->JOB_CONTROL_ID->GetValue());
                $this->INVOICE_DATE->SetValue($this->DataSource->INVOICE_DATE->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->COUNTER_NO->Show();
                $this->LOG_DATE->Show();
                $this->LOG_MESSAGE->Show();
                $this->JOB_CONTROL_ID->Show();
                $this->INVOICE_DATE->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }
        else { // Show NoRecords block if no records are found
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-06CAD3A5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->COUNTER_NO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LOG_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LOG_MESSAGE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->JOB_CONTROL_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->INVOICE_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End LOG_PROSES Class @2-FCB6E20C

class clsLOG_PROSESDataSource extends clsDBConn {  //LOG_PROSESDataSource Class @2-4BC6C6B5

//DataSource Variables @2-DC9795B0
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $COUNTER_NO;
    var $LOG_DATE;
    var $LOG_MESSAGE;
    var $JOB_CONTROL_ID;
    var $INVOICE_DATE;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-09385C89
    function clsLOG_PROSESDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid LOG_PROSES";
        $this->Initialize();
        $this->COUNTER_NO = new clsField("COUNTER_NO", ccsText, "");
        
        $this->LOG_DATE = new clsField("LOG_DATE", ccsText, "");
        
        $this->LOG_MESSAGE = new clsField("LOG_MESSAGE", ccsText, "");
        
        $this->JOB_CONTROL_ID = new clsField("JOB_CONTROL_ID", ccsText, "");
        
        $this->INVOICE_DATE = new clsField("INVOICE_DATE", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-B343CC71
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlINVOICE_DATE", ccsText, "", "", $this->Parameters["urlINVOICE_DATE"], "", false);
    }
//End Prepare Method

//Open Method @2-174A5D91
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM V_LOG_BACKGROUND_JOB_DATE\n" .
        "WHERE to_char(INVOICE_DATE,'dd-MON-yyyy') = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' AND INPUT_DATA_CLASS_ID=35) cnt";
        $this->SQL = "SELECT * \n" .
        "FROM V_LOG_BACKGROUND_JOB_DATE\n" .
        "WHERE to_char(INVOICE_DATE,'dd-MON-yyyy') = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' AND INPUT_DATA_CLASS_ID=35";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
        $this->MoveToPage($this->AbsolutePage);
    }
//End Open Method

//SetValues Method @2-0B0EA60A
    function SetValues()
    {
        $this->COUNTER_NO->SetDBValue($this->f("COUNTER_NO"));
        $this->LOG_DATE->SetDBValue($this->f("LOG_DATE"));
        $this->LOG_MESSAGE->SetDBValue($this->f("LOG_MESSAGE"));
        $this->JOB_CONTROL_ID->SetDBValue($this->f("JOB_CONTROL_ID"));
        $this->INVOICE_DATE->SetDBValue($this->f("INVOICE_DATE"));
    }
//End SetValues Method

} //End LOG_PROSESDataSource Class @2-FCB6E20C

//Initialize Page @1-48C24C28
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "log_close_bill.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-66073D98
include_once("./log_close_bill_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-BE732A29
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$LOG_PROSES = & new clsGridLOG_PROSES("", $MainPage);
$MainPage->LOG_PROSES = & $LOG_PROSES;
$LOG_PROSES->Initialize();

BindEvents();

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-52F9C312
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
$Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "CP1252");
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "../");
$Attributes->Show();
//End Initialize HTML Template

//Go to destination page @1-C718C8AA
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($LOG_PROSES);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-0E19DEC4
$LOG_PROSES->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-00EFDAB5
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($LOG_PROSES);
unset($Tpl);
//End Unload Page


?>
