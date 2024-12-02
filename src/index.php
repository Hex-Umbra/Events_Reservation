<link rel="stylesheet" href="../public/styles/main.css">

<?php session_start();

if ($_SESSION["role"] === "user" || empty($_SESSION)) {
    include "../partials/navbar.php";
} else {
    include "../partials/adminNavbar.php";
}

$dashboardPage = "dashboard/dashboardUser.php";

if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] === "admin") {
        $dashboardPage = "dashboard/dashboardAdmin.php";
    }
}

$myPages = [
    "home" => "home.php",
    "login" => "loginPage.php",
    "register" => "registerPage.php",
    "dashboard" => $dashboardPage
];

$page = $_GET["page"] ?? "home";
if (array_key_exists($page, $myPages)) {

    $filePath = "../views/" . $myPages[$page];

    if (file_exists($filePath)) {
        include $filePath;
    } else {
        include "../views/notFound404.php";
    }
} else {
    include "../views/notFound404.php";
}

if ($_SESSION["role"] === "user" || empty($_SESSION["role"])) {
    include "../partials/footer.php";
}


?>