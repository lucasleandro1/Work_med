<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <link rel="icon" type="image/x-icon" href="../Components/SVG/favicon-16x16.png">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Selecionar Cadastro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='../css/select-register.css'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>
    <?php
        include ('./sidebar.html')
   ?>

    <section class="home">
        <div class="title">
            <div class="stick"></div>
            <div class="text-menu">Cadastro</div>
        </div>
        <div class="text-h2">Escolha qual item deseja cadastrar.</div>

        <div class="banner">
            <img src="../Components/SVG/banner2.svg" alt="" class="img-bnr">
        </div>
        <div class="content">

            <div class="medic">
                <span class="tx-standard">Cadastrar <span class="tx-med">Médico</span></span>
                <img src="../Components/SVG/medic-list.svg" alt="">
                <a href="./medic-register.php"><button>Começar</button></a>
            </div>
            <div class="patient">
                <span class="tx-standard">Cadastrar <span class="tx-pat">Paciente</span></span>
                <img src="../Components/SVG/patient.svg" alt="">
                <a href="./patient-register.php"><button>Começar</button></a>
            </div>
            <div class="surgery">
                <span class="tx-standard">Cadastrar <span class="tx-sur">Cirurgia</span></span>
                <img src="../Components/SVG/surgery.svg" alt="">
                <a href="surgery-register.php"><button>Começar</button></a>
            </div>
            <div class="room">
                <span class="tx-standard">Cadastrar <span class="tx-rom">Salas</span></span>
                <img src="../Components/SVG/room.svg" alt="">
                <a href="room-register.php"><button type="button">Começar</button></a>
            </div>

        </div>



    </section>















    <script>
        const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");
        toggle.addEventListener("click" , () =>{
            sidebar.classList.toggle("close");
        })
        searchBtn.addEventListener("click" , () =>{
            sidebar.classList.remove("close");
        })

    </script>

</body>
</html>