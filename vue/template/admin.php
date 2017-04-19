<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?= ASSETS ?>css/w3css4.min.css">
<link rel="stylesheet" href="<?= ASSETS ?>css/w3-theme-black.css">
<link rel="stylesheet" href="<?= ASSETS ?>js/jquery-ui/jquery-ui.min.css">

<link rel="icon" type="image/png" sizes="192x192" href="<?= ASSETS ?>image/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?= ASSETS ?>image/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?= ASSETS ?>image/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?= ASSETS ?>image/favicon/favicon-16x16.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cutive+Mono">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html, body, h1, h2, h3, h4, h5, h6 {
        font-family: "Cutive Mono";
    }
</style>
<script type="text/javascript" src="<?= ASSETS; ?>js/jquery.js"></script>
<script type="text/javascript" src="<?= ASSETS; ?>js/jquery-ui/jquery-ui.min.js"></script>
<body>

<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
        <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1"
           href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
        <a class="w3-bar-item w3-theme-l1">
            <img src="<?= ASSETS ?>image/snt.png" height="23" alt="LOGO">
        </a>
        <a href="<?= URL ?>admin/services" class="w3-bar-item w3-button w3-hide-small w3-hover-white <?= $services ?>">Services</a>
        <a href="<?= URL ?>admin/users" class="w3-bar-item w3-button w3-hide-small w3-hover-white <?= $utilisateurs ?>">Utilisateurs</a>
        <a href="<?= URL ?>admin/logs" class="w3-bar-item w3-button w3-hide-small w3-hover-white <?= $logs ?>">Logs</a>

    </div>
</div>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" style="z-index:3;width:250px;"
     id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()"
       class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
        <i class="fa fa-remove"></i>
    </a>
    <h3 class="w3-padding"><b>ADMINISTRATION</b></h3>
    <hr class="w3-border w3-border-black">
    <h4 class="w3-bar-item"><b>Menu</b></h4>
    <?php foreach ($menu as $key => $value): ?>
        <a class="w3-bar-item w3-button w3-hover-black" href="<?= URL . "admin/" . $key ?>">
            <?= $value ?>
        </a>
    <?php endforeach; ?>
    <h4 class="w3-bar-item"><b>Récents</b></h4>
    <a class="w3-bar-item w3-button w3-hover-black" href="#">Link</a>
    <a class="w3-bar-item w3-button w3-hover-black" href="#">Link</a>
    <a class="w3-bar-item w3-button w3-hover-black" href="#">Link</a>
    <a class="w3-bar-item w3-button w3-hover-black" href="#">Link</a>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"
     id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main w3-padding " style="margin-left:250px;margin-top:45px;">
    <?= $content ?>
</div>

<script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
            overlayBg.style.display = "none";
        } else {
            mySidebar.style.display = 'block';
            overlayBg.style.display = "block";
        }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
    }
</script>

</body>
</html>
