<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Clemens" >

    <title>MI Homecontroller</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-1.4.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <!--<script src="js/bootstrap.min.js"></script>-->

    <script>
        function change_status(id, setto) {
            $.get("ajax.php", {ID: id, setto: setto});
        }

        function start_gui() {
            $.get("ajax.php", {GUI: "start"});
        }

        function change_status_X(id, setto) {
            $.ajax({type: "POST", url: "ajax.php", data: {ID: id, setto: setto}, dataType: "text/plain"});
            alert("Hi");
        }
        
        function connection_test() {
            $.ajax({url: "http://" + window.location.hostname,
                type: "HEAD",
                timeout:1000,
                statusCode: {
                    200: function (response) {
                        alert('Working!');
                    },
                    400: function (response) {
                        alert('Not working!');
                    },
                    0: function (response) {
                        alert('Not working!');
                    }
                }
           });
        }
        
        var connection_counter = 0;
        var max_connection_value = 3;
        
        function checkConnection() {
            $.ajax({url: "http://" + window.location.hostname,
                type: "HEAD",
                timeout:1000,
                statusCode: {
                    200: function (response) {
                        connection_counter = 0;
                    },
                    400: function (response) {
                        if (connection_counter < max_connection_value) {
                            connection_counter = connection_counter + 1;
                        }
                    },
                    0: function (response) {
                        if (connection_counter < max_connection_value) {
                            connection_counter = connection_counter + 1;
                        }
                    }
                }
           });
        }
        
        function showMenu() {
            if (connection_counter < max_connection_value && $('#controlMenu').is(":visible") !== true) {
                $('#controlMenu').fadeIn();
            }
            else if (connection_counter >= max_connection_value && $('#controlMenu').is(":visible")) {
                $('#controlMenu').fadeOut();
            }
        }
        
        function showError() {
            if ($('#controlMenu').is(":visible") && $('#error').is(":visible")) {
                $('#error').fadeOut();
            }
            else if ($('#controlMenu').is(":visible") !== true && $('#error').is(":visible") !== true) {
                $('#error').fadeIn();
            }
        }
        
        function showConnection() {
            $("#connection").css("width", (100/max_connection_value)*(max_connection_value-connection_counter)+"%");
        }
        
        function updateQueue() {
            checkConnection();
            showConnection();
            showMenu();
            showError();
        }
        
        setInterval(function(){ updateQueue(); }, 1000);
    </script>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="?">MI Homecontroller</a>
            </div>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="clo-lg-12">
                <div class="progress progress-striped active">
                    <div id="connection" class="progress-bar progress-bar-success" style="width: 100%;"></div>
                </div>
            </div>
        </div>
        <div id="controlMenu">
        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Alle Steckdosen</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Steckdose 1</h3>
                        <p></p>
                        <p>
                            <button onclick="change_status(0,'an');" class="btn btn-success">an</button> <span onclick="change_status(0,'aus');" class="btn btn-danger">aus</span>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Steckdose 2</h3>
                        <p></p>
                        <p>
                            <button onclick="change_status(1,'an');" class="btn btn-success">an</button> <button onclick="change_status(1,'aus');" class="btn btn-danger">aus</button>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Steckdose 3</h3>
                        <p></p>
                        <p>
                            <button onclick="change_status(2,'an');" class="btn btn-success">an</button> <button onclick="change_status(2,'aus');" class="btn btn-danger">aus</button>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Steckdose 4</h3>
                        <p></p>
                        <p>
                            <button onclick="change_status(3,'an');" class="btn btn-success">an</button> <button onclick="change_status(3,'aus');" class="btn btn-danger">aus</button>
                        </p>
                    </div>
                </div>
            </div>
            

        </div>
        
        <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Steckdose 5</h3>
                        <p></p>
                        <p>
                            <button onclick="change_status(4,'an');" class="btn btn-success">an</button> <button onclick="change_status(4,'aus');" class="btn btn-danger">aus</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row text-center">

            <div class="col-md-12 col-sm-12 hero-feature">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Alle Steckdosen</h3>
                        <p></p>
                        <p>
                            <button onclick="change_status('alle','an');" class="btn btn-success">an</button> <button onclick="change_status('alle','aus');" class="btn btn-danger">aus</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        </div>
        
        <div id="error">
        <div class="row">
            <div class="col-lg-12 hero-feature">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Die Steckdose ist nicht erreichbar.</h3>
                        <p></p>
                        <p>
                             Bitte prüfe, ob an dieses Gerät und die Steckdose mit dem selben Netzwerk verbunden ist.
                             <br>
                             Sollte das Problem weiterhin bestehen, beachte bitte, dass viele Clients eine hohe Last erzeugen und deshalb nicht alle gleichzeitig bedient werden können.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        </div>


        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <a href="http://milchinsel.de">milchinsel.de</a> 2016-2017</p>
                </div>
            </div>
        </footer>
    
    </div>
    <!-- /.container -->

</body>

</html>
