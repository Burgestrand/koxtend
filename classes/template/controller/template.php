<?php defined('SYSPATH') OR die('No direct access allowed.');
     /**
      * This is the basic page controller that all main pages descend
      * from. It contains some basic view logic that is used everywhere,
      * including auth controls.
      * 
      * @package     Template
      * @category    Controllers
      * @author      Kim Burgestrand
      * @license     http://www.gnu.org/licenses/lgpl-3.0.txt
      */
     class Template_Controller_Template extends Kohana_Controller_Template
     {
         public $messages = array();
         protected $session;
         
         /**
          * Add a message with the given type.
          * 
          * @param msg      The message to display
          * @param type     The message type (or div class)
          */
         public function message_add($msg, $type = 'info')
         {
             if ( ! isset($this->messages[$type]))
             {
                 $this->messages[$type] = array();
             }
             $this->messages[$type][] = $msg;
         }
         
         /**
          * Binds some common variables to the template view, such as
          * `title`, `messages` etcetera.
          */
         public function before()
         {
             parent::before();
             View::set_global('title', sprintf('%s', utf8::ucfirst($this->request->controller)));
             View::bind_global('messages', $this->messages);
         }
         
         /**
          * If the request is an AJAX request then the template is
          * stripped out from the response, and only the content is 
          * returned.
          */
         public function after()
         {
             if (Request::$is_ajax)
             {
                 $this->request->response = $this->template->content;
             }
             else
             {
                 parent::after();
             }
         }
         
         /**
          * Returns true if the request is internal.
          * 
          * @return bool
          */
         public function is_internal()
         {
             return Request::instance() !== $this->request;
         }
     }

/* End of file template.php */
/* Location: ./classes/controller/template.php */ 