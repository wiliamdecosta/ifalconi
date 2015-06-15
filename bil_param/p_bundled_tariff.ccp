<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="7" connection="Conn" name="P_DETAIL_FEATURE" pageSizeLimit="100" wizardCaption=" V P SERVICE CATEGORY " wizardGridType="Tabular" wizardAllowInsert="True" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No Record" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT * 
FROM V_P_RECU_TARIFF_BUNDLED_FEAT 
WHERE P_BUNDLED_FEATURE_ID = {P_BUNDLED_FEATURE_ID}">
			<Components>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="RECU_TARIFF_SCEN_CODE" fieldSource="RECU_TARIFF_SCEN_CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_DETAIL_FEATURERECU_TARIFF_SCEN_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_DETAIL_FEATUREVALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_DETAIL_FEATUREVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_PERIOD_UNIT_CODE" fieldSource="BILL_PERIOD_UNIT_CODE" wizardCaption="SERVICE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_DETAIL_FEATUREBILL_PERIOD_UNIT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="IS RATED" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_DETAIL_FEATUREDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="65" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="66" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="72" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ST_NEW" PathID="P_DETAIL_FEATUREST_NEW" hrefSource="p_bundled_tariff_act.ccp" wizardUseTemplateBlock="False" removeParameters="P_RECU_TARIFF_BUNDLED_FEAT_ID">
					<Components/>
					<Events>
					</Events>
					<LinkParameters>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="75" fieldSourceType="DBColumn" dataType="Text" name="P_RECU_TARIFF_BUNDLED_FEAT_ID" PathID="P_DETAIL_FEATUREP_RECU_TARIFF_BUNDLED_FEAT_ID" fieldSource="P_RECU_TARIFF_BUNDLED_FEAT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Link id="76" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_DETAIL_FEATUREDLink" hrefSource="p_bundled_tariff.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="284" sourceType="DataField" name="P_RECU_TARIFF_BUNDLED_FEAT_ID" source="P_RECU_TARIFF_BUNDLED_FEAT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="283" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILLING_UNIT" PathID="P_DETAIL_FEATUREBILLING_UNIT" fieldSource="BILLING_UNIT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="143" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="skenarioEdit" PathID="P_DETAIL_FEATUREskenarioEdit" hrefSource="p_bundled_tariff_act.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="CUST_ACCOUNT_DISCOUNT_ID">
					<Components/>
					<Events>
					</Events>
					<LinkParameters>
						<LinkParameter id="285" sourceType="DataField" name="P_RECU_TARIFF_BUNDLED_FEAT_ID" source="P_RECU_TARIFF_BUNDLED_FEAT_ID"/>
</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="145" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="skenarioDel" PathID="P_DETAIL_FEATUREskenarioDel" hrefSource="p_bundled_tariff.ccp" wizardUseTemplateBlock="True" fieldSource="P_RECU_TARIFF_BUNDLED_FEAT_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="219" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="223" sourceType="Expression" name="action_delete" source="1"/>
						<LinkParameter id="286" sourceType="DataField" name="P_RECU_TARIFF_BUNDLED_FEAT_ID" source="P_RECU_TARIFF_BUNDLED_FEAT_ID"/>
</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="78" eventType="Server"/>
						<Action actionName="Set Row Style" actionCategory="General" id="15" styles="Row;AltRow" name="rowStyle" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="158" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
				<SQLParameter id="206" variable="P_BUNDLED_FEATURE_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="P_BUNDLED_FEATURE_ID"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Grid id="288" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="7" connection="Conn" name="P_BILL_COMP" pageSizeLimit="100" wizardCaption=" V P SERVICE CATEGORY " wizardGridType="Tabular" wizardAllowInsert="True" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No Record" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT * 
FROM V_P_RT_BUND_FEAT_BILL_COMP 
WHERE P_RECU_TARIFF_BUNDLED_FEAT_ID = {P_RECU_TARIFF_BUNDLED_FEAT_ID}" pasteAsReplace="pasteAsReplace">
			<Components>
				<Link id="298" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_BILL_COMPDLink" hrefSource="p_bundled_tariff.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="299" sourceType="DataField" name="P_RECU_TARIFF_BUNDLED_FEAT_ID" source="P_RECU_TARIFF_BUNDLED_FEAT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="301" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="skenarioEdit" PathID="P_BILL_COMPskenarioEdit" hrefSource="p_bill_component_act.ccp" wizardUseTemplateBlock="True" fieldSource="CUST_ACCOUNT_DISCOUNT_ID" removeParameters="FLAG">
					<Components/>
					<Events>
					</Events>
					<LinkParameters>
						<LinkParameter id="319" sourceType="DataField" name="P_RT_BUND_FEAT_BILL_COMP_ID" source="P_RT_BUND_FEAT_BILL_COMP_ID"/>
</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="303" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="skenarioDel" PathID="P_BILL_COMPskenarioDel" hrefSource="p_bundled_tariff.ccp" wizardUseTemplateBlock="True" fieldSource="P_RECU_TARIFF_BUNDLED_FEAT_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="304" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="305" sourceType="Expression" name="action_delete2" source="1"/>
						<LinkParameter id="306" sourceType="DataField" name="P_RT_BUND_FEAT_BILL_COMP_ID" source="P_RT_BUND_FEAT_BILL_COMP_ID"/>
</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Label id="289" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_COMPONENT_CODE" fieldSource="BILL_COMPONENT_CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_COMPBILL_COMPONENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
<Hidden id="297" fieldSourceType="DBColumn" dataType="Text" name="P_RT_BUND_FEAT_BILL_COMP_ID" PathID="P_BILL_COMPP_RT_BUND_FEAT_BILL_COMP_ID" fieldSource="P_RT_BUND_FEAT_BILL_COMP_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Label id="292" fieldSourceType="DBColumn" dataType="Text" html="False" name="CURRENCY_CODE" fieldSource="CURRENCY_CODE" wizardCaption="SERVICE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_COMPCURRENCY_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
<Label id="300" fieldSourceType="DBColumn" dataType="Text" html="False" name="CHARGE_AMOUNT" PathID="P_BILL_COMPCHARGE_AMOUNT" fieldSource="CHARGE_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
<Label id="293" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="IS RATED" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_COMPDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
<Link id="296" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ST_NEW" PathID="P_BILL_COMPST_NEW" hrefSource="p_bill_component_act.ccp" wizardUseTemplateBlock="False" removeParameters="P_RT_BUND_FEAT_BILL_COMP_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="317"/>
</Actions>
</Event>
</Events>
					<LinkParameters>
						<LinkParameter id="318" sourceType="Form" format="yyyy-mm-dd" name="P_RECU_TARIFF_BUNDLED_FEAT_ID" source="P_RECU_TARIFF_BUNDLED_FEAT_ID2"/>
</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Navigator id="294" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="295" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
<TextBox id="311" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_RECU_TARIFF_BUNDLED_FEAT_ID" PathID="P_BILL_COMPP_RECU_TARIFF_BUNDLED_FEAT_ID" fieldSource="P_RECU_TARIFF_BUNDLED_FEAT_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="307"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="312"/>
</Actions>
</Event>
</Events>
			<TableParameters>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="309" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
				<SQLParameter id="310" variable="P_RECU_TARIFF_BUNDLED_FEAT_ID" parameterType="URL" dataType="Float" parameterSource="P_RECU_TARIFF_BUNDLED_FEAT_ID" defaultValue="0"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_bundled_tariff_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_bundled_tariff.php" forShow="True" url="p_bundled_tariff.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="79"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="80"/>
			</Actions>
		</Event>
		<Event name="BeforeInitialize" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="287"/>
</Actions>
</Event>
</Events>
</Page>
