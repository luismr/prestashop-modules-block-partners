<?php
/*
 * Module ......: blockpartners
 * File ........: blockpartners.php
 * Description .: Simple Prestashop Module to publish partners logo on template
 * Authot ......: Luis Machado Reis <luis.reis@singularideas.com.br>
 * Licence .....: GNU Lesser General Public License V3
 * Created .....: 01/09/2010
 */
class blockpartners extends Module {

	private $_html = '';
	private $partner1name = '';
	private $partner2name = '';
	private $partner3name = '';
	private $partner4name = '';

	private $partner1url = '';
	private $partner2url = '';
	private $partner3url = '';
	private $partner4url = '';

	private $partner1logo = '';
	private $partner2logo = '';
	private $partner3logo = '';
	private $partner4logo = '';

	function __construct() {
		$this->name = 'blockpartners';
		parent::__construct();

		$this->tab = 'SingularIdeas.com.br Modules';
		$this->version = '0.1';
		$this->displayName = $this->l('Partners Block');
		$this->description = $this->l('Partners Logos Block');

		$this->_refresh();
	}

	function install() {
		if (parent::install() == false || $this->registerHook('leftColumn') == false) {
			return false;
		}
				
		return true;
	}

	public function getContent() {
		if (Tools::isSubmit('submit')) {
			$this->_update();
		}

		$this->_displayForm();
		return $this->_html;
	}
	
	public function _displayForm() {
		$this->_refresh();
		$this->_html .= '
			<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
				<fieldset>
					<legend><img src="../modules/'.$this->name.'/logo.gif" />'.$this->l('Partners Block').'</legend>
					<label>'.$this->l('Partner 1 name').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="partner_1_name" value="'.$this->partner1name.'"/>
					</div>
					<label>'.$this->l('Partner 1 url').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="partner_1_url" value="'.$this->partner1url.'"/>
					</div>
					<label>'.$this->l('Partner 1 logo url').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="partner_1_logo" value="'.$this->partner1logo.'"/>
					</div>

					<label>'.$this->l('Partner 2 name').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="partner_2_name" value="'.$this->partner2name.'"/>
					</div>
					<label>'.$this->l('Partner 2 url').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="partner_2_url" value="'.$this->partner2url.'"/>
					</div>
					<label>'.$this->l('Partner 2 logo url').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="partner_2_logo" value="'.$this->partner2logo.'"/>
					</div>

					<label>'.$this->l('Partner 3 name').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="partner_3_name" value="'.$this->partner3name.'"/>
					</div>
					<label>'.$this->l('Partner 3 url').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="partner_3_url" value="'.$this->partner3url.'"/>
					</div>
					<label>'.$this->l('Partner 3 logo url').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="partner_3_logo" value="'.$this->partner3logo.'"/>
					</div>

					<label>'.$this->l('Partner 4 name').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="partner_4_name" value="'.$this->partner4name.'"/>
					</div>
					<label>'.$this->l('Partner 4 url').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="partner_4_url" value="'.$this->partner4url.'"/>
					</div>
					<label>'.$this->l('Partner 4 logo url').'</label> 
					<div class="margin-form">
						<input type="text" size="75" name="partner_4_logo" value="'.$this->partner4logo.'"/>
					</div>

					<input type="submit" name="submit" value="'.$this->l('Update').'" class="button" />
				</fieldset>
			</form>';	
	}

	/**
	* Returns module content for left column
	*
	* @param array $params Parameters
	* @return string Content
	*
	* @todo Links on tags (dedicated page or search ?)
	*/
	function hookLeftColumn($params) {
		global $smarty;

		$smarty->assign('partner_1_name', $this->partner1name);
		$smarty->assign('partner_2_name', $this->partner2name);
		$smarty->assign('partner_3_name', $this->partner3name);
		$smarty->assign('partner_4_name', $this->partner4name);

		$smarty->assign('partner_1_url', $this->partner1url);
		$smarty->assign('partner_2_url', $this->partner2url);
		$smarty->assign('partner_3_url', $this->partner3url);
		$smarty->assign('partner_4_url', $this->partner4url);

		$smarty->assign('partner_1_logo', $this->partner1logo);
		$smarty->assign('partner_2_logo', $this->partner2logo);
		$smarty->assign('partner_3_logo', $this->partner3logo);
		$smarty->assign('partner_4_logo', $this->partner4logo);

		return $this->display(__FILE__, 'blockpartners.tpl');
	}

	function hookRightColumn($params) {
		return $this->hookLeftColumn($params);
	}

	private function _refresh() {
		$this->partner1name = Configuration::get($this->name.'_partner_1_name');
		$this->partner2name = Configuration::get($this->name.'_partner_2_name');
		$this->partner3name = Configuration::get($this->name.'_partner_3_name');
		$this->partner4name = Configuration::get($this->name.'_partner_4_name');
		
		$this->partner1url = Configuration::get($this->name.'_partner_1_url');
		$this->partner2url = Configuration::get($this->name.'_partner_2_url');
		$this->partner3url = Configuration::get($this->name.'_partner_3_url');
		$this->partner4url = Configuration::get($this->name.'_partner_4_url');
		
		$this->partner1logo = Configuration::get($this->name.'_partner_1_logo');
		$this->partner2logo = Configuration::get($this->name.'_partner_2_logo');
		$this->partner3logo = Configuration::get($this->name.'_partner_3_logo');
		$this->partner4logo = Configuration::get($this->name.'_partner_4_logo');
	}
	
	private function _update() {
		Configuration::updateValue($this->name.'_partner_1_name', Tools::getValue('partner_1_name'));
		Configuration::updateValue($this->name.'_partner_2_name', Tools::getValue('partner_2_name'));
		Configuration::updateValue($this->name.'_partner_3_name', Tools::getValue('partner_3_name'));
		Configuration::updateValue($this->name.'_partner_4_name', Tools::getValue('partner_4_name'));

		Configuration::updateValue($this->name.'_partner_1_url', Tools::getValue('partner_1_url'));
		Configuration::updateValue($this->name.'_partner_2_url', Tools::getValue('partner_2_url'));
		Configuration::updateValue($this->name.'_partner_3_url', Tools::getValue('partner_3_url'));
		Configuration::updateValue($this->name.'_partner_4_url', Tools::getValue('partner_4_url'));

		Configuration::updateValue($this->name.'_partner_1_logo', Tools::getValue('partner_1_logo'));
		Configuration::updateValue($this->name.'_partner_2_logo', Tools::getValue('partner_2_logo'));
		Configuration::updateValue($this->name.'_partner_3_logo', Tools::getValue('partner_3_logo'));
		Configuration::updateValue($this->name.'_partner_4_logo', Tools::getValue('partner_4_logo'));
	}
}
