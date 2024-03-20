<?php 
include('../view/header.php'); // Include the header part of the HTML page

?>

<!-- Section to Display vehicles -->
<section>
<h1>Sort by:</h1>
    <!-- Form for Filtering Vehicles by category -->
    <form action="." method="get">
        <input type="radio" value="V.price" id="price" name="sortBy" >
        <label for="price">Price</label><br>
        <input type="radio" value="V.year" id="year" name="sortBy" >
        <label for="year">Year</label><br>
        <button type="submit">Go</button> <!-- Submit button for the filter form -->
    </form>
    <!-- Form for Filtering Vehicles by category -->
    <form action="." method="get">
        <select name="classID">
            <option value="0">Filter by class</option>
            <?php foreach ($classes as $class) : ?>
                <!-- Dynamically generate options for categories, mark selected based on current filter -->
                <option value="<?= $class['ID'] ?>" <?= $classID == $class['ID'] ? 'selected' : '' ?>>
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
                <option value="<?= $make['ID'] ?>" <?= $makes == $make['ID'] ? 'selected' : '' ?>>
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
                <option value="<?= $type['ID'] ?>" <?= $types == $type['ID'] ? 'selected' : '' ?>>
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
            <th>Year</th><th>Make</th><th>Model</th>
            <th>Type</th><th>Class</th><th>Price</th><th>Delete</th>
            </tr>
        <?php foreach ($vehicles as $vehicle) : ?>
            <tr>
            <th><?= htmlspecialchars($vehicle['year']) ?></th> <!-- Display the vehicle year -->
            <th><?= htmlspecialchars($vehicle['Make']) ?></th> <!-- Display the vehicle make -->
            <th><?= htmlspecialchars($vehicle['model']) ?></th> <!-- Display the vehicle model -->
            <th><?= htmlspecialchars($vehicle['Type']) ?></th> <!-- Display the vehicle type -->
            <th><?= htmlspecialchars($vehicle['Class']) ?></th> <!-- Display the vehicle class -->
            <th><?= htmlspecialchars($vehicle['price']) ?></th> <!-- Display the vehicle price -->
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

<!-- Link to View/Edit classes Page -->
<p><a href=".?action=add_vehicles">View/Edit vehicles</a></p>
<!-- Link to View/Edit classes Page -->
<p><a href=".?action=list_classes">View/Edit classes</a></p>
<!-- Link to View/Edit makes Page -->
<p><a href=".?action=list_makes">View/Edit makes</a></p>
<!-- Link to View/Edit types Page -->
<p><a href=".?action=list_types">View/Edit types</a></p>

<?php 
include('../view/footer.php'); // Include the footer part of the HTML page
?>