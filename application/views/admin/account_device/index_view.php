<?php
// Check role
$sessRole = $this->session->userdata('access');
$_role = $sessRole['rolesGroup'];
$fetchRole = explode(',',$_role);
if(in_array('admin',$fetchRole) == FALSE) {
  header("Location: ".base_url());
}
?>
<div class="container">
  <div class="page-header">
    <h1>Quản lý tài khoản, người dùng và thiết bị</h1>
    <a href="<?php echo base_url('admin/'); ?>" class="btn btn-default">Quay lại trang quản trị</a>
  </div>
  <div class="row">
    <div class="col-md-6">
      <a href="<?php echo base_url('admin/rfid_account'); ?>">
        <div class="alert alert-warning">
          <div class="form-activity">
            <div class="form-header">
              Quản lý danh sách thẻ RFID
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="<?php echo base_url('admin/user_account'); ?>">
        <div class="alert alert-success">
          <div class="form-activity">
            <div class="form-header">
              Quản lý tài khoản
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="<?php echo base_url('admin/device_admin'); ?>">
        <div class="alert alert-danger">
          <div class="form-activity">
            <div class="form-header">
              Quản lý thiết bị điểm danh
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="<?php echo base_url('admin/api_admin'); ?>">
        <div class="alert alert-info">
          <div class="form-activity">
            <div class="form-header">
              Quản lý API
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="<?php echo base_url('admin/permissions'); ?>">
        <div class="alert alert-warning">
          <div class="form-activity">
            <div class="form-header">
              Quản lý phân quyền
            </div>
          </div>
        </div>
      </a>
    </div>
    <!-- <div class="col-md-6">
      <a href="<?php echo base_url('admin/api_admin'); ?>">
        <div class="alert alert-success">
          <div class="form-activity">
            <div class="form-header">
              Quản lý API
            </div>
          </div>
        </div>
      </a>
    </div> -->
  </div>
</div>
