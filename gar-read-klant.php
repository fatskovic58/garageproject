<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta name="author" content="Ahmet Muratdagi">
        <meta charset="UTF-8">
        <title>gar-read-klant.php</title>
    </head>
    <body>
        <h1>garage read klant</h1>
        <p>
            Dit zijn alle gegevens uit de
            tabel klanten van de database garage.
        </p>
        <?php
        require_once "gar-connect.php";

        $sql = $conn->prepare("
                                SELECT klantid,
                                       klantnaam,
                                       klantadres,
                                       klantpostcode,
                                       klantplaats
                                  FROM klant
                                   ");
        $sql->execute();

        echo "<table>";
            foreach($sql as $rij)
            {
                echo "<tr>";
                echo "<td>" . $rij["klantid"]                   . "</td>";
                echo "<td>" . $rij["klantnaam"]                 . "</td>";
                echo "<td>" . $rij["klantadres"]                . "</td>";
                echo "<td>" . $rij["klantpostcode"]             . "</td>";
                echo "<td>" . $rij["klantplaats"]               . "</td>";
            }
        echo "</table>";
        echo "<a href='gar-menu.php'> Terug naar het menu </a>";
        ?>
    </body>
</html>