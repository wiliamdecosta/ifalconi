<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\msu_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="p_bill_component" name="P_BILL_COMPONENT" orderBy="P_BILL_COMPONENT_ID" pageSizeLimit="100" wizardCaption=" P BILL COMPONENT " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
<Components>
<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_COMPONENTCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" name="COMPONENT_LABEL" fieldSource="COMPONENT_LABEL" wizardCaption="COMPONENT LABEL" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_COMPONENTCOMPONENT_LABEL">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="28" fieldSourceType="DBColumn" dataType="Float" html="False" name="DISPLAY_ORDER" fieldSource="DISPLAY_ORDER" wizardCaption="DISPLAY ORDER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_BILL_COMPONENTDISPLAY_ORDER">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="30" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_COMPONENTDESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="32" fieldSourceType="DBColumn" dataType="Date" html="False" name="CREATION_DATE" fieldSource="CREATION_DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_COMPONENTCREATION_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="34" fieldSourceType="DBColumn" dataType="Text" html="False" name="CREATED_BY" fieldSource="CREATED_BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_COMPONENTCREATED_BY">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="36" fieldSourceType="DBColumn" dataType="Date" html="False" name="UPDATED_DATE" fieldSource="UPDATED_DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_COMPONENTUPDATED_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="38" fieldSourceType="DBColumn" dataType="Text" html="False" name="UPDATED_BY" fieldSource="UPDATED_BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_COMPONENTUPDATED_BY">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="39" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Navigator>
<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BILL_COMPONENT_Insert" hrefSource="p_bill_component.ccp" removeParameters="P_BILL_COMPONENT_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_BILL_COMPONENTP_BILL_COMPONENT_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="57"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="58" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="59" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_BILL_COMPONENTDLink" hrefSource="p_bill_component.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_BILL_COMPONENT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="60" sourceType="DataField" name="P_BILL_COMPONENT_ID" source="P_BILL_COMPONENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="61" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_BILL_COMPONENTADLink" hrefSource="p_bill_component.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_BILL_COMPONENT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="62" sourceType="DataField" format="yyyy-mm-dd" name="P_BILL_COMPONENT_ID" source="P_BILL_COMPONENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BILL_COMPONENT_ID" fieldSource="P_BILL_COMPONENT_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_bill_component.ccp" wizardThemeItem="GridA" PathID="P_BILL_COMPONENTP_BILL_COMPONENT_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="22" sourceType="DataField" format="yyyy-mm-dd" name="P_BILL_COMPONENT_ID" source="P_BILL_COMPONENT_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="97" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="98"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="COMPONENT_LABEL" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
<TableParameter id="10" conditionType="Parameter" useIsNull="False" field="DISPLAY_ORDER" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="3"/>
<TableParameter id="11" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="4" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields>
<Field id="6" tableName="P_BILL_COMPONENT" fieldName="P_BILL_COMPONENT_ID"/>
<Field id="23" tableName="P_BILL_COMPONENT" fieldName="CODE"/>
<Field id="25" tableName="P_BILL_COMPONENT" fieldName="COMPONENT_LABEL"/>
<Field id="27" tableName="P_BILL_COMPONENT" fieldName="DISPLAY_ORDER"/>
<Field id="29" tableName="P_BILL_COMPONENT" fieldName="DESCRIPTION"/>
<Field id="31" tableName="P_BILL_COMPONENT" fieldName="CREATION_DATE"/>
<Field id="33" tableName="P_BILL_COMPONENT" fieldName="CREATED_BY"/>
<Field id="35" tableName="P_BILL_COMPONENT" fieldName="UPDATED_DATE"/>
<Field id="37" tableName="P_BILL_COMPONENT" fieldName="UPDATED_BY"/>
</Fields>
<SPParameters/>
<SQLParameters/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_BILL_COMPONENTSearch" wizardCaption=" P BILL COMPONENT " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_bill_component.ccp" PathID="P_BILL_COMPONENTSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_BILL_COMPONENTSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_BILL_COMPONENTSearchButton_DoSearch">
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
<Record id="40" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_bill_component1" dataSource="p_bill_component" errorSummator="Error" wizardCaption=" P Bill Component " wizardFormMethod="post" PathID="p_bill_component1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_BILL_COMPONENT(P_BILL_COMPONENT_ID,CODE,COMPONENT_LABEL,DISPLAY_ORDER,DESCRIPTION,CREATION_DATE,CREATED_BY,UPDATED_DATE,UPDATED_BY)
VALUES
(GENERATE_ID('TRB','P_BILL_COMPONENT','P_BILL_COMPONENT_ID'),'{CODE}','{COMPONENT_LABEL}',{DISPLAY_ORDER},'{DESCRIPTION}',sysdate,'{CREATED_BY}',sysdate,'{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_BILL_COMPONENT SET 
CODE=INITCAP(TRIM('{CODE}')),
COMPONENT_LABEL=INITCAP(TRIM('{COMPONENT_LABEL}')),
DISPLAY_ORDER={DISPLAY_ORDER},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}'
WHERE  P_BILL_COMPONENT_ID = {P_BILL_COMPONENT_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_BILL_COMPONENT WHERE P_BILL_COMPONENT_ID = {P_BILL_COMPONENT_ID}">
<Components>
<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_component1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="COMPONENT_LABEL" fieldSource="COMPONENT_LABEL" required="True" caption="COMPONENT LABEL" wizardCaption="COMPONENT LABEL" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_component1COMPONENT_LABEL">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="DISPLAY_ORDER" fieldSource="DISPLAY_ORDER" required="True" caption="DISPLAY ORDER" wizardCaption="DISPLAY ORDER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_component1DISPLAY_ORDER">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextArea id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_component1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_component1CREATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_component1UPDATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_component1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_component1UPDATED_DATE" defaultValue="date(&quot;d-M-Y&quot;)" format="dd-mmm-yyyy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="63" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_bill_component1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="64" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_bill_component1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="65" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_bill_component1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="66"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="67" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_bill_component1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="101" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_BILL_COMPONENT_ID" fieldSource="P_BILL_COMPONENT_ID" required="False" caption="P_BILL_COMPONENT_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_component1P_BILL_COMPONENT_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="46" conditionType="Parameter" useIsNull="False" field="P_BILL_COMPONENT_ID" parameterSource="P_BILL_COMPONENT_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="76" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="77" variable="COMPONENT_LABEL" parameterType="Control" dataType="Text" parameterSource="COMPONENT_LABEL"/>
<SQLParameter id="78" variable="DISPLAY_ORDER" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="DISPLAY_ORDER"/>
<SQLParameter id="79" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="80" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
<SQLParameter id="81" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="68" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="69" field="COMPONENT_LABEL" dataType="Text" parameterType="Control" parameterSource="COMPONENT_LABEL"/>
<CustomParameter id="70" field="DISPLAY_ORDER" dataType="Float" parameterType="Control" parameterSource="DISPLAY_ORDER"/>
<CustomParameter id="71" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="72" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="73" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="74" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="75" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="90" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="91" variable="COMPONENT_LABEL" parameterType="Control" dataType="Text" parameterSource="COMPONENT_LABEL"/>
<SQLParameter id="92" variable="DISPLAY_ORDER" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="DISPLAY_ORDER"/>
<SQLParameter id="93" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="94" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="95" variable="P_BILL_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_COMPONENT_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="82" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="83" field="COMPONENT_LABEL" dataType="Text" parameterType="Control" parameterSource="COMPONENT_LABEL"/>
<CustomParameter id="84" field="DISPLAY_ORDER" dataType="Float" parameterType="Control" parameterSource="DISPLAY_ORDER"/>
<CustomParameter id="85" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="86" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="87" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="88" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="89" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="96" variable="P_BILL_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_COMPONENT_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_bill_component.php" forShow="True" url="p_bill_component.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_bill_component_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="99"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="100"/>
</Actions>
</Event>
</Events>
</Page>
