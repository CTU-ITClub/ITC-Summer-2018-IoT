<?php
class Attendance extends CI_Controller {

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
			$this->_data['subview'] = 'admin/event/attendance_admin_view.php';
			$this->_data['titlePage'] = 'Quản lý điểm danh';
			$this->load->view('main.php', $this->_data);
		}

		public function event($id = null)
		{
			$result = $this->Mattendance->getByEvent($id);
			$event = $this->Mevent->getById($id);
			if ($result) {
				$this->_data['subview'] = 'admin/event/attendance_detail_view.php';
				$this->_data['titlePage'] = 'Chi tiết điểm danh';
				$this->_data['content'] = $result;
				$this->_data['event'] = $event['nameEvent'];
				$this->load->view('main.php', $this->_data);
			} else {
				$this->_data['subview'] = 'alert/load_alert_view';
				$this->_data['titlePage'] = 'Cảnh báo';
				$this->_data['type'] = 'warning';
				$this->_data['url'] = base_url('admin/attendance');
				$this->_data['content'] = 'Sự kiện chưa được điểm danh';
				$this->load->view('main.php', $this->_data);
			}
		}

		public function edit_attendance($idCard = null)
		{
			$result = $this->Mattendance->getByCard($idCard);
			if ($result) {
					$this->_data['subview'] = 'admin/event/attendance_edit_view.php';
					$this->_data['titlePage'] = 'Chi tiết điểm danh';
					$this->_data['idCard'] = $idCard;
					$this->_data['content'] = $result;
					$this->load->view('main.php', $this->_data);
			} else {
					$this->load->view('alert/load_alert_view',$this->_data);
			}
		}
}
