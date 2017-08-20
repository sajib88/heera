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
    public function total_sum($table = 'project_fund_history', $where='', $sumField = 'fundedAmount')
    {
        $this->db->select_sum($sumField);
        $this->db->from($table);
        if(!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0]->$sumField;
        } else {
            return false;
        }
    }


    //// total amount
    public function total_amount_collected($table, $where)
    {
        $this->db->select_sum('fundedAmount');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    /// for get amount - view code
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

    public function get_with_left_join($table, $fields='*', $join_table, $join_on, $where = false, $groupBy = '', $all = false) {
        $this->db->select($fields)->from($table);
        $this->db->join($join_table, $join_table . '.' . $join_on . ' = ' . $table . '.' . $join_on, 'left');

        if (!empty($where)) {
            $this->db->where($where);
        }
        if(!empty($groupBy)){
            $this->db->group_by(''.$groupBy.'');
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

    public function get_with_right_join($table, $join_table, $join_on, $where = false, $groupBy = '', $all = false) {
        $this->db->select('*')->from($table);
        $this->db->join($join_table, $join_table . '.' . $join_on . ' = ' . $table . '.' . $join_on, 'right');

        if (!empty($where)) {
            $this->db->where($where);
        }
        if(!empty($groupBy)){
            $this->db->group_by(''.$groupBy.'');
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


    public function funded_by_users($table, $where) {


        $query = $this->db
            ->select('fundedAmount, count(fundedAmount) AS totalLander')
            ->where($where)
            ->group_by('fundedAmount')
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

    public function get_profile_search_data($table, $where, $data, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($table);

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

        if (!empty($where)) {
            $this->db->where($where);
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
    
    public function all_project($id){
       $this->db->select('p.name, p.projectID, p.neededAmount, p.userID, p.statusID, f.fundedAmount, u.first_name as borrowerName');
       $this->db->from('project as p');
        $this->db->join('users as u', 'u.id=p.userID');
        $this->db->select_sum('f.fundedAmount');
       $this->db->join('project_fund_history as f', 'f.projectID=p.projectID', 'left');
       $this->db->where('f.fundedBy', $id);
       $this->db->group_by('p.projectID');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }
    
    public function borrower_funded_project($id){
       $this->db->select('p.*, f.fundedAmount');
       $this->db->from('project as p');
       //$this->db->join('users as u', 'u.id=p.userID');
        $this->db->select_sum('f.fundedAmount');
       $this->db->join('project_fund_history as f', 'f.projectID=p.projectID');
       $this->db->where('p.userID', $id);
       $this->db->group_by('p.projectID');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }

    public function borrower_all_project($id){
        $this->db->select('p.*, f.fundedAmount');
        $this->db->from('project as p');
        $this->db->select_sum('f.fundedAmount');
        $this->db->join('project_fund_history as f', 'f.projectID=p.projectID', 'left');
        $this->db->where('p.userID', $id);
        $this->db->group_by('p.projectID');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }

    public function all_borrower_with_funded_amount($id){
        $this->db->select('p.*, u.*, f.fundedAmount');
        $this->db->from('project as p');
        $this->db->join('users as u', 'u.id=p.userID', 'left');
        $this->db->select_sum('f.fundedAmount');
        $this->db->join('project_fund_history as f', 'f.projectID=p.projectID', 'left');
        $this->db->where('u.profession', $id);
        $this->db->group_by('p.userID');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function borrower_repayment_schedule($id){
       $this->db->select('p.name as projectName,p.statusID as statusID,r.*');       
       $this->db->from('project as p');     
       $this->db->join('repayment_schedules as r', 'r.projectID=p.projectID');
       $this->db->where('p.userID', $id);             
       $this->db->where('p.statusID !=', '10');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }

    public function billable_lendars($status){
        $this->db->select('u.first_name as lenderName,u.inAmount as inAmount,u.id as id,t.*');
        $this->db->from('lander_transaction_history as t');
        $this->db->join('users as u', 'u.id=t.userID');
        $this->db->where('t.transactionStatus', $status);
        //$this->db->group_by('t.projectID');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }


    public function get_project_details_by_id($projectID){
        $this->db->select('p.*,rep.*');
        $this->db->from('project as p');
        $this->db->join('repaymentschedulelookup as rep', 'p.RepaymentScheduleID=rep.repaymentScheduleID');
        $this->db->where('p.projectID', $projectID);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
        //return $query;
    }

    public function get_repayment_check($id){
        $this->db->select('p.*, u.first_name as borrowerName, p.repaymentScheduleID as repid, sl.repaymentScheduleTitle');
        $this->db->from('project as p');
        $this->db->join('users as u', 'u.id=p.userID', 'left');
        $this->db->join('repaymentschedulelookup as sl', 'p.repaymentScheduleID=sl.repaymentScheduleID', 'left');

        //$this->db->join('project_fund_history as f', 'f.projectID=p.projectID', 'left');
        //$this->db->join('repayment_schedules as rep', 'rep.projectID=p.projectID', 'left');
       // $this->db->select_sum('f.fundedAmount');
        $this->db->where('p.statusID', $id);
        $query = $this->db->get();
        ///echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_repayment_balance($id){
        $this->db->select('r.*, h.repaidAmount,h.repaidDateTime,h.repaidAmount as amountpay,r.projectID as pid');
        $this->db->from('repayment_schedules as r');
        $this->db->join('project_repaid_history as h', 'h.projectID=r.projectID');
        $this->db->where('r.projectID', $id);

        //echo $this->db->last_query();

        //$this->db->select('h.*, r.*');
       // $this->db->from('project_repaid_history as h');
       // $this->db->join('repayment_schedules as r', 'h.projectRepaidID=r.repaymentScheduleID', 'left');
       // $this->db->where('r.projectID', $id);

        $query = $this->db->get();

        ///echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_funded_project_list($id){
        $this->db->select('p.*,rep.repaymentScheduleID');
        $this->db->from('project as p');
        $this->db->join('repayment_schedules as rep', 'p.projectID=rep.projectID', 'left');
        $this->db->where('p.statusID', $id);
        $this->db->group_by('rep.projectID');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function lenders_projects_funded_amount($id){
        $this->db->select('p.name,p.neededAmount,p.statusID, f.*, u.first_name as borrowerName');
        $this->db->from('project as p');
        $this->db->select_sum('f.fundedAmount');
        $this->db->join('project_fund_history as f', 'f.projectID=p.projectID');
        $this->db->join('users as u', 'u.id=p.userID');
        $this->db->where('f.fundedBy', $id);

        if(!empty($statusID)){
            $this->db->where('p.statusID', $statusID);
        }
        $this->db->group_by('f.projectID');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function borrowerAllProject($id='', $statusID=''){
        $this->db->select('p.projectID, p.name,p.neededAmount,p.statusID, f.fundedAmount, u.first_name as lenderName');
        $this->db->from('project as p');
        $this->db->select_sum('f.fundedAmount');
        $this->db->join('project_fund_history as f', 'f.projectID=p.projectID','left');
        $this->db->join('users as u', 'u.id=f.fundedBy','left');
        $this->db->where('p.userID', $id);
        if(!empty($statusID)){
            $this->db->where('p.statusID', $statusID);
        }
        $this->db->group_by('p.projectID');
        $query = $this->db->get();
        //echo "<pre>"; print_r($query->result());echo "</pre>";

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getProjectFunding($id=''){
        $this->db->select('p.name, p.projectID, f.projectID, f.fundedDateTime, f.fundedAmount, f.fundedBy, u.first_name as lenderName');
        $this->db->from('project as p');
        $this->db->join('project_fund_history as f', 'f.projectID=p.projectID');
        $this->db->join('users as u', 'u.id=f.fundedBy');
        $this->db->where('p.userID', $id);
        $query = $this->db->get();
        //echo "<pre>"; print_r($query->result());echo "</pre>";

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getRepaidFunding($id=''){
        $this->db->select('p.projectID, p.name, r.repaidDateTime, r.projectID, r.repaidAmount, r.repaidStatus');
        $this->db->from('project as p');
        $this->db->join('project_repaid_history as r', 'r.projectID=p.projectID');
        $this->db->where('p.userID', $id);
        $query = $this->db->get();
        //echo "<pre>"; print_r($query->result());echo "</pre>";

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function all_lenders_with_funded_amount($id)
    {
        $query = $this->db->query("SELECT users.id,users.first_name,users.created,users.lastLogin,users.inAmount,project_fund_history.fundedBy,project_fund_history.projectID,project.`name`,project.statusID,project.neededAmount,
                                    sum(project_fund_history.fundedAmount) as fundedAmount
                                    FROM users INNER JOIN project_fund_history ON users.id = project_fund_history.fundedBy
                                      INNER JOIN project ON project_fund_history.projectID = project.projectID
                                    WHERE users.id = $id OR users.profession = $id                                 
                                    GROUP BY project_fund_history.fundedBy, users.id");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getLenderPerProject($id=''){
        $this->db->select('p.projectID, p.userID, f.fundedAmount, f.fundedBy, u.id, u.first_name as lenderName');
        $this->db->from('project as p');
        $this->db->select_sum('f.fundedAmount');
        $this->db->join('project_fund_history as f', 'f.projectID=p.projectID');
        $this->db->join('users as u', 'u.id=f.fundedBy');
        $this->db->where('p.projectID', $id);
        $this->db->group_by('f.fundedBy');
        $query = $this->db->get();
        //echo "<pre>"; print_r($query->result());echo "</pre>";

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function projectList($id = ''){
        $this->db->select('p.*, f.fundedAmount, u.first_name as borrowerName');
        $this->db->from('project as p');
        $this->db->join('users as u', 'u.id=p.userID');
        $this->db->join('project_fund_history as f', 'f.projectID=p.projectID', 'left');
        $this->db->select_sum('f.fundedAmount');
        $this->db->where('p.statusID', $id);
        $this->db->group_by('p.projectID');
        $query = $this->db->get();
        //echo "<pre>"; print_r($query->result());echo "</pre>";

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function allprojectList(){
        $this->db->select('p.*, f.fundedAmount, u.first_name as borrowerName');
        $this->db->from('project as p');
        $this->db->join('users as u', 'u.id=p.userID');
        $this->db->join('project_fund_history as f', 'f.projectID=p.projectID', 'left');
        $this->db->select_sum('f.fundedAmount');

        $this->db->group_by('p.projectID');
        $query = $this->db->get();
        //echo "<pre>"; print_r($query->result());echo "</pre>";

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function repaymentList(){
        $this->db->select('p.projectID, p.name as projectName, u.first_name as borrowerName, r.*');
        $this->db->from('project as p');
        $this->db->join('project_repaid_history as r', 'r.projectID=p.projectID');
        $this->db->join('users as u', 'u.id=p.userID');
        //$this->db->group_by('p.projectID');
        $query = $this->db->get();
        //echo "<pre>"; print_r($query->result());echo "</pre>";

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function front_projectList($id){
        $this->db->select('p.*, f.fundedAmount as totalRaisedAmount, u.first_name, u.email, u.dateofbirth, u.phone, u.profilepicture');
        $this->db->from('project as p');
        $this->db->join('users as u', 'u.id=p.userID');
        $this->db->join('project_fund_history as f', 'f.projectID=p.projectID', 'left');
        $this->db->select_sum('f.fundedAmount');
        $this->db->where('p.projectID', $id);
        $this->db->group_by('p.projectID');
        $query = $this->db->get();
        //echo "<pre>"; print_r($query->result());echo "</pre>";

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }




}

