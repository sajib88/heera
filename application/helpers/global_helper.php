<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// ------------------------------------------------------------------------

function showSuccessMessage() {
    $ci = &get_instance()
    ?>
    <div class="alert alert-block alert-success fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
        </button>
        <strong>Success!</strong> <?php echo $ci->session->flashdata('success'); ?>
    </div>
<?php
}

function showErrorMessage($error) {
    ?>
    <div class="alert alert-block alert-danger fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
        </button>
        <strong>Error! </strong> <?php echo ' ' . $error; ?>
    </div>
<?php
}

if (!function_exists('get')) {

    function get($table, $where = FALSE, $limit = FALSE, $order_by = FALSE) {
        $CI = &get_instance();
        return $CI->global_model->get($table, $where, $limit, $order_by);
    }

}

if (!function_exists('get_data')) {

    function get_data($table, $where) {
        $CI = &get_instance();
        return $CI->global_model->get_data($table, $where);
    }

}

if (!function_exists('row_count')) {

    function row_count($table, $where) {
        $CI = &get_instance();
        return $CI->global_model->row_count($table, $where);
    }

}

if (!function_exists('count_project')) {

     function count_project($cid) {
        $CI = &get_instance();
        $CI->db->select('*');
        $CI->db->where('userID',$cid);
        return $query = $CI->db->count_all_results('project');
        //return count($query);
        
        
    }

}

if (!function_exists('categoryNameByID')) {

    function categoryNameByID($cid) {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('category', array('CID' => $cid));
        if ($result['name']) {
            return $result['name'];
        } else {
            return false;
        }
    }

}


//pagination
// create paggination configuratin
if (!function_exists('createPagging')) {

    function createPagging($page_url, $total_rows, $per_page, $uri_segment = 3, $num_links = 2) {
        $CI = &get_instance();
        //load the pagging library
        $CI->load->library('pagination');
        // set the configuration
        $config['base_url'] = site_url() . $page_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = $uri_segment;
        $config['num_links'] = $num_links;
        // pagging design section
        // open full tag
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $CI->pagination->initialize($config);
    }

}

if (!function_exists('uploadConfiguration')) {
    function uploadConfiguration() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = './assets/file/';
        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;

        //$config['max_size'] = '51200000';
        $config['file_name'] =time();
//        $config['max_width'] = '1024';
//        $config['max_height'] = '768';
        $CI->upload->initialize($config);
    }

}

if (!function_exists('countryNameByID')) {

    function countryNameByID($countryId) {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('countries', array('id' => $countryId));
        if ($result['name']) {
            return $result['name'];
        } else {
            return false;
        }
    }

}



if (!function_exists('getStatesByCountry')) {

    function getStatesByCountry($personalId) {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('personals', array('id' => $personalId));

        if ($result['country']) {
            $states = $CI->global_model->get('states', array('country_id' => $result['country']));
            return $states;
        } else {
            return false;
        }
    }

}


//////////////////////// private web


if (!function_exists('privategetStatesByCountry')) {

    function privategetStatesByCountry($id) {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('private_website', array('id' => $id));

        if ($result['country']) {
            $states = $CI->global_model->get('states', array('country_id' => $result['country']));
            return $states;
        } else {
            return false;
        }
    }

}
//////////////////////// Public web


if (!function_exists('publicgetStatesByCountry')) {

    function publicgetStatesByCountry($id) {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('public_website', array('id' => $id));

        if ($result['country']) {
            $states = $CI->global_model->get('states', array('country_id' => $result['country']));
            return $states;
        } else {
            return false;
        }
    }

}


/////////////////////////classifiedget

if (!function_exists('classifiedgetStatesByCountry')) {

    function classifiedgetStatesByCountry($id) {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('classified', array('id' => $id));

        if ($result['country']) {
            $states = $CI->global_model->get('states', array('country_id' => $result['country']));
            return $states;
        } else {
            return false;
        }
    }

}

if (!function_exists('getProfessionById')) {

    function getProfessionById($Id='') {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('profession', array('id' => $Id));
        if ($result['name']) {
            return $result['name'];
        } else {
            return false;
        }
    }

}

if (!function_exists('getStatusById')) {

    function getStatusById($Id='') {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('project_status_lookup', array('statusID' => $Id));
        if ($result['statusTitle']) {
            return $result['statusTitle'];
        } else {
            return false;
        }
    }

}


if (!function_exists('getRepaymentScheduleById')) {

    function getRepaymentScheduleById($Id='') {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('repaymentschedulelookup', array('repaymentScheduleID' => $Id));
        if ($result['repaymentScheduleTitle']) {
            return $result['repaymentScheduleTitle'];
        } else {
            return false;
        }
    }

}

if (!function_exists('getpurposeById')) {

    function getpurposeById($Id='') {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('purpose_lookup', array('purposeID' => $Id));
        if ($result['purposeTitle']) {
            return $result['purposeTitle'];
        } else {
            return false;
        }
    }

}


if (!function_exists('getImage')) {

    function getImage($imageType='',$Id='') {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('photos', array('ref_id' => $Id,'ref_name'=>$imageType));
        if ($result['name']) {
            return $result['name'];
        } else {
            return false;
        }
    }

}


if (!function_exists('get_email_tmpl_by_email_name')) {

    function get_email_tmpl_by_email_name($name)
    {
        $CI = &get_instance();
        $query = $CI->db->get_where('emailtmpl',array('email_name'=>$name));
        if($query->num_rows()>0)
        {
            $row = $query->row();
            $values = json_decode($row->values);
            return $values;
        }
        else
        {
            $values = array('subject'=>'Subject Not found','body'=>'body not found');
        }
        return $values;
    }

}



if (!function_exists('confirm_email')) {

    function confirm_email($code)
    {
        $CI = &get_instance();
        //$email = base64_decode($email);
        $query = $CI->db->get_where('users',array('confirmation_key'=>$code));
        if($query->num_rows()>0)
        {
            $CI->load->helper('date');
            $datestring = "%Y-%m-%d %h:%i:00";
            $time = time();

            $data['confirmed'] = 1;
            /*$data['confirmed_date'] = mdate($datestring, $time);*/
            $data['confirmation_key'] = '';
            $CI->db->update('users',$data,array('confirmation_key'=>$code));
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

}


if (!function_exists('uploadConfiguration')) {
    function uploadConfiguration() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = '/assets/file/';
        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;

        //$config['max_size'] = '51200000';
        $config['file_name'] =time();
//        $config['max_width'] = '1024';
//        $config['max_height'] = '768';
        $CI->upload->initialize($config);
    }

}


if (!function_exists('set_recovery_key')) {
    function set_recovery_key($email){
        $CI = &get_instance();
        $recovery_key = uniqid();
        $CI->db->update('users',array('recovery_key'=>$recovery_key),array('email'=>$email));

        $query = $CI->db->get_where('users',array('email'=>$email));
        $data = $query->row_array();
        $data['recovery_key'] = $recovery_key;
        //echo '<pre>';print_r($data);die;
        return $data;

    }
}


?>