<?php defined('SYSPATH') OR die('No direct access allowed.');
    /**
     * An extension to the Kohana session driver
     *
     * @package     Template
     * @category    Sessions
     * @author      Kim Burgestrand
     * @license     http://www.gnu.org/licenses/lgpl-3.0.txt
     */
    abstract class Template_Session extends Kohana_Session
    {
        /**
         * Retrieves a value and deletes it from the session afterwards.
         *
         * @param string variable name
         * @param mixed default
         * @return mixed
         */
        public function take($key, $default = NULL)
        {
            $value = parent::get($key, $default);
            parent::delete($key);
            return $value;
        }
    }

/* End of file Session.php */
/* Location: ./application/classes/Session.php */