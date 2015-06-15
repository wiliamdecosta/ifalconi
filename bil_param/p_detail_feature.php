<?php
//Include Common Files @1-30E2D6F1
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_detail_feature.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_DETAIL_FEATURE { //P_DETAIL_FEATURE class @2-89664E09

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

//Class_Initialize Event @2-6E3CD7A5
    function clsGridP_DETAIL_FEATURE($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_DETAIL_FEATURE";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_DETAIL_FEATURE";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_DETAIL_FEATUREDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 7;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->FEATURE_TYPE_CODE = & new clsControl(ccsLabel, "FEATURE_TYPE_CODE", "FEATURE_TYPE_CODE", ccsText, "", CCGetRequestParam("FEATURE_TYPE_CODE", ccsGet, NULL), $this);
        $this->VALID_FROM = & new clsControl(ccsLabel, "VALID_FROM", "VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", ccsGet, NULL), $this);
        $this->VALID_TO = & new clsControl(ccsLabel, "VALID_TO", "VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", ccsGet, NULL), $this);
        $this->FEATURE_GROUP_CODE = & new clsControl(ccsLabel, "FEATURE_GROUP_CODE", "FEATURE_GROUP_CODE", ccsText, "", CCGetRequestParam("FEATURE_GROUP_CODE", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->P_BUNDLED_FEATURE_DETAIL_ID = & new clsControl(ccsHidden, "P_BUNDLED_FEATURE_DETAIL_ID", "P_BUNDLED_FEATURE_DETAIL_ID", ccsText, "", CCGetRequestParam("P_BUNDLED_FEATURE_DETAIL_ID", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_detail_feature.php";
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->ST_NEW = & new clsControl(ccsLink, "ST_NEW", "ST_NEW", ccsText, "", CCGetRequestParam("ST_NEW", ccsGet, NULL), $this);
        $this->ST_NEW->HTML = true;
        $this->ST_NEW->Page = "p_detail_feature.php";
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

//Show Method @2-A7EE4485
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);
        $this->DataSource->Parameters["urlP_BUNDLED_FEATURE_ID"] = CCGetFromGet("P_BUNDLED_FEATURE_ID", NULL);

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
            $this->ControlsVisible["FEATURE_TYPE_CODE"] = $this->FEATURE_TYPE_CODE->Visible;
            $this->ControlsVisible["VALID_FROM"] = $this->VALID_FROM->Visible;
            $this->ControlsVisible["VALID_TO"] = $this->VALID_TO->Visible;
            $this->ControlsVisible["FEATURE_GROUP_CODE"] = $this->FEATURE_GROUP_CODE->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["P_BUNDLED_FEATURE_DETAIL_ID"] = $this->P_BUNDLED_FEATURE_DETAIL_ID->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->FEATURE_TYPE_CODE->SetValue($this->DataSource->FEATURE_TYPE_CODE->GetValue());
                $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                $this->FEATURE_GROUP_CODE->SetValue($this->DataSource->FEATURE_GROUP_CODE->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->P_BUNDLED_FEATURE_DETAIL_ID->SetValue($this->DataSource->P_BUNDLED_FEATURE_DETAIL_ID->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_BUNDLED_FEATURE_DETAIL_ID", $this->DataSource->f("P_BUNDLED_FEATURE_DETAIL_ID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->FEATURE_TYPE_CODE->Show();
                $this->VALID_FROM->Show();
                $this->VALID_TO->Show();
                $this->FEATURE_GROUP_CODE->Show();
                $this->DESCRIPTION->Show();
                $this->P_BUNDLED_FEATURE_DETAIL_ID->Show();
                $this->DLink->Show();
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
        $this->ST_NEW->Parameters = CCGetQueryString("QueryString", array("P_BUNDLED_FEATURE_DETAIL_ID", "ccsForm"));
        $this->ST_NEW->Parameters = CCAddParam($this->ST_NEW->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->ST_NEW->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-AB38FC9A
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->FEATURE_TYPE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FEATURE_GROUP_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_BUNDLED_FEATURE_DETAIL_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_DETAIL_FEATURE Class @2-FCB6E20C

class clsP_DETAIL_FEATUREDataSource extends clsDBConn {  //P_DETAIL_FEATUREDataSource Class @2-BE6E8489

//DataSource Variables @2-632CFB7C
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $FEATURE_TYPE_CODE;
    var $VALID_FROM;
    var $VALID_TO;
    var $FEATURE_GROUP_CODE;
    var $DESCRIPTION;
    var $P_BUNDLED_FEATURE_DETAIL_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-E9E9A890
    function clsP_DETAIL_FEATUREDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_DETAIL_FEATURE";
        $this->Initialize();
        $this->FEATURE_TYPE_CODE = new clsField("FEATURE_TYPE_CODE", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->FEATURE_GROUP_CODE = new clsField("FEATURE_GROUP_CODE", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->P_BUNDLED_FEATURE_DETAIL_ID = new clsField("P_BUNDLED_FEATURE_DETAIL_ID", ccsText, "");
        

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

//Prepare Method @2-479B909F
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urlP_BUNDLED_FEATURE_ID", ccsFloat, "", "", $this->Parameters["urlP_BUNDLED_FEATURE_ID"], 0, false);
    }
//End Prepare Method

//Open Method @2-098F3821
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM V_P_BUNDLED_FEATURE_DETAIL\n" .
        "WHERE P_BUNDLED_FEATURE_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . ") cnt";
        $this->SQL = "SELECT * \n" .
        "FROM V_P_BUNDLED_FEATURE_DETAIL\n" .
        "WHERE P_BUNDLED_FEATURE_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "";
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

//SetValues Method @2-14981FD2
    function SetValues()
    {
        $this->FEATURE_TYPE_CODE->SetDBValue($this->f("FEATURE_TYPE_CODE"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->FEATURE_GROUP_CODE->SetDBValue($this->f("FEATURE_GROUP_CODE"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->P_BUNDLED_FEATURE_DETAIL_ID->SetDBValue($this->f("P_BUNDLED_FEATURE_DETAIL_ID"));
    }
//End SetValues Method

} //End P_DETAIL_FEATUREDataSource Class @2-FCB6E20C

class clsRecordP_DETAIL_FEATURE1 { //P_DETAIL_FEATURE1 Class @217-CC326165

//Variables @217-D6FF3E86

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

//Class_Initialize Event @217-836911C4
    function clsRecordP_DETAIL_FEATURE1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_DETAIL_FEATURE1/Error";
        $this->DataSource = new clsP_DETAIL_FEATURE1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_DETAIL_FEATURE1";
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
            $this->P_BUNDLED_FEATURE_ID = & new clsControl(ccsTextBox, "P_BUNDLED_FEATURE_ID", "P BUNDLED FEATURE ID", ccsFloat, "", CCGetRequestParam("P_BUNDLED_FEATURE_ID", $Method, NULL), $this);
            $this->P_BUNDLED_FEATURE_ID->Required = true;
            $this->P_FEATURE_TYPE_ID = & new clsControl(ccsTextBox, "P_FEATURE_TYPE_ID", "P FEATURE TYPE ID", ccsFloat, "", CCGetRequestParam("P_FEATURE_TYPE_ID", $Method, NULL), $this);
            $this->P_FEATURE_TYPE_ID->Required = true;
            $this->VALID_FROM = & new clsControl(ccsTextBox, "VALID_FROM", "VALID FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", $Method, NULL), $this);
            $this->VALID_FROM->Required = true;
            $this->VALID_TO = & new clsControl(ccsTextBox, "VALID_TO", "VALID TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", $Method, NULL), $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->DatePicker_UPDATE_DATE1 = & new clsDatePicker("DatePicker_UPDATE_DATE1", "P_DETAIL_FEATURE1", "VALID_FROM", $this);
            $this->DatePicker_UPDATE_DATE2 = & new clsDatePicker("DatePicker_UPDATE_DATE2", "P_DETAIL_FEATURE1", "VALID_TO", $this);
            $this->FEATURE_TYPE_CODE = & new clsControl(ccsTextBox, "FEATURE_TYPE_CODE", "FEATURE TYPE CODE", ccsText, "", CCGetRequestParam("FEATURE_TYPE_CODE", $Method, NULL), $this);
            $this->FEATURE_TYPE_CODE->Required = true;
            $this->FEATURE_GROUP_CODE = & new clsControl(ccsTextBox, "FEATURE_GROUP_CODE", "FEATURE_GROUP_CODE", ccsText, "", CCGetRequestParam("FEATURE_GROUP_CODE", $Method, NULL), $this);
            $this->P_SERVICE_TYPE_ID = & new clsControl(ccsTextBox, "P_SERVICE_TYPE_ID", "P_SERVICE_TYPE_ID", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_ID", $Method, NULL), $this);
            $this->P_BUNDLED_FEATURE_DETAIL_ID = & new clsControl(ccsHidden, "P_BUNDLED_FEATURE_DETAIL_ID", "P_BUNDLED_FEATURE_DETAIL_ID", ccsText, "", CCGetRequestParam("P_BUNDLED_FEATURE_DETAIL_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @217-F71E71FE
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_BUNDLED_FEATURE_DETAIL_ID"] = CCGetFromGet("P_BUNDLED_FEATURE_DETAIL_ID", NULL);
    }
//End Initialize Method

//Validate Method @217-29C5CA9D
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->P_BUNDLED_FEATURE_ID->Validate() && $Validation);
        $Validation = ($this->P_FEATURE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->VALID_FROM->Validate() && $Validation);
        $Validation = ($this->VALID_TO->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->FEATURE_TYPE_CODE->Validate() && $Validation);
        $Validation = ($this->FEATURE_GROUP_CODE->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->P_BUNDLED_FEATURE_DETAIL_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->P_BUNDLED_FEATURE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_FEATURE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FEATURE_TYPE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FEATURE_GROUP_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BUNDLED_FEATURE_DETAIL_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @217-33199CA6
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->P_BUNDLED_FEATURE_ID->Errors->Count());
        $errors = ($errors || $this->P_FEATURE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->VALID_FROM->Errors->Count());
        $errors = ($errors || $this->VALID_TO->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE1->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE2->Errors->Count());
        $errors = ($errors || $this->FEATURE_TYPE_CODE->Errors->Count());
        $errors = ($errors || $this->FEATURE_GROUP_CODE->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->P_BUNDLED_FEATURE_DETAIL_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @217-ED598703
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

//Operation Method @217-F462DA79
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
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "P_BUNDLED_FEATURE_DETAIL_ID"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
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

//InsertRow Method @217-F921C86D
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->P_BUNDLED_FEATURE_ID->SetValue($this->P_BUNDLED_FEATURE_ID->GetValue(true));
        $this->DataSource->P_FEATURE_TYPE_ID->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @217-15BA2989
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->P_FEATURE_TYPE_ID->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->P_BUNDLED_FEATURE_DETAIL_ID->SetValue($this->P_BUNDLED_FEATURE_DETAIL_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @217-FCFCB3B4
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_BUNDLED_FEATURE_DETAIL_ID->SetValue($this->P_BUNDLED_FEATURE_DETAIL_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @217-6D5E7980
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
                    $this->P_BUNDLED_FEATURE_ID->SetValue($this->DataSource->P_BUNDLED_FEATURE_ID->GetValue());
                    $this->P_FEATURE_TYPE_ID->SetValue($this->DataSource->P_FEATURE_TYPE_ID->GetValue());
                    $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                    $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->FEATURE_TYPE_CODE->SetValue($this->DataSource->FEATURE_TYPE_CODE->GetValue());
                    $this->FEATURE_GROUP_CODE->SetValue($this->DataSource->FEATURE_GROUP_CODE->GetValue());
                    $this->P_BUNDLED_FEATURE_DETAIL_ID->SetValue($this->DataSource->P_BUNDLED_FEATURE_DETAIL_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->P_BUNDLED_FEATURE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_FEATURE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FEATURE_TYPE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FEATURE_GROUP_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BUNDLED_FEATURE_DETAIL_ID->Errors->ToString());
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
        $this->P_BUNDLED_FEATURE_ID->Show();
        $this->P_FEATURE_TYPE_ID->Show();
        $this->VALID_FROM->Show();
        $this->VALID_TO->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_DATE->Show();
        $this->UPDATE_BY->Show();
        $this->DatePicker_UPDATE_DATE1->Show();
        $this->DatePicker_UPDATE_DATE2->Show();
        $this->FEATURE_TYPE_CODE->Show();
        $this->FEATURE_GROUP_CODE->Show();
        $this->P_SERVICE_TYPE_ID->Show();
        $this->P_BUNDLED_FEATURE_DETAIL_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End P_DETAIL_FEATURE1 Class @217-FCB6E20C

class clsP_DETAIL_FEATURE1DataSource extends clsDBConn {  //P_DETAIL_FEATURE1DataSource Class @217-D22D1A75

//DataSource Variables @217-D849DA20
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
    var $P_BUNDLED_FEATURE_ID;
    var $P_FEATURE_TYPE_ID;
    var $VALID_FROM;
    var $VALID_TO;
    var $DESCRIPTION;
    var $UPDATE_DATE;
    var $UPDATE_BY;
    var $FEATURE_TYPE_CODE;
    var $FEATURE_GROUP_CODE;
    var $P_SERVICE_TYPE_ID;
    var $P_BUNDLED_FEATURE_DETAIL_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @217-20ED56D0
    function clsP_DETAIL_FEATURE1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record P_DETAIL_FEATURE1/Error";
        $this->Initialize();
        $this->P_BUNDLED_FEATURE_ID = new clsField("P_BUNDLED_FEATURE_ID", ccsFloat, "");
        
        $this->P_FEATURE_TYPE_ID = new clsField("P_FEATURE_TYPE_ID", ccsFloat, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->FEATURE_TYPE_CODE = new clsField("FEATURE_TYPE_CODE", ccsText, "");
        
        $this->FEATURE_GROUP_CODE = new clsField("FEATURE_GROUP_CODE", ccsText, "");
        
        $this->P_SERVICE_TYPE_ID = new clsField("P_SERVICE_TYPE_ID", ccsText, "");
        
        $this->P_BUNDLED_FEATURE_DETAIL_ID = new clsField("P_BUNDLED_FEATURE_DETAIL_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @217-C21A3EA8
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_BUNDLED_FEATURE_DETAIL_ID", ccsFloat, "", "", $this->Parameters["urlP_BUNDLED_FEATURE_DETAIL_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_BUNDLED_FEATURE_DETAIL_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @217-3C9F58B0
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_P_BUNDLED_FEATURE_DETAIL {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @217-EAAA207A
    function SetValues()
    {
        $this->P_BUNDLED_FEATURE_ID->SetDBValue(trim($this->f("P_BUNDLED_FEATURE_ID")));
        $this->P_FEATURE_TYPE_ID->SetDBValue(trim($this->f("P_FEATURE_TYPE_ID")));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->FEATURE_TYPE_CODE->SetDBValue($this->f("FEATURE_TYPE_CODE"));
        $this->FEATURE_GROUP_CODE->SetDBValue($this->f("FEATURE_GROUP_CODE"));
        $this->P_BUNDLED_FEATURE_DETAIL_ID->SetDBValue($this->f("P_BUNDLED_FEATURE_DETAIL_ID"));
    }
//End SetValues Method

//Insert Method @217-5F6A8ACB
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_BUNDLED_FEATURE_ID"] = new clsSQLParameter("ctrlP_BUNDLED_FEATURE_ID", ccsFloat, "", "", $this->P_BUNDLED_FEATURE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_FEATURE_TYPE_ID"] = new clsSQLParameter("ctrlP_FEATURE_TYPE_ID", ccsFloat, "", "", $this->P_FEATURE_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["P_BUNDLED_FEATURE_ID"]->GetValue()) and !strlen($this->cp["P_BUNDLED_FEATURE_ID"]->GetText()) and !is_bool($this->cp["P_BUNDLED_FEATURE_ID"]->GetValue())) 
            $this->cp["P_BUNDLED_FEATURE_ID"]->SetValue($this->P_BUNDLED_FEATURE_ID->GetValue(true));
        if (!is_null($this->cp["P_FEATURE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_FEATURE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_TYPE_ID"]->GetValue())) 
            $this->cp["P_FEATURE_TYPE_ID"]->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        $this->SQL = "INSERT INTO P_BUNDLED_FEATURE_DETAIL(\n" .
        "P_BUNDLED_FEATURE_DETAIL_ID, \n" .
        "P_BUNDLED_FEATURE_ID,\n" .
        "P_FEATURE_TYPE_ID,\n" .
        "VALID_FROM, \n" .
        "VALID_TO, \n" .
        "DESCRIPTION, \n" .
        "UPDATE_DATE, \n" .
        "UPDATE_BY\n" .
        ") VALUES(\n" .
        "GENERATE_ID('BILLDB','P_BUNDLED_FEATURE_DETAIL','P_BUNDLED_FEATURE_DETAIL_ID'),\n" .
        "" . $this->SQLValue($this->cp["P_BUNDLED_FEATURE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        " " . $this->SQLValue($this->cp["P_FEATURE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        " '" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "', \n" .
        " '" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "',\n" .
        " INITCAP('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "'), \n" .
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

//Update Method @217-1BD82D76
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_FEATURE_TYPE_ID"] = new clsSQLParameter("ctrlP_FEATURE_TYPE_ID", ccsFloat, "", "", $this->P_FEATURE_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["P_BUNDLED_FEATURE_DETAIL_ID"] = new clsSQLParameter("ctrlP_BUNDLED_FEATURE_DETAIL_ID", ccsFloat, "", "", $this->P_BUNDLED_FEATURE_DETAIL_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["P_FEATURE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_FEATURE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_FEATURE_TYPE_ID"]->GetValue())) 
            $this->cp["P_FEATURE_TYPE_ID"]->SetValue($this->P_FEATURE_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->GetValue()) and !strlen($this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->GetText()) and !is_bool($this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->GetValue())) 
            $this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->SetValue($this->P_BUNDLED_FEATURE_DETAIL_ID->GetValue(true));
        if (!strlen($this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->GetText()) and !is_bool($this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->GetValue(true))) 
            $this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->SetText(0);
        $this->SQL = "UPDATE P_BUNDLED_FEATURE_DETAIL SET \n" .
        " P_FEATURE_TYPE_ID=" . $this->SQLValue($this->cp["P_FEATURE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        " VALID_FROM='" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "',\n" .
        " VALID_TO='" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "',\n" .
        " DESCRIPTION=INITCAP('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "'), \n" .
        "UPDATE_DATE=SYSDATE,\n" .
        " UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE  \n" .
        "P_BUNDLED_FEATURE_DETAIL_ID = " . $this->SQLValue($this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @217-F489F79B
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_BUNDLED_FEATURE_DETAIL_ID"] = new clsSQLParameter("ctrlP_BUNDLED_FEATURE_DETAIL_ID", ccsFloat, "", "", $this->P_BUNDLED_FEATURE_DETAIL_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->GetValue()) and !strlen($this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->GetText()) and !is_bool($this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->GetValue())) 
            $this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->SetValue($this->P_BUNDLED_FEATURE_DETAIL_ID->GetValue(true));
        if (!strlen($this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->GetText()) and !is_bool($this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->GetValue(true))) 
            $this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_BUNDLED_FEATURE_DETAIL WHERE  P_BUNDLED_FEATURE_DETAIL_ID = " . $this->SQLValue($this->cp["P_BUNDLED_FEATURE_DETAIL_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End P_DETAIL_FEATURE1DataSource Class @217-FCB6E20C





//Initialize Page @1-391FCA9F
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
$TemplateFileName = "p_detail_feature.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-C002F3E7
include_once("./p_detail_feature_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-FF4C8FDB
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_DETAIL_FEATURE = & new clsGridP_DETAIL_FEATURE("", $MainPage);
$P_DETAIL_FEATURE1 = & new clsRecordP_DETAIL_FEATURE1("", $MainPage);
$MainPage->P_DETAIL_FEATURE = & $P_DETAIL_FEATURE;
$MainPage->P_DETAIL_FEATURE1 = & $P_DETAIL_FEATURE1;
$P_DETAIL_FEATURE->Initialize();
$P_DETAIL_FEATURE1->Initialize();

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

//Execute Components @1-6D625831
$P_DETAIL_FEATURE1->Operation();
//End Execute Components

//Go to destination page @1-2DAFAB2E
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_DETAIL_FEATURE);
    unset($P_DETAIL_FEATURE1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-6F1093DD
$P_DETAIL_FEATURE->Show();
$P_DETAIL_FEATURE1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-C1F6FF59
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_DETAIL_FEATURE);
unset($P_DETAIL_FEATURE1);
unset($Tpl);
//End Unload Page


?>
