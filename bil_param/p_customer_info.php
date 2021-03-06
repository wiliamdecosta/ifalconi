<?php
//Include Common Files @1-EF644095
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_customer_info.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridCUSTOMER_INFOgrid { //CUSTOMER_INFOgrid class @2-9FCFB319

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

//Class_Initialize Event @2-8DC5E48F
    function clsGridCUSTOMER_INFOgrid($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "CUSTOMER_INFOgrid";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid CUSTOMER_INFOgrid";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsCUSTOMER_INFOgridDataSource($this);
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

        $this->INFO_TYPE_CODE = & new clsControl(ccsLabel, "INFO_TYPE_CODE", "INFO_TYPE_CODE", ccsText, "", CCGetRequestParam("INFO_TYPE_CODE", ccsGet, NULL), $this);
        $this->VALID_FROM = & new clsControl(ccsLabel, "VALID_FROM", "VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", ccsGet, NULL), $this);
        $this->VALID_TO = & new clsControl(ccsLabel, "VALID_TO", "VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", ccsGet, NULL), $this);
        $this->INFO_DESC_1 = & new clsControl(ccsLabel, "INFO_DESC_1", "INFO_DESC_1", ccsText, "", CCGetRequestParam("INFO_DESC_1", ccsGet, NULL), $this);
        $this->INFO_DESC_2 = & new clsControl(ccsLabel, "INFO_DESC_2", "INFO_DESC_2", ccsText, "", CCGetRequestParam("INFO_DESC_2", ccsGet, NULL), $this);
        $this->INFO_DESC_3 = & new clsControl(ccsLabel, "INFO_DESC_3", "INFO_DESC_3", ccsText, "", CCGetRequestParam("INFO_DESC_3", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_customer_info.php";
        $this->CUSTOMER_ID = & new clsControl(ccsHidden, "CUSTOMER_ID", "CUSTOMER_ID", ccsFloat, "", CCGetRequestParam("CUSTOMER_ID", ccsGet, NULL), $this);
        $this->CUSTOMER_INFO_ID = & new clsControl(ccsHidden, "CUSTOMER_INFO_ID", "CUSTOMER_INFO_ID", ccsFloat, "", CCGetRequestParam("CUSTOMER_INFO_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_CUSTOMERINFO_Insert = & new clsControl(ccsLink, "P_CUSTOMERINFO_Insert", "P_CUSTOMERINFO_Insert", ccsText, "", CCGetRequestParam("P_CUSTOMERINFO_Insert", ccsGet, NULL), $this);
        $this->P_CUSTOMERINFO_Insert->Page = "p_customer_info.php";
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

//Show Method @2-58F4128F
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);
        $this->DataSource->Parameters["urlCUSTOMER_ID"] = CCGetFromGet("CUSTOMER_ID", NULL);

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
            $this->ControlsVisible["INFO_TYPE_CODE"] = $this->INFO_TYPE_CODE->Visible;
            $this->ControlsVisible["VALID_FROM"] = $this->VALID_FROM->Visible;
            $this->ControlsVisible["VALID_TO"] = $this->VALID_TO->Visible;
            $this->ControlsVisible["INFO_DESC_1"] = $this->INFO_DESC_1->Visible;
            $this->ControlsVisible["INFO_DESC_2"] = $this->INFO_DESC_2->Visible;
            $this->ControlsVisible["INFO_DESC_3"] = $this->INFO_DESC_3->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["CUSTOMER_ID"] = $this->CUSTOMER_ID->Visible;
            $this->ControlsVisible["CUSTOMER_INFO_ID"] = $this->CUSTOMER_INFO_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->INFO_TYPE_CODE->SetValue($this->DataSource->INFO_TYPE_CODE->GetValue());
                $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                $this->INFO_DESC_1->SetValue($this->DataSource->INFO_DESC_1->GetValue());
                $this->INFO_DESC_2->SetValue($this->DataSource->INFO_DESC_2->GetValue());
                $this->INFO_DESC_3->SetValue($this->DataSource->INFO_DESC_3->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "CUSTOMER_INFO_ID", $this->DataSource->f("CUSTOMER_INFO_ID"));
                $this->CUSTOMER_ID->SetValue($this->DataSource->CUSTOMER_ID->GetValue());
                $this->CUSTOMER_INFO_ID->SetValue($this->DataSource->CUSTOMER_INFO_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->INFO_TYPE_CODE->Show();
                $this->VALID_FROM->Show();
                $this->VALID_TO->Show();
                $this->INFO_DESC_1->Show();
                $this->INFO_DESC_2->Show();
                $this->INFO_DESC_3->Show();
                $this->DLink->Show();
                $this->CUSTOMER_ID->Show();
                $this->CUSTOMER_INFO_ID->Show();
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
        $this->P_CUSTOMERINFO_Insert->Parameters = CCGetQueryString("QueryString", array("CUSTOMER_INFO_ID", "ccsForm"));
        $this->P_CUSTOMERINFO_Insert->Parameters = CCAddParam($this->P_CUSTOMERINFO_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_CUSTOMERINFO_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-3E89B3D0
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->INFO_TYPE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->INFO_DESC_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->INFO_DESC_2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->INFO_DESC_3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_INFO_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End CUSTOMER_INFOgrid Class @2-FCB6E20C

class clsCUSTOMER_INFOgridDataSource extends clsDBConn {  //CUSTOMER_INFOgridDataSource Class @2-D54C14E3

//DataSource Variables @2-9ECBBF67
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $INFO_TYPE_CODE;
    var $VALID_FROM;
    var $VALID_TO;
    var $INFO_DESC_1;
    var $INFO_DESC_2;
    var $INFO_DESC_3;
    var $CUSTOMER_ID;
    var $CUSTOMER_INFO_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-61E721B2
    function clsCUSTOMER_INFOgridDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid CUSTOMER_INFOgrid";
        $this->Initialize();
        $this->INFO_TYPE_CODE = new clsField("INFO_TYPE_CODE", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->INFO_DESC_1 = new clsField("INFO_DESC_1", ccsText, "");
        
        $this->INFO_DESC_2 = new clsField("INFO_DESC_2", ccsText, "");
        
        $this->INFO_DESC_3 = new clsField("INFO_DESC_3", ccsText, "");
        
        $this->CUSTOMER_ID = new clsField("CUSTOMER_ID", ccsFloat, "");
        
        $this->CUSTOMER_INFO_ID = new clsField("CUSTOMER_INFO_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-ACE9A156
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urlCUSTOMER_ID", ccsFloat, "", "", $this->Parameters["urlCUSTOMER_ID"], 0, false);
    }
//End Prepare Method

//Open Method @2-BC866FE9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * FROM V_CUSTOMER_INFO\n" .
        "WHERE CUSTOMER_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . " AND\n" .
        "(UPPER(INFO_TYPE_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')OR\n" .
        "UPPER(INFO_DESC_1) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')OR\n" .
        "UPPER(INFO_DESC_2) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')OR\n" .
        "UPPER(INFO_DESC_3) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        ")) cnt";
        $this->SQL = "SELECT * FROM V_CUSTOMER_INFO\n" .
        "WHERE CUSTOMER_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . " AND\n" .
        "(UPPER(INFO_TYPE_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')OR\n" .
        "UPPER(INFO_DESC_1) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')OR\n" .
        "UPPER(INFO_DESC_2) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')OR\n" .
        "UPPER(INFO_DESC_3) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        ")";
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

//SetValues Method @2-238C19DF
    function SetValues()
    {
        $this->INFO_TYPE_CODE->SetDBValue($this->f("INFO_TYPE_CODE"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->INFO_DESC_1->SetDBValue($this->f("INFO_DESC_1"));
        $this->INFO_DESC_2->SetDBValue($this->f("INFO_DESC_2"));
        $this->INFO_DESC_3->SetDBValue($this->f("INFO_DESC_3"));
        $this->CUSTOMER_ID->SetDBValue(trim($this->f("CUSTOMER_ID")));
        $this->CUSTOMER_INFO_ID->SetDBValue(trim($this->f("CUSTOMER_INFO_ID")));
    }
//End SetValues Method

} //End CUSTOMER_INFOgridDataSource Class @2-FCB6E20C

class clsRecordV_CUSTOMERINFOSearch { //V_CUSTOMERINFOSearch Class @3-456D8921

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

//Class_Initialize Event @3-DF4C3B56
    function clsRecordV_CUSTOMERINFOSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_CUSTOMERINFOSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_CUSTOMERINFOSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->s_keyword = & new clsControl(ccsTextBox, "s_keyword", "s_keyword", ccsText, "", CCGetRequestParam("s_keyword", $Method, NULL), $this);
            $this->CUSTOMER_ID = & new clsControl(ccsTextBox, "CUSTOMER_ID", "CUSTOMER_ID", ccsText, "", CCGetRequestParam("CUSTOMER_ID", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @3-C2A6D9FE
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_keyword->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_keyword->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-10B5768D
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_keyword->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_ID->Errors->Count());
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

//Operation Method @3-C6D003C8
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
        $Redirect = "p_customer_info.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_customer_info.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-42649A3B
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
            $Error = ComposeStrings($Error, $this->CUSTOMER_ID->Errors->ToString());
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

        $this->Button_DoSearch->Show();
        $this->s_keyword->Show();
        $this->CUSTOMER_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End V_CUSTOMERINFOSearch Class @3-FCB6E20C

class clsRecordCUSTOMER_INFOrecord { //CUSTOMER_INFOrecord Class @97-02F28E97

//Variables @97-D6FF3E86

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

//Class_Initialize Event @97-EE0A623D
    function clsRecordCUSTOMER_INFOrecord($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record CUSTOMER_INFOrecord/Error";
        $this->DataSource = new clsCUSTOMER_INFOrecordDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "CUSTOMER_INFOrecord";
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
            $this->INFO_TYPE_CODE = & new clsControl(ccsTextBox, "INFO_TYPE_CODE", "INFO_TYPE_ID", ccsText, "", CCGetRequestParam("INFO_TYPE_CODE", $Method, NULL), $this);
            $this->INFO_TYPE_CODE->Required = true;
            $this->VALID_FROM = & new clsControl(ccsTextBox, "VALID_FROM", "VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", $Method, NULL), $this);
            $this->VALID_FROM->Required = true;
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->CUSTOMER_INFO_ID = & new clsControl(ccsHidden, "CUSTOMER_INFO_ID", "CUSTOMER_INFO_ID", ccsFloat, "", CCGetRequestParam("CUSTOMER_INFO_ID", $Method, NULL), $this);
            $this->VALID_TO = & new clsControl(ccsTextBox, "VALID_TO", "VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", $Method, NULL), $this);
            $this->INFO_DESC_1 = & new clsControl(ccsTextBox, "INFO_DESC_1", "INFO DESC 1", ccsText, "", CCGetRequestParam("INFO_DESC_1", $Method, NULL), $this);
            $this->INFO_DESC_1->Required = true;
            $this->INFO_DESC_2 = & new clsControl(ccsTextBox, "INFO_DESC_2", "INFO DESC 2", ccsText, "", CCGetRequestParam("INFO_DESC_2", $Method, NULL), $this);
            $this->INFO_DESC_3 = & new clsControl(ccsTextBox, "INFO_DESC_3", "INFO DESC 3", ccsText, "", CCGetRequestParam("INFO_DESC_3", $Method, NULL), $this);
            $this->INFO_TYPE_ID = & new clsControl(ccsHidden, "INFO_TYPE_ID", "INFO_TYPE_ID", ccsFloat, "", CCGetRequestParam("INFO_TYPE_ID", $Method, NULL), $this);
            $this->INFO_TYPE_ID->Required = true;
            $this->DatePicker_UPDATE_DATE1 = & new clsDatePicker("DatePicker_UPDATE_DATE1", "CUSTOMER_INFOrecord", "VALID_FROM", $this);
            $this->DatePicker_UPDATE_DATE2 = & new clsDatePicker("DatePicker_UPDATE_DATE2", "CUSTOMER_INFOrecord", "VALID_TO", $this);
            $this->CUSTOMER_ID = & new clsControl(ccsHidden, "CUSTOMER_ID", "CUSTOMER_ID", ccsFloat, "", CCGetRequestParam("CUSTOMER_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @97-590384FC
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlCUSTOMER_INFO_ID"] = CCGetFromGet("CUSTOMER_INFO_ID", NULL);
    }
//End Initialize Method

//Validate Method @97-27D63632
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->INFO_TYPE_CODE->Validate() && $Validation);
        $Validation = ($this->VALID_FROM->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_INFO_ID->Validate() && $Validation);
        $Validation = ($this->VALID_TO->Validate() && $Validation);
        $Validation = ($this->INFO_DESC_1->Validate() && $Validation);
        $Validation = ($this->INFO_DESC_2->Validate() && $Validation);
        $Validation = ($this->INFO_DESC_3->Validate() && $Validation);
        $Validation = ($this->INFO_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->INFO_TYPE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_INFO_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->INFO_DESC_1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->INFO_DESC_2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->INFO_DESC_3->Errors->Count() == 0);
        $Validation =  $Validation && ($this->INFO_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @97-151CA595
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->INFO_TYPE_CODE->Errors->Count());
        $errors = ($errors || $this->VALID_FROM->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_INFO_ID->Errors->Count());
        $errors = ($errors || $this->VALID_TO->Errors->Count());
        $errors = ($errors || $this->INFO_DESC_1->Errors->Count());
        $errors = ($errors || $this->INFO_DESC_2->Errors->Count());
        $errors = ($errors || $this->INFO_DESC_3->Errors->Count());
        $errors = ($errors || $this->INFO_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE1->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE2->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @97-ED598703
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

//Operation Method @97-246F2A02
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
        $Redirect = "p_customer_info.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            $Redirect = "p_customer_info.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = "p_customer_info.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = "p_customer_info.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
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

//InsertRow Method @97-0ACDFB68
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->CUSTOMER_INFO_ID->SetValue($this->CUSTOMER_INFO_ID->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->INFO_DESC_1->SetValue($this->INFO_DESC_1->GetValue(true));
        $this->DataSource->INFO_DESC_2->SetValue($this->INFO_DESC_2->GetValue(true));
        $this->DataSource->INFO_DESC_3->SetValue($this->INFO_DESC_3->GetValue(true));
        $this->DataSource->INFO_TYPE_ID->SetValue($this->INFO_TYPE_ID->GetValue(true));
        $this->DataSource->CUSTOMER_ID->SetValue($this->CUSTOMER_ID->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @97-2B864616
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->CUSTOMER_INFO_ID->SetValue($this->CUSTOMER_INFO_ID->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->INFO_DESC_1->SetValue($this->INFO_DESC_1->GetValue(true));
        $this->DataSource->INFO_DESC_2->SetValue($this->INFO_DESC_2->GetValue(true));
        $this->DataSource->INFO_DESC_3->SetValue($this->INFO_DESC_3->GetValue(true));
        $this->DataSource->INFO_TYPE_ID->SetValue($this->INFO_TYPE_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @97-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @97-8A4F7887
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
                    $this->INFO_TYPE_CODE->SetValue($this->DataSource->INFO_TYPE_CODE->GetValue());
                    $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->CUSTOMER_INFO_ID->SetValue($this->DataSource->CUSTOMER_INFO_ID->GetValue());
                    $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                    $this->INFO_DESC_1->SetValue($this->DataSource->INFO_DESC_1->GetValue());
                    $this->INFO_DESC_2->SetValue($this->DataSource->INFO_DESC_2->GetValue());
                    $this->INFO_DESC_3->SetValue($this->DataSource->INFO_DESC_3->GetValue());
                    $this->INFO_TYPE_ID->SetValue($this->DataSource->INFO_TYPE_ID->GetValue());
                    $this->CUSTOMER_ID->SetValue($this->DataSource->CUSTOMER_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->INFO_TYPE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_INFO_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INFO_DESC_1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INFO_DESC_2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INFO_DESC_3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INFO_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_ID->Errors->ToString());
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
        $this->INFO_TYPE_CODE->Show();
        $this->VALID_FROM->Show();
        $this->UPDATE_DATE->Show();
        $this->UPDATE_BY->Show();
        $this->CUSTOMER_INFO_ID->Show();
        $this->VALID_TO->Show();
        $this->INFO_DESC_1->Show();
        $this->INFO_DESC_2->Show();
        $this->INFO_DESC_3->Show();
        $this->INFO_TYPE_ID->Show();
        $this->DatePicker_UPDATE_DATE1->Show();
        $this->DatePicker_UPDATE_DATE2->Show();
        $this->CUSTOMER_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End CUSTOMER_INFOrecord Class @97-FCB6E20C

class clsCUSTOMER_INFOrecordDataSource extends clsDBConn {  //CUSTOMER_INFOrecordDataSource Class @97-2CB45617

//DataSource Variables @97-74B54922
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
    var $INFO_TYPE_CODE;
    var $VALID_FROM;
    var $UPDATE_DATE;
    var $UPDATE_BY;
    var $CUSTOMER_INFO_ID;
    var $VALID_TO;
    var $INFO_DESC_1;
    var $INFO_DESC_2;
    var $INFO_DESC_3;
    var $INFO_TYPE_ID;
    var $CUSTOMER_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @97-DAA73E9A
    function clsCUSTOMER_INFOrecordDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record CUSTOMER_INFOrecord/Error";
        $this->Initialize();
        $this->INFO_TYPE_CODE = new clsField("INFO_TYPE_CODE", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->CUSTOMER_INFO_ID = new clsField("CUSTOMER_INFO_ID", ccsFloat, "");
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->INFO_DESC_1 = new clsField("INFO_DESC_1", ccsText, "");
        
        $this->INFO_DESC_2 = new clsField("INFO_DESC_2", ccsText, "");
        
        $this->INFO_DESC_3 = new clsField("INFO_DESC_3", ccsText, "");
        
        $this->INFO_TYPE_ID = new clsField("INFO_TYPE_ID", ccsFloat, "");
        
        $this->CUSTOMER_ID = new clsField("CUSTOMER_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @97-D8F27A8E
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlCUSTOMER_INFO_ID", ccsFloat, "", "", $this->Parameters["urlCUSTOMER_INFO_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "CUSTOMER_INFO_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @97-39A4A34C
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_CUSTOMER_INFO {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @97-F1E7D6DE
    function SetValues()
    {
        $this->INFO_TYPE_CODE->SetDBValue($this->f("INFO_TYPE_CODE"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->CUSTOMER_INFO_ID->SetDBValue(trim($this->f("CUSTOMER_INFO_ID")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->INFO_DESC_1->SetDBValue($this->f("INFO_DESC_1"));
        $this->INFO_DESC_2->SetDBValue($this->f("INFO_DESC_2"));
        $this->INFO_DESC_3->SetDBValue($this->f("INFO_DESC_3"));
        $this->INFO_TYPE_ID->SetDBValue(trim($this->f("INFO_TYPE_ID")));
        $this->CUSTOMER_ID->SetDBValue(trim($this->f("CUSTOMER_ID")));
    }
//End SetValues Method

//Insert Method @97-DF987EE3
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_INFO_ID"] = new clsSQLParameter("ctrlCUSTOMER_INFO_ID", ccsFloat, "", "", $this->CUSTOMER_INFO_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["INFO_DESC_1"] = new clsSQLParameter("ctrlINFO_DESC_1", ccsText, "", "", $this->INFO_DESC_1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["INFO_DESC_2"] = new clsSQLParameter("ctrlINFO_DESC_2", ccsText, "", "", $this->INFO_DESC_2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["INFO_DESC_3"] = new clsSQLParameter("ctrlINFO_DESC_3", ccsText, "", "", $this->INFO_DESC_3->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["INFO_TYPE_ID"] = new clsSQLParameter("ctrlINFO_TYPE_ID", ccsFloat, "", "", $this->INFO_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_ID"] = new clsSQLParameter("ctrlCUSTOMER_ID", ccsFloat, "", "", $this->CUSTOMER_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["CUSTOMER_INFO_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_INFO_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_INFO_ID"]->GetValue())) 
            $this->cp["CUSTOMER_INFO_ID"]->SetValue($this->CUSTOMER_INFO_ID->GetValue(true));
        if (!strlen($this->cp["CUSTOMER_INFO_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_INFO_ID"]->GetValue(true))) 
            $this->cp["CUSTOMER_INFO_ID"]->SetText(0);
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["INFO_DESC_1"]->GetValue()) and !strlen($this->cp["INFO_DESC_1"]->GetText()) and !is_bool($this->cp["INFO_DESC_1"]->GetValue())) 
            $this->cp["INFO_DESC_1"]->SetValue($this->INFO_DESC_1->GetValue(true));
        if (!is_null($this->cp["INFO_DESC_2"]->GetValue()) and !strlen($this->cp["INFO_DESC_2"]->GetText()) and !is_bool($this->cp["INFO_DESC_2"]->GetValue())) 
            $this->cp["INFO_DESC_2"]->SetValue($this->INFO_DESC_2->GetValue(true));
        if (!is_null($this->cp["INFO_DESC_3"]->GetValue()) and !strlen($this->cp["INFO_DESC_3"]->GetText()) and !is_bool($this->cp["INFO_DESC_3"]->GetValue())) 
            $this->cp["INFO_DESC_3"]->SetValue($this->INFO_DESC_3->GetValue(true));
        if (!is_null($this->cp["INFO_TYPE_ID"]->GetValue()) and !strlen($this->cp["INFO_TYPE_ID"]->GetText()) and !is_bool($this->cp["INFO_TYPE_ID"]->GetValue())) 
            $this->cp["INFO_TYPE_ID"]->SetValue($this->INFO_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ID"]->SetValue($this->CUSTOMER_ID->GetValue(true));
        if (!strlen($this->cp["CUSTOMER_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ID"]->GetValue(true))) 
            $this->cp["CUSTOMER_ID"]->SetText(0);
        $this->SQL = "INSERT INTO CUSTOMER_INFO(\n" .
        "CUSTOMER_INFO_ID,\n" .
        "CUSTOMER_ID, \n" .
        "INFO_TYPE_ID,\n" .
        "VALID_FROM, \n" .
        "VALID_TO,\n" .
        "INFO_DESC_1, INFO_DESC_2, INFO_DESC_3,  \n" .
        "UPDATE_DATE, \n" .
        "UPDATE_BY) \n" .
        "VALUES(\n" .
        "GENERATE_ID('BILLDB','CUSTOMER_INFO','CUSTOMER_INFO_ID'),\n" .
        "" . $this->SQLValue($this->cp["CUSTOMER_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["INFO_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "'" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "', \n" .
        "'" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "', \n" .
        "'" . $this->SQLValue($this->cp["INFO_DESC_1"]->GetDBValue(), ccsText) . "', \n" .
        "'" . $this->SQLValue($this->cp["INFO_DESC_2"]->GetDBValue(), ccsText) . "', \n" .
        "'" . $this->SQLValue($this->cp["INFO_DESC_3"]->GetDBValue(), ccsText) . "',\n" .
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

//Update Method @97-B08ED136
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_INFO_ID"] = new clsSQLParameter("ctrlCUSTOMER_INFO_ID", ccsFloat, "", "", $this->CUSTOMER_INFO_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["INFO_DESC_1"] = new clsSQLParameter("ctrlINFO_DESC_1", ccsText, "", "", $this->INFO_DESC_1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["INFO_DESC_2"] = new clsSQLParameter("ctrlINFO_DESC_2", ccsText, "", "", $this->INFO_DESC_2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["INFO_DESC_3"] = new clsSQLParameter("ctrlINFO_DESC_3", ccsText, "", "", $this->INFO_DESC_3->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["INFO_TYPE_ID"] = new clsSQLParameter("ctrlINFO_TYPE_ID", ccsFloat, "", "", $this->INFO_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["CUSTOMER_INFO_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_INFO_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_INFO_ID"]->GetValue())) 
            $this->cp["CUSTOMER_INFO_ID"]->SetValue($this->CUSTOMER_INFO_ID->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["INFO_DESC_1"]->GetValue()) and !strlen($this->cp["INFO_DESC_1"]->GetText()) and !is_bool($this->cp["INFO_DESC_1"]->GetValue())) 
            $this->cp["INFO_DESC_1"]->SetValue($this->INFO_DESC_1->GetValue(true));
        if (!is_null($this->cp["INFO_DESC_2"]->GetValue()) and !strlen($this->cp["INFO_DESC_2"]->GetText()) and !is_bool($this->cp["INFO_DESC_2"]->GetValue())) 
            $this->cp["INFO_DESC_2"]->SetValue($this->INFO_DESC_2->GetValue(true));
        if (!is_null($this->cp["INFO_DESC_3"]->GetValue()) and !strlen($this->cp["INFO_DESC_3"]->GetText()) and !is_bool($this->cp["INFO_DESC_3"]->GetValue())) 
            $this->cp["INFO_DESC_3"]->SetValue($this->INFO_DESC_3->GetValue(true));
        if (!is_null($this->cp["INFO_TYPE_ID"]->GetValue()) and !strlen($this->cp["INFO_TYPE_ID"]->GetText()) and !is_bool($this->cp["INFO_TYPE_ID"]->GetValue())) 
            $this->cp["INFO_TYPE_ID"]->SetValue($this->INFO_TYPE_ID->GetValue(true));
        $this->SQL = "UPDATE CUSTOMER_INFO SET \n" .
        "INFO_TYPE_ID=" . $this->SQLValue($this->cp["INFO_TYPE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "VALID_FROM='" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "', \n" .
        "VALID_TO='" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "',\n" .
        "INFO_DESC_1='" . $this->SQLValue($this->cp["INFO_DESC_1"]->GetDBValue(), ccsText) . "', \n" .
        "INFO_DESC_2='" . $this->SQLValue($this->cp["INFO_DESC_2"]->GetDBValue(), ccsText) . "', \n" .
        "INFO_DESC_3='" . $this->SQLValue($this->cp["INFO_DESC_3"]->GetDBValue(), ccsText) . "', \n" .
        "UPDATE_DATE=SYSDATE,\n" .
        "UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE  CUSTOMER_INFO_ID=" . $this->SQLValue($this->cp["CUSTOMER_INFO_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @97-9443BF39
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUSTOMER_INFO_ID"] = new clsSQLParameter("urlCUSTOMER_INFO_ID", ccsFloat, "", "", CCGetFromGet("CUSTOMER_INFO_ID", NULL), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["CUSTOMER_INFO_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_INFO_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_INFO_ID"]->GetValue())) 
            $this->cp["CUSTOMER_INFO_ID"]->SetText(CCGetFromGet("CUSTOMER_INFO_ID", NULL));
        if (!strlen($this->cp["CUSTOMER_INFO_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_INFO_ID"]->GetValue(true))) 
            $this->cp["CUSTOMER_INFO_ID"]->SetText(0);
        $this->SQL = "DELETE FROM CUSTOMER_INFO WHERE  CUSTOMER_INFO_ID = " . $this->SQLValue($this->cp["CUSTOMER_INFO_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End CUSTOMER_INFOrecordDataSource Class @97-FCB6E20C

class clsRecordCustomer_Inf { //Customer_Inf Class @86-F1F3AA0D

//Variables @86-D6FF3E86

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

//Class_Initialize Event @86-216008D6
    function clsRecordCustomer_Inf($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record Customer_Inf/Error";
        $this->DataSource = new clsCustomer_InfDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "Customer_Inf";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->CUSTOMER_ID = & new clsControl(ccsLabel, "CUSTOMER_ID", "CODE", ccsText, "", CCGetRequestParam("CUSTOMER_ID", $Method, NULL), $this);
            $this->LAST_NAME = & new clsControl(ccsLabel, "LAST_NAME", "LAST_NAME", ccsText, "", CCGetRequestParam("LAST_NAME", $Method, NULL), $this);
            $this->CUSTOMER_NUMBER = & new clsControl(ccsLabel, "CUSTOMER_NUMBER", "CUSTOMER_NUMBER", ccsText, "", CCGetRequestParam("CUSTOMER_NUMBER", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @86-1FB700CB
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlCUSTOMER_ID"] = CCGetFromGet("CUSTOMER_ID", NULL);
    }
//End Initialize Method

//Validate Method @86-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @86-5B6C52C3
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CUSTOMER_ID->Errors->Count());
        $errors = ($errors || $this->LAST_NAME->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_NUMBER->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @86-ED598703
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

//Operation Method @86-17DC9883
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

//InsertRow Method @86-D0D6655E
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

//UpdateRow Method @86-81B85660
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

//DeleteRow Method @86-1067875D
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

//Show Method @86-D5CCD814
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
                $this->CUSTOMER_ID->SetValue($this->DataSource->CUSTOMER_ID->GetValue());
                $this->LAST_NAME->SetValue($this->DataSource->LAST_NAME->GetValue());
                $this->CUSTOMER_NUMBER->SetValue($this->DataSource->CUSTOMER_NUMBER->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CUSTOMER_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LAST_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_NUMBER->Errors->ToString());
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

        $this->CUSTOMER_ID->Show();
        $this->LAST_NAME->Show();
        $this->CUSTOMER_NUMBER->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End Customer_Inf Class @86-FCB6E20C

class clsCustomer_InfDataSource extends clsDBConn {  //Customer_InfDataSource Class @86-AEF908A6

//DataSource Variables @86-E9D43BC9
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
    var $CUSTOMER_ID;
    var $LAST_NAME;
    var $CUSTOMER_NUMBER;
//End DataSource Variables

//DataSourceClass_Initialize Event @86-8760BAE7
    function clsCustomer_InfDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record Customer_Inf/Error";
        $this->Initialize();
        $this->CUSTOMER_ID = new clsField("CUSTOMER_ID", ccsText, "");
        
        $this->LAST_NAME = new clsField("LAST_NAME", ccsText, "");
        
        $this->CUSTOMER_NUMBER = new clsField("CUSTOMER_NUMBER", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @86-9B7959AE
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlCUSTOMER_ID", ccsFloat, "", "", $this->Parameters["urlCUSTOMER_ID"], -99, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @86-13FA0C6F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT *\n" .
        "FROM CUSTOMER\n" .
        "WHERE CUSTOMER_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @86-65C306B0
    function SetValues()
    {
        $this->CUSTOMER_ID->SetDBValue($this->f("CUSTOMER_ID"));
        $this->LAST_NAME->SetDBValue($this->f("LAST_NAME"));
        $this->CUSTOMER_NUMBER->SetDBValue($this->f("CUSTOMER_NUMBER"));
    }
//End SetValues Method

//Insert Method @86-93979914
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

//Update Method @86-70BAF76A
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

//Delete Method @86-0698C0B8
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

} //End Customer_InfDataSource Class @86-FCB6E20C

//Initialize Page @1-3D99D63D
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
$TemplateFileName = "p_customer_info.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-DF954D9A
include_once("./p_customer_info_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-E63B605E
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$CUSTOMER_INFOgrid = & new clsGridCUSTOMER_INFOgrid("", $MainPage);
$V_CUSTOMERINFOSearch = & new clsRecordV_CUSTOMERINFOSearch("", $MainPage);
$CUSTOMER_INFOrecord = & new clsRecordCUSTOMER_INFOrecord("", $MainPage);
$Customer_Inf = & new clsRecordCustomer_Inf("", $MainPage);
$MainPage->CUSTOMER_INFOgrid = & $CUSTOMER_INFOgrid;
$MainPage->V_CUSTOMERINFOSearch = & $V_CUSTOMERINFOSearch;
$MainPage->CUSTOMER_INFOrecord = & $CUSTOMER_INFOrecord;
$MainPage->Customer_Inf = & $Customer_Inf;
$CUSTOMER_INFOgrid->Initialize();
$CUSTOMER_INFOrecord->Initialize();
$Customer_Inf->Initialize();

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

//Execute Components @1-8F7ECBFF
$V_CUSTOMERINFOSearch->Operation();
$CUSTOMER_INFOrecord->Operation();
$Customer_Inf->Operation();
//End Execute Components

//Go to destination page @1-EACB32A1
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($CUSTOMER_INFOgrid);
    unset($V_CUSTOMERINFOSearch);
    unset($CUSTOMER_INFOrecord);
    unset($Customer_Inf);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-CB67086E
$CUSTOMER_INFOgrid->Show();
$V_CUSTOMERINFOSearch->Show();
$CUSTOMER_INFOrecord->Show();
$Customer_Inf->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-C56160B1
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($CUSTOMER_INFOgrid);
unset($V_CUSTOMERINFOSearch);
unset($CUSTOMER_INFOrecord);
unset($Customer_Inf);
unset($Tpl);
//End Unload Page


?>
