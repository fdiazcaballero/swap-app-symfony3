//function new_product_class(){

//$('#product_productLocation_country').append('<option value="" selected></option>');
//$('#product_productLocation_country').change(function(){
//    alert($('#product_productLocation_country option:selected').val());
//});

//}

var $country = $('#product_productLocation_country');
// When country gets selected ...
$country.change(function() {
    // ... retrieve the corresponding form.
    var $form = $(this).closest('form');
    // Simulate form data, but only include the selected country value.
    var data = {};
    data[$country.attr('name')] = $country.val();
    // Submit data via AJAX to the form's action path.
    $.ajax({
      url : $form.attr('action'),
      type: $form.attr('method'),
      data : data,
      success: function(html) {
        // Replace current position field ...
        $('#product_productLocation_state').replaceWith(
          // ... with the returned one from the AJAX response.
          $(html).find('#product_productLocation_state')
        );
        // Position field now displays the appropriate positions.
      },
      error: function(err){
          alert("aaa");
      }
  });
});