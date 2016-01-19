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
   
    // Basic select
    $('.bootstrap-select').selectpicker();
    
});

//input file
var loadFile = function(event) {
    var output = document.getElementById('imageProfile');
    output.src = URL.createObjectURL(event.target.files[0]);
};

//Delete USer Method
function user_delete(id){
        //alert(id);        
        swal({
            title: "Deseja realmente excluir?",
            text: "Esta ação excluirá permanentemente este usuário!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF7043",
            confirmButtonText: "Sim, deletar!",
            cancelButtonText: "Cancelar"
        },
        function(isConfirm){
            if (isConfirm) {     
                    var f = document.createElement("form");
                    f.setAttribute('method',"post");
                    f.setAttribute('action',"../delete/" + id);
                    f.submit();
                    
            }
        });
    
}

//Delete Group Method
function group_delete(userId, aroId){
        //alert(id);        
        swal({
            title: "Tem certeza?",
            text: "Este usuário não pertencerá mais a este grupo!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF7043",
            confirmButtonText: "Sim, confirmar!",
            cancelButtonText: "Cancelar"
        },
        function(isConfirm){
            if (isConfirm) { 
                    //alert(userId);
                    var f = document.createElement("form");
                    f.setAttribute('method',"post");
                    f.setAttribute('action',"../groups_delete/" + userId + "/" + aroId);
                    f.submit();
                    
            }
        });
    
}

//Add Permission Method
function permission_add(userId, pageId, permission){        
        //alert(permission);
        var f = document.createElement("form");
        f.setAttribute('method',"post");
        f.setAttribute('action',"../permission_add/" + userId + "/" + pageId + "/" + permission);
        f.submit();
}

//Delete Permission Method
function permission_delete(userId, pageId){ 
        //alert(pageId);
        var f = document.createElement("form");
        f.setAttribute('method',"post");
        f.setAttribute('action',"../permission_delete/" + userId + "/" + pageId);
        f.submit();
}