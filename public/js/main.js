$(document).click(function(e) {
if (!$(e.target).is('a')) {
    $('.collapse').collapse('hide');
  }
});

$(document).ready(function() {
  setTimeout(function() {
        $('#alert-out').fadeOut();
    }, 2000);
});

// Checkall Function for checkbox
function checkall(source,name) {
  checkboxes = document.getElementsByName(name);
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});

function makeAjaxCall(url, form){
    alert(url + ($(form).serialize()));
    $.ajax({
        type: "post",
        url: url,
        cache: false,
        data: $(form).serialize(),
        success: function(json){
          try {
              var obj = jQuery.parseJSON(json);
              $.notify(obj['MESSAGE'],obj['STATUS']);
              location.reload();
          } catch(e) {
              alert('Exception while request..');
          }
        },
        error: function(){
            alert('Error while request..');
        }
      });
}
