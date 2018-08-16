<?php
class Event extends CI_Controller {

	  protected $_data = array('div_alert' => 'container','type' => null,'url' => null,'content' => null);

		// Hàm khởi tạo
		function __construct() {
				// Gọi đến hàm khởi tạo của cha
				parent::__construct();
	      $this->_data['url'] = base_url();
				$this->load->model(array('Mstaff','Mstudent','Mdevice','Mkey','Mregister','Mattendance'));
		}

		public function index()
		{
      $this->_data['subview'] = 'admin/event/events_admin_view.php';
      $this->_data['titlePage'] = 'Quản lý sự kiện';
			$this->_data['content'] = $this->Mevent->getList();
      $this->load->view('main.php', $this->_data);
		}

		public function add_event(){
			$data['nameEvent'] = htmlspecialchars(addslashes($_POST['nameEvent']));
			$data['timeStart'] = $_POST['timeStart'];
			$data['timeEnd'] = $_POST['timeEnd'];
			$data['dateEvent'] = $_POST['dateEvent'];
			$data['locationEvent'] = htmlspecialchars(addslashes($_POST['locationEvent']));
			$data['descriptionEvent'] = htmlspecialchars(addslashes($_POST['descriptionEvent']));
			$data['userCreator'] = $_SESSION['user'];
			$data['idOrg'] = $_POST['org'];

			$status = $this->Mevent->insertEvent($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Thêm sự kiện thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Thêm sự kiện thất bại!"));
			}
    }

		public function edit_event($id = null)
		{
      $this->_data['subview'] = 'admin/event/event_edit_view.php';
      $this->_data['titlePage'] = 'Chỉnh sửa sự kiện';
			$this->_data['content'] = $this->Mevent->getById($id);
      $this->load->view('main.php', $this->_data);
		}
}
