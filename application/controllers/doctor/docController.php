
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');

    }

    public function getState() {
       /* header('Content-type: application/json');
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('states', array('country_id' => $id));
        echo json_encode($states);*/
        /*$data['states'] = $states;
        echo $this->load->view('state', $data, TRUE);
        exit;*/
        /*header('Content-type: application/json');
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('states', array('country_id' => $id));
        echo json_encode($states);*/
       /* $data['states'] = $states;
        echo $this->load->view('state', $data, TRUE);*/
        //header('Content-type: application/json');
        if(!empty($_GET)){
            $id = $_GET['state'];
            $states = $this->global_model->get('states', array('country_id' => $id));
            echo json_encode($states);
        }
    }

    public function publicSearch(){
        if(!empty($_POST)){
            /*print '<pre>';
            print_r($_POST);die;*/
            $data= array();
            $data['profession']=$_POST['profession'];
            $data['country'] = $_POST['country'];
            $data['state'] = $_POST['state'];
            $data['table'] = 'public_website';

            $result['searchData'] = $this->global_model->getPublicSearchData($data);


            /*print '<pre>';
            print_r($searchData);die;*/

            $this->load->view('doctor/search_view',$result);

        }
    }
}
?>
