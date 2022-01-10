<?php
include 'connect.php';
include 'templates.php';

$error = null;

if (isset($_GET["project-id"])) {
    $sql = "SELECT * FROM Projects WHERE id = " . $_GET["project-id"];
} else {
    header("Location: index.php");
}

$result = mysqli_query($db_connect, $sql);
if (!$result) {
    $error = "mySQL query failed: " . mysqli_error($db_connect);
} else {
    $project = mysqli_fetch_assoc($result);
    $images = json_decode($project["ProjectGallery"], true);
}
?>

<!DOCTYPE html>
    <?php
    echo website_header("Cat2.Link - " . $project["ProjectShortName"], '<script src="./js/projects.js"></script>', $project["ProjectShortDesc"], $images[1]);
    ?>

    <body>
        <?php echo website_navbar("");?>
        <div class="container mb-3">
            <?php
            echo show_error($error);
            ?>
            <div class="row">
                <div class="col-12 mt-4">
                    <?php echo big_title("Project Details");?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header white">
                            About This Project
                        </div>
                        <div class="card-body">
                            <h2><strong><?php echo $project["ProjectName"]?></strong></h2>
                            <hr>
                            <p><?php echo nl2br($project["ProjectDescription"])?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header white">
                            Other Info
                        </div>
                        <div class="card-body">
                            <p>
                                Year Developed: <?php echo $project["ProjectYear"]?><br>
                                Project Type: <?php echo $project["ProjectType"]?>
                            </p>
                            <?php
                            if ($project['ProjectLink'] != "") {
                                echo '<a class="custom-btn mt-3 project-info" target="_blank" href="' . $project['ProjectLink'] . '">' . $project["LinkType"] . '</a>';
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header white">
                            Project Gallery
                        </div>
                        <div class="card-body">
                            <div class="card-columns small-cols">
                                <?php
                                foreach ($images as $imagelink) {
                                    echo '
                                    <div class="card white animate-enlarge stagger border-0">
                                        <img style="cursor:pointer;" class="card-img" onclick="window.open(this.src)" src="' . $imagelink . '">
                                    </div>
                                    ';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo website_footer("Joseph Lee", "2021")?>
    </body>
</html>