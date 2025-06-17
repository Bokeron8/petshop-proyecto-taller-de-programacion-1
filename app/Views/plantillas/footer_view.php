<?php

$social_media = [
    ["texto" => "Instagram", "href" => 'https://www.instagram.com/full.animal', "img_src" => 'assets/img/instagram_icon.png'],
    ["texto" => "Facebook", "href" => 'https://www.facebook.com/full.animal', "img_src" => 'assets/img/facebook_icon.png'],
    ["texto" => "Twitter", "href" => 'https://www.x.com/full.animal', "img_src" => 'assets/img/twitter_icon.png'],

];
?>


<footer class="text-white text-center py-3" style="background-color: rgba(0, 0, 0, 0.8);">
    <div class="row me-0 justify-content-end">
        <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">

            <p class="puppy fs-5">&copy; 2025 Full Animal. Todos los derechos reservados®.</p>
        </div>

        <section class="col-12 col-md-4">
            <h3 class="puppy">Seguinos en:</h3>
            <ul class="social-media-list">

                <?php foreach ($social_media as $texto => $value): ?>

                <li style="text-align: left;">

                    <a style="text-decoration: none; color: orange;" href="<?= $value['href'] ?>">
                        <img style="width: 24px; " src="<?= base_url('/' . $value['img_src']) ?>" alt="">
                        <span style="width: auto;"><?= $value['texto']; ?></span>
                    </a>

                </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </div>

</footer>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/aos.js') ?>"></script>
<script src="<?= base_url('assets/js/sweetalert2@11.js') ?>"></script>
<script>
AOS.init();
</script>
</body>

</html>