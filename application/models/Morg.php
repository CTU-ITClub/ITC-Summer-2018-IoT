<?php
class Morg extends CI_Model {
    protected $_table = 'organizations';
    protected $_arr = array();

    public function __construct(){
        parent::__construct();
    }

    public function getList($where = null, $value = null){
        $this->db->select('*');
        if ($where != null) {
            $this->db->where($where, $value);
        }
        return $this->db->get($this->_table)->result_array();
    }

    public function countAll(){
        return $this->db->count_all($this->_table);
    }

    public function getOrgById($id){
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getChildNumRows($idparent){
        $findChild = $this->db->query("SELECT * FROM $this->_table WHERE parent = '$idparent'");
        return $findChild->num_rows();
    }

    public function getListChildByOrg($idparent) {
        // Tim kiem nut la ke
        foreach ($this->getList('parent',$idparent) as $key => $value) {
          if($value['id'] != $idparent) {
            // Chen nut la
            array_push($this->_arr,$value);
            $data[] = $value['id'];
          }
        }

        foreach ($data as $key => $id) {
          if($this->getChildNumRows($id) > 0) {
            return $this->getListChildByOrg($id);
          } else {
            return $this->_arr;
          }
        }
    }

    public function getListOrgById($idparent) {
        // Chen nut goc
        foreach ($this->getList('id',$idparent) as $key => $value) {
          array_push($this->_arr,$value);
        }

        if($this->getChildNumRows($idparent) > 0) {
          // foreach ($this->getList('parent',$idparent) as $key => $value) {
          //   return $this->getListChildByOrg($value['id']);
            return $this->getListChildByOrg($idparent);
          // }
        } else {
          return $this->_arr;
        }
    }

    public function insertOrg($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

   // public function deleteUser($id){
   //     $this->db->where("id", $id);
   //     return $this->db->delete($this->_table);
   //  }

    // public function insertUser($data_insert){
    //     $this->db->insert($this->_table,$data_insert);
    // }

    // public function getUserById($id){
    //     $this->db->where("id", $id);
    //     return $this->db->get($this->_table)->row_array();
    // }
    //
    // public function getUserByUsername($uid){
    //     $this->db->where("username", $uid);
    //     return $this->db->get($this->_table)->row_array();
    // }
    //
    // public function updateUser($data_update, $id){
    //     $this->db->where("id", $id);
    //     $this->db->update($this->_table, $data_update);
    // }
}
