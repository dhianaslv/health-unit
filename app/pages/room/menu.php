<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Unidade de Saúde | Salas</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../../public/styles/img/doctors-list.svg" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="../../../public/styles/css/main.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/styles/css/home.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/styles/css/table.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/styles/css/card.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/styles/css/modal.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/styles/css/buttons.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/styles/css/form.css" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet" />
</head>

<body>
    <header>
        <h3 class="logo">Unidade de Saúde</h3>
    </header>
    <main class="container">
        <section class="quick-access">
            <a href="#" onclick="Modal.open()" class="home-button">
                <h3>
                    <p>Cadastrar Sala</p>
                    <img src="../../../public/styles/img/hospital-icon.svg" alt="Imagem de cadastro de uma sala" />
                </h3>
            </a>
            <a href="./search_room.html" class="home-button">
                <h3>
                    <p>Procurar Sala</p>
                    <img src="../../../public/styles/img/search.svg" alt="Imagem de pesquisa" />
                </h3>
            </a> <a href="../home_page.php" class="home-button">
                <h3>
                    <p>Home</p>
                    <img src="../../../public/styles/img/home.svg" alt="Imagem de Home" />
                </h3>
            </a>
        </section>
        <section class="table">
            <?php
            include_once('../../utils/autoload.php');

            spl_autoload_register("autoload");

            use app\controllers\RoomController;

            $room_controller = new RoomController();

            $room_list = $room_controller->allRooms();

            if ($room_list != null && is_array($room_list)) {

            ?>
                <h2>Lista de Salas</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    foreach ($room_list as $room) {
                    ?>
                        <tr>
                            <td><?php echo ($room->getId()); ?></td>
                            <td><?php echo ($room->getType()); ?></td>
                            <td><?php echo ($room->getStatus()); ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            <?php
            } else {
            ?>
                <div class="card">
                    <h3>
                        <span>A lista de salas está vazia</span>
                        <img src="../../../public/styles/img/error.svg" alt="Imagem de mensagem de erro">
                    </h3>
                    <p>Ainda não há nenhuma sala cadastrada.</p>
                </div>
            <?php
            }
            ?>
        </section>
    </main>
    <div class="modal-overlay">
        <div class="modal">
            <div class="form">
                <h2>Cadastrar nova sala</h2>
                <form method="POST" action="register_room.php">
                    <div class="input-block">
                        <label class="sr-only" for="type">Tipo de Sala</label>
                        <input id="type" name="type" placeholder="Sala de ..." required>
                    </div>
                    <div class="input-block actions">
                        <a href="#" onclick="Modal.close()" class="button-cancel">Cancelar</a>
                        <button type="submit" class="primary-button">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p>2021 - Unidade de Saúde</p>
    </footer>
    <script src="../../../public/scripts/modal.js"></script>
</body>

</html>