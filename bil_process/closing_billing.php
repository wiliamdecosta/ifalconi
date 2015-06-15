<?php
//Include Common Files @1-E9A56AD0
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_process/");
define("FileName", "closing_billing.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files



class clsRecordBATCHSearch { //BATCHSearch Class @3-B294D957

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

//Class_Initialize Event @3-CC07DCAF
    function clsRecordBATCHSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record BATCHSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "BATCHSearch";
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

//Operation Method @3-FBB68C31
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
        $Redirect = "closing_billing.php" . "?" . CCGetQueryString("All", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "closing_billing.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y", "TAMBAH", "BATCH_CONTROL_ID")), CCGetQueryString("QueryString", array("s_keyword", "ccsForm", "TAMBAH", "BATCH_CONTROL_ID")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-1D416E0E
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
        if($this->FormSubmitted || CCGetFromGet("ccsForm")) {
            $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        } else {
            $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("All", ""), "ccsForm", $CCSForm);
        }
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

} //End BATCHSearch Class @3-FCB6E20C

class clsRecordBATCH1 { //BATCH1 Class @19-1A4B4429

//Variables @19-D6FF3E86

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

//Class_Initialize Event @19-4CF14AFE
    function clsRecordBATCH1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record BATCH1/Error";
        $this->DataSource = new clsBATCH1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "BATCH1";
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
            $this->CLOSING_DATE = & new clsControl(ccsTextBox, "CLOSING_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CLOSING_DATE", $Method, NULL), $this);
            $this->INVOICE_DATE = & new clsControl(ccsTextBox, "INVOICE_DATE", "Direktori File", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("INVOICE_DATE", $Method, NULL), $this);
            $this->P_FINANCE_PERIOD_ID = & new clsControl(ccsHidden, "P_FINANCE_PERIOD_ID", "P_FINANCE_PERIOD_ID", ccsFloat, "", CCGetRequestParam("P_FINANCE_PERIOD_ID", $Method, NULL), $this);
            $this->FINANCE_PERIOD_CODE = & new clsControl(ccsTextBox, "FINANCE_PERIOD_CODE", "FINANCE_PERIOD_CODE", ccsText, "", CCGetRequestParam("FINANCE_PERIOD_CODE", $Method, NULL), $this);
            $this->P_BATCH_TYPE_ID = & new clsControl(ccsListBox, "P_BATCH_TYPE_ID", "P_BATCH_TYPE_ID", ccsText, "", CCGetRequestParam("P_BATCH_TYPE_ID", $Method, NULL), $this);
            $this->P_BATCH_TYPE_ID->DSType = dsSQL;
            $this->P_BATCH_TYPE_ID->DataSource = new clsDBConn();
            $this->P_BATCH_TYPE_ID->ds = & $this->P_BATCH_TYPE_ID->DataSource;
            list($this->P_BATCH_TYPE_ID->BoundColumn, $this->P_BATCH_TYPE_ID->TextColumn, $this->P_BATCH_TYPE_ID->DBFormat) = array("P_REFERENCE_LIST_ID", "CODE", "");
            $this->P_BATCH_TYPE_ID->DataSource->SQL = "select * from v_bill_creation_data_class";
            $this->P_BATCH_TYPE_ID->DataSource->Order = "";
            $this->P_BATCH_TYPE_ID->Required = true;
            $this->BILLING_CENTER_ID = & new clsControl(ccsHidden, "BILLING_CENTER_ID", "BILLING_CENTER_ID", ccsFloat, "", CCGetRequestParam("BILLING_CENTER_ID", $Method, NULL), $this);
            $this->OPERATOR_ID = & new clsControl(ccsTextBox, "OPERATOR_ID", "CREATED BY", ccsText, "", CCGetRequestParam("OPERATOR_ID", $Method, NULL), $this);
            $this->OPERATOR_ID->Required = true;
            $this->CREATION_DATE = & new clsControl(ccsTextBox, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", $Method, NULL), $this);
            $this->CREATION_DATE->Required = true;
            $this->CLOSED_BY = & new clsControl(ccsTextBox, "CLOSED_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("CLOSED_BY", $Method, NULL), $this);
            $this->INPUT_FILE_NAME = & new clsControl(ccsHidden, "INPUT_FILE_NAME", "INPUT_FILE_NAME", ccsText, "", CCGetRequestParam("INPUT_FILE_NAME", $Method, NULL), $this);
            $this->INPUT_FILE_NAME->Required = true;
            $this->INPUT_DATA_CONTROL_ID = & new clsControl(ccsHidden, "INPUT_DATA_CONTROL_ID", "INPUT_DATA_CONTROL_ID", ccsText, "", CCGetRequestParam("INPUT_DATA_CONTROL_ID", $Method, NULL), $this);
            $this->BILL_STATUS = & new clsControl(ccsTextBox, "BILL_STATUS", "BILL_STATUS", ccsText, "", CCGetRequestParam("BILL_STATUS", $Method, NULL), $this);
            $this->BILL_AMT = & new clsControl(ccsTextBox, "BILL_AMT", "BILL_AMT", ccsText, "", CCGetRequestParam("BILL_AMT", $Method, NULL), $this);
            $this->DATA_STATUS_ID = & new clsControl(ccsHidden, "DATA_STATUS_ID", "DATA_STATUS_ID", ccsText, "", CCGetRequestParam("DATA_STATUS_ID", $Method, NULL), $this);
            $this->FILE_DIRECTORY = & new clsControl(ccsHidden, "FILE_DIRECTORY", "FILE_DIRECTORY", ccsText, "", CCGetRequestParam("FILE_DIRECTORY", $Method, NULL), $this);
            $this->P_BILL_CYCLE_ID = & new clsControl(ccsHidden, "P_BILL_CYCLE_ID", "P_BILL_CYCLE_ID", ccsText, "", CCGetRequestParam("P_BILL_CYCLE_ID", $Method, NULL), $this);
            $this->IS_FINISH_PROCESSED = & new clsControl(ccsHidden, "IS_FINISH_PROCESSED", "IS_FINISH_PROCESSED", ccsText, "", CCGetRequestParam("IS_FINISH_PROCESSED", $Method, NULL), $this);
            $this->FILE_DATE = & new clsControl(ccsHidden, "FILE_DATE", "FILE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("FILE_DATE", $Method, NULL), $this);
            $this->FILE_SIZE = & new clsControl(ccsHidden, "FILE_SIZE", "FILE_SIZE", ccsFloat, "", CCGetRequestParam("FILE_SIZE", $Method, NULL), $this);
            $this->IS_CLOSED = & new clsControl(ccsHidden, "IS_CLOSED", "IS_CLOSED", ccsText, "", CCGetRequestParam("IS_CLOSED", $Method, NULL), $this);
            $this->IS_BACKUP = & new clsControl(ccsHidden, "IS_BACKUP", "IS_BACKUP", ccsText, "", CCGetRequestParam("IS_BACKUP", $Method, NULL), $this);
            $this->BACKUP_DATE = & new clsControl(ccsHidden, "BACKUP_DATE", "BACKUP_DATE", ccsText, "", CCGetRequestParam("BACKUP_DATE", $Method, NULL), $this);
            $this->BACKUP_BY = & new clsControl(ccsHidden, "BACKUP_BY", "BACKUP_BY", ccsText, "", CCGetRequestParam("BACKUP_BY", $Method, NULL), $this);
            $this->BACKUP_FILE = & new clsControl(ccsHidden, "BACKUP_FILE", "BACKUP_FILE", ccsText, "", CCGetRequestParam("BACKUP_FILE", $Method, NULL), $this);
            $this->BACKUP_DIR = & new clsControl(ccsHidden, "BACKUP_DIR", "BACKUP_DIR", ccsText, "", CCGetRequestParam("BACKUP_DIR", $Method, NULL), $this);
            $this->IS_RELEASED = & new clsControl(ccsHidden, "IS_RELEASED", "IS_RELEASED", ccsText, "", CCGetRequestParam("IS_RELEASED", $Method, NULL), $this);
            $this->RELEASED_DATE = & new clsControl(ccsHidden, "RELEASED_DATE", "RELEASED_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("RELEASED_DATE", $Method, NULL), $this);
            $this->RELEASED_BY = & new clsControl(ccsHidden, "RELEASED_BY", "RELEASED_BY", ccsText, "", CCGetRequestParam("RELEASED_BY", $Method, NULL), $this);
            $this->BILL_CYCLE_CODE = & new clsControl(ccsTextBox, "BILL_CYCLE_CODE", "KETERANGAN", ccsText, "", CCGetRequestParam("BILL_CYCLE_CODE", $Method, NULL), $this);
            $this->INVOICE_AMT = & new clsControl(ccsHidden, "INVOICE_AMT", "INVOICE_AMT", ccsFloat, "", CCGetRequestParam("INVOICE_AMT", $Method, NULL), $this);
            $this->BATCH_Close = & new clsControl(ccsLink, "BATCH_Close", "BATCH_Close", ccsText, "", CCGetRequestParam("BATCH_Close", $Method, NULL), $this);
            $this->BATCH_Close->HTML = true;
            $this->BATCH_Close->Page = "closing_billing.php";
            if(!$this->FormSubmitted) {
                if(!is_array($this->CLOSING_DATE->Value) && !strlen($this->CLOSING_DATE->Value) && $this->CLOSING_DATE->Value !== false)
                    $this->CLOSING_DATE->SetValue(time());
                if(!is_array($this->OPERATOR_ID->Value) && !strlen($this->OPERATOR_ID->Value) && $this->OPERATOR_ID->Value !== false)
                    $this->OPERATOR_ID->SetText(CCGetUserLogin());
                if(!is_array($this->CREATION_DATE->Value) && !strlen($this->CREATION_DATE->Value) && $this->CREATION_DATE->Value !== false)
                    $this->CREATION_DATE->SetValue(time());
                if(!is_array($this->CLOSED_BY->Value) && !strlen($this->CLOSED_BY->Value) && $this->CLOSED_BY->Value !== false)
                    $this->CLOSED_BY->SetText(CCGetUserLogin());
                if(!is_array($this->IS_FINISH_PROCESSED->Value) && !strlen($this->IS_FINISH_PROCESSED->Value) && $this->IS_FINISH_PROCESSED->Value !== false)
                    $this->IS_FINISH_PROCESSED->SetText("N");
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @19-ED4422A5
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlINPUT_DATA_CONTROL_ID"] = CCGetFromGet("INPUT_DATA_CONTROL_ID", NULL);
    }
//End Initialize Method

//Validate Method @19-C7F1330B
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CLOSING_DATE->Validate() && $Validation);
        $Validation = ($this->INVOICE_DATE->Validate() && $Validation);
        $Validation = ($this->P_FINANCE_PERIOD_ID->Validate() && $Validation);
        $Validation = ($this->FINANCE_PERIOD_CODE->Validate() && $Validation);
        $Validation = ($this->P_BATCH_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->BILLING_CENTER_ID->Validate() && $Validation);
        $Validation = ($this->OPERATOR_ID->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->CLOSED_BY->Validate() && $Validation);
        $Validation = ($this->INPUT_FILE_NAME->Validate() && $Validation);
        $Validation = ($this->INPUT_DATA_CONTROL_ID->Validate() && $Validation);
        $Validation = ($this->BILL_STATUS->Validate() && $Validation);
        $Validation = ($this->BILL_AMT->Validate() && $Validation);
        $Validation = ($this->DATA_STATUS_ID->Validate() && $Validation);
        $Validation = ($this->FILE_DIRECTORY->Validate() && $Validation);
        $Validation = ($this->P_BILL_CYCLE_ID->Validate() && $Validation);
        $Validation = ($this->IS_FINISH_PROCESSED->Validate() && $Validation);
        $Validation = ($this->FILE_DATE->Validate() && $Validation);
        $Validation = ($this->FILE_SIZE->Validate() && $Validation);
        $Validation = ($this->IS_CLOSED->Validate() && $Validation);
        $Validation = ($this->IS_BACKUP->Validate() && $Validation);
        $Validation = ($this->BACKUP_DATE->Validate() && $Validation);
        $Validation = ($this->BACKUP_BY->Validate() && $Validation);
        $Validation = ($this->BACKUP_FILE->Validate() && $Validation);
        $Validation = ($this->BACKUP_DIR->Validate() && $Validation);
        $Validation = ($this->IS_RELEASED->Validate() && $Validation);
        $Validation = ($this->RELEASED_DATE->Validate() && $Validation);
        $Validation = ($this->RELEASED_BY->Validate() && $Validation);
        $Validation = ($this->BILL_CYCLE_CODE->Validate() && $Validation);
        $Validation = ($this->INVOICE_AMT->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CLOSING_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->INVOICE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_FINANCE_PERIOD_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FINANCE_PERIOD_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BATCH_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILLING_CENTER_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OPERATOR_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CLOSED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->INPUT_FILE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->INPUT_DATA_CONTROL_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILL_STATUS->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILL_AMT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DATA_STATUS_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FILE_DIRECTORY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILL_CYCLE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_FINISH_PROCESSED->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FILE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FILE_SIZE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_CLOSED->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_BACKUP->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BACKUP_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BACKUP_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BACKUP_FILE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BACKUP_DIR->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_RELEASED->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RELEASED_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RELEASED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILL_CYCLE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->INVOICE_AMT->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @19-1A721EC6
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CLOSING_DATE->Errors->Count());
        $errors = ($errors || $this->INVOICE_DATE->Errors->Count());
        $errors = ($errors || $this->P_FINANCE_PERIOD_ID->Errors->Count());
        $errors = ($errors || $this->FINANCE_PERIOD_CODE->Errors->Count());
        $errors = ($errors || $this->P_BATCH_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->BILLING_CENTER_ID->Errors->Count());
        $errors = ($errors || $this->OPERATOR_ID->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->CLOSED_BY->Errors->Count());
        $errors = ($errors || $this->INPUT_FILE_NAME->Errors->Count());
        $errors = ($errors || $this->INPUT_DATA_CONTROL_ID->Errors->Count());
        $errors = ($errors || $this->BILL_STATUS->Errors->Count());
        $errors = ($errors || $this->BILL_AMT->Errors->Count());
        $errors = ($errors || $this->DATA_STATUS_ID->Errors->Count());
        $errors = ($errors || $this->FILE_DIRECTORY->Errors->Count());
        $errors = ($errors || $this->P_BILL_CYCLE_ID->Errors->Count());
        $errors = ($errors || $this->IS_FINISH_PROCESSED->Errors->Count());
        $errors = ($errors || $this->FILE_DATE->Errors->Count());
        $errors = ($errors || $this->FILE_SIZE->Errors->Count());
        $errors = ($errors || $this->IS_CLOSED->Errors->Count());
        $errors = ($errors || $this->IS_BACKUP->Errors->Count());
        $errors = ($errors || $this->BACKUP_DATE->Errors->Count());
        $errors = ($errors || $this->BACKUP_BY->Errors->Count());
        $errors = ($errors || $this->BACKUP_FILE->Errors->Count());
        $errors = ($errors || $this->BACKUP_DIR->Errors->Count());
        $errors = ($errors || $this->IS_RELEASED->Errors->Count());
        $errors = ($errors || $this->RELEASED_DATE->Errors->Count());
        $errors = ($errors || $this->RELEASED_BY->Errors->Count());
        $errors = ($errors || $this->BILL_CYCLE_CODE->Errors->Count());
        $errors = ($errors || $this->INVOICE_AMT->Errors->Count());
        $errors = ($errors || $this->BATCH_Close->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @19-ED598703
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

//Operation Method @19-38B9D606
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
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "BATCH_CONTROL_ID", "s_keyword", "BATCHPage"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "BATCH_CONTROL_ID", "s_keyword", "BATCHPage"));
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

//InsertRow Method @19-4E24605E
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->INPUT_DATA_CONTROL_ID->SetValue($this->INPUT_DATA_CONTROL_ID->GetValue(true));
        $this->DataSource->INPUT_FILE_NAME->SetValue($this->INPUT_FILE_NAME->GetValue(true));
        $this->DataSource->P_BATCH_TYPE_ID->SetValue($this->P_BATCH_TYPE_ID->GetValue(true));
        $this->DataSource->P_FINANCE_PERIOD_ID->SetValue($this->P_FINANCE_PERIOD_ID->GetValue(true));
        $this->DataSource->P_BILL_CYCLE_ID->SetValue($this->P_BILL_CYCLE_ID->GetValue(true));
        $this->DataSource->DATA_STATUS_ID->SetValue($this->DATA_STATUS_ID->GetValue(true));
        $this->DataSource->FILE_DIRECTORY->SetValue($this->FILE_DIRECTORY->GetValue(true));
        $this->DataSource->IS_FINISH_PROCESSED->SetValue($this->IS_FINISH_PROCESSED->GetValue(true));
        $this->DataSource->FILE_DATE->SetValue($this->FILE_DATE->GetValue(true));
        $this->DataSource->FILE_SIZE->SetValue($this->FILE_SIZE->GetValue(true));
        $this->DataSource->INVOICE_DATE->SetValue($this->INVOICE_DATE->GetValue(true));
        $this->DataSource->BILL_AMT->SetValue($this->BILL_AMT->GetValue(true));
        $this->DataSource->INVOICE_AMT->SetValue($this->INVOICE_AMT->GetValue(true));
        $this->DataSource->IS_CLOSED->SetValue($this->IS_CLOSED->GetValue(true));
        $this->DataSource->CLOSING_DATE->SetValue($this->CLOSING_DATE->GetValue(true));
        $this->DataSource->CLOSED_BY->SetValue($this->CLOSED_BY->GetValue(true));
        $this->DataSource->IS_BACKUP->SetValue($this->IS_BACKUP->GetValue(true));
        $this->DataSource->BACKUP_DATE->SetValue($this->BACKUP_DATE->GetValue(true));
        $this->DataSource->BACKUP_BY->SetValue($this->BACKUP_BY->GetValue(true));
        $this->DataSource->BACKUP_FILE->SetValue($this->BACKUP_FILE->GetValue(true));
        $this->DataSource->BACKUP_DIR->SetValue($this->BACKUP_DIR->GetValue(true));
        $this->DataSource->IS_RELEASED->SetValue($this->IS_RELEASED->GetValue(true));
        $this->DataSource->RELEASED_DATE->SetValue($this->RELEASED_DATE->GetValue(true));
        $this->DataSource->RELEASED_BY->SetValue($this->RELEASED_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @19-2BDE2192
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->INPUT_FILE_NAME->SetValue($this->INPUT_FILE_NAME->GetValue(true));
        $this->DataSource->P_BATCH_TYPE_ID->SetValue($this->P_BATCH_TYPE_ID->GetValue(true));
        $this->DataSource->P_FINANCE_PERIOD_ID->SetValue($this->P_FINANCE_PERIOD_ID->GetValue(true));
        $this->DataSource->P_BILL_CYCLE_ID->SetValue($this->P_BILL_CYCLE_ID->GetValue(true));
        $this->DataSource->DATA_STATUS_ID->SetValue($this->DATA_STATUS_ID->GetValue(true));
        $this->DataSource->FILE_DIRECTORY->SetValue($this->FILE_DIRECTORY->GetValue(true));
        $this->DataSource->IS_FINISH_PROCESSED->SetValue($this->IS_FINISH_PROCESSED->GetValue(true));
        $this->DataSource->FILE_DATE->SetValue($this->FILE_DATE->GetValue(true));
        $this->DataSource->FILE_SIZE->SetValue($this->FILE_SIZE->GetValue(true));
        $this->DataSource->INVOICE_DATE->SetValue($this->INVOICE_DATE->GetValue(true));
        $this->DataSource->BILL_AMT->SetValue($this->BILL_AMT->GetValue(true));
        $this->DataSource->INVOICE_AMT->SetValue($this->INVOICE_AMT->GetValue(true));
        $this->DataSource->IS_CLOSED->SetValue($this->IS_CLOSED->GetValue(true));
        $this->DataSource->CLOSING_DATE->SetValue($this->CLOSING_DATE->GetValue(true));
        $this->DataSource->CLOSED_BY->SetValue($this->CLOSED_BY->GetValue(true));
        $this->DataSource->IS_BACKUP->SetValue($this->IS_BACKUP->GetValue(true));
        $this->DataSource->BACKUP_DATE->SetValue($this->BACKUP_DATE->GetValue(true));
        $this->DataSource->BACKUP_BY->SetValue($this->BACKUP_BY->GetValue(true));
        $this->DataSource->BACKUP_FILE->SetValue($this->BACKUP_FILE->GetValue(true));
        $this->DataSource->BACKUP_DIR->SetValue($this->BACKUP_DIR->GetValue(true));
        $this->DataSource->IS_RELEASED->SetValue($this->IS_RELEASED->GetValue(true));
        $this->DataSource->RELEASED_DATE->SetValue($this->RELEASED_DATE->GetValue(true));
        $this->DataSource->RELEASED_BY->SetValue($this->RELEASED_BY->GetValue(true));
        $this->DataSource->INPUT_DATA_CONTROL_ID->SetValue($this->INPUT_DATA_CONTROL_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @19-61FE64F1
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->INPUT_DATA_CONTROL_ID->SetValue($this->INPUT_DATA_CONTROL_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @19-C3FD309D
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

        $this->P_BATCH_TYPE_ID->Prepare();

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
                $this->BATCH_Close->SetValue($this->DataSource->BATCH_Close->GetValue());
                $this->BATCH_Close->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->BATCH_Close->Parameters = CCAddParam($this->BATCH_Close->Parameters, "INPUT_DATA_CONTROL_ID", $this->DataSource->f("INPUT_DATA_CONTROL_ID"));
                $this->BATCH_Close->Parameters = CCAddParam($this->BATCH_Close->Parameters, "actionClose", 1);
                if(!$this->FormSubmitted){
                    $this->CLOSING_DATE->SetValue($this->DataSource->CLOSING_DATE->GetValue());
                    $this->INVOICE_DATE->SetValue($this->DataSource->INVOICE_DATE->GetValue());
                    $this->P_FINANCE_PERIOD_ID->SetValue($this->DataSource->P_FINANCE_PERIOD_ID->GetValue());
                    $this->FINANCE_PERIOD_CODE->SetValue($this->DataSource->FINANCE_PERIOD_CODE->GetValue());
                    $this->P_BATCH_TYPE_ID->SetValue($this->DataSource->P_BATCH_TYPE_ID->GetValue());
                    $this->BILLING_CENTER_ID->SetValue($this->DataSource->BILLING_CENTER_ID->GetValue());
                    $this->OPERATOR_ID->SetValue($this->DataSource->OPERATOR_ID->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->CLOSED_BY->SetValue($this->DataSource->CLOSED_BY->GetValue());
                    $this->INPUT_FILE_NAME->SetValue($this->DataSource->INPUT_FILE_NAME->GetValue());
                    $this->INPUT_DATA_CONTROL_ID->SetValue($this->DataSource->INPUT_DATA_CONTROL_ID->GetValue());
                    $this->BILL_STATUS->SetValue($this->DataSource->BILL_STATUS->GetValue());
                    $this->BILL_AMT->SetValue($this->DataSource->BILL_AMT->GetValue());
                    $this->DATA_STATUS_ID->SetValue($this->DataSource->DATA_STATUS_ID->GetValue());
                    $this->FILE_DIRECTORY->SetValue($this->DataSource->FILE_DIRECTORY->GetValue());
                    $this->P_BILL_CYCLE_ID->SetValue($this->DataSource->P_BILL_CYCLE_ID->GetValue());
                    $this->IS_FINISH_PROCESSED->SetValue($this->DataSource->IS_FINISH_PROCESSED->GetValue());
                    $this->FILE_DATE->SetValue($this->DataSource->FILE_DATE->GetValue());
                    $this->FILE_SIZE->SetValue($this->DataSource->FILE_SIZE->GetValue());
                    $this->IS_CLOSED->SetValue($this->DataSource->IS_CLOSED->GetValue());
                    $this->IS_BACKUP->SetValue($this->DataSource->IS_BACKUP->GetValue());
                    $this->BACKUP_DATE->SetValue($this->DataSource->BACKUP_DATE->GetValue());
                    $this->BACKUP_BY->SetValue($this->DataSource->BACKUP_BY->GetValue());
                    $this->BACKUP_FILE->SetValue($this->DataSource->BACKUP_FILE->GetValue());
                    $this->BACKUP_DIR->SetValue($this->DataSource->BACKUP_DIR->GetValue());
                    $this->IS_RELEASED->SetValue($this->DataSource->IS_RELEASED->GetValue());
                    $this->RELEASED_DATE->SetValue($this->DataSource->RELEASED_DATE->GetValue());
                    $this->RELEASED_BY->SetValue($this->DataSource->RELEASED_BY->GetValue());
                    $this->BILL_CYCLE_CODE->SetValue($this->DataSource->BILL_CYCLE_CODE->GetValue());
                    $this->INVOICE_AMT->SetValue($this->DataSource->INVOICE_AMT->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CLOSING_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INVOICE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_FINANCE_PERIOD_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FINANCE_PERIOD_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BATCH_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILLING_CENTER_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OPERATOR_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CLOSED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INPUT_FILE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INPUT_DATA_CONTROL_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILL_STATUS->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILL_AMT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DATA_STATUS_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FILE_DIRECTORY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILL_CYCLE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_FINISH_PROCESSED->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FILE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FILE_SIZE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_CLOSED->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_BACKUP->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BACKUP_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BACKUP_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BACKUP_FILE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BACKUP_DIR->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_RELEASED->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RELEASED_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RELEASED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILL_CYCLE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INVOICE_AMT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BATCH_Close->Errors->ToString());
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
        $this->CLOSING_DATE->Show();
        $this->INVOICE_DATE->Show();
        $this->P_FINANCE_PERIOD_ID->Show();
        $this->FINANCE_PERIOD_CODE->Show();
        $this->P_BATCH_TYPE_ID->Show();
        $this->BILLING_CENTER_ID->Show();
        $this->OPERATOR_ID->Show();
        $this->CREATION_DATE->Show();
        $this->CLOSED_BY->Show();
        $this->INPUT_FILE_NAME->Show();
        $this->INPUT_DATA_CONTROL_ID->Show();
        $this->BILL_STATUS->Show();
        $this->BILL_AMT->Show();
        $this->DATA_STATUS_ID->Show();
        $this->FILE_DIRECTORY->Show();
        $this->P_BILL_CYCLE_ID->Show();
        $this->IS_FINISH_PROCESSED->Show();
        $this->FILE_DATE->Show();
        $this->FILE_SIZE->Show();
        $this->IS_CLOSED->Show();
        $this->IS_BACKUP->Show();
        $this->BACKUP_DATE->Show();
        $this->BACKUP_BY->Show();
        $this->BACKUP_FILE->Show();
        $this->BACKUP_DIR->Show();
        $this->IS_RELEASED->Show();
        $this->RELEASED_DATE->Show();
        $this->RELEASED_BY->Show();
        $this->BILL_CYCLE_CODE->Show();
        $this->INVOICE_AMT->Show();
        $this->BATCH_Close->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End BATCH1 Class @19-FCB6E20C

class clsBATCH1DataSource extends clsDBConn {  //BATCH1DataSource Class @19-3A2922BC

//DataSource Variables @19-A74A4F0D
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
    var $CLOSING_DATE;
    var $INVOICE_DATE;
    var $P_FINANCE_PERIOD_ID;
    var $FINANCE_PERIOD_CODE;
    var $P_BATCH_TYPE_ID;
    var $BILLING_CENTER_ID;
    var $OPERATOR_ID;
    var $CREATION_DATE;
    var $CLOSED_BY;
    var $INPUT_FILE_NAME;
    var $INPUT_DATA_CONTROL_ID;
    var $BILL_STATUS;
    var $BILL_AMT;
    var $DATA_STATUS_ID;
    var $FILE_DIRECTORY;
    var $P_BILL_CYCLE_ID;
    var $IS_FINISH_PROCESSED;
    var $FILE_DATE;
    var $FILE_SIZE;
    var $IS_CLOSED;
    var $IS_BACKUP;
    var $BACKUP_DATE;
    var $BACKUP_BY;
    var $BACKUP_FILE;
    var $BACKUP_DIR;
    var $IS_RELEASED;
    var $RELEASED_DATE;
    var $RELEASED_BY;
    var $BILL_CYCLE_CODE;
    var $INVOICE_AMT;
    var $BATCH_Close;
//End DataSource Variables

//DataSourceClass_Initialize Event @19-55485096
    function clsBATCH1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record BATCH1/Error";
        $this->Initialize();
        $this->CLOSING_DATE = new clsField("CLOSING_DATE", ccsDate, $this->DateFormat);
        
        $this->INVOICE_DATE = new clsField("INVOICE_DATE", ccsDate, $this->DateFormat);
        
        $this->P_FINANCE_PERIOD_ID = new clsField("P_FINANCE_PERIOD_ID", ccsFloat, "");
        
        $this->FINANCE_PERIOD_CODE = new clsField("FINANCE_PERIOD_CODE", ccsText, "");
        
        $this->P_BATCH_TYPE_ID = new clsField("P_BATCH_TYPE_ID", ccsText, "");
        
        $this->BILLING_CENTER_ID = new clsField("BILLING_CENTER_ID", ccsFloat, "");
        
        $this->OPERATOR_ID = new clsField("OPERATOR_ID", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->CLOSED_BY = new clsField("CLOSED_BY", ccsText, "");
        
        $this->INPUT_FILE_NAME = new clsField("INPUT_FILE_NAME", ccsText, "");
        
        $this->INPUT_DATA_CONTROL_ID = new clsField("INPUT_DATA_CONTROL_ID", ccsText, "");
        
        $this->BILL_STATUS = new clsField("BILL_STATUS", ccsText, "");
        
        $this->BILL_AMT = new clsField("BILL_AMT", ccsText, "");
        
        $this->DATA_STATUS_ID = new clsField("DATA_STATUS_ID", ccsText, "");
        
        $this->FILE_DIRECTORY = new clsField("FILE_DIRECTORY", ccsText, "");
        
        $this->P_BILL_CYCLE_ID = new clsField("P_BILL_CYCLE_ID", ccsText, "");
        
        $this->IS_FINISH_PROCESSED = new clsField("IS_FINISH_PROCESSED", ccsText, "");
        
        $this->FILE_DATE = new clsField("FILE_DATE", ccsDate, $this->DateFormat);
        
        $this->FILE_SIZE = new clsField("FILE_SIZE", ccsFloat, "");
        
        $this->IS_CLOSED = new clsField("IS_CLOSED", ccsText, "");
        
        $this->IS_BACKUP = new clsField("IS_BACKUP", ccsText, "");
        
        $this->BACKUP_DATE = new clsField("BACKUP_DATE", ccsText, "");
        
        $this->BACKUP_BY = new clsField("BACKUP_BY", ccsText, "");
        
        $this->BACKUP_FILE = new clsField("BACKUP_FILE", ccsText, "");
        
        $this->BACKUP_DIR = new clsField("BACKUP_DIR", ccsText, "");
        
        $this->IS_RELEASED = new clsField("IS_RELEASED", ccsText, "");
        
        $this->RELEASED_DATE = new clsField("RELEASED_DATE", ccsDate, $this->DateFormat);
        
        $this->RELEASED_BY = new clsField("RELEASED_BY", ccsText, "");
        
        $this->BILL_CYCLE_CODE = new clsField("BILL_CYCLE_CODE", ccsText, "");
        
        $this->INVOICE_AMT = new clsField("INVOICE_AMT", ccsFloat, "");
        
        $this->BATCH_Close = new clsField("BATCH_Close", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @19-734F574D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlINPUT_DATA_CONTROL_ID", ccsFloat, "", "", $this->Parameters["urlINPUT_DATA_CONTROL_ID"], 0, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @19-8DD2F936
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT   *\n" .
        "FROM v_idc_bill_close\n" .
        "WHERE INPUT_DATA_CONTROL_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @19-6FD3D763
    function SetValues()
    {
        $this->CLOSING_DATE->SetDBValue(trim($this->f("CLOSING_DATE")));
        $this->INVOICE_DATE->SetDBValue(trim($this->f("INVOICE_DATE")));
        $this->P_FINANCE_PERIOD_ID->SetDBValue(trim($this->f("P_FINANCE_PERIOD_ID")));
        $this->FINANCE_PERIOD_CODE->SetDBValue($this->f("FINANCE_PERIOD_CODE"));
        $this->P_BATCH_TYPE_ID->SetDBValue($this->f("BATCH_TYPE"));
        $this->BILLING_CENTER_ID->SetDBValue(trim($this->f("BILLING_CENTER_ID")));
        $this->OPERATOR_ID->SetDBValue($this->f("OPERATOR_ID"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->CLOSED_BY->SetDBValue($this->f("CLOSED_BY"));
        $this->INPUT_FILE_NAME->SetDBValue($this->f("INPUT_FILE_NAME"));
        $this->INPUT_DATA_CONTROL_ID->SetDBValue($this->f("INPUT_DATA_CONTROL_ID"));
        $this->BILL_STATUS->SetDBValue($this->f("BILL_STATUS"));
        $this->BILL_AMT->SetDBValue($this->f("BILL_AMT"));
        $this->DATA_STATUS_ID->SetDBValue($this->f("DATA_STATUS_ID"));
        $this->FILE_DIRECTORY->SetDBValue($this->f("FILE_DIRECTORY"));
        $this->P_BILL_CYCLE_ID->SetDBValue($this->f("P_BILL_CYCLE_ID"));
        $this->IS_FINISH_PROCESSED->SetDBValue($this->f("IS_FINISH_PROCESSED"));
        $this->FILE_DATE->SetDBValue(trim($this->f("FILE_DATE")));
        $this->FILE_SIZE->SetDBValue(trim($this->f("FILE_SIZE")));
        $this->IS_CLOSED->SetDBValue($this->f("IS_CLOSED"));
        $this->IS_BACKUP->SetDBValue($this->f("IS_BACKUP"));
        $this->BACKUP_DATE->SetDBValue($this->f("BACKUP_DATE"));
        $this->BACKUP_BY->SetDBValue($this->f("BACKUP_BY"));
        $this->BACKUP_FILE->SetDBValue($this->f("BACKUP_FILE"));
        $this->BACKUP_DIR->SetDBValue($this->f("BACKUP_DIR"));
        $this->IS_RELEASED->SetDBValue($this->f("IS_RELEASED"));
        $this->RELEASED_DATE->SetDBValue(trim($this->f("RELEASED_DATE")));
        $this->RELEASED_BY->SetDBValue($this->f("RELEASED_BY"));
        $this->BILL_CYCLE_CODE->SetDBValue($this->f("BILL_CYCLE_CODE"));
        $this->INVOICE_AMT->SetDBValue(trim($this->f("INVOICE_AMT")));
        $this->BATCH_Close->SetDBValue($this->f("INPUT_DATA_CONTROL_ID"));
    }
//End SetValues Method

//Insert Method @19-4D9A88B1
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["INPUT_DATA_CONTROL_ID"] = new clsSQLParameter("ctrlINPUT_DATA_CONTROL_ID", ccsFloat, "", "", $this->INPUT_DATA_CONTROL_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["INPUT_FILE_NAME"] = new clsSQLParameter("ctrlINPUT_FILE_NAME", ccsText, "", "", $this->INPUT_FILE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["INPUT_DATA_CLASS_ID"] = new clsSQLParameter("ctrlP_BATCH_TYPE_ID", ccsFloat, "", "", $this->P_BATCH_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_FINANCE_PERIOD_ID"] = new clsSQLParameter("ctrlP_FINANCE_PERIOD_ID", ccsFloat, "", "", $this->P_FINANCE_PERIOD_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_BILL_CYCLE_ID"] = new clsSQLParameter("ctrlP_BILL_CYCLE_ID", ccsFloat, "", "", $this->P_BILL_CYCLE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DATA_STATUS_ID"] = new clsSQLParameter("ctrlDATA_STATUS_ID", ccsFloat, "", "", $this->DATA_STATUS_ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FILE_DIRECTORY"] = new clsSQLParameter("ctrlFILE_DIRECTORY", ccsText, "", "", $this->FILE_DIRECTORY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["OPERATOR_ID"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["IS_FINISH_PROCESSED"] = new clsSQLParameter("ctrlIS_FINISH_PROCESSED", ccsText, "", "", $this->IS_FINISH_PROCESSED->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FILE_DATE"] = new clsSQLParameter("ctrlFILE_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->FILE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FILE_SIZE"] = new clsSQLParameter("ctrlFILE_SIZE", ccsFloat, "", "", $this->FILE_SIZE->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["INVOICE_DATE"] = new clsSQLParameter("ctrlINVOICE_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->INVOICE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BILL_AMT"] = new clsSQLParameter("ctrlBILL_AMT", ccsFloat, "", "", $this->BILL_AMT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["INVOICE_AMT"] = new clsSQLParameter("ctrlINVOICE_AMT", ccsFloat, "", "", $this->INVOICE_AMT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["IS_CLOSED"] = new clsSQLParameter("ctrlIS_CLOSED", ccsText, "", "", $this->IS_CLOSED->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CLOSING_DATE"] = new clsSQLParameter("ctrlCLOSING_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->CLOSING_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CLOSED_BY"] = new clsSQLParameter("ctrlCLOSED_BY", ccsText, "", "", $this->CLOSED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_BACKUP"] = new clsSQLParameter("ctrlIS_BACKUP", ccsText, "", "", $this->IS_BACKUP->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BACKUP_DATE"] = new clsSQLParameter("ctrlBACKUP_DATE", ccsText, "", "", $this->BACKUP_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BACKUP_BY"] = new clsSQLParameter("ctrlBACKUP_BY", ccsText, "", "", $this->BACKUP_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BACKUP_FILE"] = new clsSQLParameter("ctrlBACKUP_FILE", ccsText, "", "", $this->BACKUP_FILE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BACKUP_DIR"] = new clsSQLParameter("ctrlBACKUP_DIR", ccsText, "", "", $this->BACKUP_DIR->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_RELEASED"] = new clsSQLParameter("ctrlIS_RELEASED", ccsText, "", "", $this->IS_RELEASED->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RELEASED_DATE"] = new clsSQLParameter("ctrlRELEASED_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->RELEASED_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RELEASED_BY"] = new clsSQLParameter("ctrlRELEASED_BY", ccsText, "", "", $this->RELEASED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["INPUT_DATA_CONTROL_ID"]->GetValue()) and !strlen($this->cp["INPUT_DATA_CONTROL_ID"]->GetText()) and !is_bool($this->cp["INPUT_DATA_CONTROL_ID"]->GetValue())) 
            $this->cp["INPUT_DATA_CONTROL_ID"]->SetValue($this->INPUT_DATA_CONTROL_ID->GetValue(true));
        if (!strlen($this->cp["INPUT_DATA_CONTROL_ID"]->GetText()) and !is_bool($this->cp["INPUT_DATA_CONTROL_ID"]->GetValue(true))) 
            $this->cp["INPUT_DATA_CONTROL_ID"]->SetText(0);
        if (!is_null($this->cp["INPUT_FILE_NAME"]->GetValue()) and !strlen($this->cp["INPUT_FILE_NAME"]->GetText()) and !is_bool($this->cp["INPUT_FILE_NAME"]->GetValue())) 
            $this->cp["INPUT_FILE_NAME"]->SetValue($this->INPUT_FILE_NAME->GetValue(true));
        if (!is_null($this->cp["INPUT_DATA_CLASS_ID"]->GetValue()) and !strlen($this->cp["INPUT_DATA_CLASS_ID"]->GetText()) and !is_bool($this->cp["INPUT_DATA_CLASS_ID"]->GetValue())) 
            $this->cp["INPUT_DATA_CLASS_ID"]->SetValue($this->P_BATCH_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["INPUT_DATA_CLASS_ID"]->GetText()) and !is_bool($this->cp["INPUT_DATA_CLASS_ID"]->GetValue(true))) 
            $this->cp["INPUT_DATA_CLASS_ID"]->SetText(0);
        if (!is_null($this->cp["P_FINANCE_PERIOD_ID"]->GetValue()) and !strlen($this->cp["P_FINANCE_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_FINANCE_PERIOD_ID"]->GetValue())) 
            $this->cp["P_FINANCE_PERIOD_ID"]->SetValue($this->P_FINANCE_PERIOD_ID->GetValue(true));
        if (!strlen($this->cp["P_FINANCE_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_FINANCE_PERIOD_ID"]->GetValue(true))) 
            $this->cp["P_FINANCE_PERIOD_ID"]->SetText(0);
        if (!is_null($this->cp["P_BILL_CYCLE_ID"]->GetValue()) and !strlen($this->cp["P_BILL_CYCLE_ID"]->GetText()) and !is_bool($this->cp["P_BILL_CYCLE_ID"]->GetValue())) 
            $this->cp["P_BILL_CYCLE_ID"]->SetValue($this->P_BILL_CYCLE_ID->GetValue(true));
        if (!strlen($this->cp["P_BILL_CYCLE_ID"]->GetText()) and !is_bool($this->cp["P_BILL_CYCLE_ID"]->GetValue(true))) 
            $this->cp["P_BILL_CYCLE_ID"]->SetText(0);
        if (!is_null($this->cp["DATA_STATUS_ID"]->GetValue()) and !strlen($this->cp["DATA_STATUS_ID"]->GetText()) and !is_bool($this->cp["DATA_STATUS_ID"]->GetValue())) 
            $this->cp["DATA_STATUS_ID"]->SetValue($this->DATA_STATUS_ID->GetValue(true));
        if (!strlen($this->cp["DATA_STATUS_ID"]->GetText()) and !is_bool($this->cp["DATA_STATUS_ID"]->GetValue(true))) 
            $this->cp["DATA_STATUS_ID"]->SetText(NULL);
        if (!is_null($this->cp["FILE_DIRECTORY"]->GetValue()) and !strlen($this->cp["FILE_DIRECTORY"]->GetText()) and !is_bool($this->cp["FILE_DIRECTORY"]->GetValue())) 
            $this->cp["FILE_DIRECTORY"]->SetValue($this->FILE_DIRECTORY->GetValue(true));
        if (!is_null($this->cp["OPERATOR_ID"]->GetValue()) and !strlen($this->cp["OPERATOR_ID"]->GetText()) and !is_bool($this->cp["OPERATOR_ID"]->GetValue())) 
            $this->cp["OPERATOR_ID"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["IS_FINISH_PROCESSED"]->GetValue()) and !strlen($this->cp["IS_FINISH_PROCESSED"]->GetText()) and !is_bool($this->cp["IS_FINISH_PROCESSED"]->GetValue())) 
            $this->cp["IS_FINISH_PROCESSED"]->SetValue($this->IS_FINISH_PROCESSED->GetValue(true));
        if (!is_null($this->cp["FILE_DATE"]->GetValue()) and !strlen($this->cp["FILE_DATE"]->GetText()) and !is_bool($this->cp["FILE_DATE"]->GetValue())) 
            $this->cp["FILE_DATE"]->SetValue($this->FILE_DATE->GetValue(true));
        if (!strlen($this->cp["FILE_DATE"]->GetText()) and !is_bool($this->cp["FILE_DATE"]->GetValue(true))) 
            $this->cp["FILE_DATE"]->SetText("");
        if (!is_null($this->cp["FILE_SIZE"]->GetValue()) and !strlen($this->cp["FILE_SIZE"]->GetText()) and !is_bool($this->cp["FILE_SIZE"]->GetValue())) 
            $this->cp["FILE_SIZE"]->SetValue($this->FILE_SIZE->GetValue(true));
        if (!strlen($this->cp["FILE_SIZE"]->GetText()) and !is_bool($this->cp["FILE_SIZE"]->GetValue(true))) 
            $this->cp["FILE_SIZE"]->SetText(0);
        if (!is_null($this->cp["INVOICE_DATE"]->GetValue()) and !strlen($this->cp["INVOICE_DATE"]->GetText()) and !is_bool($this->cp["INVOICE_DATE"]->GetValue())) 
            $this->cp["INVOICE_DATE"]->SetValue($this->INVOICE_DATE->GetValue(true));
        if (!strlen($this->cp["INVOICE_DATE"]->GetText()) and !is_bool($this->cp["INVOICE_DATE"]->GetValue(true))) 
            $this->cp["INVOICE_DATE"]->SetText("");
        if (!is_null($this->cp["BILL_AMT"]->GetValue()) and !strlen($this->cp["BILL_AMT"]->GetText()) and !is_bool($this->cp["BILL_AMT"]->GetValue())) 
            $this->cp["BILL_AMT"]->SetValue($this->BILL_AMT->GetValue(true));
        if (!strlen($this->cp["BILL_AMT"]->GetText()) and !is_bool($this->cp["BILL_AMT"]->GetValue(true))) 
            $this->cp["BILL_AMT"]->SetText(0);
        if (!is_null($this->cp["INVOICE_AMT"]->GetValue()) and !strlen($this->cp["INVOICE_AMT"]->GetText()) and !is_bool($this->cp["INVOICE_AMT"]->GetValue())) 
            $this->cp["INVOICE_AMT"]->SetValue($this->INVOICE_AMT->GetValue(true));
        if (!strlen($this->cp["INVOICE_AMT"]->GetText()) and !is_bool($this->cp["INVOICE_AMT"]->GetValue(true))) 
            $this->cp["INVOICE_AMT"]->SetText(0);
        if (!is_null($this->cp["IS_CLOSED"]->GetValue()) and !strlen($this->cp["IS_CLOSED"]->GetText()) and !is_bool($this->cp["IS_CLOSED"]->GetValue())) 
            $this->cp["IS_CLOSED"]->SetValue($this->IS_CLOSED->GetValue(true));
        if (!is_null($this->cp["CLOSING_DATE"]->GetValue()) and !strlen($this->cp["CLOSING_DATE"]->GetText()) and !is_bool($this->cp["CLOSING_DATE"]->GetValue())) 
            $this->cp["CLOSING_DATE"]->SetValue($this->CLOSING_DATE->GetValue(true));
        if (!strlen($this->cp["CLOSING_DATE"]->GetText()) and !is_bool($this->cp["CLOSING_DATE"]->GetValue(true))) 
            $this->cp["CLOSING_DATE"]->SetText("");
        if (!is_null($this->cp["CLOSED_BY"]->GetValue()) and !strlen($this->cp["CLOSED_BY"]->GetText()) and !is_bool($this->cp["CLOSED_BY"]->GetValue())) 
            $this->cp["CLOSED_BY"]->SetValue($this->CLOSED_BY->GetValue(true));
        if (!is_null($this->cp["IS_BACKUP"]->GetValue()) and !strlen($this->cp["IS_BACKUP"]->GetText()) and !is_bool($this->cp["IS_BACKUP"]->GetValue())) 
            $this->cp["IS_BACKUP"]->SetValue($this->IS_BACKUP->GetValue(true));
        if (!is_null($this->cp["BACKUP_DATE"]->GetValue()) and !strlen($this->cp["BACKUP_DATE"]->GetText()) and !is_bool($this->cp["BACKUP_DATE"]->GetValue())) 
            $this->cp["BACKUP_DATE"]->SetValue($this->BACKUP_DATE->GetValue(true));
        if (!strlen($this->cp["BACKUP_DATE"]->GetText()) and !is_bool($this->cp["BACKUP_DATE"]->GetValue(true))) 
            $this->cp["BACKUP_DATE"]->SetText("");
        if (!is_null($this->cp["BACKUP_BY"]->GetValue()) and !strlen($this->cp["BACKUP_BY"]->GetText()) and !is_bool($this->cp["BACKUP_BY"]->GetValue())) 
            $this->cp["BACKUP_BY"]->SetValue($this->BACKUP_BY->GetValue(true));
        if (!is_null($this->cp["BACKUP_FILE"]->GetValue()) and !strlen($this->cp["BACKUP_FILE"]->GetText()) and !is_bool($this->cp["BACKUP_FILE"]->GetValue())) 
            $this->cp["BACKUP_FILE"]->SetValue($this->BACKUP_FILE->GetValue(true));
        if (!is_null($this->cp["BACKUP_DIR"]->GetValue()) and !strlen($this->cp["BACKUP_DIR"]->GetText()) and !is_bool($this->cp["BACKUP_DIR"]->GetValue())) 
            $this->cp["BACKUP_DIR"]->SetValue($this->BACKUP_DIR->GetValue(true));
        if (!is_null($this->cp["IS_RELEASED"]->GetValue()) and !strlen($this->cp["IS_RELEASED"]->GetText()) and !is_bool($this->cp["IS_RELEASED"]->GetValue())) 
            $this->cp["IS_RELEASED"]->SetValue($this->IS_RELEASED->GetValue(true));
        if (!is_null($this->cp["RELEASED_DATE"]->GetValue()) and !strlen($this->cp["RELEASED_DATE"]->GetText()) and !is_bool($this->cp["RELEASED_DATE"]->GetValue())) 
            $this->cp["RELEASED_DATE"]->SetValue($this->RELEASED_DATE->GetValue(true));
        if (!strlen($this->cp["RELEASED_DATE"]->GetText()) and !is_bool($this->cp["RELEASED_DATE"]->GetValue(true))) 
            $this->cp["RELEASED_DATE"]->SetText("");
        if (!is_null($this->cp["RELEASED_BY"]->GetValue()) and !strlen($this->cp["RELEASED_BY"]->GetText()) and !is_bool($this->cp["RELEASED_BY"]->GetValue())) 
            $this->cp["RELEASED_BY"]->SetValue($this->RELEASED_BY->GetValue(true));
        $this->SQL = "/* Formatted on 20/10/2014 11:16:27 (QP5 v5.139.911.3011) */\n" .
        "INSERT INTO INPUT_DATA_CONTROL (INPUT_DATA_CONTROL_ID,\n" .
        "                                INPUT_FILE_NAME,\n" .
        "                                INPUT_DATA_CLASS_ID,\n" .
        "                                P_FINANCE_PERIOD_ID,\n" .
        "                                P_BILL_CYCLE_ID,\n" .
        "                                DATA_STATUS_ID,\n" .
        "                                FILE_DIRECTORY,\n" .
        "                                CREATION_DATE,\n" .
        "                                OPERATOR_ID,\n" .
        "                                IS_FINISH_PROCESSED,\n" .
        "                                FILE_DATE,\n" .
        "                                FILE_SIZE,\n" .
        "                                INVOICE_DATE,\n" .
        "                                BILL_AMT,\n" .
        "                                INVOICE_AMT,\n" .
        "                                IS_CLOSED,\n" .
        "                                CLOSING_DATE,\n" .
        "                                CLOSED_BY,\n" .
        "                                IS_BACKUP,\n" .
        "                                BACKUP_DATE,\n" .
        "                                BACKUP_BY,\n" .
        "                                BACKUP_FILE,\n" .
        "                                BACKUP_DIR,\n" .
        "                                IS_RELEASED,\n" .
        "                                RELEASED_DATE,\n" .
        "                                RELEASED_BY)\n" .
        "     VALUES (generate_id('BILLDB','INPUT_DATA_CONTROL','INPUT_DATA_CONTROL_ID'),'" . $this->SQLValue($this->cp["INPUT_FILE_NAME"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["INPUT_DATA_CLASS_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_FINANCE_PERIOD_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_BILL_CYCLE_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["DATA_STATUS_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "      '" . $this->SQLValue($this->cp["FILE_DIRECTORY"]->GetDBValue(), ccsText) . "', SYSDATE, '" . $this->SQLValue($this->cp["OPERATOR_ID"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["IS_FINISH_PROCESSED"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["FILE_DATE"]->GetDBValue(), ccsDate) . "', " . $this->SQLValue($this->cp["FILE_SIZE"]->GetDBValue(), ccsFloat) . ", to_date(substr('" . $this->SQLValue($this->cp["INVOICE_DATE"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'), " . $this->SQLValue($this->cp["BILL_AMT"]->GetDBValue(), ccsFloat) . ", " . $this->SQLValue($this->cp["INVOICE_AMT"]->GetDBValue(), ccsFloat) . ",\n" .
        "      '" . $this->SQLValue($this->cp["IS_CLOSED"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["CLOSING_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "      '" . $this->SQLValue($this->cp["CLOSED_BY"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["IS_BACKUP"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["BACKUP_DATE"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["BACKUP_BY"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["BACKUP_FILE"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["BACKUP_DIR"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["IS_RELEASED"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["RELEASED_DATE"]->GetDBValue(), ccsDate) . "', '" . $this->SQLValue($this->cp["RELEASED_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @19-BD0032D7
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["INPUT_FILE_NAME"] = new clsSQLParameter("ctrlINPUT_FILE_NAME", ccsText, "", "", $this->INPUT_FILE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["INPUT_DATA_CLASS_ID"] = new clsSQLParameter("ctrlP_BATCH_TYPE_ID", ccsFloat, "", "", $this->P_BATCH_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_FINANCE_PERIOD_ID"] = new clsSQLParameter("ctrlP_FINANCE_PERIOD_ID", ccsFloat, "", "", $this->P_FINANCE_PERIOD_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_BILL_CYCLE_ID"] = new clsSQLParameter("ctrlP_BILL_CYCLE_ID", ccsFloat, "", "", $this->P_BILL_CYCLE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DATA_STATUS_ID"] = new clsSQLParameter("ctrlDATA_STATUS_ID", ccsFloat, "", "", $this->DATA_STATUS_ID->GetValue(true), null, false, $this->ErrorBlock);
        $this->cp["FILE_DIRECTORY"] = new clsSQLParameter("ctrlFILE_DIRECTORY", ccsText, "", "", $this->FILE_DIRECTORY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_FINISH_PROCESSED"] = new clsSQLParameter("ctrlIS_FINISH_PROCESSED", ccsText, "", "", $this->IS_FINISH_PROCESSED->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FILE_DATE"] = new clsSQLParameter("ctrlFILE_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->FILE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FILE_SIZE"] = new clsSQLParameter("ctrlFILE_SIZE", ccsFloat, "", "", $this->FILE_SIZE->GetValue(true), null, false, $this->ErrorBlock);
        $this->cp["INVOICE_DATE"] = new clsSQLParameter("ctrlINVOICE_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->INVOICE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BILL_AMT"] = new clsSQLParameter("ctrlBILL_AMT", ccsFloat, "", "", $this->BILL_AMT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["INVOICE_AMT"] = new clsSQLParameter("ctrlINVOICE_AMT", ccsFloat, "", "", $this->INVOICE_AMT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["IS_CLOSED"] = new clsSQLParameter("ctrlIS_CLOSED", ccsText, "", "", $this->IS_CLOSED->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CLOSING_DATE"] = new clsSQLParameter("ctrlCLOSING_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->CLOSING_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CLOSED_BY"] = new clsSQLParameter("ctrlCLOSED_BY", ccsText, "", "", $this->CLOSED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_BACKUP"] = new clsSQLParameter("ctrlIS_BACKUP", ccsText, "", "", $this->IS_BACKUP->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BACKUP_DATE"] = new clsSQLParameter("ctrlBACKUP_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->BACKUP_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BACKUP_BY"] = new clsSQLParameter("ctrlBACKUP_BY", ccsText, "", "", $this->BACKUP_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BACKUP_FILE"] = new clsSQLParameter("ctrlBACKUP_FILE", ccsText, "", "", $this->BACKUP_FILE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BACKUP_DIR"] = new clsSQLParameter("ctrlBACKUP_DIR", ccsText, "", "", $this->BACKUP_DIR->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_RELEASED"] = new clsSQLParameter("ctrlIS_RELEASED", ccsText, "", "", $this->IS_RELEASED->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RELEASED_DATE"] = new clsSQLParameter("ctrlRELEASED_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->RELEASED_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RELEASED_BY"] = new clsSQLParameter("ctrlRELEASED_BY", ccsText, "", "", $this->RELEASED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["INPUT_DATA_CONTROL_ID"] = new clsSQLParameter("ctrlINPUT_DATA_CONTROL_ID", ccsFloat, "", "", $this->INPUT_DATA_CONTROL_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["INPUT_FILE_NAME"]->GetValue()) and !strlen($this->cp["INPUT_FILE_NAME"]->GetText()) and !is_bool($this->cp["INPUT_FILE_NAME"]->GetValue())) 
            $this->cp["INPUT_FILE_NAME"]->SetValue($this->INPUT_FILE_NAME->GetValue(true));
        if (!is_null($this->cp["INPUT_DATA_CLASS_ID"]->GetValue()) and !strlen($this->cp["INPUT_DATA_CLASS_ID"]->GetText()) and !is_bool($this->cp["INPUT_DATA_CLASS_ID"]->GetValue())) 
            $this->cp["INPUT_DATA_CLASS_ID"]->SetValue($this->P_BATCH_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["INPUT_DATA_CLASS_ID"]->GetText()) and !is_bool($this->cp["INPUT_DATA_CLASS_ID"]->GetValue(true))) 
            $this->cp["INPUT_DATA_CLASS_ID"]->SetText(0);
        if (!is_null($this->cp["P_FINANCE_PERIOD_ID"]->GetValue()) and !strlen($this->cp["P_FINANCE_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_FINANCE_PERIOD_ID"]->GetValue())) 
            $this->cp["P_FINANCE_PERIOD_ID"]->SetValue($this->P_FINANCE_PERIOD_ID->GetValue(true));
        if (!strlen($this->cp["P_FINANCE_PERIOD_ID"]->GetText()) and !is_bool($this->cp["P_FINANCE_PERIOD_ID"]->GetValue(true))) 
            $this->cp["P_FINANCE_PERIOD_ID"]->SetText(0);
        if (!is_null($this->cp["P_BILL_CYCLE_ID"]->GetValue()) and !strlen($this->cp["P_BILL_CYCLE_ID"]->GetText()) and !is_bool($this->cp["P_BILL_CYCLE_ID"]->GetValue())) 
            $this->cp["P_BILL_CYCLE_ID"]->SetValue($this->P_BILL_CYCLE_ID->GetValue(true));
        if (!strlen($this->cp["P_BILL_CYCLE_ID"]->GetText()) and !is_bool($this->cp["P_BILL_CYCLE_ID"]->GetValue(true))) 
            $this->cp["P_BILL_CYCLE_ID"]->SetText(0);
        if (!is_null($this->cp["DATA_STATUS_ID"]->GetValue()) and !strlen($this->cp["DATA_STATUS_ID"]->GetText()) and !is_bool($this->cp["DATA_STATUS_ID"]->GetValue())) 
            $this->cp["DATA_STATUS_ID"]->SetValue($this->DATA_STATUS_ID->GetValue(true));
        if (!strlen($this->cp["DATA_STATUS_ID"]->GetText()) and !is_bool($this->cp["DATA_STATUS_ID"]->GetValue(true))) 
            $this->cp["DATA_STATUS_ID"]->SetText(null);
        if (!is_null($this->cp["FILE_DIRECTORY"]->GetValue()) and !strlen($this->cp["FILE_DIRECTORY"]->GetText()) and !is_bool($this->cp["FILE_DIRECTORY"]->GetValue())) 
            $this->cp["FILE_DIRECTORY"]->SetValue($this->FILE_DIRECTORY->GetValue(true));
        if (!is_null($this->cp["IS_FINISH_PROCESSED"]->GetValue()) and !strlen($this->cp["IS_FINISH_PROCESSED"]->GetText()) and !is_bool($this->cp["IS_FINISH_PROCESSED"]->GetValue())) 
            $this->cp["IS_FINISH_PROCESSED"]->SetValue($this->IS_FINISH_PROCESSED->GetValue(true));
        if (!is_null($this->cp["FILE_DATE"]->GetValue()) and !strlen($this->cp["FILE_DATE"]->GetText()) and !is_bool($this->cp["FILE_DATE"]->GetValue())) 
            $this->cp["FILE_DATE"]->SetValue($this->FILE_DATE->GetValue(true));
        if (!strlen($this->cp["FILE_DATE"]->GetText()) and !is_bool($this->cp["FILE_DATE"]->GetValue(true))) 
            $this->cp["FILE_DATE"]->SetText("");
        if (!is_null($this->cp["FILE_SIZE"]->GetValue()) and !strlen($this->cp["FILE_SIZE"]->GetText()) and !is_bool($this->cp["FILE_SIZE"]->GetValue())) 
            $this->cp["FILE_SIZE"]->SetValue($this->FILE_SIZE->GetValue(true));
        if (!strlen($this->cp["FILE_SIZE"]->GetText()) and !is_bool($this->cp["FILE_SIZE"]->GetValue(true))) 
            $this->cp["FILE_SIZE"]->SetText(null);
        if (!is_null($this->cp["INVOICE_DATE"]->GetValue()) and !strlen($this->cp["INVOICE_DATE"]->GetText()) and !is_bool($this->cp["INVOICE_DATE"]->GetValue())) 
            $this->cp["INVOICE_DATE"]->SetValue($this->INVOICE_DATE->GetValue(true));
        if (!strlen($this->cp["INVOICE_DATE"]->GetText()) and !is_bool($this->cp["INVOICE_DATE"]->GetValue(true))) 
            $this->cp["INVOICE_DATE"]->SetText("");
        if (!is_null($this->cp["BILL_AMT"]->GetValue()) and !strlen($this->cp["BILL_AMT"]->GetText()) and !is_bool($this->cp["BILL_AMT"]->GetValue())) 
            $this->cp["BILL_AMT"]->SetValue($this->BILL_AMT->GetValue(true));
        if (!strlen($this->cp["BILL_AMT"]->GetText()) and !is_bool($this->cp["BILL_AMT"]->GetValue(true))) 
            $this->cp["BILL_AMT"]->SetText(0);
        if (!is_null($this->cp["INVOICE_AMT"]->GetValue()) and !strlen($this->cp["INVOICE_AMT"]->GetText()) and !is_bool($this->cp["INVOICE_AMT"]->GetValue())) 
            $this->cp["INVOICE_AMT"]->SetValue($this->INVOICE_AMT->GetValue(true));
        if (!strlen($this->cp["INVOICE_AMT"]->GetText()) and !is_bool($this->cp["INVOICE_AMT"]->GetValue(true))) 
            $this->cp["INVOICE_AMT"]->SetText(0);
        if (!is_null($this->cp["IS_CLOSED"]->GetValue()) and !strlen($this->cp["IS_CLOSED"]->GetText()) and !is_bool($this->cp["IS_CLOSED"]->GetValue())) 
            $this->cp["IS_CLOSED"]->SetValue($this->IS_CLOSED->GetValue(true));
        if (!is_null($this->cp["CLOSING_DATE"]->GetValue()) and !strlen($this->cp["CLOSING_DATE"]->GetText()) and !is_bool($this->cp["CLOSING_DATE"]->GetValue())) 
            $this->cp["CLOSING_DATE"]->SetValue($this->CLOSING_DATE->GetValue(true));
        if (!strlen($this->cp["CLOSING_DATE"]->GetText()) and !is_bool($this->cp["CLOSING_DATE"]->GetValue(true))) 
            $this->cp["CLOSING_DATE"]->SetText("");
        if (!is_null($this->cp["CLOSED_BY"]->GetValue()) and !strlen($this->cp["CLOSED_BY"]->GetText()) and !is_bool($this->cp["CLOSED_BY"]->GetValue())) 
            $this->cp["CLOSED_BY"]->SetValue($this->CLOSED_BY->GetValue(true));
        if (!is_null($this->cp["IS_BACKUP"]->GetValue()) and !strlen($this->cp["IS_BACKUP"]->GetText()) and !is_bool($this->cp["IS_BACKUP"]->GetValue())) 
            $this->cp["IS_BACKUP"]->SetValue($this->IS_BACKUP->GetValue(true));
        if (!is_null($this->cp["BACKUP_DATE"]->GetValue()) and !strlen($this->cp["BACKUP_DATE"]->GetText()) and !is_bool($this->cp["BACKUP_DATE"]->GetValue())) 
            $this->cp["BACKUP_DATE"]->SetValue($this->BACKUP_DATE->GetValue(true));
        if (!strlen($this->cp["BACKUP_DATE"]->GetText()) and !is_bool($this->cp["BACKUP_DATE"]->GetValue(true))) 
            $this->cp["BACKUP_DATE"]->SetText("");
        if (!is_null($this->cp["BACKUP_BY"]->GetValue()) and !strlen($this->cp["BACKUP_BY"]->GetText()) and !is_bool($this->cp["BACKUP_BY"]->GetValue())) 
            $this->cp["BACKUP_BY"]->SetValue($this->BACKUP_BY->GetValue(true));
        if (!is_null($this->cp["BACKUP_FILE"]->GetValue()) and !strlen($this->cp["BACKUP_FILE"]->GetText()) and !is_bool($this->cp["BACKUP_FILE"]->GetValue())) 
            $this->cp["BACKUP_FILE"]->SetValue($this->BACKUP_FILE->GetValue(true));
        if (!is_null($this->cp["BACKUP_DIR"]->GetValue()) and !strlen($this->cp["BACKUP_DIR"]->GetText()) and !is_bool($this->cp["BACKUP_DIR"]->GetValue())) 
            $this->cp["BACKUP_DIR"]->SetValue($this->BACKUP_DIR->GetValue(true));
        if (!is_null($this->cp["IS_RELEASED"]->GetValue()) and !strlen($this->cp["IS_RELEASED"]->GetText()) and !is_bool($this->cp["IS_RELEASED"]->GetValue())) 
            $this->cp["IS_RELEASED"]->SetValue($this->IS_RELEASED->GetValue(true));
        if (!is_null($this->cp["RELEASED_DATE"]->GetValue()) and !strlen($this->cp["RELEASED_DATE"]->GetText()) and !is_bool($this->cp["RELEASED_DATE"]->GetValue())) 
            $this->cp["RELEASED_DATE"]->SetValue($this->RELEASED_DATE->GetValue(true));
        if (!strlen($this->cp["RELEASED_DATE"]->GetText()) and !is_bool($this->cp["RELEASED_DATE"]->GetValue(true))) 
            $this->cp["RELEASED_DATE"]->SetText("");
        if (!is_null($this->cp["RELEASED_BY"]->GetValue()) and !strlen($this->cp["RELEASED_BY"]->GetText()) and !is_bool($this->cp["RELEASED_BY"]->GetValue())) 
            $this->cp["RELEASED_BY"]->SetValue($this->RELEASED_BY->GetValue(true));
        if (!is_null($this->cp["INPUT_DATA_CONTROL_ID"]->GetValue()) and !strlen($this->cp["INPUT_DATA_CONTROL_ID"]->GetText()) and !is_bool($this->cp["INPUT_DATA_CONTROL_ID"]->GetValue())) 
            $this->cp["INPUT_DATA_CONTROL_ID"]->SetValue($this->INPUT_DATA_CONTROL_ID->GetValue(true));
        if (!strlen($this->cp["INPUT_DATA_CONTROL_ID"]->GetText()) and !is_bool($this->cp["INPUT_DATA_CONTROL_ID"]->GetValue(true))) 
            $this->cp["INPUT_DATA_CONTROL_ID"]->SetText(0);
        $this->SQL = "/* Formatted on 20/10/2014 11:16:27 (QP5 v5.139.911.3011) */\n" .
        "UPDATE INPUT_DATA_CONTROL\n" .
        "SET INPUT_FILE_NAME = '" . $this->SQLValue($this->cp["INPUT_FILE_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "    INPUT_DATA_CLASS_ID = " . $this->SQLValue($this->cp["INPUT_DATA_CLASS_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "    P_FINANCE_PERIOD_ID = " . $this->SQLValue($this->cp["P_FINANCE_PERIOD_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "    P_BILL_CYCLE_ID = " . $this->SQLValue($this->cp["P_BILL_CYCLE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "    DATA_STATUS_ID = " . $this->SQLValue($this->cp["DATA_STATUS_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "    FILE_DIRECTORY =  '" . $this->SQLValue($this->cp["FILE_DIRECTORY"]->GetDBValue(), ccsText) . "',\n" .
        "    IS_FINISH_PROCESSED = '" . $this->SQLValue($this->cp["IS_FINISH_PROCESSED"]->GetDBValue(), ccsText) . "',\n" .
        "    FILE_DATE =  '" . $this->SQLValue($this->cp["FILE_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "    FILE_SIZE = " . $this->SQLValue($this->cp["FILE_SIZE"]->GetDBValue(), ccsFloat) . ", \n" .
        "    INVOICE_DATE = to_date(substr('" . $this->SQLValue($this->cp["INVOICE_DATE"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'), \n" .
        "    BILL_AMT = " . $this->SQLValue($this->cp["BILL_AMT"]->GetDBValue(), ccsFloat) . ", \n" .
        "    INVOICE_AMT = " . $this->SQLValue($this->cp["INVOICE_AMT"]->GetDBValue(), ccsFloat) . ",\n" .
        "    IS_CLOSED =  '" . $this->SQLValue($this->cp["IS_CLOSED"]->GetDBValue(), ccsText) . "', \n" .
        "    CLOSING_DATE = '" . $this->SQLValue($this->cp["CLOSING_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "    CLOSED_BY = '" . $this->SQLValue($this->cp["CLOSED_BY"]->GetDBValue(), ccsText) . "', \n" .
        "    IS_BACKUP = '" . $this->SQLValue($this->cp["IS_BACKUP"]->GetDBValue(), ccsText) . "', \n" .
        "    BACKUP_DATE = '" . $this->SQLValue($this->cp["BACKUP_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "    BACKUP_BY = '" . $this->SQLValue($this->cp["BACKUP_BY"]->GetDBValue(), ccsText) . "', \n" .
        "    BACKUP_FILE = '" . $this->SQLValue($this->cp["BACKUP_FILE"]->GetDBValue(), ccsText) . "', \n" .
        "    BACKUP_DIR = '" . $this->SQLValue($this->cp["BACKUP_DIR"]->GetDBValue(), ccsText) . "', \n" .
        "    IS_RELEASED = '" . $this->SQLValue($this->cp["IS_RELEASED"]->GetDBValue(), ccsText) . "', \n" .
        "    RELEASED_DATE = '" . $this->SQLValue($this->cp["RELEASED_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "    RELEASED_BY = '" . $this->SQLValue($this->cp["RELEASED_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE INPUT_DATA_CONTROL_ID = " . $this->SQLValue($this->cp["INPUT_DATA_CONTROL_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @19-4356E761
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["INPUT_DATA_CONTROL_ID"] = new clsSQLParameter("ctrlINPUT_DATA_CONTROL_ID", ccsFloat, "", "", $this->INPUT_DATA_CONTROL_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["INPUT_DATA_CONTROL_ID"]->GetValue()) and !strlen($this->cp["INPUT_DATA_CONTROL_ID"]->GetText()) and !is_bool($this->cp["INPUT_DATA_CONTROL_ID"]->GetValue())) 
            $this->cp["INPUT_DATA_CONTROL_ID"]->SetValue($this->INPUT_DATA_CONTROL_ID->GetValue(true));
        if (!strlen($this->cp["INPUT_DATA_CONTROL_ID"]->GetText()) and !is_bool($this->cp["INPUT_DATA_CONTROL_ID"]->GetValue(true))) 
            $this->cp["INPUT_DATA_CONTROL_ID"]->SetText(0);
        $this->SQL = "DELETE \n" .
        "FROM INPUT_DATA_CONTROL\n" .
        "WHERE  INPUT_DATA_CONTROL_ID = " . $this->SQLValue($this->cp["INPUT_DATA_CONTROL_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End BATCH1DataSource Class @19-FCB6E20C

class clsGridV_INPUT_DATA_CONTROL_BILL { //V_INPUT_DATA_CONTROL_BILL class @282-2C9AEA3F

//Variables @282-AC1EDBB9

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

//Class_Initialize Event @282-70AB317A
    function clsGridV_INPUT_DATA_CONTROL_BILL($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "V_INPUT_DATA_CONTROL_BILL";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid V_INPUT_DATA_CONTROL_BILL";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsV_INPUT_DATA_CONTROL_BILLDataSource($this);
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
        $this->CREATION_DATE = & new clsControl(ccsLabel, "CREATION_DATE", "CREATION_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", ccsGet, NULL), $this);
        $this->OPERATOR_ID = & new clsControl(ccsLabel, "OPERATOR_ID", "OPERATOR_ID", ccsText, "", CCGetRequestParam("OPERATOR_ID", ccsGet, NULL), $this);
        $this->INVOICE_DATE = & new clsControl(ccsLabel, "INVOICE_DATE", "INVOICE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("INVOICE_DATE", ccsGet, NULL), $this);
        $this->BILL_AMT = & new clsControl(ccsLabel, "BILL_AMT", "BILL_AMT", ccsFloat, "", CCGetRequestParam("BILL_AMT", ccsGet, NULL), $this);
        $this->CLOSING_DATE = & new clsControl(ccsLabel, "CLOSING_DATE", "CLOSING_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CLOSING_DATE", ccsGet, NULL), $this);
        $this->CLOSED_BY = & new clsControl(ccsLabel, "CLOSED_BY", "CLOSED_BY", ccsText, "", CCGetRequestParam("CLOSED_BY", ccsGet, NULL), $this);
        $this->BATCH_TYPE = & new clsControl(ccsLabel, "BATCH_TYPE", "BATCH_TYPE", ccsText, "", CCGetRequestParam("BATCH_TYPE", ccsGet, NULL), $this);
        $this->FINANCE_PERIOD_CODE = & new clsControl(ccsLabel, "FINANCE_PERIOD_CODE", "FINANCE_PERIOD_CODE", ccsText, "", CCGetRequestParam("FINANCE_PERIOD_CODE", ccsGet, NULL), $this);
        $this->BILL_CYCLE_CODE = & new clsControl(ccsLabel, "BILL_CYCLE_CODE", "BILL_CYCLE_CODE", ccsText, "", CCGetRequestParam("BILL_CYCLE_CODE", ccsGet, NULL), $this);
        $this->BILL_STATUS = & new clsControl(ccsLabel, "BILL_STATUS", "BILL_STATUS", ccsText, "", CCGetRequestParam("BILL_STATUS", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "closing_billing.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "closing_billing.php";
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->BATCH_Insert1 = & new clsControl(ccsLink, "BATCH_Insert1", "BATCH_Insert1", ccsText, "", CCGetRequestParam("BATCH_Insert1", ccsGet, NULL), $this);
        $this->BATCH_Insert1->HTML = true;
        $this->BATCH_Insert1->Page = "closing_billing.php";
    }
//End Class_Initialize Event

//Initialize Method @282-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @282-F82A2415
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
            $this->ControlsVisible["INPUT_DATA_CONTROL_ID"] = $this->INPUT_DATA_CONTROL_ID->Visible;
            $this->ControlsVisible["CREATION_DATE"] = $this->CREATION_DATE->Visible;
            $this->ControlsVisible["OPERATOR_ID"] = $this->OPERATOR_ID->Visible;
            $this->ControlsVisible["INVOICE_DATE"] = $this->INVOICE_DATE->Visible;
            $this->ControlsVisible["BILL_AMT"] = $this->BILL_AMT->Visible;
            $this->ControlsVisible["CLOSING_DATE"] = $this->CLOSING_DATE->Visible;
            $this->ControlsVisible["CLOSED_BY"] = $this->CLOSED_BY->Visible;
            $this->ControlsVisible["BATCH_TYPE"] = $this->BATCH_TYPE->Visible;
            $this->ControlsVisible["FINANCE_PERIOD_CODE"] = $this->FINANCE_PERIOD_CODE->Visible;
            $this->ControlsVisible["BILL_CYCLE_CODE"] = $this->BILL_CYCLE_CODE->Visible;
            $this->ControlsVisible["BILL_STATUS"] = $this->BILL_STATUS->Visible;
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
                $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                $this->OPERATOR_ID->SetValue($this->DataSource->OPERATOR_ID->GetValue());
                $this->INVOICE_DATE->SetValue($this->DataSource->INVOICE_DATE->GetValue());
                $this->BILL_AMT->SetValue($this->DataSource->BILL_AMT->GetValue());
                $this->CLOSING_DATE->SetValue($this->DataSource->CLOSING_DATE->GetValue());
                $this->CLOSED_BY->SetValue($this->DataSource->CLOSED_BY->GetValue());
                $this->BATCH_TYPE->SetValue($this->DataSource->BATCH_TYPE->GetValue());
                $this->FINANCE_PERIOD_CODE->SetValue($this->DataSource->FINANCE_PERIOD_CODE->GetValue());
                $this->BILL_CYCLE_CODE->SetValue($this->DataSource->BILL_CYCLE_CODE->GetValue());
                $this->BILL_STATUS->SetValue($this->DataSource->BILL_STATUS->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "INPUT_DATA_CONTROL_ID", $this->DataSource->f("INPUT_DATA_CONTROL_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "INPUT_DATA_CONTROL_ID", $this->DataSource->f("INPUT_DATA_CONTROL_ID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->INPUT_DATA_CONTROL_ID->Show();
                $this->CREATION_DATE->Show();
                $this->OPERATOR_ID->Show();
                $this->INVOICE_DATE->Show();
                $this->BILL_AMT->Show();
                $this->CLOSING_DATE->Show();
                $this->CLOSED_BY->Show();
                $this->BATCH_TYPE->Show();
                $this->FINANCE_PERIOD_CODE->Show();
                $this->BILL_CYCLE_CODE->Show();
                $this->BILL_STATUS->Show();
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
        $this->BATCH_Insert1->SetValue($this->DataSource->BATCH_Insert1->GetValue());
        $this->BATCH_Insert1->Parameters = CCGetQueryString("QueryString", array("INPUT_DATA_CONTROL_ID", "FLAG", "s_keyword", "ccsForm"));
        $this->BATCH_Insert1->Parameters = CCAddParam($this->BATCH_Insert1->Parameters, "INPUT_DATA_CONTROL_ID", $this->DataSource->f("INPUT_DATA_CONTROL_ID"));
        $this->Navigator->Show();
        $this->BATCH_Insert1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @282-26C33727
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->INPUT_DATA_CONTROL_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CREATION_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OPERATOR_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->INVOICE_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_AMT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CLOSING_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CLOSED_BY->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BATCH_TYPE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FINANCE_PERIOD_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_CYCLE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_STATUS->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End V_INPUT_DATA_CONTROL_BILL Class @282-FCB6E20C

class clsV_INPUT_DATA_CONTROL_BILLDataSource extends clsDBConn {  //V_INPUT_DATA_CONTROL_BILLDataSource Class @282-EBED15E8

//DataSource Variables @282-EA61E1EC
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $INPUT_DATA_CONTROL_ID;
    var $CREATION_DATE;
    var $OPERATOR_ID;
    var $INVOICE_DATE;
    var $BILL_AMT;
    var $CLOSING_DATE;
    var $CLOSED_BY;
    var $BATCH_TYPE;
    var $FINANCE_PERIOD_CODE;
    var $BILL_CYCLE_CODE;
    var $BILL_STATUS;
    var $DLink;
    var $ADLink;
    var $BATCH_Insert1;
//End DataSource Variables

//DataSourceClass_Initialize Event @282-8B19D098
    function clsV_INPUT_DATA_CONTROL_BILLDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid V_INPUT_DATA_CONTROL_BILL";
        $this->Initialize();
        $this->INPUT_DATA_CONTROL_ID = new clsField("INPUT_DATA_CONTROL_ID", ccsFloat, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->OPERATOR_ID = new clsField("OPERATOR_ID", ccsText, "");
        
        $this->INVOICE_DATE = new clsField("INVOICE_DATE", ccsDate, $this->DateFormat);
        
        $this->BILL_AMT = new clsField("BILL_AMT", ccsFloat, "");
        
        $this->CLOSING_DATE = new clsField("CLOSING_DATE", ccsDate, $this->DateFormat);
        
        $this->CLOSED_BY = new clsField("CLOSED_BY", ccsText, "");
        
        $this->BATCH_TYPE = new clsField("BATCH_TYPE", ccsText, "");
        
        $this->FINANCE_PERIOD_CODE = new clsField("FINANCE_PERIOD_CODE", ccsText, "");
        
        $this->BILL_CYCLE_CODE = new clsField("BILL_CYCLE_CODE", ccsText, "");
        
        $this->BILL_STATUS = new clsField("BILL_STATUS", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->BATCH_Insert1 = new clsField("BATCH_Insert1", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @282-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @282-25AA94A2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
    }
//End Prepare Method

//Open Method @282-FB1DAF5A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM v_idc_bill_close\n" .
        "WHERE BATCH_TYPE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' OR\n" .
        "	FINANCE_PERIOD_CODE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' OR\n" .
        "	to_char(INVOICE_DATE,'dd-MON-yyyy') LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' OR\n" .
        "	BILL_CYCLE_CODE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' OR\n" .
        "	BILL_STATUS LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' OR\n" .
        "	BILL_AMT = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' OR\n" .
        "	TO_CHAR(CLOSING_DATE,'dd-MON-yyyy') LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        ") cnt";
        $this->SQL = "SELECT * \n" .
        "FROM v_idc_bill_close\n" .
        "WHERE BATCH_TYPE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' OR\n" .
        "	FINANCE_PERIOD_CODE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' OR\n" .
        "	to_char(INVOICE_DATE,'dd-MON-yyyy') LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' OR\n" .
        "	BILL_CYCLE_CODE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' OR\n" .
        "	BILL_STATUS LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' OR\n" .
        "	BILL_AMT = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' OR\n" .
        "	TO_CHAR(CLOSING_DATE,'dd-MON-yyyy') LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
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

//SetValues Method @282-88B2D503
    function SetValues()
    {
        $this->INPUT_DATA_CONTROL_ID->SetDBValue(trim($this->f("INPUT_DATA_CONTROL_ID")));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->OPERATOR_ID->SetDBValue($this->f("OPERATOR_ID"));
        $this->INVOICE_DATE->SetDBValue(trim($this->f("INVOICE_DATE")));
        $this->BILL_AMT->SetDBValue(trim($this->f("BILL_AMT")));
        $this->CLOSING_DATE->SetDBValue(trim($this->f("CLOSING_DATE")));
        $this->CLOSED_BY->SetDBValue($this->f("CLOSED_BY"));
        $this->BATCH_TYPE->SetDBValue($this->f("BATCH_TYPE"));
        $this->FINANCE_PERIOD_CODE->SetDBValue($this->f("FINANCE_PERIOD_CODE"));
        $this->BILL_CYCLE_CODE->SetDBValue($this->f("BILL_CYCLE_CODE"));
        $this->BILL_STATUS->SetDBValue($this->f("BILL_STATUS"));
        $this->DLink->SetDBValue($this->f("INPUT_DATA_CONTROL_ID"));
        $this->ADLink->SetDBValue($this->f("INPUT_DATA_CONTROL_ID"));
        $this->BATCH_Insert1->SetDBValue($this->f("INPUT_DATA_CONTROL_ID"));
    }
//End SetValues Method

} //End V_INPUT_DATA_CONTROL_BILLDataSource Class @282-FCB6E20C

//Initialize Page @1-7713BB21
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
$TemplateFileName = "closing_billing.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-85E1C220
include_once("./closing_billing_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-A9C3C6E6
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$BATCHSearch = & new clsRecordBATCHSearch("", $MainPage);
$BATCH1 = & new clsRecordBATCH1("", $MainPage);
$V_INPUT_DATA_CONTROL_BILL = & new clsGridV_INPUT_DATA_CONTROL_BILL("", $MainPage);
$MainPage->BATCHSearch = & $BATCHSearch;
$MainPage->BATCH1 = & $BATCH1;
$MainPage->V_INPUT_DATA_CONTROL_BILL = & $V_INPUT_DATA_CONTROL_BILL;
$BATCH1->Initialize();
$V_INPUT_DATA_CONTROL_BILL->Initialize();

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

//Execute Components @1-3077A6AB
$BATCHSearch->Operation();
$BATCH1->Operation();
//End Execute Components

//Go to destination page @1-4DE92394
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($BATCHSearch);
    unset($BATCH1);
    unset($V_INPUT_DATA_CONTROL_BILL);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-4F44E824
$BATCHSearch->Show();
$BATCH1->Show();
$V_INPUT_DATA_CONTROL_BILL->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-5C2E6BDE
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($BATCHSearch);
unset($BATCH1);
unset($V_INPUT_DATA_CONTROL_BILL);
unset($Tpl);
//End Unload Page


?>
