<?php
// Check role
$sessRole = $this->session->userdata('access');
$_role = $sessRole['rolesGroup'];
$fetchRole = explode(',',$_role);
if(in_array('admin',$fetchRole) == FALSE) {
  header("Location: ".base_url());
}

  $registercount = $this->Mregister->countAll();
  $event = $this->Mevent->getList();
  $eventing = 0;
  foreach ($event as $key => $row) {
    $timestart = $row['dateEvent'].' '.$row['timeStart'];
    $doing = $this->Mtime->currentEvent(strtotime($timestart));
    if ($doing == 1) {
       $eventing++;
    }
  }
  $personalJoinedCount = $this->Mattendance->countAll();
?>
<div class="container">
  <div class="row">
    <!-- Thống kê sơ bộ -->
    <legend>Tổng quan</legend>
    <div class="col-md-4">
        <div class="alert alert-info">
          <h1><?php echo $registercount; ?></h1>
          <p>lượt đăng ký tham gia sự kiện</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-success">
          <h1><?php echo $eventing; ?></h1>
          <p>sự kiện đang diễn ra</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-warning">
          <h1><?php echo $personalJoinedCount; ?></h1>
          <p>cá nhân đã tham gia sự kiện</p>
        </div>
    </div>
    <!-- Truy cập các tính năng quản trị -->
    <legend>Quản trị</legend>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/event'); ?>">
        <div class="alert alert-danger">
          <div class="form-activity">
            <div class="form-header">
              Sự kiện - Điểm danh
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/'); ?>">
        <div class="alert alert-info">
          <div class="form-activity">
            <div class="form-header">
              Đoàn viên - Nhân sự
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/'); ?>">
        <div class="alert alert-info">
          <div class="form-activity">
            <div class="form-header">
              Cơ sở Đoàn
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/'); ?>">
        <div class="alert alert-warning">
          <div class="form-activity">
            <div class="form-header">
              Đoàn vụ
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/'); ?>">
        <div class="alert alert-info">
          <div class="form-activity">
            <div class="form-header">
              Văn thư
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/'); ?>">
        <div class="alert alert-success">
          <div class="form-activity">
            <div class="form-header">
              Truyền thông
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/organizations'); ?>">
        <div class="alert alert-info">
          <div class="form-activity">
            <div class="form-header">
              Phòng ban - Khoa - Viện
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/accounts'); ?>">
        <div class="alert alert-info">
          <div class="form-activity">
            <div class="form-header">
              Tài khoản - Người dùng - Thiết bị
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?php echo base_url('admin/analytics'); ?>">
        <div class="alert alert-danger">
          <div class="form-activity">
            <div class="form-header">
              Báo cáo thống kê
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>

<link rel="stylesheet" href="<?php echo base_url('public/css/cit_login_style.css'); ?>"/>
