<?php
session_start();

// Ensure contact data is available
if (!isset($_SESSION['contact_data'])) {
    header('Location: contact_form.php');
    exit;
}

$contact = $_SESSION['contact_data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Data</title>
    <style>
        .container { width: 400px; margin: 0 auto; }
    </style>
</head>
<body>

<div class="container">
    <h1>No errors!</h1>
    <p>ID: <?= $contact['id']; ?></p>
    <p>Title: <?= $contact['title']; ?></p>
    <p>First name: <?= $contact['first_name']; ?></p>
    <p>Surname: <?= $contact['surname']; ?></p>
    <p>Birth date: <?= $contact['birth_date']; ?></p>
    <p>Phone: <?= $contact['phone']; ?></p>
    <p>Email: <?= $contact['email']; ?></p>
    <p>Type:</p>
    <ul>
        <li>Favourite: <?= isset($contact['type_favorite']) ? 'Yes' : 'No'; ?></li>
        <li>Important: <?= isset($contact['type_important']) ? 'Yes' : 'No'; ?></li>
        <li>Archived: <?= isset($contact['type_archived']) ? 'Yes' : 'No'; ?></li>
    </ul>
</div>

</body>
</html>
