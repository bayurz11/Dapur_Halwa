<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png" sizes="16x16">
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="assets/css/remixicon.css">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="assets/css/lib/bootstrap.min.css">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="assets/css/lib/apexcharts.css">
    <!-- Data Table css -->
    <link rel="stylesheet" href="assets/css/lib/dataTables.min.css">
    <!-- Text Editor css -->
    <link rel="stylesheet" href="assets/css/lib/editor-katex.min.css">
    <link rel="stylesheet" href="assets/css/lib/editor.atom-one-dark.min.css">
    <link rel="stylesheet" href="assets/css/lib/editor.quill.snow.css">
    <!-- Date picker css -->
    <link rel="stylesheet" href="assets/css/lib/flatpickr.min.css">
    <!-- Calendar css -->
    <link rel="stylesheet" href="assets/css/lib/full-calendar.css">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="assets/css/lib/jquery-jvectormap-2.0.5.css">
    <!-- Popup css -->
    <link rel="stylesheet" href="assets/css/lib/magnific-popup.css">
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="assets/css/lib/slick.css">
    <!-- prism css -->
    <link rel="stylesheet" href="assets/css/lib/prism.css">
    <!-- file upload css -->
    <link rel="stylesheet" href="assets/css/lib/file-upload.css">
    <!-- Data Table css -->
    <link rel="stylesheet" href="assets/css/lib/dataTables.min.css" />

    <link rel="stylesheet" href="assets/css/lib/audioplayer.css">
    <!-- main css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.css" rel="stylesheet">
    @stack('styles')
</head>

<body>
    @include('partials.sidebar')


    <main class="dashboard-main">



        @include('partials.navbar')
        <div class="dashboard-main-body">
            @yield('content')
        </div>
        {{-- <footer class="d-footer">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <p class="mb-0">© 2024 WowDash. All Rights Reserved.</p>
                </div>
                <div class="col-auto">
                    <p class="mb-0">Made by <span class="text-primary-600">wowtheme7</span></p>
                </div>
            </div>
        </footer> --}}

        {{-- Success Alert --}}
        @if (session('success'))
            <div id="successAlert" class="alert alert-success position-fixed top-0 end-0 m-4 shadow fade show"
                role="alert" style="z-index: 1055; min-width: 300px;">
                <div class="d-flex justify-content-between align-items-center">
                    <span>{{ session('success') }}</span>
                    <button type="button" class="btn-close ms-3" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        {{-- Error Alert --}}
        @if (session('error'))
            <div id="errorAlert" class="alert alert-danger position-fixed top-0 end-0 m-4 shadow fade show"
                role="alert" style="z-index: 1055; min-width: 300px;">
                <div class="d-flex justify-content-between align-items-center">
                    <span>{{ session('error') }}</span>
                    <button type="button" class="btn-close ms-3" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        {{-- Auto dismiss --}}
        <script>
            setTimeout(function() {
                const successAlert = document.getElementById('successAlert');
                if (successAlert) {
                    successAlert.classList.remove('show');
                    successAlert.classList.add('fade');
                    setTimeout(() => successAlert.remove(), 300);
                }

                const errorAlert = document.getElementById('errorAlert');
                if (errorAlert) {
                    errorAlert.classList.remove('show');
                    errorAlert.classList.add('fade');
                    setTimeout(() => errorAlert.remove(), 300);
                }
            }, 3000);
        </script>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- jQuery library js -->
    <script src="assets/js/lib/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Apex Chart js -->
    <script src="assets/js/lib/apexcharts.min.js"></script>
    <!-- Data Table js -->
    <script src="assets/js/lib/dataTables.min.js"></script>
    <!-- Iconify Font js -->
    <script src="assets/js/lib/iconify-icon.min.js"></script>
    <!-- jQuery UI js -->
    <script src="assets/js/lib/jquery-ui.min.js"></script>
    <!-- Vector Map js -->
    <script src="assets/js/lib/jquery-jvectormap-2.0.5.min.js"></script>
    <script src="assets/js/lib/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Popup js -->
    <script src="assets/js/lib/magnifc-popup.min.js"></script>
    <!-- Slick Slider js -->
    <script src="assets/js/lib/slick.min.js"></script>
    <!-- prism js -->
    <script src="assets/js/lib/prism.js"></script>
    <!-- file upload js -->
    <script src="assets/js/lib/file-upload.js"></script>
    <!-- audioplayer -->
    <script src="assets/js/lib/audioplayer.js"></script>

    <!-- Data Table js -->
    <script src="assets/js/lib/dataTables.min.js"></script>

    <!-- main js -->
    <script src="assets/js/app.js"></script>
    @stack('scripts')
    <script>
        let table = new DataTable("#dataTable");
    </script>
    <script>
        // ===================== Revenue Chart Start =============================== 
        function createChartTwo(chartId, color1, color2) {
            var options = {
                series: [{
                    name: 'series1',
                    data: [6, 20, 15, 48, 28, 55, 28, 52, 25, 32, 15, 25]
                }, {
                    name: 'series2',
                    data: [0, 8, 4, 36, 16, 42, 16, 40, 12, 24, 4, 12]
                }],
                legend: {
                    show: false
                },
                chart: {
                    type: 'area',
                    width: '100%',
                    height: 150,
                    toolbar: {
                        show: false
                    },
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3,
                    colors: [color1, color2], // Use two colors for the lines
                    lineCap: 'round'
                },
                grid: {
                    show: true,
                    borderColor: '#D1D5DB',
                    strokeDashArray: 1,
                    position: 'back',
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    yaxis: {
                        lines: {
                            show: true
                        }
                    },
                    row: {
                        colors: undefined,
                        opacity: 0.5
                    },
                    column: {
                        colors: undefined,
                        opacity: 0.5
                    },
                    padding: {
                        top: -20,
                        right: 0,
                        bottom: -10,
                        left: 0
                    },
                },
                fill: {
                    type: 'gradient',
                    colors: [color1, color2], // Use two colors for the gradient
                    // gradient: {
                    //     shade: 'light',
                    //     type: 'vertical',
                    //     shadeIntensity: 0.5,
                    //     gradientToColors: [`${color1}`, `${color2}00`], // Bottom gradient colors with transparency
                    //     inverseColors: false,
                    //     opacityFrom: .6,
                    //     opacityTo: 0.3,
                    //     stops: [0, 100],
                    // },
                    gradient: {
                        shade: 'light',
                        type: 'vertical',
                        shadeIntensity: 0.5,
                        gradientToColors: [undefined, `${color2}00`], // Apply transparency to both colors
                        inverseColors: false,
                        opacityFrom: [0.4, 0.6], // Starting opacity for both colors
                        opacityTo: [0.3, 0.3], // Ending opacity for both colors
                        stops: [0, 100],
                    },
                },
                // markers: {
                //     colors: [color1, color2], // Use two colors for the markers
                //     strokeWidth: 3,
                //     size: 0,
                //     hover: {
                //         size: 10
                //     }
                // },

                markers: {
                    colors: [color1, color2],
                    strokeWidth: 2,
                    size: 0,
                    hover: {
                        size: 8
                    }
                },

                xaxis: {
                    labels: {
                        show: false
                    },
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    tooltip: {
                        enabled: false
                    },
                    labels: {
                        formatter: function(value) {
                            return value;
                        },
                        style: {
                            fontSize: "14px"
                        }
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return "$" + value + "k";
                        },
                        style: {
                            fontSize: "14px"
                        }
                    },
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
            chart.render();
        }

        createChartTwo('revenueChart', '#CD20F9', '#6593FF');
        // ===================== Revenue Chart End =============================== 

        // ================================ Bar chart Start ================================ 
        var options = {
            series: [{
                name: "Sales",
                data: [{
                    x: 'Sun',
                    y: 15,
                }, {
                    x: 'Mon',
                    y: 12,
                }, {
                    x: 'Tue',
                    y: 18,
                }, {
                    x: 'Wed',
                    y: 20,
                }, {
                    x: 'Thu',
                    y: 13,
                }, {
                    x: 'Fri',
                    y: 16,
                }, {
                    x: 'Sat',
                    y: 6,
                }]
            }],
            chart: {
                type: 'bar',
                height: 200,
                toolbar: {
                    show: false
                },
            },
            plotOptions: {
                bar: {
                    borderRadius: 6,
                    horizontal: false,
                    columnWidth: 24,
                    columnWidth: '40%',
                    endingShape: 'rounded',
                }
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'gradient',
                colors: ['#dae5ff'], // Set the starting color (top color) here
                gradient: {
                    shade: 'light', // Gradient shading type
                    type: 'vertical', // Gradient direction (vertical)
                    shadeIntensity: 0.5, // Intensity of the gradient shading
                    gradientToColors: ['#dae5ff'], // Bottom gradient color (with transparency)
                    inverseColors: false, // Do not invert colors
                    opacityFrom: 1, // Starting opacity
                    opacityTo: 1, // Ending opacity
                    stops: [0, 100],
                },
            },
            grid: {
                show: false,
                borderColor: '#D1D5DB',
                strokeDashArray: 4, // Use a number for dashed style
                position: 'back',
                padding: {
                    top: -10,
                    right: -10,
                    bottom: -10,
                    left: -10
                }
            },
            xaxis: {
                type: 'category',
                categories: ['2hr', '4hr', '6hr', '8hr', '10hr', '12hr', '14hr']
            },
            yaxis: {
                show: false,
            },
        };

        var chart = new ApexCharts(document.querySelector("#barChart"), options);
        chart.render();
        // ================================ Bar chart End ================================ 

        // ================================ J Vector Map Start ================================ 

        // ================================ J Vector Map End ================================ 


        // ================================ Users Overview Donut chart Start ================================ 
        var options = {
            series: [500, 500, 500],
            colors: ['#FF9F29', '#487FFF', '#45B369'],
            labels: ['Active', 'New', 'Total'],
            legend: {
                show: false
            },
            chart: {
                type: 'donut',
                height: 270,
                sparkline: {
                    enabled: true // Remove whitespace
                },
                margin: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            },
            stroke: {
                width: 0,
            },
            dataLabels: {
                enabled: false
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
        };

        var chart = new ApexCharts(document.querySelector("#userOverviewDonutChart"), options);
        chart.render();
        // ================================ Users Overview Donut chart End ================================ 
    </script>


</body>

</html>
