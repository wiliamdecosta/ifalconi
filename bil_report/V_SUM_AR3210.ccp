<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_report" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" showSyncDlg="false">
	<Components>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="All" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="V_SUM_AR3210Search" wizardCaption="Search P APP ROLE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="V_SUM_AR3210.ccp" PathID="V_SUM_AR3210Search" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace" connection="Conn" dataSource="V_INPUT_DATA_CONTROL_BILL" activeCollection="TableParameters">
			<Components>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="V_SUM_AR3210SearchButton_DoSearch" removeParameters="TAMBAH;BATCH_CONTROL_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="393" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="Invoice_date" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="V_SUM_AR3210SearchInvoice_date" fieldSource="INVOICE_DATE" format="dd/mm/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="394" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="bill_cycle_code" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="V_SUM_AR3210Searchbill_cycle_code" fieldSource="BILL_CYCLE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="395" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="finance_period_code" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="V_SUM_AR3210Searchfinance_period_code" fieldSource="FINANCE_PERIOD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="396" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="INPUT_DATA_CONTROL_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="V_SUM_AR3210SearchINPUT_DATA_CONTROL_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="399" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="CURRENCY_CODE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="V_SUM_AR3210SearchCURRENCY_CODE" connection="Conn" activeCollection="TableParameters" textColumn="CODE" dataSource="P_CURRENCY" boundColumn="P_CURRENCY_ID">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="404" tableName="P_CURRENCY" schemaName="BILLDB" posLeft="10" posTop="10" posWidth="148" posHeight="180"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="403" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="398" conditionType="Parameter" useIsNull="False" field="INPUT_DATA_CONTROL_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="INPUT_DATA_CONTROL_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="397" tableName="V_INPUT_DATA_CONTROL_BILL" schemaName="BILLDB" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions/>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Grid id="282" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="15" connection="Conn" name="V_SUM_AR3210Grid" pageSizeLimit="100" wizardCaption=" V INPUT DATA CONTROL BILL " wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data not found" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT
*

FROM
V_SUM_AR3210

WHERE
UPPER(INPUT_DATA_CONTROL_ID) LIKE UPPER ('%{INPUT_DATA_CONTROL_ID}%') AND
UPPER(CURRENCY_CODE) LIKE UPPER('%{CURRENCY_CODE}%')

ORDER BY
BUSINESS_AREA_NAME, 
CUSTOMER_SEGMENT_CODE, 
REPORT_SEGMENT_CODE, 
SUBSCRIBER_SEGMENT_CODE, 
SERVICE_GROUP_CODE,
SERVICE_TYPE_CODE, 
INVOICE_COMPONENT_CODE

" pasteAsReplace="pasteAsReplace">
			<Components>
				<Label id="284" fieldSourceType="DBColumn" dataType="Text" html="False" name="BUSINESS_AREA_NAME" fieldSource="BUSINESS_AREA_NAME" wizardCaption="INPUT DATA CONTROL ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_SUM_AR3210GridBUSINESS_AREA_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="291" fieldSourceType="DBColumn" dataType="Text" html="False" name="VAT_AMOUNT" fieldSource="VAT_AMOUNT" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_SUM_AR3210GridVAT_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="296" fieldSourceType="DBColumn" dataType="Text" html="False" name="REPORT_SEGMENT_CODE" fieldSource="REPORT_SEGMENT_CODE" wizardCaption="INVOICE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_SUM_AR3210GridREPORT_SEGMENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="297" fieldSourceType="DBColumn" dataType="Float" html="False" name="SERVICE_TYPE_CODE" fieldSource="SERVICE_TYPE_CODE" wizardCaption="BILL AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_SUM_AR3210GridSERVICE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="300" fieldSourceType="DBColumn" dataType="Text" html="False" name="INVOICE_COMPONENT_CODE" fieldSource="INVOICE_COMPONENT_CODE" wizardCaption="CLOSING DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_SUM_AR3210GridINVOICE_COMPONENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="301" fieldSourceType="DBColumn" dataType="Text" html="False" name="CHARGE_AMOUNT" fieldSource="CHARGE_AMOUNT" wizardCaption="CLOSED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_SUM_AR3210GridCHARGE_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="310" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_SEGMENT" fieldSource="CUSTOMER_SEGMENT_ID" wizardCaption="BATCH TYPE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_SUM_AR3210GridCUSTOMER_SEGMENT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="311" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_SEGMENT_CODE" fieldSource="CUSTOMER_SEGMENT_CODE" wizardCaption="FINANCE PERIOD CODE" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_SUM_AR3210GridCUSTOMER_SEGMENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="314" fieldSourceType="DBColumn" dataType="Text" html="False" name="SUBSCRIBER_SEGMENT_CODE" fieldSource="SUBSCRIBER_SEGMENT_CODE" wizardCaption="BILL CYCLE CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_SUM_AR3210GridSUBSCRIBER_SEGMENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="315" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_GROUP_CODE" fieldSource="SERVICE_GROUP_CODE" wizardCaption="BILL STATUS" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_SUM_AR3210GridSERVICE_GROUP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="316" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="283" styles="Row;AltRow" name="rowStyle"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="389" conditionType="Parameter" useIsNull="False" field="INPUT_DATA_CONTROL_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="Or" parameterSource="s_keyword"/>
				<TableParameter id="390" conditionType="Parameter" useIsNull="False" field="BILL_AMT" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="Or" parameterSource="s_keyword"/>
				<TableParameter id="391" conditionType="Parameter" useIsNull="False" field="FINANCE_PERIOD_CODE" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="Or" parameterSource="s_keyword"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="405" variable="INPUT_DATA_CONTROL_ID" parameterType="URL" dataType="Text" parameterSource="INPUT_DATA_CONTROL_ID"/>
				<SQLParameter id="406" variable="CURRENCY_CODE" parameterType="URL" dataType="Text" parameterSource="CURRENCY_CODE"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="V_SUM_AR3210_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="V_SUM_AR3210.php" forShow="True" url="V_SUM_AR3210.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnLoad" type="Client">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="57"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="129"/>
			</Actions>
		</Event>
	</Events>
</Page>
