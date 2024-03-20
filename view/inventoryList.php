<?php 
include('view/header.php'); // Include the header part of the HTML page

?>

<!-- Section to Display vehicles -->
<section>
<h1>Filter</h1>
    <!-- Form for Filtering Vehicles by category -->
    <form action="." method="get">
        <select name="filterBy">
            <option value="0">class</option>
            <option value="0">make</option>
            <option value="0">type</option>
        </select>

        <button type="submit">Go</button> <!-- Submit button for the filter form -->
    </form>
    <!-- Check if there are to dos to display (fetched from index.php) -->
    <?php if ($vehicles) : ?>
        <!-- Loop through each to do and display it -->
        <?php foreach ($vehicles as $vehicle) : ?>
            <div>
            <p><strong><?= htmlspecialchars($vehicle['year']) ?></strong></p> <!-- Display the to do category -->
                <p><strong><?= htmlspecialchars($vehicle['Model']) ?></strong></p> <!-- Display the to do name -->
                <p><?= htmlspecialchars($vehicle['Price']) ?></p> <!-- Display the to do description -->
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <!-- Message displayed if no to do's exist -->
        <p>No vehicles exist yet.</p>
    <?php endif; ?>
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