<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Certificados Tabajaras</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue pace-done">

        <div class="form-box" id="login-box">
            <div class="header bg-light-blue">Entrar</div>
            <form action="inicio.php" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="usuario" class="form-control" placeholder="E-mail"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha" class="form-control" placeholder="Senha"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Lembrar me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-light-blue btn-block">Entrar</button>  
                    
                    <p><a href="#">Esqueci a senha</a></p>
                    
                    <a href="register.html" class="text-center">Registre-se</a>
                </div>
            </form>

            <div class="margin text-center">
                <span>Entrar utilizando outro serviço</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>