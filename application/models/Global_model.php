<?php

class Global_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /**
     * @param $table
     * @param $data
     *
     * @return mixed
     */
    public function get_product($table, $brand_id = false, $model = false, $keyword = false, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($table);

        if (!empty($brand_id)) {

            $this->db->where('brand_id', $brand_id);
        }
        if (!empty($model)) {

            $this->db->like('name', $model, 'both');
        }

        if (!empty($keyword)) {

            $this->db->like('title', $keyword, 'both');
        }
        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //$this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    /**
     * @param $table
     * @param $where
     *
     * @return bool
     */
    public function get_data($table, $where) {
        $query = $this->db->get_where($table, $where);
        if ($query->result()) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    /**
     * @param $table
     * @param $data
     * @param $where
     *
     * @return mixed
     */
    public function update($table, $data, $where) {
        $this->db->where($where);

        return $this->db->update($table, $data);
    }

    /**
     * @param $table
     * @param $where
     * @return mixed
     */
    public function delete($table, $where) {
        return $this->db->delete($table, $where);
    }

    /**
     * @param $table
     *
     * @return bool
     */
    public function get($table, $where = false, $limit = false, $order_by = false) {
        $this->db->select('*')->from($table);

        if (!empty($where)) {
            $this->db->where($where);
        }

        if (!empty($limit)) {
            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //$this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /**
     * @param      $table
     * @param      $like
     * @param bool $where
     *
     * @return bool
     */
    public function get_like($table, $like, $where = false) {

        $this->db->select('*');
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }
        $this->db->like($like);
        $query = $this->db->get();

        if ($query->num_rows()) {
            return $query->result();
        } else {
            return false;
        }
    }

    /**
     * @param      $table
     * @param      $join_table
     * @param      $jon_on
     * @param bool $where
     * @param bool $all
     *
     * @return bool
     */
    public function get_with_join($table, $join_table, $join_on, $where = false, $all = false) {
        $this->db->select('*')->from($table);

        $this->db->join($join_table, $join_table . '.' . $join_on . ' = ' . $table . '.' . $join_on);

        if (!empty($where)) {
            $this->db->where($where);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            if ($all) {
                return $query->result();
            } else {
                return $query->row_array();
            }
        } else {
            return false;
        }
    }

    /**
     * @param $table
     * @param $where
     *
     * @return bool
     */
    public function get_row($table, $where) {
        $query = $this->db->get_where($table, $where);

        if ($result = $query->result()) {

            return true;
        } else {
            return false;
        }
    }

    public function count_row($table) {
        $this->db->select('*');
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    public function check_table_data($table, $where) {
        $all_datas = array();
        $this->db->select('*')->from($table);
        $this->db->where($where);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function  get_classified_data($user_id){
        $get_data=$this->db->select('classified.*,classified.id as classified_id,classified.phone as classified_phone,audio.*,files.*,photos.name as photo_name,video.*,users.*')
            ->from('classified')
            ->where('classified.user_id',$user_id)
            ->join('users','users.id =classified.user_id','left')
            ->join('classified_main_cat','classified_main_cat.id =classified.main_cat','left')
            ->join('audio','audio.ref_id=classified.id','left')
            ->join('video','video.ref_id=classified.id','left')
            ->join('files','files.ref_id=classified.id','left')
            ->join('photos','photos.ref_id=classified.id','left')
            ->group_by('classified.id')
            ->get();
       return $get_data;
    }
    public function  get_classified_data_edit($user_id){
        $get_data=$this->db->select('classified.*,classified.id as classified_id,classified.phone as classified_phone,audio.*,files.*,photos.name as photo_name,video.*,users.*')
            ->from('classified')
            ->where('classified.id ',$user_id)
            ->join('users','users.id =classified.user_id','left')
            ->join('classified_main_cat','classified_main_cat.id =classified.main_cat','left')
            ->join('audio','audio.ref_id=classified.id','left')
            ->join('video','video.ref_id=classified.id','left')
            ->join('files','files.ref_id=classified.id','left')
            ->join('photos','photos.ref_id=classified.id','left')
            ->group_by('classified.id')
            ->get();
        return $get_data;
    }

    public function get_personal_search_data($table, $data, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($table);

        if (!empty($data['country'])) {

            $this->db->where('country', $data['country']);
        }
        if (!empty($data['state'])) {

            $this->db->like('state', $data['state']);
        }

        if (!empty($data['city'])) {

            $this->db->like('city', $data['city']);
        }
        if (!empty($data['profession'])) {

            $this->db->like('profession', $data['profession']);
        }
        if (!empty($data['maritalstatus'])) {

            $this->db->like('maritalstatus', $data['maritalstatus']);
        }
        if (!empty($data['lang'])) {

            $this->db->like('lang', $data['lang']);
        }
        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //echo $this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }

    public function get_ces_search_data($table, $data, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($table);

        if (!empty($data['country'])) {

            $this->db->where('country', $data['country']);
        }
        if (!empty($data['state'])) {

            $this->db->like('state', $data['state']);
        }

        if (!empty($data['postcode'])) {

            $this->db->like('postcode', $data['postcode']);
        }
        if (!empty($data['profession'])) {

            $this->db->like('profession', $data['profession']);
        }
        if (!empty($data['business_name'])) {

            $this->db->like('business_name', $data['business_name']);
        }
        if (!empty($data['business_phone'])) {

            $this->db->like('business_phone', $data['business_phone']);
        }
        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //echo $this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }


    public function getStateByAjax() {
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('states', array('country_id' => $id));
        $data['states'] = $states;
        echo $this->load->view('state', $data, TRUE);
        exit;
    }

    public function getPublicSearchData($data, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($data['table']);

        if (!empty($data['country'])) {

            $this->db->where('country', $data['country']);
        }
        if (!empty($data['state'])) {

            $this->db->like('state', $data['state']);
        }

        if (!empty($data['profession'])) {

            $this->db->like('profession', $data['profession']);
        }
        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }
        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //echo $this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }
    
    ///// WHERE WITH COUNT THE ROW---- >>>>
    public function count_row_where($table, $where) {
        $query = $this->db->get_where($table, $where);
        if ($query->result()) {
            return $query->num_rows();
        } else {
            return false;
        }
    }




}

