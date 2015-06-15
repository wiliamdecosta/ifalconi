<?php
//Include Common Files @1-D5577936
define("RelativePath", "..");
define("PathToCurrentPage", "/param/");
define("FileName", "p_global_param.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_GLOBAL_PARAM { //P_GLOBAL_PARAM class @2-957963C5

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

//Class_Initialize Event @2-DE852EC4
    function clsGridP_GLOBAL_PARAM($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_GLOBAL_PARAM";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_GLOBAL_PARAM";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_GLOBAL_PARAMDataSource($this);
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

        $this->CODE = & new clsControl(ccsLabel, "CODE", "CODE", ccsText, "", CCGetRequestParam("CODE", ccsGet, NULL), $this);
        $this->VALUE = & new clsControl(ccsLabel, "VALUE", "VALUE", ccsText, "", CCGetRequestParam("VALUE", ccsGet, NULL), $this);
        $this->TYPE_1 = & new clsControl(ccsLabel, "TYPE_1", "TYPE_1", ccsText, "", CCGetRequestParam("TYPE_1", ccsGet, NULL), $this);
        $this->IS_RANGE = & new clsControl(ccsLabel, "IS_RANGE", "IS_RANGE", ccsText, "", CCGetRequestParam("IS_RANGE", ccsGet, NULL), $this);
        $this->VALUE_2 = & new clsControl(ccsLabel, "VALUE_2", "VALUE_2", ccsText, "", CCGetRequestParam("VALUE_2", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_global_param.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_global_param.php";
        $this->P_GLOBAL_PARAM_ID = & new clsControl(ccsHidden, "P_GLOBAL_PARAM_ID", "P_GLOBAL_PARAM_ID", ccsFloat, "", CCGetRequestParam("P_GLOBAL_PARAM_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_GLOBAL_PARAM_Insert = & new clsControl(ccsLink, "P_GLOBAL_PARAM_Insert", "P_GLOBAL_PARAM_Insert", ccsText, "", CCGetRequestParam("P_GLOBAL_PARAM_Insert", ccsGet, NULL), $this);
        $this->P_GLOBAL_PARAM_Insert->Page = "p_global_param.php";
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

//Show Method @2-6611F473
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
            $this->ControlsVisible["VALUE"] = $this->VALUE->Visible;
            $this->ControlsVisible["TYPE_1"] = $this->TYPE_1->Visible;
            $this->ControlsVisible["IS_RANGE"] = $this->IS_RANGE->Visible;
            $this->ControlsVisible["VALUE_2"] = $this->VALUE_2->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_GLOBAL_PARAM_ID"] = $this->P_GLOBAL_PARAM_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->VALUE->SetValue($this->DataSource->VALUE->GetValue());
                $this->TYPE_1->SetValue($this->DataSource->TYPE_1->GetValue());
                $this->IS_RANGE->SetValue($this->DataSource->IS_RANGE->GetValue());
                $this->VALUE_2->SetValue($this->DataSource->VALUE_2->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_GLOBAL_PARAM_ID", $this->DataSource->f("P_GLOBAL_PARAM_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_GLOBAL_PARAM_ID", $this->DataSource->f("P_GLOBAL_PARAM_ID"));
                $this->P_GLOBAL_PARAM_ID->SetValue($this->DataSource->P_GLOBAL_PARAM_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->VALUE->Show();
                $this->TYPE_1->Show();
                $this->IS_RANGE->Show();
                $this->VALUE_2->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_GLOBAL_PARAM_ID->Show();
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
        $this->P_GLOBAL_PARAM_Insert->Parameters = CCGetQueryString("QueryString", array("P_GLOBAL_PARAM_ID", "ccsForm"));
        $this->P_GLOBAL_PARAM_Insert->Parameters = CCAddParam($this->P_GLOBAL_PARAM_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_GLOBAL_PARAM_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-D247F125
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALUE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TYPE_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IS_RANGE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALUE_2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_GLOBAL_PARAM_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_GLOBAL_PARAM Class @2-FCB6E20C

class clsP_GLOBAL_PARAMDataSource extends clsDBConn {  //P_GLOBAL_PARAMDataSource Class @2-1586BD2F

//DataSource Variables @2-9FB6E2BE
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $VALUE;
    var $TYPE_1;
    var $IS_RANGE;
    var $VALUE_2;
    var $DLink;
    var $ADLink;
    var $P_GLOBAL_PARAM_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-3451D3AD
    function clsP_GLOBAL_PARAMDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_GLOBAL_PARAM";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->VALUE = new clsField("VALUE", ccsText, "");
        
        $this->TYPE_1 = new clsField("TYPE_1", ccsText, "");
        
        $this->IS_RANGE = new clsField("IS_RANGE", ccsText, "");
        
        $this->VALUE_2 = new clsField("VALUE_2", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_GLOBAL_PARAM_ID = new clsField("P_GLOBAL_PARAM_ID", ccsFloat, "");
        

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

//Open Method @2-E08766A2
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select * from p_global_param\n" .
        "where upper(code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) cnt";
        $this->SQL = "select * from p_global_param\n" .
        "where upper(code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')";
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

//SetValues Method @2-FFB6A58D
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->VALUE->SetDBValue($this->f("VALUE"));
        $this->TYPE_1->SetDBValue($this->f("TYPE_1"));
        $this->IS_RANGE->SetDBValue($this->f("IS_RANGE"));
        $this->VALUE_2->SetDBValue($this->f("VALUE_2"));
        $this->DLink->SetDBValue($this->f("P_GLOBAL_PARAM_ID"));
        $this->ADLink->SetDBValue($this->f("P_GLOBAL_PARAM_ID"));
        $this->P_GLOBAL_PARAM_ID->SetDBValue(trim($this->f("P_GLOBAL_PARAM_ID")));
    }
//End SetValues Method

} //End P_GLOBAL_PARAMDataSource Class @2-FCB6E20C

class clsRecordP_GLOBAL_PARAMSearch { //P_GLOBAL_PARAMSearch Class @3-086D2E51

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

//Class_Initialize Event @3-4435F662
    function clsRecordP_GLOBAL_PARAMSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_GLOBAL_PARAMSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_GLOBAL_PARAMSearch";
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

//Operation Method @3-B3B230A3
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
        $Redirect = "p_global_param.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_global_param.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End P_GLOBAL_PARAMSearch Class @3-FCB6E20C

class clsRecordp_global_param1 { //p_global_param1 Class @28-F83827EB

//Variables @28-D6FF3E86

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

//Class_Initialize Event @28-97AA941C
    function clsRecordp_global_param1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_global_param1/Error";
        $this->DataSource = new clsp_global_param1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_global_param1";
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
            $this->VALUE = & new clsControl(ccsTextBox, "VALUE", "VALUE", ccsText, "", CCGetRequestParam("VALUE", $Method, NULL), $this);
            $this->VALUE->Required = true;
            $this->TYPE_1 = & new clsControl(ccsTextBox, "TYPE_1", "TYPE 1", ccsText, "", CCGetRequestParam("TYPE_1", $Method, NULL), $this);
            $this->IS_RANGE = & new clsControl(ccsTextBox, "IS_RANGE", "IS RANGE", ccsText, "", CCGetRequestParam("IS_RANGE", $Method, NULL), $this);
            $this->VALUE_2 = & new clsControl(ccsTextBox, "VALUE_2", "VALUE 2", ccsText, "", CCGetRequestParam("VALUE_2", $Method, NULL), $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->CREATED_BY = & new clsControl(ccsTextBox, "CREATED_BY", "CREATED BY", ccsText, "", CCGetRequestParam("CREATED_BY", $Method, NULL), $this);
            $this->CREATED_BY->Required = true;
            $this->UPDATED_BY = & new clsControl(ccsTextBox, "UPDATED_BY", "UPDATED BY", ccsText, "", CCGetRequestParam("UPDATED_BY", $Method, NULL), $this);
            $this->UPDATED_BY->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->CREATION_DATE = & new clsControl(ccsTextBox, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", $Method, NULL), $this);
            $this->CREATION_DATE->Required = true;
            $this->UPDATED_DATE = & new clsControl(ccsTextBox, "UPDATED_DATE", "UPDATED DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATED_DATE", $Method, NULL), $this);
            $this->UPDATED_DATE->Required = true;
            $this->P_GLOBAL_PARAM_ID = & new clsControl(ccsHidden, "P_GLOBAL_PARAM_ID", "CODE", ccsFloat, "", CCGetRequestParam("P_GLOBAL_PARAM_ID", $Method, NULL), $this);
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

//Initialize Method @28-9AA0543A
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_GLOBAL_PARAM_ID"] = CCGetFromGet("P_GLOBAL_PARAM_ID", NULL);
    }
//End Initialize Method

//Validate Method @28-9FAD65A7
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->VALUE->Validate() && $Validation);
        $Validation = ($this->TYPE_1->Validate() && $Validation);
        $Validation = ($this->IS_RANGE->Validate() && $Validation);
        $Validation = ($this->VALUE_2->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->CREATED_BY->Validate() && $Validation);
        $Validation = ($this->UPDATED_BY->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATED_DATE->Validate() && $Validation);
        $Validation = ($this->P_GLOBAL_PARAM_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALUE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TYPE_1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_RANGE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALUE_2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_GLOBAL_PARAM_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @28-87E1F6BB
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->VALUE->Errors->Count());
        $errors = ($errors || $this->TYPE_1->Errors->Count());
        $errors = ($errors || $this->IS_RANGE->Errors->Count());
        $errors = ($errors || $this->VALUE_2->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->CREATED_BY->Errors->Count());
        $errors = ($errors || $this->UPDATED_BY->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATED_DATE->Errors->Count());
        $errors = ($errors || $this->P_GLOBAL_PARAM_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @28-ED598703
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

//Operation Method @28-872C026F
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

//InsertRow Method @28-95FC0A86
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->VALUE->SetValue($this->VALUE->GetValue(true));
        $this->DataSource->TYPE_1->SetValue($this->TYPE_1->GetValue(true));
        $this->DataSource->IS_RANGE->SetValue($this->IS_RANGE->GetValue(true));
        $this->DataSource->VALUE_2->SetValue($this->VALUE_2->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CREATED_BY->SetValue($this->CREATED_BY->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @28-2645B1C3
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->VALUE->SetValue($this->VALUE->GetValue(true));
        $this->DataSource->TYPE_1->SetValue($this->TYPE_1->GetValue(true));
        $this->DataSource->IS_RANGE->SetValue($this->IS_RANGE->GetValue(true));
        $this->DataSource->VALUE_2->SetValue($this->VALUE_2->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->P_GLOBAL_PARAM_ID->SetValue($this->P_GLOBAL_PARAM_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @28-ED3A06B6
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_GLOBAL_PARAM_ID->SetValue($this->P_GLOBAL_PARAM_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @28-B3C14D19
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
                    $this->VALUE->SetValue($this->DataSource->VALUE->GetValue());
                    $this->TYPE_1->SetValue($this->DataSource->TYPE_1->GetValue());
                    $this->IS_RANGE->SetValue($this->DataSource->IS_RANGE->GetValue());
                    $this->VALUE_2->SetValue($this->DataSource->VALUE_2->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->UPDATED_BY->SetValue($this->DataSource->UPDATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATED_DATE->SetValue($this->DataSource->UPDATED_DATE->GetValue());
                    $this->P_GLOBAL_PARAM_ID->SetValue($this->DataSource->P_GLOBAL_PARAM_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALUE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TYPE_1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_RANGE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALUE_2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_GLOBAL_PARAM_ID->Errors->ToString());
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
        $this->VALUE->Show();
        $this->TYPE_1->Show();
        $this->IS_RANGE->Show();
        $this->VALUE_2->Show();
        $this->DESCRIPTION->Show();
        $this->CREATED_BY->Show();
        $this->UPDATED_BY->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->CREATION_DATE->Show();
        $this->UPDATED_DATE->Show();
        $this->P_GLOBAL_PARAM_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_global_param1 Class @28-FCB6E20C

class clsp_global_param1DataSource extends clsDBConn {  //p_global_param1DataSource Class @28-0E07CE8B

//DataSource Variables @28-2FD744F9
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
    var $VALUE;
    var $TYPE_1;
    var $IS_RANGE;
    var $VALUE_2;
    var $DESCRIPTION;
    var $CREATED_BY;
    var $UPDATED_BY;
    var $CREATION_DATE;
    var $UPDATED_DATE;
    var $P_GLOBAL_PARAM_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @28-EF016013
    function clsp_global_param1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_global_param1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->VALUE = new clsField("VALUE", ccsText, "");
        
        $this->TYPE_1 = new clsField("TYPE_1", ccsText, "");
        
        $this->IS_RANGE = new clsField("IS_RANGE", ccsText, "");
        
        $this->VALUE_2 = new clsField("VALUE_2", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->UPDATED_BY = new clsField("UPDATED_BY", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATED_DATE = new clsField("UPDATED_DATE", ccsDate, $this->DateFormat);
        
        $this->P_GLOBAL_PARAM_ID = new clsField("P_GLOBAL_PARAM_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @28-3A0B12C9
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_GLOBAL_PARAM_ID", ccsFloat, "", "", $this->Parameters["urlP_GLOBAL_PARAM_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_GLOBAL_PARAM_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @28-C9610B27
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM p_global_param {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @28-D61830DA
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->VALUE->SetDBValue($this->f("VALUE"));
        $this->TYPE_1->SetDBValue($this->f("TYPE_1"));
        $this->IS_RANGE->SetDBValue($this->f("IS_RANGE"));
        $this->VALUE_2->SetDBValue($this->f("VALUE_2"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->UPDATED_BY->SetDBValue($this->f("UPDATED_BY"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->UPDATED_DATE->SetDBValue(trim($this->f("UPDATED_DATE")));
        $this->P_GLOBAL_PARAM_ID->SetDBValue(trim($this->f("P_GLOBAL_PARAM_ID")));
    }
//End SetValues Method

//Insert Method @28-69D233D3
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALUE"] = new clsSQLParameter("ctrlVALUE", ccsText, "", "", $this->VALUE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["TYPE_1"] = new clsSQLParameter("ctrlTYPE_1", ccsText, "", "", $this->TYPE_1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_RANGE"] = new clsSQLParameter("ctrlIS_RANGE", ccsText, "", "", $this->IS_RANGE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALUE_2"] = new clsSQLParameter("ctrlVALUE_2", ccsText, "", "", $this->VALUE_2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("ctrlCREATED_BY", ccsText, "", "", $this->CREATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["VALUE"]->GetValue()) and !strlen($this->cp["VALUE"]->GetText()) and !is_bool($this->cp["VALUE"]->GetValue())) 
            $this->cp["VALUE"]->SetValue($this->VALUE->GetValue(true));
        if (!is_null($this->cp["TYPE_1"]->GetValue()) and !strlen($this->cp["TYPE_1"]->GetText()) and !is_bool($this->cp["TYPE_1"]->GetValue())) 
            $this->cp["TYPE_1"]->SetValue($this->TYPE_1->GetValue(true));
        if (!is_null($this->cp["IS_RANGE"]->GetValue()) and !strlen($this->cp["IS_RANGE"]->GetText()) and !is_bool($this->cp["IS_RANGE"]->GetValue())) 
            $this->cp["IS_RANGE"]->SetValue($this->IS_RANGE->GetValue(true));
        if (!is_null($this->cp["VALUE_2"]->GetValue()) and !strlen($this->cp["VALUE_2"]->GetText()) and !is_bool($this->cp["VALUE_2"]->GetValue())) 
            $this->cp["VALUE_2"]->SetValue($this->VALUE_2->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue($this->CREATED_BY->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_GLOBAL_PARAM(P_GLOBAL_PARAM_ID, CODE, VALUE, TYPE_1, IS_RANGE, VALUE_2, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY) \n" .
        "VALUES\n" .
        "(GENERATE_ID('TRB','P_GLOBAL_PARAM','P_GLOBAL_PARAM_ID'),'" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["VALUE"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["TYPE_1"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["IS_RANGE"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["VALUE_2"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "', sysdate, '" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "', sysdate, '" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "') ";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @28-E1B63261
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALUE"] = new clsSQLParameter("ctrlVALUE", ccsText, "", "", $this->VALUE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["TYPE_1"] = new clsSQLParameter("ctrlTYPE_1", ccsText, "", "", $this->TYPE_1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_RANGE"] = new clsSQLParameter("ctrlIS_RANGE", ccsText, "", "", $this->IS_RANGE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALUE_2"] = new clsSQLParameter("ctrlVALUE_2", ccsText, "", "", $this->VALUE_2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_GLOBAL_PARAM_ID"] = new clsSQLParameter("ctrlP_GLOBAL_PARAM_ID", ccsFloat, "", "", $this->P_GLOBAL_PARAM_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["VALUE"]->GetValue()) and !strlen($this->cp["VALUE"]->GetText()) and !is_bool($this->cp["VALUE"]->GetValue())) 
            $this->cp["VALUE"]->SetValue($this->VALUE->GetValue(true));
        if (!is_null($this->cp["TYPE_1"]->GetValue()) and !strlen($this->cp["TYPE_1"]->GetText()) and !is_bool($this->cp["TYPE_1"]->GetValue())) 
            $this->cp["TYPE_1"]->SetValue($this->TYPE_1->GetValue(true));
        if (!is_null($this->cp["IS_RANGE"]->GetValue()) and !strlen($this->cp["IS_RANGE"]->GetText()) and !is_bool($this->cp["IS_RANGE"]->GetValue())) 
            $this->cp["IS_RANGE"]->SetValue($this->IS_RANGE->GetValue(true));
        if (!is_null($this->cp["VALUE_2"]->GetValue()) and !strlen($this->cp["VALUE_2"]->GetText()) and !is_bool($this->cp["VALUE_2"]->GetValue())) 
            $this->cp["VALUE_2"]->SetValue($this->VALUE_2->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        if (!is_null($this->cp["P_GLOBAL_PARAM_ID"]->GetValue()) and !strlen($this->cp["P_GLOBAL_PARAM_ID"]->GetText()) and !is_bool($this->cp["P_GLOBAL_PARAM_ID"]->GetValue())) 
            $this->cp["P_GLOBAL_PARAM_ID"]->SetValue($this->P_GLOBAL_PARAM_ID->GetValue(true));
        if (!strlen($this->cp["P_GLOBAL_PARAM_ID"]->GetText()) and !is_bool($this->cp["P_GLOBAL_PARAM_ID"]->GetValue(true))) 
            $this->cp["P_GLOBAL_PARAM_ID"]->SetText(0);
        $this->SQL = "UPDATE P_GLOBAL_PARAM SET \n" .
        "CODE='" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "',\n" .
        "VALUE='" . $this->SQLValue($this->cp["VALUE"]->GetDBValue(), ccsText) . "',\n" .
        "TYPE_1='" . $this->SQLValue($this->cp["TYPE_1"]->GetDBValue(), ccsText) . "',\n" .
        "IS_RANGE='" . $this->SQLValue($this->cp["IS_RANGE"]->GetDBValue(), ccsText) . "',\n" .
        "VALUE_2='" . $this->SQLValue($this->cp["VALUE_2"]->GetDBValue(), ccsText) . "',\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATED_DATE=sysdate,\n" .
        "UPDATED_BY='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "' \n" .
        "WHERE  P_GLOBAL_PARAM_ID = " . $this->SQLValue($this->cp["P_GLOBAL_PARAM_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @28-67A48885
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_GLOBAL_PARAM_ID"] = new clsSQLParameter("ctrlP_GLOBAL_PARAM_ID", ccsFloat, "", "", $this->P_GLOBAL_PARAM_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_GLOBAL_PARAM_ID"]->GetValue()) and !strlen($this->cp["P_GLOBAL_PARAM_ID"]->GetText()) and !is_bool($this->cp["P_GLOBAL_PARAM_ID"]->GetValue())) 
            $this->cp["P_GLOBAL_PARAM_ID"]->SetValue($this->P_GLOBAL_PARAM_ID->GetValue(true));
        if (!strlen($this->cp["P_GLOBAL_PARAM_ID"]->GetText()) and !is_bool($this->cp["P_GLOBAL_PARAM_ID"]->GetValue(true))) 
            $this->cp["P_GLOBAL_PARAM_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_GLOBAL_PARAM WHERE P_GLOBAL_PARAM_ID = " . $this->SQLValue($this->cp["P_GLOBAL_PARAM_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_global_param1DataSource Class @28-FCB6E20C

//Initialize Page @1-4FD0B410
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
$TemplateFileName = "p_global_param.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-E38AD24B
include_once("./p_global_param_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-7BEEF020
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_GLOBAL_PARAM = & new clsGridP_GLOBAL_PARAM("", $MainPage);
$P_GLOBAL_PARAMSearch = & new clsRecordP_GLOBAL_PARAMSearch("", $MainPage);
$p_global_param1 = & new clsRecordp_global_param1("", $MainPage);
$MainPage->P_GLOBAL_PARAM = & $P_GLOBAL_PARAM;
$MainPage->P_GLOBAL_PARAMSearch = & $P_GLOBAL_PARAMSearch;
$MainPage->p_global_param1 = & $p_global_param1;
$P_GLOBAL_PARAM->Initialize();
$p_global_param1->Initialize();

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

//Execute Components @1-D76DFF82
$P_GLOBAL_PARAMSearch->Operation();
$p_global_param1->Operation();
//End Execute Components

//Go to destination page @1-2776EFA3
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_GLOBAL_PARAM);
    unset($P_GLOBAL_PARAMSearch);
    unset($p_global_param1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-5BBBE93B
$P_GLOBAL_PARAM->Show();
$P_GLOBAL_PARAMSearch->Show();
$p_global_param1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-3B563416
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_GLOBAL_PARAM);
unset($P_GLOBAL_PARAMSearch);
unset($p_global_param1);
unset($Tpl);
//End Unload Page


?>
