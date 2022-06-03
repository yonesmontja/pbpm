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
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('header')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.includes._navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.includes._sidebar')

        <!-- Content Wrapper. Contains page content -->

        <!-- Content Wrapper. Contains page content -->
        @yield('content2')
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        @include('layouts.includes._footer-main')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/admin/dist/js/adminlte.js') }}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('/admin/dist/js/demo.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('/admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('/admin/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <!-- <script src="{{ asset('/admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>-->
    <script src="{{ asset('/admin/plugins/jquery-mapael/maps/pegubin.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('/admin/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/js/Chart.js') }}"></script>
    <!-- PAGE SCRIPTS -->
    <script>
        $(function() {

            'use strict'

            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //-----------------------
            //- MONTHLY SALES CHART -
            //-----------------------

            // Get context with jQuery - using jQuery's .get() method.
            var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

            var salesChartData = {
                labels: {!! json_encode($label) !!},
                datasets: [{
                        label: 'Kelas 1',
                        backgroundColor: 'rgba(237, 250, 0, 0.15)',
                        borderColor: 'rgba(237, 250, 0, 1)',
                        pointRadius: true,
                        pointColor: 'rgba(237, 250, 0, 1)',
                        pointStrokeColor: 'rgba(237, 250, 0, 1)',
                        pointHighlightFill: 'rgba(237, 250, 0, 1)',
                        pointHighlightStroke: 'rgba(237, 250, 0, 1)',
                        data: {!! json_encode($chart_nilai1) !!}
                    },
                    {
                        label: 'Kelas 2',
                        backgroundColor: 'rgba(0, 250, 28, 0.15)',
                        borderColor: 'rgba(0, 250, 28, 1)',
                        pointRadius: true,
                        pointColor: 'rgba(0, 250, 28, 1)',
                        pointStrokeColor: 'rgba(0, 250, 28, 1)',
                        pointHighlightFill: 'rgba(0, 250, 28, 1)',
                        pointHighlightStroke: 'rgba(0, 250, 28, 1)',
                        data: {!! json_encode($chart_nilai2) !!}
                    },
                    {
                        label: 'Kelas 3',
                        backgroundColor: 'rgba(0, 250, 247, 0.15)',
                        borderColor: 'rgba(0, 250, 247, 1)',
                        pointRadius: true,
                        pointColor: 'rgba(0, 250, 247, 1)',
                        pointStrokeColor: 'rgba(0, 250, 247, 1)',
                        pointHighlightFill: 'rgba(0, 250, 247, 1)',
                        pointHighlightStroke: 'rgba(0, 250, 247, 1)',
                        data: {!! json_encode($chart_nilai3) !!}
                    },
                    {
                        label: 'Kelas 4',
                        backgroundColor: 'rgba(0, 8, 250, 0.15)',
                        borderColor: 'rgba(0, 8, 250, 1)',
                        pointRadius: true,
                        pointColor: 'rgba(0, 8, 250, 1)',
                        pointStrokeColor: 'rgba(0, 8, 250, 1)',
                        pointHighlightFill: 'rgba(0, 8, 250, 1)',
                        pointHighlightStroke: 'rgba(0, 8, 250, 1)',
                        data: {!! json_encode($chart_nilai4) !!}
                    },
                    {
                        label: 'Kelas 5',
                        backgroundColor: 'rgba(246, 25, 193, 0.15)',
                        borderColor: 'rgba(246, 25, 193, 1)',
                        pointRadius: true,
                        pointColor: 'rgba(246, 25, 193, 1)',
                        pointStrokeColor: 'rgba(246, 25, 193, 1)',
                        pointHighlightFill: 'rgba(246, 25, 193, 1)',
                        pointHighlightStroke: 'rgba(246, 25, 193, 1)',
                        data: {!! json_encode($chart_nilai5) !!}
                    },
                    {
                        label: 'Kelas 6',
                        backgroundColor: 'rgba(158, 0, 250, 0.15)',
                        borderColor: 'rgba(158, 0, 250, 1)',
                        pointRadius: true,
                        pointColor: 'rgba(158, 0, 250, 1)',
                        pointStrokeColor: 'rgba(158, 0, 250, 1)',
                        pointHighlightFill: 'rgba(158, 0, 250, 1)',
                        pointHighlightStroke: 'rgba(158, 0, 250, 1)',
                        data: {!! json_encode($chart_nilai6) !!}
                    },
                ]
            }

            var salesChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: true
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: true,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: true,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            var salesChart = new Chart(salesChartCanvas, {
                type: 'line',
                data: salesChartData,
                options: salesChartOptions
            })

            //---------------------------
            //- END MONTHLY SALES CHART -
            //---------------------------

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = {
                labels: [
                    'Kelas 1',
                    'Kelas 2',
                    'Kelas 3',
                    'Kelas 4',
                    'Kelas 5',
                    'Kelas 6',
                ],
                datasets: [{
                    data: {!! json_encode($kelas_average) !!},
                    backgroundColor: [
                        '#f56954',
                        '#00a65a',
                        '#f39c12',
                        '#00c0ef',
                        '#3c8dbc',
                        '#d2d6de',
                    ],
                }, ],
            };
            var pieOptions = {
                legend: {
                    display: false
                }
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var pieChart = new Chart(pieChartCanvas, {
                type: 'doughnut',
                data: pieData,
                options: pieOptions
            })
            //-----------------
            var pieChartCanvas = $('#pieChart2').get(0).getContext('2d')
            var pieData = {
                labels: [
                    'Kelas 1',
                    'Kelas 2',
                    'Kelas 3',
                    'Kelas 4',
                    'Kelas 5',
                    'Kelas 6',
                ],
                datasets: [{
                    data: {!! json_encode($kelas_average) !!},
                    backgroundColor: [
                        '#f56954',
                        '#00a65a',
                        '#f39c12',
                        '#00c0ef',
                        '#3c8dbc',
                        '#d2d6de',
                    ],
                }, ],
            };
            var pieOptions = {
                legend: {
                    display: false
                }
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var pieChart = new Chart(pieChartCanvas, {
                type: 'doughnut',
                data: pieData,
                options: pieOptions
            })
            //-----------------
            //- END PIE CHART -
            //-----------------

            /* jVector Maps
             * ------------
             * Create a world map with markers
             */
            $('#world-map-markers').mapael({
                map: {
                    name: 'pegubin',
                    zoom: {
                        enabled: true,
                        maxLevel: 10,
                    },
                },
            });

        })
    </script>
    <script type="text/javascript">
        var ctx = document.getElementById("mataChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($label); ?>,
                datasets: [{
                    label: 'Penilaian',
                    backgroundColor: '#ADD8E6',
                    borderColor: '#93C3D2',
                    data: <?php echo json_encode($jumlah_penilaian); ?>
                }],
                options: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject
                                .numSteps;
                        }
                    }
                }
            },
        });
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
