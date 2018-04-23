<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta name="author" content="Ahmet Muratdagi">
        <meta charset="UTF-8">
        <title>gar-update-auto2.php</title>
    </head>
    <body>
        <h1>garage update auto 2</h1>
        <p>
            Dit formulier wordt gebruikt om autogegevens te wijzigen
            in de tabel klant van de database auto.
        </p>
        <?php
            // klantid uit het formulier halen -----------------------------------------
            $klantid = $_POST["klantidvak"];

            // klantgegevens uit de tabel halen ----------------------------------------
            require_once "gar-connect.php";

            $autos = $conn->prepare("
                                  SELECT autokenteken,
                                           automerk,
                                           autotype,
                                           autokmstand,
                                           klantid
                                     FROM  auto
                                     WHERE klantid = :klantid        
                                   ");
            $autos->execute(["klantid" => $klantid]);

            // klantgegevens in een nieuw formulier laten zien --------------------------
            echo "<form action='gar-update-auto3.php' method='post'>";
                foreach($autos as $auto)
                {
                    // klantid mag niet gewijzigd worden
                    echo " klantid:" . $auto["klantid"];
                    echo " <input type='hidden' name='klantidvak' ";
                    echo " value=' " . $auto["klantid"] . " '> <br /> ";

                    echo " autokenteken: <input type='text' ";
                    echo " name = 'autokentekenvak' ";
                    echo " value = '" .$auto["autokenteken"]. "' ";
                    echo " > <br />";

                    echo " automerk: <input type='text' ";
                    echo " name = 'automerkvak' ";
                    echo " value = '" .$auto["automerk"]. "' ";
                    echo " > <br />";

                    echo " autotype: <input type='text' ";
                    echo " name = 'autotypevak' ";
                    echo " value = '" .$auto["autotype"]. "' ";
                    echo " > <br />";

                    echo " autokmstand: <input type='text' ";
                    echo " name = 'autokmstandvak' ";
                    echo " value = '" .$auto["autokmstand"]. "' ";
                    echo " > <br />";

                }
                echo "<input type='submit'>";
            echo "</form>";

            ?>
    </body>
</html>