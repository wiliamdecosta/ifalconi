<?php
//Include Common Files @1-1AEEA1C8
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_lov/");
define("FileName", "lov_p_customer_name.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_CUSTOMER { //P_CUSTOMER class @2-C30293BC

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

//Class_Initialize Event @2-ABB1DB52
    function clsGridP_CUSTOMER($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_CUSTOMER";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_CUSTOMER";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_CUSTOMERDataSource($this);
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

        $this->CUSTOMER_ID = & new clsControl(ccsHidden, "CUSTOMER_ID", "CUSTOMER_ID", ccsFloat, "", CCGetRequestParam("CUSTOMER_ID", ccsGet, NULL), $this);
        $this->LAST_NAME = & new clsControl(ccsLabel, "LAST_NAME", "LAST_NAME", ccsText, "", CCGetRequestParam("LAST_NAME", ccsGet, NULL), $this);
        $this->Label1 = & new clsControl(ccsLabel, "Label1", "Label1", ccsText, "", CCGetRequestParam("Label1", ccsGet, NULL), $this);
        $this->Label1->HTML = true;
        $this->CUSTOMER_NUMBER = & new clsControl(ccsLabel, "CUSTOMER_NUMBER", "CUSTOMER_NUMBER", ccsText, "", CCGetRequestParam("CUSTOMER_NUMBER", ccsGet, NULL), $this);
        $this->CUSTOMER_TITLE_CODE = & new clsControl(ccsLabel, "CUSTOMER_TITLE_CODE", "CUSTOMER_TITLE_CODE", ccsText, "", CCGetRequestParam("CUSTOMER_TITLE_CODE", ccsGet, NULL), $this);
        $this->CUSTOMER_SEGMENT_CODE = & new clsControl(ccsLabel, "CUSTOMER_SEGMENT_CODE", "CUSTOMER_SEGMENT_CODE", ccsText, "", CCGetRequestParam("CUSTOMER_SEGMENT_CODE", ccsGet, NULL), $this);
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

//Show Method @2-7988D506
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
            $this->ControlsVisible["CUSTOMER_ID"] = $this->CUSTOMER_ID->Visible;
            $this->ControlsVisible["LAST_NAME"] = $this->LAST_NAME->Visible;
            $this->ControlsVisible["Label1"] = $this->Label1->Visible;
            $this->ControlsVisible["CUSTOMER_NUMBER"] = $this->CUSTOMER_NUMBER->Visible;
            $this->ControlsVisible["CUSTOMER_TITLE_CODE"] = $this->CUSTOMER_TITLE_CODE->Visible;
            $this->ControlsVisible["CUSTOMER_SEGMENT_CODE"] = $this->CUSTOMER_SEGMENT_CODE->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CUSTOMER_ID->SetValue($this->DataSource->CUSTOMER_ID->GetValue());
                $this->LAST_NAME->SetValue($this->DataSource->LAST_NAME->GetValue());
                $this->CUSTOMER_NUMBER->SetValue($this->DataSource->CUSTOMER_NUMBER->GetValue());
                $this->CUSTOMER_TITLE_CODE->SetValue($this->DataSource->CUSTOMER_TITLE_CODE->GetValue());
                $this->CUSTOMER_SEGMENT_CODE->SetValue($this->DataSource->CUSTOMER_SEGMENT_CODE->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CUSTOMER_ID->Show();
                $this->LAST_NAME->Show();
                $this->Label1->Show();
                $this->CUSTOMER_NUMBER->Show();
                $this->CUSTOMER_TITLE_CODE->Show();
                $this->CUSTOMER_SEGMENT_CODE->Show();
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

//GetErrors Method @2-E047CB44
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CUSTOMER_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LAST_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Label1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_NUMBER->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_TITLE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_SEGMENT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_CUSTOMER Class @2-FCB6E20C

class clsP_CUSTOMERDataSource extends clsDBConn {  //P_CUSTOMERDataSource Class @2-96864EAE

//DataSource Variables @2-BA3E90E3
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CUSTOMER_ID;
    var $LAST_NAME;
    var $CUSTOMER_NUMBER;
    var $CUSTOMER_TITLE_CODE;
    var $CUSTOMER_SEGMENT_CODE;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-12D0DB64
    function clsP_CUSTOMERDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_CUSTOMER";
        $this->Initialize();
        $this->CUSTOMER_ID = new clsField("CUSTOMER_ID", ccsFloat, "");
        
        $this->LAST_NAME = new clsField("LAST_NAME", ccsText, "");
        
        $this->CUSTOMER_NUMBER = new clsField("CUSTOMER_NUMBER", ccsText, "");
        
        $this->CUSTOMER_TITLE_CODE = new clsField("CUSTOMER_TITLE_CODE", ccsText, "");
        
        $this->CUSTOMER_SEGMENT_CODE = new clsField("CUSTOMER_SEGMENT_CODE", ccsText, "");
        

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

//Prepare Method @2-25AA94A2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
    }
//End Prepare Method

//Open Method @2-994DDE66
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT a.LAST_NAME, a.CUSTOMER_NUMBER, \n" .
        "       b.CODE CUSTOMER_SEGMENT_CODE,\n" .
        "      c.CODE CUSTOMER_TITLE_CODE,\n" .
        "     a.CUSTOMER_ID,\n" .
        "    a.P_CUSTOMER_SEGMENT_ID,\n" .
        "    a.P_CUSTOMER_TITLE_ID\n" .
        "FROM CUSTOMER a,\n" .
        "   P_CUSTOMER_SEGMENT b,\n" .
        "   P_CUSTOMER_TITLE c\n" .
        "WHERE a.P_CUSTOMER_SEGMENT_ID = b.P_CUSTOMER_SEGMENT_ID AND\n" .
        "   a.P_CUSTOMER_TITLE_ID = c.P_CUSTOMER_TITLE_ID AND\n" .
        "   (a.LAST_NAME LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "    a.CUSTOMER_NUMBER LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	b.CODE LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "    c.CODE LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'))\n" .
        ") cnt";
        $this->SQL = "SELECT a.LAST_NAME, a.CUSTOMER_NUMBER, \n" .
        "       b.CODE CUSTOMER_SEGMENT_CODE,\n" .
        "      c.CODE CUSTOMER_TITLE_CODE,\n" .
        "     a.CUSTOMER_ID,\n" .
        "    a.P_CUSTOMER_SEGMENT_ID,\n" .
        "    a.P_CUSTOMER_TITLE_ID\n" .
        "FROM CUSTOMER a,\n" .
        "   P_CUSTOMER_SEGMENT b,\n" .
        "   P_CUSTOMER_TITLE c\n" .
        "WHERE a.P_CUSTOMER_SEGMENT_ID = b.P_CUSTOMER_SEGMENT_ID AND\n" .
        "   a.P_CUSTOMER_TITLE_ID = c.P_CUSTOMER_TITLE_ID AND\n" .
        "   (a.LAST_NAME LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "    a.CUSTOMER_NUMBER LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	b.CODE LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "    c.CODE LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'))\n" .
        "";
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

//SetValues Method @2-C32A7F44
    function SetValues()
    {
        $this->CUSTOMER_ID->SetDBValue(trim($this->f("CUSTOMER_ID")));
        $this->LAST_NAME->SetDBValue($this->f("LAST_NAME"));
        $this->CUSTOMER_NUMBER->SetDBValue($this->f("CUSTOMER_NUMBER"));
        $this->CUSTOMER_TITLE_CODE->SetDBValue($this->f("CUSTOMER_TITLE_CODE"));
        $this->CUSTOMER_SEGMENT_CODE->SetDBValue($this->f("CUSTOMER_SEGMENT_CODE"));
    }
//End SetValues Method

} //End P_CUSTOMERDataSource Class @2-FCB6E20C

class clsRecordP_SERVICE_TYPESearch { //P_SERVICE_TYPESearch Class @3-1773B127

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

//Class_Initialize Event @3-2F55B789
    function clsRecordP_SERVICE_TYPESearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_SERVICE_TYPESearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_SERVICE_TYPESearch";
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
            $this->FORM = & new clsControl(ccsHidden, "FORM", "FORM", ccsText, "", CCGetRequestParam("FORM", $Method, NULL), $this);
            $this->OBJ = & new clsControl(ccsTextBox, "OBJ", "OBJ", ccsText, "", CCGetRequestParam("OBJ", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @3-FA63F6C6
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_keyword->Validate() && $Validation);
        $Validation = ($this->FORM->Validate() && $Validation);
        $Validation = ($this->OBJ->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_keyword->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FORM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OBJ->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-FBB4E0E8
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_keyword->Errors->Count());
        $errors = ($errors || $this->FORM->Errors->Count());
        $errors = ($errors || $this->OBJ->Errors->Count());
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

//Operation Method @3-EAE15560
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
        $Redirect = "lov_p_customer_name.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "lov_p_customer_name.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-1DBEB16B
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
            $Error = ComposeStrings($Error, $this->FORM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OBJ->Errors->ToString());
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
        $this->FORM->Show();
        $this->OBJ->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End P_SERVICE_TYPESearch Class @3-FCB6E20C

//Initialize Page @1-53A98B31
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
$TemplateFileName = "lov_p_customer_name.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-D18B99B9
include_once("./lov_p_customer_name_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-2870986A
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_CUSTOMER = & new clsGridP_CUSTOMER("", $MainPage);
$P_SERVICE_TYPESearch = & new clsRecordP_SERVICE_TYPESearch("", $MainPage);
$MainPage->P_CUSTOMER = & $P_CUSTOMER;
$MainPage->P_SERVICE_TYPESearch = & $P_SERVICE_TYPESearch;
$P_CUSTOMER->Initialize();

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

//Execute Components @1-9E4EE33D
$P_SERVICE_TYPESearch->Operation();
//End Execute Components

//Go to destination page @1-787E44D1
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_CUSTOMER);
    unset($P_SERVICE_TYPESearch);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-2E1F49B1
$P_CUSTOMER->Show();
$P_SERVICE_TYPESearch->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-3B22224A
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_CUSTOMER);
unset($P_SERVICE_TYPESearch);
unset($Tpl);
//End Unload Page


?>
