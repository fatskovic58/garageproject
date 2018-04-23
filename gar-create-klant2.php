<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta name="author" content="Ahmet Muratdagi">
        <meta charset="UTF-8">
        <title>gar-create-klant2.php</title>
    </head>
    <body>
        <h1>garage create klant 2</h1>
        <p>
            Een klant toevoegen aan de tabel
            klant in de database garage.
        </p>
        <?php
            // klantgegevens uit het formulier halen ---------------------------------
            $klantid            = NULL; // komt niet uit het formulier (autoincrement)
            $klantnaam          = $_POST["klantnaamvak"];
            $klantadres         = $_POST["klantadresvak"];
            $klantpostcode      = $_POST["klantpostcodevak"];
            $klantplaats        = $_POST["klantplaatsvak"];

            // klantgegvens invoeren in de tabel -------------------------------------
            require_once "gar-connect.php";

            $sql = $conn->prepare("
                                    INSERT INTO klant VALUES
                                    (
                                        :klantid, :klantnaam, :klantadres,
                                        :klantpostcode, :klantplaats
                                    )
                                  ");
            // manier 2 --------------------------------------------------------------
            $sql->execute([
                            "klantid"       => $klantid,
                            "klantnaam"     => $klantnaam,
                            "klantadres"    => $klantadres,
                            "klantpostcode" => $klantpostcode,
                            "klantplaats"   => $klantplaats
            ]);

            echo "De klant is toegevoegd <br />";
            echo "<a href='gar-menu.php'> Terug naar het menu </a>";
        ?>
    </body>
</html>