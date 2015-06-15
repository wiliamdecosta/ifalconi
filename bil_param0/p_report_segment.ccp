<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="p_report_segment" name="P_REPORT_SEGMENT" orderBy="P_REPORT_SEGMENT_ID" pageSizeLimit="100" wizardCaption=" P REPORT SEGMENT " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_REPORT_SEGMENTCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="REPORT_LABEL" fieldSource="REPORT_LABEL" wizardCaption="REPORT LABEL" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_REPORT_SEGMENTREPORT_LABEL">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Float" html="False" name="LISTING_NO" fieldSource="LISTING_NO" wizardCaption="LISTING NO" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_REPORT_SEGMENTLISTING_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_REPORT_SEGMENTDESCRIPTION">
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
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_REPORT_SEGMENT_Insert" hrefSource="p_report_segment.ccp" removeParameters="P_REPORT_SEGMENT_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_REPORT_SEGMENTP_REPORT_SEGMENT_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="48"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="49" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="50" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_REPORT_SEGMENTDLink" hrefSource="p_report_segment.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_REPORT_SEGMENT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="51" sourceType="DataField" name="P_REPORT_SEGMENT_ID" source="P_REPORT_SEGMENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="52" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_REPORT_SEGMENTADLink" hrefSource="p_report_segment.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_REPORT_SEGMENT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="53" sourceType="DataField" format="yyyy-mm-dd" name="P_REPORT_SEGMENT_ID" source="P_REPORT_SEGMENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_REPORT_SEGMENT_ID" fieldSource="P_REPORT_SEGMENT_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_report_segment.ccp" wizardThemeItem="GridA" PathID="P_REPORT_SEGMENTP_REPORT_SEGMENT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="15" sourceType="DataField" format="yyyy-mm-dd" name="P_REPORT_SEGMENT_ID" source="P_REPORT_SEGMENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="46" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="47"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
				<Field id="6" tableName="P_REPORT_SEGMENT" fieldName="P_REPORT_SEGMENT_ID"/>
				<Field id="16" tableName="P_REPORT_SEGMENT" fieldName="CODE"/>
				<Field id="18" tableName="P_REPORT_SEGMENT" fieldName="REPORT_LABEL"/>
				<Field id="20" tableName="P_REPORT_SEGMENT" fieldName="LISTING_NO"/>
				<Field id="22" tableName="P_REPORT_SEGMENT" fieldName="DESCRIPTION"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_REPORT_SEGMENTSearch" wizardCaption=" P REPORT SEGMENT " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_report_segment.ccp" PathID="P_REPORT_SEGMENTSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_REPORT_SEGMENTSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_REPORT_SEGMENTSearchButton_DoSearch">
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
		<Record id="25" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_report_segment1" dataSource="p_report_segment" errorSummator="Error" wizardCaption=" P Report Segment " wizardFormMethod="post" PathID="p_report_segment1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_REPORT_SEGMENT(P_REPORT_SEGMENT_ID, CODE, REPORT_LABEL, LISTING_NO, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
VALUES
(GENERATE_ID('TRB','P_REPORT_SEGMENT','P_REPORT_SEGMENT_ID'),'{CODE}','{REPORT_LABEL}',{LISTING_NO},'{DESCRIPTION}',sysdate, '{CREATED_BY}',sysdate, '{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_REPORT_SEGMENT SET 
CODE=UPPER(TRIM('{CODE}')),
REPORT_LABEL='{REPORT_LABEL}',
LISTING_NO={LISTING_NO},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}'
WHERE  P_REPORT_SEGMENT_ID = {P_REPORT_SEGMENT_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_REPORT_SEGMENT WHERE P_REPORT_SEGMENT_ID = {P_REPORT_SEGMENT_ID}">
			<Components>
				<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_report_segment1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="REPORT_LABEL" fieldSource="REPORT_LABEL" required="True" caption="REPORT LABEL" wizardCaption="REPORT LABEL" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_report_segment1REPORT_LABEL">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="LISTING_NO" fieldSource="LISTING_NO" required="True" caption="LISTING NO" wizardCaption="LISTING NO" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_report_segment1LISTING_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_report_segment1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_report_segment1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_report_segment1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_report_segment1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_report_segment1UPDATED_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="42" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_report_segment1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="43" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_report_segment1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="40" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_report_segment1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="44"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="45" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_report_segment1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="70" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_REPORT_SEGMENT_ID" fieldSource="P_REPORT_SEGMENT_ID" required="False" caption="P_REPORT_SEGMENT_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_report_segment1P_REPORT_SEGMENT_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="P_REPORT_SEGMENT_ID" parameterSource="P_REPORT_SEGMENT_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="62" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="63" variable="REPORT_LABEL" parameterType="Control" dataType="Text" parameterSource="REPORT_LABEL"/>
				<SQLParameter id="64" variable="LISTING_NO" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="LISTING_NO"/>
				<SQLParameter id="65" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="66" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
				<SQLParameter id="67" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="54" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="55" field="REPORT_LABEL" dataType="Text" parameterType="Control" parameterSource="REPORT_LABEL"/>
				<CustomParameter id="56" field="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO"/>
				<CustomParameter id="57" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="58" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="59" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="60" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
				<CustomParameter id="61" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="80" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="81" variable="REPORT_LABEL" parameterType="Control" dataType="Text" parameterSource="REPORT_LABEL"/>
				<SQLParameter id="82" variable="LISTING_NO" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="LISTING_NO"/>
				<SQLParameter id="83" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="84" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
				<SQLParameter id="85" variable="P_REPORT_SEGMENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REPORT_SEGMENT_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="71" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="72" field="REPORT_LABEL" dataType="Text" parameterType="Control" parameterSource="REPORT_LABEL"/>
				<CustomParameter id="73" field="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO"/>
				<CustomParameter id="74" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="75" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="76" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="77" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="78" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="79" field="P_REPORT_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_REPORT_SEGMENT_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="86" variable="P_REPORT_SEGMENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REPORT_SEGMENT_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_report_segment.php" forShow="True" url="p_report_segment.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_report_segment_events.php" forShow="False" comment="//" codePage="windows-1252"/>
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
