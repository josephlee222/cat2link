<!DOCTYPE html>
<html>
    <?php
    include 'templates.php';

    echo website_header("Cat2.Link - Projects", '<link rel="stylesheet" href="../css/styles.css">', 'Come and browse my projects!', "https://cat2.link/img/Website_imgs/meta_projects.png");

    if (isset($_GET["error"])) {
        switch ($_GET["error"]) {
            case 400:
                $error_number = "400";
                $error_title = "Bad Request";
                $error_description = "A bad request has been made. Please try again.";
                break;
            case 401:
                $error_number = "401";
                $error_title = "Unauthorised";
                $error_description = "Login is required to view this page. Please try again.";
                break;
            case 403:
                $error_number = "403";
                $error_title = "Forbidden";
                $error_description = "You are not allowed to view this page or resource.";
                break;
            case 404:
                $error_number = "404";
                $error_title = "Not Found";
                $error_description = "The page or resource is not found on the website.";
                break;
            case 500:
                $error_number = "500";
                $error_title = "Internal Server Error";
                $error_description = "The website is currently broken. Please contact me if you can.";
                break;
            case 503:
                $error_number = "503";
                $error_title = "Service Unavailable";
                $error_description = "InfinityFree (Host provider) is currently not online. Please try again later.";
                break;
            default:
                $error_number = "-";
                $error_title = "Unknown Error";
                $error_description = "An unknown error has occured. Please try again.";
                break;
        }
    } else {
        $error_number = "-";
        $error_title = "Unknown Error";
        $error_description = "An unknown error has occured. Please try again.";
    }
    ?>
    <body>
        <?php echo website_navbar('');?>
        <div class="container mb-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <h1 class="error-header text-center"><?php echo $error_number;?></h1>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card">
                        <div class="card-header white"><?php echo $error_title;?></div>
                        <div class="card-body">
                            <p><?php echo $error_description;?></p>
                            <a class="custom-btn mt-3 project-info" href="../index.php">Return home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>