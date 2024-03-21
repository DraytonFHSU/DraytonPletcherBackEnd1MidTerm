<?php 
// Include the header part of the HTML page
include("../view/header.php"); 
?>

<!-- Display types -->
<?php if (!empty($types)) : ?> <!-- Check if there are any types to display -->
    <section id="list" class="list">
        <header>
            <h1>type List</h1>
        </header>
        <!-- Loop through the types and display each one -->
        <table>
        <?php foreach ($types as $type) : ?>
            <tr>
                <td>
                    <!-- Display the type name -->
                    <p class="bold"><?= htmlspecialchars($type['Type']) ?></p>
        </td>
                <td>
                    <!-- Form to delete the type -->
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_type">
                        <input type="hidden" name="typeID" value="<?= $type['ID'] ?>">
                        <button class="remove-button">X</button>
                    </form>
        </td>
        </tr>
        <?php endforeach; ?>
        </table>
    </section>
<?php else : ?>
    <!-- Display a message if no types exist -->
    <p>No types exist yet</p>
<?php endif; ?>

<!-- Add type Form -->
<section>
    <h2>Add type</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_type">
        <div class="add__inputs">
            <label>type:</label>
            <!-- Input for the new type name -->
            <input type="text" name="type" maxlength="30" placeholder="Name" autofocus required>
        </div>
        <div class="add__addItem">
            <!-- Button to submit the form and add a new type -->
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>

<!-- Link to View/Edit to do's -->
<p><a href=".?action=list_vehicles">View/Edit vehicles</a></p>

<?php 
// Include the footer part of the HTML page
include("../view/footer.php"); 
?>