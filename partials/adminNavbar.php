<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/main.css">
    <link rel="stylesheet" href="../public/styles/adminNavbar.css">
    <link rel="stylesheet" href="../public/styles/footer.css">
    <title>Document</title>
</head>

<body>
    <nav class="sidebar">
        <h1>Navigation</h1>
        <a href="#"> <img src="../public/assets/images/arrow_right.svg">Profile</a>
        <a href="#"> <img src="../public/assets/images/arrow_right.svg">See all users</a>
        <a href="#"> <img src="../public/assets/images/arrow_right.svg">See all events</a>
        <a href="#"> <img src="../public/assets/images/arrow_right.svg">See all organizers</a>
        <form class="form-logout" action="../src/auth/logout.php" method="POST">
            <input type="submit" value="Déconnexion">
        </form>
    </nav>
</body>

</html>