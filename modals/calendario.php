<?php
$hoy = date('Y-m-d');
$y = date('Y');
$m = date('m') === '12' ? 02 : (date('m') + 2);
$m = strlen($m) === 1 ? "0" . $m : $m;
$max = $y . "-" . $m . "-" . cal_days_in_month(CAL_GREGORIAN, $m, $y);
?>
<div id="calendario" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
    class="overflow-y-auto fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow ">
            <div class="flex items-start justify-between p-4 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900 ">
                    Calendario de Viajes
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                    data-modal-hide="calendario"
                    onClick="$('#calendar').hide();">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>
            <div class="p-6 space-y-6" style="overflow-y: auto; max-height: 90vh;">
                <div class="container" id="calendarioContainer">
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="date" name="floating_date" id="fechaviaje"
                            class="mb-8 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder="" value="<?php echo $hoy; ?>" min="<?php echo $hoy; ?>"
                            max="<?php echo $max; ?>" required />
                        <label for="floating_date"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Fecha de Viaje
                        </label>
                        <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 ">
                            <b>IMPORTANTE:</b> Las fechas disponibles para consulta por este medio son desde hoy (
                            <?php echo date('d/m/Y', strtotime($hoy)); ?>) hasta el
                            <?php echo date('d/m/Y', strtotime($max)); ?>
                        </p>
                        <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500">
                            Si requiere consultar otra fecha comuniquese con nuestro personal de Atencion al Cliente a
                            traves de WhatsApp
                            <a class="font-medium text-bluegc hover:underline" href="https://wa.me/+584120801540"
                                target="_blank">(+58) 0412-080-1540</a>
                        </p>
                    </div>
                    <button type="submit" id="consultarFecha"
                        class="text-white bg-bluegc font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Consultar</button>
                </div>
                <div class="container my-3" id="calendar" style="display:none;">

                    <div
                        class="w-full p-2 bg-white border border-gray-200 rounded-lg shadow">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-xl font-bold leading-none text-gray-900 " id="fechaViaje">
                            </h5>
                        </div>
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200" id="listViajes">
                                
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div style="display:none;" id="spinnerCalendar" role="status"
        class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
        <svg aria-hidden="true" class="w-20 h-20 mr-2 text-gray-200 animate-spin  fill-blue-600"
            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="currentColor" />
            <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentFill" />
        </svg>
        <span class="sr-only">Loading...</span>
    </div>
</div>