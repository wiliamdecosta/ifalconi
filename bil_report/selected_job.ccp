<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_process" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0">
	<Components>
		<Record id="2" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="V_T_JOB_CONTROL" dataSource="SELECT * 
FROM V_T_JOB_CONTROL
WHERE JOB_CONTROL_ID = {JOB_CONTROL_ID} " errorSummator="Error" wizardCaption="View V T JOB CONTROL " wizardFormMethod="post" PathID="V_T_JOB_CONTROL" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Hidden id="4" fieldSourceType="DBColumn" dataType="Float" html="False" name="INPUT_DATA_CONTROL_ID" fieldSource="INPUT_DATA_CONTROL_ID" required="True" caption="INPUT_DATA_CONTROL_ID" wizardCaption="BATCH CONTROL ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLINPUT_DATA_CONTROL_ID" visible="Yes">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Label id="5" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_JOB_ID" fieldSource="P_JOB_ID" required="True" caption="P JOB ID" wizardCaption="P JOB ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLP_JOB_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="8" fieldSourceType="DBColumn" dataType="Date" html="False" name="START_PROCESS_DATE" fieldSource="START_PROCESS_DATE" required="False" caption="START PROCESS TIME" wizardCaption="START PROCESS TIME" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLSTART_PROCESS_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="9" fieldSourceType="DBColumn" dataType="Date" html="False" name="END_PROCESS_DATE" fieldSource="END_PROCESS_DATE" required="False" caption="END PROCESS TIME" wizardCaption="END PROCESS TIME" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLEND_PROCESS_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" name="VERIFIED_BY" fieldSource="VERIFIED_BY" required="False" caption="VERIFIED BY" wizardCaption="VERIFIED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLVERIFIED_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="JOB_CODE" fieldSource="JOB_CODE" required="False" caption="JOB CODE" wizardCaption="JOB CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLJOB_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="6" fieldSourceType="DBColumn" dataType="Float" html="False" name="JOB_CONTROL_ID" fieldSource="JOB_CONTROL_ID" required="True" caption="P PROCESS STATUS ID" wizardCaption="P PROCESS STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLJOB_CONTROL_ID" visible="Yes">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Label id="31" fieldSourceType="DBColumn" dataType="Float" html="False" name="CANCEL_COUNT" PathID="V_T_JOB_CONTROLCANCEL_COUNT" fieldSource="CANCEL_COUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="32" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_STATUS_LIST_ID" PathID="V_T_JOB_CONTROLP_STATUS_LIST_ID" fieldSource="P_STATUS_LIST_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="IS_VERIFIED" PathID="V_T_JOB_CONTROLIS_VERIFIED" fieldSource="IS_VERIFIED">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="40"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="34" fieldSourceType="DBColumn" dataType="Text" html="False" name="IS_VALID" PathID="V_T_JOB_CONTROLIS_VALID" fieldSource="IS_VALID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="42"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="35" fieldSourceType="DBColumn" dataType="Text" html="False" name="IS_CANCELLED" PathID="V_T_JOB_CONTROLIS_CANCELLED" fieldSource="IS_CANCELLED">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="41"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="True" name="btnSubmit" PathID="V_T_JOB_CONTROLbtnSubmit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="38" fieldSourceType="DBColumn" dataType="Text" html="True" name="btnCancel" PathID="V_T_JOB_CONTROLbtnCancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="39" fieldSourceType="DBColumn" dataType="Text" html="True" name="btnForce" PathID="V_T_JOB_CONTROLbtnForce">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="14" fieldSourceType="DBColumn" dataType="Date" html="False" name="VERIFIED_DATE" fieldSource="VERIFIED_DATE" required="False" caption="VERIFICATION DATE" wizardCaption="VERIFICATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLVERIFIED_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" name="INPUT_TABLE_NAME" fieldSource="INPUT_TABLE_NAME" required="True" caption="PROCEDURE NAME" wizardCaption="PROCEDURE NAME" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLINPUT_TABLE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="10" fieldSourceType="DBColumn" dataType="Float" html="False" name="INPUT_TTL_RECORD" fieldSource="INPUT_TTL_RECORD" required="False" caption="INPUT REC AMT" wizardCaption="INPUT REC AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLINPUT_TTL_RECORD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="11" fieldSourceType="DBColumn" dataType="Float" html="False" name="INPUT_TTL_CHARGE" fieldSource="INPUT_TTL_CHARGE" required="False" caption="INPUT MONEY AMT" wizardCaption="INPUT MONEY AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLINPUT_TTL_CHARGE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="7" fieldSourceType="DBColumn" dataType="Float" html="False" name="PARENT_ID" fieldSource="PARENT_ID" required="False" caption="PARENT ID" wizardCaption="PARENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLPARENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="36" fieldSourceType="DBColumn" dataType="Text" html="False" name="IS_READY_BILLED" PathID="V_T_JOB_CONTROLIS_READY_BILLED" fieldSource="IS_READY_BILLED">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="12" fieldSourceType="DBColumn" dataType="Date" html="False" name="SET_BILL_DATE" fieldSource="SET_BILL_DATE" required="False" caption="OUTPUT REC AMT" wizardCaption="OUTPUT REC AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLSET_BILL_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="13" fieldSourceType="DBColumn" dataType="Float" html="False" name="OUTPUT_MONEY_AMT" fieldSource="OUTPUT_MONEY_AMT" required="False" caption="OUTPUT MONEY AMT" wizardCaption="OUTPUT MONEY AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLOUTPUT_MONEY_AMT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" name="JOB_STATUS_CODE" fieldSource="JOB_STATUS_CODE" required="False" caption="IS OK" wizardCaption="IS OK" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLJOB_STATUS_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="PARENT_JOB_CODE" fieldSource="PARENT_JOB_CODE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLPARENT_JOB_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="OPERATOR_ID" fieldSource="OPERATOR_ID" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_T_JOB_CONTROLOPERATOR_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="43" fieldSourceType="DBColumn" dataType="Text" html="True" name="lblLOG" PathID="V_T_JOB_CONTROLlblLOG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="44" fieldSourceType="DBColumn" dataType="Text" html="False" name="INPUT_DATA_CONTROL_ID2" PathID="V_T_JOB_CONTROLINPUT_DATA_CONTROL_ID2" fieldSource="INPUT_DATA_CONTROL_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="27"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="3" conditionType="Parameter" useIsNull="False" field="JOB_CONTROL_ID" parameterSource="JOB_CONTROL_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="30" parameterType="URL" variable="JOB_CONTROL_ID" dataType="Float" parameterSource="JOB_CONTROL_ID"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="29" tableName="V_T_JOB_CONTROL" posLeft="10" posTop="10" posWidth="20" posHeight="40"/>
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
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="selected_job_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="selected_job.php" forShow="True" url="selected_job.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="28"/>
			</Actions>
		</Event>
	</Events>
</Page>
