<div class="slider-container rev_slider_wrapper" style="height: 650px;">
    <div id="revolutionSlider" class="slider rev_slider manual">
        <ul>
            <?php
            $slidersor = $db->prepare("SELECT * FROM slider ORDER BY slider_sira ASC limit 25");
            $slidersor->execute();
            while ($slidercek = $slidersor->fetch(PDO::FETCH_ASSOC)){
            ?>

            <li data-transition="fade" data-title="<?php echo $ayarcek['ayar_author'];?>" data-thumb="<?php echo $slidercek['slider_resimyol']; ?>">

                <img src="<?php echo $slidercek['slider_resimyol']; ?>"
                     alt="<?php echo $slidercek['slider_ad']; ?>"
                     data-bgposition="center center"
                     data-bgfit="cover"
                     data-bgrepeat="no-repeat"
                     class="rev-slidebg">
            </li>
            <?php } ?>
        </ul>
    </div>
</div>