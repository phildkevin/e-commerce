var base_url = $("#base_url").val();

$(function(){

  $(document).on('submit', '.loginForm', function(e){
   e.preventDefault();

   $.ajax({
     url: 'admin/login',
     type: 'POST',
     data: new FormData(this),
     contentType: false,
     cache:       false,
     processData: false,
     dataType: 'JSON',

     beforeSend: function(){

     },
     success: function(data){
       swal(data.type, data.message, data.type);
       if(data.status == 0){

       }else{
         setTimeout(function (){
           window.location.href = "admin/orders";
         },1000)
       }

     }
   });

  })

});

$(document).on('click', '.logoutBtn', function(){
  swal({

    title: 'Warning',
    text: "Are you sure you want to Logout?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirm!'

  }).then(function () {
    window.location.href = base_url + "admin/logout";
  });

});
