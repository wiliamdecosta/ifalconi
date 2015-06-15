<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_report" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="All" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="v_input_data_control_billSearch" wizardCaption="Search P APP ROLE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="v_input_data_control_bill.ccp" PathID="v_input_data_control_billSearch" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardCaption="Keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="v_input_data_control_billSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="v_input_data_control_billSearchButton_DoSearch" removeParameters="TAMBAH;BATCH_CONTROL_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
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
		<Grid id="282" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="15" connection="Conn" name="v_input_data_control_billGrid" pageSizeLimit="100" wizardCaption=" V INPUT DATA CONTROL BILL " wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data not found" pasteActions="pasteActions" activeCollection="TableParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT
Input_data_control_id,
batch_type,
finance_period_code,
Invoice_date,
bill_cycle_code,
bill_status,
BILL_AMT,
CLOSING_DATE,
CLOSED_BY,
CREATION_DATE,
OPERATOR_ID

FROM
V_INPUT_DATA_CONTROL_BILL

WHERE
UPPER(Input_data_control_id) LIKE UPPER('%{s_keyword}%') OR
UPPER(batch_type) LIKE UPPER('%{s_keyword}%') OR
UPPER(finance_period_code) LIKE UPPER('%{s_keyword}%') OR
UPPER(Invoice_date) LIKE UPPER('%{s_keyword}%') OR
UPPER(bill_cycle_code) LIKE UPPER('%{s_keyword}%') OR
UPPER(bill_status) LIKE UPPER('%{s_keyword}%') OR
UPPER(BILL_AMT) LIKE UPPER('%{s_keyword}%') OR
UPPER(CLOSING_DATE) LIKE UPPER('%{s_keyword}%') OR
UPPER(CLOSED_BY) LIKE UPPER('%{s_keyword}%') OR
UPPER(CREATION_DATE) LIKE UPPER('%{s_keyword}%') OR
UPPER(OPERATOR_ID) LIKE UPPER('%{s_keyword}%')

ORDER BY
Input_data_control_id" pasteAsReplace="pasteAsReplace">
			<Components>
				<Label id="284" fieldSourceType="DBColumn" dataType="Float" html="False" name="INPUT_DATA_CONTROL_ID" fieldSource="INPUT_DATA_CONTROL_ID" wizardCaption="INPUT DATA CONTROL ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="v_input_data_control_billGridINPUT_DATA_CONTROL_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="291" fieldSourceType="DBColumn" dataType="Date" html="False" name="CREATION_DATE" fieldSource="CREATION_DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="v_input_data_control_billGridCREATION_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="292" fieldSourceType="DBColumn" dataType="Text" html="False" name="OPERATOR_ID" fieldSource="OPERATOR_ID" wizardCaption="OPERATOR ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="v_input_data_control_billGridOPERATOR_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="296" fieldSourceType="DBColumn" dataType="Date" html="False" name="INVOICE_DATE" fieldSource="INVOICE_DATE" wizardCaption="INVOICE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="v_input_data_control_billGridINVOICE_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="297" fieldSourceType="DBColumn" dataType="Float" html="False" name="BILL_AMT" fieldSource="BILL_AMT" wizardCaption="BILL AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="v_input_data_control_billGridBILL_AMT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="300" fieldSourceType="DBColumn" dataType="Date" html="False" name="CLOSING_DATE" fieldSource="CLOSING_DATE" wizardCaption="CLOSING DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="v_input_data_control_billGridCLOSING_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="301" fieldSourceType="DBColumn" dataType="Text" html="False" name="CLOSED_BY" fieldSource="CLOSED_BY" wizardCaption="CLOSED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="v_input_data_control_billGridCLOSED_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="310" fieldSourceType="DBColumn" dataType="Text" html="False" name="BATCH_TYPE" fieldSource="BATCH_TYPE" wizardCaption="BATCH TYPE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="v_input_data_control_billGridBATCH_TYPE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="311" fieldSourceType="DBColumn" dataType="Text" html="False" name="FINANCE_PERIOD_CODE" fieldSource="FINANCE_PERIOD_CODE" wizardCaption="FINANCE PERIOD CODE" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="v_input_data_control_billGridFINANCE_PERIOD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="314" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_CYCLE_CODE" fieldSource="BILL_CYCLE_CODE" wizardCaption="BILL CYCLE CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="v_input_data_control_billGridBILL_CYCLE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="315" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_STATUS" fieldSource="BILL_STATUS" wizardCaption="BILL STATUS" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="v_input_data_control_billGridBILL_STATUS">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="52" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="v_input_data_control_billGridDLink" hrefSource="v_input_data_control_bill.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="INPUT_DATA_CONTROL_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="235" sourceType="DataField" name="INPUT_DATA_CONTROL_ID" source="INPUT_DATA_CONTROL_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="54" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="v_input_data_control_billGridADLink" hrefSource="v_input_data_control_bill.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="INPUT_DATA_CONTROL_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="236" sourceType="DataField" name="INPUT_DATA_CONTROL_ID" source="INPUT_DATA_CONTROL_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Navigator id="316" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Hidden id="392" fieldSourceType="DBColumn" dataType="Text" name="IDCid" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="v_input_data_control_billGridIDCid">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
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
				<SQLParameter id="387" variable="s_keyword" parameterType="URL" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="v_input_data_control_bill_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="v_input_data_control_bill.php" forShow="True" url="v_input_data_control_bill.php" comment="//" codePage="windows-1252"/>
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
