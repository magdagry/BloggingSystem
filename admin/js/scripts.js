// $(document).ready(function() {
//     $('#summernote').summernote();
// });

// tinymce.init({selector:'textarea'});

$(document).ready(function(){

    console.log("dupa");

 $('#selectAllBoxes').click(function(event){

    if(this.checked) {
        $('.checkBoxes').each(function() {
            this.checked = true; 
        });
    } else {
        $('.checkBoxes').each(function() {

            this.checked = false; 

        });

    }
 });

});

