
<!DOCTYPE html>
<?php
    require_once '../php/surgeryDao.php';
    require_once '../php/medicDAO.php';
    $doctorDAO = new MedicDAO();
    $doctorId = $_GET['id'];
    $doctor = $doctorDAO->getMedicById($doctorId);
    $surgeryDAO = new SurgeryDAO();
    $surgeryNames = $surgeryDAO->SurgeryNames();
?>
<html>
    <head>
        <meta charset='utf-8'>
        <link rel="icon" type="image/x-icon" href="../Components/SVG/favicon-16x16.png">
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Dashboard</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='../css/medic-register.css'>
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    </head>
<body>
    
    <!-- --------------- Menu Sidebar --------------- -->

    <?php
        include ('./sidebar-med.html')
   ?>

    <!-- --------------- Conteudo Principal --------------- -->

    <section class="home">
        <div class="title">
            <div class="back"><a href="./medic-list.php"><img src="../Components/SVG/arrow-v.svg" alt=""></a></div>
            <div class="stick"></div>
            <div class="text-menu">Editar</div>
        </div>
        <div class="text-h2">Médico</div>

        <div class="content-form">

            <!-- --------------- InputFields --------------- -->

                <form method="POST" action="../php/PostMedicUpdate.php?id=<?= $doctorId ?>" class="form">

                    <div class="flex-content">
                        <label for="nome" class="label-form">Nome Completo <span>*</span></label>
                        <input  type="text" name="nome" id="nome" required   value="<?= $doctor->getName() ?>" placeholder="Ex.: João Claudio Custódio" class="input-form-wd">
                    </div>

                    <div class="form-flex">

                        <div class="flex-content">
                            <label  class="label-form" for="especialidade">Especialidade Médica <span>*</span></label>
                            <select name="especialidade" id="especialidade" class="input-form">
                                <option disabled selected value="">Escolha uma opção</option>
                                    <?php foreach ($surgeryNames as $name) { ?>
                                        <option value="<?= $name ?>"><?= $name ?></option>
                                    <?php } ?>
                                </select>
                        </div>

                        <div class="flex-content">
                            <label class="label-form" for="genero">Gênero <span>*</span></label>
                            <select name="genero" id="genero" required class="input-form">
                                <option value="">Selecione uma opção</option>
                                <option value="masculino" <?= ($doctor->getGen() === 'masculino') ? 'selected' : '' ?>>Masculino</option>
                                <option value="feminino" <?= ($doctor->getGen() === 'feminino') ? 'selected' : '' ?>>Feminino</option>
                            </select>
                        </div>

                    </div>
                  
                    <div class="form-flex">

                        <div class="flex-content">
                            <label class="label-form" for="crm">CRM <span>*</span></label>
                            <input type="text" name="crm" oninput="formatar_crm(this)" value="<?= $doctor->getCrm() ?>" maxlength="9" id="crm" required placeholder="Ex.: 123456-CE" class="input-form">
                        </div>

                        <div class="flex-content">
                            <label class="label-form" for="celular">Celular <span>*</span></label>
                            <input type="text" name="celular" id="celular" required value="<?= $doctor->getNum() ?>" placeholder="Ex.: (88) 9 9653-3482" maxlength="11" class="input-form">
                        </div>

                    </div>

                    <div class="form-flex">

                        <div class="flex-content">
                            <label class="label-form" for="cpf">CPF <span>*</span></label>
                            <input type="text" name="cpf" id="cpf" required value="<?= $doctor->getCpf() ?>" placeholder="Ex.: 123.456.789-00" maxlength="14" class="input-form">
                        </div>
                        <div class="flex-content">
                            <label class="label-form" for="data_nascimento">Data de Nascimento <span>*</span></label>
                            <input type="date" name="data_nascimento" id="data_nascimento" value="<?= $doctor->getDate() ?>" required placeholder="Ex.: 25/07/1986" class="input-form">
                        </div>

                    </div>

                    <div class="flex-content">
                        <label class="label-form"   for="endereco">Endereço <span>*</span></label>
                        <input type="text" name="endereco" id="endereco" required value="<?= $doctor->getAdr() ?>" placeholder="Ex.: Rua São Paulo, 986" class="input-form-wd">
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