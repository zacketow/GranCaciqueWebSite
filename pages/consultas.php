<?php
$hoy = date('Y-m-d');
$y = date('Y');
$m = date('m') === '12' ? 02 : (date('m') + 2);
$m = strlen($m) === 1 ? "0".$m : $m;
$max = $y."-".$m."-".cal_days_in_month(CAL_GREGORIAN,$m,$y);
?>
<div class="blue_bg">
<div class="container">
    <div class="form-group">
        <h2> Consulta Boleto</h2>
    </div>
    <div class="form-group mt-4">
        <p> IMPORTANTE: Puede encontrar el numero de boleto impreso en su factura</p>
    </div>
    <div class="form-group mt-4 text-center">
        <img src="images/factura.png"/> 
    </div>
        <div class="form-group fsf">
            <label>Numero de boleto:</label>
            <input type="text" class="form-control" id="numeroBoleto" placeholder="0000001">
        </div>
        <button type="submit" id="consultarBoleto" class="btn mt-4 fsf" style="background-color: #2596be;color: white;">Consultar</button>
</div>
<div class="modal fade" id="modalConsultarBoleto" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Numero de Boleto <span id="nBoleto">#</span></h3>
      </div>
      <div class="modal-body">
                        <ul class="list-group">
                            <li class="list-group-item mb-4 " v-for="viaje in viajes">
                                <div class="row justify-content-between align-items-start g-0 mb-2">
                                    <div class="col-6 col-md-6">
                                        <div class="fw-bold">Fecha Viaje:</div>
                                    </div>
                                    <div class="col-6 col-md-auto ms-auto d-flex flex-column flex-md-row justify-content-stretch align-items-stretch">
                                        <div class="fw-normal"><span class="text-nowrap mx-auto me-md-1" id="viajeFecha"></span><i class="fa-solid fa-clock"></i></div>
                                    </div>
                                </div>
                                <div class="row justify-content-between align-items-start g-0 mb-2">
                                    <div class="col-6 col-md-6">
                                        <div class="fw-bold">Identificacion:</div>
                                    </div>
                                    <div class="col-6 col-md-auto ms-auto d-flex flex-column flex-md-row justify-content-stretch align-items-stretch">
                                        <div class="fw-normal"><span class="text-nowrap mx-auto me-md-1" id="identBoleto"></span><i id="iconIdent"></i></div>
                                    </div>
                                </div>
                                <div class="row justify-content-between align-items-start g-0 mb-2">
                                    <div class="col-6 col-md-6">
                                        <div class="fw-bold" id="identB1"></div>
                                    </div>
                                    <div class="col-6 col-md-auto ms-auto d-flex flex-column flex-md-row justify-content-stretch align-items-stretch">
                                        <div class="fw-normal"><span class="text-nowrap mx-auto me-md-1" id="identB1d"></span></div>
                                    </div>
                                </div>
                                <div class="row justify-content-between align-items-start g-0 mb-2">
                                    <div class="col-6 col-md-6">
                                        <div class="fw-bold" id="identB2"></div>
                                    </div>
                                    <div class="col-6 col-md-auto ms-auto d-flex flex-column flex-md-row justify-content-stretch align-items-stretch">
                                        <div class="fw-normal"><span class="text-nowrap mx-auto me-md-1" id="identB2d"></span></div>
                                    </div>
                                </div>
                                <div class="row justify-content-between align-items-start g-0 mb-2" style="display:none;" id="asientoDiv">
                                    <div class="col-6 col-md-6">
                                        <div class="fw-bold">Asiento:</div>
                                    </div>
                                    <div class="col-6 col-md-auto ms-auto d-flex flex-column flex-md-row justify-content-stretch align-items-stretch">
                                        <div class="fw-normal"><span class="text-nowrap mx-auto me-md-1" id="asientoC"></span>- <span class="text-nowrap mx-auto me-md-1" id="asiento"></span></div>
                                    </div>
                                </div>
                                <div class="row justify-content-between align-items-start g-0 mb-2">
                                    <div class="col-6 col-md-6">
                                        <div class="fw-bold">Origen:</div>
                                    </div>
                                    <div class="col-6 col-md-auto ms-auto d-flex flex-column flex-md-row justify-content-stretch align-items-stretch">
                                        <div class="fw-normal"><span class="text-nowrap mx-auto me-md-1" id="origen"></span></div>
                                    </div>
                                </div>
                                <div class="row justify-content-between align-items-start g-0 mb-2">
                                    <div class="col-6 col-md-6">
                                        <div class="fw-bold">Destino:</div>
                                    </div>
                                    <div class="col-6 col-md-auto ms-auto d-flex flex-column flex-md-row justify-content-stretch align-items-stretch">
                                        <div class="fw-normal"><span class="text-nowrap mx-auto me-md-1" id="destino"></span></div>
                                    </div>
                                </div>
                                <div class="row justify-content-between align-items-start g-0 mb-2">
                                    <div class="col-6 col-md-6">
                                        <div class="fw-bold">Estatus:</div>
                                    </div>
                                    <div class="col-6 col-md-auto ms-auto d-flex flex-column flex-md-row justify-content-stretch align-items-stretch">
                                        <div class="fw-normal"><span class="text-nowrap mx-auto me-md-1" id="estatus"></span></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onClick="$('#modalConsultarBoleto').modal('hide');">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script>
    $('#consultarBoleto').click( async ()=>{
        let nboleto = parseInt($('#numeroBoleto').val());
        async function obtenerBoleto(boleto,code) {
            return axios.post('https://consultas.grancaciqueexpress.com/consultar/boleto/', {
            numero_boleto:boleto,
            code: code  });
        }
        if(nboleto === '' || isNaN(nboleto)){alert('Debe especificar un numero de boleto');return}
        var boletoData = (await obtenerBoleto(nboleto,'GC')).data;
        if(boletoData){
            let oficinas_codigo = ['CUM','PDP','PLC','ARY'];
            let oficinas = ['Cumaná','Punta de Piedras','Puerto la Cruz','Araya'];
            let estatus_codigo = ['V','A','Y','W','T'];
            let estatus = ['VENDIDO','ABORDADO','ANULADO POR CAMBIO','ANULADO','RETRASADO'];
            let clase_codigo = ['T','VIP',null];
            let clase = ['Turisitico','Primera Clase','Turistico'];
            $('#viajeFecha').text(moment(boletoData.fecha_viaje+' '+boletoData.hora_viaje).format('DD/MM/YYYY hh:mm a'))
            if(boletoData.tipo_boleto === 'P'){
                $('#iconIdent').attr('class','fa-solid fa-id-card');  
                $('#identB1').text('Nombre:'); 
                $('#identB2').text('Apellido:');
                $('#asientoDiv').show();
                $('#asiento').text(boletoData.asiento);
                $('#asientoC').text(str_replace(clase_codigo,clase,boletoData.asiento_clase));
            }
            if(boletoData.tipo_boleto === 'C'){
                $('#iconIdent').attr('class','fa-solid fa-car');  
                $('#identB1').text('Marca:'); 
                $('#identB2').text('Modelo:');
                $('#asientoDiv').hide();
                $('#asiento').text('');
            }
            $('#nBoleto').text('# '+$('#numeroBoleto').val());
            $('#identB1d').text(boletoData.nombre_pasajero); 
            $('#identB2d').text(boletoData.apellido_pasajero);
            $('#identBoleto').text(boletoData.cedula_pasajero);
            $('#origen').text(str_replace(oficinas_codigo,oficinas,boletoData.origen));
            $('#destino').text(str_replace(oficinas_codigo,oficinas,boletoData.destino));
            $('#destino').text(str_replace(oficinas_codigo,oficinas,boletoData.destino));
            $('#estatus').text(str_replace(estatus_codigo,estatus,boletoData.status));
            $('#modalConsultarBoleto').modal('show');
        } else {
            alert('No existe este numero de boleto');
        }
        
    });
    
</script>