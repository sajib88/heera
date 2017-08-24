<?php

class Repayment_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('encrypt');
        $this->load->database();
    }


    public function repaymentList(){

        $this->db->select('p.projectID, p.name as projectName, u.first_name as borrowerName, rs.*');
        $this->db->from('repayment_schedules as rs');
        $this->db->join('project as p', 'rs.projectID=p.projectID', 'left');
        $this->db->join('users as u', 'u.id=p.userID', 'left');
        $this->db->where('p.isScheduleCreated', 1);


        /*$this->db->select('p.projectID, p.name as projectName, u.first_name as borrowerName, r.*, u2.first_name as processBy');
        $this->db->from('project_repaid_history as r');
        $this->db->join('project as p', 'r.projectID=p.projectID', 'left');
        $this->db->join('users as u', 'u.id=r.repaidBy', 'left');
        $this->db->join('users as u2', 'u2.id=r.paymentProcessBy', 'left');
        $this->db->where('p.isScheduleCreated', 1);*/
        //$this->db->group_by('p.projectID');
        $query = $this->db->get();
        //echo "<pre>"; print_r($query->result());echo "</pre>";

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function repayment_info_by_scheduleid($scheduleID){

        $this->db->select('r.*, p.name,p.userID as borrowerId');
        $this->db->from('repayment_schedules as r');
        $this->db->join('project as p', 'p.projectID = r.projectID', 'left');
        $this->db->where('r.repaymentScheduleID', $scheduleID);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}

?>
