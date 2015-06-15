<?php
//Include Common Files @1-2D316305
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_customer_master.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridV_CUSTOMER { //V_CUSTOMER class @2-2BB759FF

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

//Class_Initialize Event @2-0BA100CA
    function clsGridV_CUSTOMER($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "V_CUSTOMER";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid V_CUSTOMER";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsV_CUSTOMERDataSource($this);
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

        $this->CUSTOMER_NUMBER = & new clsControl(ccsLabel, "CUSTOMER_NUMBER", "CUSTOMER_NUMBER", ccsText, "", CCGetRequestParam("CUSTOMER_NUMBER", ccsGet, NULL), $this);
        $this->LAST_NAME = & new clsControl(ccsLabel, "LAST_NAME", "LAST_NAME", ccsText, "", CCGetRequestParam("LAST_NAME", ccsGet, NULL), $this);
        $this->ADDRESS_1 = & new clsControl(ccsLabel, "ADDRESS_1", "ADDRESS_1", ccsText, "", CCGetRequestParam("ADDRESS_1", ccsGet, NULL), $this);
        $this->ZIP_CODE = & new clsControl(ccsLabel, "ZIP_CODE", "ZIP_CODE", ccsFloat, "", CCGetRequestParam("ZIP_CODE", ccsGet, NULL), $this);
        $this->CUSTOMER_TITLE_CODE = & new clsControl(ccsLabel, "CUSTOMER_TITLE_CODE", "CUSTOMER_TITLE_CODE", ccsText, "", CCGetRequestParam("CUSTOMER_TITLE_CODE", ccsGet, NULL), $this);
        $this->REGION_NAME = & new clsControl(ccsLabel, "REGION_NAME", "REGION_NAME", ccsText, "", CCGetRequestParam("REGION_NAME", ccsGet, NULL), $this);
        $this->CUSTOMER_CLASS_CODE = & new clsControl(ccsLabel, "CUSTOMER_CLASS_CODE", "CUSTOMER_CLASS_CODE", ccsText, "", CCGetRequestParam("CUSTOMER_CLASS_CODE", ccsGet, NULL), $this);
        $this->ADDRESS_2 = & new clsControl(ccsLabel, "ADDRESS_2", "ADDRESS_2", ccsText, "", CCGetRequestParam("ADDRESS_2", ccsGet, NULL), $this);
        $this->ADDRESS_3 = & new clsControl(ccsLabel, "ADDRESS_3", "ADDRESS_3", ccsText, "", CCGetRequestParam("ADDRESS_3", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_customer_master.php";
        $this->CUSTOMER_ID = & new clsControl(ccsHidden, "CUSTOMER_ID", "CUSTOMER_ID", ccsText, "", CCGetRequestParam("CUSTOMER_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_CUSTOMER_Insert = & new clsControl(ccsLink, "P_CUSTOMER_Insert", "P_CUSTOMER_Insert", ccsText, "", CCGetRequestParam("P_CUSTOMER_Insert", ccsGet, NULL), $this);
        $this->P_CUSTOMER_Insert->Page = "p_customer_master.php";
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

//Show Method @2-8B4256BE
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
            $this->ControlsVisible["CUSTOMER_NUMBER"] = $this->CUSTOMER_NUMBER->Visible;
            $this->ControlsVisible["LAST_NAME"] = $this->LAST_NAME->Visible;
            $this->ControlsVisible["ADDRESS_1"] = $this->ADDRESS_1->Visible;
            $this->ControlsVisible["ZIP_CODE"] = $this->ZIP_CODE->Visible;
            $this->ControlsVisible["CUSTOMER_TITLE_CODE"] = $this->CUSTOMER_TITLE_CODE->Visible;
            $this->ControlsVisible["REGION_NAME"] = $this->REGION_NAME->Visible;
            $this->ControlsVisible["CUSTOMER_CLASS_CODE"] = $this->CUSTOMER_CLASS_CODE->Visible;
            $this->ControlsVisible["ADDRESS_2"] = $this->ADDRESS_2->Visible;
            $this->ControlsVisible["ADDRESS_3"] = $this->ADDRESS_3->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["CUSTOMER_ID"] = $this->CUSTOMER_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CUSTOMER_NUMBER->SetValue($this->DataSource->CUSTOMER_NUMBER->GetValue());
                $this->LAST_NAME->SetValue($this->DataSource->LAST_NAME->GetValue());
                $this->ADDRESS_1->SetValue($this->DataSource->ADDRESS_1->GetValue());
                $this->ZIP_CODE->SetValue($this->DataSource->ZIP_CODE->GetValue());
                $this->CUSTOMER_TITLE_CODE->SetValue($this->DataSource->CUSTOMER_TITLE_CODE->GetValue());
                $this->REGION_NAME->SetValue($this->DataSource->REGION_NAME->GetValue());
                $this->CUSTOMER_CLASS_CODE->SetValue($this->DataSource->CUSTOMER_CLASS_CODE->GetValue());
                $this->ADDRESS_2->SetValue($this->DataSource->ADDRESS_2->GetValue());
                $this->ADDRESS_3->SetValue($this->DataSource->ADDRESS_3->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "CUSTOMER_ID", $this->DataSource->f("CUSTOMER_ID"));
                $this->CUSTOMER_ID->SetValue($this->DataSource->CUSTOMER_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CUSTOMER_NUMBER->Show();
                $this->LAST_NAME->Show();
                $this->ADDRESS_1->Show();
                $this->ZIP_CODE->Show();
                $this->CUSTOMER_TITLE_CODE->Show();
                $this->REGION_NAME->Show();
                $this->CUSTOMER_CLASS_CODE->Show();
                $this->ADDRESS_2->Show();
                $this->ADDRESS_3->Show();
                $this->DLink->Show();
                $this->CUSTOMER_ID->Show();
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
        $this->P_CUSTOMER_Insert->Parameters = CCGetQueryString("QueryString", array("CUSTOMER_ID", "ccsForm"));
        $this->P_CUSTOMER_Insert->Parameters = CCAddParam($this->P_CUSTOMER_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_CUSTOMER_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-89BDCA24
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CUSTOMER_NUMBER->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LAST_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADDRESS_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ZIP_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_TITLE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REGION_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_CLASS_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADDRESS_2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADDRESS_3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End V_CUSTOMER Class @2-FCB6E20C

class clsV_CUSTOMERDataSource extends clsDBConn {  //V_CUSTOMERDataSource Class @2-2244306E

//DataSource Variables @2-5E602BC5
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CUSTOMER_NUMBER;
    var $LAST_NAME;
    var $ADDRESS_1;
    var $ZIP_CODE;
    var $CUSTOMER_TITLE_CODE;
    var $REGION_NAME;
    var $CUSTOMER_CLASS_CODE;
    var $ADDRESS_2;
    var $ADDRESS_3;
    var $CUSTOMER_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-1EA2A5D6
    function clsV_CUSTOMERDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid V_CUSTOMER";
        $this->Initialize();
        $this->CUSTOMER_NUMBER = new clsField("CUSTOMER_NUMBER", ccsText, "");
        
        $this->LAST_NAME = new clsField("LAST_NAME", ccsText, "");
        
        $this->ADDRESS_1 = new clsField("ADDRESS_1", ccsText, "");
        
        $this->ZIP_CODE = new clsField("ZIP_CODE", ccsFloat, "");
        
        $this->CUSTOMER_TITLE_CODE = new clsField("CUSTOMER_TITLE_CODE", ccsText, "");
        
        $this->REGION_NAME = new clsField("REGION_NAME", ccsText, "");
        
        $this->CUSTOMER_CLASS_CODE = new clsField("CUSTOMER_CLASS_CODE", ccsText, "");
        
        $this->ADDRESS_2 = new clsField("ADDRESS_2", ccsText, "");
        
        $this->ADDRESS_3 = new clsField("ADDRESS_3", ccsText, "");
        
        $this->CUSTOMER_ID = new clsField("CUSTOMER_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-DE4250DB
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "CUSTOMER_ID ASC";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-25AA94A2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
    }
//End Prepare Method

//Open Method @2-938728E4
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM v_customer\n" .
        "WHERE ( CUSTOMER_NUMBER LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR UPPER(LAST_NAME) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        "OR ZIP_CODE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR UPPER(REGION_NAME) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        "OR UPPER(CUSTOMER_CLASS_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        "OR UPPER(ADDRESS_1) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        "OR CUSTOMER_TITLE_CODE LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') )) cnt";
        $this->SQL = "SELECT * \n" .
        "FROM v_customer\n" .
        "WHERE ( CUSTOMER_NUMBER LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR UPPER(LAST_NAME) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        "OR ZIP_CODE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR UPPER(REGION_NAME) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        "OR UPPER(CUSTOMER_CLASS_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        "OR UPPER(ADDRESS_1) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        "OR CUSTOMER_TITLE_CODE LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') )  {SQL_OrderBy}";
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

//SetValues Method @2-D46C678F
    function SetValues()
    {
        $this->CUSTOMER_NUMBER->SetDBValue($this->f("CUSTOMER_NUMBER"));
        $this->LAST_NAME->SetDBValue($this->f("LAST_NAME"));
        $this->ADDRESS_1->SetDBValue($this->f("ADDRESS_1"));
        $this->ZIP_CODE->SetDBValue(trim($this->f("ZIP_CODE")));
        $this->CUSTOMER_TITLE_CODE->SetDBValue($this->f("CUSTOMER_TITLE_CODE"));
        $this->REGION_NAME->SetDBValue($this->f("REGION_NAME"));
        $this->CUSTOMER_CLASS_CODE->SetDBValue($this->f("CUSTOMER_CLASS_CODE"));
        $this->ADDRESS_2->SetDBValue($this->f("ADDRESS_2"));
        $this->ADDRESS_3->SetDBValue($this->f("ADDRESS_3"));
        $this->CUSTOMER_ID->SetDBValue($this->f("CUSTOMER_ID"));
    }
//End SetValues Method

} //End V_CUSTOMERDataSource Class @2-FCB6E20C

class clsRecordV_CUSTOMERSearch { //V_CUSTOMERSearch Class @3-1BC6FD03

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

//Class_Initialize Event @3-BA18BE07
    function clsRecordV_CUSTOMERSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_CUSTOMERSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_CUSTOMERSearch";
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

//Operation Method @3-58AA8528
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
        $Redirect = "p_customer_master.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_customer_master.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-9830B7FB
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

        $this->Button_DoSearch->Show();
        $this->s_keyword->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End V_CUSTOMERSearch Class @3-FCB6E20C

class clsRecordCustomerForm { //CustomerForm Class @97-EF922CC3

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

//Class_Initialize Event @97-50C75BFD
    function clsRecordCustomerForm($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record CustomerForm/Error";
        $this->DataSource = new clsCustomerFormDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "CustomerForm";
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
            $this->CUSTOMER_NUMBER = & new clsControl(ccsTextBox, "CUSTOMER_NUMBER", "CUSTOMER NUMBER", ccsText, "", CCGetRequestParam("CUSTOMER_NUMBER", $Method, NULL), $this);
            $this->CUSTOMER_NUMBER->Required = true;
            $this->LAST_NAME = & new clsControl(ccsTextBox, "LAST_NAME", "LAST NAME", ccsText, "", CCGetRequestParam("LAST_NAME", $Method, NULL), $this);
            $this->LAST_NAME->Required = true;
            $this->ADDRESS_1 = & new clsControl(ccsTextBox, "ADDRESS_1", "ADDRESS 1", ccsText, "", CCGetRequestParam("ADDRESS_1", $Method, NULL), $this);
            $this->ADDRESS_1->Required = true;
            $this->ADDRESS_3 = & new clsControl(ccsTextBox, "ADDRESS_3", "ADDRESS 3", ccsText, "", CCGetRequestParam("ADDRESS_3", $Method, NULL), $this);
            $this->ZIP_CODE = & new clsControl(ccsTextBox, "ZIP_CODE", "ZIP CODE", ccsFloat, "", CCGetRequestParam("ZIP_CODE", $Method, NULL), $this);
            $this->CCDB_CODE = & new clsControl(ccsTextBox, "CCDB_CODE", "CCDB CODE", ccsFloat, "", CCGetRequestParam("CCDB_CODE", $Method, NULL), $this);
            $this->FIRST_SUBSCRIPTION_DATE = & new clsControl(ccsTextBox, "FIRST_SUBSCRIPTION_DATE", "FIRST SUBSCRIPTION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("FIRST_SUBSCRIPTION_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->CUSTOMER_ID = & new clsControl(ccsTextBox, "CUSTOMER_ID", "CUSTOMER_ID", ccsText, "", CCGetRequestParam("CUSTOMER_ID", $Method, NULL), $this);
            $this->CUSTOMER_CLASS_ID = & new clsControl(ccsHidden, "CUSTOMER_CLASS_ID", "CUSTOMER CLASS ID", ccsFloat, "", CCGetRequestParam("CUSTOMER_CLASS_ID", $Method, NULL), $this);
            $this->CUSTOMER_CLASS_ID->Required = true;
            $this->DEBTOR_SEGMENT_CODE = & new clsControl(ccsTextBox, "DEBTOR_SEGMENT_CODE", "DEBTOR SEGMENT CODE", ccsText, "", CCGetRequestParam("DEBTOR_SEGMENT_CODE", $Method, NULL), $this);
            $this->DEBTOR_SEGMENT_CODE->Required = true;
            $this->CUSTOMER_SEGMENT_CODE = & new clsControl(ccsTextBox, "CUSTOMER_SEGMENT_CODE", "CUSTOMER SEGMENT CODE", ccsText, "", CCGetRequestParam("CUSTOMER_SEGMENT_CODE", $Method, NULL), $this);
            $this->CUSTOMER_SEGMENT_CODE->Required = true;
            $this->CUSTOMER_TITLE_CODE = & new clsControl(ccsTextBox, "CUSTOMER_TITLE_CODE", "CUSTOMER TITLE CODE", ccsText, "", CCGetRequestParam("CUSTOMER_TITLE_CODE", $Method, NULL), $this);
            $this->GENDER_CODE = & new clsControl(ccsTextBox, "GENDER_CODE", "GENDER CODE", ccsText, "", CCGetRequestParam("GENDER_CODE", $Method, NULL), $this);
            $this->DatePicker_UPDATE_DATE1 = & new clsDatePicker("DatePicker_UPDATE_DATE1", "CustomerForm", "FIRST_SUBSCRIPTION_DATE", $this);
            $this->CustomerClass = & new clsControl(ccsTextBox, "CustomerClass", "CustomerClass", ccsText, "", CCGetRequestParam("CustomerClass", $Method, NULL), $this);
            $this->CustomerClass->Required = true;
            $this->P_DEBTOR_SEGMENT_ID = & new clsControl(ccsHidden, "P_DEBTOR_SEGMENT_ID", "P_DEBTOR_SEGMENT_ID", ccsFloat, "", CCGetRequestParam("P_DEBTOR_SEGMENT_ID", $Method, NULL), $this);
            $this->P_CUSTOMER_SEGMENT_ID = & new clsControl(ccsHidden, "P_CUSTOMER_SEGMENT_ID", "P_CUSTOMER_SEGMENT_ID", ccsFloat, "", CCGetRequestParam("P_CUSTOMER_SEGMENT_ID", $Method, NULL), $this);
            $this->P_CUSTOMER_TITLE_ID = & new clsControl(ccsHidden, "P_CUSTOMER_TITLE_ID", "P_CUSTOMER_TITLE_ID", ccsFloat, "", CCGetRequestParam("P_CUSTOMER_TITLE_ID", $Method, NULL), $this);
            $this->GENDER_TYPE_ID = & new clsControl(ccsHidden, "GENDER_TYPE_ID", "GENDER_TYPE_ID", ccsFloat, "", CCGetRequestParam("GENDER_TYPE_ID", $Method, NULL), $this);
            $this->SUB_DEBTOR_SEGMENT_CODE = & new clsControl(ccsTextBox, "SUB_DEBTOR_SEGMENT_CODE", "SUB DEBTOR SEGMENT CODE", ccsText, "", CCGetRequestParam("SUB_DEBTOR_SEGMENT_CODE", $Method, NULL), $this);
            $this->P_SUB_DEBTOR_SEGMENT_ID = & new clsControl(ccsHidden, "P_SUB_DEBTOR_SEGMENT_ID", "P_SUB_DEBTOR_SEGMENT_ID", ccsFloat, "", CCGetRequestParam("P_SUB_DEBTOR_SEGMENT_ID", $Method, NULL), $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->BUSINESS_SEGMENT_CODE = & new clsControl(ccsTextBox, "BUSINESS_SEGMENT_CODE", "BUSINESS SEGMENT CODE", ccsText, "", CCGetRequestParam("BUSINESS_SEGMENT_CODE", $Method, NULL), $this);
            $this->P_BUSINESS_SEGMENT_ID = & new clsControl(ccsHidden, "P_BUSINESS_SEGMENT_ID", "P_BUSINESS_SEGMENT_ID", ccsFloat, "", CCGetRequestParam("P_BUSINESS_SEGMENT_ID", $Method, NULL), $this);
            $this->ADDRESS_2 = & new clsControl(ccsTextBox, "ADDRESS_2", "ADDRESS 2", ccsText, "", CCGetRequestParam("ADDRESS_2", $Method, NULL), $this);
            $this->REGION_NAME = & new clsControl(ccsTextBox, "REGION_NAME", "REGION NAME", ccsText, "", CCGetRequestParam("REGION_NAME", $Method, NULL), $this);
            $this->P_REGION_ID = & new clsControl(ccsHidden, "P_REGION_ID", "P_REGION_ID", ccsFloat, "", CCGetRequestParam("P_REGION_ID", $Method, NULL), $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @97-1FB700CB
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlCUSTOMER_ID"] = CCGetFromGet("CUSTOMER_ID", NULL);
    }
//End Initialize Method

//Validate Method @97-C8A1F1D6
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CUSTOMER_NUMBER->Validate() && $Validation);
        $Validation = ($this->LAST_NAME->Validate() && $Validation);
        $Validation = ($this->ADDRESS_1->Validate() && $Validation);
        $Validation = ($this->ADDRESS_3->Validate() && $Validation);
        $Validation = ($this->ZIP_CODE->Validate() && $Validation);
        $Validation = ($this->CCDB_CODE->Validate() && $Validation);
        $Validation = ($this->FIRST_SUBSCRIPTION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_ID->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_CLASS_ID->Validate() && $Validation);
        $Validation = ($this->DEBTOR_SEGMENT_CODE->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_SEGMENT_CODE->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_TITLE_CODE->Validate() && $Validation);
        $Validation = ($this->GENDER_CODE->Validate() && $Validation);
        $Validation = ($this->CustomerClass->Validate() && $Validation);
        $Validation = ($this->P_DEBTOR_SEGMENT_ID->Validate() && $Validation);
        $Validation = ($this->P_CUSTOMER_SEGMENT_ID->Validate() && $Validation);
        $Validation = ($this->P_CUSTOMER_TITLE_ID->Validate() && $Validation);
        $Validation = ($this->GENDER_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->SUB_DEBTOR_SEGMENT_CODE->Validate() && $Validation);
        $Validation = ($this->P_SUB_DEBTOR_SEGMENT_ID->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->BUSINESS_SEGMENT_CODE->Validate() && $Validation);
        $Validation = ($this->P_BUSINESS_SEGMENT_ID->Validate() && $Validation);
        $Validation = ($this->ADDRESS_2->Validate() && $Validation);
        $Validation = ($this->REGION_NAME->Validate() && $Validation);
        $Validation = ($this->P_REGION_ID->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CUSTOMER_NUMBER->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LAST_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ADDRESS_1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ADDRESS_3->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ZIP_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CCDB_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FIRST_SUBSCRIPTION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_CLASS_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DEBTOR_SEGMENT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_SEGMENT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_TITLE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->GENDER_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CustomerClass->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_DEBTOR_SEGMENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CUSTOMER_SEGMENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CUSTOMER_TITLE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->GENDER_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUB_DEBTOR_SEGMENT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SUB_DEBTOR_SEGMENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BUSINESS_SEGMENT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BUSINESS_SEGMENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ADDRESS_2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->REGION_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REGION_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @97-AD8D24AC
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CUSTOMER_NUMBER->Errors->Count());
        $errors = ($errors || $this->LAST_NAME->Errors->Count());
        $errors = ($errors || $this->ADDRESS_1->Errors->Count());
        $errors = ($errors || $this->ADDRESS_3->Errors->Count());
        $errors = ($errors || $this->ZIP_CODE->Errors->Count());
        $errors = ($errors || $this->CCDB_CODE->Errors->Count());
        $errors = ($errors || $this->FIRST_SUBSCRIPTION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_ID->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_CLASS_ID->Errors->Count());
        $errors = ($errors || $this->DEBTOR_SEGMENT_CODE->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_SEGMENT_CODE->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_TITLE_CODE->Errors->Count());
        $errors = ($errors || $this->GENDER_CODE->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE1->Errors->Count());
        $errors = ($errors || $this->CustomerClass->Errors->Count());
        $errors = ($errors || $this->P_DEBTOR_SEGMENT_ID->Errors->Count());
        $errors = ($errors || $this->P_CUSTOMER_SEGMENT_ID->Errors->Count());
        $errors = ($errors || $this->P_CUSTOMER_TITLE_ID->Errors->Count());
        $errors = ($errors || $this->GENDER_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->SUB_DEBTOR_SEGMENT_CODE->Errors->Count());
        $errors = ($errors || $this->P_SUB_DEBTOR_SEGMENT_ID->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->BUSINESS_SEGMENT_CODE->Errors->Count());
        $errors = ($errors || $this->P_BUSINESS_SEGMENT_ID->Errors->Count());
        $errors = ($errors || $this->ADDRESS_2->Errors->Count());
        $errors = ($errors || $this->REGION_NAME->Errors->Count());
        $errors = ($errors || $this->P_REGION_ID->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
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

//Operation Method @97-8ADE7A09
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
        $Redirect = "p_customer_master.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            $Redirect = "p_customer_master.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = "p_customer_master.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = "p_customer_master.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
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

//InsertRow Method @97-F6F28051
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CUSTOMER_NUMBER->SetValue($this->CUSTOMER_NUMBER->GetValue(true));
        $this->DataSource->LAST_NAME->SetValue($this->LAST_NAME->GetValue(true));
        $this->DataSource->ADDRESS_1->SetValue($this->ADDRESS_1->GetValue(true));
        $this->DataSource->ADDRESS_3->SetValue($this->ADDRESS_3->GetValue(true));
        $this->DataSource->ZIP_CODE->SetValue($this->ZIP_CODE->GetValue(true));
        $this->DataSource->CCDB_CODE->SetValue($this->CCDB_CODE->GetValue(true));
        $this->DataSource->FIRST_SUBSCRIPTION_DATE->SetValue($this->FIRST_SUBSCRIPTION_DATE->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->CUSTOMER_ID->SetValue($this->CUSTOMER_ID->GetValue(true));
        $this->DataSource->CUSTOMER_CLASS_ID->SetValue($this->CUSTOMER_CLASS_ID->GetValue(true));
        $this->DataSource->DEBTOR_SEGMENT_CODE->SetValue($this->DEBTOR_SEGMENT_CODE->GetValue(true));
        $this->DataSource->CUSTOMER_SEGMENT_CODE->SetValue($this->CUSTOMER_SEGMENT_CODE->GetValue(true));
        $this->DataSource->CUSTOMER_TITLE_CODE->SetValue($this->CUSTOMER_TITLE_CODE->GetValue(true));
        $this->DataSource->GENDER_CODE->SetValue($this->GENDER_CODE->GetValue(true));
        $this->DataSource->CustomerClass->SetValue($this->CustomerClass->GetValue(true));
        $this->DataSource->P_DEBTOR_SEGMENT_ID->SetValue($this->P_DEBTOR_SEGMENT_ID->GetValue(true));
        $this->DataSource->P_CUSTOMER_SEGMENT_ID->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        $this->DataSource->P_CUSTOMER_TITLE_ID->SetValue($this->P_CUSTOMER_TITLE_ID->GetValue(true));
        $this->DataSource->GENDER_TYPE_ID->SetValue($this->GENDER_TYPE_ID->GetValue(true));
        $this->DataSource->SUB_DEBTOR_SEGMENT_CODE->SetValue($this->SUB_DEBTOR_SEGMENT_CODE->GetValue(true));
        $this->DataSource->P_SUB_DEBTOR_SEGMENT_ID->SetValue($this->P_SUB_DEBTOR_SEGMENT_ID->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->BUSINESS_SEGMENT_CODE->SetValue($this->BUSINESS_SEGMENT_CODE->GetValue(true));
        $this->DataSource->P_BUSINESS_SEGMENT_ID->SetValue($this->P_BUSINESS_SEGMENT_ID->GetValue(true));
        $this->DataSource->ADDRESS_2->SetValue($this->ADDRESS_2->GetValue(true));
        $this->DataSource->REGION_NAME->SetValue($this->REGION_NAME->GetValue(true));
        $this->DataSource->P_REGION_ID->SetValue($this->P_REGION_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @97-0233C798
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CUSTOMER_NUMBER->SetValue($this->CUSTOMER_NUMBER->GetValue(true));
        $this->DataSource->LAST_NAME->SetValue($this->LAST_NAME->GetValue(true));
        $this->DataSource->ADDRESS_1->SetValue($this->ADDRESS_1->GetValue(true));
        $this->DataSource->ADDRESS_3->SetValue($this->ADDRESS_3->GetValue(true));
        $this->DataSource->ZIP_CODE->SetValue($this->ZIP_CODE->GetValue(true));
        $this->DataSource->CCDB_CODE->SetValue($this->CCDB_CODE->GetValue(true));
        $this->DataSource->FIRST_SUBSCRIPTION_DATE->SetValue($this->FIRST_SUBSCRIPTION_DATE->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->CUSTOMER_ID->SetValue($this->CUSTOMER_ID->GetValue(true));
        $this->DataSource->CUSTOMER_CLASS_ID->SetValue($this->CUSTOMER_CLASS_ID->GetValue(true));
        $this->DataSource->P_DEBTOR_SEGMENT_ID->SetValue($this->P_DEBTOR_SEGMENT_ID->GetValue(true));
        $this->DataSource->P_CUSTOMER_SEGMENT_ID->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        $this->DataSource->P_CUSTOMER_TITLE_ID->SetValue($this->P_CUSTOMER_TITLE_ID->GetValue(true));
        $this->DataSource->GENDER_TYPE_ID->SetValue($this->GENDER_TYPE_ID->GetValue(true));
        $this->DataSource->P_SUB_DEBTOR_SEGMENT_ID->SetValue($this->P_SUB_DEBTOR_SEGMENT_ID->GetValue(true));
        $this->DataSource->P_BUSINESS_SEGMENT_ID->SetValue($this->P_BUSINESS_SEGMENT_ID->GetValue(true));
        $this->DataSource->ADDRESS_2->SetValue($this->ADDRESS_2->GetValue(true));
        $this->DataSource->REGION_NAME->SetValue($this->REGION_NAME->GetValue(true));
        $this->DataSource->P_REGION_ID->SetValue($this->P_REGION_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @97-24F3F61D
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->CUSTOMER_ID->SetValue($this->CUSTOMER_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @97-EB7FDFD1
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
                    $this->CUSTOMER_NUMBER->SetValue($this->DataSource->CUSTOMER_NUMBER->GetValue());
                    $this->LAST_NAME->SetValue($this->DataSource->LAST_NAME->GetValue());
                    $this->ADDRESS_1->SetValue($this->DataSource->ADDRESS_1->GetValue());
                    $this->ADDRESS_3->SetValue($this->DataSource->ADDRESS_3->GetValue());
                    $this->ZIP_CODE->SetValue($this->DataSource->ZIP_CODE->GetValue());
                    $this->CCDB_CODE->SetValue($this->DataSource->CCDB_CODE->GetValue());
                    $this->FIRST_SUBSCRIPTION_DATE->SetValue($this->DataSource->FIRST_SUBSCRIPTION_DATE->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->CUSTOMER_ID->SetValue($this->DataSource->CUSTOMER_ID->GetValue());
                    $this->CUSTOMER_CLASS_ID->SetValue($this->DataSource->CUSTOMER_CLASS_ID->GetValue());
                    $this->DEBTOR_SEGMENT_CODE->SetValue($this->DataSource->DEBTOR_SEGMENT_CODE->GetValue());
                    $this->CUSTOMER_SEGMENT_CODE->SetValue($this->DataSource->CUSTOMER_SEGMENT_CODE->GetValue());
                    $this->CUSTOMER_TITLE_CODE->SetValue($this->DataSource->CUSTOMER_TITLE_CODE->GetValue());
                    $this->GENDER_CODE->SetValue($this->DataSource->GENDER_CODE->GetValue());
                    $this->CustomerClass->SetValue($this->DataSource->CustomerClass->GetValue());
                    $this->P_DEBTOR_SEGMENT_ID->SetValue($this->DataSource->P_DEBTOR_SEGMENT_ID->GetValue());
                    $this->P_CUSTOMER_SEGMENT_ID->SetValue($this->DataSource->P_CUSTOMER_SEGMENT_ID->GetValue());
                    $this->P_CUSTOMER_TITLE_ID->SetValue($this->DataSource->P_CUSTOMER_TITLE_ID->GetValue());
                    $this->GENDER_TYPE_ID->SetValue($this->DataSource->GENDER_TYPE_ID->GetValue());
                    $this->SUB_DEBTOR_SEGMENT_CODE->SetValue($this->DataSource->SUB_DEBTOR_SEGMENT_CODE->GetValue());
                    $this->P_SUB_DEBTOR_SEGMENT_ID->SetValue($this->DataSource->P_SUB_DEBTOR_SEGMENT_ID->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->BUSINESS_SEGMENT_CODE->SetValue($this->DataSource->BUSINESS_SEGMENT_CODE->GetValue());
                    $this->P_BUSINESS_SEGMENT_ID->SetValue($this->DataSource->P_BUSINESS_SEGMENT_ID->GetValue());
                    $this->ADDRESS_2->SetValue($this->DataSource->ADDRESS_2->GetValue());
                    $this->REGION_NAME->SetValue($this->DataSource->REGION_NAME->GetValue());
                    $this->P_REGION_ID->SetValue($this->DataSource->P_REGION_ID->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CUSTOMER_NUMBER->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LAST_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ADDRESS_1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ADDRESS_3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ZIP_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CCDB_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FIRST_SUBSCRIPTION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_CLASS_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DEBTOR_SEGMENT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_SEGMENT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_TITLE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->GENDER_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CustomerClass->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_DEBTOR_SEGMENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CUSTOMER_SEGMENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CUSTOMER_TITLE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->GENDER_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUB_DEBTOR_SEGMENT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SUB_DEBTOR_SEGMENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BUSINESS_SEGMENT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BUSINESS_SEGMENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ADDRESS_2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->REGION_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REGION_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
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
        $this->CUSTOMER_NUMBER->Show();
        $this->LAST_NAME->Show();
        $this->ADDRESS_1->Show();
        $this->ADDRESS_3->Show();
        $this->ZIP_CODE->Show();
        $this->CCDB_CODE->Show();
        $this->FIRST_SUBSCRIPTION_DATE->Show();
        $this->UPDATE_DATE->Show();
        $this->CUSTOMER_ID->Show();
        $this->CUSTOMER_CLASS_ID->Show();
        $this->DEBTOR_SEGMENT_CODE->Show();
        $this->CUSTOMER_SEGMENT_CODE->Show();
        $this->CUSTOMER_TITLE_CODE->Show();
        $this->GENDER_CODE->Show();
        $this->DatePicker_UPDATE_DATE1->Show();
        $this->CustomerClass->Show();
        $this->P_DEBTOR_SEGMENT_ID->Show();
        $this->P_CUSTOMER_SEGMENT_ID->Show();
        $this->P_CUSTOMER_TITLE_ID->Show();
        $this->GENDER_TYPE_ID->Show();
        $this->SUB_DEBTOR_SEGMENT_CODE->Show();
        $this->P_SUB_DEBTOR_SEGMENT_ID->Show();
        $this->UPDATE_BY->Show();
        $this->BUSINESS_SEGMENT_CODE->Show();
        $this->P_BUSINESS_SEGMENT_ID->Show();
        $this->ADDRESS_2->Show();
        $this->REGION_NAME->Show();
        $this->P_REGION_ID->Show();
        $this->DESCRIPTION->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End CustomerForm Class @97-FCB6E20C

class clsCustomerFormDataSource extends clsDBConn {  //CustomerFormDataSource Class @97-21CEDC62

//DataSource Variables @97-D57B8D34
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
    var $CUSTOMER_NUMBER;
    var $LAST_NAME;
    var $ADDRESS_1;
    var $ADDRESS_3;
    var $ZIP_CODE;
    var $CCDB_CODE;
    var $FIRST_SUBSCRIPTION_DATE;
    var $UPDATE_DATE;
    var $CUSTOMER_ID;
    var $CUSTOMER_CLASS_ID;
    var $DEBTOR_SEGMENT_CODE;
    var $CUSTOMER_SEGMENT_CODE;
    var $CUSTOMER_TITLE_CODE;
    var $GENDER_CODE;
    var $CustomerClass;
    var $P_DEBTOR_SEGMENT_ID;
    var $P_CUSTOMER_SEGMENT_ID;
    var $P_CUSTOMER_TITLE_ID;
    var $GENDER_TYPE_ID;
    var $SUB_DEBTOR_SEGMENT_CODE;
    var $P_SUB_DEBTOR_SEGMENT_ID;
    var $UPDATE_BY;
    var $BUSINESS_SEGMENT_CODE;
    var $P_BUSINESS_SEGMENT_ID;
    var $ADDRESS_2;
    var $REGION_NAME;
    var $P_REGION_ID;
    var $DESCRIPTION;
//End DataSource Variables

//DataSourceClass_Initialize Event @97-BFC12169
    function clsCustomerFormDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record CustomerForm/Error";
        $this->Initialize();
        $this->CUSTOMER_NUMBER = new clsField("CUSTOMER_NUMBER", ccsText, "");
        
        $this->LAST_NAME = new clsField("LAST_NAME", ccsText, "");
        
        $this->ADDRESS_1 = new clsField("ADDRESS_1", ccsText, "");
        
        $this->ADDRESS_3 = new clsField("ADDRESS_3", ccsText, "");
        
        $this->ZIP_CODE = new clsField("ZIP_CODE", ccsFloat, "");
        
        $this->CCDB_CODE = new clsField("CCDB_CODE", ccsFloat, "");
        
        $this->FIRST_SUBSCRIPTION_DATE = new clsField("FIRST_SUBSCRIPTION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->CUSTOMER_ID = new clsField("CUSTOMER_ID", ccsText, "");
        
        $this->CUSTOMER_CLASS_ID = new clsField("CUSTOMER_CLASS_ID", ccsFloat, "");
        
        $this->DEBTOR_SEGMENT_CODE = new clsField("DEBTOR_SEGMENT_CODE", ccsText, "");
        
        $this->CUSTOMER_SEGMENT_CODE = new clsField("CUSTOMER_SEGMENT_CODE", ccsText, "");
        
        $this->CUSTOMER_TITLE_CODE = new clsField("CUSTOMER_TITLE_CODE", ccsText, "");
        
        $this->GENDER_CODE = new clsField("GENDER_CODE", ccsText, "");
        
        $this->CustomerClass = new clsField("CustomerClass", ccsText, "");
        
        $this->P_DEBTOR_SEGMENT_ID = new clsField("P_DEBTOR_SEGMENT_ID", ccsFloat, "");
        
        $this->P_CUSTOMER_SEGMENT_ID = new clsField("P_CUSTOMER_SEGMENT_ID", ccsFloat, "");
        
        $this->P_CUSTOMER_TITLE_ID = new clsField("P_CUSTOMER_TITLE_ID", ccsFloat, "");
        
        $this->GENDER_TYPE_ID = new clsField("GENDER_TYPE_ID", ccsFloat, "");
        
        $this->SUB_DEBTOR_SEGMENT_CODE = new clsField("SUB_DEBTOR_SEGMENT_CODE", ccsText, "");
        
        $this->P_SUB_DEBTOR_SEGMENT_ID = new clsField("P_SUB_DEBTOR_SEGMENT_ID", ccsFloat, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->BUSINESS_SEGMENT_CODE = new clsField("BUSINESS_SEGMENT_CODE", ccsText, "");
        
        $this->P_BUSINESS_SEGMENT_ID = new clsField("P_BUSINESS_SEGMENT_ID", ccsFloat, "");
        
        $this->ADDRESS_2 = new clsField("ADDRESS_2", ccsText, "");
        
        $this->REGION_NAME = new clsField("REGION_NAME", ccsText, "");
        
        $this->P_REGION_ID = new clsField("P_REGION_ID", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @97-771E9578
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlCUSTOMER_ID", ccsFloat, "", "", $this->Parameters["urlCUSTOMER_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "CUSTOMER_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @97-FA30421C
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM v_customer {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @97-88F1C32A
    function SetValues()
    {
        $this->CUSTOMER_NUMBER->SetDBValue($this->f("CUSTOMER_NUMBER"));
        $this->LAST_NAME->SetDBValue($this->f("LAST_NAME"));
        $this->ADDRESS_1->SetDBValue($this->f("ADDRESS_1"));
        $this->ADDRESS_3->SetDBValue($this->f("ADDRESS_3"));
        $this->ZIP_CODE->SetDBValue(trim($this->f("ZIP_CODE")));
        $this->CCDB_CODE->SetDBValue(trim($this->f("CCDB_CODE")));
        $this->FIRST_SUBSCRIPTION_DATE->SetDBValue(trim($this->f("FIRST_SUBSCRIPTION_DATE")));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->CUSTOMER_ID->SetDBValue($this->f("CUSTOMER_ID"));
        $this->CUSTOMER_CLASS_ID->SetDBValue(trim($this->f("CUSTOMER_CLASS_ID")));
        $this->DEBTOR_SEGMENT_CODE->SetDBValue($this->f("DEBTOR_SEGMENT_CODE"));
        $this->CUSTOMER_SEGMENT_CODE->SetDBValue($this->f("CUSTOMER_SEGMENT_CODE"));
        $this->CUSTOMER_TITLE_CODE->SetDBValue($this->f("CUSTOMER_TITLE_CODE"));
        $this->GENDER_CODE->SetDBValue($this->f("GENDER_CODE"));
        $this->CustomerClass->SetDBValue($this->f("CUSTOMER_CLASS_CODE"));
        $this->P_DEBTOR_SEGMENT_ID->SetDBValue(trim($this->f("P_DEBTOR_SEGMENT_ID")));
        $this->P_CUSTOMER_SEGMENT_ID->SetDBValue(trim($this->f("P_CUSTOMER_SEGMENT_ID")));
        $this->P_CUSTOMER_TITLE_ID->SetDBValue(trim($this->f("P_CUSTOMER_TITLE_ID")));
        $this->GENDER_TYPE_ID->SetDBValue(trim($this->f("GENDER_TYPE_ID")));
        $this->SUB_DEBTOR_SEGMENT_CODE->SetDBValue($this->f("SUB_DEBTOR_SEGMENT_CODE"));
        $this->P_SUB_DEBTOR_SEGMENT_ID->SetDBValue(trim($this->f("P_SUB_DEBTOR_SEGMENT_ID")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->BUSINESS_SEGMENT_CODE->SetDBValue($this->f("BUSINESS_SEGMENT_CODE"));
        $this->P_BUSINESS_SEGMENT_ID->SetDBValue(trim($this->f("P_BUSINESS_SEGMENT_ID")));
        $this->ADDRESS_2->SetDBValue($this->f("ADDRESS_2"));
        $this->REGION_NAME->SetDBValue($this->f("REGION_NAME"));
        $this->P_REGION_ID->SetDBValue(trim($this->f("P_REGION_ID")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
    }
//End SetValues Method

//Insert Method @97-AB34CE04
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUSTOMER_NUMBER"] = new clsSQLParameter("ctrlCUSTOMER_NUMBER", ccsText, "", "", $this->CUSTOMER_NUMBER->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LAST_NAME"] = new clsSQLParameter("ctrlLAST_NAME", ccsText, "", "", $this->LAST_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_1"] = new clsSQLParameter("ctrlADDRESS_1", ccsText, "", "", $this->ADDRESS_1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_3"] = new clsSQLParameter("ctrlADDRESS_3", ccsText, "", "", $this->ADDRESS_3->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ZIP_CODE"] = new clsSQLParameter("ctrlZIP_CODE", ccsFloat, "", "", $this->ZIP_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CCDB_CODE"] = new clsSQLParameter("ctrlCCDB_CODE", ccsFloat, "", "", $this->CCDB_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FIRST_SUBSCRIPTION_DATE"] = new clsSQLParameter("ctrlFIRST_SUBSCRIPTION_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->FIRST_SUBSCRIPTION_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_ID"] = new clsSQLParameter("ctrlCUSTOMER_ID", ccsText, "", "", $this->CUSTOMER_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_CLASS_ID"] = new clsSQLParameter("ctrlCUSTOMER_CLASS_ID", ccsFloat, "", "", $this->CUSTOMER_CLASS_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DEBTOR_SEGMENT_CODE"] = new clsSQLParameter("ctrlDEBTOR_SEGMENT_CODE", ccsText, "", "", $this->DEBTOR_SEGMENT_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_SEGMENT_CODE"] = new clsSQLParameter("ctrlCUSTOMER_SEGMENT_CODE", ccsText, "", "", $this->CUSTOMER_SEGMENT_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_TITLE_CODE"] = new clsSQLParameter("ctrlCUSTOMER_TITLE_CODE", ccsText, "", "", $this->CUSTOMER_TITLE_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["GENDER_CODE"] = new clsSQLParameter("ctrlGENDER_CODE", ccsText, "", "", $this->GENDER_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CustomerClass"] = new clsSQLParameter("ctrlCustomerClass", ccsText, "", "", $this->CustomerClass->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_DEBTOR_SEGMENT_ID"] = new clsSQLParameter("ctrlP_DEBTOR_SEGMENT_ID", ccsFloat, "", "", $this->P_DEBTOR_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CUSTOMER_SEGMENT_ID"] = new clsSQLParameter("ctrlP_CUSTOMER_SEGMENT_ID", ccsFloat, "", "", $this->P_CUSTOMER_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CUSTOMER_TITLE_ID"] = new clsSQLParameter("ctrlP_CUSTOMER_TITLE_ID", ccsFloat, "", "", $this->P_CUSTOMER_TITLE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["GENDER_TYPE_ID"] = new clsSQLParameter("ctrlGENDER_TYPE_ID", ccsFloat, "", "", $this->GENDER_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUB_DEBTOR_SEGMENT_CODE"] = new clsSQLParameter("ctrlSUB_DEBTOR_SEGMENT_CODE", ccsText, "", "", $this->SUB_DEBTOR_SEGMENT_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SUB_DEBTOR_SEGMENT_ID"] = new clsSQLParameter("ctrlP_SUB_DEBTOR_SEGMENT_ID", ccsFloat, "", "", $this->P_SUB_DEBTOR_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BUSINESS_SEGMENT_CODE"] = new clsSQLParameter("ctrlBUSINESS_SEGMENT_CODE", ccsText, "", "", $this->BUSINESS_SEGMENT_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BUSINESS_SEGMENT_ID"] = new clsSQLParameter("ctrlP_BUSINESS_SEGMENT_ID", ccsFloat, "", "", $this->P_BUSINESS_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_2"] = new clsSQLParameter("ctrlADDRESS_2", ccsText, "", "", $this->ADDRESS_2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["REGION_NAME"] = new clsSQLParameter("ctrlREGION_NAME", ccsText, "", "", $this->REGION_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_REGION_ID"] = new clsSQLParameter("ctrlP_REGION_ID", ccsFloat, "", "", $this->P_REGION_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CUSTOMER_NUMBER"]->GetValue()) and !strlen($this->cp["CUSTOMER_NUMBER"]->GetText()) and !is_bool($this->cp["CUSTOMER_NUMBER"]->GetValue())) 
            $this->cp["CUSTOMER_NUMBER"]->SetValue($this->CUSTOMER_NUMBER->GetValue(true));
        if (!is_null($this->cp["LAST_NAME"]->GetValue()) and !strlen($this->cp["LAST_NAME"]->GetText()) and !is_bool($this->cp["LAST_NAME"]->GetValue())) 
            $this->cp["LAST_NAME"]->SetValue($this->LAST_NAME->GetValue(true));
        if (!is_null($this->cp["ADDRESS_1"]->GetValue()) and !strlen($this->cp["ADDRESS_1"]->GetText()) and !is_bool($this->cp["ADDRESS_1"]->GetValue())) 
            $this->cp["ADDRESS_1"]->SetValue($this->ADDRESS_1->GetValue(true));
        if (!is_null($this->cp["ADDRESS_3"]->GetValue()) and !strlen($this->cp["ADDRESS_3"]->GetText()) and !is_bool($this->cp["ADDRESS_3"]->GetValue())) 
            $this->cp["ADDRESS_3"]->SetValue($this->ADDRESS_3->GetValue(true));
        if (!is_null($this->cp["ZIP_CODE"]->GetValue()) and !strlen($this->cp["ZIP_CODE"]->GetText()) and !is_bool($this->cp["ZIP_CODE"]->GetValue())) 
            $this->cp["ZIP_CODE"]->SetValue($this->ZIP_CODE->GetValue(true));
        if (!is_null($this->cp["CCDB_CODE"]->GetValue()) and !strlen($this->cp["CCDB_CODE"]->GetText()) and !is_bool($this->cp["CCDB_CODE"]->GetValue())) 
            $this->cp["CCDB_CODE"]->SetValue($this->CCDB_CODE->GetValue(true));
        if (!is_null($this->cp["FIRST_SUBSCRIPTION_DATE"]->GetValue()) and !strlen($this->cp["FIRST_SUBSCRIPTION_DATE"]->GetText()) and !is_bool($this->cp["FIRST_SUBSCRIPTION_DATE"]->GetValue())) 
            $this->cp["FIRST_SUBSCRIPTION_DATE"]->SetValue($this->FIRST_SUBSCRIPTION_DATE->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ID"]->SetValue($this->CUSTOMER_ID->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_CLASS_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_CLASS_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_CLASS_ID"]->GetValue())) 
            $this->cp["CUSTOMER_CLASS_ID"]->SetValue($this->CUSTOMER_CLASS_ID->GetValue(true));
        if (!is_null($this->cp["DEBTOR_SEGMENT_CODE"]->GetValue()) and !strlen($this->cp["DEBTOR_SEGMENT_CODE"]->GetText()) and !is_bool($this->cp["DEBTOR_SEGMENT_CODE"]->GetValue())) 
            $this->cp["DEBTOR_SEGMENT_CODE"]->SetValue($this->DEBTOR_SEGMENT_CODE->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_SEGMENT_CODE"]->GetValue()) and !strlen($this->cp["CUSTOMER_SEGMENT_CODE"]->GetText()) and !is_bool($this->cp["CUSTOMER_SEGMENT_CODE"]->GetValue())) 
            $this->cp["CUSTOMER_SEGMENT_CODE"]->SetValue($this->CUSTOMER_SEGMENT_CODE->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_TITLE_CODE"]->GetValue()) and !strlen($this->cp["CUSTOMER_TITLE_CODE"]->GetText()) and !is_bool($this->cp["CUSTOMER_TITLE_CODE"]->GetValue())) 
            $this->cp["CUSTOMER_TITLE_CODE"]->SetValue($this->CUSTOMER_TITLE_CODE->GetValue(true));
        if (!is_null($this->cp["GENDER_CODE"]->GetValue()) and !strlen($this->cp["GENDER_CODE"]->GetText()) and !is_bool($this->cp["GENDER_CODE"]->GetValue())) 
            $this->cp["GENDER_CODE"]->SetValue($this->GENDER_CODE->GetValue(true));
        if (!is_null($this->cp["CustomerClass"]->GetValue()) and !strlen($this->cp["CustomerClass"]->GetText()) and !is_bool($this->cp["CustomerClass"]->GetValue())) 
            $this->cp["CustomerClass"]->SetValue($this->CustomerClass->GetValue(true));
        if (!is_null($this->cp["P_DEBTOR_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_DEBTOR_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_DEBTOR_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_DEBTOR_SEGMENT_ID"]->SetValue($this->P_DEBTOR_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_CUSTOMER_SEGMENT_ID"]->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue()) and !strlen($this->cp["P_CUSTOMER_TITLE_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue())) 
            $this->cp["P_CUSTOMER_TITLE_ID"]->SetValue($this->P_CUSTOMER_TITLE_ID->GetValue(true));
        if (!is_null($this->cp["GENDER_TYPE_ID"]->GetValue()) and !strlen($this->cp["GENDER_TYPE_ID"]->GetText()) and !is_bool($this->cp["GENDER_TYPE_ID"]->GetValue())) 
            $this->cp["GENDER_TYPE_ID"]->SetValue($this->GENDER_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["SUB_DEBTOR_SEGMENT_CODE"]->GetValue()) and !strlen($this->cp["SUB_DEBTOR_SEGMENT_CODE"]->GetText()) and !is_bool($this->cp["SUB_DEBTOR_SEGMENT_CODE"]->GetValue())) 
            $this->cp["SUB_DEBTOR_SEGMENT_CODE"]->SetValue($this->SUB_DEBTOR_SEGMENT_CODE->GetValue(true));
        if (!is_null($this->cp["P_SUB_DEBTOR_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_SUB_DEBTOR_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_SUB_DEBTOR_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_SUB_DEBTOR_SEGMENT_ID"]->SetValue($this->P_SUB_DEBTOR_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        if (!is_null($this->cp["BUSINESS_SEGMENT_CODE"]->GetValue()) and !strlen($this->cp["BUSINESS_SEGMENT_CODE"]->GetText()) and !is_bool($this->cp["BUSINESS_SEGMENT_CODE"]->GetValue())) 
            $this->cp["BUSINESS_SEGMENT_CODE"]->SetValue($this->BUSINESS_SEGMENT_CODE->GetValue(true));
        if (!is_null($this->cp["P_BUSINESS_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_BUSINESS_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_BUSINESS_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_BUSINESS_SEGMENT_ID"]->SetValue($this->P_BUSINESS_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["ADDRESS_2"]->GetValue()) and !strlen($this->cp["ADDRESS_2"]->GetText()) and !is_bool($this->cp["ADDRESS_2"]->GetValue())) 
            $this->cp["ADDRESS_2"]->SetValue($this->ADDRESS_2->GetValue(true));
        if (!is_null($this->cp["REGION_NAME"]->GetValue()) and !strlen($this->cp["REGION_NAME"]->GetText()) and !is_bool($this->cp["REGION_NAME"]->GetValue())) 
            $this->cp["REGION_NAME"]->SetValue($this->REGION_NAME->GetValue(true));
        if (!is_null($this->cp["P_REGION_ID"]->GetValue()) and !strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue())) 
            $this->cp["P_REGION_ID"]->SetValue($this->P_REGION_ID->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        $this->SQL = "INSERT INTO CUSTOMER(\n" .
        "CUSTOMER_ID,\n" .
        "CUSTOMER_NUMBER,\n" .
        "LAST_NAME,\n" .
        "CUST_QQ_NAME,\n" .
        "CUSTOMER_CLASS_ID,\n" .
        "P_DEBTOR_SEGMENT_ID,\n" .
        "P_CUSTOMER_SEGMENT_ID,\n" .
        "P_CUSTOMER_TITLE_ID,\n" .
        "P_BUSINESS_SEGMENT_ID,\n" .
        "GENDER_TYPE_ID,\n" .
        "ADDRESS_1,\n" .
        "ADDRESS_2,\n" .
        "ADDRESS_3,\n" .
        "P_REGION_ID,\n" .
        "ZIP_CODE,\n" .
        "CCDB_CODE,\n" .
        "FIRST_SUBSCRIPTION_DATE,\n" .
        "DESCRIPTION,\n" .
        "UPDATE_DATE,\n" .
        "UPDATE_BY,\n" .
        "P_SUB_DEBTOR_SEGMENT_ID\n" .
        ") VALUES(\n" .
        "GENERATE_ID('BILLDB','CUSTOMER','CUSTOMER_ID'),\n" .
        "'" . $this->SQLValue($this->cp["CUSTOMER_NUMBER"]->GetDBValue(), ccsText) . "',\n" .
        "UPPER(TRIM('" . $this->SQLValue($this->cp["LAST_NAME"]->GetDBValue(), ccsText) . "')),\n" .
        "NULL,\n" .
        "" . $this->SQLValue($this->cp["CUSTOMER_CLASS_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["P_DEBTOR_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["P_CUSTOMER_TITLE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["P_BUSINESS_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["GENDER_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "UPPER(TRIM('" . $this->SQLValue($this->cp["ADDRESS_1"]->GetDBValue(), ccsText) . "')),\n" .
        "UPPER(TRIM('" . $this->SQLValue($this->cp["ADDRESS_2"]->GetDBValue(), ccsText) . "')),\n" .
        "UPPER(TRIM('" . $this->SQLValue($this->cp["ADDRESS_3"]->GetDBValue(), ccsText) . "')),\n" .
        "" . $this->SQLValue($this->cp["P_REGION_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["ZIP_CODE"]->GetDBValue(), ccsFloat) . ",\n" .
        "" . $this->SQLValue($this->cp["CCDB_CODE"]->GetDBValue(), ccsFloat) . ",\n" .
        "'" . $this->SQLValue($this->cp["FIRST_SUBSCRIPTION_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "'),\n" .
        "SYSDATE,\n" .
        "'" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "',\n" .
        "" . $this->SQLValue($this->cp["P_SUB_DEBTOR_SEGMENT_ID"]->GetDBValue(), ccsFloat) . "\n" .
        ")";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @97-C2DD7286
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUSTOMER_NUMBER"] = new clsSQLParameter("ctrlCUSTOMER_NUMBER", ccsText, "", "", $this->CUSTOMER_NUMBER->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LAST_NAME"] = new clsSQLParameter("ctrlLAST_NAME", ccsText, "", "", $this->LAST_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_1"] = new clsSQLParameter("ctrlADDRESS_1", ccsText, "", "", $this->ADDRESS_1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_3"] = new clsSQLParameter("ctrlADDRESS_3", ccsText, "", "", $this->ADDRESS_3->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ZIP_CODE"] = new clsSQLParameter("ctrlZIP_CODE", ccsFloat, "", "", $this->ZIP_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CCDB_CODE"] = new clsSQLParameter("ctrlCCDB_CODE", ccsFloat, "", "", $this->CCDB_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FIRST_SUBSCRIPTION_DATE"] = new clsSQLParameter("ctrlFIRST_SUBSCRIPTION_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->FIRST_SUBSCRIPTION_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_ID"] = new clsSQLParameter("ctrlCUSTOMER_ID", ccsFloat, "", "", $this->CUSTOMER_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["CUSTOMER_CLASS_ID"] = new clsSQLParameter("ctrlCUSTOMER_CLASS_ID", ccsFloat, "", "", $this->CUSTOMER_CLASS_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_DEBTOR_SEGMENT_ID"] = new clsSQLParameter("ctrlP_DEBTOR_SEGMENT_ID", ccsFloat, "", "", $this->P_DEBTOR_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CUSTOMER_SEGMENT_ID"] = new clsSQLParameter("ctrlP_CUSTOMER_SEGMENT_ID", ccsFloat, "", "", $this->P_CUSTOMER_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CUSTOMER_TITLE_ID"] = new clsSQLParameter("ctrlP_CUSTOMER_TITLE_ID", ccsFloat, "", "", $this->P_CUSTOMER_TITLE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["GENDER_TYPE_ID"] = new clsSQLParameter("ctrlGENDER_TYPE_ID", ccsFloat, "", "", $this->GENDER_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SUB_DEBTOR_SEGMENT_ID"] = new clsSQLParameter("ctrlP_SUB_DEBTOR_SEGMENT_ID", ccsFloat, "", "", $this->P_SUB_DEBTOR_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["P_BUSINESS_SEGMENT_ID"] = new clsSQLParameter("ctrlP_BUSINESS_SEGMENT_ID", ccsFloat, "", "", $this->P_BUSINESS_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_2"] = new clsSQLParameter("ctrlADDRESS_2", ccsText, "", "", $this->ADDRESS_2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["REGION_NAME"] = new clsSQLParameter("ctrlREGION_NAME", ccsText, "", "", $this->REGION_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_REGION_ID"] = new clsSQLParameter("ctrlP_REGION_ID", ccsFloat, "", "", $this->P_REGION_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CUSTOMER_NUMBER"]->GetValue()) and !strlen($this->cp["CUSTOMER_NUMBER"]->GetText()) and !is_bool($this->cp["CUSTOMER_NUMBER"]->GetValue())) 
            $this->cp["CUSTOMER_NUMBER"]->SetValue($this->CUSTOMER_NUMBER->GetValue(true));
        if (!is_null($this->cp["LAST_NAME"]->GetValue()) and !strlen($this->cp["LAST_NAME"]->GetText()) and !is_bool($this->cp["LAST_NAME"]->GetValue())) 
            $this->cp["LAST_NAME"]->SetValue($this->LAST_NAME->GetValue(true));
        if (!is_null($this->cp["ADDRESS_1"]->GetValue()) and !strlen($this->cp["ADDRESS_1"]->GetText()) and !is_bool($this->cp["ADDRESS_1"]->GetValue())) 
            $this->cp["ADDRESS_1"]->SetValue($this->ADDRESS_1->GetValue(true));
        if (!is_null($this->cp["ADDRESS_3"]->GetValue()) and !strlen($this->cp["ADDRESS_3"]->GetText()) and !is_bool($this->cp["ADDRESS_3"]->GetValue())) 
            $this->cp["ADDRESS_3"]->SetValue($this->ADDRESS_3->GetValue(true));
        if (!is_null($this->cp["ZIP_CODE"]->GetValue()) and !strlen($this->cp["ZIP_CODE"]->GetText()) and !is_bool($this->cp["ZIP_CODE"]->GetValue())) 
            $this->cp["ZIP_CODE"]->SetValue($this->ZIP_CODE->GetValue(true));
        if (!is_null($this->cp["CCDB_CODE"]->GetValue()) and !strlen($this->cp["CCDB_CODE"]->GetText()) and !is_bool($this->cp["CCDB_CODE"]->GetValue())) 
            $this->cp["CCDB_CODE"]->SetValue($this->CCDB_CODE->GetValue(true));
        if (!is_null($this->cp["FIRST_SUBSCRIPTION_DATE"]->GetValue()) and !strlen($this->cp["FIRST_SUBSCRIPTION_DATE"]->GetText()) and !is_bool($this->cp["FIRST_SUBSCRIPTION_DATE"]->GetValue())) 
            $this->cp["FIRST_SUBSCRIPTION_DATE"]->SetValue($this->FIRST_SUBSCRIPTION_DATE->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ID"]->SetValue($this->CUSTOMER_ID->GetValue(true));
        if (!strlen($this->cp["CUSTOMER_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ID"]->GetValue(true))) 
            $this->cp["CUSTOMER_ID"]->SetText(0);
        if (!is_null($this->cp["CUSTOMER_CLASS_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_CLASS_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_CLASS_ID"]->GetValue())) 
            $this->cp["CUSTOMER_CLASS_ID"]->SetValue($this->CUSTOMER_CLASS_ID->GetValue(true));
        if (!is_null($this->cp["P_DEBTOR_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_DEBTOR_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_DEBTOR_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_DEBTOR_SEGMENT_ID"]->SetValue($this->P_DEBTOR_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_CUSTOMER_SEGMENT_ID"]->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue()) and !strlen($this->cp["P_CUSTOMER_TITLE_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue())) 
            $this->cp["P_CUSTOMER_TITLE_ID"]->SetValue($this->P_CUSTOMER_TITLE_ID->GetValue(true));
        if (!is_null($this->cp["GENDER_TYPE_ID"]->GetValue()) and !strlen($this->cp["GENDER_TYPE_ID"]->GetText()) and !is_bool($this->cp["GENDER_TYPE_ID"]->GetValue())) 
            $this->cp["GENDER_TYPE_ID"]->SetValue($this->GENDER_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["P_SUB_DEBTOR_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_SUB_DEBTOR_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_SUB_DEBTOR_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_SUB_DEBTOR_SEGMENT_ID"]->SetValue($this->P_SUB_DEBTOR_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["P_BUSINESS_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_BUSINESS_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_BUSINESS_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_BUSINESS_SEGMENT_ID"]->SetValue($this->P_BUSINESS_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["ADDRESS_2"]->GetValue()) and !strlen($this->cp["ADDRESS_2"]->GetText()) and !is_bool($this->cp["ADDRESS_2"]->GetValue())) 
            $this->cp["ADDRESS_2"]->SetValue($this->ADDRESS_2->GetValue(true));
        if (!is_null($this->cp["REGION_NAME"]->GetValue()) and !strlen($this->cp["REGION_NAME"]->GetText()) and !is_bool($this->cp["REGION_NAME"]->GetValue())) 
            $this->cp["REGION_NAME"]->SetValue($this->REGION_NAME->GetValue(true));
        if (!is_null($this->cp["P_REGION_ID"]->GetValue()) and !strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue())) 
            $this->cp["P_REGION_ID"]->SetValue($this->P_REGION_ID->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        $this->SQL = "UPDATE CUSTOMER SET \n" .
        "CUSTOMER_NUMBER='" . $this->SQLValue($this->cp["CUSTOMER_NUMBER"]->GetDBValue(), ccsText) . "',\n" .
        " LAST_NAME=UPPER(TRIM('" . $this->SQLValue($this->cp["LAST_NAME"]->GetDBValue(), ccsText) . "')),\n" .
        " ADDRESS_1=UPPER(TRIM('" . $this->SQLValue($this->cp["ADDRESS_1"]->GetDBValue(), ccsText) . "')),\n" .
        " ADDRESS_3=UPPER(TRIM('" . $this->SQLValue($this->cp["ADDRESS_3"]->GetDBValue(), ccsText) . "')),\n" .
        " ZIP_CODE=" . $this->SQLValue($this->cp["ZIP_CODE"]->GetDBValue(), ccsFloat) . ",\n" .
        " CCDB_CODE=" . $this->SQLValue($this->cp["CCDB_CODE"]->GetDBValue(), ccsFloat) . ",\n" .
        " FIRST_SUBSCRIPTION_DATE='" . $this->SQLValue($this->cp["FIRST_SUBSCRIPTION_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        " UPDATE_DATE=SYSDATE,\n" .
        " CUSTOMER_CLASS_ID=" . $this->SQLValue($this->cp["CUSTOMER_CLASS_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        " P_DEBTOR_SEGMENT_ID=" . $this->SQLValue($this->cp["P_DEBTOR_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        " P_CUSTOMER_SEGMENT_ID=" . $this->SQLValue($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        " P_CUSTOMER_TITLE_ID=" . $this->SQLValue($this->cp["P_CUSTOMER_TITLE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        " GENDER_TYPE_ID=" . $this->SQLValue($this->cp["GENDER_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        " P_SUB_DEBTOR_SEGMENT_ID=" . $this->SQLValue($this->cp["P_SUB_DEBTOR_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        " UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "',\n" .
        " P_BUSINESS_SEGMENT_ID=" . $this->SQLValue($this->cp["P_BUSINESS_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        " ADDRESS_2='" . $this->SQLValue($this->cp["ADDRESS_2"]->GetDBValue(), ccsText) . "',\n" .
        " P_REGION_ID=" . $this->SQLValue($this->cp["P_REGION_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        " DESCRIPTION=TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')\n" .
        " WHERE  \n" .
        " CUSTOMER_ID = " . $this->SQLValue($this->cp["CUSTOMER_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @97-61ADDAAF
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUSTOMER_ID"] = new clsSQLParameter("ctrlCUSTOMER_ID", ccsFloat, "", "", $this->CUSTOMER_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["CUSTOMER_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ID"]->SetValue($this->CUSTOMER_ID->GetValue(true));
        if (!strlen($this->cp["CUSTOMER_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ID"]->GetValue(true))) 
            $this->cp["CUSTOMER_ID"]->SetText(0);
        $this->SQL = "DELETE FROM customer WHERE  CUSTOMER_ID = " . $this->SQLValue($this->cp["CUSTOMER_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End CustomerFormDataSource Class @97-FCB6E20C

//Initialize Page @1-5B4F8C4D
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
$TemplateFileName = "p_customer_master.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-A5F85F33
include_once("./p_customer_master_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-944FC352
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$V_CUSTOMER = & new clsGridV_CUSTOMER("", $MainPage);
$V_CUSTOMERSearch = & new clsRecordV_CUSTOMERSearch("", $MainPage);
$CustomerForm = & new clsRecordCustomerForm("", $MainPage);
$MainPage->V_CUSTOMER = & $V_CUSTOMER;
$MainPage->V_CUSTOMERSearch = & $V_CUSTOMERSearch;
$MainPage->CustomerForm = & $CustomerForm;
$V_CUSTOMER->Initialize();
$CustomerForm->Initialize();

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

//Execute Components @1-6A46AF59
$V_CUSTOMERSearch->Operation();
$CustomerForm->Operation();
//End Execute Components

//Go to destination page @1-80512AD1
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($V_CUSTOMER);
    unset($V_CUSTOMERSearch);
    unset($CustomerForm);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-2A913935
$V_CUSTOMER->Show();
$V_CUSTOMERSearch->Show();
$CustomerForm->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-542D5339
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($V_CUSTOMER);
unset($V_CUSTOMERSearch);
unset($CustomerForm);
unset($Tpl);
//End Unload Page


?>
