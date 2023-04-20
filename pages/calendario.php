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
        <h2> Consulta de Fecha </h2>
    </div>
    <div class="form-group mt-4">
        <p> IMPORTANTE: Las fechas disponibles para consulta por este medio son desde hoy (<?php echo date('d/m/Y',strtotime($hoy));?>) hasta el  <?php echo date('d/m/Y',strtotime($max));?></p>
        <p>Si requiere consultar otra fecha comuniquese con nuestro personal de Atencion al Cliente a traves de WhatsApp (+58) 0412-080-1540</p>
    </div>
        <div class="form-group fsf">
            <label for="formGroupExampleInput">Fecha de Viaje</label>
            <input type="date" class="form-control" id="fechaviaje"  value="<?php echo $hoy; ?>" min="<?php echo $hoy;?>" max="<?php echo $max; ?>">
        </div>
        <button type="submit" id="consultarFecha" class="btn mt-4 fsf" style="background-color: #2596be;color: white;">Consultar Fecha</button>
</div>
<div class="container my-3" id="app" style="display:none;" >
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-lg-8 col-xl-8">
                <div class="card d-flex flex-column p-3 shadow-sm" style="min-height: 450px;">
                    <template v-if="isLoading">
                        <div class="row justify-content-center mt-auto">
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 324.65 212.28" class="logo">
                                    <defs>
                                        <style>
                                            .a,
                                            .b,
                                            .c {
                                                fill-rule: evenodd;
                                            }
                                
                                            .b {
                                                opacity: 0.6;
                                            }
                                
                                            .c {
                                                opacity: 0.7;
                                            }
                                        </style>
                                    </defs>
                                    <path class="a"
                                        d="M219.82,282.07c-53.22-10.88-120.9,25.57-111.21,106,1.91,15.88,8.77,29.73,14.8,43.95a10.37,10.37,0,0,1,1.09-1.31l.93-.92a7.45,7.45,0,0,1,5.19-2.09c-44.44-96.26,44.44-166.48,109.67-129.13,3.39,4,7,7,12.35,3.59C244.27,290.9,232.73,284.71,219.82,282.07Z"
                                        transform="translate(-72.8 -280.18)" />
                                    <path class="a"
                                        d="M305.56,435.67c11-1.12,23.21-2.92,33.63,1.72-4.34-4-8.85-7.57-13.46-9.62-18-8-36-6.94-53.75-.38-13.37,4.95-84.22,36.62-106.43,46.33A77.61,77.61,0,0,1,145,479.21c-13.59,1.9-26.9.23-38.06-18.54a18.2,18.2,0,0,0,1.22,4.19c6.14,14.38,14.7,20.57,23.87,23.53,22.26,7.2,43.85.29,65.21-8.43,16.18-6.61,32.14-14.92,48.22-22.32C255.57,453,265.82,448.9,276,444.1a85.08,85.08,0,0,1,27-7.79A9,9,0,0,1,305.56,435.67Z"
                                        transform="translate(-72.8 -280.18)" />
                                    <path
                                        d="M305.56,435.56l8.47-.9,4.25-.32,4.27-.15,4.27.12,4.25.47,4.19.91,4.05,1.43-.33.5a53.77,53.77,0,0,0-12.85-9.08c-2.35-1-4.94-1.88-7.4-2.82-2.56-.58-5.05-1.38-7.64-1.79l-3.9-.53c-.65-.08-1.29-.2-1.95-.25l-2,0-3.92-.14c-1.31,0-2.62.14-3.93.2s-2.62.11-3.91.32l-3.89.63-1.94.31c-.64.14-1.27.32-1.91.47l-3.82,1c-2.53.68-5,1.63-7.5,2.4l-7.31,3.09-14.65,6.22-29.38,12.29q-14.64,6.24-29.22,12.65l-14.58,6.4L170,472.13c-2.41,1.08-4.86,2.19-7.35,3.1a77.16,77.16,0,0,1-15.45,4.08,49.41,49.41,0,0,1-16,.63,28,28,0,0,1-7.78-2.25,28.67,28.67,0,0,1-6.9-4.26,47.15,47.15,0,0,1-10.36-12.34l1.53-.57a22.2,22.2,0,0,0,2.3,6.24c.52,1,1,2.09,1.55,3.08l1.77,2.85a38.07,38.07,0,0,0,9.1,9.79,36.72,36.72,0,0,0,12.17,5.57A59.4,59.4,0,0,0,148,490.2a86.08,86.08,0,0,0,26.92-3.52q6.58-1.85,13-4.28c4.31-1.63,8.55-3.22,12.73-5.19l12.61-5.63c4.22-1.85,8.44-3.69,12.59-5.67l12.52-5.82,6.28-2.88L251,454.5c8.5-3.57,16.91-7.25,25.4-10.89L282.8,441l6.59-2.16,6.73-1.59,6.85-1h0l1.29-.42Zm0,.21-1.29.23-1.25.42h0l-6.81,1.09-6.69,1.65L283,441.38c-2.13.87-4.23,1.81-6.34,2.73l-25.1,11.53-6.27,2.88-6.21,3.05-12.42,6.06c-8.28,4.05-16.71,7.76-25.09,11.58-4.16,2-8.54,3.63-12.84,5.27s-8.73,3.09-13.2,4.36a96.89,96.89,0,0,1-13.65,2.92,75.94,75.94,0,0,1-14,.61A61.62,61.62,0,0,1,134,490.06a35.93,35.93,0,0,1-22.27-16.38l-1.81-3c-.58-1-1-2.08-1.52-3.12a23.69,23.69,0,0,1-2.35-6.7l-.76-4.5,2.29,3.93a45.46,45.46,0,0,0,9.83,12.08,27.55,27.55,0,0,0,6.54,4.18,27,27,0,0,0,7.43,2.26,48,48,0,0,0,15.67-.39c2.62-.35,5.2-.94,7.78-1.49,1.28-.32,2.53-.72,3.79-1.09a28.72,28.72,0,0,0,3.76-1.28c2.5-.9,4.89-2,7.33-3l7.3-3.19,14.55-6.46q14.57-6.46,29.07-13.07l29.15-12.82,14.62-6.32,7.34-3.16c2.56-.81,5.07-1.75,7.67-2.41l3.92-.94c.65-.15,1.3-.33,2-.46l2-.3,4-.59c1.33-.2,2.68-.18,4-.29s2.68-.19,4-.15l4,.19,2,.11c.67.07,1.33.21,2,.3l4,.65c2.64.49,5.21,1.38,7.81,2.05,2.46,1,4.93,1.87,7.4,3a55,55,0,0,1,12.84,9.53l1.12,1.06-1.45-.56-3.95-1.49-4.12-1-4.21-.51-4.24-.16-4.25.11-4.25.29Z"
                                        transform="translate(-72.8 -280.18)" />
                                    <path class="a"
                                        d="M306.05,406.18c12.75-1.65,27-4.06,39.29-.05-5.21-3.7-10.57-6.93-16-8.71-21.22-6.89-42.21-4.89-62.73,2.43-15.43,5.52-30.79,11.39-46,17.79C195,428.38,169.58,440,144,450.56A105.22,105.22,0,0,1,120.16,457c-15.78,2.55-31.37,1.6-45-16.12a15.52,15.52,0,0,0,1.57,4c7.66,13.71,17.86,19.31,28.66,21.73,26.21,5.86,51.17-2,75.78-11.62,18.66-7.28,37-16.23,55.5-24.26,11.69-5.08,23.5-9.59,35.16-14.8a113.73,113.73,0,0,1,31.26-9A12.16,12.16,0,0,1,306.05,406.18Z"
                                        transform="translate(-72.8 -280.18)" />
                                    <path
                                        d="M123.92,469.72h0a85.93,85.93,0,0,1-18.79-2.05c-13.21-3-22.54-10-29.36-22.24a16.83,16.83,0,0,1-1.68-4.28l-1.29-5L76,440.23C84.78,451.65,95.11,457,108.47,457a71,71,0,0,0,11.52-1,103.49,103.49,0,0,0,23.59-6.36c13.68-5.68,27.53-11.72,40.93-17.57,11.66-5.09,23.71-10.35,35.61-15.35,14.35-6,29.43-11.85,46.1-17.81,12.7-4.53,24.56-6.74,36.26-6.74a87.91,87.91,0,0,1,27.17,4.3c4.85,1.59,10,4.39,16.31,8.85l5.73,4.07L345,407.14A49.1,49.1,0,0,0,329.74,405a155.71,155.71,0,0,0-20.35,1.81l-3.2.43a10.35,10.35,0,0,0-2.73.7l-.25.06a113.63,113.63,0,0,0-31,8.92c-6.41,2.86-13,5.56-19.32,8.16-5.2,2.14-10.59,4.35-15.85,6.64-6.53,2.84-13.15,5.84-19.56,8.73-11.74,5.33-23.88,10.83-36,15.55C163.34,463.12,143.78,469.72,123.92,469.72ZM79.47,447.43c6.32,9.79,14.7,15.59,26.13,18.15a84.09,84.09,0,0,0,18.32,2c18.42,0,36-5.42,56.83-13.56,12-4.7,24.16-10.19,35.88-15.5,6.41-2.91,13-5.91,19.58-8.75,5.29-2.29,10.68-4.51,15.9-6.65,6.32-2.6,12.87-5.29,19.25-8.14a115.14,115.14,0,0,1,31.43-9.06,12.26,12.26,0,0,1,3.14-.79l3.18-.42a157.19,157.19,0,0,1,20.63-1.84,59.2,59.2,0,0,1,10,.78,49.79,49.79,0,0,0-10.72-5.2,85.68,85.68,0,0,0-26.5-4.19c-11.45,0-23.08,2.16-35.54,6.61-16.63,5.95-31.67,11.76-46,17.77-11.88,5-23.93,10.25-35.58,15.34-13.41,5.85-27.27,11.9-41,17.58a105.84,105.84,0,0,1-24.07,6.51,75,75,0,0,1-11.86,1.06C96.94,459.12,87.57,455.37,79.47,447.43Z"
                                        transform="translate(-72.8 -280.18)" />
                                    <path class="a"
                                        d="M102.43,451.31C122.61,433,142.49,413.65,163,396.52c41.13-34.33,83.33-64.26,128.22-82C322.79,302,354.68,295.37,387.34,303c2.6.6,5.18,1.41,7.77,2.21.47.15.88.72,1.63,1.37-1,1.7-1.85,3.27-2.79,4.63-17.67,25.8-35.4,51.51-53,77.44-2.43,3.58-4.58,4-7.83,3.17-13.76-3.38-27.63-8.07-41.37-7.77-17.67.38-35.4,3.65-52.84,8.28a370.5,370.5,0,0,0-58.09,20.49C154.65,424.7,128.89,439.09,103,452.4Z"
                                        transform="translate(-72.8 -280.18)" />
                                    <path
                                        d="M102.43,451.31l15.72-14.6,15.74-14.56,16-14.27,8-7.14c2.67-2.38,5.32-4.79,8.12-7,5.55-4.51,11-9.16,16.66-13.5s11.23-8.88,17-13l8.64-6.36c2.89-2.11,5.88-4.07,8.82-6.1l8.86-6.05,9.08-5.72c6-3.93,12.27-7.35,18.48-10.9,1.57-.87,3.1-1.79,4.68-2.63l4.79-2.41,9.59-4.82c3.2-1.62,6.55-2.89,9.81-4.36s6.53-2.91,9.89-4.2l10-3.73,10.25-3.27c1.69-.58,3.43-1,5.17-1.44l5.2-1.32c3.45-1,7-1.53,10.53-2.18l5.28-.95,5.35-.55a89.53,89.53,0,0,1,10.72-.75l5.38-.08,2.69,0,2.68.21c3.57.33,7.17.45,10.72,1,7,1.48,14.36,1.7,20.71,5.69l.38.23-.27.44-2.86,4.75-3.13,4.55L385,325.27l-12.49,18.21-25,36.43L341.21,389a7.44,7.44,0,0,1-4.52,3.45c-2,.37-3.85-.33-5.6-.74-7.14-1.8-14.21-3.85-21.4-5.33a75.58,75.58,0,0,0-21.82-1.74c-3.67.26-7.36.32-11,.77L266,386.86c-7.22,1.32-14.46,2.63-21.58,4.49L239,392.64l-5.31,1.51c-3.53,1-7.09,2-10.6,3.07-7,2.28-14,4.46-20.86,7.15-6.94,2.43-13.64,5.47-20.43,8.31-6.67,3.07-13.31,6.28-20,9.41l-19.69,10L103,452.4h0Zm0,0,.54,1.08h0L142,431.8l19.65-10.08c6.64-3.17,13.24-6.41,19.92-9.52,6.79-2.87,13.5-5.93,20.45-8.38,6.85-2.71,13.89-4.9,20.88-7.21,3.52-1.11,7.07-2.05,10.6-3.09l5.31-1.51,5.37-1.32c7.13-1.87,14.38-3.2,21.63-4.53l11-1.47c3.66-.46,7.34-.51,11-.79a76.59,76.59,0,0,1,22,1.71c7.24,1.47,14.31,3.51,21.45,5.3,1.78.42,3.56,1,5.23.72a6.58,6.58,0,0,0,4-3.14l6.22-9.08,24.91-36.48,12.46-18.24,6.22-9.12,3.12-4.56,2.84-4.7.11.67-1-.92a1.36,1.36,0,0,0-.43-.32,4.52,4.52,0,0,0-.54-.17l-2.57-.74c-1.72-.46-3.45-1-5.15-1.42l-10.5-1.91c-3.52-.51-7.09-.63-10.63-1l-2.66-.21-2.67,0-5.34.07a88.47,88.47,0,0,0-10.65.72l-5.31.53-5.27.94c-3.5.64-7,1.18-10.47,2.15l-5.18,1.3c-1.73.42-3.46.86-5.15,1.43l-10.2,3.23-10.06,3.71c-3.31,1.27-6.56,2.78-9.85,4.16s-6.6,2.72-9.78,4.32l-9.59,4.8-4.79,2.39c-1.57.84-3.11,1.75-4.67,2.62-6.2,3.53-12.49,6.93-18.47,10.84l-9.08,5.69-8.86,6c-2.94,2-5.93,4-8.82,6.08l-8.64,6.33c-5.82,4.16-11.4,8.62-17.05,13s-11.12,9-16.7,13.44c-2.81,2.22-5.46,4.59-8.15,7l-8,7.09-16.09,14.17-15.83,14.47Z"
                                        transform="translate(-72.8 -280.18)" />
                                    <path class="b"
                                        d="M145,401.79c15-25.09,31.55-46.56,49.87-64.4,21.14-20.62,43.32-36.32,67-46.51,3.51-1.52,6.52-1.22,9.83,2,5.59,5.39,11.45,9.93,17.84,15.37C237.12,323.59,190.77,361.24,145,401.79Z"
                                        transform="translate(-72.8 -280.18)" />
                                    <path class="c"
                                        d="M145,401.79c15-25.09,31.55-46.56,49.87-64.4,21.14-20.62,43.32-36.32,67-46.51,3.51-1.52,6.52-1.22,9.83,2,5.59,5.39,11.45,9.93,17.84,15.37C237.12,323.59,190.77,361.24,145,401.79Z"
                                        transform="translate(-72.8 -280.18)" />
                                    <path class="a"
                                        d="M145,401.77c15-25.11,31.55-46.56,49.87-64.42,21.14-20.61,43.32-36.31,67-46.5,3.51-1.52,6.52-1.23,9.83,2,5.59,5.39,11.45,9.94,17.84,15.38C237.12,323.55,190.77,361.22,145,401.77Z"
                                        transform="translate(-72.8 -280.18)" />
                                    <path
                                        d="M144.72,402.05l6.83-10.76,3.31-5.22,1.66-2.62,1.81-2.5,7.24-10.05c1.23-1.65,2.35-3.39,3.67-5l3.93-4.78,7.87-9.55,8.51-9,4.26-4.49c1.41-1.52,3-2.86,4.45-4.3l4.51-4.25,4.66-4.07c3.07-2.78,6.33-5.3,9.54-7.9s6.62-4.94,9.92-7.42c3.44-2.28,6.82-4.66,10.36-6.8S244.3,299,248,297.17c1.83-.95,3.63-2,5.49-2.87l5.62-2.62c1.88-.84,3.7-1.91,5.93-2.07a8.13,8.13,0,0,1,6,2.1l9.29,8.21,9.48,7.94.61.5-.77.26c-3.43,1.12-6.88,2.19-10.29,3.35s-6.77,2.51-10.1,3.89-6.65,2.8-9.9,4.37-6.53,3.08-9.71,4.8-6.4,3.33-9.5,5.19-6.28,3.56-9.31,5.53-6.15,3.77-9.13,5.82-6,3.95-9,6.06-6,4.1-8.84,6.28-5.85,4.23-8.7,6.46-5.75,4.37-8.57,6.64-5.67,4.48-8.46,6.78c-11.2,9.13-22.19,18.53-33.11,28Zm.5-.58q7.93-7.12,15.93-14.15,8.19-7.12,16.54-14.05c2.77-2.32,5.61-4.56,8.42-6.85s5.68-4.47,8.52-6.72,5.78-4.36,8.66-6.55,5.87-4.24,8.8-6.35,6-4.09,9-6.11,6.11-3.88,9.17-5.83,6.24-3.67,9.35-5.52,6.37-3.45,9.55-5.19,6.51-3.18,9.75-4.79,6.64-2.9,9.95-4.37,6.78-2.57,10.16-3.87,6.89-2.23,10.34-3.35l-.17.76-9.47-8-9.23-8.21a7.33,7.33,0,0,0-5.38-2c-1.94.11-3.82,1.15-5.67,2L253.81,295c-1.85.89-3.65,1.9-5.47,2.85-3.69,1.84-7.19,4-10.73,6.11s-6.91,4.48-10.35,6.75c-3.3,2.46-6.72,4.77-9.92,7.37s-6.48,5.08-9.54,7.84l-4.67,4.05-4.52,4.22c-1.48,1.42-3.07,2.77-4.47,4.27l-4.27,4.46-8.53,9-7.9,9.5-4,4.76c-1.32,1.58-2.45,3.31-3.69,5l-7.27,10-1.82,2.5-1.68,2.6-3.33,5.21Z"
                                        transform="translate(-72.8 -280.18)" />
                                </svg>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-auto">
                            <div class="col-auto">
                                <div class="spinner-border text-primary" role="status" style="width: 64px;height: 64px;" v-if="!error">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="alert alert-danger" role="alert" v-else>
                                    El enlace actual es invalido. Por favor contacte a soporte si persiste el problema.
                                </div>
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <div class="row align-items-end mb-3 flex-column-reverse flex-md-row">
                            <div class="col-md-auto ms-3">
                                <h3>Viajes disponibles para el dia {{ formatFechaViaje(fecha) }}</h3>
                            </div>
                            <div class="col-md-4 ms-auto">
                                <img class="img-fluid d-block" :src="urlImg" />
                            </div>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item mb-4 mt-4 text-center" v-if="viajes.length === 0">
                                <h1>No hay viajes disponibles</h1>
                            </li>
                            <li class="list-group-item mb-4 " v-for="viaje in viajes">
                                <div class="row justify-content-between align-items-start g-0 mb-4">
                                    <div class="col-4 col-md-2">
                                        <div class="fw-bold"><i class="fa-solid fa-clock"></i> {{ viaje.hora_salida }}</div>
                                    </div>
                                    <div class="col-6 col-md-auto ms-auto d-flex flex-column flex-md-row justify-content-stretch align-items-stretch">
                                        <span class="text-nowrap mx-auto me-md-3"><i class="fa-solid fa-ship"></i> {{ viaje.barco }}</span>
                                        <span :class="'badge  rounded-pill ' + getColorStatus(viaje.estatusSalida)">{{ getStatus(viaje.estatusSalida) }}</span>
                                    </div>
                                </div>
                                <div class="row justify-content-between align-items-start g-0 mb-4">
                                    <div class="col-md-auto text-center">
                                        <span class="font-weight-bold"><b>{{ getTipoBarco(viaje.total_metros) }}</b></span>
                                    </div>
									 <div class="col-md-auto">
                                        <span class="font-weight-bold"><b>Origen:</b> {{ viaje.origen }}</span>
                                    </div>
                                    <div class="col-md-auto">
                                        <span class="font-weight-bold"><b>Destino:</b> {{ viaje.destino }}</span>
                                    </div>
                                </div>
                                <div class="row justify-content-between align-items-start g-0 mb-4 text-center">
                                    <div class="col-md-auto">
                                        <span class="font-weight-bold"><b>Disponibilidad</b></span>
                                    </div>
                                    <div class="col-md-auto">
                                        <span class="font-weight-bold ">Pasajeros: <b>{{ getDisp(viaje.puestos,viaje.total_puestos) }} % </b><i :class="getDispColor(getDisp(viaje.puestos,viaje.total_puestos))"></i> </span>
                                    </div>
                                    <div v-if="viaje.total_metros > 0"class="col-md-auto">
                                        <span class="font-weight-bold">Vehiculos: <b>{{ getDisp(viaje.metros,viaje.total_metros) }} % </b><i :class="getDispColor(getDisp(viaje.metros,viaje.total_metros))"></i> </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="row align-items-end mb-3 flex-column-reverse flex-md-row">
                            <button class="btn btn-success" onClick="itemMenu($('.nav-link[datamenu=calendario]')[0])">Regresar</button>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#consultarFecha').click(()=>{
        $('.fsf').hide()
        $('#app').fadeIn();
        vm.mount('#app');
    })
   
    var vm =  Vue.createApp({
                data() {
                    return {
                        name: "Vue.js",
                        fecha: null,
                        code: null,
                        viajes: [],
                        isLoading: true,
                        error: false
                    };
                },
                async created() {
                    const fecha = $('#fechaviaje').val();
                    const code = 'GC';
                    if (!fecha || !code) {
                        this.error = true;
                    }
                    try {
                        this.fecha = fecha;
                        this.code = code;
                        this.viajes = (await this.obtenerViajes()).data;
                        this.isLoading = false;
                        console.log(this.viajes);
                    } catch (err) {
                        this.error = true;
                    }
                },
                methods: {
                    async obtenerViajes() {
                        return axios.post('https://consultas.grancaciqueexpress.com/consultar/fecha/consultar.php', {
                            fecha: this.fecha,
                            code: this.code
                        });
                    },
                    formatFechaViaje(date) {
                        return moment(date).format('DD/MM/YYYY');
                    },
                    getTipoBarco(metros) {
                        if(metros > 0){
                            return "Pasajeros y Vehiculos";
                        } else {
                            return 'Solo Pasajeros'
                        }
                    },
                    getDisp(disponible,total) {
                        return parseFloat(((disponible * 100)/total).toFixed(2));
                    },
                    getDispColor(disponibilidad) {
                        if(disponibilidad >= 60 && disponibilidad <= 100) { return 'fa-solid fa-circle-check text-success';}
                        if(disponibilidad < 60 && disponibilidad >= 30) { return 'fa-solid fa-circle-exclamation text-warning';}
                        if(disponibilidad < 30 && disponibilidad >= 0) { return 'fa-solid fa-circle-xmark text-danger';}
                    },
                    getStatus(status) {
                        switch (status) {
                            case 'VENDIENDO':
                                return 'VENDIENDO';
                            case 'EN TRANSITO':
                                return 'CULMINADO';
                            case 'CULMINADO':
                                return 'CULMINADO';
                        }
                    },
                    getColorStatus(status) {
                        switch (status) {
                            case 'VENDIENDO':
                                return 'bg-success';
                            case 'EN TRANSITO':
                                return 'bg-danger';
                            case 'CULMINADO':
                                return 'bg-danger';
                        }
                    },
                },
                computed: {
                    urlImg() {
                        return '/consultar/fecha/' + this.code.toLowerCase() + '.png';
                    }
                }
            })
            

</script>