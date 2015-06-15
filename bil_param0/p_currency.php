<?php
//Include Common Files @1-13BBA7C8
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_currency.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_CURRENCY { //P_CURRENCY class @2-0C506923

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

//Class_Initialize Event @2-B6C3F3CA
    function clsGridP_CURRENCY($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_CURRENCY";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_CURRENCY";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_CURRENCYDataSource($this);
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
        $this->CURRENCY_LABEL = & new clsControl(ccsLabel, "CURRENCY_LABEL", "CURRENCY_LABEL", ccsText, "", CCGetRequestParam("CURRENCY_LABEL", ccsGet, NULL), $this);
        $this->DIGIT_POINT = & new clsControl(ccsLabel, "DIGIT_POINT", "DIGIT_POINT", ccsFloat, "", CCGetRequestParam("DIGIT_POINT", ccsGet, NULL), $this);
        $this->ROUND_UNIT = & new clsControl(ccsLabel, "ROUND_UNIT", "ROUND_UNIT", ccsFloat, "", CCGetRequestParam("ROUND_UNIT", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_currency.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_currency.php";
        $this->P_CURRENCY_ID = & new clsControl(ccsHidden, "P_CURRENCY_ID", "P_CURRENCY_ID", ccsFloat, "", CCGetRequestParam("P_CURRENCY_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this,"P_CURRENCY_ID");
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_CURRENCY_Insert = & new clsControl(ccsLink, "P_CURRENCY_Insert", "P_CURRENCY_Insert", ccsText, "", CCGetRequestParam("P_CURRENCY_Insert", ccsGet, NULL), $this);
        $this->P_CURRENCY_Insert->Page = "p_currency.php";
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

//Show Method @2-DACCF91B
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
            $this->ControlsVisible["CURRENCY_LABEL"] = $this->CURRENCY_LABEL->Visible;
            $this->ControlsVisible["DIGIT_POINT"] = $this->DIGIT_POINT->Visible;
            $this->ControlsVisible["ROUND_UNIT"] = $this->ROUND_UNIT->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_CURRENCY_ID"] = $this->P_CURRENCY_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->CURRENCY_LABEL->SetValue($this->DataSource->CURRENCY_LABEL->GetValue());
                $this->DIGIT_POINT->SetValue($this->DataSource->DIGIT_POINT->GetValue());
                $this->ROUND_UNIT->SetValue($this->DataSource->ROUND_UNIT->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_CURRENCY_ID", $this->DataSource->f("P_CURRENCY_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_CURRENCY_ID", $this->DataSource->f("P_CURRENCY_ID"));
                $this->P_CURRENCY_ID->SetValue($this->DataSource->P_CURRENCY_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->CURRENCY_LABEL->Show();
                $this->DIGIT_POINT->Show();
                $this->ROUND_UNIT->Show();
                $this->DESCRIPTION->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_CURRENCY_ID->Show();
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
        $this->P_CURRENCY_Insert->Parameters = CCGetQueryString("QueryString", array("P_CURRENCY_ID", "ccsForm"));
        $this->P_CURRENCY_Insert->Parameters = CCAddParam($this->P_CURRENCY_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_CURRENCY_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-99D5CF03
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CURRENCY_LABEL->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DIGIT_POINT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ROUND_UNIT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_CURRENCY_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_CURRENCY Class @2-FCB6E20C

class clsP_CURRENCYDataSource extends clsDBConn {  //P_CURRENCYDataSource Class @2-597A4406

//DataSource Variables @2-6C7A334B
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $CURRENCY_LABEL;
    var $DIGIT_POINT;
    var $ROUND_UNIT;
    var $DESCRIPTION;
    var $DLink;
    var $ADLink;
    var $P_CURRENCY_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-B7C4DFC1
    function clsP_CURRENCYDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_CURRENCY";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->CURRENCY_LABEL = new clsField("CURRENCY_LABEL", ccsText, "");
        
        $this->DIGIT_POINT = new clsField("DIGIT_POINT", ccsFloat, "");
        
        $this->ROUND_UNIT = new clsField("ROUND_UNIT", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_CURRENCY_ID = new clsField("P_CURRENCY_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-A45567E2
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "P_CURRENCY_ID";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-5084DE21
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("3", "urls_keyword", ccsFloat, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("4", "urls_keyword", ccsFloat, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("5", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "CODE", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "CURRENCY_LABEL", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "DIGIT_POINT", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsFloat),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "ROUND_UNIT", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsFloat),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opContains, "DESCRIPTION", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsText),false);
        $this->Where = $this->wp->opOR(
             true, $this->wp->opOR(
             false, $this->wp->opOR(
             false, $this->wp->opOR(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]);
    }
//End Prepare Method

//Open Method @2-368544B2
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM p_currency";
        $this->SQL = "SELECT P_CURRENCY_ID, CODE, CURRENCY_LABEL, DIGIT_POINT, ROUND_UNIT, DESCRIPTION \n\n" .
        "FROM p_currency {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @2-48D1B50D
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->CURRENCY_LABEL->SetDBValue($this->f("CURRENCY_LABEL"));
        $this->DIGIT_POINT->SetDBValue(trim($this->f("DIGIT_POINT")));
        $this->ROUND_UNIT->SetDBValue(trim($this->f("ROUND_UNIT")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->DLink->SetDBValue($this->f("P_CURRENCY_ID"));
        $this->ADLink->SetDBValue($this->f("P_CURRENCY_ID"));
        $this->P_CURRENCY_ID->SetDBValue(trim($this->f("P_CURRENCY_ID")));
    }
//End SetValues Method

} //End P_CURRENCYDataSource Class @2-FCB6E20C

class clsRecordP_CURRENCYSearch { //P_CURRENCYSearch Class @3-A9B1B035

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

//Class_Initialize Event @3-68440ED3
    function clsRecordP_CURRENCYSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_CURRENCYSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_CURRENCYSearch";
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

//Operation Method @3-40876941
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
        $Redirect = "p_currency.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_currency.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End P_CURRENCYSearch Class @3-FCB6E20C

class clsRecordp_currency1 { //p_currency1 Class @32-0CF8A415

//Variables @32-D6FF3E86

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

//Class_Initialize Event @32-82C1CC3E
    function clsRecordp_currency1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_currency1/Error";
        $this->DataSource = new clsp_currency1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_currency1";
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
            $this->CURRENCY_LABEL = & new clsControl(ccsTextBox, "CURRENCY_LABEL", "CURRENCY LABEL", ccsText, "", CCGetRequestParam("CURRENCY_LABEL", $Method, NULL), $this);
            $this->CURRENCY_LABEL->Required = true;
            $this->DIGIT_POINT = & new clsControl(ccsTextBox, "DIGIT_POINT", "DIGIT POINT", ccsFloat, "", CCGetRequestParam("DIGIT_POINT", $Method, NULL), $this);
            $this->DIGIT_POINT->Required = true;
            $this->ROUND_UNIT = & new clsControl(ccsTextBox, "ROUND_UNIT", "ROUND UNIT", ccsFloat, "", CCGetRequestParam("ROUND_UNIT", $Method, NULL), $this);
            $this->ROUND_UNIT->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextBox, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->CREATED_BY = & new clsControl(ccsTextBox, "CREATED_BY", "CREATED BY", ccsText, "", CCGetRequestParam("CREATED_BY", $Method, NULL), $this);
            $this->CREATED_BY->Required = true;
            $this->UPDATED_BY = & new clsControl(ccsTextBox, "UPDATED_BY", "UPDATED BY", ccsText, "", CCGetRequestParam("UPDATED_BY", $Method, NULL), $this);
            $this->UPDATED_BY->Required = true;
            $this->CREATION_DATE = & new clsControl(ccsTextBox, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", $Method, NULL), $this);
            $this->CREATION_DATE->Required = true;
            $this->UPDATED_DATE = & new clsControl(ccsTextBox, "UPDATED_DATE", "UPDATED DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATED_DATE", $Method, NULL), $this);
            $this->UPDATED_DATE->Required = true;
            $this->Button_Insert1 = & new clsButton("Button_Insert1", $Method, $this);
            $this->Button_Update1 = & new clsButton("Button_Update1", $Method, $this);
            $this->Button_Delete1 = & new clsButton("Button_Delete1", $Method, $this);
            $this->Button_Cancel1 = & new clsButton("Button_Cancel1", $Method, $this);
            $this->P_CURRENCY_ID = & new clsControl(ccsHidden, "P_CURRENCY_ID", "P_CURRENCY_ID", ccsText, "", CCGetRequestParam("P_CURRENCY_ID", $Method, NULL), $this);
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

//Initialize Method @32-92BAF020
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_CURRENCY_ID"] = CCGetFromGet("P_CURRENCY_ID", NULL);
    }
//End Initialize Method

//Validate Method @32-71F3ACDC
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->CURRENCY_LABEL->Validate() && $Validation);
        $Validation = ($this->DIGIT_POINT->Validate() && $Validation);
        $Validation = ($this->ROUND_UNIT->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->CREATED_BY->Validate() && $Validation);
        $Validation = ($this->UPDATED_BY->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATED_DATE->Validate() && $Validation);
        $Validation = ($this->P_CURRENCY_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CURRENCY_LABEL->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DIGIT_POINT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ROUND_UNIT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CURRENCY_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @32-A424DC18
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->CURRENCY_LABEL->Errors->Count());
        $errors = ($errors || $this->DIGIT_POINT->Errors->Count());
        $errors = ($errors || $this->ROUND_UNIT->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->CREATED_BY->Errors->Count());
        $errors = ($errors || $this->UPDATED_BY->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATED_DATE->Errors->Count());
        $errors = ($errors || $this->P_CURRENCY_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @32-ED598703
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

//Operation Method @32-9EABF5E0
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
            $this->PressedButton = $this->EditMode ? "Button_Update1" : "Button_Insert1";
            if($this->Button_Insert1->Pressed) {
                $this->PressedButton = "Button_Insert1";
            } else if($this->Button_Update1->Pressed) {
                $this->PressedButton = "Button_Update1";
            } else if($this->Button_Delete1->Pressed) {
                $this->PressedButton = "Button_Delete1";
            } else if($this->Button_Cancel1->Pressed) {
                $this->PressedButton = "Button_Cancel1";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete1") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
            if(!CCGetEvent($this->Button_Delete1->CCSEvents, "OnClick", $this->Button_Delete1) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel1") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_AR_SEGMENTPage"));
            if(!CCGetEvent($this->Button_Cancel1->CCSEvents, "OnClick", $this->Button_Cancel1)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert1") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
                if(!CCGetEvent($this->Button_Insert1->CCSEvents, "OnClick", $this->Button_Insert1) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update1") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG"));
                if(!CCGetEvent($this->Button_Update1->CCSEvents, "OnClick", $this->Button_Update1) || !$this->UpdateRow()) {
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

//InsertRow Method @32-A675310E
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->CURRENCY_LABEL->SetValue($this->CURRENCY_LABEL->GetValue(true));
        $this->DataSource->DIGIT_POINT->SetValue($this->DIGIT_POINT->GetValue(true));
        $this->DataSource->ROUND_UNIT->SetValue($this->ROUND_UNIT->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CREATED_BY->SetValue($this->CREATED_BY->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @32-DA8D4468
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CURRENCY_LABEL->SetValue($this->CURRENCY_LABEL->GetValue(true));
        $this->DataSource->DIGIT_POINT->SetValue($this->DIGIT_POINT->GetValue(true));
        $this->DataSource->ROUND_UNIT->SetValue($this->ROUND_UNIT->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->P_CURRENCY_ID->SetValue($this->P_CURRENCY_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @32-33A729C0
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_CURRENCY_ID->SetValue($this->P_CURRENCY_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @32-F5060DC9
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
                    $this->CURRENCY_LABEL->SetValue($this->DataSource->CURRENCY_LABEL->GetValue());
                    $this->DIGIT_POINT->SetValue($this->DataSource->DIGIT_POINT->GetValue());
                    $this->ROUND_UNIT->SetValue($this->DataSource->ROUND_UNIT->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->UPDATED_BY->SetValue($this->DataSource->UPDATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATED_DATE->SetValue($this->DataSource->UPDATED_DATE->GetValue());
                    $this->P_CURRENCY_ID->SetValue($this->DataSource->P_CURRENCY_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CURRENCY_LABEL->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DIGIT_POINT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ROUND_UNIT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CURRENCY_ID->Errors->ToString());
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
        $this->Button_Insert1->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update1->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete1->Visible = $this->EditMode && $this->DeleteAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->CODE->Show();
        $this->CURRENCY_LABEL->Show();
        $this->DIGIT_POINT->Show();
        $this->ROUND_UNIT->Show();
        $this->DESCRIPTION->Show();
        $this->CREATED_BY->Show();
        $this->UPDATED_BY->Show();
        $this->CREATION_DATE->Show();
        $this->UPDATED_DATE->Show();
        $this->Button_Insert1->Show();
        $this->Button_Update1->Show();
        $this->Button_Delete1->Show();
        $this->Button_Cancel1->Show();
        $this->P_CURRENCY_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_currency1 Class @32-FCB6E20C

class clsp_currency1DataSource extends clsDBConn {  //p_currency1DataSource Class @32-B053AD6F

//DataSource Variables @32-5B191D2A
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
    var $CURRENCY_LABEL;
    var $DIGIT_POINT;
    var $ROUND_UNIT;
    var $DESCRIPTION;
    var $CREATED_BY;
    var $UPDATED_BY;
    var $CREATION_DATE;
    var $UPDATED_DATE;
    var $P_CURRENCY_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @32-D8EAA847
    function clsp_currency1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_currency1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->CURRENCY_LABEL = new clsField("CURRENCY_LABEL", ccsText, "");
        
        $this->DIGIT_POINT = new clsField("DIGIT_POINT", ccsFloat, "");
        
        $this->ROUND_UNIT = new clsField("ROUND_UNIT", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->UPDATED_BY = new clsField("UPDATED_BY", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATED_DATE = new clsField("UPDATED_DATE", ccsDate, $this->DateFormat);
        
        $this->P_CURRENCY_ID = new clsField("P_CURRENCY_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @32-FA6CE9C3
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_CURRENCY_ID", ccsFloat, "", "", $this->Parameters["urlP_CURRENCY_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_CURRENCY_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @32-5542EAC9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM p_currency {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @32-22555AF6
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->CURRENCY_LABEL->SetDBValue($this->f("CURRENCY_LABEL"));
        $this->DIGIT_POINT->SetDBValue(trim($this->f("DIGIT_POINT")));
        $this->ROUND_UNIT->SetDBValue(trim($this->f("ROUND_UNIT")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->UPDATED_BY->SetDBValue($this->f("UPDATED_BY"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->UPDATED_DATE->SetDBValue(trim($this->f("UPDATED_DATE")));
        $this->P_CURRENCY_ID->SetDBValue($this->f("P_CURRENCY_ID"));
    }
//End SetValues Method

//Insert Method @32-0E8822DE
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CURRENCY_LABEL"] = new clsSQLParameter("ctrlCURRENCY_LABEL", ccsText, "", "", $this->CURRENCY_LABEL->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DIGIT_POINT"] = new clsSQLParameter("ctrlDIGIT_POINT", ccsFloat, "", "", $this->DIGIT_POINT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["ROUND_UNIT"] = new clsSQLParameter("ctrlROUND_UNIT", ccsFloat, "", "", $this->ROUND_UNIT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("ctrlCREATED_BY", ccsText, "", "", $this->CREATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["CURRENCY_LABEL"]->GetValue()) and !strlen($this->cp["CURRENCY_LABEL"]->GetText()) and !is_bool($this->cp["CURRENCY_LABEL"]->GetValue())) 
            $this->cp["CURRENCY_LABEL"]->SetValue($this->CURRENCY_LABEL->GetValue(true));
        if (!is_null($this->cp["DIGIT_POINT"]->GetValue()) and !strlen($this->cp["DIGIT_POINT"]->GetText()) and !is_bool($this->cp["DIGIT_POINT"]->GetValue())) 
            $this->cp["DIGIT_POINT"]->SetValue($this->DIGIT_POINT->GetValue(true));
        if (!strlen($this->cp["DIGIT_POINT"]->GetText()) and !is_bool($this->cp["DIGIT_POINT"]->GetValue(true))) 
            $this->cp["DIGIT_POINT"]->SetText(0);
        if (!is_null($this->cp["ROUND_UNIT"]->GetValue()) and !strlen($this->cp["ROUND_UNIT"]->GetText()) and !is_bool($this->cp["ROUND_UNIT"]->GetValue())) 
            $this->cp["ROUND_UNIT"]->SetValue($this->ROUND_UNIT->GetValue(true));
        if (!strlen($this->cp["ROUND_UNIT"]->GetText()) and !is_bool($this->cp["ROUND_UNIT"]->GetValue(true))) 
            $this->cp["ROUND_UNIT"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue($this->CREATED_BY->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_CURRENCY(P_CURRENCY_ID,CODE,CURRENCY_LABEL,DIGIT_POINT,ROUND_UNIT,DESCRIPTION,CREATION_DATE,CREATED_BY,UPDATED_DATE,UPDATED_BY)\n" .
        "VALUES\n" .
        "(GENERATE_ID('TRB','P_CURRENCY','P_CURRENCY_ID'),UPPER(TRIM('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "')),'" . $this->SQLValue($this->cp["CURRENCY_LABEL"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["DIGIT_POINT"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["ROUND_UNIT"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate,'" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "',sysdate,'" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @32-681DAE69
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CURRENCY_LABEL"] = new clsSQLParameter("ctrlCURRENCY_LABEL", ccsText, "", "", $this->CURRENCY_LABEL->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DIGIT_POINT"] = new clsSQLParameter("ctrlDIGIT_POINT", ccsFloat, "", "", $this->DIGIT_POINT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["ROUND_UNIT"] = new clsSQLParameter("ctrlROUND_UNIT", ccsFloat, "", "", $this->ROUND_UNIT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CURRENCY_ID"] = new clsSQLParameter("ctrlP_CURRENCY_ID", ccsFloat, "", "", $this->P_CURRENCY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["CURRENCY_LABEL"]->GetValue()) and !strlen($this->cp["CURRENCY_LABEL"]->GetText()) and !is_bool($this->cp["CURRENCY_LABEL"]->GetValue())) 
            $this->cp["CURRENCY_LABEL"]->SetValue($this->CURRENCY_LABEL->GetValue(true));
        if (!is_null($this->cp["DIGIT_POINT"]->GetValue()) and !strlen($this->cp["DIGIT_POINT"]->GetText()) and !is_bool($this->cp["DIGIT_POINT"]->GetValue())) 
            $this->cp["DIGIT_POINT"]->SetValue($this->DIGIT_POINT->GetValue(true));
        if (!strlen($this->cp["DIGIT_POINT"]->GetText()) and !is_bool($this->cp["DIGIT_POINT"]->GetValue(true))) 
            $this->cp["DIGIT_POINT"]->SetText(0);
        if (!is_null($this->cp["ROUND_UNIT"]->GetValue()) and !strlen($this->cp["ROUND_UNIT"]->GetText()) and !is_bool($this->cp["ROUND_UNIT"]->GetValue())) 
            $this->cp["ROUND_UNIT"]->SetValue($this->ROUND_UNIT->GetValue(true));
        if (!strlen($this->cp["ROUND_UNIT"]->GetText()) and !is_bool($this->cp["ROUND_UNIT"]->GetValue(true))) 
            $this->cp["ROUND_UNIT"]->SetText(0);
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        if (!is_null($this->cp["P_CURRENCY_ID"]->GetValue()) and !strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue())) 
            $this->cp["P_CURRENCY_ID"]->SetValue($this->P_CURRENCY_ID->GetValue(true));
        if (!strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue(true))) 
            $this->cp["P_CURRENCY_ID"]->SetText(0);
        $this->SQL = "UPDATE P_CURRENCY SET \n" .
        "CODE=UPPER(TRIM('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "')),\n" .
        "CURRENCY_LABEL='" . $this->SQLValue($this->cp["CURRENCY_LABEL"]->GetDBValue(), ccsText) . "',\n" .
        "DIGIT_POINT=" . $this->SQLValue($this->cp["DIGIT_POINT"]->GetDBValue(), ccsFloat) . ",\n" .
        "ROUND_UNIT=" . $this->SQLValue($this->cp["ROUND_UNIT"]->GetDBValue(), ccsFloat) . ",\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATED_DATE=sysdate,\n" .
        "UPDATED_BY='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE  P_CURRENCY_ID = " . $this->SQLValue($this->cp["P_CURRENCY_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @32-F5080BD4
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_CURRENCY_ID"] = new clsSQLParameter("ctrlP_CURRENCY_ID", ccsFloat, "", "", $this->P_CURRENCY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_CURRENCY_ID"]->GetValue()) and !strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue())) 
            $this->cp["P_CURRENCY_ID"]->SetValue($this->P_CURRENCY_ID->GetValue(true));
        if (!strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue(true))) 
            $this->cp["P_CURRENCY_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_CURRENCY WHERE P_CURRENCY_ID = " . $this->SQLValue($this->cp["P_CURRENCY_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_currency1DataSource Class @32-FCB6E20C

//Initialize Page @1-A458348C
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
$TemplateFileName = "p_currency.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-546D61B2
include_once("./p_currency_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-83F4D61C
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_CURRENCY = & new clsGridP_CURRENCY("", $MainPage);
$P_CURRENCYSearch = & new clsRecordP_CURRENCYSearch("", $MainPage);
$p_currency1 = & new clsRecordp_currency1("", $MainPage);
$MainPage->P_CURRENCY = & $P_CURRENCY;
$MainPage->P_CURRENCYSearch = & $P_CURRENCYSearch;
$MainPage->p_currency1 = & $p_currency1;
$P_CURRENCY->Initialize();
$p_currency1->Initialize();

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

//Execute Components @1-F7FA80A3
$P_CURRENCYSearch->Operation();
$p_currency1->Operation();
//End Execute Components

//Go to destination page @1-3496DC07
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_CURRENCY);
    unset($P_CURRENCYSearch);
    unset($p_currency1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-A4123C66
$P_CURRENCY->Show();
$P_CURRENCYSearch->Show();
$p_currency1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-0B170A9A
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_CURRENCY);
unset($P_CURRENCYSearch);
unset($p_currency1);
unset($Tpl);
//End Unload Page


?>
