var base_url = $("#base_url").val();

$(function(){

  getProducts();

  function getProducts(){

    $.ajax({
      url :        base_url + 'products/getProducts',
      dataType:    'JSON',

      success: function(data){

        var html = "<table class=\"table table-hover table-striped dt-responsive nowrap themeBtn\" id=\"tblProduct\">" +
                   "<thead>" +
                   "<tr class=\"themeBg textW\">" +
                   "<th>Product Image</th>" +
                   "<th>Product Code</th>" +
                   "<th>Product Name</th>" +
                   "<th>Product Price</th>" +
                   "<th>Product Stock</th>" +
                   "<th>Action</th>" +
                   "<th>Product Description</th>" +
                   "</tr>" +
                   "</thead>" +
                   "<tbody>";
        if (data != null) {
          for (var i = 0; i < data.length; i++) {
            if(data[i].stock != "" || data[i].stock != 0){
            html += "<tr>" +
                    "<td><img src=\""+base_url+"assets/images/uploads/"+data[i].product_img+"\" class=\"img-responsive\" style=\"width:70px;height:70px\"></td>" +
                    "<td>"+data[i].product_code+"</td>" +
                    "<td>"+data[i].product_name+"</td>" +
                    "<td>"+data[i].product_price+"</td>" +
                    "<td>"+data[i].product_stock+"</td>" +
                    "<td class=\"text-center\">" +
                    "<button class=\"btn btn-warning btnEditProduct btn-sm themeBtn\" data-toggle=\"popover\" data-content=\"Update Account\" data-id=\""+data[i].product_id+"\"><i class=\"fa fa-edit\"></i></button> " +
                    "<button class=\"btn btn-danger btnDeleteProduct btn-sm themeBtn\" data-toggle=\"popover\" data-content=\"Delete Account\" data-id=\""+data[i].product_id+"\"><i class=\"fa fa-trash\"></i></button> " +
                    "</td>" +
                    "<td>"+data[i].product_desc+"</td>" +
                    "</tr>";
                  }
          }
        }
           html += "</tbody>" +
                   "</table>";

        $(".products-list").html(html);
        $("#tblProduct").dataTable();
      }
    })
  }

  $(document).on('submit', '.addProductForm', function(e){
    e.preventDefault();

    $.ajax({
      url :        base_url + 'products/addProduct',
      type:        'POST',
      data:        new FormData(this),
      contentType: false,
      cache:       false,
      processData: false,
      dataType:    'JSON',
      beforeSend: function(){

      },
      success: function(data){
        swal(data.type, data.message, data.type);
        if (data.status == 1) {
          $('#cancel').hide();
          $('#resetProductBtn').trigger('click').show();
          getProducts();
        }
      }
    })
  })

  $(document).on('click', '.btnEditProduct', function(){
    var productID = $(this).attr('data-id');
    $.ajax({
      url :        base_url + 'products/getProduct',
      type:        'POST',
      data:        {'productID' : productID},
      dataType:    'JSON',
      beforeSend: function(){

      },
      success: function(data){
        if (data != null) {
          $("#product_code").val(data.product_code);
          $("#product_name").val(data.product_name);
          $("#product_desc").val(data.product_desc);
          $("#product_price").val(data.product_price);
          $("#product_stock").val(data.product_stock);
          $("#productID").val(data.product_id);
          $("#cancel").show();
          $("#resetProductBtn").hide();
        }
      }
    })
  });

  $(document).on('click', '.btnDeleteProduct', function(){
   var productID = $(this).attr('data-id');

     swal({

       title: 'Warning',
       text: "Are you sure you want to delete this product?",
       type: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Confirm!'

     }).then(function () {

   $.ajax({
     url :        base_url + 'products/deleteProduct',
     type:        'POST',
     data:        {'productID' : productID},
     dataType:    'JSON',
     beforeSend: function(){

     },
     success: function(data){
       swal(data.type, data.message, data.type);
       getProducts();
       $('#resetProductBtn').trigger('click').show();
       $('#cancel').hide();
     }

     });
   })
 });

  $(document).on('click', '#resetProductBtn', function(){
    $("#product_code").val('');
    $("#product_name").val('');
    $("#product_desc").val('');
    $("#product_price").val('');
    $("#product_stock").val('');
    $("#productID").val('');
    $("#product_img").val('');
  });

  $(document).on('click', '#cancel', function(){
    $("#product_code").val('');
    $("#product_name").val('');
    $("#product_desc").val('');
    $("#product_price").val('');
    $("#product_stock").val('');
    $("#productID").val('');
    $("#product_img").val('');
    $('#resetProductBtn').show();
    $('#cancel').hide();
  });

});
