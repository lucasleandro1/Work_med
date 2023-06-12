<!DOCTYPE html>
<?php
require_once '../php/patientDAO.php';
require_once '../php/MedicDao.php';

$medicDAO = new MedicDAO();
$patientDAO = new PatientDAO();
$surgeryData = $patientDAO->getSurgeriesLastThreeMonths();
$doctorNames = $patientDAO->DoctorNames();
$insuranceNames = $patientDAO->InsuranceNames();
$procedimentoData = $patientDAO->getSurgeriesProcedure();
$expenseData = $patientDAO->getExpensesByMonth();


?>

<html>
<head>
    <meta charset='utf-8'>
    <link rel="icon" type="image/x-icon" href="../Components/SVG/favicon-16x16.png">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
   <?php
        include ('./sidebar.html')
   ?>

    <section class="home">
        <div class="title">
            <div class="stick"></div>
            <div class="text-menu">Dashboard</div>
        </div>
        <div class="text-h2">Seja bem vindo(a)!</div>


    <div class="content-form">

        <div class="initial-content">

                    <!---------- Script Medico ------------->

            <div class="start-content" id="medicos">

                <div class="title-m">
                    <span>Médicos</span>
                    <select name="medico" id="medico" class="sel-med">
                    <option disabled selected>Selecione o Convenio</option> 
                        <?php foreach ($doctorNames as $name) { ?>
                            <option value="<?= $name ?>"><?= $name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="content-flex">
                    <div class="name-m">
                        <span id="nomeMedico">Selecione um Médico</span>
                        <p>Total Cirurgias</p>
                    </div>
                    <div class="total-m">
                        <p id="numeroCirurgias">0</p>
                    </div>
                </div>

            </div>

                    <!---------- Script Convenio ------------->

            <div class="start-content" id="convenio">

                <div class="title-c">
                    <span>Convênio</span>
                    <select name="insurance" id="insurance" class="sel-con">
                        <option disabled selected>Selecione o Convenio</option>
                        <?php foreach ($insuranceNames as $name) { ?>
                            <option value="<?= $name ?>"><?= $name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="content-flex">
                    <div class="name-c">
                        <span id="nomeInsurance">Selecione um Convenio</span>
                        <p>Total Cirurgias</p>
                    </div>
                    <div class="total-c">
                        <p id="numeroICirurgias">0</p>
                    </div>
                </div>

            </div>

                    <!---------- Script Informação Geral ------------->

            <div class="start-content" id="day  Info">
                <div class="title-flex">
                    <div class="title-i">
                        <span>Juazeiro Do Norte <img src="../Components/SVG/location.svg" alt=""></span>
                    </div>
                    <div class="total-i">
                        <p>28°</p>
                    </div>
                </div>
                <div class="content-i">   
                    <div class="sur-dia">     
                        <p><?= $patientDAO->getSurgerieToday()?> <span>Cirurgias</span></p>
                        <span>Registradas Hoje</span>
                    </div>
                    <div class="clima">
                        <div>        
                            <p>Está de</p>
                            <h4 id="dayNightText"></h4>
                        </div>
                        <img src="" alt="Day/Night" class="day-night-img" id="dayNightImage">
                    </div>
                </div>
            </div>

        </div>

        <!--------------- Grafico de Cirurgia por Mes ----------------->
        <div class="mid-content">

            <div class="m-content" id="total-c">
                <div class="title-sur">
                   <h2>Cirurgias Realizadas</h2>  
                   <spam>Com cirurgias</spam>
                </div>
                <div class="title-total">
                            <span>Total Realizado</span>
                   </div>

                <div class="chart-sur">
                    <div class="sur-mes">            
                        <canvas id="surgeryChart" style="display: block; box-sizing: border-box; height: 223px; width: 47px;"></canvas>
                    </div>
                            
                    <div class="total">
                        <p ><?= $patientDAO->getSurgeryTotal(); ?></p>

                    </div>
                </div>

            </div>

        <!--------------- Grafico de Cirurgia por procedimento ----------------->

            <div class="mp-content" id="cirurgias">
            <div class="title-proc">
                   <h2>Procedimentos</h2>  
                   <spam>Total Cirurgias</spam>
                </div>
                <div class="sur-proc">
                    <canvas id="procedimentoChart" style="color: #AC3483;display: block; box-sizing: border-box; height: 223px; width: 47px;"></canvas>
                </div>

            </div>

        </div>
    <!--------------- Grafico de Gastos ----------------->
        <div class="end-content">
            <div class="info">
                <div class="title-ex">
                    <h2>Gastos Totais</h2>  
                    <spam>Com cirurgias</spam>
                </div>
                <div class="value">
                    <p>R<spam>$</spam>:  <?= $patientDAO->getExpensesTotal(); ?><spam>,00</spam></p>
                </div>
            </div>

            <div class="expenses">  
                <canvas id="expenseChart" ></canvas>
            </div>
        </div>

    </div>


    </section>







<!---------------------------------- Script medico --------------------------------->
    <script>
        var selectMedico = document.getElementById('medico');
        var h2NomeMedico = document.getElementById('nomeMedico');
        var divNumeroCirurgias = document.getElementById('numeroCirurgias');

        selectMedico.addEventListener('change', function() {
            var selectedMedico =  selectMedico.value;

            // Atualizar o nome do médico
            h2NomeMedico.textContent = 'Dr. '+ selectedMedico;

            // Consultar o número de cirurgias cadastradas no nome do médico
            fetch('../php/ajax_get_cirurgias.php?medico=' +  encodeURIComponent(selectedMedico))
                .then(response => response.json())
                .then(data => {
                    // Atualizar o número de cirurgias
                    divNumeroCirurgias.textContent =  data.count;
                })
               
        });

    </script>

<!---------------------------------- Script convenio -------------------------------->
<script>
    var selectInsurance = document.getElementById('insurance');
    var h2NomeInsurance = document.getElementById('nomeInsurance');
    var divNumeroICirurgias = document.getElementById('numeroICirurgias');

    selectInsurance.addEventListener('change', function() {
        var selectedInsurance = selectInsurance.value;

        // Atualizar o nome do convênio
        h2NomeInsurance.textContent = selectedInsurance;

        // Consultar o número de cirurgias cadastradas no convênio
        fetch('../php/ajax_get_insurance_cirurgias.php?insurance=' + encodeURIComponent(selectedInsurance))
            .then(response => response.json())
            .then(data => {
                // Atualizar o número de cirurgias
                divNumeroICirurgias.textContent =  data.count;
            })
    });
</script>

<!----------------------------- Script Dia ou Noite --------------------------------->
<script>
        var currentTime = new Date().getHours();

        var dayNightText = document.getElementById('dayNightText');
        var dayNightImage = document.getElementById('dayNightImage');

        if (currentTime >= 6 && currentTime < 18) {
            dayNightText.textContent = ' Dia';
            dayNightImage.src = '../Components/SVG/day.svg';
        } else {
            dayNightText.textContent = ' Noite';
            dayNightImage.src = '../Components/SVG/night.svg';
        }
    </script>

<!--------------------- Script Para Procedimentos por cirurgias ------------------>
<script>

var surgeryData = <?php echo json_encode($procedimentoData); ?>;

var typeSurgery = surgeryData.map(function(item) {
    return item.type_surgery; 
});

var surgeryCount = surgeryData.map(function(item) {
    return item.count;
});

var ctx = document.getElementById('procedimentoChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: typeSurgery,
        datasets: [{
            label: 'Quantidade de Cirurgias',
            data: surgeryCount,
            backgroundColor: [
                '#e74c3c',
                '#FF7723',
                '#27AE60',
                '#308ECC',
                '#AC3483',
                '#1ABC9C',
                '#2C2C54',
                '#D4D4D4' 
            ],
            borderWidth: 0,
            
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'right',
            },
        }, 
  },
});


</script>


<!------------------------ Grafico de Cirurgias por meses ----------------------->
    <script>
        var surgeryData = <?php echo json_encode($surgeryData); ?>;

        var months = surgeryData.map(function(item) {
            var monthYear = item.month;
            var month = parseInt(monthYear.split('-')[1]);
            var year = parseInt(monthYear.split('-')[0]);
            return getMonthName(month) + ' ' + year;
        });

        var surgeryCount = surgeryData.map(function(item) {
            return item.count;
        });

        function getMonthName(month) {
            var monthNames = [
                "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
            ];
            return monthNames[month - 1];
        }
        var ctx = document.getElementById('surgeryChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Quantidade de Cirurgias',
                    data: surgeryCount,
                    backgroundColor: '#AC3483'
                }]
            },
            options: {
                
                
                borderSkipped:'middle',
                borderRadius: 6,
                inflateAmount: -4,
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'none',
                    },
                },

                scales: {
                    
                     y: {
                        
                        grid: {
                            color: 'rgba(255,255,255,0.2)', // Define a cor branca para as linhas de grade do eixo y
                            
                        },
                        ticks: {
                            crossAlign: 'near',
                            maxTicksLimit: 7,
                            color: '#AC3483',
                        },
                        border:{
                            dash:[5,4]
                        }
                    },
                    x: {
                        
                        grid: {
                            color: 'rgba(255,255,255,0)', // Define a cor branca para as linhas de grade do eixo y
                            
                        },

                    }
                }
        }
        });

    </script>

<!---------------------- Script de Grafico de gastos por mes ---------------------->
    <script>
        var expenseData = <?php echo json_encode($expenseData); ?>;
        var gradient = ctx.createLinearGradient(0, 0, 0, 290); // Define o gradiente linear
        gradient.addColorStop(0, 'rgba(22, 160, 133, 1)'); // Cor inicial do gradiente
        gradient.addColorStop(1, 'rgba(22, 160, 133, 0)'); // Cor final do gradiente


        var months = expenseData.map(function(item) {
            var monthYear = item.month;
            var month = parseInt(monthYear.split('-')[1]);
            var year = parseInt(monthYear.split('-')[0]);
            return getMonthName(month) + ' ' + year;
        });
        function getMonthName(month) {
            var monthNames = [
                "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
            ];
            return monthNames[month - 1];
        }

        var expenses = expenseData.map(function(item) {
            return item.expenses;
        });


        var ctx = document.getElementById('expenseChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
            labels: months,
            datasets: [{
                label: 'Gastos por Mês',
                data: expenses,
                backgroundColor: '#16A085',
                borderColor: 'rgba(22, 160, 133, 1)',
                pointBackgroundColor: 'rgba(22, 160, 133, 1)',
                pointBorderColor: '#fff',
                pointRadius: 5,
                pointHoverRadius: 7,
                borderWidth: 3,
                backgroundColor: gradient,
                fill: true,
                tension: 0.4,
                // borderDashOffset: ,
                
            }]
            },

            options: {

                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'none',
                    },
                },  

            scales: {

                y: {
                    beginAtZero: true,
                    stepSize: 100,
                        grid: {
                            color: 'rgba(255,255,255,0.1)', // Define a cor branca para as linhas de grade do eixo y
                            
                        },
                        ticks: {
                            crossAlign: 'near',
                            maxTicksLimit: 7,
                            color: '#16A085',
                        },
                        border:{
                            dash:[5,5]
                        }
                    },
                    x: {
                        
                        grid: {
                            color: 'rgba(255,255,255,0)', // Define a cor branca para as linhas de grade do eixo y
                            
                        },

                    }
            },


            }
        });
    </script>


<!------------------- Menu Sidebar ------------------------>
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