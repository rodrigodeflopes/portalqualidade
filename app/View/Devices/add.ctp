<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Dispositivos'), array('action' => 'index')); ?> <span class="divider">/</span></li>
    <li class="active">Novo dispositivo</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="well">
            <div class="row-fluid">
                <div id="qrcode" class="span3"> </div>
                <div class="span9">
                    <h3>Adicionar dispositivo</h3>
                    <p>Para adicionar utilize o leitor de Qr-code do aplicativo instalado no dispositivo.</p>
                    <p>Após conclusão você será redirecionado para as informações do dispositivo adicionado.</p>
                </div>
            </div>
        </div>
    </div>
</div> 

<?php echo $this->Html->script('/js/qrcode/qrcode'); ?>
<script>
    loadlink(); // This will run on page load
    
    //setInterval(function(){
    //    loadlink() // this will run after every 5 seconds
    //}, 5000);
    
    function loadlink(){
        
        //$.ajax({url: "http://servidor/portalqualidade/devices/uploadDevice", success: function(result){
            //document.getElementById("qrcode").innerHTML = '';
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                    width : 200,
                    height : 200
            });
            //qrcode.makeCode(result);
            qrcode.makeCode('http://192.168.0.153/portalqualidade/devices/uploadDevice');
            //qrcode.makeCode('http://tecplaner.poweredbyclear.com:8080/portalqualidade/devices/uploadDevice');            
        //}});
    }
</script>