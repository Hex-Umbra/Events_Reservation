<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/navbar.css">
    <link rel="stylesheet" href="../public/styles/footer.css">
    <link rel="stylesheet" href="../public/styles/authStyle.css">
    <link rel="stylesheet" href="../public/styles/eventsCards.css">
</head>

<?php 
$active_page = isset($_GET["page"]) ? $_GET["page"] : "home";
?>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="../public/assets/images/bird_logo.svg" alt="">
            <span>PlanEvent</span>
        </div>
        <?php if (!empty($username)) { ?>
            <span class="nav-username">Welcome, <?= $username ?></span>
        <?php } ?>
        <ul class="nav-links">
            <li><a href="?page=home" class='<?php echo $active_page === "home" ? "active1" : "" ?>'>Home</a></li>
            <?php if (isset($_SESSION["email"])) { ?>
                <li><a href="?page=dashboard" class='<?php echo $active_page === "dashboard" ? "active1" : "" ?>'>Profile</a></li>
                <li>
                    <form class="form-logout" action="../src/auth/logout.php" method="POST">
                        <button class="logout">
                            <img src="../public/assets/images/logout_btn.svg" alt="">
                        </button>
                    </form>
                </li>
            <?php } else { ?>
                <li><a href="?page=register" class='<?php echo $active_page === "register" ? "active1" : "" ?>'>Inscription</a></li>
                <li><a href="?page=login" class='<?php echo $active_page === "login" ? "active1" : "" ?>'>Connection</a></li>
            <?php } ?>
        </ul>
    </nav>