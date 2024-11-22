<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <link rel="stylesheet" href="viewContact.css">
</head>

<body>

    <!-- Link to add new contact -->
    <a href="addNewContact.php">Add New Contact</a>

    <!-- Search bar -->
    <div class="search-container">
        <form method="GET" action="">
            <label for="search">Search:</label>
            <input type="text" id="search" name="search" placeholder="Enter name...">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Contact cards -->
    <div class="contact-container">
        <?php
        include('session.php');
        include("conn.php");

        // Check if search is performed
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        // SQL query to search contacts
        $sql = "SELECT * FROM contacts WHERE contact_name LIKE '%$search%'";
        $result = mysqli_query($con, $sql);

        // Loop through and display each contact
        while ($row = mysqli_fetch_array($result)) {
            // Set the image based on gender
            $genderImage = $row['contact_gender'] == 'Male' ? '/img/Male.png' : '/img/Female.png';

            echo "<div class='contact-card'>";
            echo "<img src='$genderImage' alt='{$row['contact_gender']}' class='gender-icon'>";
            echo "<h3>" . htmlspecialchars($row['contact_name']) . "</h3>";
            echo "<p><strong>Phone Number:</strong> " . htmlspecialchars($row['contact_phone']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($row['contact_email']) . "</p>";
            echo "<p><strong>Home Address:</strong> " . htmlspecialchars($row['contact_address']) . "</p>";
            echo "<p><strong>Relationship:</strong> " . htmlspecialchars($row['contact_relationship']) . "</p>";
            echo "<p><strong>Date of Birth:</strong> " . htmlspecialchars($row['contact_DOB']) . "</p>";

            // Delete button form
            echo "<form method='POST' action='deleteContact.php' class='delete-form'>";
            echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>";
            echo "<button type='submit' class='delete-button'>Delete</button>";
            echo "</form>";
            echo '<button type="button" onclick="window.location.href=\'edit.php?id=' . $row['id'] . '\'">Edit</button>';
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>