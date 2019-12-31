import $ from 'jquery';
import * as suggestags from 'suggestags';
import axois from 'axios';

$('.tags').amsifySuggestags({
    type : 'amsify'
});

$('.tags').on('suggestags.change', function(e){

    $('#variants-table').removeClass('d-none');
    let options = [];

    let variants_table = $('#variants-table tbody');

    options.push($('input[name="options[0][options]"]').val());
    options.push($('input[name="options[1][options]"]').val());
    options.push($('input[name="options[2][options]"]').val());
    
    axios.post('/manage/product-variants', {
        variants: options
      })
      .then(function (response) {

        variants_table.empty();
        response.data.forEach(function(variant, index) {

            let item = '<tr id="variant-'+index+'-item">'+
                        '<td><input type="text" class="form-control form-control-sm" name="variants['+index+'][name]" value="'+variant+'" readonly></td>'+
                        '<td><input type="text" class="form-control form-control-sm" name="variants['+index+'][sku]" value=""></td>'+
                        '<td><input type="text" class="form-control form-control-sm" name="variants['+index+'][barcode]" value=""></td>'+
                        '<td><input type="text" class="form-control form-control-sm text-right" name="variants['+index+'][price]" value=""></td>'+
                        '<td><input type="text" class="form-control form-control-sm text-right" name="variants['+index+'][quantity]" value=""></td>'+
                        '<td><span class="variant-button p-2" data-item="'+index+'"><i class="fa fa-trash text-danger"></i></span></td>'+
                      '</tr>';
        
            variants_table.append(item);

          })
      })
      .catch(function (error) {
        console.log(error);
      });
});


$('#browse').on('change', function(){

  var preview = document.querySelector('#preview');
var files   = document.querySelector('input[type=file]').files;


  function readAndPreview(file) {

    // Make sure `file.name` matches our extensions criteria
    if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
      var reader = new FileReader();

      reader.addEventListener("load", function () {
       
        var image = new Image();
        image.height = 100;
        image.title = file.name;
        image.src = this.result;
        preview.appendChild(image);
      }, false);

      reader.readAsDataURL(file);
    }

  }

  if (files) {
    preview.innerHTML = '';
    [].forEach.call(files, readAndPreview);

  }

});


$(document).on('click', '.variant-button', function() {

  $("#variant-"+$(this).data('item')+"-item").remove();

  let no_of_row = $('#variants-table tbody tr').length;

  if(no_of_row == 0) {
    $('#variants-table').addClass('d-none');
  }
});









