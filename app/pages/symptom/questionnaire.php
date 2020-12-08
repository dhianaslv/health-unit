<html>
	<head>
		<title>Unidade de Saúde | Questionário</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="#"> 
        <link
            rel="stylesheet"
            type="text/css"
            href="../../../public/styles/css/main.css"
        />
        <link rel="stylesheet" type="text/css" href="../../../public/styles/css/home.css" /> 
        <link
            rel="stylesheet"
            type="text/css"
            href="../../../public/styles/css/sidebar.css"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="../../../public/styles/css/animations.css"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap"
            rel="stylesheet"
        />
	</head>
    <body>
        <div class="page-pattern">
            <aside class="animate-right sidebar">
                <footer>
                    <a class="sidebar-buttons" href="./questionnaire_page.html" title="Questionário">
                        <img src="../../../public/styles/img/questionnaire.svg" alt="Questionário" />
                    </a>
                    <a class="sidebar-buttons" href="../patient/register_page.html" title="Cadastrar um novo paciente">
                        <img src="../../../public/styles/img/plus.svg" alt="Cadastrar um novo paciente" />
                    </a>
                    <a class="sidebar-buttons" href="../patient/list_page.php" title="Lista de pacientes">
                        <img src="../../../public/styles/img/list.svg" alt="Lista de pacientes" />
                    </a>
                    <a class="sidebar-buttons" href="../medical_records/search_medical_records.html" title="Visualizar prontuários">
                        <img src="../../../public/styles/img/file-search.png" alt="Visualizar prontuários" />
                    </a>
                </footer>
            </aside>
            <main class="animate-appear with-sidebar">
                <?php
                    include_once('../../utils/autoload.php');

                    use app\controllers\SymptomController;

                    $symptom_controller = new SymptomController();

                    $patient_cpf = $_POST["patient_cpf"];
                    $start_date = $_POST["start_date"];
                    $symptoms = $_POST["symptom"];

                    if(!isset($patient_cpf) || !isset($start_date)){
                ?>
                        <div class='info'>
                            <p>Você precisa preencher os campos de informações importantes!</p>
                        </div> 
                <?php
                    }
                    else{

                        $result = $symptom_controller->addSymptoms($patient_cpf, $symptoms, $start_date);

                        if(!is_bool($result)){
                ?>
                            <div class='info'>
                                <p><?php echo "$result" ?></p>
                            </div>    
                <?php 
                        } 
                        else{
                ?>
                            <div class='info'>
                                <p>O prontuário médico do paciente de CPF: <?php echo "$patient_cpf" ?> está pronto!</p>
                                <br>
                                <br>
                                <a href="../medical_records/search_medical_records.html">
                                    <button type="button" class="home-button">
                                        Visualizar Prontuários
                                    </button>
                                </a>
                            </div> 
                <?php
                        }
                    }
                ?>
            </main>
        </div>
    </body>
</html>
