<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baruna.id</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/magnific-popup.css"> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/templatemo-ocean-vibes.css"> 
<!--
    
TemplateMo 554 Ocean Vibes

https://templatemo.com/tm-554-ocean-vibes

-->
</head>
<body>
    <header class="tm-site-header">
        <h1 class="tm-mt-0 tm-mb-15"><span class="tm-color-primary">BARUNA</span><span class="tm-color-gray-2">.id</span></h1>
    </header>

    <!-- Video banner 400 px height -->
    <div id="tm-video-container">
        <video autoplay muted loop id="tm-video">
            <source src="<?php echo base_url() ?>assets/video/ocean-sea-wave-video.mp4" type="video/mp4">
        </video>  
        <i id="tm-video-control-button" class="fas fa-pause"></i>
    </div>
    <div class="tm-container">
        <nav class="tm-main-nav">
            <ul id="inline-popups">
                <li class="tm-nav-item">
                    <a href="<?php echo base_url() ?>login" data-effect="mfp-move-from-top" class="tm-nav-link">
                        Pelaporan
                        <i class="fa fa-3x fa-sign-in-alt"></i>
                    </a>                
                </li>
                <?php foreach ($data as $value) { ?>
                <li class="tm-nav-item">
                    <div  data-effect="mfp-move-from-top" style="text-transform: capitalize;" class="tm-nav-link" id="tm-gallery-link">
                          <?= $value['kategori']; ?>
                        <i class="fas fa-2x"><?php echo number_format($value['berat'],2) ; ?></i>
                    </div>
                </li>
                <?php } ?>
                <!-- <li class="tm-nav-item">
                    <a href="#testimonials" data-effect="mfp-move-from-top" class="tm-nav-link">
                          Fish Waste
                        <i class="far fa-3x fa-smile"></i>
                    </a>
                </li>
                <li class="tm-nav-item">
                    <a href="#about" data-effect="mfp-move-from-top" class="tm-nav-link">
                          Residu
                        <i class="fas fa-3x fa-tint"></i>
                    </a>
                </li> -->
              <!--   <li class="tm-nav-item">
                    <a href="#contact" data-effect="mfp-move-from-top" class="tm-nav-link">
                        Contact
                        <i class="far fa-3x fa-comments"></i>
                    </a>
                </li> -->
            </ul>
        </nav>
    </div>

    <footer class="tm-footer">
        <span>Copyright &copy; 2023 baruna.id</span>
    </footer>

    <script src="<?php echo base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
   
</body>
</html>