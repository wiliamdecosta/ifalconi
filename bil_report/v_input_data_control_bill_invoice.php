<?php
//Include Common Files @1-17D9B82F
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_report/");
define("FileName", "v_input_data_control_bill_invoice.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordv_input_data_control_bill_invoiceSearch { //v_input_data_control_bill_invoiceSearch Class @3-FB2C2D5F

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

//Class_Initialize Event @3-C355C8B5
    function clsRecordv_input_data_control_bill_invoiceSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record v_input_data_control_bill_invoiceSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "v_input_data_control_bill_invoiceSearch";
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

//Operation Method @3-36C24C29
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
        $Redirect = "v_input_data_control_bill_invoice.php" . "?" . CCGetQueryString("All", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "v_input_data_control_bill_invoice.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y", "TAMBAH", "BATCH_CONTROL_ID")), CCGetQueryString("QueryString", array("s_keyword", "ccsForm", "TAMBAH", "BATCH_CONTROL_ID")));
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

} //End v_input_data_control_bill_invoiceSearch Class @3-FCB6E20C

class clsGridv_input_data_control_bill_invoiceGrid { //v_input_data_control_bill_invoiceGrid class @282-D08013CC

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

//Class_Initialize Event @282-CCB493CC
    function clsGridv_input_data_control_bill_invoiceGrid($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "v_input_data_control_bill_invoiceGrid";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid v_input_data_control_bill_invoiceGrid";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsv_input_data_control_bill_invoiceGridDataSource($this);
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
        $this->DLink->Page = "v_input_data_control_bill_invoice.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "v_input_data_control_bill_invoice.php";
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->IDCid = & new clsControl(ccsHidden, "IDCid", "IDCid", ccsText, "", CCGetRequestParam("IDCid", ccsGet, NULL), $this);
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

//Show Method @282-57D43A08
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
        $this->Navigator->Show();
        $this->IDCid->Show();
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

} //End v_input_data_control_bill_invoiceGrid Class @282-FCB6E20C

class clsv_input_data_control_bill_invoiceGridDataSource extends clsDBConn {  //v_input_data_control_bill_invoiceGridDataSource Class @282-079C0A3F

//DataSource Variables @282-C1349B2B
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
//End DataSource Variables

//DataSourceClass_Initialize Event @282-164A8578
    function clsv_input_data_control_bill_invoiceGridDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid v_input_data_control_bill_invoiceGrid";
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
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @282-E714E73E
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "Input_data_control_id";
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

//Open Method @282-F9B04BDE
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT\n" .
        "Input_data_control_id,\n" .
        "batch_type,\n" .
        "finance_period_code,\n" .
        "Invoice_date,\n" .
        "bill_cycle_code,\n" .
        "bill_status,\n" .
        "BILL_AMT,\n" .
        "CLOSING_DATE,\n" .
        "CLOSED_BY,\n" .
        "CREATION_DATE,\n" .
        "OPERATOR_ID\n" .
        "\n" .
        "FROM\n" .
        "V_INPUT_DATA_CONTROL_BILL\n" .
        "\n" .
        "WHERE\n" .
        "UPPER(Input_data_control_id) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(batch_type) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(finance_period_code) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(Invoice_date) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(bill_cycle_code) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(bill_status) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(BILL_AMT) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(CLOSING_DATE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(CLOSED_BY) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(CREATION_DATE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(OPERATOR_ID) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) cnt";
        $this->SQL = "SELECT\n" .
        "Input_data_control_id,\n" .
        "batch_type,\n" .
        "finance_period_code,\n" .
        "Invoice_date,\n" .
        "bill_cycle_code,\n" .
        "bill_status,\n" .
        "BILL_AMT,\n" .
        "CLOSING_DATE,\n" .
        "CLOSED_BY,\n" .
        "CREATION_DATE,\n" .
        "OPERATOR_ID\n" .
        "\n" .
        "FROM\n" .
        "V_INPUT_DATA_CONTROL_BILL\n" .
        "\n" .
        "WHERE\n" .
        "UPPER(Input_data_control_id) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(batch_type) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(finance_period_code) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(Invoice_date) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(bill_cycle_code) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(bill_status) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(BILL_AMT) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(CLOSING_DATE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(CLOSED_BY) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(CREATION_DATE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(OPERATOR_ID) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') {SQL_OrderBy}";
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

//SetValues Method @282-E375C982
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
    }
//End SetValues Method

} //End v_input_data_control_bill_invoiceGridDataSource Class @282-FCB6E20C

//Initialize Page @1-CEE3CEA2
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
$TemplateFileName = "v_input_data_control_bill_invoice.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-94F7492A
include_once("./v_input_data_control_bill_invoice_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-4CD405BC
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$v_input_data_control_bill_invoiceSearch = & new clsRecordv_input_data_control_bill_invoiceSearch("", $MainPage);
$v_input_data_control_bill_invoiceGrid = & new clsGridv_input_data_control_bill_invoiceGrid("", $MainPage);
$MainPage->v_input_data_control_bill_invoiceSearch = & $v_input_data_control_bill_invoiceSearch;
$MainPage->v_input_data_control_bill_invoiceGrid = & $v_input_data_control_bill_invoiceGrid;
$v_input_data_control_bill_invoiceGrid->Initialize();

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

//Execute Components @1-BBB47716
$v_input_data_control_bill_invoiceSearch->Operation();
//End Execute Components

//Go to destination page @1-87641D61
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($v_input_data_control_bill_invoiceSearch);
    unset($v_input_data_control_bill_invoiceGrid);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-53C84CC7
$v_input_data_control_bill_invoiceSearch->Show();
$v_input_data_control_bill_invoiceGrid->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-D15B8D50
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($v_input_data_control_bill_invoiceSearch);
unset($v_input_data_control_bill_invoiceGrid);
unset($Tpl);
//End Unload Page


?>
