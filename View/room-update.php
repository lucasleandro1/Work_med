<!DOCTYPE html>
<?php
    require_once '../php/roomDao.php';
    $roomDAO = new RoomDAO();
    $roomId = $_GET['id'];
    $room = $roomDAO->getRoomById($roomId);
    $surgeryNames = $roomDAO->SurgeryNames();

?>
<html>
<head>
    <meta charset='utf-8'>
    <link rel="icon" type="image/x-icon" href="../Components/SVG/favicon-16x16.png">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/room-register.css'>
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
            <div class="stick"></div>
            <div class="text-menu">Cadastro</div>
        </div>
        <div class="text-h2">Salas</div>

        <!-- --------------- InputFields --------------- -->
        <div class="content-form">
                <form method="POST" action="../php/PostRoomUpdate.php?id=<?= $roomId ?>" class="form">

                    <div class="procedure-flex">

                        <div class="room-choose">

                            <div class="flex-content">
                                <label class="tx"  for="name" >Nome da Sala <span>*</span></label>
                                <input name="name" id="" class="name" value="<?= $room->getName() ?>" placeholder="Ex.: Sala 1 ">
                            </div>
                            <div class="flex-content">
                                <label class="tx">Localidade da Sala <span>*</span></label>
                                <input type="text" name="location" id="location" value="<?= $room->getLocation() ?>" placeholder="Ex.: 2° Corredor, 3° Andar" class="locate">
                            </div>

                        </div>

                        <div class="surgery-type">
                            <label class="tx-proc">Tipo de Cirurgia</label>
                            <div class="check-proc">
                                <?php foreach ($surgeryNames as $name) { ?>
                                    <div class="checkbox">
                                        <input type="checkbox" value="<?= $name ?>" name="surgery" id="<?= $name ?>">
                                        <label for="<?= $name ?>"><?= $name ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                    
                    <div class="flex-content">
                        <label class="label-form"   for="description">Descrição <span>*</span></label>
                        <textarea type="text" name="description" id="description" value="<?= $room->getDescription()?>" required placeholder="Ex.: Sala número 2, utilizada para procedimentos cardíacos e pediátrico." class="input-form-wd"></textarea>
                    </div>

                    <div class="btn-form"><button type="submit" class="btn-submit">Salvar</button></div>
                  </form>
                  
        </div>

    </section>

    <!-- --------------- Sscript do menu Sidebar --------------- -->

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