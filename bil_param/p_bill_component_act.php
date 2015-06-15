<?php
//Include Common Files @1-A013972E
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_bill_component_act.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordBill_CompRecord { //Bill_CompRecord Class @39-FB60D542

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

//Class_Initialize Event @39-9FDBB487
    function clsRecordBill_CompRecord($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record Bill_CompRecord/Error";
        $this->DataSource = new clsBill_CompRecordDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "Bill_CompRecord";
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
            $this->BILL_COMPONENT_CODE = & new clsControl(ccsTextBox, "BILL_COMPONENT_CODE", "RECU_TARIFF_SCEN_CODE", ccsText, "", CCGetRequestParam("BILL_COMPONENT_CODE", $Method, NULL), $this);
            $this->BILL_COMPONENT_CODE->Required = true;
            $this->P_CURRENCY_ID = & new clsControl(ccsTextBox, "P_CURRENCY_ID", "P_SERVICE_TYPE_ID", ccsFloat, "", CCGetRequestParam("P_CURRENCY_ID", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->P_RECU_TARIFF_BUNDLED_FEAT_ID = & new clsControl(ccsTextBox, "P_RECU_TARIFF_BUNDLED_FEAT_ID", "P_RECU_TARIFF_BUNDLED_FEAT_ID", ccsFloat, "", CCGetRequestParam("P_RECU_TARIFF_BUNDLED_FEAT_ID", $Method, NULL), $this);
            $this->CURRENCY_CODE = & new clsControl(ccsTextBox, "CURRENCY_CODE", "Service Type Code", ccsText, "", CCGetRequestParam("CURRENCY_CODE", $Method, NULL), $this);
            $this->CURRENCY_CODE->Required = true;
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->P_BILL_COMPONENT_ID = & new clsControl(ccsTextBox, "P_BILL_COMPONENT_ID", "P_BILL_COMPONENT_ID", ccsFloat, "", CCGetRequestParam("P_BILL_COMPONENT_ID", $Method, NULL), $this);
            $this->P_RT_BUND_FEAT_BILL_COMP_ID = & new clsControl(ccsTextBox, "P_RT_BUND_FEAT_BILL_COMP_ID", "P_RT_BUND_FEAT_BILL_COMP_ID", ccsFloat, "", CCGetRequestParam("P_RT_BUND_FEAT_BILL_COMP_ID", $Method, NULL), $this);
            $this->CHARGE_AMOUNT = & new clsControl(ccsTextBox, "CHARGE_AMOUNT", "Charge Amount", ccsFloat, "", CCGetRequestParam("CHARGE_AMOUNT", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @39-473BD4A2
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_RT_BUND_FEAT_BILL_COMP_ID"] = CCGetFromGet("P_RT_BUND_FEAT_BILL_COMP_ID", NULL);
    }
//End Initialize Method

//Validate Method @39-38CC5150
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->BILL_COMPONENT_CODE->Validate() && $Validation);
        $Validation = ($this->P_CURRENCY_ID->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Validate() && $Validation);
        $Validation = ($this->CURRENCY_CODE->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->P_BILL_COMPONENT_ID->Validate() && $Validation);
        $Validation = ($this->P_RT_BUND_FEAT_BILL_COMP_ID->Validate() && $Validation);
        $Validation = ($this->CHARGE_AMOUNT->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->BILL_COMPONENT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CURRENCY_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CURRENCY_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILL_COMPONENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_RT_BUND_FEAT_BILL_COMP_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CHARGE_AMOUNT->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @39-A17C141C
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->BILL_COMPONENT_CODE->Errors->Count());
        $errors = ($errors || $this->P_CURRENCY_ID->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Errors->Count());
        $errors = ($errors || $this->CURRENCY_CODE->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->P_BILL_COMPONENT_ID->Errors->Count());
        $errors = ($errors || $this->P_RT_BUND_FEAT_BILL_COMP_ID->Errors->Count());
        $errors = ($errors || $this->CHARGE_AMOUNT->Errors->Count());
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

//InsertRow Method @39-D4219098
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->P_CURRENCY_ID->SetValue($this->P_CURRENCY_ID->GetValue(true));
        $this->DataSource->P_RECU_TARIFF_BUNDLED_FEAT_ID->SetValue($this->P_RECU_TARIFF_BUNDLED_FEAT_ID->GetValue(true));
        $this->DataSource->P_BILL_COMPONENT_ID->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        $this->DataSource->P_RT_BUND_FEAT_BILL_COMP_ID->SetValue($this->P_RT_BUND_FEAT_BILL_COMP_ID->GetValue(true));
        $this->DataSource->CHARGE_AMOUNT->SetValue($this->CHARGE_AMOUNT->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @39-960D6A8A
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->BILL_COMPONENT_CODE->SetValue($this->BILL_COMPONENT_CODE->GetValue(true));
        $this->DataSource->P_CURRENCY_ID->SetValue($this->P_CURRENCY_ID->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CURRENCY_CODE->SetValue($this->CURRENCY_CODE->GetValue(true));
        $this->DataSource->P_BILL_COMPONENT_ID->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        $this->DataSource->P_RT_BUND_FEAT_BILL_COMP_ID->SetValue($this->P_RT_BUND_FEAT_BILL_COMP_ID->GetValue(true));
        $this->DataSource->CHARGE_AMOUNT->SetValue($this->CHARGE_AMOUNT->GetValue(true));
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

//Show Method @39-7688A679
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
                    $this->BILL_COMPONENT_CODE->SetValue($this->DataSource->BILL_COMPONENT_CODE->GetValue());
                    $this->P_CURRENCY_ID->SetValue($this->DataSource->P_CURRENCY_ID->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->CURRENCY_CODE->SetValue($this->DataSource->CURRENCY_CODE->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->P_BILL_COMPONENT_ID->SetValue($this->DataSource->P_BILL_COMPONENT_ID->GetValue());
                    $this->P_RT_BUND_FEAT_BILL_COMP_ID->SetValue($this->DataSource->P_RT_BUND_FEAT_BILL_COMP_ID->GetValue());
                    $this->CHARGE_AMOUNT->SetValue($this->DataSource->CHARGE_AMOUNT->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->BILL_COMPONENT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CURRENCY_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CURRENCY_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILL_COMPONENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_RT_BUND_FEAT_BILL_COMP_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CHARGE_AMOUNT->Errors->ToString());
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
        $this->BILL_COMPONENT_CODE->Show();
        $this->P_CURRENCY_ID->Show();
        $this->UPDATE_DATE->Show();
        $this->DESCRIPTION->Show();
        $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Show();
        $this->CURRENCY_CODE->Show();
        $this->UPDATE_BY->Show();
        $this->P_BILL_COMPONENT_ID->Show();
        $this->P_RT_BUND_FEAT_BILL_COMP_ID->Show();
        $this->CHARGE_AMOUNT->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End Bill_CompRecord Class @39-FCB6E20C

class clsBill_CompRecordDataSource extends clsDBConn {  //Bill_CompRecordDataSource Class @39-F22458B8

//DataSource Variables @39-7970D93E
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
    var $BILL_COMPONENT_CODE;
    var $P_CURRENCY_ID;
    var $UPDATE_DATE;
    var $DESCRIPTION;
    var $P_RECU_TARIFF_BUNDLED_FEAT_ID;
    var $CURRENCY_CODE;
    var $UPDATE_BY;
    var $P_BILL_COMPONENT_ID;
    var $P_RT_BUND_FEAT_BILL_COMP_ID;
    var $CHARGE_AMOUNT;
//End DataSource Variables

//DataSourceClass_Initialize Event @39-E19C7B23
    function clsBill_CompRecordDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record Bill_CompRecord/Error";
        $this->Initialize();
        $this->BILL_COMPONENT_CODE = new clsField("BILL_COMPONENT_CODE", ccsText, "");
        
        $this->P_CURRENCY_ID = new clsField("P_CURRENCY_ID", ccsFloat, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->P_RECU_TARIFF_BUNDLED_FEAT_ID = new clsField("P_RECU_TARIFF_BUNDLED_FEAT_ID", ccsFloat, "");
        
        $this->CURRENCY_CODE = new clsField("CURRENCY_CODE", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->P_BILL_COMPONENT_ID = new clsField("P_BILL_COMPONENT_ID", ccsFloat, "");
        
        $this->P_RT_BUND_FEAT_BILL_COMP_ID = new clsField("P_RT_BUND_FEAT_BILL_COMP_ID", ccsFloat, "");
        
        $this->CHARGE_AMOUNT = new clsField("CHARGE_AMOUNT", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @39-11E5318A
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_RT_BUND_FEAT_BILL_COMP_ID", ccsFloat, "", "", $this->Parameters["urlP_RT_BUND_FEAT_BILL_COMP_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_RT_BUND_FEAT_BILL_COMP_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @39-FCCFD680
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_P_RT_BUND_FEAT_BILL_COMP {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @39-DEE2584C
    function SetValues()
    {
        $this->BILL_COMPONENT_CODE->SetDBValue($this->f("BILL_COMPONENT_CODE"));
        $this->P_CURRENCY_ID->SetDBValue(trim($this->f("P_CURRENCY_ID")));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CURRENCY_CODE->SetDBValue($this->f("CURRENCY_CODE"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->P_BILL_COMPONENT_ID->SetDBValue(trim($this->f("P_BILL_COMPONENT_ID")));
        $this->P_RT_BUND_FEAT_BILL_COMP_ID->SetDBValue(trim($this->f("P_RT_BUND_FEAT_BILL_COMP_ID")));
        $this->CHARGE_AMOUNT->SetDBValue(trim($this->f("CHARGE_AMOUNT")));
    }
//End SetValues Method

//Insert Method @39-A664BA51
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["P_CURRENCY_ID"] = new clsSQLParameter("ctrlP_CURRENCY_ID", ccsFloat, "", "", $this->P_CURRENCY_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"] = new clsSQLParameter("ctrlP_RECU_TARIFF_BUNDLED_FEAT_ID", ccsFloat, "", "", $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILL_COMPONENT_ID"] = new clsSQLParameter("ctrlP_BILL_COMPONENT_ID", ccsFloat, "", "", $this->P_BILL_COMPONENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_RT_BUND_FEAT_BILL_COMP_ID"] = new clsSQLParameter("ctrlP_RT_BUND_FEAT_BILL_COMP_ID", ccsFloat, "", "", $this->P_RT_BUND_FEAT_BILL_COMP_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CHARGE_AMOUNT"] = new clsSQLParameter("ctrlCHARGE_AMOUNT", ccsFloat, "", "", $this->CHARGE_AMOUNT->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["P_CURRENCY_ID"]->GetValue()) and !strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue())) 
            $this->cp["P_CURRENCY_ID"]->SetValue($this->P_CURRENCY_ID->GetValue(true));
        if (!is_null($this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"]->GetValue()) and !strlen($this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"]->GetText()) and !is_bool($this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"]->GetValue())) 
            $this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"]->SetValue($this->P_RECU_TARIFF_BUNDLED_FEAT_ID->GetValue(true));
        if (!is_null($this->cp["P_BILL_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        if (!is_null($this->cp["P_RT_BUND_FEAT_BILL_COMP_ID"]->GetValue()) and !strlen($this->cp["P_RT_BUND_FEAT_BILL_COMP_ID"]->GetText()) and !is_bool($this->cp["P_RT_BUND_FEAT_BILL_COMP_ID"]->GetValue())) 
            $this->cp["P_RT_BUND_FEAT_BILL_COMP_ID"]->SetValue($this->P_RT_BUND_FEAT_BILL_COMP_ID->GetValue(true));
        if (!is_null($this->cp["CHARGE_AMOUNT"]->GetValue()) and !strlen($this->cp["CHARGE_AMOUNT"]->GetText()) and !is_bool($this->cp["CHARGE_AMOUNT"]->GetValue())) 
            $this->cp["CHARGE_AMOUNT"]->SetValue($this->CHARGE_AMOUNT->GetValue(true));
        $this->SQL = "INSERT INTO P_RT_BUND_FEAT_BILL_COMP(\n" .
        " P_RT_BUND_FEAT_BILL_COMP_ID,\n" .
        " P_RECU_TARIFF_BUNDLED_FEAT_ID,\n" .
        " P_BILL_COMPONENT_ID,\n" .
        " P_CURRENCY_ID, \n" .
        " CHARGE_AMOUNT,\n" .
        " DESCRIPTION, \n" .
        " UPDATE_DATE, \n" .
        " UPDATE_BY\n" .
        " ) \n" .
        " VALUES(\n" .
        " GENERATE_ID('BILLDB','P_RT_BUND_FEAT_BILL_COMP','P_RT_BUND_FEAT_BILL_COMP_ID'),\n" .
        " " . $this->SQLValue($this->cp["P_RECU_TARIFF_BUNDLED_FEAT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        " " . $this->SQLValue($this->cp["P_BILL_COMPONENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        " " . $this->SQLValue($this->cp["P_CURRENCY_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        " " . $this->SQLValue($this->cp["CHARGE_AMOUNT"]->GetDBValue(), ccsFloat) . ",\n" .
        " INITCAP('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "'), \n" .
        "  SYSDATE,\n" .
        " '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        " )";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @39-DC9126B7
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["BILL_COMPONENT_CODE"] = new clsSQLParameter("ctrlBILL_COMPONENT_CODE", ccsText, "", "", $this->BILL_COMPONENT_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CURRENCY_ID"] = new clsSQLParameter("ctrlP_CURRENCY_ID", ccsFloat, "", "", $this->P_CURRENCY_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CURRENCY_CODE"] = new clsSQLParameter("ctrlCURRENCY_CODE", ccsText, "", "", $this->CURRENCY_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["P_BILL_COMPONENT_ID"] = new clsSQLParameter("ctrlP_BILL_COMPONENT_ID", ccsFloat, "", "", $this->P_BILL_COMPONENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_RT_BUND_FEAT_BILL_COMP_ID"] = new clsSQLParameter("ctrlP_RT_BUND_FEAT_BILL_COMP_ID", ccsFloat, "", "", $this->P_RT_BUND_FEAT_BILL_COMP_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["CHARGE_AMOUNT"] = new clsSQLParameter("ctrlCHARGE_AMOUNT", ccsFloat, "", "", $this->CHARGE_AMOUNT->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["BILL_COMPONENT_CODE"]->GetValue()) and !strlen($this->cp["BILL_COMPONENT_CODE"]->GetText()) and !is_bool($this->cp["BILL_COMPONENT_CODE"]->GetValue())) 
            $this->cp["BILL_COMPONENT_CODE"]->SetValue($this->BILL_COMPONENT_CODE->GetValue(true));
        if (!is_null($this->cp["P_CURRENCY_ID"]->GetValue()) and !strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue())) 
            $this->cp["P_CURRENCY_ID"]->SetValue($this->P_CURRENCY_ID->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["CURRENCY_CODE"]->GetValue()) and !strlen($this->cp["CURRENCY_CODE"]->GetText()) and !is_bool($this->cp["CURRENCY_CODE"]->GetValue())) 
            $this->cp["CURRENCY_CODE"]->SetValue($this->CURRENCY_CODE->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["P_BILL_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        if (!is_null($this->cp["P_RT_BUND_FEAT_BILL_COMP_ID"]->GetValue()) and !strlen($this->cp["P_RT_BUND_FEAT_BILL_COMP_ID"]->GetText()) and !is_bool($this->cp["P_RT_BUND_FEAT_BILL_COMP_ID"]->GetValue())) 
            $this->cp["P_RT_BUND_FEAT_BILL_COMP_ID"]->SetValue($this->P_RT_BUND_FEAT_BILL_COMP_ID->GetValue(true));
        if (!strlen($this->cp["P_RT_BUND_FEAT_BILL_COMP_ID"]->GetText()) and !is_bool($this->cp["P_RT_BUND_FEAT_BILL_COMP_ID"]->GetValue(true))) 
            $this->cp["P_RT_BUND_FEAT_BILL_COMP_ID"]->SetText(0);
        if (!is_null($this->cp["CHARGE_AMOUNT"]->GetValue()) and !strlen($this->cp["CHARGE_AMOUNT"]->GetText()) and !is_bool($this->cp["CHARGE_AMOUNT"]->GetValue())) 
            $this->cp["CHARGE_AMOUNT"]->SetValue($this->CHARGE_AMOUNT->GetValue(true));
        $this->SQL = "UPDATE P_RT_BUND_FEAT_BILL_COMP SET \n" .
        "P_CURRENCY_ID=" . $this->SQLValue($this->cp["P_CURRENCY_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "UPDATE_DATE=SYSDATE, \n" .
        "DESCRIPTION=INITCAP('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "'), \n" .
        " UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "', \n" .
        "P_BILL_COMPONENT_ID=" . $this->SQLValue($this->cp["P_BILL_COMPONENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "CHARGE_AMOUNT=" . $this->SQLValue($this->cp["CHARGE_AMOUNT"]->GetDBValue(), ccsFloat) . " \n" .
        "WHERE  \n" .
        "P_RT_BUND_FEAT_BILL_COMP_ID = " . $this->SQLValue($this->cp["P_RT_BUND_FEAT_BILL_COMP_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @39-9585EC44
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM V_P_RT_BUND_FEAT_BILL_COMP";
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

} //End Bill_CompRecordDataSource Class @39-FCB6E20C

//Initialize Page @1-674D7AA2
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
$TemplateFileName = "p_bill_component_act.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-B4A51EA0
include_once("./p_bill_component_act_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-0E252A98
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$Bill_CompRecord = & new clsRecordBill_CompRecord("", $MainPage);
$MainPage->Bill_CompRecord = & $Bill_CompRecord;
$Bill_CompRecord->Initialize();

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

//Execute Components @1-7058DE38
$Bill_CompRecord->Operation();
//End Execute Components

//Go to destination page @1-A5F4F455
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($Bill_CompRecord);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-35CFCD2F
$Bill_CompRecord->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-73F585EE
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($Bill_CompRecord);
unset($Tpl);
//End Unload Page


?>
