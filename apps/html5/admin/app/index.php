<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" data-ng-app="myApp" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" data-ng-app="myApp" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" data-ng-app="myApp" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" data-ng-app="myApp" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ILIAS REST Plugin - Administration</title>

    <link rel="stylesheet" href="libs/css/normalize.css">
    <link rel="stylesheet" href="libs/css/animate.css">
    <link rel="stylesheet" href="libs/css/bootstrap.css">
    <link rel="stylesheet" href="libs/css/bootstrap-theme.css">
    <link rel="stylesheet" href="libs/css/html5-boilerplate.css">
    <link rel="stylesheet" href="libs/css/angular-loading-bar.css">
    <link rel="stylesheet" href="libs/css/angular-xeditable.css">
    
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/loginadmin.css"/>

    <script type="text/javascript" src="libs/js/modernizr.js"></script>
    <script>
        var postvars = {
            user_id : "<?php echo $_POST['user_id']; ?>",
            session_id : "<?php echo $_POST['session_id']; ?>",
            rtoken : "<?php echo $_POST['rtoken']; ?>",
            inst_folder : "<?php echo $_POST['inst_folder']; ?>"
        };
    </script>
</head>
<body data-ng-controller="defaultCtrl">
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    
    <div class="main_div">
        <nav role="navigation" class="navbar navbar-default">
            <a href="#" class="navbar-brand">ILIAS REST Plugin > Clients Administration</a>
            <p data-ng-show="isAuthenticated()" class="navbar-text ">Logged in as {{getUsername()}}</p>
            <ul class="nav navbar-nav navbar-right">
                <li data-ng-show="isAuthenticated()"><a href="#" data-ng-click="logout()">Logout</a></li>
            </ul>
        </nav>
        <div class="{{ pageClass }}" data-ng-view></div>
    </div>
    
    <script src="libs/js/jquery.js"></script>
    <script src="libs/js/less.js"></script>
    <script src="libs/js/angular.js"></script>
    <script src="libs/js/angular-animate.js"></script>
    <script src="libs/js/angular-loading-bar.js"></script>
    <script src="libs/js/angular-resource.js"></script>
    <script src="libs/js/angular-route.js"></script>
    <script src="libs/js/angular-ui-bootstrap.js"></script>
    <script src="libs/js/angular-ui-utils.js"></script>
    <script src="libs/js/angular-ui-utils-ieshiv.js"></script>
    <script src="libs/js/angular-xeditable.js"></script>
    
    <script src="js/app.js"></script>
    <script src="js/services.js"></script>
    <script src="js/controllers.js"></script>
    <script src="js/filters.js"></script>
    <script src="js/directives.js"></script>
</body>
</html>
