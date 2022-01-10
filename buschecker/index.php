<!DOCTYPE html>
<html>
    <head>  
        <title>Simple Bus Info</title>
        <meta name="description" content="Check for upcoming buses here without an app!">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
            date_default_timezone_set('Asia/Singapore');
            function getLtaData($get_type, $get_bus_stop) {
                global $stops_page;
                $AccountKey = "fF5Fx62RSg6eFnYt8D35kA==";
                switch($get_type) {
                    case 1:    //Get Bus arrival
                        $url = "http://datamall2.mytransport.sg/ltaodataservice/BusArrivalv2?BusStopCode=$get_bus_stop";
                    break;
                    case 2:
                        $url = "http://datamall2.mytransport.sg/ltaodataservice/BusStops?page=$stops_page";
                    break;
                    default:
                        echo "<script type='text/javascript'>alert('Invaild call type');</script>";
                    break;
                };

                $curl_get = curl_init($url);
                curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl_get, CURLOPT_CUSTOMREQUEST, "GET");
                curl_setopt($curl_get, CURLOPT_HTTPHEADER, [
                    "AccountKey: " . $AccountKey,
                    "Content-Type: application/json"
                ]);

                $received_data = json_decode(curl_exec($curl_get));
                curl_close($curl_get);
                return $received_data;
            };

            function checkBusStopData() {
                global $busstopInfo;
                global $bus_stop;
                global $bus_stop_array;
                $busstopInfo = getLtaData(2, $bus_stop);
                $bus_stop_array = array_values(array_filter($busstopInfo -> value, function($v) {
                    global $bus_stop;
                    if ($v -> BusStopCode == $bus_stop) {
                        return $v;
                    };
                    return false;
                }));
                //var_dump($bus_stop_array);
                displayStopInfo();
            }

            function displayStopInfo() {
                global $busstopInfo;
                global $bus_stop_array;
                global $stops_page;
                global $busArrival;
                global $bus_stop;
                global $busstop_text;
                global $err_msg;
                if (count($bus_stop_array) === 0) {
                    if (count($busstopInfo -> value) === 0) {
                        $err_msg = "
                            <div class='alert alert-danger' role='alert'>
                                Bus Stop does not exist, Please try again...
                            </div>
                        ";
                        $busstop_text = "<p>Enter a bus stop code to start</p>";
                    } else {
                        ++$stops_page;
                        getLtaData(2, $bus_stop);
                        checkBusStopData();
                    }
                } else {
                    $nextbusTime = date("Hi",strtotime($busArrival -> Services[0] -> NextBus -> EstimatedArrival));
                    $nextbusTime2 = date("Hi",strtotime($busArrival -> Services[0] -> NextBus2 -> EstimatedArrival));
                    $nextbusTime3 = date("Hi",strtotime($busArrival -> Services[0] -> NextBus3 -> EstimatedArrival));
                    $busstop_text = "<p class='no-text-margin'>Bus Stop Code: " . $busArrival -> BusStopCode . "</p><br>";
                    $busstop_text .= "<p class='no-text-margin'>Bus Stop Name: " . $bus_stop_array[0] -> Description . "</p>";
                    $busstop_text .= "<p class='no-text-margin'>Road Name: " . $bus_stop_array[0] -> RoadName . "</p>";
                    //echo "<p class='no-text-margin'>2nd Bus Arrival: " . $nextbusTime2 . "hrs" . "</p>";
                    //echo "<p class='no-text-margin'>3rd Bus Arrival: " . $nextbusTime3 . "hrs" . "</p>";
                }
            }

            function displayArrivalInfo() {
                global $busarrival_text;
                global $busArrival;
                function sortArrivals($a, $b) {
                    $time_1 = date("U", strtotime($a -> NextBus -> EstimatedArrival));
                    $time_2 = date("U", strtotime($b -> NextBus -> EstimatedArrival));
                    if ($time_1 === $time_2) {
                        return 0;
                    };
                    return ($time_1<$time_2)?-1:1;
                }
                usort($busArrival -> Services, "sortArrivals");
                foreach ($busArrival -> Services as $bus_item) {
                    $nextbusTime = date("U",strtotime($bus_item -> NextBus -> EstimatedArrival)) - date("U", time());
                    $nextbusTime = ceil($nextbusTime / 60);
                    switch ($bus_item -> Operator) {
                        case "GAS":
                            $badge_colour = "warning";
                            $operator_name = "Go-Ahead Singapore";
                        break;
                        case "SBST":
                            $badge_colour = "danger";
                            $operator_name = "SBS Transit";
                        break;
                        case "TTS":
                            $badge_colour = "success";
                            $operator_name = "Tower Transit Singapore";
                        break;
                        case "SMRT":
                            $badge_colour = "primary";
                            $operator_name = "SMRT";
                    };

                    if ($nextbusTime < 1) {
                        $nextbusTime = "Arriving";
                    } else {
                        $nextbusTime = $nextbusTime . " mins";
                    };

                    $busarrival_text .= '
                    <div class="card margin-bottom-all">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2 class="bus-card-title">' . $bus_item -> ServiceNo . '</h2>
                                    <span class="badge badge-' . $badge_colour . '">' . $operator_name . '</span>
                                </div>
                                <h4 class="bus-card-title">' . $nextbusTime . '</h4>
                            </div>
                        </div>
                    </div>
                    ';
                };
                //var_dump($busarrival_text);
            };
            //Actual Start point
            $err_msg = "";
            if (isset($_POST["code-input"])) {
                if (strlen($_POST["code-input"]) === 5 && is_numeric($_POST["code-input"])) {
                    $bus_stop = $_POST["code-input"];
                } else {
                    $bus_stop = "01129";
                    $err_msg = "
                    <div class='alert alert-danger' role='alert'>
                        Invaild Bus Stop Code, Please try again...
                    </div>
                    ";
                }
            } else {
                $bus_stop = "01129";
            };

            $stops_page = 1;
            $busArrival = getLtaData(1, $bus_stop);
            checkBusStopData();
            displayStopInfo();
            displayArrivalInfo();
        ?>
        <div class="container mt-3">
            <?php echo $err_msg;?>
            <div class="row">
                <div class="col-md-12 margin-bottom-all">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="no-text-margin">Search by bus stop code</h6>
                        </div>
                        <div class="card-body">
                            <form action="./index.php" method="post">
                                <div class="form-group no-text-margin">
                                    <input name="code-input" class="form-control" type="text" placeholder="Enter Code... (Ex. 59079)">
                                    <small class="text-muted">Press "Enter" to show information</small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 margin-bottom-md">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="no-text-margin">Bus Stop Information</h6>
                        </div>
                        <div class="card-body">
                            <?php echo $busstop_text;?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"><!-- Bus arrivals here-->
                    <?php echo $busarrival_text;?>
                </div>
            </div>
             
        </div>
        
    </body>

</html>