<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('mlogin'); 
	}

	function index(){
		
		if($this->mlogin->dahlogin()){
			redirect("home");
		}else{
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			$this->form_validation->set_message('required','<div class="alert alert-danger" style="margin-top: 3px">
                <div class="header"><b>
                <i class="fa fa-exclamation-circle">
                </i> {field}</b> harus diisi</div></div>');

			if ($this->form_validation->run() == TRUE) {
				
				$usern = $this->input->post('username');	
				$pass = $this->input->post('password');


				$cek = $this->mlogin->ceklogin('user', array('username' => $usern), array('password' => $pass));


				if ($cek != FALSE) {
					foreach ($cek as $apps) {
						$session_data=array(
							'id'=>$apps->id,
							'nama'=>$apps->nama,
							'username'=>$apps->username,
							'password'=>$apps->password,
							'role'=>$apps->role
						);

						$this->session->set_userdata($session_data);
						
						if($this->session->userdata('role')=='Pemilik')
						{
							redirect('home');
						}else 
						{
							redirect('kasir/penjualan');
						}
					}

					

				
				}else{

					$data['error']='<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b>
                        <i class="fa fa-exclamation-circle">
                        </i> ERROR</b> username atau 
                        password salah!</div></div>';
                        $this->load->view('vlog',$data);
				}			
			}else{
				$this->load->view('vlog');
				}
		}
	}

	function ceklogin()
	{

	}

	//function login(){

		//$uname=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
		//$pass =htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

		//$cek = $this->mlogin->user($uname,$pass);

		//if($cek->num_rows()>0){
			//$data=$cek->row_array();
			//$this->session->set_userdata('masuk',TRUE);
			//$this->session->set_userdata('ses_id',$data['username']);
			//$this->session->set_userdata('ses_nm',$data['nama']);
			//redirect('home');
		//}
		//else{
			//$url=base_url();
			//echo $this->session->set_flashdata('msg','Login Gagal');
		//}

	//}
		
}
?>