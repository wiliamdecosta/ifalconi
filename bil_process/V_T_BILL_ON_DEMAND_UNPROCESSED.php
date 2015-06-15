<?php
//Include Common Files @1-DAC5B1F5
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_process/");
define("FileName", "V_T_BILL_ON_DEMAND_UNPROCESSED.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridV_T_BILL_ON_DEMAND_UNPROCESSEDGrid { //V_T_BILL_ON_DEMAND_UNPROCESSEDGrid class @282-B1A4B598

//Variables @282-AC1EDBB9

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

//Class_Initialize Event @282-F2036BE0
    function clsGridV_T_BILL_ON_DEMAND_UNPROCESSEDGrid($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "V_T_BILL_ON_DEMAND_UNPROCESSEDGrid";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid V_T_BILL_ON_DEMAND_UNPROCESSEDGrid";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsV_T_BILL_ON_DEMAND_UNPROCESSEDGridDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 15;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->SUBSCRIBER_ID = & new clsControl(ccsLabel, "SUBSCRIBER_ID", "SUBSCRIBER_ID", ccsText, "", CCGetRequestParam("SUBSCRIBER_ID", ccsGet, NULL), $this);
        $this->UPDATE_BY = & new clsControl(ccsLabel, "UPDATE_BY", "UPDATE_BY", ccsText, "", CCGetRequestParam("UPDATE_BY", ccsGet, NULL), $this);
        $this->REPORT_SEGMENT_CODE = & new clsControl(ccsLabel, "REPORT_SEGMENT_CODE", "REPORT_SEGMENT_CODE", ccsText, "", CCGetRequestParam("REPORT_SEGMENT_CODE", ccsGet, NULL), $this);
        $this->NEXT_BILL_DATE = & new clsControl(ccsLabel, "NEXT_BILL_DATE", "NEXT_BILL_DATE", ccsFloat, "", CCGetRequestParam("NEXT_BILL_DATE", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->UPDATE_DATE = & new clsControl(ccsLabel, "UPDATE_DATE", "UPDATE_DATE", ccsText, "", CCGetRequestParam("UPDATE_DATE", ccsGet, NULL), $this);
        $this->SUBSCRIPTION_NAME = & new clsControl(ccsLabel, "SUBSCRIPTION_NAME", "SUBSCRIPTION_NAME", ccsText, "", CCGetRequestParam("SUBSCRIPTION_NAME", ccsGet, NULL), $this);
        $this->SERVICE_NO = & new clsControl(ccsLabel, "SERVICE_NO", "SERVICE_NO", ccsText, "", CCGetRequestParam("SERVICE_NO", ccsGet, NULL), $this);
        $this->TRANSFER_DATE = & new clsControl(ccsLabel, "TRANSFER_DATE", "TRANSFER_DATE", ccsText, "", CCGetRequestParam("TRANSFER_DATE", ccsGet, NULL), $this);
        $this->START_BILL_DATE = & new clsControl(ccsLabel, "START_BILL_DATE", "START_BILL_DATE", ccsText, "", CCGetRequestParam("START_BILL_DATE", ccsGet, NULL), $this);
        $this->TARIFF_SCENARIO_CODE = & new clsControl(ccsLabel, "TARIFF_SCENARIO_CODE", "TARIFF_SCENARIO_CODE", ccsText, "", CCGetRequestParam("TARIFF_SCENARIO_CODE", ccsGet, NULL), $this);
        $this->BILL_CYCLE_CODE = & new clsControl(ccsLabel, "BILL_CYCLE_CODE", "BILL_CYCLE_CODE", ccsText, "", CCGetRequestParam("BILL_CYCLE_CODE", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @282-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @282-A2D6D850
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
            $this->ControlsVisible["SUBSCRIBER_ID"] = $this->SUBSCRIBER_ID->Visible;
            $this->ControlsVisible["UPDATE_BY"] = $this->UPDATE_BY->Visible;
            $this->ControlsVisible["REPORT_SEGMENT_CODE"] = $this->REPORT_SEGMENT_CODE->Visible;
            $this->ControlsVisible["NEXT_BILL_DATE"] = $this->NEXT_BILL_DATE->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["UPDATE_DATE"] = $this->UPDATE_DATE->Visible;
            $this->ControlsVisible["SUBSCRIPTION_NAME"] = $this->SUBSCRIPTION_NAME->Visible;
            $this->ControlsVisible["SERVICE_NO"] = $this->SERVICE_NO->Visible;
            $this->ControlsVisible["TRANSFER_DATE"] = $this->TRANSFER_DATE->Visible;
            $this->ControlsVisible["START_BILL_DATE"] = $this->START_BILL_DATE->Visible;
            $this->ControlsVisible["TARIFF_SCENARIO_CODE"] = $this->TARIFF_SCENARIO_CODE->Visible;
            $this->ControlsVisible["BILL_CYCLE_CODE"] = $this->BILL_CYCLE_CODE->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->SUBSCRIBER_ID->SetValue($this->DataSource->SUBSCRIBER_ID->GetValue());
                $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                $this->REPORT_SEGMENT_CODE->SetValue($this->DataSource->REPORT_SEGMENT_CODE->GetValue());
                $this->NEXT_BILL_DATE->SetValue($this->DataSource->NEXT_BILL_DATE->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                $this->SUBSCRIPTION_NAME->SetValue($this->DataSource->SUBSCRIPTION_NAME->GetValue());
                $this->SERVICE_NO->SetValue($this->DataSource->SERVICE_NO->GetValue());
                $this->TRANSFER_DATE->SetValue($this->DataSource->TRANSFER_DATE->GetValue());
                $this->START_BILL_DATE->SetValue($this->DataSource->START_BILL_DATE->GetValue());
                $this->TARIFF_SCENARIO_CODE->SetValue($this->DataSource->TARIFF_SCENARIO_CODE->GetValue());
                $this->BILL_CYCLE_CODE->SetValue($this->DataSource->BILL_CYCLE_CODE->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->SUBSCRIBER_ID->Show();
                $this->UPDATE_BY->Show();
                $this->REPORT_SEGMENT_CODE->Show();
                $this->NEXT_BILL_DATE->Show();
                $this->DESCRIPTION->Show();
                $this->UPDATE_DATE->Show();
                $this->SUBSCRIPTION_NAME->Show();
                $this->SERVICE_NO->Show();
                $this->TRANSFER_DATE->Show();
                $this->START_BILL_DATE->Show();
                $this->TARIFF_SCENARIO_CODE->Show();
                $this->BILL_CYCLE_CODE->Show();
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

//GetErrors Method @282-8267C941
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->SUBSCRIBER_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UPDATE_BY->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REPORT_SEGMENT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NEXT_BILL_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UPDATE_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SUBSCRIPTION_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_NO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TRANSFER_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->START_BILL_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TARIFF_SCENARIO_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_CYCLE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End V_T_BILL_ON_DEMAND_UNPROCESSEDGrid Class @282-FCB6E20C

class clsV_T_BILL_ON_DEMAND_UNPROCESSEDGridDataSource extends clsDBConn {  //V_T_BILL_ON_DEMAND_UNPROCESSEDGridDataSource Class @282-1C59A1D9

//DataSource Variables @282-73EC50E6
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $SUBSCRIBER_ID;
    var $UPDATE_BY;
    var $REPORT_SEGMENT_CODE;
    var $NEXT_BILL_DATE;
    var $DESCRIPTION;
    var $UPDATE_DATE;
    var $SUBSCRIPTION_NAME;
    var $SERVICE_NO;
    var $TRANSFER_DATE;
    var $START_BILL_DATE;
    var $TARIFF_SCENARIO_CODE;
    var $BILL_CYCLE_CODE;
//End DataSource Variables

//DataSourceClass_Initialize Event @282-D9737FA5
    function clsV_T_BILL_ON_DEMAND_UNPROCESSEDGridDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid V_T_BILL_ON_DEMAND_UNPROCESSEDGrid";
        $this->Initialize();
        $this->SUBSCRIBER_ID = new clsField("SUBSCRIBER_ID", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->REPORT_SEGMENT_CODE = new clsField("REPORT_SEGMENT_CODE", ccsText, "");
        
        $this->NEXT_BILL_DATE = new clsField("NEXT_BILL_DATE", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsText, "");
        
        $this->SUBSCRIPTION_NAME = new clsField("SUBSCRIPTION_NAME", ccsText, "");
        
        $this->SERVICE_NO = new clsField("SERVICE_NO", ccsText, "");
        
        $this->TRANSFER_DATE = new clsField("TRANSFER_DATE", ccsText, "");
        
        $this->START_BILL_DATE = new clsField("START_BILL_DATE", ccsText, "");
        
        $this->TARIFF_SCENARIO_CODE = new clsField("TARIFF_SCENARIO_CODE", ccsText, "");
        
        $this->BILL_CYCLE_CODE = new clsField("BILL_CYCLE_CODE", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @282-2A2A4857
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "SUBSCRIBER_ID";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @282-25AA94A2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
    }
//End Prepare Method

//Open Method @282-D639D433
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT\n" .
        "*\n" .
        "\n" .
        "FROM\n" .
        "V_T_BILL_ON_DEMAND\n" .
        "\n" .
        "WHERE\n" .
        "IS_BOD_GENERATED = 'N') cnt";
        $this->SQL = "SELECT\n" .
        "*\n" .
        "\n" .
        "FROM\n" .
        "V_T_BILL_ON_DEMAND\n" .
        "\n" .
        "WHERE\n" .
        "IS_BOD_GENERATED = 'N' {SQL_OrderBy}";
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

//SetValues Method @282-55267F60
    function SetValues()
    {
        $this->SUBSCRIBER_ID->SetDBValue($this->f("SUBSCRIBER_ID"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->REPORT_SEGMENT_CODE->SetDBValue($this->f("REPORT_SEGMENT_CODE"));
        $this->NEXT_BILL_DATE->SetDBValue(trim($this->f("NEXT_BILL_DATE")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_DATE->SetDBValue($this->f("UPDATE_DATE"));
        $this->SUBSCRIPTION_NAME->SetDBValue($this->f("SUBSCRIPTION_NAME"));
        $this->SERVICE_NO->SetDBValue($this->f("SERVICE_NO"));
        $this->TRANSFER_DATE->SetDBValue($this->f("TRANSFER_DATE"));
        $this->START_BILL_DATE->SetDBValue($this->f("START_BILL_DATE"));
        $this->TARIFF_SCENARIO_CODE->SetDBValue($this->f("TARIFF_SCENARIO_CODE"));
        $this->BILL_CYCLE_CODE->SetDBValue($this->f("BILL_CYCLE_CODE"));
    }
//End SetValues Method

} //End V_T_BILL_ON_DEMAND_UNPROCESSEDGridDataSource Class @282-FCB6E20C

//Initialize Page @1-C80CEF87
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
$TemplateFileName = "V_T_BILL_ON_DEMAND_UNPROCESSED.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-2ED0FBC9
include_once("./V_T_BILL_ON_DEMAND_UNPROCESSED_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-AFE3AF66
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$V_T_BILL_ON_DEMAND_UNPROCESSEDGrid = & new clsGridV_T_BILL_ON_DEMAND_UNPROCESSEDGrid("", $MainPage);
$MainPage->V_T_BILL_ON_DEMAND_UNPROCESSEDGrid = & $V_T_BILL_ON_DEMAND_UNPROCESSEDGrid;
$V_T_BILL_ON_DEMAND_UNPROCESSEDGrid->Initialize();

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

//Go to destination page @1-FB3B0FBC
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($V_T_BILL_ON_DEMAND_UNPROCESSEDGrid);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-2ED754A6
$V_T_BILL_ON_DEMAND_UNPROCESSEDGrid->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-165E9B27
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($V_T_BILL_ON_DEMAND_UNPROCESSEDGrid);
unset($Tpl);
//End Unload Page


?>
