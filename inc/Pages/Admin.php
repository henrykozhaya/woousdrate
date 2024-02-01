<?php 
 /**
 * @package LogicEmpower
 */

namespace LogicInc\Pages;

use LogicInc\Api\SettingsApi;
use LogicInc\Base\BaseController;
use LogicInc\Api\Callbacks\AdminCallbacks;


/**
* 
*/
class Admin extends BaseController
{
	public $settings;
	public $pages;
	public $callbacks; 

	public function set_pages()
	{
		$this->pages = array(
			array(
				'page_title' => 'Woo USD Rate',
				'menu_title' => 'Woo USD Rate',
				'capability' => 'manage_options',
				'menu_slug' => 'logicempower_plugin',
				'callback' => array( $this->callbacks, 'admin_dashboard' ),
				'icon_url' => 'dashicons-money-alt',
				'position' => 2
			)
		);
	}

	public function set_sub_pages()
	{
		$this->sub_pages = array();
	}

	public function register() 
	{
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();
		$this->set_pages();	
		$this->set_sub_pages();	
		
		$this->set_settings();	
		$this->set_sections();	
		$this->set_fields();	

		$this->settings->add_pages( $this->pages )->with_sub_page( 'Dashboard' )->add_sub_page( $this->sub_pages )->register();
	}

	public function set_settings()
	{
		$args = array(
			array(
				"option_group" => "logicempower_option_group",
				"option_name" => "le_client_name",
				"callback" => array( $this->callbacks, "logicempower_client_name_handler" )
			),
			array(
				'option_group' => 'logicempower_option_group',
				'option_name' => 'le_client_license',
				"callback" => array( $this->callbacks, "logicempower_client_license_handler" )
			)
			,
			array(
				'option_group' => 'logicempower_option_group',
				'option_name' => 'default_usd_rate',
				"callback" => array( $this->callbacks, "logicempower_default_usd_rate_handler" )
			)
			,
			array(
				'option_group' => 'logicempower_option_group',
				'option_name' => 'currency_to_display',
				"callback" => array( $this->callbacks, "logicempower_currency_to_display_handler" )
			)
		);

		$this->settings->set_settings( $args );
		
	}

	public function set_sections()
	{
		$args = array(
			array(
				"id" => "logicempower_admin_index",
				"title" => "General Settings",
				"callback" => array( $this->callbacks, "logicempower_admin_section" ),
				"page" => "logicempower_plugin"
			)
		);

		$this->settings->set_sections( $args );

	}

	public function set_fields()
	{
		$args = array(
			array(
				"id" => "le_client_name",
				"title" => "Client Name",
				"callback" => array( $this->callbacks, "logicempower_input_client_name" ),
				"page" => "logicempower_plugin",
				'section' => 'logicempower_admin_index',
				'args' => array(
					'label_for' => 'le_client_name',
					'class' => 'example-class'
				)				
			),
			array(
				'id' => 'le_client_license',
				'title' => 'License',
				'callback' => array( $this->callbacks, 'logicempower_input_client_license' ),
				'page' => 'logicempower_plugin',
				'section' => 'logicempower_admin_index',
				'args' => array(
					'label_for' => 'le_client_license',
					'class' => 'example-class'
				)
			)
			,
			array(
				'id' => 'default_usd_rate',
				'title' => 'USD Default Rate',
				'callback' => array( $this->callbacks, 'logicempower_input_default_usd_rate' ),
				'page' => 'logicempower_plugin',
				'section' => 'logicempower_admin_index',
				'args' => array(
					'label_for' => 'default_usd_rate',
					'class' => 'example-class'
				)
			)
			,
			array(
				'id' => 'currency_to_display',
				'title' => 'Currency to display',
				'callback' => array( $this->callbacks, 'logicempower_input_currency_to_display' ),
				'page' => 'logicempower_plugin',
				'section' => 'logicempower_admin_index',
				'args' => array(
					'label_for' => 'currency_to_display',
					'class' => 'example-class'
				)
			)
		);

		$this->settings->set_fields( $args );

	}
}
