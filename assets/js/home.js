var base_url = $("#base_url").val();


$(function(){

  getItems();

  function getItems(){

    $.ajax({
      url :        base_url + 'products/getProducts',
      dataType:    'JSON',

      success: function(data){
          var html = "<div class=\"row text-center\">";

        if (data != null) {
          for (var i = 0; i < data.length; i++) {
            html  +=  "<div class=\"col-lg-3 col-md-6 mb-4\">" +
                      "<div class=\"card\">" +
                      "<div class=\"pricing\" align=\"right\"><span class=\"price-tag\">₱"+data[i].product_price+"</span></div>" +
                      "<img class=\"card-img-top\" src=\"assets/images/uploads/"+data[i].product_img+"\" alt=\"\">" +
                      "<div class=\"card-body\">" +
                      "<h4 class=\"card-title\">"+data[i].product_name+"</h4>" +
                      "<p class=\"card-text\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>"+
                      "</div>" +
                      "<div class=\"card-footer\">" +
                      "<a href=\"#\" class=\"btn btn-primary themeBtn itemBtn\" data-id = \""+data[i].product_id+"\">Add to Cart</a>" +
                      "</div>" +
                      "</div>" +
                      "</div>";
          }
        }
          html += "</div>";

        $(".items-list").html(html);
      }
    })
  }


$(document).on('click', '.itemBtn', function(){
  var itemID = $(this).attr('data-id');

  $.ajax({
    url: base_url + 'home/addCart',
    type: 'POST',
    data: {'itemID' : itemID},
    dataType: 'JSON',

    success: function(){
      swal('success', 'Item Added!', 'success');
    }

  })
})


});
