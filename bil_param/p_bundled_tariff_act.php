<?php
//Include Common Files @1-984FA649
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_bundled_tariff_act.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files



class clsRecordV_P_BUNDLED_FEATURE1 { //V_P_BUNDLED_FEATURE1 Class @39-3FAE9750

//Variables @39-D6FF3E86

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

//Class_Initialize Event @39-85AE1AF7
    function clsRecordV_P_BUNDLED_FEATURE1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_P_BUNDLED_FEATURE1/Error";
        $this->DataSource = new clsV_P_BUNDLED_FEATURE1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_P_BUNDLED_FEATURE1";
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
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->RECU_TARIFF_SCEN_CODE = & new clsControl(ccsTextBox, "RECU_TARIFF_SCEN_CODE", "RECU_TARIFF_SCEN_CODE", ccsText, "", CCGetRequestParam("RECU_TARIFF_SCEN_CODE", $Method, NULL), $this);
            $this->RECU_TARIFF_SCEN_CODE->Required = true;
            $this->P_BILLING_PERIOD_UNIT_ID = & new clsControl(ccsTextBox, "P_BILLING_PERIOD_UNIT_ID", "P_SERVICE_TYPE_ID", ccsFloat, "", CCGetRequestParam("P_BILLING_PERIOD_UNIT_ID", $Method, NULL), $this);
            $this->VALID_FROM = & new clsControl(ccsTextBox, "VALID_FROM", "VALID FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", $Method, NULL), $this);
            $this->VALID_FROM->Required = true;
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->P_RECU_TARIFF_BUNDLED_FEAT_ID = & new clsControl(ccsHidden, "P_RECU_TARIFF_BUNDLED_FEAT_ID", "P_RECU_TARIFF_BUNDLED_FEAT_ID", ccsFloat, "", CCGetRequestParam("P_RECU_TARIFF_BUNDLED_FEAT_ID", $Method, NULL), $this);
            $this->BILL_PERIOD_UNIT_CODE = & new clsControl(ccsTextBox, "BILL_PERIOD_UNIT_CODE", "Service Type Code", ccsText, "", CCGetRequestParam("BILL_PERIOD_UNIT_CODE", $Method, NULL), $this);
            $this->BILL_PERIOD_UNIT_CODE->Required = true;
            $this->DatePicker_UPDATE_DATE1 = & new clsDatePicker("DatePicker_UPDATE_DATE1", "V_P_BUNDLED_FEATURE1", "VALID_FROM", $this);
            $this->VALID_TO = & new clsControl(ccsTextBox, "VALID_TO", "VALID TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", $Method, NULL), $this);
            $this->DatePicker_UPDATE_DATE2 = & new clsDatePicker("DatePicker_UPDATE_DATE2", "V_P_BUNDLED_FEATURE1", "VALID_TO", $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->P_BUNDLED_FEATURE_ID = & new clsControl(ccsTextBox, "P_BUNDLED_FEATURE_ID", "P_BUNDLED_FEATURE_ID", ccsFloat, "", CCGetRequestParam("P_BUNDLED_FEATURE_ID", $Method, NULL), $this);
            $this->P_RECURR_TARIFF_SCENARIO_ID = & new clsControl(ccsTextBox, "P_RECURR_TARIFF_SCENARIO_ID", "P_RECURR_TARIFF_SCENARIO_ID", ccsFloat, "", CCGetRequestParam("P_RECURR_TARIFF_SCENARIO_ID", $Method, NULL), $this);
            $this->P_SERVICE_TYPE_ID = & new clsControl(ccsTextBox, "P_SERVICE_TYPE_ID", "P_SERVICE_TYPE_ID", ccsFloat, "", CCGetRequestParam("P_SERVICE_TYPE_ID", $Method, NULL), $this);
            $this->SUB_QTY_FROM = & new clsControl(ccsTextBox, "SUB_QTY_FROM", "Sub Qty From", ccsFloat, "", CCGetRequestParam("SUB_QTY_FROM", $Method, NULL), $this);
            $this->SUB_QTY_TO = & new clsControl(ccsTextBox, "SUB_QTY_TO", "Sub Qty To", ccsFloat, "", CCGetRequestParam("SUB_QTY_TO", $Method, NULL), $this);
            $this->BILLING_UNIT = & new clsControl(ccsTextBox, "BILLING_UNIT", "BILLING_UNIT", ccsFloat, "", CCGetRequestParam("BILLING_UNIT", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @39-F77F9087
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_RECU_TARIFF_BUNDLED_FEAT_ID"] = CCGetFromGet("P_RECU_TARIFF_BUNDLED_FEAT_ID", NULL);
    }
//End Initialize Method

//Validate Method @39-268A2315
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->RECU_TARIFF_SCEN_CODE->Validate() && $Validation);
        $Validation = ($this->P_BILLING_PERIOD_UNIT_ID->Validate() && $Validation);
        $Validation = ($this->VALID_FROM->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Validate() && $Validation);
        $Validation = ($this->BILL_PERIOD_UNIT_CODE->Validate() && $Validation);
        $Validation = ($this->VALID_TO->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->P_BUNDLED_FEATURE_ID->Validate() && $Validation);
        $Validation = ($this->P_RECURR_TARIFF_SCENARIO_ID->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->SUB_QTY_FROM->Validate() && $Validation);
        $Validation = ($this->SUB_QTY_TO->Validate() && $Validation);
        $Validation = ($this->BILLING_UNIT->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->RECU_TARIFF_SCEN_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILLING_PERIOD_UNIT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILL_PERIOD_UNIT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BUNDLED_FEATURE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_RECURR_TARIFF_SCENARIO_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUB_QTY_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUB_QTY_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILLING_UNIT->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @39-6F50D143
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->RECU_TARIFF_SCEN_CODE->Errors->Count());
        $errors = ($errors || $this->P_BILLING_PERIOD_UNIT_ID->Errors->Count());
        $errors = ($errors || $this->VALID_FROM->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Errors->Count());
        $errors = ($errors || $this->BILL_PERIOD_UNIT_CODE->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE1->Errors->Count());
        $errors = ($errors || $this->VALID_TO->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE2->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->P_BUNDLED_FEATURE_ID->Errors->Count());
        $errors = ($errors || $this->P_RECURR_TARIFF_SCENARIO_ID->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->SUB_QTY_FROM->Errors->Count());
        $errors = ($errors || $this->SUB_QTY_TO->Errors->Count());
        $errors = ($errors || $this->BILLING_UNIT->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @39-ED598703
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

//Operation Method @39-EB5EABA9
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
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Cancel") {
            $Redirect = "p_bundled_tariff.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = "p_bundled_tariff.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = "p_bundled_tariff.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
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

//InsertRow Method @39-F50C3DC0
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->P_BILLING_PERIOD_UNIT_ID->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        $this->DataSource->P_BUNDLED_FEATURE_ID->SetValue($this->P_BUNDLED_FEATURE_ID->GetValue(true));
        $this->DataSource->P_RECURR_TARIFF_SCENARIO_ID->SetValue($this->P_RECURR_TARIFF_SCENARIO_ID->GetValue(true));
        $this->DataSource->SUB_QTY_FROM->SetValue($this->SUB_QTY_FROM->GetValue(true));
        $this->DataSource->SUB_QTY_TO->SetValue($this->SUB_QTY_TO->GetValue(true));
        $this->DataSource->BILLING_UNIT->SetValue($this->BILLING_UNIT->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @39-3D2B9AE2
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->P_BUNDLED_FEATURE_ID->SetValue($this->P_BUNDLED_FEATURE_ID->GetValue(true));
        $this->DataSource->P_BILLING_PERIOD_UNIT_ID->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->P_RECU_TARIFF_BUNDLED_FEAT_ID->SetValue($this->P_RECU_TARIFF_BUNDLED_FEAT_ID->GetValue(true));
        $this->DataSource->P_RECURR_TARIFF_SCENARIO_ID->SetValue($this->P_RECURR_TARIFF_SCENARIO_ID->GetValue(true));
        $this->DataSource->SUB_QTY_FROM->SetValue($this->SUB_QTY_FROM->GetValue(true));
        $this->DataSource->SUB_QTY_TO->SetValue($this->SUB_QTY_TO->GetValue(true));
        $this->DataSource->BILLING_UNIT->SetValue($this->BILLING_UNIT->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @39-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @39-251129F7
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
                    $this->RECU_TARIFF_SCEN_CODE->SetValue($this->DataSource->RECU_TARIFF_SCEN_CODE->GetValue());
                    $this->P_BILLING_PERIOD_UNIT_ID->SetValue($this->DataSource->P_BILLING_PERIOD_UNIT_ID->GetValue());
                    $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->SetValue($this->DataSource->P_RECU_TARIFF_BUNDLED_FEAT_ID->GetValue());
                    $this->BILL_PERIOD_UNIT_CODE->SetValue($this->DataSource->BILL_PERIOD_UNIT_CODE->GetValue());
                    $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->P_BUNDLED_FEATURE_ID->SetValue($this->DataSource->P_BUNDLED_FEATURE_ID->GetValue());
                    $this->P_RECURR_TARIFF_SCENARIO_ID->SetValue($this->DataSource->P_RECURR_TARIFF_SCENARIO_ID->GetValue());
                    $this->SUB_QTY_FROM->SetValue($this->DataSource->SUB_QTY_FROM->GetValue());
                    $this->SUB_QTY_TO->SetValue($this->DataSource->SUB_QTY_TO->GetValue());
                    $this->BILLING_UNIT->SetValue($this->DataSource->BILLING_UNIT->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->RECU_TARIFF_SCEN_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILLING_PERIOD_UNIT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILL_PERIOD_UNIT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BUNDLED_FEATURE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_RECURR_TARIFF_SCENARIO_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUB_QTY_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUB_QTY_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILLING_UNIT->Errors->ToString());
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

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Cancel->Show();
        $this->RECU_TARIFF_SCEN_CODE->Show();
        $this->P_BILLING_PERIOD_UNIT_ID->Show();
        $this->VALID_FROM->Show();
        $this->UPDATE_DATE->Show();
        $this->DESCRIPTION->Show();
        $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Show();
        $this->BILL_PERIOD_UNIT_CODE->Show();
        $this->DatePicker_UPDATE_DATE1->Show();
        $this->VALID_TO->Show();
        $this->DatePicker_UPDATE_DATE2->Show();
        $this->UPDATE_BY->Show();
        $this->P_BUNDLED_FEATURE_ID->Show();
        $this->P_RECURR_TARIFF_SCENARIO_ID->Show();
        $this->P_SERVICE_TYPE_ID->Show();
        $this->SUB_QTY_FROM->Show();
        $this->SUB_QTY_TO->Show();
        $this->BILLING_UNIT->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End V_P_BUNDLED_FEATURE1 Class @39-FCB6E20C

class clsV_P_BUNDLED_FEATURE1DataSource extends clsDBConn {  //V_P_BUNDLED_FEATURE1DataSource Class @39-4EE624C0

//DataSource Variables @39-DAFC4AD0
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
    var $RECU_TARIFF_SCEN_CODE;
    var $P_BILLING_PERIOD_UNIT_ID;
    var $VALID_FROM;
    var $UPDATE_DATE;
    var $DESCRIPTION;
    var $P_RECU_TARIFF_BUNDLED_FEAT_ID;
    var $BILL_PERIOD_UNIT_CODE;
    var $VALID_TO;
    var $UPDATE_BY;
    var $P_BUNDLED_FEATURE_ID;
    var $P_RECURR_TARIFF_SCENARIO_ID;
    var $P_SERVICE_TYPE_ID;
    var $SUB_QTY_FROM;
    var $SUB_QTY_TO;
    var $BILLING_UNIT;
//End DataSource Variables

//DataSourceClass_Initialize Event @39-369977CB
    function clsV_P_BUNDLED_FEATURE1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record V_P_BUNDLED_FEATURE1/Error";
        $this->Initialize();
        $this->RECU_TARIFF_SCEN_CODE = new clsField("RECU_TARIFF_SCEN_CODE", ccsText, "");
        
        $this->P_BILLING_PERIOD_UNIT_ID = new clsField("P_BILLING_PERIOD_UNIT_ID", ccsFloat, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->P_RECU_TARIFF_BUNDLED_FEAT_ID = new clsField("P_RECU_TARIFF_BUNDLED_FEAT_ID", ccsFloat, "");
        
        $this->BILL_PERIOD_UNIT_CODE = new clsField("BILL_PERIOD_UNIT_CODE", ccsText, "");
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->P_BUNDLED_FEATURE_ID = new clsField("P_BUNDLED_FEATURE_ID", ccsFloat, "");
        
        $this->P_RECURR_TARIFF_SCENARIO_ID = new clsField("P_RECURR_TARIFF_SCENARIO_ID", ccsFloat, "");
        
        $this->P_SERVICE_TYPE_ID = new clsField("P_SERVICE_TYPE_ID", ccsFloat, "");
        
        $this->SUB_QTY_FROM = new clsField("SUB_QTY_FROM", ccsFloat, "");
        
        $this->SUB_QTY_TO = new clsField("SUB_QTY_TO", ccsFloat, "");
        
        $this->BILLING_UNIT = new clsField("BILLING_UNIT", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @39-8080AEC9
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_RECU_TARIFF_BUNDLED_FEAT_ID", ccsFloat, "", "", $this->Parameters["urlP_RECU_TARIFF_BUNDLED_FEAT_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_RECU_TARIFF_BUNDLED_FEAT_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @39-EBBFBC36
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_P_RECU_TARIFF_BUNDLED_FEAT {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @39-4BFB6FBE
    function SetValues()
    {
        $this->RECU_TARIFF_SCEN_CODE->SetDBValue($this->f("RECU_TARIFF_SCEN_CODE"));
        $this->P_BILLING_PERIOD_UNIT_ID->SetDBValue(trim($this->f("P_BILLING_PERIOD_UNIT_ID")));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->SetDBValue(trim($this->f("P_RECU_TARIFF_BUNDLED_FEAT_ID")));
        $this->BILL_PERIOD_UNIT_CODE->SetDBValue($this->f("BILL_PERIOD_UNIT_CODE"));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->P_BUNDLED_FEATURE_ID->SetDBValue(trim($this->f("P_BUNDLED_FEATURE_ID")));
        $this->P_RECURR_TARIFF_SCENARIO_ID->SetDBValue(trim($this->f("P_RECURR_TARIFF_SCENARIO_ID")));
        $this->SUB_QTY_FROM->SetDBValue(trim($this->f("SUB_QTY_FROM")));
        $this->SUB_QTY_TO->SetDBValue(trim($this->f("SUB_QTY_TO")));
        $this->BILLING_UNIT->SetDBValue(trim($this->f("BILLING_UNIT")));
    }
//End SetValues Method

//Insert Method @39-0EC6D83A
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_BILLING_PERIOD_UNIT_ID"] = new clsSQLParameter("ctrlP_BILLING_PERIOD_UNIT_ID", ccsFloat, "", "", $this->P_BILLING_PERIOD_UNIT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BUNDLED_FEATURE_ID"] = new clsSQLParameter("ctrlP_BUNDLED_FEATURE_ID", ccsFloat, "", "", $this->P_BUNDLED_FEATURE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_RECURR_TARIFF_SCENARIO_ID"] = new clsSQLParameter("ctrlP_RECURR_TARIFF_SCENARIO_ID", ccsFloat, "", "", $this->P_RECURR_TARIFF_SCENARIO_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUB_QTY_FROM"] = new clsSQLParameter("ctrlSUB_QTY_FROM", ccsFloat, "", "", $this->SUB_QTY_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUB_QTY_TO"] = new clsSQLParameter("ctrlSUB_QTY_TO", ccsFloat, "", "", $this->SUB_QTY_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BILLING_UNIT"] = new clsSQLParameter("ctrlBILLING_UNIT", ccsFloat, "", "", $this->BILLING_UNIT->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue()) and !strlen($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue())) 
            $this->cp["P_BILLING_PERIOD_UNIT_ID"]->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        if (!is_null($this->cp["P_BUNDLED_FEATURE_ID"]->GetValue()) and !strlen($this->cp["P_BUNDLED_FEATURE_ID"]->GetText()) and !is_bool($this->cp["P_BUNDLED_FEATURE_ID"]->GetValue())) 
            $this->cp["P_BUNDLED_FEATURE_ID"]->SetValue($this->P_BUNDLED_FEATURE_ID->GetValue(true));
        if (!is_null($this->cp["P_RECURR_TARIFF_SCENARIO_ID"]->GetValue()) and !strlen($this->cp["P_RECURR_TARIFF_SCENARIO_ID"]->GetText()) and !is_bool($this->cp["P_RECURR_TARIFF_SCENARIO_ID"]->GetValue())) 
            $this->cp["P_RECURR_TARIFF_SCENARIO_ID"]->SetValue($this->P_RECURR_TARIFF_SCENARIO_ID->GetValue(true));
        if (!is_null($this->cp["SUB_QTY_FROM"]->GetValue()) and !strlen($this->cp["SUB_QTY_FROM"]->GetText()) and !is_bool($this->cp["SUB_QTY_FROM"]->GetValue())) 
            $this->cp["SUB_QTY_FROM"]->SetValue($this->SUB_QTY_FROM->GetValue(true));
        if (!is_null($this->cp["SUB_QTY_TO"]->GetValue()) and !strlen($this->cp["SUB_QTY_TO"]->GetText()) and !is_bool($this->cp["SUB_QTY_TO"]->GetValue())) 
            $this->cp["SUB_QTY_TO"]->SetValue($this->SUB_QTY_TO->GetValue(true));
        if (!is_null($this->cp["BILLING_UNIT"]->GetValue()) and !strlen($this->cp["BILLING_UNIT"]->GetText()) and !is_bool($this->cp["BILLING_UNIT"]->GetValue())) 
            $this->cp["BILLING_UNIT"]->SetValue($this->BILLING_UNIT->GetValue(true));
        $this->SQL = "INSERT INTO P_RECU_TARIFF_BUNDLED_FEAT(\n" .
        "P_RECU_TARIFF_BUNDLED_FEAT_ID, \n" .
        "P_BUNDLED_FEATURE_ID, \n" .
        "P_RECURR_TARIFF_SCENARIO_ID, \n" .
        "SUB_QTY_FROM, \n" .
        "SUB_QTY_TO,\n" .
        "VALID_FROM, \n" .
        "VALID_TO, \n" .
        "P_BILLING_PERIOD_UNIT_ID, \n" .
        "BILLING_UNIT,\n" .
        "DESCRIPTION, \n" .
        "UPDATE_DATE, \n" .
        "UPDATE_BY\n" .
        ") VALUES(\n" .
        "GENERATE_ID('BILLDB','P_RECU_TARIFF_BUNDLED_FEAT','P_RECU_TARIFF_BUNDLED_FEAT_ID'),\n" .
        "" . $this->SQLValue($this->cp["P_BUNDLED_FEATURE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["P_RECURR_TARIFF_SCENARIO_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["SUB_QTY_FROM"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["SUB_QTY_TO"]->GetDBValue(), ccsFloat) . ", \n" .
        "'" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "', \n" .
        "'" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "',\n" .
        "" . $this->SQLValue($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["BILLING_UNIT"]->GetDBValue(), ccsFloat) . ",\n" .
        "INITCAP('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "'),\n" .
        "SYSDATE,\n" .
        "'" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        ")";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @39-8BA73522
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BUNDLED_FEATURE_ID"] = new clsSQLParameter("ctrlP_BUNDLED_FEATURE_ID", ccsFloat, "", "", $this->P_BUNDLED_FEATURE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_BILLING_PERIOD_UNIT_ID"] = new clsSQLParameter("ctrlP_BILLING_PERIOD_UNIT_ID", ccsFloat, "", "", $this->P_BILLING_PERIOD_UNIT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"] = new clsSQLParameter("ctrlP_RECU_TARIFF_BUNDLED_FEAT_ID", ccsFloat, "", "", $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_RECURR_TARIFF_SCENARIO_ID"] = new clsSQLParameter("ctrlP_RECURR_TARIFF_SCENARIO_ID", ccsFloat, "", "", $this->P_RECURR_TARIFF_SCENARIO_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUB_QTY_FROM"] = new clsSQLParameter("ctrlSUB_QTY_FROM", ccsFloat, "", "", $this->SUB_QTY_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUB_QTY_TO"] = new clsSQLParameter("ctrlSUB_QTY_TO", ccsFloat, "", "", $this->SUB_QTY_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BILLING_UNIT"] = new clsSQLParameter("ctrlBILLING_UNIT", ccsFloat, "", "", $this->BILLING_UNIT->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["P_BUNDLED_FEATURE_ID"]->GetValue()) and !strlen($this->cp["P_BUNDLED_FEATURE_ID"]->GetText()) and !is_bool($this->cp["P_BUNDLED_FEATURE_ID"]->GetValue())) 
            $this->cp["P_BUNDLED_FEATURE_ID"]->SetValue($this->P_BUNDLED_FEATURE_ID->GetValue(true));
        if (!strlen($this->cp["P_BUNDLED_FEATURE_ID"]->GetText()) and !is_bool($this->cp["P_BUNDLED_FEATURE_ID"]->GetValue(true))) 
            $this->cp["P_BUNDLED_FEATURE_ID"]->SetText(0);
        if (!is_null($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue()) and !strlen($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue())) 
            $this->cp["P_BILLING_PERIOD_UNIT_ID"]->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"]->GetValue()) and !strlen($this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"]->GetText()) and !is_bool($this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"]->GetValue())) 
            $this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"]->SetValue($this->P_RECU_TARIFF_BUNDLED_FEAT_ID->GetValue(true));
        if (!strlen($this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"]->GetText()) and !is_bool($this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"]->GetValue(true))) 
            $this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"]->SetText(0);
        if (!is_null($this->cp["P_RECURR_TARIFF_SCENARIO_ID"]->GetValue()) and !strlen($this->cp["P_RECURR_TARIFF_SCENARIO_ID"]->GetText()) and !is_bool($this->cp["P_RECURR_TARIFF_SCENARIO_ID"]->GetValue())) 
            $this->cp["P_RECURR_TARIFF_SCENARIO_ID"]->SetValue($this->P_RECURR_TARIFF_SCENARIO_ID->GetValue(true));
        if (!is_null($this->cp["SUB_QTY_FROM"]->GetValue()) and !strlen($this->cp["SUB_QTY_FROM"]->GetText()) and !is_bool($this->cp["SUB_QTY_FROM"]->GetValue())) 
            $this->cp["SUB_QTY_FROM"]->SetValue($this->SUB_QTY_FROM->GetValue(true));
        if (!is_null($this->cp["SUB_QTY_TO"]->GetValue()) and !strlen($this->cp["SUB_QTY_TO"]->GetText()) and !is_bool($this->cp["SUB_QTY_TO"]->GetValue())) 
            $this->cp["SUB_QTY_TO"]->SetValue($this->SUB_QTY_TO->GetValue(true));
        if (!is_null($this->cp["BILLING_UNIT"]->GetValue()) and !strlen($this->cp["BILLING_UNIT"]->GetText()) and !is_bool($this->cp["BILLING_UNIT"]->GetValue())) 
            $this->cp["BILLING_UNIT"]->SetValue($this->BILLING_UNIT->GetValue(true));
        $this->SQL = "UPDATE P_RECU_TARIFF_BUNDLED_FEAT SET \n" .
        "P_BILLING_PERIOD_UNIT_ID=" . $this->SQLValue($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "VALID_FROM='" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "', \n" .
        "UPDATE_DATE=SYSDATE, \n" .
        "DESCRIPTION=INITCAP('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "'),   \n" .
        "VALID_TO='" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "', \n" .
        "UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "', \n" .
        "P_BUNDLED_FEATURE_ID=" . $this->SQLValue($this->cp["P_BUNDLED_FEATURE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_RECURR_TARIFF_SCENARIO_ID=" . $this->SQLValue($this->cp["P_RECURR_TARIFF_SCENARIO_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "SUB_QTY_FROM=" . $this->SQLValue($this->cp["SUB_QTY_FROM"]->GetDBValue(), ccsFloat) . ", \n" .
        "SUB_QTY_TO=" . $this->SQLValue($this->cp["SUB_QTY_TO"]->GetDBValue(), ccsFloat) . ", \n" .
        "BILLING_UNIT=" . $this->SQLValue($this->cp["BILLING_UNIT"]->GetDBValue(), ccsFloat) . " \n" .
        "WHERE  \n" .
        "P_RECU_TARIFF_BUNDLED_FEAT_ID = " . $this->SQLValue($this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @39-930FFB1E
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM V_P_RECU_TARIFF_BUNDLED_FEAT";
        $this->SQL = CCBuildSQL($this->SQL, $this->Where, "");
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End V_P_BUNDLED_FEATURE1DataSource Class @39-FCB6E20C

//Initialize Page @1-F0E36BA2
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
$TemplateFileName = "p_bundled_tariff_act.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-89666433
include_once("./p_bundled_tariff_act_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-0A899A47
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$V_P_BUNDLED_FEATURE1 = & new clsRecordV_P_BUNDLED_FEATURE1("", $MainPage);
$MainPage->V_P_BUNDLED_FEATURE1 = & $V_P_BUNDLED_FEATURE1;
$V_P_BUNDLED_FEATURE1->Initialize();

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

//Execute Components @1-36840161
$V_P_BUNDLED_FEATURE1->Operation();
//End Execute Components

//Go to destination page @1-C9C71FF8
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($V_P_BUNDLED_FEATURE1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-D8820601
$V_P_BUNDLED_FEATURE1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-31BD130D
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($V_P_BUNDLED_FEATURE1);
unset($Tpl);
//End Unload Page


?>
