<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,b.code as PERIOD_STATUS_NAME,c.code as P_YEAR_PERIOD_NAME from TRB.p_finance_period  a,
BLUP.P_PERIOD_STATUS b, 
TRB.P_YEAR_PERIOD c
where
a.PERIOD_STATUS_ID=b.P_PERIOD_STATUS_ID
and a.P_YEAR_PERIOD_ID=c.P_YEAR_PERIOD_ID
and upper(a.FINANCE_PERIOD_CODE) like upper('%{s_keyword}%')" name="P_FINANCE_PERIOD" orderBy="P_FINANCE_PERIOD_ID" pageSizeLimit="100" wizardCaption=" P FINANCE PERIOD " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="FINANCE_PERIOD_CODE" fieldSource="FINANCE_PERIOD_CODE" wizardCaption="FINANCE PERIOD CODE" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_FINANCE_PERIODFINANCE_PERIOD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" name="PERIOD_STATUS_NAME" fieldSource="PERIOD_STATUS_NAME" wizardCaption="PERIOD STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_FINANCE_PERIODPERIOD_STATUS_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_YEAR_PERIOD_NAME" fieldSource="P_YEAR_PERIOD_NAME" wizardCaption="P YEAR PERIOD ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_FINANCE_PERIODP_YEAR_PERIOD_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="29" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_FINANCE_PERIODDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="30" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_FINANCE_PERIOD_Insert" hrefSource="p_finance_period.ccp" removeParameters="P_FINANCE_PERIOD_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIODP_FINANCE_PERIOD_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="60"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="61" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="62" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_FINANCE_PERIODDLink" hrefSource="p_finance_period.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_FINANCE_PERIOD_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="63" sourceType="DataField" name="P_FINANCE_PERIOD_ID" source="P_FINANCE_PERIOD_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="64" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_FINANCE_PERIODADLink" hrefSource="p_finance_period.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_FINANCE_PERIOD_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="65" sourceType="DataField" format="yyyy-mm-dd" name="P_FINANCE_PERIOD_ID" source="P_FINANCE_PERIOD_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_FINANCE_PERIOD_ID" fieldSource="P_FINANCE_PERIOD_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_finance_period.ccp" wizardThemeItem="GridA" PathID="P_FINANCE_PERIODP_FINANCE_PERIOD_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="17" sourceType="DataField" format="yyyy-mm-dd" name="P_FINANCE_PERIOD_ID" source="P_FINANCE_PERIOD_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="66" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="67"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="FINANCE_PERIOD_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="118" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_FINANCE_PERIODSearch" wizardCaption=" P FINANCE PERIOD " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_finance_period.ccp" PathID="P_FINANCE_PERIODSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" PathID="P_FINANCE_PERIODSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_FINANCE_PERIODSearchButton_DoSearch">
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
		<Record id="31" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_finance_period1" dataSource="select a.*,b.code as PERIOD_STATUS_NAME,c.code as P_YEAR_PERIOD_NAME from TRB.p_finance_period  a,
BLUP.P_PERIOD_STATUS b, 
TRB.P_YEAR_PERIOD c
where
a.PERIOD_STATUS_ID=b.P_PERIOD_STATUS_ID
and a.P_YEAR_PERIOD_ID=c.P_YEAR_PERIOD_ID
and a.P_FINANCE_PERIOD_ID={P_FINANCE_PERIOD_ID}" errorSummator="Error" wizardCaption=" P Finance Period " wizardFormMethod="post" PathID="p_finance_period1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customInsert="INSERT INTO P_FINANCE_PERIOD(P_FINANCE_PERIOD_ID, FINANCE_PERIOD_CODE, START_DATE, END_DATE, PERIOD_STATUS_ID, P_YEAR_PERIOD_ID, REF_NO, REF_DATE, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
VALUES
(GENERATE_ID('TRB','P_FINANCE_PERIOD','P_FINANCE_PERIOD_ID'),'{FINANCE_PERIOD_CODE}','{START_DATE}','{END_DATE}',{PERIOD_STATUS_ID},{P_YEAR_PERIOD_ID},'{REF_NO}','{REF_DATE}','{DESCRIPTION}',sysdate, '{CREATED_BY}',sysdate, '{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_FINANCE_PERIOD SET 
FINANCE_PERIOD_CODE='{FINANCE_PERIOD_CODE}',
START_DATE='{START_DATE}',
END_DATE='{END_DATE}',
PERIOD_STATUS_ID={PERIOD_STATUS_ID},
P_YEAR_PERIOD_ID={P_YEAR_PERIOD_ID},
REF_NO='{REF_NO}',
REF_DATE='{REF_DATE}',
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}' 
WHERE  P_FINANCE_PERIOD_ID = {P_FINANCE_PERIOD_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_FINANCE_PERIOD WHERE P_FINANCE_PERIOD_ID = {P_FINANCE_PERIOD_ID}">
			<Components>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FINANCE_PERIOD_CODE" fieldSource="FINANCE_PERIOD_CODE" required="True" caption="FINANCE PERIOD CODE" wizardCaption="FINANCE PERIOD CODE" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1FINANCE_PERIOD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="START_DATE" fieldSource="START_DATE" required="True" caption="START DATE" wizardCaption="START DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1START_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="40" name="DatePicker_START_DATE" control="START_DATE" wizardSatellite="True" wizardControl="START_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="p_finance_period1DatePicker_START_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="END_DATE" fieldSource="END_DATE" required="True" caption="END DATE" wizardCaption="END DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1END_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="42" name="DatePicker_END_DATE" control="END_DATE" wizardSatellite="True" wizardControl="END_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="p_finance_period1DatePicker_END_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Hidden id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PERIOD_STATUS_ID" fieldSource="PERIOD_STATUS_ID" required="True" caption="PERIOD STATUS ID" wizardCaption="PERIOD STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1PERIOD_STATUS_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_YEAR_PERIOD_ID" fieldSource="P_YEAR_PERIOD_ID" required="True" caption="P YEAR PERIOD ID" wizardCaption="P YEAR PERIOD ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1P_YEAR_PERIOD_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="REF_NO" fieldSource="REF_NO" required="False" caption="REF NO" wizardCaption="REF NO" wizardSize="48" wizardMaxLength="48" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1REF_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="REF_DATE" fieldSource="REF_DATE" required="False" caption="REF DATE" wizardCaption="REF DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1REF_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="47" name="DatePicker_REF_DATE" control="REF_DATE" wizardSatellite="True" wizardControl="REF_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="p_finance_period1DatePicker_REF_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextArea id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1UPDATED_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="55" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_finance_period1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="56" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_finance_period1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="57" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_finance_period1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="58"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="59" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_finance_period1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="113" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_FINANCE_PERIOD_ID" fieldSource="P_FINANCE_PERIOD_ID" required="False" caption="P_FINANCE_PERIOD_ID" wizardCaption="FINANCE PERIOD CODE" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1P_FINANCE_PERIOD_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="116" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PERIOD_STATUS_NAME" fieldSource="PERIOD_STATUS_NAME" required="False" caption="PERIOD_STATUS_NAME" wizardCaption="PERIOD STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1PERIOD_STATUS_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="117" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_YEAR_PERIOD_NAME" fieldSource="P_YEAR_PERIOD_NAME" required="True" caption="P_YEAR_PERIOD_NAME" wizardCaption="P YEAR PERIOD ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_finance_period1P_YEAR_PERIOD_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="37" conditionType="Parameter" useIsNull="False" field="P_FINANCE_PERIOD_ID" parameterSource="P_FINANCE_PERIOD_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="119" parameterType="URL" variable="P_FINANCE_PERIOD_ID" dataType="Float" parameterSource="P_FINANCE_PERIOD_ID"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="82" variable="FINANCE_PERIOD_CODE" parameterType="Control" dataType="Text" parameterSource="FINANCE_PERIOD_CODE"/>
				<SQLParameter id="83" variable="START_DATE" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="START_DATE"/>
				<SQLParameter id="84" variable="END_DATE" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="END_DATE"/>
				<SQLParameter id="85" variable="PERIOD_STATUS_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PERIOD_STATUS_ID"/>
				<SQLParameter id="86" variable="P_YEAR_PERIOD_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_YEAR_PERIOD_ID"/>
				<SQLParameter id="87" variable="REF_NO" parameterType="Control" dataType="Text" parameterSource="REF_NO"/>
				<SQLParameter id="88" variable="REF_DATE" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="REF_DATE"/>
				<SQLParameter id="89" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="90" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
				<SQLParameter id="91" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="70" field="FINANCE_PERIOD_CODE" dataType="Text" parameterType="Control" parameterSource="FINANCE_PERIOD_CODE"/>
				<CustomParameter id="71" field="START_DATE" dataType="Date" parameterType="Control" parameterSource="START_DATE"/>
				<CustomParameter id="72" field="END_DATE" dataType="Date" parameterType="Control" parameterSource="END_DATE"/>
				<CustomParameter id="73" field="PERIOD_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="PERIOD_STATUS_ID"/>
				<CustomParameter id="74" field="P_YEAR_PERIOD_ID" dataType="Float" parameterType="Control" parameterSource="P_YEAR_PERIOD_ID"/>
				<CustomParameter id="75" field="REF_NO" dataType="Text" parameterType="Control" parameterSource="REF_NO"/>
				<CustomParameter id="76" field="REF_DATE" dataType="Date" parameterType="Control" parameterSource="REF_DATE"/>
				<CustomParameter id="77" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="78" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="79" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="80" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="81" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="104" variable="FINANCE_PERIOD_CODE" parameterType="Control" dataType="Text" parameterSource="FINANCE_PERIOD_CODE"/>
				<SQLParameter id="105" variable="START_DATE" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="START_DATE"/>
				<SQLParameter id="106" variable="END_DATE" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="END_DATE"/>
				<SQLParameter id="107" variable="PERIOD_STATUS_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PERIOD_STATUS_ID"/>
				<SQLParameter id="108" variable="P_YEAR_PERIOD_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_YEAR_PERIOD_ID"/>
				<SQLParameter id="109" variable="REF_NO" parameterType="Control" dataType="Text" parameterSource="REF_NO"/>
				<SQLParameter id="110" variable="REF_DATE" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="REF_DATE"/>
				<SQLParameter id="111" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="112" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
				<SQLParameter id="114" variable="P_FINANCE_PERIOD_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_FINANCE_PERIOD_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="92" field="FINANCE_PERIOD_CODE" dataType="Text" parameterType="Control" parameterSource="FINANCE_PERIOD_CODE"/>
				<CustomParameter id="93" field="START_DATE" dataType="Date" parameterType="Control" parameterSource="START_DATE"/>
				<CustomParameter id="94" field="END_DATE" dataType="Date" parameterType="Control" parameterSource="END_DATE"/>
				<CustomParameter id="95" field="PERIOD_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="PERIOD_STATUS_ID"/>
				<CustomParameter id="96" field="P_YEAR_PERIOD_ID" dataType="Float" parameterType="Control" parameterSource="P_YEAR_PERIOD_ID"/>
				<CustomParameter id="97" field="REF_NO" dataType="Text" parameterType="Control" parameterSource="REF_NO"/>
				<CustomParameter id="98" field="REF_DATE" dataType="Date" parameterType="Control" parameterSource="REF_DATE"/>
				<CustomParameter id="99" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="100" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="101" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="102" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="103" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="115" variable="P_FINANCE_PERIOD_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_FINANCE_PERIOD_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_finance_period.php" forShow="True" url="p_finance_period.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_finance_period_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="68"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="69"/>
			</Actions>
		</Event>
	</Events>
</Page>
