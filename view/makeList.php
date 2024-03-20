<?php 
// Include the header part of the HTML page
include("view/header.php"); 
?>

<!-- Display makes -->
<?php if (!empty($makes)) : ?> <!-- Check if there are any makes to display -->
    <section id="list" class="list">
        <header>
            <h1>make List</h1>
        </header>
        <!-- Loop through the makes and display each one -->
        <?php foreach ($makes as $make) : ?>
            <div class="list__row">
                <div class="list__item">
                    <!-- Display the make name -->
                    <p class="bold"><?= htmlspecialchars($make['Make']) ?></p>
                </div>
                <div class="list__removed">
                    <!-- Form to delete the make -->
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_make">
                        <input type="hidden" name="makeID" value="<?= $make['ID'] ?>">
                        <button class="remove-button">X</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php else : ?>
    <!-- Display a message if no makes exist -->
    <p>No makes exist yet</p>
<?php endif; ?>

<!-- Add make Form -->
<section>
    <h2>Add make</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_make">
        <div class="add__inputs">
            <label>make:</label>
            <!-- Input for the new make name -->
            <input type="text" name="make" maxlength="30" placeholder="Name" autofocus required>
        </div>
        <div class="add__addItem">
            <!-- Button to submit the form and add a new make -->
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