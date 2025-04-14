<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ramayanaquiz";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT id, username, score, submitted_at FROM quiz_responses ORDER BY score DESC, submitted_at ASC LIMIT 10");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramayana Quiz Leaderboard</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background: linear-gradient(135deg, #4a0000, #800000);
            color: #8b0000;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .container {
            width: 80%;
            margin: 30px auto;
            background: rgba(72, 52, 50, 0.9);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            border: 2px solid #ffd700;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            color: #ffd700;
            text-shadow: 2px 2px 5px #8b0000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: rgba(255, 248, 231, 0.9);
            border: 2px solid #ffd700;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #8b4513;
        }

        th {
            background: #b22222;
            color: #ffd700;
            font-size: 1.2em;
        }

        tr:nth-child(even) {
            background: #ffdab9;
        }

        tr:nth-child(odd) {
            background: #fff8e7;
        }

        .rank {
            font-weight: bold;
            color: #8b0000;
        }

        .score {
            font-weight: bold;
            color: #8b0000;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #ffdab9;
            font-style: italic;
        }

        a {
            color: #ffd700;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
            color: #ff8c00;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Ramayana Quiz Leaderboard</h1>
    <?php
    echo "<table>
    <tr>
        <th>Rank</th>
        <th>Participant ID</th>
        <th>Name</th>
        <th>Score</th>
        <th>Submitted At</th>
    </tr>";

    $rank = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='rank'>" . $rank++ . "</td>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
        echo "<td class='score'>" . htmlspecialchars($row['score']) . "</td>";
        echo "<td>" . htmlspecialchars($row['submitted_at']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <div class="footer">
        Thank you for participating! <a href="index.html">Go back to quiz</a>
    </div>
</div>

</body>
</html>

<?php 
// Close database connection
$conn->close(); 
?>
