<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="section-header-wrap section-header-default">
          <div class="section-header">Tổ chức/Đoàn thể</div>
      </div>
      <div id="tree_list"></div>

      <!-- Using TreeJS -->
      <script type="text/javascript">
      $(document).ready(function(){
        //fill data to tree  with AJAX call
        $('#tree_list').jstree({
            'core' : {
                'data' : {
                    "url" : "<?php echo base_url('events/res/'); ?>"
                }
            }
        }).bind("select_node.jstree", function (e, data) {
           var href = data.node.a_attr.href;
           if(href == '#')
           return '';
           document.location.href = href;
        });
      });
      </script>
    </div>
    <div class="col-md-8">
        <div class="section-header-wrap section-header-default">
            <div class="section-header">Danh sách hoạt động</div>
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
              echo '<tr>
                  <td>'.$stt.'</td>
                  <td><a href="'.base_url('events/event/'.$row['id'].'/').'">'.$row['nameEvent'].'</a></td>
                  <td style="text-align:center">'.$row['timeStart'].'<br />'.$row['dateEvent'].'</td>
                  <td><a href="'.base_url('/events/org/'.$row['idOrg'].'/').'">'.$org['text'].'</a></td>';
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
