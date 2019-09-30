$(document).ready(function(){
  // save comment to database
  $(document).on('click', '#sub', function(){
    var user = $('#user').val();
    var ans = $('#ans').val();
    var ques =$('#ques_no').val();
    $.ajax({
      url: 'funpage_server.php',
      type: 'POST',
      data: {
        'ans': ans,
        'username': user,
        'ques_id': ques,
        'sub':1,
      },
      success: function(response){
        $('#ans').val('');
        $('.box').append(response);
        alert(response);
      }
    });
  });

});