<html>
<head>
    <title>
        Forecast
    </title>
    <script>
        function res(ele){
            document.getElementById("results").innerHTML = "";
            tags = ele.getElementsByTagName('input');
            for(i = 0; i < tags.length; i++) {
                if (tags[i].type == "text"){
                    tags[i].value = "";
                }
                if (tags[i].type == "radio" && tags[i].value == "F"){
                    tags[i].checked = true;
                }
            }
            sel = ele.getElementsByTagName('select');
            for(j = 0; j < sel["state"].options.length; j++) {
                sel["state"].selectedIndex = 0;
            }
        }
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
        }
    </script>
</head>

<body>
    <?php 
        date_default_timezone_set('Europe/Bucharest');
?>
        
            <h2 style="text-align: center;">Forecast Search</h2>
    <div id="wrapper">        
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" id="inp">
                <table frame="box" style="text-align: center;margin-left:auto; margin-right:auto;">
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
                            <input name="city" id="city" type="text" value="<?php echo isset($_POST['city']) ? $_POST['city'] : "" ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            State
                        </td>
                        <td>
                            <select id="state" name="state">
                                <option value="" selected disabled>Select your option</option>
                <option value="AL" <?php echo isset($_POST['state']) && $_POST['state'] == "AL" ? "selected" : ''?>>Alabama</option>
                <option value="AK" <?php echo isset($_POST['state']) && $_POST['state'] == "AK" ? "selected" : ''?>>Alaska</option>
                <option value="AZ" <?php echo isset($_POST['state']) && $_POST['state'] == "AZ" ? "selected" : ''?>>Arizona</option>
                <option value="AR" <?php echo isset($_POST['state']) && $_POST['state'] == "AR" ? "selected" : ''?>>Arkansas</option>
                <option value="CA" <?php echo isset($_POST['state']) && $_POST['state'] == "CA" ? "selected" : ''?>>California</option>
                <option value="CO" <?php echo isset($_POST['state']) && $_POST['state'] == "CO" ? "selected" : ''?>>Colorado</option>
                <option value="CT" <?php echo isset($_POST['state']) && $_POST['state'] == "CT" ? "selected" : ''?>>Connecticut</option>
                <option value="DE" <?php echo isset($_POST['state']) && $_POST['state'] == "DE" ? "selected" : ''?>>Delaware</option>
                <option value="DC" <?php echo isset($_POST['state']) && $_POST['state'] == "DC" ? "selected" : ''?>>District Of Columbia</option>
                <option value="FL" <?php echo isset($_POST['state']) && $_POST['state'] == "FL" ? "selected" : ''?>>Florida</option>
                <option value="GA" <?php echo isset($_POST['state']) && $_POST['state'] == "GA" ? "selected" : ''?>>Georgia</option>
                <option value="HI" <?php echo isset($_POST['state']) && $_POST['state'] == "HI" ? "selected" : ''?>>Hawaii</option>
                <option value="ID" <?php echo isset($_POST['state']) && $_POST['state'] == "ID" ? "selected" : ''?>>Idaho</option>
                <option value="IL" <?php echo isset($_POST['state']) && $_POST['state'] == "IL" ? "selected" : ''?>>Illinois</option>
                <option value="IN" <?php echo isset($_POST['state']) && $_POST['state'] == "IN" ? "selected" : ''?>>Indiana</option>
                <option value="IA" <?php echo isset($_POST['state']) && $_POST['state'] == "IA" ? "selected" : ''?>>Iowa</option>
                <option value="KS" <?php echo isset($_POST['state']) && $_POST['state'] == "KS" ? "selected" : ''?>>Kansas</option>
                <option value="KY" <?php echo isset($_POST['state']) && $_POST['state'] == "KY" ? "selected" : ''?>>Kentucky</option>
                <option value="LA" <?php echo isset($_POST['state']) && $_POST['state'] == "LA" ? "selected" : ''?>>Louisiana</option>
                <option value="ME" <?php echo isset($_POST['state']) && $_POST['state'] == "ME" ? "selected" : ''?>>Maine</option>
                <option value="MD" <?php echo isset($_POST['state']) && $_POST['state'] == "MD" ? "selected" : ''?>>Maryland</option>
                <option value="MA" <?php echo isset($_POST['state']) && $_POST['state'] == "MA" ? "selected" : ''?>>Massachusetts</option>
                <option value="MI" <?php echo isset($_POST['state']) && $_POST['state'] == "MI" ? "selected" : ''?>>Michigan</option>
                <option value="MN" <?php echo isset($_POST['state']) && $_POST['state'] == "MN" ? "selected" : ''?>>Minnesota</option>
                <option value="MS" <?php echo isset($_POST['state']) && $_POST['state'] == "MS" ? "selected" : ''?>>Mississippi</option>
                <option value="MO" <?php echo isset($_POST['state']) && $_POST['state'] == "MO" ? "selected" : ''?>>Missouri</option>
                <option value="MT" <?php echo isset($_POST['state']) && $_POST['state'] == "MT" ? "selected" : ''?>>Montana</option>
                <option value="NE" <?php echo isset($_POST['state']) && $_POST['state'] == "NE" ? "selected" : ''?>>Nebraska</option>
                <option value="NV" <?php echo isset($_POST['state']) && $_POST['state'] == "NV" ? "selected" : ''?>>Nevada</option>
                <option value="NH" <?php echo isset($_POST['state']) && $_POST['state'] == "NH" ? "selected" : ''?>>New Hampshire</option>
                <option value="NJ" <?php echo isset($_POST['state']) && $_POST['state'] == "NJ" ? "selected" : ''?>>New Jersey</option>
                <option value="NM" <?php echo isset($_POST['state']) && $_POST['state'] == "NM" ? "selected" : ''?>>New Mexico</option>
                <option value="NY" <?php echo isset($_POST['state']) && $_POST['state'] == "NY" ? "selected" : ''?>>New York</option>
                <option value="NC" <?php echo isset($_POST['state']) && $_POST['state'] == "NC" ? "selected" : ''?>>North Carolina</option>
                <option value="ND" <?php echo isset($_POST['state']) && $_POST['state'] == "ND" ? "selected" : ''?>>North Dakota</option>
                <option value="OH" <?php echo isset($_POST['state']) && $_POST['state'] == "OH" ? "selected" : ''?>>Ohio</option>
                <option value="OK" <?php echo isset($_POST['state']) && $_POST['state'] == "OK" ? "selected" : ''?>>Oklahoma</option>
                <option value="OR" <?php echo isset($_POST['state']) && $_POST['state'] == "OR" ? "selected" : ''?>>Oregon</option>
                <option value="PA" <?php echo isset($_POST['state']) && $_POST['state'] == "PA" ? "selected" : ''?>>Pennsylvania</option>
                <option value="RI" <?php echo isset($_POST['state']) && $_POST['state'] == "RI" ? "selected" : ''?>>Rhode Island</option>
                <option value="SC" <?php echo isset($_POST['state']) && $_POST['state'] == "SC" ? "selected" : ''?>>South Carolina</option>
                <option value="SD" <?php echo isset($_POST['state']) && $_POST['state'] == "SD" ? "selected" : ''?>>South Dakota</option>
                <option value="TN" <?php echo isset($_POST['state']) && $_POST['state'] == "TN" ? "selected" : ''?>>Tennessee</option>
                <option value="TX" <?php echo isset($_POST['state']) && $_POST['state'] == "TX" ? "selected" : ''?>>Texas</option>
                <option value="UT" <?php echo isset($_POST['state']) && $_POST['state'] == "UT" ? "selected" : ''?>>Utah</option>
                <option value="VT" <?php echo isset($_POST['state']) && $_POST['state'] == "VT" ? "selected" : ''?>>Vermont</option>
                <option value="VA" <?php echo isset($_POST['state']) && $_POST['state'] == "VA" ? "selected" : ''?>>Virginia</option>
                <option value="WA" <?php echo isset($_POST['state']) && $_POST['state'] == "WA" ? "selected" : ''?>>Washington</option>
                <option value="WV" <?php echo isset($_POST['state']) && $_POST['state'] == "WV" ? "selected" : ''?>>West Virginia</option>
                <option value="WI" <?php echo isset($_POST['state']) && $_POST['state'] == "WI" ? "selected" : ''?>>Wisconsin</option>
                <option value="WY" <?php echo isset($_POST['state']) && $_POST['state'] == "WY" ? "selected" : ''?>>Wyoming</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Degree
                        </td>
                        <td>
                            <input type="radio" name="degree" value="F" <?php if (isset($_POST['degree']) and ($_POST['degree'] == "F")) { echo 'checked="checked"';} elseif (!isset($_POST["submit"])) { echo 'checked="checked"';} ?>> Fahrenheit
                            <input type="radio" name="degree" value="C" <?php if (isset($_POST['degree']) and($_POST['degree'] == "C")) { echo 'checked="checked"';} ?>> Celsius
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" onclick="validate()" value="Search">
                            <input type="button" onclick="res(this.form)" name="clear" value="Clear">
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
    $map_url = "https://maps.googleapis.com/maps/api/geocode/xml?address=" . rawurlencode($_POST["address"]). ",".                              rawurlencode($_POST["city"]).",". rawurlencode($_POST["state"]) . "&key=xxxxxxxxx";
    $maps_response = new SimpleXMLElement(file_get_contents($map_url));
    $lat = (string) $maps_response->result[0]->geometry[0]->location[0]->lat;
    $lng = (string) $maps_response->result[0]->geometry[0]->location[0]->lng;
    $api_key = "xxxxxxxx";
    if ($_POST["degree"] == "C"){
        $units = "si";
    }
    else {
        $units = "us";
    }
    if ($units == "us") {
        $windspeed_unit = "mph";
        $visibility_unit = "mi";
    }
    else {
        $windspeed_unit = "mts/sec";
        $visibility_unit = "km";
    }
    $forecast_url = "https://api.forecast.io/forecast/". $api_key. "/". $lat. "," . $lng . "?units=" . $units . "&exclude=flags";
    
    if(!isset($resp)){
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
        $precip = null;
        $resp_precip = null;
        $resp_precip = $resp["currently"]["precipIntensity"];
        if ($resp_precip >=0 and $resp_precip<0.002) {
            $precipitation = "None";
        }
        if ($resp_precip >=0.002 and $resp_precip<0.017) {
            $precipitation = "Very Light";
        }
        if ($resp_precip >=0.017 and $resp_precip<0.1) {
            $precipitation = "Light";
        }
        if ($resp_precip >=0.1 and $resp_precip<0.4) {
            $precipitation = "Moderate";
        }
        if ($resp_precip >=0.4) {
            $precipitation = "Heavy";
        }

        $rain_chance = null;
        $wind_speed = null;
        $dew = null;
        $humidity = null;
        $visibility = null;
        $sunrise_time = null;
        $sunset_time = null;

        $rain_chance = $resp["currently"]["precipProbability"] * 100 . "%";
        $wind_speed = $resp["currently"]["windSpeed"] . "mph";
        $dew = $resp["currently"]["dewPoint"];
        $humidity = $resp["currently"]["humidity"] * 100 . "%";
        $visibility = $resp["currently"]["visibility"] . "mi";


        date_default_timezone_set($resp["timezone"]);
        $sunrise_time = date('h:i A', $resp["daily"]["data"][0]["sunriseTime"]);
        $sunset_time = date('h:i A', $resp["daily"]["data"][0]["sunsetTime"]);
    }
        ?>
    <?php 
        if(!isset($_POST["submit"])) {
            ?> <div id="results" style="display:none;"> <?php
        }
        else {
            ?> <div id="results" style="display:block;"><?php
        }?>
                <table frame="box" style="margin: 30px auto 30px auto;padding: 30px 0 30px 0;">
                    <tr>
                        <td colspan="2" style="padding: 0 200px 0 200px; text-align: center;font-size: 25px;"><strong><?= $summary ?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 0 200px 0 200px;text-align: center;font-size: 25px;">
                            <strong>
                            <?php 
                                if($units == "us") {
                                    ?><?= round($temp) ?>&#8457<?php
                                }
                                else {
                                    ?><?= round($temp) ?>&#8451<?php
                                }?>
                
                        </strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 0 200px 0 200px; text-align: center; "><img src=<?=$img_url ?> title=<?=$icon ?>></td>
                    </tr>
                    <tr>
                        <td style="padding: 0 90px 0 90px;">Precipitation</td>
                        <td>
                            <?= $precipitation ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 90px 0 90px;">Chance of rain</td>
                        <td>
                            <?= $rain_chance ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 90px 0 90px;">Wind Speed</td>
                        <td>
                            <?= round($wind_speed) . $windspeed_unit?> 
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 90px 0 90px;">Dew Point</td>
                        <td>
                            <?php 
                                if($units == "us") {
                                    ?><?= round($dew) ?>&#8457<?php
                                }
                                else {
                                    ?><?= round($dew) ?>&#8451<?php
                                }?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 90px 0 90px;">Humidity</td>
                        <td>
                            <?= $humidity ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 90px 0 90px;">Visibility</td>
                        <td>
                            <?= round($visibility) . $visibility_unit?> 
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 90px 0 90px;">Sunrise</td>
                        <td>
                            <?= $sunrise_time ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 90px 0 90px;">Sunset</td>
                        <td>
                            <?= $sunset_time ?>
                        </td>
                    </tr>
                </table>
            </div>


</body>

</html>