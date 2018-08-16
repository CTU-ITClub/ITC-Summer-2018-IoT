<?php
class Analytics extends CI_Controller {

	  protected $_data = array('div_alert' => 'container','type' => null,'url' => null,'content' => null);

		// Hàm khởi tạo
		function __construct() {
				// Gọi đến hàm khởi tạo của cha
				parent::__construct();
	      $this->_data['url'] = base_url();
				// $this->load->model('Mstaff');
		}

		public function index()
		{
			$this->_data['subview'] = 'admin/report/report_admin_view.php';
      $this->_data['titlePage'] = 'Báo cáo - Thống kê';
      $this->load->view('main.php', $this->_data);
		}
}
