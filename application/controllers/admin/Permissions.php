<?php
class Permissions extends CI_Controller {

	  protected $_data = array('div_alert' => 'container','type' => null,'url' => null,'content' => null);

		// Hàm khởi tạo
		function __construct() {
				// Gọi đến hàm khởi tạo của cha
				parent::__construct();
	      $this->_data['url'] = base_url();
				$this->load->model('Mstaff');
				$this->load->model('Mstudent');
		}

		public function index($do = null, $name = null)
		{
				$this->_data['subview'] = 'admin/account_device/permission_admin_view.php';
				$this->_data['titlePage'] = 'Quản lý phân quyền và quyền truy cập';
				$this->_data['content'] = $this->Mrole->getList();
				$this->load->view('main.php', $this->_data);
		}

		public function add($do = null, $name = null)
		{
				$this->_data['subview'] = 'admin/account_device/add_permission_view.php';
				$this->_data['titlePage'] = 'Thêm nhóm quyền';
				$this->load->view('main.php', $this->_data);
		}

		public function custom($do = null, $name = null)
		{
				$this->_data['subview'] = 'admin/account_device/custom_permission_view.php';
				$this->_data['titlePage'] = 'Tùy biến phân quyền';
				$this->_data['role'] = $this->Mrole->getRoleByName($name);
				$this->_data['count'] = $this->Mrole->countAllByName($name);
				$this->load->view('main.php', $this->_data);
		}
}
