function hideCookie() {
    /* Create the expiry date (today + 1 year) */
    var CookieDate = new Date();
    CookieDate.setFullYear(CookieDate.getFullYear() + 1);
    /* Set the cookie (acceptance of cookies usage) */
    document.cookie =
        "infoCookies=true; expires=" + CookieDate.toGMTString() + ";";
    /* When "OK" clicked, hides this popup */
    document.getElementById("cookies").style.display = "none";
}
