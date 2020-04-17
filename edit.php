<?php require('include/header.php') ?>
<?php
if(!isset($_GET['id'])) exit;

$id = $_GET['id'];

if (isset($_POST['update'])){
    updateImage($id);
}

$query = $conn->prepare("SELECT * FROM image WHERE id=:id LIMIT 1");
$query->execute(['id' => $id]);
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
                <h1>Pas foto aan?</h1>
                <form method="post">
                    <?php
                    if($row = $query->fetch()){
                    ?>
                    <input value="<?= $row['naam']; ?>" name="naam">
                    <input value="<?= $row['url']; ?>" name="url">

                    <input type="submit" name="update" value="Update">
                    <?php } ?>
                </form>


            </div>
        </div>
    </div>

<?php require('include/footer.php') ?>