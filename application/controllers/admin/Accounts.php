<?php
class Accounts extends CI_Controller {

	  protected $_data = array('div_alert' => 'container','type' => null,'url' => null,'content' => null);

		// Hàm khởi tạo
		function __construct() {
				// Gọi đến hàm khởi tạo của cha
				parent::__construct();
	      $this->_data['url'] = base_url();
				$this->load->model('Mstaff');
				$this->load->model('Mstudent');
				$this->load->model('Mdevice');
				$this->load->model('Mkey');
				$this->load->model('Mregister');
				$this->load->model('Mattendance');
		}

		public function index()
		{
			$this->_data['subview'] = 'admin/account_device/index_view.php';
      $this->_data['titlePage'] = 'Quản lý tài khoản, người dùng và thiết bị';
      $this->load->view('main.php', $this->_data);
		}

		public function rfid()
		{
			$this->_data['subview'] = 'admin/account_device/rfid_admin_view.php';
			$this->_data['titlePage'] = 'Quản lý thẻ RFID';
			$this->_data['content'] = $this->Mrfid->getList();
			$this->load->view('main.php', $this->_data);
		}

		public function rfid_detail($id = null, $isStudent = null)
		{
			$this->_data['subview'] = 'admin/account_device/rfid_detail_view.php';
			$this->_data['titlePage'] = 'Quản lý thẻ RFID - Chi tiết định danh';
			$this->_data['idCard'] = $id;
			if ($isStudent == 'student') {
				$this->_data['typeID'] = 'studentID';
				$this->_data['typeName'] = 'Student';
				$this->_data['content'] = $this->Mstudent->getById($id);
			} else {
				$this->_data['typeID'] = 'staffID';
				$this->_data['typeName'] = 'Staff';
				$this->_data['content'] = $this->Mstaff->getById($id);
			}
			$this->load->view('main.php', $this->_data);
		}

		public function user()
		{
      $this->_data['subview'] = 'admin/account_device/account_admin_view.php';
      $this->_data['titlePage'] = 'Quản lý tài khoản';
			$this->_data['content'] = $this->Maccount->getList();
      $this->load->view('main.php', $this->_data);
		}

		public function edit_account($uid = null)
		{
			$existAccount = $this->Maccount->getByUsername($uid);
      if ($existAccount) {
				$this->_data['subview'] = 'admin/account_device/account_edit_view.php';
				$this->_data['titlePage'] = 'Chỉnh sửa tài khoản';
	      $this->_data['uid'] = $uid;
				$this->_data['content'] = $existAccount;
			}
      $this->load->view('main.php', $this->_data);
		}

		public function device_api()
		{
      $this->_data['subview'] = 'admin/account_device/index_admin_view.php';
      $this->_data['titlePage'] = 'Quản lý thiết bị và API';
      $this->load->view('main.php', $this->_data);
		}

		public function device_admin($id = null)
		{
			$existDevice = $this->Mdevice->getById($id);
			if ($existDevice) {
				$this->_data['subview'] = 'admin/account_device/device_edit_view.php';
	      $this->_data['titlePage'] = 'Cấp phát API cho thiết bị';
				$this->_data['id'] = $id;
				$this->_data['device'] = $existDevice;
			} else {
				$this->_data['subview'] = 'admin/account_device/devices_admin_view.php';
	      $this->_data['titlePage'] = 'Quản lý thiết bị và API';
				$this->_data['content'] = $this->Mdevice->getList();
			}
      $this->load->view('main.php', $this->_data);
		}

		public function api_admin($id = null)
		{
			$existApi = $this->Mkey->getById($id);
			if($existApi) {
				$this->_data['subview'] = 'admin/account_device/api_add_view.php';
	      $this->_data['titlePage'] = 'Cấp phát API cho thiết bị';
				$this->_data['idApi'] = $id;
			} else {
				$this->_data['subview'] = 'admin/account_device/api_admin_view.php';
	      $this->_data['titlePage'] = 'Quản lý thiết bị và API';
				$this->_data['content'] = $this->Mkey->getList();
			}
      $this->load->view('main.php', $this->_data);
		}
}
