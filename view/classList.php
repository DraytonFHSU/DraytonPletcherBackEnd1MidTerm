<?php 
// Include the header part of the HTML page
include("../view/header.php"); 
?>

<!-- Display classes -->
<?php if (!empty($classes)) : ?> <!-- Check if there are any classes to display -->
    <section id="list" class="list">
        <header>
            <h1>class List</h1>
        </header>
        <!-- Loop through the classes and display each one -->
        <?php foreach ($classes as $class) : ?>
            <div class="list__row">
                <div class="list__item">
                    <!-- Display the class name -->
                    <p class="bold"><?= htmlspecialchars($class['Class']) ?></p>
                </div>
                <div class="list__removed">
                    <!-- Form to delete the class -->
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_class">
                        <input type="hidden" name="classID" value="<?= $class['ID'] ?>">
                        <button class="remove-button">X</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php else : ?>
    <!-- Display a message if no classes exist -->
    <p>No classes exist yet</p>
<?php endif; ?>

<!-- Add class Form -->
<section>
    <h2>Add class</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_class">
        <div class="add__inputs">
            <label>Class:</label>
            <!-- Input for the new class name -->
            <input type="text" name="class" maxlength="30" placeholder="Name" autofocus required>
        </div>
        <div class="add__addItem">
            <!-- Button to submit the form and add a new class -->
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>

<!-- Link to View/Edit vehicles's -->
<p><a href=".?action=list_vehicles">View/Edit vehicles</a></p>

<?php 
// Include the footer part of the HTML page
include("../view/footer.php"); 
?>