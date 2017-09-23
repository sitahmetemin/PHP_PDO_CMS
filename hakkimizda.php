<?php

include "header.php";

$hakkimizdasor = $db->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=?");
$hakkimizdasor->execute(array(0));
$hakkimizdacek = $hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>
<div role="main" class="main">
    <div class="container">
        <div class="row pt-xl">
            <div class="col-md-7">
                <h1 class="mt-xl mb-none"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></h1>
                <div class="divider divider-primary divider-small mb-xl">
                    <hr>
                </div>
                <p><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></p>

            </div>
            <div class="col-md-4 col-md-offset-1">
                <hr>
                <div class="embed-responsive embed-responsive-16by9 mb-xl">
                    <iframe width="1280" height="720" src="https://www.youtube.com/embed/<?php echo $hakkimizdacek['hakkimizda_video']; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>

                <h4>Vizyon</h4>
                <div class="divider divider-primary divider-small mb-xl">
                    <hr>
                </div>
                <blockquote class="blockquote-secondary">
                    <p class="font-size-lg"><?php echo $hakkimizdacek['hakkimizda_vizyon'];?></p>
                </blockquote>
                <h4>Misyon</h4>
                <div class="divider divider-primary divider-small mb-xl">
                    <hr>
                </div>
                <blockquote class="blockquote-secondary">
                    <p class="font-size-lg"><?php echo $hakkimizdacek['hakkimizda_misyon'];?></p>
                </blockquote>
            </div>
        </div>
    </div>
</div>


<?php include "footer.php"; ?>