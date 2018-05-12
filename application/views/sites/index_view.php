<div class="container">
  <div class="section-header-wrap section-header-default">
      <div class="section-header">Các hoạt động đang diễn ra</div>
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
      foreach ($content as $key => $row) {
        $stt++;
        $timestart = $row['dateEvent'].' '.$row['timeStart'];
        $isShow = $this->Mtime->currentEvent(strtotime($timestart));
        $org = $this->Morg->getOrgById($row['idOrg']);
        if ($isShow == 1 || $isShow == 2) {
          echo '<tr>
              <td>'.$stt.'</td>
              <td><a href="'.base_url('events/event/'.$row['id'].'/').'">'.$row['nameEvent'].'</a></td>
              <td style="text-align:center">'.$row['timeStart'].'<br />'.$row['dateEvent'].'</td>
              <td><a href="'.base_url('/events/org/'.$row['idOrg'].'/').'">'.$org['text'].'</a></td>';
          if ($isShow == 1) {
            echo '<td><b><span style="color:red">Trong ngày</span></b></td>';
          } else if ($isShow == 2) {
            echo '<td><b><span style="color:lime">Trong tuần</span></b></td>';
          }
          echo '</tr>';
        }
      }
    ?>
    </tbody>
  </table>
</div>
