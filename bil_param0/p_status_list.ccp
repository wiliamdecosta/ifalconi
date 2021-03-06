<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,b.code as p_status_type_name from p_status_list a , p_status_type b
where a.p_status_type_id=b.p_status_type_id
and upper(a.code) like upper('%{s_keyword}%')" name="P_STATUS_LIST" orderBy="P_STATUS_LIST_ID" pageSizeLimit="100" wizardCaption=" P STATUS LIST " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
<Components>
<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_STATUS_TYPE_NAME" fieldSource="P_STATUS_TYPE_NAME" wizardCaption="P STATUS TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_STATUS_LISTP_STATUS_TYPE_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_STATUS_LISTCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_STATUS_LISTDESCRIPTION">
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
<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_STATUS_LIST_Insert" hrefSource="p_status_list.ccp" removeParameters="P_STATUS_LIST_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_STATUS_LISTP_STATUS_LIST_Insert">
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
<Link id="45" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_STATUS_LISTDLink" hrefSource="p_status_list.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_STATUS_LIST_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="46" sourceType="DataField" name="P_STATUS_LIST_ID" source="P_STATUS_LIST_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="47" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_STATUS_LISTADLink" hrefSource="p_status_list.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_STATUS_LIST_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="48" sourceType="DataField" format="yyyy-mm-dd" name="P_STATUS_LIST_ID" source="P_STATUS_LIST_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_STATUS_LIST_ID" fieldSource="P_STATUS_LIST_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_status_list.ccp" wizardThemeItem="GridA" PathID="P_STATUS_LISTP_STATUS_LIST_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="14" sourceType="DataField" format="yyyy-mm-dd" name="P_STATUS_LIST_ID" source="P_STATUS_LIST_ID"/>
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
<SQLParameter id="80" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_STATUS_LISTSearch" wizardCaption=" P STATUS LIST " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_status_list.ccp" PathID="P_STATUS_LISTSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_STATUS_LISTSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_STATUS_LISTSearchButton_DoSearch">
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
<Record id="22" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_status_list1" dataSource="select a.*,b.code as p_status_type_name from p_status_list a , p_status_type b
where a.p_status_type_id=b.p_status_type_id
and a.P_STATUS_LIST_ID={P_STATUS_LIST_ID}" errorSummator="Error" wizardCaption=" P Status List " wizardFormMethod="post" PathID="p_status_list1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customInsert="INSERT INTO P_STATUS_LIST(P_STATUS_LIST_ID,P_STATUS_TYPE_ID, CODE, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATE_DATE, UPDATE_BY)
VALUES
(GENERATE_ID('TRB','P_STATUS_LIST','P_STATUS_LIST_ID'),{P_STATUS_TYPE_ID},'{CODE}','{DESCRIPTION}',sysdate, '{CREATED_BY}',sysdate, '{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_STATUS_LIST SET 
CODE=UPPER(TRIM('{CODE}')),
P_STATUS_TYPE_ID={P_STATUS_TYPE_ID},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATE_DATE=sysdate,
UPDATE_BY='{UPDATE_BY}'
WHERE  P_STATUS_LIST_ID = {P_STATUS_LIST_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_STATUS_LIST WHERE P_STATUS_LIST_ID = {P_STATUS_LIST_ID}">
<Components>
<Hidden id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_STATUS_TYPE_ID" fieldSource="P_STATUS_TYPE_ID" required="True" caption="P STATUS TYPE ID" wizardCaption="P STATUS TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_status_list1P_STATUS_TYPE_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<TextBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_status_list1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextArea id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_status_list1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_status_list1CREATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_status_list1UPDATE_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="38" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_status_list1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="39" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_status_list1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="40" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_status_list1Button_Delete" removeParameters="TAMBAH;s_keyword">
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
<Button id="42" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_status_list1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_status_list1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_status_list1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="75" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_STATUS_TYPE_NAME" fieldSource="P_STATUS_TYPE_NAME" required="False" caption="P STATUS TYPE ID" wizardCaption="P STATUS TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_status_list1P_STATUS_TYPE_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Hidden id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_STATUS_LIST_ID" fieldSource="P_STATUS_LIST_ID" required="False" caption="P_STATUS_LIST_ID" wizardCaption="P STATUS TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_status_list1P_STATUS_LIST_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="P_STATUS_LIST_ID" parameterSource="P_STATUS_LIST_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters>
<SQLParameter id="81" parameterType="URL" variable="P_STATUS_LIST_ID" dataType="Float" parameterSource="P_STATUS_LIST_ID"/>
</SQLParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="60" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="61" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="62" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
<SQLParameter id="63" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="74" variable="P_STATUS_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_STATUS_TYPE_ID"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="53" field="P_STATUS_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_STATUS_TYPE_ID"/>
<CustomParameter id="54" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="55" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="56" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="57" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="58" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
<CustomParameter id="59" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="71" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="72" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="73" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="76" variable="P_STATUS_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_STATUS_TYPE_ID"/>
<SQLParameter id="77" variable="P_STATUS_LIST_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_STATUS_LIST_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="64" field="P_STATUS_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_STATUS_TYPE_ID"/>
<CustomParameter id="65" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="66" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="67" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="68" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="69" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="70" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="78" variable="P_STATUS_LIST_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_STATUS_LIST_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_status_list.php" forShow="True" url="p_status_list.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_status_list_events.php" forShow="False" comment="//" codePage="windows-1252"/>
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
