function formValidation() {
    var fname = document.getElementById("ifname").value;
    var lname = document.getElementById("ilname").value;
    var ipass = document.getElementById("ipass").value;
    var namePattern = /^[a-zA-Z._]+$/
    var passPattern = /((?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*><+-_=/,.])){8,40}/

    if (fname.length < 3 || fname.length > 20) {
        document.getElementById("efname").innerHTML = "**length 3-20";
        return false;
    } else if (!fname.match(namePattern)) {
        document.getElementById("efname").innerHTML = "**only char is allowed!!";
        return false;
    } else {
        document.getElementById("efname").innerHTML = "";
    }

    if (lname.length < 3 || lname.length > 20) {
        document.getElementById("elname").innerHTML = "**length 3-20!!";
        return false;
    } else if (!lname.match(namePattern)) {
        document.getElementById("elname").innerHTML = "****Only char is allowed!!";
        return false;
    } else {
        document.getElementById("elname").innerHTML = "";
    }
   if (ipass.match(passPattern)) {
        document.getElementById("epass").innerHTML = "1 Upper 1 Lower 1 Digit 1 Special Character Length 8-40!!!";
        return false;
}



}
