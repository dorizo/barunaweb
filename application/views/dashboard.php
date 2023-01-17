<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baruna.id</title>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/images/logo.ico"/>
    
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/templatemo-ocean-vibes.css"> 
<!--
    


-->
<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
  <style>
    
#containerchart {
  width: 100%;
  height: 400px;
  margin: 0;
  padding: 0;
}
  </style>
</head>
<body>
    <header class="tm-site-header">
        <img style="width:200px" src="<?php echo base_url() ?>assets/images/logo3.png" class="responsive" alt="Responsive image">
       <!--  <h1 class="tm-mt-0 tm-mb-15"><span class="tm-color-primary">BARUNA</span><span class="tm-color-gray-2">.id</span></h1> -->
    </header>

    <!-- Video banner 400 px height -->
    <div id="tm-video-container">
        <video autoplay muted loop id="tm-video">
            <source src="<?php echo base_url() ?>assets/video/Photos for Exhibition - PPP Morodemak (1).mp4" type="video/mp4">
        </video>  
        <i id="tm-video-control-button" class="fas fa-pause"></i>
    </div>
    <div class="tm-container">
        <center>
        <nav class="tm-main-nav">
            <ul id="inline-popups">
                <li class="tm-nav-item">
                    <!-- <a href="<?php echo base_url() ?>login" data-effect="mfp-move-from-top" class="tm-nav-link">
                       
                        <i class="fa fa-3x fa-sign-in-alt"></i>
                        <i class="fas fa-2x"><?php echo number_format($total->berat,2) ; ?></i>
                    </a>   -->
                    <div  data-effect="mfp-move-from-top" style="text-transform: capitalize;" class="tm-nav-link" id="tm-gallery-link">
                         Total
                        
                        <b><?php echo number_format($total->berat,2) ; ?></b>
                    </div>              
                </li>
                <?php foreach ($data as $value) { ?>
                <li class="tm-nav-item">
                    <div  data-effect="mfp-move-from-top" style="text-transform: capitalize;" class="tm-nav-link" id="tm-gallery-link">
                          <?= $value['kategori']; ?>
                        <b><?php echo number_format($value['berat'],2) ; ?></b>
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
        <div id="containerchart"></div>

  <script>

    anychart.onDocumentReady(function () {
      // create pie chart with passed data
      var chart = anychart.pie3d([
        <?php foreach ($average as $value) { ?>
        ['<?=trim($value['jenis']);?>', <?=$value['berat'];?>],
        <?php } ?>
      ]);

      // set chart title text settings
      chart
        .title('Average Waste (Kg)')
        // set chart radius
        .radius('80%');

      // set container id for the chart
      chart.container('containerchart');
      // initiate chart drawing
      chart.draw();
    });
  
</script>
        <a href="<?php echo base_url() ?>login"> <button type="button" class="tm-btn" style="width: 96%; margin-bottom: 10px">P E L A P O R A N</button></a>
        <a href="https://petugas.baruna.id/"> <button type="button" class="tm-btn" style="width: 96%; margin-bottom: 10px">P E T U G A S</button></a>
        <a href="https://admin.baruna.id/index.php/login"> <button type="button" class="tm-btn" style="width: 96%">S T A F F &nbsp; P E N G A W A S</button></a>
         <!-- <a href="https://adminbaruna.netlify.app/dashboard/target"> <button type="button" class="tm-btn" style="width: 96%">S T A F F &nbsp; P E N G A W A S</button></a> -->
        </center>
    </div>
    <div class="tm-site-logo" >
        <center>
        <img style="width:50% !importment; " src="<?php echo base_url() ?>assets/images/lengkap3.png" class="responsive-logo" alt="Responsive image">
        </center>
    </div>

    

    <footer class="tm-footer">
        <span>Copyright &copy; 2023 baruna.id</span>
    </footer>

    <script src="<?php echo base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
   
</body>
</html>
