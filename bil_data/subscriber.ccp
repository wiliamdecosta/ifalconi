<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_data" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * 
FROM V_SUBSCRIBER
WHERE
( UPPER(SUBSCRIPTION_STATUS_CODE) LIKE '%{s_keyword}%' ) 
ORDER BY SUBSCRIBER_ID
" name="V_SUBSCRIBER" orderBy="SUBSCRIBER_ID" pageSizeLimit="100" wizardCaption=" V SUBSCRIBER " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
			<Components>
				<Hidden id="13" fieldSourceType="DBColumn" dataType="Float" html="False" name="SUBSCRIBER_ID" fieldSource="SUBSCRIBER_ID" wizardCaption="SUBSCRIBER ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_SUBSCRIBERSUBSCRIBER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="14" fieldSourceType="DBColumn" dataType="Float" html="False" name="SERVICE_NO" fieldSource="SERVICE_NO" wizardCaption="SERVICE NO" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_SUBSCRIBERSERVICE_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_TYPE_CODE" fieldSource="SERVICE_TYPE_CODE" wizardCaption="SERVICE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_SUBSCRIBERSERVICE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" name="TARIFF_SCENARIO_CODE" fieldSource="TARIFF_SCENARIO_CODE" wizardCaption="TARIFF SCENARIO CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_SUBSCRIBERTARIFF_SCENARIO_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="SUBSCRIPTION_NAME" fieldSource="SUBSCRIPTION_NAME" wizardCaption="SUBSCRIPTION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_SUBSCRIBERSUBSCRIPTION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" name="SUBSCRIPTION_STATUS_CODE" fieldSource="SUBSCRIPTION_STATUS_CODE" wizardCaption="SUBSCRIPTION STATUS CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_SUBSCRIBERSUBSCRIPTION_STATUS_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="19" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="Apricot">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="SUBSCRIBER_Insert" hrefSource="subscriber_form.ccp" removeParameters="SUBSCRIBER_ID;FLAG;s_keyword;SUBSCRIBERPage;SUBSCRIBERPageSize;SUBSCRIBEROrder;SUBSCRIBERDir" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERSUBSCRIBER_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="28" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="29" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink1" PathID="V_SUBSCRIBERADLink1" hrefSource="subscriber_form.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="SUBSCRIBER_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="30" sourceType="DataField" format="yyyy-mm-dd" name="SUBSCRIBER_ID" source="SUBSCRIBER_ID"/>
						<LinkParameter id="43" sourceType="DataField" name="P_SERVICE_TYPE_ID" source="P_SERVICE_TYPE_ID"/>
						<LinkParameter id="44" sourceType="DataField" name="P_TARIFF_SCENARIO_ID" source="P_TARIFF_SCENARIO_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="33" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="V_SUBSCRIBERDLink" hrefSource="subscriber.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="34" sourceType="DataField" name="SUBSCRIBER_ID" source="SUBSCRIBER_ID"/>
						<LinkParameter id="41" sourceType="DataField" name="P_SERVICE_TYPE_ID" source="P_SERVICE_TYPE_ID"/>
						<LinkParameter id="42" sourceType="DataField" name="P_TARIFF_SCENARIO_ID" source="P_TARIFF_SCENARIO_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_TARIFF_SCENARIO_ID" PathID="V_SUBSCRIBERP_TARIFF_SCENARIO_ID" fieldSource="P_TARIFF_SCENARIO_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ID" PathID="V_SUBSCRIBERID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SCID" PathID="V_SUBSCRIBERSCID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_ID" PathID="V_SUBSCRIBERP_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="STID" PathID="V_SUBSCRIBERSTID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="25"/>
						<Action actionName="Set Row Style" actionCategory="General" id="24" styles="Row;AltRow"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="6" conditionType="Parameter" useIsNull="False" field="SUBSCRIPTION_STATUS_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="32" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="V_SUBSCRIBERSearch" wizardCaption=" V SUBSCRIBER " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="subscriber.ccp" PathID="V_SUBSCRIBERSearch">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="V_SUBSCRIBERSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="V_SUBSCRIBERSearchButton_DoSearch">
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
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="subscriber.php" forShow="True" url="subscriber.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="subscriber_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="35"/>
			</Actions>
		</Event>
	</Events>
</Page>
