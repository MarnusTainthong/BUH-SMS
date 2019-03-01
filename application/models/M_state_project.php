<?php
require_once('Da_state_project.php');

class M_state_project extends Da_state_project {
	
	public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_state()
    {
        $sql = "SELECT pst_id,pst_name
                FROM `sms_project_state` 
                WHERE pst_status != 0";
		$result = $this->db->query($sql);
		return $result;
    }
    // แสดงสถานะของโครงการให้เลือกตอนบันทึกสถานะ opt

    public function get_state_data()
    {
        $sql = "SELECT sms_save_state_project.*,sms_project_state.pst_name
                FROM `sms_save_state_project`
                LEFT JOIN sms_project_state ON sms_save_state_project.ss_state_id = sms_project_state.pst_id
                WHERE sms_save_state_project.ss_status != 0 AND sms_save_state_project.ss_prj_id = ?";
        $result = $this->db->query($sql,array($this->ss_prj_id));
        return $result;
    }
    // datatable project resp by prj_id

}
