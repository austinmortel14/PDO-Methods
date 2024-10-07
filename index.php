<?php require_once 'core/db_config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Methods</title>
</head>
<body>
<?php

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to database successfully";
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

//Fetch all records using fetchAll()
$stmt = $pdo->query("SELECT * FROM friends");
$friends = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($friends);
echo "</pre>";

//Fetch a single record using fetch()
$stmt = $pdo->query("SELECT * FROM friends WHERE FriendID = 1");
$friend = $stmt->fetch(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($friend);
echo "</pre>";

//Insert a new record
$stmt = $pdo->prepare("INSERT INTO friends (FriendWhoAdded, FriendBeingAdded, IsAccepted) VALUES (?, ?, ?)");
$stmt->execute([]);
echo "New record inserted successfully";

//Delete a record
$stmt = $pdo->prepare("DELETE FROM friends WHERE FriendID = ?");
$stmt->execute([]); 
echo "Record deleted successfully";

//Update a record
$stmt = $pdo->prepare("UPDATE friends SET IsAccepted = 1 WHERE FriendID = 2");
$stmt->execute();
echo "Record updated successfully";

//Render query result set in an HTML table
$stmt = $pdo->query("SELECT FriendID, FriendWhoAdded, FriendBeingAdded, IsAccepted FROM friends");
$friends = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
echo "<tr><th>FriendID</th><th>FriendWhoAdded</th><th>FriendBeingAdded</th><th>IsAccepted</th></tr>";
foreach ($friends as $friend) {
    echo "<tr>";
    echo "<td>" . $friend['FriendID'] . "</td>";
    echo "<td>" . $friend['FriendWhoAdded'] . "</td>";
    echo "<td>" . $friend['FriendBeingAdded'] . "</td>";
    echo "<td>" . ($friend['IsAccepted'] ? "Yes" : "No") . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>