<?php

class Upload extends CI_Controller {

        function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->model('admin/upload_img');
        }

        function index()
        {
                $this->load->view('admin/img_form/upload', array('error' => ' ' ));
        }

        function do_upload()
        {
                $config['upload_path']          = './upload/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = '2048000';
                $config['max_width']            = 1920;
                $config['max_height']           = 1080;
                $config['encrypt_name']         = true;

                $this->load->library('upload', $config);

                /*if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('admin/img_form/upload', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        
                        $this->upload_img->index($this->upload->data('file_name'), $this->upload->data('file_type'));

                        $this->load->view('admin/img_form/upload_success', $data);
                }*/
        }
}
?>
