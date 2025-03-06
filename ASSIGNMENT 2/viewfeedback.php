<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campaign_feedback";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

echo "<h1>Feedback Data</h1>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Feedback</th>
            <th>Rating</th>
            <th>Submission Date</th>
        </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['feedback'] . "</td>
                <td>" . $row['rating'] . "</td>
                <td>" . $row['submission_date'] . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No feedback found.</td></tr>";
}

echo "</table>";
$conn->close();
?>