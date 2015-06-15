<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="7" connection="Conn" name="P_DETAIL_FEATURE" pageSizeLimit="100" wizardCaption=" V P SERVICE CATEGORY " wizardGridType="Tabular" wizardAllowInsert="True" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No Record" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT * 
FROM V_P_BUNDLED_FEATURE_DETAIL
WHERE P_BUNDLED_FEATURE_ID = {P_BUNDLED_FEATURE_ID}">
			<Components>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="FEATURE_TYPE_CODE" fieldSource="FEATURE_TYPE_CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_DETAIL_FEATUREFEATURE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_DETAIL_FEATUREVALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_DETAIL_FEATUREVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="FEATURE_GROUP_CODE" fieldSource="FEATURE_GROUP_CODE" wizardCaption="SERVICE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_DETAIL_FEATUREFEATURE_GROUP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="IS RATED" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_DETAIL_FEATUREDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="65" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="66"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="72" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ST_NEW" PathID="P_DETAIL_FEATUREST_NEW" hrefSource="p_detail_feature.ccp" wizardUseTemplateBlock="False" removeParameters="P_BUNDLED_FEATURE_DETAIL_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="73"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="105" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="75" fieldSourceType="DBColumn" dataType="Text" name="P_BUNDLED_FEATURE_DETAIL_ID" PathID="P_DETAIL_FEATUREP_BUNDLED_FEATURE_DETAIL_ID" fieldSource="P_BUNDLED_FEATURE_DETAIL_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Link id="76" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_DETAIL_FEATUREDLink" hrefSource="p_detail_feature.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="216" sourceType="DataField" name="P_BUNDLED_FEATURE_DETAIL_ID" source="P_BUNDLED_FEATURE_DETAIL_ID"/>
</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="78"/>
						<Action actionName="Set Row Style" actionCategory="General" id="15" styles="Row;AltRow" name="rowStyle"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="158" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
				<SQLParameter id="206" variable="P_BUNDLED_FEATURE_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="P_BUNDLED_FEATURE_ID"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="217" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_DETAIL_FEATURE1" dataSource="V_P_BUNDLED_FEATURE_DETAIL" errorSummator="Error" wizardCaption=" V P BUNDLED FEATURE DETAIL " wizardFormMethod="post" PathID="P_DETAIL_FEATURE1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_BUNDLED_FEATURE_DETAIL(
P_BUNDLED_FEATURE_DETAIL_ID, 
P_BUNDLED_FEATURE_ID,
P_FEATURE_TYPE_ID,
VALID_FROM, 
VALID_TO, 
DESCRIPTION, 
UPDATE_DATE, 
UPDATE_BY
) VALUES(
GENERATE_ID('BILLDB','P_BUNDLED_FEATURE_DETAIL','P_BUNDLED_FEATURE_DETAIL_ID'),
{P_BUNDLED_FEATURE_ID},
 {P_FEATURE_TYPE_ID},
 '{VALID_FROM}', 
 '{VALID_TO}',
 INITCAP('{DESCRIPTION}'), 
SYSDATE, 
'{UPDATE_BY}'
)" customUpdateType="SQL" customUpdate="UPDATE P_BUNDLED_FEATURE_DETAIL SET 
 P_FEATURE_TYPE_ID={P_FEATURE_TYPE_ID},
 VALID_FROM='{VALID_FROM}',
 VALID_TO='{VALID_TO}',
 DESCRIPTION=INITCAP('{DESCRIPTION}'), 
UPDATE_DATE=SYSDATE,
 UPDATE_BY='{UPDATE_BY}'
WHERE  
P_BUNDLED_FEATURE_DETAIL_ID = {P_BUNDLED_FEATURE_DETAIL_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_BUNDLED_FEATURE_DETAIL WHERE  P_BUNDLED_FEATURE_DETAIL_ID = {P_BUNDLED_FEATURE_DETAIL_ID}">
<Components>
<Button id="218" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="P_DETAIL_FEATURE1Button_Insert" removeParameters="TAMBAH">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<Button id="219" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="P_DETAIL_FEATURE1Button_Update" removeParameters="TAMBAH">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<Button id="220" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="P_DETAIL_FEATURE1Button_Delete" removeParameters="P_BUNDLED_FEATURE_DETAIL_ID">
<Components/>
<Events>
<Event name="OnClick" type="Client">
<Actions>
<Action actionName="Confirmation Message" actionCategory="General" id="221"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Button>
<Button id="222" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="P_DETAIL_FEATURE1Button_Cancel" removeParameters="TAMBAH">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<TextBox id="224" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BUNDLED_FEATURE_ID" fieldSource="P_BUNDLED_FEATURE_ID" required="True" caption="P BUNDLED FEATURE ID" wizardCaption="P BUNDLED FEATURE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_DETAIL_FEATURE1P_BUNDLED_FEATURE_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="225" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_FEATURE_TYPE_ID" fieldSource="P_FEATURE_TYPE_ID" required="True" caption="P FEATURE TYPE ID" wizardCaption="P FEATURE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_DETAIL_FEATURE1P_FEATURE_TYPE_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_DETAIL_FEATURE1VALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_DETAIL_FEATURE1VALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextArea id="57" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_DETAIL_FEATURE1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_DETAIL_FEATURE1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_DETAIL_FEATURE1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<DatePicker id="82" name="DatePicker_UPDATE_DATE1" style="../Styles/trb/Style.css" control="VALID_FROM" PathID="P_DETAIL_FEATURE1DatePicker_UPDATE_DATE1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
<DatePicker id="83" name="DatePicker_UPDATE_DATE2" style="../Styles/trb/Style.css" control="VALID_TO" PathID="P_DETAIL_FEATURE1DatePicker_UPDATE_DATE2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FEATURE_TYPE_CODE" fieldSource="FEATURE_TYPE_CODE" required="True" caption="FEATURE TYPE CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_DETAIL_FEATURE1FEATURE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="236" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FEATURE_GROUP_CODE" PathID="P_DETAIL_FEATURE1FEATURE_GROUP_CODE" fieldSource="FEATURE_GROUP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="237" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_ID" PathID="P_DETAIL_FEATURE1P_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<Hidden id="280" fieldSourceType="DBColumn" dataType="Text" name="P_BUNDLED_FEATURE_DETAIL_ID" PathID="P_DETAIL_FEATURE1P_BUNDLED_FEATURE_DETAIL_ID" fieldSource="P_BUNDLED_FEATURE_DETAIL_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events>
<Event name="BeforeExecuteInsert" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="254"/>
</Actions>
</Event>
<Event name="AfterExecuteInsert" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="255"/>
</Actions>
</Event>
<Event name="BeforeExecuteUpdate" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="256"/>
</Actions>
</Event>
<Event name="AfterExecuteUpdate" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="257"/>
</Actions>
</Event>
<Event name="BeforeExecuteDelete" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="258"/>
</Actions>
</Event>
<Event name="AfterExecuteDelete" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="259"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="223" conditionType="Parameter" useIsNull="False" field="P_BUNDLED_FEATURE_DETAIL_ID" parameterSource="P_BUNDLED_FEATURE_DETAIL_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="247" variable="P_BUNDLED_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID"/>
<SQLParameter id="248" variable="P_FEATURE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
<SQLParameter id="249" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
<SQLParameter id="250" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
<SQLParameter id="251" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<SQLParameter id="252" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="253" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="238" field="P_BUNDLED_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID"/>
<CustomParameter id="239" field="P_FEATURE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
<CustomParameter id="240" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
<CustomParameter id="241" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
<CustomParameter id="242" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="243" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="244" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="245" field="FEATURE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="FEATURE_TYPE_CODE"/>
<CustomParameter id="246" field="FEATURE_GROUP_CODE" dataType="Text" parameterType="Control" parameterSource="FEATURE_GROUP_CODE"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="271" variable="P_FEATURE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
<SQLParameter id="272" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
<SQLParameter id="273" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
<SQLParameter id="274" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<SQLParameter id="276" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
<SQLParameter id="279" variable="P_BUNDLED_FEATURE_DETAIL_ID" parameterType="Control" dataType="Float" parameterSource="P_BUNDLED_FEATURE_DETAIL_ID" defaultValue="0"/>
</USQLParameters>
<UConditions>
<TableParameter id="260" conditionType="Parameter" useIsNull="False" field="P_BUNDLED_FEATURE_DETAIL_ID" dataType="Float" parameterType="URL" parameterSource="P_BUNDLED_FEATURE_DETAIL_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
</UConditions>
<UFormElements>
<CustomParameter id="261" field="P_BUNDLED_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID"/>
<CustomParameter id="262" field="P_FEATURE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
<CustomParameter id="263" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
<CustomParameter id="264" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
<CustomParameter id="265" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="266" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="267" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="268" field="FEATURE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="FEATURE_TYPE_CODE"/>
<CustomParameter id="269" field="FEATURE_GROUP_CODE" dataType="Text" parameterType="Control" parameterSource="FEATURE_GROUP_CODE"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="282" variable="P_BUNDLED_FEATURE_DETAIL_ID" parameterType="Control" dataType="Float" parameterSource="P_BUNDLED_FEATURE_DETAIL_ID" defaultValue="0"/>
</DSQLParameters>
<DConditions>
<TableParameter id="281" conditionType="Parameter" useIsNull="False" field="P_BUNDLED_FEATURE_DETAIL_ID" dataType="Float" parameterType="URL" parameterSource="P_BUNDLED_FEATURE_DETAIL_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
</DConditions>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_detail_feature_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_detail_feature.php" forShow="True" url="p_detail_feature.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="79"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="80"/>
			</Actions>
		</Event>
	</Events>
</Page>
