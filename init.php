<?php defined('SYSPATH') OR die('No direct access allowed.');
    
    // Adds trace logger
    Kohana::$log->attach(new Log_File_Exception(APPPATH.'logs'), array(Kohana::DEBUG));
    
/* End of file init.php */
/* Location: ./modules/template/init.php */ 