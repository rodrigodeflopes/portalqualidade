/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//DevicesIndex
// ------------------------------

function qrcodeCreate(routerUrl){
    
    document.getElementById('qrcode').innerHTML = "";
    var qrcode = new QRCode(document.getElementById("qrcode"), {
            width : 250,
            height : 250
    });
    //qrcode.makeCode(result);
    qrcode.makeCode(routerUrl + 'devices/uploadDevice');    
}




