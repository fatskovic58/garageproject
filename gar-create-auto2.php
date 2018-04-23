<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta name="author" content="Ahmet Muratdagi">
        <meta charset="UTF-8">
        <title>gar-create-auto2.php</title>
    </head>
    <body>
        <h1>garage create auto 2</h1>
        <p>
            Een auto toevoegen aan de tabel
            auto in de database garage.
        </p>
        <?php
            // klantgegevens uit het formulier halen ---------------------------------
            $autokenteken       = $_POST["autokentekenvak"];
            $automerk           = $_POST["automerkvak"];
            $autotype           = $_POST["autotypevak"];
            $autokmstand        = $_POST["autokmstandvak"];
            $klantid            = $_POST["klantidvak"];

            // klantgegvens invoeren in de tabel -------------------------------------
            require_once "gar-connect.php";

            $sql = $conn->prepare("
                                    INSERT INTO auto VALUES
                                    (
                                        :autokenteken, :automerk, :autotype,
                                        :autokmstand, :klantid
                                    )
                                  ");
            // manier 2 --------------------------------------------------------------
            $sql->execute([
                            "autokenteken"  => $autokenteken,
                            "automerk"      => $automerk,
                            "autotype"      => $autotype,
                            "autokmstand"   => $autokmstand,
                            "klantid"       => $klantid
            ]);

            echo "De auto is toegevoegd <br />";
            echo "<a href='gar-menu.php'> Terug naar het menu </a>";
        ?>
    </body>
</html>