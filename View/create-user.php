<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="../Components/SVG/favicon-16x16.png">
    <meta charset="UTF-8">
    <title>WorkMed</title>
    <link rel="stylesheet" type="text/css" href="../css/create-user.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    
</head>
<body>
<!-- -------------/ Full Body /--------------- -->


<!-- -------------/ Div Mãe do login /--------------- -->
    <div class="login">

<!--  -------------/ Banner Do Login /---------------  -->
        <div class="login-banner">
           <img src="../Components/SVG/WORKMED.svg" class="img-name">
            <img src="../Components/SVG/hospital.svg" class="img-svg">
            <span class="ex">
            <h1>Gerencie seu Hospital</h1>
            <p class="p-banner">
                Descubra a eficiência do nosso site de gerenciamento hospitalar.
                 Simplifique o controle de médicos, cirurgias, salas, gastos e convênios. Otimize
                  seu tempo e tome decisões informadas com facilidade.
            </p>
        </span>
        </div>

<!---------------/ Formulário Login /----------------->

        <div class="login-form">
            
            <div class="text-login">
                <h2>Cadastro De Usuário</h2>
                <p>Cadastre para ter acesso a sua <span>dasboard</span>.</p>
            </div>
            <div class="form-group">
                <form action="../php/PostSuperuser.php" method="POST">
                    <div class="form-input">
                        <label class="user-input">
                            <i class="icon-user"></i>
                            <input name="user" type="text" placeholder="Usuário" >
                        </label>

                        <label class="pass-input">
                            <i class="icon-pass"></i>
                            <input type="password" name="pass"  placeholder="Senha"> 
                        </label>
                        <div class="btn-form">
                            <button type="submit" class="btn-submit">Cadastrar</button>
                        </div>
                    </div>
                </form>
                

            </div>

        </div>

    </div>








</body>
</html>