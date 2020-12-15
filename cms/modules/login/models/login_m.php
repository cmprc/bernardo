<?php if ( ! defined('BASEPATH')){exit('No direct script access allowed'); }

/**
 * Model
 *
 * @package ezoom
 * @subpackage login
 * @category Model
 * @author Fábio Bachi
 * @copyright 2014 Ezoom
 */
class login_m extends MY_Model {

    /**
     * Metodo construtor
     *
     */
    public function __construct() {
        parent::__construct();
    }

    public function get_user ($login, $pass){

        $this->load->library('PasswordHash');

        $this->db->select('cfr_user.*, cfr_user_group.name AS groupName')
                 ->from('cfr_user')
                 ->join('cfr_user_group', 'cfr_user_group.id = cfr_user.id_group', 'INNER')
                 ->where('login', $login)
                 ->or_where('email', $login);

        $query = $this->db->get();
        $user = $query->row();

        if (count($user) == 0)
            return false;

        if ($user->status == '0')
            return false;

        if (!$this->passwordhash->CheckPassword($pass, $user->password))
            return false;

        $this->db->where('id', $user->id);
        $this->db->update('cfr_user', array('last_access' => date('Y-m-d H:i:s')));

        return $user;
    }

}
?>
