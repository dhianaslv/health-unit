<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Unidade de Saúde | Buscar Funcionário</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="../../../public/styles/img/doctors-list.svg"
      type="image/x-icon"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../../../public/styles/css/main.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../../../public/styles/css/home.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../../../public/styles/css/form.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../../../public/styles/css/buttons.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <header>
      <h3 class="logo">Unidade de Saúde</h3>
    </header>
    <main class="container">
      <section class="quick-access">
        <a href="./register_page.html" class="home-button">
          <h3>
            <p>Cadastrar Funcionário(a)</p>
            <img
              src="../../../public/styles/img/plus.svg"
              alt="Imagem de cadastro de funcionários"
            />
          </h3>
        </a>
        <a href="./list_page.php" class="home-button">
          <h3>
            <p>Listar Funcionários</p>
            <img
              src="../../../public/styles/img/list.svg"
              alt="Imagem de lista de funcionários"
            />
          </h3>
        </a>
        <a href="../home_page.php" class="home-button">
          <h3>
            <p>Home</p>
            <img
              src="../../../public/styles/img/home.svg"
              alt="Imagem da Home"
            />
          </h3>
        </a>
      </section>
      <section class="box">
        <div class="form">
          <h2>Procurar Funcionário(a)</h2>
          <form method="POST" action="update_page.php">
            <div class="input-block">
              <label for="cpf" class="sr-only">CPF do Funcionário</label>
              <input
                id="cpf"
                name="cpf"
                placeholder="Insira o CPF do Funcionário"
                required
              />
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