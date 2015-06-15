<?php
//Include Common Files @1-04590326
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_data/");
define("FileName", "t_input_data_control.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridV_INVOICE_PERIOD { //V_INVOICE_PERIOD class @2-8905824D

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

//Class_Initialize Event @2-E7D1AF99
    function clsGridV_INVOICE_PERIOD($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "V_INVOICE_PERIOD";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid V_INVOICE_PERIOD";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsV_INVOICE_PERIODDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 10;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->INPUT_DATA_CONTROL_ID = & new clsControl(ccsLabel, "INPUT_DATA_CONTROL_ID", "INPUT_DATA_CONTROL_ID", ccsFloat, "", CCGetRequestParam("INPUT_DATA_CONTROL_ID", ccsGet, NULL), $this);
        $this->INVOICE_DATE2 = & new clsControl(ccsLabel, "INVOICE_DATE2", "INVOICE_DATE2", ccsText, "", CCGetRequestParam("INVOICE_DATE2", ccsGet, NULL), $this);
        $this->BILL_CYCLE_CODE = & new clsControl(ccsLabel, "BILL_CYCLE_CODE", "BILL_CYCLE_CODE", ccsText, "", CCGetRequestParam("BILL_CYCLE_CODE", ccsGet, NULL), $this);
        $this->FINANCE_PERIOD_CODE = & new clsControl(ccsLabel, "FINANCE_PERIOD_CODE", "FINANCE_PERIOD_CODE", ccsText, "", CCGetRequestParam("FINANCE_PERIOD_CODE", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "t_input_data_control.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "t_input_data_control.php";
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 3, tpCentered, $this);
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

//Show Method @2-D0FDC17D
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;


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
            $this->ControlsVisible["INPUT_DATA_CONTROL_ID"] = $this->INPUT_DATA_CONTROL_ID->Visible;
            $this->ControlsVisible["INVOICE_DATE2"] = $this->INVOICE_DATE2->Visible;
            $this->ControlsVisible["BILL_CYCLE_CODE"] = $this->BILL_CYCLE_CODE->Visible;
            $this->ControlsVisible["FINANCE_PERIOD_CODE"] = $this->FINANCE_PERIOD_CODE->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->INPUT_DATA_CONTROL_ID->SetValue($this->DataSource->INPUT_DATA_CONTROL_ID->GetValue());
                $this->INVOICE_DATE2->SetValue($this->DataSource->INVOICE_DATE2->GetValue());
                $this->BILL_CYCLE_CODE->SetValue($this->DataSource->BILL_CYCLE_CODE->GetValue());
                $this->FINANCE_PERIOD_CODE->SetValue($this->DataSource->FINANCE_PERIOD_CODE->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "INPUT_DATA_CONTROL_ID", $this->DataSource->f("INPUT_DATA_CONTROL_ID"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "INVOICE_DATE", $this->DataSource->f("INVOICE_DATE2"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "INPUT_DATA_CONTROL_ID", $this->DataSource->f("INPUT_DATA_CONTROL_ID"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "INVOICE_DATE", $this->DataSource->f("INVOICE_DATE2"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->INPUT_DATA_CONTROL_ID->Show();
                $this->INVOICE_DATE2->Show();
                $this->BILL_CYCLE_CODE->Show();
                $this->FINANCE_PERIOD_CODE->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
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

//GetErrors Method @2-069BCA74
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->INPUT_DATA_CONTROL_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->INVOICE_DATE2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_CYCLE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FINANCE_PERIOD_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End V_INVOICE_PERIOD Class @2-FCB6E20C

class clsV_INVOICE_PERIODDataSource extends clsDBConn {  //V_INVOICE_PERIODDataSource Class @2-1185AB95

//DataSource Variables @2-48C4F6D1
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $INPUT_DATA_CONTROL_ID;
    var $INVOICE_DATE2;
    var $BILL_CYCLE_CODE;
    var $FINANCE_PERIOD_CODE;
    var $DLink;
    var $ADLink;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-14118FF4
    function clsV_INVOICE_PERIODDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid V_INVOICE_PERIOD";
        $this->Initialize();
        $this->INPUT_DATA_CONTROL_ID = new clsField("INPUT_DATA_CONTROL_ID", ccsFloat, "");
        
        $this->INVOICE_DATE2 = new clsField("INVOICE_DATE2", ccsText, "");
        
        $this->BILL_CYCLE_CODE = new clsField("BILL_CYCLE_CODE", ccsText, "");
        
        $this->FINANCE_PERIOD_CODE = new clsField("FINANCE_PERIOD_CODE", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        

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

//Prepare Method @2-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @2-181AFDFD
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT c.* ,to_char(INVOICE_DATE,'dd-MON-yyyy') as INVOICE_DATE2 FROM\n" .
        "V_INPUT_DATA_CONTROL c) cnt";
        $this->SQL = "SELECT c.* ,to_char(INVOICE_DATE,'dd-MON-yyyy') as INVOICE_DATE2 FROM\n" .
        "V_INPUT_DATA_CONTROL c";
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

//SetValues Method @2-35BB796E
    function SetValues()
    {
        $this->INPUT_DATA_CONTROL_ID->SetDBValue(trim($this->f("INPUT_DATA_CONTROL_ID")));
        $this->INVOICE_DATE2->SetDBValue($this->f("INVOICE_DATE2"));
        $this->BILL_CYCLE_CODE->SetDBValue($this->f("BILL_CYCLE_CODE"));
        $this->FINANCE_PERIOD_CODE->SetDBValue($this->f("FINANCE_PERIOD_CODE"));
        $this->DLink->SetDBValue($this->f("INPUT_DATA_CONTROL_ID"));
        $this->ADLink->SetDBValue($this->f("INPUT_DATA_CONTROL_ID"));
    }
//End SetValues Method

} //End V_INVOICE_PERIODDataSource Class @2-FCB6E20C

class clsRecordp_customer_account { //p_customer_account Class @72-C09290F0

//Variables @72-D6FF3E86

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

//Class_Initialize Event @72-A31B5BD9
    function clsRecordp_customer_account($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_customer_account/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_customer_account";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->INPUT_DATA_CONTROL_ID = & new clsControl(ccsTextBox, "INPUT_DATA_CONTROL_ID", "INPUT_DATA_CONTROL_ID", ccsText, "", CCGetRequestParam("INPUT_DATA_CONTROL_ID", $Method, NULL), $this);
            $this->INVOICE_DATE = & new clsControl(ccsTextBox, "INVOICE_DATE", "INVOICE_DATE", ccsText, "", CCGetRequestParam("INVOICE_DATE", $Method, NULL), $this);
            $this->FINANCE_PERIOD_CODE = & new clsControl(ccsTextBox, "FINANCE_PERIOD_CODE", "FINANCE_PERIOD_CODE", ccsText, "", CCGetRequestParam("FINANCE_PERIOD_CODE", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @72-5C3135E4
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->INPUT_DATA_CONTROL_ID->Validate() && $Validation);
        $Validation = ($this->INVOICE_DATE->Validate() && $Validation);
        $Validation = ($this->FINANCE_PERIOD_CODE->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->INPUT_DATA_CONTROL_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->INVOICE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FINANCE_PERIOD_CODE->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @72-E26C9EC0
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->INPUT_DATA_CONTROL_ID->Errors->Count());
        $errors = ($errors || $this->INVOICE_DATE->Errors->Count());
        $errors = ($errors || $this->FINANCE_PERIOD_CODE->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @72-ED598703
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

//Operation Method @72-82225C24
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
    }
//End Operation Method

//Show Method @72-D6592DBD
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
        if (!$this->FormSubmitted) {
            $this->INVOICE_DATE->SetText(CCGetFromGet("INVOICE_DATE"));
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->INPUT_DATA_CONTROL_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INVOICE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FINANCE_PERIOD_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
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

        $this->INPUT_DATA_CONTROL_ID->Show();
        $this->INVOICE_DATE->Show();
        $this->FINANCE_PERIOD_CODE->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End p_customer_account Class @72-FCB6E20C









//Initialize Page @1-61F827A1
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
$TemplateFileName = "t_input_data_control.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-59E9524B
include_once("./t_input_data_control_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-69AAD2A3
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$V_INVOICE_PERIOD = & new clsGridV_INVOICE_PERIOD("", $MainPage);
$p_customer_account = & new clsRecordp_customer_account("", $MainPage);
$MainPage->V_INVOICE_PERIOD = & $V_INVOICE_PERIOD;
$MainPage->p_customer_account = & $p_customer_account;
$V_INVOICE_PERIOD->Initialize();

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

//Execute Components @1-68CE0668
$p_customer_account->Operation();
//End Execute Components

//Go to destination page @1-A7993A05
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($V_INVOICE_PERIOD);
    unset($p_customer_account);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-BED4789D
$V_INVOICE_PERIOD->Show();
$p_customer_account->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-0F7895F7
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($V_INVOICE_PERIOD);
unset($p_customer_account);
unset($Tpl);
//End Unload Page


?>
