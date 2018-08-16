<?php
class Index extends CI_Controller {

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
      $this->_data['subview'] = 'admin/admin_view';
      $this->_data['titlePage'] = 'Trang quản trị';
      $this->load->view('main.php', $this->_data);
		}
}
