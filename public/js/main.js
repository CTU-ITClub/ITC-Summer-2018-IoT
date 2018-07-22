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
