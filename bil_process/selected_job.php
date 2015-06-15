<?php
//Include Common Files @1-4314F7C0
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_process/");
define("FileName", "selected_job.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordV_T_JOB_CONTROL { //V_T_JOB_CONTROL Class @2-215CA1E2

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

//Class_Initialize Event @2-98BB3AF5
    function clsRecordV_T_JOB_CONTROL($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_T_JOB_CONTROL/Error";
        $this->DataSource = new clsV_T_JOB_CONTROLDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_T_JOB_CONTROL";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->INPUT_DATA_CONTROL_ID = & new clsControl(ccsHidden, "INPUT_DATA_CONTROL_ID", "INPUT_DATA_CONTROL_ID", ccsFloat, "", CCGetRequestParam("INPUT_DATA_CONTROL_ID", $Method, NULL), $this);
            $this->INPUT_DATA_CONTROL_ID->Required = true;
            $this->P_JOB_ID = & new clsControl(ccsLabel, "P_JOB_ID", "P JOB ID", ccsFloat, "", CCGetRequestParam("P_JOB_ID", $Method, NULL), $this);
            $this->START_PROCESS_DATE = & new clsControl(ccsLabel, "START_PROCESS_DATE", "START PROCESS TIME", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("START_PROCESS_DATE", $Method, NULL), $this);
            $this->END_PROCESS_DATE = & new clsControl(ccsLabel, "END_PROCESS_DATE", "END PROCESS TIME", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("END_PROCESS_DATE", $Method, NULL), $this);
            $this->VERIFIED_BY = & new clsControl(ccsLabel, "VERIFIED_BY", "VERIFIED BY", ccsText, "", CCGetRequestParam("VERIFIED_BY", $Method, NULL), $this);
            $this->JOB_CODE = & new clsControl(ccsLabel, "JOB_CODE", "JOB CODE", ccsText, "", CCGetRequestParam("JOB_CODE", $Method, NULL), $this);
            $this->JOB_CONTROL_ID = & new clsControl(ccsHidden, "JOB_CONTROL_ID", "P PROCESS STATUS ID", ccsFloat, "", CCGetRequestParam("JOB_CONTROL_ID", $Method, NULL), $this);
            $this->JOB_CONTROL_ID->Required = true;
            $this->CANCEL_COUNT = & new clsControl(ccsLabel, "CANCEL_COUNT", "CANCEL_COUNT", ccsFloat, "", CCGetRequestParam("CANCEL_COUNT", $Method, NULL), $this);
            $this->P_STATUS_LIST_ID = & new clsControl(ccsLabel, "P_STATUS_LIST_ID", "P_STATUS_LIST_ID", ccsFloat, "", CCGetRequestParam("P_STATUS_LIST_ID", $Method, NULL), $this);
            $this->IS_VERIFIED = & new clsControl(ccsLabel, "IS_VERIFIED", "IS_VERIFIED", ccsText, "", CCGetRequestParam("IS_VERIFIED", $Method, NULL), $this);
            $this->IS_VALID = & new clsControl(ccsLabel, "IS_VALID", "IS_VALID", ccsText, "", CCGetRequestParam("IS_VALID", $Method, NULL), $this);
            $this->IS_CANCELLED = & new clsControl(ccsLabel, "IS_CANCELLED", "IS_CANCELLED", ccsText, "", CCGetRequestParam("IS_CANCELLED", $Method, NULL), $this);
            $this->btnSubmit = & new clsControl(ccsLabel, "btnSubmit", "btnSubmit", ccsText, "", CCGetRequestParam("btnSubmit", $Method, NULL), $this);
            $this->btnSubmit->HTML = true;
            $this->btnCancel = & new clsControl(ccsLabel, "btnCancel", "btnCancel", ccsText, "", CCGetRequestParam("btnCancel", $Method, NULL), $this);
            $this->btnCancel->HTML = true;
            $this->btnForce = & new clsControl(ccsLabel, "btnForce", "btnForce", ccsText, "", CCGetRequestParam("btnForce", $Method, NULL), $this);
            $this->btnForce->HTML = true;
            $this->VERIFIED_DATE = & new clsControl(ccsLabel, "VERIFIED_DATE", "VERIFICATION DATE", ccsDate, $DefaultDateFormat, CCGetRequestParam("VERIFIED_DATE", $Method, NULL), $this);
            $this->INPUT_TABLE_NAME = & new clsControl(ccsLabel, "INPUT_TABLE_NAME", "PROCEDURE NAME", ccsText, "", CCGetRequestParam("INPUT_TABLE_NAME", $Method, NULL), $this);
            $this->INPUT_TTL_RECORD = & new clsControl(ccsLabel, "INPUT_TTL_RECORD", "INPUT REC AMT", ccsFloat, "", CCGetRequestParam("INPUT_TTL_RECORD", $Method, NULL), $this);
            $this->INPUT_TTL_CHARGE = & new clsControl(ccsLabel, "INPUT_TTL_CHARGE", "INPUT MONEY AMT", ccsFloat, "", CCGetRequestParam("INPUT_TTL_CHARGE", $Method, NULL), $this);
            $this->PARENT_ID = & new clsControl(ccsLabel, "PARENT_ID", "PARENT ID", ccsFloat, "", CCGetRequestParam("PARENT_ID", $Method, NULL), $this);
            $this->IS_READY_BILLED = & new clsControl(ccsLabel, "IS_READY_BILLED", "IS_READY_BILLED", ccsText, "", CCGetRequestParam("IS_READY_BILLED", $Method, NULL), $this);
            $this->SET_BILL_DATE = & new clsControl(ccsLabel, "SET_BILL_DATE", "OUTPUT REC AMT", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("SET_BILL_DATE", $Method, NULL), $this);
            $this->OUTPUT_MONEY_AMT = & new clsControl(ccsLabel, "OUTPUT_MONEY_AMT", "OUTPUT MONEY AMT", ccsFloat, "", CCGetRequestParam("OUTPUT_MONEY_AMT", $Method, NULL), $this);
            $this->JOB_STATUS_CODE = & new clsControl(ccsLabel, "JOB_STATUS_CODE", "IS OK", ccsText, "", CCGetRequestParam("JOB_STATUS_CODE", $Method, NULL), $this);
            $this->PARENT_JOB_CODE = & new clsControl(ccsLabel, "PARENT_JOB_CODE", "UPDATE DATE", ccsText, "", CCGetRequestParam("PARENT_JOB_CODE", $Method, NULL), $this);
            $this->OPERATOR_ID = & new clsControl(ccsLabel, "OPERATOR_ID", "CREATED BY", ccsText, "", CCGetRequestParam("OPERATOR_ID", $Method, NULL), $this);
            $this->lblLOG = & new clsControl(ccsLabel, "lblLOG", "lblLOG", ccsText, "", CCGetRequestParam("lblLOG", $Method, NULL), $this);
            $this->lblLOG->HTML = true;
            $this->INPUT_DATA_CONTROL_ID2 = & new clsControl(ccsLabel, "INPUT_DATA_CONTROL_ID2", "INPUT_DATA_CONTROL_ID2", ccsText, "", CCGetRequestParam("INPUT_DATA_CONTROL_ID2", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @2-4A5DCFCC
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlJOB_CONTROL_ID"] = CCGetFromGet("JOB_CONTROL_ID", NULL);
    }
//End Initialize Method

//Validate Method @2-538CD0F4
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->INPUT_DATA_CONTROL_ID->Validate() && $Validation);
        $Validation = ($this->JOB_CONTROL_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->INPUT_DATA_CONTROL_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->JOB_CONTROL_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-A65ACEB0
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->INPUT_DATA_CONTROL_ID->Errors->Count());
        $errors = ($errors || $this->P_JOB_ID->Errors->Count());
        $errors = ($errors || $this->START_PROCESS_DATE->Errors->Count());
        $errors = ($errors || $this->END_PROCESS_DATE->Errors->Count());
        $errors = ($errors || $this->VERIFIED_BY->Errors->Count());
        $errors = ($errors || $this->JOB_CODE->Errors->Count());
        $errors = ($errors || $this->JOB_CONTROL_ID->Errors->Count());
        $errors = ($errors || $this->CANCEL_COUNT->Errors->Count());
        $errors = ($errors || $this->P_STATUS_LIST_ID->Errors->Count());
        $errors = ($errors || $this->IS_VERIFIED->Errors->Count());
        $errors = ($errors || $this->IS_VALID->Errors->Count());
        $errors = ($errors || $this->IS_CANCELLED->Errors->Count());
        $errors = ($errors || $this->btnSubmit->Errors->Count());
        $errors = ($errors || $this->btnCancel->Errors->Count());
        $errors = ($errors || $this->btnForce->Errors->Count());
        $errors = ($errors || $this->VERIFIED_DATE->Errors->Count());
        $errors = ($errors || $this->INPUT_TABLE_NAME->Errors->Count());
        $errors = ($errors || $this->INPUT_TTL_RECORD->Errors->Count());
        $errors = ($errors || $this->INPUT_TTL_CHARGE->Errors->Count());
        $errors = ($errors || $this->PARENT_ID->Errors->Count());
        $errors = ($errors || $this->IS_READY_BILLED->Errors->Count());
        $errors = ($errors || $this->SET_BILL_DATE->Errors->Count());
        $errors = ($errors || $this->OUTPUT_MONEY_AMT->Errors->Count());
        $errors = ($errors || $this->JOB_STATUS_CODE->Errors->Count());
        $errors = ($errors || $this->PARENT_JOB_CODE->Errors->Count());
        $errors = ($errors || $this->OPERATOR_ID->Errors->Count());
        $errors = ($errors || $this->lblLOG->Errors->Count());
        $errors = ($errors || $this->INPUT_DATA_CONTROL_ID2->Errors->Count());
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

//Operation Method @2-17DC9883
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

//Show Method @2-A6B3A7AC
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
                $this->P_JOB_ID->SetValue($this->DataSource->P_JOB_ID->GetValue());
                $this->START_PROCESS_DATE->SetValue($this->DataSource->START_PROCESS_DATE->GetValue());
                $this->END_PROCESS_DATE->SetValue($this->DataSource->END_PROCESS_DATE->GetValue());
                $this->VERIFIED_BY->SetValue($this->DataSource->VERIFIED_BY->GetValue());
                $this->JOB_CODE->SetValue($this->DataSource->JOB_CODE->GetValue());
                $this->CANCEL_COUNT->SetValue($this->DataSource->CANCEL_COUNT->GetValue());
                $this->P_STATUS_LIST_ID->SetValue($this->DataSource->P_STATUS_LIST_ID->GetValue());
                $this->IS_VERIFIED->SetValue($this->DataSource->IS_VERIFIED->GetValue());
                $this->IS_VALID->SetValue($this->DataSource->IS_VALID->GetValue());
                $this->IS_CANCELLED->SetValue($this->DataSource->IS_CANCELLED->GetValue());
                $this->VERIFIED_DATE->SetValue($this->DataSource->VERIFIED_DATE->GetValue());
                $this->INPUT_TABLE_NAME->SetValue($this->DataSource->INPUT_TABLE_NAME->GetValue());
                $this->INPUT_TTL_RECORD->SetValue($this->DataSource->INPUT_TTL_RECORD->GetValue());
                $this->INPUT_TTL_CHARGE->SetValue($this->DataSource->INPUT_TTL_CHARGE->GetValue());
                $this->PARENT_ID->SetValue($this->DataSource->PARENT_ID->GetValue());
                $this->IS_READY_BILLED->SetValue($this->DataSource->IS_READY_BILLED->GetValue());
                $this->SET_BILL_DATE->SetValue($this->DataSource->SET_BILL_DATE->GetValue());
                $this->OUTPUT_MONEY_AMT->SetValue($this->DataSource->OUTPUT_MONEY_AMT->GetValue());
                $this->JOB_STATUS_CODE->SetValue($this->DataSource->JOB_STATUS_CODE->GetValue());
                $this->PARENT_JOB_CODE->SetValue($this->DataSource->PARENT_JOB_CODE->GetValue());
                $this->OPERATOR_ID->SetValue($this->DataSource->OPERATOR_ID->GetValue());
                $this->INPUT_DATA_CONTROL_ID2->SetValue($this->DataSource->INPUT_DATA_CONTROL_ID2->GetValue());
                if(!$this->FormSubmitted){
                    $this->INPUT_DATA_CONTROL_ID->SetValue($this->DataSource->INPUT_DATA_CONTROL_ID->GetValue());
                    $this->JOB_CONTROL_ID->SetValue($this->DataSource->JOB_CONTROL_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->INPUT_DATA_CONTROL_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_JOB_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->START_PROCESS_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->END_PROCESS_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VERIFIED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->JOB_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->JOB_CONTROL_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CANCEL_COUNT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_STATUS_LIST_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_VERIFIED->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_VALID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_CANCELLED->Errors->ToString());
            $Error = ComposeStrings($Error, $this->btnSubmit->Errors->ToString());
            $Error = ComposeStrings($Error, $this->btnCancel->Errors->ToString());
            $Error = ComposeStrings($Error, $this->btnForce->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VERIFIED_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INPUT_TABLE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INPUT_TTL_RECORD->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INPUT_TTL_CHARGE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PARENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_READY_BILLED->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SET_BILL_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OUTPUT_MONEY_AMT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->JOB_STATUS_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PARENT_JOB_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OPERATOR_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lblLOG->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INPUT_DATA_CONTROL_ID2->Errors->ToString());
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

        $this->INPUT_DATA_CONTROL_ID->Show();
        $this->P_JOB_ID->Show();
        $this->START_PROCESS_DATE->Show();
        $this->END_PROCESS_DATE->Show();
        $this->VERIFIED_BY->Show();
        $this->JOB_CODE->Show();
        $this->JOB_CONTROL_ID->Show();
        $this->CANCEL_COUNT->Show();
        $this->P_STATUS_LIST_ID->Show();
        $this->IS_VERIFIED->Show();
        $this->IS_VALID->Show();
        $this->IS_CANCELLED->Show();
        $this->btnSubmit->Show();
        $this->btnCancel->Show();
        $this->btnForce->Show();
        $this->VERIFIED_DATE->Show();
        $this->INPUT_TABLE_NAME->Show();
        $this->INPUT_TTL_RECORD->Show();
        $this->INPUT_TTL_CHARGE->Show();
        $this->PARENT_ID->Show();
        $this->IS_READY_BILLED->Show();
        $this->SET_BILL_DATE->Show();
        $this->OUTPUT_MONEY_AMT->Show();
        $this->JOB_STATUS_CODE->Show();
        $this->PARENT_JOB_CODE->Show();
        $this->OPERATOR_ID->Show();
        $this->lblLOG->Show();
        $this->INPUT_DATA_CONTROL_ID2->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End V_T_JOB_CONTROL Class @2-FCB6E20C

class clsV_T_JOB_CONTROLDataSource extends clsDBConn {  //V_T_JOB_CONTROLDataSource Class @2-5F2886CB

//DataSource Variables @2-49A9282F
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;
    var $AllParametersSet;


    // Datasource fields
    var $INPUT_DATA_CONTROL_ID;
    var $P_JOB_ID;
    var $START_PROCESS_DATE;
    var $END_PROCESS_DATE;
    var $VERIFIED_BY;
    var $JOB_CODE;
    var $JOB_CONTROL_ID;
    var $CANCEL_COUNT;
    var $P_STATUS_LIST_ID;
    var $IS_VERIFIED;
    var $IS_VALID;
    var $IS_CANCELLED;
    var $btnSubmit;
    var $btnCancel;
    var $btnForce;
    var $VERIFIED_DATE;
    var $INPUT_TABLE_NAME;
    var $INPUT_TTL_RECORD;
    var $INPUT_TTL_CHARGE;
    var $PARENT_ID;
    var $IS_READY_BILLED;
    var $SET_BILL_DATE;
    var $OUTPUT_MONEY_AMT;
    var $JOB_STATUS_CODE;
    var $PARENT_JOB_CODE;
    var $OPERATOR_ID;
    var $lblLOG;
    var $INPUT_DATA_CONTROL_ID2;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-E09853E3
    function clsV_T_JOB_CONTROLDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record V_T_JOB_CONTROL/Error";
        $this->Initialize();
        $this->INPUT_DATA_CONTROL_ID = new clsField("INPUT_DATA_CONTROL_ID", ccsFloat, "");
        
        $this->P_JOB_ID = new clsField("P_JOB_ID", ccsFloat, "");
        
        $this->START_PROCESS_DATE = new clsField("START_PROCESS_DATE", ccsDate, $this->DateFormat);
        
        $this->END_PROCESS_DATE = new clsField("END_PROCESS_DATE", ccsDate, $this->DateFormat);
        
        $this->VERIFIED_BY = new clsField("VERIFIED_BY", ccsText, "");
        
        $this->JOB_CODE = new clsField("JOB_CODE", ccsText, "");
        
        $this->JOB_CONTROL_ID = new clsField("JOB_CONTROL_ID", ccsFloat, "");
        
        $this->CANCEL_COUNT = new clsField("CANCEL_COUNT", ccsFloat, "");
        
        $this->P_STATUS_LIST_ID = new clsField("P_STATUS_LIST_ID", ccsFloat, "");
        
        $this->IS_VERIFIED = new clsField("IS_VERIFIED", ccsText, "");
        
        $this->IS_VALID = new clsField("IS_VALID", ccsText, "");
        
        $this->IS_CANCELLED = new clsField("IS_CANCELLED", ccsText, "");
        
        $this->btnSubmit = new clsField("btnSubmit", ccsText, "");
        
        $this->btnCancel = new clsField("btnCancel", ccsText, "");
        
        $this->btnForce = new clsField("btnForce", ccsText, "");
        
        $this->VERIFIED_DATE = new clsField("VERIFIED_DATE", ccsDate, $this->DateFormat);
        
        $this->INPUT_TABLE_NAME = new clsField("INPUT_TABLE_NAME", ccsText, "");
        
        $this->INPUT_TTL_RECORD = new clsField("INPUT_TTL_RECORD", ccsFloat, "");
        
        $this->INPUT_TTL_CHARGE = new clsField("INPUT_TTL_CHARGE", ccsFloat, "");
        
        $this->PARENT_ID = new clsField("PARENT_ID", ccsFloat, "");
        
        $this->IS_READY_BILLED = new clsField("IS_READY_BILLED", ccsText, "");
        
        $this->SET_BILL_DATE = new clsField("SET_BILL_DATE", ccsDate, $this->DateFormat);
        
        $this->OUTPUT_MONEY_AMT = new clsField("OUTPUT_MONEY_AMT", ccsFloat, "");
        
        $this->JOB_STATUS_CODE = new clsField("JOB_STATUS_CODE", ccsText, "");
        
        $this->PARENT_JOB_CODE = new clsField("PARENT_JOB_CODE", ccsText, "");
        
        $this->OPERATOR_ID = new clsField("OPERATOR_ID", ccsText, "");
        
        $this->lblLOG = new clsField("lblLOG", ccsText, "");
        
        $this->INPUT_DATA_CONTROL_ID2 = new clsField("INPUT_DATA_CONTROL_ID2", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-8C93F914
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlJOB_CONTROL_ID", ccsFloat, "", "", $this->Parameters["urlJOB_CONTROL_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @2-5D5637C5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n" .
        "FROM V_T_JOB_CONTROL\n" .
        "WHERE JOB_CONTROL_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . " ";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-BC059723
    function SetValues()
    {
        $this->INPUT_DATA_CONTROL_ID->SetDBValue(trim($this->f("INPUT_DATA_CONTROL_ID")));
        $this->P_JOB_ID->SetDBValue(trim($this->f("P_JOB_ID")));
        $this->START_PROCESS_DATE->SetDBValue(trim($this->f("START_PROCESS_DATE")));
        $this->END_PROCESS_DATE->SetDBValue(trim($this->f("END_PROCESS_DATE")));
        $this->VERIFIED_BY->SetDBValue($this->f("VERIFIED_BY"));
        $this->JOB_CODE->SetDBValue($this->f("JOB_CODE"));
        $this->JOB_CONTROL_ID->SetDBValue(trim($this->f("JOB_CONTROL_ID")));
        $this->CANCEL_COUNT->SetDBValue(trim($this->f("CANCEL_COUNT")));
        $this->P_STATUS_LIST_ID->SetDBValue(trim($this->f("P_STATUS_LIST_ID")));
        $this->IS_VERIFIED->SetDBValue($this->f("IS_VERIFIED"));
        $this->IS_VALID->SetDBValue($this->f("IS_VALID"));
        $this->IS_CANCELLED->SetDBValue($this->f("IS_CANCELLED"));
        $this->VERIFIED_DATE->SetDBValue(trim($this->f("VERIFIED_DATE")));
        $this->INPUT_TABLE_NAME->SetDBValue($this->f("INPUT_TABLE_NAME"));
        $this->INPUT_TTL_RECORD->SetDBValue(trim($this->f("INPUT_TTL_RECORD")));
        $this->INPUT_TTL_CHARGE->SetDBValue(trim($this->f("INPUT_TTL_CHARGE")));
        $this->PARENT_ID->SetDBValue(trim($this->f("PARENT_ID")));
        $this->IS_READY_BILLED->SetDBValue($this->f("IS_READY_BILLED"));
        $this->SET_BILL_DATE->SetDBValue(trim($this->f("SET_BILL_DATE")));
        $this->OUTPUT_MONEY_AMT->SetDBValue(trim($this->f("OUTPUT_MONEY_AMT")));
        $this->JOB_STATUS_CODE->SetDBValue($this->f("JOB_STATUS_CODE"));
        $this->PARENT_JOB_CODE->SetDBValue($this->f("PARENT_JOB_CODE"));
        $this->OPERATOR_ID->SetDBValue($this->f("OPERATOR_ID"));
        $this->INPUT_DATA_CONTROL_ID2->SetDBValue($this->f("INPUT_DATA_CONTROL_ID"));
    }
//End SetValues Method

} //End V_T_JOB_CONTROLDataSource Class @2-FCB6E20C

//Initialize Page @1-D994FA44
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
$TemplateFileName = "selected_job.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-45182D23
include_once("./selected_job_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-E31E22E9
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$V_T_JOB_CONTROL = & new clsRecordV_T_JOB_CONTROL("", $MainPage);
$MainPage->V_T_JOB_CONTROL = & $V_T_JOB_CONTROL;
$V_T_JOB_CONTROL->Initialize();

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

//Execute Components @1-2E43CC0A
$V_T_JOB_CONTROL->Operation();
//End Execute Components

//Go to destination page @1-175C4535
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($V_T_JOB_CONTROL);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-E13BE3F0
$V_T_JOB_CONTROL->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-2DEE97DC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($V_T_JOB_CONTROL);
unset($Tpl);
//End Unload Page


?>
