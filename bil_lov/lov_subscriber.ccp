<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_lov" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT a.SERVICE_NO, a.SUBSCRIPTION_NAME, b.CODE SERVICE_TYPE_CODE, a.SUBSCRIBER_ID
FROM SUBSCRIBER a, P_SERVICE_TYPE b
WHERE a.P_SERVICE_TYPE_ID = b.P_SERVICE_TYPE_ID AND
	(UPPER(a.SERVICE_NO) LIKE UPPER('%{s_keyword}%') OR
	UPPER(a.SUBSCRIPTION_NAME) LIKE UPPER('%{s_keyword}%') OR
	UPPER(b.CODE) LIKE UPPER('%{s_keyword}%'))
" name="SUBSCRIBER" orderBy="P_COMPANY_ID" pageSizeLimit="100" wizardCaption=" P COMPANY " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records">
			<Components>
				<Hidden id="9" fieldSourceType="DBColumn" dataType="Float" html="False" name="SUBSCRIBER_ID" fieldSource="SUBSCRIBER_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="SUBSCRIBERSUBSCRIBER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="10" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_TYPE_CODE" fieldSource="SERVICE_TYPE_CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="SUBSCRIBERSERVICE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="11" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="Apricot">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="14" fieldSourceType="DBColumn" dataType="Text" html="True" name="Label1" PathID="SUBSCRIBERLabel1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_NO" PathID="SUBSCRIBERSERVICE_NO" fieldSource="SERVICE_NO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="SUBSCRIPTION_NAME" PathID="SUBSCRIBERSUBSCRIPTION_NAME" fieldSource="SUBSCRIPTION_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="15"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="6" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="17" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_COMPANYSearch" wizardCaption=" P COMPANY " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="lov_subscriber.ccp" PathID="P_COMPANYSearch" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="P_COMPANYSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_COMPANYSearchButton_DoSearch" removeParameters="TAMBAH;BATCH_CONTROL_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FORM" PathID="P_COMPANYSearchFORM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="OBJ" PathID="P_COMPANYSearchOBJ">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
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
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="lov_subscriber_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="lov_subscriber.php" forShow="True" url="lov_subscriber.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
