$(document).ready(function () {
  /* $("#desde").datepicker();
  $("#hasta").datepicker();
  $("#desde2").datepicker();
  $("#hasta2").datepicker();
  $("#desde3").datepicker();
  $("#hasta3").datepicker(); */
  load();
  load2();
  load3();

  $("#reset").on("click", function () {
    location.reload();
  });
});

function load() {
  $desde = $("#desde").val();
  $hasta = $("#hasta").val();
  $("#load_data").empty();
  $loader = $('<tr ><td colspan = "4"><center>Cargando....</center></td></tr>');
  $loader.appendTo("#load_data");
  setTimeout(function () {
    $loader.remove();
    $.ajax({
      //url: "informacion_financiera",
      url: "/informacion_financiera/informacion_financiera_ajax",
      type: "POST",
      data: {
        desde: $desde,
        hasta: $hasta,
      },
      success: function (res) {
        $("#load_data").html(res);
      },
    });
  }, 1000);
}

//------------BALANCES-------
function load2() {
  $desde2 = $("#desde2").val();
  $hasta2 = $("#hasta2").val();
  $("#load_data2").empty();
  $loader = $('<tr ><td colspan = "4"><center>Cargando....</center></td></tr>');
  $loader.appendTo("#load_data2");
  setTimeout(function () {
    $loader.remove();
    $.ajax({
      //url: "informacion_financiera",
      url: "/informacion_financiera/informacion_financiera_ajax2",
      type: "POST",
      data: {
        desde2: $desde2,
        hasta2: $hasta2,
      },
      success: function (res) {
        $("#load_data2").html(res);
      },
    });
  }, 1000);
}
//------------FIN BALANCES-------

//------------TRIMESTRALES-------
function load3() {
  $desde3 = $("#desde3").val();
  $hasta3 = $("#hasta3").val();
  $("#load_data3").empty();
  $loader = $('<tr ><td colspan = "4"><center>Cargando....</center></td></tr>');
  $loader.appendTo("#load_data2");
  setTimeout(function () {
    $loader.remove();
    $.ajax({
      //url: "informacion_financiera",
      url: "/informacion_financiera/informacion_financiera_ajax3",
      type: "POST",
      data: {
        desde3: $desde3,
        hasta3: $hasta3,
      },
      success: function (res) {
        $("#load_data3").html(res);
      },
    });
  }, 1000);
}

$.datepicker.regional["es"] = {
  closeText: "Cerrar",
  prevText: "< Ant",
  nextText: "Sig >",
  currentText: "Hoy",
  monthNames: [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre",
  ],
  monthNamesShort: [
    "Ene",
    "Feb",
    "Mar",
    "Abr",
    "May",
    "Jun",
    "Jul",
    "Ago",
    "Sep",
    "Oct",
    "Nov",
    "Dic",
  ],
  dayNames: [
    "Domingo",
    "Lunes",
    "Martes",
    "Miércoles",
    "Jueves",
    "Viernes",
    "Sábado",
  ],
  dayNamesShort: ["Dom", "Lun", "Mar", "Mié", "Juv", "Vie", "Sáb"],
  dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sá"],
  weekHeader: "Sm",
  dateFormat: "dd/mm/yy",
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: false,
  yearSuffix: "",
};
$.datepicker.setDefaults($.datepicker.regional["es"]);
