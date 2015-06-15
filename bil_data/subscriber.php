<?php
//Include Common Files @1-0B829929
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_data/");
define("FileName", "subscriber.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridV_SUBSCRIBER { //V_SUBSCRIBER class @2-1EA489D6

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

//Class_Initialize Event @2-70FDE389
    function clsGridV_SUBSCRIBER($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "V_SUBSCRIBER";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid V_SUBSCRIBER";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsV_SUBSCRIBERDataSource($this);
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

        $this->SUBSCRIBER_ID = & new clsControl(ccsHidden, "SUBSCRIBER_ID", "SUBSCRIBER_ID", ccsFloat, "", CCGetRequestParam("SUBSCRIBER_ID", ccsGet, NULL), $this);
        $this->SERVICE_NO = & new clsControl(ccsLabel, "SERVICE_NO", "SERVICE_NO", ccsFloat, "", CCGetRequestParam("SERVICE_NO", ccsGet, NULL), $this);
        $this->SERVICE_TYPE_CODE = & new clsControl(ccsLabel, "SERVICE_TYPE_CODE", "SERVICE_TYPE_CODE", ccsText, "", CCGetRequestParam("SERVICE_TYPE_CODE", ccsGet, NULL), $this);
        $this->TARIFF_SCENARIO_CODE = & new clsControl(ccsLabel, "TARIFF_SCENARIO_CODE", "TARIFF_SCENARIO_CODE", ccsText, "", CCGetRequestParam("TARIFF_SCENARIO_CODE", ccsGet, NULL), $this);
        $this->SUBSCRIPTION_NAME = & new clsControl(ccsLabel, "SUBSCRIPTION_NAME", "SUBSCRIPTION_NAME", ccsText, "", CCGetRequestParam("SUBSCRIPTION_NAME", ccsGet, NULL), $this);
        $this->SUBSCRIPTION_STATUS_CODE = & new clsControl(ccsLabel, "SUBSCRIPTION_STATUS_CODE", "SUBSCRIPTION_STATUS_CODE", ccsText, "", CCGetRequestParam("SUBSCRIPTION_STATUS_CODE", ccsGet, NULL), $this);
        $this->ADLink1 = & new clsControl(ccsLink, "ADLink1", "ADLink1", ccsText, "", CCGetRequestParam("ADLink1", ccsGet, NULL), $this);
        $this->ADLink1->HTML = true;
        $this->ADLink1->Page = "subscriber_form.php";
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "subscriber.php";
        $this->P_TARIFF_SCENARIO_ID = & new clsControl(ccsTextBox, "P_TARIFF_SCENARIO_ID", "P_TARIFF_SCENARIO_ID", ccsText, "", CCGetRequestParam("P_TARIFF_SCENARIO_ID", ccsGet, NULL), $this);
        $this->P_SERVICE_TYPE_ID = & new clsControl(ccsTextBox, "P_SERVICE_TYPE_ID", "P_SERVICE_TYPE_ID", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->SUBSCRIBER_Insert = & new clsControl(ccsLink, "SUBSCRIBER_Insert", "SUBSCRIBER_Insert", ccsText, "", CCGetRequestParam("SUBSCRIBER_Insert", ccsGet, NULL), $this);
        $this->SUBSCRIBER_Insert->HTML = true;
        $this->SUBSCRIBER_Insert->Parameters = CCGetQueryString("QueryString", array("SUBSCRIBER_ID", "FLAG", "s_keyword", "SUBSCRIBERPage", "SUBSCRIBERPageSize", "SUBSCRIBEROrder", "SUBSCRIBERDir", "ccsForm"));
        $this->SUBSCRIBER_Insert->Page = "subscriber_form.php";
        $this->ID = & new clsControl(ccsTextBox, "ID", "ID", ccsText, "", CCGetRequestParam("ID", ccsGet, NULL), $this);
        $this->SCID = & new clsControl(ccsTextBox, "SCID", "SCID", ccsText, "", CCGetRequestParam("SCID", ccsGet, NULL), $this);
        $this->STID = & new clsControl(ccsTextBox, "STID", "STID", ccsText, "", CCGetRequestParam("STID", ccsGet, NULL), $this);
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

//Show Method @2-3C48559D
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);

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
            $this->ControlsVisible["SUBSCRIBER_ID"] = $this->SUBSCRIBER_ID->Visible;
            $this->ControlsVisible["SERVICE_NO"] = $this->SERVICE_NO->Visible;
            $this->ControlsVisible["SERVICE_TYPE_CODE"] = $this->SERVICE_TYPE_CODE->Visible;
            $this->ControlsVisible["TARIFF_SCENARIO_CODE"] = $this->TARIFF_SCENARIO_CODE->Visible;
            $this->ControlsVisible["SUBSCRIPTION_NAME"] = $this->SUBSCRIPTION_NAME->Visible;
            $this->ControlsVisible["SUBSCRIPTION_STATUS_CODE"] = $this->SUBSCRIPTION_STATUS_CODE->Visible;
            $this->ControlsVisible["ADLink1"] = $this->ADLink1->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["P_TARIFF_SCENARIO_ID"] = $this->P_TARIFF_SCENARIO_ID->Visible;
            $this->ControlsVisible["P_SERVICE_TYPE_ID"] = $this->P_SERVICE_TYPE_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->SUBSCRIBER_ID->SetValue($this->DataSource->SUBSCRIBER_ID->GetValue());
                $this->SERVICE_NO->SetValue($this->DataSource->SERVICE_NO->GetValue());
                $this->SERVICE_TYPE_CODE->SetValue($this->DataSource->SERVICE_TYPE_CODE->GetValue());
                $this->TARIFF_SCENARIO_CODE->SetValue($this->DataSource->TARIFF_SCENARIO_CODE->GetValue());
                $this->SUBSCRIPTION_NAME->SetValue($this->DataSource->SUBSCRIPTION_NAME->GetValue());
                $this->SUBSCRIPTION_STATUS_CODE->SetValue($this->DataSource->SUBSCRIPTION_STATUS_CODE->GetValue());
                $this->ADLink1->SetValue($this->DataSource->ADLink1->GetValue());
                $this->ADLink1->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink1->Parameters = CCAddParam($this->ADLink1->Parameters, "SUBSCRIBER_ID", $this->DataSource->f("SUBSCRIBER_ID"));
                $this->ADLink1->Parameters = CCAddParam($this->ADLink1->Parameters, "P_SERVICE_TYPE_ID", $this->DataSource->f("P_SERVICE_TYPE_ID"));
                $this->ADLink1->Parameters = CCAddParam($this->ADLink1->Parameters, "P_TARIFF_SCENARIO_ID", $this->DataSource->f("P_TARIFF_SCENARIO_ID"));
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "SUBSCRIBER_ID", $this->DataSource->f("SUBSCRIBER_ID"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_SERVICE_TYPE_ID", $this->DataSource->f("P_SERVICE_TYPE_ID"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_TARIFF_SCENARIO_ID", $this->DataSource->f("P_TARIFF_SCENARIO_ID"));
                $this->P_TARIFF_SCENARIO_ID->SetValue($this->DataSource->P_TARIFF_SCENARIO_ID->GetValue());
                $this->P_SERVICE_TYPE_ID->SetValue($this->DataSource->P_SERVICE_TYPE_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->SUBSCRIBER_ID->Show();
                $this->SERVICE_NO->Show();
                $this->SERVICE_TYPE_CODE->Show();
                $this->TARIFF_SCENARIO_CODE->Show();
                $this->SUBSCRIPTION_NAME->Show();
                $this->SUBSCRIPTION_STATUS_CODE->Show();
                $this->ADLink1->Show();
                $this->DLink->Show();
                $this->P_TARIFF_SCENARIO_ID->Show();
                $this->P_SERVICE_TYPE_ID->Show();
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
        $this->SUBSCRIBER_Insert->Show();
        $this->ID->Show();
        $this->SCID->Show();
        $this->STID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-EE31DDA9
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->SUBSCRIBER_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_NO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_TYPE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TARIFF_SCENARIO_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SUBSCRIPTION_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SUBSCRIPTION_STATUS_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_TARIFF_SCENARIO_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_SERVICE_TYPE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End V_SUBSCRIBER Class @2-FCB6E20C

class clsV_SUBSCRIBERDataSource extends clsDBConn {  //V_SUBSCRIBERDataSource Class @2-43FCAC88

//DataSource Variables @2-55E32767
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $SUBSCRIBER_ID;
    var $SERVICE_NO;
    var $SERVICE_TYPE_CODE;
    var $TARIFF_SCENARIO_CODE;
    var $SUBSCRIPTION_NAME;
    var $SUBSCRIPTION_STATUS_CODE;
    var $ADLink1;
    var $P_TARIFF_SCENARIO_ID;
    var $P_SERVICE_TYPE_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-315D092E
    function clsV_SUBSCRIBERDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid V_SUBSCRIBER";
        $this->Initialize();
        $this->SUBSCRIBER_ID = new clsField("SUBSCRIBER_ID", ccsFloat, "");
        
        $this->SERVICE_NO = new clsField("SERVICE_NO", ccsFloat, "");
        
        $this->SERVICE_TYPE_CODE = new clsField("SERVICE_TYPE_CODE", ccsText, "");
        
        $this->TARIFF_SCENARIO_CODE = new clsField("TARIFF_SCENARIO_CODE", ccsText, "");
        
        $this->SUBSCRIPTION_NAME = new clsField("SUBSCRIPTION_NAME", ccsText, "");
        
        $this->SUBSCRIPTION_STATUS_CODE = new clsField("SUBSCRIPTION_STATUS_CODE", ccsText, "");
        
        $this->ADLink1 = new clsField("ADLink1", ccsText, "");
        
        $this->P_TARIFF_SCENARIO_ID = new clsField("P_TARIFF_SCENARIO_ID", ccsText, "");
        
        $this->P_SERVICE_TYPE_ID = new clsField("P_SERVICE_TYPE_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-2A2A4857
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "SUBSCRIBER_ID";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-25AA94A2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
    }
//End Prepare Method

//Open Method @2-F4BAD251
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(1) FROM (SELECT * \n" .
        "FROM V_SUBSCRIBER\n" .
        "WHERE\n" .
        "ROWNUM <= 10 AND\n" .
        "( UPPER(SUBSCRIPTION_STATUS_CODE) LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' )) cnt";
        $this->SQL = "SELECT * \n" .
        "FROM V_SUBSCRIBER\n" .
        "WHERE\n" .
        "( UPPER(SUBSCRIPTION_STATUS_CODE) LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' )  {SQL_OrderBy}";
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

//SetValues Method @2-49E56B2B
    function SetValues()
    {
        $this->SUBSCRIBER_ID->SetDBValue(trim($this->f("SUBSCRIBER_ID")));
        $this->SERVICE_NO->SetDBValue(trim($this->f("SERVICE_NO")));
        $this->SERVICE_TYPE_CODE->SetDBValue($this->f("SERVICE_TYPE_CODE"));
        $this->TARIFF_SCENARIO_CODE->SetDBValue($this->f("TARIFF_SCENARIO_CODE"));
        $this->SUBSCRIPTION_NAME->SetDBValue($this->f("SUBSCRIPTION_NAME"));
        $this->SUBSCRIPTION_STATUS_CODE->SetDBValue($this->f("SUBSCRIPTION_STATUS_CODE"));
        $this->ADLink1->SetDBValue($this->f("SUBSCRIBER_ID"));
        $this->P_TARIFF_SCENARIO_ID->SetDBValue($this->f("P_TARIFF_SCENARIO_ID"));
        $this->P_SERVICE_TYPE_ID->SetDBValue($this->f("P_SERVICE_TYPE_ID"));
    }
//End SetValues Method

} //End V_SUBSCRIBERDataSource Class @2-FCB6E20C

class clsRecordV_SUBSCRIBERSearch { //V_SUBSCRIBERSearch Class @3-A320C397

//Variables @3-D6FF3E86

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

//Class_Initialize Event @3-8696243D
    function clsRecordV_SUBSCRIBERSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_SUBSCRIBERSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_SUBSCRIBERSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->s_keyword = & new clsControl(ccsTextBox, "s_keyword", "s_keyword", ccsText, "", CCGetRequestParam("s_keyword", $Method, NULL), $this);
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
        }
    }
//End Class_Initialize Event

//Validate Method @3-A144A629
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_keyword->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_keyword->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-D6729123
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_keyword->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @3-ED598703
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

//Operation Method @3-A5D9F447
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "subscriber.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "subscriber.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-7913FA87
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
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_keyword->Errors->ToString());
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

        $this->s_keyword->Show();
        $this->Button_DoSearch->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End V_SUBSCRIBERSearch Class @3-FCB6E20C

//Initialize Page @1-57FDFD59
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
$TemplateFileName = "subscriber.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-83897BE9
include_once("./subscriber_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-81DCE384
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$V_SUBSCRIBER = & new clsGridV_SUBSCRIBER("", $MainPage);
$V_SUBSCRIBERSearch = & new clsRecordV_SUBSCRIBERSearch("", $MainPage);
$MainPage->V_SUBSCRIBER = & $V_SUBSCRIBER;
$MainPage->V_SUBSCRIBERSearch = & $V_SUBSCRIBERSearch;
$V_SUBSCRIBER->Initialize();

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

//Execute Components @1-6D9C2AA3
$V_SUBSCRIBERSearch->Operation();
//End Execute Components

//Go to destination page @1-3EAE85F2
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($V_SUBSCRIBER);
    unset($V_SUBSCRIBERSearch);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-85240006
$V_SUBSCRIBER->Show();
$V_SUBSCRIBERSearch->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-6B78A106
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($V_SUBSCRIBER);
unset($V_SUBSCRIBERSearch);
unset($Tpl);
//End Unload Page


?>
