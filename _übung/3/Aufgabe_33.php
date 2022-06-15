<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Deutsche Bahn</h1>
    <?php 
        #phpinfo();
        $servername = "sql.t2.cit116.xyz";
        $username = "db";
        $password = "webdev2022";
        $dbname = "deutschebahn";

        $db = mysqli_connect($servername, $username, $password, $dbname);
        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }
        print_r($db);

        $sql = "SELECT * FROM `RegionalBereich`";
        $result = mysqli_query($db, $sql);

        #print_r(mysqli_fetch_all($result));
        while ($data = mysqli_fetch_array($result)) {
            echo "<a href='{$_SERVER['PHP_SELF']}?regio={$data['id']}'>{$data["RB"]}</a></br>\n";
        }


        mysqli_close($db);

    ?>
</body>
</html>