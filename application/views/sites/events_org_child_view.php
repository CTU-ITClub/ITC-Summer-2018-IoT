<div class="container">
  <h1><?php echo $name; ?></h1>
  <hr>
  <ul class="nav nav-tabs">
    <li><a href="<?php echo base_url('/events/org/'.$org.'/')?>">Tổng quan</a></li>
    <li><a href="<?php echo base_url('/events/org/'.$org.'/activities')?>">Hoạt động</a></li>
    <li class="active"><a href="<?php echo base_url('/events/org/'.$org.'/affiliated')?>">Đơn vị trực thuộc</a></li>
  </ul>
  <div class="row">
    <div class="col-md-12">
      <div class="section-header-wrap section-header-default">
        <div class="section-header">Thông tin tổ chức</div>
      </div>
      <div id="tree_list"></div>

      <!-- Using TreeJS -->
      <script type="text/javascript">
      $(document).ready(function(){
        //fill data to tree  with AJAX call
        $('#tree_list').jstree({
            'core' : {
                'data' : {
                    "url" : "<?php echo base_url('events/res/id/'.$org); ?>"
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
  </div>
</div>
