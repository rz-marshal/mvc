document.addEventListener('DOMContentLoaded', function(){
    const loginSubmit = document.getElementById("btn");
    const form = document.getElementById("form-signin");

    loginSubmit.addEventListener("click", function(e) {
        e.preventDefault();
        var request = new XMLHttpRequest();
        request.open(
            "POST",
            "http://localhost/account/authorize",
            true
        );

        request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");

        var password = md5(form.elements.password.value);

        var jObj = {
            "type": "signin",
            "login": form.elements.login.value,
            "password": password,
        };

        request.send(JSON.stringify(jObj));
    });
});



