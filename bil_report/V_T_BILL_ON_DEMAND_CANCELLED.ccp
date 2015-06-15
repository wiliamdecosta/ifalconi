<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_process" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Grid id="282" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="15" connection="Conn" name="V_T_BILL_ON_DEMAND_CANCELLEDGrid" pageSizeLimit="100" wizardCaption=" V INPUT DATA CONTROL BILL " wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data not found" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT
*

FROM
V_T_BILL_ON_DEMAND

WHERE
IS_CANCEL = 'Y'

ORDER BY
SUBSCRIBER_ID" pasteAsReplace="pasteAsReplace">
			<Components>
				<Label id="284" fieldSourceType="DBColumn" dataType="Text" html="False" name="SUBSCRIBER_ID" fieldSource="SUBSCRIBER_ID" wizardCaption="INPUT DATA CONTROL ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_T_BILL_ON_DEMAND_CANCELLEDGridSUBSCRIBER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="291" fieldSourceType="DBColumn" dataType="Text" html="False" name="UPDATE_BY" fieldSource="UPDATE_BY" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_T_BILL_ON_DEMAND_CANCELLEDGridUPDATE_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="296" fieldSourceType="DBColumn" dataType="Text" html="False" name="REPORT_SEGMENT_CODE" fieldSource="REPORT_SEGMENT_CODE" wizardCaption="INVOICE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_T_BILL_ON_DEMAND_CANCELLEDGridREPORT_SEGMENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="297" fieldSourceType="DBColumn" dataType="Float" html="False" name="NEXT_BILL_DATE" fieldSource="NEXT_BILL_DATE" wizardCaption="BILL AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_T_BILL_ON_DEMAND_CANCELLEDGridNEXT_BILL_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="300" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="CLOSING DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_T_BILL_ON_DEMAND_CANCELLEDGridDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="301" fieldSourceType="DBColumn" dataType="Text" html="False" name="UPDATE_DATE" fieldSource="UPDATE_DATE" wizardCaption="CLOSED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_T_BILL_ON_DEMAND_CANCELLEDGridUPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="310" fieldSourceType="DBColumn" dataType="Text" html="False" name="SUBSCRIPTION_NAME" fieldSource="SUBSCRIPTION_NAME" wizardCaption="BATCH TYPE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_T_BILL_ON_DEMAND_CANCELLEDGridSUBSCRIPTION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="311" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_NO" fieldSource="SERVICE_NO" wizardCaption="FINANCE PERIOD CODE" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_T_BILL_ON_DEMAND_CANCELLEDGridSERVICE_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="314" fieldSourceType="DBColumn" dataType="Text" html="False" name="TRANSFER_DATE" fieldSource="TRANSFER_DATE" wizardCaption="BILL CYCLE CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_T_BILL_ON_DEMAND_CANCELLEDGridTRANSFER_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="315" fieldSourceType="DBColumn" dataType="Text" html="False" name="START_BILL_DATE" fieldSource="START_BILL_DATE" wizardCaption="BILL STATUS" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_T_BILL_ON_DEMAND_CANCELLEDGridSTART_BILL_DATE">
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
				<Label id="408" fieldSourceType="DBColumn" dataType="Text" html="False" name="TARIFF_SCENARIO_CODE" fieldSource="TARIFF_SCENARIO_CODE" wizardCaption="INVOICE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_T_BILL_ON_DEMAND_CANCELLEDGridTARIFF_SCENARIO_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="409" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_CYCLE_CODE" fieldSource="BILL_CYCLE_CODE" wizardCaption="BILL CYCLE CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_T_BILL_ON_DEMAND_CANCELLEDGridBILL_CYCLE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
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
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="V_T_BILL_ON_DEMAND_CANCELLED_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="V_T_BILL_ON_DEMAND_CANCELLED.php" forShow="True" url="V_T_BILL_ON_DEMAND_CANCELLED.php" comment="//" codePage="windows-1252"/>
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
