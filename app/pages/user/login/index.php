<html>

<head>
  <title>Unidade de Saúde | Entrar</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./public/styles/img/doctors-list.svg" type="image/x-icon" />

  <link rel="stylesheet" type="text/css" href="./public/styles/css/main.css" />
  <link rel="stylesheet" type="text/css" href="./public/styles/css/home.css" />
  <link rel="stylesheet" type="text/css" href="./public/styles/css/form.css" />
  <link rel="stylesheet" type="text/css" href="./public/styles/css/buttons.css" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet" />
</head>

<body>
  <header>
    <h1 class="logo">Unidade de Saúde</h1>
  </header>
  <main class="container">
    <section class="up">
      <div class="form">
        <h2>Entrar</h2>
        <form method="POST" action="login.php">
          <div class="input-block">
            <label for="username">LOGIN</label>
            <input id="username" name="username" required />
          </div>
          <div class="input-block">
            <label for="password">SENHA</label>
            <input id="password" type="password" name="password" required />
          </div>
          <button type="submit" class="primary-button">Entrar</button>
        </form>
      </div>
    </section>
  </main>
  <footer>
    <p>2021 - Unidade de Saúde</p>
  </footer>
</body>

</html>