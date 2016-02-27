<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE"/>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>GifAggro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/x-icon" href="favicon.ico"/>
    <link href="public/assets/libs/bootstrap.min.css" rel="stylesheet">
    <link href="public/assets/css/styles.css" rel="stylesheet">
    <link href="public/assets/libs/angular-ui-notification.min.css" rel="stylesheet">
</head>
<body ng-app="gifAggro">
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">GifAggro</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a ui-sref="home">Home</a></li>
                    <li><a ui-sref="list">List</a></li>
                    <li><a ui-sref="add">Add</a></li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>

<div class="container">
    <div ui-view></div>
</div>

<footer>
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <div class="text-center">
                GifAggro &copy;2016
            </div>
    </nav>
</footer>

<!-- All scripts meant to fix IE --><!-- build:js(.) scripts/oldieshim.js --><!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="publicassets/libs/json3.min.js"></script><![endif]--><!-- endbuild -->

<script src="public/assets/libs/angular.min.js"></script>
<script src="public/assets/libs/angular-ui-router.min.js"></script>
<script src="public/assets/libs/angular-ui-notification.min.js"></script>
<script src="public/assets/libs/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="public/assets/libs/bootstrap.min.js"></script>
<script src="public/assets/libs/underscore-min.js"></script>

<!-- Add all application javascript files in this block -->
<script src="public/app/app.module.js"></script>
<script src="public/app/app.routes.js"></script>

<script src="public/app/shared/gifService/gifService.js"></script>
<script src="public/app/shared/filters/imgUrl.js"></script>
<script src="public/app/components/list/list.js"></script>
<script src="public/app/components/add/add.js"></script>
<script src="public/app/components/home/home.js"></script>

</body>
</html>