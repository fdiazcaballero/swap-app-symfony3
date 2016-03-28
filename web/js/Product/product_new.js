var $country = $('#product_productLocation_country');
var $state = $('#product_productLocation_state');
var $category = $('#product_productTaxonomy_category');
var $sub_category = $('#product_productTaxonomy_subCategory');

$state.prop('disabled', 'disabled');

$country.change(function() {
    update_form($country, $state,'#product_productLocation_state');
});

function update_form($element_parent, $element_child, child_id){
    if($element_parent.val()!=""){
        $element_child.removeProp('disabled');
    }
    else{
        $element_child.prop('disabled', 'disabled');
    }
    // ... retrieve the corresponding form.
    var $form = $element_parent.closest('form');
    // Simulate form data, but only include the selected country value.
    var data = {};
    data[$element_parent.attr('name')] = $element_parent.val();
    // Submit data via AJAX to the form's action path.
    $.ajax({
      url : $form.attr('action'),
      type: $form.attr('method'),
      data : data,
      success: function(html) {
        // Replace current position field ...
        $(child_id).replaceWith(
          // ... with the returned one from the AJAX response.
          $(html).find(child_id)
        );
        // Position field now displays the appropriate positions.
      }
      ,
      error: function(err){
          alert("Error");
      }
  });
}

$category.change(function(){
    if($('#product_productTaxonomy_category').val()!=""){
        $('#product_productTaxonomy_subCategory');
        $.ajax({
          url : "/product/ajax/get_sub_categories_form",
          type: 'POST',
          data : {category: $category.val()},
          success: function(response) {
//                if(response.is_success){
                    $('#product_productTaxonomy_subCategory').empty();
                    var options=create_select_options(response.data);
                    $('#product_productTaxonomy_subCategory').append(options);
//                }
          }
          ,
          error: function(err){
              alert("Error");
          }
      });
    }
    else{
        $('#product_productTaxonomy_subCategory').empty();
        $('#product_productTaxonomy_subCategory').append("<option value=''> --  None  -- </option>");
    }
    
});

function create_select_options(array){
    var options ="<option value=''> --  None  -- </option>";
    for(var i=0; i<array.length ; i++){
        options+="<option value='"+array[i].id+"'>"+array[i].name+"</option>";
    }
    return options;
}


