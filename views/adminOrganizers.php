<?php
if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] !== "admin") {
        header('Location: ./?page=home');
    }
}
?>
<!-- Fetching Data -->
<?php
$sql_users =
    "SELECT * FROM organisation";
$stmt = $pdo->prepare($sql_users);
$stmt->execute();
$organizers = $stmt->fetchAll();
?>
<!-- Displaying the data -->
<section class="section-body">
    <div class="table-container">

        <h1>All Organizers</h1>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Actions</th>
            </thead>
            <tbody>
                <?php foreach ($organizers as $organizer): ?>
                    <tr>
                        <td><?php echo $organizer["nom_org"] ?></td>
                        <td><?php echo $organizer["tel"] ?></td>
                        <td><?php echo $organizer["email"] ?></td>
                        <td>
                            <a href="">Delete</a>
                            <a href="">Update</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>