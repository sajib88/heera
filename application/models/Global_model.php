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

    //// total amount
    public function total_sum($table, $where)
    {
        $this->db->select_sum('fundedAmount');
        $this->db->from($table);
        //$this->db->where('dates BETWEEN DATE_ADD(NOW(), INTERVAL -7 DAY) AND NOW() ');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0]->fundedAmount;
        } else {
            return false;
        }
    }



    public function total_sum_amount($table, $where)
    {
        $this->db->select_sum('fundedAmount');
        $this->db->from($table);
        //$this->db->where('dates BETWEEN DATE_ADD(NOW(), INTERVAL -7 DAY) AND NOW() ');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
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
        $this->db->select_sum('fundedAmount');
        $this->db->join($join_table, $join_table . '.' . $join_on . ' = ' . $table . '.' . $join_on);

        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->group_by('fundedAmount');

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

    public function get_data_join($table, $join_table, $join_on, $where = false, $all = false) {
        $this->db->select('*')->from($table);

        $this->db->join($join_table, $join_table . '.' . $join_on . ' = ' . $table . '.' . $join_on);

        if (!empty($where)) {
            $this->db->where($where);
        }

        $query = $this->db->get();


        if ($query->result()) {
            return $query->row_array();
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




    public function getStateByAjax() {
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('states', array('country_id' => $id));
        $data['states'] = $states;
        echo $this->load->view('state', $data, TRUE);
        exit;
    }




    public function count_row_funded($table, $where) {


        $query = $this->db
            ->select('fundedBy, count(fundedBy) AS totalLander')
            ->where($where)
            ->group_by('projectID')
            ->get($table);
            $res = $query->result();

        if ($query->result()) {
            return $res[0]->totalLander;
        } else {
            return false;
        }
    }


    public function count_row__project($table, $where) {


        $query = $this->db
            ->select('fundedBy, count(projectID) AS totaproject')
            ->where($where)
            ->group_by('fundedBy')
            ->get($table);
        $res = $query->result();

        if ($query->result()) {
            return $res[0]->totaproject;
        } else {
            return false;
        }
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

    public function get_profile_search_data($table, $data, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($table);

        if (!empty($data['country'])) {

            $this->db->like('country', $data['country']);
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

        if (!empty($data['name'])) {

            $this->db->like('name', $data['name']);
        }

        if (!empty($data['purposeID'])) {

            $this->db->where('purposeID', $data['purposeID']);
        }

        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //echo $this->db->last_query();exit();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }

    public function total_funded($table, $where)
    {
        $this->db->select_sum('fundedAmount');
        $this->db->from($table);
        //$this->db->where('dates BETWEEN DATE_ADD(NOW(), INTERVAL -7 DAY) AND NOW() ');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }



}

