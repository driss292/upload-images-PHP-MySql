<?php
require_once("database/connection.php");
$title = "Upload index";
if (isset($_POST["add-image"])) {
    $dataImages = [
        "img_link" => 'images/' . $_FILES["image"]["name"],
        "img_file" => $_FILES["image"]["tmp_name"]
    ];
    $data = [
        "title" => htmlspecialchars($_POST["title"]),
        "img_link" => $dataImages["img_link"],
    ];
    move_uploaded_file($dataImages["img_file"], $dataImages["img_link"]);

    $sql = "INSERT INTO images(title,link) VALUE (:title,:img_link)";
    $addImage = $db->prepare($sql);
    $addImage->execute($data);
}

$sqlImages = "SELECT * FROM images";
$getDataImages = $db->prepare($sqlImages);
$getDataImages->execute();
$images = $getDataImages->fetchAll(PDO::FETCH_ASSOC);
// var_dump($images);
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
                        <input type="file" accept="image/png, image/jpeg" name="image" id="photo">
                    </div>
                    <button type="submit" name="add-image">Envoyer la photo</button>
                </form>
            </div>
        </div>
        <div class="show-images">
            <?php foreach ($images as $image) { ?>
                <div class="polaroid">
                    <div class="polaroid__image">
                        <img src="<?= $image["link"] ?>" alt="<?= $image["title"] ?>">
                    </div>
                    <p><?= $image["title"] ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>