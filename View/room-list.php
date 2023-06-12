<!DOCTYPE html>
<?php
    require_once '../php/roomDao.php';
    $roomDAO = new RoomDAO();
    $rooms = $roomDAO->read();
?>
<html>
<head>
    <meta charset='utf-8'>
    <link rel="icon" type="image/x-icon" href="../Components/SVG/favicon-16x16.png">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/room-list.css'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>
    
    <!-- --------------- Menu Sidebar --------------- -->

    <?php
        include ('./sidebar-room.html')
   ?>

    <!-- --------------- Conteudo Principal --------------- -->

    <section class="home">
        <div class="title">
            <div class="back"><a href="./select-list.php"><img src="../Components/SVG/arrow-a.svg" alt=""></a></div>
            <div class="stick"></div>
            <div class="text-menu">Listagem</div>
        </div>
        <div class="text-h2">Salas</div>
        <div class="btn-cad">
                <a href="./room-register.php"><button class="cad-btn">Cadastrar<img src="../Components/SVG/cadastro.svg" alt="Voltar"></button></a>
        </div>
        <div class="content-form">

            <!-- --------------- InputFields --------------- -->

            <?php foreach ($rooms as $room) { ?>
                <div class="form-flex">
                    <form method="get" action="../php/PostRoom.php" class="form">

                        <details class="list-form">
                        <summary><img src="../Components/SVG/Rectangle azul.svg" class="img-ret" alt=""><img src="../Components/SVG/user azul.svg" class="img-user" alt=""><?= $room->getName() ?></summary>                                           

                            <div class="list-flex">
                                <div class="dados">
                                    <h1>Informações</h1>
                                    <div class="info-container">
                                        <div>   
                                            <div class="info-flex">
                                                <span>Nome Da Sala</span>
                                                <p><?= $room->getName() ?></p>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="info-flex">
                                            <span>Descrição</span>
                                                <p><?= $room->getDescription() ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="especs">
                                    <h1>Detalhes</h1>
                                    <div class="info-container">
                                        <div class="flex-third"> 
                                            <div class="info-flex">
                                                <span>Procedimentos para sala</span>
                                                <p><?= $room->getTypeSurgeries() ?></p>
                                            </div>   
                                            <div class="info-flex">
                                                <span>localização</span>
                                                <p><?= $room->getLocation() ?></p> 
                                            </div> 
                                        </div>   
                                    </div>                     
                                </div>
                            </div>
                        </details>

                    </form>
                    <div class="btn-action">
                            <details class="det-btn">
                                <summary><img src="../Components/SVG/3dot.svg" alt=""></summary>
                                <summary class="flex-img">
                                    <a href="./room-update.php?id=<?= $room->getId() ?>"><img src="../Components/SVG/update az.svg" alt=""     class="btn-u" ></a>
                                    <a  href="../php/deleteRoom.php?id=<?= $room->getId() ?>"><img src="../Components/SVG/delete az.svg" alt=""class="btn-d"></a>
                                </summary>
                            </details>
                        </div>
                </div>
            <?php } ?>

        </div>
    </section>


    <!-- --------------- Sscript do menu Sidebar --------------- -->

    <script>
             
        const cpfInput = document.getElementById('cpf');

        cpfInput.addEventListener('input', function (e) {
        let cpf = e.target.value;

        cpf = cpf.replace(/\D/g, ''); // remove caracteres não numéricos

        if (cpf.length > 0) {
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
        }

        if (cpf.length > 3) {
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
        }

        if (cpf.length > 6) {
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
        }

        e.target.value = cpf;
    });

    const summaries = document.querySelectorAll("summary");

   

    </script>

</body>
</html>