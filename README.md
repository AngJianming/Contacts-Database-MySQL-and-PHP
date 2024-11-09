# Contacts-Database-MySQL-and-PHP

Contacts Database is just a way to manage your personal or professional contacts with a Responsive and Professional User Interface

## Table of Contents

| no |                                 Contents                                                |
|----|                                   ----                                                  |
| 1. | Database and Table setup                                                                |
| 2. | Create a web form                                                                       |
| 3. | Process the web form – to store the input into Database (using PHP and mySQL Query)     |
| 4. | Display the data from the database table on the PHP page                                |

## Create a database, table, fields in PHPMyAdmin using xampp server or wamp server

1. Run WAMP/XAMPP.

2. Open phpMyAdmin in your browser.
 myaddressbook

![Creating myaddressbook Database](/img/1.png)
3. Create a database named myaddressbook. Similar e.g like below V<br><br>
 **contacts**<br>
    id(primary key, INT, auto increment)<br>
    contact_name (VARCHAR, 255)<br>
    contact_phone (VARCHAR, 50)<br>
    contact_email (VARCHAR, 255)<br>
    contact_address (TEXT)<br>
    contact_gender (VARCHAR, 10)<br>
    contact_relationship (VARCHAR, 10)<br>
    contact_dob (DATE)<br><br>

4. Within the myaddressbook database, create a table named contacts.

5. Add the table fields as shown in the diagram above.

### Steps

1) Create a new project folder in the server root
directory and name it myaddressbook.

2) Open Visual Studio Code and access the newly
created myaddressbook folder.

3) Create a PHP file within the myaddressbook folder
and name it addNewContact.php.

4) Use the form structure from the previous lab exercise
in the addNewContact.php file

5) Create another PHP file in the myaddressbook folder and name it conn.php.

6) Add the following code to the conn.php file:
```php
<?php
$con = mysqli_connect("localhost", "root", "", "myaddressbook");
//                     localweb | userid | pass | name           
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
```

![MySQL Connection](/img/2.png)

7) Add the following code to insert data into the database in the addNewContact.php file
```php
<?php
if (isset($_POST['submitBtn'])) {
    include("conn.php");
    $sql = "INSERT INTO contacts (contact_name, contact_phone, contact_email,
        contact_address, contact_gender, contact_relationship, contact_dob)
        VALUES
        ('$_POST[contact_name]','$_POST[contact_phone]','$_POST[contact_email]',
        '$_POST[contact_address]','$_POST[contact_gender]','$_POST[contact_relationship]',
        '$_POST[contact_dob]')";
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    } else {
        echo '<script>alert("1 record added!");
            window.location.href = "viewContacts.php";
            </script>';
    }
    mysqli_close($con);
}
?>
```

![Code](/img/3.png)

8) Create another PHP file in the myaddressbook folder and name it 
viewContact.php. Add the following code to the viewContact.php file:
```php
<?php
include("conn.php");
if (!empty($name)) {
    $sql = "SELECT * FROM contacts WHERE contact_name = '$name'";
} else {
    $sql = "SELECT * FROM contacts";
}
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    if ($row['contact_gender'] == "male") {
        $img = "/img/Male.png";
    } else {
        $img = "/img/Female.jpg";
    }
    echo '<div>';
    echo "<img src=$img>";
    echo '<h3>' . $row['contact_name'] . '</h3>';
    echo '<p>Phone Number:<br>' . $row['contact_phone'] . '</p>';
    echo '<p>Email:<br>' . $row['contact_email'] . '</p>';
    echo '<p>Home Address:<br>' . $row['contact_address'] . '</p>';
    echo '<p>Relationship:<br>' . $row['contact_relationship'] . '</p>';
    echo '<p>Date of Birth:<br>' . $row['contact_dob'] . '</p>';
    echo '<form method="POST" action="">';
    echo '<button type="submit" name="deleteBtn" value="' . $row['id'] . '">Delete</button>';
    echo '</form>';
    echo '</div>';
}
?>
```
![Code](/img/4.png)

9) View the page in your browser. Enter the data in the form by accessing 
the addNewContact.php page.

![Code](/img/5.png)

## Contribution
Lemme know if there is any problem with this, feel free to fork this repo and contribute any known bug that you found in this repo :)