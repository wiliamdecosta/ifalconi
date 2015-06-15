<?php
//Include Common Files @1-3D08DA3D
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_data/");
define("FileName", "subscriber_form.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordV_SUBSCRIBER { //V_SUBSCRIBER Class @2-7375F99A

//Variables @2-D6FF3E86

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

//Class_Initialize Event @2-57A507EB
    function clsRecordV_SUBSCRIBER($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_SUBSCRIBER/Error";
        $this->DataSource = new clsV_SUBSCRIBERDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_SUBSCRIBER";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->SERVICE_NO = & new clsControl(ccsTextBox, "SERVICE_NO", "SERVICE NO", ccsFloat, "", CCGetRequestParam("SERVICE_NO", $Method, NULL), $this);
            $this->SERVICE_NO->Required = true;
            $this->SUBSCRIBER_ID = & new clsControl(ccsTextBox, "SUBSCRIBER_ID", "SERVICE NO", ccsFloat, "", CCGetRequestParam("SUBSCRIBER_ID", $Method, NULL), $this);
            $this->SUBSCRIPTION_NAME = & new clsControl(ccsTextBox, "SUBSCRIPTION_NAME", "SUBSCRIPTION NAME", ccsText, "", CCGetRequestParam("SUBSCRIPTION_NAME", $Method, NULL), $this);
            $this->SUBSCRIPTION_NAME->Required = true;
            $this->ACCOUNT_NAME = & new clsControl(ccsTextBox, "ACCOUNT_NAME", "ACCOUNT NAME", ccsText, "", CCGetRequestParam("ACCOUNT_NAME", $Method, NULL), $this);
            $this->ACCOUNT_NAME->Required = true;
            $this->ACCOUNT_NO = & new clsControl(ccsTextBox, "ACCOUNT_NO", "ACCOUNT NO", ccsText, "", CCGetRequestParam("ACCOUNT_NO", $Method, NULL), $this);
            $this->ACCOUNT_NO->Required = true;
            $this->SERVICE_TYPE_CODE = & new clsControl(ccsTextBox, "SERVICE_TYPE_CODE", "SERVICE TYPE CODE", ccsText, "", CCGetRequestParam("SERVICE_TYPE_CODE", $Method, NULL), $this);
            $this->SERVICE_TYPE_CODE->Required = true;
            $this->QTY_SUB_FROM = & new clsControl(ccsTextBox, "QTY_SUB_FROM", "QTY SUB FROM", ccsFloat, "", CCGetRequestParam("QTY_SUB_FROM", $Method, NULL), $this);
            $this->TARIFF_SCENARIO_CODE = & new clsControl(ccsTextBox, "TARIFF_SCENARIO_CODE", "TARIFF SCENARIO CODE", ccsText, "", CCGetRequestParam("TARIFF_SCENARIO_CODE", $Method, NULL), $this);
            $this->TARIFF_SCENARIO_CODE->Required = true;
            $this->P_TARIFF_SCENARIO_ID = & new clsControl(ccsTextBox, "P_TARIFF_SCENARIO_ID", "P TARIFF SCENARIO ID", ccsFloat, "", CCGetRequestParam("P_TARIFF_SCENARIO_ID", $Method, NULL), $this);
            $this->P_TARIFF_SCENARIO_ID->Required = true;
            $this->BILL_PERIOD_UNIT_CODE = & new clsControl(ccsTextBox, "BILL_PERIOD_UNIT_CODE", "BILL PERIOD UNIT CODE", ccsText, "", CCGetRequestParam("BILL_PERIOD_UNIT_CODE", $Method, NULL), $this);
            $this->BILL_PERIOD_UNIT_CODE->Required = true;
            $this->BILLING_UNIT = & new clsControl(ccsTextBox, "BILLING_UNIT", "BILLING UNIT", ccsFloat, "", CCGetRequestParam("BILLING_UNIT", $Method, NULL), $this);
            $this->BILLING_UNIT->Required = true;
            $this->BILL_CYCLE_CODE = & new clsControl(ccsTextBox, "BILL_CYCLE_CODE", "BILL CYCLE CODE", ccsText, "", CCGetRequestParam("BILL_CYCLE_CODE", $Method, NULL), $this);
            $this->BILL_CYCLE_CODE->Required = true;
            $this->P_BILL_CYCLE_ID = & new clsControl(ccsTextBox, "P_BILL_CYCLE_ID", "P BILL CYCLE ID", ccsFloat, "", CCGetRequestParam("P_BILL_CYCLE_ID", $Method, NULL), $this);
            $this->P_BILL_CYCLE_ID->Required = true;
            $this->SUBSCRIPTION_STATUS_CODE = & new clsControl(ccsTextBox, "SUBSCRIPTION_STATUS_CODE", "SUBSCRIPTION STATUS CODE", ccsText, "", CCGetRequestParam("SUBSCRIPTION_STATUS_CODE", $Method, NULL), $this);
            $this->SUBSCRIPTION_STATUS_CODE->Required = true;
            $this->LAST_STATUS_DATE = & new clsControl(ccsTextBox, "LAST_STATUS_DATE", "LAST STATUS DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("LAST_STATUS_DATE", $Method, NULL), $this);
            $this->LAST_STATUS_DATE->Required = true;
            $this->DatePicker_LAST_STATUS_DATE = & new clsDatePicker("DatePicker_LAST_STATUS_DATE", "V_SUBSCRIBER", "LAST_STATUS_DATE", $this);
            $this->IS_INVOICED = & new clsControl(ccsListBox, "IS_INVOICED", "IS INVOICED", ccsText, "", CCGetRequestParam("IS_INVOICED", $Method, NULL), $this);
            $this->IS_INVOICED->DSType = dsListOfValues;
            $this->IS_INVOICED->Values = array(array("Y", "Yes"), array("N", "No"));
            $this->IS_INVOICED->Required = true;
            $this->IS_VAT_EXCEPTION = & new clsControl(ccsListBox, "IS_VAT_EXCEPTION", "IS VAT EXCEPTION", ccsText, "", CCGetRequestParam("IS_VAT_EXCEPTION", $Method, NULL), $this);
            $this->IS_VAT_EXCEPTION->DSType = dsListOfValues;
            $this->IS_VAT_EXCEPTION->Values = array(array("Y", "Yes"), array("N", "No"));
            $this->IS_VAT_EXCEPTION->Required = true;
            $this->SUBSCRIBER_SEGMENT_CODE = & new clsControl(ccsTextBox, "SUBSCRIBER_SEGMENT_CODE", "SUBSCRIBER SEGMENT CODE", ccsText, "", CCGetRequestParam("SUBSCRIBER_SEGMENT_CODE", $Method, NULL), $this);
            $this->SUBSCRIBER_SEGMENT_CODE->Required = true;
            $this->BUILDING_TYPE_CODE = & new clsControl(ccsTextBox, "BUILDING_TYPE_CODE", "BUILDING TYPE CODE", ccsText, "", CCGetRequestParam("BUILDING_TYPE_CODE", $Method, NULL), $this);
            $this->BUILDING_TYPE_ID = & new clsControl(ccsTextBox, "BUILDING_TYPE_ID", "BUILDING TYPE ID", ccsFloat, "", CCGetRequestParam("BUILDING_TYPE_ID", $Method, NULL), $this);
            $this->P_BUSINESS_AREA_ID = & new clsControl(ccsTextBox, "P_BUSINESS_AREA_ID", "P BUSINESS AREA ID", ccsFloat, "", CCGetRequestParam("P_BUSINESS_AREA_ID", $Method, NULL), $this);
            $this->BUSINESS_AREA_CODE = & new clsControl(ccsTextBox, "BUSINESS_AREA_CODE", "BUSINESS AREA CODE", ccsText, "", CCGetRequestParam("BUSINESS_AREA_CODE", $Method, NULL), $this);
            $this->P_SERVICE_TYPE_ID = & new clsControl(ccsTextBox, "P_SERVICE_TYPE_ID", "P SERVICE TYPE ID", ccsFloat, "", CCGetRequestParam("P_SERVICE_TYPE_ID", $Method, NULL), $this);
            $this->P_SERVICE_TYPE_ID->Required = true;
            $this->TERMINATION_DATE = & new clsControl(ccsTextBox, "TERMINATION_DATE", "TERMINATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("TERMINATION_DATE", $Method, NULL), $this);
            $this->EM_DEGREE = & new clsControl(ccsTextBox, "EM_DEGREE", "EM DEGREE", ccsFloat, "", CCGetRequestParam("EM_DEGREE", $Method, NULL), $this);
            $this->EM_MINUTE = & new clsControl(ccsTextBox, "EM_MINUTE", "EM MINUTE", ccsFloat, "", CCGetRequestParam("EM_MINUTE", $Method, NULL), $this);
            $this->EM_SECOND = & new clsControl(ccsTextBox, "EM_SECOND", "EM SECOND", ccsFloat, "", CCGetRequestParam("EM_SECOND", $Method, NULL), $this);
            $this->SL_DEGREE = & new clsControl(ccsTextBox, "SL_DEGREE", "SL DEGREE", ccsFloat, "", CCGetRequestParam("SL_DEGREE", $Method, NULL), $this);
            $this->SL_MINUTE = & new clsControl(ccsTextBox, "SL_MINUTE", "SL MINUTE", ccsFloat, "", CCGetRequestParam("SL_MINUTE", $Method, NULL), $this);
            $this->SL_SECOND = & new clsControl(ccsTextBox, "SL_SECOND", "SL SECOND", ccsFloat, "", CCGetRequestParam("SL_SECOND", $Method, NULL), $this);
            $this->SALES_PERSON_CODE = & new clsControl(ccsTextBox, "SALES_PERSON_CODE", "SALES PERSON CODE", ccsText, "", CCGetRequestParam("SALES_PERSON_CODE", $Method, NULL), $this);
            $this->P_SALES_PERSON_ID = & new clsControl(ccsTextBox, "P_SALES_PERSON_ID", "P SALES PERSON ID", ccsFloat, "", CCGetRequestParam("P_SALES_PERSON_ID", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->DatePicker_UPDATE_DATE = & new clsDatePicker("DatePicker_UPDATE_DATE", "V_SUBSCRIBER", "UPDATE_DATE", $this);
            $this->P_SUBSCRIPTION_STATUS_ID = & new clsControl(ccsTextBox, "P_SUBSCRIPTION_STATUS_ID", "P SUBSCRIPTION STATUS ID", ccsFloat, "", CCGetRequestParam("P_SUBSCRIPTION_STATUS_ID", $Method, NULL), $this);
            $this->P_SUBSCRIPTION_STATUS_ID->Required = true;
            $this->P_SUBSCRIBER_SEGMENT_ID = & new clsControl(ccsTextBox, "P_SUBSCRIBER_SEGMENT_ID", "P SUBSCRIBER SEGMENT ID", ccsFloat, "", CCGetRequestParam("P_SUBSCRIBER_SEGMENT_ID", $Method, NULL), $this);
            $this->P_SUBSCRIBER_SEGMENT_ID->Required = true;
            $this->CUSTOMER_ACCOUNT_ID = & new clsControl(ccsTextBox, "CUSTOMER_ACCOUNT_ID", "CUSTOMER ACCOUNT ID", ccsFloat, "", CCGetRequestParam("CUSTOMER_ACCOUNT_ID", $Method, NULL), $this);
            $this->CUSTOMER_ACCOUNT_ID->Required = true;
            $this->P_BILLING_PERIOD_UNIT_ID = & new clsControl(ccsTextBox, "P_BILLING_PERIOD_UNIT_ID", "P BILLING PERIOD UNIT ID", ccsFloat, "", CCGetRequestParam("P_BILLING_PERIOD_UNIT_ID", $Method, NULL), $this);
            $this->P_BILLING_PERIOD_UNIT_ID->Required = true;
            $this->QTY_SUB_TO = & new clsControl(ccsTextBox, "QTY_SUB_TO", "QTY SUB TO", ccsFloat, "", CCGetRequestParam("QTY_SUB_TO", $Method, NULL), $this);
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->SALES_COMPANY = & new clsControl(ccsTextBox, "SALES_COMPANY", "SALES COMPANY", ccsText, "", CCGetRequestParam("SALES_COMPANY", $Method, NULL), $this);
            $this->IS_PAYMENT_KEY = & new clsControl(ccsListBox, "IS_PAYMENT_KEY", "IS_PAYMENT_KEY", ccsText, "", CCGetRequestParam("IS_PAYMENT_KEY", $Method, NULL), $this);
            $this->IS_PAYMENT_KEY->DSType = dsListOfValues;
            $this->IS_PAYMENT_KEY->Values = array(array("Y", "Yes"), array("N", "No"));
            $this->SUB_ARE_CODE = & new clsControl(ccsTextBox, "SUB_ARE_CODE", "SUB AREA CODE", ccsText, "", CCGetRequestParam("SUB_ARE_CODE", $Method, NULL), $this);
            $this->P_SUB_BUSINESS_AREA_ID = & new clsControl(ccsTextBox, "P_SUB_BUSINESS_AREA_ID", "P_SUB_BUSINESS_AREA_ID", ccsFloat, "", CCGetRequestParam("P_SUB_BUSINESS_AREA_ID", $Method, NULL), $this);
            $this->RE_ACTIVATION_DATE = & new clsControl(ccsTextBox, "RE_ACTIVATION_DATE", "RE ACTIVATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("RE_ACTIVATION_DATE", $Method, NULL), $this);
            $this->DatePicker_RE_ACTIVATION_DATE = & new clsDatePicker("DatePicker_RE_ACTIVATION_DATE", "V_SUBSCRIBER", "RE_ACTIVATION_DATE", $this);
            $this->DatePicker_TERMINATION_DATE = & new clsDatePicker("DatePicker_TERMINATION_DATE", "V_SUBSCRIBER", "TERMINATION_DATE", $this);
            $this->DEBTOR_SEGMENT_CODE = & new clsControl(ccsTextBox, "DEBTOR_SEGMENT_CODE", "DEBTOR_SEGMENT_CODE", ccsText, "", CCGetRequestParam("DEBTOR_SEGMENT_CODE", $Method, NULL), $this);
            $this->P_DEBTOR_SEGMENT_ID = & new clsControl(ccsTextBox, "P_DEBTOR_SEGMENT_ID", "P_DEBTOR_SEGMENT_ID", ccsFloat, "", CCGetRequestParam("P_DEBTOR_SEGMENT_ID", $Method, NULL), $this);
            $this->BUSINESS_SEGMENT_CODE = & new clsControl(ccsTextBox, "BUSINESS_SEGMENT_CODE", "BUSINESS_SEGMENT_CODE", ccsText, "", CCGetRequestParam("BUSINESS_SEGMENT_CODE", $Method, NULL), $this);
            $this->P_BUSINESS_SEGMENT_ID = & new clsControl(ccsTextBox, "P_BUSINESS_SEGMENT_ID", "P_BUSINESS_SEGMENT_ID", ccsFloat, "", CCGetRequestParam("P_BUSINESS_SEGMENT_ID", $Method, NULL), $this);
            $this->SUBSCRIPTION_TYPE_ID = & new clsControl(ccsListBox, "SUBSCRIPTION_TYPE_ID", "SUBSCRIPTION_TYPE_ID", ccsFloat, "", CCGetRequestParam("SUBSCRIPTION_TYPE_ID", $Method, NULL), $this);
            $this->SUBSCRIPTION_TYPE_ID->DSType = dsSQL;
            $this->SUBSCRIPTION_TYPE_ID->DataSource = new clsDBConn();
            $this->SUBSCRIPTION_TYPE_ID->ds = & $this->SUBSCRIPTION_TYPE_ID->DataSource;
            list($this->SUBSCRIPTION_TYPE_ID->BoundColumn, $this->SUBSCRIPTION_TYPE_ID->TextColumn, $this->SUBSCRIPTION_TYPE_ID->DBFormat) = array("P_REFERENCE_LIST_ID", "CODE", "");
            $this->SUBSCRIPTION_TYPE_ID->DataSource->SQL = "select * from P_REFERENCE_LIST where P_REFERENCE_TYPE_ID=10";
            $this->SUBSCRIPTION_TYPE_ID->DataSource->Order = "";
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->CUSTOMER_SEGMENT_CODE = & new clsControl(ccsTextBox, "CUSTOMER_SEGMENT_CODE", "CUSTOMER_SEGMENT_CODE", ccsText, "", CCGetRequestParam("CUSTOMER_SEGMENT_CODE", $Method, NULL), $this);
            $this->P_CUSTOMER_SEGMENT_ID = & new clsControl(ccsTextBox, "P_CUSTOMER_SEGMENT_ID", "P_CUSTOMER_SEGMENT_ID", ccsFloat, "", CCGetRequestParam("P_CUSTOMER_SEGMENT_ID", $Method, NULL), $this);
            $this->BUILDING_STATUS_CODE = & new clsControl(ccsTextBox, "BUILDING_STATUS_CODE", "BUILDING STATUS CODE", ccsText, "", CCGetRequestParam("BUILDING_STATUS_CODE", $Method, NULL), $this);
            $this->BUILDING_STATUS_ID = & new clsControl(ccsTextBox, "BUILDING_STATUS_ID", "BUILDING STATUS ID", ccsFloat, "", CCGetRequestParam("BUILDING_STATUS_ID", $Method, NULL), $this);
            $this->ADDRESS_1 = & new clsControl(ccsTextBox, "ADDRESS_1", "ADDRESS 1", ccsText, "", CCGetRequestParam("ADDRESS_1", $Method, NULL), $this);
            $this->ADDRESS_2 = & new clsControl(ccsTextBox, "ADDRESS_2", "ADDRESS 2", ccsText, "", CCGetRequestParam("ADDRESS_2", $Method, NULL), $this);
            $this->ADDRESS_3 = & new clsControl(ccsTextBox, "ADDRESS_3", "ADDRESS 3", ccsText, "", CCGetRequestParam("ADDRESS_3", $Method, NULL), $this);
            $this->REGION_NAME = & new clsControl(ccsTextBox, "REGION_NAME", "REGION NAME", ccsText, "", CCGetRequestParam("REGION_NAME", $Method, NULL), $this);
            $this->P_REGION_ID = & new clsControl(ccsTextBox, "P_REGION_ID", "P REGION ID", ccsFloat, "", CCGetRequestParam("P_REGION_ID", $Method, NULL), $this);
            $this->ZIP_CODE = & new clsControl(ccsTextBox, "ZIP_CODE", "ZIP CODE", ccsFloat, "", CCGetRequestParam("ZIP_CODE", $Method, NULL), $this);
            $this->ACTIVE_DATE = & new clsControl(ccsTextBox, "ACTIVE_DATE", "ACTIVE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("ACTIVE_DATE", $Method, NULL), $this);
            $this->DatePicker_ACTIVE_DATE = & new clsDatePicker("DatePicker_ACTIVE_DATE", "V_SUBSCRIBER", "ACTIVE_DATE", $this);
            $this->START_INVOICE_DATE = & new clsControl(ccsTextBox, "START_INVOICE_DATE", "START INVOICE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("START_INVOICE_DATE", $Method, NULL), $this);
            $this->END_INVOICE_DATE = & new clsControl(ccsTextBox, "END_INVOICE_DATE", "END INVOICE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("END_INVOICE_DATE", $Method, NULL), $this);
            $this->DatePicker_END_INVOICE_DATE = & new clsDatePicker("DatePicker_END_INVOICE_DATE", "V_SUBSCRIBER", "END_INVOICE_DATE", $this);
            $this->CONTRACT_NUMBER = & new clsControl(ccsTextBox, "CONTRACT_NUMBER", "CONTRACT NUMBER", ccsText, "", CCGetRequestParam("CONTRACT_NUMBER", $Method, NULL), $this);
            $this->CREATION_DATE = & new clsControl(ccsTextBox, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", $Method, NULL), $this);
            $this->CREATION_DATE->Required = true;
            $this->DatePicker_CREATION_DATE = & new clsDatePicker("DatePicker_CREATION_DATE", "V_SUBSCRIBER", "CREATION_DATE", $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->DatePicker_START_INVOICE_DATE = & new clsDatePicker("DatePicker_START_INVOICE_DATE", "V_SUBSCRIBER", "START_INVOICE_DATE", $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->CREATION_DATE->Value) && !strlen($this->CREATION_DATE->Value) && $this->CREATION_DATE->Value !== false)
                    $this->CREATION_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @2-0E2BC8CD
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlSUBSCRIBER_ID"] = CCGetFromGet("SUBSCRIBER_ID", NULL);
    }
//End Initialize Method

//Validate Method @2-A199B9C4
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->SERVICE_NO->Validate() && $Validation);
        $Validation = ($this->SUBSCRIBER_ID->Validate() && $Validation);
        $Validation = ($this->SUBSCRIPTION_NAME->Validate() && $Validation);
        $Validation = ($this->ACCOUNT_NAME->Validate() && $Validation);
        $Validation = ($this->ACCOUNT_NO->Validate() && $Validation);
        $Validation = ($this->SERVICE_TYPE_CODE->Validate() && $Validation);
        $Validation = ($this->QTY_SUB_FROM->Validate() && $Validation);
        $Validation = ($this->TARIFF_SCENARIO_CODE->Validate() && $Validation);
        $Validation = ($this->P_TARIFF_SCENARIO_ID->Validate() && $Validation);
        $Validation = ($this->BILL_PERIOD_UNIT_CODE->Validate() && $Validation);
        $Validation = ($this->BILLING_UNIT->Validate() && $Validation);
        $Validation = ($this->BILL_CYCLE_CODE->Validate() && $Validation);
        $Validation = ($this->P_BILL_CYCLE_ID->Validate() && $Validation);
        $Validation = ($this->SUBSCRIPTION_STATUS_CODE->Validate() && $Validation);
        $Validation = ($this->LAST_STATUS_DATE->Validate() && $Validation);
        $Validation = ($this->IS_INVOICED->Validate() && $Validation);
        $Validation = ($this->IS_VAT_EXCEPTION->Validate() && $Validation);
        $Validation = ($this->SUBSCRIBER_SEGMENT_CODE->Validate() && $Validation);
        $Validation = ($this->BUILDING_TYPE_CODE->Validate() && $Validation);
        $Validation = ($this->BUILDING_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->P_BUSINESS_AREA_ID->Validate() && $Validation);
        $Validation = ($this->BUSINESS_AREA_CODE->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->TERMINATION_DATE->Validate() && $Validation);
        $Validation = ($this->EM_DEGREE->Validate() && $Validation);
        $Validation = ($this->EM_MINUTE->Validate() && $Validation);
        $Validation = ($this->EM_SECOND->Validate() && $Validation);
        $Validation = ($this->SL_DEGREE->Validate() && $Validation);
        $Validation = ($this->SL_MINUTE->Validate() && $Validation);
        $Validation = ($this->SL_SECOND->Validate() && $Validation);
        $Validation = ($this->SALES_PERSON_CODE->Validate() && $Validation);
        $Validation = ($this->P_SALES_PERSON_ID->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->P_SUBSCRIPTION_STATUS_ID->Validate() && $Validation);
        $Validation = ($this->P_SUBSCRIBER_SEGMENT_ID->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_ACCOUNT_ID->Validate() && $Validation);
        $Validation = ($this->P_BILLING_PERIOD_UNIT_ID->Validate() && $Validation);
        $Validation = ($this->QTY_SUB_TO->Validate() && $Validation);
        $Validation = ($this->SALES_COMPANY->Validate() && $Validation);
        $Validation = ($this->IS_PAYMENT_KEY->Validate() && $Validation);
        $Validation = ($this->SUB_ARE_CODE->Validate() && $Validation);
        $Validation = ($this->P_SUB_BUSINESS_AREA_ID->Validate() && $Validation);
        $Validation = ($this->RE_ACTIVATION_DATE->Validate() && $Validation);
        $Validation = ($this->DEBTOR_SEGMENT_CODE->Validate() && $Validation);
        $Validation = ($this->P_DEBTOR_SEGMENT_ID->Validate() && $Validation);
        $Validation = ($this->BUSINESS_SEGMENT_CODE->Validate() && $Validation);
        $Validation = ($this->P_BUSINESS_SEGMENT_ID->Validate() && $Validation);
        $Validation = ($this->SUBSCRIPTION_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_SEGMENT_CODE->Validate() && $Validation);
        $Validation = ($this->P_CUSTOMER_SEGMENT_ID->Validate() && $Validation);
        $Validation = ($this->BUILDING_STATUS_CODE->Validate() && $Validation);
        $Validation = ($this->BUILDING_STATUS_ID->Validate() && $Validation);
        $Validation = ($this->ADDRESS_1->Validate() && $Validation);
        $Validation = ($this->ADDRESS_2->Validate() && $Validation);
        $Validation = ($this->ADDRESS_3->Validate() && $Validation);
        $Validation = ($this->REGION_NAME->Validate() && $Validation);
        $Validation = ($this->P_REGION_ID->Validate() && $Validation);
        $Validation = ($this->ZIP_CODE->Validate() && $Validation);
        $Validation = ($this->ACTIVE_DATE->Validate() && $Validation);
        $Validation = ($this->START_INVOICE_DATE->Validate() && $Validation);
        $Validation = ($this->END_INVOICE_DATE->Validate() && $Validation);
        $Validation = ($this->CONTRACT_NUMBER->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->SERVICE_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUBSCRIBER_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUBSCRIPTION_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ACCOUNT_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ACCOUNT_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SERVICE_TYPE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->QTY_SUB_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TARIFF_SCENARIO_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_TARIFF_SCENARIO_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILL_PERIOD_UNIT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILLING_UNIT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILL_CYCLE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILL_CYCLE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUBSCRIPTION_STATUS_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LAST_STATUS_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_INVOICED->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_VAT_EXCEPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUBSCRIBER_SEGMENT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BUILDING_TYPE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BUILDING_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BUSINESS_AREA_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BUSINESS_AREA_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TERMINATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EM_DEGREE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EM_MINUTE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EM_SECOND->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SL_DEGREE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SL_MINUTE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SL_SECOND->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SALES_PERSON_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SALES_PERSON_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SUBSCRIPTION_STATUS_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SUBSCRIBER_SEGMENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_ACCOUNT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILLING_PERIOD_UNIT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->QTY_SUB_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SALES_COMPANY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_PAYMENT_KEY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUB_ARE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SUB_BUSINESS_AREA_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RE_ACTIVATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DEBTOR_SEGMENT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_DEBTOR_SEGMENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BUSINESS_SEGMENT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BUSINESS_SEGMENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUBSCRIPTION_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_SEGMENT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CUSTOMER_SEGMENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BUILDING_STATUS_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BUILDING_STATUS_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ADDRESS_1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ADDRESS_2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ADDRESS_3->Errors->Count() == 0);
        $Validation =  $Validation && ($this->REGION_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REGION_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ZIP_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ACTIVE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->START_INVOICE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->END_INVOICE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CONTRACT_NUMBER->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-3BE9598F
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->SERVICE_NO->Errors->Count());
        $errors = ($errors || $this->SUBSCRIBER_ID->Errors->Count());
        $errors = ($errors || $this->SUBSCRIPTION_NAME->Errors->Count());
        $errors = ($errors || $this->ACCOUNT_NAME->Errors->Count());
        $errors = ($errors || $this->ACCOUNT_NO->Errors->Count());
        $errors = ($errors || $this->SERVICE_TYPE_CODE->Errors->Count());
        $errors = ($errors || $this->QTY_SUB_FROM->Errors->Count());
        $errors = ($errors || $this->TARIFF_SCENARIO_CODE->Errors->Count());
        $errors = ($errors || $this->P_TARIFF_SCENARIO_ID->Errors->Count());
        $errors = ($errors || $this->BILL_PERIOD_UNIT_CODE->Errors->Count());
        $errors = ($errors || $this->BILLING_UNIT->Errors->Count());
        $errors = ($errors || $this->BILL_CYCLE_CODE->Errors->Count());
        $errors = ($errors || $this->P_BILL_CYCLE_ID->Errors->Count());
        $errors = ($errors || $this->SUBSCRIPTION_STATUS_CODE->Errors->Count());
        $errors = ($errors || $this->LAST_STATUS_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_LAST_STATUS_DATE->Errors->Count());
        $errors = ($errors || $this->IS_INVOICED->Errors->Count());
        $errors = ($errors || $this->IS_VAT_EXCEPTION->Errors->Count());
        $errors = ($errors || $this->SUBSCRIBER_SEGMENT_CODE->Errors->Count());
        $errors = ($errors || $this->BUILDING_TYPE_CODE->Errors->Count());
        $errors = ($errors || $this->BUILDING_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->P_BUSINESS_AREA_ID->Errors->Count());
        $errors = ($errors || $this->BUSINESS_AREA_CODE->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->TERMINATION_DATE->Errors->Count());
        $errors = ($errors || $this->EM_DEGREE->Errors->Count());
        $errors = ($errors || $this->EM_MINUTE->Errors->Count());
        $errors = ($errors || $this->EM_SECOND->Errors->Count());
        $errors = ($errors || $this->SL_DEGREE->Errors->Count());
        $errors = ($errors || $this->SL_MINUTE->Errors->Count());
        $errors = ($errors || $this->SL_SECOND->Errors->Count());
        $errors = ($errors || $this->SALES_PERSON_CODE->Errors->Count());
        $errors = ($errors || $this->P_SALES_PERSON_ID->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->P_SUBSCRIPTION_STATUS_ID->Errors->Count());
        $errors = ($errors || $this->P_SUBSCRIBER_SEGMENT_ID->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_ACCOUNT_ID->Errors->Count());
        $errors = ($errors || $this->P_BILLING_PERIOD_UNIT_ID->Errors->Count());
        $errors = ($errors || $this->QTY_SUB_TO->Errors->Count());
        $errors = ($errors || $this->SALES_COMPANY->Errors->Count());
        $errors = ($errors || $this->IS_PAYMENT_KEY->Errors->Count());
        $errors = ($errors || $this->SUB_ARE_CODE->Errors->Count());
        $errors = ($errors || $this->P_SUB_BUSINESS_AREA_ID->Errors->Count());
        $errors = ($errors || $this->RE_ACTIVATION_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_RE_ACTIVATION_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_TERMINATION_DATE->Errors->Count());
        $errors = ($errors || $this->DEBTOR_SEGMENT_CODE->Errors->Count());
        $errors = ($errors || $this->P_DEBTOR_SEGMENT_ID->Errors->Count());
        $errors = ($errors || $this->BUSINESS_SEGMENT_CODE->Errors->Count());
        $errors = ($errors || $this->P_BUSINESS_SEGMENT_ID->Errors->Count());
        $errors = ($errors || $this->SUBSCRIPTION_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_SEGMENT_CODE->Errors->Count());
        $errors = ($errors || $this->P_CUSTOMER_SEGMENT_ID->Errors->Count());
        $errors = ($errors || $this->BUILDING_STATUS_CODE->Errors->Count());
        $errors = ($errors || $this->BUILDING_STATUS_ID->Errors->Count());
        $errors = ($errors || $this->ADDRESS_1->Errors->Count());
        $errors = ($errors || $this->ADDRESS_2->Errors->Count());
        $errors = ($errors || $this->ADDRESS_3->Errors->Count());
        $errors = ($errors || $this->REGION_NAME->Errors->Count());
        $errors = ($errors || $this->P_REGION_ID->Errors->Count());
        $errors = ($errors || $this->ZIP_CODE->Errors->Count());
        $errors = ($errors || $this->ACTIVE_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_ACTIVE_DATE->Errors->Count());
        $errors = ($errors || $this->START_INVOICE_DATE->Errors->Count());
        $errors = ($errors || $this->END_INVOICE_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_END_INVOICE_DATE->Errors->Count());
        $errors = ($errors || $this->CONTRACT_NUMBER->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->DatePicker_START_INVOICE_DATE->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @2-ED598703
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

//Operation Method @2-596A8F0A
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
            $Redirect = "subscriber.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "P_APP_ROLE_ID", "s_keyword", "P_APP_ROLEPage"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = "subscriber.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_APP_ROLEPage"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = "subscriber.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = "subscriber.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
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

//InsertRow Method @2-18684AED
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->SERVICE_NO->SetValue($this->SERVICE_NO->GetValue(true));
        $this->DataSource->SUBSCRIBER_ID->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        $this->DataSource->SUBSCRIPTION_NAME->SetValue($this->SUBSCRIPTION_NAME->GetValue(true));
        $this->DataSource->QTY_SUB_FROM->SetValue($this->QTY_SUB_FROM->GetValue(true));
        $this->DataSource->P_TARIFF_SCENARIO_ID->SetValue($this->P_TARIFF_SCENARIO_ID->GetValue(true));
        $this->DataSource->BILLING_UNIT->SetValue($this->BILLING_UNIT->GetValue(true));
        $this->DataSource->P_BILL_CYCLE_ID->SetValue($this->P_BILL_CYCLE_ID->GetValue(true));
        $this->DataSource->IS_INVOICED->SetValue($this->IS_INVOICED->GetValue(true));
        $this->DataSource->IS_VAT_EXCEPTION->SetValue($this->IS_VAT_EXCEPTION->GetValue(true));
        $this->DataSource->BUILDING_TYPE_ID->SetValue($this->BUILDING_TYPE_ID->GetValue(true));
        $this->DataSource->P_BUSINESS_AREA_ID->SetValue($this->P_BUSINESS_AREA_ID->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->TERMINATION_DATE->SetValue($this->TERMINATION_DATE->GetValue(true));
        $this->DataSource->EM_DEGREE->SetValue($this->EM_DEGREE->GetValue(true));
        $this->DataSource->EM_MINUTE->SetValue($this->EM_MINUTE->GetValue(true));
        $this->DataSource->EM_SECOND->SetValue($this->EM_SECOND->GetValue(true));
        $this->DataSource->SL_DEGREE->SetValue($this->SL_DEGREE->GetValue(true));
        $this->DataSource->SL_MINUTE->SetValue($this->SL_MINUTE->GetValue(true));
        $this->DataSource->SL_SECOND->SetValue($this->SL_SECOND->GetValue(true));
        $this->DataSource->SALES_PERSON_CODE->SetValue($this->SALES_PERSON_CODE->GetValue(true));
        $this->DataSource->P_SALES_PERSON_ID->SetValue($this->P_SALES_PERSON_ID->GetValue(true));
        $this->DataSource->P_SUBSCRIPTION_STATUS_ID->SetValue($this->P_SUBSCRIPTION_STATUS_ID->GetValue(true));
        $this->DataSource->P_SUBSCRIBER_SEGMENT_ID->SetValue($this->P_SUBSCRIBER_SEGMENT_ID->GetValue(true));
        $this->DataSource->CUSTOMER_ACCOUNT_ID->SetValue($this->CUSTOMER_ACCOUNT_ID->GetValue(true));
        $this->DataSource->P_BILLING_PERIOD_UNIT_ID->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        $this->DataSource->QTY_SUB_TO->SetValue($this->QTY_SUB_TO->GetValue(true));
        $this->DataSource->SALES_COMPANY->SetValue($this->SALES_COMPANY->GetValue(true));
        $this->DataSource->IS_PAYMENT_KEY->SetValue($this->IS_PAYMENT_KEY->GetValue(true));
        $this->DataSource->P_SUB_BUSINESS_AREA_ID->SetValue($this->P_SUB_BUSINESS_AREA_ID->GetValue(true));
        $this->DataSource->RE_ACTIVATION_DATE->SetValue($this->RE_ACTIVATION_DATE->GetValue(true));
        $this->DataSource->P_DEBTOR_SEGMENT_ID->SetValue($this->P_DEBTOR_SEGMENT_ID->GetValue(true));
        $this->DataSource->P_BUSINESS_SEGMENT_ID->SetValue($this->P_BUSINESS_SEGMENT_ID->GetValue(true));
        $this->DataSource->SUBSCRIPTION_TYPE_ID->SetValue($this->SUBSCRIPTION_TYPE_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->P_CUSTOMER_SEGMENT_ID->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        $this->DataSource->BUILDING_STATUS_ID->SetValue($this->BUILDING_STATUS_ID->GetValue(true));
        $this->DataSource->ADDRESS_1->SetValue($this->ADDRESS_1->GetValue(true));
        $this->DataSource->ADDRESS_2->SetValue($this->ADDRESS_2->GetValue(true));
        $this->DataSource->ADDRESS_3->SetValue($this->ADDRESS_3->GetValue(true));
        $this->DataSource->P_REGION_ID->SetValue($this->P_REGION_ID->GetValue(true));
        $this->DataSource->ZIP_CODE->SetValue($this->ZIP_CODE->GetValue(true));
        $this->DataSource->ACTIVE_DATE->SetValue($this->ACTIVE_DATE->GetValue(true));
        $this->DataSource->START_INVOICE_DATE->SetValue($this->START_INVOICE_DATE->GetValue(true));
        $this->DataSource->END_INVOICE_DATE->SetValue($this->END_INVOICE_DATE->GetValue(true));
        $this->DataSource->CONTRACT_NUMBER->SetValue($this->CONTRACT_NUMBER->GetValue(true));
        $this->DataSource->ACCOUNT_NO->SetValue($this->ACCOUNT_NO->GetValue(true));
        $this->DataSource->BILL_CYCLE_CODE->SetValue($this->BILL_CYCLE_CODE->GetValue(true));
        $this->DataSource->LAST_STATUS_DATE->SetValue($this->LAST_STATUS_DATE->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @2-0C74BC9D
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->SERVICE_NO->SetValue($this->SERVICE_NO->GetValue(true));
        $this->DataSource->SUBSCRIBER_ID->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        $this->DataSource->SUBSCRIPTION_NAME->SetValue($this->SUBSCRIPTION_NAME->GetValue(true));
        $this->DataSource->QTY_SUB_FROM->SetValue($this->QTY_SUB_FROM->GetValue(true));
        $this->DataSource->P_TARIFF_SCENARIO_ID->SetValue($this->P_TARIFF_SCENARIO_ID->GetValue(true));
        $this->DataSource->BILLING_UNIT->SetValue($this->BILLING_UNIT->GetValue(true));
        $this->DataSource->P_BILL_CYCLE_ID->SetValue($this->P_BILL_CYCLE_ID->GetValue(true));
        $this->DataSource->LAST_STATUS_DATE->SetValue($this->LAST_STATUS_DATE->GetValue(true));
        $this->DataSource->IS_INVOICED->SetValue($this->IS_INVOICED->GetValue(true));
        $this->DataSource->IS_VAT_EXCEPTION->SetValue($this->IS_VAT_EXCEPTION->GetValue(true));
        $this->DataSource->BUILDING_TYPE_ID->SetValue($this->BUILDING_TYPE_ID->GetValue(true));
        $this->DataSource->P_BUSINESS_AREA_ID->SetValue($this->P_BUSINESS_AREA_ID->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->TERMINATION_DATE->SetValue($this->TERMINATION_DATE->GetValue(true));
        $this->DataSource->EM_DEGREE->SetValue($this->EM_DEGREE->GetValue(true));
        $this->DataSource->EM_MINUTE->SetValue($this->EM_MINUTE->GetValue(true));
        $this->DataSource->EM_SECOND->SetValue($this->EM_SECOND->GetValue(true));
        $this->DataSource->SL_DEGREE->SetValue($this->SL_DEGREE->GetValue(true));
        $this->DataSource->SL_MINUTE->SetValue($this->SL_MINUTE->GetValue(true));
        $this->DataSource->SL_SECOND->SetValue($this->SL_SECOND->GetValue(true));
        $this->DataSource->P_SALES_PERSON_ID->SetValue($this->P_SALES_PERSON_ID->GetValue(true));
        $this->DataSource->P_SUBSCRIPTION_STATUS_ID->SetValue($this->P_SUBSCRIPTION_STATUS_ID->GetValue(true));
        $this->DataSource->P_SUBSCRIBER_SEGMENT_ID->SetValue($this->P_SUBSCRIBER_SEGMENT_ID->GetValue(true));
        $this->DataSource->CUSTOMER_ACCOUNT_ID->SetValue($this->CUSTOMER_ACCOUNT_ID->GetValue(true));
        $this->DataSource->P_BILLING_PERIOD_UNIT_ID->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        $this->DataSource->QTY_SUB_TO->SetValue($this->QTY_SUB_TO->GetValue(true));
        $this->DataSource->IS_PAYMENT_KEY->SetValue($this->IS_PAYMENT_KEY->GetValue(true));
        $this->DataSource->P_SUB_BUSINESS_AREA_ID->SetValue($this->P_SUB_BUSINESS_AREA_ID->GetValue(true));
        $this->DataSource->RE_ACTIVATION_DATE->SetValue($this->RE_ACTIVATION_DATE->GetValue(true));
        $this->DataSource->P_DEBTOR_SEGMENT_ID->SetValue($this->P_DEBTOR_SEGMENT_ID->GetValue(true));
        $this->DataSource->P_BUSINESS_SEGMENT_ID->SetValue($this->P_BUSINESS_SEGMENT_ID->GetValue(true));
        $this->DataSource->SUBSCRIPTION_TYPE_ID->SetValue($this->SUBSCRIPTION_TYPE_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->P_CUSTOMER_SEGMENT_ID->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        $this->DataSource->BUILDING_STATUS_ID->SetValue($this->BUILDING_STATUS_ID->GetValue(true));
        $this->DataSource->ADDRESS_1->SetValue($this->ADDRESS_1->GetValue(true));
        $this->DataSource->ADDRESS_2->SetValue($this->ADDRESS_2->GetValue(true));
        $this->DataSource->ADDRESS_3->SetValue($this->ADDRESS_3->GetValue(true));
        $this->DataSource->P_REGION_ID->SetValue($this->P_REGION_ID->GetValue(true));
        $this->DataSource->ZIP_CODE->SetValue($this->ZIP_CODE->GetValue(true));
        $this->DataSource->ACTIVE_DATE->SetValue($this->ACTIVE_DATE->GetValue(true));
        $this->DataSource->START_INVOICE_DATE->SetValue($this->START_INVOICE_DATE->GetValue(true));
        $this->DataSource->END_INVOICE_DATE->SetValue($this->END_INVOICE_DATE->GetValue(true));
        $this->DataSource->CONTRACT_NUMBER->SetValue($this->CONTRACT_NUMBER->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @2-2E8BF5D9
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->SUBSCRIBER_ID->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @2-1BBAA141
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

        $this->IS_INVOICED->Prepare();
        $this->IS_VAT_EXCEPTION->Prepare();
        $this->IS_PAYMENT_KEY->Prepare();
        $this->SUBSCRIPTION_TYPE_ID->Prepare();

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
                    $this->SERVICE_NO->SetValue($this->DataSource->SERVICE_NO->GetValue());
                    $this->SUBSCRIBER_ID->SetValue($this->DataSource->SUBSCRIBER_ID->GetValue());
                    $this->SUBSCRIPTION_NAME->SetValue($this->DataSource->SUBSCRIPTION_NAME->GetValue());
                    $this->ACCOUNT_NAME->SetValue($this->DataSource->ACCOUNT_NAME->GetValue());
                    $this->ACCOUNT_NO->SetValue($this->DataSource->ACCOUNT_NO->GetValue());
                    $this->SERVICE_TYPE_CODE->SetValue($this->DataSource->SERVICE_TYPE_CODE->GetValue());
                    $this->QTY_SUB_FROM->SetValue($this->DataSource->QTY_SUB_FROM->GetValue());
                    $this->TARIFF_SCENARIO_CODE->SetValue($this->DataSource->TARIFF_SCENARIO_CODE->GetValue());
                    $this->P_TARIFF_SCENARIO_ID->SetValue($this->DataSource->P_TARIFF_SCENARIO_ID->GetValue());
                    $this->BILL_PERIOD_UNIT_CODE->SetValue($this->DataSource->BILL_PERIOD_UNIT_CODE->GetValue());
                    $this->BILLING_UNIT->SetValue($this->DataSource->BILLING_UNIT->GetValue());
                    $this->BILL_CYCLE_CODE->SetValue($this->DataSource->BILL_CYCLE_CODE->GetValue());
                    $this->P_BILL_CYCLE_ID->SetValue($this->DataSource->P_BILL_CYCLE_ID->GetValue());
                    $this->SUBSCRIPTION_STATUS_CODE->SetValue($this->DataSource->SUBSCRIPTION_STATUS_CODE->GetValue());
                    $this->LAST_STATUS_DATE->SetValue($this->DataSource->LAST_STATUS_DATE->GetValue());
                    $this->IS_INVOICED->SetValue($this->DataSource->IS_INVOICED->GetValue());
                    $this->IS_VAT_EXCEPTION->SetValue($this->DataSource->IS_VAT_EXCEPTION->GetValue());
                    $this->SUBSCRIBER_SEGMENT_CODE->SetValue($this->DataSource->SUBSCRIBER_SEGMENT_CODE->GetValue());
                    $this->BUILDING_TYPE_CODE->SetValue($this->DataSource->BUILDING_TYPE_CODE->GetValue());
                    $this->BUILDING_TYPE_ID->SetValue($this->DataSource->BUILDING_TYPE_ID->GetValue());
                    $this->P_BUSINESS_AREA_ID->SetValue($this->DataSource->P_BUSINESS_AREA_ID->GetValue());
                    $this->BUSINESS_AREA_CODE->SetValue($this->DataSource->BUSINESS_AREA_CODE->GetValue());
                    $this->P_SERVICE_TYPE_ID->SetValue($this->DataSource->P_SERVICE_TYPE_ID->GetValue());
                    $this->TERMINATION_DATE->SetValue($this->DataSource->TERMINATION_DATE->GetValue());
                    $this->EM_DEGREE->SetValue($this->DataSource->EM_DEGREE->GetValue());
                    $this->EM_MINUTE->SetValue($this->DataSource->EM_MINUTE->GetValue());
                    $this->EM_SECOND->SetValue($this->DataSource->EM_SECOND->GetValue());
                    $this->SL_DEGREE->SetValue($this->DataSource->SL_DEGREE->GetValue());
                    $this->SL_MINUTE->SetValue($this->DataSource->SL_MINUTE->GetValue());
                    $this->SL_SECOND->SetValue($this->DataSource->SL_SECOND->GetValue());
                    $this->SALES_PERSON_CODE->SetValue($this->DataSource->SALES_PERSON_CODE->GetValue());
                    $this->P_SALES_PERSON_ID->SetValue($this->DataSource->P_SALES_PERSON_ID->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->P_SUBSCRIPTION_STATUS_ID->SetValue($this->DataSource->P_SUBSCRIPTION_STATUS_ID->GetValue());
                    $this->P_SUBSCRIBER_SEGMENT_ID->SetValue($this->DataSource->P_SUBSCRIBER_SEGMENT_ID->GetValue());
                    $this->CUSTOMER_ACCOUNT_ID->SetValue($this->DataSource->CUSTOMER_ACCOUNT_ID->GetValue());
                    $this->P_BILLING_PERIOD_UNIT_ID->SetValue($this->DataSource->P_BILLING_PERIOD_UNIT_ID->GetValue());
                    $this->QTY_SUB_TO->SetValue($this->DataSource->QTY_SUB_TO->GetValue());
                    $this->SALES_COMPANY->SetValue($this->DataSource->SALES_COMPANY->GetValue());
                    $this->IS_PAYMENT_KEY->SetValue($this->DataSource->IS_PAYMENT_KEY->GetValue());
                    $this->SUB_ARE_CODE->SetValue($this->DataSource->SUB_ARE_CODE->GetValue());
                    $this->P_SUB_BUSINESS_AREA_ID->SetValue($this->DataSource->P_SUB_BUSINESS_AREA_ID->GetValue());
                    $this->RE_ACTIVATION_DATE->SetValue($this->DataSource->RE_ACTIVATION_DATE->GetValue());
                    $this->DEBTOR_SEGMENT_CODE->SetValue($this->DataSource->DEBTOR_SEGMENT_CODE->GetValue());
                    $this->P_DEBTOR_SEGMENT_ID->SetValue($this->DataSource->P_DEBTOR_SEGMENT_ID->GetValue());
                    $this->BUSINESS_SEGMENT_CODE->SetValue($this->DataSource->BUSINESS_SEGMENT_CODE->GetValue());
                    $this->P_BUSINESS_SEGMENT_ID->SetValue($this->DataSource->P_BUSINESS_SEGMENT_ID->GetValue());
                    $this->SUBSCRIPTION_TYPE_ID->SetValue($this->DataSource->SUBSCRIPTION_TYPE_ID->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->CUSTOMER_SEGMENT_CODE->SetValue($this->DataSource->CUSTOMER_SEGMENT_CODE->GetValue());
                    $this->P_CUSTOMER_SEGMENT_ID->SetValue($this->DataSource->P_CUSTOMER_SEGMENT_ID->GetValue());
                    $this->BUILDING_STATUS_CODE->SetValue($this->DataSource->BUILDING_STATUS_CODE->GetValue());
                    $this->BUILDING_STATUS_ID->SetValue($this->DataSource->BUILDING_STATUS_ID->GetValue());
                    $this->ADDRESS_1->SetValue($this->DataSource->ADDRESS_1->GetValue());
                    $this->ADDRESS_2->SetValue($this->DataSource->ADDRESS_2->GetValue());
                    $this->ADDRESS_3->SetValue($this->DataSource->ADDRESS_3->GetValue());
                    $this->REGION_NAME->SetValue($this->DataSource->REGION_NAME->GetValue());
                    $this->P_REGION_ID->SetValue($this->DataSource->P_REGION_ID->GetValue());
                    $this->ZIP_CODE->SetValue($this->DataSource->ZIP_CODE->GetValue());
                    $this->ACTIVE_DATE->SetValue($this->DataSource->ACTIVE_DATE->GetValue());
                    $this->START_INVOICE_DATE->SetValue($this->DataSource->START_INVOICE_DATE->GetValue());
                    $this->END_INVOICE_DATE->SetValue($this->DataSource->END_INVOICE_DATE->GetValue());
                    $this->CONTRACT_NUMBER->SetValue($this->DataSource->CONTRACT_NUMBER->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->SERVICE_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUBSCRIBER_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUBSCRIPTION_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ACCOUNT_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ACCOUNT_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SERVICE_TYPE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->QTY_SUB_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TARIFF_SCENARIO_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_TARIFF_SCENARIO_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILL_PERIOD_UNIT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILLING_UNIT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILL_CYCLE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILL_CYCLE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUBSCRIPTION_STATUS_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LAST_STATUS_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_LAST_STATUS_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_INVOICED->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_VAT_EXCEPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUBSCRIBER_SEGMENT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BUILDING_TYPE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BUILDING_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BUSINESS_AREA_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BUSINESS_AREA_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TERMINATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EM_DEGREE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EM_MINUTE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EM_SECOND->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SL_DEGREE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SL_MINUTE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SL_SECOND->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SALES_PERSON_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SALES_PERSON_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SUBSCRIPTION_STATUS_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SUBSCRIBER_SEGMENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_ACCOUNT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILLING_PERIOD_UNIT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->QTY_SUB_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SALES_COMPANY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_PAYMENT_KEY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUB_ARE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SUB_BUSINESS_AREA_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RE_ACTIVATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_RE_ACTIVATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_TERMINATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DEBTOR_SEGMENT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_DEBTOR_SEGMENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BUSINESS_SEGMENT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BUSINESS_SEGMENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUBSCRIPTION_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_SEGMENT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CUSTOMER_SEGMENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BUILDING_STATUS_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BUILDING_STATUS_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ADDRESS_1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ADDRESS_2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ADDRESS_3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->REGION_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REGION_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ZIP_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ACTIVE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_ACTIVE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->START_INVOICE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->END_INVOICE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_END_INVOICE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CONTRACT_NUMBER->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_START_INVOICE_DATE->Errors->ToString());
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

        $this->SERVICE_NO->Show();
        $this->SUBSCRIBER_ID->Show();
        $this->SUBSCRIPTION_NAME->Show();
        $this->ACCOUNT_NAME->Show();
        $this->ACCOUNT_NO->Show();
        $this->SERVICE_TYPE_CODE->Show();
        $this->QTY_SUB_FROM->Show();
        $this->TARIFF_SCENARIO_CODE->Show();
        $this->P_TARIFF_SCENARIO_ID->Show();
        $this->BILL_PERIOD_UNIT_CODE->Show();
        $this->BILLING_UNIT->Show();
        $this->BILL_CYCLE_CODE->Show();
        $this->P_BILL_CYCLE_ID->Show();
        $this->SUBSCRIPTION_STATUS_CODE->Show();
        $this->LAST_STATUS_DATE->Show();
        $this->DatePicker_LAST_STATUS_DATE->Show();
        $this->IS_INVOICED->Show();
        $this->IS_VAT_EXCEPTION->Show();
        $this->SUBSCRIBER_SEGMENT_CODE->Show();
        $this->BUILDING_TYPE_CODE->Show();
        $this->BUILDING_TYPE_ID->Show();
        $this->P_BUSINESS_AREA_ID->Show();
        $this->BUSINESS_AREA_CODE->Show();
        $this->P_SERVICE_TYPE_ID->Show();
        $this->TERMINATION_DATE->Show();
        $this->EM_DEGREE->Show();
        $this->EM_MINUTE->Show();
        $this->EM_SECOND->Show();
        $this->SL_DEGREE->Show();
        $this->SL_MINUTE->Show();
        $this->SL_SECOND->Show();
        $this->SALES_PERSON_CODE->Show();
        $this->P_SALES_PERSON_ID->Show();
        $this->UPDATE_DATE->Show();
        $this->DatePicker_UPDATE_DATE->Show();
        $this->P_SUBSCRIPTION_STATUS_ID->Show();
        $this->P_SUBSCRIBER_SEGMENT_ID->Show();
        $this->CUSTOMER_ACCOUNT_ID->Show();
        $this->P_BILLING_PERIOD_UNIT_ID->Show();
        $this->QTY_SUB_TO->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->SALES_COMPANY->Show();
        $this->IS_PAYMENT_KEY->Show();
        $this->SUB_ARE_CODE->Show();
        $this->P_SUB_BUSINESS_AREA_ID->Show();
        $this->RE_ACTIVATION_DATE->Show();
        $this->DatePicker_RE_ACTIVATION_DATE->Show();
        $this->DatePicker_TERMINATION_DATE->Show();
        $this->DEBTOR_SEGMENT_CODE->Show();
        $this->P_DEBTOR_SEGMENT_ID->Show();
        $this->BUSINESS_SEGMENT_CODE->Show();
        $this->P_BUSINESS_SEGMENT_ID->Show();
        $this->SUBSCRIPTION_TYPE_ID->Show();
        $this->DESCRIPTION->Show();
        $this->CUSTOMER_SEGMENT_CODE->Show();
        $this->P_CUSTOMER_SEGMENT_ID->Show();
        $this->BUILDING_STATUS_CODE->Show();
        $this->BUILDING_STATUS_ID->Show();
        $this->ADDRESS_1->Show();
        $this->ADDRESS_2->Show();
        $this->ADDRESS_3->Show();
        $this->REGION_NAME->Show();
        $this->P_REGION_ID->Show();
        $this->ZIP_CODE->Show();
        $this->ACTIVE_DATE->Show();
        $this->DatePicker_ACTIVE_DATE->Show();
        $this->START_INVOICE_DATE->Show();
        $this->END_INVOICE_DATE->Show();
        $this->DatePicker_END_INVOICE_DATE->Show();
        $this->CONTRACT_NUMBER->Show();
        $this->CREATION_DATE->Show();
        $this->DatePicker_CREATION_DATE->Show();
        $this->UPDATE_BY->Show();
        $this->DatePicker_START_INVOICE_DATE->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End V_SUBSCRIBER Class @2-FCB6E20C

class clsV_SUBSCRIBERDataSource extends clsDBConn {  //V_SUBSCRIBERDataSource Class @2-43FCAC88

//DataSource Variables @2-9EEF5B20
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
    var $SERVICE_NO;
    var $SUBSCRIBER_ID;
    var $SUBSCRIPTION_NAME;
    var $ACCOUNT_NAME;
    var $ACCOUNT_NO;
    var $SERVICE_TYPE_CODE;
    var $QTY_SUB_FROM;
    var $TARIFF_SCENARIO_CODE;
    var $P_TARIFF_SCENARIO_ID;
    var $BILL_PERIOD_UNIT_CODE;
    var $BILLING_UNIT;
    var $BILL_CYCLE_CODE;
    var $P_BILL_CYCLE_ID;
    var $SUBSCRIPTION_STATUS_CODE;
    var $LAST_STATUS_DATE;
    var $IS_INVOICED;
    var $IS_VAT_EXCEPTION;
    var $SUBSCRIBER_SEGMENT_CODE;
    var $BUILDING_TYPE_CODE;
    var $BUILDING_TYPE_ID;
    var $P_BUSINESS_AREA_ID;
    var $BUSINESS_AREA_CODE;
    var $P_SERVICE_TYPE_ID;
    var $TERMINATION_DATE;
    var $EM_DEGREE;
    var $EM_MINUTE;
    var $EM_SECOND;
    var $SL_DEGREE;
    var $SL_MINUTE;
    var $SL_SECOND;
    var $SALES_PERSON_CODE;
    var $P_SALES_PERSON_ID;
    var $UPDATE_DATE;
    var $P_SUBSCRIPTION_STATUS_ID;
    var $P_SUBSCRIBER_SEGMENT_ID;
    var $CUSTOMER_ACCOUNT_ID;
    var $P_BILLING_PERIOD_UNIT_ID;
    var $QTY_SUB_TO;
    var $SALES_COMPANY;
    var $IS_PAYMENT_KEY;
    var $SUB_ARE_CODE;
    var $P_SUB_BUSINESS_AREA_ID;
    var $RE_ACTIVATION_DATE;
    var $DEBTOR_SEGMENT_CODE;
    var $P_DEBTOR_SEGMENT_ID;
    var $BUSINESS_SEGMENT_CODE;
    var $P_BUSINESS_SEGMENT_ID;
    var $SUBSCRIPTION_TYPE_ID;
    var $DESCRIPTION;
    var $CUSTOMER_SEGMENT_CODE;
    var $P_CUSTOMER_SEGMENT_ID;
    var $BUILDING_STATUS_CODE;
    var $BUILDING_STATUS_ID;
    var $ADDRESS_1;
    var $ADDRESS_2;
    var $ADDRESS_3;
    var $REGION_NAME;
    var $P_REGION_ID;
    var $ZIP_CODE;
    var $ACTIVE_DATE;
    var $START_INVOICE_DATE;
    var $END_INVOICE_DATE;
    var $CONTRACT_NUMBER;
    var $CREATION_DATE;
    var $UPDATE_BY;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-3B333806
    function clsV_SUBSCRIBERDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record V_SUBSCRIBER/Error";
        $this->Initialize();
        $this->SERVICE_NO = new clsField("SERVICE_NO", ccsFloat, "");
        
        $this->SUBSCRIBER_ID = new clsField("SUBSCRIBER_ID", ccsFloat, "");
        
        $this->SUBSCRIPTION_NAME = new clsField("SUBSCRIPTION_NAME", ccsText, "");
        
        $this->ACCOUNT_NAME = new clsField("ACCOUNT_NAME", ccsText, "");
        
        $this->ACCOUNT_NO = new clsField("ACCOUNT_NO", ccsText, "");
        
        $this->SERVICE_TYPE_CODE = new clsField("SERVICE_TYPE_CODE", ccsText, "");
        
        $this->QTY_SUB_FROM = new clsField("QTY_SUB_FROM", ccsFloat, "");
        
        $this->TARIFF_SCENARIO_CODE = new clsField("TARIFF_SCENARIO_CODE", ccsText, "");
        
        $this->P_TARIFF_SCENARIO_ID = new clsField("P_TARIFF_SCENARIO_ID", ccsFloat, "");
        
        $this->BILL_PERIOD_UNIT_CODE = new clsField("BILL_PERIOD_UNIT_CODE", ccsText, "");
        
        $this->BILLING_UNIT = new clsField("BILLING_UNIT", ccsFloat, "");
        
        $this->BILL_CYCLE_CODE = new clsField("BILL_CYCLE_CODE", ccsText, "");
        
        $this->P_BILL_CYCLE_ID = new clsField("P_BILL_CYCLE_ID", ccsFloat, "");
        
        $this->SUBSCRIPTION_STATUS_CODE = new clsField("SUBSCRIPTION_STATUS_CODE", ccsText, "");
        
        $this->LAST_STATUS_DATE = new clsField("LAST_STATUS_DATE", ccsDate, $this->DateFormat);
        
        $this->IS_INVOICED = new clsField("IS_INVOICED", ccsText, "");
        
        $this->IS_VAT_EXCEPTION = new clsField("IS_VAT_EXCEPTION", ccsText, "");
        
        $this->SUBSCRIBER_SEGMENT_CODE = new clsField("SUBSCRIBER_SEGMENT_CODE", ccsText, "");
        
        $this->BUILDING_TYPE_CODE = new clsField("BUILDING_TYPE_CODE", ccsText, "");
        
        $this->BUILDING_TYPE_ID = new clsField("BUILDING_TYPE_ID", ccsFloat, "");
        
        $this->P_BUSINESS_AREA_ID = new clsField("P_BUSINESS_AREA_ID", ccsFloat, "");
        
        $this->BUSINESS_AREA_CODE = new clsField("BUSINESS_AREA_CODE", ccsText, "");
        
        $this->P_SERVICE_TYPE_ID = new clsField("P_SERVICE_TYPE_ID", ccsFloat, "");
        
        $this->TERMINATION_DATE = new clsField("TERMINATION_DATE", ccsDate, $this->DateFormat);
        
        $this->EM_DEGREE = new clsField("EM_DEGREE", ccsFloat, "");
        
        $this->EM_MINUTE = new clsField("EM_MINUTE", ccsFloat, "");
        
        $this->EM_SECOND = new clsField("EM_SECOND", ccsFloat, "");
        
        $this->SL_DEGREE = new clsField("SL_DEGREE", ccsFloat, "");
        
        $this->SL_MINUTE = new clsField("SL_MINUTE", ccsFloat, "");
        
        $this->SL_SECOND = new clsField("SL_SECOND", ccsFloat, "");
        
        $this->SALES_PERSON_CODE = new clsField("SALES_PERSON_CODE", ccsText, "");
        
        $this->P_SALES_PERSON_ID = new clsField("P_SALES_PERSON_ID", ccsFloat, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->P_SUBSCRIPTION_STATUS_ID = new clsField("P_SUBSCRIPTION_STATUS_ID", ccsFloat, "");
        
        $this->P_SUBSCRIBER_SEGMENT_ID = new clsField("P_SUBSCRIBER_SEGMENT_ID", ccsFloat, "");
        
        $this->CUSTOMER_ACCOUNT_ID = new clsField("CUSTOMER_ACCOUNT_ID", ccsFloat, "");
        
        $this->P_BILLING_PERIOD_UNIT_ID = new clsField("P_BILLING_PERIOD_UNIT_ID", ccsFloat, "");
        
        $this->QTY_SUB_TO = new clsField("QTY_SUB_TO", ccsFloat, "");
        
        $this->SALES_COMPANY = new clsField("SALES_COMPANY", ccsText, "");
        
        $this->IS_PAYMENT_KEY = new clsField("IS_PAYMENT_KEY", ccsText, "");
        
        $this->SUB_ARE_CODE = new clsField("SUB_ARE_CODE", ccsText, "");
        
        $this->P_SUB_BUSINESS_AREA_ID = new clsField("P_SUB_BUSINESS_AREA_ID", ccsFloat, "");
        
        $this->RE_ACTIVATION_DATE = new clsField("RE_ACTIVATION_DATE", ccsDate, $this->DateFormat);
        
        $this->DEBTOR_SEGMENT_CODE = new clsField("DEBTOR_SEGMENT_CODE", ccsText, "");
        
        $this->P_DEBTOR_SEGMENT_ID = new clsField("P_DEBTOR_SEGMENT_ID", ccsFloat, "");
        
        $this->BUSINESS_SEGMENT_CODE = new clsField("BUSINESS_SEGMENT_CODE", ccsText, "");
        
        $this->P_BUSINESS_SEGMENT_ID = new clsField("P_BUSINESS_SEGMENT_ID", ccsFloat, "");
        
        $this->SUBSCRIPTION_TYPE_ID = new clsField("SUBSCRIPTION_TYPE_ID", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->CUSTOMER_SEGMENT_CODE = new clsField("CUSTOMER_SEGMENT_CODE", ccsText, "");
        
        $this->P_CUSTOMER_SEGMENT_ID = new clsField("P_CUSTOMER_SEGMENT_ID", ccsFloat, "");
        
        $this->BUILDING_STATUS_CODE = new clsField("BUILDING_STATUS_CODE", ccsText, "");
        
        $this->BUILDING_STATUS_ID = new clsField("BUILDING_STATUS_ID", ccsFloat, "");
        
        $this->ADDRESS_1 = new clsField("ADDRESS_1", ccsText, "");
        
        $this->ADDRESS_2 = new clsField("ADDRESS_2", ccsText, "");
        
        $this->ADDRESS_3 = new clsField("ADDRESS_3", ccsText, "");
        
        $this->REGION_NAME = new clsField("REGION_NAME", ccsText, "");
        
        $this->P_REGION_ID = new clsField("P_REGION_ID", ccsFloat, "");
        
        $this->ZIP_CODE = new clsField("ZIP_CODE", ccsFloat, "");
        
        $this->ACTIVE_DATE = new clsField("ACTIVE_DATE", ccsDate, $this->DateFormat);
        
        $this->START_INVOICE_DATE = new clsField("START_INVOICE_DATE", ccsDate, $this->DateFormat);
        
        $this->END_INVOICE_DATE = new clsField("END_INVOICE_DATE", ccsDate, $this->DateFormat);
        
        $this->CONTRACT_NUMBER = new clsField("CONTRACT_NUMBER", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-328A3B75
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlSUBSCRIBER_ID", ccsFloat, "", "", $this->Parameters["urlSUBSCRIBER_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "SUBSCRIBER_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-7F8F98DD
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_SUBSCRIBER {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-FBC87768
    function SetValues()
    {
        $this->SERVICE_NO->SetDBValue(trim($this->f("SERVICE_NO")));
        $this->SUBSCRIBER_ID->SetDBValue(trim($this->f("SUBSCRIBER_ID")));
        $this->SUBSCRIPTION_NAME->SetDBValue($this->f("SUBSCRIPTION_NAME"));
        $this->ACCOUNT_NAME->SetDBValue($this->f("ACCOUNT_NAME"));
        $this->ACCOUNT_NO->SetDBValue($this->f("ACCOUNT_NO"));
        $this->SERVICE_TYPE_CODE->SetDBValue($this->f("SERVICE_TYPE_CODE"));
        $this->QTY_SUB_FROM->SetDBValue(trim($this->f("QTY_SUB_FROM")));
        $this->TARIFF_SCENARIO_CODE->SetDBValue($this->f("TARIFF_SCENARIO_CODE"));
        $this->P_TARIFF_SCENARIO_ID->SetDBValue(trim($this->f("P_TARIFF_SCENARIO_ID")));
        $this->BILL_PERIOD_UNIT_CODE->SetDBValue($this->f("BILL_PERIOD_UNIT_CODE"));
        $this->BILLING_UNIT->SetDBValue(trim($this->f("BILLING_UNIT")));
        $this->BILL_CYCLE_CODE->SetDBValue($this->f("BILL_CYCLE_CODE"));
        $this->P_BILL_CYCLE_ID->SetDBValue(trim($this->f("P_BILL_CYCLE_ID")));
        $this->SUBSCRIPTION_STATUS_CODE->SetDBValue($this->f("SUBSCRIPTION_STATUS_CODE"));
        $this->LAST_STATUS_DATE->SetDBValue(trim($this->f("LAST_STATUS_DATE")));
        $this->IS_INVOICED->SetDBValue($this->f("IS_INVOICED"));
        $this->IS_VAT_EXCEPTION->SetDBValue($this->f("IS_VAT_EXCEPTION"));
        $this->SUBSCRIBER_SEGMENT_CODE->SetDBValue($this->f("SUBSCRIBER_SEGMENT_CODE"));
        $this->BUILDING_TYPE_CODE->SetDBValue($this->f("BUILDING_TYPE_CODE"));
        $this->BUILDING_TYPE_ID->SetDBValue(trim($this->f("BUILDING_TYPE_ID")));
        $this->P_BUSINESS_AREA_ID->SetDBValue(trim($this->f("P_BUSINESS_AREA_ID")));
        $this->BUSINESS_AREA_CODE->SetDBValue($this->f("BUSINESS_AREA_CODE"));
        $this->P_SERVICE_TYPE_ID->SetDBValue(trim($this->f("P_SERVICE_TYPE_ID")));
        $this->TERMINATION_DATE->SetDBValue(trim($this->f("TERMINATION_DATE")));
        $this->EM_DEGREE->SetDBValue(trim($this->f("EM_DEGREE")));
        $this->EM_MINUTE->SetDBValue(trim($this->f("EM_MINUTE")));
        $this->EM_SECOND->SetDBValue(trim($this->f("EM_SECOND")));
        $this->SL_DEGREE->SetDBValue(trim($this->f("SL_DEGREE")));
        $this->SL_MINUTE->SetDBValue(trim($this->f("SL_MINUTE")));
        $this->SL_SECOND->SetDBValue(trim($this->f("SL_SECOND")));
        $this->SALES_PERSON_CODE->SetDBValue($this->f("SALES_PERSON_CODE"));
        $this->P_SALES_PERSON_ID->SetDBValue(trim($this->f("P_SALES_PERSON_ID")));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->P_SUBSCRIPTION_STATUS_ID->SetDBValue(trim($this->f("P_SUBSCRIPTION_STATUS_ID")));
        $this->P_SUBSCRIBER_SEGMENT_ID->SetDBValue(trim($this->f("P_SUBSCRIBER_SEGMENT_ID")));
        $this->CUSTOMER_ACCOUNT_ID->SetDBValue(trim($this->f("CUSTOMER_ACCOUNT_ID")));
        $this->P_BILLING_PERIOD_UNIT_ID->SetDBValue(trim($this->f("P_BILLING_PERIOD_UNIT_ID")));
        $this->QTY_SUB_TO->SetDBValue(trim($this->f("QTY_SUB_TO")));
        $this->SALES_COMPANY->SetDBValue($this->f("SALES_COMPANY"));
        $this->IS_PAYMENT_KEY->SetDBValue($this->f("IS_PAYMENT_KEY"));
        $this->SUB_ARE_CODE->SetDBValue($this->f("SUB_ARE_CODE"));
        $this->P_SUB_BUSINESS_AREA_ID->SetDBValue(trim($this->f("P_SUB_BUSINESS_AREA_ID")));
        $this->RE_ACTIVATION_DATE->SetDBValue(trim($this->f("RE_ACTIVATION_DATE")));
        $this->DEBTOR_SEGMENT_CODE->SetDBValue($this->f("DEBTOR_SEGMENT_CODE"));
        $this->P_DEBTOR_SEGMENT_ID->SetDBValue(trim($this->f("P_DEBTOR_SEGMENT_ID")));
        $this->BUSINESS_SEGMENT_CODE->SetDBValue($this->f("BUSINESS_SEGMENT_CODE"));
        $this->P_BUSINESS_SEGMENT_ID->SetDBValue(trim($this->f("P_BUSINESS_SEGMENT_ID")));
        $this->SUBSCRIPTION_TYPE_ID->SetDBValue(trim($this->f("SUBSCRIPTION_TYPE_ID")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CUSTOMER_SEGMENT_CODE->SetDBValue($this->f("CUSTOMER_SEGMENT_CODE"));
        $this->P_CUSTOMER_SEGMENT_ID->SetDBValue(trim($this->f("P_CUSTOMER_SEGMENT_ID")));
        $this->BUILDING_STATUS_CODE->SetDBValue($this->f("BUILDING_STATUS_CODE"));
        $this->BUILDING_STATUS_ID->SetDBValue(trim($this->f("BUILDING_STATUS_ID")));
        $this->ADDRESS_1->SetDBValue($this->f("ADDRESS_1"));
        $this->ADDRESS_2->SetDBValue($this->f("ADDRESS_2"));
        $this->ADDRESS_3->SetDBValue($this->f("ADDRESS_3"));
        $this->REGION_NAME->SetDBValue($this->f("REGION_NAME"));
        $this->P_REGION_ID->SetDBValue(trim($this->f("P_REGION_ID")));
        $this->ZIP_CODE->SetDBValue(trim($this->f("ZIP_CODE")));
        $this->ACTIVE_DATE->SetDBValue(trim($this->f("ACTIVE_DATE")));
        $this->START_INVOICE_DATE->SetDBValue(trim($this->f("START_INVOICE_DATE")));
        $this->END_INVOICE_DATE->SetDBValue(trim($this->f("END_INVOICE_DATE")));
        $this->CONTRACT_NUMBER->SetDBValue($this->f("CONTRACT_NUMBER"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
    }
//End SetValues Method

//Insert Method @2-AEE5B04F
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["SERVICE_NO"] = new clsSQLParameter("ctrlSERVICE_NO", ccsFloat, "", "", $this->SERVICE_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUBSCRIBER_ID"] = new clsSQLParameter("ctrlSUBSCRIBER_ID", ccsFloat, "", "", $this->SUBSCRIBER_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUBSCRIPTION_NAME"] = new clsSQLParameter("ctrlSUBSCRIPTION_NAME", ccsText, "", "", $this->SUBSCRIPTION_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["QTY_SUB_FROM"] = new clsSQLParameter("ctrlQTY_SUB_FROM", ccsFloat, "", "", $this->QTY_SUB_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_TARIFF_SCENARIO_ID"] = new clsSQLParameter("ctrlP_TARIFF_SCENARIO_ID", ccsFloat, "", "", $this->P_TARIFF_SCENARIO_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BILLING_UNIT"] = new clsSQLParameter("ctrlBILLING_UNIT", ccsFloat, "", "", $this->BILLING_UNIT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILL_CYCLE_ID"] = new clsSQLParameter("ctrlP_BILL_CYCLE_ID", ccsFloat, "", "", $this->P_BILL_CYCLE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_INVOICED"] = new clsSQLParameter("ctrlIS_INVOICED", ccsText, "", "", $this->IS_INVOICED->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_VAT_EXCEPTION"] = new clsSQLParameter("ctrlIS_VAT_EXCEPTION", ccsText, "", "", $this->IS_VAT_EXCEPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BUILDING_TYPE_ID"] = new clsSQLParameter("ctrlBUILDING_TYPE_ID", ccsFloat, "", "", $this->BUILDING_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BUSINESS_AREA_ID"] = new clsSQLParameter("ctrlP_BUSINESS_AREA_ID", ccsFloat, "", "", $this->P_BUSINESS_AREA_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["TERMINATION_DATE"] = new clsSQLParameter("ctrlTERMINATION_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->TERMINATION_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["EM_DEGREE"] = new clsSQLParameter("ctrlEM_DEGREE", ccsFloat, "", "", $this->EM_DEGREE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["EM_MINUTE"] = new clsSQLParameter("ctrlEM_MINUTE", ccsFloat, "", "", $this->EM_MINUTE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["EM_SECOND"] = new clsSQLParameter("ctrlEM_SECOND", ccsFloat, "", "", $this->EM_SECOND->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SL_DEGREE"] = new clsSQLParameter("ctrlSL_DEGREE", ccsFloat, "", "", $this->SL_DEGREE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SL_MINUTE"] = new clsSQLParameter("ctrlSL_MINUTE", ccsFloat, "", "", $this->SL_MINUTE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SL_SECOND"] = new clsSQLParameter("ctrlSL_SECOND", ccsFloat, "", "", $this->SL_SECOND->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SALES_PERSON_CODE"] = new clsSQLParameter("ctrlSALES_PERSON_CODE", ccsText, "", "", $this->SALES_PERSON_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SALES_PERSON_ID"] = new clsSQLParameter("ctrlP_SALES_PERSON_ID", ccsFloat, "", "", $this->P_SALES_PERSON_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SUBSCRIPTION_STATUS_ID"] = new clsSQLParameter("ctrlP_SUBSCRIPTION_STATUS_ID", ccsFloat, "", "", $this->P_SUBSCRIPTION_STATUS_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SUBSCRIBER_SEGMENT_ID"] = new clsSQLParameter("ctrlP_SUBSCRIBER_SEGMENT_ID", ccsFloat, "", "", $this->P_SUBSCRIBER_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_ACCOUNT_ID"] = new clsSQLParameter("ctrlCUSTOMER_ACCOUNT_ID", ccsFloat, "", "", $this->CUSTOMER_ACCOUNT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILLING_PERIOD_UNIT_ID"] = new clsSQLParameter("ctrlP_BILLING_PERIOD_UNIT_ID", ccsFloat, "", "", $this->P_BILLING_PERIOD_UNIT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["QTY_SUB_TO"] = new clsSQLParameter("ctrlQTY_SUB_TO", ccsFloat, "", "", $this->QTY_SUB_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SALES_COMPANY"] = new clsSQLParameter("ctrlSALES_COMPANY", ccsText, "", "", $this->SALES_COMPANY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_PAYMENT_KEY"] = new clsSQLParameter("ctrlIS_PAYMENT_KEY", ccsText, "", "", $this->IS_PAYMENT_KEY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SUB_BUSINESS_AREA_ID"] = new clsSQLParameter("ctrlP_SUB_BUSINESS_AREA_ID", ccsFloat, "", "", $this->P_SUB_BUSINESS_AREA_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RE_ACTIVATION_DATE"] = new clsSQLParameter("ctrlRE_ACTIVATION_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->RE_ACTIVATION_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_DEBTOR_SEGMENT_ID"] = new clsSQLParameter("ctrlP_DEBTOR_SEGMENT_ID", ccsFloat, "", "", $this->P_DEBTOR_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BUSINESS_SEGMENT_ID"] = new clsSQLParameter("ctrlP_BUSINESS_SEGMENT_ID", ccsFloat, "", "", $this->P_BUSINESS_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUBSCRIPTION_TYPE_ID"] = new clsSQLParameter("ctrlSUBSCRIPTION_TYPE_ID", ccsText, "", "", $this->SUBSCRIPTION_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CUSTOMER_SEGMENT_ID"] = new clsSQLParameter("ctrlP_CUSTOMER_SEGMENT_ID", ccsFloat, "", "", $this->P_CUSTOMER_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BUILDING_STATUS_ID"] = new clsSQLParameter("ctrlBUILDING_STATUS_ID", ccsFloat, "", "", $this->BUILDING_STATUS_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_1"] = new clsSQLParameter("ctrlADDRESS_1", ccsText, "", "", $this->ADDRESS_1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_2"] = new clsSQLParameter("ctrlADDRESS_2", ccsText, "", "", $this->ADDRESS_2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_3"] = new clsSQLParameter("ctrlADDRESS_3", ccsText, "", "", $this->ADDRESS_3->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_REGION_ID"] = new clsSQLParameter("ctrlP_REGION_ID", ccsFloat, "", "", $this->P_REGION_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ZIP_CODE"] = new clsSQLParameter("ctrlZIP_CODE", ccsFloat, "", "", $this->ZIP_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ACTIVE_DATE"] = new clsSQLParameter("ctrlACTIVE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->ACTIVE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["START_INVOICE_DATE"] = new clsSQLParameter("ctrlSTART_INVOICE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->START_INVOICE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["END_INVOICE_DATE"] = new clsSQLParameter("ctrlEND_INVOICE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->END_INVOICE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CONTRACT_NUMBER"] = new clsSQLParameter("ctrlCONTRACT_NUMBER", ccsText, "", "", $this->CONTRACT_NUMBER->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["ACCOUNT_NO"] = new clsSQLParameter("ctrlACCOUNT_NO", ccsText, "", "", $this->ACCOUNT_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BILL_CYCLE_CODE"] = new clsSQLParameter("ctrlBILL_CYCLE_CODE", ccsText, "", "", $this->BILL_CYCLE_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LAST_STATUS_DATE"] = new clsSQLParameter("ctrlLAST_STATUS_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->LAST_STATUS_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["SERVICE_NO"]->GetValue()) and !strlen($this->cp["SERVICE_NO"]->GetText()) and !is_bool($this->cp["SERVICE_NO"]->GetValue())) 
            $this->cp["SERVICE_NO"]->SetValue($this->SERVICE_NO->GetValue(true));
        if (!is_null($this->cp["SUBSCRIBER_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIBER_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_ID"]->GetValue())) 
            $this->cp["SUBSCRIBER_ID"]->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        if (!is_null($this->cp["SUBSCRIPTION_NAME"]->GetValue()) and !strlen($this->cp["SUBSCRIPTION_NAME"]->GetText()) and !is_bool($this->cp["SUBSCRIPTION_NAME"]->GetValue())) 
            $this->cp["SUBSCRIPTION_NAME"]->SetValue($this->SUBSCRIPTION_NAME->GetValue(true));
        if (!is_null($this->cp["QTY_SUB_FROM"]->GetValue()) and !strlen($this->cp["QTY_SUB_FROM"]->GetText()) and !is_bool($this->cp["QTY_SUB_FROM"]->GetValue())) 
            $this->cp["QTY_SUB_FROM"]->SetValue($this->QTY_SUB_FROM->GetValue(true));
        if (!is_null($this->cp["P_TARIFF_SCENARIO_ID"]->GetValue()) and !strlen($this->cp["P_TARIFF_SCENARIO_ID"]->GetText()) and !is_bool($this->cp["P_TARIFF_SCENARIO_ID"]->GetValue())) 
            $this->cp["P_TARIFF_SCENARIO_ID"]->SetValue($this->P_TARIFF_SCENARIO_ID->GetValue(true));
        if (!is_null($this->cp["BILLING_UNIT"]->GetValue()) and !strlen($this->cp["BILLING_UNIT"]->GetText()) and !is_bool($this->cp["BILLING_UNIT"]->GetValue())) 
            $this->cp["BILLING_UNIT"]->SetValue($this->BILLING_UNIT->GetValue(true));
        if (!is_null($this->cp["P_BILL_CYCLE_ID"]->GetValue()) and !strlen($this->cp["P_BILL_CYCLE_ID"]->GetText()) and !is_bool($this->cp["P_BILL_CYCLE_ID"]->GetValue())) 
            $this->cp["P_BILL_CYCLE_ID"]->SetValue($this->P_BILL_CYCLE_ID->GetValue(true));
        if (!is_null($this->cp["IS_INVOICED"]->GetValue()) and !strlen($this->cp["IS_INVOICED"]->GetText()) and !is_bool($this->cp["IS_INVOICED"]->GetValue())) 
            $this->cp["IS_INVOICED"]->SetValue($this->IS_INVOICED->GetValue(true));
        if (!is_null($this->cp["IS_VAT_EXCEPTION"]->GetValue()) and !strlen($this->cp["IS_VAT_EXCEPTION"]->GetText()) and !is_bool($this->cp["IS_VAT_EXCEPTION"]->GetValue())) 
            $this->cp["IS_VAT_EXCEPTION"]->SetValue($this->IS_VAT_EXCEPTION->GetValue(true));
        if (!is_null($this->cp["BUILDING_TYPE_ID"]->GetValue()) and !strlen($this->cp["BUILDING_TYPE_ID"]->GetText()) and !is_bool($this->cp["BUILDING_TYPE_ID"]->GetValue())) 
            $this->cp["BUILDING_TYPE_ID"]->SetValue($this->BUILDING_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["P_BUSINESS_AREA_ID"]->GetValue()) and !strlen($this->cp["P_BUSINESS_AREA_ID"]->GetText()) and !is_bool($this->cp["P_BUSINESS_AREA_ID"]->GetValue())) 
            $this->cp["P_BUSINESS_AREA_ID"]->SetValue($this->P_BUSINESS_AREA_ID->GetValue(true));
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["TERMINATION_DATE"]->GetValue()) and !strlen($this->cp["TERMINATION_DATE"]->GetText()) and !is_bool($this->cp["TERMINATION_DATE"]->GetValue())) 
            $this->cp["TERMINATION_DATE"]->SetValue($this->TERMINATION_DATE->GetValue(true));
        if (!is_null($this->cp["EM_DEGREE"]->GetValue()) and !strlen($this->cp["EM_DEGREE"]->GetText()) and !is_bool($this->cp["EM_DEGREE"]->GetValue())) 
            $this->cp["EM_DEGREE"]->SetValue($this->EM_DEGREE->GetValue(true));
        if (!is_null($this->cp["EM_MINUTE"]->GetValue()) and !strlen($this->cp["EM_MINUTE"]->GetText()) and !is_bool($this->cp["EM_MINUTE"]->GetValue())) 
            $this->cp["EM_MINUTE"]->SetValue($this->EM_MINUTE->GetValue(true));
        if (!is_null($this->cp["EM_SECOND"]->GetValue()) and !strlen($this->cp["EM_SECOND"]->GetText()) and !is_bool($this->cp["EM_SECOND"]->GetValue())) 
            $this->cp["EM_SECOND"]->SetValue($this->EM_SECOND->GetValue(true));
        if (!is_null($this->cp["SL_DEGREE"]->GetValue()) and !strlen($this->cp["SL_DEGREE"]->GetText()) and !is_bool($this->cp["SL_DEGREE"]->GetValue())) 
            $this->cp["SL_DEGREE"]->SetValue($this->SL_DEGREE->GetValue(true));
        if (!is_null($this->cp["SL_MINUTE"]->GetValue()) and !strlen($this->cp["SL_MINUTE"]->GetText()) and !is_bool($this->cp["SL_MINUTE"]->GetValue())) 
            $this->cp["SL_MINUTE"]->SetValue($this->SL_MINUTE->GetValue(true));
        if (!is_null($this->cp["SL_SECOND"]->GetValue()) and !strlen($this->cp["SL_SECOND"]->GetText()) and !is_bool($this->cp["SL_SECOND"]->GetValue())) 
            $this->cp["SL_SECOND"]->SetValue($this->SL_SECOND->GetValue(true));
        if (!is_null($this->cp["SALES_PERSON_CODE"]->GetValue()) and !strlen($this->cp["SALES_PERSON_CODE"]->GetText()) and !is_bool($this->cp["SALES_PERSON_CODE"]->GetValue())) 
            $this->cp["SALES_PERSON_CODE"]->SetValue($this->SALES_PERSON_CODE->GetValue(true));
        if (!is_null($this->cp["P_SALES_PERSON_ID"]->GetValue()) and !strlen($this->cp["P_SALES_PERSON_ID"]->GetText()) and !is_bool($this->cp["P_SALES_PERSON_ID"]->GetValue())) 
            $this->cp["P_SALES_PERSON_ID"]->SetValue($this->P_SALES_PERSON_ID->GetValue(true));
        if (!is_null($this->cp["P_SUBSCRIPTION_STATUS_ID"]->GetValue()) and !strlen($this->cp["P_SUBSCRIPTION_STATUS_ID"]->GetText()) and !is_bool($this->cp["P_SUBSCRIPTION_STATUS_ID"]->GetValue())) 
            $this->cp["P_SUBSCRIPTION_STATUS_ID"]->SetValue($this->P_SUBSCRIPTION_STATUS_ID->GetValue(true));
        if (!is_null($this->cp["P_SUBSCRIBER_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_SUBSCRIBER_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_SUBSCRIBER_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_SUBSCRIBER_SEGMENT_ID"]->SetValue($this->P_SUBSCRIBER_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ACCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ACCOUNT_ID"]->SetValue($this->CUSTOMER_ACCOUNT_ID->GetValue(true));
        if (!is_null($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue()) and !strlen($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue())) 
            $this->cp["P_BILLING_PERIOD_UNIT_ID"]->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        if (!is_null($this->cp["QTY_SUB_TO"]->GetValue()) and !strlen($this->cp["QTY_SUB_TO"]->GetText()) and !is_bool($this->cp["QTY_SUB_TO"]->GetValue())) 
            $this->cp["QTY_SUB_TO"]->SetValue($this->QTY_SUB_TO->GetValue(true));
        if (!is_null($this->cp["SALES_COMPANY"]->GetValue()) and !strlen($this->cp["SALES_COMPANY"]->GetText()) and !is_bool($this->cp["SALES_COMPANY"]->GetValue())) 
            $this->cp["SALES_COMPANY"]->SetValue($this->SALES_COMPANY->GetValue(true));
        if (!is_null($this->cp["IS_PAYMENT_KEY"]->GetValue()) and !strlen($this->cp["IS_PAYMENT_KEY"]->GetText()) and !is_bool($this->cp["IS_PAYMENT_KEY"]->GetValue())) 
            $this->cp["IS_PAYMENT_KEY"]->SetValue($this->IS_PAYMENT_KEY->GetValue(true));
        if (!is_null($this->cp["P_SUB_BUSINESS_AREA_ID"]->GetValue()) and !strlen($this->cp["P_SUB_BUSINESS_AREA_ID"]->GetText()) and !is_bool($this->cp["P_SUB_BUSINESS_AREA_ID"]->GetValue())) 
            $this->cp["P_SUB_BUSINESS_AREA_ID"]->SetValue($this->P_SUB_BUSINESS_AREA_ID->GetValue(true));
        if (!is_null($this->cp["RE_ACTIVATION_DATE"]->GetValue()) and !strlen($this->cp["RE_ACTIVATION_DATE"]->GetText()) and !is_bool($this->cp["RE_ACTIVATION_DATE"]->GetValue())) 
            $this->cp["RE_ACTIVATION_DATE"]->SetValue($this->RE_ACTIVATION_DATE->GetValue(true));
        if (!is_null($this->cp["P_DEBTOR_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_DEBTOR_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_DEBTOR_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_DEBTOR_SEGMENT_ID"]->SetValue($this->P_DEBTOR_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["P_BUSINESS_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_BUSINESS_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_BUSINESS_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_BUSINESS_SEGMENT_ID"]->SetValue($this->P_BUSINESS_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["SUBSCRIPTION_TYPE_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIPTION_TYPE_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIPTION_TYPE_ID"]->GetValue())) 
            $this->cp["SUBSCRIPTION_TYPE_ID"]->SetValue($this->SUBSCRIPTION_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_CUSTOMER_SEGMENT_ID"]->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["BUILDING_STATUS_ID"]->GetValue()) and !strlen($this->cp["BUILDING_STATUS_ID"]->GetText()) and !is_bool($this->cp["BUILDING_STATUS_ID"]->GetValue())) 
            $this->cp["BUILDING_STATUS_ID"]->SetValue($this->BUILDING_STATUS_ID->GetValue(true));
        if (!is_null($this->cp["ADDRESS_1"]->GetValue()) and !strlen($this->cp["ADDRESS_1"]->GetText()) and !is_bool($this->cp["ADDRESS_1"]->GetValue())) 
            $this->cp["ADDRESS_1"]->SetValue($this->ADDRESS_1->GetValue(true));
        if (!is_null($this->cp["ADDRESS_2"]->GetValue()) and !strlen($this->cp["ADDRESS_2"]->GetText()) and !is_bool($this->cp["ADDRESS_2"]->GetValue())) 
            $this->cp["ADDRESS_2"]->SetValue($this->ADDRESS_2->GetValue(true));
        if (!is_null($this->cp["ADDRESS_3"]->GetValue()) and !strlen($this->cp["ADDRESS_3"]->GetText()) and !is_bool($this->cp["ADDRESS_3"]->GetValue())) 
            $this->cp["ADDRESS_3"]->SetValue($this->ADDRESS_3->GetValue(true));
        if (!is_null($this->cp["P_REGION_ID"]->GetValue()) and !strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue())) 
            $this->cp["P_REGION_ID"]->SetValue($this->P_REGION_ID->GetValue(true));
        if (!is_null($this->cp["ZIP_CODE"]->GetValue()) and !strlen($this->cp["ZIP_CODE"]->GetText()) and !is_bool($this->cp["ZIP_CODE"]->GetValue())) 
            $this->cp["ZIP_CODE"]->SetValue($this->ZIP_CODE->GetValue(true));
        if (!is_null($this->cp["ACTIVE_DATE"]->GetValue()) and !strlen($this->cp["ACTIVE_DATE"]->GetText()) and !is_bool($this->cp["ACTIVE_DATE"]->GetValue())) 
            $this->cp["ACTIVE_DATE"]->SetValue($this->ACTIVE_DATE->GetValue(true));
        if (!is_null($this->cp["START_INVOICE_DATE"]->GetValue()) and !strlen($this->cp["START_INVOICE_DATE"]->GetText()) and !is_bool($this->cp["START_INVOICE_DATE"]->GetValue())) 
            $this->cp["START_INVOICE_DATE"]->SetValue($this->START_INVOICE_DATE->GetValue(true));
        if (!is_null($this->cp["END_INVOICE_DATE"]->GetValue()) and !strlen($this->cp["END_INVOICE_DATE"]->GetText()) and !is_bool($this->cp["END_INVOICE_DATE"]->GetValue())) 
            $this->cp["END_INVOICE_DATE"]->SetValue($this->END_INVOICE_DATE->GetValue(true));
        if (!is_null($this->cp["CONTRACT_NUMBER"]->GetValue()) and !strlen($this->cp["CONTRACT_NUMBER"]->GetText()) and !is_bool($this->cp["CONTRACT_NUMBER"]->GetValue())) 
            $this->cp["CONTRACT_NUMBER"]->SetValue($this->CONTRACT_NUMBER->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["ACCOUNT_NO"]->GetValue()) and !strlen($this->cp["ACCOUNT_NO"]->GetText()) and !is_bool($this->cp["ACCOUNT_NO"]->GetValue())) 
            $this->cp["ACCOUNT_NO"]->SetValue($this->ACCOUNT_NO->GetValue(true));
        if (!is_null($this->cp["BILL_CYCLE_CODE"]->GetValue()) and !strlen($this->cp["BILL_CYCLE_CODE"]->GetText()) and !is_bool($this->cp["BILL_CYCLE_CODE"]->GetValue())) 
            $this->cp["BILL_CYCLE_CODE"]->SetValue($this->BILL_CYCLE_CODE->GetValue(true));
        if (!is_null($this->cp["LAST_STATUS_DATE"]->GetValue()) and !strlen($this->cp["LAST_STATUS_DATE"]->GetText()) and !is_bool($this->cp["LAST_STATUS_DATE"]->GetValue())) 
            $this->cp["LAST_STATUS_DATE"]->SetValue($this->LAST_STATUS_DATE->GetValue(true));
        $this->SQL = "INSERT INTO SUBSCRIBER(\n" .
        "SUBSCRIBER_ID, \n" .
        "SERVICE_NO, \n" .
        "SUBSCRIPTION_NAME, \n" .
        "CUSTOMER_ACCOUNT_ID, \n" .
        "P_SERVICE_TYPE_ID, \n" .
        "QTY_SUB_FROM,\n" .
        "QTY_SUB_TO, \n" .
        "P_TARIFF_SCENARIO_ID,\n" .
        "P_BILL_CYCLE_ID,\n" .
        "P_SUBSCRIPTION_STATUS_ID,\n" .
        "LAST_STATUS_DATE,\n" .
        "IS_INVOICED,\n" .
        "P_SUBSCRIBER_SEGMENT_ID,\n" .
        "IS_VAT_EXCEPTION,\n" .
        "P_BILLING_PERIOD_UNIT_ID,\n" .
        "BILLING_UNIT, \n" .
        "SUBSCRIPTION_TYPE_ID,\n" .
        "BUILDING_TYPE_ID,\n" .
        "BUILDING_STATUS_ID,\n" .
        "P_SALES_PERSON_ID,\n" .
        "ADDRESS_1,ADDRESS_2,ADDRESS_3,\n" .
        "P_REGION_ID,\n" .
        "ZIP_CODE,\n" .
        "ACTIVE_DATE,\n" .
        "TERMINATION_DATE,\n" .
        "START_INVOICE_DATE,\n" .
        "END_INVOICE_DATE,\n" .
        "CONTRACT_NUMBER,\n" .
        " EM_DEGREE, \n" .
        " EM_MINUTE, \n" .
        " EM_SECOND, \n" .
        " SL_DEGREE, \n" .
        " SL_MINUTE, \n" .
        " SL_SECOND,\n" .
        " CREATION_DATE,\n" .
        "UPDATE_DATE, \n" .
        "UPDATE_BY,\n" .
        "P_BUSINESS_AREA_ID, \n" .
        "P_SUB_BUSINESS_AREA_ID,\n" .
        "DESCRIPTION, \n" .
        "P_SERVICE_GROUP_ID,\n" .
        "RE_ACTIVATION_DATE,\n" .
        "IS_PAYMENT_KEY, \n" .
        "P_CUSTOMER_SEGMENT_ID,\n" .
        "P_BUSINESS_SEGMENT_ID,\n" .
        "P_DEBTOR_SEGMENT_ID\n" .
        ") VALUES(\n" .
        "GENERATE_ID('BILLDB','SUBSCRIBER','SUBSCRIBER_ID'),\n" .
        "" . $this->SQLValue($this->cp["SERVICE_NO"]->GetDBValue(), ccsFloat) . ", \n" .
        "UPPER('" . $this->SQLValue($this->cp["SUBSCRIPTION_NAME"]->GetDBValue(), ccsText) . "'),\n" .
        "" . $this->SQLValue($this->cp["CUSTOMER_ACCOUNT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["QTY_SUB_FROM"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["QTY_SUB_TO"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["P_TARIFF_SCENARIO_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["P_BILL_CYCLE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["P_SUBSCRIPTION_STATUS_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "'" . $this->SQLValue($this->cp["LAST_STATUS_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "'" . $this->SQLValue($this->cp["IS_INVOICED"]->GetDBValue(), ccsText) . "',\n" .
        "" . $this->SQLValue($this->cp["P_SUBSCRIBER_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "'" . $this->SQLValue($this->cp["IS_VAT_EXCEPTION"]->GetDBValue(), ccsText) . "',\n" .
        "" . $this->SQLValue($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["BILLING_UNIT"]->GetDBValue(), ccsFloat) . ",\n" .
        "DECODE(" . $this->SQLValue($this->cp["SUBSCRIPTION_TYPE_ID"]->GetDBValue(), ccsText) . ",0,NULL," . $this->SQLValue($this->cp["SUBSCRIPTION_TYPE_ID"]->GetDBValue(), ccsText) . "),\n" .
        "" . $this->SQLValue($this->cp["BUILDING_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["BUILDING_STATUS_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["P_SALES_PERSON_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "'" . $this->SQLValue($this->cp["ADDRESS_1"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["ADDRESS_2"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["ADDRESS_3"]->GetDBValue(), ccsText) . "',\n" .
        "" . $this->SQLValue($this->cp["P_REGION_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["ZIP_CODE"]->GetDBValue(), ccsFloat) . ",\n" .
        "'" . $this->SQLValue($this->cp["ACTIVE_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "'" . $this->SQLValue($this->cp["TERMINATION_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "'" . $this->SQLValue($this->cp["START_INVOICE_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "'" . $this->SQLValue($this->cp["END_INVOICE_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "'" . $this->SQLValue($this->cp["CONTRACT_NUMBER"]->GetDBValue(), ccsText) . "',\n" .
        "" . $this->SQLValue($this->cp["EM_DEGREE"]->GetDBValue(), ccsFloat) . ", " . $this->SQLValue($this->cp["EM_MINUTE"]->GetDBValue(), ccsFloat) . ", " . $this->SQLValue($this->cp["EM_SECOND"]->GetDBValue(), ccsFloat) . ", " . $this->SQLValue($this->cp["SL_DEGREE"]->GetDBValue(), ccsFloat) . ", " . $this->SQLValue($this->cp["SL_MINUTE"]->GetDBValue(), ccsFloat) . ", " . $this->SQLValue($this->cp["SL_SECOND"]->GetDBValue(), ccsFloat) . ",\n" .
        "SYSDATE,\n" .
        "SYSDATE,\n" .
        "'" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "', \n" .
        "" . $this->SQLValue($this->cp["P_BUSINESS_AREA_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["P_SUB_BUSINESS_AREA_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "NULL,\n" .
        "'" . $this->SQLValue($this->cp["RE_ACTIVATION_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "'" . $this->SQLValue($this->cp["IS_PAYMENT_KEY"]->GetDBValue(), ccsText) . "', \n" .
        "" . $this->SQLValue($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["P_BUSINESS_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["P_DEBTOR_SEGMENT_ID"]->GetDBValue(), ccsFloat) . "\n" .
        " )";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @2-AB5355DC
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["SERVICE_NO"] = new clsSQLParameter("ctrlSERVICE_NO", ccsFloat, "", "", $this->SERVICE_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUBSCRIBER_ID"] = new clsSQLParameter("ctrlSUBSCRIBER_ID", ccsFloat, "", "", $this->SUBSCRIBER_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["SUBSCRIPTION_NAME"] = new clsSQLParameter("ctrlSUBSCRIPTION_NAME", ccsText, "", "", $this->SUBSCRIPTION_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["QTY_SUB_FROM"] = new clsSQLParameter("ctrlQTY_SUB_FROM", ccsFloat, "", "", $this->QTY_SUB_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_TARIFF_SCENARIO_ID"] = new clsSQLParameter("ctrlP_TARIFF_SCENARIO_ID", ccsFloat, "", "", $this->P_TARIFF_SCENARIO_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BILLING_UNIT"] = new clsSQLParameter("ctrlBILLING_UNIT", ccsFloat, "", "", $this->BILLING_UNIT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILL_CYCLE_ID"] = new clsSQLParameter("ctrlP_BILL_CYCLE_ID", ccsFloat, "", "", $this->P_BILL_CYCLE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LAST_STATUS_DATE"] = new clsSQLParameter("ctrlLAST_STATUS_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->LAST_STATUS_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_INVOICED"] = new clsSQLParameter("ctrlIS_INVOICED", ccsText, "", "", $this->IS_INVOICED->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_VAT_EXCEPTION"] = new clsSQLParameter("ctrlIS_VAT_EXCEPTION", ccsText, "", "", $this->IS_VAT_EXCEPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BUILDING_TYPE_ID"] = new clsSQLParameter("ctrlBUILDING_TYPE_ID", ccsFloat, "", "", $this->BUILDING_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BUSINESS_AREA_ID"] = new clsSQLParameter("ctrlP_BUSINESS_AREA_ID", ccsFloat, "", "", $this->P_BUSINESS_AREA_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["TERMINATION_DATE"] = new clsSQLParameter("ctrlTERMINATION_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->TERMINATION_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["EM_DEGREE"] = new clsSQLParameter("ctrlEM_DEGREE", ccsFloat, "", "", $this->EM_DEGREE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["EM_MINUTE"] = new clsSQLParameter("ctrlEM_MINUTE", ccsFloat, "", "", $this->EM_MINUTE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["EM_SECOND"] = new clsSQLParameter("ctrlEM_SECOND", ccsFloat, "", "", $this->EM_SECOND->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SL_DEGREE"] = new clsSQLParameter("ctrlSL_DEGREE", ccsFloat, "", "", $this->SL_DEGREE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SL_MINUTE"] = new clsSQLParameter("ctrlSL_MINUTE", ccsFloat, "", "", $this->SL_MINUTE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SL_SECOND"] = new clsSQLParameter("ctrlSL_SECOND", ccsFloat, "", "", $this->SL_SECOND->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SALES_PERSON_ID"] = new clsSQLParameter("ctrlP_SALES_PERSON_ID", ccsFloat, "", "", $this->P_SALES_PERSON_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SUBSCRIPTION_STATUS_ID"] = new clsSQLParameter("ctrlP_SUBSCRIPTION_STATUS_ID", ccsFloat, "", "", $this->P_SUBSCRIPTION_STATUS_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SUBSCRIBER_SEGMENT_ID"] = new clsSQLParameter("ctrlP_SUBSCRIBER_SEGMENT_ID", ccsFloat, "", "", $this->P_SUBSCRIBER_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_ACCOUNT_ID"] = new clsSQLParameter("ctrlCUSTOMER_ACCOUNT_ID", ccsFloat, "", "", $this->CUSTOMER_ACCOUNT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILLING_PERIOD_UNIT_ID"] = new clsSQLParameter("ctrlP_BILLING_PERIOD_UNIT_ID", ccsFloat, "", "", $this->P_BILLING_PERIOD_UNIT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["QTY_SUB_TO"] = new clsSQLParameter("ctrlQTY_SUB_TO", ccsFloat, "", "", $this->QTY_SUB_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_PAYMENT_KEY"] = new clsSQLParameter("ctrlIS_PAYMENT_KEY", ccsText, "", "", $this->IS_PAYMENT_KEY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SUB_BUSINESS_AREA_ID"] = new clsSQLParameter("ctrlP_SUB_BUSINESS_AREA_ID", ccsFloat, "", "", $this->P_SUB_BUSINESS_AREA_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RE_ACTIVATION_DATE"] = new clsSQLParameter("ctrlRE_ACTIVATION_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->RE_ACTIVATION_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_DEBTOR_SEGMENT_ID"] = new clsSQLParameter("ctrlP_DEBTOR_SEGMENT_ID", ccsFloat, "", "", $this->P_DEBTOR_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BUSINESS_SEGMENT_ID"] = new clsSQLParameter("ctrlP_BUSINESS_SEGMENT_ID", ccsFloat, "", "", $this->P_BUSINESS_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUBSCRIPTION_TYPE_ID"] = new clsSQLParameter("ctrlSUBSCRIPTION_TYPE_ID", ccsFloat, "", "", $this->SUBSCRIPTION_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CUSTOMER_SEGMENT_ID"] = new clsSQLParameter("ctrlP_CUSTOMER_SEGMENT_ID", ccsFloat, "", "", $this->P_CUSTOMER_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BUILDING_STATUS_ID"] = new clsSQLParameter("ctrlBUILDING_STATUS_ID", ccsFloat, "", "", $this->BUILDING_STATUS_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_1"] = new clsSQLParameter("ctrlADDRESS_1", ccsText, "", "", $this->ADDRESS_1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_2"] = new clsSQLParameter("ctrlADDRESS_2", ccsText, "", "", $this->ADDRESS_2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_3"] = new clsSQLParameter("ctrlADDRESS_3", ccsText, "", "", $this->ADDRESS_3->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_REGION_ID"] = new clsSQLParameter("ctrlP_REGION_ID", ccsFloat, "", "", $this->P_REGION_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ZIP_CODE"] = new clsSQLParameter("ctrlZIP_CODE", ccsFloat, "", "", $this->ZIP_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ACTIVE_DATE"] = new clsSQLParameter("ctrlACTIVE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->ACTIVE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["START_INVOICE_DATE"] = new clsSQLParameter("ctrlSTART_INVOICE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->START_INVOICE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["END_INVOICE_DATE"] = new clsSQLParameter("ctrlEND_INVOICE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->END_INVOICE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CONTRACT_NUMBER"] = new clsSQLParameter("ctrlCONTRACT_NUMBER", ccsText, "", "", $this->CONTRACT_NUMBER->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["SERVICE_NO"]->GetValue()) and !strlen($this->cp["SERVICE_NO"]->GetText()) and !is_bool($this->cp["SERVICE_NO"]->GetValue())) 
            $this->cp["SERVICE_NO"]->SetValue($this->SERVICE_NO->GetValue(true));
        if (!is_null($this->cp["SUBSCRIBER_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIBER_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_ID"]->GetValue())) 
            $this->cp["SUBSCRIBER_ID"]->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        if (!strlen($this->cp["SUBSCRIBER_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_ID"]->GetValue(true))) 
            $this->cp["SUBSCRIBER_ID"]->SetText(0);
        if (!is_null($this->cp["SUBSCRIPTION_NAME"]->GetValue()) and !strlen($this->cp["SUBSCRIPTION_NAME"]->GetText()) and !is_bool($this->cp["SUBSCRIPTION_NAME"]->GetValue())) 
            $this->cp["SUBSCRIPTION_NAME"]->SetValue($this->SUBSCRIPTION_NAME->GetValue(true));
        if (!is_null($this->cp["QTY_SUB_FROM"]->GetValue()) and !strlen($this->cp["QTY_SUB_FROM"]->GetText()) and !is_bool($this->cp["QTY_SUB_FROM"]->GetValue())) 
            $this->cp["QTY_SUB_FROM"]->SetValue($this->QTY_SUB_FROM->GetValue(true));
        if (!is_null($this->cp["P_TARIFF_SCENARIO_ID"]->GetValue()) and !strlen($this->cp["P_TARIFF_SCENARIO_ID"]->GetText()) and !is_bool($this->cp["P_TARIFF_SCENARIO_ID"]->GetValue())) 
            $this->cp["P_TARIFF_SCENARIO_ID"]->SetValue($this->P_TARIFF_SCENARIO_ID->GetValue(true));
        if (!is_null($this->cp["BILLING_UNIT"]->GetValue()) and !strlen($this->cp["BILLING_UNIT"]->GetText()) and !is_bool($this->cp["BILLING_UNIT"]->GetValue())) 
            $this->cp["BILLING_UNIT"]->SetValue($this->BILLING_UNIT->GetValue(true));
        if (!is_null($this->cp["P_BILL_CYCLE_ID"]->GetValue()) and !strlen($this->cp["P_BILL_CYCLE_ID"]->GetText()) and !is_bool($this->cp["P_BILL_CYCLE_ID"]->GetValue())) 
            $this->cp["P_BILL_CYCLE_ID"]->SetValue($this->P_BILL_CYCLE_ID->GetValue(true));
        if (!is_null($this->cp["LAST_STATUS_DATE"]->GetValue()) and !strlen($this->cp["LAST_STATUS_DATE"]->GetText()) and !is_bool($this->cp["LAST_STATUS_DATE"]->GetValue())) 
            $this->cp["LAST_STATUS_DATE"]->SetValue($this->LAST_STATUS_DATE->GetValue(true));
        if (!is_null($this->cp["IS_INVOICED"]->GetValue()) and !strlen($this->cp["IS_INVOICED"]->GetText()) and !is_bool($this->cp["IS_INVOICED"]->GetValue())) 
            $this->cp["IS_INVOICED"]->SetValue($this->IS_INVOICED->GetValue(true));
        if (!is_null($this->cp["IS_VAT_EXCEPTION"]->GetValue()) and !strlen($this->cp["IS_VAT_EXCEPTION"]->GetText()) and !is_bool($this->cp["IS_VAT_EXCEPTION"]->GetValue())) 
            $this->cp["IS_VAT_EXCEPTION"]->SetValue($this->IS_VAT_EXCEPTION->GetValue(true));
        if (!is_null($this->cp["BUILDING_TYPE_ID"]->GetValue()) and !strlen($this->cp["BUILDING_TYPE_ID"]->GetText()) and !is_bool($this->cp["BUILDING_TYPE_ID"]->GetValue())) 
            $this->cp["BUILDING_TYPE_ID"]->SetValue($this->BUILDING_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["P_BUSINESS_AREA_ID"]->GetValue()) and !strlen($this->cp["P_BUSINESS_AREA_ID"]->GetText()) and !is_bool($this->cp["P_BUSINESS_AREA_ID"]->GetValue())) 
            $this->cp["P_BUSINESS_AREA_ID"]->SetValue($this->P_BUSINESS_AREA_ID->GetValue(true));
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["TERMINATION_DATE"]->GetValue()) and !strlen($this->cp["TERMINATION_DATE"]->GetText()) and !is_bool($this->cp["TERMINATION_DATE"]->GetValue())) 
            $this->cp["TERMINATION_DATE"]->SetValue($this->TERMINATION_DATE->GetValue(true));
        if (!is_null($this->cp["EM_DEGREE"]->GetValue()) and !strlen($this->cp["EM_DEGREE"]->GetText()) and !is_bool($this->cp["EM_DEGREE"]->GetValue())) 
            $this->cp["EM_DEGREE"]->SetValue($this->EM_DEGREE->GetValue(true));
        if (!is_null($this->cp["EM_MINUTE"]->GetValue()) and !strlen($this->cp["EM_MINUTE"]->GetText()) and !is_bool($this->cp["EM_MINUTE"]->GetValue())) 
            $this->cp["EM_MINUTE"]->SetValue($this->EM_MINUTE->GetValue(true));
        if (!is_null($this->cp["EM_SECOND"]->GetValue()) and !strlen($this->cp["EM_SECOND"]->GetText()) and !is_bool($this->cp["EM_SECOND"]->GetValue())) 
            $this->cp["EM_SECOND"]->SetValue($this->EM_SECOND->GetValue(true));
        if (!is_null($this->cp["SL_DEGREE"]->GetValue()) and !strlen($this->cp["SL_DEGREE"]->GetText()) and !is_bool($this->cp["SL_DEGREE"]->GetValue())) 
            $this->cp["SL_DEGREE"]->SetValue($this->SL_DEGREE->GetValue(true));
        if (!is_null($this->cp["SL_MINUTE"]->GetValue()) and !strlen($this->cp["SL_MINUTE"]->GetText()) and !is_bool($this->cp["SL_MINUTE"]->GetValue())) 
            $this->cp["SL_MINUTE"]->SetValue($this->SL_MINUTE->GetValue(true));
        if (!is_null($this->cp["SL_SECOND"]->GetValue()) and !strlen($this->cp["SL_SECOND"]->GetText()) and !is_bool($this->cp["SL_SECOND"]->GetValue())) 
            $this->cp["SL_SECOND"]->SetValue($this->SL_SECOND->GetValue(true));
        if (!is_null($this->cp["P_SALES_PERSON_ID"]->GetValue()) and !strlen($this->cp["P_SALES_PERSON_ID"]->GetText()) and !is_bool($this->cp["P_SALES_PERSON_ID"]->GetValue())) 
            $this->cp["P_SALES_PERSON_ID"]->SetValue($this->P_SALES_PERSON_ID->GetValue(true));
        if (!is_null($this->cp["P_SUBSCRIPTION_STATUS_ID"]->GetValue()) and !strlen($this->cp["P_SUBSCRIPTION_STATUS_ID"]->GetText()) and !is_bool($this->cp["P_SUBSCRIPTION_STATUS_ID"]->GetValue())) 
            $this->cp["P_SUBSCRIPTION_STATUS_ID"]->SetValue($this->P_SUBSCRIPTION_STATUS_ID->GetValue(true));
        if (!is_null($this->cp["P_SUBSCRIBER_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_SUBSCRIBER_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_SUBSCRIBER_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_SUBSCRIBER_SEGMENT_ID"]->SetValue($this->P_SUBSCRIBER_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ACCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ACCOUNT_ID"]->SetValue($this->CUSTOMER_ACCOUNT_ID->GetValue(true));
        if (!is_null($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue()) and !strlen($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue())) 
            $this->cp["P_BILLING_PERIOD_UNIT_ID"]->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        if (!is_null($this->cp["QTY_SUB_TO"]->GetValue()) and !strlen($this->cp["QTY_SUB_TO"]->GetText()) and !is_bool($this->cp["QTY_SUB_TO"]->GetValue())) 
            $this->cp["QTY_SUB_TO"]->SetValue($this->QTY_SUB_TO->GetValue(true));
        if (!is_null($this->cp["IS_PAYMENT_KEY"]->GetValue()) and !strlen($this->cp["IS_PAYMENT_KEY"]->GetText()) and !is_bool($this->cp["IS_PAYMENT_KEY"]->GetValue())) 
            $this->cp["IS_PAYMENT_KEY"]->SetValue($this->IS_PAYMENT_KEY->GetValue(true));
        if (!is_null($this->cp["P_SUB_BUSINESS_AREA_ID"]->GetValue()) and !strlen($this->cp["P_SUB_BUSINESS_AREA_ID"]->GetText()) and !is_bool($this->cp["P_SUB_BUSINESS_AREA_ID"]->GetValue())) 
            $this->cp["P_SUB_BUSINESS_AREA_ID"]->SetValue($this->P_SUB_BUSINESS_AREA_ID->GetValue(true));
        if (!is_null($this->cp["RE_ACTIVATION_DATE"]->GetValue()) and !strlen($this->cp["RE_ACTIVATION_DATE"]->GetText()) and !is_bool($this->cp["RE_ACTIVATION_DATE"]->GetValue())) 
            $this->cp["RE_ACTIVATION_DATE"]->SetValue($this->RE_ACTIVATION_DATE->GetValue(true));
        if (!is_null($this->cp["P_DEBTOR_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_DEBTOR_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_DEBTOR_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_DEBTOR_SEGMENT_ID"]->SetValue($this->P_DEBTOR_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["P_BUSINESS_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_BUSINESS_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_BUSINESS_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_BUSINESS_SEGMENT_ID"]->SetValue($this->P_BUSINESS_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["SUBSCRIPTION_TYPE_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIPTION_TYPE_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIPTION_TYPE_ID"]->GetValue())) 
            $this->cp["SUBSCRIPTION_TYPE_ID"]->SetValue($this->SUBSCRIPTION_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_CUSTOMER_SEGMENT_ID"]->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["BUILDING_STATUS_ID"]->GetValue()) and !strlen($this->cp["BUILDING_STATUS_ID"]->GetText()) and !is_bool($this->cp["BUILDING_STATUS_ID"]->GetValue())) 
            $this->cp["BUILDING_STATUS_ID"]->SetValue($this->BUILDING_STATUS_ID->GetValue(true));
        if (!is_null($this->cp["ADDRESS_1"]->GetValue()) and !strlen($this->cp["ADDRESS_1"]->GetText()) and !is_bool($this->cp["ADDRESS_1"]->GetValue())) 
            $this->cp["ADDRESS_1"]->SetValue($this->ADDRESS_1->GetValue(true));
        if (!is_null($this->cp["ADDRESS_2"]->GetValue()) and !strlen($this->cp["ADDRESS_2"]->GetText()) and !is_bool($this->cp["ADDRESS_2"]->GetValue())) 
            $this->cp["ADDRESS_2"]->SetValue($this->ADDRESS_2->GetValue(true));
        if (!is_null($this->cp["ADDRESS_3"]->GetValue()) and !strlen($this->cp["ADDRESS_3"]->GetText()) and !is_bool($this->cp["ADDRESS_3"]->GetValue())) 
            $this->cp["ADDRESS_3"]->SetValue($this->ADDRESS_3->GetValue(true));
        if (!is_null($this->cp["P_REGION_ID"]->GetValue()) and !strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue())) 
            $this->cp["P_REGION_ID"]->SetValue($this->P_REGION_ID->GetValue(true));
        if (!is_null($this->cp["ZIP_CODE"]->GetValue()) and !strlen($this->cp["ZIP_CODE"]->GetText()) and !is_bool($this->cp["ZIP_CODE"]->GetValue())) 
            $this->cp["ZIP_CODE"]->SetValue($this->ZIP_CODE->GetValue(true));
        if (!is_null($this->cp["ACTIVE_DATE"]->GetValue()) and !strlen($this->cp["ACTIVE_DATE"]->GetText()) and !is_bool($this->cp["ACTIVE_DATE"]->GetValue())) 
            $this->cp["ACTIVE_DATE"]->SetValue($this->ACTIVE_DATE->GetValue(true));
        if (!is_null($this->cp["START_INVOICE_DATE"]->GetValue()) and !strlen($this->cp["START_INVOICE_DATE"]->GetText()) and !is_bool($this->cp["START_INVOICE_DATE"]->GetValue())) 
            $this->cp["START_INVOICE_DATE"]->SetValue($this->START_INVOICE_DATE->GetValue(true));
        if (!is_null($this->cp["END_INVOICE_DATE"]->GetValue()) and !strlen($this->cp["END_INVOICE_DATE"]->GetText()) and !is_bool($this->cp["END_INVOICE_DATE"]->GetValue())) 
            $this->cp["END_INVOICE_DATE"]->SetValue($this->END_INVOICE_DATE->GetValue(true));
        if (!is_null($this->cp["CONTRACT_NUMBER"]->GetValue()) and !strlen($this->cp["CONTRACT_NUMBER"]->GetText()) and !is_bool($this->cp["CONTRACT_NUMBER"]->GetValue())) 
            $this->cp["CONTRACT_NUMBER"]->SetValue($this->CONTRACT_NUMBER->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        $this->SQL = "UPDATE SUBSCRIBER SET \n" .
        "SERVICE_NO=" . $this->SQLValue($this->cp["SERVICE_NO"]->GetDBValue(), ccsFloat) . ", \n" .
        "SUBSCRIPTION_NAME=UPPER('" . $this->SQLValue($this->cp["SUBSCRIPTION_NAME"]->GetDBValue(), ccsText) . "'), \n" .
        "QTY_SUB_FROM=" . $this->SQLValue($this->cp["QTY_SUB_FROM"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_TARIFF_SCENARIO_ID=" . $this->SQLValue($this->cp["P_TARIFF_SCENARIO_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "BILLING_UNIT=" . $this->SQLValue($this->cp["BILLING_UNIT"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_BILL_CYCLE_ID=" . $this->SQLValue($this->cp["P_BILL_CYCLE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "LAST_STATUS_DATE='" . $this->SQLValue($this->cp["LAST_STATUS_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "IS_INVOICED='" . $this->SQLValue($this->cp["IS_INVOICED"]->GetDBValue(), ccsText) . "', \n" .
        "IS_VAT_EXCEPTION='" . $this->SQLValue($this->cp["IS_VAT_EXCEPTION"]->GetDBValue(), ccsText) . "', \n" .
        "BUILDING_TYPE_ID=" . $this->SQLValue($this->cp["BUILDING_TYPE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_BUSINESS_AREA_ID=" . $this->SQLValue($this->cp["P_BUSINESS_AREA_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_SERVICE_TYPE_ID=" . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "TERMINATION_DATE='" . $this->SQLValue($this->cp["TERMINATION_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "EM_DEGREE=" . $this->SQLValue($this->cp["EM_DEGREE"]->GetDBValue(), ccsFloat) . ", \n" .
        "EM_MINUTE=" . $this->SQLValue($this->cp["EM_MINUTE"]->GetDBValue(), ccsFloat) . ", \n" .
        "EM_SECOND=" . $this->SQLValue($this->cp["EM_SECOND"]->GetDBValue(), ccsFloat) . ", \n" .
        "SL_DEGREE=" . $this->SQLValue($this->cp["SL_DEGREE"]->GetDBValue(), ccsFloat) . ", \n" .
        "SL_MINUTE=" . $this->SQLValue($this->cp["SL_MINUTE"]->GetDBValue(), ccsFloat) . ", \n" .
        "SL_SECOND=" . $this->SQLValue($this->cp["SL_SECOND"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_SALES_PERSON_ID=" . $this->SQLValue($this->cp["P_SALES_PERSON_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "UPDATE_DATE=SYSDATE, \n" .
        "P_SUBSCRIPTION_STATUS_ID=" . $this->SQLValue($this->cp["P_SUBSCRIPTION_STATUS_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_SUBSCRIBER_SEGMENT_ID=" . $this->SQLValue($this->cp["P_SUBSCRIBER_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "CUSTOMER_ACCOUNT_ID=" . $this->SQLValue($this->cp["CUSTOMER_ACCOUNT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_BILLING_PERIOD_UNIT_ID=" . $this->SQLValue($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "QTY_SUB_TO=" . $this->SQLValue($this->cp["QTY_SUB_TO"]->GetDBValue(), ccsFloat) . ", \n" .
        "IS_PAYMENT_KEY='" . $this->SQLValue($this->cp["IS_PAYMENT_KEY"]->GetDBValue(), ccsText) . "', \n" .
        "P_SUB_BUSINESS_AREA_ID=" . $this->SQLValue($this->cp["P_SUB_BUSINESS_AREA_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "RE_ACTIVATION_DATE='" . $this->SQLValue($this->cp["RE_ACTIVATION_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "P_DEBTOR_SEGMENT_ID=" . $this->SQLValue($this->cp["P_DEBTOR_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_BUSINESS_SEGMENT_ID=" . $this->SQLValue($this->cp["P_BUSINESS_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "SUBSCRIPTION_TYPE_ID=" . $this->SQLValue($this->cp["SUBSCRIPTION_TYPE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')), \n" .
        "P_CUSTOMER_SEGMENT_ID=" . $this->SQLValue($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "BUILDING_STATUS_ID=" . $this->SQLValue($this->cp["BUILDING_STATUS_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "ADDRESS_1='" . $this->SQLValue($this->cp["ADDRESS_1"]->GetDBValue(), ccsText) . "', ADDRESS_2='" . $this->SQLValue($this->cp["ADDRESS_2"]->GetDBValue(), ccsText) . "', ADDRESS_3='" . $this->SQLValue($this->cp["ADDRESS_3"]->GetDBValue(), ccsText) . "', \n" .
        "P_REGION_ID=" . $this->SQLValue($this->cp["P_REGION_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "ZIP_CODE=" . $this->SQLValue($this->cp["ZIP_CODE"]->GetDBValue(), ccsFloat) . ", \n" .
        "ACTIVE_DATE='" . $this->SQLValue($this->cp["ACTIVE_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "START_INVOICE_DATE='" . $this->SQLValue($this->cp["START_INVOICE_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "END_INVOICE_DATE='" . $this->SQLValue($this->cp["END_INVOICE_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "CONTRACT_NUMBER='" . $this->SQLValue($this->cp["CONTRACT_NUMBER"]->GetDBValue(), ccsText) . "', \n" .
        "UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "' \n" .
        "WHERE  SUBSCRIBER_ID = " . $this->SQLValue($this->cp["SUBSCRIBER_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @2-D5D9BDC4
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["SUBSCRIBER_ID"] = new clsSQLParameter("ctrlSUBSCRIBER_ID", ccsFloat, "", "", $this->SUBSCRIBER_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["SUBSCRIBER_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIBER_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_ID"]->GetValue())) 
            $this->cp["SUBSCRIBER_ID"]->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        if (!strlen($this->cp["SUBSCRIBER_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_ID"]->GetValue(true))) 
            $this->cp["SUBSCRIBER_ID"]->SetText(0);
        $this->SQL = "DELETE SUBSCRIBER WHERE SUBSCRIBER_ID=" . $this->SQLValue($this->cp["SUBSCRIBER_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End V_SUBSCRIBERDataSource Class @2-FCB6E20C

//Initialize Page @1-E5DF3103
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
$TemplateFileName = "subscriber_form.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-2187E2D3
include_once("./subscriber_form_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-48E21785
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$V_SUBSCRIBER = & new clsRecordV_SUBSCRIBER("", $MainPage);
$MainPage->V_SUBSCRIBER = & $V_SUBSCRIBER;
$V_SUBSCRIBER->Initialize();

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

//Execute Components @1-DAE7F15F
$V_SUBSCRIBER->Operation();
//End Execute Components

//Go to destination page @1-98D31F00
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($V_SUBSCRIBER);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-7A1684D2
$V_SUBSCRIBER->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-87DC7FE6
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($V_SUBSCRIBER);
unset($Tpl);
//End Unload Page


?>
