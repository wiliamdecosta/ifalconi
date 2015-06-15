<?php
//Include Common Files @1-2CE4F06A
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_data/");
define("FileName", "subscriber_tariff_override_form2.php");
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

class clsRecordV_SUBS_OVERRIDE_RECU_TARI { //V_SUBS_OVERRIDE_RECU_TARI Class @110-8FC603BF

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

//Class_Initialize Event @110-2168352D
    function clsRecordV_SUBS_OVERRIDE_RECU_TARI($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_SUBS_OVERRIDE_RECU_TARI/Error";
        $this->DataSource = new clsV_SUBS_OVERRIDE_RECU_TARIDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_SUBS_OVERRIDE_RECU_TARI";
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
            $this->P_FEATURE_TYPE_ID = & new clsControl(ccsHidden, "P_FEATURE_TYPE_ID", "P FEATURE TYPE ID", ccsFloat, "", CCGetRequestParam("P_FEATURE_TYPE_ID", $Method, NULL), $this);
            $this->P_FEATURE_TYPE_ID->Required = true;
            $this->VALID_FROM = & new clsControl(ccsTextBox, "VALID_FROM", "VALID FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", $Method, NULL), $this);
            $this->VALID_FROM->Required = true;
            $this->P_CURRENCY_ID = & new clsControl(ccsHidden, "P_CURRENCY_ID", "P CURRENCY ID", ccsFloat, "", CCGetRequestParam("P_CURRENCY_ID", $Method, NULL), $this);
            $this->P_CURRENCY_ID->Required = true;
            $this->CHARGE_AMOUNT = & new clsControl(ccsTextBox, "CHARGE_AMOUNT", "CHARGE AMOUNT", ccsFloat, "", CCGetRequestParam("CHARGE_AMOUNT", $Method, NULL), $this);
            $this->CHARGE_AMOUNT->Required = true;
            $this->P_BILLING_PERIOD_UNIT_ID = & new clsControl(ccsHidden, "P_BILLING_PERIOD_UNIT_ID", "P BILLING PERIOD UNIT ID", ccsFloat, "", CCGetRequestParam("P_BILLING_PERIOD_UNIT_ID", $Method, NULL), $this);
            $this->P_BILLING_PERIOD_UNIT_ID->Required = true;
            $this->BILLING_UNIT = & new clsControl(ccsTextBox, "BILLING_UNIT", "BILLING UNIT", ccsFloat, "", CCGetRequestParam("BILLING_UNIT", $Method, NULL), $this);
            $this->BILLING_UNIT->Required = true;
            $this->SUBS_OT_PROMO_SERVICE_ID = & new clsControl(ccsHidden, "SUBS_OT_PROMO_SERVICE_ID", "SUBS OT PROMO SERVICE ID", ccsFloat, "", CCGetRequestParam("SUBS_OT_PROMO_SERVICE_ID", $Method, NULL), $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->FEATURE_TYPE_CODE = & new clsControl(ccsTextBox, "FEATURE_TYPE_CODE", "FEATURE TYPE", ccsText, "", CCGetRequestParam("FEATURE_TYPE_CODE", $Method, NULL), $this);
            $this->FEATURE_TYPE_CODE->Required = true;
            $this->DatePicker_VALID_FROM = & new clsDatePicker("DatePicker_VALID_FROM", "V_SUBS_OVERRIDE_RECU_TARI", "VALID_FROM", $this);
            $this->CURRENCY_CODE = & new clsControl(ccsTextBox, "CURRENCY_CODE", "CURRENCY CODE", ccsText, "", CCGetRequestParam("CURRENCY_CODE", $Method, NULL), $this);
            $this->CURRENCY_CODE->Required = true;
            $this->VALID_TO = & new clsControl(ccsTextBox, "VALID_TO", "VALID TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", $Method, NULL), $this);
            $this->DatePicker_VALID_TO = & new clsDatePicker("DatePicker_VALID_TO", "V_SUBS_OVERRIDE_RECU_TARI", "VALID_TO", $this);
            $this->BILL_PERIOD_UNIT_CODE = & new clsControl(ccsTextBox, "BILL_PERIOD_UNIT_CODE", "BILL PERIOD UNIT CODE", ccsText, "", CCGetRequestParam("BILL_PERIOD_UNIT_CODE", $Method, NULL), $this);
            $this->BILL_PERIOD_UNIT_CODE->Required = true;
            $this->OT_FEAT_PROMOTION_CODE = & new clsControl(ccsTextBox, "OT_FEAT_PROMOTION_CODE", "OT_FEAT_PROMOTION_CODE", ccsText, "", CCGetRequestParam("OT_FEAT_PROMOTION_CODE", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->SUBS_OVER_FEAT_RECU_TARIFF_ID = & new clsControl(ccsHidden, "SUBS_OVER_FEAT_RECU_TARIFF_ID", "SUBS_OVER_FEAT_RECU_TARIFF_ID", ccsFloat, "", CCGetRequestParam("SUBS_OVER_FEAT_RECU_TARIFF_ID", $Method, NULL), $this);
            $this->BILL_COMPONENT_CODE = & new clsControl(ccsTextBox, "BILL_COMPONENT_CODE", "BILL COMPONENT", ccsText, "", CCGetRequestParam("BILL_COMPONENT_CODE", $Method, NULL), $this);
            $this->BILL_COMPONENT_CODE->Required = true;
            $this->P_BILL_COMPONENT_ID = & new clsControl(ccsHidden, "P_BILL_COMPONENT_ID", "BILL COMPONENT ID", ccsFloat, "", CCGetRequestParam("P_BILL_COMPONENT_ID", $Method, NULL), $this);
            $this->P_BILL_COMPONENT_ID->Required = true;
            if(!$this->FormSubmitted) {
                if(!is_array($this->VALID_FROM->Value) && !strlen($this->VALID_FROM->Value) && $this->VALID_FROM->Value !== false)
                    $this->VALID_FROM->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @110-B48F2036
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlSUBS_OVER_FEAT_RECU_TARIFF_ID"] = CCGetFromGet("SUBS_OVER_FEAT_RECU_TARIFF_ID", NULL);
    }
//End Initialize Method

//Validate Method @110-30C0C545
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->SUBSCRIBER_ID->Validate() && $Validation);
        $Validation = ($this->P_FEATURE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->VALID_FROM->Validate() && $Validation);
        $Validation = ($this->P_CURRENCY_ID->Validate() && $Validation);
        $Validation = ($this->CHARGE_AMOUNT->Validate() && $Validation);
        $Validation = ($this->P_BILLING_PERIOD_UNIT_ID->Validate() && $Validation);
        $Validation = ($this->BILLING_UNIT->Validate() && $Validation);
        $Validation = ($this->SUBS_OT_PROMO_SERVICE_ID->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->FEATURE_TYPE_CODE->Validate() && $Validation);
        $Validation = ($this->CURRENCY_CODE->Validate() && $Validation);
        $Validation = ($this->VALID_TO->Validate() && $Validation);
        $Validation = ($this->BILL_PERIOD_UNIT_CODE->Validate() && $Validation);
        $Validation = ($this->OT_FEAT_PROMOTION_CODE->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->SUBS_OVER_FEAT_RECU_TARIFF_ID->Validate() && $Validation);
        $Validation = ($this->BILL_COMPONENT_CODE->Validate() && $Validation);
        $Validation = ($this->P_BILL_COMPONENT_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->SUBSCRIBER_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_FEATURE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CURRENCY_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CHARGE_AMOUNT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILLING_PERIOD_UNIT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILLING_UNIT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUBS_OT_PROMO_SERVICE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FEATURE_TYPE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CURRENCY_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILL_PERIOD_UNIT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OT_FEAT_PROMOTION_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUBS_OVER_FEAT_RECU_TARIFF_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILL_COMPONENT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILL_COMPONENT_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @110-7C9DEB1B
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->SUBSCRIBER_ID->Errors->Count());
        $errors = ($errors || $this->P_FEATURE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->VALID_FROM->Errors->Count());
        $errors = ($errors || $this->P_CURRENCY_ID->Errors->Count());
        $errors = ($errors || $this->CHARGE_AMOUNT->Errors->Count());
        $errors = ($errors || $this->P_BILLING_PERIOD_UNIT_ID->Errors->Count());
        $errors = ($errors || $this->BILLING_UNIT->Errors->Count());
        $errors = ($errors || $this->SUBS_OT_PROMO_SERVICE_ID->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->FEATURE_TYPE_CODE->Errors->Count());
        $errors = ($errors || $this->DatePicker_VALID_FROM->Errors->Count());
        $errors = ($errors || $this->CURRENCY_CODE->Errors->Count());
        $errors = ($errors || $this->VALID_TO->Errors->Count());
        $errors = ($errors || $this->DatePicker_VALID_TO->Errors->Count());
        $errors = ($errors || $this->BILL_PERIOD_UNIT_CODE->Errors->Count());
        $errors = ($errors || $this->OT_FEAT_PROMOTION_CODE->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->SUBS_OVER_FEAT_RECU_TARIFF_ID->Errors->Count());
        $errors = ($errors || $this->BILL_COMPONENT_CODE->Errors->Count());
        $errors = ($errors || $this->P_BILL_COMPONENT_ID->Errors->Count());
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

//Operation Method @110-C4BEF937
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
            $Redirect = "subscriber_tariff_override.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "SUBS_OVER_FEAT_RECU_TARIFF_ID"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = "subscriber_tariff_override.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = "subscriber_tariff_override.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = "subscriber_tariff_override.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
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

//InsertRow Method @110-628A4685
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->SUBSCRIBER_ID->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        $this->DataSource->P_FEATURE_TYPE_ID->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->P_CURRENCY_ID->SetValue($this->P_CURRENCY_ID->GetValue(true));
        $this->DataSource->CHARGE_AMOUNT->SetValue($this->CHARGE_AMOUNT->GetValue(true));
        $this->DataSource->P_BILLING_PERIOD_UNIT_ID->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        $this->DataSource->BILLING_UNIT->SetValue($this->BILLING_UNIT->GetValue(true));
        $this->DataSource->SUBS_OT_PROMO_SERVICE_ID->SetValue($this->SUBS_OT_PROMO_SERVICE_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->SUBS_OVER_FEAT_RECU_TARIFF_ID->SetValue($this->SUBS_OVER_FEAT_RECU_TARIFF_ID->GetValue(true));
        $this->DataSource->P_BILL_COMPONENT_ID->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @110-E6629B19
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->SUBSCRIBER_ID->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        $this->DataSource->P_FEATURE_TYPE_ID->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->P_CURRENCY_ID->SetValue($this->P_CURRENCY_ID->GetValue(true));
        $this->DataSource->CHARGE_AMOUNT->SetValue($this->CHARGE_AMOUNT->GetValue(true));
        $this->DataSource->P_BILLING_PERIOD_UNIT_ID->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        $this->DataSource->BILLING_UNIT->SetValue($this->BILLING_UNIT->GetValue(true));
        $this->DataSource->SUBS_OT_PROMO_SERVICE_ID->SetValue($this->SUBS_OT_PROMO_SERVICE_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->SUBS_OVER_FEAT_RECU_TARIFF_ID->SetValue($this->SUBS_OVER_FEAT_RECU_TARIFF_ID->GetValue(true));
        $this->DataSource->P_BILL_COMPONENT_ID->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @110-9A3AC677
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->SUBS_OVER_FEAT_RECU_TARIFF_ID->SetValue($this->SUBS_OVER_FEAT_RECU_TARIFF_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @110-359A2619
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
                    $this->P_FEATURE_TYPE_ID->SetValue($this->DataSource->P_FEATURE_TYPE_ID->GetValue());
                    $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                    $this->P_CURRENCY_ID->SetValue($this->DataSource->P_CURRENCY_ID->GetValue());
                    $this->CHARGE_AMOUNT->SetValue($this->DataSource->CHARGE_AMOUNT->GetValue());
                    $this->P_BILLING_PERIOD_UNIT_ID->SetValue($this->DataSource->P_BILLING_PERIOD_UNIT_ID->GetValue());
                    $this->BILLING_UNIT->SetValue($this->DataSource->BILLING_UNIT->GetValue());
                    $this->SUBS_OT_PROMO_SERVICE_ID->SetValue($this->DataSource->SUBS_OT_PROMO_SERVICE_ID->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->FEATURE_TYPE_CODE->SetValue($this->DataSource->FEATURE_TYPE_CODE->GetValue());
                    $this->CURRENCY_CODE->SetValue($this->DataSource->CURRENCY_CODE->GetValue());
                    $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                    $this->BILL_PERIOD_UNIT_CODE->SetValue($this->DataSource->BILL_PERIOD_UNIT_CODE->GetValue());
                    $this->OT_FEAT_PROMOTION_CODE->SetValue($this->DataSource->OT_FEAT_PROMOTION_CODE->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->SUBS_OVER_FEAT_RECU_TARIFF_ID->SetValue($this->DataSource->SUBS_OVER_FEAT_RECU_TARIFF_ID->GetValue());
                    $this->BILL_COMPONENT_CODE->SetValue($this->DataSource->BILL_COMPONENT_CODE->GetValue());
                    $this->P_BILL_COMPONENT_ID->SetValue($this->DataSource->P_BILL_COMPONENT_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->SUBSCRIBER_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_FEATURE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CURRENCY_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CHARGE_AMOUNT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILLING_PERIOD_UNIT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILLING_UNIT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUBS_OT_PROMO_SERVICE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FEATURE_TYPE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CURRENCY_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILL_PERIOD_UNIT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OT_FEAT_PROMOTION_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUBS_OVER_FEAT_RECU_TARIFF_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILL_COMPONENT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILL_COMPONENT_ID->Errors->ToString());
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
        $this->P_FEATURE_TYPE_ID->Show();
        $this->VALID_FROM->Show();
        $this->P_CURRENCY_ID->Show();
        $this->CHARGE_AMOUNT->Show();
        $this->P_BILLING_PERIOD_UNIT_ID->Show();
        $this->BILLING_UNIT->Show();
        $this->SUBS_OT_PROMO_SERVICE_ID->Show();
        $this->UPDATE_BY->Show();
        $this->DESCRIPTION->Show();
        $this->FEATURE_TYPE_CODE->Show();
        $this->DatePicker_VALID_FROM->Show();
        $this->CURRENCY_CODE->Show();
        $this->VALID_TO->Show();
        $this->DatePicker_VALID_TO->Show();
        $this->BILL_PERIOD_UNIT_CODE->Show();
        $this->OT_FEAT_PROMOTION_CODE->Show();
        $this->UPDATE_DATE->Show();
        $this->SUBS_OVER_FEAT_RECU_TARIFF_ID->Show();
        $this->BILL_COMPONENT_CODE->Show();
        $this->P_BILL_COMPONENT_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End V_SUBS_OVERRIDE_RECU_TARI Class @110-FCB6E20C

class clsV_SUBS_OVERRIDE_RECU_TARIDataSource extends clsDBConn {  //V_SUBS_OVERRIDE_RECU_TARIDataSource Class @110-62DBA181

//DataSource Variables @110-7DBC7D4F
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
    var $P_FEATURE_TYPE_ID;
    var $VALID_FROM;
    var $P_CURRENCY_ID;
    var $CHARGE_AMOUNT;
    var $P_BILLING_PERIOD_UNIT_ID;
    var $BILLING_UNIT;
    var $SUBS_OT_PROMO_SERVICE_ID;
    var $UPDATE_BY;
    var $DESCRIPTION;
    var $FEATURE_TYPE_CODE;
    var $CURRENCY_CODE;
    var $VALID_TO;
    var $BILL_PERIOD_UNIT_CODE;
    var $OT_FEAT_PROMOTION_CODE;
    var $UPDATE_DATE;
    var $SUBS_OVER_FEAT_RECU_TARIFF_ID;
    var $BILL_COMPONENT_CODE;
    var $P_BILL_COMPONENT_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @110-1413F01D
    function clsV_SUBS_OVERRIDE_RECU_TARIDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record V_SUBS_OVERRIDE_RECU_TARI/Error";
        $this->Initialize();
        $this->SUBSCRIBER_ID = new clsField("SUBSCRIBER_ID", ccsFloat, "");
        
        $this->P_FEATURE_TYPE_ID = new clsField("P_FEATURE_TYPE_ID", ccsFloat, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->P_CURRENCY_ID = new clsField("P_CURRENCY_ID", ccsFloat, "");
        
        $this->CHARGE_AMOUNT = new clsField("CHARGE_AMOUNT", ccsFloat, "");
        
        $this->P_BILLING_PERIOD_UNIT_ID = new clsField("P_BILLING_PERIOD_UNIT_ID", ccsFloat, "");
        
        $this->BILLING_UNIT = new clsField("BILLING_UNIT", ccsFloat, "");
        
        $this->SUBS_OT_PROMO_SERVICE_ID = new clsField("SUBS_OT_PROMO_SERVICE_ID", ccsFloat, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->FEATURE_TYPE_CODE = new clsField("FEATURE_TYPE_CODE", ccsText, "");
        
        $this->CURRENCY_CODE = new clsField("CURRENCY_CODE", ccsText, "");
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->BILL_PERIOD_UNIT_CODE = new clsField("BILL_PERIOD_UNIT_CODE", ccsText, "");
        
        $this->OT_FEAT_PROMOTION_CODE = new clsField("OT_FEAT_PROMOTION_CODE", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->SUBS_OVER_FEAT_RECU_TARIFF_ID = new clsField("SUBS_OVER_FEAT_RECU_TARIFF_ID", ccsFloat, "");
        
        $this->BILL_COMPONENT_CODE = new clsField("BILL_COMPONENT_CODE", ccsText, "");
        
        $this->P_BILL_COMPONENT_ID = new clsField("P_BILL_COMPONENT_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @110-69AE066A
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlSUBS_OVER_FEAT_RECU_TARIFF_ID", ccsFloat, "", "", $this->Parameters["urlSUBS_OVER_FEAT_RECU_TARIFF_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "SUBS_OVER_FEAT_RECU_TARIFF_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @110-DD47808F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_SUBS_OVER_FEAT_RECU_TARIFF {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @110-13E1DA70
    function SetValues()
    {
        $this->SUBSCRIBER_ID->SetDBValue(trim($this->f("SUBSCRIBER_ID")));
        $this->P_FEATURE_TYPE_ID->SetDBValue(trim($this->f("P_FEATURE_TYPE_ID")));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->P_CURRENCY_ID->SetDBValue(trim($this->f("P_CURRENCY_ID")));
        $this->CHARGE_AMOUNT->SetDBValue(trim($this->f("CHARGE_AMOUNT")));
        $this->P_BILLING_PERIOD_UNIT_ID->SetDBValue(trim($this->f("P_BILLING_PERIOD_UNIT_ID")));
        $this->BILLING_UNIT->SetDBValue(trim($this->f("BILLING_UNIT")));
        $this->SUBS_OT_PROMO_SERVICE_ID->SetDBValue(trim($this->f("SUBS_OT_PROMO_FEATURE_ID")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->FEATURE_TYPE_CODE->SetDBValue($this->f("FEATURE_TYPE_CODE"));
        $this->CURRENCY_CODE->SetDBValue($this->f("CURRENCY_CODE"));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->BILL_PERIOD_UNIT_CODE->SetDBValue($this->f("BILL_PERIOD_UNIT_CODE"));
        $this->OT_FEAT_PROMOTION_CODE->SetDBValue($this->f("OT_FEAT_PROMOTION_CODE"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->SUBS_OVER_FEAT_RECU_TARIFF_ID->SetDBValue(trim($this->f("SUBS_OVER_FEAT_RECU_TARIFF_ID")));
        $this->BILL_COMPONENT_CODE->SetDBValue($this->f("BILL_COMPONENT_CODE"));
        $this->P_BILL_COMPONENT_ID->SetDBValue(trim($this->f("P_BILL_COMPONENT_ID")));
    }
//End SetValues Method

//Insert Method @110-1210B675
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["SUBSCRIBER_ID"] = new clsSQLParameter("ctrlSUBSCRIBER_ID", ccsFloat, "", "", $this->SUBSCRIBER_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_FEATURE_TYPE_ID"] = new clsSQLParameter("ctrlP_FEATURE_TYPE_ID", ccsFloat, "", "", $this->P_FEATURE_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CURRENCY_ID"] = new clsSQLParameter("ctrlP_CURRENCY_ID", ccsFloat, "", "", $this->P_CURRENCY_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CHARGE_AMOUNT"] = new clsSQLParameter("ctrlCHARGE_AMOUNT", ccsFloat, "", "", $this->CHARGE_AMOUNT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILLING_PERIOD_UNIT_ID"] = new clsSQLParameter("ctrlP_BILLING_PERIOD_UNIT_ID", ccsFloat, "", "", $this->P_BILLING_PERIOD_UNIT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BILLING_UNIT"] = new clsSQLParameter("ctrlBILLING_UNIT", ccsFloat, "", "", $this->BILLING_UNIT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUBS_OT_PROMO_SERVICE_ID"] = new clsSQLParameter("ctrlSUBS_OT_PROMO_SERVICE_ID", ccsFloat, "", "", $this->SUBS_OT_PROMO_SERVICE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"] = new clsSQLParameter("ctrlSUBS_OVER_FEAT_RECU_TARIFF_ID", ccsFloat, "", "", $this->SUBS_OVER_FEAT_RECU_TARIFF_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILL_COMPONENT_ID"] = new clsSQLParameter("ctrlP_BILL_COMPONENT_ID", ccsFloat, "", "", $this->P_BILL_COMPONENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["SUBSCRIBER_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIBER_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_ID"]->GetValue())) 
            $this->cp["SUBSCRIBER_ID"]->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        if (!is_null($this->cp["P_FEATURE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_FEATURE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_TYPE_ID"]->GetValue())) 
            $this->cp["P_FEATURE_TYPE_ID"]->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["P_CURRENCY_ID"]->GetValue()) and !strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue())) 
            $this->cp["P_CURRENCY_ID"]->SetValue($this->P_CURRENCY_ID->GetValue(true));
        if (!is_null($this->cp["CHARGE_AMOUNT"]->GetValue()) and !strlen($this->cp["CHARGE_AMOUNT"]->GetText()) and !is_bool($this->cp["CHARGE_AMOUNT"]->GetValue())) 
            $this->cp["CHARGE_AMOUNT"]->SetValue($this->CHARGE_AMOUNT->GetValue(true));
        if (!is_null($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue()) and !strlen($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue())) 
            $this->cp["P_BILLING_PERIOD_UNIT_ID"]->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        if (!is_null($this->cp["BILLING_UNIT"]->GetValue()) and !strlen($this->cp["BILLING_UNIT"]->GetText()) and !is_bool($this->cp["BILLING_UNIT"]->GetValue())) 
            $this->cp["BILLING_UNIT"]->SetValue($this->BILLING_UNIT->GetValue(true));
        if (!is_null($this->cp["SUBS_OT_PROMO_SERVICE_ID"]->GetValue()) and !strlen($this->cp["SUBS_OT_PROMO_SERVICE_ID"]->GetText()) and !is_bool($this->cp["SUBS_OT_PROMO_SERVICE_ID"]->GetValue())) 
            $this->cp["SUBS_OT_PROMO_SERVICE_ID"]->SetValue($this->SUBS_OT_PROMO_SERVICE_ID->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetValue()) and !strlen($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetText()) and !is_bool($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetValue())) 
            $this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->SetValue($this->SUBS_OVER_FEAT_RECU_TARIFF_ID->GetValue(true));
        if (!is_null($this->cp["P_BILL_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        $this->SQL = "INSERT INTO SUBS_OVER_FEAT_RECU_TARIFF(\n" .
        "SUBS_OVER_FEAT_RECU_TARIFF_ID, \n" .
        "SUBSCRIBER_ID, \n" .
        "P_FEATURE_TYPE_ID, \n" .
        "P_BILL_COMPONENT_ID,\n" .
        "VALID_FROM, \n" .
        "VALID_TO, \n" .
        "P_CURRENCY_ID, \n" .
        "CHARGE_AMOUNT, \n" .
        "P_BILLING_PERIOD_UNIT_ID, \n" .
        "BILLING_UNIT, \n" .
        "SUBS_OT_PROMO_FEATURE_ID, \n" .
        "DESCRIPTION,\n" .
        "UPDATE_DATE,\n" .
        "UPDATE_BY\n" .
        ") VALUES(\n" .
        "GENERATE_ID('BILLDB','SUBS_OVER_FEAT_RECU_TARIFF','SUBS_OVER_FEAT_RECU_TARIFF_ID'),\n" .
        "" . $this->SQLValue($this->cp["SUBSCRIBER_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["P_FEATURE_TYPE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["P_BILL_COMPONENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "'" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "', \n" .
        "'" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "', \n" .
        "" . $this->SQLValue($this->cp["P_CURRENCY_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["CHARGE_AMOUNT"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["BILLING_UNIT"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["SUBS_OT_PROMO_SERVICE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')), \n" .
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

//Update Method @110-15595387
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["SUBSCRIBER_ID"] = new clsSQLParameter("ctrlSUBSCRIBER_ID", ccsFloat, "", "", $this->SUBSCRIBER_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_FEATURE_TYPE_ID"] = new clsSQLParameter("ctrlP_FEATURE_TYPE_ID", ccsFloat, "", "", $this->P_FEATURE_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CURRENCY_ID"] = new clsSQLParameter("ctrlP_CURRENCY_ID", ccsFloat, "", "", $this->P_CURRENCY_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CHARGE_AMOUNT"] = new clsSQLParameter("ctrlCHARGE_AMOUNT", ccsFloat, "", "", $this->CHARGE_AMOUNT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILLING_PERIOD_UNIT_ID"] = new clsSQLParameter("ctrlP_BILLING_PERIOD_UNIT_ID", ccsFloat, "", "", $this->P_BILLING_PERIOD_UNIT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BILLING_UNIT"] = new clsSQLParameter("ctrlBILLING_UNIT", ccsFloat, "", "", $this->BILLING_UNIT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUBS_OT_PROMO_SERVICE_ID"] = new clsSQLParameter("ctrlSUBS_OT_PROMO_SERVICE_ID", ccsFloat, "", "", $this->SUBS_OT_PROMO_SERVICE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"] = new clsSQLParameter("ctrlSUBS_OVER_FEAT_RECU_TARIFF_ID", ccsFloat, "", "", $this->SUBS_OVER_FEAT_RECU_TARIFF_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_BILL_COMPONENT_ID"] = new clsSQLParameter("ctrlP_BILL_COMPONENT_ID", ccsFloat, "", "", $this->P_BILL_COMPONENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["SUBSCRIBER_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIBER_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_ID"]->GetValue())) 
            $this->cp["SUBSCRIBER_ID"]->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        if (!is_null($this->cp["P_FEATURE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_FEATURE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_TYPE_ID"]->GetValue())) 
            $this->cp["P_FEATURE_TYPE_ID"]->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["P_CURRENCY_ID"]->GetValue()) and !strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue())) 
            $this->cp["P_CURRENCY_ID"]->SetValue($this->P_CURRENCY_ID->GetValue(true));
        if (!is_null($this->cp["CHARGE_AMOUNT"]->GetValue()) and !strlen($this->cp["CHARGE_AMOUNT"]->GetText()) and !is_bool($this->cp["CHARGE_AMOUNT"]->GetValue())) 
            $this->cp["CHARGE_AMOUNT"]->SetValue($this->CHARGE_AMOUNT->GetValue(true));
        if (!is_null($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue()) and !strlen($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue())) 
            $this->cp["P_BILLING_PERIOD_UNIT_ID"]->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        if (!is_null($this->cp["BILLING_UNIT"]->GetValue()) and !strlen($this->cp["BILLING_UNIT"]->GetText()) and !is_bool($this->cp["BILLING_UNIT"]->GetValue())) 
            $this->cp["BILLING_UNIT"]->SetValue($this->BILLING_UNIT->GetValue(true));
        if (!is_null($this->cp["SUBS_OT_PROMO_SERVICE_ID"]->GetValue()) and !strlen($this->cp["SUBS_OT_PROMO_SERVICE_ID"]->GetText()) and !is_bool($this->cp["SUBS_OT_PROMO_SERVICE_ID"]->GetValue())) 
            $this->cp["SUBS_OT_PROMO_SERVICE_ID"]->SetValue($this->SUBS_OT_PROMO_SERVICE_ID->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetValue()) and !strlen($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetText()) and !is_bool($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetValue())) 
            $this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->SetValue($this->SUBS_OVER_FEAT_RECU_TARIFF_ID->GetValue(true));
        if (!strlen($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetText()) and !is_bool($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetValue(true))) 
            $this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->SetText(0);
        if (!is_null($this->cp["P_BILL_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        $this->SQL = "UPDATE SUBS_OVER_FEAT_RECU_TARIFF SET \n" .
        "P_FEATURE_TYPE_ID=" . $this->SQLValue($this->cp["P_FEATURE_TYPE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "VALID_FROM='" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "', \n" .
        "P_CURRENCY_ID=" . $this->SQLValue($this->cp["P_CURRENCY_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "CHARGE_AMOUNT=" . $this->SQLValue($this->cp["CHARGE_AMOUNT"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_BILLING_PERIOD_UNIT_ID=" . $this->SQLValue($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "BILLING_UNIT=" . $this->SQLValue($this->cp["BILLING_UNIT"]->GetDBValue(), ccsFloat) . ", \n" .
        "SUBS_OT_PROMO_FEATURE_ID=" . $this->SQLValue($this->cp["SUBS_OT_PROMO_SERVICE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "', \n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')), \n" .
        "VALID_TO='" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "', \n" .
        "UPDATE_DATE=SYSDATE, \n" .
        "P_BILL_COMPONENT_ID=" . $this->SQLValue($this->cp["P_BILL_COMPONENT_ID"]->GetDBValue(), ccsFloat) . " \n" .
        "WHERE  SUBS_OVER_FEAT_RECU_TARIFF_ID = " . $this->SQLValue($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @110-D09DBDD4
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"] = new clsSQLParameter("ctrlSUBS_OVER_FEAT_RECU_TARIFF_ID", ccsFloat, "", "", $this->SUBS_OVER_FEAT_RECU_TARIFF_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetValue()) and !strlen($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetText()) and !is_bool($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetValue())) 
            $this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->SetValue($this->SUBS_OVER_FEAT_RECU_TARIFF_ID->GetValue(true));
        if (!strlen($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetText()) and !is_bool($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetValue(true))) 
            $this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->SetText(0);
        $this->SQL = "DELETE FROM SUBS_OVER_FEAT_RECU_TARIFF WHERE  SUBS_OVER_FEAT_RECU_TARIFF_ID = " . $this->SQLValue($this->cp["SUBS_OVER_FEAT_RECU_TARIFF_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End V_SUBS_OVERRIDE_RECU_TARIDataSource Class @110-FCB6E20C



//Initialize Page @1-69B353BD
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
$TemplateFileName = "subscriber_tariff_override_form2.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-E15BC2EA
include_once("./subscriber_tariff_override_form2_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-FE7BA35F
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$SubscribInfo = & new clsRecordSubscribInfo("", $MainPage);
$V_SUBS_OVERRIDE_RECU_TARI = & new clsRecordV_SUBS_OVERRIDE_RECU_TARI("", $MainPage);
$MainPage->SubscribInfo = & $SubscribInfo;
$MainPage->V_SUBS_OVERRIDE_RECU_TARI = & $V_SUBS_OVERRIDE_RECU_TARI;
$SubscribInfo->Initialize();
$V_SUBS_OVERRIDE_RECU_TARI->Initialize();

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

//Execute Components @1-9E1AC8B2
$SubscribInfo->Operation();
$V_SUBS_OVERRIDE_RECU_TARI->Operation();
//End Execute Components

//Go to destination page @1-DBE500BA
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($SubscribInfo);
    unset($V_SUBS_OVERRIDE_RECU_TARI);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-C9D5BD2E
$SubscribInfo->Show();
$V_SUBS_OVERRIDE_RECU_TARI->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-C5369499
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($SubscribInfo);
unset($V_SUBS_OVERRIDE_RECU_TARI);
unset($Tpl);
//End Unload Page


?>
