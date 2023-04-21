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
        <button type="submit" id="consultarFecha" class="btn mt-4 fsf" style="background-color: #2596be;color: white;">Consultar</button>
</div>
