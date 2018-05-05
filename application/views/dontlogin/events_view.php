<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="section-header-wrap section-header-default">
          <div class="section-header">Các tổ chức</div>
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
            <div class="section-header">Hoạt động đang diễn ra trong ngày</div>
        </div>
        <div class="row">
          <?php
              foreach ($content as $key => $row) {
                $timestart = $row['dateEvent'].' '.$row['timeStart'];
                $isShow = $this->Mtime->currentEvent(strtotime($timestart));
                $org = $this->Morg->getOrgById($row['idOrg']);
                if ($isShow == 1) {
                   echo '<div class="col-6">
                     <div class="col-md-6">
                       <div class="form-activity">
                         <div class="form-header">
                           <a href="'.base_url('events/event/'.$row['id'].'/').'">'.$row['nameEvent'].'</a>
                         </div>
                         <div class="pull-right">
                           <i class="fa fa-calendar"></i> '.$row['dateEvent'].' '.$row['timeStart'].'</div>
                         <div class="form-organization">
                           <a href="'.base_url('/events/org/'.$row['idOrg'].'/').'">'.$org['text'].'</a>
                         </div>
                       </div>
                     </div>
                   </div>';
                }
              }
          ?>
        </div>
        <div class="section-header-wrap section-header-default">
          <div class="section-header">Hoạt động sắp diễn ra trong tuần</div>
        </div>
        <div class="row">
          <?php
              foreach ($content as $key => $row) {
                $timestart = $row['dateEvent'].' '.$row['timeStart'];
                $isShow = $this->Mtime->currentEvent(strtotime($timestart));
                $org = $this->Morg->getOrgById($row['idOrg']);
                if ($isShow == 2) {
                   echo '<div class="col-6">
                     <div class="col-md-6">
                       <div class="form-activity">
                         <div class="form-header">
                           <a href="'.base_url('events/event/'.$row['id'].'/').'">'.$row['nameEvent'].'</a>
                         </div>
                         <div class="pull-right">
                           <i class="fa fa-calendar"></i> '.$row['dateEvent'].' '.$row['timeStart'].'</div>
                         <div class="form-organization">
                           <a href="'.base_url('/events/org/'.$row['idOrg'].'/').'">'.$org['text'].'</a>
                         </div>
                       </div>
                     </div>
                   </div>';
                }
              }
          ?>
        </div>
        <div class="section-header-wrap section-header-default">
          <div class="section-header">Hoạt động sắp diễn ra trong tương lai</div>
        </div>
        <div class="row">
          <?php
              foreach ($content as $key => $row) {
                $timestart = $row['dateEvent'].' '.$row['timeStart'];
                $isShow = $this->Mtime->currentEvent(strtotime($timestart));
                $org = $this->Morg->getOrgById($row['idOrg']);
                if ($isShow == 3) {
                   echo '<div class="col-6">
                     <div class="col-md-6">
                       <div class="form-activity">
                         <div class="form-header">
                           <a href="'.base_url('events/event/'.$row['id'].'/').'">'.$row['nameEvent'].'</a>
                         </div>
                         <div class="pull-right">
                           <i class="fa fa-calendar"></i> '.$row['dateEvent'].' '.$row['timeStart'].'</div>
                         <div class="form-organization">
                           <a href="'.base_url('/events/org/'.$row['idOrg'].'/').'">'.$org['text'].'</a>
                         </div>
                       </div>
                     </div>
                   </div>';
                }
              }
          ?>
        </div>
        <div class="section-header-wrap section-header-default">
          <div class="section-header">Hoạt động đã diễn ra</div>
        </div>
        <div class="row">
          <?php
              foreach ($content as $key => $row) {
                $timestart = $row['dateEvent'].' '.$row['timeStart'];
                $isShow = $this->Mtime->currentEvent(strtotime($timestart));
                $org = $this->Morg->getOrgById($row['idOrg']);
                if ($isShow == 0) {
                   echo '<div class="col-6">
                     <div class="col-md-6">
                       <div class="form-activity">
                         <div class="form-header">
                           <a href="'.base_url('events/event/'.$row['id'].'/').'">'.$row['nameEvent'].'</a>
                         </div>
                         <div class="pull-right">
                           <i class="fa fa-calendar"></i> '.$row['dateEvent'].' '.$row['timeStart'].'</div>
                         <div class="form-organization">
                           <a href="'.base_url('/events/org/'.$row['idOrg'].'/').'">'.$org['text'].'</a>
                         </div>
                       </div>
                     </div>
                   </div>';
                }
              }
          ?>
        </div>
      </div>
    </div>
  </div>
