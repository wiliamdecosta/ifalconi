<?php
//Include Common Files @1-A062F7E8
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_reference_list.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_REFERENCE_LIST { //P_REFERENCE_LIST class @2-9BA203E1

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

//Class_Initialize Event @2-431A14AD
    function clsGridP_REFERENCE_LIST($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_REFERENCE_LIST";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_REFERENCE_LIST";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_REFERENCE_LISTDataSource($this);
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
        $this->REF_TYPE = & new clsControl(ccsLabel, "REF_TYPE", "REF_TYPE", ccsText, "", CCGetRequestParam("REF_TYPE", ccsGet, NULL), $this);
        $this->REFERENCE_TYPE = & new clsControl(ccsLabel, "REFERENCE_TYPE", "REFERENCE_TYPE", ccsText, "", CCGetRequestParam("REFERENCE_TYPE", ccsGet, NULL), $this);
        $this->LISTING_NO = & new clsControl(ccsLabel, "LISTING_NO", "LISTING_NO", ccsFloat, "", CCGetRequestParam("LISTING_NO", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_reference_list.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_reference_list.php";
        $this->P_REFERENCE_LIST_ID = & new clsControl(ccsHidden, "P_REFERENCE_LIST_ID", "P_REFERENCE_LIST_ID", ccsFloat, "", CCGetRequestParam("P_REFERENCE_LIST_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_REFERENCE_LIST_Insert = & new clsControl(ccsLink, "P_REFERENCE_LIST_Insert", "P_REFERENCE_LIST_Insert", ccsText, "", CCGetRequestParam("P_REFERENCE_LIST_Insert", ccsGet, NULL), $this);
        $this->P_REFERENCE_LIST_Insert->Page = "p_reference_list.php";
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

//Show Method @2-39963AE6
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);
        $this->DataSource->Parameters["urlP_REFERENCE_TYPE_ID"] = CCGetFromGet("P_REFERENCE_TYPE_ID", NULL);

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
            $this->ControlsVisible["REF_TYPE"] = $this->REF_TYPE->Visible;
            $this->ControlsVisible["REFERENCE_TYPE"] = $this->REFERENCE_TYPE->Visible;
            $this->ControlsVisible["LISTING_NO"] = $this->LISTING_NO->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_REFERENCE_LIST_ID"] = $this->P_REFERENCE_LIST_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->REF_TYPE->SetValue($this->DataSource->REF_TYPE->GetValue());
                $this->REFERENCE_TYPE->SetValue($this->DataSource->REFERENCE_TYPE->GetValue());
                $this->LISTING_NO->SetValue($this->DataSource->LISTING_NO->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_REFERENCE_LIST_ID", $this->DataSource->f("P_REFERENCE_LIST_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_REFERENCE_LIST_ID", $this->DataSource->f("P_REFERENCE_LIST_ID"));
                $this->P_REFERENCE_LIST_ID->SetValue($this->DataSource->P_REFERENCE_LIST_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->REF_TYPE->Show();
                $this->REFERENCE_TYPE->Show();
                $this->LISTING_NO->Show();
                $this->DESCRIPTION->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_REFERENCE_LIST_ID->Show();
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
        $this->P_REFERENCE_LIST_Insert->Parameters = CCGetQueryString("QueryString", array("P_REFERENCE_LIST_ID", "ccsForm"));
        $this->P_REFERENCE_LIST_Insert->Parameters = CCAddParam($this->P_REFERENCE_LIST_Insert->Parameters, "FLAG", "ADD");
        $this->P_REFERENCE_LIST_Insert->Parameters = CCAddParam($this->P_REFERENCE_LIST_Insert->Parameters, "REFERENCE_TYPE_CODE", CCGetFromGet("REFERENCE_TYPE_CODE", NULL));
        $this->Navigator->Show();
        $this->P_REFERENCE_LIST_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-16094F41
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REF_TYPE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REFERENCE_TYPE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LISTING_NO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_REFERENCE_LIST_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_REFERENCE_LIST Class @2-FCB6E20C

class clsP_REFERENCE_LISTDataSource extends clsDBConn {  //P_REFERENCE_LISTDataSource Class @2-D51AA03E

//DataSource Variables @2-A48613FF
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $REF_TYPE;
    var $REFERENCE_TYPE;
    var $LISTING_NO;
    var $DESCRIPTION;
    var $DLink;
    var $ADLink;
    var $P_REFERENCE_LIST_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-775125BD
    function clsP_REFERENCE_LISTDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_REFERENCE_LIST";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->REF_TYPE = new clsField("REF_TYPE", ccsText, "");
        
        $this->REFERENCE_TYPE = new clsField("REFERENCE_TYPE", ccsText, "");
        
        $this->LISTING_NO = new clsField("LISTING_NO", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_REFERENCE_LIST_ID = new clsField("P_REFERENCE_LIST_ID", ccsFloat, "");
        

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

//Prepare Method @2-64A73171
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urlP_REFERENCE_TYPE_ID", ccsFloat, "", "", $this->Parameters["urlP_REFERENCE_TYPE_ID"], 0, false);
    }
//End Prepare Method

//Open Method @2-AE0FBB4F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT A.CODE,B.CODE as Ref_TYPE,A.REFERENCE_NAME as REFERENCE_TYPE,A.LISTING_NO,A.DESCRIPTION,A.P_REFERENCE_LIST_ID,B.P_REFERENCE_TYPE_ID FROM P_REFERENCE_LIST A\n" .
        "INNER JOIN P_REFERENCE_TYPE  B\n" .
        "ON A.P_REFERENCE_TYPE_ID = B.P_REFERENCE_TYPE_ID\n" .
        "where B.P_REFERENCE_TYPE_ID =" . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "\n" .
        "and (upper(A.CODE) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(B.CODE) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(A.REFERENCE_NAME) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'))) cnt";
        $this->SQL = "SELECT A.CODE,B.CODE as Ref_TYPE,A.REFERENCE_NAME as REFERENCE_TYPE,A.LISTING_NO,A.DESCRIPTION,A.P_REFERENCE_LIST_ID,B.P_REFERENCE_TYPE_ID FROM P_REFERENCE_LIST A\n" .
        "INNER JOIN P_REFERENCE_TYPE  B\n" .
        "ON A.P_REFERENCE_TYPE_ID = B.P_REFERENCE_TYPE_ID\n" .
        "where B.P_REFERENCE_TYPE_ID =" . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "\n" .
        "and (upper(A.CODE) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(B.CODE) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(A.REFERENCE_NAME) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'))";
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

//SetValues Method @2-58718E2C
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->REF_TYPE->SetDBValue($this->f("REF_TYPE"));
        $this->REFERENCE_TYPE->SetDBValue($this->f("REFERENCE_TYPE"));
        $this->LISTING_NO->SetDBValue(trim($this->f("LISTING_NO")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->DLink->SetDBValue($this->f("P_REFERENCE_LIST_ID"));
        $this->ADLink->SetDBValue($this->f("P_REFERENCE_LIST_ID"));
        $this->P_REFERENCE_LIST_ID->SetDBValue(trim($this->f("P_REFERENCE_LIST_ID")));
    }
//End SetValues Method

} //End P_REFERENCE_LISTDataSource Class @2-FCB6E20C



class clsRecordp_reference_list1 { //p_reference_list1 Class @28-2A32757A

//Variables @28-D6FF3E86

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

//Class_Initialize Event @28-41A19D96
    function clsRecordp_reference_list1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_reference_list1/Error";
        $this->DataSource = new clsp_reference_list1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_reference_list1";
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
            $this->P_REFERENCE_TYPE_ID = & new clsControl(ccsHidden, "P_REFERENCE_TYPE_ID", "P REFERENCE TYPE ID", ccsFloat, "", CCGetRequestParam("P_REFERENCE_TYPE_ID", $Method, NULL), $this);
            $this->P_REFERENCE_TYPE_ID->Required = true;
            $this->REFERENCE_NAME = & new clsControl(ccsTextBox, "REFERENCE_NAME", "REFERENCE NAME", ccsText, "", CCGetRequestParam("REFERENCE_NAME", $Method, NULL), $this);
            $this->LISTING_NO = & new clsControl(ccsTextBox, "LISTING_NO", "LISTING NO", ccsFloat, "", CCGetRequestParam("LISTING_NO", $Method, NULL), $this);
            $this->LISTING_NO->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATED BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATED DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->P_REFERENCE_TYPE_NAME = & new clsControl(ccsTextBox, "P_REFERENCE_TYPE_NAME", "P_REFERENCE_TYPE_NAME", ccsText, "", CCGetRequestParam("P_REFERENCE_TYPE_NAME", $Method, NULL), $this);
            $this->P_REFERENCE_TYPE_NAME->Required = true;
            $this->P_REFERENCE_LIST_ID = & new clsControl(ccsHidden, "P_REFERENCE_LIST_ID", "P_REFERENCE_LIST_ID", ccsFloat, "", CCGetRequestParam("P_REFERENCE_LIST_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetText(date("d-M-Y"));
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @28-4B4DADAF
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_REFERENCE_LIST_ID"] = CCGetFromGet("P_REFERENCE_LIST_ID", NULL);
    }
//End Initialize Method

//Validate Method @28-B9CF8353
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->P_REFERENCE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->REFERENCE_NAME->Validate() && $Validation);
        $Validation = ($this->LISTING_NO->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->P_REFERENCE_TYPE_NAME->Validate() && $Validation);
        $Validation = ($this->P_REFERENCE_LIST_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REFERENCE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->REFERENCE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LISTING_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REFERENCE_TYPE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REFERENCE_LIST_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @28-27A058CD
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->P_REFERENCE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->REFERENCE_NAME->Errors->Count());
        $errors = ($errors || $this->LISTING_NO->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->P_REFERENCE_TYPE_NAME->Errors->Count());
        $errors = ($errors || $this->P_REFERENCE_LIST_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @28-ED598703
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

//Operation Method @28-0930176F
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
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_REFERENCE_LIST_ID"));
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

//InsertRow Method @28-1FC010A4
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->P_REFERENCE_TYPE_ID->SetValue($this->P_REFERENCE_TYPE_ID->GetValue(true));
        $this->DataSource->REFERENCE_NAME->SetValue($this->REFERENCE_NAME->GetValue(true));
        $this->DataSource->LISTING_NO->SetValue($this->LISTING_NO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @28-F4617262
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->P_REFERENCE_TYPE_ID->SetValue($this->P_REFERENCE_TYPE_ID->GetValue(true));
        $this->DataSource->REFERENCE_NAME->SetValue($this->REFERENCE_NAME->GetValue(true));
        $this->DataSource->LISTING_NO->SetValue($this->LISTING_NO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->P_REFERENCE_LIST_ID->SetValue($this->P_REFERENCE_LIST_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @28-F9BA8204
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_REFERENCE_LIST_ID->SetValue($this->P_REFERENCE_LIST_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @28-61C3E538
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
                    $this->P_REFERENCE_TYPE_ID->SetValue($this->DataSource->P_REFERENCE_TYPE_ID->GetValue());
                    $this->REFERENCE_NAME->SetValue($this->DataSource->REFERENCE_NAME->GetValue());
                    $this->LISTING_NO->SetValue($this->DataSource->LISTING_NO->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->P_REFERENCE_TYPE_NAME->SetValue($this->DataSource->P_REFERENCE_TYPE_NAME->GetValue());
                    $this->P_REFERENCE_LIST_ID->SetValue($this->DataSource->P_REFERENCE_LIST_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REFERENCE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->REFERENCE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LISTING_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REFERENCE_TYPE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REFERENCE_LIST_ID->Errors->ToString());
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
        $this->P_REFERENCE_TYPE_ID->Show();
        $this->REFERENCE_NAME->Show();
        $this->LISTING_NO->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_BY->Show();
        $this->UPDATE_DATE->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->P_REFERENCE_TYPE_NAME->Show();
        $this->P_REFERENCE_LIST_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_reference_list1 Class @28-FCB6E20C

class clsp_reference_list1DataSource extends clsDBConn {  //p_reference_list1DataSource Class @28-B74E2FB0

//DataSource Variables @28-7B118366
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
    var $P_REFERENCE_TYPE_ID;
    var $REFERENCE_NAME;
    var $LISTING_NO;
    var $DESCRIPTION;
    var $UPDATE_BY;
    var $UPDATE_DATE;
    var $P_REFERENCE_TYPE_NAME;
    var $P_REFERENCE_LIST_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @28-A9348B44
    function clsp_reference_list1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_reference_list1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->P_REFERENCE_TYPE_ID = new clsField("P_REFERENCE_TYPE_ID", ccsFloat, "");
        
        $this->REFERENCE_NAME = new clsField("REFERENCE_NAME", ccsText, "");
        
        $this->LISTING_NO = new clsField("LISTING_NO", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->P_REFERENCE_TYPE_NAME = new clsField("P_REFERENCE_TYPE_NAME", ccsText, "");
        
        $this->P_REFERENCE_LIST_ID = new clsField("P_REFERENCE_LIST_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @28-25445760
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_REFERENCE_LIST_ID", ccsFloat, "", "", $this->Parameters["urlP_REFERENCE_LIST_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @28-DD72C453
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "select a.*,b.code as p_reference_type_name from p_reference_list a , p_reference_type b\n" .
        "where a.p_reference_type_id=b.p_reference_type_id\n" .
        "and a.P_REFERENCE_LIST_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @28-10BEDE1E
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->P_REFERENCE_TYPE_ID->SetDBValue(trim($this->f("P_REFERENCE_TYPE_ID")));
        $this->REFERENCE_NAME->SetDBValue($this->f("REFERENCE_NAME"));
        $this->LISTING_NO->SetDBValue(trim($this->f("LISTING_NO")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->P_REFERENCE_TYPE_NAME->SetDBValue($this->f("P_REFERENCE_TYPE_NAME"));
        $this->P_REFERENCE_LIST_ID->SetDBValue(trim($this->f("P_REFERENCE_LIST_ID")));
    }
//End SetValues Method

//Insert Method @28-72CD7B68
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_REFERENCE_TYPE_ID"] = new clsSQLParameter("ctrlP_REFERENCE_TYPE_ID", ccsFloat, "", "", $this->P_REFERENCE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["REFERENCE_NAME"] = new clsSQLParameter("ctrlREFERENCE_NAME", ccsText, "", "", $this->REFERENCE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LISTING_NO"] = new clsSQLParameter("ctrlLISTING_NO", ccsFloat, "", "", $this->LISTING_NO->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["P_REFERENCE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_REFERENCE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_REFERENCE_TYPE_ID"]->GetValue())) 
            $this->cp["P_REFERENCE_TYPE_ID"]->SetValue($this->P_REFERENCE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_REFERENCE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_REFERENCE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_REFERENCE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["REFERENCE_NAME"]->GetValue()) and !strlen($this->cp["REFERENCE_NAME"]->GetText()) and !is_bool($this->cp["REFERENCE_NAME"]->GetValue())) 
            $this->cp["REFERENCE_NAME"]->SetValue($this->REFERENCE_NAME->GetValue(true));
        if (!is_null($this->cp["LISTING_NO"]->GetValue()) and !strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue())) 
            $this->cp["LISTING_NO"]->SetValue($this->LISTING_NO->GetValue(true));
        if (!strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue(true))) 
            $this->cp["LISTING_NO"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_REFERENCE_LIST(P_REFERENCE_LIST_ID, CODE, P_REFERENCE_TYPE_ID, REFERENCE_NAME, LISTING_NO, DESCRIPTION, UPDATE_DATE, UPDATE_BY)\n" .
        "VALUES\n" .
        "(GENERATE_ID('BILLDB','P_REFERENCE_LIST','P_REFERENCE_LIST_ID'),UPPER('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "')," . $this->SQLValue($this->cp["P_REFERENCE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",UPPER('" . $this->SQLValue($this->cp["REFERENCE_NAME"]->GetDBValue(), ccsText) . "')," . $this->SQLValue($this->cp["LISTING_NO"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @28-CB079485
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_REFERENCE_TYPE_ID"] = new clsSQLParameter("ctrlP_REFERENCE_TYPE_ID", ccsFloat, "", "", $this->P_REFERENCE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["REFERENCE_NAME"] = new clsSQLParameter("ctrlREFERENCE_NAME", ccsText, "", "", $this->REFERENCE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LISTING_NO"] = new clsSQLParameter("ctrlLISTING_NO", ccsFloat, "", "", $this->LISTING_NO->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["P_REFERENCE_LIST_ID"] = new clsSQLParameter("ctrlP_REFERENCE_LIST_ID", ccsFloat, "", "", $this->P_REFERENCE_LIST_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["P_REFERENCE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_REFERENCE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_REFERENCE_TYPE_ID"]->GetValue())) 
            $this->cp["P_REFERENCE_TYPE_ID"]->SetValue($this->P_REFERENCE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_REFERENCE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_REFERENCE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_REFERENCE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["REFERENCE_NAME"]->GetValue()) and !strlen($this->cp["REFERENCE_NAME"]->GetText()) and !is_bool($this->cp["REFERENCE_NAME"]->GetValue())) 
            $this->cp["REFERENCE_NAME"]->SetValue($this->REFERENCE_NAME->GetValue(true));
        if (!is_null($this->cp["LISTING_NO"]->GetValue()) and !strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue())) 
            $this->cp["LISTING_NO"]->SetValue($this->LISTING_NO->GetValue(true));
        if (!strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue(true))) 
            $this->cp["LISTING_NO"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["P_REFERENCE_LIST_ID"]->GetValue()) and !strlen($this->cp["P_REFERENCE_LIST_ID"]->GetText()) and !is_bool($this->cp["P_REFERENCE_LIST_ID"]->GetValue())) 
            $this->cp["P_REFERENCE_LIST_ID"]->SetValue($this->P_REFERENCE_LIST_ID->GetValue(true));
        if (!strlen($this->cp["P_REFERENCE_LIST_ID"]->GetText()) and !is_bool($this->cp["P_REFERENCE_LIST_ID"]->GetValue(true))) 
            $this->cp["P_REFERENCE_LIST_ID"]->SetText(0);
        $this->SQL = "UPDATE P_REFERENCE_LIST SET \n" .
        "CODE=UPPER(TRIM('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "')),\n" .
        "P_REFERENCE_TYPE_ID=" . $this->SQLValue($this->cp["P_REFERENCE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "REFERENCE_NAME=UPPER('" . $this->SQLValue($this->cp["REFERENCE_NAME"]->GetDBValue(), ccsText) . "'),\n" .
        "LISTING_NO=" . $this->SQLValue($this->cp["LISTING_NO"]->GetDBValue(), ccsFloat) . ",\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATE_DATE=sysdate,\n" .
        "UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE  P_REFERENCE_LIST_ID = " . $this->SQLValue($this->cp["P_REFERENCE_LIST_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @28-E3B9A3BF
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_REFERENCE_LIST_ID"] = new clsSQLParameter("ctrlP_REFERENCE_LIST_ID", ccsFloat, "", "", $this->P_REFERENCE_LIST_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_REFERENCE_LIST_ID"]->GetValue()) and !strlen($this->cp["P_REFERENCE_LIST_ID"]->GetText()) and !is_bool($this->cp["P_REFERENCE_LIST_ID"]->GetValue())) 
            $this->cp["P_REFERENCE_LIST_ID"]->SetValue($this->P_REFERENCE_LIST_ID->GetValue(true));
        if (!strlen($this->cp["P_REFERENCE_LIST_ID"]->GetText()) and !is_bool($this->cp["P_REFERENCE_LIST_ID"]->GetValue(true))) 
            $this->cp["P_REFERENCE_LIST_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_REFERENCE_LIST WHERE P_REFERENCE_LIST_ID = " . $this->SQLValue($this->cp["P_REFERENCE_LIST_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_reference_list1DataSource Class @28-FCB6E20C

class clsRecordP_REFERENCE_LISTSearch { //P_REFERENCE_LISTSearch Class @3-88C0090D

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

//Class_Initialize Event @3-53AEF98A
    function clsRecordP_REFERENCE_LISTSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_REFERENCE_LISTSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_REFERENCE_LISTSearch";
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
            $this->P_REFERENCE_TYPE_ID = & new clsControl(ccsTextBox, "P_REFERENCE_TYPE_ID", "P_REFERENCE_TYPE_ID", ccsText, "", CCGetRequestParam("P_REFERENCE_TYPE_ID", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @3-3BBFF09E
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_keyword->Validate() && $Validation);
        $Validation = ($this->P_REFERENCE_TYPE_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_keyword->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REFERENCE_TYPE_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-469A97B0
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_keyword->Errors->Count());
        $errors = ($errors || $this->P_REFERENCE_TYPE_ID->Errors->Count());
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

//Operation Method @3-043C968B
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
        $Redirect = "p_reference_list.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_reference_list.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-03165C05
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
            $Error = ComposeStrings($Error, $this->P_REFERENCE_TYPE_ID->Errors->ToString());
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
        $this->P_REFERENCE_TYPE_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End P_REFERENCE_LISTSearch Class @3-FCB6E20C

//Initialize Page @1-D0C1DBCB
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
$TemplateFileName = "p_reference_list.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-0664832D
include_once("./p_reference_list_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-E14916FE
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_REFERENCE_LIST = & new clsGridP_REFERENCE_LIST("", $MainPage);
$p_reference_list1 = & new clsRecordp_reference_list1("", $MainPage);
$P_REFERENCE_LISTSearch = & new clsRecordP_REFERENCE_LISTSearch("", $MainPage);
$MainPage->P_REFERENCE_LIST = & $P_REFERENCE_LIST;
$MainPage->p_reference_list1 = & $p_reference_list1;
$MainPage->P_REFERENCE_LISTSearch = & $P_REFERENCE_LISTSearch;
$P_REFERENCE_LIST->Initialize();
$p_reference_list1->Initialize();

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

//Execute Components @1-7525003D
$p_reference_list1->Operation();
$P_REFERENCE_LISTSearch->Operation();
//End Execute Components

//Go to destination page @1-11D0A560
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_REFERENCE_LIST);
    unset($p_reference_list1);
    unset($P_REFERENCE_LISTSearch);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-23AA428A
$P_REFERENCE_LIST->Show();
$p_reference_list1->Show();
$P_REFERENCE_LISTSearch->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-68ACD9B9
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_REFERENCE_LIST);
unset($p_reference_list1);
unset($P_REFERENCE_LISTSearch);
unset($Tpl);
//End Unload Page


?>
