<?php
//Include Common Files @1-3D6721ED
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_data/");
define("FileName", "account_discount.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridV_ACCOUNT_DISC { //V_ACCOUNT_DISC class @2-149719BD

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

//Class_Initialize Event @2-B0337251
    function clsGridV_ACCOUNT_DISC($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "V_ACCOUNT_DISC";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid V_ACCOUNT_DISC";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsV_ACCOUNT_DISCDataSource($this);
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

        $this->CUST_ACCOUNT_DISCOUNT_ID = & new clsControl(ccsLabel, "CUST_ACCOUNT_DISCOUNT_ID", "CUST_ACCOUNT_DISCOUNT_ID", ccsFloat, "", CCGetRequestParam("CUST_ACCOUNT_DISCOUNT_ID", ccsGet, NULL), $this);
        $this->VALID_FROM = & new clsControl(ccsLabel, "VALID_FROM", "VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", ccsGet, NULL), $this);
        $this->BILL_COMPONENT_CODE = & new clsControl(ccsLabel, "BILL_COMPONENT_CODE", "BILL_COMPONENT_CODE", ccsText, "", CCGetRequestParam("BILL_COMPONENT_CODE", ccsGet, NULL), $this);
        $this->ABSOLUTE_AMOUNT = & new clsControl(ccsLabel, "ABSOLUTE_AMOUNT", "ABSOLUTE_AMOUNT", ccsText, "", CCGetRequestParam("ABSOLUTE_AMOUNT", ccsGet, NULL), $this);
        $this->RELATIVE_AMOUNT = & new clsControl(ccsLabel, "RELATIVE_AMOUNT", "RELATIVE_AMOUNT", ccsText, "", CCGetRequestParam("RELATIVE_AMOUNT", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->BILL_PERIOD_UNIT_CODE = & new clsControl(ccsLabel, "BILL_PERIOD_UNIT_CODE", "BILL_PERIOD_UNIT_CODE", ccsText, "", CCGetRequestParam("BILL_PERIOD_UNIT_CODE", ccsGet, NULL), $this);
        $this->LOW_BILLING_UNIT = & new clsControl(ccsLabel, "LOW_BILLING_UNIT", "LOW_BILLING_UNIT", ccsText, "", CCGetRequestParam("LOW_BILLING_UNIT", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "account_discount.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "account_discount.php";
        $this->CUSTOMER_ACCOUNT_ID = & new clsControl(ccsHidden, "CUSTOMER_ACCOUNT_ID", "CUSTOMER_ACCOUNT_ID", ccsText, "", CCGetRequestParam("CUSTOMER_ACCOUNT_ID", ccsGet, NULL), $this);
        $this->skenarioEdit = & new clsControl(ccsLink, "skenarioEdit", "skenarioEdit", ccsText, "", CCGetRequestParam("skenarioEdit", ccsGet, NULL), $this);
        $this->skenarioEdit->HTML = true;
        $this->skenarioEdit->Page = "account_discount.php";
        $this->skenarioDel = & new clsControl(ccsLink, "skenarioDel", "skenarioDel", ccsText, "", CCGetRequestParam("skenarioDel", ccsGet, NULL), $this);
        $this->skenarioDel->HTML = true;
        $this->skenarioDel->Page = "account_discount.php";
        $this->VALID_TO = & new clsControl(ccsLabel, "VALID_TO", "VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", ccsGet, NULL), $this);
        $this->UP_BILLING_UNIT = & new clsControl(ccsLabel, "UP_BILLING_UNIT", "UP_BILLING_UNIT", ccsText, "", CCGetRequestParam("UP_BILLING_UNIT", ccsGet, NULL), $this);
        $this->IS_BASED_ON_TOTAL = & new clsControl(ccsLabel, "IS_BASED_ON_TOTAL", "IS_BASED_ON_TOTAL", ccsText, "", CCGetRequestParam("IS_BASED_ON_TOTAL", ccsGet, NULL), $this);
        $this->PCT_MULTIPLIER = & new clsControl(ccsLabel, "PCT_MULTIPLIER", "PCT_MULTIPLIER", ccsText, "", CCGetRequestParam("PCT_MULTIPLIER", ccsGet, NULL), $this);
        $this->UPDATE_DATE = & new clsControl(ccsLabel, "UPDATE_DATE", "UPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", ccsGet, NULL), $this);
        $this->UPDATE_BY = & new clsControl(ccsLabel, "UPDATE_BY", "UPDATE_BY", ccsText, "", CCGetRequestParam("UPDATE_BY", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 3, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->V_P_ACCOUNT_DISC_Insert = & new clsControl(ccsLink, "V_P_ACCOUNT_DISC_Insert", "V_P_ACCOUNT_DISC_Insert", ccsText, "", CCGetRequestParam("V_P_ACCOUNT_DISC_Insert", ccsGet, NULL), $this);
        $this->V_P_ACCOUNT_DISC_Insert->Page = "customer_account.php";
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

//Show Method @2-1097E270
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlCUSTOMER_ACCOUNT_ID"] = CCGetFromGet("CUSTOMER_ACCOUNT_ID", NULL);

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
            $this->ControlsVisible["CUST_ACCOUNT_DISCOUNT_ID"] = $this->CUST_ACCOUNT_DISCOUNT_ID->Visible;
            $this->ControlsVisible["VALID_FROM"] = $this->VALID_FROM->Visible;
            $this->ControlsVisible["BILL_COMPONENT_CODE"] = $this->BILL_COMPONENT_CODE->Visible;
            $this->ControlsVisible["ABSOLUTE_AMOUNT"] = $this->ABSOLUTE_AMOUNT->Visible;
            $this->ControlsVisible["RELATIVE_AMOUNT"] = $this->RELATIVE_AMOUNT->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["BILL_PERIOD_UNIT_CODE"] = $this->BILL_PERIOD_UNIT_CODE->Visible;
            $this->ControlsVisible["LOW_BILLING_UNIT"] = $this->LOW_BILLING_UNIT->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["CUSTOMER_ACCOUNT_ID"] = $this->CUSTOMER_ACCOUNT_ID->Visible;
            $this->ControlsVisible["skenarioEdit"] = $this->skenarioEdit->Visible;
            $this->ControlsVisible["skenarioDel"] = $this->skenarioDel->Visible;
            $this->ControlsVisible["VALID_TO"] = $this->VALID_TO->Visible;
            $this->ControlsVisible["UP_BILLING_UNIT"] = $this->UP_BILLING_UNIT->Visible;
            $this->ControlsVisible["IS_BASED_ON_TOTAL"] = $this->IS_BASED_ON_TOTAL->Visible;
            $this->ControlsVisible["PCT_MULTIPLIER"] = $this->PCT_MULTIPLIER->Visible;
            $this->ControlsVisible["UPDATE_DATE"] = $this->UPDATE_DATE->Visible;
            $this->ControlsVisible["UPDATE_BY"] = $this->UPDATE_BY->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CUST_ACCOUNT_DISCOUNT_ID->SetValue($this->DataSource->CUST_ACCOUNT_DISCOUNT_ID->GetValue());
                $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                $this->BILL_COMPONENT_CODE->SetValue($this->DataSource->BILL_COMPONENT_CODE->GetValue());
                $this->ABSOLUTE_AMOUNT->SetValue($this->DataSource->ABSOLUTE_AMOUNT->GetValue());
                $this->RELATIVE_AMOUNT->SetValue($this->DataSource->RELATIVE_AMOUNT->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->BILL_PERIOD_UNIT_CODE->SetValue($this->DataSource->BILL_PERIOD_UNIT_CODE->GetValue());
                $this->LOW_BILLING_UNIT->SetValue($this->DataSource->LOW_BILLING_UNIT->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "CUST_ACCOUNT_DISCOUNT_ID", $this->DataSource->f("CUST_ACCOUNT_DISCOUNT_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "CUST_ACCOUNT_DISCOUNT_ID", $this->DataSource->f("CUST_ACCOUNT_DISCOUNT_ID"));
                $this->CUSTOMER_ACCOUNT_ID->SetValue($this->DataSource->CUSTOMER_ACCOUNT_ID->GetValue());
                $this->skenarioEdit->SetValue($this->DataSource->skenarioEdit->GetValue());
                $this->skenarioEdit->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->skenarioEdit->Parameters = CCAddParam($this->skenarioEdit->Parameters, "CUST_ACCOUNT_DISCOUNT_ID", $this->DataSource->f("CUST_ACCOUNT_DISCOUNT_ID"));
                $this->skenarioEdit->Parameters = CCAddParam($this->skenarioEdit->Parameters, "CUSTOMER_ACCOUNT_ID", $this->DataSource->f("CUSTOMER_ACCOUNT_ID"));
                $this->skenarioDel->SetValue($this->DataSource->skenarioDel->GetValue());
                $this->skenarioDel->Parameters = CCGetQueryString("QueryString", array("FLAG", "CUST_ACCOUNT_DISCOUNT_ID", "ccsForm"));
                $this->skenarioDel->Parameters = CCAddParam($this->skenarioDel->Parameters, "CUST_ACCOUNT_DISCOUNT_ID", $this->DataSource->f("CUST_ACCOUNT_DISCOUNT_ID"));
                $this->skenarioDel->Parameters = CCAddParam($this->skenarioDel->Parameters, "action_delete", 1);
                $this->skenarioDel->Parameters = CCAddParam($this->skenarioDel->Parameters, "CUSTOMER_ACCOUNT_ID", $this->DataSource->f("CUSTOMER_ACCOUNT_ID"));
                $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                $this->UP_BILLING_UNIT->SetValue($this->DataSource->UP_BILLING_UNIT->GetValue());
                $this->IS_BASED_ON_TOTAL->SetValue($this->DataSource->IS_BASED_ON_TOTAL->GetValue());
                $this->PCT_MULTIPLIER->SetValue($this->DataSource->PCT_MULTIPLIER->GetValue());
                $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CUST_ACCOUNT_DISCOUNT_ID->Show();
                $this->VALID_FROM->Show();
                $this->BILL_COMPONENT_CODE->Show();
                $this->ABSOLUTE_AMOUNT->Show();
                $this->RELATIVE_AMOUNT->Show();
                $this->DESCRIPTION->Show();
                $this->BILL_PERIOD_UNIT_CODE->Show();
                $this->LOW_BILLING_UNIT->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->CUSTOMER_ACCOUNT_ID->Show();
                $this->skenarioEdit->Show();
                $this->skenarioDel->Show();
                $this->VALID_TO->Show();
                $this->UP_BILLING_UNIT->Show();
                $this->IS_BASED_ON_TOTAL->Show();
                $this->PCT_MULTIPLIER->Show();
                $this->UPDATE_DATE->Show();
                $this->UPDATE_BY->Show();
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
        $this->V_P_ACCOUNT_DISC_Insert->Parameters = CCGetQueryString("QueryString", array("CUST_ACCOUNT_DISCOUNT_ID", "ccsForm"));
        $this->V_P_ACCOUNT_DISC_Insert->Parameters = CCAddParam($this->V_P_ACCOUNT_DISC_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->V_P_ACCOUNT_DISC_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-0CDEB472
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CUST_ACCOUNT_DISCOUNT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_COMPONENT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ABSOLUTE_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RELATIVE_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_PERIOD_UNIT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LOW_BILLING_UNIT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_ACCOUNT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->skenarioEdit->Errors->ToString());
        $errors = ComposeStrings($errors, $this->skenarioDel->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UP_BILLING_UNIT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IS_BASED_ON_TOTAL->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PCT_MULTIPLIER->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UPDATE_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UPDATE_BY->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End V_ACCOUNT_DISC Class @2-FCB6E20C

class clsV_ACCOUNT_DISCDataSource extends clsDBConn {  //V_ACCOUNT_DISCDataSource Class @2-29EF1C27

//DataSource Variables @2-ACCE38D8
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CUST_ACCOUNT_DISCOUNT_ID;
    var $VALID_FROM;
    var $BILL_COMPONENT_CODE;
    var $ABSOLUTE_AMOUNT;
    var $RELATIVE_AMOUNT;
    var $DESCRIPTION;
    var $BILL_PERIOD_UNIT_CODE;
    var $LOW_BILLING_UNIT;
    var $DLink;
    var $ADLink;
    var $CUSTOMER_ACCOUNT_ID;
    var $skenarioEdit;
    var $skenarioDel;
    var $VALID_TO;
    var $UP_BILLING_UNIT;
    var $IS_BASED_ON_TOTAL;
    var $PCT_MULTIPLIER;
    var $UPDATE_DATE;
    var $UPDATE_BY;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-ABECEDEF
    function clsV_ACCOUNT_DISCDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid V_ACCOUNT_DISC";
        $this->Initialize();
        $this->CUST_ACCOUNT_DISCOUNT_ID = new clsField("CUST_ACCOUNT_DISCOUNT_ID", ccsFloat, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->BILL_COMPONENT_CODE = new clsField("BILL_COMPONENT_CODE", ccsText, "");
        
        $this->ABSOLUTE_AMOUNT = new clsField("ABSOLUTE_AMOUNT", ccsText, "");
        
        $this->RELATIVE_AMOUNT = new clsField("RELATIVE_AMOUNT", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->BILL_PERIOD_UNIT_CODE = new clsField("BILL_PERIOD_UNIT_CODE", ccsText, "");
        
        $this->LOW_BILLING_UNIT = new clsField("LOW_BILLING_UNIT", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->CUSTOMER_ACCOUNT_ID = new clsField("CUSTOMER_ACCOUNT_ID", ccsText, "");
        
        $this->skenarioEdit = new clsField("skenarioEdit", ccsText, "");
        
        $this->skenarioDel = new clsField("skenarioDel", ccsText, "");
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->UP_BILLING_UNIT = new clsField("UP_BILLING_UNIT", ccsText, "");
        
        $this->IS_BASED_ON_TOTAL = new clsField("IS_BASED_ON_TOTAL", ccsText, "");
        
        $this->PCT_MULTIPLIER = new clsField("PCT_MULTIPLIER", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        

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

//Prepare Method @2-94674186
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlCUSTOMER_ACCOUNT_ID", ccsFloat, "", "", $this->Parameters["urlCUSTOMER_ACCOUNT_ID"], -99, false);
    }
//End Prepare Method

//Open Method @2-DB178736
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM V_CUST_ACCOUNT_DISCOUNT\n" .
        "WHERE CUSTOMER_ACCOUNT_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . ") cnt";
        $this->SQL = "SELECT * \n" .
        "FROM V_CUST_ACCOUNT_DISCOUNT\n" .
        "WHERE CUSTOMER_ACCOUNT_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
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

//SetValues Method @2-201E16E4
    function SetValues()
    {
        $this->CUST_ACCOUNT_DISCOUNT_ID->SetDBValue(trim($this->f("CUST_ACCOUNT_DISCOUNT_ID")));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->BILL_COMPONENT_CODE->SetDBValue($this->f("BILL_COMPONENT_CODE"));
        $this->ABSOLUTE_AMOUNT->SetDBValue($this->f("ABSOLUTE_AMOUNT"));
        $this->RELATIVE_AMOUNT->SetDBValue($this->f("RELATIVE_AMOUNT"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->BILL_PERIOD_UNIT_CODE->SetDBValue($this->f("BILL_PERIOD_UNIT_CODE"));
        $this->LOW_BILLING_UNIT->SetDBValue($this->f("LOW_BILLING_UNIT"));
        $this->DLink->SetDBValue($this->f("CUST_ACCOUNT_DISCOUNT_ID"));
        $this->ADLink->SetDBValue($this->f("CUST_ACCOUNT_DISCOUNT_ID"));
        $this->CUSTOMER_ACCOUNT_ID->SetDBValue($this->f("CUSTOMER_ACCOUNT_ID"));
        $this->skenarioEdit->SetDBValue($this->f("CUST_ACCOUNT_DISCOUNT_ID"));
        $this->skenarioDel->SetDBValue($this->f("CUST_ACCOUNT_DISCOUNT_ID"));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->UP_BILLING_UNIT->SetDBValue($this->f("UP_BILLING_UNIT"));
        $this->IS_BASED_ON_TOTAL->SetDBValue($this->f("IS_BASED_ON_TOTAL"));
        $this->PCT_MULTIPLIER->SetDBValue($this->f("PCT_MULTIPLIER"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
    }
//End SetValues Method

} //End V_ACCOUNT_DISCDataSource Class @2-FCB6E20C

class clsGridV_CUST_ACCOUNT_COMP_DISCOUNT { //V_CUST_ACCOUNT_COMP_DISCOUNT class @69-68E7BC56

//Variables @69-AC1EDBB9

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

//Class_Initialize Event @69-08DD1B4F
    function clsGridV_CUST_ACCOUNT_COMP_DISCOUNT($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "V_CUST_ACCOUNT_COMP_DISCOUNT";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid V_CUST_ACCOUNT_COMP_DISCOUNT";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsV_CUST_ACCOUNT_COMP_DISCOUNTDataSource($this);
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

        $this->CUST_ACCOUNT_COMP_DISCOUNT_ID = & new clsControl(ccsLabel, "CUST_ACCOUNT_COMP_DISCOUNT_ID", "CUST_ACCOUNT_COMP_DISCOUNT_ID", ccsFloat, "", CCGetRequestParam("CUST_ACCOUNT_COMP_DISCOUNT_ID", ccsGet, NULL), $this);
        $this->RESULT_BILL_COMP_CODE = & new clsControl(ccsLabel, "RESULT_BILL_COMP_CODE", "RESULT_BILL_COMP_CODE", ccsText, "", CCGetRequestParam("RESULT_BILL_COMP_CODE", ccsGet, NULL), $this);
        $this->ABSOLUTE_AMOUNT = & new clsControl(ccsLabel, "ABSOLUTE_AMOUNT", "ABSOLUTE_AMOUNT", ccsFloat, "", CCGetRequestParam("ABSOLUTE_AMOUNT", ccsGet, NULL), $this);
        $this->PCT_MULTIPLIER = & new clsControl(ccsLabel, "PCT_MULTIPLIER", "PCT_MULTIPLIER", ccsText, "", CCGetRequestParam("PCT_MULTIPLIER", ccsGet, NULL), $this);
        $this->RELATIVE_AMOUNT = & new clsControl(ccsLabel, "RELATIVE_AMOUNT", "RELATIVE_AMOUNT", ccsFloat, "", CCGetRequestParam("RELATIVE_AMOUNT", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->UPDATE_DATE = & new clsControl(ccsLabel, "UPDATE_DATE", "UPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", ccsGet, NULL), $this);
        $this->UPDATE_BY = & new clsControl(ccsLabel, "UPDATE_BY", "UPDATE_BY", ccsText, "", CCGetRequestParam("UPDATE_BY", ccsGet, NULL), $this);
        $this->BILL_COMPONENT_CODE = & new clsControl(ccsLabel, "BILL_COMPONENT_CODE", "BILL_COMPONENT_CODE", ccsText, "", CCGetRequestParam("BILL_COMPONENT_CODE", ccsGet, NULL), $this);
        $this->skenarioEdit = & new clsControl(ccsLink, "skenarioEdit", "skenarioEdit", ccsText, "", CCGetRequestParam("skenarioEdit", ccsGet, NULL), $this);
        $this->skenarioEdit->HTML = true;
        $this->skenarioEdit->Page = "account_discount.php";
        $this->skenarioDel = & new clsControl(ccsLink, "skenarioDel", "skenarioDel", ccsText, "", CCGetRequestParam("skenarioDel", ccsGet, NULL), $this);
        $this->skenarioDel->HTML = true;
        $this->skenarioDel->Page = "account_discount.php";
        $this->CUST_ACCOUNT_DISCOUNT_ID = & new clsControl(ccsHidden, "CUST_ACCOUNT_DISCOUNT_ID", "CUST_ACCOUNT_DISCOUNT_ID", ccsText, "", CCGetRequestParam("CUST_ACCOUNT_DISCOUNT_ID", ccsGet, NULL), $this);
        $this->CUSTOMER_ACCOUNT_ID = & new clsControl(ccsHidden, "CUSTOMER_ACCOUNT_ID", "CUSTOMER_ACCOUNT_ID", ccsText, "", CCGetRequestParam("CUSTOMER_ACCOUNT_ID", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "account_discount.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "account_discount.php";
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 3, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->V_P_ACC_DISC_COMP_Insert = & new clsControl(ccsLink, "V_P_ACC_DISC_COMP_Insert", "V_P_ACC_DISC_COMP_Insert", ccsText, "", CCGetRequestParam("V_P_ACC_DISC_COMP_Insert", ccsGet, NULL), $this);
        $this->V_P_ACC_DISC_COMP_Insert->Page = "customer_account.php";
    }
//End Class_Initialize Event

//Initialize Method @69-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @69-CE2FD02E
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlCUST_ACCOUNT_DISCOUNT_ID"] = CCGetFromGet("CUST_ACCOUNT_DISCOUNT_ID", NULL);

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
            $this->ControlsVisible["CUST_ACCOUNT_COMP_DISCOUNT_ID"] = $this->CUST_ACCOUNT_COMP_DISCOUNT_ID->Visible;
            $this->ControlsVisible["RESULT_BILL_COMP_CODE"] = $this->RESULT_BILL_COMP_CODE->Visible;
            $this->ControlsVisible["ABSOLUTE_AMOUNT"] = $this->ABSOLUTE_AMOUNT->Visible;
            $this->ControlsVisible["PCT_MULTIPLIER"] = $this->PCT_MULTIPLIER->Visible;
            $this->ControlsVisible["RELATIVE_AMOUNT"] = $this->RELATIVE_AMOUNT->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["UPDATE_DATE"] = $this->UPDATE_DATE->Visible;
            $this->ControlsVisible["UPDATE_BY"] = $this->UPDATE_BY->Visible;
            $this->ControlsVisible["BILL_COMPONENT_CODE"] = $this->BILL_COMPONENT_CODE->Visible;
            $this->ControlsVisible["skenarioEdit"] = $this->skenarioEdit->Visible;
            $this->ControlsVisible["skenarioDel"] = $this->skenarioDel->Visible;
            $this->ControlsVisible["CUST_ACCOUNT_DISCOUNT_ID"] = $this->CUST_ACCOUNT_DISCOUNT_ID->Visible;
            $this->ControlsVisible["CUSTOMER_ACCOUNT_ID"] = $this->CUSTOMER_ACCOUNT_ID->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CUST_ACCOUNT_COMP_DISCOUNT_ID->SetValue($this->DataSource->CUST_ACCOUNT_COMP_DISCOUNT_ID->GetValue());
                $this->RESULT_BILL_COMP_CODE->SetValue($this->DataSource->RESULT_BILL_COMP_CODE->GetValue());
                $this->ABSOLUTE_AMOUNT->SetValue($this->DataSource->ABSOLUTE_AMOUNT->GetValue());
                $this->PCT_MULTIPLIER->SetValue($this->DataSource->PCT_MULTIPLIER->GetValue());
                $this->RELATIVE_AMOUNT->SetValue($this->DataSource->RELATIVE_AMOUNT->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                $this->BILL_COMPONENT_CODE->SetValue($this->DataSource->BILL_COMPONENT_CODE->GetValue());
                $this->skenarioEdit->SetValue($this->DataSource->skenarioEdit->GetValue());
                $this->skenarioEdit->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->skenarioEdit->Parameters = CCAddParam($this->skenarioEdit->Parameters, "CUST_ACCOUNT_DISCOUNT_ID", $this->DataSource->f("CUST_ACCOUNT_DISCOUNT_ID"));
                $this->skenarioEdit->Parameters = CCAddParam($this->skenarioEdit->Parameters, "CUST_ACCOUNT_COMP_DISCOUNT_ID", $this->DataSource->f("CUST_ACCOUNT_COMP_DISCOUNT_ID"));
                $this->skenarioEdit->Parameters = CCAddParam($this->skenarioEdit->Parameters, "CUSTOMER_ACCOUNT_ID", $this->DataSource->f("CUSTOMER_ACCOUNT_ID"));
                $this->skenarioDel->SetValue($this->DataSource->skenarioDel->GetValue());
                $this->skenarioDel->Parameters = CCGetQueryString("QueryString", array("FLAG", "CUST_ACCOUNT_COMP_DISCOUNT_ID", "ccsForm"));
                $this->skenarioDel->Parameters = CCAddParam($this->skenarioDel->Parameters, "CUST_ACCOUNT_DISCOUNT_ID", $this->DataSource->f("CUST_ACCOUNT_DISCOUNT_ID"));
                $this->skenarioDel->Parameters = CCAddParam($this->skenarioDel->Parameters, "action_delete2", 1);
                $this->skenarioDel->Parameters = CCAddParam($this->skenarioDel->Parameters, "CUST_ACCOUNT_COMP_DISCOUNT_ID", $this->DataSource->f("CUST_ACCOUNT_COMP_DISCOUNT_ID"));
                $this->skenarioDel->Parameters = CCAddParam($this->skenarioDel->Parameters, "CUSTOMER_ACCOUNT_ID", CCGetFromGet("CUSTOMER_ACCOUNT_ID", NULL));
                $this->CUST_ACCOUNT_DISCOUNT_ID->SetValue($this->DataSource->CUST_ACCOUNT_DISCOUNT_ID->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "CUST_ACCOUNT_COMP_DISCOUNT_ID", $this->DataSource->f("CUST_ACCOUNT_COMP_DISCOUNT_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "CUST_ACCOUNT_COMP_DISCOUNT_ID", $this->DataSource->f("CUST_ACCOUNT_COMP_DISCOUNT_ID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CUST_ACCOUNT_COMP_DISCOUNT_ID->Show();
                $this->RESULT_BILL_COMP_CODE->Show();
                $this->ABSOLUTE_AMOUNT->Show();
                $this->PCT_MULTIPLIER->Show();
                $this->RELATIVE_AMOUNT->Show();
                $this->DESCRIPTION->Show();
                $this->UPDATE_DATE->Show();
                $this->UPDATE_BY->Show();
                $this->BILL_COMPONENT_CODE->Show();
                $this->skenarioEdit->Show();
                $this->skenarioDel->Show();
                $this->CUST_ACCOUNT_DISCOUNT_ID->Show();
                $this->CUSTOMER_ACCOUNT_ID->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
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
        $this->V_P_ACC_DISC_COMP_Insert->Parameters = CCGetQueryString("QueryString", array("CUST_ACCOUNT_COMP_DISCOUNT_ID", "ccsForm"));
        $this->V_P_ACC_DISC_COMP_Insert->Parameters = CCAddParam($this->V_P_ACC_DISC_COMP_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->V_P_ACC_DISC_COMP_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @69-5B6D2DED
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CUST_ACCOUNT_COMP_DISCOUNT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RESULT_BILL_COMP_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ABSOLUTE_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PCT_MULTIPLIER->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RELATIVE_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UPDATE_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UPDATE_BY->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_COMPONENT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->skenarioEdit->Errors->ToString());
        $errors = ComposeStrings($errors, $this->skenarioDel->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUST_ACCOUNT_DISCOUNT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_ACCOUNT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End V_CUST_ACCOUNT_COMP_DISCOUNT Class @69-FCB6E20C

class clsV_CUST_ACCOUNT_COMP_DISCOUNTDataSource extends clsDBConn {  //V_CUST_ACCOUNT_COMP_DISCOUNTDataSource Class @69-8280A9FB

//DataSource Variables @69-B500B20C
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CUST_ACCOUNT_COMP_DISCOUNT_ID;
    var $RESULT_BILL_COMP_CODE;
    var $ABSOLUTE_AMOUNT;
    var $PCT_MULTIPLIER;
    var $RELATIVE_AMOUNT;
    var $DESCRIPTION;
    var $UPDATE_DATE;
    var $UPDATE_BY;
    var $BILL_COMPONENT_CODE;
    var $skenarioEdit;
    var $skenarioDel;
    var $CUST_ACCOUNT_DISCOUNT_ID;
    var $DLink;
    var $ADLink;
//End DataSource Variables

//DataSourceClass_Initialize Event @69-635E6F02
    function clsV_CUST_ACCOUNT_COMP_DISCOUNTDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid V_CUST_ACCOUNT_COMP_DISCOUNT";
        $this->Initialize();
        $this->CUST_ACCOUNT_COMP_DISCOUNT_ID = new clsField("CUST_ACCOUNT_COMP_DISCOUNT_ID", ccsFloat, "");
        
        $this->RESULT_BILL_COMP_CODE = new clsField("RESULT_BILL_COMP_CODE", ccsText, "");
        
        $this->ABSOLUTE_AMOUNT = new clsField("ABSOLUTE_AMOUNT", ccsFloat, "");
        
        $this->PCT_MULTIPLIER = new clsField("PCT_MULTIPLIER", ccsText, "");
        
        $this->RELATIVE_AMOUNT = new clsField("RELATIVE_AMOUNT", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->BILL_COMPONENT_CODE = new clsField("BILL_COMPONENT_CODE", ccsText, "");
        
        $this->skenarioEdit = new clsField("skenarioEdit", ccsText, "");
        
        $this->skenarioDel = new clsField("skenarioDel", ccsText, "");
        
        $this->CUST_ACCOUNT_DISCOUNT_ID = new clsField("CUST_ACCOUNT_DISCOUNT_ID", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @69-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @69-6CAC547D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlCUST_ACCOUNT_DISCOUNT_ID", ccsFloat, "", "", $this->Parameters["urlCUST_ACCOUNT_DISCOUNT_ID"], -99, false);
    }
//End Prepare Method

//Open Method @69-E18DAFDF
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM V_CUST_ACCOUNT_COMP_DISCOUNT\n" .
        "WHERE CUST_ACCOUNT_DISCOUNT_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . ") cnt";
        $this->SQL = "SELECT * \n" .
        "FROM V_CUST_ACCOUNT_COMP_DISCOUNT\n" .
        "WHERE CUST_ACCOUNT_DISCOUNT_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
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

//SetValues Method @69-9B76F2B8
    function SetValues()
    {
        $this->CUST_ACCOUNT_COMP_DISCOUNT_ID->SetDBValue(trim($this->f("CUST_ACCOUNT_COMP_DISCOUNT_ID")));
        $this->RESULT_BILL_COMP_CODE->SetDBValue($this->f("RESULT_BILL_COMP_CODE"));
        $this->ABSOLUTE_AMOUNT->SetDBValue(trim($this->f("ABSOLUTE_AMOUNT")));
        $this->PCT_MULTIPLIER->SetDBValue($this->f("PCT_MULTIPLIER"));
        $this->RELATIVE_AMOUNT->SetDBValue(trim($this->f("RELATIVE_AMOUNT")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->BILL_COMPONENT_CODE->SetDBValue($this->f("BILL_COMPONENT_CODE"));
        $this->skenarioEdit->SetDBValue($this->f("CUST_ACCOUNT_COMP_DISCOUNT_ID"));
        $this->skenarioDel->SetDBValue($this->f("CUST_ACCOUNT_COMP_DISCOUNT_ID"));
        $this->CUST_ACCOUNT_DISCOUNT_ID->SetDBValue($this->f("CUST_ACCOUNT_DISCOUNT_ID"));
        $this->DLink->SetDBValue($this->f("CUST_ACCOUNT_COMP_DISCOUNT_ID"));
        $this->ADLink->SetDBValue($this->f("CUST_ACCOUNT_COMP_DISCOUNT_ID"));
    }
//End SetValues Method

} //End V_CUST_ACCOUNT_COMP_DISCOUNTDataSource Class @69-FCB6E20C

class clsRecordp_customer_account { //p_customer_account Class @86-C09290F0

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

//Class_Initialize Event @86-B9B0FEC5
    function clsRecordp_customer_account($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_customer_account/Error";
        $this->DataSource = new clsp_customer_accountDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_customer_account";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->ACCOUNT_NO = & new clsControl(ccsLabel, "ACCOUNT_NO", "CODE", ccsText, "", CCGetRequestParam("ACCOUNT_NO", $Method, NULL), $this);
            $this->LAST_NAME = & new clsControl(ccsLabel, "LAST_NAME", "LAST_NAME", ccsText, "", CCGetRequestParam("LAST_NAME", $Method, NULL), $this);
            $this->CUSTOMER_NUMBER = & new clsControl(ccsLabel, "CUSTOMER_NUMBER", "CUSTOMER_NUMBER", ccsText, "", CCGetRequestParam("CUSTOMER_NUMBER", $Method, NULL), $this);
            $this->CUSTOMER_NAME = & new clsControl(ccsLabel, "CUSTOMER_NAME", "CUSTOMER_NAME", ccsText, "", CCGetRequestParam("CUSTOMER_NAME", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @86-583DA543
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlCUSTOMER_ACCOUNT_ID"] = CCGetFromGet("CUSTOMER_ACCOUNT_ID", NULL);
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

//CheckErrors Method @86-30202161
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ACCOUNT_NO->Errors->Count());
        $errors = ($errors || $this->LAST_NAME->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_NUMBER->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_NAME->Errors->Count());
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

//Show Method @86-3784F9D0
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
                $this->ACCOUNT_NO->SetValue($this->DataSource->ACCOUNT_NO->GetValue());
                $this->LAST_NAME->SetValue($this->DataSource->LAST_NAME->GetValue());
                $this->CUSTOMER_NUMBER->SetValue($this->DataSource->CUSTOMER_NUMBER->GetValue());
                $this->CUSTOMER_NAME->SetValue($this->DataSource->CUSTOMER_NAME->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ACCOUNT_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LAST_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_NUMBER->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_NAME->Errors->ToString());
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

        $this->ACCOUNT_NO->Show();
        $this->LAST_NAME->Show();
        $this->CUSTOMER_NUMBER->Show();
        $this->CUSTOMER_NAME->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_customer_account Class @86-FCB6E20C

class clsp_customer_accountDataSource extends clsDBConn {  //p_customer_accountDataSource Class @86-37F9D23B

//DataSource Variables @86-D066C303
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
    var $ACCOUNT_NO;
    var $LAST_NAME;
    var $CUSTOMER_NUMBER;
    var $CUSTOMER_NAME;
//End DataSource Variables

//DataSourceClass_Initialize Event @86-7A243A5A
    function clsp_customer_accountDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_customer_account/Error";
        $this->Initialize();
        $this->ACCOUNT_NO = new clsField("ACCOUNT_NO", ccsText, "");
        
        $this->LAST_NAME = new clsField("LAST_NAME", ccsText, "");
        
        $this->CUSTOMER_NUMBER = new clsField("CUSTOMER_NUMBER", ccsText, "");
        
        $this->CUSTOMER_NAME = new clsField("CUSTOMER_NAME", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @86-899860CA
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlCUSTOMER_ACCOUNT_ID", ccsFloat, "", "", $this->Parameters["urlCUSTOMER_ACCOUNT_ID"], -99, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @86-583E4794
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT *\n" .
        "FROM V_CUSTOMER_ACCOUNT\n" .
        "WHERE CUSTOMER_ACCOUNT_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @86-04DF1451
    function SetValues()
    {
        $this->ACCOUNT_NO->SetDBValue($this->f("ACCOUNT_NO"));
        $this->LAST_NAME->SetDBValue($this->f("LAST_NAME"));
        $this->CUSTOMER_NUMBER->SetDBValue($this->f("CUSTOMER_NUMBER"));
        $this->CUSTOMER_NAME->SetDBValue($this->f("CUSTOMER_NAME"));
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

} //End p_customer_accountDataSource Class @86-FCB6E20C

class clsRecordV_CUST_ACCOUNT_DISCOUNT { //V_CUST_ACCOUNT_DISCOUNT Class @153-B1A33677

//Variables @153-D6FF3E86

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

//Class_Initialize Event @153-7D3EE0FB
    function clsRecordV_CUST_ACCOUNT_DISCOUNT($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_CUST_ACCOUNT_DISCOUNT/Error";
        $this->DataSource = new clsV_CUST_ACCOUNT_DISCOUNTDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_CUST_ACCOUNT_DISCOUNT";
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
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->CUST_ACCOUNT_DISCOUNT_ID = & new clsControl(ccsTextBox, "CUST_ACCOUNT_DISCOUNT_ID", "CUST ACCOUNT DISCOUNT ID", ccsFloat, "", CCGetRequestParam("CUST_ACCOUNT_DISCOUNT_ID", $Method, NULL), $this);
            $this->P_BILLING_PERIOD_UNIT_ID = & new clsControl(ccsHidden, "P_BILLING_PERIOD_UNIT_ID", "BILL PERIOD UNIT CODE", ccsFloat, "", CCGetRequestParam("P_BILLING_PERIOD_UNIT_ID", $Method, NULL), $this);
            $this->P_BILLING_PERIOD_UNIT_ID->Required = true;
            $this->LOW_BILLING_UNIT = & new clsControl(ccsTextBox, "LOW_BILLING_UNIT", "LOW BILLING UNIT", ccsFloat, "", CCGetRequestParam("LOW_BILLING_UNIT", $Method, NULL), $this);
            $this->LOW_BILLING_UNIT->Required = true;
            $this->UP_BILLING_UNIT = & new clsControl(ccsTextBox, "UP_BILLING_UNIT", "UP BILLING UNIT", ccsFloat, "", CCGetRequestParam("UP_BILLING_UNIT", $Method, NULL), $this);
            $this->VALID_FROM = & new clsControl(ccsTextBox, "VALID_FROM", "VALID FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", $Method, NULL), $this);
            $this->VALID_FROM->Required = true;
            $this->VALID_TO = & new clsControl(ccsTextBox, "VALID_TO", "VALID TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", $Method, NULL), $this);
            $this->RESULT_BILL_COMP_ID = & new clsControl(ccsHidden, "RESULT_BILL_COMP_ID", "BILL COMPONENT CODE", ccsFloat, "", CCGetRequestParam("RESULT_BILL_COMP_ID", $Method, NULL), $this);
            $this->RESULT_BILL_COMP_ID->Required = true;
            $this->CUSTOMER_ACCOUNT_ID = & new clsControl(ccsHidden, "CUSTOMER_ACCOUNT_ID", "CUSTOMER_ACCOUNT_ID", ccsFloat, "", CCGetRequestParam("CUSTOMER_ACCOUNT_ID", $Method, NULL), $this);
            $this->BILL_PERIOD_UNIT_CODE = & new clsControl(ccsTextBox, "BILL_PERIOD_UNIT_CODE", "BILL PERIOD UNIT CODE", ccsText, "", CCGetRequestParam("BILL_PERIOD_UNIT_CODE", $Method, NULL), $this);
            $this->BILL_COMPONENT_CODE = & new clsControl(ccsTextBox, "BILL_COMPONENT_CODE", "BILL COMPONENT CODE", ccsText, "", CCGetRequestParam("BILL_COMPONENT_CODE", $Method, NULL), $this);
            $this->IS_BASED_ON_TOTAL = & new clsControl(ccsListBox, "IS_BASED_ON_TOTAL", "IS BASED ON TOTAL", ccsText, "", CCGetRequestParam("IS_BASED_ON_TOTAL", $Method, NULL), $this);
            $this->IS_BASED_ON_TOTAL->DSType = dsListOfValues;
            $this->IS_BASED_ON_TOTAL->Values = array(array("Y", "YES"), array("N", "NO"));
            $this->IS_BASED_ON_TOTAL->Required = true;
            $this->PCT_MULTIPLIER = & new clsControl(ccsTextBox, "PCT_MULTIPLIER", "PCT MULTIPLIER", ccsFloat, "", CCGetRequestParam("PCT_MULTIPLIER", $Method, NULL), $this);
            $this->ABSOLUTE_AMOUNT = & new clsControl(ccsTextBox, "ABSOLUTE_AMOUNT", "ABSOLUTE AMOUNT", ccsFloat, "", CCGetRequestParam("ABSOLUTE_AMOUNT", $Method, NULL), $this);
            $this->RELATIVE_AMOUNT = & new clsControl(ccsTextBox, "RELATIVE_AMOUNT", "RELATIVE AMOUNT", ccsFloat, "", CCGetRequestParam("RELATIVE_AMOUNT", $Method, NULL), $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            if(!$this->FormSubmitted) {
                if(!is_array($this->VALID_FROM->Value) && !strlen($this->VALID_FROM->Value) && $this->VALID_FROM->Value !== false)
                    $this->VALID_FROM->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @153-471FF373
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlCUST_ACCOUNT_DISCOUNT_ID"] = CCGetFromGet("CUST_ACCOUNT_DISCOUNT_ID", NULL);
    }
//End Initialize Method

//Validate Method @153-5FCD7D2B
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CUST_ACCOUNT_DISCOUNT_ID->Validate() && $Validation);
        $Validation = ($this->P_BILLING_PERIOD_UNIT_ID->Validate() && $Validation);
        $Validation = ($this->LOW_BILLING_UNIT->Validate() && $Validation);
        $Validation = ($this->UP_BILLING_UNIT->Validate() && $Validation);
        $Validation = ($this->VALID_FROM->Validate() && $Validation);
        $Validation = ($this->VALID_TO->Validate() && $Validation);
        $Validation = ($this->RESULT_BILL_COMP_ID->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_ACCOUNT_ID->Validate() && $Validation);
        $Validation = ($this->BILL_PERIOD_UNIT_CODE->Validate() && $Validation);
        $Validation = ($this->BILL_COMPONENT_CODE->Validate() && $Validation);
        $Validation = ($this->IS_BASED_ON_TOTAL->Validate() && $Validation);
        $Validation = ($this->PCT_MULTIPLIER->Validate() && $Validation);
        $Validation = ($this->ABSOLUTE_AMOUNT->Validate() && $Validation);
        $Validation = ($this->RELATIVE_AMOUNT->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CUST_ACCOUNT_DISCOUNT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILLING_PERIOD_UNIT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LOW_BILLING_UNIT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UP_BILLING_UNIT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RESULT_BILL_COMP_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_ACCOUNT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILL_PERIOD_UNIT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILL_COMPONENT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_BASED_ON_TOTAL->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PCT_MULTIPLIER->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ABSOLUTE_AMOUNT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RELATIVE_AMOUNT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @153-C83FA8B1
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CUST_ACCOUNT_DISCOUNT_ID->Errors->Count());
        $errors = ($errors || $this->P_BILLING_PERIOD_UNIT_ID->Errors->Count());
        $errors = ($errors || $this->LOW_BILLING_UNIT->Errors->Count());
        $errors = ($errors || $this->UP_BILLING_UNIT->Errors->Count());
        $errors = ($errors || $this->VALID_FROM->Errors->Count());
        $errors = ($errors || $this->VALID_TO->Errors->Count());
        $errors = ($errors || $this->RESULT_BILL_COMP_ID->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_ACCOUNT_ID->Errors->Count());
        $errors = ($errors || $this->BILL_PERIOD_UNIT_CODE->Errors->Count());
        $errors = ($errors || $this->BILL_COMPONENT_CODE->Errors->Count());
        $errors = ($errors || $this->IS_BASED_ON_TOTAL->Errors->Count());
        $errors = ($errors || $this->PCT_MULTIPLIER->Errors->Count());
        $errors = ($errors || $this->ABSOLUTE_AMOUNT->Errors->Count());
        $errors = ($errors || $this->RELATIVE_AMOUNT->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @153-ED598703
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

//Operation Method @153-C79CCC65
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
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_AR_SEGMENTPage"));
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

//InsertRow Method @153-CAA5960D
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CUST_ACCOUNT_DISCOUNT_ID->SetValue($this->CUST_ACCOUNT_DISCOUNT_ID->GetValue(true));
        $this->DataSource->P_BILLING_PERIOD_UNIT_ID->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        $this->DataSource->LOW_BILLING_UNIT->SetValue($this->LOW_BILLING_UNIT->GetValue(true));
        $this->DataSource->UP_BILLING_UNIT->SetValue($this->UP_BILLING_UNIT->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->RESULT_BILL_COMP_ID->SetValue($this->RESULT_BILL_COMP_ID->GetValue(true));
        $this->DataSource->CUSTOMER_ACCOUNT_ID->SetValue($this->CUSTOMER_ACCOUNT_ID->GetValue(true));
        $this->DataSource->IS_BASED_ON_TOTAL->SetValue($this->IS_BASED_ON_TOTAL->GetValue(true));
        $this->DataSource->PCT_MULTIPLIER->SetValue($this->PCT_MULTIPLIER->GetValue(true));
        $this->DataSource->ABSOLUTE_AMOUNT->SetValue($this->ABSOLUTE_AMOUNT->GetValue(true));
        $this->DataSource->RELATIVE_AMOUNT->SetValue($this->RELATIVE_AMOUNT->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @153-A7FDACBB
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->P_BILLING_PERIOD_UNIT_ID->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        $this->DataSource->LOW_BILLING_UNIT->SetValue($this->LOW_BILLING_UNIT->GetValue(true));
        $this->DataSource->UP_BILLING_UNIT->SetValue($this->UP_BILLING_UNIT->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->RESULT_BILL_COMP_ID->SetValue($this->RESULT_BILL_COMP_ID->GetValue(true));
        $this->DataSource->CUSTOMER_ACCOUNT_ID->SetValue($this->CUSTOMER_ACCOUNT_ID->GetValue(true));
        $this->DataSource->IS_BASED_ON_TOTAL->SetValue($this->IS_BASED_ON_TOTAL->GetValue(true));
        $this->DataSource->PCT_MULTIPLIER->SetValue($this->PCT_MULTIPLIER->GetValue(true));
        $this->DataSource->ABSOLUTE_AMOUNT->SetValue($this->ABSOLUTE_AMOUNT->GetValue(true));
        $this->DataSource->RELATIVE_AMOUNT->SetValue($this->RELATIVE_AMOUNT->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @153-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @153-E174BA39
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

        $this->IS_BASED_ON_TOTAL->Prepare();

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
                    $this->CUST_ACCOUNT_DISCOUNT_ID->SetValue($this->DataSource->CUST_ACCOUNT_DISCOUNT_ID->GetValue());
                    $this->P_BILLING_PERIOD_UNIT_ID->SetValue($this->DataSource->P_BILLING_PERIOD_UNIT_ID->GetValue());
                    $this->LOW_BILLING_UNIT->SetValue($this->DataSource->LOW_BILLING_UNIT->GetValue());
                    $this->UP_BILLING_UNIT->SetValue($this->DataSource->UP_BILLING_UNIT->GetValue());
                    $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                    $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                    $this->RESULT_BILL_COMP_ID->SetValue($this->DataSource->RESULT_BILL_COMP_ID->GetValue());
                    $this->CUSTOMER_ACCOUNT_ID->SetValue($this->DataSource->CUSTOMER_ACCOUNT_ID->GetValue());
                    $this->BILL_PERIOD_UNIT_CODE->SetValue($this->DataSource->BILL_PERIOD_UNIT_CODE->GetValue());
                    $this->BILL_COMPONENT_CODE->SetValue($this->DataSource->BILL_COMPONENT_CODE->GetValue());
                    $this->IS_BASED_ON_TOTAL->SetValue($this->DataSource->IS_BASED_ON_TOTAL->GetValue());
                    $this->PCT_MULTIPLIER->SetValue($this->DataSource->PCT_MULTIPLIER->GetValue());
                    $this->ABSOLUTE_AMOUNT->SetValue($this->DataSource->ABSOLUTE_AMOUNT->GetValue());
                    $this->RELATIVE_AMOUNT->SetValue($this->DataSource->RELATIVE_AMOUNT->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CUST_ACCOUNT_DISCOUNT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILLING_PERIOD_UNIT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LOW_BILLING_UNIT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UP_BILLING_UNIT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RESULT_BILL_COMP_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_ACCOUNT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILL_PERIOD_UNIT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILL_COMPONENT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_BASED_ON_TOTAL->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PCT_MULTIPLIER->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ABSOLUTE_AMOUNT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RELATIVE_AMOUNT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
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

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Cancel->Show();
        $this->CUST_ACCOUNT_DISCOUNT_ID->Show();
        $this->P_BILLING_PERIOD_UNIT_ID->Show();
        $this->LOW_BILLING_UNIT->Show();
        $this->UP_BILLING_UNIT->Show();
        $this->VALID_FROM->Show();
        $this->VALID_TO->Show();
        $this->RESULT_BILL_COMP_ID->Show();
        $this->CUSTOMER_ACCOUNT_ID->Show();
        $this->BILL_PERIOD_UNIT_CODE->Show();
        $this->BILL_COMPONENT_CODE->Show();
        $this->IS_BASED_ON_TOTAL->Show();
        $this->PCT_MULTIPLIER->Show();
        $this->ABSOLUTE_AMOUNT->Show();
        $this->RELATIVE_AMOUNT->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_BY->Show();
        $this->UPDATE_DATE->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End V_CUST_ACCOUNT_DISCOUNT Class @153-FCB6E20C

class clsV_CUST_ACCOUNT_DISCOUNTDataSource extends clsDBConn {  //V_CUST_ACCOUNT_DISCOUNTDataSource Class @153-2A82884F

//DataSource Variables @153-AAE56B0F
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
    var $CUST_ACCOUNT_DISCOUNT_ID;
    var $P_BILLING_PERIOD_UNIT_ID;
    var $LOW_BILLING_UNIT;
    var $UP_BILLING_UNIT;
    var $VALID_FROM;
    var $VALID_TO;
    var $RESULT_BILL_COMP_ID;
    var $CUSTOMER_ACCOUNT_ID;
    var $BILL_PERIOD_UNIT_CODE;
    var $BILL_COMPONENT_CODE;
    var $IS_BASED_ON_TOTAL;
    var $PCT_MULTIPLIER;
    var $ABSOLUTE_AMOUNT;
    var $RELATIVE_AMOUNT;
    var $DESCRIPTION;
    var $UPDATE_BY;
    var $UPDATE_DATE;
//End DataSource Variables

//DataSourceClass_Initialize Event @153-C69D89EF
    function clsV_CUST_ACCOUNT_DISCOUNTDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record V_CUST_ACCOUNT_DISCOUNT/Error";
        $this->Initialize();
        $this->CUST_ACCOUNT_DISCOUNT_ID = new clsField("CUST_ACCOUNT_DISCOUNT_ID", ccsFloat, "");
        
        $this->P_BILLING_PERIOD_UNIT_ID = new clsField("P_BILLING_PERIOD_UNIT_ID", ccsFloat, "");
        
        $this->LOW_BILLING_UNIT = new clsField("LOW_BILLING_UNIT", ccsFloat, "");
        
        $this->UP_BILLING_UNIT = new clsField("UP_BILLING_UNIT", ccsFloat, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->RESULT_BILL_COMP_ID = new clsField("RESULT_BILL_COMP_ID", ccsFloat, "");
        
        $this->CUSTOMER_ACCOUNT_ID = new clsField("CUSTOMER_ACCOUNT_ID", ccsFloat, "");
        
        $this->BILL_PERIOD_UNIT_CODE = new clsField("BILL_PERIOD_UNIT_CODE", ccsText, "");
        
        $this->BILL_COMPONENT_CODE = new clsField("BILL_COMPONENT_CODE", ccsText, "");
        
        $this->IS_BASED_ON_TOTAL = new clsField("IS_BASED_ON_TOTAL", ccsText, "");
        
        $this->PCT_MULTIPLIER = new clsField("PCT_MULTIPLIER", ccsFloat, "");
        
        $this->ABSOLUTE_AMOUNT = new clsField("ABSOLUTE_AMOUNT", ccsFloat, "");
        
        $this->RELATIVE_AMOUNT = new clsField("RELATIVE_AMOUNT", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @153-D1B76AF7
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlCUST_ACCOUNT_DISCOUNT_ID", ccsFloat, "", "", $this->Parameters["urlCUST_ACCOUNT_DISCOUNT_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "CUST_ACCOUNT_DISCOUNT_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @153-B45913DF
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_CUST_ACCOUNT_DISCOUNT {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @153-4C77ECD4
    function SetValues()
    {
        $this->CUST_ACCOUNT_DISCOUNT_ID->SetDBValue(trim($this->f("CUST_ACCOUNT_DISCOUNT_ID")));
        $this->P_BILLING_PERIOD_UNIT_ID->SetDBValue(trim($this->f("P_BILLING_PERIOD_UNIT_ID")));
        $this->LOW_BILLING_UNIT->SetDBValue(trim($this->f("LOW_BILLING_UNIT")));
        $this->UP_BILLING_UNIT->SetDBValue(trim($this->f("UP_BILLING_UNIT")));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->RESULT_BILL_COMP_ID->SetDBValue(trim($this->f("RESULT_BILL_COMP_ID")));
        $this->CUSTOMER_ACCOUNT_ID->SetDBValue(trim($this->f("CUSTOMER_ACCOUNT_ID")));
        $this->BILL_PERIOD_UNIT_CODE->SetDBValue($this->f("BILL_PERIOD_UNIT_CODE"));
        $this->BILL_COMPONENT_CODE->SetDBValue($this->f("BILL_COMPONENT_CODE"));
        $this->IS_BASED_ON_TOTAL->SetDBValue($this->f("IS_BASED_ON_TOTAL"));
        $this->PCT_MULTIPLIER->SetDBValue(trim($this->f("PCT_MULTIPLIER")));
        $this->ABSOLUTE_AMOUNT->SetDBValue(trim($this->f("ABSOLUTE_AMOUNT")));
        $this->RELATIVE_AMOUNT->SetDBValue(trim($this->f("RELATIVE_AMOUNT")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
    }
//End SetValues Method

//Insert Method @153-8AFE4081
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUST_ACCOUNT_DISCOUNT_ID"] = new clsSQLParameter("ctrlCUST_ACCOUNT_DISCOUNT_ID", ccsFloat, "", "", $this->CUST_ACCOUNT_DISCOUNT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILLING_PERIOD_UNIT_ID"] = new clsSQLParameter("ctrlP_BILLING_PERIOD_UNIT_ID", ccsFloat, "", "", $this->P_BILLING_PERIOD_UNIT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LOW_BILLING_UNIT"] = new clsSQLParameter("ctrlLOW_BILLING_UNIT", ccsFloat, "", "", $this->LOW_BILLING_UNIT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UP_BILLING_UNIT"] = new clsSQLParameter("ctrlUP_BILLING_UNIT", ccsFloat, "", "", $this->UP_BILLING_UNIT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RESULT_BILL_COMP_ID"] = new clsSQLParameter("ctrlRESULT_BILL_COMP_ID", ccsFloat, "", "", $this->RESULT_BILL_COMP_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_ACCOUNT_ID"] = new clsSQLParameter("ctrlCUSTOMER_ACCOUNT_ID", ccsFloat, "", "", $this->CUSTOMER_ACCOUNT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_BASED_ON_TOTAL"] = new clsSQLParameter("ctrlIS_BASED_ON_TOTAL", ccsText, "", "", $this->IS_BASED_ON_TOTAL->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PCT_MULTIPLIER"] = new clsSQLParameter("ctrlPCT_MULTIPLIER", ccsFloat, "", "", $this->PCT_MULTIPLIER->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ABSOLUTE_AMOUNT"] = new clsSQLParameter("ctrlABSOLUTE_AMOUNT", ccsFloat, "", "", $this->ABSOLUTE_AMOUNT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RELATIVE_AMOUNT"] = new clsSQLParameter("ctrlRELATIVE_AMOUNT", ccsFloat, "", "", $this->RELATIVE_AMOUNT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetValue())) 
            $this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->SetValue($this->CUST_ACCOUNT_DISCOUNT_ID->GetValue(true));
        if (!is_null($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue()) and !strlen($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue())) 
            $this->cp["P_BILLING_PERIOD_UNIT_ID"]->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        if (!is_null($this->cp["LOW_BILLING_UNIT"]->GetValue()) and !strlen($this->cp["LOW_BILLING_UNIT"]->GetText()) and !is_bool($this->cp["LOW_BILLING_UNIT"]->GetValue())) 
            $this->cp["LOW_BILLING_UNIT"]->SetValue($this->LOW_BILLING_UNIT->GetValue(true));
        if (!is_null($this->cp["UP_BILLING_UNIT"]->GetValue()) and !strlen($this->cp["UP_BILLING_UNIT"]->GetText()) and !is_bool($this->cp["UP_BILLING_UNIT"]->GetValue())) 
            $this->cp["UP_BILLING_UNIT"]->SetValue($this->UP_BILLING_UNIT->GetValue(true));
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["RESULT_BILL_COMP_ID"]->GetValue()) and !strlen($this->cp["RESULT_BILL_COMP_ID"]->GetText()) and !is_bool($this->cp["RESULT_BILL_COMP_ID"]->GetValue())) 
            $this->cp["RESULT_BILL_COMP_ID"]->SetValue($this->RESULT_BILL_COMP_ID->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ACCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ACCOUNT_ID"]->SetValue($this->CUSTOMER_ACCOUNT_ID->GetValue(true));
        if (!is_null($this->cp["IS_BASED_ON_TOTAL"]->GetValue()) and !strlen($this->cp["IS_BASED_ON_TOTAL"]->GetText()) and !is_bool($this->cp["IS_BASED_ON_TOTAL"]->GetValue())) 
            $this->cp["IS_BASED_ON_TOTAL"]->SetValue($this->IS_BASED_ON_TOTAL->GetValue(true));
        if (!is_null($this->cp["PCT_MULTIPLIER"]->GetValue()) and !strlen($this->cp["PCT_MULTIPLIER"]->GetText()) and !is_bool($this->cp["PCT_MULTIPLIER"]->GetValue())) 
            $this->cp["PCT_MULTIPLIER"]->SetValue($this->PCT_MULTIPLIER->GetValue(true));
        if (!is_null($this->cp["ABSOLUTE_AMOUNT"]->GetValue()) and !strlen($this->cp["ABSOLUTE_AMOUNT"]->GetText()) and !is_bool($this->cp["ABSOLUTE_AMOUNT"]->GetValue())) 
            $this->cp["ABSOLUTE_AMOUNT"]->SetValue($this->ABSOLUTE_AMOUNT->GetValue(true));
        if (!is_null($this->cp["RELATIVE_AMOUNT"]->GetValue()) and !strlen($this->cp["RELATIVE_AMOUNT"]->GetText()) and !is_bool($this->cp["RELATIVE_AMOUNT"]->GetValue())) 
            $this->cp["RELATIVE_AMOUNT"]->SetValue($this->RELATIVE_AMOUNT->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->SQL = "/* Formatted on 30/09/2014 14:36:40 (QP5 v5.139.911.3011) */\n" .
        "INSERT INTO CUST_ACCOUNT_DISCOUNT (CUST_ACCOUNT_DISCOUNT_ID,\n" .
        "                                     CUSTOMER_ACCOUNT_ID,\n" .
        "                                     P_BILLING_PERIOD_UNIT_ID,\n" .
        "                                     LOW_BILLING_UNIT,\n" .
        "                                     UP_BILLING_UNIT,\n" .
        "                                     VALID_FROM,\n" .
        "                                     VALID_TO,\n" .
        "                                     RESULT_BILL_COMP_ID,\n" .
        "                                     IS_BASED_ON_TOTAL,\n" .
        "                                     PCT_MULTIPLIER,\n" .
        "                                     ABSOLUTE_AMOUNT,\n" .
        "                                     RELATIVE_AMOUNT,\n" .
        "                                     DESCRIPTION,\n" .
        "                                     UPDATE_BY,\n" .
        "                                     UPDATE_DATE)\n" .
        "     VALUES (CAD_SEQ.NEXTVAL,\n" .
        "                " . $this->SQLValue($this->cp["CUSTOMER_ACCOUNT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "                " . $this->SQLValue($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "                " . $this->SQLValue($this->cp["LOW_BILLING_UNIT"]->GetDBValue(), ccsFloat) . ", \n" .
        "                " . $this->SQLValue($this->cp["UP_BILLING_UNIT"]->GetDBValue(), ccsFloat) . ", \n" .
        "                to_date(substr('" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "                to_date(substr('" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "                " . $this->SQLValue($this->cp["RESULT_BILL_COMP_ID"]->GetDBValue(), ccsFloat) . ",  \n" .
        "                '" . $this->SQLValue($this->cp["IS_BASED_ON_TOTAL"]->GetDBValue(), ccsText) . "', \n" .
        "                " . $this->SQLValue($this->cp["PCT_MULTIPLIER"]->GetDBValue(), ccsFloat) . ", \n" .
        "                " . $this->SQLValue($this->cp["ABSOLUTE_AMOUNT"]->GetDBValue(), ccsFloat) . ", \n" .
        "                " . $this->SQLValue($this->cp["RELATIVE_AMOUNT"]->GetDBValue(), ccsFloat) . ", \n" .
        "                '" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "', \n" .
        "                '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "', \n" .
        "                SYSDATE)";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @153-E446773D
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUST_ACCOUNT_DISCOUNT_ID"] = new clsSQLParameter("urlCUST_ACCOUNT_DISCOUNT_ID", ccsFloat, "", "", CCGetFromGet("CUST_ACCOUNT_DISCOUNT_ID", NULL), 0, false, $this->ErrorBlock);
        $this->cp["P_BILLING_PERIOD_UNIT_ID"] = new clsSQLParameter("ctrlP_BILLING_PERIOD_UNIT_ID", ccsFloat, "", "", $this->P_BILLING_PERIOD_UNIT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LOW_BILLING_UNIT"] = new clsSQLParameter("ctrlLOW_BILLING_UNIT", ccsFloat, "", "", $this->LOW_BILLING_UNIT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UP_BILLING_UNIT"] = new clsSQLParameter("ctrlUP_BILLING_UNIT", ccsFloat, "", "", $this->UP_BILLING_UNIT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RESULT_BILL_COMP_ID"] = new clsSQLParameter("ctrlRESULT_BILL_COMP_ID", ccsFloat, "", "", $this->RESULT_BILL_COMP_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_ACCOUNT_ID"] = new clsSQLParameter("ctrlCUSTOMER_ACCOUNT_ID", ccsFloat, "", "", $this->CUSTOMER_ACCOUNT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_BASED_ON_TOTAL"] = new clsSQLParameter("ctrlIS_BASED_ON_TOTAL", ccsText, "", "", $this->IS_BASED_ON_TOTAL->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PCT_MULTIPLIER"] = new clsSQLParameter("ctrlPCT_MULTIPLIER", ccsFloat, "", "", $this->PCT_MULTIPLIER->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ABSOLUTE_AMOUNT"] = new clsSQLParameter("ctrlABSOLUTE_AMOUNT", ccsFloat, "", "", $this->ABSOLUTE_AMOUNT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RELATIVE_AMOUNT"] = new clsSQLParameter("ctrlRELATIVE_AMOUNT", ccsFloat, "", "", $this->RELATIVE_AMOUNT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetValue())) 
            $this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->SetText(CCGetFromGet("CUST_ACCOUNT_DISCOUNT_ID", NULL));
        if (!strlen($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetValue(true))) 
            $this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->SetText(0);
        if (!is_null($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue()) and !strlen($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue())) 
            $this->cp["P_BILLING_PERIOD_UNIT_ID"]->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        if (!is_null($this->cp["LOW_BILLING_UNIT"]->GetValue()) and !strlen($this->cp["LOW_BILLING_UNIT"]->GetText()) and !is_bool($this->cp["LOW_BILLING_UNIT"]->GetValue())) 
            $this->cp["LOW_BILLING_UNIT"]->SetValue($this->LOW_BILLING_UNIT->GetValue(true));
        if (!is_null($this->cp["UP_BILLING_UNIT"]->GetValue()) and !strlen($this->cp["UP_BILLING_UNIT"]->GetText()) and !is_bool($this->cp["UP_BILLING_UNIT"]->GetValue())) 
            $this->cp["UP_BILLING_UNIT"]->SetValue($this->UP_BILLING_UNIT->GetValue(true));
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["RESULT_BILL_COMP_ID"]->GetValue()) and !strlen($this->cp["RESULT_BILL_COMP_ID"]->GetText()) and !is_bool($this->cp["RESULT_BILL_COMP_ID"]->GetValue())) 
            $this->cp["RESULT_BILL_COMP_ID"]->SetValue($this->RESULT_BILL_COMP_ID->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ACCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ACCOUNT_ID"]->SetValue($this->CUSTOMER_ACCOUNT_ID->GetValue(true));
        if (!is_null($this->cp["IS_BASED_ON_TOTAL"]->GetValue()) and !strlen($this->cp["IS_BASED_ON_TOTAL"]->GetText()) and !is_bool($this->cp["IS_BASED_ON_TOTAL"]->GetValue())) 
            $this->cp["IS_BASED_ON_TOTAL"]->SetValue($this->IS_BASED_ON_TOTAL->GetValue(true));
        if (!is_null($this->cp["PCT_MULTIPLIER"]->GetValue()) and !strlen($this->cp["PCT_MULTIPLIER"]->GetText()) and !is_bool($this->cp["PCT_MULTIPLIER"]->GetValue())) 
            $this->cp["PCT_MULTIPLIER"]->SetValue($this->PCT_MULTIPLIER->GetValue(true));
        if (!is_null($this->cp["ABSOLUTE_AMOUNT"]->GetValue()) and !strlen($this->cp["ABSOLUTE_AMOUNT"]->GetText()) and !is_bool($this->cp["ABSOLUTE_AMOUNT"]->GetValue())) 
            $this->cp["ABSOLUTE_AMOUNT"]->SetValue($this->ABSOLUTE_AMOUNT->GetValue(true));
        if (!is_null($this->cp["RELATIVE_AMOUNT"]->GetValue()) and !strlen($this->cp["RELATIVE_AMOUNT"]->GetText()) and !is_bool($this->cp["RELATIVE_AMOUNT"]->GetValue())) 
            $this->cp["RELATIVE_AMOUNT"]->SetValue($this->RELATIVE_AMOUNT->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->SQL = "UPDATE V_CUST_ACCOUNT_DISCOUNT \n" .
        "SET CUST_ACCOUNT_DISCOUNT_ID=" . $this->SQLValue($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "	P_BILLING_PERIOD_UNIT_ID=" . $this->SQLValue($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "	LOW_BILLING_UNIT=" . $this->SQLValue($this->cp["LOW_BILLING_UNIT"]->GetDBValue(), ccsFloat) . ", \n" .
        "	UP_BILLING_UNIT=" . $this->SQLValue($this->cp["UP_BILLING_UNIT"]->GetDBValue(), ccsFloat) . ", \n" .
        "	VALID_FROM=to_date(substr('" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'), \n" .
        "	VALID_TO=to_date(substr('" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'), \n" .
        "	RESULT_BILL_COMP_ID=" . $this->SQLValue($this->cp["RESULT_BILL_COMP_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "	CUSTOMER_ACCOUNT_ID=" . $this->SQLValue($this->cp["CUSTOMER_ACCOUNT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "	IS_BASED_ON_TOTAL='" . $this->SQLValue($this->cp["IS_BASED_ON_TOTAL"]->GetDBValue(), ccsText) . "', \n" .
        "	PCT_MULTIPLIER=" . $this->SQLValue($this->cp["PCT_MULTIPLIER"]->GetDBValue(), ccsFloat) . ", \n" .
        "	ABSOLUTE_AMOUNT=" . $this->SQLValue($this->cp["ABSOLUTE_AMOUNT"]->GetDBValue(), ccsFloat) . ", \n" .
        "	RELATIVE_AMOUNT=" . $this->SQLValue($this->cp["RELATIVE_AMOUNT"]->GetDBValue(), ccsFloat) . ", \n" .
        "	DESCRIPTION='" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "', \n" .
        "	UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "', \n" .
        "	UPDATE_DATE=SYSDATE \n" .
        "WHERE  CUST_ACCOUNT_DISCOUNT_ID = " . $this->SQLValue($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @153-9CD3CF87
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUST_ACCOUNT_DISCOUNT_ID"] = new clsSQLParameter("urlCUST_ACCOUNT_DISCOUNT_ID", ccsFloat, "", "", CCGetFromGet("CUST_ACCOUNT_DISCOUNT_ID", NULL), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetValue())) 
            $this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->SetText(CCGetFromGet("CUST_ACCOUNT_DISCOUNT_ID", NULL));
        if (!strlen($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetValue(true))) 
            $this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->SetText(0);
        $this->SQL = "DELETE \n" .
        "FROM CUST_ACCOUNT_DISCOUNT \n" .
        "WHERE  CUST_ACCOUNT_DISCOUNT_ID = " . $this->SQLValue($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End V_CUST_ACCOUNT_DISCOUNTDataSource Class @153-FCB6E20C

class clsRecordV_CUST_ACCOUNT_COMP_DISCO { //V_CUST_ACCOUNT_COMP_DISCO Class @292-46E3F514

//Variables @292-D6FF3E86

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

//Class_Initialize Event @292-44370768
    function clsRecordV_CUST_ACCOUNT_COMP_DISCO($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_CUST_ACCOUNT_COMP_DISCO/Error";
        $this->DataSource = new clsV_CUST_ACCOUNT_COMP_DISCODataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_CUST_ACCOUNT_COMP_DISCO";
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
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->CUST_ACCOUNT_COMP_DISCOUNT_ID = & new clsControl(ccsTextBox, "CUST_ACCOUNT_COMP_DISCOUNT_ID", "CUST ACCOUNT DISCOUNT ID", ccsFloat, "", CCGetRequestParam("CUST_ACCOUNT_COMP_DISCOUNT_ID", $Method, NULL), $this);
            $this->P_BILL_COMPONENT_ID = & new clsControl(ccsHidden, "P_BILL_COMPONENT_ID", "BILL COMPONENT CODE", ccsFloat, "", CCGetRequestParam("P_BILL_COMPONENT_ID", $Method, NULL), $this);
            $this->P_BILL_COMPONENT_ID->Required = true;
            $this->RESULT_BILL_COMP_ID = & new clsControl(ccsHidden, "RESULT_BILL_COMP_ID", "RESULT BILL COMP ID", ccsFloat, "", CCGetRequestParam("RESULT_BILL_COMP_ID", $Method, NULL), $this);
            $this->RELATIVE_AMOUNT = & new clsControl(ccsTextBox, "RELATIVE_AMOUNT", "RELATIVE AMOUNT", ccsFloat, "", CCGetRequestParam("RELATIVE_AMOUNT", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->BILL_COMPONENT_CODE = & new clsControl(ccsTextBox, "BILL_COMPONENT_CODE", "BILL COMPONENT CODE", ccsText, "", CCGetRequestParam("BILL_COMPONENT_CODE", $Method, NULL), $this);
            $this->BILL_COMPONENT_CODE->Required = true;
            $this->RESULT_BILL_COMP_CODE = & new clsControl(ccsTextBox, "RESULT_BILL_COMP_CODE", "RESULT BILL COMP CODE", ccsText, "", CCGetRequestParam("RESULT_BILL_COMP_CODE", $Method, NULL), $this);
            $this->PCT_MULTIPLIER = & new clsControl(ccsTextBox, "PCT_MULTIPLIER", "PCT MULTIPLIER", ccsFloat, "", CCGetRequestParam("PCT_MULTIPLIER", $Method, NULL), $this);
            $this->ABSOLUTE_AMOUNT = & new clsControl(ccsTextBox, "ABSOLUTE_AMOUNT", "ABSOLUTE AMOUNT", ccsFloat, "", CCGetRequestParam("ABSOLUTE_AMOUNT", $Method, NULL), $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->CUST_ACCOUNT_DISCOUNT_ID = & new clsControl(ccsHidden, "CUST_ACCOUNT_DISCOUNT_ID", "CUST_ACCOUNT_DISCOUNT_ID", ccsText, "", CCGetRequestParam("CUST_ACCOUNT_DISCOUNT_ID", $Method, NULL), $this);
            $this->CUSTOMER_ACCOUNT_ID = & new clsControl(ccsHidden, "CUSTOMER_ACCOUNT_ID", "CUSTOMER_ACCOUNT_ID", ccsText, "", CCGetRequestParam("CUSTOMER_ACCOUNT_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @292-40328780
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlCUST_ACCOUNT_COMP_DISCOUNT_ID"] = CCGetFromGet("CUST_ACCOUNT_COMP_DISCOUNT_ID", NULL);
    }
//End Initialize Method

//Validate Method @292-3DD75D39
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CUST_ACCOUNT_COMP_DISCOUNT_ID->Validate() && $Validation);
        $Validation = ($this->P_BILL_COMPONENT_ID->Validate() && $Validation);
        $Validation = ($this->RESULT_BILL_COMP_ID->Validate() && $Validation);
        $Validation = ($this->RELATIVE_AMOUNT->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->BILL_COMPONENT_CODE->Validate() && $Validation);
        $Validation = ($this->RESULT_BILL_COMP_CODE->Validate() && $Validation);
        $Validation = ($this->PCT_MULTIPLIER->Validate() && $Validation);
        $Validation = ($this->ABSOLUTE_AMOUNT->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->CUST_ACCOUNT_DISCOUNT_ID->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_ACCOUNT_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CUST_ACCOUNT_COMP_DISCOUNT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILL_COMPONENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RESULT_BILL_COMP_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RELATIVE_AMOUNT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILL_COMPONENT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RESULT_BILL_COMP_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PCT_MULTIPLIER->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ABSOLUTE_AMOUNT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUST_ACCOUNT_DISCOUNT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_ACCOUNT_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @292-0D7BE1CC
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CUST_ACCOUNT_COMP_DISCOUNT_ID->Errors->Count());
        $errors = ($errors || $this->P_BILL_COMPONENT_ID->Errors->Count());
        $errors = ($errors || $this->RESULT_BILL_COMP_ID->Errors->Count());
        $errors = ($errors || $this->RELATIVE_AMOUNT->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->BILL_COMPONENT_CODE->Errors->Count());
        $errors = ($errors || $this->RESULT_BILL_COMP_CODE->Errors->Count());
        $errors = ($errors || $this->PCT_MULTIPLIER->Errors->Count());
        $errors = ($errors || $this->ABSOLUTE_AMOUNT->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->CUST_ACCOUNT_DISCOUNT_ID->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_ACCOUNT_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @292-ED598703
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

//Operation Method @292-E12EDFD6
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
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            }
        }
        $Redirect = "account_discount.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Cancel") {
            $Redirect = "account_discount.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH2", "s_keyword", "P_AR_SEGMENTPage"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = "account_discount.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH2"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = "account_discount.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "s_keyword"));
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

//InsertRow Method @292-FE919BA6
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CUST_ACCOUNT_COMP_DISCOUNT_ID->SetValue($this->CUST_ACCOUNT_COMP_DISCOUNT_ID->GetValue(true));
        $this->DataSource->P_BILL_COMPONENT_ID->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        $this->DataSource->RESULT_BILL_COMP_ID->SetValue($this->RESULT_BILL_COMP_ID->GetValue(true));
        $this->DataSource->RELATIVE_AMOUNT->SetValue($this->RELATIVE_AMOUNT->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->BILL_COMPONENT_CODE->SetValue($this->BILL_COMPONENT_CODE->GetValue(true));
        $this->DataSource->RESULT_BILL_COMP_CODE->SetValue($this->RESULT_BILL_COMP_CODE->GetValue(true));
        $this->DataSource->PCT_MULTIPLIER->SetValue($this->PCT_MULTIPLIER->GetValue(true));
        $this->DataSource->ABSOLUTE_AMOUNT->SetValue($this->ABSOLUTE_AMOUNT->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CUST_ACCOUNT_DISCOUNT_ID->SetValue($this->CUST_ACCOUNT_DISCOUNT_ID->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @292-72AACD36
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->P_BILL_COMPONENT_ID->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        $this->DataSource->RESULT_BILL_COMP_ID->SetValue($this->RESULT_BILL_COMP_ID->GetValue(true));
        $this->DataSource->RELATIVE_AMOUNT->SetValue($this->RELATIVE_AMOUNT->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->BILL_COMPONENT_CODE->SetValue($this->BILL_COMPONENT_CODE->GetValue(true));
        $this->DataSource->RESULT_BILL_COMP_CODE->SetValue($this->RESULT_BILL_COMP_CODE->GetValue(true));
        $this->DataSource->PCT_MULTIPLIER->SetValue($this->PCT_MULTIPLIER->GetValue(true));
        $this->DataSource->ABSOLUTE_AMOUNT->SetValue($this->ABSOLUTE_AMOUNT->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CUST_ACCOUNT_DISCOUNT_ID->SetValue($this->CUST_ACCOUNT_DISCOUNT_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @292-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @292-E69D6B1D
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
                    $this->CUST_ACCOUNT_COMP_DISCOUNT_ID->SetValue($this->DataSource->CUST_ACCOUNT_COMP_DISCOUNT_ID->GetValue());
                    $this->P_BILL_COMPONENT_ID->SetValue($this->DataSource->P_BILL_COMPONENT_ID->GetValue());
                    $this->RESULT_BILL_COMP_ID->SetValue($this->DataSource->RESULT_BILL_COMP_ID->GetValue());
                    $this->RELATIVE_AMOUNT->SetValue($this->DataSource->RELATIVE_AMOUNT->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->BILL_COMPONENT_CODE->SetValue($this->DataSource->BILL_COMPONENT_CODE->GetValue());
                    $this->RESULT_BILL_COMP_CODE->SetValue($this->DataSource->RESULT_BILL_COMP_CODE->GetValue());
                    $this->PCT_MULTIPLIER->SetValue($this->DataSource->PCT_MULTIPLIER->GetValue());
                    $this->ABSOLUTE_AMOUNT->SetValue($this->DataSource->ABSOLUTE_AMOUNT->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->CUST_ACCOUNT_DISCOUNT_ID->SetValue($this->DataSource->CUST_ACCOUNT_DISCOUNT_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CUST_ACCOUNT_COMP_DISCOUNT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILL_COMPONENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RESULT_BILL_COMP_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RELATIVE_AMOUNT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILL_COMPONENT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RESULT_BILL_COMP_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PCT_MULTIPLIER->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ABSOLUTE_AMOUNT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUST_ACCOUNT_DISCOUNT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_ACCOUNT_ID->Errors->ToString());
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

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Cancel->Show();
        $this->CUST_ACCOUNT_COMP_DISCOUNT_ID->Show();
        $this->P_BILL_COMPONENT_ID->Show();
        $this->RESULT_BILL_COMP_ID->Show();
        $this->RELATIVE_AMOUNT->Show();
        $this->UPDATE_DATE->Show();
        $this->BILL_COMPONENT_CODE->Show();
        $this->RESULT_BILL_COMP_CODE->Show();
        $this->PCT_MULTIPLIER->Show();
        $this->ABSOLUTE_AMOUNT->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_BY->Show();
        $this->CUST_ACCOUNT_DISCOUNT_ID->Show();
        $this->CUSTOMER_ACCOUNT_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End V_CUST_ACCOUNT_COMP_DISCO Class @292-FCB6E20C

class clsV_CUST_ACCOUNT_COMP_DISCODataSource extends clsDBConn {  //V_CUST_ACCOUNT_COMP_DISCODataSource Class @292-0E31318D

//DataSource Variables @292-A199E9B7
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
    var $CUST_ACCOUNT_COMP_DISCOUNT_ID;
    var $P_BILL_COMPONENT_ID;
    var $RESULT_BILL_COMP_ID;
    var $RELATIVE_AMOUNT;
    var $UPDATE_DATE;
    var $BILL_COMPONENT_CODE;
    var $RESULT_BILL_COMP_CODE;
    var $PCT_MULTIPLIER;
    var $ABSOLUTE_AMOUNT;
    var $DESCRIPTION;
    var $UPDATE_BY;
    var $CUST_ACCOUNT_DISCOUNT_ID;
    var $CUSTOMER_ACCOUNT_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @292-03C03F03
    function clsV_CUST_ACCOUNT_COMP_DISCODataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record V_CUST_ACCOUNT_COMP_DISCO/Error";
        $this->Initialize();
        $this->CUST_ACCOUNT_COMP_DISCOUNT_ID = new clsField("CUST_ACCOUNT_COMP_DISCOUNT_ID", ccsFloat, "");
        
        $this->P_BILL_COMPONENT_ID = new clsField("P_BILL_COMPONENT_ID", ccsFloat, "");
        
        $this->RESULT_BILL_COMP_ID = new clsField("RESULT_BILL_COMP_ID", ccsFloat, "");
        
        $this->RELATIVE_AMOUNT = new clsField("RELATIVE_AMOUNT", ccsFloat, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->BILL_COMPONENT_CODE = new clsField("BILL_COMPONENT_CODE", ccsText, "");
        
        $this->RESULT_BILL_COMP_CODE = new clsField("RESULT_BILL_COMP_CODE", ccsText, "");
        
        $this->PCT_MULTIPLIER = new clsField("PCT_MULTIPLIER", ccsFloat, "");
        
        $this->ABSOLUTE_AMOUNT = new clsField("ABSOLUTE_AMOUNT", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->CUST_ACCOUNT_DISCOUNT_ID = new clsField("CUST_ACCOUNT_DISCOUNT_ID", ccsText, "");
        
        $this->CUSTOMER_ACCOUNT_ID = new clsField("CUSTOMER_ACCOUNT_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @292-B9F32157
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlCUST_ACCOUNT_COMP_DISCOUNT_ID", ccsFloat, "", "", $this->Parameters["urlCUST_ACCOUNT_COMP_DISCOUNT_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "CUST_ACCOUNT_COMP_DISCOUNT_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @292-DCDCF6AD
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_CUST_ACCOUNT_COMP_DISCOUNT {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @292-4A8D2F59
    function SetValues()
    {
        $this->CUST_ACCOUNT_COMP_DISCOUNT_ID->SetDBValue(trim($this->f("CUST_ACCOUNT_COMP_DISCOUNT_ID")));
        $this->P_BILL_COMPONENT_ID->SetDBValue(trim($this->f("P_BILL_COMPONENT_ID")));
        $this->RESULT_BILL_COMP_ID->SetDBValue(trim($this->f("RESULT_BILL_COMP_ID")));
        $this->RELATIVE_AMOUNT->SetDBValue(trim($this->f("RELATIVE_AMOUNT")));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->BILL_COMPONENT_CODE->SetDBValue($this->f("BILL_COMPONENT_CODE"));
        $this->RESULT_BILL_COMP_CODE->SetDBValue($this->f("RESULT_BILL_COMP_CODE"));
        $this->PCT_MULTIPLIER->SetDBValue(trim($this->f("PCT_MULTIPLIER")));
        $this->ABSOLUTE_AMOUNT->SetDBValue(trim($this->f("ABSOLUTE_AMOUNT")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->CUST_ACCOUNT_DISCOUNT_ID->SetDBValue($this->f("CUST_ACCOUNT_DISCOUNT_ID"));
    }
//End SetValues Method

//Insert Method @292-16B013DE
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"] = new clsSQLParameter("ctrlCUST_ACCOUNT_COMP_DISCOUNT_ID", ccsFloat, "", "", $this->CUST_ACCOUNT_COMP_DISCOUNT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILL_COMPONENT_ID"] = new clsSQLParameter("ctrlP_BILL_COMPONENT_ID", ccsFloat, "", "", $this->P_BILL_COMPONENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RESULT_BILL_COMP_ID"] = new clsSQLParameter("ctrlRESULT_BILL_COMP_ID", ccsFloat, "", "", $this->RESULT_BILL_COMP_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RELATIVE_AMOUNT"] = new clsSQLParameter("ctrlRELATIVE_AMOUNT", ccsFloat, "", "", $this->RELATIVE_AMOUNT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BILL_COMPONENT_CODE"] = new clsSQLParameter("ctrlBILL_COMPONENT_CODE", ccsText, "", "", $this->BILL_COMPONENT_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RESULT_BILL_COMP_CODE"] = new clsSQLParameter("ctrlRESULT_BILL_COMP_CODE", ccsText, "", "", $this->RESULT_BILL_COMP_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PCT_MULTIPLIER"] = new clsSQLParameter("ctrlPCT_MULTIPLIER", ccsFloat, "", "", $this->PCT_MULTIPLIER->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ABSOLUTE_AMOUNT"] = new clsSQLParameter("ctrlABSOLUTE_AMOUNT", ccsFloat, "", "", $this->ABSOLUTE_AMOUNT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["CUST_ACCOUNT_DISCOUNT_ID"] = new clsSQLParameter("ctrlCUST_ACCOUNT_DISCOUNT_ID", ccsText, "", "", $this->CUST_ACCOUNT_DISCOUNT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetValue())) 
            $this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->SetValue($this->CUST_ACCOUNT_COMP_DISCOUNT_ID->GetValue(true));
        if (!is_null($this->cp["P_BILL_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        if (!is_null($this->cp["RESULT_BILL_COMP_ID"]->GetValue()) and !strlen($this->cp["RESULT_BILL_COMP_ID"]->GetText()) and !is_bool($this->cp["RESULT_BILL_COMP_ID"]->GetValue())) 
            $this->cp["RESULT_BILL_COMP_ID"]->SetValue($this->RESULT_BILL_COMP_ID->GetValue(true));
        if (!is_null($this->cp["RELATIVE_AMOUNT"]->GetValue()) and !strlen($this->cp["RELATIVE_AMOUNT"]->GetText()) and !is_bool($this->cp["RELATIVE_AMOUNT"]->GetValue())) 
            $this->cp["RELATIVE_AMOUNT"]->SetValue($this->RELATIVE_AMOUNT->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["BILL_COMPONENT_CODE"]->GetValue()) and !strlen($this->cp["BILL_COMPONENT_CODE"]->GetText()) and !is_bool($this->cp["BILL_COMPONENT_CODE"]->GetValue())) 
            $this->cp["BILL_COMPONENT_CODE"]->SetValue($this->BILL_COMPONENT_CODE->GetValue(true));
        if (!is_null($this->cp["RESULT_BILL_COMP_CODE"]->GetValue()) and !strlen($this->cp["RESULT_BILL_COMP_CODE"]->GetText()) and !is_bool($this->cp["RESULT_BILL_COMP_CODE"]->GetValue())) 
            $this->cp["RESULT_BILL_COMP_CODE"]->SetValue($this->RESULT_BILL_COMP_CODE->GetValue(true));
        if (!is_null($this->cp["PCT_MULTIPLIER"]->GetValue()) and !strlen($this->cp["PCT_MULTIPLIER"]->GetText()) and !is_bool($this->cp["PCT_MULTIPLIER"]->GetValue())) 
            $this->cp["PCT_MULTIPLIER"]->SetValue($this->PCT_MULTIPLIER->GetValue(true));
        if (!is_null($this->cp["ABSOLUTE_AMOUNT"]->GetValue()) and !strlen($this->cp["ABSOLUTE_AMOUNT"]->GetText()) and !is_bool($this->cp["ABSOLUTE_AMOUNT"]->GetValue())) 
            $this->cp["ABSOLUTE_AMOUNT"]->SetValue($this->ABSOLUTE_AMOUNT->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetValue())) 
            $this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->SetValue($this->CUST_ACCOUNT_DISCOUNT_ID->GetValue(true));
        $this->SQL = "/* Formatted on 01/10/2014 13:35:48 (QP5 v5.139.911.3011) */\n" .
        "INSERT INTO CUST_ACCOUNT_COMP_DISCOUNT (CUST_ACCOUNT_COMP_DISCOUNT_ID,\n" .
        "                                          P_BILL_COMPONENT_ID,\n" .
        "                                          RESULT_BILL_COMP_ID,\n" .
        "                                          RELATIVE_AMOUNT,\n" .
        "                                          UPDATE_DATE,\n" .
        "                                          PCT_MULTIPLIER,\n" .
        "                                          ABSOLUTE_AMOUNT,\n" .
        "                                          DESCRIPTION,\n" .
        "                                          UPDATE_BY,\n" .
        "                                          CUST_ACCOUNT_DISCOUNT_ID)\n" .
        "     VALUES (GENERATE_ID ('BILLDB','CUST_ACCOUNT_COMP_DISCOUNT','CUST_ACCOUNT_COMP_DISCOUNT_ID'), \n" .
        "            " . $this->SQLValue($this->cp["P_BILL_COMPONENT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "            " . $this->SQLValue($this->cp["RESULT_BILL_COMP_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "            " . $this->SQLValue($this->cp["RELATIVE_AMOUNT"]->GetDBValue(), ccsFloat) . ",\n" .
        "            SYSDATE, \n" .
        "            " . $this->SQLValue($this->cp["PCT_MULTIPLIER"]->GetDBValue(), ccsFloat) . ", \n" .
        "            " . $this->SQLValue($this->cp["ABSOLUTE_AMOUNT"]->GetDBValue(), ccsFloat) . ", \n" .
        "            '" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "', \n" .
        "            '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "', \n" .
        "            '" . $this->SQLValue($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @292-5B9B1151
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"] = new clsSQLParameter("urlCUST_ACCOUNT_COMP_DISCOUNT_ID", ccsFloat, "", "", CCGetFromGet("CUST_ACCOUNT_COMP_DISCOUNT_ID", NULL), 0, false, $this->ErrorBlock);
        $this->cp["P_BILL_COMPONENT_ID"] = new clsSQLParameter("ctrlP_BILL_COMPONENT_ID", ccsFloat, "", "", $this->P_BILL_COMPONENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RESULT_BILL_COMP_ID"] = new clsSQLParameter("ctrlRESULT_BILL_COMP_ID", ccsFloat, "", "", $this->RESULT_BILL_COMP_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RELATIVE_AMOUNT"] = new clsSQLParameter("ctrlRELATIVE_AMOUNT", ccsFloat, "", "", $this->RELATIVE_AMOUNT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BILL_COMPONENT_CODE"] = new clsSQLParameter("ctrlBILL_COMPONENT_CODE", ccsText, "", "", $this->BILL_COMPONENT_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RESULT_BILL_COMP_CODE"] = new clsSQLParameter("ctrlRESULT_BILL_COMP_CODE", ccsText, "", "", $this->RESULT_BILL_COMP_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PCT_MULTIPLIER"] = new clsSQLParameter("ctrlPCT_MULTIPLIER", ccsFloat, "", "", $this->PCT_MULTIPLIER->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ABSOLUTE_AMOUNT"] = new clsSQLParameter("ctrlABSOLUTE_AMOUNT", ccsFloat, "", "", $this->ABSOLUTE_AMOUNT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["CUST_ACCOUNT_DISCOUNT_ID"] = new clsSQLParameter("ctrlCUST_ACCOUNT_DISCOUNT_ID", ccsText, "", "", $this->CUST_ACCOUNT_DISCOUNT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetValue())) 
            $this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->SetText(CCGetFromGet("CUST_ACCOUNT_COMP_DISCOUNT_ID", NULL));
        if (!strlen($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetValue(true))) 
            $this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->SetText(0);
        if (!is_null($this->cp["P_BILL_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        if (!is_null($this->cp["RESULT_BILL_COMP_ID"]->GetValue()) and !strlen($this->cp["RESULT_BILL_COMP_ID"]->GetText()) and !is_bool($this->cp["RESULT_BILL_COMP_ID"]->GetValue())) 
            $this->cp["RESULT_BILL_COMP_ID"]->SetValue($this->RESULT_BILL_COMP_ID->GetValue(true));
        if (!is_null($this->cp["RELATIVE_AMOUNT"]->GetValue()) and !strlen($this->cp["RELATIVE_AMOUNT"]->GetText()) and !is_bool($this->cp["RELATIVE_AMOUNT"]->GetValue())) 
            $this->cp["RELATIVE_AMOUNT"]->SetValue($this->RELATIVE_AMOUNT->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["BILL_COMPONENT_CODE"]->GetValue()) and !strlen($this->cp["BILL_COMPONENT_CODE"]->GetText()) and !is_bool($this->cp["BILL_COMPONENT_CODE"]->GetValue())) 
            $this->cp["BILL_COMPONENT_CODE"]->SetValue($this->BILL_COMPONENT_CODE->GetValue(true));
        if (!is_null($this->cp["RESULT_BILL_COMP_CODE"]->GetValue()) and !strlen($this->cp["RESULT_BILL_COMP_CODE"]->GetText()) and !is_bool($this->cp["RESULT_BILL_COMP_CODE"]->GetValue())) 
            $this->cp["RESULT_BILL_COMP_CODE"]->SetValue($this->RESULT_BILL_COMP_CODE->GetValue(true));
        if (!is_null($this->cp["PCT_MULTIPLIER"]->GetValue()) and !strlen($this->cp["PCT_MULTIPLIER"]->GetText()) and !is_bool($this->cp["PCT_MULTIPLIER"]->GetValue())) 
            $this->cp["PCT_MULTIPLIER"]->SetValue($this->PCT_MULTIPLIER->GetValue(true));
        if (!is_null($this->cp["ABSOLUTE_AMOUNT"]->GetValue()) and !strlen($this->cp["ABSOLUTE_AMOUNT"]->GetText()) and !is_bool($this->cp["ABSOLUTE_AMOUNT"]->GetValue())) 
            $this->cp["ABSOLUTE_AMOUNT"]->SetValue($this->ABSOLUTE_AMOUNT->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetValue())) 
            $this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->SetValue($this->CUST_ACCOUNT_DISCOUNT_ID->GetValue(true));
        $this->SQL = "UPDATE CUST_ACCOUNT_COMP_DISCOUNT \n" .
        "SET P_BILL_COMPONENT_ID=" . $this->SQLValue($this->cp["P_BILL_COMPONENT_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "    RESULT_BILL_COMP_ID=" . $this->SQLValue($this->cp["RESULT_BILL_COMP_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "    RELATIVE_AMOUNT=" . $this->SQLValue($this->cp["RELATIVE_AMOUNT"]->GetDBValue(), ccsFloat) . ", \n" .
        "    UPDATE_DATE=SYSDATE, \n" .
        "    BILL_COMPONENT_CODE='" . $this->SQLValue($this->cp["BILL_COMPONENT_CODE"]->GetDBValue(), ccsText) . "', \n" .
        "    RESULT_BILL_COMP_CODE='" . $this->SQLValue($this->cp["RESULT_BILL_COMP_CODE"]->GetDBValue(), ccsText) . "', \n" .
        "    PCT_MULTIPLIER=" . $this->SQLValue($this->cp["PCT_MULTIPLIER"]->GetDBValue(), ccsFloat) . ", \n" .
        "    ABSOLUTE_AMOUNT=" . $this->SQLValue($this->cp["ABSOLUTE_AMOUNT"]->GetDBValue(), ccsFloat) . ", \n" .
        "    DESCRIPTION='" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "', \n" .
        "    UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "', \n" .
        "    CUST_ACCOUNT_DISCOUNT_ID='" . $this->SQLValue($this->cp["CUST_ACCOUNT_DISCOUNT_ID"]->GetDBValue(), ccsText) . "' \n" .
        "WHERE  CUST_ACCOUNT_COMP_DISCOUNT_ID = " . $this->SQLValue($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @292-B18D1ECE
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"] = new clsSQLParameter("urlCUST_ACCOUNT_COMP_DISCOUNT_ID", ccsFloat, "", "", CCGetFromGet("CUST_ACCOUNT_COMP_DISCOUNT_ID", NULL), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetValue())) 
            $this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->SetText(CCGetFromGet("CUST_ACCOUNT_COMP_DISCOUNT_ID", NULL));
        if (!strlen($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetValue(true))) 
            $this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->SetText(0);
        $this->SQL = "DELETE FROM CUST_ACCOUNT_COMP_DISCOUNT \n" .
        "WHERE  CUST_ACCOUNT_COMP_DISCOUNT_ID = " . $this->SQLValue($this->cp["CUST_ACCOUNT_COMP_DISCOUNT_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End V_CUST_ACCOUNT_COMP_DISCODataSource Class @292-FCB6E20C





//Initialize Page @1-C1843A24
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
$TemplateFileName = "account_discount.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-9909A17B
include_once("./account_discount_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-2B57BC15
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$V_ACCOUNT_DISC = & new clsGridV_ACCOUNT_DISC("", $MainPage);
$V_CUST_ACCOUNT_COMP_DISCOUNT = & new clsGridV_CUST_ACCOUNT_COMP_DISCOUNT("", $MainPage);
$p_customer_account = & new clsRecordp_customer_account("", $MainPage);
$V_CUST_ACCOUNT_DISCOUNT = & new clsRecordV_CUST_ACCOUNT_DISCOUNT("", $MainPage);
$V_CUST_ACCOUNT_COMP_DISCO = & new clsRecordV_CUST_ACCOUNT_COMP_DISCO("", $MainPage);
$MainPage->V_ACCOUNT_DISC = & $V_ACCOUNT_DISC;
$MainPage->V_CUST_ACCOUNT_COMP_DISCOUNT = & $V_CUST_ACCOUNT_COMP_DISCOUNT;
$MainPage->p_customer_account = & $p_customer_account;
$MainPage->V_CUST_ACCOUNT_DISCOUNT = & $V_CUST_ACCOUNT_DISCOUNT;
$MainPage->V_CUST_ACCOUNT_COMP_DISCO = & $V_CUST_ACCOUNT_COMP_DISCO;
$V_ACCOUNT_DISC->Initialize();
$V_CUST_ACCOUNT_COMP_DISCOUNT->Initialize();
$p_customer_account->Initialize();
$V_CUST_ACCOUNT_DISCOUNT->Initialize();
$V_CUST_ACCOUNT_COMP_DISCO->Initialize();

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

//Execute Components @1-546C998B
$p_customer_account->Operation();
$V_CUST_ACCOUNT_DISCOUNT->Operation();
$V_CUST_ACCOUNT_COMP_DISCO->Operation();
//End Execute Components

//Go to destination page @1-132E1561
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($V_ACCOUNT_DISC);
    unset($V_CUST_ACCOUNT_COMP_DISCOUNT);
    unset($p_customer_account);
    unset($V_CUST_ACCOUNT_DISCOUNT);
    unset($V_CUST_ACCOUNT_COMP_DISCO);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-891DFD16
$V_ACCOUNT_DISC->Show();
$V_CUST_ACCOUNT_COMP_DISCOUNT->Show();
$p_customer_account->Show();
$V_CUST_ACCOUNT_DISCOUNT->Show();
$V_CUST_ACCOUNT_COMP_DISCO->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-6FC4EDF8
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($V_ACCOUNT_DISC);
unset($V_CUST_ACCOUNT_COMP_DISCOUNT);
unset($p_customer_account);
unset($V_CUST_ACCOUNT_DISCOUNT);
unset($V_CUST_ACCOUNT_COMP_DISCO);
unset($Tpl);
//End Unload Page


?>
