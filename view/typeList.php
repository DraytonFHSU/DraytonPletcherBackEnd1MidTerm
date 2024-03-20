<?php 
// Include the header part of the HTML page
include("view/header.php"); 
?>

<!-- Display categories -->
<?php if (!empty($types)) : ?> <!-- Check if there are any categories to display -->
    <section id="list" class="list">
        <header>
            <h1>type List</h1>
        </header>
        <!-- Loop through the categories and display each one -->
        <?php foreach ($types as $type) : ?>
            <div class="list__row">
                <div class="list__item">
                    <!-- Display the category name -->
                    <p class="bold"><?= htmlspecialchars($type['Type']) ?></p>
                </div>
                <div class="list__removed">
                    <!-- Form to delete the category -->
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_type">
                        <input type="hidden" name="typeID" value="<?= $type['ID'] ?>">
                        <button class="remove-button">X</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php else : ?>
    <!-- Display a message if no categories exist -->
    <p>No types exist yet</p>
<?php endif; ?>

<!-- Add category Form -->
<section>
    <h2>Add type</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_type">
        <div class="add__inputs">
            <label>type:</label>
            <!-- Input for the new category name -->
            <input type="text" name="type" maxlength="30" placeholder="Name" autofocus required>
        </div>
        <div class="add__addItem">
            <!-- Button to submit the form and add a new category -->
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>

<!-- Link to View/Edit to do's -->
<p><a href=".?action=list_toDos">View/Edit vehicles</a></p>

<?php 
// Include the footer part of the HTML page
include("view/footer.php"); 
?>