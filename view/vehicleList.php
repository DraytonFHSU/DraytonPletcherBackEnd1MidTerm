<?php 
// Include the header part of the HTML page
include("../view/header.php"); 
$classes = get_classes();
$makes = get_makes();
$types = get_types();
?>

<section>
    <h2>Add vehicle</h2>
    <!-- Form for Adding a New vehicle -->
    <form action="." method="post">
        <select name="classID" required>
            <option value="">Class</option>
            <?php foreach ($classes as $class) : ?>
                <!-- Options for selecting class, populated dynamically -->
                <option value="<?= $class['ID'] ?>">
                    <?= htmlspecialchars($class['Class']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <select name="makeID" required>
            <option value="">Make</option>
            <?php foreach ($makes as $make) : ?>
                <!-- Options for selecting make, populated dynamically -->
                <option value="<?= $make['ID'] ?>">
                    <?= htmlspecialchars($make['Make']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <select name="typeID" required>
            <option value="">Type</option>
            <?php foreach ($types as $type) : ?>
                <!-- Options for selecting type, populated dynamically -->
                <option value="<?= $type['ID'] ?>">
                    <?= htmlspecialchars($type['Type']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <!-- Input field for the Vehicle -->
        <input type="text" name="year" maxlength="120" placeholder="Year" required>
        <input type="text" name="model" maxlength="120" placeholder="Model" required>
        <input type="text" name="price" maxlength="120" placeholder="Price" required>
        <button type="submit" name="action" value="add_vehicle">Add</button> <!-- Submit button for adding the vehicle -->
    </form>
</section>

<!-- Link to View/Edit vehicles's -->
<p><a href=".?action=list_vehicles">View/Edit vehicles</a></p>

<?php 
// Include the footer part of the HTML page
include("../view/footer.php"); 
?>