<?php
require_once '../c/dbConfig.php';
require_once '../c/models.php';

$developers = fetchAllDevelopers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developers List</title>
</head>
<body>
    <h2>Developers</h2>

    <?php if (isset($_GET['message'])): ?>
        <p>
            <?php
            switch ($_GET['message']) {
                case 'insert_success': echo 'Developer added successfully!'; break;
                case 'update_success': echo 'Developer updated successfully!'; break;
                case 'delete_success': echo 'Developer deleted successfully!'; break;
                case 'invalid_id': echo 'Invalid Developer ID.'; break;
                default: echo 'An unknown error occurred.';
            }
            ?>
        </p>
    <?php endif; ?>

    <a href="addDeveloper.php">Add New Developer</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Birthdate</th>
            <th>Address</th>
            <th>Services</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($developers as $developer): ?>
        <tr>
            <td><?= htmlspecialchars($developer['DeveloperID']) ?></td>
            <td><?= htmlspecialchars($developer['FirstName']) ?></td>
            <td><?= htmlspecialchars($developer['LastName']) ?></td>
            <td><?= htmlspecialchars($developer['Email']) ?></td>
            <td><?= htmlspecialchars($developer['Age']) ?></td>
            <td><?= htmlspecialchars($developer['Birthdate']) ?></td>
            <td><?= htmlspecialchars($developer['Address']) ?></td>
            <td><?= htmlspecialchars($developer['Services']) ?></td>
            <td>
                <a href="editDeveloper.php?developerID=<?= htmlspecialchars($developer['DeveloperID']) ?>">Edit</a>
                <a href="deleteDeveloper.php?developerID=<?= htmlspecialchars($developer['DeveloperID']) ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

