/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {

    // Form components
    // ------------------------------

    // Styled file input
    $(".file-styled").uniform({
        wrapperClass: 'bg-warning',
        fileButtonHtml: '<i class="icon-googleplus5"></i>'
    });


    // Styled checkboxes, radios
    $(".styled").uniform({
        radioClass: 'choice'
    });
    
});

//input file
    var loadFile = function(event) {
        var output = document.getElementById('imageProfile');
        output.src = URL.createObjectURL(event.target.files[0]);
    };