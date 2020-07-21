<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{

   function __construct()
   {
      $this->ci =&get_instance();
   }

   function juraganview($template, $data='')
   {

      $data['content'] = $this->ci->load->view($template, $data, TRUE);
      $data['nav']  = $this->ci->load->view('juragan/juragannav', $data, TRUE);

      $this->ci->load->view('juragan/dashboard', $data);

   }
   
    function pegawaiview($template, $data='')
   {

      $data['content'] = $this->ci->load->view($template, $data, TRUE);
      $data['nav']  = $this->ci->load->view('pegawai/pegawainav', $data, TRUE);

      $this->ci->load->view('pegawai/dashboard', $data);

   }
}
