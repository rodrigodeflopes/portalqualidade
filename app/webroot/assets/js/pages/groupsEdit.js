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

//Delete Group Method
function group_delete(id){
        //alert(id);        
        swal({
            title: "Deseja realmente excluir?",
            text: "Esta ação excluirá permanentemente este grupo!",
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

//Delete User Method
function member_delete(groupId, aroId){
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
                    f.setAttribute('action',"../members_delete/" + groupId + "/" + aroId);
                    f.submit();
                    
            }
        });
    
}

//Add Permission Method
function permission_add(groupId, pageId, permission){        
        //alert(permission);
        var f = document.createElement("form");
        f.setAttribute('method',"post");
        f.setAttribute('action',"../permission_add/" + groupId + "/" + pageId + "/" + permission);
        f.submit();
}

//Delete Permission Method
function permission_delete(groupId, pageId){ 
        //alert(pageId);
        var f = document.createElement("form");
        f.setAttribute('method',"post");
        f.setAttribute('action',"../permission_delete/" + groupId + "/" + pageId);
        f.submit();
}