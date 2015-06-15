<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="7" connection="Conn" dataSource="SELECT P_SERVICE_CATEGORY_ID, CODE, VALID_FROM, VALID_TO, DESCRIPTION, MINIMUM_DURATION, MAXIMUM_DURATION, FEATURE_TYPE_CODE, SERVICE_TYPE_CODE,
FEATURE_CATEGORY_CODE, IS_RATED 
FROM V_P_SERVICE_CATEGORY
WHERE P_SERVICE_TYPE_ID = {P_SERVICE_TYPE_ID}
AND ( UPPER(CODE) LIKE UPPER('%{s_keyword}%')
OR UPPER(DESCRIPTION) LIKE UPPER('%{s_keyword}%')
OR MINIMUM_DURATION LIKE '%{s_keyword}%'
OR MAXIMUM_DURATION LIKE '%{s_keyword}%'
OR UPPER(FEATURE_TYPE_CODE) LIKE UPPER('%{s_keyword}%')
OR UPPER(SERVICE_TYPE_CODE) LIKE UPPER('%{s_keyword}%')
OR UPPER(FEATURE_CATEGORY_CODE) LIKE UPPER('%{s_keyword}%') ) " name="V_P_SERVICE_CATEGORY" pageSizeLimit="100" wizardCaption=" V P SERVICE CATEGORY " wizardGridType="Tabular" wizardAllowInsert="True" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No Record" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_P_SERVICE_CATEGORYCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_P_SERVICE_CATEGORYVALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_P_SERVICE_CATEGORYVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="FEATURE_TYPE_CODE" fieldSource="FEATURE_TYPE_CODE" wizardCaption="FEATURE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_P_SERVICE_CATEGORYFEATURE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_TYPE_CODE" fieldSource="SERVICE_TYPE_CODE" wizardCaption="SERVICE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_P_SERVICE_CATEGORYSERVICE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="35" fieldSourceType="DBColumn" dataType="Text" html="False" name="FEATURE_CATEGORY_CODE" fieldSource="FEATURE_CATEGORY_CODE" wizardCaption="FEATURE CATEGORY CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_P_SERVICE_CATEGORYFEATURE_CATEGORY_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" name="IS_RATED" fieldSource="IS_RATED" wizardCaption="IS RATED" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_P_SERVICE_CATEGORYIS_RATED">
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
				<Link id="72" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ST_NEW" PathID="V_P_SERVICE_CATEGORYST_NEW" hrefSource="p_service_category.ccp" wizardUseTemplateBlock="False" removeParameters="P_SERVICE_CATEGORY_ID">
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
				<Hidden id="75" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_CATEGORY_ID" PathID="V_P_SERVICE_CATEGORYP_SERVICE_CATEGORY_ID" fieldSource="P_SERVICE_CATEGORY_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Link id="76" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="V_P_SERVICE_CATEGORYDLink" hrefSource="p_service_category.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="77" sourceType="DataField" name="P_SERVICE_CATEGORY_ID" source="P_SERVICE_CATEGORY_ID"/>
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
				<TableParameter id="71" conditionType="Parameter" useIsNull="False" field="P_SERVICE_TYPE_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="P_SERVICE_TYPE_ID"/>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
				<TableParameter id="10" conditionType="Parameter" useIsNull="False" field="MINIMUM_DURATION" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="3"/>
				<TableParameter id="11" conditionType="Parameter" useIsNull="False" field="MAXIMUM_DURATION" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="4"/>
				<TableParameter id="12" conditionType="Parameter" useIsNull="False" field="FEATURE_TYPE_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="5"/>
				<TableParameter id="13" conditionType="Parameter" useIsNull="False" field="SERVICE_TYPE_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="6"/>
				<TableParameter id="14" conditionType="Parameter" useIsNull="False" field="FEATURE_CATEGORY_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="7" rightBrackets="1"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="157" parameterType="URL" variable="P_SERVICE_TYPE_ID" dataType="Float" parameterSource="P_SERVICE_TYPE_ID" defaultValue="0"/>
				<SQLParameter id="158" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="V_P_SERVICE_CATEGORYSearch" wizardCaption=" V P SERVICE CATEGORY " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_service_category.ccp" PathID="V_P_SERVICE_CATEGORYSearch" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
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
				<Hidden id="159" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_ID" PathID="V_P_SERVICE_CATEGORYSearchP_SERVICE_TYPE_ID">
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
		<Record id="39" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="V_P_SERVICE_CATEGORY1" dataSource="V_P_SERVICE_CATEGORY" errorSummator="Error" wizardCaption=" V P SERVICE CATEGORY " wizardFormMethod="post" PathID="V_P_SERVICE_CATEGORY1" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customUpdateType="SQL" customDeleteType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsertType="SQL" customInsert="INSERT INTO P_SERVICE_CATEGORY(
P_SERVICE_CATEGORY_ID,
CODE,
P_SERVICE_TYPE_ID,
P_FEATURE_TYPE_ID, 
P_FEATURE_CATEGORY_ID, 
VALID_FROM, 
VALID_TO,
UPDATE_DATE, 
UPDATE_BY,
DESCRIPTION, 
MINIMUM_DURATION, 
MAXIMUM_DURATION, 
IS_RATED
) VALUES(
GENERATE_ID('BILLDB','P_SERVICE_CATEGORY','P_SERVICE_CATEGORY_ID'),
UPPER('{CODE}'),
{P_SERVICE_TYPE_ID},
{P_FEATURE_TYPE_ID}, 
{P_FEATURE_CATEGORY_ID}, 
'{VALID_FROM}', 
'{VALID_TO}', 
SYSDATE,
'{UPDATE_BY}', 
'{DESCRIPTION}', 
{MINIMUM_DURATION},
'{MAXIMUM_DURATION}', 
'{IS_RATED}'
 )" customUpdate="UPDATE P_SERVICE_CATEGORY SET 
CODE=UPPER('{CODE}'), 
P_FEATURE_TYPE_ID={P_FEATURE_TYPE_ID}, 
P_FEATURE_CATEGORY_ID={P_FEATURE_CATEGORY_ID}, 
VALID_FROM='{VALID_FROM}', 
UPDATE_DATE=SYSDATE, 
DESCRIPTION=INITCAP('{DESCRIPTION}'),  
VALID_TO='{VALID_TO}', 
MINIMUM_DURATION={MINIMUM_DURATION}, 
MAXIMUM_DURATION={MAXIMUM_DURATION}, 
IS_RATED='{IS_RATED}', 
UPDATE_BY='{UPDATE_BY}'
WHERE  
P_SERVICE_CATEGORY_ID = {P_SERVICE_CATEGORY_ID}" customDelete="DELETE FROM P_SERVICE_CATEGORY WHERE  P_SERVICE_CATEGORY_ID = {P_SERVICE_CATEGORY_ID}">
			<Components>
				<Button id="40" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="V_P_SERVICE_CATEGORY1Button_Insert" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="41" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="V_P_SERVICE_CATEGORY1Button_Update" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="42" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="V_P_SERVICE_CATEGORY1Button_Delete" removeParameters="P_SERVICE_CATEGORY_ID">
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
				<Button id="44" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="V_P_SERVICE_CATEGORY1Button_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_SERVICE_CATEGORY1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_FEATURE_TYPE_ID" fieldSource="P_FEATURE_TYPE_ID" required="False" caption="P FEATURE TYPE ID" wizardCaption="P FEATURE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_SERVICE_CATEGORY1P_FEATURE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_FEATURE_CATEGORY_ID" fieldSource="P_FEATURE_CATEGORY_ID" required="False" caption="P FEATURE CATEGORY ID" wizardCaption="P FEATURE CATEGORY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_SERVICE_CATEGORY1P_FEATURE_CATEGORY_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_SERVICE_CATEGORY1VALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_SERVICE_CATEGORY1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="57" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_SERVICE_CATEGORY1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Hidden id="81" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_CATEGORY_ID" PathID="V_P_SERVICE_CATEGORY1P_SERVICE_CATEGORY_ID" fieldSource="P_SERVICE_CATEGORY_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="60" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FEATURE_TYPE_CODE" fieldSource="FEATURE_TYPE_CODE" required="True" caption="FEATURE TYPE CODE" wizardCaption="FEATURE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_SERVICE_CATEGORY1FEATURE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="82" name="DatePicker_UPDATE_DATE1" style="../Styles/trb/Style.css" control="VALID_FROM" PathID="V_P_SERVICE_CATEGORY1DatePicker_UPDATE_DATE1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_SERVICE_CATEGORY1VALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="83" name="DatePicker_UPDATE_DATE2" style="../Styles/trb/Style.css" control="VALID_TO" PathID="V_P_SERVICE_CATEGORY1DatePicker_UPDATE_DATE2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="58" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="MINIMUM_DURATION" fieldSource="MINIMUM_DURATION" required="False" caption="MINIMUM DURATION" wizardCaption="MINIMUM DURATION" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_SERVICE_CATEGORY1MINIMUM_DURATION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="84" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="MAXIMUM_DURATION" PathID="V_P_SERVICE_CATEGORY1MAXIMUM_DURATION" fieldSource="MAXIMUM_DURATION" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="64" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_RATED" fieldSource="IS_RATED" required="False" caption="IS RATED" wizardCaption="IS RATED" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_SERVICE_CATEGORY1IS_RATED" sourceType="ListOfValues" connection="Conn" _valueOfList="N" _nameOfList="No" dataSource="Y;Yes;N;No">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_SERVICE_CATEGORY1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FEATURE_CATEGORY_CODE" fieldSource="FEATURE_CATEGORY_CODE" required="True" caption="FEATURE CATEGORY CODE" wizardCaption="FEATURE CATEGORY CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_SERVICE_CATEGORY1FEATURE_CATEGORY_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="106" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_ID" PathID="V_P_SERVICE_CATEGORY1P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID">
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
				<TableParameter id="45" conditionType="Parameter" useIsNull="False" field="P_SERVICE_CATEGORY_ID" parameterSource="P_SERVICE_CATEGORY_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="107" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<SQLParameter id="108" variable="P_FEATURE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
				<SQLParameter id="109" variable="P_FEATURE_CATEGORY_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_CATEGORY_ID"/>
				<SQLParameter id="110" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="112" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="115" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="116" variable="MINIMUM_DURATION" dataType="Float" parameterType="Control" parameterSource="MINIMUM_DURATION"/>
				<SQLParameter id="118" variable="IS_RATED" dataType="Text" parameterType="Control" parameterSource="IS_RATED"/>
				<SQLParameter id="119" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="120" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Text" parameterSource="P_SERVICE_TYPE_ID"/>
				<SQLParameter id="125" variable="MAXIMUM_DURATION" dataType="Text" parameterType="Control" parameterSource="MAXIMUM_DURATION"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="91" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="92" field="P_FEATURE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
				<CustomParameter id="93" field="P_FEATURE_CATEGORY_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_CATEGORY_ID"/>
				<CustomParameter id="94" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="95" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="96" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="97" field="P_SERVICE_CATEGORY_ID" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_CATEGORY_ID"/>
				<CustomParameter id="98" field="FEATURE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="FEATURE_TYPE_CODE"/>
				<CustomParameter id="99" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="100" field="MINIMUM_DURATION" dataType="Float" parameterType="Control" parameterSource="MINIMUM_DURATION"/>
				<CustomParameter id="101" field="MAXIMUM_DURATION" dataType="Text" parameterType="Control" parameterSource="MAXIMUM_DURATION"/>
				<CustomParameter id="102" field="IS_RATED" dataType="Text" parameterType="Control" parameterSource="IS_RATED"/>
				<CustomParameter id="103" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="104" field="FEATURE_CATEGORY_CODE" dataType="Text" parameterType="Control" parameterSource="FEATURE_CATEGORY_CODE"/>
				<CustomParameter id="121" field="P_SERVICE_TYPE_ID" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="142" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<SQLParameter id="143" variable="P_FEATURE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
				<SQLParameter id="144" variable="P_FEATURE_CATEGORY_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_CATEGORY_ID"/>
				<SQLParameter id="145" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="147" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="148" variable="P_SERVICE_CATEGORY_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_CATEGORY_ID" defaultValue="0"/>
				<SQLParameter id="150" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="151" variable="MINIMUM_DURATION" dataType="Float" parameterType="Control" parameterSource="MINIMUM_DURATION"/>
				<SQLParameter id="152" variable="MAXIMUM_DURATION" dataType="Float" parameterType="Control" parameterSource="MAXIMUM_DURATION"/>
				<SQLParameter id="153" variable="IS_RATED" dataType="Text" parameterType="Control" parameterSource="IS_RATED"/>
				<SQLParameter id="154" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="126" conditionType="Parameter" useIsNull="False" field="P_SERVICE_CATEGORY_ID" dataType="Float" parameterType="URL" parameterSource="P_SERVICE_CATEGORY_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="127" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="128" field="P_FEATURE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
				<CustomParameter id="129" field="P_FEATURE_CATEGORY_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_CATEGORY_ID"/>
				<CustomParameter id="130" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="131" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="132" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="133" field="P_SERVICE_CATEGORY_ID" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_CATEGORY_ID"/>
				<CustomParameter id="134" field="FEATURE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="FEATURE_TYPE_CODE"/>
				<CustomParameter id="135" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="136" field="MINIMUM_DURATION" dataType="Float" parameterType="Control" parameterSource="MINIMUM_DURATION"/>
				<CustomParameter id="137" field="MAXIMUM_DURATION" dataType="Float" parameterType="Control" parameterSource="MAXIMUM_DURATION"/>
				<CustomParameter id="138" field="IS_RATED" dataType="Text" parameterType="Control" parameterSource="IS_RATED"/>
				<CustomParameter id="139" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="140" field="FEATURE_CATEGORY_CODE" dataType="Text" parameterType="Control" parameterSource="FEATURE_CATEGORY_CODE"/>
				<CustomParameter id="141" field="P_SERVICE_TYPE_ID" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="156" variable="P_SERVICE_CATEGORY_ID" parameterType="Control" dataType="Float" parameterSource="P_SERVICE_CATEGORY_ID" defaultValue="0"/>
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
		<CodeFile id="Code" language="PHPTemplates" name="p_service_category.php" forShow="True" url="p_service_category.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_service_category_events.php" forShow="False" comment="//" codePage="windows-1252"/>
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
