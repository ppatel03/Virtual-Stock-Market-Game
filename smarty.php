<?php

// load Smarty library

require('C:/smarty/libs/Smarty.class.php');

class smarty_connect extends Smarty 
{
   function smarty_connect()
   {
        // Class Constructor. 
        // These automatically get set with each new instance.

		$this->Smarty();

		$this->template_dir = 'smarty/templates';
		$this->config_dir = 'smarty/configs';
		$this->compile_dir = 'smarty/templates_c';
		$this->cache_dir = 'smarty/cache';
   }
}
?>