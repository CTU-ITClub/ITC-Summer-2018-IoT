<?php
class Morg extends CI_Model {
    protected $_table = 'organizations';
    protected $_list = array();
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

    public function getChild($idparent){
        $findChild = $this->getList('parent', $idparent);

        foreach ($findChild as $key => $child) {
          if (!$child) break;
          $list = array(
            'id' => $child['id'],
            'text' => $child['text'],
            'description' => $child['description'],
            'parent' => $child['parent'],
          );
          array_push($this->_arr,$list);
          $this->getChild($child['id']);
        }
        return $this->_arr;
    }

    public function getListOrg($idparent) {
        // Thong tin nut goc
        $rootNode = $this->getOrgById($idparent);
        // Them nut goc vao list
        array_push($this->_list,$rootNode);

        // Them cac nut la vao list
        $childNode = $this->getChild($idparent);
        foreach ($childNode as $key => $node) {
          array_push($this->_list,$node);
        }

        return $this->_list;
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
