<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta name="author" content="Ahmet Muratdagi">
        <meta charset="UTF-8">
        <title>gar-zoek-auto2.php</title>
    </head>
    <body>
        <h1>garage zoek auto op klantid 2</h1>
        <p>
            Op klantid gegevens zoeken uit de
            tabel auto van de database garage.
        </p>
        <?php
            // klantid uit het formulier halen -----------------------------------------
            $klantid = $_POST["klantidvak"];

            // klantgegevens uit de tabel halen ----------------------------------------
            require_once "gar-connect.php";

            $sql = $conn->prepare("
                                   SELECT autokenteken,
                                           automerk,
                                           autotype,
                                           autokmstand,
                                           klantid
                                     FROM  auto
                                     WHERE klantid = :klantid       
                                   ");
            $sql->execute(["klantid" => $klantid]);

            // klantgegevens laten zien -----------------------------------------------
            echo "<table>";
            foreach($sql as $rij)
            {
                echo "<tr>";
                    echo "<td>" . $rij["klantid"]                        . "</td>";
                    echo "<td>" . $rij["autokenteken"]                   . "</td>";
                    echo "<td>" . $rij["automerk"]                       . "</td>";
                    echo "<td>" . $rij["autotype"]                       . "</td>";
                    echo "<td>" . $rij["autokmstand"]                    . "</td>";
                echo "</tr>";
            }
            echo "</table><br />";
            echo "<a href='gar-menu.php'> Terug naar het menu </a>";

            ?>
    </body>
</html>