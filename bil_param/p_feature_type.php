<?php
//Include Common Files @1-998CAF62
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_feature_type.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridFEATURETYPE_GRID { //FEATURETYPE_GRID class @2-3833B8FB

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

//Class_Initialize Event @2-53ACF064
    function clsGridFEATURETYPE_GRID($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "FEATURETYPE_GRID";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid FEATURETYPE_GRID";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsFEATURETYPE_GRIDDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 5;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->CODE = & new clsControl(ccsLabel, "CODE", "CODE", ccsText, "", CCGetRequestParam("CODE", ccsGet, NULL), $this);
        $this->FEATURE_NAME = & new clsControl(ccsLabel, "FEATURE_NAME", "FEATURE_NAME", ccsText, "", CCGetRequestParam("FEATURE_NAME", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_feature_type.php";
        $this->P_FEATURE_TYPE_ID = & new clsControl(ccsHidden, "P_FEATURE_TYPE_ID", "P_FEATURE_TYPE_ID", ccsFloat, "", CCGetRequestParam("P_FEATURE_TYPE_ID", ccsGet, NULL), $this);
        $this->VALID_FROM = & new clsControl(ccsLabel, "VALID_FROM", "VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", ccsGet, NULL), $this);
        $this->VALID_TO = & new clsControl(ccsLabel, "VALID_TO", "VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->FT_NEW = & new clsControl(ccsLink, "FT_NEW", "FT_NEW", ccsText, "", CCGetRequestParam("FT_NEW", ccsGet, NULL), $this);
        $this->FT_NEW->HTML = true;
        $this->FT_NEW->Page = "p_feature_type.php";
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

//Show Method @2-20EE89D2
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);
        $this->DataSource->Parameters["urlP_FEATURE_GROUP_ID"] = CCGetFromGet("P_FEATURE_GROUP_ID", NULL);

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
            $this->ControlsVisible["FEATURE_NAME"] = $this->FEATURE_NAME->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["P_FEATURE_TYPE_ID"] = $this->P_FEATURE_TYPE_ID->Visible;
            $this->ControlsVisible["VALID_FROM"] = $this->VALID_FROM->Visible;
            $this->ControlsVisible["VALID_TO"] = $this->VALID_TO->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->FEATURE_NAME->SetValue($this->DataSource->FEATURE_NAME->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_FEATURE_TYPE_ID", $this->DataSource->f("P_FEATURE_TYPE_ID"));
                $this->P_FEATURE_TYPE_ID->SetValue($this->DataSource->P_FEATURE_TYPE_ID->GetValue());
                $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->FEATURE_NAME->Show();
                $this->DLink->Show();
                $this->P_FEATURE_TYPE_ID->Show();
                $this->VALID_FROM->Show();
                $this->VALID_TO->Show();
                $this->DESCRIPTION->Show();
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
        $this->FT_NEW->Parameters = CCGetQueryString("QueryString", array("P_FEATURE_TYPE_ID", "ccsForm"));
        $this->FT_NEW->Parameters = CCAddParam($this->FT_NEW->Parameters, "TAMBAH", 1);
        $this->Navigator->Show();
        $this->FT_NEW->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-1FE89451
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FEATURE_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_FEATURE_TYPE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End FEATURETYPE_GRID Class @2-FCB6E20C

class clsFEATURETYPE_GRIDDataSource extends clsDBConn {  //FEATURETYPE_GRIDDataSource Class @2-AFBD08C5

//DataSource Variables @2-FB10B0E4
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $FEATURE_NAME;
    var $P_FEATURE_TYPE_ID;
    var $VALID_FROM;
    var $VALID_TO;
    var $DESCRIPTION;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-7EFB682A
    function clsFEATURETYPE_GRIDDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid FEATURETYPE_GRID";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->FEATURE_NAME = new clsField("FEATURE_NAME", ccsText, "");
        
        $this->P_FEATURE_TYPE_ID = new clsField("P_FEATURE_TYPE_ID", ccsFloat, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        

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

//Prepare Method @2-C1B095FF
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urlP_FEATURE_GROUP_ID", ccsFloat, "", "", $this->Parameters["urlP_FEATURE_GROUP_ID"], 0, false);
    }
//End Prepare Method

//Open Method @2-410F0D75
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM P_FEATURE_TYPE\n" .
        "WHERE \n" .
        "P_FEATURE_GROUP_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . " AND\n" .
        "(UPPER(CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(FEATURE_NAME) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        "OR UPPER(DESCRIPTION) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        ")) cnt";
        $this->SQL = "SELECT * \n" .
        "FROM P_FEATURE_TYPE\n" .
        "WHERE \n" .
        "P_FEATURE_GROUP_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . " AND\n" .
        "(UPPER(CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(FEATURE_NAME) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        "OR UPPER(DESCRIPTION) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        ")";
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

//SetValues Method @2-BFB476A1
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->FEATURE_NAME->SetDBValue($this->f("FEATURE_NAME"));
        $this->P_FEATURE_TYPE_ID->SetDBValue(trim($this->f("P_FEATURE_TYPE_ID")));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
    }
//End SetValues Method

} //End FEATURETYPE_GRIDDataSource Class @2-FCB6E20C

class clsRecordFT_SEARCH { //FT_SEARCH Class @3-7D13DC27

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

//Class_Initialize Event @3-83CD081E
    function clsRecordFT_SEARCH($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record FT_SEARCH/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "FT_SEARCH";
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
            $this->P_FEATURE_GROUP_ID = & new clsControl(ccsHidden, "P_FEATURE_GROUP_ID", "P_FEATURE_GROUP_ID", ccsText, "", CCGetRequestParam("P_FEATURE_GROUP_ID", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @3-0DFFE267
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_keyword->Validate() && $Validation);
        $Validation = ($this->P_FEATURE_GROUP_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_keyword->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_FEATURE_GROUP_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-1779BBED
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_keyword->Errors->Count());
        $errors = ($errors || $this->P_FEATURE_GROUP_ID->Errors->Count());
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

//Operation Method @3-F679E5F0
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
        $Redirect = "p_feature_type.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_feature_type.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-32AB54C5
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
            $Error = ComposeStrings($Error, $this->P_FEATURE_GROUP_ID->Errors->ToString());
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
        $this->P_FEATURE_GROUP_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End FT_SEARCH Class @3-FCB6E20C

class clsRecordFEATURETYPE_RECORD { //FEATURETYPE_RECORD Class @91-FE5EC463

//Variables @91-D6FF3E86

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

//Class_Initialize Event @91-2BFDE985
    function clsRecordFEATURETYPE_RECORD($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record FEATURETYPE_RECORD/Error";
        $this->DataSource = new clsFEATURETYPE_RECORDDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "FEATURETYPE_RECORD";
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
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "Description", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->P_FEATURE_TYPE_ID = & new clsControl(ccsHidden, "P_FEATURE_TYPE_ID", "P_FEATURE_TYPE_ID", ccsText, "", CCGetRequestParam("P_FEATURE_TYPE_ID", $Method, NULL), $this);
            $this->FEATURE_NAME = & new clsControl(ccsTextBox, "FEATURE_NAME", "Feature Name", ccsText, "", CCGetRequestParam("FEATURE_NAME", $Method, NULL), $this);
            $this->LISTING_NO = & new clsControl(ccsTextBox, "LISTING_NO", "Listing No", ccsText, "", CCGetRequestParam("LISTING_NO", $Method, NULL), $this);
            $this->VALID_FROM = & new clsControl(ccsTextBox, "VALID_FROM", "VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", $Method, NULL), $this);
            $this->DatePicker_UPDATE_DATE1 = & new clsDatePicker("DatePicker_UPDATE_DATE1", "FEATURETYPE_RECORD", "VALID_FROM", $this);
            $this->IS_VALUE_REQUIRED = & new clsControl(ccsListBox, "IS_VALUE_REQUIRED", "IS VALUE REQUIRED", ccsText, "", CCGetRequestParam("IS_VALUE_REQUIRED", $Method, NULL), $this);
            $this->IS_VALUE_REQUIRED->DSType = dsListOfValues;
            $this->IS_VALUE_REQUIRED->Values = array(array("Y", "Yes"), array("N", "No"));
            $this->IS_VALUE_REQUIRED->Required = true;
            $this->VALID_TO = & new clsControl(ccsTextBox, "VALID_TO", "VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", $Method, NULL), $this);
            $this->DatePicker_UPDATE_DATE2 = & new clsDatePicker("DatePicker_UPDATE_DATE2", "FEATURETYPE_RECORD", "VALID_TO", $this);
            $this->P_FEATURE_GROUP_ID = & new clsControl(ccsHidden, "P_FEATURE_GROUP_ID", "P_FEATURE_GROUP_ID", ccsText, "", CCGetRequestParam("P_FEATURE_GROUP_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @91-1CB6614E
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_FEATURE_TYPE_ID"] = CCGetFromGet("P_FEATURE_TYPE_ID", NULL);
    }
//End Initialize Method

//Validate Method @91-D18C1FCE
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->P_FEATURE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->FEATURE_NAME->Validate() && $Validation);
        $Validation = ($this->LISTING_NO->Validate() && $Validation);
        $Validation = ($this->VALID_FROM->Validate() && $Validation);
        $Validation = ($this->IS_VALUE_REQUIRED->Validate() && $Validation);
        $Validation = ($this->VALID_TO->Validate() && $Validation);
        $Validation = ($this->P_FEATURE_GROUP_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_FEATURE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FEATURE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LISTING_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_VALUE_REQUIRED->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_FEATURE_GROUP_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @91-80D81345
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->P_FEATURE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->FEATURE_NAME->Errors->Count());
        $errors = ($errors || $this->LISTING_NO->Errors->Count());
        $errors = ($errors || $this->VALID_FROM->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE1->Errors->Count());
        $errors = ($errors || $this->IS_VALUE_REQUIRED->Errors->Count());
        $errors = ($errors || $this->VALID_TO->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE2->Errors->Count());
        $errors = ($errors || $this->P_FEATURE_GROUP_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @91-ED598703
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

//Operation Method @91-D9801723
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
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "P_FEATURE_TYPE_ID"));
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

//InsertRow Method @91-FBD2A256
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->P_FEATURE_TYPE_ID->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        $this->DataSource->FEATURE_NAME->SetValue($this->FEATURE_NAME->GetValue(true));
        $this->DataSource->LISTING_NO->SetValue($this->LISTING_NO->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->IS_VALUE_REQUIRED->SetValue($this->IS_VALUE_REQUIRED->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @91-34E43E09
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->P_FEATURE_TYPE_ID->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        $this->DataSource->FEATURE_NAME->SetValue($this->FEATURE_NAME->GetValue(true));
        $this->DataSource->LISTING_NO->SetValue($this->LISTING_NO->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->IS_VALUE_REQUIRED->SetValue($this->IS_VALUE_REQUIRED->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @91-66B9E884
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_FEATURE_TYPE_ID->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @91-9E2EFC11
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

        $this->IS_VALUE_REQUIRED->Prepare();

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
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->P_FEATURE_TYPE_ID->SetValue($this->DataSource->P_FEATURE_TYPE_ID->GetValue());
                    $this->FEATURE_NAME->SetValue($this->DataSource->FEATURE_NAME->GetValue());
                    $this->LISTING_NO->SetValue($this->DataSource->LISTING_NO->GetValue());
                    $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                    $this->IS_VALUE_REQUIRED->SetValue($this->DataSource->IS_VALUE_REQUIRED->GetValue());
                    $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                    $this->P_FEATURE_GROUP_ID->SetValue($this->DataSource->P_FEATURE_GROUP_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_FEATURE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FEATURE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LISTING_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_VALUE_REQUIRED->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_FEATURE_GROUP_ID->Errors->ToString());
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
        $this->DESCRIPTION->Show();
        $this->UPDATE_DATE->Show();
        $this->UPDATE_BY->Show();
        $this->P_FEATURE_TYPE_ID->Show();
        $this->FEATURE_NAME->Show();
        $this->LISTING_NO->Show();
        $this->VALID_FROM->Show();
        $this->DatePicker_UPDATE_DATE1->Show();
        $this->IS_VALUE_REQUIRED->Show();
        $this->VALID_TO->Show();
        $this->DatePicker_UPDATE_DATE2->Show();
        $this->P_FEATURE_GROUP_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End FEATURETYPE_RECORD Class @91-FCB6E20C

class clsFEATURETYPE_RECORDDataSource extends clsDBConn {  //FEATURETYPE_RECORDDataSource Class @91-1B344C66

//DataSource Variables @91-064B5E8C
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
    var $DESCRIPTION;
    var $UPDATE_DATE;
    var $UPDATE_BY;
    var $P_FEATURE_TYPE_ID;
    var $FEATURE_NAME;
    var $LISTING_NO;
    var $VALID_FROM;
    var $IS_VALUE_REQUIRED;
    var $VALID_TO;
    var $P_FEATURE_GROUP_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @91-84281909
    function clsFEATURETYPE_RECORDDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record FEATURETYPE_RECORD/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->P_FEATURE_TYPE_ID = new clsField("P_FEATURE_TYPE_ID", ccsText, "");
        
        $this->FEATURE_NAME = new clsField("FEATURE_NAME", ccsText, "");
        
        $this->LISTING_NO = new clsField("LISTING_NO", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->IS_VALUE_REQUIRED = new clsField("IS_VALUE_REQUIRED", ccsText, "");
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->P_FEATURE_GROUP_ID = new clsField("P_FEATURE_GROUP_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @91-21F00AF8
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_FEATURE_TYPE_ID", ccsFloat, "", "", $this->Parameters["urlP_FEATURE_TYPE_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_FEATURE_TYPE_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @91-F712B97A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM P_FEATURE_TYPE {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @91-61BAB4F5
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->P_FEATURE_TYPE_ID->SetDBValue($this->f("P_FEATURE_TYPE_ID"));
        $this->FEATURE_NAME->SetDBValue($this->f("FEATURE_NAME"));
        $this->LISTING_NO->SetDBValue($this->f("LISTING_NO"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->IS_VALUE_REQUIRED->SetDBValue($this->f("IS_VALUE_REQUIRED"));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->P_FEATURE_GROUP_ID->SetDBValue($this->f("P_FEATURE_GROUP_ID"));
    }
//End SetValues Method

//Insert Method @91-4019FB42
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["P_FEATURE_GROUP_ID"] = new clsSQLParameter("urlP_FEATURE_GROUP_ID", ccsFloat, "", "", CCGetFromGet("P_FEATURE_GROUP_ID", NULL), 0, false, $this->ErrorBlock);
        $this->cp["P_FEATURE_TYPE_ID"] = new clsSQLParameter("ctrlP_FEATURE_TYPE_ID", ccsText, "", "", $this->P_FEATURE_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FEATURE_NAME"] = new clsSQLParameter("ctrlFEATURE_NAME", ccsText, "", "", $this->FEATURE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LISTING_NO"] = new clsSQLParameter("ctrlLISTING_NO", ccsText, "", "", $this->LISTING_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_VALUE_REQUIRED"] = new clsSQLParameter("ctrlIS_VALUE_REQUIRED", ccsText, "", "", $this->IS_VALUE_REQUIRED->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["P_FEATURE_GROUP_ID"]->GetValue()) and !strlen($this->cp["P_FEATURE_GROUP_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_GROUP_ID"]->GetValue())) 
            $this->cp["P_FEATURE_GROUP_ID"]->SetText(CCGetFromGet("P_FEATURE_GROUP_ID", NULL));
        if (!strlen($this->cp["P_FEATURE_GROUP_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_GROUP_ID"]->GetValue(true))) 
            $this->cp["P_FEATURE_GROUP_ID"]->SetText(0);
        if (!is_null($this->cp["P_FEATURE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_FEATURE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_TYPE_ID"]->GetValue())) 
            $this->cp["P_FEATURE_TYPE_ID"]->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["FEATURE_NAME"]->GetValue()) and !strlen($this->cp["FEATURE_NAME"]->GetText()) and !is_bool($this->cp["FEATURE_NAME"]->GetValue())) 
            $this->cp["FEATURE_NAME"]->SetValue($this->FEATURE_NAME->GetValue(true));
        if (!is_null($this->cp["LISTING_NO"]->GetValue()) and !strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue())) 
            $this->cp["LISTING_NO"]->SetValue($this->LISTING_NO->GetValue(true));
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["IS_VALUE_REQUIRED"]->GetValue()) and !strlen($this->cp["IS_VALUE_REQUIRED"]->GetText()) and !is_bool($this->cp["IS_VALUE_REQUIRED"]->GetValue())) 
            $this->cp["IS_VALUE_REQUIRED"]->SetValue($this->IS_VALUE_REQUIRED->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        $this->SQL = "INSERT INTO P_FEATURE_TYPE(\n" .
        "P_FEATURE_TYPE_ID, \n" .
        "CODE, \n" .
        "FEATURE_NAME,\n" .
        "P_FEATURE_GROUP_ID, \n" .
        "LISTING_NO, \n" .
        "VALID_FROM, \n" .
        "VALID_TO,\n" .
        "IS_VALUE_REQUIRED,\n" .
        "UPDATE_DATE, \n" .
        "UPDATE_BY, \n" .
        "DESCRIPTION\n" .
        ") VALUES(\n" .
        "GENERATE_ID('BILLDB','P_FEATURE_TYPE','P_FEATURE_TYPE_ID'),\n" .
        "UPPER('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "'),\n" .
        "INITCAP('" . $this->SQLValue($this->cp["FEATURE_NAME"]->GetDBValue(), ccsText) . "'), \n" .
        "" . $this->SQLValue($this->cp["P_FEATURE_GROUP_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "'" . $this->SQLValue($this->cp["LISTING_NO"]->GetDBValue(), ccsText) . "', \n" .
        "'" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "',\n" .
        "'" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "',\n" .
        "'" . $this->SQLValue($this->cp["IS_VALUE_REQUIRED"]->GetDBValue(), ccsText) . "', \n" .
        "SYSDATE,\n" .
        "'" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "', \n" .
        "'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "'\n" .
        ")";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @91-5632D6EA
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["P_FEATURE_TYPE_ID"] = new clsSQLParameter("ctrlP_FEATURE_TYPE_ID", ccsText, "", "", $this->P_FEATURE_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FEATURE_NAME"] = new clsSQLParameter("ctrlFEATURE_NAME", ccsText, "", "", $this->FEATURE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LISTING_NO"] = new clsSQLParameter("ctrlLISTING_NO", ccsText, "", "", $this->LISTING_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_VALUE_REQUIRED"] = new clsSQLParameter("ctrlIS_VALUE_REQUIRED", ccsText, "", "", $this->IS_VALUE_REQUIRED->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["P_FEATURE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_FEATURE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_TYPE_ID"]->GetValue())) 
            $this->cp["P_FEATURE_TYPE_ID"]->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["FEATURE_NAME"]->GetValue()) and !strlen($this->cp["FEATURE_NAME"]->GetText()) and !is_bool($this->cp["FEATURE_NAME"]->GetValue())) 
            $this->cp["FEATURE_NAME"]->SetValue($this->FEATURE_NAME->GetValue(true));
        if (!is_null($this->cp["LISTING_NO"]->GetValue()) and !strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue())) 
            $this->cp["LISTING_NO"]->SetValue($this->LISTING_NO->GetValue(true));
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["IS_VALUE_REQUIRED"]->GetValue()) and !strlen($this->cp["IS_VALUE_REQUIRED"]->GetText()) and !is_bool($this->cp["IS_VALUE_REQUIRED"]->GetValue())) 
            $this->cp["IS_VALUE_REQUIRED"]->SetValue($this->IS_VALUE_REQUIRED->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        $this->SQL = "UPDATE P_FEATURE_TYPE SET \n" .
        "CODE=UPPER('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "'), \n" .
        "DESCRIPTION=INITCAP('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "'), \n" .
        "UPDATE_DATE=SYSDATE,\n" .
        "UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "', \n" .
        "FEATURE_NAME=INITCAP('" . $this->SQLValue($this->cp["FEATURE_NAME"]->GetDBValue(), ccsText) . "'), \n" .
        "LISTING_NO='" . $this->SQLValue($this->cp["LISTING_NO"]->GetDBValue(), ccsText) . "', \n" .
        "VALID_FROM='" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "', \n" .
        "IS_VALUE_REQUIRED='" . $this->SQLValue($this->cp["IS_VALUE_REQUIRED"]->GetDBValue(), ccsText) . "',\n" .
        " VALID_TO='" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "'\n" .
        "WHERE P_FEATURE_TYPE_ID='" . $this->SQLValue($this->cp["P_FEATURE_TYPE_ID"]->GetDBValue(), ccsText) . "'";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @91-50F586A4
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_FEATURE_TYPE_ID"] = new clsSQLParameter("ctrlP_FEATURE_TYPE_ID", ccsFloat, "", "", $this->P_FEATURE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_FEATURE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_FEATURE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_TYPE_ID"]->GetValue())) 
            $this->cp["P_FEATURE_TYPE_ID"]->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_FEATURE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_FEATURE_TYPE_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_FEATURE_TYPE WHERE  P_FEATURE_TYPE_ID = " . $this->SQLValue($this->cp["P_FEATURE_TYPE_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End FEATURETYPE_RECORDDataSource Class @91-FCB6E20C



//Initialize Page @1-3A9714C6
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
$TemplateFileName = "p_feature_type.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-5EC3DB07
include_once("./p_feature_type_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-B8382790
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$FEATURETYPE_GRID = & new clsGridFEATURETYPE_GRID("", $MainPage);
$FT_SEARCH = & new clsRecordFT_SEARCH("", $MainPage);
$FEATURETYPE_RECORD = & new clsRecordFEATURETYPE_RECORD("", $MainPage);
$MainPage->FEATURETYPE_GRID = & $FEATURETYPE_GRID;
$MainPage->FT_SEARCH = & $FT_SEARCH;
$MainPage->FEATURETYPE_RECORD = & $FEATURETYPE_RECORD;
$FEATURETYPE_GRID->Initialize();
$FEATURETYPE_RECORD->Initialize();

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

//Execute Components @1-223C1A26
$FT_SEARCH->Operation();
$FEATURETYPE_RECORD->Operation();
//End Execute Components

//Go to destination page @1-E8A3C4FB
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($FEATURETYPE_GRID);
    unset($FT_SEARCH);
    unset($FEATURETYPE_RECORD);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-3453648A
$FEATURETYPE_GRID->Show();
$FT_SEARCH->Show();
$FEATURETYPE_RECORD->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-47FDDB47
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($FEATURETYPE_GRID);
unset($FT_SEARCH);
unset($FEATURETYPE_RECORD);
unset($Tpl);
//End Unload Page


?>
