<!doctype html>
<html lang="nl">
<head>

    <meta name="charset" content="Ahmet Muratdagi">
    <meta charset="UTF-8">
    <title>gar-update-auto3.php</title>
</head>
<body>
    <h1>garage update auto 3</h1>
    <p>
        Autogegevens wijzigen in de tabel
        auto van de database garage.
    </p>
    <?php
        //klantgegevens uit het formulier halen--------------------
        $klantid        = $_POST["klantidvak"];
        $autokenteken   = $_POST["autokentekenvak"];
        $automerk       = $_POST["automerkvak"];
        $autotype       = $_POST["autotypevak"];
        $autokmstand    = $_POST["autokmstandvak"];

        // updaten klantgegevens -----------------------------------
        require_once "gar-connect.php";

        $sql = $conn->prepare
        ("
            update auto set    autokenteken   = :autokenteken,
                                automerk       = :automerk,
                                autotype       = :autotype,
                                autokmstand    = :autokmstand
                                where klantid = :klantid
                                
        ");

        $sql->execute
        ([
            "klantid"       => $klantid,
            "autokenteken"  => $autokenteken,
            "automerk"      => $automerk,
            "autotype"      => $autotype,
            "autokmstand"   => $autokmstand

        ]);

        echo "De auto is gewijzigd. <br />";
        echo "<a href='gar-menu.php'> Terug naar het menu <a/>";
    ?>

    </body>
</html>