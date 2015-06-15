<?php
//Include Common Files @1-65A999E4
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_region_level_tree.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_REGIONGridPage { //P_REGIONGridPage class @393-7871134C

//Variables @393-AC1EDBB9

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

//Class_Initialize Event @393-026AA1C7
    function clsGridP_REGIONGridPage($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_REGIONGridPage";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_REGIONGridPage";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_REGIONGridPageDataSource($this);
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

        $this->REGION_NAME = & new clsControl(ccsLabel, "REGION_NAME", "REGION_NAME", ccsText, "", CCGetRequestParam("REGION_NAME", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_region_level_tree.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_region_level_tree.php";
        $this->P_REGION_ID = & new clsControl(ccsLabel, "P_REGION_ID", "P_REGION_ID", ccsFloat, "", CCGetRequestParam("P_REGION_ID", ccsGet, NULL), $this);
        $this->P_REGION_LEVEL_ID = & new clsControl(ccsHidden, "P_REGION_LEVEL_ID", "P_REGION_LEVEL_ID", ccsFloat, "", CCGetRequestParam("P_REGION_LEVEL_ID", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->PARENT_ID = & new clsControl(ccsHidden, "PARENT_ID", "PARENT_ID", ccsFloat, "", CCGetRequestParam("PARENT_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->BATCH_Insert1 = & new clsControl(ccsLink, "BATCH_Insert1", "BATCH_Insert1", ccsText, "", CCGetRequestParam("BATCH_Insert1", ccsGet, NULL), $this);
        $this->BATCH_Insert1->HTML = true;
        $this->BATCH_Insert1->Page = "p_region_level_tree.php";
    }
//End Class_Initialize Event

//Initialize Method @393-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @393-5B7515A3
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);
        $this->DataSource->Parameters["urlPARENT_ID"] = CCGetFromGet("PARENT_ID", NULL);

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
            $this->ControlsVisible["REGION_NAME"] = $this->REGION_NAME->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_REGION_ID"] = $this->P_REGION_ID->Visible;
            $this->ControlsVisible["P_REGION_LEVEL_ID"] = $this->P_REGION_LEVEL_ID->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["PARENT_ID"] = $this->PARENT_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->REGION_NAME->SetValue($this->DataSource->REGION_NAME->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_REGION_ID", $this->DataSource->f("P_REGION_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_REGION_ID", $this->DataSource->f("P_REGION_ID"));
                $this->P_REGION_ID->SetValue($this->DataSource->P_REGION_ID->GetValue());
                $this->P_REGION_LEVEL_ID->SetValue($this->DataSource->P_REGION_LEVEL_ID->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->PARENT_ID->SetValue($this->DataSource->PARENT_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->REGION_NAME->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_REGION_ID->Show();
                $this->P_REGION_LEVEL_ID->Show();
                $this->DESCRIPTION->Show();
                $this->PARENT_ID->Show();
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
        $this->BATCH_Insert1->SetValue($this->DataSource->BATCH_Insert1->GetValue());
        $this->BATCH_Insert1->Parameters = CCGetQueryString("QueryString", array("P_REGION_ID", "FLAG", "s_keyword", "ccsForm"));
        $this->BATCH_Insert1->Parameters = CCAddParam($this->BATCH_Insert1->Parameters, "P_REGION_ID", $this->DataSource->f("P_REGION_ID"));
        $this->Navigator->Show();
        $this->BATCH_Insert1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @393-A9F9C959
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->REGION_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_REGION_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_REGION_LEVEL_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PARENT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_REGIONGridPage Class @393-FCB6E20C

class clsP_REGIONGridPageDataSource extends clsDBConn {  //P_REGIONGridPageDataSource Class @393-FEF3252C

//DataSource Variables @393-7D3A7838
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $REGION_NAME;
    var $DLink;
    var $ADLink;
    var $P_REGION_ID;
    var $P_REGION_LEVEL_ID;
    var $DESCRIPTION;
    var $BATCH_Insert1;
    var $PARENT_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @393-9A608F65
    function clsP_REGIONGridPageDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_REGIONGridPage";
        $this->Initialize();
        $this->REGION_NAME = new clsField("REGION_NAME", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_REGION_ID = new clsField("P_REGION_ID", ccsFloat, "");
        
        $this->P_REGION_LEVEL_ID = new clsField("P_REGION_LEVEL_ID", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->BATCH_Insert1 = new clsField("BATCH_Insert1", ccsText, "");
        
        $this->PARENT_ID = new clsField("PARENT_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @393-1666ED85
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "P_REGION_ID ASC";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @393-BF6337AF
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urlPARENT_ID", ccsFloat, "", "", $this->Parameters["urlPARENT_ID"], 0, false);
    }
//End Prepare Method

//Open Method @393-1A47DBE7
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM P_REGION\n" .
        "WHERE NVL(PARENT_ID,0) = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . " \n" .
        "	AND( UPPER(REGION_NAME) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "		UPPER(DESCRIPTION) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') )) cnt";
        $this->SQL = "SELECT * \n" .
        "FROM P_REGION\n" .
        "WHERE NVL(PARENT_ID,0) = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . " \n" .
        "	AND( UPPER(REGION_NAME) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "		UPPER(DESCRIPTION) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') )  {SQL_OrderBy}";
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

//SetValues Method @393-7EBD2FAA
    function SetValues()
    {
        $this->REGION_NAME->SetDBValue($this->f("REGION_NAME"));
        $this->DLink->SetDBValue($this->f("P_REGION_ID"));
        $this->ADLink->SetDBValue($this->f("P_REGION_ID"));
        $this->P_REGION_ID->SetDBValue(trim($this->f("P_REGION_ID")));
        $this->P_REGION_LEVEL_ID->SetDBValue(trim($this->f("P_REGION_LEVEL_ID")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->BATCH_Insert1->SetDBValue($this->f("P_REGION_ID"));
        $this->PARENT_ID->SetDBValue(trim($this->f("PARENT_ID")));
    }
//End SetValues Method

} //End P_REGIONGridPageDataSource Class @393-FCB6E20C

class clsRecordP_REGIONSearch { //P_REGIONSearch Class @394-442BA81D

//Variables @394-D6FF3E86

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

//Class_Initialize Event @394-81EA1E7A
    function clsRecordP_REGIONSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_REGIONSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_REGIONSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->s_keyword = & new clsControl(ccsTextBox, "s_keyword", "s_keyword", ccsText, "", CCGetRequestParam("s_keyword", $Method, NULL), $this);
            $this->PARENT_ID = & new clsControl(ccsHidden, "PARENT_ID", "PARENT_ID", ccsFloat, "", CCGetRequestParam("PARENT_ID", $Method, NULL), $this);
            $this->P_REGION_LEVEL_ID = & new clsControl(ccsHidden, "P_REGION_LEVEL_ID", "P_REGION_LEVEL_ID", ccsFloat, "", CCGetRequestParam("P_REGION_LEVEL_ID", $Method, NULL), $this);
            $this->P_REGION_ID = & new clsControl(ccsHidden, "P_REGION_ID", "P_REGION_ID", ccsFloat, "", CCGetRequestParam("P_REGION_ID", $Method, NULL), $this);
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->P_REGION_ID->Value) && !strlen($this->P_REGION_ID->Value) && $this->P_REGION_ID->Value !== false)
                    $this->P_REGION_ID->SetText(0);
            }
        }
    }
//End Class_Initialize Event

//Validate Method @394-CCE305F9
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_keyword->Validate() && $Validation);
        $Validation = ($this->PARENT_ID->Validate() && $Validation);
        $Validation = ($this->P_REGION_LEVEL_ID->Validate() && $Validation);
        $Validation = ($this->P_REGION_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_keyword->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PARENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REGION_LEVEL_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REGION_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @394-FD35895E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_keyword->Errors->Count());
        $errors = ($errors || $this->PARENT_ID->Errors->Count());
        $errors = ($errors || $this->P_REGION_LEVEL_ID->Errors->Count());
        $errors = ($errors || $this->P_REGION_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @394-ED598703
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

//Operation Method @394-C18DDCA2
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
        $Redirect = "p_region_level_tree.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_region_level_tree.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y", "P_REGION_ID", "FLAG", "p_application_id")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @394-53FFF6AE
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
            $Error = ComposeStrings($Error, $this->PARENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REGION_LEVEL_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REGION_ID->Errors->ToString());
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
        $this->PARENT_ID->Show();
        $this->P_REGION_LEVEL_ID->Show();
        $this->P_REGION_ID->Show();
        $this->Button_DoSearch->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End P_REGIONSearch Class @394-FCB6E20C

class clsRecordP_REGION1 { //P_REGION1 Class @407-63133B14

//Variables @407-D6FF3E86

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

//Class_Initialize Event @407-5A963449
    function clsRecordP_REGION1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_REGION1/Error";
        $this->DataSource = new clsP_REGION1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_REGION1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->REGION_NAME = & new clsControl(ccsTextBox, "REGION_NAME", "REGION NAME", ccsText, "", CCGetRequestParam("REGION_NAME", $Method, NULL), $this);
            $this->REGION_NAME->Required = true;
            $this->LEVEL_NAME = & new clsControl(ccsTextBox, "LEVEL_NAME", "LEVEL ID", ccsText, "", CCGetRequestParam("LEVEL_NAME", $Method, NULL), $this);
            $this->LEVEL_NAME->Required = true;
            $this->PARENT_ID = & new clsControl(ccsTextBox, "PARENT_ID", "PARENT ID", ccsFloat, "", CCGetRequestParam("PARENT_ID", $Method, NULL), $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->P_REGION_LEVEL_ID = & new clsControl(ccsHidden, "P_REGION_LEVEL_ID", "P_REGION_LEVEL_ID", ccsFloat, "", CCGetRequestParam("P_REGION_LEVEL_ID", $Method, NULL), $this);
            $this->BUSINESS_AREA_NAME = & new clsControl(ccsTextBox, "BUSINESS_AREA_NAME", "BUSINESS_AREA_NAME", ccsText, "", CCGetRequestParam("BUSINESS_AREA_NAME", $Method, NULL), $this);
            $this->P_BUSINESS_AREA_ID = & new clsControl(ccsHidden, "P_BUSINESS_AREA_ID", "P BUSINESS AREA ID", ccsFloat, "", CCGetRequestParam("P_BUSINESS_AREA_ID", $Method, NULL), $this);
            $this->P_REGION_ID = & new clsControl(ccsHidden, "P_REGION_ID", "P_REGION_ID", ccsFloat, "", CCGetRequestParam("P_REGION_ID", $Method, NULL), $this);
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->LEVEL_NAME->Value) && !strlen($this->LEVEL_NAME->Value) && $this->LEVEL_NAME->Value !== false)
                    $this->LEVEL_NAME->SetText(GenerateBySystem);
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @407-0A4A4A0A
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_REGION_ID"] = CCGetFromGet("P_REGION_ID", NULL);
    }
//End Initialize Method

//Validate Method @407-6DB27394
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->REGION_NAME->Validate() && $Validation);
        $Validation = ($this->LEVEL_NAME->Validate() && $Validation);
        $Validation = ($this->PARENT_ID->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->P_REGION_LEVEL_ID->Validate() && $Validation);
        $Validation = ($this->BUSINESS_AREA_NAME->Validate() && $Validation);
        $Validation = ($this->P_BUSINESS_AREA_ID->Validate() && $Validation);
        $Validation = ($this->P_REGION_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->REGION_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LEVEL_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PARENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REGION_LEVEL_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BUSINESS_AREA_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BUSINESS_AREA_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REGION_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @407-E841668B
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->REGION_NAME->Errors->Count());
        $errors = ($errors || $this->LEVEL_NAME->Errors->Count());
        $errors = ($errors || $this->PARENT_ID->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->P_REGION_LEVEL_ID->Errors->Count());
        $errors = ($errors || $this->BUSINESS_AREA_NAME->Errors->Count());
        $errors = ($errors || $this->P_BUSINESS_AREA_ID->Errors->Count());
        $errors = ($errors || $this->P_REGION_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @407-ED598703
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

//Operation Method @407-4BEBABF8
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
        if($this->PressedButton == "Button_Update") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
            if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Delete") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "P_REGION_ID", "P_REGIONGridPagePage", "s_keyword"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_REGIONGridPagePage"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_REGIONGridPagePage"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
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

//InsertRow Method @407-5A1FE0B3
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->REGION_NAME->SetValue($this->REGION_NAME->GetValue(true));
        $this->DataSource->P_REGION_LEVEL_ID->SetValue($this->P_REGION_LEVEL_ID->GetValue(true));
        $this->DataSource->P_BUSINESS_AREA_ID->SetValue($this->P_BUSINESS_AREA_ID->GetValue(true));
        $this->DataSource->PARENT_ID->SetValue($this->PARENT_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @407-A6940DC3
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->REGION_NAME->SetValue($this->REGION_NAME->GetValue(true));
        $this->DataSource->P_REGION_LEVEL_ID->SetValue($this->P_REGION_LEVEL_ID->GetValue(true));
        $this->DataSource->P_BUSINESS_AREA_ID->SetValue($this->P_BUSINESS_AREA_ID->GetValue(true));
        $this->DataSource->PARENT_ID->SetValue($this->PARENT_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->P_REGION_ID->SetValue($this->P_REGION_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @407-6ACA121A
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_REGION_ID->SetValue($this->P_REGION_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @407-AC1D8865
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
                    $this->REGION_NAME->SetValue($this->DataSource->REGION_NAME->GetValue());
                    $this->LEVEL_NAME->SetValue($this->DataSource->LEVEL_NAME->GetValue());
                    $this->PARENT_ID->SetValue($this->DataSource->PARENT_ID->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->P_REGION_LEVEL_ID->SetValue($this->DataSource->P_REGION_LEVEL_ID->GetValue());
                    $this->BUSINESS_AREA_NAME->SetValue($this->DataSource->BUSINESS_AREA_NAME->GetValue());
                    $this->P_BUSINESS_AREA_ID->SetValue($this->DataSource->P_BUSINESS_AREA_ID->GetValue());
                    $this->P_REGION_ID->SetValue($this->DataSource->P_REGION_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->REGION_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LEVEL_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PARENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REGION_LEVEL_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BUSINESS_AREA_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BUSINESS_AREA_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REGION_ID->Errors->ToString());
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

        $this->REGION_NAME->Show();
        $this->LEVEL_NAME->Show();
        $this->PARENT_ID->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_DATE->Show();
        $this->UPDATE_BY->Show();
        $this->P_REGION_LEVEL_ID->Show();
        $this->BUSINESS_AREA_NAME->Show();
        $this->P_BUSINESS_AREA_ID->Show();
        $this->P_REGION_ID->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End P_REGION1 Class @407-FCB6E20C

class clsP_REGION1DataSource extends clsDBConn {  //P_REGION1DataSource Class @407-479CE958

//DataSource Variables @407-B6E2576C
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
    var $REGION_NAME;
    var $LEVEL_NAME;
    var $PARENT_ID;
    var $DESCRIPTION;
    var $UPDATE_DATE;
    var $UPDATE_BY;
    var $P_REGION_LEVEL_ID;
    var $BUSINESS_AREA_NAME;
    var $P_BUSINESS_AREA_ID;
    var $P_REGION_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @407-5B89F435
    function clsP_REGION1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record P_REGION1/Error";
        $this->Initialize();
        $this->REGION_NAME = new clsField("REGION_NAME", ccsText, "");
        
        $this->LEVEL_NAME = new clsField("LEVEL_NAME", ccsText, "");
        
        $this->PARENT_ID = new clsField("PARENT_ID", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->P_REGION_LEVEL_ID = new clsField("P_REGION_LEVEL_ID", ccsFloat, "");
        
        $this->BUSINESS_AREA_NAME = new clsField("BUSINESS_AREA_NAME", ccsText, "");
        
        $this->P_BUSINESS_AREA_ID = new clsField("P_BUSINESS_AREA_ID", ccsFloat, "");
        
        $this->P_REGION_ID = new clsField("P_REGION_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @407-DEFBC90E
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_REGION_ID", ccsFloat, "", "", $this->Parameters["urlP_REGION_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @407-19A547B1
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT A.*,B.LEVEL_NAME,C.BUSINESS_AREA_NAME FROM P_REGION A , P_REGION_LEVEL B , P_BUSINESS_AREA C\n" .
        "WHERE A.P_REGION_LEVEL_ID = B.P_REGION_LEVEL_ID (+)\n" .
        "AND A.P_BUSINESS_AREA_ID = C.P_BUSINESS_AREA_ID (+)\n" .
        "AND P_REGION_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @407-4E2959FE
    function SetValues()
    {
        $this->REGION_NAME->SetDBValue($this->f("REGION_NAME"));
        $this->LEVEL_NAME->SetDBValue($this->f("LEVEL_NAME"));
        $this->PARENT_ID->SetDBValue(trim($this->f("PARENT_ID")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->P_REGION_LEVEL_ID->SetDBValue(trim($this->f("P_REGION_LEVEL_ID")));
        $this->BUSINESS_AREA_NAME->SetDBValue($this->f("BUSINESS_AREA_NAME"));
        $this->P_BUSINESS_AREA_ID->SetDBValue(trim($this->f("P_BUSINESS_AREA_ID")));
        $this->P_REGION_ID->SetDBValue(trim($this->f("P_REGION_ID")));
    }
//End SetValues Method

//Insert Method @407-F920AB46
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["REGION_NAME"] = new clsSQLParameter("ctrlREGION_NAME", ccsText, "", "", $this->REGION_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_REGION_LEVEL_ID"] = new clsSQLParameter("ctrlP_REGION_LEVEL_ID", ccsFloat, "", "", $this->P_REGION_LEVEL_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_BUSINESS_AREA_ID"] = new clsSQLParameter("ctrlP_BUSINESS_AREA_ID", ccsFloat, "", "", $this->P_BUSINESS_AREA_ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PARENT_ID"] = new clsSQLParameter("ctrlPARENT_ID", ccsFloat, "", "", $this->PARENT_ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["REGION_NAME"]->GetValue()) and !strlen($this->cp["REGION_NAME"]->GetText()) and !is_bool($this->cp["REGION_NAME"]->GetValue())) 
            $this->cp["REGION_NAME"]->SetValue($this->REGION_NAME->GetValue(true));
        if (!is_null($this->cp["P_REGION_LEVEL_ID"]->GetValue()) and !strlen($this->cp["P_REGION_LEVEL_ID"]->GetText()) and !is_bool($this->cp["P_REGION_LEVEL_ID"]->GetValue())) 
            $this->cp["P_REGION_LEVEL_ID"]->SetValue($this->P_REGION_LEVEL_ID->GetValue(true));
        if (!strlen($this->cp["P_REGION_LEVEL_ID"]->GetText()) and !is_bool($this->cp["P_REGION_LEVEL_ID"]->GetValue(true))) 
            $this->cp["P_REGION_LEVEL_ID"]->SetText(0);
        if (!is_null($this->cp["P_BUSINESS_AREA_ID"]->GetValue()) and !strlen($this->cp["P_BUSINESS_AREA_ID"]->GetText()) and !is_bool($this->cp["P_BUSINESS_AREA_ID"]->GetValue())) 
            $this->cp["P_BUSINESS_AREA_ID"]->SetValue($this->P_BUSINESS_AREA_ID->GetValue(true));
        if (!strlen($this->cp["P_BUSINESS_AREA_ID"]->GetText()) and !is_bool($this->cp["P_BUSINESS_AREA_ID"]->GetValue(true))) 
            $this->cp["P_BUSINESS_AREA_ID"]->SetText(NULL);
        if (!is_null($this->cp["PARENT_ID"]->GetValue()) and !strlen($this->cp["PARENT_ID"]->GetText()) and !is_bool($this->cp["PARENT_ID"]->GetValue())) 
            $this->cp["PARENT_ID"]->SetValue($this->PARENT_ID->GetValue(true));
        if (!strlen($this->cp["PARENT_ID"]->GetText()) and !is_bool($this->cp["PARENT_ID"]->GetValue(true))) 
            $this->cp["PARENT_ID"]->SetText(NULL);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        $this->SQL = "/* Formatted on 22/10/2014 15:53:27 (QP5 v5.139.911.3011) */\n" .
        "INSERT INTO P_REGION (P_REGION_ID,\n" .
        "                      REGION_NAME,\n" .
        "                      P_REGION_LEVEL_ID,\n" .
        "                      P_BUSINESS_AREA_ID,\n" .
        "                      PARENT_ID,\n" .
        "                      DESCRIPTION,\n" .
        "                      UPDATE_DATE,\n" .
        "                      UPDATE_BY)\n" .
        "     VALUES (GENERATE_ID('BILLDB','P_REGION','P_REGION_ID'),\n" .
        "             '" . $this->SQLValue($this->cp["REGION_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "             " . $this->SQLValue($this->cp["P_REGION_LEVEL_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "             " . $this->SQLValue($this->cp["P_BUSINESS_AREA_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "             " . $this->SQLValue($this->cp["PARENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "             '" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',\n" .
        "             SYSDATE,\n" .
        "             '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @407-F20C8258
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["REGION_NAME"] = new clsSQLParameter("ctrlREGION_NAME", ccsText, "", "", $this->REGION_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_REGION_LEVEL_ID"] = new clsSQLParameter("ctrlP_REGION_LEVEL_ID", ccsFloat, "", "", $this->P_REGION_LEVEL_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_BUSINESS_AREA_ID"] = new clsSQLParameter("ctrlP_BUSINESS_AREA_ID", ccsFloat, "", "", $this->P_BUSINESS_AREA_ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PARENT_ID"] = new clsSQLParameter("ctrlPARENT_ID", ccsFloat, "", "", $this->PARENT_ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["P_REGION_ID"] = new clsSQLParameter("ctrlP_REGION_ID", ccsFloat, "", "", $this->P_REGION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["REGION_NAME"]->GetValue()) and !strlen($this->cp["REGION_NAME"]->GetText()) and !is_bool($this->cp["REGION_NAME"]->GetValue())) 
            $this->cp["REGION_NAME"]->SetValue($this->REGION_NAME->GetValue(true));
        if (!is_null($this->cp["P_REGION_LEVEL_ID"]->GetValue()) and !strlen($this->cp["P_REGION_LEVEL_ID"]->GetText()) and !is_bool($this->cp["P_REGION_LEVEL_ID"]->GetValue())) 
            $this->cp["P_REGION_LEVEL_ID"]->SetValue($this->P_REGION_LEVEL_ID->GetValue(true));
        if (!strlen($this->cp["P_REGION_LEVEL_ID"]->GetText()) and !is_bool($this->cp["P_REGION_LEVEL_ID"]->GetValue(true))) 
            $this->cp["P_REGION_LEVEL_ID"]->SetText(0);
        if (!is_null($this->cp["P_BUSINESS_AREA_ID"]->GetValue()) and !strlen($this->cp["P_BUSINESS_AREA_ID"]->GetText()) and !is_bool($this->cp["P_BUSINESS_AREA_ID"]->GetValue())) 
            $this->cp["P_BUSINESS_AREA_ID"]->SetValue($this->P_BUSINESS_AREA_ID->GetValue(true));
        if (!strlen($this->cp["P_BUSINESS_AREA_ID"]->GetText()) and !is_bool($this->cp["P_BUSINESS_AREA_ID"]->GetValue(true))) 
            $this->cp["P_BUSINESS_AREA_ID"]->SetText(NULL);
        if (!is_null($this->cp["PARENT_ID"]->GetValue()) and !strlen($this->cp["PARENT_ID"]->GetText()) and !is_bool($this->cp["PARENT_ID"]->GetValue())) 
            $this->cp["PARENT_ID"]->SetValue($this->PARENT_ID->GetValue(true));
        if (!strlen($this->cp["PARENT_ID"]->GetText()) and !is_bool($this->cp["PARENT_ID"]->GetValue(true))) 
            $this->cp["PARENT_ID"]->SetText(NULL);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["P_REGION_ID"]->GetValue()) and !strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue())) 
            $this->cp["P_REGION_ID"]->SetValue($this->P_REGION_ID->GetValue(true));
        if (!strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue(true))) 
            $this->cp["P_REGION_ID"]->SetText(0);
        $this->SQL = "/* Formatted on 22/10/2014 15:53:27 (QP5 v5.139.911.3011) */\n" .
        "UPDATE P_REGION \n" .
        "   SET   REGION_NAME = '" . $this->SQLValue($this->cp["REGION_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "            P_REGION_LEVEL_ID = " . $this->SQLValue($this->cp["P_REGION_LEVEL_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "            P_BUSINESS_AREA_ID = " . $this->SQLValue($this->cp["P_BUSINESS_AREA_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "            PARENT_ID = " . $this->SQLValue($this->cp["PARENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "            DESCRIPTION = '" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',\n" .
        "            UPDATE_DATE = SYSDATE,\n" .
        "            UPDATE_BY = '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE P_REGION_ID = " . $this->SQLValue($this->cp["P_REGION_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @407-B3C47EE3
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_REGION_ID"] = new clsSQLParameter("ctrlP_REGION_ID", ccsFloat, "", "", $this->P_REGION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_REGION_ID"]->GetValue()) and !strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue())) 
            $this->cp["P_REGION_ID"]->SetValue($this->P_REGION_ID->GetValue(true));
        if (!strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue(true))) 
            $this->cp["P_REGION_ID"]->SetText(0);
        $this->SQL = "DELETE P_REGION WHERE P_REGION_ID = " . $this->SQLValue($this->cp["P_REGION_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End P_REGION1DataSource Class @407-FCB6E20C

//Initialize Page @1-6FC78991
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
$TemplateFileName = "p_region_level_tree.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-7C58ABBD
include_once("./p_region_level_tree_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-9A8EFAFD
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_REGIONGridPage = & new clsGridP_REGIONGridPage("", $MainPage);
$P_REGIONSearch = & new clsRecordP_REGIONSearch("", $MainPage);
$P_REGION1 = & new clsRecordP_REGION1("", $MainPage);
$MainPage->P_REGIONGridPage = & $P_REGIONGridPage;
$MainPage->P_REGIONSearch = & $P_REGIONSearch;
$MainPage->P_REGION1 = & $P_REGION1;
$P_REGIONGridPage->Initialize();
$P_REGION1->Initialize();

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

//Execute Components @1-82F61486
$P_REGIONSearch->Operation();
$P_REGION1->Operation();
//End Execute Components

//Go to destination page @1-5B5A66F7
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_REGIONGridPage);
    unset($P_REGIONSearch);
    unset($P_REGION1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-17ADD16E
$P_REGIONGridPage->Show();
$P_REGIONSearch->Show();
$P_REGION1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-1B92E635
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_REGIONGridPage);
unset($P_REGIONSearch);
unset($P_REGION1);
unset($Tpl);
//End Unload Page


?>
