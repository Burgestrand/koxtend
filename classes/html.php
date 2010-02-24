<?php defined('SYSPATH') OR die('No direct access allowed.');
    /**
     * HTML Extension class
     *
     * @package     Änglarna STHLM
     * @author      Kim Burgestrand
     * @license     http://www.gnu.org/licenses/gpl-3.0.txt
     */
    class HTML extends Kohana_HTML
    {
        /**
         * Calculates the correct paging offsets and returns
         * the view using them
         * 
         * @param int current page
         * @param int total pages
         * @param int max number of pages shown at a time
         * @return View
         */
        public static function paging($page, $total, $pages = 10)
        {
            $diff = floor($pages / 2);
            $data = array(
                'start'     => 1, // first page
                'decrement' => max(1 /*start */, $page - $pages),
                'low'       => max(1 /*start */, min($total - $diff * 2, $page - $diff)),
                'current'   => $page,
                'high'      => min($total, max($pages, $page + $diff)),
                'increment' => min($total, $page + $pages),
                'end'       => max(1, $total),
                'pages'     => $pages,
            );
                        
            return View::factory('html/paging', array_map('intval', $data));
        }
    }
    
/* End of file html.php */
/* Location: ./application/classes/html.php */ 