<?php
if (!isset($_SESSION["loggedUser"])) {
  header("Location: ./");
}
?>
<html>

<head>
  <title>Unidade de Saúde | Buscar prontuários</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./public/styles/img/doctors-list.svg" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="./public/styles/css/main.css" />
  <link rel="stylesheet" type="text/css" href="./public/styles/css/form.css" />
  <link rel="stylesheet" type="text/css" href="./public/styles/css/buttons.css" />
  <link rel="stylesheet" type="text/css" href="./public/styles/css/home.css" />
  <link rel="stylesheet" type="text/css" href="./public/styles/css/card.css" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet" />
</head>

<body>
  <header>
    <h3 class="logo">Unidade de Saúde</h3>
  </header>
  <main class="container">
    <section class="quick-access">
      <a href="?page=symptom" class="home-button">
        <h3>
          <p>Questionário (Dengue)</p>
          <img src="./public/styles/img/questionnaire.svg" alt="Imagem de questionário" />
        </h3>
      </a>

      <a href="?page=medical_records/most_recurrent_symptom" class="home-button">
        <h3>
          <p>Sintomas mais recorrentes</p>
          <img src="./public/styles/img/search.svg" alt="Imagem da pesquisa por sintomas mais recorrentes" />
        </h3>
      </a>
      <a href="?page=medical_records/list" class="home-button">
        <h3>
          <p>Listar Prontuários</p>
          <img src="./public/styles/img/medical-records-list.svg" alt="Imagem de lista de prontuários" />
        </h3>
      </a>
      <a href="?page=home" class="home-button">
        <h3>
          <p>Home</p>
          <img src="./public/styles/img/home.svg" alt="Imagem de Home" />
        </h3>
      </a>
    </section>
    <?php
    require_once "app/components/MessageContainer.php";

    if (isset($_SESSION["errorMessage"])) {
      MessageContainer::errorMessage("Mensagem de Erro", $_SESSION["errorMessage"]);
      $_SESSION["errorMessage"] = null;
    }
    ?>
    <section class="box">
      <div class="form">
        <h2>Pesquisar prontuários</h2>
        <form method="POST" action="?class=MedicalRecords&action=fetchMedicalRecords">
          <div class="input-block">
            <label for="cpf">CPF</label>
            <input id="cpf" name="cpf" required />
          </div>
          <button type="submit" class="primary-button">Confirmar</button>
        </form>
      </div>
    </section>
  </main>

  <footer>
    <p>2021 - Unidade de Saúde</p>
  </footer>
</body>

</html>