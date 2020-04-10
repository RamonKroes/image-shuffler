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
            <div class="col">
                <h1>Pas foto aan?</h1>
                <form method="post">
                    <?php
                    if($row = $query->fetch()){
                    ?>
                    <input placeholder="<?= $row['naam']; ?>" name="naam">
                    <input placeholder="<?= $row['url']; ?>" name="url">

                    <input type="submit" name="update" value="Update">
                    <?php } ?>
                </form>


            </div>
        </div>
    </div>

<?php require('include/footer.php') ?>