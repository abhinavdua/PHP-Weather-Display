<html>

<head>
    <title>
        Forecast
    </title>
    <script type="text/javascript" src="file.js"></script>
</head>

<body>
    <?php 
    if(isset($_POST["submit"])) { 
    $map_url = "http://maps.google.com/maps/api/geocode/xml?address=" . rawurlencode($_POST["address"]). ",".                              rawurlencode($_POST["city"]).",". rawurlencode($_POST["state"]);
    $maps_response = new SimpleXMLElement(file_get_contents($map_url));
    $lat = (string) $maps_response->result[0]->geometry[0]->location[0]->lat;
    $lng = (string) $maps_response->result[0]->geometry[0]->location[0]->lng;
    $api_key = "xxxxxxxxxxxxxxx";
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

        <div style="margin-left: 500px;">
            <h2>Forecast Search</h2>
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <table style="text-align: center;">
                    <tr>
                        <td>
                            Street Address
                        </td>
                        <td>
                            <input id="address" name="address" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            City
                        </td>
                        <td>
                            <input name="city" id="city" type="text">
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
                            <input type="radio" name="degree" value="F"> Fahrenheit
                            <input type="radio" name="degree" value="C"> Celsius
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" onclick="" value="Search">
                            <button type="reset" value="">Clear</button>
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
</body>

</html>