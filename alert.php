<div class="col-12">
    <?php
    if (isset($_SESSION['update'])) {
        ?>
        <div class="alert alert-success"><?php print $_SESSION['update']; ?></div>
        <?php
    }
    unset($_SESSION['update']);
    ?>
</div>
<div class="col-12">
    <?php
    if (isset($_SESSION['create'])) {
        ?>
        <div class="alert alert-success"><?php print $_SESSION['create']; ?></div>
        <?php
    }
    unset($_SESSION['create']);
    ?>
</div>

<div class="col-12">
    <?php
    if (isset($_SESSION['delete'])) {
        ?>
        <div class="alert alert-danger"><?php print $_SESSION['delete']; ?></div>
        <?php
    }
    unset($_SESSION['delete']);
    ?>
</div>
