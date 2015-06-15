<?php
//Include Common Files @1-A3DB0BF3
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_year_periode.php");
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

//Class_Initialize Event @2-682CB215
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
        $this->START_DATE = & new clsControl(ccsLabel, "START_DATE", "START_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("START_DATE", ccsGet, NULL), $this);
        $this->END_DATE = & new clsControl(ccsLabel, "END_DATE", "END_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("END_DATE", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_year_periode.php";
        $this->P_YEAR_PERIOD_ID = & new clsControl(ccsHidden, "P_YEAR_PERIOD_ID", "P_YEAR_PERIOD_ID", ccsFloat, "", CCGetRequestParam("P_YEAR_PERIOD_ID", ccsGet, NULL), $this);
        $this->P_PERIOD_STATUS_CODE = & new clsControl(ccsLabel, "P_PERIOD_STATUS_CODE", "P_PERIOD_STATUS_CODE", ccsText, "", CCGetRequestParam("P_PERIOD_STATUS_CODE", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_FINANCE_PERIOD_Insert = & new clsControl(ccsLink, "P_FINANCE_PERIOD_Insert", "P_FINANCE_PERIOD_Insert", ccsText, "", CCGetRequestParam("P_FINANCE_PERIOD_Insert", ccsGet, NULL), $this);
        $this->P_FINANCE_PERIOD_Insert->HTML = true;
        $this->P_FINANCE_PERIOD_Insert->Page = "p_year_periode.php";
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

//Show Method @2-0AA85D16
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
            $this->ControlsVisible["CODE"] = $this->CODE->Visible;
            $this->ControlsVisible["START_DATE"] = $this->START_DATE->Visible;
            $this->ControlsVisible["END_DATE"] = $this->END_DATE->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["P_YEAR_PERIOD_ID"] = $this->P_YEAR_PERIOD_ID->Visible;
            $this->ControlsVisible["P_PERIOD_STATUS_CODE"] = $this->P_PERIOD_STATUS_CODE->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->START_DATE->SetValue($this->DataSource->START_DATE->GetValue());
                $this->END_DATE->SetValue($this->DataSource->END_DATE->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_YEAR_PERIOD_ID", $this->DataSource->f("P_YEAR_PERIOD_ID"));
                $this->P_YEAR_PERIOD_ID->SetValue($this->DataSource->P_YEAR_PERIOD_ID->GetValue());
                $this->P_PERIOD_STATUS_CODE->SetValue($this->DataSource->P_PERIOD_STATUS_CODE->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->START_DATE->Show();
                $this->END_DATE->Show();
                $this->DESCRIPTION->Show();
                $this->DLink->Show();
                $this->P_YEAR_PERIOD_ID->Show();
                $this->P_PERIOD_STATUS_CODE->Show();
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
        $this->P_FINANCE_PERIOD_Insert->Parameters = CCAddParam($this->P_FINANCE_PERIOD_Insert->Parameters, "TAMBAH", 1);
        $this->Navigator->Show();
        $this->P_FINANCE_PERIOD_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-8BF1714A
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->START_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->END_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_YEAR_PERIOD_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_PERIOD_STATUS_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_FINANCE_PERIOD Class @2-FCB6E20C

class clsP_FINANCE_PERIODDataSource extends clsDBConn {  //P_FINANCE_PERIODDataSource Class @2-48C2662B

//DataSource Variables @2-265AD337
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $START_DATE;
    var $END_DATE;
    var $DESCRIPTION;
    var $P_YEAR_PERIOD_ID;
    var $P_PERIOD_STATUS_CODE;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-2225B57C
    function clsP_FINANCE_PERIODDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_FINANCE_PERIOD";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->START_DATE = new clsField("START_DATE", ccsDate, $this->DateFormat);
        
        $this->END_DATE = new clsField("END_DATE", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->P_YEAR_PERIOD_ID = new clsField("P_YEAR_PERIOD_ID", ccsFloat, "");
        
        $this->P_PERIOD_STATUS_CODE = new clsField("P_PERIOD_STATUS_CODE", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-8AAB94A2
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "A.CODE";
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

//Open Method @2-4BA27648
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT A.*,B.P_STATUS_TYPE_ID,B.CODE AS P_PERIOD_STATUS_CODE\n" .
        "FROM\n" .
        "P_YEAR_PERIOD A\n" .
        "INNER JOIN P_STATUS_LIST B\n" .
        "ON A.PERIOD_STATUS_ID = B.P_STATUS_LIST_ID\n" .
        "WHERE B.P_STATUS_TYPE_ID = 1 AND\n" .
        "(UPPER(A.CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(B.CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(A.DESCRIPTION) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'))) cnt";
        $this->SQL = "SELECT A.*,B.P_STATUS_TYPE_ID,B.CODE AS P_PERIOD_STATUS_CODE\n" .
        "FROM\n" .
        "P_YEAR_PERIOD A\n" .
        "INNER JOIN P_STATUS_LIST B\n" .
        "ON A.PERIOD_STATUS_ID = B.P_STATUS_LIST_ID\n" .
        "WHERE B.P_STATUS_TYPE_ID = 1 AND\n" .
        "(UPPER(A.CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(B.CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(A.DESCRIPTION) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) {SQL_OrderBy}";
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

//SetValues Method @2-7F1428A4
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->START_DATE->SetDBValue(trim($this->f("START_DATE")));
        $this->END_DATE->SetDBValue(trim($this->f("END_DATE")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->P_YEAR_PERIOD_ID->SetDBValue(trim($this->f("P_YEAR_PERIOD_ID")));
        $this->P_PERIOD_STATUS_CODE->SetDBValue($this->f("P_PERIOD_STATUS_CODE"));
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

//Operation Method @3-7437A358
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
        $Redirect = "p_year_periode.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_year_periode.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y", "FLAG", "p_application_id")));
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

class clsRecordP_FINANCE_PERIOD1 { //P_FINANCE_PERIOD1 Class @25-7D8194E0

//Variables @25-D6FF3E86

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

//Class_Initialize Event @25-50C9E174
    function clsRecordP_FINANCE_PERIOD1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_FINANCE_PERIOD1/Error";
        $this->DataSource = new clsP_FINANCE_PERIOD1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_FINANCE_PERIOD1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->CODE = & new clsControl(ccsTextBox, "CODE", "CODE", ccsText, "", CCGetRequestParam("CODE", $Method, NULL), $this);
            $this->CODE->Required = true;
            $this->START_DATE = & new clsControl(ccsTextBox, "START_DATE", "START DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("START_DATE", $Method, NULL), $this);
            $this->START_DATE->Required = true;
            $this->DatePicker_START_DATE = & new clsDatePicker("DatePicker_START_DATE", "P_FINANCE_PERIOD1", "START_DATE", $this);
            $this->PERIOD_STATUS_ID = & new clsControl(ccsTextBox, "PERIOD_STATUS_ID", "PERIOD STATUS ID", ccsFloat, "", CCGetRequestParam("PERIOD_STATUS_ID", $Method, NULL), $this);
            $this->PERIOD_STATUS_ID->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->END_DATE = & new clsControl(ccsTextBox, "END_DATE", "END DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("END_DATE", $Method, NULL), $this);
            $this->END_DATE->Required = true;
            $this->DatePicker_END_DATE = & new clsDatePicker("DatePicker_END_DATE", "P_FINANCE_PERIOD1", "END_DATE", $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->P_PERIOD_STATUS_CODE = & new clsControl(ccsTextBox, "P_PERIOD_STATUS_CODE", "P_PERIOD_STATUS_CODE", ccsText, "", CCGetRequestParam("P_PERIOD_STATUS_CODE", $Method, NULL), $this);
            $this->P_YEAR_PERIOD_ID = & new clsControl(ccsHidden, "P_YEAR_PERIOD_ID", "P_YEAR_PERIOD_ID", ccsFloat, "", CCGetRequestParam("P_YEAR_PERIOD_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->START_DATE->Value) && !strlen($this->START_DATE->Value) && $this->START_DATE->Value !== false)
                    $this->START_DATE->SetValue(time());
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->END_DATE->Value) && !strlen($this->END_DATE->Value) && $this->END_DATE->Value !== false)
                    $this->END_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @25-5A6A0A2A
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_YEAR_PERIOD_ID"] = CCGetFromGet("P_YEAR_PERIOD_ID", NULL);
    }
//End Initialize Method

//Validate Method @25-3592EFA6
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->START_DATE->Validate() && $Validation);
        $Validation = ($this->PERIOD_STATUS_ID->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->END_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->P_PERIOD_STATUS_CODE->Validate() && $Validation);
        $Validation = ($this->P_YEAR_PERIOD_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->START_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PERIOD_STATUS_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->END_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_PERIOD_STATUS_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_YEAR_PERIOD_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @25-85BF97AA
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->START_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_START_DATE->Errors->Count());
        $errors = ($errors || $this->PERIOD_STATUS_ID->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->END_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_END_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->P_PERIOD_STATUS_CODE->Errors->Count());
        $errors = ($errors || $this->P_YEAR_PERIOD_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @25-ED598703
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

//Operation Method @25-0A846034
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
        if($this->PressedButton == "Button_Update") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
            if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Delete") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "P_YEAR_PERIOD_ID"));
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
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @25-C5D95BC5
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->START_DATE->SetValue($this->START_DATE->GetValue(true));
        $this->DataSource->PERIOD_STATUS_ID->SetValue($this->PERIOD_STATUS_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->END_DATE->SetValue($this->END_DATE->GetValue(true));
        $this->DataSource->P_YEAR_PERIOD_ID->SetValue($this->P_YEAR_PERIOD_ID->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @25-472798F2
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->START_DATE->SetValue($this->START_DATE->GetValue(true));
        $this->DataSource->PERIOD_STATUS_ID->SetValue($this->PERIOD_STATUS_ID->GetValue(true));
        $this->DataSource->P_YEAR_PERIOD_ID->SetValue($this->P_YEAR_PERIOD_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->END_DATE->SetValue($this->END_DATE->GetValue(true));
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @25-210F3010
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_YEAR_PERIOD_ID->SetValue($this->P_YEAR_PERIOD_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @25-18BCE73B
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
                    $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                    $this->START_DATE->SetValue($this->DataSource->START_DATE->GetValue());
                    $this->PERIOD_STATUS_ID->SetValue($this->DataSource->PERIOD_STATUS_ID->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->END_DATE->SetValue($this->DataSource->END_DATE->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->P_PERIOD_STATUS_CODE->SetValue($this->DataSource->P_PERIOD_STATUS_CODE->GetValue());
                    $this->P_YEAR_PERIOD_ID->SetValue($this->DataSource->P_YEAR_PERIOD_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->START_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_START_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PERIOD_STATUS_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->END_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_END_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_PERIOD_STATUS_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_YEAR_PERIOD_ID->Errors->ToString());
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

        $this->CODE->Show();
        $this->START_DATE->Show();
        $this->DatePicker_START_DATE->Show();
        $this->PERIOD_STATUS_ID->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_DATE->Show();
        $this->END_DATE->Show();
        $this->DatePicker_END_DATE->Show();
        $this->UPDATE_BY->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->P_PERIOD_STATUS_CODE->Show();
        $this->P_YEAR_PERIOD_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End P_FINANCE_PERIOD1 Class @25-FCB6E20C

class clsP_FINANCE_PERIOD1DataSource extends clsDBConn {  //P_FINANCE_PERIOD1DataSource Class @25-EA037453

//DataSource Variables @25-87564309
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
    var $START_DATE;
    var $PERIOD_STATUS_ID;
    var $DESCRIPTION;
    var $UPDATE_DATE;
    var $END_DATE;
    var $UPDATE_BY;
    var $P_PERIOD_STATUS_CODE;
    var $P_YEAR_PERIOD_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @25-1E98B7B4
    function clsP_FINANCE_PERIOD1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record P_FINANCE_PERIOD1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->START_DATE = new clsField("START_DATE", ccsDate, $this->DateFormat);
        
        $this->PERIOD_STATUS_ID = new clsField("PERIOD_STATUS_ID", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->END_DATE = new clsField("END_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->P_PERIOD_STATUS_CODE = new clsField("P_PERIOD_STATUS_CODE", ccsText, "");
        
        $this->P_YEAR_PERIOD_ID = new clsField("P_YEAR_PERIOD_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @25-F68746C7
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_YEAR_PERIOD_ID", ccsFloat, "", "", $this->Parameters["urlP_YEAR_PERIOD_ID"], 0, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @25-63F9B761
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT A.*,B.P_STATUS_TYPE_ID,B.CODE AS P_PERIOD_STATUS_CODE\n" .
        "FROM\n" .
        "P_YEAR_PERIOD A\n" .
        "INNER JOIN P_STATUS_LIST B\n" .
        "ON A.PERIOD_STATUS_ID = B.P_STATUS_LIST_ID\n" .
        "WHERE B.P_STATUS_TYPE_ID = 1 AND\n" .
        "P_YEAR_PERIOD_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @25-0FE16EBD
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->START_DATE->SetDBValue(trim($this->f("START_DATE")));
        $this->PERIOD_STATUS_ID->SetDBValue(trim($this->f("PERIOD_STATUS_ID")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->END_DATE->SetDBValue(trim($this->f("END_DATE")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->P_PERIOD_STATUS_CODE->SetDBValue($this->f("P_PERIOD_STATUS_CODE"));
        $this->P_YEAR_PERIOD_ID->SetDBValue(trim($this->f("P_YEAR_PERIOD_ID")));
    }
//End SetValues Method

//Insert Method @25-C422AE2A
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["START_DATE"] = new clsSQLParameter("ctrlSTART_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->START_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PERIOD_STATUS_ID"] = new clsSQLParameter("ctrlPERIOD_STATUS_ID", ccsFloat, "", "", $this->PERIOD_STATUS_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["END_DATE"] = new clsSQLParameter("ctrlEND_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->END_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["P_YEAR_PERIOD_ID"] = new clsSQLParameter("ctrlP_YEAR_PERIOD_ID", ccsFloat, "", "", $this->P_YEAR_PERIOD_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["START_DATE"]->GetValue()) and !strlen($this->cp["START_DATE"]->GetText()) and !is_bool($this->cp["START_DATE"]->GetValue())) 
            $this->cp["START_DATE"]->SetValue($this->START_DATE->GetValue(true));
        if (!is_null($this->cp["PERIOD_STATUS_ID"]->GetValue()) and !strlen($this->cp["PERIOD_STATUS_ID"]->GetText()) and !is_bool($this->cp["PERIOD_STATUS_ID"]->GetValue())) 
            $this->cp["PERIOD_STATUS_ID"]->SetValue($this->PERIOD_STATUS_ID->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["END_DATE"]->GetValue()) and !strlen($this->cp["END_DATE"]->GetText()) and !is_bool($this->cp["END_DATE"]->GetValue())) 
            $this->cp["END_DATE"]->SetValue($this->END_DATE->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["P_YEAR_PERIOD_ID"]->GetValue()) and !strlen($this->cp["P_YEAR_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_YEAR_PERIOD_ID"]->GetValue())) 
            $this->cp["P_YEAR_PERIOD_ID"]->SetValue($this->P_YEAR_PERIOD_ID->GetValue(true));
        $this->SQL = "INSERT INTO P_YEAR_PERIOD(\n" .
        "P_YEAR_PERIOD_ID,\n" .
        "CODE, \n" .
        "START_DATE,\n" .
        "END_DATE, \n" .
        "PERIOD_STATUS_ID, \n" .
        "UPDATE_DATE, \n" .
        "UPDATE_BY, \n" .
        "DESCRIPTION\n" .
        ") \n" .
        "VALUES(\n" .
        "GENERATE_ID('BILLDB','P_YEAR_PERIOD','P_YEAR_PERIOD_ID'),\n" .
        "UPPER(TRIM('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "')), \n" .
        "'" . $this->SQLValue($this->cp["START_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "'" . $this->SQLValue($this->cp["END_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "" . $this->SQLValue($this->cp["PERIOD_STATUS_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "SYSDATE, \n" .
        "'" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "', \n" .
        " INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "'))\n" .
        ")";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @25-182087C2
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["START_DATE"] = new clsSQLParameter("ctrlSTART_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->START_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PERIOD_STATUS_ID"] = new clsSQLParameter("ctrlPERIOD_STATUS_ID", ccsFloat, "", "", $this->PERIOD_STATUS_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_YEAR_PERIOD_ID"] = new clsSQLParameter("ctrlP_YEAR_PERIOD_ID", ccsFloat, "", "", $this->P_YEAR_PERIOD_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["END_DATE"] = new clsSQLParameter("ctrlEND_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->END_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["START_DATE"]->GetValue()) and !strlen($this->cp["START_DATE"]->GetText()) and !is_bool($this->cp["START_DATE"]->GetValue())) 
            $this->cp["START_DATE"]->SetValue($this->START_DATE->GetValue(true));
        if (!is_null($this->cp["PERIOD_STATUS_ID"]->GetValue()) and !strlen($this->cp["PERIOD_STATUS_ID"]->GetText()) and !is_bool($this->cp["PERIOD_STATUS_ID"]->GetValue())) 
            $this->cp["PERIOD_STATUS_ID"]->SetValue($this->PERIOD_STATUS_ID->GetValue(true));
        if (!is_null($this->cp["P_YEAR_PERIOD_ID"]->GetValue()) and !strlen($this->cp["P_YEAR_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_YEAR_PERIOD_ID"]->GetValue())) 
            $this->cp["P_YEAR_PERIOD_ID"]->SetValue($this->P_YEAR_PERIOD_ID->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["END_DATE"]->GetValue()) and !strlen($this->cp["END_DATE"]->GetText()) and !is_bool($this->cp["END_DATE"]->GetValue())) 
            $this->cp["END_DATE"]->SetValue($this->END_DATE->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        $this->SQL = "UPDATE P_YEAR_PERIOD SET \n" .
        "CODE=UPPER(TRIM('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "')),\n" .
        "START_DATE='" . $this->SQLValue($this->cp["START_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "END_DATE='" . $this->SQLValue($this->cp["END_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "PERIOD_STATUS_ID=" . $this->SQLValue($this->cp["PERIOD_STATUS_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')), \n" .
        "UPDATE_DATE=SYSDATE, \n" .
        "UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE\n" .
        "P_YEAR_PERIOD_ID=" . $this->SQLValue($this->cp["P_YEAR_PERIOD_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @25-034A1E27
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_YEAR_PERIOD_ID"] = new clsSQLParameter("ctrlP_YEAR_PERIOD_ID", ccsFloat, "", "", $this->P_YEAR_PERIOD_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_YEAR_PERIOD_ID"]->GetValue()) and !strlen($this->cp["P_YEAR_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_YEAR_PERIOD_ID"]->GetValue())) 
            $this->cp["P_YEAR_PERIOD_ID"]->SetValue($this->P_YEAR_PERIOD_ID->GetValue(true));
        if (!strlen($this->cp["P_YEAR_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_YEAR_PERIOD_ID"]->GetValue(true))) 
            $this->cp["P_YEAR_PERIOD_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_YEAR_PERIOD WHERE P_YEAR_PERIOD_ID = " . $this->SQLValue($this->cp["P_YEAR_PERIOD_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End P_FINANCE_PERIOD1DataSource Class @25-FCB6E20C

//Initialize Page @1-19023C37
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
$TemplateFileName = "p_year_periode.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-212DF115
include_once("./p_year_periode_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-A1136F77
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_FINANCE_PERIOD = & new clsGridP_FINANCE_PERIOD("", $MainPage);
$P_FINANCE_PERIODSearch = & new clsRecordP_FINANCE_PERIODSearch("", $MainPage);
$P_FINANCE_PERIOD1 = & new clsRecordP_FINANCE_PERIOD1("", $MainPage);
$MainPage->P_FINANCE_PERIOD = & $P_FINANCE_PERIOD;
$MainPage->P_FINANCE_PERIODSearch = & $P_FINANCE_PERIODSearch;
$MainPage->P_FINANCE_PERIOD1 = & $P_FINANCE_PERIOD1;
$P_FINANCE_PERIOD->Initialize();
$P_FINANCE_PERIOD1->Initialize();

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

//Execute Components @1-54B2623F
$P_FINANCE_PERIODSearch->Operation();
$P_FINANCE_PERIOD1->Operation();
//End Execute Components

//Go to destination page @1-8A5435BC
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_FINANCE_PERIOD);
    unset($P_FINANCE_PERIODSearch);
    unset($P_FINANCE_PERIOD1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-39F9D6A4
$P_FINANCE_PERIOD->Show();
$P_FINANCE_PERIODSearch->Show();
$P_FINANCE_PERIOD1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-7F4E0D8A
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_FINANCE_PERIOD);
unset($P_FINANCE_PERIODSearch);
unset($P_FINANCE_PERIOD1);
unset($Tpl);
//End Unload Page


?>
