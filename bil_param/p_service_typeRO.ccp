<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="5" connection="Conn" name="SERVICETYPE_GRID" pageSizeLimit="100" wizardCaption=" P REGION LEVEL " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no record" pasteActions="pasteActions" activeCollection="SQLParameters" dataSource="SELECT * 
FROM P_SERVICE_TYPE
WHERE 
(UPPER(CODE) LIKE UPPER('%{s_keyword}%') OR
UPPER(SERVICE_NAME) LIKE UPPER('%{s_keyword}%')
OR UPPER(DESCRIPTION) LIKE UPPER('%{s_keyword}%')
)" parameterTypeListName="ParameterTypeList">
			<Components>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="LEVEL NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="SERVICETYPE_GRIDCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_NAME" fieldSource="SERVICE_NAME" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="SERVICETYPE_GRIDSERVICE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="31" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="57" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ST_NEW" PathID="SERVICETYPE_GRIDST_NEW" hrefSource="p_service_typeRO.ccp" wizardUseTemplateBlock="False" removeParameters="P_SERVICE_TYPE_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="59" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="52" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="53" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="SERVICETYPE_GRIDDLink" hrefSource="p_service_typeRO.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="184" sourceType="DataField" name="P_SERVICE_TYPE_ID" source="P_SERVICE_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="130" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" PathID="SERVICETYPE_GRIDVALID_FROM" fieldSource="VALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="131" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" PathID="SERVICETYPE_GRIDVALID_TO" fieldSource="VALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="132" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" PathID="SERVICETYPE_GRIDDESCRIPTION" fieldSource="DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="185" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_ID" PathID="SERVICETYPE_GRIDP_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="186" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_ID2" PathID="SERVICETYPE_GRIDP_SERVICE_TYPE_ID2">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="55"/>
						<Action actionName="Set Row Style" actionCategory="General" id="56" styles="Row;AltRow"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="LEVEL_NAME" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="Form" orderNumber="1" leftBrackets="1" rightBrackets="0" parameterSource="s_keyword"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="46" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="FT_SEARCH" wizardCaption=" P REGION LEVEL " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_service_typeRO.ccp" PathID="FT_SEARCH" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="FT_SEARCHs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="61" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="FT_SEARCHButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0">
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
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_service_typeRO_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_service_typeRO.php" forShow="True" url="p_service_typeRO.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="58"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="60"/>
			</Actions>
		</Event>
	</Events>
</Page>
