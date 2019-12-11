<?php
if(!$userdata = require($_SERVER["DOCUMENT_ROOT"] . "/php/auth/userdata.php")) {header("Location: /login.php"); return;}
if(!require($_SERVER["DOCUMENT_ROOT"] . "/php/auth/isadmin.php")) {header("Location: /"); return;}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel Administracyjny</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/admin.js"></script>
</head>
<body>
    <header>
        <h1>Testy ABCD</h1>
        <nav>
            <div class="menuBtn" id="btnMainPage" onclick="window.location = '/'">Strona główna</div>

            <div class="menuBtn" id="btnLogOut" onclick="window.location = 'php/auth/logout.php'">Wyloguj</div>
            <div class="menuBtn" id="btnChangePassword" onclick="window.location = 'changepassword.php'">Zmień hasło</div>
            <div class="menuInfo" id="userInfo">Zalogowano jako: <span id="username-display"><?php echo $userdata["username"]; ?></div>
        </nav>
    </header>
    <div id="quiz-table" currentQuiz="<?php
        require_once $_SERVER["DOCUMENT_ROOT"] . "/php/settings.php";
        if(!$conn = db_connect()) die("Nie udało się połączyć z bazą danych.");
        if(!$query = $conn->query("SELECT `id` FROM `quizzes` LIMIT 1")) die("Nie udało się wykonać zapytania SQL.");
        if($res = $query->fetch_row()) echo $res[0];
        else echo null;
    ?>"></div>
    <div id="question-table"></div>
    <div id="user-table"></div>
</body>
</html>