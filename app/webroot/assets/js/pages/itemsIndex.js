/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
    
    
    //ItemsIndex
    // ------------------------------
    
    $('#townhouses').multiselect({
        nonSelectedText: 'Vazio...',
        includeSelectAllOption: true,
        enableFiltering: true,
        templates: {
            filter: '<li class="multiselect-item multiselect-filter"><i class="icon-search4"></i> <input class="form-control" type="text"></li>'
        },
        onSelectAll: function() {
            $.uniform.update();
        },
        onChange: function(element, checked) {
            var brands = $('#townhouses option:selected');
            var selected = [];
            $(brands).each(function(index, brand){
                selected.push([$(this).val()]);
            });
            //alert(selected);
            $.ajax({
                type: 'post',
                url: "items/searchSelects/2/" + selected,
                contentType: "json",
                traditional: true,
                success: function (result) {
                    //alert(result);                    
                    var options = JSON.parse(result);
                    $('#towers').multiselect('dataprovider', options);
                    
                    //popular tabela
                    inputDataTable();
                }
            });
        },
        onInitialized: function(select, container) {
            $.ajax({
                type: 'post',
                url: "items/searchSelects/1/1",  //trocar esta url pelo id do enterprise na sessão #################################################################################
                contentType: "json",
                traditional: true,
                success: function (result) {
                    //alert(result);                    
                    var options = JSON.parse(result);
                    $('#townhouses').multiselect('dataprovider', options);
                    
                    //alert($('#townhouses').val());  
                    //popular blocos
                    $.ajax({
                        type: 'post',
                        url: "items/searchSelects/2/" + $('#townhouses').val(),
                        contentType: "json",
                        traditional: true,
                        success: function (result) {
                            //alert(result);                    
                            var options = JSON.parse(result);
                            $('#towers').multiselect('dataprovider', options);
                            
                            //popular tabela
                            inputDataTable();
                        }
                    });
                }
            });
        }
    });
    
    $('#towers').multiselect({
        nonSelectedText: 'Vazio...',
        includeSelectAllOption: true,
        enableFiltering: true,
        templates: {
            filter: '<li class="multiselect-item multiselect-filter"><i class="icon-search4"></i> <input class="form-control" type="text"></li>'
        },
        onSelectAll: function() {
            $.uniform.update();
        },
        onChange: function(element, checked) {
            //popular tabela
            inputDataTable();  
        }
    });
    
    $("#excelLink").on("click", function () { 
        //alert('ok');
        window.location.href = "items/csv/" + $('#towers').val();        
    });
    
    //Form ItemsIndex Change
    $('#ItemIndexForm').on("change", function (e) { 
            //alert('Change'); 
            $('#tableItems').DataTable().destroy();
            $('#tableItems').DataTable({
                lengthMenu: [[10, 20, 50, 100, -1], [10, 20, 50, 100, "All"]],
                ajax: "/portalqualidade/items/itemsFound/" + $('#townhouses').val() + '/' + $('#towers').val()
            });
    });
        
});

function inputDataTable(){
    //popular tabela
    $('#tableItems').DataTable().destroy();
    $('#tableItems').DataTable({
        //bSort: false,
        lengthMenu: [[10, 20, 50, 100, -1], [10, 20, 50, 100, "All"]],
        ajax: "items/itemsFound/" + $('#townhouses').val() + '/' + $('#towers').val()
    });         
}

function qrcodeCreate(routerUrl){
    
    document.getElementById('qrcode').innerHTML = "";
    var qrcode = new QRCode(document.getElementById("qrcode"), {
            width : 250,
            height : 250
    });
    //qrcode.makeCode(result);
    qrcode.makeCode(routerUrl + 'transfers/download/' + $('#towers').val());    
}

function getPhoto(itemId){    
        //alert(itemId);
        $.ajax({
            type: 'post',
            url: 'items/photoFound/' + itemId,
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
            url: 'items/noteFound/' + itemId,            
            contentType: "json",
            traditional: true,
            success: function (result) {
                //alert(result);
                document.getElementById('note').innerHTML = result;              
            }
        });
}




