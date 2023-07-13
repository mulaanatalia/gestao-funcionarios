

    var date1 = $("#data_inicio").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        defaultDate: 'today',
        onChange: function(selectedDates, dateStr, instance) {
            date2.set('minDate', dateStr)
            // date22.set('minDate', dateStr)
            // date11.set('minDate', dateStr)
        }
    });

    var date2 = $("#data_fim").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        // defaultDate: 'today',
        onChange: function(selectedDates, dateStr, instance) {
            date1.set('maxDate', dateStr)
            // date22.set('maxDate', dateStr)
            // date11.set('maxDate', dateStr)
        }
    });
    var date11 = $("#data_inicio_fase").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        minDate: $("#data_inicio").val(),
        maxDate: $("#data_fim").val(),
        // defaultDate: 'today',
        onChange: function(selectedDates, dateStr, instance) {
            date22.set('minDate', dateStr)
        }
    });

    var date22 = $("#data_fim_fase").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        minDate: $("#data_inicio").val(),
        maxDate: $("#data_fim").val(),
        // defaultDate: 'today',
        onChange: function(selectedDates, dateStr, instance) {
            date11.set('maxDate', dateStr)
        }
    });

$(function () {
    hideLoader();
    $(document).on("change", "input[type=file]", function () {
        if($(this)[0].files.length > 0){
            $(this).next().text($(this)[0].files[0].name)
        }
    })
//     // alert()
//     $(document).on("change", "#sector_id, #sector", function(){
//         $.ajax({
//             url:"./ajax/instituicao/instituicao_html.php",
//             method:"POST",
//             data:{
//                 'sector_id':$(this).val()
//             },
//             dataType:'html',
//             success:function(data)
//             {
//                 $("#instituicao_id, #instituicao").html(data)
//             },
//             error: function (err){
//                 alert("Error")
//                 console.log(err)
//             }
//         })
//     })

//     $(document).on("change", "#projecto_id", function(){
//         // alert($(this).val());
//         $.ajax({
//             url:"./ajax/fases/fases_html.php",
//             method:"POST",
//             data:{
//                 'projecto_id':$(this).val(),
//                 'fase_id':''
//             },
//             dataType:'html',
//             success:function(data)
//             {
//                 // alert(data)
//                 $("#fase_id").html(data)
//             },
//             error: function (err){
//                 alert("Error")
//                 console.log(err)
//             }
//         })
//     })
//     hideLoader()
})
    function showLoader() {
        setTimeout(function() {
            $('.se-pre-con').fadeIn();
        }, 500);
    }

    function hideLoader() {
        setTimeout(function() {
            $('.se-pre-con').fadeOut();
        }, 500);
    }

