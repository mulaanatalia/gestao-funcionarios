$(function() {
    flatpickr(".date", {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        maxDate: 'today'
    });

    var date1 = $(".start_date").flatpickr({
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

    var date2 = $(".end_date").flatpickr({
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

    setInterval(function () {
        $.ajax({
            url: base_url_function()+'security/control.php',
            data: {},
            type: 'GET',
            dataType: "json",
            success: function(data) {
                // alert(data)
                if(data){
                    // console.log("True")
                    window.location=base_url_function()+'index.php'
                }else{
                    // console.log("False")
                }
            },
            error: function(error) {
                // alert("eerr")
                console.log(error)
            }
        })
        // console.log("5")
    }, 12000);

})

function base_url_function() {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/'; // http://localhost/myproject/
    } else {
        var url = location.origin+"/";// http://stackoverflow.com
    }
    return url;
}

function showLoader() {
    setTimeout(function() {
        $('.loader-bg').fadeIn();
    }, 500);
}

function hideLoader() {
    setTimeout(function() {
        $('.loader-bg').fadeOut();
    }, 500);
}