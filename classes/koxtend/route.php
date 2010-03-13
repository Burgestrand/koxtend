<?php defined('SYSPATH') OR die('No direct access allowed.');
    /**
     * @package     Koxtend
     * @author      Kim Burgestrand
     * @license     http://www.gnu.org/licenses/lgpl-3.0.txt
     */
    class Koxtend_Route extends Kohana_Route
    {
        /**
         * Find the first route matching the given URI
         * 
         * @param string uri
         * @return route|false
         */
        public static function find($uri)
        {
            foreach (Route::all() as $route)
            {
                if ($route->matches($uri))
                {
                    return $route;
                }
            }
            
            return FALSE;
        }
    }
    
/* End of file route.php */
/* Location: ./modules/koxtend/classes/template/route.php */ 
