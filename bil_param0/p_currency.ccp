<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\msu_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="p_currency" name="P_CURRENCY" orderBy="P_CURRENCY_ID" pageSizeLimit="100" wizardCaption=" P CURRENCY " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
<Components>
<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CURRENCYCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" name="CURRENCY_LABEL" fieldSource="CURRENCY_LABEL" wizardCaption="CURRENCY LABEL" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CURRENCYCURRENCY_LABEL">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="26" fieldSourceType="DBColumn" dataType="Float" html="False" name="DIGIT_POINT" fieldSource="DIGIT_POINT" wizardCaption="DIGIT POINT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_CURRENCYDIGIT_POINT">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="28" fieldSourceType="DBColumn" dataType="Float" html="False" name="ROUND_UNIT" fieldSource="ROUND_UNIT" wizardCaption="ROUND UNIT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_CURRENCYROUND_UNIT">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="30" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CURRENCYDESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="31" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Navigator>
<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_CURRENCY_Insert" hrefSource="p_currency.ccp" removeParameters="P_CURRENCY_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_CURRENCYP_CURRENCY_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="54"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="55" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="60" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_CURRENCYDLink" hrefSource="p_currency.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_CURRENCY_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="48" sourceType="DataField" name="P_CURRENCY_ID" source="P_CURRENCY_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="61" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_CURRENCYADLink" hrefSource="p_currency.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_CURRENCY_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="62" sourceType="DataField" format="yyyy-mm-dd" name="P_CURRENCY_ID" source="P_CURRENCY_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_CURRENCY_ID" fieldSource="P_CURRENCY_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_currency.ccp" wizardThemeItem="GridA" PathID="P_CURRENCYP_CURRENCY_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="20" sourceType="DataField" format="yyyy-mm-dd" name="P_CURRENCY_ID" source="P_CURRENCY_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="56" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="57"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="CURRENCY_LABEL" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
<TableParameter id="10" conditionType="Parameter" useIsNull="False" field="DIGIT_POINT" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="3"/>
<TableParameter id="11" conditionType="Parameter" useIsNull="False" field="ROUND_UNIT" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="4"/>
<TableParameter id="12" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="5" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields>
<Field id="6" tableName="P_CURRENCY" fieldName="P_CURRENCY_ID"/>
<Field id="21" tableName="P_CURRENCY" fieldName="CODE"/>
<Field id="23" tableName="P_CURRENCY" fieldName="CURRENCY_LABEL"/>
<Field id="25" tableName="P_CURRENCY" fieldName="DIGIT_POINT"/>
<Field id="27" tableName="P_CURRENCY" fieldName="ROUND_UNIT"/>
<Field id="29" tableName="P_CURRENCY" fieldName="DESCRIPTION"/>
</Fields>
<SPParameters/>
<SQLParameters/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_CURRENCYSearch" wizardCaption=" P CURRENCY " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_currency.ccp" PathID="P_CURRENCYSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" PathID="P_CURRENCYSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_CURRENCYSearchButton_DoSearch">
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
<Record id="32" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_currency1" dataSource="p_currency" errorSummator="Error" wizardCaption=" P Currency " wizardFormMethod="post" PathID="p_currency1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_CURRENCY(P_CURRENCY_ID,CODE,CURRENCY_LABEL,DIGIT_POINT,ROUND_UNIT,DESCRIPTION,CREATION_DATE,CREATED_BY,UPDATED_DATE,UPDATED_BY)
VALUES
(GENERATE_ID('TRB','P_CURRENCY','P_CURRENCY_ID'),UPPER(TRIM('{CODE}')),'{CURRENCY_LABEL}',{DIGIT_POINT},{ROUND_UNIT},'{DESCRIPTION}',sysdate,'{CREATED_BY}',sysdate,'{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_CURRENCY SET 
CODE=UPPER(TRIM('{CODE}')),
CURRENCY_LABEL='{CURRENCY_LABEL}',
DIGIT_POINT={DIGIT_POINT},
ROUND_UNIT={ROUND_UNIT},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}'
WHERE  P_CURRENCY_ID = {P_CURRENCY_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_CURRENCY WHERE P_CURRENCY_ID = {P_CURRENCY_ID}">
<Components>
<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_currency1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CURRENCY_LABEL" fieldSource="CURRENCY_LABEL" required="True" caption="CURRENCY LABEL" wizardCaption="CURRENCY LABEL" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_currency1CURRENCY_LABEL">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="DIGIT_POINT" fieldSource="DIGIT_POINT" required="True" caption="DIGIT POINT" wizardCaption="DIGIT POINT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_currency1DIGIT_POINT">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="ROUND_UNIT" fieldSource="ROUND_UNIT" required="True" caption="ROUND UNIT" wizardCaption="ROUND UNIT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_currency1ROUND_UNIT">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_currency1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_currency1CREATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_currency1UPDATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_currency1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_currency1UPDATED_DATE" defaultValue="date(&quot;d-M-Y&quot;)" format="dd-mmm-yyyy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="50" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert1" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_currency1Button_Insert1" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="51" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update1" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_currency1Button_Update1" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="52" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete1" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_currency1Button_Delete1" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="45" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="53" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel1" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_currency1Button_Cancel1" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_CURRENCY_ID" fieldSource="P_CURRENCY_ID" required="False" caption="P_CURRENCY_ID" wizardCaption="CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_currency1P_CURRENCY_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="38" conditionType="Parameter" useIsNull="False" field="P_CURRENCY_ID" parameterSource="P_CURRENCY_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="72" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="73" variable="CURRENCY_LABEL" parameterType="Control" dataType="Text" parameterSource="CURRENCY_LABEL"/>
<SQLParameter id="74" variable="DIGIT_POINT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="DIGIT_POINT"/>
<SQLParameter id="75" variable="ROUND_UNIT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="ROUND_UNIT"/>
<SQLParameter id="76" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="77" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
<SQLParameter id="78" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="63" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="64" field="CURRENCY_LABEL" dataType="Text" parameterType="Control" parameterSource="CURRENCY_LABEL"/>
<CustomParameter id="65" field="DIGIT_POINT" dataType="Float" parameterType="Control" parameterSource="DIGIT_POINT"/>
<CustomParameter id="66" field="ROUND_UNIT" dataType="Float" parameterType="Control" parameterSource="ROUND_UNIT"/>
<CustomParameter id="67" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="68" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="69" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="70" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="71" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="90" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="91" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="92" variable="CURRENCY_LABEL" parameterType="Control" dataType="Text" parameterSource="CURRENCY_LABEL"/>
<SQLParameter id="93" variable="DIGIT_POINT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="DIGIT_POINT"/>
<SQLParameter id="94" variable="ROUND_UNIT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="ROUND_UNIT"/>
<SQLParameter id="95" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="96" variable="P_CURRENCY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CURRENCY_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="80" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="81" field="CURRENCY_LABEL" dataType="Text" parameterType="Control" parameterSource="CURRENCY_LABEL"/>
<CustomParameter id="82" field="DIGIT_POINT" dataType="Float" parameterType="Control" parameterSource="DIGIT_POINT"/>
<CustomParameter id="83" field="ROUND_UNIT" dataType="Float" parameterType="Control" parameterSource="ROUND_UNIT"/>
<CustomParameter id="84" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="85" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="86" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="87" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="88" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="89" field="P_CURRENCY_ID" dataType="Text" parameterType="Control" parameterSource="P_CURRENCY_ID"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="97" variable="P_CURRENCY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CURRENCY_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_currency.php" forShow="True" url="p_currency.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_currency_events.php" forShow="False" comment="//" codePage="windows-1252"/>
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
<Action actionName="Custom Code" actionCategory="General" id="59"/>
</Actions>
</Event>
</Events>
</Page>
