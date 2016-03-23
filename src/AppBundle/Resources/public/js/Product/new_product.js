//function new_product_class(){

$('#product_productLocation_country').append('<option value="" selected></option>');
$('#product_productLocation_country').change(function(){
    alert($('#product_productLocation_country option:selected').val());
});

//}