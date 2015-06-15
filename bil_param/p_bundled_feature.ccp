<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="7" connection="Conn" name="V_P_BUNDLED_FEATURE" pageSizeLimit="100" wizardCaption=" V P SERVICE CATEGORY " wizardGridType="Tabular" wizardAllowInsert="True" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No Record" pasteActions="pasteActions" activeCollection="TableParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT * 
FROM V_P_BUNDLED_FEATURE 
WHERE 
(UPPER(CODE) LIKE UPPER('%{s_keyword}%')
OR UPPER(SERVICE_TYPE_CODE) LIKE UPPER('%{s_keyword}%')
OR UPPER(TARIFF_LOCATION_CODE) LIKE UPPER('%{s_keyword}%')
OR UPPER(DESCRIPTION) LIKE UPPER('%{s_keyword}%') )">
			<Components>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_P_BUNDLED_FEATURECODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_P_BUNDLED_FEATUREVALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_P_BUNDLED_FEATUREVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="TARIFF_LOCATION_CODE" fieldSource="TARIFF_LOCATION_CODE" wizardCaption="FEATURE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_P_BUNDLED_FEATURETARIFF_LOCATION_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_TYPE_CODE" fieldSource="SERVICE_TYPE_CODE" wizardCaption="SERVICE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_P_BUNDLED_FEATURESERVICE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="IS RATED" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_P_BUNDLED_FEATUREDESCRIPTION">
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
				<Link id="72" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ST_NEW" PathID="V_P_BUNDLED_FEATUREST_NEW" hrefSource="p_bundled_feature.ccp" wizardUseTemplateBlock="False" removeParameters="P_BUNDLED_FEATURE_ID">
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
				<Hidden id="75" fieldSourceType="DBColumn" dataType="Text" name="P_BUNDLED_FEATURE_ID" PathID="V_P_BUNDLED_FEATUREP_BUNDLED_FEATURE_ID" fieldSource="P_BUNDLED_FEATURE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Link id="76" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="V_P_BUNDLED_FEATUREDLink" hrefSource="p_bundled_feature.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="161" sourceType="DataField" name="P_BUNDLED_FEATURE_ID" source="P_BUNDLED_FEATURE_ID"/>
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
				<JoinTable id="160" tableName="V_P_BUNDLED_FEATURE" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="158" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="V_P_SERVICE_CATEGORYSearch" wizardCaption=" V P SERVICE CATEGORY " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_bundled_feature.ccp" PathID="V_P_SERVICE_CATEGORYSearch" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" PathID="V_P_SERVICE_CATEGORYSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="V_P_SERVICE_CATEGORYSearchButton_DoSearch">
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
		<Record id="39" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="V_P_BUNDLED_FEATURE1" errorSummator="Error" wizardCaption=" V P SERVICE CATEGORY " wizardFormMethod="post" PathID="V_P_BUNDLED_FEATURE1" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" dataSource="V_P_BUNDLED_FEATURE" activeTableType="V_P_BUNDLED_FEATURE" customInsertType="SQL" customInsert="INSERT INTO P_BUNDLED_FEATURE(
P_BUNDLED_FEATURE_ID, 
CODE, 
P_SERVICE_TYPE_ID, 
TARIFF_LOCATION_ID, 
VALID_FROM, 
VALID_TO, 
DESCRIPTION, 
UPDATE_DATE, 
UPDATE_BY 
) VALUES(
GENERATE_ID('BILLDB','P_BUNDLED_FEATURE','P_BUNDLED_FEATURE_ID'),
UPPER('{CODE}'), 
{P_SERVICE_TYPE_ID}, 
{TARIFF_LOCATION_ID}, 
'{VALID_FROM}', 
'{VALID_TO}',
INITCAP('{DESCRIPTION}'), 
SYSDATE,
'{UPDATE_BY}'
)" customUpdateType="SQL" customUpdate="UPDATE P_BUNDLED_FEATURE SET 
CODE=UPPER('{CODE}'), 
P_SERVICE_TYPE_ID={P_SERVICE_TYPE_ID}, 
TARIFF_LOCATION_ID={TARIFF_LOCATION_ID}, 
VALID_FROM='{VALID_FROM}', 
VALID_TO='{VALID_TO}',
DESCRIPTION='{DESCRIPTION}',  
UPDATE_DATE=SYSDATE,
UPDATE_BY='{UPDATE_BY}'
WHERE  
P_BUNDLED_FEATURE_ID = {P_BUNDLED_FEATURE_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_BUNDLED_FEATURE WHERE  P_BUNDLED_FEATURE_ID= {P_BUNDLED_FEATURE_ID}">
			<Components>
				<Button id="40" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="V_P_BUNDLED_FEATURE1Button_Insert" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="41" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="V_P_BUNDLED_FEATURE1Button_Update" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="42" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="V_P_BUNDLED_FEATURE1Button_Delete" removeParameters="P_BUNDLED_FEATURE_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="43" message="Delete Record ?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="44" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="V_P_BUNDLED_FEATURE1Button_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID" required="False" caption="P_SERVICE_TYPE_ID" wizardCaption="P FEATURE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1P_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="TARIFF_LOCATION_ID" fieldSource="TARIFF_LOCATION_ID" required="False" caption="TARIFF_LOCATION_ID" wizardCaption="P FEATURE CATEGORY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1TARIFF_LOCATION_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1VALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="57" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Hidden id="81" fieldSourceType="DBColumn" dataType="Text" name="P_BUNDLED_FEATURE_ID" PathID="V_P_BUNDLED_FEATURE1P_BUNDLED_FEATURE_ID" fieldSource="P_BUNDLED_FEATURE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="60" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SERVICE_TYPE_CODE" fieldSource="SERVICE_TYPE_CODE" required="True" caption="Service Type Code" wizardCaption="FEATURE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1SERVICE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="82" name="DatePicker_UPDATE_DATE1" style="../Styles/trb/Style.css" control="VALID_FROM" PathID="V_P_BUNDLED_FEATURE1DatePicker_UPDATE_DATE1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1VALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="83" name="DatePicker_UPDATE_DATE2" style="../Styles/trb/Style.css" control="VALID_TO" PathID="V_P_BUNDLED_FEATURE1DatePicker_UPDATE_DATE2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TARIFF_LOCATION_CODE" fieldSource="TARIFF_LOCATION_CODE" required="True" caption="Tarif Location Code" wizardCaption="FEATURE CATEGORY CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1TARIFF_LOCATION_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="85"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="86"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="87"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="88"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="89"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="90"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="163" conditionType="Parameter" useIsNull="False" field="P_BUNDLED_FEATURE_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="P_BUNDLED_FEATURE_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="162" tableName="V_P_BUNDLED_FEATURE" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="107" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<SQLParameter id="110" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="112" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="115" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="119" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="120" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
				<SQLParameter id="175" variable="TARIFF_LOCATION_ID" dataType="Float" parameterType="Control" parameterSource="TARIFF_LOCATION_ID"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="164" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE" omitIfEmpty="True"/>
				<CustomParameter id="165" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID" omitIfEmpty="True"/>
				<CustomParameter id="166" field="TARIFF_LOCATION_ID" dataType="Float" parameterType="Control" parameterSource="TARIFF_LOCATION_ID" omitIfEmpty="True"/>
				<CustomParameter id="167" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="168" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="169" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION" omitIfEmpty="True"/>
				<CustomParameter id="170" field="P_BUNDLED_FEATURE_ID" dataType="Text" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID" omitIfEmpty="True"/>
				<CustomParameter id="171" field="SERVICE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="SERVICE_TYPE_CODE" omitIfEmpty="True"/>
				<CustomParameter id="172" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="173" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY" omitIfEmpty="True"/>
				<CustomParameter id="174" field="TARIFF_LOCATION_CODE" dataType="Text" parameterType="Control" parameterSource="TARIFF_LOCATION_CODE" omitIfEmpty="True"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="142" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<SQLParameter id="145" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="147" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="150" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="154" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="188" variable="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<SQLParameter id="189" variable="TARIFF_LOCATION_ID" dataType="Float" parameterType="Control" parameterSource="TARIFF_LOCATION_ID"/>
				<SQLParameter id="191" variable="P_BUNDLED_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID" defaultValue="0"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="176" conditionType="Parameter" useIsNull="False" field="P_BUNDLED_FEATURE_ID" dataType="Float" parameterType="URL" parameterSource="P_BUNDLED_FEATURE_ID" searchConditionType="Equal" logicOperator="And"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="177" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="178" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<CustomParameter id="179" field="TARIFF_LOCATION_ID" dataType="Float" parameterType="Control" parameterSource="TARIFF_LOCATION_ID"/>
				<CustomParameter id="180" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="181" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="182" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="183" field="P_BUNDLED_FEATURE_ID" dataType="Text" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID"/>
				<CustomParameter id="184" field="SERVICE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="SERVICE_TYPE_CODE"/>
				<CustomParameter id="185" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="186" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="187" field="TARIFF_LOCATION_CODE" dataType="Text" parameterType="Control" parameterSource="TARIFF_LOCATION_CODE"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="192" variable="P_BUNDLED_FEATURE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BUNDLED_FEATURE_ID"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="155" conditionType="Parameter" useIsNull="False" field="P_SERVICE_CATEGORY_ID" dataType="Float" parameterType="URL" parameterSource="P_SERVICE_CATEGORY_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_bundled_feature_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_bundled_feature.php" forShow="True" url="p_bundled_feature.php" comment="//" codePage="windows-1252"/>
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
