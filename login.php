<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1"/>
		<title>Log In</title>
		<link rel = "stylesheet" type = "text/css" href = "style.css" />
	</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    LOG IN
                </div>
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form method = "POST" action = "login_query.php">
                            <div class="form-group">
                                <input type="text" placeholder = "USERNAME/EMAIL" name = "username" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder = "PASSWORD" name = "password" class="form-control" i>
                            </div>
                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button class="btn btn-success" name = "login" class="btn btn-outline-primary">LOGIN</button>
                                </div>
                                <br> 
                                <p><a href="http://greeny.cs.tlu.ee/~lisajar/testid/Login/forgot-password.php">Unustasid salaõna?</a> </p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
</body>
</html>