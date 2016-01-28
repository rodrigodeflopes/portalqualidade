/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//Delete Group Method
function page_delete(id){
        //alert(id);        
        swal({
            title: "Deseja realmente excluir?",
            text: "Esta ação excluirá permanentemente este acesso controlado!",
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