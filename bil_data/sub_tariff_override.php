<?php
//Include Common Files @1-FB84B1A4
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_data/");
define("FileName", "sub_tariff_override.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridRECURRINGTARIF { //RECURRINGTARIF class @2-41043CD5

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

//Class_Initialize Event @2-B4E2C8DD
    function clsGridRECURRINGTARIF($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "RECURRINGTARIF";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid RECURRINGTARIF";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsRECURRINGTARIFDataSource($this);
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

        $this->VALID_TO = & new clsControl(ccsLabel, "VALID_TO", "VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->BILL_COMPONENT_CODE = & new clsControl(ccsLabel, "BILL_COMPONENT_CODE", "BILL_COMPONENT_CODE", ccsText, "", CCGetRequestParam("BILL_COMPONENT_CODE", ccsGet, NULL), $this);
        $this->Editlink = & new clsControl(ccsLink, "Editlink", "Editlink", ccsText, "", CCGetRequestParam("Editlink", ccsGet, NULL), $this);
        $this->Editlink->HTML = true;
        $this->Editlink->Page = "sub_promo_form.php";
        $this->CHARGE_AMOUNT = & new clsControl(ccsLabel, "CHARGE_AMOUNT", "CHARGE_AMOUNT", ccsText, "", CCGetRequestParam("CHARGE_AMOUNT", ccsGet, NULL), $this);
        $this->VALID_FROM = & new clsControl(ccsLabel, "VALID_FROM", "VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", ccsGet, NULL), $this);
        $this->CURRENCY_CODE = & new clsControl(ccsLabel, "CURRENCY_CODE", "CURRENCY_CODE", ccsText, "", CCGetRequestParam("CURRENCY_CODE", ccsGet, NULL), $this);
        $this->OT_PROMOTION_CODE = & new clsControl(ccsLabel, "OT_PROMOTION_CODE", "OT_PROMOTION_CODE", ccsText, "", CCGetRequestParam("OT_PROMOTION_CODE", ccsGet, NULL), $this);
        $this->BILLING_UNIT = & new clsControl(ccsLabel, "BILLING_UNIT", "BILLING_UNIT", ccsText, "", CCGetRequestParam("BILLING_UNIT", ccsGet, NULL), $this);
        $this->BILL_PERIOD_UNIT_CODE = & new clsControl(ccsLabel, "BILL_PERIOD_UNIT_CODE", "BILL_PERIOD_UNIT_CODE", ccsText, "", CCGetRequestParam("BILL_PERIOD_UNIT_CODE", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->ServicePromo_Insert = & new clsControl(ccsLink, "ServicePromo_Insert", "ServicePromo_Insert", ccsText, "", CCGetRequestParam("ServicePromo_Insert", ccsGet, NULL), $this);
        $this->ServicePromo_Insert->HTML = true;
        $this->ServicePromo_Insert->Parameters = CCGetQueryString("QueryString", array("SUBSCRIBER_ID", "FLAG", "s_keyword", "SUBSCRIBERPage", "SUBSCRIBERPageSize", "SUBSCRIBEROrder", "SUBSCRIBERDir", "ccsForm"));
        $this->ServicePromo_Insert->Page = "subscriber_form.php";
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

//Show Method @2-1A198CF5
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);
        $this->DataSource->Parameters["urlSUBSCRIBER_ID"] = CCGetFromGet("SUBSCRIBER_ID", NULL);

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
            $this->ControlsVisible["VALID_TO"] = $this->VALID_TO->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["BILL_COMPONENT_CODE"] = $this->BILL_COMPONENT_CODE->Visible;
            $this->ControlsVisible["Editlink"] = $this->Editlink->Visible;
            $this->ControlsVisible["CHARGE_AMOUNT"] = $this->CHARGE_AMOUNT->Visible;
            $this->ControlsVisible["VALID_FROM"] = $this->VALID_FROM->Visible;
            $this->ControlsVisible["CURRENCY_CODE"] = $this->CURRENCY_CODE->Visible;
            $this->ControlsVisible["OT_PROMOTION_CODE"] = $this->OT_PROMOTION_CODE->Visible;
            $this->ControlsVisible["BILLING_UNIT"] = $this->BILLING_UNIT->Visible;
            $this->ControlsVisible["BILL_PERIOD_UNIT_CODE"] = $this->BILL_PERIOD_UNIT_CODE->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->BILL_COMPONENT_CODE->SetValue($this->DataSource->BILL_COMPONENT_CODE->GetValue());
                $this->Editlink->SetValue($this->DataSource->Editlink->GetValue());
                $this->Editlink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->Editlink->Parameters = CCAddParam($this->Editlink->Parameters, "SUBSCRIBER_ID", $this->DataSource->f("SUBSCRIBER_ID"));
                $this->CHARGE_AMOUNT->SetValue($this->DataSource->CHARGE_AMOUNT->GetValue());
                $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                $this->CURRENCY_CODE->SetValue($this->DataSource->CURRENCY_CODE->GetValue());
                $this->OT_PROMOTION_CODE->SetValue($this->DataSource->OT_PROMOTION_CODE->GetValue());
                $this->BILLING_UNIT->SetValue($this->DataSource->BILLING_UNIT->GetValue());
                $this->BILL_PERIOD_UNIT_CODE->SetValue($this->DataSource->BILL_PERIOD_UNIT_CODE->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->VALID_TO->Show();
                $this->DESCRIPTION->Show();
                $this->BILL_COMPONENT_CODE->Show();
                $this->Editlink->Show();
                $this->CHARGE_AMOUNT->Show();
                $this->VALID_FROM->Show();
                $this->CURRENCY_CODE->Show();
                $this->OT_PROMOTION_CODE->Show();
                $this->BILLING_UNIT->Show();
                $this->BILL_PERIOD_UNIT_CODE->Show();
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
        $this->ServicePromo_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-4EE47850
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_COMPONENT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Editlink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CHARGE_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CURRENCY_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OT_PROMOTION_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILLING_UNIT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_PERIOD_UNIT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End RECURRINGTARIF Class @2-FCB6E20C

class clsRECURRINGTARIFDataSource extends clsDBConn {  //RECURRINGTARIFDataSource Class @2-2C8A8564

//DataSource Variables @2-654FDA38
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $VALID_TO;
    var $DESCRIPTION;
    var $BILL_COMPONENT_CODE;
    var $Editlink;
    var $CHARGE_AMOUNT;
    var $VALID_FROM;
    var $CURRENCY_CODE;
    var $OT_PROMOTION_CODE;
    var $BILLING_UNIT;
    var $BILL_PERIOD_UNIT_CODE;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-189BC139
    function clsRECURRINGTARIFDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid RECURRINGTARIF";
        $this->Initialize();
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->BILL_COMPONENT_CODE = new clsField("BILL_COMPONENT_CODE", ccsText, "");
        
        $this->Editlink = new clsField("Editlink", ccsText, "");
        
        $this->CHARGE_AMOUNT = new clsField("CHARGE_AMOUNT", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->CURRENCY_CODE = new clsField("CURRENCY_CODE", ccsText, "");
        
        $this->OT_PROMOTION_CODE = new clsField("OT_PROMOTION_CODE", ccsText, "");
        
        $this->BILLING_UNIT = new clsField("BILLING_UNIT", ccsText, "");
        
        $this->BILL_PERIOD_UNIT_CODE = new clsField("BILL_PERIOD_UNIT_CODE", ccsText, "");
        

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

//Prepare Method @2-E74DF6F0
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urlSUBSCRIBER_ID", ccsFloat, "", "", $this->Parameters["urlSUBSCRIBER_ID"], 0, false);
    }
//End Prepare Method

//Open Method @2-E6CD2B71
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT* FROM V_SUBS_OVERRIDE_RECU_TARIFF    \n" .
        "WHERE \n" .
        "SUBSCRIBER_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "\n" .
        ") cnt";
        $this->SQL = "SELECT* FROM V_SUBS_OVERRIDE_RECU_TARIFF    \n" .
        "WHERE \n" .
        "SUBSCRIBER_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "\n" .
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

//SetValues Method @2-FD9B50DC
    function SetValues()
    {
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->BILL_COMPONENT_CODE->SetDBValue($this->f("BILL_COMPONENT_CODE"));
        $this->Editlink->SetDBValue($this->f("SUBSCRIBER_ID"));
        $this->CHARGE_AMOUNT->SetDBValue($this->f("CHARGE_AMOUNT"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->CURRENCY_CODE->SetDBValue($this->f("CURRENCY_CODE"));
        $this->OT_PROMOTION_CODE->SetDBValue($this->f("OT_PROMOTION_CODE"));
        $this->BILLING_UNIT->SetDBValue($this->f("BILLING_UNIT"));
        $this->BILL_PERIOD_UNIT_CODE->SetDBValue($this->f("BILL_PERIOD_UNIT_CODE"));
    }
//End SetValues Method

} //End RECURRINGTARIFDataSource Class @2-FCB6E20C



class clsRecordSubscribInfo { //SubscribInfo Class @53-421DAB8D

//Variables @53-D6FF3E86

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

//Class_Initialize Event @53-A313A270
    function clsRecordSubscribInfo($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record SubscribInfo/Error";
        $this->DataSource = new clsSubscribInfoDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "SubscribInfo";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->SERVICE_NO = & new clsControl(ccsLabel, "SERVICE_NO", "SERVICE_NO", ccsText, "", CCGetRequestParam("SERVICE_NO", $Method, NULL), $this);
            $this->TARIFF_SCENARIO_CODE = & new clsControl(ccsLabel, "TARIFF_SCENARIO_CODE", "TARIFF_SCENARIO_CODE", ccsText, "", CCGetRequestParam("TARIFF_SCENARIO_CODE", $Method, NULL), $this);
            $this->SUBSCRIPTION_NAME = & new clsControl(ccsLabel, "SUBSCRIPTION_NAME", "SUBSCRIPTION_NAME", ccsText, "", CCGetRequestParam("SUBSCRIPTION_NAME", $Method, NULL), $this);
            $this->SERVICE_TYPE_CODE = & new clsControl(ccsLabel, "SERVICE_TYPE_CODE", "SERVICE_TYPE_CODE", ccsText, "", CCGetRequestParam("SERVICE_TYPE_CODE", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @53-0E2BC8CD
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlSUBSCRIBER_ID"] = CCGetFromGet("SUBSCRIBER_ID", NULL);
    }
//End Initialize Method

//Validate Method @53-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @53-0DC4B9D4
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->SERVICE_NO->Errors->Count());
        $errors = ($errors || $this->TARIFF_SCENARIO_CODE->Errors->Count());
        $errors = ($errors || $this->SUBSCRIPTION_NAME->Errors->Count());
        $errors = ($errors || $this->SERVICE_TYPE_CODE->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @53-ED598703
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

//Operation Method @53-17DC9883
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

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @53-D0D6655E
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->P_INPUT_FILE_TYPE_ID->SetValue($this->P_INPUT_FILE_TYPE_ID->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->PROCEDURE_NAME->SetValue($this->PROCEDURE_NAME->GetValue(true));
        $this->DataSource->START_POSITION_NAME->SetValue($this->START_POSITION_NAME->GetValue(true));
        $this->DataSource->END_POSITION_NAME->SetValue($this->END_POSITION_NAME->GetValue(true));
        $this->DataSource->PARTIAL_FILE_NAME->SetValue($this->PARTIAL_FILE_NAME->GetValue(true));
        $this->DataSource->START_DATA_POSITION->SetValue($this->START_DATA_POSITION->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CREATED_BY->SetValue($this->CREATED_BY->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @53-81B85660
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->P_INPUT_FILE_TYPE_ID->SetValue($this->P_INPUT_FILE_TYPE_ID->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->PROCEDURE_NAME->SetValue($this->PROCEDURE_NAME->GetValue(true));
        $this->DataSource->START_POSITION_NAME->SetValue($this->START_POSITION_NAME->GetValue(true));
        $this->DataSource->END_POSITION_NAME->SetValue($this->END_POSITION_NAME->GetValue(true));
        $this->DataSource->PARTIAL_FILE_NAME->SetValue($this->PARTIAL_FILE_NAME->GetValue(true));
        $this->DataSource->START_DATA_POSITION->SetValue($this->START_DATA_POSITION->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->P_INPUT_FILE_DESC_ID->SetValue($this->P_INPUT_FILE_DESC_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @53-1067875D
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_INPUT_FILE_DESC_ID->SetValue($this->P_INPUT_FILE_DESC_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @53-93729235
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
                $this->SERVICE_NO->SetValue($this->DataSource->SERVICE_NO->GetValue());
                $this->TARIFF_SCENARIO_CODE->SetValue($this->DataSource->TARIFF_SCENARIO_CODE->GetValue());
                $this->SUBSCRIPTION_NAME->SetValue($this->DataSource->SUBSCRIPTION_NAME->GetValue());
                $this->SERVICE_TYPE_CODE->SetValue($this->DataSource->SERVICE_TYPE_CODE->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->SERVICE_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TARIFF_SCENARIO_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUBSCRIPTION_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SERVICE_TYPE_CODE->Errors->ToString());
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

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->SERVICE_NO->Show();
        $this->TARIFF_SCENARIO_CODE->Show();
        $this->SUBSCRIPTION_NAME->Show();
        $this->SERVICE_TYPE_CODE->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End SubscribInfo Class @53-FCB6E20C

class clsSubscribInfoDataSource extends clsDBConn {  //SubscribInfoDataSource Class @53-D0D24E6D

//DataSource Variables @53-96745E39
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
    var $TARIFF_SCENARIO_CODE;
    var $SUBSCRIPTION_NAME;
    var $SERVICE_TYPE_CODE;
//End DataSource Variables

//DataSourceClass_Initialize Event @53-98AE5048
    function clsSubscribInfoDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record SubscribInfo/Error";
        $this->Initialize();
        $this->SERVICE_NO = new clsField("SERVICE_NO", ccsText, "");
        
        $this->TARIFF_SCENARIO_CODE = new clsField("TARIFF_SCENARIO_CODE", ccsText, "");
        
        $this->SUBSCRIPTION_NAME = new clsField("SUBSCRIPTION_NAME", ccsText, "");
        
        $this->SERVICE_TYPE_CODE = new clsField("SERVICE_TYPE_CODE", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @53-60F03DE6
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlSUBSCRIBER_ID", ccsFloat, "", "", $this->Parameters["urlSUBSCRIBER_ID"], 0, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @53-CEAF2FD8
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT *\n" .
        "FROM V_SUBSCRIBER\n" .
        "WHERE SUBSCRIBER_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @53-257C67A6
    function SetValues()
    {
        $this->SERVICE_NO->SetDBValue($this->f("SERVICE_NO"));
        $this->TARIFF_SCENARIO_CODE->SetDBValue($this->f("TARIFF_SCENARIO_CODE"));
        $this->SUBSCRIPTION_NAME->SetDBValue($this->f("SUBSCRIPTION_NAME"));
        $this->SERVICE_TYPE_CODE->SetDBValue($this->f("SERVICE_TYPE_CODE"));
    }
//End SetValues Method

//Insert Method @53-93979914
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_INPUT_FILE_TYPE_ID"] = new clsSQLParameter("ctrlP_INPUT_FILE_TYPE_ID", ccsFloat, "", "", $this->P_INPUT_FILE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["PROCEDURE_NAME"] = new clsSQLParameter("ctrlPROCEDURE_NAME", ccsText, "", "", $this->PROCEDURE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["START_POSITION_NAME"] = new clsSQLParameter("ctrlSTART_POSITION_NAME", ccsFloat, "", "", $this->START_POSITION_NAME->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["END_POSITION_NAME"] = new clsSQLParameter("ctrlEND_POSITION_NAME", ccsFloat, "", "", $this->END_POSITION_NAME->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["PARTIAL_FILE_NAME"] = new clsSQLParameter("ctrlPARTIAL_FILE_NAME", ccsText, "", "", $this->PARTIAL_FILE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["START_DATA_POSITION"] = new clsSQLParameter("ctrlSTART_DATA_POSITION", ccsFloat, "", "", $this->START_DATA_POSITION->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("ctrlCREATED_BY", ccsText, "", "", $this->CREATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["P_INPUT_FILE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_INPUT_FILE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_TYPE_ID"]->GetValue())) 
            $this->cp["P_INPUT_FILE_TYPE_ID"]->SetValue($this->P_INPUT_FILE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_INPUT_FILE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_INPUT_FILE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["PROCEDURE_NAME"]->GetValue()) and !strlen($this->cp["PROCEDURE_NAME"]->GetText()) and !is_bool($this->cp["PROCEDURE_NAME"]->GetValue())) 
            $this->cp["PROCEDURE_NAME"]->SetValue($this->PROCEDURE_NAME->GetValue(true));
        if (!is_null($this->cp["START_POSITION_NAME"]->GetValue()) and !strlen($this->cp["START_POSITION_NAME"]->GetText()) and !is_bool($this->cp["START_POSITION_NAME"]->GetValue())) 
            $this->cp["START_POSITION_NAME"]->SetValue($this->START_POSITION_NAME->GetValue(true));
        if (!strlen($this->cp["START_POSITION_NAME"]->GetText()) and !is_bool($this->cp["START_POSITION_NAME"]->GetValue(true))) 
            $this->cp["START_POSITION_NAME"]->SetText(0);
        if (!is_null($this->cp["END_POSITION_NAME"]->GetValue()) and !strlen($this->cp["END_POSITION_NAME"]->GetText()) and !is_bool($this->cp["END_POSITION_NAME"]->GetValue())) 
            $this->cp["END_POSITION_NAME"]->SetValue($this->END_POSITION_NAME->GetValue(true));
        if (!strlen($this->cp["END_POSITION_NAME"]->GetText()) and !is_bool($this->cp["END_POSITION_NAME"]->GetValue(true))) 
            $this->cp["END_POSITION_NAME"]->SetText(0);
        if (!is_null($this->cp["PARTIAL_FILE_NAME"]->GetValue()) and !strlen($this->cp["PARTIAL_FILE_NAME"]->GetText()) and !is_bool($this->cp["PARTIAL_FILE_NAME"]->GetValue())) 
            $this->cp["PARTIAL_FILE_NAME"]->SetValue($this->PARTIAL_FILE_NAME->GetValue(true));
        if (!is_null($this->cp["START_DATA_POSITION"]->GetValue()) and !strlen($this->cp["START_DATA_POSITION"]->GetText()) and !is_bool($this->cp["START_DATA_POSITION"]->GetValue())) 
            $this->cp["START_DATA_POSITION"]->SetValue($this->START_DATA_POSITION->GetValue(true));
        if (!strlen($this->cp["START_DATA_POSITION"]->GetText()) and !is_bool($this->cp["START_DATA_POSITION"]->GetValue(true))) 
            $this->cp["START_DATA_POSITION"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue($this->CREATED_BY->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_INPUT_FILE_DESC(P_INPUT_FILE_DESC_ID, P_INPUT_FILE_TYPE_ID, P_SERVICE_TYPE_ID, PROCEDURE_NAME, START_POSITION_NAME, END_POSITION_NAME, PARTIAL_FILE_NAME, START_DATA_POSITION, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)\n" .
        "VALUES\n" .
        "(GENERATE_ID('TRB','P_INPUT_FILE_DESC','P_INPUT_FILE_DESC_ID')," . $this->SQLValue($this->cp["P_INPUT_FILE_TYPE_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["PROCEDURE_NAME"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["START_POSITION_NAME"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["END_POSITION_NAME"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["PARTIAL_FILE_NAME"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["START_DATA_POSITION"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @53-70BAF76A
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_INPUT_FILE_TYPE_ID"] = new clsSQLParameter("ctrlP_INPUT_FILE_TYPE_ID", ccsFloat, "", "", $this->P_INPUT_FILE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["PROCEDURE_NAME"] = new clsSQLParameter("ctrlPROCEDURE_NAME", ccsText, "", "", $this->PROCEDURE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["START_POSITION_NAME"] = new clsSQLParameter("ctrlSTART_POSITION_NAME", ccsFloat, "", "", $this->START_POSITION_NAME->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["END_POSITION_NAME"] = new clsSQLParameter("ctrlEND_POSITION_NAME", ccsFloat, "", "", $this->END_POSITION_NAME->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["PARTIAL_FILE_NAME"] = new clsSQLParameter("ctrlPARTIAL_FILE_NAME", ccsText, "", "", $this->PARTIAL_FILE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["START_DATA_POSITION"] = new clsSQLParameter("ctrlSTART_DATA_POSITION", ccsFloat, "", "", $this->START_DATA_POSITION->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_INPUT_FILE_DESC_ID"] = new clsSQLParameter("ctrlP_INPUT_FILE_DESC_ID", ccsFloat, "", "", $this->P_INPUT_FILE_DESC_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["P_INPUT_FILE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_INPUT_FILE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_TYPE_ID"]->GetValue())) 
            $this->cp["P_INPUT_FILE_TYPE_ID"]->SetValue($this->P_INPUT_FILE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_INPUT_FILE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_INPUT_FILE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["PROCEDURE_NAME"]->GetValue()) and !strlen($this->cp["PROCEDURE_NAME"]->GetText()) and !is_bool($this->cp["PROCEDURE_NAME"]->GetValue())) 
            $this->cp["PROCEDURE_NAME"]->SetValue($this->PROCEDURE_NAME->GetValue(true));
        if (!is_null($this->cp["START_POSITION_NAME"]->GetValue()) and !strlen($this->cp["START_POSITION_NAME"]->GetText()) and !is_bool($this->cp["START_POSITION_NAME"]->GetValue())) 
            $this->cp["START_POSITION_NAME"]->SetValue($this->START_POSITION_NAME->GetValue(true));
        if (!strlen($this->cp["START_POSITION_NAME"]->GetText()) and !is_bool($this->cp["START_POSITION_NAME"]->GetValue(true))) 
            $this->cp["START_POSITION_NAME"]->SetText(0);
        if (!is_null($this->cp["END_POSITION_NAME"]->GetValue()) and !strlen($this->cp["END_POSITION_NAME"]->GetText()) and !is_bool($this->cp["END_POSITION_NAME"]->GetValue())) 
            $this->cp["END_POSITION_NAME"]->SetValue($this->END_POSITION_NAME->GetValue(true));
        if (!strlen($this->cp["END_POSITION_NAME"]->GetText()) and !is_bool($this->cp["END_POSITION_NAME"]->GetValue(true))) 
            $this->cp["END_POSITION_NAME"]->SetText(0);
        if (!is_null($this->cp["PARTIAL_FILE_NAME"]->GetValue()) and !strlen($this->cp["PARTIAL_FILE_NAME"]->GetText()) and !is_bool($this->cp["PARTIAL_FILE_NAME"]->GetValue())) 
            $this->cp["PARTIAL_FILE_NAME"]->SetValue($this->PARTIAL_FILE_NAME->GetValue(true));
        if (!is_null($this->cp["START_DATA_POSITION"]->GetValue()) and !strlen($this->cp["START_DATA_POSITION"]->GetText()) and !is_bool($this->cp["START_DATA_POSITION"]->GetValue())) 
            $this->cp["START_DATA_POSITION"]->SetValue($this->START_DATA_POSITION->GetValue(true));
        if (!strlen($this->cp["START_DATA_POSITION"]->GetText()) and !is_bool($this->cp["START_DATA_POSITION"]->GetValue(true))) 
            $this->cp["START_DATA_POSITION"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        if (!is_null($this->cp["P_INPUT_FILE_DESC_ID"]->GetValue()) and !strlen($this->cp["P_INPUT_FILE_DESC_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_DESC_ID"]->GetValue())) 
            $this->cp["P_INPUT_FILE_DESC_ID"]->SetValue($this->P_INPUT_FILE_DESC_ID->GetValue(true));
        if (!strlen($this->cp["P_INPUT_FILE_DESC_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_DESC_ID"]->GetValue(true))) 
            $this->cp["P_INPUT_FILE_DESC_ID"]->SetText(0);
        $this->SQL = "UPDATE P_INPUT_FILE_DESC SET \n" .
        "P_INPUT_FILE_TYPE_ID=" . $this->SQLValue($this->cp["P_INPUT_FILE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "P_SERVICE_TYPE_ID=" . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "PROCEDURE_NAME='" . $this->SQLValue($this->cp["PROCEDURE_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "START_POSITION_NAME=" . $this->SQLValue($this->cp["START_POSITION_NAME"]->GetDBValue(), ccsFloat) . ",\n" .
        "END_POSITION_NAME=" . $this->SQLValue($this->cp["END_POSITION_NAME"]->GetDBValue(), ccsFloat) . ",\n" .
        "PARTIAL_FILE_NAME='" . $this->SQLValue($this->cp["PARTIAL_FILE_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "START_DATA_POSITION=" . $this->SQLValue($this->cp["START_DATA_POSITION"]->GetDBValue(), ccsFloat) . ",\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATED_DATE=sysdate,\n" .
        "UPDATED_BY='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "' \n" .
        "WHERE  P_INPUT_FILE_DESC_ID = " . $this->SQLValue($this->cp["P_INPUT_FILE_DESC_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @53-0698C0B8
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_INPUT_FILE_DESC_ID"] = new clsSQLParameter("ctrlP_INPUT_FILE_DESC_ID", ccsFloat, "", "", $this->P_INPUT_FILE_DESC_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_INPUT_FILE_DESC_ID"]->GetValue()) and !strlen($this->cp["P_INPUT_FILE_DESC_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_DESC_ID"]->GetValue())) 
            $this->cp["P_INPUT_FILE_DESC_ID"]->SetValue($this->P_INPUT_FILE_DESC_ID->GetValue(true));
        if (!strlen($this->cp["P_INPUT_FILE_DESC_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_DESC_ID"]->GetValue(true))) 
            $this->cp["P_INPUT_FILE_DESC_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_INPUT_FILE_DESC WHERE P_INPUT_FILE_DESC_ID = " . $this->SQLValue($this->cp["P_INPUT_FILE_DESC_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End SubscribInfoDataSource Class @53-FCB6E20C

class clsGridFEATURE { //FEATURE class @110-D8DD1CEB

//Variables @110-AC1EDBB9

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

//Class_Initialize Event @110-8FB54C9B
    function clsGridFEATURE($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "FEATURE";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid FEATURE";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsFEATUREDataSource($this);
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

        $this->FEATURE_TYPE_CODE = & new clsControl(ccsLabel, "FEATURE_TYPE_CODE", "FEATURE_TYPE_CODE", ccsText, "", CCGetRequestParam("FEATURE_TYPE_CODE", ccsGet, NULL), $this);
        $this->Editlink = & new clsControl(ccsLink, "Editlink", "Editlink", ccsText, "", CCGetRequestParam("Editlink", ccsGet, NULL), $this);
        $this->Editlink->HTML = true;
        $this->Editlink->Page = "sub_promo_form.php";
        $this->BILL_COMPONENT_CODE = & new clsControl(ccsLabel, "BILL_COMPONENT_CODE", "BILL_COMPONENT_CODE", ccsText, "", CCGetRequestParam("BILL_COMPONENT_CODE", ccsGet, NULL), $this);
        $this->CURRENCY_CODE = & new clsControl(ccsLabel, "CURRENCY_CODE", "CURRENCY_CODE", ccsText, "", CCGetRequestParam("CURRENCY_CODE", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->VALID_FROM = & new clsControl(ccsLabel, "VALID_FROM", "VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", ccsGet, NULL), $this);
        $this->VALID_TO = & new clsControl(ccsLabel, "VALID_TO", "VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", ccsGet, NULL), $this);
        $this->CHARGE_AMOUNT = & new clsControl(ccsLabel, "CHARGE_AMOUNT", "CHARGE_AMOUNT", ccsText, "", CCGetRequestParam("CHARGE_AMOUNT", ccsGet, NULL), $this);
        $this->BILL_PERIOD_UNIT_CODE = & new clsControl(ccsLabel, "BILL_PERIOD_UNIT_CODE", "BILL_PERIOD_UNIT_CODE", ccsText, "", CCGetRequestParam("BILL_PERIOD_UNIT_CODE", ccsGet, NULL), $this);
        $this->BILLING_UNIT = & new clsControl(ccsLabel, "BILLING_UNIT", "BILLING_UNIT", ccsText, "", CCGetRequestParam("BILLING_UNIT", ccsGet, NULL), $this);
        $this->OT_FEAT_PROMOTION_CODE = & new clsControl(ccsLabel, "OT_FEAT_PROMOTION_CODE", "OT_FEAT_PROMOTION_CODE", ccsText, "", CCGetRequestParam("OT_FEAT_PROMOTION_CODE", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->ServicePromo_Insert = & new clsControl(ccsLink, "ServicePromo_Insert", "ServicePromo_Insert", ccsText, "", CCGetRequestParam("ServicePromo_Insert", ccsGet, NULL), $this);
        $this->ServicePromo_Insert->HTML = true;
        $this->ServicePromo_Insert->Parameters = CCGetQueryString("QueryString", array("SUBSCRIBER_ID", "FLAG", "s_keyword", "SUBSCRIBERPage", "SUBSCRIBERPageSize", "SUBSCRIBEROrder", "SUBSCRIBERDir", "ccsForm"));
        $this->ServicePromo_Insert->Page = "subscriber_form.php";
    }
//End Class_Initialize Event

//Initialize Method @110-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @110-4EB118E1
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);
        $this->DataSource->Parameters["urlSUBSCRIBER_ID"] = CCGetFromGet("SUBSCRIBER_ID", NULL);

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
            $this->ControlsVisible["FEATURE_TYPE_CODE"] = $this->FEATURE_TYPE_CODE->Visible;
            $this->ControlsVisible["Editlink"] = $this->Editlink->Visible;
            $this->ControlsVisible["BILL_COMPONENT_CODE"] = $this->BILL_COMPONENT_CODE->Visible;
            $this->ControlsVisible["CURRENCY_CODE"] = $this->CURRENCY_CODE->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["VALID_FROM"] = $this->VALID_FROM->Visible;
            $this->ControlsVisible["VALID_TO"] = $this->VALID_TO->Visible;
            $this->ControlsVisible["CHARGE_AMOUNT"] = $this->CHARGE_AMOUNT->Visible;
            $this->ControlsVisible["BILL_PERIOD_UNIT_CODE"] = $this->BILL_PERIOD_UNIT_CODE->Visible;
            $this->ControlsVisible["BILLING_UNIT"] = $this->BILLING_UNIT->Visible;
            $this->ControlsVisible["OT_FEAT_PROMOTION_CODE"] = $this->OT_FEAT_PROMOTION_CODE->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->FEATURE_TYPE_CODE->SetValue($this->DataSource->FEATURE_TYPE_CODE->GetValue());
                $this->Editlink->SetValue($this->DataSource->Editlink->GetValue());
                $this->Editlink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->Editlink->Parameters = CCAddParam($this->Editlink->Parameters, "SUBSCRIBER_ID", $this->DataSource->f("SUBSCRIBER_ID"));
                $this->BILL_COMPONENT_CODE->SetValue($this->DataSource->BILL_COMPONENT_CODE->GetValue());
                $this->CURRENCY_CODE->SetValue($this->DataSource->CURRENCY_CODE->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                $this->CHARGE_AMOUNT->SetValue($this->DataSource->CHARGE_AMOUNT->GetValue());
                $this->BILL_PERIOD_UNIT_CODE->SetValue($this->DataSource->BILL_PERIOD_UNIT_CODE->GetValue());
                $this->BILLING_UNIT->SetValue($this->DataSource->BILLING_UNIT->GetValue());
                $this->OT_FEAT_PROMOTION_CODE->SetValue($this->DataSource->OT_FEAT_PROMOTION_CODE->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->FEATURE_TYPE_CODE->Show();
                $this->Editlink->Show();
                $this->BILL_COMPONENT_CODE->Show();
                $this->CURRENCY_CODE->Show();
                $this->DESCRIPTION->Show();
                $this->VALID_FROM->Show();
                $this->VALID_TO->Show();
                $this->CHARGE_AMOUNT->Show();
                $this->BILL_PERIOD_UNIT_CODE->Show();
                $this->BILLING_UNIT->Show();
                $this->OT_FEAT_PROMOTION_CODE->Show();
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
        $this->ServicePromo_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @110-45893710
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->FEATURE_TYPE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Editlink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_COMPONENT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CURRENCY_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CHARGE_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_PERIOD_UNIT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILLING_UNIT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OT_FEAT_PROMOTION_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End FEATURE Class @110-FCB6E20C

class clsFEATUREDataSource extends clsDBConn {  //FEATUREDataSource Class @110-50713D35

//DataSource Variables @110-AA8D8601
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $FEATURE_TYPE_CODE;
    var $Editlink;
    var $BILL_COMPONENT_CODE;
    var $CURRENCY_CODE;
    var $DESCRIPTION;
    var $VALID_FROM;
    var $VALID_TO;
    var $CHARGE_AMOUNT;
    var $BILL_PERIOD_UNIT_CODE;
    var $BILLING_UNIT;
    var $OT_FEAT_PROMOTION_CODE;
//End DataSource Variables

//DataSourceClass_Initialize Event @110-B545DB4A
    function clsFEATUREDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid FEATURE";
        $this->Initialize();
        $this->FEATURE_TYPE_CODE = new clsField("FEATURE_TYPE_CODE", ccsText, "");
        
        $this->Editlink = new clsField("Editlink", ccsText, "");
        
        $this->BILL_COMPONENT_CODE = new clsField("BILL_COMPONENT_CODE", ccsText, "");
        
        $this->CURRENCY_CODE = new clsField("CURRENCY_CODE", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->CHARGE_AMOUNT = new clsField("CHARGE_AMOUNT", ccsText, "");
        
        $this->BILL_PERIOD_UNIT_CODE = new clsField("BILL_PERIOD_UNIT_CODE", ccsText, "");
        
        $this->BILLING_UNIT = new clsField("BILLING_UNIT", ccsText, "");
        
        $this->OT_FEAT_PROMOTION_CODE = new clsField("OT_FEAT_PROMOTION_CODE", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @110-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @110-E74DF6F0
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urlSUBSCRIBER_ID", ccsFloat, "", "", $this->Parameters["urlSUBSCRIBER_ID"], 0, false);
    }
//End Prepare Method

//Open Method @110-A462F9A9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * FROM V_SUBS_OVER_FEAT_RECU_TARIFF\n" .
        "WHERE \n" .
        "SUBSCRIBER_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "\n" .
        ") cnt";
        $this->SQL = "SELECT * FROM V_SUBS_OVER_FEAT_RECU_TARIFF\n" .
        "WHERE \n" .
        "SUBSCRIBER_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "\n" .
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

//SetValues Method @110-74A5EB2B
    function SetValues()
    {
        $this->FEATURE_TYPE_CODE->SetDBValue($this->f("FEATURE_TYPE_CODE"));
        $this->Editlink->SetDBValue($this->f("SUBSCRIBER_ID"));
        $this->BILL_COMPONENT_CODE->SetDBValue($this->f("BILL_COMPONENT_CODE"));
        $this->CURRENCY_CODE->SetDBValue($this->f("CURRENCY_CODE"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->CHARGE_AMOUNT->SetDBValue($this->f("CHARGE_AMOUNT"));
        $this->BILL_PERIOD_UNIT_CODE->SetDBValue($this->f("BILL_PERIOD_UNIT_CODE"));
        $this->BILLING_UNIT->SetDBValue($this->f("BILLING_UNIT"));
        $this->OT_FEAT_PROMOTION_CODE->SetDBValue($this->f("OT_FEAT_PROMOTION_CODE"));
    }
//End SetValues Method

} //End FEATUREDataSource Class @110-FCB6E20C

class clsGridBUNDLEDFEATURE { //BUNDLEDFEATURE class @141-62106ABD

//Variables @141-AC1EDBB9

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

//Class_Initialize Event @141-3BABE8CF
    function clsGridBUNDLEDFEATURE($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "BUNDLEDFEATURE";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid BUNDLEDFEATURE";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsBUNDLEDFEATUREDataSource($this);
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

        $this->BUNDLED_FEATURE_CODE = & new clsControl(ccsLabel, "BUNDLED_FEATURE_CODE", "BUNDLED_FEATURE_CODE", ccsText, "", CCGetRequestParam("BUNDLED_FEATURE_CODE", ccsGet, NULL), $this);
        $this->Editlink = & new clsControl(ccsLink, "Editlink", "Editlink", ccsText, "", CCGetRequestParam("Editlink", ccsGet, NULL), $this);
        $this->Editlink->HTML = true;
        $this->Editlink->Page = "sub_promo_form.php";
        $this->BILL_COMPONENT_CODE = & new clsControl(ccsLabel, "BILL_COMPONENT_CODE", "BILL_COMPONENT_CODE", ccsText, "", CCGetRequestParam("BILL_COMPONENT_CODE", ccsGet, NULL), $this);
        $this->CURRENCY_CODE = & new clsControl(ccsLabel, "CURRENCY_CODE", "CURRENCY_CODE", ccsText, "", CCGetRequestParam("CURRENCY_CODE", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->VALID_FROM = & new clsControl(ccsLabel, "VALID_FROM", "VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", ccsGet, NULL), $this);
        $this->VALID_TO = & new clsControl(ccsLabel, "VALID_TO", "VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", ccsGet, NULL), $this);
        $this->CHARGE_AMOUNT = & new clsControl(ccsLabel, "CHARGE_AMOUNT", "CHARGE_AMOUNT", ccsText, "", CCGetRequestParam("CHARGE_AMOUNT", ccsGet, NULL), $this);
        $this->BILL_PERIOD_UNIT_CODE = & new clsControl(ccsLabel, "BILL_PERIOD_UNIT_CODE", "BILL_PERIOD_UNIT_CODE", ccsText, "", CCGetRequestParam("BILL_PERIOD_UNIT_CODE", ccsGet, NULL), $this);
        $this->BILLING_UNIT = & new clsControl(ccsLabel, "BILLING_UNIT", "BILLING_UNIT", ccsText, "", CCGetRequestParam("BILLING_UNIT", ccsGet, NULL), $this);
        $this->OT_FEAT_PROMOTION_CODE = & new clsControl(ccsLabel, "OT_FEAT_PROMOTION_CODE", "OT_FEAT_PROMOTION_CODE", ccsText, "", CCGetRequestParam("OT_FEAT_PROMOTION_CODE", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->ServicePromo_Insert = & new clsControl(ccsLink, "ServicePromo_Insert", "ServicePromo_Insert", ccsText, "", CCGetRequestParam("ServicePromo_Insert", ccsGet, NULL), $this);
        $this->ServicePromo_Insert->HTML = true;
        $this->ServicePromo_Insert->Parameters = CCGetQueryString("QueryString", array("SUBSCRIBER_ID", "FLAG", "s_keyword", "SUBSCRIBERPage", "SUBSCRIBERPageSize", "SUBSCRIBEROrder", "SUBSCRIBERDir", "ccsForm"));
        $this->ServicePromo_Insert->Page = "subscriber_form.php";
    }
//End Class_Initialize Event

//Initialize Method @141-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @141-395688D7
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);
        $this->DataSource->Parameters["urlSUBSCRIBER_ID"] = CCGetFromGet("SUBSCRIBER_ID", NULL);

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
            $this->ControlsVisible["BUNDLED_FEATURE_CODE"] = $this->BUNDLED_FEATURE_CODE->Visible;
            $this->ControlsVisible["Editlink"] = $this->Editlink->Visible;
            $this->ControlsVisible["BILL_COMPONENT_CODE"] = $this->BILL_COMPONENT_CODE->Visible;
            $this->ControlsVisible["CURRENCY_CODE"] = $this->CURRENCY_CODE->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["VALID_FROM"] = $this->VALID_FROM->Visible;
            $this->ControlsVisible["VALID_TO"] = $this->VALID_TO->Visible;
            $this->ControlsVisible["CHARGE_AMOUNT"] = $this->CHARGE_AMOUNT->Visible;
            $this->ControlsVisible["BILL_PERIOD_UNIT_CODE"] = $this->BILL_PERIOD_UNIT_CODE->Visible;
            $this->ControlsVisible["BILLING_UNIT"] = $this->BILLING_UNIT->Visible;
            $this->ControlsVisible["OT_FEAT_PROMOTION_CODE"] = $this->OT_FEAT_PROMOTION_CODE->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->BUNDLED_FEATURE_CODE->SetValue($this->DataSource->BUNDLED_FEATURE_CODE->GetValue());
                $this->Editlink->SetValue($this->DataSource->Editlink->GetValue());
                $this->Editlink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->Editlink->Parameters = CCAddParam($this->Editlink->Parameters, "SUBSCRIBER_ID", $this->DataSource->f("SUBSCRIBER_ID"));
                $this->BILL_COMPONENT_CODE->SetValue($this->DataSource->BILL_COMPONENT_CODE->GetValue());
                $this->CURRENCY_CODE->SetValue($this->DataSource->CURRENCY_CODE->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                $this->CHARGE_AMOUNT->SetValue($this->DataSource->CHARGE_AMOUNT->GetValue());
                $this->BILL_PERIOD_UNIT_CODE->SetValue($this->DataSource->BILL_PERIOD_UNIT_CODE->GetValue());
                $this->BILLING_UNIT->SetValue($this->DataSource->BILLING_UNIT->GetValue());
                $this->OT_FEAT_PROMOTION_CODE->SetValue($this->DataSource->OT_FEAT_PROMOTION_CODE->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->BUNDLED_FEATURE_CODE->Show();
                $this->Editlink->Show();
                $this->BILL_COMPONENT_CODE->Show();
                $this->CURRENCY_CODE->Show();
                $this->DESCRIPTION->Show();
                $this->VALID_FROM->Show();
                $this->VALID_TO->Show();
                $this->CHARGE_AMOUNT->Show();
                $this->BILL_PERIOD_UNIT_CODE->Show();
                $this->BILLING_UNIT->Show();
                $this->OT_FEAT_PROMOTION_CODE->Show();
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
        $this->ServicePromo_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @141-899EEB4D
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->BUNDLED_FEATURE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Editlink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_COMPONENT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CURRENCY_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CHARGE_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_PERIOD_UNIT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILLING_UNIT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OT_FEAT_PROMOTION_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End BUNDLEDFEATURE Class @141-FCB6E20C

class clsBUNDLEDFEATUREDataSource extends clsDBConn {  //BUNDLEDFEATUREDataSource Class @141-D8207BBC

//DataSource Variables @141-978D2144
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $BUNDLED_FEATURE_CODE;
    var $Editlink;
    var $BILL_COMPONENT_CODE;
    var $CURRENCY_CODE;
    var $DESCRIPTION;
    var $VALID_FROM;
    var $VALID_TO;
    var $CHARGE_AMOUNT;
    var $BILL_PERIOD_UNIT_CODE;
    var $BILLING_UNIT;
    var $OT_FEAT_PROMOTION_CODE;
//End DataSource Variables

//DataSourceClass_Initialize Event @141-CACD4576
    function clsBUNDLEDFEATUREDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid BUNDLEDFEATURE";
        $this->Initialize();
        $this->BUNDLED_FEATURE_CODE = new clsField("BUNDLED_FEATURE_CODE", ccsText, "");
        
        $this->Editlink = new clsField("Editlink", ccsText, "");
        
        $this->BILL_COMPONENT_CODE = new clsField("BILL_COMPONENT_CODE", ccsText, "");
        
        $this->CURRENCY_CODE = new clsField("CURRENCY_CODE", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->CHARGE_AMOUNT = new clsField("CHARGE_AMOUNT", ccsText, "");
        
        $this->BILL_PERIOD_UNIT_CODE = new clsField("BILL_PERIOD_UNIT_CODE", ccsText, "");
        
        $this->BILLING_UNIT = new clsField("BILLING_UNIT", ccsText, "");
        
        $this->OT_FEAT_PROMOTION_CODE = new clsField("OT_FEAT_PROMOTION_CODE", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @141-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @141-E74DF6F0
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urlSUBSCRIBER_ID", ccsFloat, "", "", $this->Parameters["urlSUBSCRIBER_ID"], 0, false);
    }
//End Prepare Method

//Open Method @141-02D5D7C6
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * FROM V_SUBS_OVER_BF_RECU_TARIFF\n" .
        "WHERE \n" .
        "SUBSCRIBER_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "\n" .
        ") cnt";
        $this->SQL = "SELECT * FROM V_SUBS_OVER_BF_RECU_TARIFF\n" .
        "WHERE \n" .
        "SUBSCRIBER_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "\n" .
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

//SetValues Method @141-9D6194C0
    function SetValues()
    {
        $this->BUNDLED_FEATURE_CODE->SetDBValue($this->f("BUNDLED_FEATURE_CODE"));
        $this->Editlink->SetDBValue($this->f("SUBSCRIBER_ID"));
        $this->BILL_COMPONENT_CODE->SetDBValue($this->f("BILL_COMPONENT_CODE"));
        $this->CURRENCY_CODE->SetDBValue($this->f("CURRENCY_CODE"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->CHARGE_AMOUNT->SetDBValue($this->f("CHARGE_AMOUNT"));
        $this->BILL_PERIOD_UNIT_CODE->SetDBValue($this->f("BILL_PERIOD_UNIT_CODE"));
        $this->BILLING_UNIT->SetDBValue($this->f("BILLING_UNIT"));
        $this->OT_FEAT_PROMOTION_CODE->SetDBValue($this->f("OT_FEAT_PROMOTION_CODE"));
    }
//End SetValues Method

} //End BUNDLEDFEATUREDataSource Class @141-FCB6E20C

//Initialize Page @1-3232568F
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
$TemplateFileName = "sub_tariff_override.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-C4CB24C3
include_once("./sub_tariff_override_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-7752ED85
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$RECURRINGTARIF = & new clsGridRECURRINGTARIF("", $MainPage);
$SubscribInfo = & new clsRecordSubscribInfo("", $MainPage);
$FEATURE = & new clsGridFEATURE("", $MainPage);
$BUNDLEDFEATURE = & new clsGridBUNDLEDFEATURE("", $MainPage);
$MainPage->RECURRINGTARIF = & $RECURRINGTARIF;
$MainPage->SubscribInfo = & $SubscribInfo;
$MainPage->FEATURE = & $FEATURE;
$MainPage->BUNDLEDFEATURE = & $BUNDLEDFEATURE;
$RECURRINGTARIF->Initialize();
$SubscribInfo->Initialize();
$FEATURE->Initialize();
$BUNDLEDFEATURE->Initialize();

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

//Execute Components @1-AEF50B35
$SubscribInfo->Operation();
//End Execute Components

//Go to destination page @1-0B933010
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($RECURRINGTARIF);
    unset($SubscribInfo);
    unset($FEATURE);
    unset($BUNDLEDFEATURE);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-A411D672
$RECURRINGTARIF->Show();
$SubscribInfo->Show();
$FEATURE->Show();
$BUNDLEDFEATURE->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-9409BA41
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($RECURRINGTARIF);
unset($SubscribInfo);
unset($FEATURE);
unset($BUNDLEDFEATURE);
unset($Tpl);
//End Unload Page


?>
