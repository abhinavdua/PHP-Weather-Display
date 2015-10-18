<html>

<head>
    <title>
        Forecast
    </title>
    <script>
        function validate() {
            var address = document.getElementById("address").value;
            var city = document.getElementById("city").value;
            var state = document.getElementById("state").value;
            var degree = document.getElementsByName("degree");
            var error_text = "Please enter the following missing information: ";
            var count = 0;
            if (address == "") {
                error_text += "Address, ";
            }
            if (city == "") {
                error_text += "City, ";
            }
            if (state == "") {
                error_text += "State, ";
            }
            for (var i = 0; i < degree.length; i++) {
                if (degree[i].checked == false) {
                    count++;
                }
            }
            if (count == degree.length) {
                error_text += "Degree";
            }
            if (error_text != "Please enter the following missing information: ") {
                alert(error_text);
            }
            //else {
              //  showResults();
            //}
        }
        function showResults() {
            
            //console.log("Came here");
            //console.log(displayRes);
            if (document.getElementById("results").style.display == "none") {
                alert("Came here");
                document.getElementById("results").style.display = "block";
            }
            console.log("Changed value");
            console.log(document.getElementById("results").style.display);
        }
    </script>
</head>

<body>
    <?php 
        date_default_timezone_set('Europe/Bucharest');
?>
        <div style="margin-left: 500px;">
            <h2>Forecast Search</h2>
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <table frame="box" style="text-align: center;">
                    <tr>
                        <td>
                            Street Address
                        </td>
                        <td>
                            <input id="address" name="address" type="text" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            City
                        </td>
                        <td>
                            <input name="city" id="city" type="text" value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            State
                        </td>
                        <td>
                            <select id="state" name="state">
                                <option value="" selected disabled>Select your option</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Degree
                        </td>
                        <td>
                            <?php echo isset($_POST['degree']) ? $_POST['myField1'] : '' ?>
                            <input type="radio" name="degree" value="F" <?php if($_POST['degree'] == "F") { echo 'checked="checked"';} elseif (!isset($_POST["submit"])) { echo 'checked="checked"';} ?>> Fahrenheit
                            <input type="radio" name="degree" value="C" <?php if($_POST['degree'] == "C") { echo 'checked="checked"';} ?>> Celsius
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" onclick="validate()" value="Search">
                            <button type="reset" value="Reset">Clear</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            * - Mandatory fields
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="http://forecast.io">Powered by Forecast.io</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    
    
        <?php 
    if(isset($_POST["submit"])) { 
    $map_url = "https://maps.googleapis.com/maps/api/geocode/xml?address=" . rawurlencode($_POST["address"]). ",".                              rawurlencode($_POST["city"]).",". rawurlencode($_POST["state"]) . "&key=xxxxxxx";
    $maps_response = new SimpleXMLElement(file_get_contents($map_url));
    $lat = (string) $maps_response->result[0]->geometry[0]->location[0]->lat;
    $lng = (string) $maps_response->result[0]->geometry[0]->location[0]->lng;
    $api_key = "xxxxxxxxxxx";
    if ($_POST["degree"] == "C"){
        $units = "si";
    }
    else {
        $units = "us";
    }
    $forecast_url = "https://api.forecast.io/forecast/". $api_key. "/". $lat. "," . $lng . "?units=" . $units . "&exclude=flags";
    $resp = json_decode(file_get_contents($forecast_url), true);
    $icon = $resp["currently"]["icon"];
    $img = array(
        "clear-day" => "clear.png",
        "clear-night" => "clear_night.png",
        "rain" => "rain.png",
        "snow" => "snow.png",
        "sleet" => "sleet.png",
        "wind" => "wind.png",
        "fog" => "fog.png",
        "cloudy" => "cloudy.png",
        "partly-cloudy-day" => "cloud_day.png",
        "partly-cloudy-night" => "cloud_night.png"
    );
    $summary = $resp["currently"]["summary"];
    $temp = $resp["currently"]["temperature"];
    if ($img[$icon]) {
        $img_url = "http://cs-server.usc.edu:45678/hw/hw6/images/" . $img[$icon];
    }    
    }
    $precip = array(
        "0" => "None",
        "0.002" => "Very Light",
        "0.017" => "Light",
        "0.1" => "Moderate",
        "0.4" => "Heavy"
    );
    $resp_precip = (string)$resp["currently"]["precipIntensity"];
    if ($precip[$resp_precip]) {
        $precipitation = $precip[$resp_precip];
    }
    $rain_chance = $resp["currently"]["precipProbability"] * 100 . "%";
    $wind_speed = $resp["currently"]["windSpeed"] . "mph";
    $dew = $resp["currently"]["dewPoint"];
    $humidity = $resp["currently"]["humidity"] * 100 . "%";
    $visibility = $resp["currently"]["visibility"] . "mi";


    date_default_timezone_set($resp["timezone"]);
    $sunrise_time = date('h:i:s A', $resp["daily"]["data"][0]["sunriseTime"]);
    $sunset_time = date('h:i:s A', $resp["daily"]["data"][0]["sunsetTime"]);
        ?>
    <?php 
        if(!isset($_POST["submit"])) {
            ?> <div id="results" style="margin-left: 40%; display:none;"> <?php
        }
        else {
            ?> <div id="results" style="margin-left: 40%; display:block;"><?php
        }?>
                <table frame="box" style="text-align: center;">
                    <tr>
                        <td colspan="2"><strong><?= $summary ?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <strong>
                            <?php 
                                if($units == "us") {
                                    ?><?= $temp ?>&#8457<?php
                                }
                                else {
                                    ?><?= $temp ?>&#8451<?php
                                }?>
                
                        </strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><img src=<?=$img_url ?>></td>
                    </tr>
                    <tr>
                        <td>Precipitation</td>
                        <td>
                            <?= $precipitation ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Chance of rain</td>
                        <td>
                            <?= $rain_chance ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Wind Speed</td>
                        <td>
                            <?= $wind_speed ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Dew Point</td>
                        <td>
                            <?= $dew ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Humidity</td>
                        <td>
                            <?= $humidity ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Visibility</td>
                        <td>
                            <?= $visibility ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Sunrise</td>
                        <td>
                            <?= $sunrise_time ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Sunset</td>
                        <td>
                            <?= $sunset_time ?>
                        </td>
                    </tr>
                </table>
            </div>


</body>

</html>