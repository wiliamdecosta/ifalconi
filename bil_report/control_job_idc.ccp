<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_process" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="sikm" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Record id="135" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_application" errorSummator="Error" wizardCaption="View P Application " wizardFormMethod="post" PathID="p_application" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT   a.*,
         b.CODE,
         c.FINANCE_PERIOD_CODE
  FROM   INPUT_DATA_CONTROL a, P_REFERENCE_LIST b, P_FINANCE_PERIOD c
  WHERE  a.INPUT_DATA_CLASS_ID = b.P_REFERENCE_LIST_ID
  AND    a.P_FINANCE_PERIOD_ID = c.P_FINANCE_PERIOD_ID
  AND    a.INPUT_DATA_CONTROL_ID = {INPUT_DATA_CONTROL_ID}">
			<Components>
				<Label id="136" fieldSourceType="DBColumn" dataType="Text" html="False" name="FINANCE_PERIOD_CODE" fieldSource="FINANCE_PERIOD_CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_applicationFINANCE_PERIOD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="147"/>
</Actions>
</Event>
</Events>
			<TableParameters>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="137" variable="INPUT_DATA_CONTROL_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="INPUT_DATA_CONTROL_ID"/>
			</SQLParameters>
			<JoinTables>
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
		<Label id="138" fieldSourceType="DBColumn" dataType="Text" html="True" name="Label1" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Label1">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="139" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<Attributes/>
			<Features/>
		</Label>
		<Label id="142" fieldSourceType="DBColumn" dataType="Text" html="True" name="Label3" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Label3">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="143"/>
					</Actions>
				</Event>
			</Events>
			<Attributes/>
			<Features/>
		</Label>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="control_job_idc_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="control_job_idc.php" forShow="True" url="control_job_idc.php" comment="//" codePage="windows-1252"/>
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
