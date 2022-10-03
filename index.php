<?php
require_once("database/connection.php");
$title = "Upload index";
if (isset($_POST["add-image"])) {
    var_dump($_FILES["photo"]);
    $data = [
        "title" => htmlentities($_POST["title"]),

    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="add-images">
            <h1>Ajouter une image</h1>
            <div class="add-images__form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="title">Nom de la photo</label>
                        <input type="text" name="title" id="title">
                    </div>
                    <div>
                        <label for="photo">Choisir une photo</label>
                        <input type="file" accept="image/png, image/jpeg" name="photo" id="photo">
                    </div>
                    <button type="submit" name="add-image">Envoyer la photo</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>