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
        
});

function inputDataTable(){
    //popular tabela
    $('#tableItems').DataTable().destroy();
    $('#tableItems').DataTable({
        lengthMenu: [[10, 20, 50, 100, -1], [10, 20, 50, 100, "All"]],
        ajax: "transfers/transfersFound/" + $('#townhouses').val() + '/' + $('#towers').val()
    });         
}

function qrcodeCreate(routerUrl){
    
    document.getElementById('qrcode').innerHTML = "";
    var qrcode = new QRCode(document.getElementById("qrcode"), {
            width : 250,
            height : 250
    });
    //qrcode.makeCode(result);
    qrcode.makeCode(routerUrl + 'transfers/upload/');    
}




