<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscar extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	//	$this->load->model('Modelo_buscar');
		//$data["registros"]=$this->Modelo_buscar->registros();
		$data["nombre"]="pepito";	
		$this->load->view('buscar',$data);
	}

	public function delete_registro(){
		$id=$this->input->post('id_registro');
		$this->load->model('Modelo_buscar');
		$this->Modelo_buscar->delete_registro($id);
		$this->session->set_userdata('mensaje',"Registro eliminado correctamente");
		redirect("registro/index","refresh");
	}

	public function update_registro(){
		$nombre=$this->input->post('registro');
		$correo=$this->input->post('correo');
		$id=$this->input->post('id_registro');
		$this->load->model('Modelo_buscar');
		$registro=[
			"NOMBRE"=>$nombre,
			"CORREO"=>$correo
		];
		$this->Modelo_buscar->update_registro($registro,$id);
		$this->session->set_userdata('mensaje',"Registro modificado correctamente");
		redirect("registro/index","refresh");
     
	}

	public function add_registro(){
		if ($this->input->post('registro')==null || $this->input->post('correo')==null) {
			redirect("registro/index","refresh");
		}
		$nombre=$this->input->post('registro');
		$correo=$this->input->post('correo');
		$this->load->model('Modelo_buscar');
		$registro=[
			"NOMBRE"=>$nombre,
			"CORREO"=>$correo
		];
		$this->Modelo_buscar->add_registro($registro);
		$this->session->set_userdata('mensaje',"Registro agregado correctamente");
		redirect("registro/index","refresh");

	}

	public function saludo($nombre){
		echo "hola que tal ".$nombre;
	}

}
