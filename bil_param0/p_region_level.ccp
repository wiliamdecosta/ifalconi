<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\msu_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="p_region_level" name="P_REGION_LEVEL" orderBy="P_REGION_LEVEL_ID" pageSizeLimit="100" wizardCaption=" P REGION LEVEL " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
<Components>
<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="LEVEL_NAME" fieldSource="LEVEL_NAME" wizardCaption="LEVEL NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_REGION_LEVELLEVEL_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="21" fieldSourceType="DBColumn" dataType="Float" html="False" name="LEVEL_NUMBER" fieldSource="LEVEL_NUMBER" wizardCaption="LEVEL NUMBER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_REGION_LEVELLEVEL_NUMBER">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_REGION_LEVELDESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="25" fieldSourceType="DBColumn" dataType="Date" html="False" name="UPDATE_DATE" fieldSource="UPDATE_DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_REGION_LEVELUPDATE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="False" name="UPDATE_BY" fieldSource="UPDATE_BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_REGION_LEVELUPDATE_BY">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="28" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Navigator>
<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_REGION_LEVEL_Insert" hrefSource="p_region_level.ccp" removeParameters="P_REGION_LEVEL_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_REGION_LEVELP_REGION_LEVEL_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="47"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="48" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="49" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_REGION_LEVELDLink" hrefSource="p_region_level.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_REGION_LEVEL_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="50" sourceType="DataField" name="P_REGION_LEVEL_ID" source="P_REGION_LEVEL_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="51" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_REGION_LEVELADLink" hrefSource="p_region_level.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_REGION_LEVEL_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="52" sourceType="DataField" format="yyyy-mm-dd" name="P_REGION_LEVEL_ID" source="P_REGION_LEVEL_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_REGION_LEVEL_ID" fieldSource="P_REGION_LEVEL_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_region_level.ccp" wizardThemeItem="GridA" PathID="P_REGION_LEVELP_REGION_LEVEL_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="17" sourceType="DataField" format="yyyy-mm-dd" name="P_REGION_LEVEL_ID" source="P_REGION_LEVEL_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="53" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="54"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="LEVEL_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields>
<Field id="6" tableName="P_REGION_LEVEL" fieldName="P_REGION_LEVEL_ID"/>
<Field id="18" tableName="P_REGION_LEVEL" fieldName="LEVEL_NAME"/>
<Field id="20" tableName="P_REGION_LEVEL" fieldName="LEVEL_NUMBER"/>
<Field id="22" tableName="P_REGION_LEVEL" fieldName="DESCRIPTION"/>
<Field id="24" tableName="P_REGION_LEVEL" fieldName="UPDATE_DATE"/>
<Field id="26" tableName="P_REGION_LEVEL" fieldName="UPDATE_BY"/>
</Fields>
<SPParameters/>
<SQLParameters/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_REGION_LEVELSearch" wizardCaption=" P REGION LEVEL " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_region_level.ccp" PathID="P_REGION_LEVELSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_REGION_LEVELSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_REGION_LEVELSearchButton_DoSearch">
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
<Record id="29" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_region_level1" dataSource="p_region_level" errorSummator="Error" wizardCaption=" P Region Level " wizardFormMethod="post" PathID="p_region_level1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_REGION_LEVEL(P_REGION_LEVEL_ID,LEVEL_NAME,LEVEL_NUMBER,DESCRIPTION,UPDATE_DATE,UPDATE_BY)
VALUES
(GENERATE_ID('TRB','P_REGION_LEVEL','P_REGION_LEVEL_ID'),UPPER(TRIM('{LEVEL_NAME}')),{LEVEL_NUMBER},'{DESCRIPTION}',sysdate,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_REGION_LEVEL SET 
LEVEL_NAME='{LEVEL_NAME}',
LEVEL_NUMBER={LEVEL_NUMBER},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATE_DATE=sysdate,
UPDATE_BY='{UPDATE_BY}'
WHERE  P_REGION_LEVEL_ID = {P_REGION_LEVEL_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_REGION_LEVEL WHERE P_REGION_LEVEL_ID = {P_REGION_LEVEL_ID}">
<Components>
<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="LEVEL_NAME" fieldSource="LEVEL_NAME" required="True" caption="LEVEL NAME" wizardCaption="LEVEL NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_region_level1LEVEL_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="LEVEL_NUMBER" fieldSource="LEVEL_NUMBER" required="True" caption="LEVEL NUMBER" wizardCaption="LEVEL NUMBER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_region_level1LEVEL_NUMBER">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextArea id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_region_level1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_region_level1UPDATE_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_region_level1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="42" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_region_level1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="43" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_region_level1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="44" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_region_level1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="45"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="46" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_region_level1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="71" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_REGION_LEVEL_ID" fieldSource="P_REGION_LEVEL_ID" required="False" caption="P_REGION_LEVEL_ID" wizardCaption="LEVEL NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_region_level1P_REGION_LEVEL_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="35" conditionType="Parameter" useIsNull="False" field="P_REGION_LEVEL_ID" parameterSource="P_REGION_LEVEL_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="62" variable="LEVEL_NAME" parameterType="Control" dataType="Text" parameterSource="LEVEL_NAME"/>
<SQLParameter id="63" variable="LEVEL_NUMBER" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="LEVEL_NUMBER"/>
<SQLParameter id="64" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="65" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="57" field="LEVEL_NAME" dataType="Text" parameterType="Control" parameterSource="LEVEL_NAME"/>
<CustomParameter id="58" field="LEVEL_NUMBER" dataType="Float" parameterType="Control" parameterSource="LEVEL_NUMBER"/>
<CustomParameter id="59" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="60" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="61" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="72" variable="LEVEL_NAME" parameterType="Control" dataType="Text" parameterSource="LEVEL_NAME"/>
<SQLParameter id="73" variable="LEVEL_NUMBER" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="LEVEL_NUMBER"/>
<SQLParameter id="74" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="75" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="76" variable="P_REGION_LEVEL_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_LEVEL_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="66" field="LEVEL_NAME" dataType="Text" parameterType="Control" parameterSource="LEVEL_NAME"/>
<CustomParameter id="67" field="LEVEL_NUMBER" dataType="Float" parameterType="Control" parameterSource="LEVEL_NUMBER"/>
<CustomParameter id="68" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="69" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="70" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="77" variable="P_REGION_LEVEL_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_LEVEL_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_region_level.php" forShow="True" url="p_region_level.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_region_level_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="55"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="56"/>
</Actions>
</Event>
</Events>
</Page>
