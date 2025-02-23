<?php
// Connect to the database
$host = "localhost"; // Change this if using a remote database
$user = "root"; // Your database username
$pass = ""; // Your database password (default is empty for XAMPP)
$dbname = "bincom_test"; // Name of your imported database

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch polling units for the dropdown
$polling_units = $conn->query("SELECT uniqueid, polling_unit_name FROM polling_unit");

// Handle form submission
$results = [];
if (isset($_POST['polling_unit_id'])) {
    $polling_unit_id = $_POST['polling_unit_id'];
    $query = "SELECT * FROM announced_pu_results WHERE polling_unit_uniqueid = '$polling_unit_id'";
    $results = $conn->query($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polling Unit Results</title>
</head>
<body>
    <h2>Select Polling Unit</h2>
    <form method="POST">
        <select name="polling_unit_id">
            <option value="">-- Choose a polling unit --</option>
            <?php while ($row = $polling_units->fetch_assoc()): ?>
                <option value="<?= $row['uniqueid'] ?>"><?= $row['polling_unit_name'] ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit">Get Results</button>
    </form>

    <?php if (!empty($results)): ?>
        <h3>Results:</h3>
        <table border="1">
            <tr>
                <th>Party</th>
                <th>Score</th>
            </tr>
            <?php while ($row = $results->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['party_abbreviation'] ?></td>
                    <td><?= $row['party_score'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
