function setupLogoutBtnLogic() {
    let btn = document.getElementById("logBtn");

    let logoutBtn = document.createElement("li");
    logoutBtn.className = "l1 user_creds";
    logoutBtn.id = "logBtn";
    logoutBtn.style = "float: right;";
    logoutBtn.innerHTML = "<a class='center-text'>Logout</a>";

    logoutBtn.addEventListener("click", function () {
        document.cookie.split(";").forEach(function (c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });
        location.href = 'http://localhost/web/php/login.php';
    });

    logoutBtn.addEventListener("mouseleave", function () {
        logoutBtn.replaceWith(btn);
    })

    btn.addEventListener("mouseenter", handelMouserEnterEvent);

    function handelMouserEnterEvent(event) {
        let img_count = event.target.getElementsByTagName("img").length;

        console.log("HELLO");

        if (img_count > 0) {
            btn.replaceWith(logoutBtn);
        }
}


}

