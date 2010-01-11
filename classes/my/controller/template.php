<?php defined('SYSPATH') OR die('No direct access allowed.');
     /**
      * This is the basic page controller that all main pages descend
      * from. It contains some basic view logic that is used everywhere,
      * including auth controls.
      * 
      * @category    Controllers
      * @author      Kim Burgestrand <kim@burgestrand.se>
      * @license     http://www.gnu.org/licenses/lgpl-3.0.txt
      */
     class My_Controller_Template extends Controller_Template
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
             $this->template->title = sprintf('%s | *placeholder*', utf8::ucfirst(Request::instance()->controller));
             $this->template->bind('messages', $this->messages);
             
             $this->session = Session::instance('native');
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
     }

/* End of file controller.php */
/* Location: ./application/classes/My/controller.php */ 