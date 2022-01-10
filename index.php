<?php
include 'templates.php';
?>
<!DOCTYPE html>
<html style="height: 100%;">
    <?php echo website_header("Cat2.Link - Home", "", "Welcome to my personal website", "https://cat2.link/img/Website_imgs/meta_main.png")?>
    <body style="height: 100%;">
        <div class="d-flex align-items-center h-100 w-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 mb-3 mb-md-0 text-center text-md-right slidein-right">
                        <h2><strong>Joseph Lee</strong></h2>
                        <p>Welcome to my personal website :)<br>It's simple, I know</p>
                    </div>
                    <div class="col-md-2 d-none d-md-flex">
                        <div class="v-divider mx-auto"></div>
                    </div>
                    <div class="col-md-5 text-center text-md-left slidein-left">
                        <a class="custom-btn mr-3" href="./projects.php">View Projects</a>
                        <a class="custom-btn" href="./about.php">About Me</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>