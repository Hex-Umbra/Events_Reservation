<?php

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header('Location: ./?page=home');
    exit; // Stop further script execution after the redirect
}

?>
<!-- Fetching data -->
<?php
$allUsers = $controller->getAllUsers();
?>
<!-- Displaying the data -->
<section class="section-body">
    <div class="table-container">
        <h1>All Users</h1>
        <table>
            <thead>
                <tr>
                    <th>Id n°</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Associated Events</th>
                    <th>Actions</th>
            </thead>
            <tbody>

                <?php foreach ($allUsers as $user): ?>
                    <tr>
                        <td><?= $user['id_user'] ?></td>
                        <td><?= $user["name"] ?></td>
                        <td><?= $user["email"] ?></td>
                        <td><?= $user["role"] ?></td>
                        <td></td>
                        <td>
                            <form action="">
                                <button type="submit">Delete</button>
                            </form>
                            <form action="">
                                <button type="submit">Edit</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>