<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crear extends CI_Controller
{
    
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->model('Modelo_crear');
        $data["registros"] = $this->Modelo_crear->registros();
        $data["nombre"]    = "pepito";
        $this->load->view('crear', $data);
    }
    
    
    public function get_datos()
    {
        $arr = array(
			'rut'=> '76891821',
			'razon_social' => 'Lucha Spa',
            'fecha_constitucion' => 1530662400,
            'fecha_inicio_actividades' => 1531872000,
			'termino_giro' => true,
            'rep_nombre' => 'Ariel Isaac Salas Herrera',
            'rep_rut' => 19164350,
            'socios' => array(
				array(
					'nombre' => 'Ariel Isaac Salas Herrera',
					'rut' => 19164350,
					'acciones' => 50
            	),
				array(
					'nombre' => 'Ariel Isaac Salas Herrera',
					'rut' => 19164350,
					'acciones' => 999
				),
				array(
					'nombre' => 'Rodrigo Esteban Carrasco Avendaño',
					'rut' => 184079194,
					'acciones' => 25
				)
			)
            
        );
        header('Content-Type: application/json');
        echo json_encode($arr);
    }
    
    
}