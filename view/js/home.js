window.onload = function () {
    var oImage = document.getElementById('image');
    var arrImgUrl = ["image/8.jpg", "image/top.jpg"]
    var num = 0;

    function Tab() {
        num++;
        if (num > arrImgUrl.length - 1) {
            num = 0;
        }
        oImage.src = arrImgUrl[num];
    }
    setInterval(Tab, 3000)
}