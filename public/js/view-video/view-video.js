function coment(){
  $('#coment button').addClass("show");
  $('#coment button').removeClass("hide");
}

function fetchcomment() {
  $.ajax({
      url: '/dashboard/fetch',
      type: 'POST',
      data: {
          '_token': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
          $("#commentpanel").html(data);
      }
  });
}

function submitComment() {
  $.ajax({
      url: '/comment_video',
      method: 'post',
      data: $("#commentarea").serialize(),
      success: function (data) {
          if (data.status) {
              swal('Success', data.description, 'success');
              fetchcomment();
          } else {
              swal('Oops', 'Something when wrong', 'error');
          }
      }
  }, 'json');
}
