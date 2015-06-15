<?php
//Include Common Files @1-E85CCA6E
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_data/");
define("FileName", "sub_promo_form.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordV_SUBS_OT_PROMO_SERVICE1 { //V_SUBS_OT_PROMO_SERVICE1 Class @2-EE1C1506

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

//Class_Initialize Event @2-B10DC695
    function clsRecordV_SUBS_OT_PROMO_SERVICE1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_SUBS_OT_PROMO_SERVICE1/Error";
        $this->DataSource = new clsV_SUBS_OT_PROMO_SERVICE1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_SUBS_OT_PROMO_SERVICE1";
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
            $this->SUBSCRIBER_ID = & new clsControl(ccsTextBox, "SUBSCRIBER_ID", "SUBSCRIBER ID", ccsFloat, "", CCGetRequestParam("SUBSCRIBER_ID", $Method, NULL), $this);
            $this->SUBSCRIBER_ID->Required = true;
            $this->P_ONETIME_PROMOTION_ID = & new clsControl(ccsTextBox, "P_ONETIME_PROMOTION_ID", "P ONETIME PROMOTION ID", ccsFloat, "", CCGetRequestParam("P_ONETIME_PROMOTION_ID", $Method, NULL), $this);
            $this->P_ONETIME_PROMOTION_ID->Required = true;
            $this->PROMOTION_DATE = & new clsControl(ccsTextBox, "PROMOTION_DATE", "PROMOTION DATE", ccsDate, $DefaultDateFormat, CCGetRequestParam("PROMOTION_DATE", $Method, NULL), $this);
            $this->PROMOTION_DATE->Required = true;
            $this->DatePicker_PROMOTION_DATE = & new clsDatePicker("DatePicker_PROMOTION_DATE", "V_SUBS_OT_PROMO_SERVICE1", "PROMOTION_DATE", $this);
            $this->DESCRIPTION = & new clsControl(ccsTextBox, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, $DefaultDateFormat, CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->DatePicker_UPDATE_DATE = & new clsDatePicker("DatePicker_UPDATE_DATE", "V_SUBS_OT_PROMO_SERVICE1", "UPDATE_DATE", $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->OT_PROMO_CODE = & new clsControl(ccsTextBox, "OT_PROMO_CODE", "OT PROMO CODE", ccsText, "", CCGetRequestParam("OT_PROMO_CODE", $Method, NULL), $this);
            $this->OT_PROMO_CODE->Required = true;
        }
    }
//End Class_Initialize Event

//Initialize Method @2-88470A27
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlSUBS_OT_PROMO_SERVICE_ID"] = CCGetFromGet("SUBS_OT_PROMO_SERVICE_ID", NULL);
    }
//End Initialize Method

//Validate Method @2-257EA73F
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->SUBSCRIBER_ID->Validate() && $Validation);
        $Validation = ($this->P_ONETIME_PROMOTION_ID->Validate() && $Validation);
        $Validation = ($this->PROMOTION_DATE->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->OT_PROMO_CODE->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->SUBSCRIBER_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_ONETIME_PROMOTION_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PROMOTION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OT_PROMO_CODE->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-76D35743
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->SUBSCRIBER_ID->Errors->Count());
        $errors = ($errors || $this->P_ONETIME_PROMOTION_ID->Errors->Count());
        $errors = ($errors || $this->PROMOTION_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_PROMOTION_DATE->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->OT_PROMO_CODE->Errors->Count());
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

//Operation Method @2-288F0419
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
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
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

//InsertRow Method @2-147A5FF6
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->SUBSCRIBER_ID->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        $this->DataSource->P_ONETIME_PROMOTION_ID->SetValue($this->P_ONETIME_PROMOTION_ID->GetValue(true));
        $this->DataSource->PROMOTION_DATE->SetValue($this->PROMOTION_DATE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->OT_PROMO_CODE->SetValue($this->OT_PROMO_CODE->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @2-5241991C
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->SUBSCRIBER_ID->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        $this->DataSource->P_ONETIME_PROMOTION_ID->SetValue($this->P_ONETIME_PROMOTION_ID->GetValue(true));
        $this->DataSource->PROMOTION_DATE->SetValue($this->PROMOTION_DATE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->OT_PROMO_CODE->SetValue($this->OT_PROMO_CODE->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @2-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @2-0D1E01FD
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
                    $this->SUBSCRIBER_ID->SetValue($this->DataSource->SUBSCRIBER_ID->GetValue());
                    $this->P_ONETIME_PROMOTION_ID->SetValue($this->DataSource->P_ONETIME_PROMOTION_ID->GetValue());
                    $this->PROMOTION_DATE->SetValue($this->DataSource->PROMOTION_DATE->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->OT_PROMO_CODE->SetValue($this->DataSource->OT_PROMO_CODE->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->SUBSCRIBER_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_ONETIME_PROMOTION_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PROMOTION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_PROMOTION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OT_PROMO_CODE->Errors->ToString());
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
        $this->SUBSCRIBER_ID->Show();
        $this->P_ONETIME_PROMOTION_ID->Show();
        $this->PROMOTION_DATE->Show();
        $this->DatePicker_PROMOTION_DATE->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_DATE->Show();
        $this->DatePicker_UPDATE_DATE->Show();
        $this->UPDATE_BY->Show();
        $this->OT_PROMO_CODE->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End V_SUBS_OT_PROMO_SERVICE1 Class @2-FCB6E20C

class clsV_SUBS_OT_PROMO_SERVICE1DataSource extends clsDBConn {  //V_SUBS_OT_PROMO_SERVICE1DataSource Class @2-B696900C

//DataSource Variables @2-9C333A06
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

    var $InsertFields = array();
    var $UpdateFields = array();

    // Datasource fields
    var $SUBSCRIBER_ID;
    var $P_ONETIME_PROMOTION_ID;
    var $PROMOTION_DATE;
    var $DESCRIPTION;
    var $UPDATE_DATE;
    var $UPDATE_BY;
    var $OT_PROMO_CODE;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-487C715A
    function clsV_SUBS_OT_PROMO_SERVICE1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record V_SUBS_OT_PROMO_SERVICE1/Error";
        $this->Initialize();
        $this->SUBSCRIBER_ID = new clsField("SUBSCRIBER_ID", ccsFloat, "");
        
        $this->P_ONETIME_PROMOTION_ID = new clsField("P_ONETIME_PROMOTION_ID", ccsFloat, "");
        
        $this->PROMOTION_DATE = new clsField("PROMOTION_DATE", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->OT_PROMO_CODE = new clsField("OT_PROMO_CODE", ccsText, "");
        

        $this->InsertFields["SUBSCRIBER_ID"] = array("Name" => "SUBSCRIBER_ID", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["P_ONETIME_PROMOTION_ID"] = array("Name" => "P_ONETIME_PROMOTION_ID", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["PROMOTION_DATE"] = array("Name" => "PROMOTION_DATE", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["DESCRIPTION"] = array("Name" => "DESCRIPTION", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["UPDATE_DATE"] = array("Name" => "UPDATE_DATE", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["UPDATE_BY"] = array("Name" => "UPDATE_BY", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["OT_PROMO_CODE"] = array("Name" => "OT_PROMO_CODE", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SUBSCRIBER_ID"] = array("Name" => "SUBSCRIBER_ID", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["P_ONETIME_PROMOTION_ID"] = array("Name" => "P_ONETIME_PROMOTION_ID", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["PROMOTION_DATE"] = array("Name" => "PROMOTION_DATE", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["DESCRIPTION"] = array("Name" => "DESCRIPTION", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["UPDATE_DATE"] = array("Name" => "UPDATE_DATE", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["UPDATE_BY"] = array("Name" => "UPDATE_BY", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["OT_PROMO_CODE"] = array("Name" => "OT_PROMO_CODE", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-52B10236
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlSUBS_OT_PROMO_SERVICE_ID", ccsFloat, "", "", $this->Parameters["urlSUBS_OT_PROMO_SERVICE_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "SUBS_OT_PROMO_SERVICE_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-69EA8703
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_SUBS_OT_PROMO_SERVICE {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-86CEDF64
    function SetValues()
    {
        $this->SUBSCRIBER_ID->SetDBValue(trim($this->f("SUBSCRIBER_ID")));
        $this->P_ONETIME_PROMOTION_ID->SetDBValue(trim($this->f("P_ONETIME_PROMOTION_ID")));
        $this->PROMOTION_DATE->SetDBValue(trim($this->f("PROMOTION_DATE")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->OT_PROMO_CODE->SetDBValue($this->f("OT_PROMO_CODE"));
    }
//End SetValues Method

//Insert Method @2-C8DDD23B
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["SUBSCRIBER_ID"]["Value"] = $this->SUBSCRIBER_ID->GetDBValue(true);
        $this->InsertFields["P_ONETIME_PROMOTION_ID"]["Value"] = $this->P_ONETIME_PROMOTION_ID->GetDBValue(true);
        $this->InsertFields["PROMOTION_DATE"]["Value"] = $this->PROMOTION_DATE->GetDBValue(true);
        $this->InsertFields["DESCRIPTION"]["Value"] = $this->DESCRIPTION->GetDBValue(true);
        $this->InsertFields["UPDATE_DATE"]["Value"] = $this->UPDATE_DATE->GetDBValue(true);
        $this->InsertFields["UPDATE_BY"]["Value"] = $this->UPDATE_BY->GetDBValue(true);
        $this->InsertFields["OT_PROMO_CODE"]["Value"] = $this->OT_PROMO_CODE->GetDBValue(true);
        $this->SQL = CCBuildInsert("V_SUBS_OT_PROMO_SERVICE", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @2-BE3984B6
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["SUBSCRIBER_ID"]["Value"] = $this->SUBSCRIBER_ID->GetDBValue(true);
        $this->UpdateFields["P_ONETIME_PROMOTION_ID"]["Value"] = $this->P_ONETIME_PROMOTION_ID->GetDBValue(true);
        $this->UpdateFields["PROMOTION_DATE"]["Value"] = $this->PROMOTION_DATE->GetDBValue(true);
        $this->UpdateFields["DESCRIPTION"]["Value"] = $this->DESCRIPTION->GetDBValue(true);
        $this->UpdateFields["UPDATE_DATE"]["Value"] = $this->UPDATE_DATE->GetDBValue(true);
        $this->UpdateFields["UPDATE_BY"]["Value"] = $this->UPDATE_BY->GetDBValue(true);
        $this->UpdateFields["OT_PROMO_CODE"]["Value"] = $this->OT_PROMO_CODE->GetDBValue(true);
        $this->SQL = CCBuildUpdate("V_SUBS_OT_PROMO_SERVICE", $this->UpdateFields, $this);
        $this->SQL .= strlen($this->Where) ? " WHERE " . $this->Where : $this->Where;
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @2-E293CFAD
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM V_SUBS_OT_PROMO_SERVICE";
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

} //End V_SUBS_OT_PROMO_SERVICE1DataSource Class @2-FCB6E20C

//Initialize Page @1-F575BCD7
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
$TemplateFileName = "sub_promo_form.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-D10B7D9B
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$V_SUBS_OT_PROMO_SERVICE1 = & new clsRecordV_SUBS_OT_PROMO_SERVICE1("", $MainPage);
$MainPage->V_SUBS_OT_PROMO_SERVICE1 = & $V_SUBS_OT_PROMO_SERVICE1;
$V_SUBS_OT_PROMO_SERVICE1->Initialize();

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

//Execute Components @1-C2DE6903
$V_SUBS_OT_PROMO_SERVICE1->Operation();
//End Execute Components

//Go to destination page @1-327BB788
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($V_SUBS_OT_PROMO_SERVICE1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-6617C5F1
$V_SUBS_OT_PROMO_SERVICE1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-56DE5555
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($V_SUBS_OT_PROMO_SERVICE1);
unset($Tpl);
//End Unload Page


?>
