<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UgaTours - Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <?php
    include_once "nav.php";
    include_once "db_connection.php"; // Include your database connection file

    // Fetch data from activities table
    $activities_sql = "SELECT * FROM activities";
    $activities_result = $conn->query($activities_sql);

    // Fetch data from cultural_sites table
    $cultural_sites_sql = "SELECT * FROM cultural_sites";
    $cultural_sites_result = $conn->query($cultural_sites_sql);

    // Fetch data from national_parks table
    $national_parks_sql = "SELECT * FROM national_parks";
    $national_parks_result = $conn->query($national_parks_sql);
    ?>

    <main class="container">
        <section class="content">
            <div class="left-section">
                <h3>National Parks</h3>
                <img src="./photos/nationalpark.jpg" alt="National Park Image">

                <?php if ($national_parks_result->num_rows > 0): ?>
                    <ul>
                        <?php while($park = $national_parks_result->fetch_assoc()): ?>
                            <li>
                                <strong><?php echo htmlspecialchars($park['name']); ?></strong><br>
                                <p><?php echo htmlspecialchars($park['description']); ?></p>
                                <p>Location: <?php echo htmlspecialchars($park['location']); ?></p>
                                <p>Highlights: <?php echo htmlspecialchars($park['highlights']); ?></p>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>No national parks found.</p>
                <?php endif; ?>

                <h3>Cultural Sites</h3>
                <img src="./photos/cultural.jpg" alt="Cultural Site Image">

                <?php if ($cultural_sites_result->num_rows > 0): ?>
                    <ul>
                        <?php while($site = $cultural_sites_result->fetch_assoc()): ?>
                            <li>
                                <strong><?php echo htmlspecialchars($site['name']); ?></strong><br>
                                <p><?php echo htmlspecialchars($site['description']); ?></p>
                                <p>Location: <?php echo htmlspecialchars($site['location']); ?></p>
                                <p>Significance: <?php echo htmlspecialchars($site['significance']); ?></p>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>No cultural sites found.</p>
                <?php endif; ?>
            </div>

            <div class="right-section">
                <h3>Tourist Activities</h3>
                <img src="photos/tourists.jpg" alt="Tourist Activities Image">

                <?php if ($activities_result->num_rows > 0): ?>
                    <ul>
                        <?php while($activity = $activities_result->fetch_assoc()): ?>
                            <li>
                                <strong><?php echo htmlspecialchars($activity['name']); ?></strong><br>
                                <p><?php echo htmlspecialchars($activity['description']); ?></p>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>No activities found.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 UgaTours. All rights reserved.</p>
    </footer>
</body>
</html>
