var base_url = $("#base_url").val();

$(function(){

  getOrders();

  function getOrders(){

    $.ajax({
      url :        base_url + 'orders/getOrders',
      dataType:    'JSON',

      success: function(data){

        var html = "<table class=\"table table-hover table-striped dt-responsive nowrap themeBtn\" id=\"tblOrder\">" +
                   "<thead>" +
                   "<tr class=\"themeBg textW\">" +
                   "<th>Order Number</th>" +
                   "<th>User ID</th>" +
                   "<th>Product Code</th>" +
                   "<th>Date Ordered</th>" +
                   "<th>Order Status</th>" +
                   "<th>Action</th>" +
                   "</tr>" +
                   "</thead>" +
                   "<tbody>";
        if (data != null) {
          for (var i = 0; i < data.length; i++) {
            html += "<tr>" +
                    "<td>"+data[i].order_id+"</td>" +
                    "<td>"+data[i].user_id+"</td>" +
                    "<td>"+data[i].product_code+"</td>" +
                    "<td>"+data[i].order_date+"</td>" +
                    "<td>"+data[i].order_status+"</td>" +
                    "<td class=\"text-center\">" +
                    "<button class=\"btn btn-info btnView btn-sm themeBtn\" data-toggle=\"popover\" data-content=\"View Account\" data-id=\""+data[ i].product_id+"\"><i class=\"fa fa-eye\"></i></button> " +
                    "<button class=\"btn btn-warning btnEditProduct btn-sm themeBtn\" data-toggle=\"popover\" data-content=\"Update Account\" data-id=\""+data[i].product_id+"\"><i class=\"fa fa-edit\"></i></button> " +
                    "<button class=\"btn btn-danger btnDeleteProduct btn-sm themeBtn\" data-toggle=\"popover\" data-content=\"Delete Account\" data-id=\""+data[i].product_id+"\"><i class=\"fa fa-trash\"></i></button> " +
                    "</td>" +
                    "</tr>";
          }
        }
           html += "</tbody>" +
                   "</table>";

        $(".orders-list").html(html);
        $("#tblOrder").dataTable();
      }
    })
  }



});
