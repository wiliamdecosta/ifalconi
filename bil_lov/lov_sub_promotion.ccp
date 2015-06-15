<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_lov" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT SERVICE_PROMO,  SUBS_OT_PROMO_SERVICE_ID
FROM
(   
SELECT 'NULL'  as SERVICE_PROMO,      NULL  as SUBS_OT_PROMO_SERVICE_ID
FROM DUAL
UNION ALL
SELECT b.CODE SERVICE_PROMO,     a.SUBS_OT_PROMO_SERVICE_ID
FROM SUBS_OT_PROMO_SERVICE a,
    P_ONETIME_PROMOTION b
WHERE a.SUBSCRIBER_ID = {SUBSCRIBER_ID} AND
    a.P_ONETIME_PROMOTION_ID = b.P_ONETIME_PROMOTION_ID        
)
" name="PROMOTION" orderBy="P_SERVICE_TYPE_ID" pageSizeLimit="100" wizardCaption=" P SERVICE TYPE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Hidden id="9" fieldSourceType="DBColumn" dataType="Float" html="False" name="SUBS_OT_PROMO_SERVICE_ID" fieldSource="SUBS_OT_PROMO_SERVICE_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="PROMOTIONSUBS_OT_PROMO_SERVICE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="10" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_PROMO" fieldSource="SERVICE_PROMO" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="PROMOTIONSERVICE_PROMO">
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
				<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="True" name="Label1" PathID="PROMOTIONLabel1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="16"/>
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
				<SQLParameter id="18" variable="SUBSCRIBER_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="SUBSCRIBER_ID"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="PROMOTIONSearch" wizardCaption=" P SERVICE TYPE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="lov_sub_promotion.ccp" PathID="PROMOTIONSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="PROMOTIONSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="12" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="PROMOTIONSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FORM" PathID="PROMOTIONSearchFORM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="OBJ" PathID="PROMOTIONSearchOBJ">
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
		<CodeFile id="Events" language="PHPTemplates" name="lov_sub_promotion_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="lov_sub_promotion.php" forShow="True" url="lov_sub_promotion.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
