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
			$data['nameEvent'] = $this->input->post('nameEvent');
			$data['timeStart'] = $this->input->post('timeStart');
			$data['timeEnd'] = $this->input->post('timeEnd');
			$data['dateEvent'] = $this->input->post('dateEvent');
			$data['locationEvent'] = $this->input->post('locationEvent');
			$data['descriptionEvent'] = $this->input->post('descriptionEvent');
			$data['userCreator'] = $_SESSION['user']['username'];
			$data['idOrg'] = $this->input->post('org');

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
