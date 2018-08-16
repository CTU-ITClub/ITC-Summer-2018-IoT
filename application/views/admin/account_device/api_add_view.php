<?php
// Check role
$sessRole = $this->session->userdata('access');
$_role = $sessRole['rolesGroup'];
$fetchRole = explode(',',$_role);
if(in_array('device',$fetchRole) == FALSE) {
  header("Location: ".base_url());
}
?>
<div class="container">
  <div class="page-header">
    <h1>Cấp phát key cho thiết bị</h1>
    <a href="<?php echo base_url('admin/accounts'); ?>" class="btn btn-default">Quay lại trang quản lý</a>
    <a href="<?php echo base_url('admin/accounts/account_device/'); ?>" class="btn btn-info">Quản lý tài khoản</a>
    <a href="<?php echo base_url('admin/accounts/api_admin/accounts/'); ?>" class="btn btn-info">Quản lý API</a>
  </div>
  <div class="col-md-12">
    <form class="form-horizontal" action="<?php echo base_url('execute/add_api_device');?>" method="POST">
        <input type="hidden" name="idApi" value="<?php echo $idApi; ?>">
        <label for="key">Thiết bị</label>
        <select class="form-control" name="device">
          <?php
          $device = $this->Mdevice->getList();
          foreach ($device as $key => $row) {
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
          }
          ?>
        </select>
        <button type="submit" name="addKey" class="btn btn-primary">Cấp API</button>
    </form>
  </div>
