<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select * from p_billing_period_unit
where upper(code) like upper('%{s_keyword}%')" name="P_BILLING_PERIOD_UNIT" orderBy="P_BILLING_PERIOD_UNIT_ID" pageSizeLimit="100" wizardCaption=" P BILLING PERIOD UNIT " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
<Components>
<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILLING_PERIOD_UNITCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="18" fieldSourceType="DBColumn" dataType="Float" html="False" name="DAY_AMT" fieldSource="DAY_AMT" wizardCaption="DAY AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_BILLING_PERIOD_UNITDAY_AMT">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILLING_PERIOD_UNITDESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="21" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Navigator>
<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BILLING_PERIOD_UNIT_Insert" hrefSource="p_billing_period_unit.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_BILLING_PERIOD_UNITP_BILLING_PERIOD_UNIT_Insert" removeParameters="P_BILLING_PERIOD_UNIT_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="43"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="44" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="45" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_BILLING_PERIOD_UNITDLink" hrefSource="p_billing_period_unit.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_BILLING_PERIOD_UNIT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="46" sourceType="DataField" name="P_BILLING_PERIOD_UNIT_ID" source="P_BILLING_PERIOD_UNIT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="47" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_BILLING_PERIOD_UNITADLink" hrefSource="p_billing_period_unit.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_BILLING_PERIOD_UNIT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="48" sourceType="DataField" format="yyyy-mm-dd" name="P_BILLING_PERIOD_UNIT_ID" source="P_BILLING_PERIOD_UNIT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BILLING_PERIOD_UNIT_ID" fieldSource="P_BILLING_PERIOD_UNIT_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_billing_period_unit.ccp" wizardThemeItem="GridA" PathID="P_BILLING_PERIOD_UNITP_BILLING_PERIOD_UNIT_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="14" sourceType="DataField" format="yyyy-mm-dd" name="P_BILLING_PERIOD_UNIT_ID" source="P_BILLING_PERIOD_UNIT_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="49" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="50"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<SPParameters/>
<SQLParameters>
<SQLParameter id="79" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_BILLING_PERIOD_UNITSearch" wizardCaption=" P BILLING PERIOD UNIT " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_billing_period_unit.ccp" PathID="P_BILLING_PERIOD_UNITSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="P_BILLING_PERIOD_UNITSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_BILLING_PERIOD_UNITSearchButton_DoSearch">
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
<Record id="22" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_billing_period_unit1" dataSource="p_billing_period_unit" errorSummator="Error" wizardCaption=" P Billing Period Unit " wizardFormMethod="post" PathID="p_billing_period_unit1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_BILLING_PERIOD_UNIT(P_BILLING_PERIOD_UNIT_ID, CODE, DAY_AMT, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
VALUES
(GENERATE_ID('TRB','P_BILLING_PERIOD_UNIT','P_BILLING_PERIOD_UNIT_ID'),UPPER(TRIM('{CODE}')),{DAY_AMT},'{DESCRIPTION}',sysdate, '{CREATED_BY}',sysdate, '{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_BILLING_PERIOD_UNIT SET 
CODE='{CODE}',
DAY_AMT={DAY_AMT},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}'
WHERE  P_BILLING_PERIOD_UNIT_ID = {P_BILLING_PERIOD_UNIT_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_BILLING_PERIOD_UNIT WHERE P_BILLING_PERIOD_UNIT_ID = {P_BILLING_PERIOD_UNIT_ID}">
<Components>
<TextBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_billing_period_unit1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="DAY_AMT" fieldSource="DAY_AMT" required="False" caption="DAY AMT" wizardCaption="DAY AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_billing_period_unit1DAY_AMT">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextArea id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_billing_period_unit1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_billing_period_unit1CREATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_billing_period_unit1UPDATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_billing_period_unit1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_billing_period_unit1UPDATED_DATE" defaultValue="date(&quot;d-M-Y&quot;)" format="dd-mmm-yyyy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="38" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert1" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_billing_period_unit1Button_Insert1" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="39" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update1" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_billing_period_unit1Button_Update1" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="40" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete1" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_billing_period_unit1Button_Delete1" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="41"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="42" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel1" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_billing_period_unit1Button_Cancel1" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="76" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILLING_PERIOD_UNIT_ID" fieldSource="P_BILLING_PERIOD_UNIT_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_billing_period_unit1P_BILLING_PERIOD_UNIT_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="P_BILLING_PERIOD_UNIT_ID" parameterSource="P_BILLING_PERIOD_UNIT_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="60" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="61" variable="DAY_AMT" parameterType="Control" dataType="Float" parameterSource="DAY_AMT" defaultValue="0"/>
<SQLParameter id="62" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="63" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
<SQLParameter id="64" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="53" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="54" field="DAY_AMT" dataType="Float" parameterType="Control" parameterSource="DAY_AMT"/>
<CustomParameter id="55" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="56" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="57" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="58" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="59" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="72" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="73" variable="DAY_AMT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="DAY_AMT"/>
<SQLParameter id="74" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="75" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="77" variable="P_BILLING_PERIOD_UNIT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="65" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="66" field="DAY_AMT" dataType="Float" parameterType="Control" parameterSource="DAY_AMT"/>
<CustomParameter id="67" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="68" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="69" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="70" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="71" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="78" variable="P_BILLING_PERIOD_UNIT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_billing_period_unit.php" forShow="True" url="p_billing_period_unit.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_billing_period_unit_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="51"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="52"/>
</Actions>
</Event>
</Events>
</Page>
