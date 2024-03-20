<?php 
include('view/header.php'); // Include the header part of the HTML page

?>

<!-- Section to Display vehicles -->
<section>
<h1>Sort by:</h1>
    <!-- Form for Filtering Vehicles by category -->
    <form action="." method="get">
        <select name="classID">
            <option value="0">Filter by class</option>
            <?php foreach ($classes as $class) : ?>
                <!-- Dynamically generate options for categories, mark selected based on current filter -->
                <option value="<?= $class['Class'] ?>" <?= $classes == $class['Class'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($class['Class']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Go</button> <!-- Submit button for the filter form -->
    </form>
    <!-- Form for Filtering Vehicles by category -->
    <form action="." method="get">
        <select name="makeID">
            <option value="0">Filter by make</option>
            <?php foreach ($makes as $make) : ?>
                <!-- Dynamically generate options for categories, mark selected based on current filter -->
                <option value="<?= $make['Make'] ?>" <?= $makes == $make['Make'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($make['Make']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Go</button> <!-- Submit button for the filter form -->
    </form>
    <!-- Form for Filtering Vehicles by category -->
    <form action="." method="get">
        <select name="typeID">
            <option value="0">Filter by Type</option>
            <?php foreach ($types as $type) : ?>
                <!-- Dynamically generate options for categories, mark selected based on current filter -->
                <option value="<?= $type['Type'] ?>" <?= $types == $type['Type'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($type['Type']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Go</button> <!-- Submit button for the filter form -->
    </form>
    <!-- Check if there are vehicles to display (fetched from index.php) -->
    <?php if ($vehicles) : ?>
        <!-- Loop through each vehicle and display it -->
        <table>
            <tr>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Class</th>
            <th>Price</th>
            <th>Delete</th>
            </tr>
        <?php foreach ($vehicles as $vehicle) : ?>
            <tr>
            <th><?= htmlspecialchars($vehicle['year']) ?></th> <!-- Display the vehicle category -->
            <th><?= htmlspecialchars($make['Make']) ?></th> <!-- Display the vehicle name -->
            <th><?= htmlspecialchars($vehicle['model']) ?></th> <!-- Display the vehicle description -->
            <th><?= htmlspecialchars($type['Type']) ?></th> <!-- Display the vehicle category -->
            <th><?= htmlspecialchars($class['Class']) ?></th> <!-- Display the vehicle name -->
            <th><?= htmlspecialchars($vehicle['price']) ?></th> <!-- Display the vehicle description -->
            <th>
            <!-- Form to delete the vehicle, with hidden inputs for passing data -->
            <form action="." method="post">
                    <input type="hidden" name="action" value="delete_vehicle">
                    <input type="hidden" name="vehicleID" value="<?= $vehicle['vehicleID'] ?>">
                    <button type="submit">Delete this vehicle</button> <!-- Button to delete the vehicle -->
            </form>
        </th>
        </tr>
        <?php endforeach; ?>
        </table>
    <?php else : ?>
        <!-- Message displayed if no vehicle's exist -->
        <p>No vehicles exist yet.</p>
    <?php endif; ?>
</section>

<section>
    <h2>Add vehicle</h2>
    <!-- Form for Adding a New vehicle -->
    <!-- I'm think this is working because it is displaying all of the classes -->
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
        <!-- Input field for the toDo description -->
        <input type="text" name="year" maxlength="120" placeholder="Year" required>
        <input type="text" name="model" maxlength="120" placeholder="Model" required>
        <input type="text" name="price" maxlength="120" placeholder="Price" required>
        <button type="submit" name="action" value="add_vehicle">Add</button> <!-- Submit button for adding the vehicle -->
    </form>
</section>

<!-- Link to View/Edit classes Page -->
<p><a href=".?action=list_classes">View/Edit classes</a></p>
<!-- Link to View/Edit makes Page -->
<p><a href=".?action=list_makes">View/Edit makes</a></p>
<!-- Link to View/Edit types Page -->
<p><a href=".?action=list_types">View/Edit types</a></p>

<?php 
include('view/footer.php'); // Include the footer part of the HTML page
?>