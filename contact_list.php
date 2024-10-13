<?php
// Load the contacts array from data.php
$contacts = require_once __DIR__ . '/data.php';

// Page-specific variables
$title = "Contact List";
$author = "Jose Camarena";
$headerText = "Contact List";
?>

<!-- Include the header partial -->
<?php include 'header.php'; ?>

<style>
    table{
        margin: 0 auto; 
        border: 1px solid black; 
        width: 80%;
    }
    th{
        padding: 10px; 
        text-align: left;
    }
    td{
        padding: 10px;
    }
</style>
<!-- Main content starts here -->
<div class="form-container" style="text-align: center;">
    <h1><?= htmlspecialchars($headerText); ?></h1>
    <br>
    <form action="contact_form.php" method="GET" style="margin-bottom: 20px;">
        <button type="submit">Create new contact</button>
    </form>
</div>

<!-- Display the contact list as a table -->
<?php
function showTable($contacts) {
    echo '<table>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Title</th>';
    echo '<th>Name</th>';
    echo '<th>Surname</th>';
    echo '<th></th>';
    echo '</tr>';

    // Loop through each contact and display as table row
    foreach ($contacts as $contact) {
        echo '<tr>';
        echo '<td>' . $contact['id'] . '</td>';
        echo '<td>' . $contact['title'] . '</td>';
        echo '<td>' . $contact['name'] . '</td>';
        echo '<td>' . $contact['surname'] . '</td>';
        echo '<td>';
        echo '<form action="contact_form.php" method="GET" style="display:inline;">';
        echo '<input type="hidden" name="id" value="' . $contact['id'] . '">';
        echo '<input type="submit" value="Edit/View">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
}

showTable($contacts);
?>

<!-- Include the footer partial -->
<?php include 'footer.php'; ?>
