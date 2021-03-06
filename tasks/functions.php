<?php

    $conn = connect();

    function connect(){

        try{
            $servername = "localhost";
            $dbusername = "image_user";
            $dbpassword = "PogChamp";
            $dbname = "image-shuffler";
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
            return $conn;
        }catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    function createImage(){
        global $conn;

        if (!empty($_POST['naam']) && isset($_POST['url'])) {
            $query = $conn->prepare("INSERT INTO image (naam, url) VALUES (:naam, :url)");

            $query->bindParam(':naam', $_POST['naam'],PDO::PARAM_STR);
            $query->bindParam(':url', $_POST['url'],PDO::PARAM_STR);
            $query->execute();
            $count = $query->rowCount();
            if ($count > 0) {
                $_SESSION['create'] = 'Afbeelding is toegevoegt';
                header('location: index.php');
            }else{
                $_SESSION['failure'] = 'De velden moeten gevuld zijn';
            }
        }else{
            $_SESSION['failure'] = 'De velden moeten gevuld zijn.';
        }
    }

    function readPost(){
        global $conn;

        $query = $conn->prepare("SELECT * FROM image");
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    function updateImage($id){
        global $conn;

        if(isset($_POST['update']) && !empty($_POST['naam'] && $_POST['url'])) {
            $query = $conn->prepare("UPDATE image SET naam=:naam, url=:url WHERE id =:id");
            $query->bindParam(':naam', $_POST['naam'], PDO::PARAM_STR);
            $query->bindParam(':url', $_POST['url'], PDO::PARAM_STR);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();

            $count = $query->rowCount();

            if ($count > 0) {

                $_SESSION['update'] = 'Afbeelding is aangepast';
                header('location: index.php');
            } else {
                $_SESSION['failure'] = 'De velden moeten een nieuwe waarde krijgen';
            }
        } else{
            $_SESSION['failure'] = 'De velden moeten gevuld zijn.';
        }
    }

    function deleteImage($id){
        global $conn;

        if (isset($_POST['deletebutton'])) {
            $query = $conn->prepare('DELETE FROM image WHERE id = :id');
            $query->bindParam(':id', $id,PDO::PARAM_STR);
            $query->execute();
            $count = $query->rowCount();

            if ($count > 0) {
                $_SESSION['delete'] = 'Afbeelding is verwijdert.';
            }
        }
    }
?>
