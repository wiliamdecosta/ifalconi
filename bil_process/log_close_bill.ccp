<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_process" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="Basic" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="15" connection="Conn" name="LOG_PROSES" pageSizeLimit="100" wizardCaption="List of P APP ROLE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" resultSetType="parameter" dataSource="SELECT * 
FROM V_LOG_BACKGROUND_JOB_DATE
WHERE to_char(INVOICE_DATE,'dd-MON-yyyy') = '{INVOICE_DATE}' AND INPUT_DATA_CLASS_ID=35">
			<Components>
				<Navigator id="18" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="True" wizardHideDisabled="True" wizardOfText="of" wizardPageSize="False" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="50"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="5" fieldSourceType="DBColumn" dataType="Text" html="False" name="COUNTER_NO" PathID="LOG_PROSESCOUNTER_NO" fieldSource="COUNTER_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="6" fieldSourceType="DBColumn" dataType="Text" html="False" name="LOG_DATE" PathID="LOG_PROSESLOG_DATE" fieldSource="LOG_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="199" fieldSourceType="DBColumn" dataType="Text" html="False" name="LOG_MESSAGE" PathID="LOG_PROSESLOG_MESSAGE" fieldSource="LOG_MESSAGE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="212" fieldSourceType="DBColumn" dataType="Text" name="JOB_CONTROL_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="LOG_PROSESJOB_CONTROL_ID" fieldSource="JOB_CONTROL_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="219" fieldSourceType="DBColumn" dataType="Text" name="INVOICE_DATE" PathID="LOG_PROSESINVOICE_DATE" fieldSource="INVOICE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="51" styles="Row;AltRow" name="rowStyle"/>
						<Action actionName="Custom Code" actionCategory="General" id="127"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="211" conditionType="Parameter" useIsNull="True" field="JOB_CONTROL_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="JOB_CONTROL_ID"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters>
				<SPParameter id="200" parameterName="I_PERPETUAL_PROCEDURE_ID" parameterSource="PERPETUAL_PROCEDURE_ID" parameterType="URL" direction="Input" dataType="Double" dataSize="0" scale="0" precision="0"/>
				<SPParameter id="201" parameterName="I_SEARCH" parameterSource="I_SEARCH" parameterType="URL" direction="Input" dataType="Char" dataSize="4000" scale="0" precision="0"/>
				<SPParameter id="202" parameterName="O_RESULT_CODE" parameterSource="O_RESULT_CODE" parameterType="URL" direction="Output" dataType="Double" dataSize="4000" scale="0" precision="0"/>
				<SPParameter id="203" parameterName="O_RECORD_QTY" parameterSource="O_RECORD_QTY" parameterType="URL" direction="Output" dataType="Double" dataSize="4000" scale="0" precision="0"/>
				<SPParameter id="204" parameterName="O_RC_DATA" parameterSource="O_RC_DATA" parameterType="URL" direction="Output" dataType="RecordSet" dataSize="4000" scale="0" precision="0"/>
			</SPParameters>
			<SQLParameters>
				<SQLParameter id="218" parameterType="URL" variable="INVOICE_DATE" dataType="Text" parameterSource="INVOICE_DATE"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="log_close_bill_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="log_close_bill.php" forShow="True" url="log_close_bill.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="49"/>
			</Actions>
		</Event>
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
