<div class="container">
  <h1><?php echo $name; ?></h1>
  <hr>
  <ul class="nav nav-tabs">
    <li><a href="<?php echo base_url('/events/org/'.$org.'/')?>">Tổng quan</a></li>
    <li class="active"><a href="<?php echo base_url('/events/org/'.$org.'/all')?>">Hoạt động</a></li>
    <!-- <li><a href="#">Menu 2</a></li> -->
  </ul>
  <div class="row">
    <div class="col-md-12">
      <div class="section-header-wrap section-header-default">
        <div class="section-header">Hoạt động của <?php echo $name; ?></div>
      </div>
      <table class="table datatables">
        <thead>
          <th>STT</th>
          <th>Tên sự kiện</th>
          <th>Thời gian diễn ra</th>
          <th>Đơn vị tổ chức</th>
          <th>Tình trạng</th>
        </thead>
        <tbody>
          <?php
            $stt = 0;
            foreach ($event as $key => $row) {
              $stt++;
              $timestart = $row['dateEvent'].' '.$row['timeStart'];
              $isShow = $this->Mtime->currentEvent(strtotime($timestart));
              echo '<tr>
                  <td>'.$stt.'</td>
                  <td><a href="'.base_url('events/event/'.$row['id'].'/').'">'.$row['nameEvent'].'</a></td>
                  <td>'.$row['timeStart'].' - '.$row['dateEvent'].'</td>
                  <td><a href="'.base_url('/events/org/'.$row['idOrg'].'/').'">'.$name.'</a></td>';
              if ($isShow == 1) {
                echo '<td><b><span style="color:red">Trong ngày</span></b></td>';
              } else if ($isShow == 2) {
                echo '<td><span style="color:lime">Trong tuần</span></td>';
              } else if ($isShow == 3) {
                echo '<td><span style="color:blue">Sắp diễn ra</span></td>';
              } else if ($isShow == 0) {
                echo '<td><span style="color:grey">Đã diễn ra</span></td>';
              }
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
