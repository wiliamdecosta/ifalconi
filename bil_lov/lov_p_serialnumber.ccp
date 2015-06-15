<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_lov" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" name="SERIAL_NUMBER" orderBy="CODE" pageSizeLimit="100" wizardCaption=" P CUSTOMER SEGMENT " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT a.SERIAL_NO,
  a.CPE_LIST_ID
FROM CPE_LIST a
WHERE a.P_CPE_TYPE_ID = {P_CPE_TYPE_ID} AND
  a.P_CPE_BRAND_ID = {P_CPE_BRAND_ID}
  AND a.SERIAL_NO LIKE '%{s_keyword}%'
">
			<Components>
				<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERIAL_NO" fieldSource="SERIAL_NO" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="SERIAL_NUMBERSERIAL_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_REFERENCE_LIST_ID" fieldSource="P_REFERENCE_LIST_ID" wizardCaption="OLD CODE" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="SERIAL_NUMBERP_REFERENCE_LIST_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="20" size="5" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="True" name="Label1" PathID="SERIAL_NUMBERLabel1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="29" fieldSourceType="DBColumn" dataType="Text" name="CPE_LIST_ID" PathID="SERIAL_NUMBERCPE_LIST_ID" fieldSource="CPE_LIST_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="22"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="P_REFERENCE_LIST_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="5"/>
				<TableParameter id="6" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="7" conditionType="Parameter" useIsNull="False" field="P_REFERENCE_TYPE_ID" dataType="Float" logicOperator="Or" searchConditionType="Equal" parameterType="URL" orderNumber="2" rightBrackets="1" parameterSource="s_keyword"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="26" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
				<SQLParameter id="30" variable="P_CPE_TYPE_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="P_CPE_TYPE_ID"/>
<SQLParameter id="31" variable="P_CPE_BRAND_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="P_CPE_BRAND_ID"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Serial_NumberSearch" wizardCaption=" P CUSTOMER SEGMENT " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="lov_p_serialnumber.ccp" PathID="Serial_NumberSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="Serial_NumberSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="Serial_NumberSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FORM" PathID="Serial_NumberSearchFORM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="OBJ" PathID="Serial_NumberSearchOBJ">
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
		<CodeFile id="Events" language="PHPTemplates" name="lov_p_serialnumber_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="lov_p_serialnumber.php" forShow="True" url="lov_p_serialnumber.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
