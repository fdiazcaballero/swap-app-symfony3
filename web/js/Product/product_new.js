var $country = $('#product_productLocation_country');
var $state = $('#product_productLocation_state');
var category_id = '#product_productTaxonomy_category';
var sub_category_id = '#product_productTaxonomy_subCategory';
var sub_category_url_action = "/product/ajax/get_sub_categories_form";
//Routing.generate('get_sub_categories_form');
var sub_sub_category_id="#product_productTaxonomy_subSubCategory";
var sub_sub_category_url_action="/taxonomy/ajax/get_sub_sub_categories_form";

if ($country.val()=="")
    $state.attr('disabled', 'disabled');
if ($(category_id).val()=="")
    $(sub_category_id).attr('disabled', 'disabled');
if ($(sub_category_id).val()=="")
    $(sub_sub_category_id).attr('disabled', 'disabled');

$country.change(function() {
    update_form2($country, $state,'#product_productLocation_state');
});


function update_form2($element_parent, $element_child, child_id){
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

$(category_id).change(function(){    
    update_form(category_id, sub_category_id, sub_category_url_action);
});

$(sub_category_id).change(function(){    
    update_form(sub_category_id, sub_sub_category_id, sub_sub_category_url_action);
});

function update_form(parent_id, child_id, url_action){    
    if($(parent_id).val()!=""){
        $(child_id).attr('disabled', 'disabled');
        $.ajax({
          url : url_action,
          type: 'POST',
          data : {parent: $(parent_id).val()},
          success: function(response) {
                if(response.is_success){
                    if(response.data && response.data.length>0){
                        $(child_id).empty();
                        var options=create_select_options(response.data);
                        $(child_id).append(options);
                        $(child_id).removeAttr("disabled")
                    }
                    else{
                        $(child_id).empty();
                        $(child_id).append("<option value=''> --  None  -- </option>");
                        $(child_id).attr('disabled', 'disabled');
                    }                    
                }
          }
          ,
          error: function(err){
              alert("Error");
          }
      });
    }
    else{
        $(child_id).empty();
        $(child_id).append("<option value=''> --  None  -- </option>");
        $(child_id).attr('disabled', 'disabled');
    }
}

function create_select_options(array){
    var options ="<option value=''> --  None  -- </option>";
    for(var i=0; i<array.length ; i++){
        options+="<option value='"+array[i].id+"'>"+array[i].name+"</option>";
    }
    return options;
}


