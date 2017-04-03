// Search Authors Toggle
( function($) {
  $('.form-group').on('change', 'input[id="proceedings-checkbox"]', function() {
    console.log('this clicked');
    if(this.checked){
        console.log('this checked');
        $('#authors-collapser').collapse('show');
    } else {
        console.log('this not checked');
        $('#authors-collapser').collapse('hide');
    }
  });
}) (jQuery);
