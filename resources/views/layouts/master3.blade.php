<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- title -->
    @yield('title')
    <!-- end title -->

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- linear icons -->
    <link rel="stylesheet" href="{{ asset('/admin/linearicons/WebFont/style.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('header')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.includes._navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.includes._sidebar')

        <!-- Content Wrapper. Contains page content -->


        <!-- Content Wrapper. Contains page content -->
        @yield('content3')
        <!-- /.content-wrapper -->

        @include('layouts.includes._footer-sidebar')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('/admin/dist/js/adminlte.js') }}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('/admin/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admin/dist/js/demo.js') }}"></script>
    <script>
        $(function() {
            'use strict'

            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }

            var mode = 'index'
            var intersect = true

            var $salesChart = $('#sales-chart')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel) !!},
                    datasets: [{
                            backgroundColor: '#252626',
                            borderColor: '#252626',
                            data: {!! json_encode($mapel_last_month) !!}
                        },
                        {
                            backgroundColor: '#007bff',
                            borderColor: '#007bff',
                            data: {!! json_encode($mapel_this_month) !!}
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 100,
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#sales-chart1')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($penilaian_list) !!},
                    datasets: [{
                            backgroundColor: '#252626',
                            borderColor: '#252626',
                            data: {!! json_encode($penilaian_last_month) !!}
                        },
                        {
                            backgroundColor: '#007bff',
                            borderColor: '#007bff',
                            data: {!! json_encode($penilaian_this_month) !!}
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 100,
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#sales-chart2')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($penilaian_list) !!},
                    datasets: [{
                            backgroundColor: '#252626',
                            borderColor: '#252626',
                            data: {!! json_encode($penilaian_last_week) !!}
                        },
                        {
                            backgroundColor: '#007bff',
                            borderColor: '#007bff',
                            data: {!! json_encode($penilaian_this_week) !!}
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 100,
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#sales-chart3')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel) !!},
                    datasets: [{
                            backgroundColor: '#252626',
                            borderColor: '#252626',
                            data: {!! json_encode($mapel_last_week) !!}
                        },
                        {
                            backgroundColor: '#007bff',
                            borderColor: '#007bff',
                            data: {!! json_encode($mapel_this_week) !!}
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 100,
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $visitorsChart = $('#visitors-chart')
            var visitorsChart = new Chart($visitorsChart, {
                data: {
                    labels: {!! json_encode($matpel) !!},
                    datasets: [{
                            type: 'line',
                            data: {!! json_encode($mapel_last_week) !!},
                            backgroundColor: '#007bff',
                            borderColor: '#007bff',
                            pointBorderColor: '#007bff',
                            pointBackgroundColor: '#007bff',
                            fill: false
                            // pointHoverBackgroundColor: '#007bff',
                            // pointHoverBorderColor    : '#007bff'
                        },
                        {
                            type: 'line',
                            data: {!! json_encode($mapel_this_week) !!},
                            backgroundColor: '#252626',
                            borderColor: '#252626',
                            pointBorderColor: '#252626',
                            pointBackgroundColor: '#252626',
                            fill: false
                            // pointHoverBackgroundColor: '#252626',
                            // pointHoverBorderColor    : '#252626'
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 100
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $visitorsChart = $('#visitors-chart1')
            var visitorsChart = new Chart($visitorsChart, {
                data: {
                    labels: {!! json_encode($matpel) !!},
                    datasets: [{
                            type: 'line',
                            data: {!! json_encode($mapel_this_week) !!},
                            backgroundColor: '#007bff',
                            borderColor: '#007bff',
                            pointBorderColor: '#007bff',
                            pointBackgroundColor: '#007bff',
                            fill: false
                            // pointHoverBackgroundColor: '#007bff',
                            // pointHoverBorderColor    : '#007bff'
                        },
                        {
                            type: 'line',
                            data: {!! json_encode($mapel_last_week) !!},
                            backgroundColor: 'tansparent',
                            borderColor: '#252626',
                            pointBorderColor: '#252626',
                            pointBackgroundColor: '#252626',
                            fill: false
                            // pointHoverBackgroundColor: '#252626',
                            // pointHoverBorderColor    : '#252626'
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 100
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })
        })
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>
</body>

</html>
