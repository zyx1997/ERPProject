
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ERP管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <script type="text/javascript" src="http://localhost/projectERP/assets/js/jquery.min.js"></script>

   <!--  <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="http://localhost/projectERP/assets/css/loader-style.css">
    <link rel="stylesheet" href="http://localhost/projectERP/assets/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/projectERP/assets/css/signin.css">






    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/minus.png">
</head>

<body> 

    
    <div class="container">

		<?php $error = $this->Flash->render('error_login'); ?>
		<div id="logo-login" style="text-align:center;<?php if(!$error){echo "padding:0px;";} ?>">
			<h1><?= $error ?></h1>
		</div>
        <div class="" id="login-wrapper">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div id="logo-login">
                        <h1 style="font-size:25px">ERP管理系统
                        </h1>
                    </div>
                </div>

            </div>
			<?= $this->fetch('content') ?>
            
        </div>

    </div>



    <!--  END OF PAPER WRAP -->




    <!-- MAIN EFFECT -->
    <script type="text/javascript" src="http://localhost/projectERP/assets/js/preloader.js"></script>
    <script type="text/javascript" src="http://localhost/projectERP/assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="http://localhost/projectERP/assets/js/app.js"></script>
    <script type="text/javascript" src="http://localhost/projectERP/assets/js/main.js"></script>





</body>

</html>

