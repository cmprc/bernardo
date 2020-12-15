<?php (defined('BASEPATH')) or exit('No direct script access allowed');

/**
 * CodeIgniter MX_Model
 *
 * Metodos utilizado em todos os models no projeto atual.
 *
 * @package     CodeIgniter
 * @author      Ezoom
 * @subpackage  Model
 * @category    Model
 * @link        http://ezoom.com.br
 * @copyright  Copyright (c) 2008, Ezoom
 * @version 1.0.0
 *
 */
class MY_Model extends CI_Model
{

  /**
   * Modulo acessado
   * @var string
   */
  public $module;

  public $current_module;

  /**
   * Método acessado
   * @var string
   */
  public $method;

  /**
   * Classe acessada
   * @var string
   */
  public $class;

  /**
   * Error retornado pelo DB
   * @var string
   */
  public $error;

  /**
   * Numero do erro retornado pelo DB
   * @var integer
   */
  public $error_number;

  /**
   * Tabela do model
   * @var string
   */
  public $table;

  /**
   * Idioma atual
   * @var string
   */
  public $current_lang = null;

  public function __construct()
  {
    //$this->db->query("SET lc_time_names = 'pt_BR'");
    $this->db->query("SET SESSION group_concat_max_len = 1000000");

    parent::__construct();
  }

  public static function slugify($text)
  {
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
      return 'n-a';
    }

    return $text;
  }
}
