<link rel="stylesheet" href="./public/styles/main.css">

<?php session_start();
require_once "./database/connexion.php";
require_once "./src/controllers/UserController.php";

$controller = new UserController($pdo);

if (empty($_SESSION)) {
    include "./views/partials/navbar.php"; // Show regular navbar for guests
} else {
    // Check the user's role
    if ($_SESSION["role"] === 'admin') {
        include "./views/partials/adminNavbar.php"; // Show admin navbar for admins
    } else {
        include "./views/partials/navbar.php"; // Show regular navbar for other roles
    }
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
    "dashboard" => $dashboardPage,
    "event" => "eventDetails.php",
    "allUsers" => "adminUsers.php",
    "allOrganizers" => "adminOrganizers.php",
];

$page = $_GET["page"] ?? "home";
if (array_key_exists($page, $myPages)) {

    $filePath = __DIR__ . "/views/" . $myPages[$page];

    if (file_exists($filePath)) {
        include $filePath;
    } else {
        include "./views/notFound404.php";
    }
} else {
    include "./views/notFound404.php";
}


if (empty($_SESSION)) {
    include "./views//partials/footer.php"; // Show regular navbar for guests
} else {
    // Check the user's role
    if ($_SESSION["role"] === 'user') {
        include "./views//partials/footer.php";
    }
}


?>