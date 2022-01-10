<?php
include 'templates.php';
include 'connect.php';

$error = null;

$sql = "SELECT * FROM profile";
$results = mysqli_query($db_connect, $sql);

if (!$results) {
    $error = "mySQL query failed: " . mysqli_error($db_connect);
} else {
    $profile = mysqli_fetch_assoc($results);
}
?>

<!DOCTYPE html>
<html>
    <?php echo website_header("Cat2.Link - About Me", '<script src="./js/projects.js"></script>', 'About myself', "https://cat2.link/img/Website_imgs/meta_about.png");?>
    <?php echo website_navbar("about");?>
    <body>
        <div class="container mb-3">
            <div class="row">
                <div class="col-12 mt-4">
                    <?php echo big_title("About Me")?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card white border-0 mt-3">
                        <img class="card-img inherit-radius" onclick="window.open(this.src)" style="cursor: pointer;" src="<?php echo $profile["ProfileProfileImage"]?>">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header white">Introduction</div>
                        <div class="card-body">
                            <h2><strong><?php echo $profile["ProfileName"]?></strong></h2>
                            <hr>
                            <p><?php echo nl2br($profile["ProfileDescription"])?></p>
                        </div>
                    </div>
                    <div class="row white">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">About This Website</div>
                                <div class="card-body">
                                    <?php echo nl2br($profile["WebsiteAbout"])?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">Fact</div>
                                <div class="card-body">
                                    I like trains :)
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php echo website_footer("Joseph Lee", "2021")?>
    </body>
</html>