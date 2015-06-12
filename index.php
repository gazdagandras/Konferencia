<?php
session_start();    // felhasználó kezeléshez kell, pont itt!!!

$uzenetek = '';

if (isset($_POST['nev'])) {
//    echo '<pre>';
//    print_r($_POST);
//    print_r($_FILES);
//    echo '</pre>';

    // Adatbázis kapcsolódás:
    $db = mysqli_connect('localhost', 'root', '', 'konferencia');
    if (mysqli_connect_errno()) {
        die(mysqli_connect_error());
    }

    mysqli_set_charset($db, 'utf8');

    // Űrlapadatok kigyűjtése:
    $nev = mysqli_real_escape_string($db, $_POST['nev']);
    $neme = mysqli_real_escape_string($db, $_POST['neme']);
    $varos = mysqli_real_escape_string($db, $_POST['varos']);
    $szuletes = mysqli_real_escape_string($db, $_POST['szuletes']);
    $megjegyzes = mysqli_real_escape_string($db, $_POST['megjegyzes']);

    $reggeli = (isset($_POST['reggeli'])) ? 1 : 0;
    $ebed = (isset($_POST['ebed'])) ? 1 : 0;
    $vacsora = (isset($_POST['vacsora'])) ? 1 : 0;

    // Validálás: csak akkor dolgozunk, ha minden ok!
    if (strlen($nev) > 0) { // a név nem üres
        // TODO: fájl feltöltése
        $profilkep = $_FILES['profilkep']['name'];
        move_uploaded_file($_FILES['profilkep']['tmp_name'], 'profilkepek/' . $profilkep);

        // SQL lekérdezés futtatása:
        $sql = "INSERT INTO `regisztraciok` "
                . "(nev,neme,varos,szulido,megjegyzes,reggeli,ebed,vacsora,profilkep) VALUES "
                . "('$nev','$neme','$varos','$szuletes','$megjegyzes',$reggeli,$ebed,"
                . "$vacsora,'$profilkep')";
//        echo $sql;
        mysqli_query($db, $sql);
        if (mysqli_errno($db)) {
            die(mysqli_error($db));
        }
        
        // Minden ok, regisztráltunk:
        $uzenetek .= '<p style="color: green"><b>Sikeres regisztráció!</b></p>';
    } else {
        // A név nincs kitöltve, hiba:
        $uzenetek .=  '<p style="color: red"><b>A név kitöltése kötelező!</b></p>';
    }

    // Adatbázis kapcsolat bezárása:
    mysqli_close($db);
}
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Konferencia regisztráció</title>
    </head>
    <body>
        <h1>Konferencia regisztráció</h1>

        <?php
        echo $uzenetek;
        ?>
        
        <form action="index.php" method="post" enctype="multipart/form-data">

            <fieldset>
                <legend>Személyes adatok:</legend>

                <label>Név:</label>
                <input type="text" name="nev" placeholder="Az Ön neve">
                <br>

                <label>Neme:</label>
                <input type="radio" name="neme" value="férfi" checked>Férfi
                <input type="radio" name="neme" value="nő">Nő
                <br>

                <label>Város:</label>
                <select name="varos">
<?php
// Adatbázis kérés
// ...
//                        while ($row = $result->fetch_assoc) {
//                            echo '<option value="'.$row['id'].'">'.$row['varosnev'].'</option>';
//                        }
?>
                    <option value=""></option>
                    <option value="Dombóvár">Dombóvár</option>
                    <option value="Kaposvár">Kaposvár</option>
                    <option value="Pécs">Pécs</option>
                    <option value="Zselickislak">Zselickislak</option>
                    <option value="Egyéb">Egyéb</option>
                </select>
                <br>

                <label>Születési idő:</label>
                <input type="date" name="szuletes">
                <br>

                <label>Profilkép:</label>
                <input type="file" name="profilkep">

            </fieldset>

            <fieldset>
                <legend>Regisztráció adatai:</legend>

                <label>Megjegyzés:</label>
                <br>
                <textarea name="megjegyzes" rows="6" cols="70"></textarea>
                <br>

                <label>Étkezés:</label>
                <br>
                <input type="checkbox" name="reggeli">Reggeli
                <input type="checkbox" name="ebed">Ebéd
                <input type="checkbox" name="vacsora">Vacsora

            </fieldset>

            <br>
            <input type="submit" value="Regisztráció">
        </form>

    </body>
</html>
