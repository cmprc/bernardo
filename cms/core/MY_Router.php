<?php (defined('BASEPATH')) or exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Router.php";
require(BASEPATH . 'database/DB' . EXT);

class MY_Router extends MX_Router
{
    private $db_routing = array();
    private $db_lang_route = array();
    private $db_current_route = array();
    private $db;

    public function __construct()
    {

        session_start();
        parent::__construct();
    }

    /**
     * Set the route mapping
     *
     * This function determines what should be served based on the URI request,
     * as well as any "routes" that have been set in the routing config file.
     *
     * @access  private
     * @return void
     */

    /**
     * Gera o array de rotas para o CodeIgniter.
     * Entretanto, se a flag route_db no config for TRUE, ira buscar as rotas do banco e setar o idioma corretamente de acordo com a url atual;
     * @author Fabio Bachi [fabio.bachi@ezoom.com.br]
     * @author Ralf da Rocha [ralf@ezoom.com.br]
     * @date   2014-11-28
     */
    public function _set_routing()
    {
        // Are query strings enabled in the config file?  Normally CI doesn't utilize query strings
        // since URI segments are more search-engine friendly, but they can optionally be used.
        // If this feature is enabled, we will gather the directory/class/method a little differently
        $segments = array();
        if ($this->config->item('enable_query_strings') === true and isset($_GET[$this->config->item('controller_trigger')])) {
            if (isset($_GET[$this->config->item('directory_trigger')])) {
                $this->set_directory(trim($this->uri->_filter_uri($_GET[$this->config->item('directory_trigger')])));
                $segments[] = $this->fetch_directory();
            }

            if (isset($_GET[$this->config->item('controller_trigger')])) {
                $this->set_class(trim($this->uri->_filter_uri($_GET[$this->config->item('controller_trigger')])));
                $segments[] = $this->fetch_class();
            }

            if (isset($_GET[$this->config->item('function_trigger')])) {
                $this->set_method(trim($this->uri->_filter_uri($_GET[$this->config->item('function_trigger')])));
                $segments[] = $this->fetch_method();
            }
        }

        // Fetch the complete URI string
        $this->uri->_fetch_uri_string();

        // Do we need to remove the URL suffix?
        $this->uri->_remove_url_suffix();

        // Compile the segments into an array
        $this->uri->_explode_segments();

        // Modo tradicional de rotas do CodeIgniter atraves do config/routes.php

        // Load the routes.php file.
        if (defined('ENVIRONMENT') and is_file(APPPATH . 'config/' . ENVIRONMENT . '/routes.php')) {
            include(APPPATH . 'config/' . ENVIRONMENT . '/routes.php');
        } elseif (is_file(APPPATH . 'config/routes.php')) {
            include(APPPATH . 'config/routes.php');
        }

        $this->routes = (!isset($route) or !is_array($route)) ? array() : $route;
        unset($route);

        // Set the default controller so we can display it in the event
        // the URI doesn't correlated to a valid controller.
        $this->default_controller = (!isset($this->routes['default_controller']) or $this->routes['default_controller'] == '') ? false : strtolower($this->routes['default_controller']);

        // Were there any query string segments?  If so, we'll validate them and bail out since we're done.
        if (count($segments) > 0) {
            return $this->_validate_request($segments);
        }

        // Is there a URI string? If not, the default controller specified in the "routes" file will be shown.
        if ($this->uri->uri_string == '') {
            return $this->_set_default_controller();
        }

        // Parse any custom routing that may exist
        $this->_parse_routes();

        // Re-index the segment array so that it starts with 1 rather than 0
        $this->uri->_reindex_segments();
    }

    public function get_browser_lang()
    {

        $browser_lang = strtolower(substr((isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : 'pt'), 0, 2));

        return (array_key_exists($browser_lang, config_item('supported_lang'))) ? $browser_lang : config_item('language_abbr');
    }

    public function get_routes()
    {
        return $this->db_lang_route;
    }

    public function get_current_route()
    {
        global $CFG;
        $config = &$CFG->config;
        $config['language_abbr'] = $_SESSION['user_lang'];

        return $this->db_current_route;
    }

}
