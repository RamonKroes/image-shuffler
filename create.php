<?php require('include/header.php') ?>
<?php
if (isset($_POST['naam']) && isset($_POST['url'])){
    createImage();
}
?>

    <div class="container">
        <div class="row">

            <div class="col-12">
                <?php
                if (isset($_SESSION['failure'])) {
                    ?>
                    <div class="alert alert-danger"><?php print $_SESSION['failure']; ?></div>
                    <?php
                }
                unset($_SESSION['failure']);
                ?>
            </div>

            <div class="col">
                <h1>VOEG EEN AFBEELDING TOE. of niet.</h1>
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                    <input type="text" name="naam" placeholder="Naam van de afbeelding">

                    <input type="text" name="url" placeholder="Foto url">

                    <input type="submit" value="Create Post" class="button">
                </form>

                <a href="index.php">Cancel</a>

            </div>
        </div>
    </div>

<?php require('include/footer.php') ?>