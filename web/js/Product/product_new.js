//function new_product_class(){

//$('#product_productLocation_country').append('<option value="" selected></option>');
//$('#product_productLocation_country').change(function(){
//    alert($('#product_productLocation_country option:selected').val());
//});

//}

var $country = $('#product_productLocation_country');
var $state = $('#product_productLocation_state');
$state.prop('disabled', 'disabled');
// When country gets selected ...
$country.change(function() {
    if($country.val()!=""){
        $state.removeProp('disabled');
    }
    else{
        $state.prop('disabled', 'disabled');
    }
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
      }
      ,
      error: function(err){
          alert("aaa");
      }
  });
});

//$country.change(function() {
//    update_form($country, $state);
//});
//
//function update_form($element_parent, $element_child){
//    if($element_parent.val()!=""){
//        $element_child.removeProp('disabled');
//    }
//    else{
//        $element_child.prop('disabled', 'disabled');
//    }
//    // ... retrieve the corresponding form.
//    var $form = $element_parent.closest('form');
//    // Simulate form data, but only include the selected country value.
//    var data = {};
//    data[$element_parent.attr('name')] = $element_parent.val();
//    // Submit data via AJAX to the form's action path.
//    $.ajax({
//      url : $form.attr('action'),
//      type: $form.attr('method'),
//      data : data,
//      success: function(html) {
//        // Replace current position field ...
//        $element_child.replaceWith(
//          // ... with the returned one from the AJAX response.
//          $(html).find('#'+$element_child.attr('id'))
//        );
//        // Position field now displays the appropriate positions.
//      }
//      ,
//      error: function(err){
//          alert("Error");
//      }
//  });
//}

