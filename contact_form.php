<?php
session_start();
include 'functions.php';

$contacts = require_once __DIR__ . '/data.php';

// Page-specific variables
$title = "Contact Form";
$author = "Jose Camarena";
$headerText = "Contact";

// Initialize form variables
$id = 0;
$titlename = "Mr.";
$first_name = $surname = $birth_date = $phone = $email = "";
$type_favorite = $type_important = $type_archived = false;
$errors = [];
$is_edit = false; // Variable to track if editing

// Check if we are updating an existing contact
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $contact = findContactById($contacts, $id);
    
    if ($contact) {
        $is_edit = true; // Editing mode
        $id = $contact['id'];
        $titlename = $contact['title'];
        $first_name = $contact['name'];
        $surname = $contact['surname'];
        $birth_date = $contact['birthdate'];
        $phone = $contact['phone'];
        $email = $contact['email'];
        $type_favorite = $contact['favourite'];
        $type_important = $contact['important'];
        $type_archived = $contact['archived'];
    }
}

// Handle form submission (validation and session logic)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form validation and data retention logic goes here...
}
?>

<!-- Include the header partial -->
<?php include 'header.php'; ?>

<style>
    .form-container {
        margin: 20px auto;
        padding: 20px;
        width: 50%;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label, input, .error, h1 {
        margin-bottom: 10px;
    }

    input[type="text"], input[type="date"], input[type="submit"] {
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: 100%;
    }

    input[type="checkbox"], input[type="radio"] {
        margin-right: 10px;
    }

    .error {
        color: red;
        font-weight: bold;
    }

    .form-buttons {
        display: flex;
        gap: 10px;
    }

    .form-buttons input {
        flex: 1;
    }
</style>

<div class="form-container">
    <h1 style="text-align: center;">Contact</h1>

    <!-- Display errors -->
    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Contact Form -->
    <form method="post" action="">
        <label for="id">ID</label>
        <input type="text" id="id" name="id" value="<?= $id; ?>" readonly>

        <label>Title</label>
        <div>
            <input type="radio" name="title" value="Mr." <?= $titlename == "Mr." ? "checked" : ""; ?>> Mr.
            <input type="radio" name="title" value="Mrs." <?= $titlename == "Mrs." ? "checked" : ""; ?>> Mrs.
            <input type="radio" name="title" value="Miss" <?= $titlename == "Miss" ? "checked" : ""; ?>> Miss
        </div>

        <label for="first_name">First name</label>
        <input type="text" id="first_name" name="first_name" value="<?= $first_name; ?>">

        <label for="surname">Surname</label>
        <input type="text" id="surname" name="surname" value="<?= $surname; ?>">

        <label for="birth_date">Birth date</label>
        <input type="date" id="birth_date" name="birth_date" value="<?= $birth_date; ?>">

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="<?= $phone; ?>">

        <label for="email">E-mail</label>
        <input type="text" id="email" name="email" value="<?= $email; ?>">

        <label>Type</label>
        <div>
            <input type="checkbox" name="type_favorite" <?= $type_favorite ? "checked" : ""; ?>> Favourite
            <input type="checkbox" name="type_important" <?= $type_important ? "checked" : ""; ?>> Important
            <input type="checkbox" name="type_archived" <?= $type_archived ? "checked" : ""; ?>> Archived
        </div>

        <div class="form-buttons">
            <input type="submit" name="save" value="Save" <?= $is_edit ? "disabled" : ""; ?>>
            <input type="submit" name="update" value="Update" <?= !$is_edit ? "disabled" : ""; ?>>
            <input type="submit" name="delete" value="Delete" <?= !$is_edit ? "disabled" : ""; ?>>
        </div>
    </form>
</div>

<!-- Include the footer partial -->
<?php include 'footer.php'; ?>
