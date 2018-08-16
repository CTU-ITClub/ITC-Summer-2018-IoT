<?php
class Organizations extends CI_Controller {

	  protected $_data = array('div_alert' => 'container','type' => null,'url' => null,'content' => null);

		// Hàm khởi tạo
		function __construct() {
				// Gọi đến hàm khởi tạo của cha
				parent::__construct();
	      $this->_data['url'] = base_url();
		}

		public function index()
		{
			$this->_data['subview'] = 'admin/org/org_admin_view.php';
      $this->_data['titlePage'] = 'Quản lý tổ chức và đơn vị';
			$this->_data['content'] = $this->Morg->getList();
      $this->load->view('main.php', $this->_data);
		}
}
