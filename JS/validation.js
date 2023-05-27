function formValidation() {
    var fname = document.getElementById("ifname").value;
    var lname = document.getElementById("ilname").value;
    var pass = document.getElementById("ipass").value;
    var mobile = document.getElementById("imob").value;
    var email = document.getElementById("iemail").value;
    var namePattern = /^[a-zA-Z._]+$/
    var passPattern = /((?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*><+-_=/,.])).{8,40}/
    var mobPattern = /(\+88)?-?01[3-9]\d{8}/
    var mailPattern = /(cse|eee|law|bs|is)_\d{10}@lus\.ac\.bd/

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
   if (!pass.match(passPattern)) {
        document.getElementById("epass").innerHTML = "**1 Upper 1 Lower, 1 Digit, 1 SC, Length 8-40!!!";
        return false;
}
else    if (pass.match(passPattern)) {
    document.getElementById("epass").innerHTML = "";
}
//mobile
if (!mobile.match(mobPattern)) {
    document.getElementById("emob").innerHTML = "**Only BD Number Is Allowed!!!";
    return false;
}
else    if (mobile.match(mobPattern)) {
document.getElementById("emob").innerHTML = "";
}
//mail
if (!email.match(mailPattern)) {
    document.getElementById("eemail").innerHTML = "**Only LU Mail Is Allowed!!!";
    return false;
}
else    if (email.match(mailPattern)) {
document.getElementById("eemail").innerHTML = "";
}


}
