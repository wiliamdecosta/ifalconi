<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="5" connection="Conn" name="FEATURETYPE_GRID" pageSizeLimit="100" wizardCaption=" P REGION LEVEL " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no record" pasteActions="pasteActions" activeCollection="SQLParameters" dataSource="SELECT * 
FROM P_FEATURE_TYPE
WHERE 
P_FEATURE_GROUP_ID = {P_FEATURE_GROUP_ID} AND
(UPPER(CODE) LIKE UPPER('%{s_keyword}%') OR
UPPER(FEATURE_NAME) LIKE UPPER('%{s_keyword}%')
OR UPPER(DESCRIPTION) LIKE UPPER('%{s_keyword}%')
)" parameterTypeListName="ParameterTypeList">
			<Components>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="LEVEL NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="FEATURETYPE_GRIDCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" name="FEATURE_NAME" fieldSource="FEATURE_NAME" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="FEATURETYPE_GRIDFEATURE_NAME">
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
								<Action actionName="Custom Code" actionCategory="General" id="57"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="FT_NEW" PathID="FEATURETYPE_GRIDFT_NEW" hrefSource="p_feature_type.ccp" wizardUseTemplateBlock="False" removeParameters="P_FEATURE_TYPE_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="59"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="52" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="53" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="FEATURETYPE_GRIDDLink" hrefSource="p_feature_type.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="143" sourceType="DataField" name="P_FEATURE_TYPE_ID" source="P_FEATURE_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_FEATURE_TYPE_ID" fieldSource="P_FEATURE_TYPE_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_feature_type.ccp" wizardThemeItem="GridA" PathID="FEATURETYPE_GRIDP_FEATURE_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="18" sourceType="DataField" format="yyyy-mm-dd" name="P_REGION_LEVEL_ID" source="P_REGION_LEVEL_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="130" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" PathID="FEATURETYPE_GRIDVALID_FROM" fieldSource="VALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="131" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" PathID="FEATURETYPE_GRIDVALID_TO" fieldSource="VALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="132" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" PathID="FEATURETYPE_GRIDDESCRIPTION" fieldSource="DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
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
				<SQLParameter id="145" variable="P_FEATURE_GROUP_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="P_FEATURE_GROUP_ID"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="FT_SEARCH" wizardCaption=" P REGION LEVEL " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_feature_type.ccp" PathID="FT_SEARCH" pasteActions="pasteActions">
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
				<Hidden id="144" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_FEATURE_GROUP_ID" PathID="FT_SEARCHP_FEATURE_GROUP_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
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
		<Record id="91" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="FEATURETYPE_RECORD" dataSource="P_FEATURE_TYPE" errorSummator="Error" wizardCaption=" P Feature Group " wizardFormMethod="post" PathID="FEATURETYPE_RECORD" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" activeCollection="DSQLParameters" parameterTypeListName="ParameterTypeList" customInsertType="SQL" customInsert="INSERT INTO P_FEATURE_TYPE(
P_FEATURE_TYPE_ID, 
CODE, 
FEATURE_NAME,
P_FEATURE_GROUP_ID, 
LISTING_NO, 
VALID_FROM, 
VALID_TO,
IS_VALUE_REQUIRED,
UPDATE_DATE, 
UPDATE_BY, 
DESCRIPTION
) VALUES(
GENERATE_ID('BILLDB','P_FEATURE_TYPE','P_FEATURE_TYPE_ID'),
UPPER('{CODE}'),
INITCAP('{FEATURE_NAME}'), 
{P_FEATURE_GROUP_ID},
'{LISTING_NO}', 
'{VALID_FROM}',
'{VALID_TO}',
'{IS_VALUE_REQUIRED}', 
SYSDATE,
'{UPDATE_BY}', 
'{DESCRIPTION}'
)" customUpdateType="SQL" customUpdate="UPDATE P_FEATURE_TYPE SET 
CODE=UPPER('{CODE}'), 
DESCRIPTION=INITCAP('{DESCRIPTION}'), 
UPDATE_DATE=SYSDATE,
UPDATE_BY='{UPDATE_BY}', 
FEATURE_NAME=INITCAP('{FEATURE_NAME}'), 
LISTING_NO='{LISTING_NO}', 
VALID_FROM='{VALID_FROM}', 
IS_VALUE_REQUIRED='{IS_VALUE_REQUIRED}',
 VALID_TO='{VALID_TO}'
WHERE P_FEATURE_TYPE_ID='{P_FEATURE_TYPE_ID}'" customDeleteType="SQL" customDelete="DELETE FROM P_FEATURE_TYPE WHERE  P_FEATURE_TYPE_ID = {P_FEATURE_TYPE_ID}">
			<Components>
				<Button id="92" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="FEATURETYPE_RECORDButton_Insert" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="93" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="FEATURETYPE_RECORDButton_Update" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="94" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="FEATURETYPE_RECORDButton_Delete" removeParameters="TAMBAH;P_FEATURE_TYPE_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="95" message="Delete Record ?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="96" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="FEATURETYPE_RECORDButton_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="98" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FEATURETYPE_RECORDCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="99" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="Description" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FEATURETYPE_RECORDDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="100" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FEATURETYPE_RECORDUPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="102" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FEATURETYPE_RECORDUPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="103" fieldSourceType="DBColumn" dataType="Text" name="P_FEATURE_TYPE_ID" PathID="FEATURETYPE_RECORDP_FEATURE_TYPE_ID" fieldSource="P_FEATURE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="136" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FEATURE_NAME" PathID="FEATURETYPE_RECORDFEATURE_NAME" fieldSource="FEATURE_NAME" caption="Feature Name">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="137" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="LISTING_NO" PathID="FEATURETYPE_RECORDLISTING_NO" fieldSource="LISTING_NO" caption="Listing No">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="138" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" caption="VALID_FROM" fieldSource="VALID_FROM" required="False" PathID="FEATURETYPE_RECORDVALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="139" name="DatePicker_UPDATE_DATE1" style="../Styles/trb/Style.css" control="VALID_FROM" PathID="FEATURETYPE_RECORDDatePicker_UPDATE_DATE1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="142" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="IS_VALUE_REQUIRED" PathID="FEATURETYPE_RECORDIS_VALUE_REQUIRED" fieldSource="IS_VALUE_REQUIRED" caption="IS VALUE REQUIRED" required="True" connection="Conn" _valueOfList="N" _nameOfList="No" dataSource="Y;Yes;N;No">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="140" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" caption="VALID_TO" fieldSource="VALID_TO" required="False" PathID="FEATURETYPE_RECORDVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="141" name="DatePicker_UPDATE_DATE2" style="../Styles/trb/Style.css" control="VALID_TO" PathID="FEATURETYPE_RECORDDatePicker_UPDATE_DATE2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Hidden id="162" fieldSourceType="DBColumn" dataType="Text" name="P_FEATURE_GROUP_ID" PathID="FEATURETYPE_RECORDP_FEATURE_GROUP_ID" fieldSource="P_FEATURE_GROUP_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="115"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="116"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="128"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="129"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="182"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="183"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="135" conditionType="Parameter" useIsNull="False" field="P_FEATURE_TYPE_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="P_FEATURE_TYPE_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="134" tableName="P_FEATURE_TYPE" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="110" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<SQLParameter id="111" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="112" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="113" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="114" variable="P_FEATURE_GROUP_ID" dataType="Float" parameterType="URL" parameterSource="P_FEATURE_GROUP_ID" defaultValue="0"/>
				<SQLParameter id="156" variable="P_FEATURE_TYPE_ID" dataType="Text" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
				<SQLParameter id="157" variable="FEATURE_NAME" dataType="Text" parameterType="Control" parameterSource="FEATURE_NAME"/>
				<SQLParameter id="158" variable="LISTING_NO" dataType="Text" parameterType="Control" parameterSource="LISTING_NO"/>
				<SQLParameter id="159" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="160" variable="IS_VALUE_REQUIRED" dataType="Text" parameterType="Control" parameterSource="IS_VALUE_REQUIRED"/>
				<SQLParameter id="161" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="146" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE" omitIfEmpty="True"/>
				<CustomParameter id="147" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION" omitIfEmpty="True"/>
				<CustomParameter id="148" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="149" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY" omitIfEmpty="True"/>
				<CustomParameter id="150" field="P_FEATURE_TYPE_ID" dataType="Text" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID" omitIfEmpty="True"/>
				<CustomParameter id="151" field="FEATURE_NAME" dataType="Text" parameterType="Control" parameterSource="FEATURE_NAME" omitIfEmpty="True"/>
				<CustomParameter id="152" field="LISTING_NO" dataType="Text" parameterType="Control" parameterSource="LISTING_NO" omitIfEmpty="True"/>
				<CustomParameter id="153" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="154" field="IS_VALUE_REQUIRED" dataType="Text" parameterType="Control" parameterSource="IS_VALUE_REQUIRED" omitIfEmpty="True"/>
				<CustomParameter id="155" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy" omitIfEmpty="True"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="123" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<SQLParameter id="124" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="125" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="126" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="174" variable="P_FEATURE_TYPE_ID" dataType="Text" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
				<SQLParameter id="175" variable="FEATURE_NAME" dataType="Text" parameterType="Control" parameterSource="FEATURE_NAME"/>
				<SQLParameter id="176" variable="LISTING_NO" dataType="Text" parameterType="Control" parameterSource="LISTING_NO"/>
				<SQLParameter id="177" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="178" variable="IS_VALUE_REQUIRED" dataType="Text" parameterType="Control" parameterSource="IS_VALUE_REQUIRED"/>
				<SQLParameter id="179" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="117" conditionType="Parameter" useIsNull="False" field="P_FEATURE_GROUP_ID" dataType="Float" parameterType="URL" parameterSource="P_FEATURE_GROUP_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="163" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="164" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="165" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="166" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="167" field="P_FEATURE_TYPE_ID" dataType="Text" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
				<CustomParameter id="168" field="FEATURE_NAME" dataType="Text" parameterType="Control" parameterSource="FEATURE_NAME"/>
				<CustomParameter id="169" field="LISTING_NO" dataType="Text" parameterType="Control" parameterSource="LISTING_NO"/>
				<CustomParameter id="170" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="171" field="IS_VALUE_REQUIRED" dataType="Text" parameterType="Control" parameterSource="IS_VALUE_REQUIRED"/>
				<CustomParameter id="172" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="173" field="P_FEATURE_GROUP_ID" dataType="Text" parameterType="Control" parameterSource="P_FEATURE_GROUP_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="181" variable="P_FEATURE_TYPE_ID" parameterType="Control" dataType="Float" parameterSource="P_FEATURE_TYPE_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="180" conditionType="Parameter" useIsNull="False" field="P_FEATURE_TYPE_ID" dataType="Float" parameterType="URL" parameterSource="P_FEATURE_TYPE_ID" searchConditionType="Equal" logicOperator="And"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_feature_type_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_feature_type.php" forShow="True" url="p_feature_type.php" comment="//" codePage="windows-1252"/>
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
