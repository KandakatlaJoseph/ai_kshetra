<?php
include 'db.php';

echo "<h2>Build with AI Registrations</h2>";
$result = $conn->query("SELECT * FROM registrations_build_with_ai ORDER BY id DESC LIMIT 1");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. "<br>";
        echo "Member 1: " . $row["member1_name"] . " (" . $row["member1_college"] . ", " . $row["member1_roll"] . ")<br>";
        echo "Member 2: " . $row["member2_name"] . " (" . $row["member2_college"] . ", " . $row["member2_roll"] . ")<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
