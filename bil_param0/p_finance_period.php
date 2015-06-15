<?php
//Include Common Files @1-6BD3F7FA
define("RelativePath", "..");
define("PathToCurrentPage", "/msu_param/");
define("FileName", "p_finance_period.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_FINANCE_PERIOD { //P_FINANCE_PERIOD class @2-317AEF32

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

//Class_Initialize Event @2-1675A68F
    function clsGridP_FINANCE_PERIOD($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_FINANCE_PERIOD";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_FINANCE_PERIOD";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_FINANCE_PERIODDataSource($this);
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

        $this->FINANCE_PERIOD_CODE = & new clsControl(ccsLabel, "FINANCE_PERIOD_CODE", "FINANCE_PERIOD_CODE", ccsText, "", CCGetRequestParam("FINANCE_PERIOD_CODE", ccsGet, NULL), $this);
        $this->PERIOD_STATUS_NAME = & new clsControl(ccsLabel, "PERIOD_STATUS_NAME", "PERIOD_STATUS_NAME", ccsText, "", CCGetRequestParam("PERIOD_STATUS_NAME", ccsGet, NULL), $this);
        $this->P_YEAR_PERIOD_NAME = & new clsControl(ccsLabel, "P_YEAR_PERIOD_NAME", "P_YEAR_PERIOD_NAME", ccsText, "", CCGetRequestParam("P_YEAR_PERIOD_NAME", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_finance_period.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_finance_period.php";
        $this->P_FINANCE_PERIOD_ID = & new clsControl(ccsHidden, "P_FINANCE_PERIOD_ID", "P_FINANCE_PERIOD_ID", ccsFloat, "", CCGetRequestParam("P_FINANCE_PERIOD_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_FINANCE_PERIOD_Insert = & new clsControl(ccsLink, "P_FINANCE_PERIOD_Insert", "P_FINANCE_PERIOD_Insert", ccsText, "", CCGetRequestParam("P_FINANCE_PERIOD_Insert", ccsGet, NULL), $this);
        $this->P_FINANCE_PERIOD_Insert->Page = "p_finance_period.php";
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

//Show Method @2-4570BD6F
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
            $this->ControlsVisible["FINANCE_PERIOD_CODE"] = $this->FINANCE_PERIOD_CODE->Visible;
            $this->ControlsVisible["PERIOD_STATUS_NAME"] = $this->PERIOD_STATUS_NAME->Visible;
            $this->ControlsVisible["P_YEAR_PERIOD_NAME"] = $this->P_YEAR_PERIOD_NAME->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_FINANCE_PERIOD_ID"] = $this->P_FINANCE_PERIOD_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->FINANCE_PERIOD_CODE->SetValue($this->DataSource->FINANCE_PERIOD_CODE->GetValue());
                $this->PERIOD_STATUS_NAME->SetValue($this->DataSource->PERIOD_STATUS_NAME->GetValue());
                $this->P_YEAR_PERIOD_NAME->SetValue($this->DataSource->P_YEAR_PERIOD_NAME->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_FINANCE_PERIOD_ID", $this->DataSource->f("P_FINANCE_PERIOD_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_FINANCE_PERIOD_ID", $this->DataSource->f("P_FINANCE_PERIOD_ID"));
                $this->P_FINANCE_PERIOD_ID->SetValue($this->DataSource->P_FINANCE_PERIOD_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->FINANCE_PERIOD_CODE->Show();
                $this->PERIOD_STATUS_NAME->Show();
                $this->P_YEAR_PERIOD_NAME->Show();
                $this->DESCRIPTION->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_FINANCE_PERIOD_ID->Show();
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
        $this->P_FINANCE_PERIOD_Insert->Parameters = CCGetQueryString("QueryString", array("P_FINANCE_PERIOD_ID", "ccsForm"));
        $this->P_FINANCE_PERIOD_Insert->Parameters = CCAddParam($this->P_FINANCE_PERIOD_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_FINANCE_PERIOD_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-52610466
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->FINANCE_PERIOD_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PERIOD_STATUS_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_YEAR_PERIOD_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_FINANCE_PERIOD_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_FINANCE_PERIOD Class @2-FCB6E20C

class clsP_FINANCE_PERIODDataSource extends clsDBConn {  //P_FINANCE_PERIODDataSource Class @2-48C2662B

//DataSource Variables @2-F74E876B
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $FINANCE_PERIOD_CODE;
    var $PERIOD_STATUS_NAME;
    var $P_YEAR_PERIOD_NAME;
    var $DESCRIPTION;
    var $DLink;
    var $ADLink;
    var $P_FINANCE_PERIOD_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-6FAFDF2A
    function clsP_FINANCE_PERIODDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_FINANCE_PERIOD";
        $this->Initialize();
        $this->FINANCE_PERIOD_CODE = new clsField("FINANCE_PERIOD_CODE", ccsText, "");
        
        $this->PERIOD_STATUS_NAME = new clsField("PERIOD_STATUS_NAME", ccsText, "");
        
        $this->P_YEAR_PERIOD_NAME = new clsField("P_YEAR_PERIOD_NAME", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_FINANCE_PERIOD_ID = new clsField("P_FINANCE_PERIOD_ID", ccsFloat, "");
        

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

//Open Method @2-BC939F0A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select a.*,b.code as PERIOD_STATUS_NAME,c.code as P_YEAR_PERIOD_NAME from p_finance_period  a,\n" .
        "P_STATUS_LIST b, \n" .
        "P_YEAR_PERIOD c\n" .
        "where\n" .
        "a.PERIOD_STATUS_ID=b.P_STATUS_LIST_ID\n" .
        "and a.P_YEAR_PERIOD_ID=c.P_YEAR_PERIOD_ID\n" .
        "and upper(a.FINANCE_PERIOD_CODE) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) cnt";
        $this->SQL = "select a.*,b.code as PERIOD_STATUS_NAME,c.code as P_YEAR_PERIOD_NAME from p_finance_period  a,\n" .
        "P_STATUS_LIST b, \n" .
        "P_YEAR_PERIOD c\n" .
        "where\n" .
        "a.PERIOD_STATUS_ID=b.P_STATUS_LIST_ID\n" .
        "and a.P_YEAR_PERIOD_ID=c.P_YEAR_PERIOD_ID\n" .
        "and upper(a.FINANCE_PERIOD_CODE) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')";
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

//SetValues Method @2-FE0F05FB
    function SetValues()
    {
        $this->FINANCE_PERIOD_CODE->SetDBValue($this->f("FINANCE_PERIOD_CODE"));
        $this->PERIOD_STATUS_NAME->SetDBValue($this->f("PERIOD_STATUS_NAME"));
        $this->P_YEAR_PERIOD_NAME->SetDBValue($this->f("P_YEAR_PERIOD_NAME"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->DLink->SetDBValue($this->f("P_FINANCE_PERIOD_ID"));
        $this->ADLink->SetDBValue($this->f("P_FINANCE_PERIOD_ID"));
        $this->P_FINANCE_PERIOD_ID->SetDBValue(trim($this->f("P_FINANCE_PERIOD_ID")));
    }
//End SetValues Method

} //End P_FINANCE_PERIODDataSource Class @2-FCB6E20C

class clsRecordP_FINANCE_PERIODSearch { //P_FINANCE_PERIODSearch Class @3-C6410492

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

//Class_Initialize Event @3-348A9377
    function clsRecordP_FINANCE_PERIODSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_FINANCE_PERIODSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_FINANCE_PERIODSearch";
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

//Operation Method @3-62C86F21
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
        $Redirect = "p_finance_period.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_finance_period.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End P_FINANCE_PERIODSearch Class @3-FCB6E20C

class clsRecordp_finance_period1 { //p_finance_period1 Class @31-780E95C7

//Variables @31-D6FF3E86

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

//Class_Initialize Event @31-9A8697B4
    function clsRecordp_finance_period1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_finance_period1/Error";
        $this->DataSource = new clsp_finance_period1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_finance_period1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->FINANCE_PERIOD_CODE = & new clsControl(ccsTextBox, "FINANCE_PERIOD_CODE", "FINANCE PERIOD CODE", ccsText, "", CCGetRequestParam("FINANCE_PERIOD_CODE", $Method, NULL), $this);
            $this->FINANCE_PERIOD_CODE->Required = true;
            $this->START_DATE = & new clsControl(ccsTextBox, "START_DATE", "START DATE", ccsDate, $DefaultDateFormat, CCGetRequestParam("START_DATE", $Method, NULL), $this);
            $this->START_DATE->Required = true;
            $this->DatePicker_START_DATE = & new clsDatePicker("DatePicker_START_DATE", "p_finance_period1", "START_DATE", $this);
            $this->END_DATE = & new clsControl(ccsTextBox, "END_DATE", "END DATE", ccsDate, $DefaultDateFormat, CCGetRequestParam("END_DATE", $Method, NULL), $this);
            $this->END_DATE->Required = true;
            $this->DatePicker_END_DATE = & new clsDatePicker("DatePicker_END_DATE", "p_finance_period1", "END_DATE", $this);
            $this->PERIOD_STATUS_ID = & new clsControl(ccsHidden, "PERIOD_STATUS_ID", "PERIOD STATUS ID", ccsFloat, "", CCGetRequestParam("PERIOD_STATUS_ID", $Method, NULL), $this);
            $this->PERIOD_STATUS_ID->Required = true;
            $this->P_YEAR_PERIOD_ID = & new clsControl(ccsHidden, "P_YEAR_PERIOD_ID", "P YEAR PERIOD ID", ccsFloat, "", CCGetRequestParam("P_YEAR_PERIOD_ID", $Method, NULL), $this);
            $this->P_YEAR_PERIOD_ID->Required = true;
            $this->REF_NO = & new clsControl(ccsTextBox, "REF_NO", "REF NO", ccsText, "", CCGetRequestParam("REF_NO", $Method, NULL), $this);
            $this->REF_DATE = & new clsControl(ccsTextBox, "REF_DATE", "REF DATE", ccsDate, $DefaultDateFormat, CCGetRequestParam("REF_DATE", $Method, NULL), $this);
            $this->DatePicker_REF_DATE = & new clsDatePicker("DatePicker_REF_DATE", "p_finance_period1", "REF_DATE", $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->CREATED_BY = & new clsControl(ccsTextBox, "CREATED_BY", "CREATED BY", ccsText, "", CCGetRequestParam("CREATED_BY", $Method, NULL), $this);
            $this->CREATED_BY->Required = true;
            $this->UPDATED_BY = & new clsControl(ccsTextBox, "UPDATED_BY", "UPDATED BY", ccsText, "", CCGetRequestParam("UPDATED_BY", $Method, NULL), $this);
            $this->UPDATED_BY->Required = true;
            $this->CREATION_DATE = & new clsControl(ccsTextBox, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", $Method, NULL), $this);
            $this->CREATION_DATE->Required = true;
            $this->UPDATED_DATE = & new clsControl(ccsTextBox, "UPDATED_DATE", "UPDATED DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATED_DATE", $Method, NULL), $this);
            $this->UPDATED_DATE->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->P_FINANCE_PERIOD_ID = & new clsControl(ccsHidden, "P_FINANCE_PERIOD_ID", "P_FINANCE_PERIOD_ID", ccsFloat, "", CCGetRequestParam("P_FINANCE_PERIOD_ID", $Method, NULL), $this);
            $this->PERIOD_STATUS_NAME = & new clsControl(ccsTextBox, "PERIOD_STATUS_NAME", "PERIOD_STATUS_NAME", ccsText, "", CCGetRequestParam("PERIOD_STATUS_NAME", $Method, NULL), $this);
            $this->P_YEAR_PERIOD_NAME = & new clsControl(ccsTextBox, "P_YEAR_PERIOD_NAME", "P_YEAR_PERIOD_NAME", ccsText, "", CCGetRequestParam("P_YEAR_PERIOD_NAME", $Method, NULL), $this);
            $this->P_YEAR_PERIOD_NAME->Required = true;
            if(!$this->FormSubmitted) {
                if(!is_array($this->CREATED_BY->Value) && !strlen($this->CREATED_BY->Value) && $this->CREATED_BY->Value !== false)
                    $this->CREATED_BY->SetText(CCGetUserLogin());
                if(!is_array($this->UPDATED_BY->Value) && !strlen($this->UPDATED_BY->Value) && $this->UPDATED_BY->Value !== false)
                    $this->UPDATED_BY->SetText(CCGetUserLogin());
                if(!is_array($this->CREATION_DATE->Value) && !strlen($this->CREATION_DATE->Value) && $this->CREATION_DATE->Value !== false)
                    $this->CREATION_DATE->SetText(date("d-M-Y"));
                if(!is_array($this->UPDATED_DATE->Value) && !strlen($this->UPDATED_DATE->Value) && $this->UPDATED_DATE->Value !== false)
                    $this->UPDATED_DATE->SetText(date("d-M-Y"));
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @31-C608592C
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_FINANCE_PERIOD_ID"] = CCGetFromGet("P_FINANCE_PERIOD_ID", NULL);
    }
//End Initialize Method

//Validate Method @31-C5B056A0
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->FINANCE_PERIOD_CODE->Validate() && $Validation);
        $Validation = ($this->START_DATE->Validate() && $Validation);
        $Validation = ($this->END_DATE->Validate() && $Validation);
        $Validation = ($this->PERIOD_STATUS_ID->Validate() && $Validation);
        $Validation = ($this->P_YEAR_PERIOD_ID->Validate() && $Validation);
        $Validation = ($this->REF_NO->Validate() && $Validation);
        $Validation = ($this->REF_DATE->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->CREATED_BY->Validate() && $Validation);
        $Validation = ($this->UPDATED_BY->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATED_DATE->Validate() && $Validation);
        $Validation = ($this->P_FINANCE_PERIOD_ID->Validate() && $Validation);
        $Validation = ($this->PERIOD_STATUS_NAME->Validate() && $Validation);
        $Validation = ($this->P_YEAR_PERIOD_NAME->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->FINANCE_PERIOD_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->START_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->END_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PERIOD_STATUS_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_YEAR_PERIOD_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->REF_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->REF_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_FINANCE_PERIOD_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PERIOD_STATUS_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_YEAR_PERIOD_NAME->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @31-7704A039
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->FINANCE_PERIOD_CODE->Errors->Count());
        $errors = ($errors || $this->START_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_START_DATE->Errors->Count());
        $errors = ($errors || $this->END_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_END_DATE->Errors->Count());
        $errors = ($errors || $this->PERIOD_STATUS_ID->Errors->Count());
        $errors = ($errors || $this->P_YEAR_PERIOD_ID->Errors->Count());
        $errors = ($errors || $this->REF_NO->Errors->Count());
        $errors = ($errors || $this->REF_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_REF_DATE->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->CREATED_BY->Errors->Count());
        $errors = ($errors || $this->UPDATED_BY->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATED_DATE->Errors->Count());
        $errors = ($errors || $this->P_FINANCE_PERIOD_ID->Errors->Count());
        $errors = ($errors || $this->PERIOD_STATUS_NAME->Errors->Count());
        $errors = ($errors || $this->P_YEAR_PERIOD_NAME->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @31-ED598703
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

//Operation Method @31-872C026F
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
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_AR_SEGMENTPage"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG"));
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

//InsertRow Method @31-7CADAAD1
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->FINANCE_PERIOD_CODE->SetValue($this->FINANCE_PERIOD_CODE->GetValue(true));
        $this->DataSource->START_DATE->SetValue($this->START_DATE->GetValue(true));
        $this->DataSource->END_DATE->SetValue($this->END_DATE->GetValue(true));
        $this->DataSource->PERIOD_STATUS_ID->SetValue($this->PERIOD_STATUS_ID->GetValue(true));
        $this->DataSource->P_YEAR_PERIOD_ID->SetValue($this->P_YEAR_PERIOD_ID->GetValue(true));
        $this->DataSource->REF_NO->SetValue($this->REF_NO->GetValue(true));
        $this->DataSource->REF_DATE->SetValue($this->REF_DATE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CREATED_BY->SetValue($this->CREATED_BY->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @31-020E2611
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->FINANCE_PERIOD_CODE->SetValue($this->FINANCE_PERIOD_CODE->GetValue(true));
        $this->DataSource->START_DATE->SetValue($this->START_DATE->GetValue(true));
        $this->DataSource->END_DATE->SetValue($this->END_DATE->GetValue(true));
        $this->DataSource->PERIOD_STATUS_ID->SetValue($this->PERIOD_STATUS_ID->GetValue(true));
        $this->DataSource->P_YEAR_PERIOD_ID->SetValue($this->P_YEAR_PERIOD_ID->GetValue(true));
        $this->DataSource->REF_NO->SetValue($this->REF_NO->GetValue(true));
        $this->DataSource->REF_DATE->SetValue($this->REF_DATE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->P_FINANCE_PERIOD_ID->SetValue($this->P_FINANCE_PERIOD_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @31-1B040BDB
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_FINANCE_PERIOD_ID->SetValue($this->P_FINANCE_PERIOD_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @31-8BF7CA13
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
                if(!$this->FormSubmitted){
                    $this->FINANCE_PERIOD_CODE->SetValue($this->DataSource->FINANCE_PERIOD_CODE->GetValue());
                    $this->START_DATE->SetValue($this->DataSource->START_DATE->GetValue());
                    $this->END_DATE->SetValue($this->DataSource->END_DATE->GetValue());
                    $this->PERIOD_STATUS_ID->SetValue($this->DataSource->PERIOD_STATUS_ID->GetValue());
                    $this->P_YEAR_PERIOD_ID->SetValue($this->DataSource->P_YEAR_PERIOD_ID->GetValue());
                    $this->REF_NO->SetValue($this->DataSource->REF_NO->GetValue());
                    $this->REF_DATE->SetValue($this->DataSource->REF_DATE->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->UPDATED_BY->SetValue($this->DataSource->UPDATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATED_DATE->SetValue($this->DataSource->UPDATED_DATE->GetValue());
                    $this->P_FINANCE_PERIOD_ID->SetValue($this->DataSource->P_FINANCE_PERIOD_ID->GetValue());
                    $this->PERIOD_STATUS_NAME->SetValue($this->DataSource->PERIOD_STATUS_NAME->GetValue());
                    $this->P_YEAR_PERIOD_NAME->SetValue($this->DataSource->P_YEAR_PERIOD_NAME->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->FINANCE_PERIOD_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->START_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_START_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->END_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_END_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PERIOD_STATUS_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_YEAR_PERIOD_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->REF_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->REF_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_REF_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_FINANCE_PERIOD_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PERIOD_STATUS_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_YEAR_PERIOD_NAME->Errors->ToString());
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

        $this->FINANCE_PERIOD_CODE->Show();
        $this->START_DATE->Show();
        $this->DatePicker_START_DATE->Show();
        $this->END_DATE->Show();
        $this->DatePicker_END_DATE->Show();
        $this->PERIOD_STATUS_ID->Show();
        $this->P_YEAR_PERIOD_ID->Show();
        $this->REF_NO->Show();
        $this->REF_DATE->Show();
        $this->DatePicker_REF_DATE->Show();
        $this->DESCRIPTION->Show();
        $this->CREATED_BY->Show();
        $this->UPDATED_BY->Show();
        $this->CREATION_DATE->Show();
        $this->UPDATED_DATE->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->P_FINANCE_PERIOD_ID->Show();
        $this->PERIOD_STATUS_NAME->Show();
        $this->P_YEAR_PERIOD_NAME->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_finance_period1 Class @31-FCB6E20C

class clsp_finance_period1DataSource extends clsDBConn {  //p_finance_period1DataSource Class @31-2D1D9A2E

//DataSource Variables @31-0AAE11B0
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
    var $FINANCE_PERIOD_CODE;
    var $START_DATE;
    var $END_DATE;
    var $PERIOD_STATUS_ID;
    var $P_YEAR_PERIOD_ID;
    var $REF_NO;
    var $REF_DATE;
    var $DESCRIPTION;
    var $CREATED_BY;
    var $UPDATED_BY;
    var $CREATION_DATE;
    var $UPDATED_DATE;
    var $P_FINANCE_PERIOD_ID;
    var $PERIOD_STATUS_NAME;
    var $P_YEAR_PERIOD_NAME;
//End DataSource Variables

//DataSourceClass_Initialize Event @31-A04E652B
    function clsp_finance_period1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_finance_period1/Error";
        $this->Initialize();
        $this->FINANCE_PERIOD_CODE = new clsField("FINANCE_PERIOD_CODE", ccsText, "");
        
        $this->START_DATE = new clsField("START_DATE", ccsDate, $this->DateFormat);
        
        $this->END_DATE = new clsField("END_DATE", ccsDate, $this->DateFormat);
        
        $this->PERIOD_STATUS_ID = new clsField("PERIOD_STATUS_ID", ccsFloat, "");
        
        $this->P_YEAR_PERIOD_ID = new clsField("P_YEAR_PERIOD_ID", ccsFloat, "");
        
        $this->REF_NO = new clsField("REF_NO", ccsText, "");
        
        $this->REF_DATE = new clsField("REF_DATE", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->UPDATED_BY = new clsField("UPDATED_BY", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATED_DATE = new clsField("UPDATED_DATE", ccsDate, $this->DateFormat);
        
        $this->P_FINANCE_PERIOD_ID = new clsField("P_FINANCE_PERIOD_ID", ccsFloat, "");
        
        $this->PERIOD_STATUS_NAME = new clsField("PERIOD_STATUS_NAME", ccsText, "");
        
        $this->P_YEAR_PERIOD_NAME = new clsField("P_YEAR_PERIOD_NAME", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @31-50FE70CE
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_FINANCE_PERIOD_ID", ccsFloat, "", "", $this->Parameters["urlP_FINANCE_PERIOD_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @31-20C7E1C1
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "select a.*,b.code as PERIOD_STATUS_NAME,c.code as P_YEAR_PERIOD_NAME from p_finance_period  a,\n" .
        "P_STATUS_LIST b, \n" .
        "P_YEAR_PERIOD c\n" .
        "where\n" .
        "a.PERIOD_STATUS_ID=b.P_STATUS_LIST_ID\n" .
        "and a.P_YEAR_PERIOD_ID=c.P_YEAR_PERIOD_ID\n" .
        "and a.P_FINANCE_PERIOD_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @31-5C81EAB9
    function SetValues()
    {
        $this->FINANCE_PERIOD_CODE->SetDBValue($this->f("FINANCE_PERIOD_CODE"));
        $this->START_DATE->SetDBValue(trim($this->f("START_DATE")));
        $this->END_DATE->SetDBValue(trim($this->f("END_DATE")));
        $this->PERIOD_STATUS_ID->SetDBValue(trim($this->f("PERIOD_STATUS_ID")));
        $this->P_YEAR_PERIOD_ID->SetDBValue(trim($this->f("P_YEAR_PERIOD_ID")));
        $this->REF_NO->SetDBValue($this->f("REF_NO"));
        $this->REF_DATE->SetDBValue(trim($this->f("REF_DATE")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->UPDATED_BY->SetDBValue($this->f("UPDATED_BY"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->UPDATED_DATE->SetDBValue(trim($this->f("UPDATED_DATE")));
        $this->P_FINANCE_PERIOD_ID->SetDBValue(trim($this->f("P_FINANCE_PERIOD_ID")));
        $this->PERIOD_STATUS_NAME->SetDBValue($this->f("PERIOD_STATUS_NAME"));
        $this->P_YEAR_PERIOD_NAME->SetDBValue($this->f("P_YEAR_PERIOD_NAME"));
    }
//End SetValues Method

//Insert Method @31-2308336F
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["FINANCE_PERIOD_CODE"] = new clsSQLParameter("ctrlFINANCE_PERIOD_CODE", ccsText, "", "", $this->FINANCE_PERIOD_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["START_DATE"] = new clsSQLParameter("ctrlSTART_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->START_DATE->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["END_DATE"] = new clsSQLParameter("ctrlEND_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->END_DATE->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["PERIOD_STATUS_ID"] = new clsSQLParameter("ctrlPERIOD_STATUS_ID", ccsFloat, "", "", $this->PERIOD_STATUS_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_YEAR_PERIOD_ID"] = new clsSQLParameter("ctrlP_YEAR_PERIOD_ID", ccsFloat, "", "", $this->P_YEAR_PERIOD_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["REF_NO"] = new clsSQLParameter("ctrlREF_NO", ccsText, "", "", $this->REF_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["REF_DATE"] = new clsSQLParameter("ctrlREF_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->REF_DATE->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("ctrlCREATED_BY", ccsText, "", "", $this->CREATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["FINANCE_PERIOD_CODE"]->GetValue()) and !strlen($this->cp["FINANCE_PERIOD_CODE"]->GetText()) and !is_bool($this->cp["FINANCE_PERIOD_CODE"]->GetValue())) 
            $this->cp["FINANCE_PERIOD_CODE"]->SetValue($this->FINANCE_PERIOD_CODE->GetValue(true));
        if (!is_null($this->cp["START_DATE"]->GetValue()) and !strlen($this->cp["START_DATE"]->GetText()) and !is_bool($this->cp["START_DATE"]->GetValue())) 
            $this->cp["START_DATE"]->SetValue($this->START_DATE->GetValue(true));
        if (!strlen($this->cp["START_DATE"]->GetText()) and !is_bool($this->cp["START_DATE"]->GetValue(true))) 
            $this->cp["START_DATE"]->SetText(00-00-0000);
        if (!is_null($this->cp["END_DATE"]->GetValue()) and !strlen($this->cp["END_DATE"]->GetText()) and !is_bool($this->cp["END_DATE"]->GetValue())) 
            $this->cp["END_DATE"]->SetValue($this->END_DATE->GetValue(true));
        if (!strlen($this->cp["END_DATE"]->GetText()) and !is_bool($this->cp["END_DATE"]->GetValue(true))) 
            $this->cp["END_DATE"]->SetText(00-00-0000);
        if (!is_null($this->cp["PERIOD_STATUS_ID"]->GetValue()) and !strlen($this->cp["PERIOD_STATUS_ID"]->GetText()) and !is_bool($this->cp["PERIOD_STATUS_ID"]->GetValue())) 
            $this->cp["PERIOD_STATUS_ID"]->SetValue($this->PERIOD_STATUS_ID->GetValue(true));
        if (!strlen($this->cp["PERIOD_STATUS_ID"]->GetText()) and !is_bool($this->cp["PERIOD_STATUS_ID"]->GetValue(true))) 
            $this->cp["PERIOD_STATUS_ID"]->SetText(0);
        if (!is_null($this->cp["P_YEAR_PERIOD_ID"]->GetValue()) and !strlen($this->cp["P_YEAR_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_YEAR_PERIOD_ID"]->GetValue())) 
            $this->cp["P_YEAR_PERIOD_ID"]->SetValue($this->P_YEAR_PERIOD_ID->GetValue(true));
        if (!strlen($this->cp["P_YEAR_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_YEAR_PERIOD_ID"]->GetValue(true))) 
            $this->cp["P_YEAR_PERIOD_ID"]->SetText(0);
        if (!is_null($this->cp["REF_NO"]->GetValue()) and !strlen($this->cp["REF_NO"]->GetText()) and !is_bool($this->cp["REF_NO"]->GetValue())) 
            $this->cp["REF_NO"]->SetValue($this->REF_NO->GetValue(true));
        if (!is_null($this->cp["REF_DATE"]->GetValue()) and !strlen($this->cp["REF_DATE"]->GetText()) and !is_bool($this->cp["REF_DATE"]->GetValue())) 
            $this->cp["REF_DATE"]->SetValue($this->REF_DATE->GetValue(true));
        if (!strlen($this->cp["REF_DATE"]->GetText()) and !is_bool($this->cp["REF_DATE"]->GetValue(true))) 
            $this->cp["REF_DATE"]->SetText(00-00-0000);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue($this->CREATED_BY->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_FINANCE_PERIOD(P_FINANCE_PERIOD_ID, FINANCE_PERIOD_CODE, START_DATE, END_DATE, PERIOD_STATUS_ID, P_YEAR_PERIOD_ID, REF_NO, REF_DATE, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)\n" .
        "VALUES\n" .
        "(GENERATE_ID('TRB','P_FINANCE_PERIOD','P_FINANCE_PERIOD_ID'),'" . $this->SQLValue($this->cp["FINANCE_PERIOD_CODE"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["START_DATE"]->GetDBValue(), ccsDate) . "','" . $this->SQLValue($this->cp["END_DATE"]->GetDBValue(), ccsDate) . "'," . $this->SQLValue($this->cp["PERIOD_STATUS_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_YEAR_PERIOD_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["REF_NO"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["REF_DATE"]->GetDBValue(), ccsDate) . "','" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @31-C7E5B152
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["FINANCE_PERIOD_CODE"] = new clsSQLParameter("ctrlFINANCE_PERIOD_CODE", ccsText, "", "", $this->FINANCE_PERIOD_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["START_DATE"] = new clsSQLParameter("ctrlSTART_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->START_DATE->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["END_DATE"] = new clsSQLParameter("ctrlEND_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->END_DATE->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["PERIOD_STATUS_ID"] = new clsSQLParameter("ctrlPERIOD_STATUS_ID", ccsFloat, "", "", $this->PERIOD_STATUS_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_YEAR_PERIOD_ID"] = new clsSQLParameter("ctrlP_YEAR_PERIOD_ID", ccsFloat, "", "", $this->P_YEAR_PERIOD_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["REF_NO"] = new clsSQLParameter("ctrlREF_NO", ccsText, "", "", $this->REF_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["REF_DATE"] = new clsSQLParameter("ctrlREF_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->REF_DATE->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_FINANCE_PERIOD_ID"] = new clsSQLParameter("ctrlP_FINANCE_PERIOD_ID", ccsFloat, "", "", $this->P_FINANCE_PERIOD_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["FINANCE_PERIOD_CODE"]->GetValue()) and !strlen($this->cp["FINANCE_PERIOD_CODE"]->GetText()) and !is_bool($this->cp["FINANCE_PERIOD_CODE"]->GetValue())) 
            $this->cp["FINANCE_PERIOD_CODE"]->SetValue($this->FINANCE_PERIOD_CODE->GetValue(true));
        if (!is_null($this->cp["START_DATE"]->GetValue()) and !strlen($this->cp["START_DATE"]->GetText()) and !is_bool($this->cp["START_DATE"]->GetValue())) 
            $this->cp["START_DATE"]->SetValue($this->START_DATE->GetValue(true));
        if (!strlen($this->cp["START_DATE"]->GetText()) and !is_bool($this->cp["START_DATE"]->GetValue(true))) 
            $this->cp["START_DATE"]->SetText(00-00-0000);
        if (!is_null($this->cp["END_DATE"]->GetValue()) and !strlen($this->cp["END_DATE"]->GetText()) and !is_bool($this->cp["END_DATE"]->GetValue())) 
            $this->cp["END_DATE"]->SetValue($this->END_DATE->GetValue(true));
        if (!strlen($this->cp["END_DATE"]->GetText()) and !is_bool($this->cp["END_DATE"]->GetValue(true))) 
            $this->cp["END_DATE"]->SetText(00-00-0000);
        if (!is_null($this->cp["PERIOD_STATUS_ID"]->GetValue()) and !strlen($this->cp["PERIOD_STATUS_ID"]->GetText()) and !is_bool($this->cp["PERIOD_STATUS_ID"]->GetValue())) 
            $this->cp["PERIOD_STATUS_ID"]->SetValue($this->PERIOD_STATUS_ID->GetValue(true));
        if (!strlen($this->cp["PERIOD_STATUS_ID"]->GetText()) and !is_bool($this->cp["PERIOD_STATUS_ID"]->GetValue(true))) 
            $this->cp["PERIOD_STATUS_ID"]->SetText(0);
        if (!is_null($this->cp["P_YEAR_PERIOD_ID"]->GetValue()) and !strlen($this->cp["P_YEAR_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_YEAR_PERIOD_ID"]->GetValue())) 
            $this->cp["P_YEAR_PERIOD_ID"]->SetValue($this->P_YEAR_PERIOD_ID->GetValue(true));
        if (!strlen($this->cp["P_YEAR_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_YEAR_PERIOD_ID"]->GetValue(true))) 
            $this->cp["P_YEAR_PERIOD_ID"]->SetText(0);
        if (!is_null($this->cp["REF_NO"]->GetValue()) and !strlen($this->cp["REF_NO"]->GetText()) and !is_bool($this->cp["REF_NO"]->GetValue())) 
            $this->cp["REF_NO"]->SetValue($this->REF_NO->GetValue(true));
        if (!is_null($this->cp["REF_DATE"]->GetValue()) and !strlen($this->cp["REF_DATE"]->GetText()) and !is_bool($this->cp["REF_DATE"]->GetValue())) 
            $this->cp["REF_DATE"]->SetValue($this->REF_DATE->GetValue(true));
        if (!strlen($this->cp["REF_DATE"]->GetText()) and !is_bool($this->cp["REF_DATE"]->GetValue(true))) 
            $this->cp["REF_DATE"]->SetText(00-00-0000);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        if (!is_null($this->cp["P_FINANCE_PERIOD_ID"]->GetValue()) and !strlen($this->cp["P_FINANCE_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_FINANCE_PERIOD_ID"]->GetValue())) 
            $this->cp["P_FINANCE_PERIOD_ID"]->SetValue($this->P_FINANCE_PERIOD_ID->GetValue(true));
        if (!strlen($this->cp["P_FINANCE_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_FINANCE_PERIOD_ID"]->GetValue(true))) 
            $this->cp["P_FINANCE_PERIOD_ID"]->SetText(0);
        $this->SQL = "UPDATE P_FINANCE_PERIOD SET \n" .
        "FINANCE_PERIOD_CODE='" . $this->SQLValue($this->cp["FINANCE_PERIOD_CODE"]->GetDBValue(), ccsText) . "',\n" .
        "START_DATE='" . $this->SQLValue($this->cp["START_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "END_DATE='" . $this->SQLValue($this->cp["END_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "PERIOD_STATUS_ID=" . $this->SQLValue($this->cp["PERIOD_STATUS_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "P_YEAR_PERIOD_ID=" . $this->SQLValue($this->cp["P_YEAR_PERIOD_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "REF_NO='" . $this->SQLValue($this->cp["REF_NO"]->GetDBValue(), ccsText) . "',\n" .
        "REF_DATE='" . $this->SQLValue($this->cp["REF_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATED_DATE=sysdate,\n" .
        "UPDATED_BY='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "' \n" .
        "WHERE  P_FINANCE_PERIOD_ID = " . $this->SQLValue($this->cp["P_FINANCE_PERIOD_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @31-69C2C222
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_FINANCE_PERIOD_ID"] = new clsSQLParameter("ctrlP_FINANCE_PERIOD_ID", ccsFloat, "", "", $this->P_FINANCE_PERIOD_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_FINANCE_PERIOD_ID"]->GetValue()) and !strlen($this->cp["P_FINANCE_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_FINANCE_PERIOD_ID"]->GetValue())) 
            $this->cp["P_FINANCE_PERIOD_ID"]->SetValue($this->P_FINANCE_PERIOD_ID->GetValue(true));
        if (!strlen($this->cp["P_FINANCE_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_FINANCE_PERIOD_ID"]->GetValue(true))) 
            $this->cp["P_FINANCE_PERIOD_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_FINANCE_PERIOD WHERE P_FINANCE_PERIOD_ID = " . $this->SQLValue($this->cp["P_FINANCE_PERIOD_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_finance_period1DataSource Class @31-FCB6E20C

//Initialize Page @1-B9C294A0
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
$TemplateFileName = "p_finance_period.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-E57B73C6
include_once("./p_finance_period_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-365FC7A2
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_FINANCE_PERIOD = & new clsGridP_FINANCE_PERIOD("", $MainPage);
$P_FINANCE_PERIODSearch = & new clsRecordP_FINANCE_PERIODSearch("", $MainPage);
$p_finance_period1 = & new clsRecordp_finance_period1("", $MainPage);
$MainPage->P_FINANCE_PERIOD = & $P_FINANCE_PERIOD;
$MainPage->P_FINANCE_PERIODSearch = & $P_FINANCE_PERIODSearch;
$MainPage->p_finance_period1 = & $p_finance_period1;
$P_FINANCE_PERIOD->Initialize();
$p_finance_period1->Initialize();

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

//Execute Components @1-032A69E0
$P_FINANCE_PERIODSearch->Operation();
$p_finance_period1->Operation();
//End Execute Components

//Go to destination page @1-0FEB5B29
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_FINANCE_PERIOD);
    unset($P_FINANCE_PERIODSearch);
    unset($p_finance_period1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-C6E8B09A
$P_FINANCE_PERIOD->Show();
$P_FINANCE_PERIODSearch->Show();
$p_finance_period1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-28D60655
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_FINANCE_PERIOD);
unset($P_FINANCE_PERIODSearch);
unset($p_finance_period1);
unset($Tpl);
//End Unload Page


?>
