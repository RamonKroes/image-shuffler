<?php require('include/header.php') ?>
<?php
if (isset($_POST['deletebutton'])) {
    $id = $_POST['pid'];
    deleteImage($id);

}

$query = $conn->prepare("SELECT url FROM image");
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

?>



    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="image-wrapper">
                    <img id="img_placeholder" alt="<?= $result['url']; ?>">
                </div>
            </div>
        </div>
        <div class="row flex-row">
                <?php
                $query = $conn->prepare("SELECT * FROM image");
                $query->execute();

                    while($result = $query->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <div class="col-md-3 content">
                            <div class="inner">
                                <?= $result['id']; ?>
                            </div>
                        </div>
                        <div class="col-md-3 content"><div class="inner"><?= $result['naam']; ?></div></div>
                        <div class="col-md-6 content">
                            <div class="inner">
                                <a href="edit.php?id=<?= $result['id']; ?>" class="button">
                                    <input type="submit" name="submit" value="Edit Post!">
                                </a>

                                <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" class="button">
                                    <input type="hidden" name="pid" value=<?= $result['id'] ?> >
                                    <input type="submit" name="deletebutton" value="Delete Post!">
                                </form>
                            </div>
                        </div>

                        <?php
                    }
                ?>
        </div>

        <div class="row">
            <div class="col-12">
                <a href="create.php">
                    Voeg foto toe
                </a>
            </div>
        </div>
    </div>

<?php require('include/footer.php') ?>