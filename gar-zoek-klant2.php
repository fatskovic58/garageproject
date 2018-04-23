<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta name="author" content="Ahmet Muratdagi">
        <meta charset="UTF-8">
        <title>gar-zoek-klant2.php</title>
    </head>
    <body>
        <h1>garage zoek op klantid 2</h1>
        <p>
            Op klantid gegevens zoeken uit de
            tabel klanten van de database garage.
        </p>
        <?php
            // klantid uit het formulier halen -----------------------------------------
            $klantid = $_POST["klantidvak"];

            // klantgegevens uit de tabel halen ----------------------------------------
            require_once "gar-connect.php";

            $sql = $conn->prepare("
                                   SELECT klantid,
                                           klantnaam,
                                           klantadres,
                                           klantpostcode,
                                           klantplaats
                                     FROM  klant
                                     WHERE klantid = :klantid       
                                   ");
            $sql->execute(["klantid" => $klantid]);

            // klantgegevens laten zien -----------------------------------------------
            echo "<table>";
            foreach($sql as $rij)
            {
                echo "<tr>";
                    echo "<td>" . $rij["klantid"]                     . "</td>";
                    echo "<td>" . $rij["klantnaam"]                   . "</td>";
                    echo "<td>" . $rij["klantadres"]                  . "</td>";
                    echo "<td>" . $rij["klantpostcode"]               . "</td>";
                    echo "<td>" . $rij["klantplaats"]                 . "</td>";
                echo "</tr>";
            }
            echo "</table><br />";
            echo "<a href='gar-menu.php'> Terug naar het menu </a>";

            ?>
    </body>
</html>