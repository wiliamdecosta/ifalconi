<?php
//Include Common Files @1-E1C5C065
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_data/");
define("FileName", "subscriber_feature_form.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

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

class clsRecordV_SUBSCRIBER_FEAT { //V_SUBSCRIBER_FEAT Class @110-7FCE84DA

//Variables @110-D6FF3E86

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

//Class_Initialize Event @110-F66118E0
    function clsRecordV_SUBSCRIBER_FEAT($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_SUBSCRIBER_FEAT/Error";
        $this->DataSource = new clsV_SUBSCRIBER_FEATDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_SUBSCRIBER_FEAT";
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
            $this->P_SERVICE_CATEGORY_ID = & new clsControl(ccsTextBox, "P_SERVICE_CATEGORY_ID", "P SERVICE CATEGORY", ccsFloat, "", CCGetRequestParam("P_SERVICE_CATEGORY_ID", $Method, NULL), $this);
            $this->ACTIVE_DATE = & new clsControl(ccsTextBox, "ACTIVE_DATE", "ACTIVE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("ACTIVE_DATE", $Method, NULL), $this);
            $this->TERMINATION_DATE = & new clsControl(ccsTextBox, "TERMINATION_DATE", "TERMINATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("TERMINATION_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->BUNDLED_FEATURE_CODE = & new clsControl(ccsTextBox, "BUNDLED_FEATURE_CODE", "BUNDLED FEATURE", ccsText, "", CCGetRequestParam("BUNDLED_FEATURE_CODE", $Method, NULL), $this);
            $this->FEATURE_PROMO_CODE = & new clsControl(ccsTextBox, "FEATURE_PROMO_CODE", "FEATURE PROMO", ccsText, "", CCGetRequestParam("FEATURE_PROMO_CODE", $Method, NULL), $this);
            $this->FEATURE_TYPE_CODE = & new clsControl(ccsTextBox, "FEATURE_TYPE_CODE", "FEATURE TYPE", ccsText, "", CCGetRequestParam("FEATURE_TYPE_CODE", $Method, NULL), $this);
            $this->FEATURE_TYPE_CODE->Required = true;
            $this->DatePicker_ACTIVE_DATE = & new clsDatePicker("DatePicker_ACTIVE_DATE", "V_SUBSCRIBER_FEAT", "ACTIVE_DATE", $this);
            $this->DatePicker_TERMINATION_DATE = & new clsDatePicker("DatePicker_TERMINATION_DATE", "V_SUBSCRIBER_FEAT", "TERMINATION_DATE", $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->SUBSCRIBER_FEATURE_ID = & new clsControl(ccsHidden, "SUBSCRIBER_FEATURE_ID", "SUBSCRIBER_FEATURE_ID", ccsText, "", CCGetRequestParam("SUBSCRIBER_FEATURE_ID", $Method, NULL), $this);
            $this->P_SERVICE_TYPE_ID = & new clsControl(ccsTextBox, "P_SERVICE_TYPE_ID", "P_SERVICE_TYPE_ID", ccsFloat, "", CCGetRequestParam("P_SERVICE_TYPE_ID", $Method, NULL), $this);
            $this->SUBSCRIBER_BUNDLED_FEATURE_ID = & new clsControl(ccsTextBox, "SUBSCRIBER_BUNDLED_FEATURE_ID", "SUBSCRIBER_BUNDLED_FEATURE_ID", ccsFloat, "", CCGetRequestParam("SUBSCRIBER_BUNDLED_FEATURE_ID", $Method, NULL), $this);
            $this->SUBS_OT_PROMO_FEATURE_ID = & new clsControl(ccsTextBox, "SUBS_OT_PROMO_FEATURE_ID", "SUBS_OT_PROMO_FEATURE_ID", ccsFloat, "", CCGetRequestParam("SUBS_OT_PROMO_FEATURE_ID", $Method, NULL), $this);
            $this->IS_SENT_TO_NMS = & new clsControl(ccsListBox, "IS_SENT_TO_NMS", "IS_SENT_TO_NMS", ccsText, "", CCGetRequestParam("IS_SENT_TO_NMS", $Method, NULL), $this);
            $this->IS_SENT_TO_NMS->DSType = dsListOfValues;
            $this->IS_SENT_TO_NMS->Values = array(array("", "-- Select --"), array("Y", "Yes"), array("N", "No"));
            $this->P_FEATURE_TYPE_ID = & new clsControl(ccsTextBox, "P_FEATURE_TYPE_ID", "P_FEATURE_TYPE_ID", ccsFloat, "", CCGetRequestParam("P_FEATURE_TYPE_ID", $Method, NULL), $this);
            $this->SENT_DATE = & new clsControl(ccsTextBox, "SENT_DATE", "SENT_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("SENT_DATE", $Method, NULL), $this);
            $this->DatePicker_SENT_DATE = & new clsDatePicker("DatePicker_SENT_DATE", "V_SUBSCRIBER_FEAT", "SENT_DATE", $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @110-9FD705B2
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlSUBSCRIBER_FEATURE_ID"] = CCGetFromGet("SUBSCRIBER_FEATURE_ID", NULL);
    }
//End Initialize Method

//Validate Method @110-94E2FE32
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->SUBSCRIBER_ID->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_CATEGORY_ID->Validate() && $Validation);
        $Validation = ($this->ACTIVE_DATE->Validate() && $Validation);
        $Validation = ($this->TERMINATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->BUNDLED_FEATURE_CODE->Validate() && $Validation);
        $Validation = ($this->FEATURE_PROMO_CODE->Validate() && $Validation);
        $Validation = ($this->FEATURE_TYPE_CODE->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->SUBSCRIBER_FEATURE_ID->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->SUBSCRIBER_BUNDLED_FEATURE_ID->Validate() && $Validation);
        $Validation = ($this->SUBS_OT_PROMO_FEATURE_ID->Validate() && $Validation);
        $Validation = ($this->IS_SENT_TO_NMS->Validate() && $Validation);
        $Validation = ($this->P_FEATURE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->SENT_DATE->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->SUBSCRIBER_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_CATEGORY_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ACTIVE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TERMINATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BUNDLED_FEATURE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FEATURE_PROMO_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FEATURE_TYPE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUBSCRIBER_FEATURE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUBSCRIBER_BUNDLED_FEATURE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUBS_OT_PROMO_FEATURE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_SENT_TO_NMS->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_FEATURE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SENT_DATE->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @110-7384BDC0
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->SUBSCRIBER_ID->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_CATEGORY_ID->Errors->Count());
        $errors = ($errors || $this->ACTIVE_DATE->Errors->Count());
        $errors = ($errors || $this->TERMINATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->BUNDLED_FEATURE_CODE->Errors->Count());
        $errors = ($errors || $this->FEATURE_PROMO_CODE->Errors->Count());
        $errors = ($errors || $this->FEATURE_TYPE_CODE->Errors->Count());
        $errors = ($errors || $this->DatePicker_ACTIVE_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_TERMINATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->SUBSCRIBER_FEATURE_ID->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->SUBSCRIBER_BUNDLED_FEATURE_ID->Errors->Count());
        $errors = ($errors || $this->SUBS_OT_PROMO_FEATURE_ID->Errors->Count());
        $errors = ($errors || $this->IS_SENT_TO_NMS->Errors->Count());
        $errors = ($errors || $this->P_FEATURE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->SENT_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_SENT_DATE->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @110-ED598703
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

//Operation Method @110-DAC54D55
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
            $Redirect = "subscriber_feature.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "SUBSCRIBER_BUNDLED_FEATURE_ID"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = "subscriber_feature.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = "subscriber_feature.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = "subscriber_feature.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
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

//InsertRow Method @110-4F668D5C
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->SUBSCRIBER_ID->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        $this->DataSource->P_SERVICE_CATEGORY_ID->SetValue($this->P_SERVICE_CATEGORY_ID->GetValue(true));
        $this->DataSource->ACTIVE_DATE->SetValue($this->ACTIVE_DATE->GetValue(true));
        $this->DataSource->TERMINATION_DATE->SetValue($this->TERMINATION_DATE->GetValue(true));
        $this->DataSource->BUNDLED_FEATURE_CODE->SetValue($this->BUNDLED_FEATURE_CODE->GetValue(true));
        $this->DataSource->FEATURE_PROMO_CODE->SetValue($this->FEATURE_PROMO_CODE->GetValue(true));
        $this->DataSource->FEATURE_TYPE_CODE->SetValue($this->FEATURE_TYPE_CODE->GetValue(true));
        $this->DataSource->SUBSCRIBER_FEATURE_ID->SetValue($this->SUBSCRIBER_FEATURE_ID->GetValue(true));
        $this->DataSource->SUBSCRIBER_BUNDLED_FEATURE_ID->SetValue($this->SUBSCRIBER_BUNDLED_FEATURE_ID->GetValue(true));
        $this->DataSource->SUBS_OT_PROMO_FEATURE_ID->SetValue($this->SUBS_OT_PROMO_FEATURE_ID->GetValue(true));
        $this->DataSource->IS_SENT_TO_NMS->SetValue($this->IS_SENT_TO_NMS->GetValue(true));
        $this->DataSource->P_FEATURE_TYPE_ID->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        $this->DataSource->SENT_DATE->SetValue($this->SENT_DATE->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @110-BC04086B
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->SUBSCRIBER_ID->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        $this->DataSource->P_SERVICE_CATEGORY_ID->SetValue($this->P_SERVICE_CATEGORY_ID->GetValue(true));
        $this->DataSource->ACTIVE_DATE->SetValue($this->ACTIVE_DATE->GetValue(true));
        $this->DataSource->TERMINATION_DATE->SetValue($this->TERMINATION_DATE->GetValue(true));
        $this->DataSource->BUNDLED_FEATURE_CODE->SetValue($this->BUNDLED_FEATURE_CODE->GetValue(true));
        $this->DataSource->FEATURE_PROMO_CODE->SetValue($this->FEATURE_PROMO_CODE->GetValue(true));
        $this->DataSource->FEATURE_TYPE_CODE->SetValue($this->FEATURE_TYPE_CODE->GetValue(true));
        $this->DataSource->SUBSCRIBER_FEATURE_ID->SetValue($this->SUBSCRIBER_FEATURE_ID->GetValue(true));
        $this->DataSource->SUBSCRIBER_BUNDLED_FEATURE_ID->SetValue($this->SUBSCRIBER_BUNDLED_FEATURE_ID->GetValue(true));
        $this->DataSource->SUBS_OT_PROMO_FEATURE_ID->SetValue($this->SUBS_OT_PROMO_FEATURE_ID->GetValue(true));
        $this->DataSource->IS_SENT_TO_NMS->SetValue($this->IS_SENT_TO_NMS->GetValue(true));
        $this->DataSource->P_FEATURE_TYPE_ID->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        $this->DataSource->SENT_DATE->SetValue($this->SENT_DATE->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @110-6CC88474
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->SUBSCRIBER_FEATURE_ID->SetValue($this->SUBSCRIBER_FEATURE_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @110-94F71322
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

        $this->IS_SENT_TO_NMS->Prepare();

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
                    $this->P_SERVICE_CATEGORY_ID->SetValue($this->DataSource->P_SERVICE_CATEGORY_ID->GetValue());
                    $this->ACTIVE_DATE->SetValue($this->DataSource->ACTIVE_DATE->GetValue());
                    $this->TERMINATION_DATE->SetValue($this->DataSource->TERMINATION_DATE->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->BUNDLED_FEATURE_CODE->SetValue($this->DataSource->BUNDLED_FEATURE_CODE->GetValue());
                    $this->FEATURE_PROMO_CODE->SetValue($this->DataSource->FEATURE_PROMO_CODE->GetValue());
                    $this->FEATURE_TYPE_CODE->SetValue($this->DataSource->FEATURE_TYPE_CODE->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->SUBSCRIBER_FEATURE_ID->SetValue($this->DataSource->SUBSCRIBER_FEATURE_ID->GetValue());
                    $this->SUBSCRIBER_BUNDLED_FEATURE_ID->SetValue($this->DataSource->SUBSCRIBER_BUNDLED_FEATURE_ID->GetValue());
                    $this->SUBS_OT_PROMO_FEATURE_ID->SetValue($this->DataSource->SUBS_OT_PROMO_FEATURE_ID->GetValue());
                    $this->IS_SENT_TO_NMS->SetValue($this->DataSource->IS_SENT_TO_NMS->GetValue());
                    $this->P_FEATURE_TYPE_ID->SetValue($this->DataSource->P_FEATURE_TYPE_ID->GetValue());
                    $this->SENT_DATE->SetValue($this->DataSource->SENT_DATE->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->SUBSCRIBER_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_CATEGORY_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ACTIVE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TERMINATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BUNDLED_FEATURE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FEATURE_PROMO_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FEATURE_TYPE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_ACTIVE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_TERMINATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUBSCRIBER_FEATURE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUBSCRIBER_BUNDLED_FEATURE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUBS_OT_PROMO_FEATURE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_SENT_TO_NMS->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_FEATURE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SENT_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_SENT_DATE->Errors->ToString());
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
        $this->P_SERVICE_CATEGORY_ID->Show();
        $this->ACTIVE_DATE->Show();
        $this->TERMINATION_DATE->Show();
        $this->UPDATE_DATE->Show();
        $this->BUNDLED_FEATURE_CODE->Show();
        $this->FEATURE_PROMO_CODE->Show();
        $this->FEATURE_TYPE_CODE->Show();
        $this->DatePicker_ACTIVE_DATE->Show();
        $this->DatePicker_TERMINATION_DATE->Show();
        $this->UPDATE_BY->Show();
        $this->SUBSCRIBER_FEATURE_ID->Show();
        $this->P_SERVICE_TYPE_ID->Show();
        $this->SUBSCRIBER_BUNDLED_FEATURE_ID->Show();
        $this->SUBS_OT_PROMO_FEATURE_ID->Show();
        $this->IS_SENT_TO_NMS->Show();
        $this->P_FEATURE_TYPE_ID->Show();
        $this->SENT_DATE->Show();
        $this->DatePicker_SENT_DATE->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End V_SUBSCRIBER_FEAT Class @110-FCB6E20C

class clsV_SUBSCRIBER_FEATDataSource extends clsDBConn {  //V_SUBSCRIBER_FEATDataSource Class @110-FFAFFCB2

//DataSource Variables @110-520CEF80
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
    var $SUBSCRIBER_ID;
    var $P_SERVICE_CATEGORY_ID;
    var $ACTIVE_DATE;
    var $TERMINATION_DATE;
    var $UPDATE_DATE;
    var $BUNDLED_FEATURE_CODE;
    var $FEATURE_PROMO_CODE;
    var $FEATURE_TYPE_CODE;
    var $UPDATE_BY;
    var $SUBSCRIBER_FEATURE_ID;
    var $P_SERVICE_TYPE_ID;
    var $SUBSCRIBER_BUNDLED_FEATURE_ID;
    var $SUBS_OT_PROMO_FEATURE_ID;
    var $IS_SENT_TO_NMS;
    var $P_FEATURE_TYPE_ID;
    var $SENT_DATE;
//End DataSource Variables

//DataSourceClass_Initialize Event @110-2387538A
    function clsV_SUBSCRIBER_FEATDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record V_SUBSCRIBER_FEAT/Error";
        $this->Initialize();
        $this->SUBSCRIBER_ID = new clsField("SUBSCRIBER_ID", ccsFloat, "");
        
        $this->P_SERVICE_CATEGORY_ID = new clsField("P_SERVICE_CATEGORY_ID", ccsFloat, "");
        
        $this->ACTIVE_DATE = new clsField("ACTIVE_DATE", ccsDate, $this->DateFormat);
        
        $this->TERMINATION_DATE = new clsField("TERMINATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->BUNDLED_FEATURE_CODE = new clsField("BUNDLED_FEATURE_CODE", ccsText, "");
        
        $this->FEATURE_PROMO_CODE = new clsField("FEATURE_PROMO_CODE", ccsText, "");
        
        $this->FEATURE_TYPE_CODE = new clsField("FEATURE_TYPE_CODE", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->SUBSCRIBER_FEATURE_ID = new clsField("SUBSCRIBER_FEATURE_ID", ccsText, "");
        
        $this->P_SERVICE_TYPE_ID = new clsField("P_SERVICE_TYPE_ID", ccsFloat, "");
        
        $this->SUBSCRIBER_BUNDLED_FEATURE_ID = new clsField("SUBSCRIBER_BUNDLED_FEATURE_ID", ccsFloat, "");
        
        $this->SUBS_OT_PROMO_FEATURE_ID = new clsField("SUBS_OT_PROMO_FEATURE_ID", ccsFloat, "");
        
        $this->IS_SENT_TO_NMS = new clsField("IS_SENT_TO_NMS", ccsText, "");
        
        $this->P_FEATURE_TYPE_ID = new clsField("P_FEATURE_TYPE_ID", ccsFloat, "");
        
        $this->SENT_DATE = new clsField("SENT_DATE", ccsDate, $this->DateFormat);
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @110-C3E3DD15
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlSUBSCRIBER_FEATURE_ID", ccsFloat, "", "", $this->Parameters["urlSUBSCRIBER_FEATURE_ID"], 0, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @110-3690C749
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n" .
        "FROM V_SUBSCRIBER_FEATURE\n" .
        "WHERE SUBSCRIBER_FEATURE_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . " ";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @110-4B5D39A6
    function SetValues()
    {
        $this->SUBSCRIBER_ID->SetDBValue(trim($this->f("SUBSCRIBER_ID")));
        $this->P_SERVICE_CATEGORY_ID->SetDBValue(trim($this->f("P_SERVICE_CATEGORY_ID")));
        $this->ACTIVE_DATE->SetDBValue(trim($this->f("ACTIVE_DATE")));
        $this->TERMINATION_DATE->SetDBValue(trim($this->f("TERMINATION_DATE")));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->BUNDLED_FEATURE_CODE->SetDBValue($this->f("BUNDLED_FEATURE_CODE"));
        $this->FEATURE_PROMO_CODE->SetDBValue($this->f("FEATURE_PROMO_CODE"));
        $this->FEATURE_TYPE_CODE->SetDBValue($this->f("FEATURE_TYPE_CODE"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->SUBSCRIBER_FEATURE_ID->SetDBValue($this->f("SUBSCRIBER_FEATURE_ID"));
        $this->SUBSCRIBER_BUNDLED_FEATURE_ID->SetDBValue(trim($this->f("SUBSCRIBER_BUNDLED_FEATURE_ID")));
        $this->SUBS_OT_PROMO_FEATURE_ID->SetDBValue(trim($this->f("SUBS_OT_PROMO_FEATURE_ID")));
        $this->IS_SENT_TO_NMS->SetDBValue($this->f("IS_SENT_TO_NMS"));
        $this->P_FEATURE_TYPE_ID->SetDBValue(trim($this->f("P_FEATURE_TYPE_ID")));
        $this->SENT_DATE->SetDBValue(trim($this->f("SENT_DATE")));
    }
//End SetValues Method

//Insert Method @110-CFF793A5
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["SUBSCRIBER_ID"] = new clsSQLParameter("ctrlSUBSCRIBER_ID", ccsFloat, "", "", $this->SUBSCRIBER_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SERVICE_CATEGORY_ID"] = new clsSQLParameter("ctrlP_SERVICE_CATEGORY_ID", ccsFloat, "", "", $this->P_SERVICE_CATEGORY_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ACTIVE_DATE"] = new clsSQLParameter("ctrlACTIVE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->ACTIVE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["TERMINATION_DATE"] = new clsSQLParameter("ctrlTERMINATION_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->TERMINATION_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BUNDLED_FEATURE_CODE"] = new clsSQLParameter("ctrlBUNDLED_FEATURE_CODE", ccsText, "", "", $this->BUNDLED_FEATURE_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FEATURE_PROMO_CODE"] = new clsSQLParameter("ctrlFEATURE_PROMO_CODE", ccsText, "", "", $this->FEATURE_PROMO_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FEATURE_TYPE_CODE"] = new clsSQLParameter("ctrlFEATURE_TYPE_CODE", ccsText, "", "", $this->FEATURE_TYPE_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["SUBSCRIBER_FEATURE_ID"] = new clsSQLParameter("ctrlSUBSCRIBER_FEATURE_ID", ccsText, "", "", $this->SUBSCRIBER_FEATURE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUBSCRIBER_BUNDLED_FEATURE_ID"] = new clsSQLParameter("ctrlSUBSCRIBER_BUNDLED_FEATURE_ID", ccsFloat, "", "", $this->SUBSCRIBER_BUNDLED_FEATURE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUBS_OT_PROMO_FEATURE_ID"] = new clsSQLParameter("ctrlSUBS_OT_PROMO_FEATURE_ID", ccsFloat, "", "", $this->SUBS_OT_PROMO_FEATURE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_SENT_TO_NMS"] = new clsSQLParameter("ctrlIS_SENT_TO_NMS", ccsText, "", "", $this->IS_SENT_TO_NMS->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_FEATURE_TYPE_ID"] = new clsSQLParameter("ctrlP_FEATURE_TYPE_ID", ccsFloat, "", "", $this->P_FEATURE_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SENT_DATE"] = new clsSQLParameter("ctrlSENT_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->SENT_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["SUBSCRIBER_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIBER_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_ID"]->GetValue())) 
            $this->cp["SUBSCRIBER_ID"]->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        if (!is_null($this->cp["P_SERVICE_CATEGORY_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_CATEGORY_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_CATEGORY_ID"]->GetValue())) 
            $this->cp["P_SERVICE_CATEGORY_ID"]->SetValue($this->P_SERVICE_CATEGORY_ID->GetValue(true));
        if (!is_null($this->cp["ACTIVE_DATE"]->GetValue()) and !strlen($this->cp["ACTIVE_DATE"]->GetText()) and !is_bool($this->cp["ACTIVE_DATE"]->GetValue())) 
            $this->cp["ACTIVE_DATE"]->SetValue($this->ACTIVE_DATE->GetValue(true));
        if (!is_null($this->cp["TERMINATION_DATE"]->GetValue()) and !strlen($this->cp["TERMINATION_DATE"]->GetText()) and !is_bool($this->cp["TERMINATION_DATE"]->GetValue())) 
            $this->cp["TERMINATION_DATE"]->SetValue($this->TERMINATION_DATE->GetValue(true));
        if (!is_null($this->cp["BUNDLED_FEATURE_CODE"]->GetValue()) and !strlen($this->cp["BUNDLED_FEATURE_CODE"]->GetText()) and !is_bool($this->cp["BUNDLED_FEATURE_CODE"]->GetValue())) 
            $this->cp["BUNDLED_FEATURE_CODE"]->SetValue($this->BUNDLED_FEATURE_CODE->GetValue(true));
        if (!is_null($this->cp["FEATURE_PROMO_CODE"]->GetValue()) and !strlen($this->cp["FEATURE_PROMO_CODE"]->GetText()) and !is_bool($this->cp["FEATURE_PROMO_CODE"]->GetValue())) 
            $this->cp["FEATURE_PROMO_CODE"]->SetValue($this->FEATURE_PROMO_CODE->GetValue(true));
        if (!is_null($this->cp["FEATURE_TYPE_CODE"]->GetValue()) and !strlen($this->cp["FEATURE_TYPE_CODE"]->GetText()) and !is_bool($this->cp["FEATURE_TYPE_CODE"]->GetValue())) 
            $this->cp["FEATURE_TYPE_CODE"]->SetValue($this->FEATURE_TYPE_CODE->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["SUBSCRIBER_FEATURE_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIBER_FEATURE_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_FEATURE_ID"]->GetValue())) 
            $this->cp["SUBSCRIBER_FEATURE_ID"]->SetValue($this->SUBSCRIBER_FEATURE_ID->GetValue(true));
        if (!is_null($this->cp["SUBSCRIBER_BUNDLED_FEATURE_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIBER_BUNDLED_FEATURE_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_BUNDLED_FEATURE_ID"]->GetValue())) 
            $this->cp["SUBSCRIBER_BUNDLED_FEATURE_ID"]->SetValue($this->SUBSCRIBER_BUNDLED_FEATURE_ID->GetValue(true));
        if (!is_null($this->cp["SUBS_OT_PROMO_FEATURE_ID"]->GetValue()) and !strlen($this->cp["SUBS_OT_PROMO_FEATURE_ID"]->GetText()) and !is_bool($this->cp["SUBS_OT_PROMO_FEATURE_ID"]->GetValue())) 
            $this->cp["SUBS_OT_PROMO_FEATURE_ID"]->SetValue($this->SUBS_OT_PROMO_FEATURE_ID->GetValue(true));
        if (!is_null($this->cp["IS_SENT_TO_NMS"]->GetValue()) and !strlen($this->cp["IS_SENT_TO_NMS"]->GetText()) and !is_bool($this->cp["IS_SENT_TO_NMS"]->GetValue())) 
            $this->cp["IS_SENT_TO_NMS"]->SetValue($this->IS_SENT_TO_NMS->GetValue(true));
        if (!is_null($this->cp["P_FEATURE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_FEATURE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_TYPE_ID"]->GetValue())) 
            $this->cp["P_FEATURE_TYPE_ID"]->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["SENT_DATE"]->GetValue()) and !strlen($this->cp["SENT_DATE"]->GetText()) and !is_bool($this->cp["SENT_DATE"]->GetValue())) 
            $this->cp["SENT_DATE"]->SetValue($this->SENT_DATE->GetValue(true));
        $this->SQL = "INSERT INTO SUBSCRIBER_FEATURE(\n" .
        "SUBSCRIBER_FEATURE_ID, \n" .
        "SUBSCRIBER_ID, \n" .
        "P_SERVICE_CATEGORY_ID, \n" .
        "ACTIVE_DATE, \n" .
        "TERMINATION_DATE, \n" .
        "SUBSCRIBER_BUNDLED_FEATURE_ID, \n" .
        "SUBS_OT_PROMO_FEATURE_ID, \n" .
        "IS_SENT_TO_NMS,\n" .
        "SENT_DATE,\n" .
        "UPDATE_DATE, \n" .
        "UPDATE_BY\n" .
        ") \n" .
        "VALUES(\n" .
        "GENERATE_ID('BILLDB','SUBSCRIBER_FEATURE','SUBSCRIBER_FEATURE_ID'),\n" .
        "" . $this->SQLValue($this->cp["SUBSCRIBER_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["P_SERVICE_CATEGORY_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "'" . $this->SQLValue($this->cp["ACTIVE_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "'" . $this->SQLValue($this->cp["TERMINATION_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "" . $this->SQLValue($this->cp["SUBSCRIBER_BUNDLED_FEATURE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["SUBS_OT_PROMO_FEATURE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "'" . $this->SQLValue($this->cp["IS_SENT_TO_NMS"]->GetDBValue(), ccsText) . "', \n" .
        "'" . $this->SQLValue($this->cp["SENT_DATE"]->GetDBValue(), ccsDate) . "' ,\n" .
        "SYSDATE, \n" .
        "'" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        ")";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @110-1B7917C8
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["SUBSCRIBER_ID"] = new clsSQLParameter("ctrlSUBSCRIBER_ID", ccsFloat, "", "", $this->SUBSCRIBER_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SERVICE_CATEGORY_ID"] = new clsSQLParameter("ctrlP_SERVICE_CATEGORY_ID", ccsFloat, "", "", $this->P_SERVICE_CATEGORY_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ACTIVE_DATE"] = new clsSQLParameter("ctrlACTIVE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->ACTIVE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["TERMINATION_DATE"] = new clsSQLParameter("ctrlTERMINATION_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->TERMINATION_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BUNDLED_FEATURE_CODE"] = new clsSQLParameter("ctrlBUNDLED_FEATURE_CODE", ccsText, "", "", $this->BUNDLED_FEATURE_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FEATURE_PROMO_CODE"] = new clsSQLParameter("ctrlFEATURE_PROMO_CODE", ccsText, "", "", $this->FEATURE_PROMO_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FEATURE_TYPE_CODE"] = new clsSQLParameter("ctrlFEATURE_TYPE_CODE", ccsText, "", "", $this->FEATURE_TYPE_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["SUBSCRIBER_FEATURE_ID"] = new clsSQLParameter("ctrlSUBSCRIBER_FEATURE_ID", ccsFloat, "", "", $this->SUBSCRIBER_FEATURE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["SUBSCRIBER_BUNDLED_FEATURE_ID"] = new clsSQLParameter("ctrlSUBSCRIBER_BUNDLED_FEATURE_ID", ccsFloat, "", "", $this->SUBSCRIBER_BUNDLED_FEATURE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUBS_OT_PROMO_FEATURE_ID"] = new clsSQLParameter("ctrlSUBS_OT_PROMO_FEATURE_ID", ccsFloat, "", "", $this->SUBS_OT_PROMO_FEATURE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_SENT_TO_NMS"] = new clsSQLParameter("ctrlIS_SENT_TO_NMS", ccsText, "", "", $this->IS_SENT_TO_NMS->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_FEATURE_TYPE_ID"] = new clsSQLParameter("ctrlP_FEATURE_TYPE_ID", ccsFloat, "", "", $this->P_FEATURE_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SENT_DATE"] = new clsSQLParameter("ctrlSENT_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->SENT_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["SUBSCRIBER_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIBER_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_ID"]->GetValue())) 
            $this->cp["SUBSCRIBER_ID"]->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        if (!is_null($this->cp["P_SERVICE_CATEGORY_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_CATEGORY_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_CATEGORY_ID"]->GetValue())) 
            $this->cp["P_SERVICE_CATEGORY_ID"]->SetValue($this->P_SERVICE_CATEGORY_ID->GetValue(true));
        if (!is_null($this->cp["ACTIVE_DATE"]->GetValue()) and !strlen($this->cp["ACTIVE_DATE"]->GetText()) and !is_bool($this->cp["ACTIVE_DATE"]->GetValue())) 
            $this->cp["ACTIVE_DATE"]->SetValue($this->ACTIVE_DATE->GetValue(true));
        if (!is_null($this->cp["TERMINATION_DATE"]->GetValue()) and !strlen($this->cp["TERMINATION_DATE"]->GetText()) and !is_bool($this->cp["TERMINATION_DATE"]->GetValue())) 
            $this->cp["TERMINATION_DATE"]->SetValue($this->TERMINATION_DATE->GetValue(true));
        if (!is_null($this->cp["BUNDLED_FEATURE_CODE"]->GetValue()) and !strlen($this->cp["BUNDLED_FEATURE_CODE"]->GetText()) and !is_bool($this->cp["BUNDLED_FEATURE_CODE"]->GetValue())) 
            $this->cp["BUNDLED_FEATURE_CODE"]->SetValue($this->BUNDLED_FEATURE_CODE->GetValue(true));
        if (!is_null($this->cp["FEATURE_PROMO_CODE"]->GetValue()) and !strlen($this->cp["FEATURE_PROMO_CODE"]->GetText()) and !is_bool($this->cp["FEATURE_PROMO_CODE"]->GetValue())) 
            $this->cp["FEATURE_PROMO_CODE"]->SetValue($this->FEATURE_PROMO_CODE->GetValue(true));
        if (!is_null($this->cp["FEATURE_TYPE_CODE"]->GetValue()) and !strlen($this->cp["FEATURE_TYPE_CODE"]->GetText()) and !is_bool($this->cp["FEATURE_TYPE_CODE"]->GetValue())) 
            $this->cp["FEATURE_TYPE_CODE"]->SetValue($this->FEATURE_TYPE_CODE->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["SUBSCRIBER_FEATURE_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIBER_FEATURE_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_FEATURE_ID"]->GetValue())) 
            $this->cp["SUBSCRIBER_FEATURE_ID"]->SetValue($this->SUBSCRIBER_FEATURE_ID->GetValue(true));
        if (!strlen($this->cp["SUBSCRIBER_FEATURE_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_FEATURE_ID"]->GetValue(true))) 
            $this->cp["SUBSCRIBER_FEATURE_ID"]->SetText(0);
        if (!is_null($this->cp["SUBSCRIBER_BUNDLED_FEATURE_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIBER_BUNDLED_FEATURE_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_BUNDLED_FEATURE_ID"]->GetValue())) 
            $this->cp["SUBSCRIBER_BUNDLED_FEATURE_ID"]->SetValue($this->SUBSCRIBER_BUNDLED_FEATURE_ID->GetValue(true));
        if (!is_null($this->cp["SUBS_OT_PROMO_FEATURE_ID"]->GetValue()) and !strlen($this->cp["SUBS_OT_PROMO_FEATURE_ID"]->GetText()) and !is_bool($this->cp["SUBS_OT_PROMO_FEATURE_ID"]->GetValue())) 
            $this->cp["SUBS_OT_PROMO_FEATURE_ID"]->SetValue($this->SUBS_OT_PROMO_FEATURE_ID->GetValue(true));
        if (!is_null($this->cp["IS_SENT_TO_NMS"]->GetValue()) and !strlen($this->cp["IS_SENT_TO_NMS"]->GetText()) and !is_bool($this->cp["IS_SENT_TO_NMS"]->GetValue())) 
            $this->cp["IS_SENT_TO_NMS"]->SetValue($this->IS_SENT_TO_NMS->GetValue(true));
        if (!is_null($this->cp["P_FEATURE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_FEATURE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_TYPE_ID"]->GetValue())) 
            $this->cp["P_FEATURE_TYPE_ID"]->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["SENT_DATE"]->GetValue()) and !strlen($this->cp["SENT_DATE"]->GetText()) and !is_bool($this->cp["SENT_DATE"]->GetValue())) 
            $this->cp["SENT_DATE"]->SetValue($this->SENT_DATE->GetValue(true));
        $this->SQL = "UPDATE SUBSCRIBER_FEATURE SET \n" .
        "P_SERVICE_CATEGORY_ID=" . $this->SQLValue($this->cp["P_SERVICE_CATEGORY_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "ACTIVE_DATE='" . $this->SQLValue($this->cp["ACTIVE_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "TERMINATION_DATE='" . $this->SQLValue($this->cp["TERMINATION_DATE"]->GetDBValue(), ccsDate) . "', \n" .
        "UPDATE_DATE=SYSDATE, \n" .
        "UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "', \n" .
        "SUBSCRIBER_BUNDLED_FEATURE_ID=" . $this->SQLValue($this->cp["SUBSCRIBER_BUNDLED_FEATURE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "SUBS_OT_PROMO_FEATURE_ID=" . $this->SQLValue($this->cp["SUBS_OT_PROMO_FEATURE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "IS_SENT_TO_NMS='" . $this->SQLValue($this->cp["IS_SENT_TO_NMS"]->GetDBValue(), ccsText) . "',\n" .
        "SENT_DATE='" . $this->SQLValue($this->cp["SENT_DATE"]->GetDBValue(), ccsDate) . "'\n" .
        "WHERE \n" .
        "SUBSCRIBER_FEATURE_ID='" . $this->SQLValue($this->cp["SUBSCRIBER_FEATURE_ID"]->GetDBValue(), ccsFloat) . "' ";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @110-116D8918
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["SUBSCRIBER_FEATURE_ID"] = new clsSQLParameter("ctrlSUBSCRIBER_FEATURE_ID", ccsFloat, "", "", $this->SUBSCRIBER_FEATURE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["SUBSCRIBER_FEATURE_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIBER_FEATURE_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_FEATURE_ID"]->GetValue())) 
            $this->cp["SUBSCRIBER_FEATURE_ID"]->SetValue($this->SUBSCRIBER_FEATURE_ID->GetValue(true));
        if (!strlen($this->cp["SUBSCRIBER_FEATURE_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_FEATURE_ID"]->GetValue(true))) 
            $this->cp["SUBSCRIBER_FEATURE_ID"]->SetText(0);
        $this->SQL = "DELETE FROM SUBSCRIBER_FEATURE \n" .
        "WHERE SUBSCRIBER_FEATURE_ID = " . $this->SQLValue($this->cp["SUBSCRIBER_FEATURE_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End V_SUBSCRIBER_FEATDataSource Class @110-FCB6E20C

//Initialize Page @1-C1319EE2
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
$TemplateFileName = "subscriber_feature_form.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-7635F940
include_once("./subscriber_feature_form_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-61C6B584
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$SubscribInfo = & new clsRecordSubscribInfo("", $MainPage);
$V_SUBSCRIBER_FEAT = & new clsRecordV_SUBSCRIBER_FEAT("", $MainPage);
$MainPage->SubscribInfo = & $SubscribInfo;
$MainPage->V_SUBSCRIBER_FEAT = & $V_SUBSCRIBER_FEAT;
$SubscribInfo->Initialize();
$V_SUBSCRIBER_FEAT->Initialize();

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

//Execute Components @1-6929623E
$SubscribInfo->Operation();
$V_SUBSCRIBER_FEAT->Operation();
//End Execute Components

//Go to destination page @1-65BF7569
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($SubscribInfo);
    unset($V_SUBSCRIBER_FEAT);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-F3C4FA17
$SubscribInfo->Show();
$V_SUBSCRIBER_FEAT->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-BF6DD2E2
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($SubscribInfo);
unset($V_SUBSCRIBER_FEAT);
unset($Tpl);
//End Unload Page


?>
