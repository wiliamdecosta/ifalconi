<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="7" connection="Conn" dataSource="SELECT A.*,B.P_STATUS_TYPE_ID,B.CODE AS P_PERIOD_STATUS_CODE
FROM
P_YEAR_PERIOD A
INNER JOIN P_STATUS_LIST B
ON A.PERIOD_STATUS_ID = B.P_STATUS_LIST_ID
WHERE B.P_STATUS_TYPE_ID = 1 AND
(UPPER(A.CODE) LIKE UPPER('%{s_keyword}%') OR
UPPER(B.CODE) LIKE UPPER('%{s_keyword}%') OR
UPPER(A.DESCRIPTION) LIKE UPPER('%{s_keyword}%'))
ORDER BY A.CODE" name="P_FINANCE_PERIOD" orderBy="P_FINANCE_PERIOD_ID" pageSizeLimit="100" wizardCaption=" P FINANCE PERIOD " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
			<Components>
				<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="FINANCE PERIOD CODE" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_FINANCE_PERIODCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="19" fieldSourceType="DBColumn" dataType="Date" html="False" name="START_DATE" fieldSource="START_DATE" wizardCaption="PERIOD STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_FINANCE_PERIODSTART_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Date" html="False" name="END_DATE" fieldSource="END_DATE" wizardCaption="P YEAR PERIOD ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_FINANCE_PERIODEND_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="SKUM NO" wizardSize="48" wizardMaxLength="48" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_FINANCE_PERIODDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="24" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="61"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="53" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_FINANCE_PERIODDLink" hrefSource="p_year_periode.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="136" sourceType="DataField" name="P_YEAR_PERIOD_ID" source="P_YEAR_PERIOD_ID"/>
</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="55" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_FINANCE_PERIOD_Insert" PathID="P_FINANCE_PERIODP_FINANCE_PERIOD_Insert" hrefSource="p_year_periode.ccp" wizardUseTemplateBlock="False" removeParameters="P_FINANCE_PERIOD_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="56"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="57" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_YEAR_PERIOD_ID" fieldSource="P_YEAR_PERIOD_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_year_periode.ccp" wizardThemeItem="GridA" PathID="P_FINANCE_PERIODP_YEAR_PERIOD_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="15" sourceType="DataField" format="yyyy-mm-dd" name="P_FINANCE_PERIOD_ID" source="P_FINANCE_PERIOD_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="109" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_PERIOD_STATUS_CODE" PathID="P_FINANCE_PERIODP_PERIOD_STATUS_CODE" fieldSource="P_PERIOD_STATUS_CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="59"/>
						<Action actionName="Set Row Style" actionCategory="General" id="60" styles="Row;AltRow"/>
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
				<SQLParameter id="58" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_FINANCE_PERIODSearch" wizardCaption=" P FINANCE PERIOD " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_year_periode.ccp" PathID="P_FINANCE_PERIODSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="P_FINANCE_PERIODSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="52" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_FINANCE_PERIODSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
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
		<Record id="25" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_FINANCE_PERIOD1" dataSource="SELECT A.*,B.P_STATUS_TYPE_ID,B.CODE AS P_PERIOD_STATUS_CODE
FROM
P_YEAR_PERIOD A
INNER JOIN P_STATUS_LIST B
ON A.PERIOD_STATUS_ID = B.P_STATUS_LIST_ID
WHERE B.P_STATUS_TYPE_ID = 1 AND
P_YEAR_PERIOD_ID = {P_YEAR_PERIOD_ID}" errorSummator="Error" wizardCaption=" P FINANCE PERIOD " wizardFormMethod="post" PathID="P_FINANCE_PERIOD1" pasteActions="pasteActions" parameterTypeListName="ParameterTypeList" activeCollection="ISQLParameters" customInsertType="SQL" customInsert="INSERT INTO P_YEAR_PERIOD(
P_YEAR_PERIOD_ID,
CODE, 
START_DATE,
END_DATE, 
PERIOD_STATUS_ID, 
UPDATE_DATE, 
UPDATE_BY, 
DESCRIPTION
) 
VALUES(
GENERATE_ID('BILLDB','P_YEAR_PERIOD','P_YEAR_PERIOD_ID'),
UPPER(TRIM('{CODE}')), 
'{START_DATE}',
'{END_DATE}', 
{PERIOD_STATUS_ID},
SYSDATE, 
'{UPDATE_BY}', 
 INITCAP(TRIM('{DESCRIPTION}'))
)" customUpdateType="SQL" customDelete="DELETE FROM P_YEAR_PERIOD WHERE P_YEAR_PERIOD_ID = {P_YEAR_PERIOD_ID}" customDeleteType="SQL" customUpdate="UPDATE P_YEAR_PERIOD SET 
CODE=UPPER(TRIM('{CODE}')),
START_DATE='{START_DATE}',
END_DATE='{END_DATE}', 
PERIOD_STATUS_ID={PERIOD_STATUS_ID},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')), 
UPDATE_DATE=SYSDATE, 
UPDATE_BY='{UPDATE_BY}'
WHERE
P_YEAR_PERIOD_ID={P_YEAR_PERIOD_ID}">
			<Components>
				<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="FINANCE PERIOD CODE" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="START_DATE" fieldSource="START_DATE" required="True" caption="START DATE" wizardCaption="START DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1START_DATE" defaultValue="CurrentDate" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="34" name="DatePicker_START_DATE" control="START_DATE" wizardSatellite="True" wizardControl="START_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_FINANCE_PERIOD1DatePicker_START_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PERIOD_STATUS_ID" fieldSource="PERIOD_STATUS_ID" required="True" caption="PERIOD STATUS ID" wizardCaption="PERIOD STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1PERIOD_STATUS_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextArea id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1UPDATE_DATE" defaultValue="CurrentDate" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="END_DATE" fieldSource="END_DATE" required="True" caption="END DATE" wizardCaption="END DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1END_DATE" defaultValue="CurrentDate" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="36" name="DatePicker_END_DATE" control="END_DATE" wizardSatellite="True" wizardControl="END_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_FINANCE_PERIOD1DatePicker_END_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="46" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_FINANCE_PERIOD1Button_Insert" removeParameters="TAMBAH" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="47" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_FINANCE_PERIOD1Button_Update" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="48" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_FINANCE_PERIOD1Button_Delete" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="P_YEAR_PERIOD_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="49" message="Hapus Modul?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="50" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_FINANCE_PERIOD1Button_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="104" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_PERIOD_STATUS_CODE" fieldSource="P_PERIOD_STATUS_CODE" required="False" caption="P_PERIOD_STATUS_CODE" wizardCaption="PERIOD STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1P_PERIOD_STATUS_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="108" fieldSourceType="DBColumn" dataType="Float" name="P_YEAR_PERIOD_ID" PathID="P_FINANCE_PERIOD1P_YEAR_PERIOD_ID" fieldSource="P_YEAR_PERIOD_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
			<Events>
<Event name="BeforeExecuteInsert" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="128"/>
</Actions>
</Event>
<Event name="AfterExecuteInsert" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="129"/>
</Actions>
</Event>
<Event name="BeforeExecuteUpdate" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="130"/>
</Actions>
</Event>
<Event name="AfterExecuteUpdate" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="131"/>
</Actions>
</Event>
<Event name="BeforeExecuteDelete" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="132"/>
</Actions>
</Event>
<Event name="AfterExecuteDelete" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="133"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="P_FINANCE_PERIOD_ID" parameterSource="P_FINANCE_PERIOD_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="106" parameterType="URL" variable="P_YEAR_PERIOD_ID" dataType="Float" parameterSource="P_YEAR_PERIOD_ID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="119" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<SQLParameter id="120" variable="START_DATE" dataType="Date" parameterType="Control" parameterSource="START_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="121" variable="PERIOD_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="PERIOD_STATUS_ID"/>
<SQLParameter id="122" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<SQLParameter id="124" variable="END_DATE" dataType="Date" parameterType="Control" parameterSource="END_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="125" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
<SQLParameter id="127" variable="P_YEAR_PERIOD_ID" dataType="Float" parameterType="Control" parameterSource="P_YEAR_PERIOD_ID"/>
</ISQLParameters>
			<IFormElements>
				<CustomParameter id="110" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE" omitIfEmpty="True"/>
<CustomParameter id="111" field="START_DATE" dataType="Date" parameterType="Control" parameterSource="START_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="112" field="PERIOD_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="PERIOD_STATUS_ID" omitIfEmpty="True"/>
<CustomParameter id="113" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION" omitIfEmpty="True"/>
<CustomParameter id="114" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="115" field="END_DATE" dataType="Date" parameterType="Control" parameterSource="END_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="116" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY" omitIfEmpty="True"/>
<CustomParameter id="117" field="P_PERIOD_STATUS_CODE" dataType="Text" parameterType="Control" parameterSource="P_PERIOD_STATUS_CODE" omitIfEmpty="True"/>
<CustomParameter id="118" field="P_YEAR_PERIOD_ID" dataType="Float" parameterType="Control" parameterSource="P_YEAR_PERIOD_ID" omitIfEmpty="True"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="139" variable="START_DATE" dataType="Date" parameterType="Control" parameterSource="START_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="140" variable="PERIOD_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="PERIOD_STATUS_ID"/>
<SQLParameter id="141" variable="P_YEAR_PERIOD_ID" dataType="Float" parameterType="Control" parameterSource="P_YEAR_PERIOD_ID"/>
<SQLParameter id="143" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<SQLParameter id="144" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="145" variable="END_DATE" dataType="Date" parameterType="Control" parameterSource="END_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="146" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
<SQLParameter id="149" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="85" field="FINANCE_PERIOD_CODE" dataType="Text" parameterType="Control" parameterSource="FINANCE_PERIOD_CODE" omitIfEmpty="True"/>
				<CustomParameter id="86" field="START_DATE" dataType="Date" parameterType="Control" parameterSource="START_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="87" field="PERIOD_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="PERIOD_STATUS_ID" omitIfEmpty="True"/>
				<CustomParameter id="88" field="P_YEAR_PERIOD_ID" dataType="Float" parameterType="Control" parameterSource="P_YEAR_PERIOD_ID" omitIfEmpty="True"/>
				<CustomParameter id="89" field="SKUM_DATE" dataType="Date" parameterType="Control" parameterSource="SKUM_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="90" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION" omitIfEmpty="True"/>
				<CustomParameter id="91" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="92" field="END_DATE" dataType="Date" parameterType="Control" parameterSource="END_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="93" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY" omitIfEmpty="True"/>
				<CustomParameter id="94" field="P_FINANCE_PERIOD_ID" dataType="Float" parameterType="Control" parameterSource="P_FINANCE_PERIOD_ID" omitIfEmpty="True"/>
				<CustomParameter id="95" field="SKUM_NO" dataType="Text" parameterType="Control" parameterSource="SKUM_NO" omitIfEmpty="True"/>
				<CustomParameter id="134" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE" omitIfEmpty="True"/>
<CustomParameter id="135" field="P_PERIOD_STATUS_CODE" dataType="Text" parameterType="Control" parameterSource="P_PERIOD_STATUS_CODE" omitIfEmpty="True"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="137" variable="P_YEAR_PERIOD_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_YEAR_PERIOD_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_year_periode_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_year_periode.php" forShow="True" url="p_year_periode.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="62"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="63"/>
			</Actions>
		</Event>
	</Events>
</Page>
