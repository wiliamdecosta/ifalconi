<?php
//Include Common Files @1-688BD8A0
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_report/");
define("FileName", "V_SUM_AR3210.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordV_SUM_AR3210Search { //V_SUM_AR3210Search Class @3-68449E9C

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

//Class_Initialize Event @3-2BA0939A
    function clsRecordV_SUM_AR3210Search($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_SUM_AR3210Search/Error";
        $this->DataSource = new clsV_SUM_AR3210SearchDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_SUM_AR3210Search";
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

//Operation Method @3-200F08BB
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
        $Redirect = "V_SUM_AR3210.php" . "?" . CCGetQueryString("All", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "V_SUM_AR3210.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y", "TAMBAH", "BATCH_CONTROL_ID")), CCGetQueryString("QueryString", array("Invoice_date", "bill_cycle_code", "finance_period_code", "INPUT_DATA_CONTROL_ID", "CURRENCY_CODE", "ccsForm", "TAMBAH", "BATCH_CONTROL_ID")));
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

} //End V_SUM_AR3210Search Class @3-FCB6E20C

class clsV_SUM_AR3210SearchDataSource extends clsDBConn {  //V_SUM_AR3210SearchDataSource Class @3-E9601EB6

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

//DataSourceClass_Initialize Event @3-A9CBB0D1
    function clsV_SUM_AR3210SearchDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record V_SUM_AR3210Search/Error";
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

} //End V_SUM_AR3210SearchDataSource Class @3-FCB6E20C

class clsGridV_SUM_AR3210Grid { //V_SUM_AR3210Grid class @282-368C3537

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

//Class_Initialize Event @282-341117D7
    function clsGridV_SUM_AR3210Grid($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "V_SUM_AR3210Grid";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid V_SUM_AR3210Grid";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsV_SUM_AR3210GridDataSource($this);
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
        $this->VAT_AMOUNT = & new clsControl(ccsLabel, "VAT_AMOUNT", "VAT_AMOUNT", ccsText, "", CCGetRequestParam("VAT_AMOUNT", ccsGet, NULL), $this);
        $this->REPORT_SEGMENT_CODE = & new clsControl(ccsLabel, "REPORT_SEGMENT_CODE", "REPORT_SEGMENT_CODE", ccsText, "", CCGetRequestParam("REPORT_SEGMENT_CODE", ccsGet, NULL), $this);
        $this->SERVICE_TYPE_CODE = & new clsControl(ccsLabel, "SERVICE_TYPE_CODE", "SERVICE_TYPE_CODE", ccsFloat, "", CCGetRequestParam("SERVICE_TYPE_CODE", ccsGet, NULL), $this);
        $this->INVOICE_COMPONENT_CODE = & new clsControl(ccsLabel, "INVOICE_COMPONENT_CODE", "INVOICE_COMPONENT_CODE", ccsText, "", CCGetRequestParam("INVOICE_COMPONENT_CODE", ccsGet, NULL), $this);
        $this->CHARGE_AMOUNT = & new clsControl(ccsLabel, "CHARGE_AMOUNT", "CHARGE_AMOUNT", ccsText, "", CCGetRequestParam("CHARGE_AMOUNT", ccsGet, NULL), $this);
        $this->CUSTOMER_SEGMENT_CODE = & new clsControl(ccsLabel, "CUSTOMER_SEGMENT_CODE", "CUSTOMER_SEGMENT_CODE", ccsText, "", CCGetRequestParam("CUSTOMER_SEGMENT_CODE", ccsGet, NULL), $this);
        $this->SUBSCRIBER_SEGMENT_CODE = & new clsControl(ccsLabel, "SUBSCRIBER_SEGMENT_CODE", "SUBSCRIBER_SEGMENT_CODE", ccsText, "", CCGetRequestParam("SUBSCRIBER_SEGMENT_CODE", ccsGet, NULL), $this);
        $this->SERVICE_GROUP_CODE = & new clsControl(ccsLabel, "SERVICE_GROUP_CODE", "SERVICE_GROUP_CODE", ccsText, "", CCGetRequestParam("SERVICE_GROUP_CODE", ccsGet, NULL), $this);
        $this->CUSTOMER_SEGMENT = & new clsControl(ccsLabel, "CUSTOMER_SEGMENT", "CUSTOMER_SEGMENT", ccsText, "", CCGetRequestParam("CUSTOMER_SEGMENT", ccsGet, NULL), $this);
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

//Show Method @282-9889C3B7
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
            $this->ControlsVisible["VAT_AMOUNT"] = $this->VAT_AMOUNT->Visible;
            $this->ControlsVisible["REPORT_SEGMENT_CODE"] = $this->REPORT_SEGMENT_CODE->Visible;
            $this->ControlsVisible["SERVICE_TYPE_CODE"] = $this->SERVICE_TYPE_CODE->Visible;
            $this->ControlsVisible["INVOICE_COMPONENT_CODE"] = $this->INVOICE_COMPONENT_CODE->Visible;
            $this->ControlsVisible["CHARGE_AMOUNT"] = $this->CHARGE_AMOUNT->Visible;
            $this->ControlsVisible["CUSTOMER_SEGMENT_CODE"] = $this->CUSTOMER_SEGMENT_CODE->Visible;
            $this->ControlsVisible["SUBSCRIBER_SEGMENT_CODE"] = $this->SUBSCRIBER_SEGMENT_CODE->Visible;
            $this->ControlsVisible["SERVICE_GROUP_CODE"] = $this->SERVICE_GROUP_CODE->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->BUSINESS_AREA_NAME->SetValue($this->DataSource->BUSINESS_AREA_NAME->GetValue());
                $this->VAT_AMOUNT->SetValue($this->DataSource->VAT_AMOUNT->GetValue());
                $this->REPORT_SEGMENT_CODE->SetValue($this->DataSource->REPORT_SEGMENT_CODE->GetValue());
                $this->SERVICE_TYPE_CODE->SetValue($this->DataSource->SERVICE_TYPE_CODE->GetValue());
                $this->INVOICE_COMPONENT_CODE->SetValue($this->DataSource->INVOICE_COMPONENT_CODE->GetValue());
                $this->CHARGE_AMOUNT->SetValue($this->DataSource->CHARGE_AMOUNT->GetValue());
                $this->CUSTOMER_SEGMENT_CODE->SetValue($this->DataSource->CUSTOMER_SEGMENT_CODE->GetValue());
                $this->SUBSCRIBER_SEGMENT_CODE->SetValue($this->DataSource->SUBSCRIBER_SEGMENT_CODE->GetValue());
                $this->SERVICE_GROUP_CODE->SetValue($this->DataSource->SERVICE_GROUP_CODE->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->BUSINESS_AREA_NAME->Show();
                $this->VAT_AMOUNT->Show();
                $this->REPORT_SEGMENT_CODE->Show();
                $this->SERVICE_TYPE_CODE->Show();
                $this->INVOICE_COMPONENT_CODE->Show();
                $this->CHARGE_AMOUNT->Show();
                $this->CUSTOMER_SEGMENT_CODE->Show();
                $this->SUBSCRIBER_SEGMENT_CODE->Show();
                $this->SERVICE_GROUP_CODE->Show();
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
        $this->CUSTOMER_SEGMENT->SetValue($this->DataSource->CUSTOMER_SEGMENT->GetValue());
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->CUSTOMER_SEGMENT->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @282-76F2776A
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->BUSINESS_AREA_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VAT_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REPORT_SEGMENT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_TYPE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->INVOICE_COMPONENT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CHARGE_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_SEGMENT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SUBSCRIBER_SEGMENT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_GROUP_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End V_SUM_AR3210Grid Class @282-FCB6E20C

class clsV_SUM_AR3210GridDataSource extends clsDBConn {  //V_SUM_AR3210GridDataSource Class @282-5B6A2ACA

//DataSource Variables @282-A8EC48E1
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
    var $REPORT_SEGMENT_CODE;
    var $SERVICE_TYPE_CODE;
    var $INVOICE_COMPONENT_CODE;
    var $CHARGE_AMOUNT;
    var $CUSTOMER_SEGMENT;
    var $CUSTOMER_SEGMENT_CODE;
    var $SUBSCRIBER_SEGMENT_CODE;
    var $SERVICE_GROUP_CODE;
//End DataSource Variables

//DataSourceClass_Initialize Event @282-2131C495
    function clsV_SUM_AR3210GridDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid V_SUM_AR3210Grid";
        $this->Initialize();
        $this->BUSINESS_AREA_NAME = new clsField("BUSINESS_AREA_NAME", ccsText, "");
        
        $this->VAT_AMOUNT = new clsField("VAT_AMOUNT", ccsText, "");
        
        $this->REPORT_SEGMENT_CODE = new clsField("REPORT_SEGMENT_CODE", ccsText, "");
        
        $this->SERVICE_TYPE_CODE = new clsField("SERVICE_TYPE_CODE", ccsFloat, "");
        
        $this->INVOICE_COMPONENT_CODE = new clsField("INVOICE_COMPONENT_CODE", ccsText, "");
        
        $this->CHARGE_AMOUNT = new clsField("CHARGE_AMOUNT", ccsText, "");
        
        $this->CUSTOMER_SEGMENT = new clsField("CUSTOMER_SEGMENT", ccsText, "");
        
        $this->CUSTOMER_SEGMENT_CODE = new clsField("CUSTOMER_SEGMENT_CODE", ccsText, "");
        
        $this->SUBSCRIBER_SEGMENT_CODE = new clsField("SUBSCRIBER_SEGMENT_CODE", ccsText, "");
        
        $this->SERVICE_GROUP_CODE = new clsField("SERVICE_GROUP_CODE", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @282-518881A4
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "BUSINESS_AREA_NAME, CUSTOMER_SEGMENT_CODE, REPORT_SEGMENT_CODE, SUBSCRIBER_SEGMENT_CODE, SERVICE_GROUP_CODE,SERVICE_TYPE_CODE, INVOICE_COMPONENT_CODE";
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

//Open Method @282-C21640CF
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT\n" .
        "*\n" .
        "\n" .
        "FROM\n" .
        "V_SUM_AR3210\n" .
        "\n" .
        "WHERE\n" .
        "UPPER(INPUT_DATA_CONTROL_ID) LIKE UPPER ('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') AND\n" .
        "UPPER(CURRENCY_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%')) cnt";
        $this->SQL = "SELECT\n" .
        "*\n" .
        "\n" .
        "FROM\n" .
        "V_SUM_AR3210\n" .
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

//SetValues Method @282-ABFEBACF
    function SetValues()
    {
        $this->BUSINESS_AREA_NAME->SetDBValue($this->f("BUSINESS_AREA_NAME"));
        $this->VAT_AMOUNT->SetDBValue($this->f("VAT_AMOUNT"));
        $this->REPORT_SEGMENT_CODE->SetDBValue($this->f("REPORT_SEGMENT_CODE"));
        $this->SERVICE_TYPE_CODE->SetDBValue(trim($this->f("SERVICE_TYPE_CODE")));
        $this->INVOICE_COMPONENT_CODE->SetDBValue($this->f("INVOICE_COMPONENT_CODE"));
        $this->CHARGE_AMOUNT->SetDBValue($this->f("CHARGE_AMOUNT"));
        $this->CUSTOMER_SEGMENT->SetDBValue($this->f("CUSTOMER_SEGMENT_ID"));
        $this->CUSTOMER_SEGMENT_CODE->SetDBValue($this->f("CUSTOMER_SEGMENT_CODE"));
        $this->SUBSCRIBER_SEGMENT_CODE->SetDBValue($this->f("SUBSCRIBER_SEGMENT_CODE"));
        $this->SERVICE_GROUP_CODE->SetDBValue($this->f("SERVICE_GROUP_CODE"));
    }
//End SetValues Method

} //End V_SUM_AR3210GridDataSource Class @282-FCB6E20C

//Initialize Page @1-6CE44A8E
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
$TemplateFileName = "V_SUM_AR3210.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-DDDCA5A9
include_once("./V_SUM_AR3210_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-34305110
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$V_SUM_AR3210Search = & new clsRecordV_SUM_AR3210Search("", $MainPage);
$V_SUM_AR3210Grid = & new clsGridV_SUM_AR3210Grid("", $MainPage);
$MainPage->V_SUM_AR3210Search = & $V_SUM_AR3210Search;
$MainPage->V_SUM_AR3210Grid = & $V_SUM_AR3210Grid;
$V_SUM_AR3210Search->Initialize();
$V_SUM_AR3210Grid->Initialize();

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

//Execute Components @1-48D3DE0E
$V_SUM_AR3210Search->Operation();
//End Execute Components

//Go to destination page @1-5405D16E
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($V_SUM_AR3210Search);
    unset($V_SUM_AR3210Grid);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-4CDE53EF
$V_SUM_AR3210Search->Show();
$V_SUM_AR3210Grid->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-56C30CF4
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($V_SUM_AR3210Search);
unset($V_SUM_AR3210Grid);
unset($Tpl);
//End Unload Page


?>
