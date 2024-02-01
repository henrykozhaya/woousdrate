<?php
 /**
 * @package LogicEmpower
 */

namespace LogicInc\Base;

use \LogicInc\Base\BaseController;	

class SettingsLinks extends BaseController
{
	public function register() 
	{
		add_filter( "plugin_action_links_" . $this->plugin, array( $this, 'settings_link' ) );
	}

    public function settings_link( $links ){
		array_push( $links, '<i class="fas fa-cog" style="color:#0073aa"></i>&nbsp;<a href="admin.php?page=logicempower_plugin">Settings</a>' );
		return $links;        
    }
}