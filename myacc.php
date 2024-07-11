<?php
            // Include the database connection
            include 'db.php';

            // Fetch entries from the database
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            
                            <td><img src='uploads/{$row['image']}' width='100'></td>
                            <td><a href='delete.php?id={$row['id']}'>Delete</a></td>
                            <td><a href='update.php?id={$row['id']}'>Update</a></td>
                            </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No entries found</td></tr>";
            }
            $mysqli->close();
            ?>
