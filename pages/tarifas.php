<div class="blue_bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>TARIFAS</h2>
                    </div>
                  <div class="card border col-md-12 text-center">
                     <p><strong>Fecha:</strong> <?php echo date('d/m/Y'); ?> </p>
                  </div>
                  <div class="card border col-md-12 text-center">
                  <p><strong>Tasa Cambio BCV:</strong> <span id="tasacambio"></span></p>
                  </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- section -->
                    <div class="container" id="reporte"><div class="page"></div>
                    <script>
                     var formatCurrencyBs = (val) => {
                        return 'Bs. ' + Intl.NumberFormat('es-VE', { maximumFractionDigits: 2 }).format(val);
                        }
                     var formatCurrencyDolar = (val) => {
                        return '$ ' + Intl.NumberFormat('en-US', { maximumFractionDigits: 2 }).format(val);
                     }   
        $(document).ready(function() {
            $.ajax({
                method: 'GET',
                url: 'api/tarifas.json',
               //  url: 'http://ventas.grancacique.com.ve/api/ventas/tarifas',
                beforeSend: function() {
                    $('#reporte').html('<div class="my-3 row justify-content-center h-100"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                },
                error: function(err) {
                    console.log(err);
                    var response = err.responseJSON;
                    $('#reporte').html('<div class="my-3 row justify-content-center"><div class="col-auto"><div class="alert alert-danger" role="alert">' + (response.message || 'Ha ocurrido un error desconocido') + '</div></div></div>');
                },
                success: function(data) {
                    var oficinas = {
                        'CUM': 'Cumana',
                        'PDP': 'Punta de Piedras',
                        'PLC': 'Puerto la Cruz',
                        'ARY': 'Araya',
                    };
                    var tasa_cambio = null;
                    var rutas = {};

                    data.forEach(function(tarifa) {
                        var key = (oficinas[tarifa.origen] || tarifa.origen) + ' - ' + (oficinas[tarifa.destino] || tarifa.destino);
                        if (!(key in rutas)) {
                            rutas[key] = [];
                        }
                        if (!tasa_cambio) {
                            tasa_cambio = tarifa.tasa_cambio;
                        }
                        rutas[key].push(`
                            <tr>
                                <td>${tarifa.descripcion_c}</td>
                                <td>${formatCurrencyBs(tarifa.ref)}</td>
                                <td>${formatCurrencyDolar(tarifa.total)}</td>
                            </tr>
                        `);
                    });
                    var container = $('#reporte');
                    container.html('');
                    $('#tasacambio').text(formatCurrencyBs(tasa_cambio))
                    Object.keys(rutas).forEach(reportedata => {
                        container.append(`
                        <div class="page">
                            <h3 class="text-center">${reportedata}</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr class="table-primary">
                                            <th scope="col" class="text-center">Tarifa</th>
                                            <th scope="col" class="text-center">Valor</th>
                                            <th scope="col" class="text-center">Referencia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ${rutas[reportedata].join('\n')}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        `);
                    })
                }
            })
        });
    </script>