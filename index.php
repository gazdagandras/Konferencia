<?php
session_start();    // felhasználó kezeléshez kell, pont itt!!!

if (isset($_POST['nev'])) {
    echo '<pre>';
    print_r($_POST);
    print_r($_FILES);
    echo '</pre>';
}
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Konferencia regisztráció</title>
    </head>
    <body>
        <h1>Konferencia regisztráció</h1>

        <form action="index.php" method="post" enctype="multipart/form-data">

            <fieldset>
                <legend>Személyes adatok:</legend>

                <label>Név:</label>
                <input type="text" name="nev" placeholder="Az Ön neve">
                <br>

                <label>Neme:</label>
                <input type="radio" name="neme" value="ferfi" checked>Férfi
                <input type="radio" name="neme" value="no">Nő
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
                    <option value="dombovar">Dombóvár</option>
                    <option value="kaposvar">Kaposvár</option>
                    <option value="pecs">Pécs</option>
                    <option value="zselickislak">Zselickislak</option>
                    <option value="egyeb">Egyéb</option>
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
