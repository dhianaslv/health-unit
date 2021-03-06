<?php
if (!isset($_SESSION["loggedUser"])) {
  header("Location: ./");
}
require_once "app/components/MessageContainer.php";
require_once "app/components/Base.php";
?>
<html>

<head>
  <?php Base::head("Questionário | Unidade de Saúde"); ?>
  <link rel="stylesheet" type="text/css" href="./public/styles/css/form.css" />
  <link rel="stylesheet" type="text/css" href="./public/styles/css/checkbox.css" />
</head>

<body>
  <?php Base::header(); ?>
  <main class="container">
    <section class="quick-access">
      <a href="?page=medical_records/search" class="home-button">
        <h3>
          <p>Procurar Prontuário</p>
          <img src="./public/styles/img/file-search.png" alt="Imagem de prontuário" />
        </h3>
      </a>
      <a href="?page=medical_records/list" class="home-button">
        <h3>
          <p>Listar Prontuários</p>
          <img src="./public/styles/img/medical-records-list.svg" alt="Imagem de lista de prontuários" />
        </h3>
      </a>
      <a href="?page=medical_records/most_recurrent_symptom" class="home-button">
        <h3>
          <p>Sintomas mais recorrentes</p>
          <img src="./public/styles/img/search.svg" alt="Imagem da pesquisa por sintomas mais recorrentes" />
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
    if (isset($_SESSION["errorMessage"])) {
      MessageContainer::errorMessage("Mensagem de Erro", $_SESSION["errorMessage"]);
      $_SESSION["errorMessage"] = null;
    } else if (isset($_SESSION["successMessage"])) {
      MessageContainer::successMessage("Operação realizada", $_SESSION["successMessage"]);
      $_SESSION["successMessage"] = null;
    } else {
    ?>
      <section class="box">
        <div class="form">
          <h2>Questionário (Dengue)</h2>
          <form method="POST" action="?class=Symptom&action=addSymptoms">
            <div class="input-block">
              <label for="cpf">CPF</label>
              <input id="cpf" name="cpf" required />
            </div>
            <div class="input-block">
              <label for="start_date">Data de início dos sintomas</label>
              <input type="date" id="start_date" name="start_date" required />
            </div>
            <h2>Sintomas</h2>
            <div class="control-group">
              <label class="control control-checkbox">
                Febre alta > 38.5ºC;
                <input type="checkbox" name="symptom[]" value="Febre alta > 38.5ºC" />
                <div class="control_indicator"></div>
              </label><label class="control control-checkbox">
                Dores musculares intensas;
                <input type="checkbox" name="symptom[]" value="Dores musculares intensas" />
                <div class="control_indicator"></div>
              </label><label class="control control-checkbox">
                Dor ao movimentar os olhos;
                <input type="checkbox" name="symptom[]" value="Dor ao movimentar os olhos" />
                <div class="control_indicator"></div>
              </label><label class="control control-checkbox">
                Mal estar;
                <input type="checkbox" name="symptom[]" value="Mal estar" />
                <div class="control_indicator"></div>
              </label><label class="control control-checkbox">
                Falta de apetite;
                <input type="checkbox" name="symptom[]" value="Falta de apetite" />
                <div class="control_indicator"></div>
              </label><label class="control control-checkbox">
                Dor de cabeça;
                <input type="checkbox" name="symptom[]" value="Dor de cabeça" />
                <div class="control_indicator"></div>
              </label><label class="control control-checkbox">
                Manchas vermelhas no corpo;
                <input type="checkbox" name="symptom[]" value="Manchas vermelhas no corpo" />
                <div class="control_indicator"></div>
              </label>
              <label class="control control-checkbox">
                Dor abdominal intensa e contínua, ou dor quando o abdome é
                tocado;
                <input type="checkbox" name="symptom[]" value="Dor abdominal intensa e contínua, ou dor quando o abdome é
                  tocado" />
                <div class="control_indicator"></div>
              </label>
              <label class="control control-checkbox">
                Vômitos persistentes;
                <input type="checkbox" name="symptom[]" value="Vômitos persistentes" />
                <div class="control_indicator"></div>
              </label>
              <label class="control control-checkbox">
                Acúmulo de líquidos;
                <input type="checkbox" name="symptom[]" value="Acúmulo de líquidos" />
                <div class="control_indicator"></div>
              </label>
              <label class="control control-checkbox">
                Sangramento de mucosas (principalmente nariz e gengivas);
                <input type="checkbox" name="symptom[]" value="Sangramento de mucosas (principalmente nariz e gengivas)" />
                <div class="control_indicator"></div>
              </label>
              <label class="control control-checkbox">
                Letargia (perda de sensibilidade e movimentos) ou
                irritabilidade;
                <input type="checkbox" name="symptom[]" value="Letargia (perda de sensibilidade e movimentos) ou
                  irritabilidade" />
                <div class="control_indicator"></div>
              </label><label class="control control-checkbox">
                Hipotensão postural (tontura e queda de pressão em determinadas
                posições);
                <input type="checkbox" name="symptom[]" value="Hipotensão postural (tontura e queda de pressão em determinadas posições)" />
                <div class="control_indicator"></div>
              </label>
              <label class="control control-checkbox">
                Hepatomegalia (aumento do fígado) maior do que 2cm;
                <input type="checkbox" name="symptom[]" value="Hepatomegalia (aumento do fígado) maior do que 2cm" />
                <div class="control_indicator"></div>
              </label>
              <label class="control control-checkbox">
                Aumento progressivo do hematócrito (porcentagem de glóbulos
                vermelhos ou hemácias no sangue).
                <input type="checkbox" name="symptom[]" value="Aumento progressivo do hematócrito (porcentagem de glóbulos
                  vermelhos ou hemácias no sangue)" />
                <div class="control_indicator"></div>
              </label>
            </div>

            <button type="submit" class="primary-button">Confirmar</button>
          </form>
        </div>
      </section>
    <?php
    }
    ?>
  </main>
  <?php Base::footer(); ?>
</body>

</html>