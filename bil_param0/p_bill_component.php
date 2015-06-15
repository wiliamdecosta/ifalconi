<?php
//Include Common Files @1-82E2E6A7
define("RelativePath", "..");
define("PathToCurrentPage", "/param/");
define("FileName", "p_bill_component.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_BILL_COMPONENT { //P_BILL_COMPONENT class @2-8460070C

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

//Class_Initialize Event @2-5F86CB41
    function clsGridP_BILL_COMPONENT($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_BILL_COMPONENT";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_BILL_COMPONENT";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_BILL_COMPONENTDataSource($this);
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

        $this->P_BILL_COMPONENT_ID = & new clsControl(ccsLink, "P_BILL_COMPONENT_ID", "P_BILL_COMPONENT_ID", ccsFloat, "", CCGetRequestParam("P_BILL_COMPONENT_ID", ccsGet, NULL), $this);
        $this->P_BILL_COMPONENT_ID->Page = "p_bill_component.php";
        $this->CODE = & new clsControl(ccsLabel, "CODE", "CODE", ccsText, "", CCGetRequestParam("CODE", ccsGet, NULL), $this);
        $this->COMPONENT_LABEL = & new clsControl(ccsLabel, "COMPONENT_LABEL", "COMPONENT_LABEL", ccsText, "", CCGetRequestParam("COMPONENT_LABEL", ccsGet, NULL), $this);
        $this->DISPLAY_ORDER = & new clsControl(ccsLabel, "DISPLAY_ORDER", "DISPLAY_ORDER", ccsFloat, "", CCGetRequestParam("DISPLAY_ORDER", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->CREATION_DATE = & new clsControl(ccsLabel, "CREATION_DATE", "CREATION_DATE", ccsDate, $DefaultDateFormat, CCGetRequestParam("CREATION_DATE", ccsGet, NULL), $this);
        $this->CREATED_BY = & new clsControl(ccsLabel, "CREATED_BY", "CREATED_BY", ccsText, "", CCGetRequestParam("CREATED_BY", ccsGet, NULL), $this);
        $this->UPDATED_DATE = & new clsControl(ccsLabel, "UPDATED_DATE", "UPDATED_DATE", ccsDate, $DefaultDateFormat, CCGetRequestParam("UPDATED_DATE", ccsGet, NULL), $this);
        $this->UPDATED_BY = & new clsControl(ccsLabel, "UPDATED_BY", "UPDATED_BY", ccsText, "", CCGetRequestParam("UPDATED_BY", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_bill_component.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_bill_component.php";
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this,"P_BILL_COMPONENT_ID");
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_BILL_COMPONENT_Insert = & new clsControl(ccsLink, "P_BILL_COMPONENT_Insert", "P_BILL_COMPONENT_Insert", ccsText, "", CCGetRequestParam("P_BILL_COMPONENT_Insert", ccsGet, NULL), $this);
        $this->P_BILL_COMPONENT_Insert->Page = "p_bill_component.php";
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

//Show Method @2-1ADC4050
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
            $this->ControlsVisible["COMPONENT_LABEL"] = $this->COMPONENT_LABEL->Visible;
            $this->ControlsVisible["DISPLAY_ORDER"] = $this->DISPLAY_ORDER->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["CREATION_DATE"] = $this->CREATION_DATE->Visible;
            $this->ControlsVisible["CREATED_BY"] = $this->CREATED_BY->Visible;
            $this->ControlsVisible["UPDATED_DATE"] = $this->UPDATED_DATE->Visible;
            $this->ControlsVisible["UPDATED_BY"] = $this->UPDATED_BY->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_BILL_COMPONENT_ID"] = $this->P_BILL_COMPONENT_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->COMPONENT_LABEL->SetValue($this->DataSource->COMPONENT_LABEL->GetValue());
                $this->DISPLAY_ORDER->SetValue($this->DataSource->DISPLAY_ORDER->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                $this->UPDATED_DATE->SetValue($this->DataSource->UPDATED_DATE->GetValue());
                $this->UPDATED_BY->SetValue($this->DataSource->UPDATED_BY->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_BILL_COMPONENT_ID", $this->DataSource->f("P_BILL_COMPONENT_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_BILL_COMPONENT_ID", $this->DataSource->f("P_BILL_COMPONENT_ID"));
                $this->P_BILL_COMPONENT_ID->SetValue($this->DataSource->P_BILL_COMPONENT_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->COMPONENT_LABEL->Show();
                $this->DISPLAY_ORDER->Show();
                $this->DESCRIPTION->Show();
                $this->CREATION_DATE->Show();
                $this->CREATED_BY->Show();
                $this->UPDATED_DATE->Show();
                $this->UPDATED_BY->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_BILL_COMPONENT_ID->Show();
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
        $this->P_BILL_COMPONENT_Insert->Parameters = CCGetQueryString("QueryString", array("P_BILL_COMPONENT_ID", "ccsForm"));
        $this->P_BILL_COMPONENT_Insert->Parameters = CCAddParam($this->P_BILL_COMPONENT_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_BILL_COMPONENT_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-62801EB5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->COMPONENT_LABEL->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DISPLAY_ORDER->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CREATION_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CREATED_BY->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UPDATED_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UPDATED_BY->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_BILL_COMPONENT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_BILL_COMPONENT Class @2-FCB6E20C

class clsP_BILL_COMPONENTDataSource extends clsDBConn {  //P_BILL_COMPONENTDataSource Class @2-6AE176B1

//DataSource Variables @2-659BBB64
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $COMPONENT_LABEL;
    var $DISPLAY_ORDER;
    var $DESCRIPTION;
    var $CREATION_DATE;
    var $CREATED_BY;
    var $UPDATED_DATE;
    var $UPDATED_BY;
    var $DLink;
    var $ADLink;
    var $P_BILL_COMPONENT_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-934819DB
    function clsP_BILL_COMPONENTDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_BILL_COMPONENT";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->COMPONENT_LABEL = new clsField("COMPONENT_LABEL", ccsText, "");
        
        $this->DISPLAY_ORDER = new clsField("DISPLAY_ORDER", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->UPDATED_DATE = new clsField("UPDATED_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATED_BY = new clsField("UPDATED_BY", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_BILL_COMPONENT_ID = new clsField("P_BILL_COMPONENT_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-0F979A77
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "P_BILL_COMPONENT_ID";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-F037FBA6
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("3", "urls_keyword", ccsFloat, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("4", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "CODE", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "COMPONENT_LABEL", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "DISPLAY_ORDER", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsFloat),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "DESCRIPTION", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->Where = $this->wp->opOR(
             true, $this->wp->opOR(
             false, $this->wp->opOR(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]);
    }
//End Prepare Method

//Open Method @2-544FD05F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM p_bill_component";
        $this->SQL = "SELECT P_BILL_COMPONENT_ID, CODE, COMPONENT_LABEL, DISPLAY_ORDER, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY \n\n" .
        "FROM p_bill_component {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @2-BBB3D555
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->COMPONENT_LABEL->SetDBValue($this->f("COMPONENT_LABEL"));
        $this->DISPLAY_ORDER->SetDBValue(trim($this->f("DISPLAY_ORDER")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->UPDATED_DATE->SetDBValue(trim($this->f("UPDATED_DATE")));
        $this->UPDATED_BY->SetDBValue($this->f("UPDATED_BY"));
        $this->DLink->SetDBValue($this->f("P_BILL_COMPONENT_ID"));
        $this->ADLink->SetDBValue($this->f("P_BILL_COMPONENT_ID"));
        $this->P_BILL_COMPONENT_ID->SetDBValue(trim($this->f("P_BILL_COMPONENT_ID")));
    }
//End SetValues Method

} //End P_BILL_COMPONENTDataSource Class @2-FCB6E20C

class clsRecordP_BILL_COMPONENTSearch { //P_BILL_COMPONENTSearch Class @3-1CA46551

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

//Class_Initialize Event @3-59C3A8D0
    function clsRecordP_BILL_COMPONENTSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_BILL_COMPONENTSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_BILL_COMPONENTSearch";
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

//Operation Method @3-94287C76
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
        $Redirect = "p_bill_component.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_bill_component.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End P_BILL_COMPONENTSearch Class @3-FCB6E20C

class clsRecordp_bill_component1 { //p_bill_component1 Class @40-231ACBDF

//Variables @40-D6FF3E86

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

//Class_Initialize Event @40-19133E43
    function clsRecordp_bill_component1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_bill_component1/Error";
        $this->DataSource = new clsp_bill_component1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_bill_component1";
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
            $this->COMPONENT_LABEL = & new clsControl(ccsTextBox, "COMPONENT_LABEL", "COMPONENT LABEL", ccsText, "", CCGetRequestParam("COMPONENT_LABEL", $Method, NULL), $this);
            $this->COMPONENT_LABEL->Required = true;
            $this->DISPLAY_ORDER = & new clsControl(ccsTextBox, "DISPLAY_ORDER", "DISPLAY ORDER", ccsFloat, "", CCGetRequestParam("DISPLAY_ORDER", $Method, NULL), $this);
            $this->DISPLAY_ORDER->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->CREATED_BY = & new clsControl(ccsTextBox, "CREATED_BY", "CREATED BY", ccsText, "", CCGetRequestParam("CREATED_BY", $Method, NULL), $this);
            $this->CREATED_BY->Required = true;
            $this->UPDATED_BY = & new clsControl(ccsTextBox, "UPDATED_BY", "UPDATED BY", ccsText, "", CCGetRequestParam("UPDATED_BY", $Method, NULL), $this);
            $this->UPDATED_BY->Required = true;
            $this->CREATION_DATE = & new clsControl(ccsTextBox, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", $Method, NULL), $this);
            $this->CREATION_DATE->Required = true;
            $this->UPDATED_DATE = & new clsControl(ccsTextBox, "UPDATED_DATE", "UPDATED DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATED_DATE", $Method, NULL), $this);
            $this->UPDATED_DATE->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->P_BILL_COMPONENT_ID = & new clsControl(ccsHidden, "P_BILL_COMPONENT_ID", "P_BILL_COMPONENT_ID", ccsText, "", CCGetRequestParam("P_BILL_COMPONENT_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->CREATED_BY->Value) && !strlen($this->CREATED_BY->Value) && $this->CREATED_BY->Value !== false)
                    $this->CREATED_BY->SetText(CCGetUserLogin());
                if(!is_array($this->UPDATED_BY->Value) && !strlen($this->UPDATED_BY->Value) && $this->UPDATED_BY->Value !== false)
                    $this->UPDATED_BY->SetText(CCGetUserLogin());
                if(!is_array($this->CREATION_DATE->Value) && !strlen($this->CREATION_DATE->Value) && $this->CREATION_DATE->Value !== false)
                    $this->CREATION_DATE->SetText(date("d-M-Y"));
                if(!is_array($this->UPDATED_DATE->Value) && !strlen($this->UPDATED_DATE->Value) && $this->UPDATED_DATE->Value !== false)
                    $this->UPDATED_DATE->SetText(date("d-M-Y"));
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @40-BA3E6BF0
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_BILL_COMPONENT_ID"] = CCGetFromGet("P_BILL_COMPONENT_ID", NULL);
    }
//End Initialize Method

//Validate Method @40-C8AA87A4
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->COMPONENT_LABEL->Validate() && $Validation);
        $Validation = ($this->DISPLAY_ORDER->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->CREATED_BY->Validate() && $Validation);
        $Validation = ($this->UPDATED_BY->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATED_DATE->Validate() && $Validation);
        $Validation = ($this->P_BILL_COMPONENT_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->COMPONENT_LABEL->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DISPLAY_ORDER->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILL_COMPONENT_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @40-90E51F51
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->COMPONENT_LABEL->Errors->Count());
        $errors = ($errors || $this->DISPLAY_ORDER->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->CREATED_BY->Errors->Count());
        $errors = ($errors || $this->UPDATED_BY->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATED_DATE->Errors->Count());
        $errors = ($errors || $this->P_BILL_COMPONENT_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @40-ED598703
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

//Operation Method @40-872C026F
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
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_AR_SEGMENTPage"));
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
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG"));
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

//InsertRow Method @40-8B3BAC82
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->COMPONENT_LABEL->SetValue($this->COMPONENT_LABEL->GetValue(true));
        $this->DataSource->DISPLAY_ORDER->SetValue($this->DISPLAY_ORDER->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CREATED_BY->SetValue($this->CREATED_BY->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @40-D7A00190
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->COMPONENT_LABEL->SetValue($this->COMPONENT_LABEL->GetValue(true));
        $this->DataSource->DISPLAY_ORDER->SetValue($this->DISPLAY_ORDER->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->P_BILL_COMPONENT_ID->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @40-240E966E
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_BILL_COMPONENT_ID->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @40-55DBB8CC
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
                    $this->COMPONENT_LABEL->SetValue($this->DataSource->COMPONENT_LABEL->GetValue());
                    $this->DISPLAY_ORDER->SetValue($this->DataSource->DISPLAY_ORDER->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->UPDATED_BY->SetValue($this->DataSource->UPDATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATED_DATE->SetValue($this->DataSource->UPDATED_DATE->GetValue());
                    $this->P_BILL_COMPONENT_ID->SetValue($this->DataSource->P_BILL_COMPONENT_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->COMPONENT_LABEL->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DISPLAY_ORDER->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_DATE->Errors->ToString());
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

        $this->CODE->Show();
        $this->COMPONENT_LABEL->Show();
        $this->DISPLAY_ORDER->Show();
        $this->DESCRIPTION->Show();
        $this->CREATED_BY->Show();
        $this->UPDATED_BY->Show();
        $this->CREATION_DATE->Show();
        $this->UPDATED_DATE->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->P_BILL_COMPONENT_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_bill_component1 Class @40-FCB6E20C

class clsp_bill_component1DataSource extends clsDBConn {  //p_bill_component1DataSource Class @40-1205AB69

//DataSource Variables @40-BDADDDF4
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
    var $COMPONENT_LABEL;
    var $DISPLAY_ORDER;
    var $DESCRIPTION;
    var $CREATED_BY;
    var $UPDATED_BY;
    var $CREATION_DATE;
    var $UPDATED_DATE;
    var $P_BILL_COMPONENT_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @40-AD6441F0
    function clsp_bill_component1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_bill_component1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->COMPONENT_LABEL = new clsField("COMPONENT_LABEL", ccsText, "");
        
        $this->DISPLAY_ORDER = new clsField("DISPLAY_ORDER", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->UPDATED_BY = new clsField("UPDATED_BY", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATED_DATE = new clsField("UPDATED_DATE", ccsDate, $this->DateFormat);
        
        $this->P_BILL_COMPONENT_ID = new clsField("P_BILL_COMPONENT_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @40-B478A194
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_BILL_COMPONENT_ID", ccsFloat, "", "", $this->Parameters["urlP_BILL_COMPONENT_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_BILL_COMPONENT_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @40-E9132839
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM p_bill_component {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @40-76652C6A
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->COMPONENT_LABEL->SetDBValue($this->f("COMPONENT_LABEL"));
        $this->DISPLAY_ORDER->SetDBValue(trim($this->f("DISPLAY_ORDER")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->UPDATED_BY->SetDBValue($this->f("UPDATED_BY"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->UPDATED_DATE->SetDBValue(trim($this->f("UPDATED_DATE")));
        $this->P_BILL_COMPONENT_ID->SetDBValue($this->f("P_BILL_COMPONENT_ID"));
    }
//End SetValues Method

//Insert Method @40-3F8ACDAA
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["COMPONENT_LABEL"] = new clsSQLParameter("ctrlCOMPONENT_LABEL", ccsText, "", "", $this->COMPONENT_LABEL->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DISPLAY_ORDER"] = new clsSQLParameter("ctrlDISPLAY_ORDER", ccsFloat, "", "", $this->DISPLAY_ORDER->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("ctrlCREATED_BY", ccsText, "", "", $this->CREATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["COMPONENT_LABEL"]->GetValue()) and !strlen($this->cp["COMPONENT_LABEL"]->GetText()) and !is_bool($this->cp["COMPONENT_LABEL"]->GetValue())) 
            $this->cp["COMPONENT_LABEL"]->SetValue($this->COMPONENT_LABEL->GetValue(true));
        if (!is_null($this->cp["DISPLAY_ORDER"]->GetValue()) and !strlen($this->cp["DISPLAY_ORDER"]->GetText()) and !is_bool($this->cp["DISPLAY_ORDER"]->GetValue())) 
            $this->cp["DISPLAY_ORDER"]->SetValue($this->DISPLAY_ORDER->GetValue(true));
        if (!strlen($this->cp["DISPLAY_ORDER"]->GetText()) and !is_bool($this->cp["DISPLAY_ORDER"]->GetValue(true))) 
            $this->cp["DISPLAY_ORDER"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue($this->CREATED_BY->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_BILL_COMPONENT(P_BILL_COMPONENT_ID,CODE,COMPONENT_LABEL,DISPLAY_ORDER,DESCRIPTION,CREATION_DATE,CREATED_BY,UPDATED_DATE,UPDATED_BY)\n" .
        "VALUES\n" .
        "(GENERATE_ID('TRB','P_BILL_COMPONENT','P_BILL_COMPONENT_ID'),'" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["COMPONENT_LABEL"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["DISPLAY_ORDER"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate,'" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "',sysdate,'" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @40-26D4F048
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["COMPONENT_LABEL"] = new clsSQLParameter("ctrlCOMPONENT_LABEL", ccsText, "", "", $this->COMPONENT_LABEL->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DISPLAY_ORDER"] = new clsSQLParameter("ctrlDISPLAY_ORDER", ccsFloat, "", "", $this->DISPLAY_ORDER->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILL_COMPONENT_ID"] = new clsSQLParameter("ctrlP_BILL_COMPONENT_ID", ccsFloat, "", "", $this->P_BILL_COMPONENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["COMPONENT_LABEL"]->GetValue()) and !strlen($this->cp["COMPONENT_LABEL"]->GetText()) and !is_bool($this->cp["COMPONENT_LABEL"]->GetValue())) 
            $this->cp["COMPONENT_LABEL"]->SetValue($this->COMPONENT_LABEL->GetValue(true));
        if (!is_null($this->cp["DISPLAY_ORDER"]->GetValue()) and !strlen($this->cp["DISPLAY_ORDER"]->GetText()) and !is_bool($this->cp["DISPLAY_ORDER"]->GetValue())) 
            $this->cp["DISPLAY_ORDER"]->SetValue($this->DISPLAY_ORDER->GetValue(true));
        if (!strlen($this->cp["DISPLAY_ORDER"]->GetText()) and !is_bool($this->cp["DISPLAY_ORDER"]->GetValue(true))) 
            $this->cp["DISPLAY_ORDER"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        if (!is_null($this->cp["P_BILL_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        if (!strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue(true))) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetText(0);
        $this->SQL = "UPDATE P_BILL_COMPONENT SET \n" .
        "CODE=INITCAP(TRIM('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "')),\n" .
        "COMPONENT_LABEL=INITCAP(TRIM('" . $this->SQLValue($this->cp["COMPONENT_LABEL"]->GetDBValue(), ccsText) . "')),\n" .
        "DISPLAY_ORDER=" . $this->SQLValue($this->cp["DISPLAY_ORDER"]->GetDBValue(), ccsFloat) . ",\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATED_DATE=sysdate,\n" .
        "UPDATED_BY='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE  P_BILL_COMPONENT_ID = " . $this->SQLValue($this->cp["P_BILL_COMPONENT_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @40-65937CA0
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_BILL_COMPONENT_ID"] = new clsSQLParameter("ctrlP_BILL_COMPONENT_ID", ccsFloat, "", "", $this->P_BILL_COMPONENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_BILL_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        if (!strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue(true))) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_BILL_COMPONENT WHERE P_BILL_COMPONENT_ID = " . $this->SQLValue($this->cp["P_BILL_COMPONENT_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_bill_component1DataSource Class @40-FCB6E20C

//Initialize Page @1-8B7F0C05
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
$TemplateFileName = "p_bill_component.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-1BE5E0DF
include_once("./p_bill_component_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-FE0091FE
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_BILL_COMPONENT = & new clsGridP_BILL_COMPONENT("", $MainPage);
$P_BILL_COMPONENTSearch = & new clsRecordP_BILL_COMPONENTSearch("", $MainPage);
$p_bill_component1 = & new clsRecordp_bill_component1("", $MainPage);
$MainPage->P_BILL_COMPONENT = & $P_BILL_COMPONENT;
$MainPage->P_BILL_COMPONENTSearch = & $P_BILL_COMPONENTSearch;
$MainPage->p_bill_component1 = & $p_bill_component1;
$P_BILL_COMPONENT->Initialize();
$p_bill_component1->Initialize();

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

//Execute Components @1-834BED5F
$P_BILL_COMPONENTSearch->Operation();
$p_bill_component1->Operation();
//End Execute Components

//Go to destination page @1-B28C4AF4
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_BILL_COMPONENT);
    unset($P_BILL_COMPONENTSearch);
    unset($p_bill_component1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-A5509867
$P_BILL_COMPONENT->Show();
$P_BILL_COMPONENTSearch->Show();
$p_bill_component1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-AEB396D1
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_BILL_COMPONENT);
unset($P_BILL_COMPONENTSearch);
unset($p_bill_component1);
unset($Tpl);
//End Unload Page


?>
