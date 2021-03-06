<?php
//Include Common Files @1-DA7E0431
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_data/");
define("FileName", "verification_bill_ticket.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridENTRY_BILL_TICKET { //ENTRY_BILL_TICKET class @2-187BF744

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

//Class_Initialize Event @2-E96D6302
    function clsGridENTRY_BILL_TICKET($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "ENTRY_BILL_TICKET";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid ENTRY_BILL_TICKET";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsENTRY_BILL_TICKETDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 5;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->SUBSCRIPTION_NAME = & new clsControl(ccsLabel, "SUBSCRIPTION_NAME", "SUBSCRIPTION_NAME", ccsText, "", CCGetRequestParam("SUBSCRIPTION_NAME", ccsGet, NULL), $this);
        $this->CURRENCY_CODE = & new clsControl(ccsLabel, "CURRENCY_CODE", "CURRENCY_CODE", ccsText, "", CCGetRequestParam("CURRENCY_CODE", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "verification_bill_ticket.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "verification_bill_ticket.php";
        $this->SERVICE_TYPE_CODE = & new clsControl(ccsLabel, "SERVICE_TYPE_CODE", "SERVICE_TYPE_CODE", ccsText, "", CCGetRequestParam("SERVICE_TYPE_CODE", ccsGet, NULL), $this);
        $this->SERVICE_NO = & new clsControl(ccsLabel, "SERVICE_NO", "SERVICE_NO", ccsText, "", CCGetRequestParam("SERVICE_NO", ccsGet, NULL), $this);
        $this->TICKET_DATE = & new clsControl(ccsLabel, "TICKET_DATE", "TICKET_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("TICKET_DATE", ccsGet, NULL), $this);
        $this->BILL_TICKET_CODE = & new clsControl(ccsLabel, "BILL_TICKET_CODE", "BILL_TICKET_CODE", ccsText, "", CCGetRequestParam("BILL_TICKET_CODE", ccsGet, NULL), $this);
        $this->TICKET_AMOUNT = & new clsControl(ccsLabel, "TICKET_AMOUNT", "TICKET_AMOUNT", ccsText, "", CCGetRequestParam("TICKET_AMOUNT", ccsGet, NULL), $this);
        $this->TICKET_REASON_CODE = & new clsControl(ccsLabel, "TICKET_REASON_CODE", "TICKET_REASON_CODE", ccsText, "", CCGetRequestParam("TICKET_REASON_CODE", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->T_BILL_TICKET_ID = & new clsControl(ccsHidden, "T_BILL_TICKET_ID", "T_BILL_TICKET_ID", ccsText, "", CCGetRequestParam("T_BILL_TICKET_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
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

//Show Method @2-E38FE438
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
            $this->ControlsVisible["SUBSCRIPTION_NAME"] = $this->SUBSCRIPTION_NAME->Visible;
            $this->ControlsVisible["CURRENCY_CODE"] = $this->CURRENCY_CODE->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["SERVICE_TYPE_CODE"] = $this->SERVICE_TYPE_CODE->Visible;
            $this->ControlsVisible["SERVICE_NO"] = $this->SERVICE_NO->Visible;
            $this->ControlsVisible["TICKET_DATE"] = $this->TICKET_DATE->Visible;
            $this->ControlsVisible["BILL_TICKET_CODE"] = $this->BILL_TICKET_CODE->Visible;
            $this->ControlsVisible["TICKET_AMOUNT"] = $this->TICKET_AMOUNT->Visible;
            $this->ControlsVisible["TICKET_REASON_CODE"] = $this->TICKET_REASON_CODE->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["T_BILL_TICKET_ID"] = $this->T_BILL_TICKET_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->SUBSCRIPTION_NAME->SetValue($this->DataSource->SUBSCRIPTION_NAME->GetValue());
                $this->CURRENCY_CODE->SetValue($this->DataSource->CURRENCY_CODE->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "T_BILL_TICKET_ID", $this->DataSource->f("T_BILL_TICKET_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "T_BILL_TICKET_ID", $this->DataSource->f("T_BILL_TICKET_ID"));
                $this->SERVICE_TYPE_CODE->SetValue($this->DataSource->SERVICE_TYPE_CODE->GetValue());
                $this->SERVICE_NO->SetValue($this->DataSource->SERVICE_NO->GetValue());
                $this->TICKET_DATE->SetValue($this->DataSource->TICKET_DATE->GetValue());
                $this->BILL_TICKET_CODE->SetValue($this->DataSource->BILL_TICKET_CODE->GetValue());
                $this->TICKET_AMOUNT->SetValue($this->DataSource->TICKET_AMOUNT->GetValue());
                $this->TICKET_REASON_CODE->SetValue($this->DataSource->TICKET_REASON_CODE->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->T_BILL_TICKET_ID->SetValue($this->DataSource->T_BILL_TICKET_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->SUBSCRIPTION_NAME->Show();
                $this->CURRENCY_CODE->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->SERVICE_TYPE_CODE->Show();
                $this->SERVICE_NO->Show();
                $this->TICKET_DATE->Show();
                $this->BILL_TICKET_CODE->Show();
                $this->TICKET_AMOUNT->Show();
                $this->TICKET_REASON_CODE->Show();
                $this->DESCRIPTION->Show();
                $this->T_BILL_TICKET_ID->Show();
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
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-2A3D467D
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->SUBSCRIPTION_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CURRENCY_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_TYPE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_NO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TICKET_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_TICKET_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TICKET_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TICKET_REASON_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->T_BILL_TICKET_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End ENTRY_BILL_TICKET Class @2-FCB6E20C

class clsENTRY_BILL_TICKETDataSource extends clsDBConn {  //ENTRY_BILL_TICKETDataSource Class @2-BBDBA4F3

//DataSource Variables @2-29A28E3E
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $SUBSCRIPTION_NAME;
    var $CURRENCY_CODE;
    var $DLink;
    var $ADLink;
    var $SERVICE_TYPE_CODE;
    var $SERVICE_NO;
    var $TICKET_DATE;
    var $BILL_TICKET_CODE;
    var $TICKET_AMOUNT;
    var $TICKET_REASON_CODE;
    var $DESCRIPTION;
    var $T_BILL_TICKET_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-1956BFF8
    function clsENTRY_BILL_TICKETDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid ENTRY_BILL_TICKET";
        $this->Initialize();
        $this->SUBSCRIPTION_NAME = new clsField("SUBSCRIPTION_NAME", ccsText, "");
        
        $this->CURRENCY_CODE = new clsField("CURRENCY_CODE", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->SERVICE_TYPE_CODE = new clsField("SERVICE_TYPE_CODE", ccsText, "");
        
        $this->SERVICE_NO = new clsField("SERVICE_NO", ccsText, "");
        
        $this->TICKET_DATE = new clsField("TICKET_DATE", ccsDate, $this->DateFormat);
        
        $this->BILL_TICKET_CODE = new clsField("BILL_TICKET_CODE", ccsText, "");
        
        $this->TICKET_AMOUNT = new clsField("TICKET_AMOUNT", ccsText, "");
        
        $this->TICKET_REASON_CODE = new clsField("TICKET_REASON_CODE", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->T_BILL_TICKET_ID = new clsField("T_BILL_TICKET_ID", ccsText, "");
        

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

//Open Method @2-A5F8997F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT *\n" .
        "FROM V_T_BILL_TICKET\n" .
        "WHERE VERIFICATION_DATE IS NULL AND (UPPER(to_char(TICKET_DATE,'dd-MON-yyyy')) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(SERVICE_NO) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(SERVICE_TYPE_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(SUBSCRIPTION_NAME) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(BILL_TICKET_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(CURRENCY_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(TICKET_AMOUNT) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(TICKET_REASON_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(DESCRIPTION) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'))) cnt";
        $this->SQL = "SELECT *\n" .
        "FROM V_T_BILL_TICKET\n" .
        "WHERE VERIFICATION_DATE IS NULL AND (UPPER(to_char(TICKET_DATE,'dd-MON-yyyy')) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(SERVICE_NO) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(SERVICE_TYPE_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(SUBSCRIPTION_NAME) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(BILL_TICKET_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(CURRENCY_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(TICKET_AMOUNT) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(TICKET_REASON_CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "	UPPER(DESCRIPTION) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'))";
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

//SetValues Method @2-2E87BC67
    function SetValues()
    {
        $this->SUBSCRIPTION_NAME->SetDBValue($this->f("SUBSCRIPTION_NAME"));
        $this->CURRENCY_CODE->SetDBValue($this->f("CURRENCY_CODE"));
        $this->DLink->SetDBValue($this->f("T_BILL_TICKET_ID"));
        $this->ADLink->SetDBValue($this->f("T_BILL_TICKET_ID"));
        $this->SERVICE_TYPE_CODE->SetDBValue($this->f("SERVICE_TYPE_CODE"));
        $this->SERVICE_NO->SetDBValue($this->f("SERVICE_NO"));
        $this->TICKET_DATE->SetDBValue(trim($this->f("TICKET_DATE")));
        $this->BILL_TICKET_CODE->SetDBValue($this->f("BILL_TICKET_CODE"));
        $this->TICKET_AMOUNT->SetDBValue($this->f("TICKET_AMOUNT"));
        $this->TICKET_REASON_CODE->SetDBValue($this->f("TICKET_REASON_CODE"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->T_BILL_TICKET_ID->SetDBValue($this->f("T_BILL_TICKET_ID"));
    }
//End SetValues Method

} //End ENTRY_BILL_TICKETDataSource Class @2-FCB6E20C

class clsRecordBATCHSearch { //BATCHSearch Class @3-B294D957

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

//Class_Initialize Event @3-CC07DCAF
    function clsRecordBATCHSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record BATCHSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "BATCHSearch";
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

//Operation Method @3-81DBF04E
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
        $Redirect = "verification_bill_ticket.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "verification_bill_ticket.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y", "TAMBAH", "BATCH_CONTROL_ID")));
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

} //End BATCHSearch Class @3-FCB6E20C

class clsRecordBATCH1 { //BATCH1 Class @19-1A4B4429

//Variables @19-D6FF3E86

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

//Class_Initialize Event @19-7151225A
    function clsRecordBATCH1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record BATCH1/Error";
        $this->DataSource = new clsBATCH1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "BATCH1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->SUBSCRIPTION_NAME = & new clsControl(ccsTextBox, "SUBSCRIPTION_NAME", "KETERANGAN", ccsText, "", CCGetRequestParam("SUBSCRIPTION_NAME", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->SERVICE_NO = & new clsControl(ccsTextBox, "SERVICE_NO", "Direktori File", ccsText, "", CCGetRequestParam("SERVICE_NO", $Method, NULL), $this);
            $this->TICKET_DATE = & new clsControl(ccsTextBox, "TICKET_DATE", "TICKET_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("TICKET_DATE", $Method, NULL), $this);
            $this->TICKET_DATE->Required = true;
            $this->T_BILL_TICKET_ID = & new clsControl(ccsTextBox, "T_BILL_TICKET_ID", "T_BILL_TICKET_ID", ccsFloat, "", CCGetRequestParam("T_BILL_TICKET_ID", $Method, NULL), $this);
            $this->INPUT_DATA_CONTROL_ID = & new clsControl(ccsHidden, "INPUT_DATA_CONTROL_ID", "INPUT_DATA_CONTROL_ID", ccsText, "", CCGetRequestParam("INPUT_DATA_CONTROL_ID", $Method, NULL), $this);
            $this->TICKET_AMOUNT = & new clsControl(ccsTextBox, "TICKET_AMOUNT", "TICKET_AMOUNT", ccsFloat, "", CCGetRequestParam("TICKET_AMOUNT", $Method, NULL), $this);
            $this->TICKET_REASON_ID = & new clsControl(ccsHidden, "TICKET_REASON_ID", "TICKET_REASON_ID", ccsFloat, "", CCGetRequestParam("TICKET_REASON_ID", $Method, NULL), $this);
            $this->TICKET_REASON_CODE = & new clsControl(ccsTextBox, "TICKET_REASON_CODE", "TICKET_REASON_CODE", ccsText, "", CCGetRequestParam("TICKET_REASON_CODE", $Method, NULL), $this);
            $this->BILL_TICKET_CODE = & new clsControl(ccsTextBox, "BILL_TICKET_CODE", "BILL_TICKET_CODE", ccsText, "", CCGetRequestParam("BILL_TICKET_CODE", $Method, NULL), $this);
            $this->CURRENCY_CODE = & new clsControl(ccsTextBox, "CURRENCY_CODE", "CURRENCY_CODE", ccsText, "", CCGetRequestParam("CURRENCY_CODE", $Method, NULL), $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE_BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->SERVICE_TYPE_CODE = & new clsControl(ccsTextBox, "SERVICE_TYPE_CODE", "SERVICE_TYPE_CODE", ccsText, "", CCGetRequestParam("SERVICE_TYPE_CODE", $Method, NULL), $this);
            $this->SUBSCRIBER_ID = & new clsControl(ccsHidden, "SUBSCRIBER_ID", "SUBSCRIBER_ID", ccsFloat, "", CCGetRequestParam("SUBSCRIBER_ID", $Method, NULL), $this);
            $this->P_TICKET_COMPONENT_ID = & new clsControl(ccsHidden, "P_TICKET_COMPONENT_ID", "P_TICKET_COMPONENT_ID", ccsFloat, "", CCGetRequestParam("P_TICKET_COMPONENT_ID", $Method, NULL), $this);
            $this->P_CURRENCY_ID = & new clsControl(ccsHidden, "P_CURRENCY_ID", "P_CURRENCY_ID", ccsText, "", CCGetRequestParam("P_CURRENCY_ID", $Method, NULL), $this);
            $this->IS_OK = & new clsControl(ccsListBox, "IS_OK", "IS_OK", ccsText, "", CCGetRequestParam("IS_OK", $Method, NULL), $this);
            $this->IS_OK->DSType = dsListOfValues;
            $this->IS_OK->Values = array(array("Y", "YES"), array("N", "NO"));
            $this->FINAL_AMOUNT = & new clsControl(ccsTextBox, "FINAL_AMOUNT", "FINAL_AMOUNT", ccsFloat, "", CCGetRequestParam("FINAL_AMOUNT", $Method, NULL), $this);
            $this->FINAL_AMOUNT->Required = true;
            $this->Label1 = & new clsControl(ccsLabel, "Label1", "Label1", ccsText, "", CCGetRequestParam("Label1", $Method, NULL), $this);
            $this->Label1->HTML = true;
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @19-DDB089A1
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlT_BILL_TICKET_ID"] = CCGetFromGet("T_BILL_TICKET_ID", NULL);
    }
//End Initialize Method

//Validate Method @19-5B744F8D
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->SUBSCRIPTION_NAME->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->SERVICE_NO->Validate() && $Validation);
        $Validation = ($this->TICKET_DATE->Validate() && $Validation);
        $Validation = ($this->T_BILL_TICKET_ID->Validate() && $Validation);
        $Validation = ($this->INPUT_DATA_CONTROL_ID->Validate() && $Validation);
        $Validation = ($this->TICKET_AMOUNT->Validate() && $Validation);
        $Validation = ($this->TICKET_REASON_ID->Validate() && $Validation);
        $Validation = ($this->TICKET_REASON_CODE->Validate() && $Validation);
        $Validation = ($this->BILL_TICKET_CODE->Validate() && $Validation);
        $Validation = ($this->CURRENCY_CODE->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->SERVICE_TYPE_CODE->Validate() && $Validation);
        $Validation = ($this->SUBSCRIBER_ID->Validate() && $Validation);
        $Validation = ($this->P_TICKET_COMPONENT_ID->Validate() && $Validation);
        $Validation = ($this->P_CURRENCY_ID->Validate() && $Validation);
        $Validation = ($this->IS_OK->Validate() && $Validation);
        $Validation = ($this->FINAL_AMOUNT->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->SUBSCRIPTION_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SERVICE_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TICKET_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->T_BILL_TICKET_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->INPUT_DATA_CONTROL_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TICKET_AMOUNT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TICKET_REASON_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TICKET_REASON_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILL_TICKET_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CURRENCY_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SERVICE_TYPE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SUBSCRIBER_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_TICKET_COMPONENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CURRENCY_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_OK->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FINAL_AMOUNT->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @19-11844340
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->SUBSCRIPTION_NAME->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->SERVICE_NO->Errors->Count());
        $errors = ($errors || $this->TICKET_DATE->Errors->Count());
        $errors = ($errors || $this->T_BILL_TICKET_ID->Errors->Count());
        $errors = ($errors || $this->INPUT_DATA_CONTROL_ID->Errors->Count());
        $errors = ($errors || $this->TICKET_AMOUNT->Errors->Count());
        $errors = ($errors || $this->TICKET_REASON_ID->Errors->Count());
        $errors = ($errors || $this->TICKET_REASON_CODE->Errors->Count());
        $errors = ($errors || $this->BILL_TICKET_CODE->Errors->Count());
        $errors = ($errors || $this->CURRENCY_CODE->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->SERVICE_TYPE_CODE->Errors->Count());
        $errors = ($errors || $this->SUBSCRIBER_ID->Errors->Count());
        $errors = ($errors || $this->P_TICKET_COMPONENT_ID->Errors->Count());
        $errors = ($errors || $this->P_CURRENCY_ID->Errors->Count());
        $errors = ($errors || $this->IS_OK->Errors->Count());
        $errors = ($errors || $this->FINAL_AMOUNT->Errors->Count());
        $errors = ($errors || $this->Label1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @19-ED598703
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

//Operation Method @19-17DC9883
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

//InsertRow Method @19-D06563F2
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->T_BILL_TICKET_ID->SetValue($this->T_BILL_TICKET_ID->GetValue(true));
        $this->DataSource->TICKET_DATE->SetValue($this->TICKET_DATE->GetValue(true));
        $this->DataSource->SUBSCRIBER_ID->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        $this->DataSource->P_TICKET_COMPONENT_ID->SetValue($this->P_TICKET_COMPONENT_ID->GetValue(true));
        $this->DataSource->P_CURRENCY_ID->SetValue($this->P_CURRENCY_ID->GetValue(true));
        $this->DataSource->TICKET_AMOUNT->SetValue($this->TICKET_AMOUNT->GetValue(true));
        $this->DataSource->TICKET_REASON_ID->SetValue($this->TICKET_REASON_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @19-5AAE8EC1
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->TICKET_DATE->SetValue($this->TICKET_DATE->GetValue(true));
        $this->DataSource->SUBSCRIBER_ID->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        $this->DataSource->P_TICKET_COMPONENT_ID->SetValue($this->P_TICKET_COMPONENT_ID->GetValue(true));
        $this->DataSource->P_CURRENCY_ID->SetValue($this->P_CURRENCY_ID->GetValue(true));
        $this->DataSource->TICKET_AMOUNT->SetValue($this->TICKET_AMOUNT->GetValue(true));
        $this->DataSource->TICKET_REASON_ID->SetValue($this->TICKET_REASON_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->T_BILL_TICKET_ID->SetValue($this->T_BILL_TICKET_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @19-9FD5FB45
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->T_BILL_TICKET_ID->SetValue($this->T_BILL_TICKET_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @19-B4A18A48
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

        $this->IS_OK->Prepare();

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
                    $this->SUBSCRIPTION_NAME->SetValue($this->DataSource->SUBSCRIPTION_NAME->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->SERVICE_NO->SetValue($this->DataSource->SERVICE_NO->GetValue());
                    $this->TICKET_DATE->SetValue($this->DataSource->TICKET_DATE->GetValue());
                    $this->T_BILL_TICKET_ID->SetValue($this->DataSource->T_BILL_TICKET_ID->GetValue());
                    $this->INPUT_DATA_CONTROL_ID->SetValue($this->DataSource->INPUT_DATA_CONTROL_ID->GetValue());
                    $this->TICKET_AMOUNT->SetValue($this->DataSource->TICKET_AMOUNT->GetValue());
                    $this->TICKET_REASON_ID->SetValue($this->DataSource->TICKET_REASON_ID->GetValue());
                    $this->TICKET_REASON_CODE->SetValue($this->DataSource->TICKET_REASON_CODE->GetValue());
                    $this->BILL_TICKET_CODE->SetValue($this->DataSource->BILL_TICKET_CODE->GetValue());
                    $this->CURRENCY_CODE->SetValue($this->DataSource->CURRENCY_CODE->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->SERVICE_TYPE_CODE->SetValue($this->DataSource->SERVICE_TYPE_CODE->GetValue());
                    $this->SUBSCRIBER_ID->SetValue($this->DataSource->SUBSCRIBER_ID->GetValue());
                    $this->P_TICKET_COMPONENT_ID->SetValue($this->DataSource->P_TICKET_COMPONENT_ID->GetValue());
                    $this->P_CURRENCY_ID->SetValue($this->DataSource->P_CURRENCY_ID->GetValue());
                    $this->IS_OK->SetValue($this->DataSource->IS_OK->GetValue());
                    $this->FINAL_AMOUNT->SetValue($this->DataSource->FINAL_AMOUNT->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->SUBSCRIPTION_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SERVICE_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TICKET_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->T_BILL_TICKET_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INPUT_DATA_CONTROL_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TICKET_AMOUNT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TICKET_REASON_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TICKET_REASON_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILL_TICKET_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CURRENCY_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SERVICE_TYPE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SUBSCRIBER_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_TICKET_COMPONENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CURRENCY_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_OK->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FINAL_AMOUNT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Label1->Errors->ToString());
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

        $this->SUBSCRIPTION_NAME->Show();
        $this->UPDATE_DATE->Show();
        $this->SERVICE_NO->Show();
        $this->TICKET_DATE->Show();
        $this->T_BILL_TICKET_ID->Show();
        $this->INPUT_DATA_CONTROL_ID->Show();
        $this->TICKET_AMOUNT->Show();
        $this->TICKET_REASON_ID->Show();
        $this->TICKET_REASON_CODE->Show();
        $this->BILL_TICKET_CODE->Show();
        $this->CURRENCY_CODE->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_BY->Show();
        $this->SERVICE_TYPE_CODE->Show();
        $this->SUBSCRIBER_ID->Show();
        $this->P_TICKET_COMPONENT_ID->Show();
        $this->P_CURRENCY_ID->Show();
        $this->IS_OK->Show();
        $this->FINAL_AMOUNT->Show();
        $this->Label1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End BATCH1 Class @19-FCB6E20C

class clsBATCH1DataSource extends clsDBConn {  //BATCH1DataSource Class @19-3A2922BC

//DataSource Variables @19-25308BA9
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
    var $SUBSCRIPTION_NAME;
    var $UPDATE_DATE;
    var $SERVICE_NO;
    var $TICKET_DATE;
    var $T_BILL_TICKET_ID;
    var $INPUT_DATA_CONTROL_ID;
    var $TICKET_AMOUNT;
    var $TICKET_REASON_ID;
    var $TICKET_REASON_CODE;
    var $BILL_TICKET_CODE;
    var $CURRENCY_CODE;
    var $DESCRIPTION;
    var $UPDATE_BY;
    var $SERVICE_TYPE_CODE;
    var $SUBSCRIBER_ID;
    var $P_TICKET_COMPONENT_ID;
    var $P_CURRENCY_ID;
    var $IS_OK;
    var $FINAL_AMOUNT;
    var $Label1;
//End DataSource Variables

//DataSourceClass_Initialize Event @19-F8669FE6
    function clsBATCH1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record BATCH1/Error";
        $this->Initialize();
        $this->SUBSCRIPTION_NAME = new clsField("SUBSCRIPTION_NAME", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->SERVICE_NO = new clsField("SERVICE_NO", ccsText, "");
        
        $this->TICKET_DATE = new clsField("TICKET_DATE", ccsDate, $this->DateFormat);
        
        $this->T_BILL_TICKET_ID = new clsField("T_BILL_TICKET_ID", ccsFloat, "");
        
        $this->INPUT_DATA_CONTROL_ID = new clsField("INPUT_DATA_CONTROL_ID", ccsText, "");
        
        $this->TICKET_AMOUNT = new clsField("TICKET_AMOUNT", ccsFloat, "");
        
        $this->TICKET_REASON_ID = new clsField("TICKET_REASON_ID", ccsFloat, "");
        
        $this->TICKET_REASON_CODE = new clsField("TICKET_REASON_CODE", ccsText, "");
        
        $this->BILL_TICKET_CODE = new clsField("BILL_TICKET_CODE", ccsText, "");
        
        $this->CURRENCY_CODE = new clsField("CURRENCY_CODE", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->SERVICE_TYPE_CODE = new clsField("SERVICE_TYPE_CODE", ccsText, "");
        
        $this->SUBSCRIBER_ID = new clsField("SUBSCRIBER_ID", ccsFloat, "");
        
        $this->P_TICKET_COMPONENT_ID = new clsField("P_TICKET_COMPONENT_ID", ccsFloat, "");
        
        $this->P_CURRENCY_ID = new clsField("P_CURRENCY_ID", ccsText, "");
        
        $this->IS_OK = new clsField("IS_OK", ccsText, "");
        
        $this->FINAL_AMOUNT = new clsField("FINAL_AMOUNT", ccsFloat, "");
        
        $this->Label1 = new clsField("Label1", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @19-87913AD2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlT_BILL_TICKET_ID", ccsFloat, "", "", $this->Parameters["urlT_BILL_TICKET_ID"], 0, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @19-D37AC69E
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT   *\n" .
        "FROM V_T_BILL_TICKET\n" .
        "WHERE T_BILL_TICKET_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @19-4434D19C
    function SetValues()
    {
        $this->SUBSCRIPTION_NAME->SetDBValue($this->f("SUBSCRIPTION_NAME"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->SERVICE_NO->SetDBValue($this->f("SERVICE_NO"));
        $this->TICKET_DATE->SetDBValue(trim($this->f("TICKET_DATE")));
        $this->T_BILL_TICKET_ID->SetDBValue(trim($this->f("T_BILL_TICKET_ID")));
        $this->INPUT_DATA_CONTROL_ID->SetDBValue($this->f("INPUT_DATA_CONTROL_ID"));
        $this->TICKET_AMOUNT->SetDBValue(trim($this->f("TICKET_AMOUNT")));
        $this->TICKET_REASON_ID->SetDBValue(trim($this->f("TICKET_REASON_ID")));
        $this->TICKET_REASON_CODE->SetDBValue($this->f("TICKET_REASON_CODE"));
        $this->BILL_TICKET_CODE->SetDBValue($this->f("BILL_TICKET_CODE"));
        $this->CURRENCY_CODE->SetDBValue($this->f("CURRENCY_CODE"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->SERVICE_TYPE_CODE->SetDBValue($this->f("SERVICE_TYPE_CODE"));
        $this->SUBSCRIBER_ID->SetDBValue(trim($this->f("SUBSCRIBER_ID")));
        $this->P_TICKET_COMPONENT_ID->SetDBValue(trim($this->f("P_TICKET_COMPONENT_ID")));
        $this->P_CURRENCY_ID->SetDBValue($this->f("P_CURRENCY_ID"));
        $this->IS_OK->SetDBValue($this->f("IS_OK"));
        $this->FINAL_AMOUNT->SetDBValue(trim($this->f("FINAL_AMOUNT")));
    }
//End SetValues Method

//Insert Method @19-F6D9DE82
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["T_BILL_TICKET_ID"] = new clsSQLParameter("ctrlT_BILL_TICKET_ID", ccsFloat, "", "", $this->T_BILL_TICKET_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["TICKET_DATE"] = new clsSQLParameter("ctrlTICKET_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TICKET_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUBSCRIBER_ID"] = new clsSQLParameter("ctrlSUBSCRIBER_ID", ccsFloat, "", "", $this->SUBSCRIBER_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_TICKET_COMPONENT_ID"] = new clsSQLParameter("ctrlP_TICKET_COMPONENT_ID", ccsFloat, "", "", $this->P_TICKET_COMPONENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_CURRENCY_ID"] = new clsSQLParameter("ctrlP_CURRENCY_ID", ccsFloat, "", "", $this->P_CURRENCY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["TICKET_AMOUNT"] = new clsSQLParameter("ctrlTICKET_AMOUNT", ccsFloat, "", "", $this->TICKET_AMOUNT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["TICKET_REASON_ID"] = new clsSQLParameter("ctrlTICKET_REASON_ID", ccsFloat, "", "", $this->TICKET_REASON_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["T_BILL_TICKET_ID"]->GetValue()) and !strlen($this->cp["T_BILL_TICKET_ID"]->GetText()) and !is_bool($this->cp["T_BILL_TICKET_ID"]->GetValue())) 
            $this->cp["T_BILL_TICKET_ID"]->SetValue($this->T_BILL_TICKET_ID->GetValue(true));
        if (!strlen($this->cp["T_BILL_TICKET_ID"]->GetText()) and !is_bool($this->cp["T_BILL_TICKET_ID"]->GetValue(true))) 
            $this->cp["T_BILL_TICKET_ID"]->SetText(0);
        if (!is_null($this->cp["TICKET_DATE"]->GetValue()) and !strlen($this->cp["TICKET_DATE"]->GetText()) and !is_bool($this->cp["TICKET_DATE"]->GetValue())) 
            $this->cp["TICKET_DATE"]->SetValue($this->TICKET_DATE->GetValue(true));
        if (!strlen($this->cp["TICKET_DATE"]->GetText()) and !is_bool($this->cp["TICKET_DATE"]->GetValue(true))) 
            $this->cp["TICKET_DATE"]->SetText("");
        if (!is_null($this->cp["SUBSCRIBER_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIBER_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_ID"]->GetValue())) 
            $this->cp["SUBSCRIBER_ID"]->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        if (!strlen($this->cp["SUBSCRIBER_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_ID"]->GetValue(true))) 
            $this->cp["SUBSCRIBER_ID"]->SetText(0);
        if (!is_null($this->cp["P_TICKET_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_TICKET_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_TICKET_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_TICKET_COMPONENT_ID"]->SetValue($this->P_TICKET_COMPONENT_ID->GetValue(true));
        if (!strlen($this->cp["P_TICKET_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_TICKET_COMPONENT_ID"]->GetValue(true))) 
            $this->cp["P_TICKET_COMPONENT_ID"]->SetText(0);
        if (!is_null($this->cp["P_CURRENCY_ID"]->GetValue()) and !strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue())) 
            $this->cp["P_CURRENCY_ID"]->SetValue($this->P_CURRENCY_ID->GetValue(true));
        if (!strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue(true))) 
            $this->cp["P_CURRENCY_ID"]->SetText(0);
        if (!is_null($this->cp["TICKET_AMOUNT"]->GetValue()) and !strlen($this->cp["TICKET_AMOUNT"]->GetText()) and !is_bool($this->cp["TICKET_AMOUNT"]->GetValue())) 
            $this->cp["TICKET_AMOUNT"]->SetValue($this->TICKET_AMOUNT->GetValue(true));
        if (!strlen($this->cp["TICKET_AMOUNT"]->GetText()) and !is_bool($this->cp["TICKET_AMOUNT"]->GetValue(true))) 
            $this->cp["TICKET_AMOUNT"]->SetText(0);
        if (!is_null($this->cp["TICKET_REASON_ID"]->GetValue()) and !strlen($this->cp["TICKET_REASON_ID"]->GetText()) and !is_bool($this->cp["TICKET_REASON_ID"]->GetValue())) 
            $this->cp["TICKET_REASON_ID"]->SetValue($this->TICKET_REASON_ID->GetValue(true));
        if (!strlen($this->cp["TICKET_REASON_ID"]->GetText()) and !is_bool($this->cp["TICKET_REASON_ID"]->GetValue(true))) 
            $this->cp["TICKET_REASON_ID"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        $this->SQL = "/* Formatted on 29/10/2014 08:35:03 (QP5 v5.139.911.3011) */\n" .
        "INSERT INTO T_BILL_TICKET (T_BILL_TICKET_ID,\n" .
        "                           TICKET_DATE,\n" .
        "                           SUBSCRIBER_ID,\n" .
        "                           P_TICKET_COMPONENT_ID,\n" .
        "                           P_CURRENCY_ID,\n" .
        "                           TICKET_AMOUNT,\n" .
        "                           TICKET_REASON_ID,\n" .
        "                           DESCRIPTION,\n" .
        "                           FINAL_AMOUNT,\n" .
        "                           IS_OK,\n" .
        "                           VERIFICATION_DATE,\n" .
        "                           VERIFIED_BY,\n" .
        "                           INVOICE_DATE,\n" .
        "                           UPDATE_DATE,\n" .
        "                           UPDATE_BY,\n" .
        "                           INPUT_DATA_CONTROL_ID,\n" .
        "                           JOB_CONTROL_ID)\n" .
        "     VALUES (GENERATE_ID('BILLDB','T_BILL_TICKET', 'T_BILL_TICKET_ID'),\n" .
        "        to_date(substr('" . $this->SQLValue($this->cp["TICKET_DATE"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "        " . $this->SQLValue($this->cp["SUBSCRIBER_ID"]->GetDBValue(), ccsFloat) . ", " . $this->SQLValue($this->cp["P_TICKET_COMPONENT_ID"]->GetDBValue(), ccsFloat) . ", " . $this->SQLValue($this->cp["P_CURRENCY_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "        " . $this->SQLValue($this->cp["TICKET_AMOUNT"]->GetDBValue(), ccsFloat) . ", " . $this->SQLValue($this->cp["TICKET_REASON_ID"]->GetDBValue(), ccsFloat) . ", '" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "', NULL, \n" .
        "        NULL, NULL, NULL, NULL, SYSDATE, '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "', NULL, NULL)";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @19-D2EC3C1D
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["TICKET_DATE"] = new clsSQLParameter("ctrlTICKET_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TICKET_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["SUBSCRIBER_ID"] = new clsSQLParameter("ctrlSUBSCRIBER_ID", ccsFloat, "", "", $this->SUBSCRIBER_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_TICKET_COMPONENT_ID"] = new clsSQLParameter("ctrlP_TICKET_COMPONENT_ID", ccsFloat, "", "", $this->P_TICKET_COMPONENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_CURRENCY_ID"] = new clsSQLParameter("ctrlP_CURRENCY_ID", ccsFloat, "", "", $this->P_CURRENCY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["TICKET_AMOUNT"] = new clsSQLParameter("ctrlTICKET_AMOUNT", ccsFloat, "", "", $this->TICKET_AMOUNT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["TICKET_REASON_ID"] = new clsSQLParameter("ctrlTICKET_REASON_ID", ccsFloat, "", "", $this->TICKET_REASON_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["T_BILL_TICKET_ID"] = new clsSQLParameter("ctrlT_BILL_TICKET_ID", ccsFloat, "", "", $this->T_BILL_TICKET_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["TICKET_DATE"]->GetValue()) and !strlen($this->cp["TICKET_DATE"]->GetText()) and !is_bool($this->cp["TICKET_DATE"]->GetValue())) 
            $this->cp["TICKET_DATE"]->SetValue($this->TICKET_DATE->GetValue(true));
        if (!strlen($this->cp["TICKET_DATE"]->GetText()) and !is_bool($this->cp["TICKET_DATE"]->GetValue(true))) 
            $this->cp["TICKET_DATE"]->SetText("");
        if (!is_null($this->cp["SUBSCRIBER_ID"]->GetValue()) and !strlen($this->cp["SUBSCRIBER_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_ID"]->GetValue())) 
            $this->cp["SUBSCRIBER_ID"]->SetValue($this->SUBSCRIBER_ID->GetValue(true));
        if (!strlen($this->cp["SUBSCRIBER_ID"]->GetText()) and !is_bool($this->cp["SUBSCRIBER_ID"]->GetValue(true))) 
            $this->cp["SUBSCRIBER_ID"]->SetText(0);
        if (!is_null($this->cp["P_TICKET_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_TICKET_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_TICKET_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_TICKET_COMPONENT_ID"]->SetValue($this->P_TICKET_COMPONENT_ID->GetValue(true));
        if (!strlen($this->cp["P_TICKET_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_TICKET_COMPONENT_ID"]->GetValue(true))) 
            $this->cp["P_TICKET_COMPONENT_ID"]->SetText(0);
        if (!is_null($this->cp["P_CURRENCY_ID"]->GetValue()) and !strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue())) 
            $this->cp["P_CURRENCY_ID"]->SetValue($this->P_CURRENCY_ID->GetValue(true));
        if (!strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue(true))) 
            $this->cp["P_CURRENCY_ID"]->SetText(0);
        if (!is_null($this->cp["TICKET_AMOUNT"]->GetValue()) and !strlen($this->cp["TICKET_AMOUNT"]->GetText()) and !is_bool($this->cp["TICKET_AMOUNT"]->GetValue())) 
            $this->cp["TICKET_AMOUNT"]->SetValue($this->TICKET_AMOUNT->GetValue(true));
        if (!strlen($this->cp["TICKET_AMOUNT"]->GetText()) and !is_bool($this->cp["TICKET_AMOUNT"]->GetValue(true))) 
            $this->cp["TICKET_AMOUNT"]->SetText(0);
        if (!is_null($this->cp["TICKET_REASON_ID"]->GetValue()) and !strlen($this->cp["TICKET_REASON_ID"]->GetText()) and !is_bool($this->cp["TICKET_REASON_ID"]->GetValue())) 
            $this->cp["TICKET_REASON_ID"]->SetValue($this->TICKET_REASON_ID->GetValue(true));
        if (!strlen($this->cp["TICKET_REASON_ID"]->GetText()) and !is_bool($this->cp["TICKET_REASON_ID"]->GetValue(true))) 
            $this->cp["TICKET_REASON_ID"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["T_BILL_TICKET_ID"]->GetValue()) and !strlen($this->cp["T_BILL_TICKET_ID"]->GetText()) and !is_bool($this->cp["T_BILL_TICKET_ID"]->GetValue())) 
            $this->cp["T_BILL_TICKET_ID"]->SetValue($this->T_BILL_TICKET_ID->GetValue(true));
        if (!strlen($this->cp["T_BILL_TICKET_ID"]->GetText()) and !is_bool($this->cp["T_BILL_TICKET_ID"]->GetValue(true))) 
            $this->cp["T_BILL_TICKET_ID"]->SetText(0);
        $this->SQL = "UPDATE T_BILL_TICKET\n" .
        "SET TICKET_DATE = to_date(substr('" . $this->SQLValue($this->cp["TICKET_DATE"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "       SUBSCRIBER_ID = " . $this->SQLValue($this->cp["SUBSCRIBER_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "       P_TICKET_COMPONENT_ID = " . $this->SQLValue($this->cp["P_TICKET_COMPONENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "       P_CURRENCY_ID = " . $this->SQLValue($this->cp["P_CURRENCY_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "       TICKET_AMOUNT = " . $this->SQLValue($this->cp["TICKET_AMOUNT"]->GetDBValue(), ccsFloat) . ",\n" .
        "       TICKET_REASON_ID = " . $this->SQLValue($this->cp["TICKET_REASON_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "       DESCRIPTION = '" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',\n" .
        "       UPDATE_DATE = SYSDATE,\n" .
        "       UPDATE_BY = '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE T_BILL_TICKET_ID = " . $this->SQLValue($this->cp["T_BILL_TICKET_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @19-5A90BE17
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["T_BILL_TICKET_ID"] = new clsSQLParameter("ctrlT_BILL_TICKET_ID", ccsFloat, "", "", $this->T_BILL_TICKET_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["T_BILL_TICKET_ID"]->GetValue()) and !strlen($this->cp["T_BILL_TICKET_ID"]->GetText()) and !is_bool($this->cp["T_BILL_TICKET_ID"]->GetValue())) 
            $this->cp["T_BILL_TICKET_ID"]->SetValue($this->T_BILL_TICKET_ID->GetValue(true));
        if (!strlen($this->cp["T_BILL_TICKET_ID"]->GetText()) and !is_bool($this->cp["T_BILL_TICKET_ID"]->GetValue(true))) 
            $this->cp["T_BILL_TICKET_ID"]->SetText(0);
        $this->SQL = "DELETE FROM T_BILL_TICKET\n" .
        "WHERE T_BILL_TICKET_ID = " . $this->SQLValue($this->cp["T_BILL_TICKET_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End BATCH1DataSource Class @19-FCB6E20C

//Initialize Page @1-D3BCF973
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
$TemplateFileName = "verification_bill_ticket.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-8034858C
include_once("./verification_bill_ticket_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-5DA71607
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$ENTRY_BILL_TICKET = & new clsGridENTRY_BILL_TICKET("", $MainPage);
$BATCHSearch = & new clsRecordBATCHSearch("", $MainPage);
$BATCH1 = & new clsRecordBATCH1("", $MainPage);
$MainPage->ENTRY_BILL_TICKET = & $ENTRY_BILL_TICKET;
$MainPage->BATCHSearch = & $BATCHSearch;
$MainPage->BATCH1 = & $BATCH1;
$ENTRY_BILL_TICKET->Initialize();
$BATCH1->Initialize();

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

//Execute Components @1-3077A6AB
$BATCHSearch->Operation();
$BATCH1->Operation();
//End Execute Components

//Go to destination page @1-50DBCCA4
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($ENTRY_BILL_TICKET);
    unset($BATCHSearch);
    unset($BATCH1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-45B536F6
$ENTRY_BILL_TICKET->Show();
$BATCHSearch->Show();
$BATCH1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-680BBDE9
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($ENTRY_BILL_TICKET);
unset($BATCHSearch);
unset($BATCH1);
unset($Tpl);
//End Unload Page


?>
