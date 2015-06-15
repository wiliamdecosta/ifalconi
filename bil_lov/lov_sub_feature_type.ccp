<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_lov" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="BundledFeatureSearch" wizardCaption=" P CUSTOMER SEGMENT " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="lov_sub_feature_type.ccp" PathID="BundledFeatureSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="BundledFeatureSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="BundledFeatureSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FORM" PathID="BundledFeatureSearchFORM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="OBJ" PathID="BundledFeatureSearchOBJ">
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
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="BUNDLED_FEATURE" connection="Conn" dataSource="SELECT b.CODE FEATURE_TYPE_CODE,
    a.P_SERVICE_CATEGORY_ID,
    a.P_FEATURE_TYPE_ID
FROM P_SERVICE_CATEGORY a,
    P_FEATURE_TYPE b
WHERE a.P_SERVICE_TYPE_ID = {P_SERVICE_TYPE_ID} AND
    a.P_FEATURE_TYPE_ID = b.P_FEATURE_TYPE_ID AND
(	b.CODE LIKE UPPER('%{s_keyword}%'))
" orderBy="CODE" pageSizeLimit="100" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" name="FEATURE_TYPE_CODE" fieldSource="FEATURE_TYPE_CODE" PathID="BUNDLED_FEATUREFEATURE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_REFERENCE_LIST_ID" fieldSource="P_REFERENCE_LIST_ID" PathID="BUNDLED_FEATUREP_REFERENCE_LIST_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="20" size="5" type="Moving" pageSizes="1;5;10;25;50" name="Navigator">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="True" name="Label1" PathID="BUNDLED_FEATURELabel1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="29" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_CATEGORY_ID" fieldSource="P_SERVICE_CATEGORY_ID" PathID="BUNDLED_FEATUREP_SERVICE_CATEGORY_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="33" fieldSourceType="DBColumn" dataType="Float" name="P_FEATURE_TYPE_ID" PathID="BUNDLED_FEATUREP_FEATURE_TYPE_ID" fieldSource="P_FEATURE_TYPE_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="32"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="P_REFERENCE_LIST_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" parameterSource="5" logicOperator="And"/>
				<TableParameter id="6" conditionType="Parameter" useIsNull="False" field="CODE" dataType="Text" searchConditionType="Contains" parameterType="URL" parameterSource="s_keyword" logicOperator="Or" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="7" conditionType="Parameter" useIsNull="False" field="P_REFERENCE_TYPE_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" parameterSource="s_keyword" logicOperator="Or" orderNumber="2" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="26" variable="s_keyword" dataType="Text" parameterType="URL" parameterSource="s_keyword"/>
				<SQLParameter id="31" variable="P_SERVICE_TYPE_ID" dataType="Float" parameterType="URL" parameterSource="P_SERVICE_TYPE_ID" defaultValue="0"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="lov_sub_feature_type_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="lov_sub_feature_type.php" forShow="True" url="lov_sub_feature_type.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
