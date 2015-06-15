<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select * from p_invoice_component
where upper(code) like upper('%{s_keyword}%')" name="P_INVOICE_COMPONENT" orderBy="P_INVOICE_COMPONENT_ID" pageSizeLimit="100" wizardCaption=" P INVOICE COMPONENT " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
<Components>
<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_INVOICE_COMPONENTCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="19" fieldSourceType="DBColumn" dataType="Float" html="False" name="PAYMENT_PRIORITY" fieldSource="PAYMENT_PRIORITY" wizardCaption="PAYMENT PRIORITY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_INVOICE_COMPONENTPAYMENT_PRIORITY">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="IS_RETURNABLE" fieldSource="IS_RETURNABLE" wizardCaption="IS RETURNABLE" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_INVOICE_COMPONENTIS_RETURNABLE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_INVOICE_COMPONENTDESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="24" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Navigator>
<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_INVOICE_COMPONENT_Insert" hrefSource="p_invoice_component.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_INVOICE_COMPONENTP_INVOICE_COMPONENT_Insert" removeParameters="P_INVOICE_COMPONENT_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="47" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="48" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="49" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_INVOICE_COMPONENTDLink" hrefSource="p_invoice_component.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_INVOICE_COMPONENT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="50" sourceType="DataField" name="P_INVOICE_COMPONENT_ID" source="P_INVOICE_COMPONENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="51" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_INVOICE_COMPONENTADLink" hrefSource="p_invoice_component.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_INVOICE_COMPONENT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="52" sourceType="DataField" format="yyyy-mm-dd" name="P_INVOICE_COMPONENT_ID" source="P_INVOICE_COMPONENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_INVOICE_COMPONENT_ID" fieldSource="P_INVOICE_COMPONENT_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_invoice_component.ccp" wizardThemeItem="GridA" PathID="P_INVOICE_COMPONENTP_INVOICE_COMPONENT_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="15" sourceType="DataField" format="yyyy-mm-dd" name="P_INVOICE_COMPONENT_ID" source="P_INVOICE_COMPONENT_ID"/>
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
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<SPParameters/>
<SQLParameters>
<SQLParameter id="87" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_INVOICE_COMPONENTSearch" wizardCaption=" P INVOICE COMPONENT " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_invoice_component.ccp" PathID="P_INVOICE_COMPONENTSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="P_INVOICE_COMPONENTSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_INVOICE_COMPONENTSearchButton_DoSearch">
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
<Record id="25" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_invoice_component1" dataSource="p_invoice_component" errorSummator="Error" wizardCaption=" P Invoice Component " wizardFormMethod="post" PathID="p_invoice_component1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="ISQLParameters" customInsert="INSERT INTO P_INVOICE_COMPONENT(P_INVOICE_COMPONENT_ID, CODE, PAYMENT_PRIORITY, IS_RETURNABLE, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
VALUES
(GENERATE_ID('TRB','P_INVOICE_COMPONENT','P_INVOICE_COMPONENT_ID'),UPPER(TRIM('{CODE}')),{PAYMENT_PRIORITY},'{IS_RETURNABLE}','{DESCRIPTION}',sysdate, '{CREATED_BY}',sysdate, '{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_INVOICE_COMPONENT SET 
CODE='{CODE}',
PAYMENT_PRIORITY={PAYMENT_PRIORITY},
IS_RETURNABLE='{IS_RETURNABLE}',
DESCRIPTION='{DESCRIPTION}',
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}'
WHERE  P_INVOICE_COMPONENT_ID = {P_INVOICE_COMPONENT_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_INVOICE_COMPONENT WHERE P_INVOICE_COMPONENT_ID = {P_INVOICE_COMPONENT_ID}">
<Components>
<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_invoice_component1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PAYMENT_PRIORITY" fieldSource="PAYMENT_PRIORITY" required="True" caption="PAYMENT PRIORITY" wizardCaption="PAYMENT PRIORITY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_invoice_component1PAYMENT_PRIORITY">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_RETURNABLE" fieldSource="IS_RETURNABLE" required="True" caption="IS RETURNABLE" wizardCaption="IS RETURNABLE" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_invoice_component1IS_RETURNABLE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextArea id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_invoice_component1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_invoice_component1CREATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_invoice_component1UPDATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_invoice_component1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_invoice_component1UPDATED_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="42" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_invoice_component1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="43" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_invoice_component1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="44" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_invoice_component1Button_Delete" removeParameters="TAMBAH;s_keyword">
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
<Button id="46" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_invoice_component1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="83" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_INVOICE_COMPONENT_ID" fieldSource="P_INVOICE_COMPONENT_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_invoice_component1P_INVOICE_COMPONENT_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="P_INVOICE_COMPONENT_ID" parameterSource="P_INVOICE_COMPONENT_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="65" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="66" variable="PAYMENT_PRIORITY" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PAYMENT_PRIORITY"/>
<SQLParameter id="67" variable="IS_RETURNABLE" parameterType="Control" dataType="Text" parameterSource="IS_RETURNABLE"/>
<SQLParameter id="68" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
<SQLParameter id="69" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="86" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="57" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="58" field="PAYMENT_PRIORITY" dataType="Float" parameterType="Control" parameterSource="PAYMENT_PRIORITY"/>
<CustomParameter id="59" field="IS_RETURNABLE" dataType="Text" parameterType="Control" parameterSource="IS_RETURNABLE"/>
<CustomParameter id="60" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="61" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="62" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="63" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
<CustomParameter id="64" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="78" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="79" variable="PAYMENT_PRIORITY" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PAYMENT_PRIORITY"/>
<SQLParameter id="80" variable="IS_RETURNABLE" parameterType="Control" dataType="Text" parameterSource="IS_RETURNABLE"/>
<SQLParameter id="81" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="82" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="84" variable="P_INVOICE_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INVOICE_COMPONENT_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="70" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="71" field="PAYMENT_PRIORITY" dataType="Float" parameterType="Control" parameterSource="PAYMENT_PRIORITY"/>
<CustomParameter id="72" field="IS_RETURNABLE" dataType="Text" parameterType="Control" parameterSource="IS_RETURNABLE"/>
<CustomParameter id="73" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="74" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="75" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="76" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="77" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="85" variable="P_INVOICE_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INVOICE_COMPONENT_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_invoice_component.php" forShow="True" url="p_invoice_component.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_invoice_component_events.php" forShow="False" comment="//" codePage="windows-1252"/>
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
