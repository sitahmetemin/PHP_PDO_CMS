<?php
include "header.php";


?>

<div role="main" class="main">
    <div class="container">
        <div class="row pt-xl">

            <div class="col-md-9">

                <h1 class="mt-xl mb-none">İçerik</h1>
                <div class="divider divider-primary divider-small mb-xl">
                    <hr>
                </div>

                <div class="row">
                    <?php

                    //Sayfalama kod başlangıcı
                    $sayfada = 10;                                              // Sayfada gösterilecek içerik miktarı
                    $sorgu = $db ->prepare('SELECT * FROM icerik');    //Bütün içerik çağırılıyor
                    $sorgu->execute();                                          //Sorguyu çalıştırıyoruz
                    $toplam_icerik=$sorgu->rowCount();                          //İçerik adedi toplam_icerik'in içine aktarılıyor
                    $toplam_sayfa = ceil($toplam_icerik/$sayfada);        //içerik adedine göre sayfa sayısı oluşturuluyor
                    $sayfa = isset($_GET['sayfa'])?(int) $_GET['sayfa']: 1;   // eğer sayfa girilmemişse 1. sayfaya git
                    if ($sayfa<1) $sayfa =1;                                  // 1den küçük sayfa girilmişse 1 yap
                    if ($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;     //toplam sayfadan fazla veri girilmişse en son sayfaya yönlendir
                    $limit = ($sayfa - 1)*$sayfada;

                    $iceriksor = $db->prepare("SELECT * FROM icerik ORDER BY icerik_zaman DESC limit $limit,$sayfada");//sorgu içinde değişken kullanacaksan çift tırnak kullanmalısın
                    $iceriksor->execute();
                    //Sayfalama kod BİTİŞ

                    while ($icerikcek = $iceriksor->fetch(PDO::FETCH_ASSOC)){
                        ?>
                    <div class="row mt-xl">
                        <div class="col-md-12">
                            <span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
                                <span class="col-md-5 thumb-info-side-image-wrapper p-none">
                                    <img src="<?php echo $icerikcek['icerik_resimyol']; ?>" class="img-responsive" alt="" style="width: 400px; padding-top: 15px; padding-bottom: 15px;">
                                </span>
                                <span class="thumb-info-caption">
                                    <span class="col-md-5">
                                        <h2 class="mb-md mt-xs"><a title="" class="text-dark" href="#"><?php echo $icerikcek['icerik_ad']; ?></a></h2>
                                        <span class="post-meta">
                                            <span><?php echo substr($icerikcek['icerik_zaman'],0,10); ?></span>
                                        </span>
                                            <p><?php echo substr($icerikcek['icerik_detay'],0,50); ?>...</p>
                                            <a class="mt-md" href="haber-<?=seo($icerikcek["icerik_ad"])."-".$icerikcek["icerik_id"]?>"><button class="btn btn-primary btn-xs">Devamını oku &nbsp;<i class="fa fa-long-arrow-right"></i></button></a>
                                    </span>
                                </span>
                            </span>
                        </div>
                    </div>
                    <?php } ?>
                    <ul class="pagination">
                        <?php
                        $s=0;
                        while ($s < $toplam_sayfa) {
                            $s++; ?>
                            <?php
                            if ($s == $sayfa) { ?>
                                <li class="active">
                                    <a href="haberler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="haberler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>
                                </li>
                            <?php }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <aside class="sidebar">
                    <div id="combinationFilters" class="filters">
                        <h4 class="mt-xl mb-md">Practice Area:</h4>
                        <ul class="nav nav-list mb-xlg sort-source team-filter-group" data-filter-group="group1">
                            <li data-option-value="" class="active"><a href="#">Show All</a></li>
                            <li data-option-value=".criminal-law"><a href="#">Criminal Law</a></li>
                            <li data-option-value=".business-law"><a href="#">Business Law</a></li>
                            <li data-option-value=".divorce-law"><a href="#">Divorce Law</a></li>
                            <li data-option-value=".health-law"><a href="#">Health Law</a></li>
                            <li data-option-value=".capital-law"><a href="#">Capital Law</a></li>
                        <ul class="nav nav-list mb-xlg sort-source team-filter-group" data-filter-group="group2">
                            <li data-option-value="" class="active"><a href="#">Show All</a></li>
                            <li data-option-value=".new-york"><a href="#">New York</a></li>
                            <li data-option-value=".london"><a href="#">London</a></li>
                        </ul>
                    </div>
                    <h4 class="mt-xl mb-md">Contact Us</h4>
                    <p>Contact us or give us a call to discover how we can help.</p>
                    <div class="divider divider-primary divider-small mb-xl">
                        <hr>
                    </div>
                    <form id="contactForm" action="php/contact-form.php" method="POST">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Your name *</label>
                                    <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Your email address *</label>
                                    <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Subject</label>
                                    <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Message *</label>
                                    <textarea maxlength="5000" data-msg-required="Please enter your message." rows="3" class="form-control" name="message" id="message" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Send Message" class="btn btn-primary" data-loading-text="Loading...">
                                <div class="alert alert-success hidden" id="contactSuccess">
                                    Message has been sent to us.
                                </div>
                                <div class="alert alert-danger hidden" id="contactError">
                                    Error sending your message.
                                </div>
                            </div>
                        </div>
                    </form>
                </aside>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>