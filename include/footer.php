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

<!--"https://images.unsplash.com/photo-1494253109108-2e30c049369b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60",-->
<!--"https://images.unsplash.com/photo-1508138221679-760a23a2285b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60",-->
<!--"https://images.unsplash.com/photo-1493612276216-ee3925520721?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60",-->
<!--"https://images.unsplash.com/photo-1501426026826-31c667bdf23d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60",-->
<!--"https://images.unsplash.com/photo-1489533119213-66a5cd877091?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60",-->
<!--"https://images.unsplash.com/photo-1505678261036-a3fcc5e884ee?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60",-->
<!--"https://images.unsplash.com/photo-1501457191481-671f811805de?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60",-->
<!--"https://images.unsplash.com/photo-1504937551116-cb8097e6f02a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60",-->
<!--"https://images.unsplash.com/photo-1572164625211-6723762c0e3a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60",-->
<!--"https://images.unsplash.com/photo-1511963211013-83bba110595d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60"-->


</body>

</html>