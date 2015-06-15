<?php
//Include Common Files @1-A9CD4DC7
define("RelativePath", "..");
define("PathToCurrentPage", "/param/");
define("FileName", "p_bill_invoice_comp_map.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_BILL_INVOICE_COMP_MAP { //P_BILL_INVOICE_COMP_MAP class @2-436FBC09

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

//Class_Initialize Event @2-4A027C69
    function clsGridP_BILL_INVOICE_COMP_MAP($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_BILL_INVOICE_COMP_MAP";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_BILL_INVOICE_COMP_MAP";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_BILL_INVOICE_COMP_MAPDataSource($this);
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

        $this->P_BILL_COMPONENT_NAME = & new clsControl(ccsLabel, "P_BILL_COMPONENT_NAME", "P_BILL_COMPONENT_NAME", ccsText, "", CCGetRequestParam("P_BILL_COMPONENT_NAME", ccsGet, NULL), $this);
        $this->P_SERVICE_TYPE_NAME = & new clsControl(ccsLabel, "P_SERVICE_TYPE_NAME", "P_SERVICE_TYPE_NAME", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_NAME", ccsGet, NULL), $this);
        $this->P_INVOICE_COMPONENT_NAME = & new clsControl(ccsLabel, "P_INVOICE_COMPONENT_NAME", "P_INVOICE_COMPONENT_NAME", ccsText, "", CCGetRequestParam("P_INVOICE_COMPONENT_NAME", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_bill_invoice_comp_map.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_bill_invoice_comp_map.php";
        $this->P_BILL_INVOICE_COMP_MAP_ID = & new clsControl(ccsHidden, "P_BILL_INVOICE_COMP_MAP_ID", "P_BILL_INVOICE_COMP_MAP_ID", ccsFloat, "", CCGetRequestParam("P_BILL_INVOICE_COMP_MAP_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_BILL_INVOICE_COMP_MAP_Insert = & new clsControl(ccsLink, "P_BILL_INVOICE_COMP_MAP_Insert", "P_BILL_INVOICE_COMP_MAP_Insert", ccsText, "", CCGetRequestParam("P_BILL_INVOICE_COMP_MAP_Insert", ccsGet, NULL), $this);
        $this->P_BILL_INVOICE_COMP_MAP_Insert->Page = "p_bill_invoice_comp_map.php";
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

//Show Method @2-C8B8310C
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
            $this->ControlsVisible["P_BILL_COMPONENT_NAME"] = $this->P_BILL_COMPONENT_NAME->Visible;
            $this->ControlsVisible["P_SERVICE_TYPE_NAME"] = $this->P_SERVICE_TYPE_NAME->Visible;
            $this->ControlsVisible["P_INVOICE_COMPONENT_NAME"] = $this->P_INVOICE_COMPONENT_NAME->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_BILL_INVOICE_COMP_MAP_ID"] = $this->P_BILL_INVOICE_COMP_MAP_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->P_BILL_COMPONENT_NAME->SetValue($this->DataSource->P_BILL_COMPONENT_NAME->GetValue());
                $this->P_SERVICE_TYPE_NAME->SetValue($this->DataSource->P_SERVICE_TYPE_NAME->GetValue());
                $this->P_INVOICE_COMPONENT_NAME->SetValue($this->DataSource->P_INVOICE_COMPONENT_NAME->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_BILL_INVOICE_COMP_MAP_ID", $this->DataSource->f("P_BILL_INVOICE_COMP_MAP_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_BILL_INVOICE_COMP_MAP_ID", $this->DataSource->f("P_BILL_INVOICE_COMP_MAP_ID"));
                $this->P_BILL_INVOICE_COMP_MAP_ID->SetValue($this->DataSource->P_BILL_INVOICE_COMP_MAP_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->P_BILL_COMPONENT_NAME->Show();
                $this->P_SERVICE_TYPE_NAME->Show();
                $this->P_INVOICE_COMPONENT_NAME->Show();
                $this->DESCRIPTION->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_BILL_INVOICE_COMP_MAP_ID->Show();
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
        $this->P_BILL_INVOICE_COMP_MAP_Insert->Parameters = CCGetQueryString("QueryString", array("P_BILL_INVOICE_COMP_MAP_ID", "ccsForm"));
        $this->P_BILL_INVOICE_COMP_MAP_Insert->Parameters = CCAddParam($this->P_BILL_INVOICE_COMP_MAP_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_BILL_INVOICE_COMP_MAP_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-614058BD
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->P_BILL_COMPONENT_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_SERVICE_TYPE_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_INVOICE_COMPONENT_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_BILL_INVOICE_COMP_MAP_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_BILL_INVOICE_COMP_MAP Class @2-FCB6E20C

class clsP_BILL_INVOICE_COMP_MAPDataSource extends clsDBConn {  //P_BILL_INVOICE_COMP_MAPDataSource Class @2-489FA621

//DataSource Variables @2-6F4C3BF2
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $P_BILL_COMPONENT_NAME;
    var $P_SERVICE_TYPE_NAME;
    var $P_INVOICE_COMPONENT_NAME;
    var $DESCRIPTION;
    var $DLink;
    var $ADLink;
    var $P_BILL_INVOICE_COMP_MAP_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-6923D11A
    function clsP_BILL_INVOICE_COMP_MAPDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_BILL_INVOICE_COMP_MAP";
        $this->Initialize();
        $this->P_BILL_COMPONENT_NAME = new clsField("P_BILL_COMPONENT_NAME", ccsText, "");
        
        $this->P_SERVICE_TYPE_NAME = new clsField("P_SERVICE_TYPE_NAME", ccsText, "");
        
        $this->P_INVOICE_COMPONENT_NAME = new clsField("P_INVOICE_COMPONENT_NAME", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_BILL_INVOICE_COMP_MAP_ID = new clsField("P_BILL_INVOICE_COMP_MAP_ID", ccsFloat, "");
        

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

//Prepare Method @2-25AA94A2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
    }
//End Prepare Method

//Open Method @2-DCD84748
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select a.*,b.code as P_BILL_COMPONENT_NAME, c.code as P_SERVICE_TYPE_NAME,\n" .
        "d.code as  P_INVOICE_COMPONENT_NAME\n" .
        "from p_bill_invoice_comp_map a ,\n" .
        "P_BILL_COMPONENT b, P_SERVICE_TYPE c, P_INVOICE_COMPONENT d\n" .
        "where a.P_BILL_COMPONENT_ID=b.P_BILL_COMPONENT_ID\n" .
        "and a.P_SERVICE_TYPE_ID=c.P_SERVICE_TYPE_ID\n" .
        "and a.P_INVOICE_COMPONENT_ID=d.P_INVOICE_COMPONENT_ID) cnt";
        $this->SQL = "select a.*,b.code as P_BILL_COMPONENT_NAME, c.code as P_SERVICE_TYPE_NAME,\n" .
        "d.code as  P_INVOICE_COMPONENT_NAME\n" .
        "from p_bill_invoice_comp_map a ,\n" .
        "P_BILL_COMPONENT b, P_SERVICE_TYPE c, P_INVOICE_COMPONENT d\n" .
        "where a.P_BILL_COMPONENT_ID=b.P_BILL_COMPONENT_ID\n" .
        "and a.P_SERVICE_TYPE_ID=c.P_SERVICE_TYPE_ID\n" .
        "and a.P_INVOICE_COMPONENT_ID=d.P_INVOICE_COMPONENT_ID";
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

//SetValues Method @2-88D7214B
    function SetValues()
    {
        $this->P_BILL_COMPONENT_NAME->SetDBValue($this->f("P_BILL_COMPONENT_NAME"));
        $this->P_SERVICE_TYPE_NAME->SetDBValue($this->f("P_SERVICE_TYPE_NAME"));
        $this->P_INVOICE_COMPONENT_NAME->SetDBValue($this->f("P_INVOICE_COMPONENT_NAME"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->DLink->SetDBValue($this->f("P_BILL_INVOICE_COMP_MAP_ID"));
        $this->ADLink->SetDBValue($this->f("P_BILL_INVOICE_COMP_MAP_ID"));
        $this->P_BILL_INVOICE_COMP_MAP_ID->SetDBValue(trim($this->f("P_BILL_INVOICE_COMP_MAP_ID")));
    }
//End SetValues Method

} //End P_BILL_INVOICE_COMP_MAPDataSource Class @2-FCB6E20C

class clsRecordP_BILL_INVOICE_COMP_MAPSearch { //P_BILL_INVOICE_COMP_MAPSearch Class @3-E6F4AC87

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

//Class_Initialize Event @3-C6CC32CD
    function clsRecordP_BILL_INVOICE_COMP_MAPSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_BILL_INVOICE_COMP_MAPSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_BILL_INVOICE_COMP_MAPSearch";
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

//Operation Method @3-13AF69C8
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
        $Redirect = "p_bill_invoice_comp_map.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_bill_invoice_comp_map.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End P_BILL_INVOICE_COMP_MAPSearch Class @3-FCB6E20C

class clsRecordp_bill_invoice_comp_map1 { //p_bill_invoice_comp_map1 Class @25-2FE58363

//Variables @25-D6FF3E86

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

//Class_Initialize Event @25-E5F1AB2E
    function clsRecordp_bill_invoice_comp_map1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_bill_invoice_comp_map1/Error";
        $this->DataSource = new clsp_bill_invoice_comp_map1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_bill_invoice_comp_map1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->P_BILL_COMPONENT_ID = & new clsControl(ccsHidden, "P_BILL_COMPONENT_ID", "P BILL COMPONENT ID", ccsFloat, "", CCGetRequestParam("P_BILL_COMPONENT_ID", $Method, NULL), $this);
            $this->P_BILL_COMPONENT_ID->Required = true;
            $this->P_SERVICE_TYPE_ID = & new clsControl(ccsHidden, "P_SERVICE_TYPE_ID", "P SERVICE TYPE ID", ccsFloat, "", CCGetRequestParam("P_SERVICE_TYPE_ID", $Method, NULL), $this);
            $this->P_SERVICE_TYPE_ID->Required = true;
            $this->P_INVOICE_COMPONENT_ID = & new clsControl(ccsHidden, "P_INVOICE_COMPONENT_ID", "P INVOICE COMPONENT ID", ccsFloat, "", CCGetRequestParam("P_INVOICE_COMPONENT_ID", $Method, NULL), $this);
            $this->P_INVOICE_COMPONENT_ID->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->CREATED_BY = & new clsControl(ccsTextBox, "CREATED_BY", "CREATED BY", ccsText, "", CCGetRequestParam("CREATED_BY", $Method, NULL), $this);
            $this->CREATED_BY->Required = true;
            $this->UPDATED_BY = & new clsControl(ccsTextBox, "UPDATED_BY", "UPDATED BY", ccsText, "", CCGetRequestParam("UPDATED_BY", $Method, NULL), $this);
            $this->UPDATED_BY->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->P_BILL_COMPONENT_NAME = & new clsControl(ccsTextBox, "P_BILL_COMPONENT_NAME", "P_BILL_COMPONENT_NAME", ccsText, "", CCGetRequestParam("P_BILL_COMPONENT_NAME", $Method, NULL), $this);
            $this->P_BILL_COMPONENT_NAME->Required = true;
            $this->P_SERVICE_TYPE_NAME = & new clsControl(ccsTextBox, "P_SERVICE_TYPE_NAME", "P_SERVICE_TYPE_NAME", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_NAME", $Method, NULL), $this);
            $this->P_SERVICE_TYPE_NAME->Required = true;
            $this->P_INVOICE_COMPONENT_NAME = & new clsControl(ccsTextBox, "P_INVOICE_COMPONENT_NAME", "P_INVOICE_COMPONENT_NAME", ccsText, "", CCGetRequestParam("P_INVOICE_COMPONENT_NAME", $Method, NULL), $this);
            $this->P_INVOICE_COMPONENT_NAME->Required = true;
            $this->CREATION_DATE = & new clsControl(ccsTextBox, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", $Method, NULL), $this);
            $this->CREATION_DATE->Required = true;
            $this->UPDATED_DATE = & new clsControl(ccsTextBox, "UPDATED_DATE", "UPDATED DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATED_DATE", $Method, NULL), $this);
            $this->UPDATED_DATE->Required = true;
            $this->P_BILL_INVOICE_COMP_MAP_ID = & new clsControl(ccsHidden, "P_BILL_INVOICE_COMP_MAP_ID", "P_BILL_INVOICE_COMP_MAP_ID", ccsFloat, "", CCGetRequestParam("P_BILL_INVOICE_COMP_MAP_ID", $Method, NULL), $this);
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

//Initialize Method @25-2DC62E3C
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_BILL_INVOICE_COMP_MAP_ID"] = CCGetFromGet("P_BILL_INVOICE_COMP_MAP_ID", NULL);
    }
//End Initialize Method

//Validate Method @25-E6815007
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->P_BILL_COMPONENT_ID->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->P_INVOICE_COMPONENT_ID->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->CREATED_BY->Validate() && $Validation);
        $Validation = ($this->UPDATED_BY->Validate() && $Validation);
        $Validation = ($this->P_BILL_COMPONENT_NAME->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_NAME->Validate() && $Validation);
        $Validation = ($this->P_INVOICE_COMPONENT_NAME->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATED_DATE->Validate() && $Validation);
        $Validation = ($this->P_BILL_INVOICE_COMP_MAP_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->P_BILL_COMPONENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_INVOICE_COMPONENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILL_COMPONENT_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_INVOICE_COMPONENT_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILL_INVOICE_COMP_MAP_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @25-56CCE4A9
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->P_BILL_COMPONENT_ID->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->P_INVOICE_COMPONENT_ID->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->CREATED_BY->Errors->Count());
        $errors = ($errors || $this->UPDATED_BY->Errors->Count());
        $errors = ($errors || $this->P_BILL_COMPONENT_NAME->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_NAME->Errors->Count());
        $errors = ($errors || $this->P_INVOICE_COMPONENT_NAME->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATED_DATE->Errors->Count());
        $errors = ($errors || $this->P_BILL_INVOICE_COMP_MAP_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @25-ED598703
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

//Operation Method @25-872C026F
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

//InsertRow Method @25-223D3B95
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->P_BILL_COMPONENT_ID->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->P_INVOICE_COMPONENT_ID->SetValue($this->P_INVOICE_COMPONENT_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CREATED_BY->SetValue($this->CREATED_BY->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @25-C95AF99D
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->P_BILL_COMPONENT_ID->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->P_INVOICE_COMPONENT_ID->SetValue($this->P_INVOICE_COMPONENT_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->P_BILL_INVOICE_COMP_MAP_ID->SetValue($this->P_BILL_INVOICE_COMP_MAP_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @25-22910357
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_BILL_INVOICE_COMP_MAP_ID->SetValue($this->P_BILL_INVOICE_COMP_MAP_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @25-BB3DBFDA
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
                    $this->P_BILL_COMPONENT_ID->SetValue($this->DataSource->P_BILL_COMPONENT_ID->GetValue());
                    $this->P_SERVICE_TYPE_ID->SetValue($this->DataSource->P_SERVICE_TYPE_ID->GetValue());
                    $this->P_INVOICE_COMPONENT_ID->SetValue($this->DataSource->P_INVOICE_COMPONENT_ID->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->UPDATED_BY->SetValue($this->DataSource->UPDATED_BY->GetValue());
                    $this->P_BILL_COMPONENT_NAME->SetValue($this->DataSource->P_BILL_COMPONENT_NAME->GetValue());
                    $this->P_SERVICE_TYPE_NAME->SetValue($this->DataSource->P_SERVICE_TYPE_NAME->GetValue());
                    $this->P_INVOICE_COMPONENT_NAME->SetValue($this->DataSource->P_INVOICE_COMPONENT_NAME->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATED_DATE->SetValue($this->DataSource->UPDATED_DATE->GetValue());
                    $this->P_BILL_INVOICE_COMP_MAP_ID->SetValue($this->DataSource->P_BILL_INVOICE_COMP_MAP_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->P_BILL_COMPONENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_INVOICE_COMPONENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILL_COMPONENT_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_INVOICE_COMPONENT_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILL_INVOICE_COMP_MAP_ID->Errors->ToString());
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

        $this->P_BILL_COMPONENT_ID->Show();
        $this->P_SERVICE_TYPE_ID->Show();
        $this->P_INVOICE_COMPONENT_ID->Show();
        $this->DESCRIPTION->Show();
        $this->CREATED_BY->Show();
        $this->UPDATED_BY->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->P_BILL_COMPONENT_NAME->Show();
        $this->P_SERVICE_TYPE_NAME->Show();
        $this->P_INVOICE_COMPONENT_NAME->Show();
        $this->CREATION_DATE->Show();
        $this->UPDATED_DATE->Show();
        $this->P_BILL_INVOICE_COMP_MAP_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_bill_invoice_comp_map1 Class @25-FCB6E20C

class clsp_bill_invoice_comp_map1DataSource extends clsDBConn {  //p_bill_invoice_comp_map1DataSource Class @25-822B1B29

//DataSource Variables @25-BE7C43EC
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
    var $P_BILL_COMPONENT_ID;
    var $P_SERVICE_TYPE_ID;
    var $P_INVOICE_COMPONENT_ID;
    var $DESCRIPTION;
    var $CREATED_BY;
    var $UPDATED_BY;
    var $P_BILL_COMPONENT_NAME;
    var $P_SERVICE_TYPE_NAME;
    var $P_INVOICE_COMPONENT_NAME;
    var $CREATION_DATE;
    var $UPDATED_DATE;
    var $P_BILL_INVOICE_COMP_MAP_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @25-05319209
    function clsp_bill_invoice_comp_map1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_bill_invoice_comp_map1/Error";
        $this->Initialize();
        $this->P_BILL_COMPONENT_ID = new clsField("P_BILL_COMPONENT_ID", ccsFloat, "");
        
        $this->P_SERVICE_TYPE_ID = new clsField("P_SERVICE_TYPE_ID", ccsFloat, "");
        
        $this->P_INVOICE_COMPONENT_ID = new clsField("P_INVOICE_COMPONENT_ID", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->UPDATED_BY = new clsField("UPDATED_BY", ccsText, "");
        
        $this->P_BILL_COMPONENT_NAME = new clsField("P_BILL_COMPONENT_NAME", ccsText, "");
        
        $this->P_SERVICE_TYPE_NAME = new clsField("P_SERVICE_TYPE_NAME", ccsText, "");
        
        $this->P_INVOICE_COMPONENT_NAME = new clsField("P_INVOICE_COMPONENT_NAME", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATED_DATE = new clsField("UPDATED_DATE", ccsDate, $this->DateFormat);
        
        $this->P_BILL_INVOICE_COMP_MAP_ID = new clsField("P_BILL_INVOICE_COMP_MAP_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @25-DDE169C0
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_BILL_INVOICE_COMP_MAP_ID", ccsFloat, "", "", $this->Parameters["urlP_BILL_INVOICE_COMP_MAP_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @25-300E0015
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "select a.*,b.code as P_BILL_COMPONENT_NAME, c.code as P_SERVICE_TYPE_NAME,\n" .
        "d.code as  P_INVOICE_COMPONENT_NAME\n" .
        "from p_bill_invoice_comp_map a ,\n" .
        "P_BILL_COMPONENT b, P_SERVICE_TYPE c, P_INVOICE_COMPONENT d\n" .
        "where a.P_BILL_COMPONENT_ID=b.P_BILL_COMPONENT_ID\n" .
        "and a.P_SERVICE_TYPE_ID=c.P_SERVICE_TYPE_ID\n" .
        "and a.P_INVOICE_COMPONENT_ID=d.P_INVOICE_COMPONENT_ID\n" .
        "and a.P_BILL_INVOICE_COMP_MAP_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "\n" .
        "and a.P_BILL_INVOICE_COMP_MAP_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . " ";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @25-B1AA38D5
    function SetValues()
    {
        $this->P_BILL_COMPONENT_ID->SetDBValue(trim($this->f("P_BILL_COMPONENT_ID")));
        $this->P_SERVICE_TYPE_ID->SetDBValue(trim($this->f("P_SERVICE_TYPE_ID")));
        $this->P_INVOICE_COMPONENT_ID->SetDBValue(trim($this->f("P_INVOICE_COMPONENT_ID")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->UPDATED_BY->SetDBValue($this->f("UPDATED_BY"));
        $this->P_BILL_COMPONENT_NAME->SetDBValue($this->f("P_BILL_COMPONENT_NAME"));
        $this->P_SERVICE_TYPE_NAME->SetDBValue($this->f("P_SERVICE_TYPE_NAME"));
        $this->P_INVOICE_COMPONENT_NAME->SetDBValue($this->f("P_INVOICE_COMPONENT_NAME"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->UPDATED_DATE->SetDBValue(trim($this->f("UPDATED_DATE")));
        $this->P_BILL_INVOICE_COMP_MAP_ID->SetDBValue(trim($this->f("P_BILL_INVOICE_COMP_MAP_ID")));
    }
//End SetValues Method

//Insert Method @25-D15D8D59
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_BILL_COMPONENT_ID"] = new clsSQLParameter("ctrlP_BILL_COMPONENT_ID", ccsFloat, "", "", $this->P_BILL_COMPONENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_INVOICE_COMPONENT_ID"] = new clsSQLParameter("ctrlP_INVOICE_COMPONENT_ID", ccsFloat, "", "", $this->P_INVOICE_COMPONENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("ctrlCREATED_BY", ccsText, "", "", $this->CREATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["P_BILL_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        if (!strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue(true))) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetText(0);
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["P_INVOICE_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_INVOICE_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_INVOICE_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_INVOICE_COMPONENT_ID"]->SetValue($this->P_INVOICE_COMPONENT_ID->GetValue(true));
        if (!strlen($this->cp["P_INVOICE_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_INVOICE_COMPONENT_ID"]->GetValue(true))) 
            $this->cp["P_INVOICE_COMPONENT_ID"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue($this->CREATED_BY->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_BILL_INVOICE_COMP_MAP(P_BILL_INVOICE_COMP_MAP_ID, P_BILL_COMPONENT_ID, P_SERVICE_TYPE_ID, P_INVOICE_COMPONENT_ID, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)\n" .
        "VALUES\n" .
        "(GENERATE_ID('TRB','P_BILL_INVOICE_COMP_MAP','P_BILL_INVOICE_COMP_MAP_ID')," . $this->SQLValue($this->cp["P_BILL_COMPONENT_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_INVOICE_COMPONENT_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @25-758B9D80
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_BILL_COMPONENT_ID"] = new clsSQLParameter("ctrlP_BILL_COMPONENT_ID", ccsFloat, "", "", $this->P_BILL_COMPONENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_INVOICE_COMPONENT_ID"] = new clsSQLParameter("ctrlP_INVOICE_COMPONENT_ID", ccsFloat, "", "", $this->P_INVOICE_COMPONENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILL_INVOICE_COMP_MAP_ID"] = new clsSQLParameter("ctrlP_BILL_INVOICE_COMP_MAP_ID", ccsFloat, "", "", $this->P_BILL_INVOICE_COMP_MAP_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["P_BILL_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        if (!strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue(true))) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetText(0);
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["P_INVOICE_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_INVOICE_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_INVOICE_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_INVOICE_COMPONENT_ID"]->SetValue($this->P_INVOICE_COMPONENT_ID->GetValue(true));
        if (!strlen($this->cp["P_INVOICE_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_INVOICE_COMPONENT_ID"]->GetValue(true))) 
            $this->cp["P_INVOICE_COMPONENT_ID"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        if (!is_null($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetValue()) and !strlen($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetText()) and !is_bool($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetValue())) 
            $this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->SetValue($this->P_BILL_INVOICE_COMP_MAP_ID->GetValue(true));
        if (!strlen($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetText()) and !is_bool($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetValue(true))) 
            $this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->SetText(0);
        $this->SQL = "UPDATE P_BILL_INVOICE_COMP_MAP SET \n" .
        "P_BILL_COMPONENT_ID=" . $this->SQLValue($this->cp["P_BILL_COMPONENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "P_SERVICE_TYPE_ID=" . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "P_INVOICE_COMPONENT_ID=" . $this->SQLValue($this->cp["P_INVOICE_COMPONENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATED_DATE=sysdate,\n" .
        "UPDATED_BY='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE  P_BILL_INVOICE_COMP_MAP_ID = " . $this->SQLValue($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @25-1FAAED49
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_BILL_INVOICE_COMP_MAP_ID"] = new clsSQLParameter("ctrlP_BILL_INVOICE_COMP_MAP_ID", ccsFloat, "", "", $this->P_BILL_INVOICE_COMP_MAP_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetValue()) and !strlen($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetText()) and !is_bool($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetValue())) 
            $this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->SetValue($this->P_BILL_INVOICE_COMP_MAP_ID->GetValue(true));
        if (!strlen($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetText()) and !is_bool($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetValue(true))) 
            $this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_BILL_INVOICE_COMP_MAP WHERE P_BILL_INVOICE_COMP_MAP_ID = " . $this->SQLValue($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_bill_invoice_comp_map1DataSource Class @25-FCB6E20C

//Initialize Page @1-D753EA84
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
$TemplateFileName = "p_bill_invoice_comp_map.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-33B30C30
include_once("./p_bill_invoice_comp_map_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-3267A497
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_BILL_INVOICE_COMP_MAP = & new clsGridP_BILL_INVOICE_COMP_MAP("", $MainPage);
$P_BILL_INVOICE_COMP_MAPSearch = & new clsRecordP_BILL_INVOICE_COMP_MAPSearch("", $MainPage);
$p_bill_invoice_comp_map1 = & new clsRecordp_bill_invoice_comp_map1("", $MainPage);
$MainPage->P_BILL_INVOICE_COMP_MAP = & $P_BILL_INVOICE_COMP_MAP;
$MainPage->P_BILL_INVOICE_COMP_MAPSearch = & $P_BILL_INVOICE_COMP_MAPSearch;
$MainPage->p_bill_invoice_comp_map1 = & $p_bill_invoice_comp_map1;
$P_BILL_INVOICE_COMP_MAP->Initialize();
$p_bill_invoice_comp_map1->Initialize();

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

//Execute Components @1-1C00A94B
$P_BILL_INVOICE_COMP_MAPSearch->Operation();
$p_bill_invoice_comp_map1->Operation();
//End Execute Components

//Go to destination page @1-332E6482
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_BILL_INVOICE_COMP_MAP);
    unset($P_BILL_INVOICE_COMP_MAPSearch);
    unset($p_bill_invoice_comp_map1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-E4AC93C4
$P_BILL_INVOICE_COMP_MAP->Show();
$P_BILL_INVOICE_COMP_MAPSearch->Show();
$p_bill_invoice_comp_map1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-5A0E73B2
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_BILL_INVOICE_COMP_MAP);
unset($P_BILL_INVOICE_COMP_MAPSearch);
unset($p_bill_invoice_comp_map1);
unset($Tpl);
//End Unload Page


?>
