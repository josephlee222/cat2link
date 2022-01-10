<!DOCTYPE html>
<html>
    <?php
    include 'templates.php';
    include 'connect.php';

    $error = null;

    if (isset($_GET["search-input"])) {
        $sql = "SELECT * FROM Projects WHERE ProjectName LIKE '%" . $_GET["search-input"] . "%' ORDER BY ProjectYear DESC";
    } else {
        $sql = "SELECT * FROM Projects ORDER BY ProjectYear DESC";
    }

    $results = mysqli_query($db_connect, $sql);

    if (!$results) {
        $error = "mySQL query failed: " . mysqli_error($db_connect);
    }

    echo website_header("Cat2.Link - Projects", '<script src="./js/projects.js"></script>', 'Come and browse my projects!', "https://cat2.link/img/Website_imgs/meta_projects.png");
    ?>
    <body>
        <?php echo website_navbar("projects");?>
        <div class="container mb-3">
            <?php echo show_error($error)?>
            <div class="row">
                <div class="col-12 mt-4">
                    <?php echo big_title("Projects")?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="card mb-3">
                        <div class="card-header white">
                            Search For...
                        </div>
                        <form class="card-body">
                            <input class="custom-input w-100 mb-3" type="text" id="search-input" name="search-input" placeholder="Search...">
                            <input class="custom-btn w-100" value="Search!" type="submit" id="search-sumbit-btn"> 
                        </form>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9">
                    <div class="card">
                        <div class="card-header white">
                            My Projects
                        </div>
                        <div class="card-body">
                            <div class="card-columns courses-section">
                                <!-- To be replaced with php once done -->
                                <?php
                                if (mysqli_num_rows($results) > 0) {
                                    for ($i = 1; mysqli_num_rows($results) >= $i; $i++) {
                                        $row = mysqli_fetch_assoc($results);
                                        $image_data = json_decode($row["ProjectGallery"], true);
                                        echo '
                                        <div class="card white animate-enlarge stagger course-card no-border">
                                            <div class="card-header">' . $row["ProjectYear"] . " | " . $row["ProjectType"] . '</div>
                                            <img class="card-img no-radius" src="' . $image_data["1"] . '">
                                            <div class="card-body">
                                                <h5 class="card-title">' . $row["ProjectName"] . '</h5>
                                                <p>' . $row["ProjectShortDesc"] . '</p>
                                                <a class="custom-btn mt-3 project-info" href="./project_info.php?project-id=' . $row["id"] . '">View Project</a>
                                            </div>
                                        </div>
                                        ';
                                    }
                                } else {
                                    echo "No projects to show :(";
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