<?php (defined('BASEPATH')) or exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH."third_party/MX/Router.php";
require( BASEPATH .'database/DB'. EXT );

/**
 * CodeIgniter MY_Router
 *
 * Rotas da aplicação
 *
 * @package     CodeIgniter
 * @author      Ezoom
 * @subpackage  Loader
 * @category    Loader
 * @link        http://ezoom.com.br
 * @copyright  Copyright (c) 2008, Ezoom
 * @version 1.0.0
 *
 */
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
}
