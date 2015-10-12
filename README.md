# PHP-Weather-Display
Input is taken from the user via HTML forms. The user enters details like Address, City, State and Degree Celsius or Fahrenheit. This data is then used to query Google maps APIs to get the latitude and longitude of the specified address.

The data received from Google is in XML format. After parsing the response, the latitude and longitude are extracted and then used to hit Forecast.io's APIs to get the relevant weather information.

Forecast.io's APIs reponse is in JSON. This JSON is then parsed and after extracting needed info, the weather details are displayed.
