<?php defined('SYSPATH') OR die('No direct access allowed.');
    /**
     * @package     KoXtend
     * @author      Kim Burgestrand
     * @license     http://www.gnu.org/licenses/lgpl-3.0.txt
     */
    class Koxtend_Request extends Kohana_Request
    {
        /**
         * Redirect to current page (basically a page refresh)
         * 
         * This is useful when you POST data to a page and want to be
         * able to refresh it without resending it.
         * 
         * @param code HTTP status code (default: 303)
         * @return void
         */
        public function reload($code = 303)
        {
            $this->redirect($this->uri(), $code);
        }
    }
    
/* End of file request.php */
/* Location: ./classes/koxtend/request.php */ 