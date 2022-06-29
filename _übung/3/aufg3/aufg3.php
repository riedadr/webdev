<!DOCTYPE html>
<html lang="en">


<?php include 'header.html'; ?>


<body>
    <header>
        <h1>
            Web-Dev 1: Ü3/3
        </h1>
        <a href="/" title="Startseite">
            <img src="/icons/house-solid.svg" alt="Home">
        </a>
    </header>
    <main>

        <h1>Deutsche Bahn</h1>
        <h2>Regionalbereiche</h2>
        <ol>

            <?php
            #phpinfo();
            include("db.php");

            $query = "SELECT * FROM `RegionalBereich`";
            $result = mysqli_query($db, $query);

            #print_r(mysqli_fetch_all($result));
            while ($data = mysqli_fetch_array($result)) {
                echo <<<TEXT
                    <li value="{$data['id']}"><a href="management.php?regio={$data['id']}&rb={$data['RB']}">{$data['RB']}</a></li>\n
                TEXT;
            }


            mysqli_close($db);

            ?>
        </ol>
    </main>
</body>

</html>