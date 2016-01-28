/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function inputDataTable(towerId, location2Id){
    //popular tabela
    $('#tableItems').DataTable().destroy();
    $('#tableItems').DataTable({
        //bSort: false,
        lengthMenu: [[10, 20, 50, 100, -1], [10, 20, 50, 100, "All"]],
        ajax: "/portalqualidade/items/itemsFound/null/" + towerId + "/null/" + location2Id
    });         
}

function getPhoto(itemId){    
        //alert(itemId);
        $.ajax({
            type: 'post',
            url: '/portalqualidade/items/photoFound/' + itemId,
            contentType: "json",
            traditional: true,
            success: function (result) {
                //alert(result);
                $('#carouselInner').empty();
                $('#carouselInner').classname = 'carousel-inner';
                var JsonObj = JSON.parse(result);

                $.each(JsonObj, function(i, item){ 
                    if(i===0){
                        $div = $("<div class='item active'> <img src='" + item.Photo.imageBase64 + "'>").append(
                            //$("<div class='carousel-caption'>").append("<h4>Condomínio 3 - Bloco 1 - Pav. 02 - Apto 103</h4><h4>Obs. A cerâmica foi trocada porém não foi rejuntada.</h4>")
                        ); 
                    }else{
                        $div = $("<div class='item'> <img src='" + item.Photo.imageBase64 + "'>").append(
                            //$("<div class='carousel-caption'>").append("<h4>" + item.Photo.name + "</h4>")
                        ); 
                    }    
                    $('#carouselInner').append($div);
                });
            }
        });
}

function getNote(itemId){    
        //alert(itemId);
        $.ajax({
            type: 'post',
            url: '/portalqualidade/items/noteFound/' + itemId,            
            contentType: "json",
            traditional: true,
            success: function (result) {
                //alert(result);
                document.getElementById('note').innerHTML = result;              
            }
        });
}



