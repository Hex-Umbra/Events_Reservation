<?php

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header('Location: ./?page=home');
    exit; // Stop further script execution after the redirect
}

?>
<!-- Fetching data -->
<?php
$sql_users =
    "SELECT * FROM user";
$stmt = $pdo->prepare($sql_users);
$stmt->execute();
$users = $stmt->fetchAll();
?>
<!-- Displaying the data -->
<section class="section-body">
    <div class="table-container">
        <h1>All Users</h1>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Associated Events</th>
                    <th>Actions</th>
            </thead>
            <tbody>

                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user["name"] ?></td>
                        <td><?php echo $user["email"] ?></td>
                        <td><?php echo $user["role"] ?></td>
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