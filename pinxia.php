<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pinxia";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchQuery = "";
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    $sql = "SELECT name, description, price FROM menu WHERE name LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
    $result = $conn->query($sql);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinxia</title>
    <style>
        /* Pink Theme CSS */
        /* Body */
        body {
            font-family: 'Architects Daughter', cursive;
            margin: 0;
            padding: 0;
            background-color: #ffd1dc; /* Pastel pink */
            color: #333;
            text-align: center; /* Center align content */
            font-size: 17px;
        }

        header, footer {
            background-color: #ffb6c1; /* Light pastel pink */
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: relative; /* Added for absolute positioning of logo */
        }

        nav {
            background-color: #ffc0cb; /* Lighter pastel pink */
            padding: 10px 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin: 0 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ffb6c1; /* Light pastel pink border */
        }

        th {
            background-color: #ffb6c1; /* Light pastel pink */
            color: #fff;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .small-image {
            width: 350px;
            height: 350px;
        }

        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 100px; /* Adjusted size */
            height: auto;
        }

        /* Styles for search bar */
        .search-container {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .search-container input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
        }

        .search-container button {
            padding: 6px 10px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
            cursor: pointer;
            background: #ffd1dc; 
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .search-container button:hover {
            background: #ffd1dc; 
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        #home {
            animation: fadeIn 2s ease-in-out;
        }

    </style>
</head>
<body>
    <header>
        <img src="logo.png" alt="Logo" class="logo">
        <h1>PINXIA DELIGHT RESTAURANT</h1>
        <!-- Search bar -->
        <div class="search-container">
            <form method="get" action="">
                <input id="searchInput" type="text" name="query" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="Menu.html">Menu</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="discount.html">Discount</a></li>
            <li><a href="specials.html">Specials</a></li>
            <li><a href="schedule.html">Schedule</a></li>
            <li><a href="events.html">Events</a></li>
            <li><a href="owner.html">Owner</a></li> 
        </ul>
    </nav>
    <main>
        <section id="home">
            <h2>Selamat Datang di Pinxia Delight Restaurant!</h2>
            <img class="small-image" src="pinxiaa.png" alt="Pinxiaa">
            <p>Kami menawarkan berbagai macam hidangan lezat yang disajikan dengan cinta.</p>
            <p>Lihat <a href="Menu.html">Menu</a> untuk menjelajahi spesialisasi kami!!</p>
        </section>
        <section id="search-results">
            <?php
            if (!empty($searchQuery)) {
                if ($result->num_rows > 0) {
                    echo "<table><tr><th>Name</th><th>Description</th><th>Price</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["description"]. "</td><td>" . $row["price"]. "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No results found";
                }
            }
            ?>
        </section>
    </main>
    <footer>
        <p>Follow us on <a href="https://www.instagram.com/pinxiadelight">Instagram</a> for more updates!</p>
        <p>Copyright © 2024 Pinxia Corporation All Rights Reserved.</p>
    </footer>
</body>
</html>
