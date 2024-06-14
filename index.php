<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>My Shop</title>
</head>
<body>
    <div class="container my-5">
        <h2> List of Clients </h2>
        <a class="btn btn-primary" href="/myshop/create.php" role="button">New Client</a>
        <br>
        <table class="table">
            <thread>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop";

                //connection
                $connection = new mysqli($servername, $username, $password, $database);

                // check
                if($connection->connect_error){
                    die("Connection failed: " . $connection->connect_error);
                }

                //read all data
                $sql= "SELECT * FROM clients";
                $result = $connection->query($sql);

                if(!$result){
                    die("Invalid query: " . $connection->error);
                }

                //read data of each row
                while($row = $result->fetch_assoc()){
                    echo "
                     <tr>
                        <th>$row[id]</th>
                        <th>$row[name]</th>
                        <th>$row[email]</th>
                        <th>$row[phone]</th>
                        <th>$row[address]</th>
                        <th>$row[created_at]</th>
                        <td>
                            <a class= 'btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'>Edit</a>
                            <a class= 'btn btn-primary btn-sm' href='/myshop/delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
            ?>
               
            </tbody>
    </table>
</div>
    
</body>
</html>