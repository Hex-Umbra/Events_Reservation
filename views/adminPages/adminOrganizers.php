<?php
if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] !== "admin") {
        header('Location: ./?page=home');
    }
}
?>
<!-- Fetching Data -->
<?php
$organizers = $organizationController->getOrganizations();
?>
<!-- Displaying the data -->
<section class="section-body">
    <div class="table-container">
        <h1>All Organizers <a class="createUser-button" href="?page=createOrg">Create New Organization</a></h1>
        <?php if (isset($_SESSION["successMessage"])): ?>
            <span class="success-message"><?= $_SESSION["successMessage"] ?></span>
            <?php
            unset($_SESSION["successMessage"]);
            ?>
        <?php endif ?>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Actions</th>
            </thead>
            <tbody>
                <?php foreach ($organizers as $organizer): ?>
                    <tr>
                        <td><?php echo $organizer["id_org"] ?></td>
                        <td><?php echo $organizer["nom_org"] ?></td>
                        <td><?php echo $organizer["tel"] ?></td>
                        <td><?php echo $organizer["email"] ?></td>
                        <td>
                            <a href="?page=deleteOrg&id_org=<?= $organizer["id_org"] ?>">Delete</a>
                            <a href="">Update</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>