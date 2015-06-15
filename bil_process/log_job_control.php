<?php
//Include Common Files @1-06A273F1
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_process/");
define("FileName", "log_job_control.php");
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

//Class_Initialize Event @2-8630BED4
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
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this, "COUNTER_NO");
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

//Show Method @2-AC67CB14
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlJOB_CONTROL_ID"] = CCGetFromGet("JOB_CONTROL_ID", NULL);

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
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->COUNTER_NO->Show();
                $this->LOG_DATE->Show();
                $this->LOG_MESSAGE->Show();
                $this->JOB_CONTROL_ID->Show();
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

//GetErrors Method @2-88B2F6D6
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->COUNTER_NO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LOG_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LOG_MESSAGE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->JOB_CONTROL_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End LOG_PROSES Class @2-FCB6E20C

class clsLOG_PROSESDataSource extends clsDBConn {  //LOG_PROSESDataSource Class @2-4BC6C6B5

//DataSource Variables @2-840245CE
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
//End DataSource Variables

//DataSourceClass_Initialize Event @2-2A9F93A6
    function clsLOG_PROSESDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid LOG_PROSES";
        $this->Initialize();
        $this->COUNTER_NO = new clsField("COUNTER_NO", ccsText, "");
        
        $this->LOG_DATE = new clsField("LOG_DATE", ccsText, "");
        
        $this->LOG_MESSAGE = new clsField("LOG_MESSAGE", ccsText, "");
        
        $this->JOB_CONTROL_ID = new clsField("JOB_CONTROL_ID", ccsText, "");
        

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

//Prepare Method @2-47C58E04
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlJOB_CONTROL_ID", ccsFloat, "", "", $this->Parameters["urlJOB_CONTROL_ID"], "", true);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "JOB_CONTROL_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),true);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-17333184
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM LOG_BACKGROUND_JOB";
        $this->SQL = "SELECT * \n\n" .
        "FROM LOG_BACKGROUND_JOB {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @2-77D60DF7
    function SetValues()
    {
        $this->COUNTER_NO->SetDBValue($this->f("COUNTER_NO"));
        $this->LOG_DATE->SetDBValue($this->f("LOG_DATE"));
        $this->LOG_MESSAGE->SetDBValue($this->f("LOG_MESSAGE"));
        $this->JOB_CONTROL_ID->SetDBValue($this->f("JOB_CONTROL_ID"));
    }
//End SetValues Method

} //End LOG_PROSESDataSource Class @2-FCB6E20C

class clsRecordLOG_BACKGROUND_JOB { //LOG_BACKGROUND_JOB Class @213-302B3332

//Variables @213-D6FF3E86

    // Public variables
    var $ComponentType = "Record";
    var $ComponentName;
    var $Parent;
    var $HTMLFormAction;
    var $PressedButton;
    var $Errors;
    var $ErrorBlock;
    var $FormSubmitted;
    var $FormEnctype;
    var $Visible;
    var $IsEmpty;

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";

    var $InsertAllowed = false;
    var $UpdateAllowed = false;
    var $DeleteAllowed = false;
    var $ReadAllowed   = false;
    var $EditMode      = false;
    var $ds;
    var $DataSource;
    var $ValidatingControls;
    var $Controls;
    var $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @213-C26679A8
    function clsRecordLOG_BACKGROUND_JOB($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record LOG_BACKGROUND_JOB/Error";
        $this->DataSource = new clsLOG_BACKGROUND_JOBDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "LOG_BACKGROUND_JOB";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->INPUT_DATA_CONTROL = & new clsControl(ccsTextBox, "INPUT_DATA_CONTROL", "INPUT_DATA_CONTROL", ccsFloat, "", CCGetRequestParam("INPUT_DATA_CONTROL", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @213-BDB22FD1
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlCOUNTER_NO"] = CCGetFromGet("COUNTER_NO", NULL);
    }
//End Initialize Method

//Validate Method @213-159606BB
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->INPUT_DATA_CONTROL->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->INPUT_DATA_CONTROL->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @213-61367E87
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->INPUT_DATA_CONTROL->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @213-ED598703
function SetPrimaryKeys($keyArray)
{
    $this->PrimaryKeys = $keyArray;
}
function GetPrimaryKeys()
{
    return $this->PrimaryKeys;
}
function GetPrimaryKey($keyName)
{
    return $this->PrimaryKeys[$keyName];
}
//End MasterDetail

//Operation Method @213-17DC9883
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//Show Method @213-B0535367
    function Show()
    {
        global $CCSUseAmp;
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->INPUT_DATA_CONTROL->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->INPUT_DATA_CONTROL->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End LOG_BACKGROUND_JOB Class @213-FCB6E20C

class clsLOG_BACKGROUND_JOBDataSource extends clsDBConn {  //LOG_BACKGROUND_JOBDataSource Class @213-0EA0737C

//DataSource Variables @213-7C8C5261
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;
    var $AllParametersSet;


    // Datasource fields
    var $INPUT_DATA_CONTROL;
//End DataSource Variables

//DataSourceClass_Initialize Event @213-C3371E1C
    function clsLOG_BACKGROUND_JOBDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record LOG_BACKGROUND_JOB/Error";
        $this->Initialize();
        $this->INPUT_DATA_CONTROL = new clsField("INPUT_DATA_CONTROL", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @213-9BA6E1EB
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlCOUNTER_NO", ccsFloat, "", "", $this->Parameters["urlCOUNTER_NO"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "COUNTER_NO", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @213-BB5EB1FC
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM LOG_BACKGROUND_JOB {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @213-BAF0975B
    function SetValues()
    {
    }
//End SetValues Method

} //End LOG_BACKGROUND_JOBDataSource Class @213-FCB6E20C

//Initialize Page @1-4F33ECF2
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
$TemplateFileName = "log_job_control.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-42701CD4
include_once("./log_job_control_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-AB76FCE3
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$LOG_PROSES = & new clsGridLOG_PROSES("", $MainPage);
$Link3 = & new clsControl(ccsLink, "Link3", "Link3", ccsText, "", CCGetRequestParam("Link3", ccsGet, NULL), $MainPage);
$Link3->Parameters = CCGetQueryString("QueryString", array("JOB_CONTROL_ID", "ccsForm"));
$Link3->Page = "billing_period.php";
$LOG_BACKGROUND_JOB = & new clsRecordLOG_BACKGROUND_JOB("", $MainPage);
$MainPage->LOG_PROSES = & $LOG_PROSES;
$MainPage->Link3 = & $Link3;
$MainPage->LOG_BACKGROUND_JOB = & $LOG_BACKGROUND_JOB;
$LOG_PROSES->Initialize();
$LOG_BACKGROUND_JOB->Initialize();

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

//Execute Components @1-2E97ADE8
$LOG_BACKGROUND_JOB->Operation();
//End Execute Components

//Go to destination page @1-91A2CF1B
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($LOG_PROSES);
    unset($LOG_BACKGROUND_JOB);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-22D0B368
$LOG_PROSES->Show();
$LOG_BACKGROUND_JOB->Show();
$Link3->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-D6DC5ECD
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($LOG_PROSES);
unset($LOG_BACKGROUND_JOB);
unset($Tpl);
//End Unload Page


?>
