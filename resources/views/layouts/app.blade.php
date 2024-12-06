<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MEDICAL INFO</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{ asset('assets/dist/img/ico/favicon.png') }}" type="image/x-icon">

    <!-- Start Global Mandatory Style -->
    <link href="{{ asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/lobipanel/lobipanel.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/pace/flash.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themify-icons/themify-icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- End Global Mandatory Style -->

    <!-- Start Page Level Plugins -->
    <link href="{{ asset('assets/plugins/toastr/toastr.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/emojionearea/emojionearea.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/monthly/monthly.css') }}" rel="stylesheet" type="text/css" />
    <!-- End Page Level Plugins -->

    <!-- Start Theme Layout Style -->
    <link href="{{ asset('assets/dist/css/stylehealth.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- End Theme Layout Style -->
</head>

<body class="hold-transition sidebar-mini">
    <!-- Navbar -->


    <!-- Main Content -->
    <div class="wrapper">

        <header class="main-header">
            <a href="" class="logo"> <!-- Logo -->
                MEDICAL INFO 1.0
                <!--span class="logo-mini">
                    <img src="{{ asset('assets/dist/img/logo-medical.png') }}" alt="">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/dist/img/logo-medical.png')}}" alt="">
                </span-->
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top ">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-tasks"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Orders -->

                        <!-- Messages -->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="pe-7s-mail"></i>
                                <span class="label label-success">4</span>
                            </a>

                        </li>
                        <!-- Notifications -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="pe-7s-bell"></i>
                                <span class="label label-warning">8</span>
                            </a>
                        </li>
                        <!-- Tasks -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="pe-7s-file"></i>
                                <span class="label label-danger">9</span>
                            </a>

                        </li>
                        <!-- user -->
                        <li class="dropdown dropdown-user admin-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="user-image">
                                    <!-- Icône Font Awesome pour l'avatar -->
                                    <i class="fa fa-user-circle fa-2x"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="profile.html"><i class="fa fa-users"></i> Profil utilisateur</a></li>
                                <li><a href="#"><i class="fa fa-gear"></i> Paramètres</a></li>
                                <!-- Lien de déconnexion avec formulaire POST -->
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                        @csrf
                                        &nbsp;&nbsp;&nbsp;<a href="#" onclick="document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> &nbsp;&nbsp;&nbsp;Déconnexion</a>
                                    </form>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </div>
            </nav>
        </header>

        @include('partials.resume')
        @include('partials.aside')
        {{-- @yield('content') --}}

        <footer class="main-footer">
            <div class="pull-right hidden-xs"> <b>Version</b> 1.0</div>
            <strong>Copyright &copy; 2024-2025 <a href="#">Medical info</a>.</strong> Tous droits réservés.
        </footer>
    </div>






    <script src="{{ asset('assets/plugins/jQuery/jquery-1.12.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/lobipanel/lobipanel.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/fastclick/fastclick.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/dist/js/custom1.js') }}" type="text/javascript"></script>

    <script>
        "use strict"; // Start of use strict
        // notification
        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 1000
            };
            toastr.success('Votre application web de gestion médicale moderne', 'Bienvenue sur Medical info');

        }, 1300);

        //counter
        $('.count-number').counterUp({
            delay: 10,
            time: 5000
        });

        //data maps
        var basic_choropleth = new Datamap({
            element: document.getElementById("map1"),
            projection: 'mercator',
            fills: {
                defaultFill: "#009688",
                authorHasTraveledTo: "#fa0fa0"
            },
            data: {
                USA: { fillKey: "authorHasTraveledTo" },
                JPN: { fillKey: "authorHasTraveledTo" },
                ITA: { fillKey: "authorHasTraveledTo" },
                CRI: { fillKey: "authorHasTraveledTo" },
                KOR: { fillKey: "authorHasTraveledTo" },
                DEU: { fillKey: "authorHasTraveledTo" }
            }
        });

        var colors = d3.scale.category10();

        window.setInterval(function () {
            basic_choropleth.updateChoropleth({
                USA: colors(Math.random() * 10),
                RUS: colors(Math.random() * 100),
                AUS: { fillKey: 'authorHasTraveledTo' },
                BRA: colors(Math.random() * 50),
                CAN: colors(Math.random() * 50),
                ZAF: colors(Math.random() * 50),
                IND: colors(Math.random() * 50)
            });
        }, 2000);

        //bar chart
        var ctx = document.getElementById("barChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [
                    {
                        label: "My First dataset",
                        data: [65, 59, 80, 81, 56, 55, 40, 25, 35, 51, 94, 16],
                        borderColor: "#009688",
                        borderWidth: "0",
                        backgroundColor: "#009688"
                    },
                    {
                        label: "My Second dataset",
                        data: [28, 48, 40, 19, 86, 27, 90, 91, 41, 25, 34, 47],
                        borderColor: "#009688",
                        borderWidth: "0",
                        backgroundColor: "#009688"
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        //radar chart
        var ctx = document.getElementById("radarChart");
        var myChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"],
                datasets: [
                    {
                        label: "My First dataset",
                        data: [65, 59, 66, 45, 56, 55, 40],
                        borderColor: "#00968866",
                        borderWidth: "1",
                        backgroundColor: "rgba(0, 150, 136, 0.35)"
                    },
                    {
                        label: "My Second dataset",
                        data: [28, 12, 40, 19, 63, 27, 87],
                        borderColor: "rgba(55, 160, 0, 0.7",
                        borderWidth: "1",
                        backgroundColor: "rgba(0, 150, 136, 0.35)"
                    }
                ]
            },
            options: {
                legend: {
                    position: 'top'
                },
                scale: {
                    ticks: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Message
        $('.message_inner').slimScroll({
            size: '3px',
            height: '320px'
        });

        //emojionearea
        $(".emojionearea").emojioneArea({
            pickerPosition: "top",
            tonesStyle: "radio"
        });

        //monthly calender
        $('#m_calendar').monthly({
            mode: 'event',
            //jsonUrl: 'events.json',
            //dataType: 'json'
            xmlUrl: 'events.xml'
        });


        //line chart
        var ctx = document.getElementById("lineChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [
                    {
                        label: "My First dataset",
                        borderColor: "rgba(0,0,0,.09)",
                        borderWidth: "1",
                        backgroundColor: "rgba(0,0,0,.07)",
                        data: [22, 44, 67, 43, 76, 45, 12, 45, 65, 55, 42, 61, 73]
                    },
                    {
                        label: "My Second dataset",
                        borderColor: "#009688",
                        borderWidth: "1",
                        backgroundColor: "#009688",
                        pointHighlightStroke: "#009688",
                        data: [16, 32, 18, 26, 42, 33, 44, 24, 19, 16, 67, 71, 65]
                    }
                ]
            },
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                }

            }
        });


    </script>

    <!-- Start Page Level Plugins -->
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/sparkline/sparkline.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datamaps/d3.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datamaps/topojson.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datamaps/datamaps.all.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/counterup/waypoints.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/chartJs/Chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/emojionearea/emojionearea.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/monthly/monthly.js') }}" type="text/javascript"></script>

    <!-- End Page Level Plugins -->

    <!-- Start Theme Layout Script -->
    <script src="{{ asset('assets/dist/js/custom.js') }}" type="text/javascript"></script>
    <!-- End Theme Layout Script -->

    <!-- Notification and other JavaScript functionalities here -->
    <script>
        // Your existing JavaScript code
    </script>

</body>
</html>
