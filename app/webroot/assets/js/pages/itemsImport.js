/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
    
    
    //ItemsImport
    // ------------------------------
    
    document.getElementById('qrcode').innerHTML = "";
    var qrcode = new QRCode(document.getElementById("qrcode"), {
            width : 250,
            height : 250
    });
    var url = String(window.location);
    url = url.replace('items/import', 'transfers/upload/');
    qrcode.makeCode(url);
    
});




