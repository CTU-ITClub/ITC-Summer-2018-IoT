<?php
class Events extends CI_Controller {

	  protected $_data = array('div_alert' => 'container','type' => null,'url' => null,'content' => null);

		// Hàm khởi tạo
		function __construct() {
				// Gọi đến hàm khởi tạo của cha
				parent::__construct();
	      $this->_data['url'] = base_url();
		}

		public function index()
		{
      $this->_data['subview'] = 'sites/events_view';
      $this->_data['titlePage'] = 'Sự kiện';
			$this->_data['content'] = $this->Mevent->getList();
      $this->load->view('main.php', $this->_data);
		}

    public function event($id = null)
		{
				$isExistId = $this->Mevent->getById($id);
      if ($isExistId) {
				$this->_data['subview'] = 'sites/event_detail_view';
				$this->_data['titlePage'] = 'Chi tiết sự kiện';
				$this->_data['contentPage'] = $isExistId;
				if (isset($_POST['checked'])) {
					$this->_data['personalJoined'] = $_POST['identification'];
					$this->_data['isJoined'] = 'YES';
				} else {
					$this->_data['personalJoined'] = null;
					$this->_data['isJoined'] = 'NO';
				}
			} else {
				$this->_data['subview'] = 'alert/load_alert_view';
        $this->_data['titlePage'] = 'Cảnh báo';
        $this->_data['type'] = 'warning';
        $this->_data['url'] = base_url('events');
        $this->_data['content'] = 'Không tồn tại sự kiện';
			}
      $this->load->view('main.php', $this->_data);
		}

		public function org($id = null, $status = null)
		{
			$this->_data['org'] = $id;
			$this->_data['event'] = $this->Mevent->getByOrg($id);
			$getOrg = $this->Morg->getOrgById($id);
			$this->_data['name'] = $getOrg['text'];
      if($status == 'activities') {
				$hasEventByOrg = $this->Mevent->getByOrg($id);
	      if ($hasEventByOrg) {
					$this->_data['subview'] = 'sites/events_org_view';
		      $this->_data['titlePage'] = 'Chi tiết sự kiện theo tổ chức';
				} else {
					$this->_data['subview'] = 'alert/load_alert_view';
	        $this->_data['titlePage'] = 'Thông báo';
	        $this->_data['type'] = 'info';
	        $this->_data['url'] = base_url('events/org/'.$id);
	        $this->_data['content'] = 'Hiện tại chưa có hoạt động!';
				}
			} else if($status == 'affiliated') {
					$this->_data['subview'] = 'sites/events_org_child_view';
					$this->_data['titlePage'] = 'Chi tiết sự kiện theo tổ chức';
			} else {
				if ($getOrg) {
					if ($getOrg['parent'] == '#') {
						$parent['text'] = '<i>Không có cấp cao hơn tại cơ sở</i>';
		        $parent['id'] = $getOrg['id'];
		      } else $parent = $this->Morg->getOrgById($getOrg['parent']);
					$this->_data['subview'] = 'sites/events_org_detail_view';
					$this->_data['titlePage'] = 'Chi tiết tổ chức';

					$this->_data['parent_name'] = $parent['text'];
					$this->_data['parent_id'] = $parent['id'];
					$this->_data['description'] = $getOrg['description'];
				} else {
					$this->_data['subview'] = 'alert/load_alert_view';
	        $this->_data['titlePage'] = 'Cảnh báo';
	        $this->_data['type'] = 'warning';
	        $this->_data['url'] = base_url('events');
	        $this->_data['content'] = 'Không tồn tại tổ chức';
				}
			}
      $this->load->view('main.php', $this->_data);
		}

		public function res($value = null)
		{
				header('Content-Type: application/json;charset=utf-8');
				if ($value != null) {
					$content = $this->Morg->getListOrg($value);
				} else $content = $this->Morg->getList();

				foreach ($content as $key => $row) {
						if ($row['parent'] == '#') {
								$parent = '#';
								$open = true;
						} else if ($row['parent'] == $row['id']) {
								$parent = '#';
								$open = true;
						} else if ($row['id'] == $value) {
								$parent = '#';
								$open = true;
						} else {
								$parent = $row['parent'];
								$open = false;
						}
						$data[] = array (
							'id' => $row['id'],
							'parent' => $parent,
							'text' => $row['text'],
							'icon' => false,
							'state' => array (
								'opened' => $open
							),
							'a_attr' => array (
								'href' => base_url('events/org/'.$row['id'])
							)
					);
				}
				echo json_encode($data);
		}

		public function req($value = null) {
			if($value != null) {
				$json = json_decode(file_get_contents(base_url('events/res/'.$value)),TRUE);
			} else {
				$json = json_decode(file_get_contents(base_url('events/res/')),TRUE);
			}
			var_dump($json);
		}

		// public function req_org($value = null) {
		// 	$org = $this->Morg->getListOrg($value);
		// 	var_dump($org);
		// }
}
