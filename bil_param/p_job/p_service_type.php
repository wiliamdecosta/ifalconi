<?php
//Include Common Files @1-74AC9C9E
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_service_type.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_SERVICE_TYPE { //P_SERVICE_TYPE class @2-CD75201B

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

//Class_Initialize Event @2-9CD1FB54
    function clsGridP_SERVICE_TYPE($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_SERVICE_TYPE";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_SERVICE_TYPE";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_SERVICE_TYPEDataSource($this);
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

        $this->CODE = & new clsControl(ccsLabel, "CODE", "CODE", ccsText, "", CCGetRequestParam("CODE", ccsGet, NULL), $this);
        $this->SERVICE_NAME = & new clsControl(ccsLabel, "SERVICE_NAME", "SERVICE_NAME", ccsText, "", CCGetRequestParam("SERVICE_NAME", ccsGet, NULL), $this);
        $this->SERVICE_GROUP_CODE = & new clsControl(ccsLabel, "SERVICE_GROUP_CODE", "SERVICE_GROUP_CODE", ccsFloat, "", CCGetRequestParam("SERVICE_GROUP_CODE", ccsGet, NULL), $this);
        $this->VALID_FROM = & new clsControl(ccsLabel, "VALID_FROM", "VALID_FROM", ccsDate, $DefaultDateFormat, CCGetRequestParam("VALID_FROM", ccsGet, NULL), $this);
        $this->VALID_TO = & new clsControl(ccsLabel, "VALID_TO", "VALID_TO", ccsDate, $DefaultDateFormat, CCGetRequestParam("VALID_TO", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->UPDATE_DATE = & new clsControl(ccsLabel, "UPDATE_DATE", "UPDATE_DATE", ccsDate, $DefaultDateFormat, CCGetRequestParam("UPDATE_DATE", ccsGet, NULL), $this);
        $this->UPDATE_BY = & new clsControl(ccsLabel, "UPDATE_BY", "UPDATE_BY", ccsText, "", CCGetRequestParam("UPDATE_BY", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_service_type.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_service_type.php";
        $this->P_SERVICE_TYPE_ID = & new clsControl(ccsHidden, "P_SERVICE_TYPE_ID", "P_SERVICE_TYPE_ID", ccsFloat, "", CCGetRequestParam("P_SERVICE_TYPE_ID", ccsGet, NULL), $this);
        $this->CHARGING_METHOD_CODE = & new clsControl(ccsLabel, "CHARGING_METHOD_CODE", "CHARGING_METHOD_CODE", ccsText, "", CCGetRequestParam("CHARGING_METHOD_CODE", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this, "P_SERVICE_TYPE_ID");
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_SERVICE_TYPE_Insert = & new clsControl(ccsLink, "P_SERVICE_TYPE_Insert", "P_SERVICE_TYPE_Insert", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_Insert", ccsGet, NULL), $this);
        $this->P_SERVICE_TYPE_Insert->HTML = true;
        $this->P_SERVICE_TYPE_Insert->Parameters = CCGetQueryString("QueryString", array("P_SERVICE_TYPE_ID", "FLAG", "s_keyword", "P_SERVICE_TYPEPage", "P_SERVICE_TYPEPageSize", "P_SERVICE_TYPEOrder", "P_SERVICE_TYPEDir", "ccsForm"));
        $this->P_SERVICE_TYPE_Insert->Page = "p_service_type.php";
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

//Show Method @2-291CAF32
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
            $this->ControlsVisible["CODE"] = $this->CODE->Visible;
            $this->ControlsVisible["SERVICE_NAME"] = $this->SERVICE_NAME->Visible;
            $this->ControlsVisible["SERVICE_GROUP_CODE"] = $this->SERVICE_GROUP_CODE->Visible;
            $this->ControlsVisible["VALID_FROM"] = $this->VALID_FROM->Visible;
            $this->ControlsVisible["VALID_TO"] = $this->VALID_TO->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["UPDATE_DATE"] = $this->UPDATE_DATE->Visible;
            $this->ControlsVisible["UPDATE_BY"] = $this->UPDATE_BY->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_SERVICE_TYPE_ID"] = $this->P_SERVICE_TYPE_ID->Visible;
            $this->ControlsVisible["CHARGING_METHOD_CODE"] = $this->CHARGING_METHOD_CODE->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->SERVICE_NAME->SetValue($this->DataSource->SERVICE_NAME->GetValue());
                $this->SERVICE_GROUP_CODE->SetValue($this->DataSource->SERVICE_GROUP_CODE->GetValue());
                $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_SERVICE_TYPE_ID", $this->DataSource->f("P_SERVICE_TYPE_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_SERVICE_TYPE_ID", $this->DataSource->f("P_SERVICE_TYPE_ID"));
                $this->P_SERVICE_TYPE_ID->SetValue($this->DataSource->P_SERVICE_TYPE_ID->GetValue());
                $this->CHARGING_METHOD_CODE->SetValue($this->DataSource->CHARGING_METHOD_CODE->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->SERVICE_NAME->Show();
                $this->SERVICE_GROUP_CODE->Show();
                $this->VALID_FROM->Show();
                $this->VALID_TO->Show();
                $this->DESCRIPTION->Show();
                $this->UPDATE_DATE->Show();
                $this->UPDATE_BY->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_SERVICE_TYPE_ID->Show();
                $this->CHARGING_METHOD_CODE->Show();
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
        $this->P_SERVICE_TYPE_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-60DB03D9
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_GROUP_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UPDATE_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UPDATE_BY->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_SERVICE_TYPE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CHARGING_METHOD_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_SERVICE_TYPE Class @2-FCB6E20C

class clsP_SERVICE_TYPEDataSource extends clsDBConn {  //P_SERVICE_TYPEDataSource Class @2-72F6EA6F

//DataSource Variables @2-96A7937F
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $SERVICE_NAME;
    var $SERVICE_GROUP_CODE;
    var $VALID_FROM;
    var $VALID_TO;
    var $DESCRIPTION;
    var $UPDATE_DATE;
    var $UPDATE_BY;
    var $DLink;
    var $ADLink;
    var $P_SERVICE_TYPE_ID;
    var $CHARGING_METHOD_CODE;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-4E679305
    function clsP_SERVICE_TYPEDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_SERVICE_TYPE";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->SERVICE_NAME = new clsField("SERVICE_NAME", ccsText, "");
        
        $this->SERVICE_GROUP_CODE = new clsField("SERVICE_GROUP_CODE", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_SERVICE_TYPE_ID = new clsField("P_SERVICE_TYPE_ID", ccsFloat, "");
        
        $this->CHARGING_METHOD_CODE = new clsField("CHARGING_METHOD_CODE", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-9B116650
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "P_SERVICE_TYPE_ID desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-BF39E9D0
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "code", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "service_name", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->Where = $this->wp->opOR(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @2-C435E0D5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM v_p_service_type";
        $this->SQL = "SELECT * \n\n" .
        "FROM v_p_service_type {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @2-00E0622B
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->SERVICE_NAME->SetDBValue($this->f("SERVICE_NAME"));
        $this->SERVICE_GROUP_CODE->SetDBValue($this->f("SERVICE_GROUP_CODE"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->DLink->SetDBValue($this->f("P_SERVICE_TYPE_ID"));
        $this->ADLink->SetDBValue($this->f("P_SERVICE_TYPE_ID"));
        $this->P_SERVICE_TYPE_ID->SetDBValue(trim($this->f("P_SERVICE_TYPE_ID")));
        $this->CHARGING_METHOD_CODE->SetDBValue($this->f("CHARGING_METHOD_CODE"));
    }
//End SetValues Method

} //End P_SERVICE_TYPEDataSource Class @2-FCB6E20C

class clsRecordP_SERVICE_TYPESearch { //P_SERVICE_TYPESearch Class @3-1773B127

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

//Class_Initialize Event @3-E37A11C8
    function clsRecordP_SERVICE_TYPESearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_SERVICE_TYPESearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_SERVICE_TYPESearch";
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

//Operation Method @3-B34EBCE4
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
        $Redirect = "p_service_type.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_service_type.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-7913FA87
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

        $this->s_keyword->Show();
        $this->Button_DoSearch->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End P_SERVICE_TYPESearch Class @3-FCB6E20C

class clsRecordp_service_type1 { //p_service_type1 Class @44-AFC08FB1

//Variables @44-D6FF3E86

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

//Class_Initialize Event @44-DF10C142
    function clsRecordp_service_type1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_service_type1/Error";
        $this->DataSource = new clsp_service_type1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_service_type1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->CODE = & new clsControl(ccsTextBox, "CODE", "CODE", ccsText, "", CCGetRequestParam("CODE", $Method, NULL), $this);
            $this->CODE->Required = true;
            $this->SERVICE_NAME = & new clsControl(ccsTextBox, "SERVICE_NAME", "SERVICE NAME", ccsText, "", CCGetRequestParam("SERVICE_NAME", $Method, NULL), $this);
            $this->SERVICE_NAME->Required = true;
            $this->VALID_FROM = & new clsControl(ccsTextBox, "VALID_FROM", "VALID FROM", ccsDate, $DefaultDateFormat, CCGetRequestParam("VALID_FROM", $Method, NULL), $this);
            $this->VALID_FROM->Required = true;
            $this->DatePicker_VALID_FROM = & new clsDatePicker("DatePicker_VALID_FROM", "p_service_type1", "VALID_FROM", $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->VALID_TO = & new clsControl(ccsTextBox, "VALID_TO", "VALID TO", ccsDate, $DefaultDateFormat, CCGetRequestParam("VALID_TO", $Method, NULL), $this);
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->P_SERVICE_GROUP_ID = & new clsControl(ccsHidden, "P_SERVICE_GROUP_ID", "P SERVICE GROUP ID", ccsFloat, "", CCGetRequestParam("P_SERVICE_GROUP_ID", $Method, NULL), $this);
            $this->P_SERVICE_GROUP_ID->Required = true;
            $this->SERVICE_GROUP_CODE = & new clsControl(ccsTextBox, "SERVICE_GROUP_CODE", "SERVICE_GROUP_CODE", ccsText, "", CCGetRequestParam("SERVICE_GROUP_CODE", $Method, NULL), $this);
            $this->DatePicker_VALID_TO = & new clsDatePicker("DatePicker_VALID_TO", "p_service_type1", "VALID_TO", $this);
            $this->LISTING_NO = & new clsControl(ccsTextBox, "LISTING_NO", "LISTING_NO", ccsFloat, "", CCGetRequestParam("LISTING_NO", $Method, NULL), $this);
            $this->P_CHARGING_METHOD_ID = & new clsControl(ccsHidden, "P_CHARGING_METHOD_ID", "P_CHARGING_METHOD_ID", ccsText, "", CCGetRequestParam("P_CHARGING_METHOD_ID", $Method, NULL), $this);
            $this->CHARGING_METHOD_CODE = & new clsControl(ccsTextBox, "CHARGING_METHOD_CODE", "CHARGING_METHOD_CODE", ccsText, "", CCGetRequestParam("CHARGING_METHOD_CODE", $Method, NULL), $this);
            $this->P_SERVICE_TYPE_ID = & new clsControl(ccsHidden, "P_SERVICE_TYPE_ID", "P_SERVICE_TYPE_ID", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetText(date("d-M-Y"));
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @44-4AF741F6
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_SERVICE_TYPE_ID"] = CCGetFromGet("P_SERVICE_TYPE_ID", NULL);
    }
//End Initialize Method

//Validate Method @44-11A61F45
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->SERVICE_NAME->Validate() && $Validation);
        $Validation = ($this->VALID_FROM->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->VALID_TO->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_GROUP_ID->Validate() && $Validation);
        $Validation = ($this->SERVICE_GROUP_CODE->Validate() && $Validation);
        $Validation = ($this->LISTING_NO->Validate() && $Validation);
        $Validation = ($this->P_CHARGING_METHOD_ID->Validate() && $Validation);
        $Validation = ($this->CHARGING_METHOD_CODE->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SERVICE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_GROUP_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SERVICE_GROUP_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LISTING_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CHARGING_METHOD_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CHARGING_METHOD_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @44-98E6EEC0
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->SERVICE_NAME->Errors->Count());
        $errors = ($errors || $this->VALID_FROM->Errors->Count());
        $errors = ($errors || $this->DatePicker_VALID_FROM->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->VALID_TO->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_GROUP_ID->Errors->Count());
        $errors = ($errors || $this->SERVICE_GROUP_CODE->Errors->Count());
        $errors = ($errors || $this->DatePicker_VALID_TO->Errors->Count());
        $errors = ($errors || $this->LISTING_NO->Errors->Count());
        $errors = ($errors || $this->P_CHARGING_METHOD_ID->Errors->Count());
        $errors = ($errors || $this->CHARGING_METHOD_CODE->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @44-ED598703
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

//Operation Method @44-EC4C5258
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
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "P_APP_ROLE_ID", "s_keyword", "P_APP_ROLEPage"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_APP_ROLEPage"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
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

//InsertRow Method @44-60C632E1
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->SERVICE_NAME->SetValue($this->SERVICE_NAME->GetValue(true));
        $this->DataSource->LISTING_NO->SetValue($this->LISTING_NO->GetValue(true));
        $this->DataSource->P_SERVICE_GROUP_ID->SetValue($this->P_SERVICE_GROUP_ID->GetValue(true));
        $this->DataSource->P_CHARGING_METHOD_ID->SetValue($this->P_CHARGING_METHOD_ID->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @44-3EB3B606
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->SERVICE_NAME->SetValue($this->SERVICE_NAME->GetValue(true));
        $this->DataSource->LISTING_NO->SetValue($this->LISTING_NO->GetValue(true));
        $this->DataSource->P_SERVICE_GROUP_ID->SetValue($this->P_SERVICE_GROUP_ID->GetValue(true));
        $this->DataSource->P_CHARGING_METHOD_ID->SetValue($this->P_CHARGING_METHOD_ID->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @44-B1CCA1F7
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @44-74639B79
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
                    $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                    $this->SERVICE_NAME->SetValue($this->DataSource->SERVICE_NAME->GetValue());
                    $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->P_SERVICE_GROUP_ID->SetValue($this->DataSource->P_SERVICE_GROUP_ID->GetValue());
                    $this->SERVICE_GROUP_CODE->SetValue($this->DataSource->SERVICE_GROUP_CODE->GetValue());
                    $this->LISTING_NO->SetValue($this->DataSource->LISTING_NO->GetValue());
                    $this->P_CHARGING_METHOD_ID->SetValue($this->DataSource->P_CHARGING_METHOD_ID->GetValue());
                    $this->CHARGING_METHOD_CODE->SetValue($this->DataSource->CHARGING_METHOD_CODE->GetValue());
                    $this->P_SERVICE_TYPE_ID->SetValue($this->DataSource->P_SERVICE_TYPE_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SERVICE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_GROUP_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SERVICE_GROUP_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LISTING_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CHARGING_METHOD_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CHARGING_METHOD_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_ID->Errors->ToString());
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

        $this->CODE->Show();
        $this->SERVICE_NAME->Show();
        $this->VALID_FROM->Show();
        $this->DatePicker_VALID_FROM->Show();
        $this->DESCRIPTION->Show();
        $this->VALID_TO->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->UPDATE_DATE->Show();
        $this->UPDATE_BY->Show();
        $this->P_SERVICE_GROUP_ID->Show();
        $this->SERVICE_GROUP_CODE->Show();
        $this->DatePicker_VALID_TO->Show();
        $this->LISTING_NO->Show();
        $this->P_CHARGING_METHOD_ID->Show();
        $this->CHARGING_METHOD_CODE->Show();
        $this->P_SERVICE_TYPE_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_service_type1 Class @44-FCB6E20C

class clsp_service_type1DataSource extends clsDBConn {  //p_service_type1DataSource Class @44-5B37CD2F

//DataSource Variables @44-DC8A3DF0
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
    var $CODE;
    var $SERVICE_NAME;
    var $VALID_FROM;
    var $DESCRIPTION;
    var $VALID_TO;
    var $UPDATE_DATE;
    var $UPDATE_BY;
    var $P_SERVICE_GROUP_ID;
    var $SERVICE_GROUP_CODE;
    var $LISTING_NO;
    var $P_CHARGING_METHOD_ID;
    var $CHARGING_METHOD_CODE;
    var $P_SERVICE_TYPE_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @44-4B79AAEE
    function clsp_service_type1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_service_type1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->SERVICE_NAME = new clsField("SERVICE_NAME", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->P_SERVICE_GROUP_ID = new clsField("P_SERVICE_GROUP_ID", ccsFloat, "");
        
        $this->SERVICE_GROUP_CODE = new clsField("SERVICE_GROUP_CODE", ccsText, "");
        
        $this->LISTING_NO = new clsField("LISTING_NO", ccsFloat, "");
        
        $this->P_CHARGING_METHOD_ID = new clsField("P_CHARGING_METHOD_ID", ccsText, "");
        
        $this->CHARGING_METHOD_CODE = new clsField("CHARGING_METHOD_CODE", ccsText, "");
        
        $this->P_SERVICE_TYPE_ID = new clsField("P_SERVICE_TYPE_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @44-57DBF2D4
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->Parameters["urlP_SERVICE_TYPE_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_SERVICE_TYPE_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @44-4E109C53
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM v_p_service_type {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @44-32F957C6
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->SERVICE_NAME->SetDBValue($this->f("SERVICE_NAME"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->P_SERVICE_GROUP_ID->SetDBValue(trim($this->f("P_SERVICE_GROUP_ID")));
        $this->SERVICE_GROUP_CODE->SetDBValue($this->f("SERVICE_GROUP_CODE"));
        $this->LISTING_NO->SetDBValue(trim($this->f("LISTING_NO")));
        $this->P_CHARGING_METHOD_ID->SetDBValue($this->f("P_CHARGING_METHOD_ID"));
        $this->CHARGING_METHOD_CODE->SetDBValue($this->f("CHARGING_METHOD_CODE"));
        $this->P_SERVICE_TYPE_ID->SetDBValue($this->f("P_SERVICE_TYPE_ID"));
    }
//End SetValues Method

//Insert Method @44-66DDF316
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SERVICE_NAME"] = new clsSQLParameter("ctrlSERVICE_NAME", ccsText, "", "", $this->SERVICE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LISTING_NO"] = new clsSQLParameter("ctrlLISTING_NO", ccsFloat, "", "", $this->LISTING_NO->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_SERVICE_GROUP_ID"] = new clsSQLParameter("ctrlP_SERVICE_GROUP_ID", ccsFloat, "", "", $this->P_SERVICE_GROUP_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_CHARGING_METHOD_ID"] = new clsSQLParameter("ctrlP_CHARGING_METHOD_ID", ccsFloat, "", "", $this->P_CHARGING_METHOD_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->VALID_FROM->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsText, "", "", $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["SERVICE_NAME"]->GetValue()) and !strlen($this->cp["SERVICE_NAME"]->GetText()) and !is_bool($this->cp["SERVICE_NAME"]->GetValue())) 
            $this->cp["SERVICE_NAME"]->SetValue($this->SERVICE_NAME->GetValue(true));
        if (!is_null($this->cp["LISTING_NO"]->GetValue()) and !strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue())) 
            $this->cp["LISTING_NO"]->SetValue($this->LISTING_NO->GetValue(true));
        if (!strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue(true))) 
            $this->cp["LISTING_NO"]->SetText(0);
        if (!is_null($this->cp["P_SERVICE_GROUP_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_GROUP_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_GROUP_ID"]->GetValue())) 
            $this->cp["P_SERVICE_GROUP_ID"]->SetValue($this->P_SERVICE_GROUP_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_GROUP_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_GROUP_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_GROUP_ID"]->SetText(0);
        if (!is_null($this->cp["P_CHARGING_METHOD_ID"]->GetValue()) and !strlen($this->cp["P_CHARGING_METHOD_ID"]->GetText()) and !is_bool($this->cp["P_CHARGING_METHOD_ID"]->GetValue())) 
            $this->cp["P_CHARGING_METHOD_ID"]->SetValue($this->P_CHARGING_METHOD_ID->GetValue(true));
        if (!strlen($this->cp["P_CHARGING_METHOD_ID"]->GetText()) and !is_bool($this->cp["P_CHARGING_METHOD_ID"]->GetValue(true))) 
            $this->cp["P_CHARGING_METHOD_ID"]->SetText(0);
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue(true))) 
            $this->cp["VALID_FROM"]->SetText(00-00-0000);
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_SERVICE_TYPE(P_SERVICE_TYPE_ID, CODE, SERVICE_NAME, LISTING_NO, P_SERVICE_GROUP_ID, P_CHARGING_METHOD_ID, VALID_FROM, VALID_TO, DESCRIPTION, UPDATE_DATE, UPDATE_BY)\n" .
        "VALUES\n" .
        "(GENERATE_ID('BILLDB','P_SERVICE_TYPE','P_SERVICE_TYPE_ID'),UPPER(TRIM('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "')),UPPER(TRIM('" . $this->SQLValue($this->cp["SERVICE_NAME"]->GetDBValue(), ccsText) . "')),'" . $this->SQLValue($this->cp["LISTING_NO"]->GetDBValue(), ccsFloat) . "'," . $this->SQLValue($this->cp["P_SERVICE_GROUP_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_CHARGING_METHOD_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "','" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @44-7183F98C
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SERVICE_NAME"] = new clsSQLParameter("ctrlSERVICE_NAME", ccsText, "", "", $this->SERVICE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LISTING_NO"] = new clsSQLParameter("ctrlLISTING_NO", ccsFloat, "", "", $this->LISTING_NO->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_SERVICE_GROUP_ID"] = new clsSQLParameter("ctrlP_SERVICE_GROUP_ID", ccsText, "", "", $this->P_SERVICE_GROUP_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CHARGING_METHOD_ID"] = new clsSQLParameter("ctrlP_CHARGING_METHOD_ID", ccsText, "", "", $this->P_CHARGING_METHOD_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->VALID_FROM->GetValue(true), 0-00-0000, false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsText, "", "", $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["SERVICE_NAME"]->GetValue()) and !strlen($this->cp["SERVICE_NAME"]->GetText()) and !is_bool($this->cp["SERVICE_NAME"]->GetValue())) 
            $this->cp["SERVICE_NAME"]->SetValue($this->SERVICE_NAME->GetValue(true));
        if (!is_null($this->cp["LISTING_NO"]->GetValue()) and !strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue())) 
            $this->cp["LISTING_NO"]->SetValue($this->LISTING_NO->GetValue(true));
        if (!strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue(true))) 
            $this->cp["LISTING_NO"]->SetText(0);
        if (!is_null($this->cp["P_SERVICE_GROUP_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_GROUP_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_GROUP_ID"]->GetValue())) 
            $this->cp["P_SERVICE_GROUP_ID"]->SetValue($this->P_SERVICE_GROUP_ID->GetValue(true));
        if (!is_null($this->cp["P_CHARGING_METHOD_ID"]->GetValue()) and !strlen($this->cp["P_CHARGING_METHOD_ID"]->GetText()) and !is_bool($this->cp["P_CHARGING_METHOD_ID"]->GetValue())) 
            $this->cp["P_CHARGING_METHOD_ID"]->SetValue($this->P_CHARGING_METHOD_ID->GetValue(true));
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue(true))) 
            $this->cp["VALID_FROM"]->SetText(0-00-0000);
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        $this->SQL = "UPDATE P_SERVICE_TYPE SET \n" .
        "CODE='" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "',\n" .
        "SERVICE_NAME='" . $this->SQLValue($this->cp["SERVICE_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "LISTING_NO=" . $this->SQLValue($this->cp["LISTING_NO"]->GetDBValue(), ccsFloat) . ",\n" .
        "P_SERVICE_GROUP_ID=" . $this->SQLValue($this->cp["P_SERVICE_GROUP_ID"]->GetDBValue(), ccsText) . ",\n" .
        "P_CHARGING_METHOD_ID=" . $this->SQLValue($this->cp["P_CHARGING_METHOD_ID"]->GetDBValue(), ccsText) . ",\n" .
        "VALID_FROM='" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "',\n" .
        "VALID_TO='" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsText) . "',\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATE_DATE=sysdate,\n" .
        "UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE  P_SERVICE_TYPE_ID = " . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @44-99CABE58
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_SERVICE_TYPE WHERE P_SERVICE_TYPE_ID = " . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_service_type1DataSource Class @44-FCB6E20C

//Initialize Page @1-B3D93D5C
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
$TemplateFileName = "p_service_type.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-6BD0DBF9
include_once("./p_service_type_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-A25465E2
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_SERVICE_TYPE = & new clsGridP_SERVICE_TYPE("", $MainPage);
$P_SERVICE_TYPESearch = & new clsRecordP_SERVICE_TYPESearch("", $MainPage);
$p_service_type1 = & new clsRecordp_service_type1("", $MainPage);
$MainPage->P_SERVICE_TYPE = & $P_SERVICE_TYPE;
$MainPage->P_SERVICE_TYPESearch = & $P_SERVICE_TYPESearch;
$MainPage->p_service_type1 = & $p_service_type1;
$P_SERVICE_TYPE->Initialize();
$p_service_type1->Initialize();

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

//Execute Components @1-17AD1596
$P_SERVICE_TYPESearch->Operation();
$p_service_type1->Operation();
//End Execute Components

//Go to destination page @1-66BEC01E
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_SERVICE_TYPE);
    unset($P_SERVICE_TYPESearch);
    unset($p_service_type1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-2662BC7A
$P_SERVICE_TYPE->Show();
$P_SERVICE_TYPESearch->Show();
$p_service_type1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-2EF342A4
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_SERVICE_TYPE);
unset($P_SERVICE_TYPESearch);
unset($p_service_type1);
unset($Tpl);
//End Unload Page


?>
