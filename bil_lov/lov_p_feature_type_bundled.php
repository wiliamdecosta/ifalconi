<?php
//Include Common Files @1-892CB111
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_lov/");
define("FileName", "lov_p_feature_type_bundled.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_FEATURE_TYPE { //P_FEATURE_TYPE class @2-AD59C7F5

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

//Class_Initialize Event @2-79DEDC36
    function clsGridP_FEATURE_TYPE($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_FEATURE_TYPE";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_FEATURE_TYPE";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_FEATURE_TYPEDataSource($this);
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

        $this->FEATURE_TYPE_CODE = & new clsControl(ccsLabel, "FEATURE_TYPE_CODE", "FEATURE_TYPE_CODE", ccsText, "", CCGetRequestParam("FEATURE_TYPE_CODE", ccsGet, NULL), $this);
        $this->P_REFERENCE_LIST_ID = & new clsControl(ccsLabel, "P_REFERENCE_LIST_ID", "P_REFERENCE_LIST_ID", ccsText, "", CCGetRequestParam("P_REFERENCE_LIST_ID", ccsGet, NULL), $this);
        $this->Label1 = & new clsControl(ccsLabel, "Label1", "Label1", ccsText, "", CCGetRequestParam("Label1", ccsGet, NULL), $this);
        $this->Label1->HTML = true;
        $this->P_FEATURE_TYPE_ID = & new clsControl(ccsHidden, "P_FEATURE_TYPE_ID", "P_FEATURE_TYPE_ID", ccsText, "", CCGetRequestParam("P_FEATURE_TYPE_ID", ccsGet, NULL), $this);
        $this->P_SERVICE_TYPE_ID = & new clsControl(ccsTextBox, "P_SERVICE_TYPE_ID", "P_SERVICE_TYPE_ID", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_ID", ccsGet, NULL), $this);
        $this->FEATURE_GROUP = & new clsControl(ccsLabel, "FEATURE_GROUP", "FEATURE_GROUP", ccsText, "", CCGetRequestParam("FEATURE_GROUP", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpMoving, $this);
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

//Show Method @2-DBDE8335
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);
        $this->DataSource->Parameters["urlP_SERVICE_TYPE_ID"] = CCGetFromGet("P_SERVICE_TYPE_ID", NULL);

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
            $this->ControlsVisible["FEATURE_TYPE_CODE"] = $this->FEATURE_TYPE_CODE->Visible;
            $this->ControlsVisible["P_REFERENCE_LIST_ID"] = $this->P_REFERENCE_LIST_ID->Visible;
            $this->ControlsVisible["Label1"] = $this->Label1->Visible;
            $this->ControlsVisible["P_FEATURE_TYPE_ID"] = $this->P_FEATURE_TYPE_ID->Visible;
            $this->ControlsVisible["P_SERVICE_TYPE_ID"] = $this->P_SERVICE_TYPE_ID->Visible;
            $this->ControlsVisible["FEATURE_GROUP"] = $this->FEATURE_GROUP->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->FEATURE_TYPE_CODE->SetValue($this->DataSource->FEATURE_TYPE_CODE->GetValue());
                $this->P_REFERENCE_LIST_ID->SetValue($this->DataSource->P_REFERENCE_LIST_ID->GetValue());
                $this->P_FEATURE_TYPE_ID->SetValue($this->DataSource->P_FEATURE_TYPE_ID->GetValue());
                $this->FEATURE_GROUP->SetValue($this->DataSource->FEATURE_GROUP->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->FEATURE_TYPE_CODE->Show();
                $this->P_REFERENCE_LIST_ID->Show();
                $this->Label1->Show();
                $this->P_FEATURE_TYPE_ID->Show();
                $this->P_SERVICE_TYPE_ID->Show();
                $this->FEATURE_GROUP->Show();
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

//GetErrors Method @2-26061A04
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->FEATURE_TYPE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_REFERENCE_LIST_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Label1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_FEATURE_TYPE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_SERVICE_TYPE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FEATURE_GROUP->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_FEATURE_TYPE Class @2-FCB6E20C

class clsP_FEATURE_TYPEDataSource extends clsDBConn {  //P_FEATURE_TYPEDataSource Class @2-2B4054FA

//DataSource Variables @2-EAD81DEE
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $FEATURE_TYPE_CODE;
    var $P_REFERENCE_LIST_ID;
    var $P_FEATURE_TYPE_ID;
    var $FEATURE_GROUP;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-12179BF1
    function clsP_FEATURE_TYPEDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_FEATURE_TYPE";
        $this->Initialize();
        $this->FEATURE_TYPE_CODE = new clsField("FEATURE_TYPE_CODE", ccsText, "");
        
        $this->P_REFERENCE_LIST_ID = new clsField("P_REFERENCE_LIST_ID", ccsText, "");
        
        $this->P_FEATURE_TYPE_ID = new clsField("P_FEATURE_TYPE_ID", ccsText, "");
        
        $this->FEATURE_GROUP = new clsField("FEATURE_GROUP", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-43C9558E
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "a.CODE";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-0978B054
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->Parameters["urlP_SERVICE_TYPE_ID"], 0, false);
    }
//End Prepare Method

//Open Method @2-2D0DC965
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT a.CODE FEATURE_TYPE_CODE,\n" .
        "  b.CODE FEATURE_GROUP,\n" .
        "  a.P_FEATURE_TYPE_ID\n" .
        "FROM P_FEATURE_TYPE a,\n" .
        "  P_FEATURE_GROUP b,\n" .
        "  P_SERVICE_CATEGORY c\n" .
        "WHERE (a.P_FEATURE_GROUP_ID = b.P_FEATURE_GROUP_ID AND\n" .
        "  a.P_FEATURE_TYPE_ID = c.P_FEATURE_TYPE_ID AND\n" .
        "  c.P_SERVICE_TYPE_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . ")\n" .
        "  AND (UPPER(a.CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') \n" .
        "  	OR UPPER(b.CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') )) cnt";
        $this->SQL = "SELECT a.CODE FEATURE_TYPE_CODE,\n" .
        "  b.CODE FEATURE_GROUP,\n" .
        "  a.P_FEATURE_TYPE_ID\n" .
        "FROM P_FEATURE_TYPE a,\n" .
        "  P_FEATURE_GROUP b,\n" .
        "  P_SERVICE_CATEGORY c\n" .
        "WHERE (a.P_FEATURE_GROUP_ID = b.P_FEATURE_GROUP_ID AND\n" .
        "  a.P_FEATURE_TYPE_ID = c.P_FEATURE_TYPE_ID AND\n" .
        "  c.P_SERVICE_TYPE_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . ")\n" .
        "  AND (UPPER(a.CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') \n" .
        "  	OR UPPER(b.CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') ){SQL_OrderBy}";
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

//SetValues Method @2-2D62CD2E
    function SetValues()
    {
        $this->FEATURE_TYPE_CODE->SetDBValue($this->f("FEATURE_TYPE_CODE"));
        $this->P_REFERENCE_LIST_ID->SetDBValue($this->f("P_REFERENCE_LIST_ID"));
        $this->P_FEATURE_TYPE_ID->SetDBValue($this->f("P_FEATURE_TYPE_ID"));
        $this->FEATURE_GROUP->SetDBValue($this->f("FEATURE_GROUP"));
    }
//End SetValues Method

} //End P_FEATURE_TYPEDataSource Class @2-FCB6E20C

class clsRecordP_FEATURE_TYPESearch { //P_FEATURE_TYPESearch Class @3-03FA0BBC

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

//Class_Initialize Event @3-78AE1A08
    function clsRecordP_FEATURE_TYPESearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_FEATURE_TYPESearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_FEATURE_TYPESearch";
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

//Operation Method @3-67A57C25
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
        $Redirect = "lov_p_feature_type_bundled.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "lov_p_feature_type_bundled.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")), CCGetQueryString("QueryString", array("s_keyword", "FORM", "OBJ", "ccsForm")));
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

} //End P_FEATURE_TYPESearch Class @3-FCB6E20C

//Initialize Page @1-F1841958
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
$TemplateFileName = "lov_p_feature_type_bundled.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-CEE5BB5F
include_once("./lov_p_feature_type_bundled_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-617BA201
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_FEATURE_TYPE = & new clsGridP_FEATURE_TYPE("", $MainPage);
$P_FEATURE_TYPESearch = & new clsRecordP_FEATURE_TYPESearch("", $MainPage);
$MainPage->P_FEATURE_TYPE = & $P_FEATURE_TYPE;
$MainPage->P_FEATURE_TYPESearch = & $P_FEATURE_TYPESearch;
$P_FEATURE_TYPE->Initialize();

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

//Execute Components @1-D1DA445E
$P_FEATURE_TYPESearch->Operation();
//End Execute Components

//Go to destination page @1-B8EE0E3D
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_FEATURE_TYPE);
    unset($P_FEATURE_TYPESearch);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-0A4F96BA
$P_FEATURE_TYPE->Show();
$P_FEATURE_TYPESearch->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-C5DC95A5
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_FEATURE_TYPE);
unset($P_FEATURE_TYPESearch);
unset($Tpl);
//End Unload Page


?>
