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
                    <img id="img_placeholder" alt="<?= $result['url']; ?>" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="row flex-row">
            <?php include('alert.php'); ?>

            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Acties</th>
                    </tr>
                </thead>


            <?php
            $query = $conn->prepare("SELECT * FROM image");
            $query->execute();

            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tbody>
                <tr>
                    <th scope="row"><?= $result['id']; ?></th>
                    <td><?= $result['naam']; ?></td>
                    <td class="btn-group">
                        <a href="edit.php?id=<?= $result['id']; ?>" style="margin-right:5px;">
                            <input type="submit" name="submit"  class="btn btn-primary" value="Edit Post!">
                        </a>

                        <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" class="button">
                            <input type="hidden" name="pid" value="<?= $result['id'] ?>">
                            <input type="submit" name="deletebutton" value="Delete Post!" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                </tbody>
                <?php
            }
            ?>

            </table>
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