<?php 
/**
 * @package  LogicEmpower
 */
namespace LogicInc\Api\Callbacks;

use LogicInc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function admin_dashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

	public function logicempower_client_name_handler($input)
	{
		if ( $input != "Perfect Timing" ):
			return null;
		endif;
		return $input;
	}

	public function logicempower_client_license_handler($input)
	{
		if ( $input != "2cc33761-20b2-48cf-bcc3-233f279f2ab6" ):
			return null;
		endif;
		return $input;
	}

	public function logicempower_default_usd_rate_handler($input)
	{
		if ( $input < 1500 ):
			return null;
		endif;
		return $input;
	}

	public function logicempower_currency_to_display_handler($input)
	{
		return $input;
	}

	public function logicempower_admin_section()
	{
		echo 'Please make sure to validate your csv report content before uploading it below!';
	}

	public function logicempower_input_client_name()
	{
		$value = esc_attr( get_option( 'le_client_name' ) );
		echo '<input type="text" class="regular-text" name="le_client_name" value="' . $value . '" placeholder="Enter your company name" >';
	}

	public function logicempower_input_client_license()
	{
		$value = esc_attr( get_option( 'le_client_license' ) );
		echo '<input type="text" class="regular-text" name="le_client_license" value="' . $value . '" placeholder="Enter your license">';
	}	

	public function logicempower_input_default_usd_rate()
	{
		$value = esc_attr( get_option( 'default_usd_rate' ) );
		echo '<input type="number" class="regular-text" name="default_usd_rate" value="' . $value . '" placeholder="Enter the default USD rate" >';
	}

	public function logicempower_input_currency_to_display()
	{
		$value = esc_attr( get_option( 'currency_to_display' ) );
		echo '<input type="text" class="regular-text" name="currency_to_display" value="' . $value . '" placeholder="Enter the currency to display" >';
	}
}