<script>

    // stap 1: maak een database aan, en zet de url's van onderstaande afbeeldingen in een database-tabel
    // stap 2: haal de afbeeldingen dmv een query weer uit de database, en vervang de statische lijst in een database loop
    // stap 3: maak een simpel CRUD pagina waarmee je afbeeldingen aan database kunt toevoegen/wijzigen/verwijderen
    // stap 4: implementeer alles op je raspberry-pi
    // stap 5: verstuur de link naar http://ip-van-jouw-raspberry/pvb/image_shuffler.php via discord naar @Jan van Os
    var imgList = [
    <?php
    $query = $conn->prepare("SELECT url FROM image");
    $query->execute();
    while($result = $query->fetch(PDO::FETCH_ASSOC)){
    ?>

        "<?= $result['url']; ?>",
    <?php } ?>
    ];
    document.getElementById("img_placeholder").src = imgList[Math.floor(Math.random()*imgList.length)];

</script>

</body>

</html>