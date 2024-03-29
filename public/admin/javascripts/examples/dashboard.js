$(function () {

    "use strict";
    /*editor*/
    $('.summernote').summernote({
        height: 110,
        placeholder: 'Enter Content'
    });



    //AREA CHART EXAMPLE
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    var area = document.getElementById("area-chart");

    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };
    var dataArea = {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [
            {
                label: "Data 1",
                fill: true,
                backgroundColor: "rgba(55, 209, 119, 0.45)",
                borderColor: "rgba(55, 209, 119, 0.45)",
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointHoverBackgroundColor: "343d3e",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                data: [12, 13, 11, 6, 9, 12]
            },
            {
                label: "Data 2",
                fill: true,
                backgroundColor: "rgba(175, 175, 175, 0.26)",
                borderColor: "rgba(175, 175, 175, 0.26)",
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointHoverBackgroundColor: "#343d3e",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                data: [14, 6, 9, 13, 12, 16],
            }
        ],
        options: {
            scales: {
                yAxes: [{
                    stacked: true
                }]
            }
        }
    };

    var areaChart = new Chart(area, {
        type: 'line',
        data: dataArea,
        options: options

    });

    //PIE  & POLAR CHART EXAMPLE
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    var pie = document.getElementById("pie-chart");

    var dataPie = {
        labels: [
            "Data 1",
            "Data 2",
            "Data 3"
        ],
        datasets: [
            {
                data: [300, 50, 100],
                backgroundColor: [
                    "rgba(55, 209, 119, 0.45)",
                    "#FFCE56",
                    "rgba(175, 175, 175, 0.26)"
                ],
                hoverBackgroundColor: [
                    "rgba(55, 209, 119, 0.6)",
                    "#FFCE56",
                    "rgba(175, 175, 175, 0.4)"
                ]
            }]
    };


    var pieChar = new Chart(pie, {
        type: 'pie',
        data: dataPie

    });


    //MAGNIFIC POPUP GALLERY
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $('.gallery-wrap').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1]
        },
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-with-zoom',
        zoom: {
            enabled: true,
            duration: 300
        }
    });

});


//Select2 basic example
$(".mySelectPicker").select2({
    placeholder: "Select",
    allowClear: true
});

//Default datepicker example
$('.datepicker').datepicker({
    todayHighlight: true,
    format: "yyyy-mm-dd"
});


// change status custom code
$('.brand-on-change').on('change', "#brand-status", function () {
    var id = $(this).data("id");
    if (this.checked) {
        var myStatus = 'active';
    } else {
        var myStatus = 'inactive';
    }

    $('.cm-loader').show();
    $.ajax({
        url: "update-status/" + id + '/' + myStatus,
        method: 'get',
        success: function (result) {
            $('.cm-loader').hide();
            console.log(result)
        }
    });
});
// category change status
$('.category-on-change').on('change', "#category-status", function () {
    var id = $(this).data("id");
    if (this.checked) {
        var myStatus = 'active';
    } else {
        var myStatus = 'inactive';
    }

    $('.cm-loader').show();
    $.ajax({
        url: "update-status/" + id + '/' + myStatus,
        method: 'get',
        success: function (result) {
            $('.cm-loader').hide();
            console.log(result)
        }
    });
});

// sub category change status
$('.subcategory-on-change').on('change', "#subcategory-status", function () {
    var id = $(this).data("id");
    if (this.checked) {
        var myStatus = 'active';
    } else {
        var myStatus = 'inactive';
    }

    $('.cm-loader').show();
    $.ajax({
        url: "update-status/" + id + '/' + myStatus,
        method: 'get',
        success: function (result) {
            $('.cm-loader').hide();
            console.log(result)
        }
    });
});

// slider category change status


$('.product-on-change').on('change', "#product-status", function () {
    var id = $(this).data("id");
    if (this.checked) {
        var myStatus = 'active';
    } else {
        var myStatus = 'inactive';
    }

    $('.cm-loader').show();
    $.ajax({
        url: "update-status/" + id + '/' + myStatus,
        method: 'get',
        success: function (result) {
            $('.cm-loader').hide();
            console.log(result)
        }
    });
});

// dashboard price update with ajax
$('.price-input').blur(function () {
    var id = $(this).data('product-id');
    var price = $(this).val();

    $('.cm-loader').show();
    $.ajax({
        url: "price-update/"  + id + '/' + price,
        method: 'get',
        success: function (result) {
            $('.cm-loader').hide();
            console.log(result)
        }
    });

})
