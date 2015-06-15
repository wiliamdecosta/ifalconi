<?php
//Include Common Files @1-11E46B8A
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_report/");
define("FileName", "R_STAMP_DUTY.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordR_STAMP_DUTYSearch { //R_STAMP_DUTYSearch Class @3-27210A79

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

//Class_Initialize Event @3-288B6582
    function clsRecordR_STAMP_DUTYSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record R_STAMP_DUTYSearch/Error";
        $this->DataSource = new clsR_STAMP_DUTYSearchDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "R_STAMP_DUTYSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->Invoice_date = & new clsControl(ccsTextBox, "Invoice_date", "Invoice_date", ccsDate, array("dd", "/", "mm", "/", "yyyy"), CCGetRequestParam("Invoice_date", $Method, NULL), $this);
            $this->bill_cycle_code = & new clsControl(ccsTextBox, "bill_cycle_code", "bill_cycle_code", ccsText, "", CCGetRequestParam("bill_cycle_code", $Method, NULL), $this);
            $this->finance_period_code = & new clsControl(ccsTextBox, "finance_period_code", "finance_period_code", ccsText, "", CCGetRequestParam("finance_period_code", $Method, NULL), $this);
            $this->INPUT_DATA_CONTROL_ID = & new clsControl(ccsTextBox, "INPUT_DATA_CONTROL_ID", "INPUT_DATA_CONTROL_ID", ccsText, "", CCGetRequestParam("INPUT_DATA_CONTROL_ID", $Method, NULL), $this);
            $this->CURRENCY_CODE = & new clsControl(ccsListBox, "CURRENCY_CODE", "CURRENCY_CODE", ccsText, "", CCGetRequestParam("CURRENCY_CODE", $Method, NULL), $this);
            $this->CURRENCY_CODE->DSType = dsTable;
            $this->CURRENCY_CODE->DataSource = new clsDBConn();
            $this->CURRENCY_CODE->ds = & $this->CURRENCY_CODE->DataSource;
            $this->CURRENCY_CODE->DataSource->SQL = "SELECT * \n" .
"FROM P_CURRENCY {SQL_Where} {SQL_OrderBy}";
            list($this->CURRENCY_CODE->BoundColumn, $this->CURRENCY_CODE->TextColumn, $this->CURRENCY_CODE->DBFormat) = array("P_CURRENCY_ID", "CODE", "");
        }
    }
//End Class_Initialize Event

//Initialize Method @3-ED4422A5
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlINPUT_DATA_CONTROL_ID"] = CCGetFromGet("INPUT_DATA_CONTROL_ID", NULL);
    }
//End Initialize Method

//Validate Method @3-60426EE5
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Invoice_date->Validate() && $Validation);
        $Validation = ($this->bill_cycle_code->Validate() && $Validation);
        $Validation = ($this->finance_period_code->Validate() && $Validation);
        $Validation = ($this->INPUT_DATA_CONTROL_ID->Validate() && $Validation);
        $Validation = ($this->CURRENCY_CODE->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Invoice_date->Errors->Count() == 0);
        $Validation =  $Validation && ($this->bill_cycle_code->Errors->Count() == 0);
        $Validation =  $Validation && ($this->finance_period_code->Errors->Count() == 0);
        $Validation =  $Validation && ($this->INPUT_DATA_CONTROL_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CURRENCY_CODE->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-305511EC
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Invoice_date->Errors->Count());
        $errors = ($errors || $this->bill_cycle_code->Errors->Count());
        $errors = ($errors || $this->finance_period_code->Errors->Count());
        $errors = ($errors || $this->INPUT_DATA_CONTROL_ID->Errors->Count());
        $errors = ($errors || $this->CURRENCY_CODE->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
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

//Operation Method @3-019CEB79
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
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "R_STAMP_DUTY.php" . "?" . CCGetQueryString("All", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "R_STAMP_DUTY.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y", "TAMBAH", "BATCH_CONTROL_ID")), CCGetQueryString("QueryString", array("Invoice_date", "bill_cycle_code", "finance_period_code", "INPUT_DATA_CONTROL_ID", "CURRENCY_CODE", "ccsForm", "TAMBAH", "BATCH_CONTROL_ID")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
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

//Show Method @3-D9C8FCF3
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

        $this->CURRENCY_CODE->Prepare();

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
                    $this->Invoice_date->SetValue($this->DataSource->Invoice_date->GetValue());
                    $this->bill_cycle_code->SetValue($this->DataSource->bill_cycle_code->GetValue());
                    $this->finance_period_code->SetValue($this->DataSource->finance_period_code->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Invoice_date->Errors->ToString());
            $Error = ComposeStrings($Error, $this->bill_cycle_code->Errors->ToString());
            $Error = ComposeStrings($Error, $this->finance_period_code->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INPUT_DATA_CONTROL_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CURRENCY_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
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

        $this->Button_DoSearch->Show();
        $this->Invoice_date->Show();
        $this->bill_cycle_code->Show();
        $this->finance_period_code->Show();
        $this->INPUT_DATA_CONTROL_ID->Show();
        $this->CURRENCY_CODE->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End R_STAMP_DUTYSearch Class @3-FCB6E20C

class clsR_STAMP_DUTYSearchDataSource extends clsDBConn {  //R_STAMP_DUTYSearchDataSource Class @3-70405043

//DataSource Variables @3-7312EA98
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;
    var $AllParametersSet;


    // Datasource fields
    var $Invoice_date;
    var $bill_cycle_code;
    var $finance_period_code;
    var $INPUT_DATA_CONTROL_ID;
    var $CURRENCY_CODE;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-05816225
    function clsR_STAMP_DUTYSearchDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record R_STAMP_DUTYSearch/Error";
        $this->Initialize();
        $this->Invoice_date = new clsField("Invoice_date", ccsDate, $this->DateFormat);
        
        $this->bill_cycle_code = new clsField("bill_cycle_code", ccsText, "");
        
        $this->finance_period_code = new clsField("finance_period_code", ccsText, "");
        
        $this->INPUT_DATA_CONTROL_ID = new clsField("INPUT_DATA_CONTROL_ID", ccsText, "");
        
        $this->CURRENCY_CODE = new clsField("CURRENCY_CODE", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @3-C7BC9C0B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlINPUT_DATA_CONTROL_ID", ccsFloat, "", "", $this->Parameters["urlINPUT_DATA_CONTROL_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "INPUT_DATA_CONTROL_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @3-75A05C9B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_INPUT_DATA_CONTROL_BILL {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-1CED2FA9
    function SetValues()
    {
        $this->Invoice_date->SetDBValue(trim($this->f("INVOICE_DATE")));
        $this->bill_cycle_code->SetDBValue($this->f("BILL_CYCLE_CODE"));
        $this->finance_period_code->SetDBValue($this->f("FINANCE_PERIOD_CODE"));
    }
//End SetValues Method

} //End R_STAMP_DUTYSearchDataSource Class @3-FCB6E20C

class clsGridR_STAMP_DUTYGrid { //R_STAMP_DUTYGrid class @282-800D93C3

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

//Class_Initialize Event @282-B80CF859
    function clsGridR_STAMP_DUTYGrid($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "R_STAMP_DUTYGrid";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid R_STAMP_DUTYGrid";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsR_STAMP_DUTYGridDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 15;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->BUSINESS_AREA_NAME = & new clsControl(ccsLabel, "BUSINESS_AREA_NAME", "BUSINESS_AREA_NAME", ccsText, "", CCGetRequestParam("BUSINESS_AREA_NAME", ccsGet, NULL), $this);
        $this->STAMP_DUTY_QTY_1 = & new clsControl(ccsLabel, "STAMP_DUTY_QTY_1", "STAMP_DUTY_QTY_1", ccsText, "", CCGetRequestParam("STAMP_DUTY_QTY_1", ccsGet, NULL), $this);
        $this->DEBTOR_SEGMENT_CODE = & new clsControl(ccsLabel, "DEBTOR_SEGMENT_CODE", "DEBTOR_SEGMENT_CODE", ccsText, "", CCGetRequestParam("DEBTOR_SEGMENT_CODE", ccsGet, NULL), $this);
        $this->SERVICE_QTY = & new clsControl(ccsLabel, "SERVICE_QTY", "SERVICE_QTY", ccsText, "", CCGetRequestParam("SERVICE_QTY", ccsGet, NULL), $this);
        $this->STAMP_DUTY_QTY_2 = & new clsControl(ccsLabel, "STAMP_DUTY_QTY_2", "STAMP_DUTY_QTY_2", ccsText, "", CCGetRequestParam("STAMP_DUTY_QTY_2", ccsGet, NULL), $this);
        $this->STAMP_DUTY_AMOUNT = & new clsControl(ccsLabel, "STAMP_DUTY_AMOUNT", "STAMP_DUTY_AMOUNT", ccsText, "", CCGetRequestParam("STAMP_DUTY_AMOUNT", ccsGet, NULL), $this);
        $this->VAT_AMOUNT = & new clsControl(ccsLabel, "VAT_AMOUNT", "VAT_AMOUNT", ccsText, "", CCGetRequestParam("VAT_AMOUNT", ccsGet, NULL), $this);
        $this->SERVICE_TYPE_CODE = & new clsControl(ccsLabel, "SERVICE_TYPE_CODE", "SERVICE_TYPE_CODE", ccsFloat, "", CCGetRequestParam("SERVICE_TYPE_CODE", ccsGet, NULL), $this);
        $this->BILL_COMPONENT_CODE = & new clsControl(ccsLabel, "BILL_COMPONENT_CODE", "BILL_COMPONENT_CODE", ccsText, "", CCGetRequestParam("BILL_COMPONENT_CODE", ccsGet, NULL), $this);
        $this->CHARGE_AMOUNT = & new clsControl(ccsLabel, "CHARGE_AMOUNT", "CHARGE_AMOUNT", ccsText, "", CCGetRequestParam("CHARGE_AMOUNT", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
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

//Show Method @282-79621F16
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlINPUT_DATA_CONTROL_ID"] = CCGetFromGet("INPUT_DATA_CONTROL_ID", NULL);
        $this->DataSource->Parameters["urlCURRENCY_CODE"] = CCGetFromGet("CURRENCY_CODE", NULL);

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
            $this->ControlsVisible["BUSINESS_AREA_NAME"] = $this->BUSINESS_AREA_NAME->Visible;
            $this->ControlsVisible["STAMP_DUTY_QTY_1"] = $this->STAMP_DUTY_QTY_1->Visible;
            $this->ControlsVisible["DEBTOR_SEGMENT_CODE"] = $this->DEBTOR_SEGMENT_CODE->Visible;
            $this->ControlsVisible["SERVICE_QTY"] = $this->SERVICE_QTY->Visible;
            $this->ControlsVisible["STAMP_DUTY_QTY_2"] = $this->STAMP_DUTY_QTY_2->Visible;
            $this->ControlsVisible["STAMP_DUTY_AMOUNT"] = $this->STAMP_DUTY_AMOUNT->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->BUSINESS_AREA_NAME->SetValue($this->DataSource->BUSINESS_AREA_NAME->GetValue());
                $this->STAMP_DUTY_QTY_1->SetValue($this->DataSource->STAMP_DUTY_QTY_1->GetValue());
                $this->DEBTOR_SEGMENT_CODE->SetValue($this->DataSource->DEBTOR_SEGMENT_CODE->GetValue());
                $this->SERVICE_QTY->SetValue($this->DataSource->SERVICE_QTY->GetValue());
                $this->STAMP_DUTY_QTY_2->SetValue($this->DataSource->STAMP_DUTY_QTY_2->GetValue());
                $this->STAMP_DUTY_AMOUNT->SetValue($this->DataSource->STAMP_DUTY_AMOUNT->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->BUSINESS_AREA_NAME->Show();
                $this->STAMP_DUTY_QTY_1->Show();
                $this->DEBTOR_SEGMENT_CODE->Show();
                $this->SERVICE_QTY->Show();
                $this->STAMP_DUTY_QTY_2->Show();
                $this->STAMP_DUTY_AMOUNT->Show();
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
        $this->VAT_AMOUNT->SetValue($this->DataSource->VAT_AMOUNT->GetValue());
        $this->SERVICE_TYPE_CODE->SetValue($this->DataSource->SERVICE_TYPE_CODE->GetValue());
        $this->BILL_COMPONENT_CODE->SetValue($this->DataSource->BILL_COMPONENT_CODE->GetValue());
        $this->CHARGE_AMOUNT->SetValue($this->DataSource->CHARGE_AMOUNT->GetValue());
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->VAT_AMOUNT->Show();
        $this->SERVICE_TYPE_CODE->Show();
        $this->BILL_COMPONENT_CODE->Show();
        $this->CHARGE_AMOUNT->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @282-38DB89C3
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->BUSINESS_AREA_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->STAMP_DUTY_QTY_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DEBTOR_SEGMENT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_QTY->Errors->ToString());
        $errors = ComposeStrings($errors, $this->STAMP_DUTY_QTY_2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->STAMP_DUTY_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End R_STAMP_DUTYGrid Class @282-FCB6E20C

class clsR_STAMP_DUTYGridDataSource extends clsDBConn {  //R_STAMP_DUTYGridDataSource Class @282-9DECB1B3

//DataSource Variables @282-7BA3E91E
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $BUSINESS_AREA_NAME;
    var $VAT_AMOUNT;
    var $STAMP_DUTY_QTY_1;
    var $SERVICE_TYPE_CODE;
    var $BILL_COMPONENT_CODE;
    var $CHARGE_AMOUNT;
    var $DEBTOR_SEGMENT_CODE;
    var $SERVICE_QTY;
    var $STAMP_DUTY_QTY_2;
    var $STAMP_DUTY_AMOUNT;
//End DataSource Variables

//DataSourceClass_Initialize Event @282-7D22316E
    function clsR_STAMP_DUTYGridDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid R_STAMP_DUTYGrid";
        $this->Initialize();
        $this->BUSINESS_AREA_NAME = new clsField("BUSINESS_AREA_NAME", ccsText, "");
        
        $this->VAT_AMOUNT = new clsField("VAT_AMOUNT", ccsText, "");
        
        $this->STAMP_DUTY_QTY_1 = new clsField("STAMP_DUTY_QTY_1", ccsText, "");
        
        $this->SERVICE_TYPE_CODE = new clsField("SERVICE_TYPE_CODE", ccsFloat, "");
        
        $this->BILL_COMPONENT_CODE = new clsField("BILL_COMPONENT_CODE", ccsText, "");
        
        $this->CHARGE_AMOUNT = new clsField("CHARGE_AMOUNT", ccsText, "");
        
        $this->DEBTOR_SEGMENT_CODE = new clsField("DEBTOR_SEGMENT_CODE", ccsText, "");
        
        $this->SERVICE_QTY = new clsField("SERVICE_QTY", ccsText, "");
        
        $this->STAMP_DUTY_QTY_2 = new clsField("STAMP_DUTY_QTY_2", ccsText, "");
        
        $this->STAMP_DUTY_AMOUNT = new clsField("STAMP_DUTY_AMOUNT", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @282-FBB490AB
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "BUSINESS_AREA_NAME, DEBTOR_SEGMENT_CODE";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @282-4A15936C
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlINPUT_DATA_CONTROL_ID", ccsText, "", "", $this->Parameters["urlINPUT_DATA_CONTROL_ID"], "", false);
        $this->wp->AddParameter("2", "urlCURRENCY_CODE", ccsText, "", "", $this->Parameters["urlCURRENCY_CODE"], "", false);
    }
//End Prepare Method

//Open Method @282-6E0B108A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT\n" .
        "*\n" .
        "\n" .
        "FROM\n" .
        "R_STAMP_DUTY\n" .
        "\n" .
        "WHERE\n" .
        "UPPER(INPUT_DATA_CONTROL_ID) LIKE UPPER ('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') AND\n" .
        "UPPER(CURRENCY_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%')) cnt";
        $this->SQL = "SELECT\n" .
        "*\n" .
        "\n" .
        "FROM\n" .
        "R_STAMP_DUTY\n" .
        "\n" .
        "WHERE\n" .
        "UPPER(INPUT_DATA_CONTROL_ID) LIKE UPPER ('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') AND\n" .
        "UPPER(CURRENCY_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%') {SQL_OrderBy}";
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

//SetValues Method @282-8469188F
    function SetValues()
    {
        $this->BUSINESS_AREA_NAME->SetDBValue($this->f("BUSINESS_AREA_NAME"));
        $this->VAT_AMOUNT->SetDBValue($this->f("VAT_AMOUNT"));
        $this->STAMP_DUTY_QTY_1->SetDBValue($this->f("STAMP_DUTY_QTY_1"));
        $this->SERVICE_TYPE_CODE->SetDBValue(trim($this->f("SERVICE_TYPE_CODE")));
        $this->BILL_COMPONENT_CODE->SetDBValue($this->f("BILL_COMPONENT_CODE"));
        $this->CHARGE_AMOUNT->SetDBValue($this->f("CHARGE_AMOUNT"));
        $this->DEBTOR_SEGMENT_CODE->SetDBValue($this->f("DEBTOR_SEGMENT_CODE"));
        $this->SERVICE_QTY->SetDBValue($this->f("SERVICE_QTY"));
        $this->STAMP_DUTY_QTY_2->SetDBValue($this->f("STAMP_DUTY_QTY_2"));
        $this->STAMP_DUTY_AMOUNT->SetDBValue($this->f("STAMP_DUTY_AMOUNT"));
    }
//End SetValues Method

} //End R_STAMP_DUTYGridDataSource Class @282-FCB6E20C

//Initialize Page @1-B9200E37
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
$TemplateFileName = "R_STAMP_DUTY.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-9816C81A
include_once("./R_STAMP_DUTY_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-384F6834
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$R_STAMP_DUTYSearch = & new clsRecordR_STAMP_DUTYSearch("", $MainPage);
$R_STAMP_DUTYGrid = & new clsGridR_STAMP_DUTYGrid("", $MainPage);
$MainPage->R_STAMP_DUTYSearch = & $R_STAMP_DUTYSearch;
$MainPage->R_STAMP_DUTYGrid = & $R_STAMP_DUTYGrid;
$R_STAMP_DUTYSearch->Initialize();
$R_STAMP_DUTYGrid->Initialize();

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

//Execute Components @1-DA8E4D60
$R_STAMP_DUTYSearch->Operation();
//End Execute Components

//Go to destination page @1-958E0B2C
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($R_STAMP_DUTYSearch);
    unset($R_STAMP_DUTYGrid);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-7376B03B
$R_STAMP_DUTYSearch->Show();
$R_STAMP_DUTYGrid->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-5FD36370
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($R_STAMP_DUTYSearch);
unset($R_STAMP_DUTYGrid);
unset($Tpl);
//End Unload Page


?>