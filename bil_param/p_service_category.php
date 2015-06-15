<?php
//Include Common Files @1-BAD84C00
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_service_category.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridV_P_SERVICE_CATEGORY { //V_P_SERVICE_CATEGORY class @2-E99CB14E

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

//Class_Initialize Event @2-D6D178C4
    function clsGridV_P_SERVICE_CATEGORY($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "V_P_SERVICE_CATEGORY";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid V_P_SERVICE_CATEGORY";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsV_P_SERVICE_CATEGORYDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 7;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->CODE = & new clsControl(ccsLabel, "CODE", "CODE", ccsText, "", CCGetRequestParam("CODE", ccsGet, NULL), $this);
        $this->VALID_FROM = & new clsControl(ccsLabel, "VALID_FROM", "VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", ccsGet, NULL), $this);
        $this->VALID_TO = & new clsControl(ccsLabel, "VALID_TO", "VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", ccsGet, NULL), $this);
        $this->FEATURE_TYPE_CODE = & new clsControl(ccsLabel, "FEATURE_TYPE_CODE", "FEATURE_TYPE_CODE", ccsText, "", CCGetRequestParam("FEATURE_TYPE_CODE", ccsGet, NULL), $this);
        $this->SERVICE_TYPE_CODE = & new clsControl(ccsLabel, "SERVICE_TYPE_CODE", "SERVICE_TYPE_CODE", ccsText, "", CCGetRequestParam("SERVICE_TYPE_CODE", ccsGet, NULL), $this);
        $this->FEATURE_CATEGORY_CODE = & new clsControl(ccsLabel, "FEATURE_CATEGORY_CODE", "FEATURE_CATEGORY_CODE", ccsText, "", CCGetRequestParam("FEATURE_CATEGORY_CODE", ccsGet, NULL), $this);
        $this->IS_RATED = & new clsControl(ccsLabel, "IS_RATED", "IS_RATED", ccsText, "", CCGetRequestParam("IS_RATED", ccsGet, NULL), $this);
        $this->P_SERVICE_CATEGORY_ID = & new clsControl(ccsHidden, "P_SERVICE_CATEGORY_ID", "P_SERVICE_CATEGORY_ID", ccsText, "", CCGetRequestParam("P_SERVICE_CATEGORY_ID", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_service_category.php";
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->ST_NEW = & new clsControl(ccsLink, "ST_NEW", "ST_NEW", ccsText, "", CCGetRequestParam("ST_NEW", ccsGet, NULL), $this);
        $this->ST_NEW->HTML = true;
        $this->ST_NEW->Page = "p_service_category.php";
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

//Show Method @2-A4644D9D
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlP_SERVICE_TYPE_ID"] = CCGetFromGet("P_SERVICE_TYPE_ID", NULL);
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
            $this->ControlsVisible["CODE"] = $this->CODE->Visible;
            $this->ControlsVisible["VALID_FROM"] = $this->VALID_FROM->Visible;
            $this->ControlsVisible["VALID_TO"] = $this->VALID_TO->Visible;
            $this->ControlsVisible["FEATURE_TYPE_CODE"] = $this->FEATURE_TYPE_CODE->Visible;
            $this->ControlsVisible["SERVICE_TYPE_CODE"] = $this->SERVICE_TYPE_CODE->Visible;
            $this->ControlsVisible["FEATURE_CATEGORY_CODE"] = $this->FEATURE_CATEGORY_CODE->Visible;
            $this->ControlsVisible["IS_RATED"] = $this->IS_RATED->Visible;
            $this->ControlsVisible["P_SERVICE_CATEGORY_ID"] = $this->P_SERVICE_CATEGORY_ID->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                $this->FEATURE_TYPE_CODE->SetValue($this->DataSource->FEATURE_TYPE_CODE->GetValue());
                $this->SERVICE_TYPE_CODE->SetValue($this->DataSource->SERVICE_TYPE_CODE->GetValue());
                $this->FEATURE_CATEGORY_CODE->SetValue($this->DataSource->FEATURE_CATEGORY_CODE->GetValue());
                $this->IS_RATED->SetValue($this->DataSource->IS_RATED->GetValue());
                $this->P_SERVICE_CATEGORY_ID->SetValue($this->DataSource->P_SERVICE_CATEGORY_ID->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_SERVICE_CATEGORY_ID", $this->DataSource->f("P_SERVICE_CATEGORY_ID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->VALID_FROM->Show();
                $this->VALID_TO->Show();
                $this->FEATURE_TYPE_CODE->Show();
                $this->SERVICE_TYPE_CODE->Show();
                $this->FEATURE_CATEGORY_CODE->Show();
                $this->IS_RATED->Show();
                $this->P_SERVICE_CATEGORY_ID->Show();
                $this->DLink->Show();
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
        $this->ST_NEW->Parameters = CCGetQueryString("QueryString", array("P_SERVICE_CATEGORY_ID", "ccsForm"));
        $this->ST_NEW->Parameters = CCAddParam($this->ST_NEW->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->ST_NEW->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-55B42173
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FEATURE_TYPE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_TYPE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FEATURE_CATEGORY_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IS_RATED->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_SERVICE_CATEGORY_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End V_P_SERVICE_CATEGORY Class @2-FCB6E20C

class clsV_P_SERVICE_CATEGORYDataSource extends clsDBConn {  //V_P_SERVICE_CATEGORYDataSource Class @2-4D781C88

//DataSource Variables @2-E31F0111
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $VALID_FROM;
    var $VALID_TO;
    var $FEATURE_TYPE_CODE;
    var $SERVICE_TYPE_CODE;
    var $FEATURE_CATEGORY_CODE;
    var $IS_RATED;
    var $P_SERVICE_CATEGORY_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-29A558A8
    function clsV_P_SERVICE_CATEGORYDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid V_P_SERVICE_CATEGORY";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->FEATURE_TYPE_CODE = new clsField("FEATURE_TYPE_CODE", ccsText, "");
        
        $this->SERVICE_TYPE_CODE = new clsField("SERVICE_TYPE_CODE", ccsText, "");
        
        $this->FEATURE_CATEGORY_CODE = new clsField("FEATURE_CATEGORY_CODE", ccsText, "");
        
        $this->IS_RATED = new clsField("IS_RATED", ccsText, "");
        
        $this->P_SERVICE_CATEGORY_ID = new clsField("P_SERVICE_CATEGORY_ID", ccsText, "");
        

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

//Prepare Method @2-B466062D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->Parameters["urlP_SERVICE_TYPE_ID"], 0, false);
        $this->wp->AddParameter("2", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
    }
//End Prepare Method

//Open Method @2-AD048BDF
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT P_SERVICE_CATEGORY_ID, CODE, VALID_FROM, VALID_TO, DESCRIPTION, MINIMUM_DURATION, MAXIMUM_DURATION, FEATURE_TYPE_CODE, SERVICE_TYPE_CODE,\n" .
        "FEATURE_CATEGORY_CODE, IS_RATED \n" .
        "FROM V_P_SERVICE_CATEGORY\n" .
        "WHERE P_SERVICE_TYPE_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "\n" .
        "AND ( UPPER(CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%')\n" .
        "OR UPPER(DESCRIPTION) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%')\n" .
        "OR MINIMUM_DURATION LIKE '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        "OR MAXIMUM_DURATION LIKE '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        "OR UPPER(FEATURE_TYPE_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%')\n" .
        "OR UPPER(SERVICE_TYPE_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%')\n" .
        "OR UPPER(FEATURE_CATEGORY_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%') ) ) cnt";
        $this->SQL = "SELECT P_SERVICE_CATEGORY_ID, CODE, VALID_FROM, VALID_TO, DESCRIPTION, MINIMUM_DURATION, MAXIMUM_DURATION, FEATURE_TYPE_CODE, SERVICE_TYPE_CODE,\n" .
        "FEATURE_CATEGORY_CODE, IS_RATED \n" .
        "FROM V_P_SERVICE_CATEGORY\n" .
        "WHERE P_SERVICE_TYPE_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "\n" .
        "AND ( UPPER(CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%')\n" .
        "OR UPPER(DESCRIPTION) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%')\n" .
        "OR MINIMUM_DURATION LIKE '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        "OR MAXIMUM_DURATION LIKE '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        "OR UPPER(FEATURE_TYPE_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%')\n" .
        "OR UPPER(SERVICE_TYPE_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%')\n" .
        "OR UPPER(FEATURE_CATEGORY_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%') ) ";
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

//SetValues Method @2-900A5300
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->FEATURE_TYPE_CODE->SetDBValue($this->f("FEATURE_TYPE_CODE"));
        $this->SERVICE_TYPE_CODE->SetDBValue($this->f("SERVICE_TYPE_CODE"));
        $this->FEATURE_CATEGORY_CODE->SetDBValue($this->f("FEATURE_CATEGORY_CODE"));
        $this->IS_RATED->SetDBValue($this->f("IS_RATED"));
        $this->P_SERVICE_CATEGORY_ID->SetDBValue($this->f("P_SERVICE_CATEGORY_ID"));
    }
//End SetValues Method

} //End V_P_SERVICE_CATEGORYDataSource Class @2-FCB6E20C

class clsRecordV_P_SERVICE_CATEGORYSearch { //V_P_SERVICE_CATEGORYSearch Class @3-941E0556

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

//Class_Initialize Event @3-D6D1F5D5
    function clsRecordV_P_SERVICE_CATEGORYSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_P_SERVICE_CATEGORYSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_P_SERVICE_CATEGORYSearch";
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
            $this->P_SERVICE_TYPE_ID = & new clsControl(ccsHidden, "P_SERVICE_TYPE_ID", "P_SERVICE_TYPE_ID", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_ID", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @3-130B7277
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_keyword->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_keyword->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-15914AAB
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_keyword->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_ID->Errors->Count());
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

//Operation Method @3-6F518145
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
        $Redirect = "p_service_category.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_service_category.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-2A2D479B
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
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_ID->Errors->ToString());
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
        $this->P_SERVICE_TYPE_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End V_P_SERVICE_CATEGORYSearch Class @3-FCB6E20C

class clsRecordV_P_SERVICE_CATEGORY1 { //V_P_SERVICE_CATEGORY1 Class @39-A3E66566

//Variables @39-D6FF3E86

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

//Class_Initialize Event @39-B950210D
    function clsRecordV_P_SERVICE_CATEGORY1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_P_SERVICE_CATEGORY1/Error";
        $this->DataSource = new clsV_P_SERVICE_CATEGORY1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_P_SERVICE_CATEGORY1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->CODE = & new clsControl(ccsTextBox, "CODE", "CODE", ccsText, "", CCGetRequestParam("CODE", $Method, NULL), $this);
            $this->CODE->Required = true;
            $this->P_FEATURE_TYPE_ID = & new clsControl(ccsTextBox, "P_FEATURE_TYPE_ID", "P FEATURE TYPE ID", ccsFloat, "", CCGetRequestParam("P_FEATURE_TYPE_ID", $Method, NULL), $this);
            $this->P_FEATURE_CATEGORY_ID = & new clsControl(ccsTextBox, "P_FEATURE_CATEGORY_ID", "P FEATURE CATEGORY ID", ccsFloat, "", CCGetRequestParam("P_FEATURE_CATEGORY_ID", $Method, NULL), $this);
            $this->VALID_FROM = & new clsControl(ccsTextBox, "VALID_FROM", "VALID FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", $Method, NULL), $this);
            $this->VALID_FROM->Required = true;
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->P_SERVICE_CATEGORY_ID = & new clsControl(ccsHidden, "P_SERVICE_CATEGORY_ID", "P_SERVICE_CATEGORY_ID", ccsText, "", CCGetRequestParam("P_SERVICE_CATEGORY_ID", $Method, NULL), $this);
            $this->FEATURE_TYPE_CODE = & new clsControl(ccsTextBox, "FEATURE_TYPE_CODE", "FEATURE TYPE CODE", ccsText, "", CCGetRequestParam("FEATURE_TYPE_CODE", $Method, NULL), $this);
            $this->FEATURE_TYPE_CODE->Required = true;
            $this->DatePicker_UPDATE_DATE1 = & new clsDatePicker("DatePicker_UPDATE_DATE1", "V_P_SERVICE_CATEGORY1", "VALID_FROM", $this);
            $this->VALID_TO = & new clsControl(ccsTextBox, "VALID_TO", "VALID TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", $Method, NULL), $this);
            $this->DatePicker_UPDATE_DATE2 = & new clsDatePicker("DatePicker_UPDATE_DATE2", "V_P_SERVICE_CATEGORY1", "VALID_TO", $this);
            $this->MINIMUM_DURATION = & new clsControl(ccsTextBox, "MINIMUM_DURATION", "MINIMUM DURATION", ccsFloat, "", CCGetRequestParam("MINIMUM_DURATION", $Method, NULL), $this);
            $this->MAXIMUM_DURATION = & new clsControl(ccsTextBox, "MAXIMUM_DURATION", "MAXIMUM_DURATION", ccsFloat, "", CCGetRequestParam("MAXIMUM_DURATION", $Method, NULL), $this);
            $this->IS_RATED = & new clsControl(ccsListBox, "IS_RATED", "IS RATED", ccsText, "", CCGetRequestParam("IS_RATED", $Method, NULL), $this);
            $this->IS_RATED->DSType = dsListOfValues;
            $this->IS_RATED->Values = array(array("Y", "Yes"), array("N", "No"));
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->FEATURE_CATEGORY_CODE = & new clsControl(ccsTextBox, "FEATURE_CATEGORY_CODE", "FEATURE CATEGORY CODE", ccsText, "", CCGetRequestParam("FEATURE_CATEGORY_CODE", $Method, NULL), $this);
            $this->FEATURE_CATEGORY_CODE->Required = true;
            $this->P_SERVICE_TYPE_ID = & new clsControl(ccsTextBox, "P_SERVICE_TYPE_ID", "P_SERVICE_TYPE_ID", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @39-F4EC85A4
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_SERVICE_CATEGORY_ID"] = CCGetFromGet("P_SERVICE_CATEGORY_ID", NULL);
    }
//End Initialize Method

//Validate Method @39-74C8E470
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->P_FEATURE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->P_FEATURE_CATEGORY_ID->Validate() && $Validation);
        $Validation = ($this->VALID_FROM->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_CATEGORY_ID->Validate() && $Validation);
        $Validation = ($this->FEATURE_TYPE_CODE->Validate() && $Validation);
        $Validation = ($this->VALID_TO->Validate() && $Validation);
        $Validation = ($this->MINIMUM_DURATION->Validate() && $Validation);
        $Validation = ($this->MAXIMUM_DURATION->Validate() && $Validation);
        $Validation = ($this->IS_RATED->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->FEATURE_CATEGORY_CODE->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_FEATURE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_FEATURE_CATEGORY_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_CATEGORY_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FEATURE_TYPE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MINIMUM_DURATION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MAXIMUM_DURATION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_RATED->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FEATURE_CATEGORY_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @39-49B56364
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->P_FEATURE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->P_FEATURE_CATEGORY_ID->Errors->Count());
        $errors = ($errors || $this->VALID_FROM->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_CATEGORY_ID->Errors->Count());
        $errors = ($errors || $this->FEATURE_TYPE_CODE->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE1->Errors->Count());
        $errors = ($errors || $this->VALID_TO->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE2->Errors->Count());
        $errors = ($errors || $this->MINIMUM_DURATION->Errors->Count());
        $errors = ($errors || $this->MAXIMUM_DURATION->Errors->Count());
        $errors = ($errors || $this->IS_RATED->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->FEATURE_CATEGORY_CODE->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @39-ED598703
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

//Operation Method @39-C64949F2
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

        if($this->FormSubmitted) {
            $this->PressedButton = $this->EditMode ? "Button_Update" : "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "P_SERVICE_CATEGORY_ID"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @39-E6356DE2
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->P_FEATURE_TYPE_ID->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        $this->DataSource->P_FEATURE_CATEGORY_ID->SetValue($this->P_FEATURE_CATEGORY_ID->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->MINIMUM_DURATION->SetValue($this->MINIMUM_DURATION->GetValue(true));
        $this->DataSource->IS_RATED->SetValue($this->IS_RATED->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->MAXIMUM_DURATION->SetValue($this->MAXIMUM_DURATION->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @39-457278A4
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->P_FEATURE_TYPE_ID->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        $this->DataSource->P_FEATURE_CATEGORY_ID->SetValue($this->P_FEATURE_CATEGORY_ID->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->P_SERVICE_CATEGORY_ID->SetValue($this->P_SERVICE_CATEGORY_ID->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->MINIMUM_DURATION->SetValue($this->MINIMUM_DURATION->GetValue(true));
        $this->DataSource->MAXIMUM_DURATION->SetValue($this->MAXIMUM_DURATION->GetValue(true));
        $this->DataSource->IS_RATED->SetValue($this->IS_RATED->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @39-0CA68084
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_SERVICE_CATEGORY_ID->SetValue($this->P_SERVICE_CATEGORY_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @39-55BBEFC0
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

        $this->IS_RATED->Prepare();

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
                if(!$this->FormSubmitted){
                    $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                    $this->P_FEATURE_TYPE_ID->SetValue($this->DataSource->P_FEATURE_TYPE_ID->GetValue());
                    $this->P_FEATURE_CATEGORY_ID->SetValue($this->DataSource->P_FEATURE_CATEGORY_ID->GetValue());
                    $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->P_SERVICE_CATEGORY_ID->SetValue($this->DataSource->P_SERVICE_CATEGORY_ID->GetValue());
                    $this->FEATURE_TYPE_CODE->SetValue($this->DataSource->FEATURE_TYPE_CODE->GetValue());
                    $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                    $this->MINIMUM_DURATION->SetValue($this->DataSource->MINIMUM_DURATION->GetValue());
                    $this->MAXIMUM_DURATION->SetValue($this->DataSource->MAXIMUM_DURATION->GetValue());
                    $this->IS_RATED->SetValue($this->DataSource->IS_RATED->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->FEATURE_CATEGORY_CODE->SetValue($this->DataSource->FEATURE_CATEGORY_CODE->GetValue());
                    $this->P_SERVICE_TYPE_ID->SetValue($this->DataSource->P_SERVICE_TYPE_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_FEATURE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_FEATURE_CATEGORY_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_CATEGORY_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FEATURE_TYPE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MINIMUM_DURATION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MAXIMUM_DURATION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_RATED->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FEATURE_CATEGORY_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_ID->Errors->ToString());
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
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->CODE->Show();
        $this->P_FEATURE_TYPE_ID->Show();
        $this->P_FEATURE_CATEGORY_ID->Show();
        $this->VALID_FROM->Show();
        $this->UPDATE_DATE->Show();
        $this->DESCRIPTION->Show();
        $this->P_SERVICE_CATEGORY_ID->Show();
        $this->FEATURE_TYPE_CODE->Show();
        $this->DatePicker_UPDATE_DATE1->Show();
        $this->VALID_TO->Show();
        $this->DatePicker_UPDATE_DATE2->Show();
        $this->MINIMUM_DURATION->Show();
        $this->MAXIMUM_DURATION->Show();
        $this->IS_RATED->Show();
        $this->UPDATE_BY->Show();
        $this->FEATURE_CATEGORY_CODE->Show();
        $this->P_SERVICE_TYPE_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End V_P_SERVICE_CATEGORY1 Class @39-FCB6E20C

class clsV_P_SERVICE_CATEGORY1DataSource extends clsDBConn {  //V_P_SERVICE_CATEGORY1DataSource Class @39-A5D93C7B

//DataSource Variables @39-932898E5
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $InsertParameters;
    var $UpdateParameters;
    var $DeleteParameters;
    var $wp;
    var $AllParametersSet;


    // Datasource fields
    var $CODE;
    var $P_FEATURE_TYPE_ID;
    var $P_FEATURE_CATEGORY_ID;
    var $VALID_FROM;
    var $UPDATE_DATE;
    var $DESCRIPTION;
    var $P_SERVICE_CATEGORY_ID;
    var $FEATURE_TYPE_CODE;
    var $VALID_TO;
    var $MINIMUM_DURATION;
    var $MAXIMUM_DURATION;
    var $IS_RATED;
    var $UPDATE_BY;
    var $FEATURE_CATEGORY_CODE;
    var $P_SERVICE_TYPE_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @39-F8306203
    function clsV_P_SERVICE_CATEGORY1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record V_P_SERVICE_CATEGORY1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->P_FEATURE_TYPE_ID = new clsField("P_FEATURE_TYPE_ID", ccsFloat, "");
        
        $this->P_FEATURE_CATEGORY_ID = new clsField("P_FEATURE_CATEGORY_ID", ccsFloat, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->P_SERVICE_CATEGORY_ID = new clsField("P_SERVICE_CATEGORY_ID", ccsText, "");
        
        $this->FEATURE_TYPE_CODE = new clsField("FEATURE_TYPE_CODE", ccsText, "");
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->MINIMUM_DURATION = new clsField("MINIMUM_DURATION", ccsFloat, "");
        
        $this->MAXIMUM_DURATION = new clsField("MAXIMUM_DURATION", ccsFloat, "");
        
        $this->IS_RATED = new clsField("IS_RATED", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->FEATURE_CATEGORY_CODE = new clsField("FEATURE_CATEGORY_CODE", ccsText, "");
        
        $this->P_SERVICE_TYPE_ID = new clsField("P_SERVICE_TYPE_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @39-EFD09B54
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_SERVICE_CATEGORY_ID", ccsFloat, "", "", $this->Parameters["urlP_SERVICE_CATEGORY_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_SERVICE_CATEGORY_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @39-1FCB1D2D
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_P_SERVICE_CATEGORY {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @39-3B5E15B8
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->P_FEATURE_TYPE_ID->SetDBValue(trim($this->f("P_FEATURE_TYPE_ID")));
        $this->P_FEATURE_CATEGORY_ID->SetDBValue(trim($this->f("P_FEATURE_CATEGORY_ID")));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->P_SERVICE_CATEGORY_ID->SetDBValue($this->f("P_SERVICE_CATEGORY_ID"));
        $this->FEATURE_TYPE_CODE->SetDBValue($this->f("FEATURE_TYPE_CODE"));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->MINIMUM_DURATION->SetDBValue(trim($this->f("MINIMUM_DURATION")));
        $this->MAXIMUM_DURATION->SetDBValue(trim($this->f("MAXIMUM_DURATION")));
        $this->IS_RATED->SetDBValue($this->f("IS_RATED"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->FEATURE_CATEGORY_CODE->SetDBValue($this->f("FEATURE_CATEGORY_CODE"));
        $this->P_SERVICE_TYPE_ID->SetDBValue($this->f("P_SERVICE_TYPE_ID"));
    }
//End SetValues Method

//Insert Method @39-085FB7CB
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_FEATURE_TYPE_ID"] = new clsSQLParameter("ctrlP_FEATURE_TYPE_ID", ccsFloat, "", "", $this->P_FEATURE_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_FEATURE_CATEGORY_ID"] = new clsSQLParameter("ctrlP_FEATURE_CATEGORY_ID", ccsFloat, "", "", $this->P_FEATURE_CATEGORY_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["MINIMUM_DURATION"] = new clsSQLParameter("ctrlMINIMUM_DURATION", ccsFloat, "", "", $this->MINIMUM_DURATION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_RATED"] = new clsSQLParameter("ctrlIS_RATED", ccsText, "", "", $this->IS_RATED->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsText, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["MAXIMUM_DURATION"] = new clsSQLParameter("ctrlMAXIMUM_DURATION", ccsText, "", "", $this->MAXIMUM_DURATION->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["P_FEATURE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_FEATURE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_TYPE_ID"]->GetValue())) 
            $this->cp["P_FEATURE_TYPE_ID"]->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["P_FEATURE_CATEGORY_ID"]->GetValue()) and !strlen($this->cp["P_FEATURE_CATEGORY_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_CATEGORY_ID"]->GetValue())) 
            $this->cp["P_FEATURE_CATEGORY_ID"]->SetValue($this->P_FEATURE_CATEGORY_ID->GetValue(true));
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["MINIMUM_DURATION"]->GetValue()) and !strlen($this->cp["MINIMUM_DURATION"]->GetText()) and !is_bool($this->cp["MINIMUM_DURATION"]->GetValue())) 
            $this->cp["MINIMUM_DURATION"]->SetValue($this->MINIMUM_DURATION->GetValue(true));
        if (!is_null($this->cp["IS_RATED"]->GetValue()) and !strlen($this->cp["IS_RATED"]->GetText()) and !is_bool($this->cp["IS_RATED"]->GetValue())) 
            $this->cp["IS_RATED"]->SetValue($this->IS_RATED->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["MAXIMUM_DURATION"]->GetValue()) and !strlen($this->cp["MAXIMUM_DURATION"]->GetText()) and !is_bool($this->cp["MAXIMUM_DURATION"]->GetValue())) 
            $this->cp["MAXIMUM_DURATION"]->SetValue($this->MAXIMUM_DURATION->GetValue(true));
        $this->SQL = "INSERT INTO P_SERVICE_CATEGORY(\n" .
        "P_SERVICE_CATEGORY_ID,\n" .
        "CODE,\n" .
        "P_SERVICE_TYPE_ID,\n" .
        "P_FEATURE_TYPE_ID, \n" .
        "P_FEATURE_CATEGORY_ID, \n" .
        "VALID_FROM, \n" .
        "VALID_TO,\n" .
        "UPDATE_DATE, \n" .
        "UPDATE_BY,\n" .
        "DESCRIPTION, \n" .
        "MINIMUM_DURATION, \n" .
        "MAXIMUM_DURATION, \n" .
        "IS_RATED\n" .
        ") VALUES(\n" .
        "GENERATE_ID('BILLDB','P_SERVICE_CATEGORY','P_SERVICE_CATEGORY_ID'),\n" .
        "UPPER('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "'),\n" .
        "" . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsText) . ",\n" .
        "" . $this->SQLValue($this->cp["P_FEATURE_TYPE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["P_FEATURE_CATEGORY_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "'" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "', \n" .
        "'" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "', \n" .
        "SYSDATE,\n" .
        "'" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "', \n" .
        "'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "', \n" .
        "" . $this->SQLValue($this->cp["MINIMUM_DURATION"]->GetDBValue(), ccsFloat) . ",\n" .
        "'" . $this->SQLValue($this->cp["MAXIMUM_DURATION"]->GetDBValue(), ccsText) . "', \n" .
        "'" . $this->SQLValue($this->cp["IS_RATED"]->GetDBValue(), ccsText) . "'\n" .
        " )";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @39-8C2625FD
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_FEATURE_TYPE_ID"] = new clsSQLParameter("ctrlP_FEATURE_TYPE_ID", ccsFloat, "", "", $this->P_FEATURE_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_FEATURE_CATEGORY_ID"] = new clsSQLParameter("ctrlP_FEATURE_CATEGORY_ID", ccsFloat, "", "", $this->P_FEATURE_CATEGORY_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SERVICE_CATEGORY_ID"] = new clsSQLParameter("ctrlP_SERVICE_CATEGORY_ID", ccsFloat, "", "", $this->P_SERVICE_CATEGORY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["MINIMUM_DURATION"] = new clsSQLParameter("ctrlMINIMUM_DURATION", ccsFloat, "", "", $this->MINIMUM_DURATION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["MAXIMUM_DURATION"] = new clsSQLParameter("ctrlMAXIMUM_DURATION", ccsFloat, "", "", $this->MAXIMUM_DURATION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_RATED"] = new clsSQLParameter("ctrlIS_RATED", ccsText, "", "", $this->IS_RATED->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["P_FEATURE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_FEATURE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_TYPE_ID"]->GetValue())) 
            $this->cp["P_FEATURE_TYPE_ID"]->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["P_FEATURE_CATEGORY_ID"]->GetValue()) and !strlen($this->cp["P_FEATURE_CATEGORY_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_CATEGORY_ID"]->GetValue())) 
            $this->cp["P_FEATURE_CATEGORY_ID"]->SetValue($this->P_FEATURE_CATEGORY_ID->GetValue(true));
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["P_SERVICE_CATEGORY_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_CATEGORY_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_CATEGORY_ID"]->GetValue())) 
            $this->cp["P_SERVICE_CATEGORY_ID"]->SetValue($this->P_SERVICE_CATEGORY_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_CATEGORY_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_CATEGORY_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_CATEGORY_ID"]->SetText(0);
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["MINIMUM_DURATION"]->GetValue()) and !strlen($this->cp["MINIMUM_DURATION"]->GetText()) and !is_bool($this->cp["MINIMUM_DURATION"]->GetValue())) 
            $this->cp["MINIMUM_DURATION"]->SetValue($this->MINIMUM_DURATION->GetValue(true));
        if (!is_null($this->cp["MAXIMUM_DURATION"]->GetValue()) and !strlen($this->cp["MAXIMUM_DURATION"]->GetText()) and !is_bool($this->cp["MAXIMUM_DURATION"]->GetValue())) 
            $this->cp["MAXIMUM_DURATION"]->SetValue($this->MAXIMUM_DURATION->GetValue(true));
        if (!is_null($this->cp["IS_RATED"]->GetValue()) and !strlen($this->cp["IS_RATED"]->GetText()) and !is_bool($this->cp["IS_RATED"]->GetValue())) 
            $this->cp["IS_RATED"]->SetValue($this->IS_RATED->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        $this->SQL = "UPDATE P_SERVICE_CATEGORY SET \n" .
        "CODE=UPPER('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "'), \n" .
        "P_FEATURE_TYPE_ID=" . $this->SQLValue($this->cp["P_FEATURE_TYPE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_FEATURE_CATEGORY_ID=" . $this->SQLValue($this->cp["P_FEATURE_CATEGORY_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "VALID_FROM='" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "', \n" .
        "UPDATE_DATE=SYSDATE, \n" .
        "DESCRIPTION=INITCAP('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "'),  \n" .
        "VALID_TO='" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "', \n" .
        "MINIMUM_DURATION=" . $this->SQLValue($this->cp["MINIMUM_DURATION"]->GetDBValue(), ccsFloat) . ", \n" .
        "MAXIMUM_DURATION=" . $this->SQLValue($this->cp["MAXIMUM_DURATION"]->GetDBValue(), ccsFloat) . ", \n" .
        "IS_RATED='" . $this->SQLValue($this->cp["IS_RATED"]->GetDBValue(), ccsText) . "', \n" .
        "UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE  \n" .
        "P_SERVICE_CATEGORY_ID = " . $this->SQLValue($this->cp["P_SERVICE_CATEGORY_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @39-3DD7568B
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_SERVICE_CATEGORY_ID"] = new clsSQLParameter("ctrlP_SERVICE_CATEGORY_ID", ccsFloat, "", "", $this->P_SERVICE_CATEGORY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_SERVICE_CATEGORY_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_CATEGORY_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_CATEGORY_ID"]->GetValue())) 
            $this->cp["P_SERVICE_CATEGORY_ID"]->SetValue($this->P_SERVICE_CATEGORY_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_CATEGORY_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_CATEGORY_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_CATEGORY_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_SERVICE_CATEGORY WHERE  P_SERVICE_CATEGORY_ID = " . $this->SQLValue($this->cp["P_SERVICE_CATEGORY_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End V_P_SERVICE_CATEGORY1DataSource Class @39-FCB6E20C

//Initialize Page @1-079A4B74
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
$TemplateFileName = "p_service_category.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-96F2BCCA
include_once("./p_service_category_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-C8D067A4
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$V_P_SERVICE_CATEGORY = & new clsGridV_P_SERVICE_CATEGORY("", $MainPage);
$V_P_SERVICE_CATEGORYSearch = & new clsRecordV_P_SERVICE_CATEGORYSearch("", $MainPage);
$V_P_SERVICE_CATEGORY1 = & new clsRecordV_P_SERVICE_CATEGORY1("", $MainPage);
$MainPage->V_P_SERVICE_CATEGORY = & $V_P_SERVICE_CATEGORY;
$MainPage->V_P_SERVICE_CATEGORYSearch = & $V_P_SERVICE_CATEGORYSearch;
$MainPage->V_P_SERVICE_CATEGORY1 = & $V_P_SERVICE_CATEGORY1;
$V_P_SERVICE_CATEGORY->Initialize();
$V_P_SERVICE_CATEGORY1->Initialize();

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

//Execute Components @1-09262264
$V_P_SERVICE_CATEGORYSearch->Operation();
$V_P_SERVICE_CATEGORY1->Operation();
//End Execute Components

//Go to destination page @1-926442BB
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($V_P_SERVICE_CATEGORY);
    unset($V_P_SERVICE_CATEGORYSearch);
    unset($V_P_SERVICE_CATEGORY1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-587543CC
$V_P_SERVICE_CATEGORY->Show();
$V_P_SERVICE_CATEGORYSearch->Show();
$V_P_SERVICE_CATEGORY1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-109D865A
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($V_P_SERVICE_CATEGORY);
unset($V_P_SERVICE_CATEGORYSearch);
unset($V_P_SERVICE_CATEGORY1);
unset($Tpl);
//End Unload Page


?>
