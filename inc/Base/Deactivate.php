<?php
 /**
 * @package LogicEmpower
 */

namespace LogicInc\Base;

class Deactivate
{
	public static function deactivate() 
	{
		flush_rewrite_rules();
	}
}