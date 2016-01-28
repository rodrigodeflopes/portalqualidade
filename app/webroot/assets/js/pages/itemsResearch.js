/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
    
    
    //ItemsResearch
    // ------------------------------
    
    $('#townhouses').multiselect({
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
                url: "searchSelects/2/" + selected,
                contentType: "json",
                traditional: true,
                success: function (result) {
                    //alert(result);                    
                    var options = JSON.parse(result);
                    $('#towers').multiselect('dataprovider', options);
                }
            });
        }
    });    
    
    $('#towers').multiselect({
        includeSelectAllOption: true,
        enableFiltering: true,
        templates: {
            filter: '<li class="multiselect-item multiselect-filter"><i class="icon-search4"></i> <input class="form-control" type="text"></li>'
        },
        onSelectAll: function() {
            $.uniform.update();
        },
        enableClickableOptGroups: true,
        onChange: function(element, checked) {
            var brands = $('#towers option:selected');
            var selected = [];
            $(brands).each(function(index, brand){
                selected.push([$(this).val()]);
            });
            //alert(selected);
            $.ajax({
                type: 'post',
                url: "searchSelects/3/" + selected,
                contentType: "json",
                traditional: true,
                success: function (result) {
                    //alert(result);                    
                    var options = JSON.parse(result);
                    $('#loc1').multiselect('dataprovider', options);
                }
            });
        }        
    });
    
    $('#loc1').multiselect({
        includeSelectAllOption: true,
        enableFiltering: true,
        templates: {
            filter: '<li class="multiselect-item multiselect-filter"><i class="icon-search4"></i> <input class="form-control" type="text"></li>'
        },
        onSelectAll: function() {
            $.uniform.update();
        },
        onChange: function(element, checked) {
            var brands = $('#loc1 option:selected');
            var selected = [];
            $(brands).each(function(index, brand){
                selected.push([$(this).val()]);
            });
            //alert(selected);
            $.ajax({
                type: 'post',
                url: "searchSelects/4/" + selected,
                contentType: "json",
                traditional: true,
                success: function (result) {
                    //alert(result);                    
                    var options = JSON.parse(result);
                    $('#loc2').multiselect('dataprovider', options);
                }
            });
        }    
    });
    
    $('#loc2').multiselect({
        includeSelectAllOption: true,
        enableFiltering: true,
        templates: {
            filter: '<li class="multiselect-item multiselect-filter"><i class="icon-search4"></i> <input class="form-control" type="text"></li>'
        },
        onSelectAll: function() {
            $.uniform.update();
        },
        onChange: function(element, checked) {
            var brands = $('#loc2 option:selected');
            var selected = [];
            $(brands).each(function(index, brand){
                selected.push([$(this).val()]);
            });
            //alert(selected);
            $.ajax({
                type: 'post',
                url: "searchSelects/6/" + selected,
                contentType: "json",
                traditional: true,
                success: function (result) {
                    //alert(result);                    
                    var options = JSON.parse(result);
                    $('#services').multiselect('dataprovider', options);
                }
            });
        }    
    });
    
//    $('#loc3').multiselect({
//        includeSelectAllOption: true,
//        enableFiltering: true,
//        templates: {
//            filter: '<li class="multiselect-item multiselect-filter"><i class="icon-search4"></i> <input class="form-control" type="text"></li>'
//        },
//        onSelectAll: function() {
//            $.uniform.update();
//        },
//        onChange: function(element, checked) {
//            var brands = $('#loc3 option:selected');
//            var selected = [];
//            $(brands).each(function(index, brand){
//                selected.push([$(this).val()]);
//            });
//            //alert(selected);
//            $.ajax({
//                type: 'post',
//                url: "searchSelects/6/" + selected,
//                contentType: "json",
//                traditional: true,
//                success: function (result) {
//                    //alert(result);                    
//                    var options = JSON.parse(result);
//                    $('#services').multiselect('dataprovider', options);
//                }
//            });
//        }    
//    });
    
    $('#services').multiselect({
        includeSelectAllOption: true,
        enableFiltering: true,
        templates: {
            filter: '<li class="multiselect-item multiselect-filter"><i class="icon-search4"></i> <input class="form-control" type="text"></li>'
        },
        onSelectAll: function() {
            $.uniform.update();
        },
        onChange: function(element, checked) {
            var brands = $('#services option:selected');
            var selected = [];
            $(brands).each(function(index, brand){
                selected.push([$(this).val()]);
            });
            //alert(selected);
            $.ajax({
                type: 'post',
                url: "searchSelects/7/" + selected,
                contentType: "json",
                traditional: true,
                success: function (result) {
                    //alert(result);                    
                    var options = JSON.parse(result);
                    $('#checks').multiselect('dataprovider', options);
                }
            });
        }    
    });
    
    $('#checks').multiselect({
        includeSelectAllOption: true,
        enableFiltering: true,
        templates: {
            filter: '<li class="multiselect-item multiselect-filter"><i class="icon-search4"></i> <input class="form-control" type="text"></li>'
        },
        onSelectAll: function() {
            $.uniform.update();
        }
    });
    
    //Form ItemsResearch Change
    $('#ItemResearchForm').on("change", function (e) { 
            //alert($('#checked2').is(':checked')); 
            $('#tableItems').DataTable().destroy();
            $('#tableItems').DataTable({
                //bSort: false,
                lengthMenu: [[10, 20, 50, 100, -1], [10, 20, 50, 100, "All"]],
                ajax: "../items/itemsFound/" + $('#townhouses').val() + '/' + $('#towers').val() + '/' + $('#loc1').val() + '/' + $('#loc2').val() + '/' + $('#services').val() + '/' + $('#checks').val()+ '/' + ($('#checked1').is(':checked') ? '1' : null) + '/' + ($('#checked2').is(':checked') ? '2' : null) + '/' + ($('#checked3').is(':checked') ? '0' : null)
            });
    });
    
    //Source data
    $('.datatable-itemsResearch').dataTable();
    
    //Limpar formulário
    $('#formEraser').on("click", function (e) { 
        $("#townhouses").multiselect("clearSelection");
        $("#towers").multiselect("clearSelection");
        $("#loc1").multiselect("clearSelection");
        $("#loc2").multiselect("clearSelection");
        $("#loc3").multiselect("clearSelection");
        $("#services").multiselect("clearSelection");
        $("#checks").multiselect("clearSelection");
        
        $('#checked1').parents('span').removeClass("checked").end().removeAttr("checked");
        $('#checked2').parents('span').removeClass("checked").end().removeAttr("checked");
        $('#ItemResearchForm').change();
    });
    
});

function getPhoto(itemId){    
        //alert(itemId);
        $.ajax({
            type: 'post',
            url: 'photoFound/' + itemId,
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
            url: 'noteFound/' + itemId,            
            contentType: "json",
            traditional: true,
            success: function (result) {
                //alert(result);
                document.getElementById('note').innerHTML = result;              
            }
        });
}

function initSelects(itemId){  
        //alert(itemId);
        
        $.ajax({
                type: 'post',
                url: "searchSelects/1/" + itemId,
                contentType: "json",
                traditional: true,
                success: function (result) {                   
                        //alert(result);                    
                        var options = JSON.parse(result);
                        $('#townhouses').multiselect('dataprovider', options);
                }
        });
        
        $.ajax({
                type: 'post',
                url: "searchSelects/6/" + itemId,
                contentType: "json",
                traditional: true,
                success: function (result) {                   
                        //alert(result);                    
                        var options = JSON.parse(result);
                        $('#services').multiselect('dataprovider', options);
                }
        });
}