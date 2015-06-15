<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,b.code as P_BILL_COMPONENT_NAME, c.code as P_SERVICE_TYPE_NAME,
d.code as  P_INVOICE_COMPONENT_NAME
from p_bill_invoice_comp_map a ,
P_BILL_COMPONENT b, P_SERVICE_TYPE c, P_INVOICE_COMPONENT d
where a.P_BILL_COMPONENT_ID=b.P_BILL_COMPONENT_ID
and a.P_SERVICE_TYPE_ID=c.P_SERVICE_TYPE_ID
and a.P_INVOICE_COMPONENT_ID=d.P_INVOICE_COMPONENT_ID" name="P_BILL_INVOICE_COMP_MAP" orderBy="P_BILL_INVOICE_COMP_MAP_ID" pageSizeLimit="100" wizardCaption=" P BILL INVOICE COMP MAP " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
<Components>
<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_BILL_COMPONENT_NAME" fieldSource="P_BILL_COMPONENT_NAME" wizardCaption="P BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_BILL_INVOICE_COMP_MAPP_BILL_COMPONENT_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_SERVICE_TYPE_NAME" fieldSource="P_SERVICE_TYPE_NAME" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_BILL_INVOICE_COMP_MAPP_SERVICE_TYPE_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_INVOICE_COMPONENT_NAME" fieldSource="P_INVOICE_COMPONENT_NAME" wizardCaption="P INVOICE COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_BILL_INVOICE_COMP_MAPP_INVOICE_COMPONENT_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_INVOICE_COMP_MAPDESCRIPTION">
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
<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BILL_INVOICE_COMP_MAP_Insert" hrefSource="p_bill_invoice_comp_map.ccp" removeParameters="P_BILL_INVOICE_COMP_MAP_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_BILL_INVOICE_COMP_MAPP_BILL_INVOICE_COMP_MAP_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="53"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="54" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="55" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_BILL_INVOICE_COMP_MAPDLink" hrefSource="p_bill_invoice_comp_map.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_BILL_INVOICE_COMP_MAP_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="56" sourceType="DataField" name="P_BILL_INVOICE_COMP_MAP_ID" source="P_BILL_INVOICE_COMP_MAP_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="57" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_BILL_INVOICE_COMP_MAPADLink" hrefSource="p_bill_invoice_comp_map.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_BILL_INVOICE_COMP_MAP_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="58" sourceType="DataField" format="yyyy-mm-dd" name="P_BILL_INVOICE_COMP_MAP_ID" source="P_BILL_INVOICE_COMP_MAP_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BILL_INVOICE_COMP_MAP_ID" fieldSource="P_BILL_INVOICE_COMP_MAP_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_bill_invoice_comp_map.ccp" wizardThemeItem="GridA" PathID="P_BILL_INVOICE_COMP_MAPP_BILL_INVOICE_COMP_MAP_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="15" sourceType="DataField" format="yyyy-mm-dd" name="P_BILL_INVOICE_COMP_MAP_ID" source="P_BILL_INVOICE_COMP_MAP_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="59" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="60"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<SPParameters/>
<SQLParameters>
<SQLParameter id="47" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_BILL_INVOICE_COMP_MAPSearch" wizardCaption=" P BILL INVOICE COMP MAP " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_bill_invoice_comp_map.ccp" PathID="P_BILL_INVOICE_COMP_MAPSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" PathID="P_BILL_INVOICE_COMP_MAPSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_BILL_INVOICE_COMP_MAPSearchButton_DoSearch">
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
<Record id="25" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_bill_invoice_comp_map1" errorSummator="Error" wizardCaption=" P Bill Invoice Comp Map " wizardFormMethod="post" PathID="p_bill_invoice_comp_map1" pasteActions="pasteActions" activeCollection="DSQLParameters" parameterTypeListName="ParameterTypeList" dataSource="select a.*,b.code as P_BILL_COMPONENT_NAME, c.code as P_SERVICE_TYPE_NAME,
d.code as  P_INVOICE_COMPONENT_NAME
from p_bill_invoice_comp_map a ,
P_BILL_COMPONENT b, P_SERVICE_TYPE c, P_INVOICE_COMPONENT d
where a.P_BILL_COMPONENT_ID=b.P_BILL_COMPONENT_ID
and a.P_SERVICE_TYPE_ID=c.P_SERVICE_TYPE_ID
and a.P_INVOICE_COMPONENT_ID=d.P_INVOICE_COMPONENT_ID
and a.P_BILL_INVOICE_COMP_MAP_ID={P_BILL_INVOICE_COMP_MAP_ID}
and a.P_BILL_INVOICE_COMP_MAP_ID = {P_BILL_INVOICE_COMP_MAP_ID} " customInsertType="SQL" customInsert="INSERT INTO P_BILL_INVOICE_COMP_MAP(P_BILL_INVOICE_COMP_MAP_ID, P_BILL_COMPONENT_ID, P_SERVICE_TYPE_ID, P_INVOICE_COMPONENT_ID, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
VALUES
(GENERATE_ID('TRB','P_BILL_INVOICE_COMP_MAP','P_BILL_INVOICE_COMP_MAP_ID'),{P_BILL_COMPONENT_ID},{P_SERVICE_TYPE_ID},{P_INVOICE_COMPONENT_ID},'{DESCRIPTION}',sysdate, '{CREATED_BY}',sysdate, '{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_BILL_INVOICE_COMP_MAP SET 
P_BILL_COMPONENT_ID={P_BILL_COMPONENT_ID},
P_SERVICE_TYPE_ID={P_SERVICE_TYPE_ID},
P_INVOICE_COMPONENT_ID={P_INVOICE_COMPONENT_ID},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}'
WHERE  P_BILL_INVOICE_COMP_MAP_ID = {P_BILL_INVOICE_COMP_MAP_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_BILL_INVOICE_COMP_MAP WHERE P_BILL_INVOICE_COMP_MAP_ID = {P_BILL_INVOICE_COMP_MAP_ID}">
<Components>
<Hidden id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILL_COMPONENT_ID" fieldSource="P_BILL_COMPONENT_ID" required="True" caption="P BILL COMPONENT ID" wizardCaption="P BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_invoice_comp_map1P_BILL_COMPONENT_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<Hidden id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID" required="True" caption="P SERVICE TYPE ID" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_invoice_comp_map1P_SERVICE_TYPE_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<Hidden id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_INVOICE_COMPONENT_ID" fieldSource="P_INVOICE_COMPONENT_ID" required="True" caption="P INVOICE COMPONENT ID" wizardCaption="P INVOICE COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_invoice_comp_map1P_INVOICE_COMPONENT_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<TextArea id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_invoice_comp_map1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_invoice_comp_map1CREATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_invoice_comp_map1UPDATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="42" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_bill_invoice_comp_map1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="43" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_bill_invoice_comp_map1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="44" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_bill_invoice_comp_map1Button_Delete" removeParameters="TAMBAH;s_keyword">
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
<Button id="46" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_bill_invoice_comp_map1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<TextBox id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_BILL_COMPONENT_NAME" fieldSource="P_BILL_COMPONENT_NAME" required="True" caption="P_BILL_COMPONENT_NAME" wizardCaption="P BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_invoice_comp_map1P_BILL_COMPONENT_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_NAME" fieldSource="P_SERVICE_TYPE_NAME" required="True" caption="P_SERVICE_TYPE_NAME" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_invoice_comp_map1P_SERVICE_TYPE_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_INVOICE_COMPONENT_NAME" fieldSource="P_INVOICE_COMPONENT_NAME" required="True" caption="P_INVOICE_COMPONENT_NAME" wizardCaption="P INVOICE COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_invoice_comp_map1P_INVOICE_COMPONENT_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_invoice_comp_map1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_invoice_comp_map1UPDATED_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Hidden id="96" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILL_INVOICE_COMP_MAP_ID" fieldSource="P_BILL_INVOICE_COMP_MAP_ID" required="False" caption="P_BILL_INVOICE_COMP_MAP_ID" wizardCaption="P BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_invoice_comp_map1P_BILL_INVOICE_COMP_MAP_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="P_BILL_INVOICE_COMP_MAP_ID" parameterSource="P_BILL_INVOICE_COMP_MAP_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters>
<SQLParameter id="48" parameterType="URL" variable="P_BILL_INVOICE_COMP_MAP_ID" dataType="Float" parameterSource="P_BILL_INVOICE_COMP_MAP_ID"/>
</SQLParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="74" variable="P_BILL_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_COMPONENT_ID"/>
<SQLParameter id="75" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
<SQLParameter id="76" variable="P_INVOICE_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INVOICE_COMPONENT_ID"/>
<SQLParameter id="77" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="78" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
<SQLParameter id="79" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="63" field="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
<CustomParameter id="64" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
<CustomParameter id="65" field="P_INVOICE_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_INVOICE_COMPONENT_ID"/>
<CustomParameter id="66" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="67" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="68" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="69" field="P_BILL_COMPONENT_NAME" dataType="Text" parameterType="Control" parameterSource="P_BILL_COMPONENT_NAME"/>
<CustomParameter id="70" field="P_SERVICE_TYPE_NAME" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_NAME"/>
<CustomParameter id="71" field="P_INVOICE_COMPONENT_NAME" dataType="Text" parameterType="Control" parameterSource="P_INVOICE_COMPONENT_NAME"/>
<CustomParameter id="72" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
<CustomParameter id="73" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="91" variable="P_BILL_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_COMPONENT_ID"/>
<SQLParameter id="92" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
<SQLParameter id="93" variable="P_INVOICE_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INVOICE_COMPONENT_ID"/>
<SQLParameter id="94" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="95" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="97" variable="P_BILL_INVOICE_COMP_MAP_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_INVOICE_COMP_MAP_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="80" field="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
<CustomParameter id="81" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
<CustomParameter id="82" field="P_INVOICE_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_INVOICE_COMPONENT_ID"/>
<CustomParameter id="83" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="84" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="85" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="86" field="P_BILL_COMPONENT_NAME" dataType="Text" parameterType="Control" parameterSource="P_BILL_COMPONENT_NAME"/>
<CustomParameter id="87" field="P_SERVICE_TYPE_NAME" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_NAME"/>
<CustomParameter id="88" field="P_INVOICE_COMPONENT_NAME" dataType="Text" parameterType="Control" parameterSource="P_INVOICE_COMPONENT_NAME"/>
<CustomParameter id="89" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="90" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="98" variable="P_BILL_INVOICE_COMP_MAP_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_INVOICE_COMP_MAP_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_bill_invoice_comp_map.php" forShow="True" url="p_bill_invoice_comp_map.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_bill_invoice_comp_map_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="61"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="62"/>
</Actions>
</Event>
</Events>
</Page>
