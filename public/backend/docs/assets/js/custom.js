$('.all_add').on('submit',function(){
 // alert('run');
  var url = $(this).attr('action');
  var data = $(this).serialize();
  $.post(url,data,function(e){
    var resp = $.parseJSON(e);
     if(resp.status == true){
         alert('Successs');
         setTimeout(function(){
           window.location.href = resp.reload;
         },1000);
     }else{
       alert(resp.message[0]);
     }
    //alert(e)
  });
   return false;
});
$('.authenticate_user').on('submit',function(){
  // alert('run');
   var url = $(this).attr('action');
   var data = $(this).serialize();
   $.post(url,data,function(e){
      var resp = $.parseJSON(e);
      if(resp.status == true){
         // alert('Successs');
          setTimeout(function(){
            window.location.href = resp.reload;
          },1000);
      }else{
        alert(resp.message);
      }
     // alert(e);
   });
    return false;
 });

$('.all_update').on('submit',function(){
  //  alert('helo');
    var url = $(this).attr('action');
    var data = $(this).serialize();
    $.post(url,data,function(e){
    //  alert(e);
       var resp = $.parseJSON(e);
       if(resp.status == true){
           alert('Successsfullly updated');
           setTimeout(function(){
             window.location.href = resp.reload;
           },1000);
       }
    });
     return false;
  });
$('.category_status').on('click',function(){
  var id = $(this).attr('data-id');
  $.get(`${BASE_URL}/admin/category_status/${id}`,function(e){
    alert('Successfully changed');
  }).fail(function(xhr, status, error) {
    alert(xhr.responseText);
  }); 
});  
$('.exam_status').on('click',function(){
  var id = $(this).attr('data-id');
  $.get(`${BASE_URL}/exam_status/${id}` ,function(e){
   alert('Status changed Successfully');
  }).fail(function(xhr, status, error) {
    alert(xhr.responseText);
  });
  
}); 
$('.portal_status').on('click',function(){
  var id = $(this).attr('data-id');
  $.get(`${BASE_URL}/admin/portal_status/${id}` ,function(e){
   alert('Status changed Successfully');
  }).fail(function(xhr, status, error) {
    alert(xhr.responseText);
  });
  
});
$('.student_status').on('click',function(){
  var id = $(this).attr('data-id');
  $.get( `${BASE_URL}/student_status/${id}`,function(e){
    alert('Status changed Successfully');
  }).fail(function(xhr, status, error) {
    alert(xhr.responseText);
  });
});
$('.ques_status').on('click',function(){
  var id = $(this).attr('data-id');
  $.get( `${BASE_URL}/question_status/${id}`,function(e){
    alert('Status changed Successfully');
  }).fail(function(xhr, status, error) {
    alert(xhr.responseText);
  });
});
$('.print').on('click',function(){
  window.print();
})