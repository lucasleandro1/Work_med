<!DOCTYPE html>
<?php
    require_once '../php/patientDao.php';
    $surgeryDAO = new PatientDAO();
    $surgeryNames = $surgeryDAO->SurgeryNames();
    $doctorNames = $surgeryDAO->DoctorNames();
    $roomNames = $surgeryDAO->RoomNames();

?>
<html>
<head>
    <meta charset='utf-8'>
    <link rel="icon" type="image/x-icon" href="../Components/SVG/favicon-16x16.png">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/patient-register.css'>
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
        <div class="text-h2">Pacientes</div>

        <!-- --------------- InputFields --------------- -->
        <div class="content-form">
                <form method="POST" action="../php/PostPatient.php" class="form">
                    <div class="flex-content">
                        <label for="nome" class="label-form">Nome Completo do Paciente <span>*</span></label>
                        <input type="text" name="nome" id="nome" required placeholder="Ex.: João Claudio Custódio" class="input-form-wd">
                    </div>
                    <div class="form-flex">

                        <div class="flex-content">
                            <label class="label-form" for="cpf">CPF <span>*</span></label>
                            <input type="text" name="cpf" id="cpf" required placeholder="Ex.: 123.456.789-00" maxlength="14" class="input-form">
                        </div>

                        <div class="flex-content">
                            <label class="label-form" for="genero">Gênero <span>*</span></label>
                            <select name="genero" id="genero" required class="input-form">
                                <option value="">Selecione uma opção</option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                            </select>
                        </div>
                    </div>
                  
                    <div class="form-flex">
                        <div class="flex-content">
                            <label class="label-form" for="data_nascimento">Data de Nascimento <span>*</span></label>
                            <input type="date" name="data_nascimento" id="data_nascimento" required placeholder="Ex.: 25/07/1986" class="input-form">
                        </div>
                        <div class="flex-content">
                            <label class="label-form" for="celular">Celular <span>*</span></label>
                            <input type="text" name="celular" id="celular" required placeholder="Ex.: (88) 9 9653-3482"maxlength="11" class="input-form">
                        </div>
                    </div>

                    <div class="form-flex">
                        <div class="flex-content">
                            <label class="label-form"   for="endereco">Endereço Completo <span>*</span></label>
                            <input type="text" name="endereco" id="endereco" required placeholder="Ex.: Rua São Paulo, 986" class="input-form">
                        </div>
                        <div class="flex-content">
                            <label class="label-form" for="data_cirurgia">Data da Cirurgia <span>*</span></label>
                            <input type="date" name="data_cirurgia" id="data_cirurgia" required placeholder="Ex.: 25/07/1986" class="input-form">
                        </div>
                    </div>
                    <div class="form-flex">
                        <div class="flex-content">
                            <label class="label-form"   for="sala">Sala utilizada <span>*</span></label>
                            <select name="sala" id="sala" class="input-form">
                            <option disabled selected value="">Escolha uma opção</option>
                                    <?php foreach ($roomNames as $name) { ?>
                                        <option value="<?= $name ?>"><?= $name ?></option>
                                    <?php } ?>
                                </select>
                        </div>
                        <div class="flex-content">
                        <label class="label-form" for="convenio">Convênio <span>*</span></label>
                            <select name="convenio" id="convenio" required class="input-form">
                                <option value="">Selecione uma opção</option>
                                <option value="SUS">Sus</option>
                                <option value="Particular">Particular</option>
                            </select>
                        </div>
                    </div>
                    

                    <div class="text-h3">Procedimento</div>

                    <div class="procedure-flex">

                        <div class="medic-choose">

                            <div class="flex-content">
                                <label class="tx" >Médico Responsável</label>
                                <select name="medico" id="" class="sele-doc">
                                <option disabled selected value="">Escolha uma opção</option>
                                    <?php foreach ($doctorNames as $name) { ?>
                                        <option value="<?= $name ?>"><?= $name ?></option>
                                    <?php } ?>
                                </select>

                               
                            </div>

                            <div class="flex-content">
                                <label class="tx" for="gastos">Total Gasto</label>
                                <input type="text" name="gastos" id="gastos" placeholder="Ex: 258,43" class="gastos">
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


                    <div class="btn-form"><button type="submit" class="btn-submit">Salvar</button></div>
                  </form>
                  
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
           

    </script>

</body>
</html>