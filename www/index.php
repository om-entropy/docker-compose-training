<html>
 <head>
  <title>Hello...</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Hi! I'm happy</h1>

    <?php
    $conn = mysqli_connect('db', 'user', 'test', 'myDb');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        echo("hhh");
        $query = "SELECT * From Person";
        $result = mysqli_query($conn, $query);

        echo '<table class="table table-striped">';
        echo '<thead><tr><th></th><th>id</th><th>name</th></tr></thead>';
        while($value = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
            foreach($value as $element){
                echo '<td>' . $element . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        $result->close();
        mysqli_close($conn);
    }
    ?>

    <hr>
    <h2>Data from PostgreSQL:</h2>
    
    <?php
    $pg_host = 'postgres';
    $pg_port = '5432';
    $pg_dbname = 'pgdatabase';
    $pg_user = 'pguser';
    $pg_password = 'pgpassword';

    try {
        $dsn = "pgsql:host=$pg_host;port=$pg_port;dbname=$pg_dbname";
        $pdo = new PDO($dsn, $pg_user, $pg_password);
        
        $stmt = $pdo->query("SELECT * FROM messages");
        
        echo '<table class="table table-striped">';
        echo '<thead><tr><th>id</th><th>content</th></tr></thead>';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr><td>' . $row['id'] . '</td><td>' . $row['content'] . '</td></tr>';
        }
        echo '</table>';
    } catch (PDOException $e) {
        echo "Ошибка подключения к PG: " . $e->getMessage();
    }
    ?>

    </div>
</body>
</html>