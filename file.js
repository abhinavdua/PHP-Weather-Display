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