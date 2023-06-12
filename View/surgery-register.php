<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <link rel="icon" type="image/x-icon" href="../Components/SVG/favicon-16x16.png">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/surgery-register.css'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

    <!-- --------------- Menu Sidebar --------------- -->

    <?php
        include ('./sidebar.html')
   ?>

    <!-- --------------- Conteudo Principal --------------- -->

    <section class="home">
        <div class="title">
            <div class="back"><a href="./select-register.php"><img src="../Components/SVG/arrow-r.svg" alt=""></a></div>
            <div class="stick"></div>
            <div class="text-menu">Cadastro</div>
        </div>
        <div class="text-h2">Cirurgia</div>

        <div class="content-form">

    <!-- --------------- InputFields --------------- -->

                <form method="POST" action="../php/PostSurgery.php" class="form">

                    <div class="flex-content">
                        <label for="nome" class="label-form">Nome do Tipo de Cirurgia <span>*</span></label>
                        <input type="text" name="nome" id="nome" required placeholder="Ex.: Urologia" class="input-form-wd">
                    </div>

                    <div class="flex-content">
                        <label class="label-form"   for="descricao">Descrição <span>*</span></label>
                        <textarea type="text" name="descricao" id="descricao" required placeholder="Ex.: Ex.: Urologia é uma especialidade cirúrgica da medicina que trata do trato urinário de homens e..." class="input-form-wd"></textarea>
                    </div>

                    <div class="btn-form"><button type="submit" class="btn-submit">Salvar</button></div>
                
                </form>
                  
        </div>

    </section>

</body>
</html>