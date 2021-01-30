<?php (defined('BASEPATH')) or exit('No direct script access allowed');

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package CodeIgniter
 * @author  ExpressionEngine Dev Team
 * @copyright  Copyright (c) 2006, EllisLab, Inc.
 * @license http://codeigniter.com/user_guide/license.html
 * @link http://codeigniter.com
 * @since   Version 2.1.4
 * @filesource
 */

class MY_Controller extends MX_Controller
{
    protected $title;
    protected $filter;
    protected $module;
    protected $method;
    protected $class;
    protected $current_lang;
    protected $current_module;
    protected $view;
    protected $slug;
    protected $model;

    public function __construct()
    {
      parent::__construct();

        //Carrega o template
        $this->load->library('template');

        $this->title = SITE_NAME;

        $this->load->helper('language');
        $this->load->helper('url');

        $this->lang->load('default');

        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->method = $this->router->fetch_method();
        $this->current_module = $this->auth->get_current_module();

        $this->slug = $this->module == $this->class
                    ? str_replace('_', '-', $this->module)
                    : str_replace('_', '-', $this->module.'/'.$this->class);

        //Carrega a pasta language de cada module, quando existe
        $this->lang->load($this->module.'/default');

        // Carregamento de plugins padrões
        $this->load_default();
    }

    public function load_default()
    {
        /**
         * Verifica se a requisição não é ajax
         * X-Requested-With: XMLHttpRequest
         */
        if (!$this->input->is_ajax_request()) {

            // Mantem sessão flashdata
            if ($this->current_module)
                $this->session->keep_filter(array($this->current_module->slug));

            $logo = 'userfiles' . DS . 'logo.png';
            if (!file_exists($logo)) {
                $logo = false;
            }

            $this->template
                 ->set('lang', $this->current_lang)
                 ->set('logo', $logo)
                 ->set('title', 'Dashboard')
                 ->set('module', $this->module)
                 ->set('class', $this->class)
                 ->set('method', $this->method)
                 ->set('slug', $this->slug)
                 ->set('order_by', $this->session->flashdata('order_by'))
                 ->set('current_module', $this->current_module)
                 ->set_partial('header', 'header', 'comum')
                 ->set_partial('sidebar', 'sidebar', 'comum');
                //  ->set_partial('footer', 'footer', 'comum');
        }
    }

    public function search(){
      $data = $this->input->post();

      if($this->module != 'home'){
        $this->load->model("{$this->module}_m", 'model_module');
        $items = $this->model_module->get(array('search' => $data['search']));

        $this->template
          ->set('search', $data['search'])
          ->set('items', $items)
          ->build('listagem');
      }
      else{
        redirect('home');
      }
    }

    protected function _do_upload($name = null, $gallerypath = false, $model = false, $id_parent = false)
    {
        if (is_array($_FILES[$name]["name"])) {
            $ids = array();
            foreach ($_FILES[$name]["name"] as $key => $value) {
                $info = pathinfo($value, PATHINFO_EXTENSION);

                if(in_array($info, array("png", "jpg", "jpeg"))){
                    $ids[] = $this->_upload($name, $key, $gallerypath, $model, $id_parent);
                    if (!$ids) {
                        return false;
                    }
                }
            }
            return $ids;
        } else {
            $info = pathinfo($_FILES[$name]["name"], PATHINFO_EXTENSION);
            if(in_array($info,array("png", "jpg", "jpeg"))){
                return array($this->_upload($name, false, $gallerypath, $model, $id_parent));
            }else{
                return array();
            }
        }
    }

    protected function _upload($name = null, $index = false, $gallerypath = false, $model = false, $id_parent = false)
    {
        $response = array();

        set_time_limit(0);

        $gallerypath = $gallerypath ? $gallerypath : 'userfiles/empresa';

        // Cria o diretório (caso não exista) e já insere o .gitignore
        $folder = dirname(FCPATH) . DS . $gallerypath;
        if (!is_dir($folder)) {
            @mkdir($folder, 0755);
            if (is_dir($folder)) {
                $content = "*" . PHP_EOL . "!*/" . PHP_EOL . "!.gitignore";
                $fp = fopen($folder . "/.gitignore", "wb");
                fwrite($fp, $content);
                fclose($fp);
            }
        }

        $this->load->helper('file');
        $this->load->library('WideImage');

        if (!isset($_FILES[$name])) {
            return false;
        }
        $file = $_FILES[$name];

        $file['name'] = $index ? $file['name'][$index] : $this->valid_array($file['name']);
        $file['type'] = $index ? $file['type'][$index] : $this->valid_array($file['type']);
        $file['tmp_name'] = $index ? $file['tmp_name'][$index] : $this->valid_array($file['tmp_name']);
        $file['error'] = $index ? $file['error'][$index] : $this->valid_array($file['error']);
        $file['size'] = $index ? $file['size'][$index] : $this->valid_array($file['size']);

        switch ($file['error']) {
            case UPLOAD_ERR_OK:
                $file = isset($file) ? $file : false;
                break;
            case UPLOAD_ERR_INI_SIZE:
                $response['message'] = 'O arquivo no upload é maior do que o limite definido !';
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $response['message'] = 'O arquivo no upload é maior do que o limite definido !';
                break;
            case UPLOAD_ERR_PARTIAL:
                $response['message'] = 'o upload não foi completado com sucesso!';
                break;
            case UPLOAD_ERR_NO_FILE:
                $response['message'] = 'o upload não foi completado com sucesso!';
                break;
        }

        if ($file) {
            $response['status'] = true;
            $response['classe'] = 'success';

            $originalName = $file['name'];
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $file_name = pathinfo($file['name'], PATHINFO_FILENAME);
            $hash = md5(date('U') . uniqid(rand(), true) . $file['name']);

            $i = 1;
            // $newName = $name = slug($file_name);
            $newName = $name = $file_name;
            $newPath = FCPATH . $gallerypath . DS . $newName  . '.' . strtolower($extension);
            while (is_file($newPath)) {
                $name = $newName . '-' . $i;
                $newPath = FCPATH . $gallerypath . DS . $name . '.' . strtolower($extension);
                $i++;
            }

            if (!move_uploaded_file($file["tmp_name"], $newPath)) {
                $response['status'] = false;
                $response['classe'] = 'error';
            } else {
                // if (in_array(strtolower($extension), array('jpg', 'png', 'jpeg'))) {
                // if (isset($data['resize'])) {
                    // $width = !empty($data['width']) && (int)$data['width'] > 1600 ? $data['width'] : 1600;
                    // $width = 400;
                    // $height = !empty($data['height']) && (int)$data['height'] > 1200 ? $data['width'] : 1200;
                    // $height = 'auto';
                    // $corte = !empty($data['fit']) ? $data['fit'] : 'inside';

                    // list($realWidth, $realHeight, $t, $a) = getimagesize($newPath);

                    // if ($width < $realWidth || $height < $realHeight) {
                    //     $this->wideimage->load($newPath)->resize($width, $height, 'inside')->saveToFile($newPath);
                    // }
                // }

                $file = new \stdClass();
                $file->name = $newName;

                $size = filesize($newPath);
                if ($size < 0) {
                    $size += 2.0 * (PHP_INT_MAX + 1);
                }

                $file->size = $size;

                $size = getimagesize($newPath, $info);

                list($width, $height) = $size;
                $ext = pathinfo($newPath, PATHINFO_EXTENSION);
                $file->info = array(
                    'width'         => $width,
                    'height'        => $height,
                    'orientation'   => $width >= $height ? 'h' : 'v',
                    'extension'     => $ext,
                    'name'          => rtrim($name, '.' . $ext),
                    'optmized'      => FALSE
                );

                if (isset($info['APP13'])) {
                    $iptc = iptcparse($info['APP13']);

                    $iptcHeaderArray = array(
                        '2#005' => 'title',
                        // '2#010'=>'Urgency',
                        '2#015' => 'category',
                        '2#025' => 'tags',
                        // '2#020'=>'Subcategories',
                        // '2#040'=>'SpecialInstructions',
                        // '2#055'=>'CreationDate',
                        '2#080' => 'author',
                        // '2#085'=>'AuthorTitle',
                        // '2#090'=>'City',
                        // '2#095'=>'State',
                        // '2#101'=>'Country',
                        // '2#105'=>'Headline',
                        // '2#110'=>'Source',
                        // '2#115'=>'PhotoSource',
                        '2#116' => 'copyright',
                        '2#120' => 'caption',
                        // '2#122'=>'captionWriter'
                    );

                    if (isset($iptc) && is_array($iptc)) {
                        $head = array();
                        foreach ($iptc as $key => $value) {
                            if (isset($iptcHeaderArray[$key])) {
                                $head[$iptcHeaderArray[$key]] = implode(';', $value);
                            }
                        }
                        $file->info = array_merge($file->info, $head);
                    }
                }

                if ($this->config->item('image-optimization')) {
                    // echo '<pre>';die(var_dump($newPath));
                    $this->load->library('ImageOptimization');
                    $optimized = $this->imageoptimization->optimize($newPath);

                    if ($optimized)
                        $file->info['optimized'] = TRUE;
                }

                $file->info = (object) $file->info;
                $file->info->path = $gallerypath;
                $file->id_parent = $id_parent;

                $model = $model ? $model : 'empresa_m';
                $id_file = $this->{$model}->insert_file($file);

                $response['message'] = 'Imagem enviada com sucesso!';
            }

            if (!isset($id_file)) {
                $response['status'] = false;
                $response['classe'] = 'error';
            } else {
                return $id_file;
            }
        } else {
            $response['status'] = false;
            $response['classe'] = 'error';
        }
        echo json_encode($response);
    }

    private function valid_array($param = null)
    {
        if (is_array($param)) {
            $chave = key($param);
            if (is_array($param[$chave]))
                $new_param = $this->valid_array($param[$chave]);
            else
                $new_param = $param[$chave];
        } else
            $new_param = $param;

        return $new_param;
    }

}
