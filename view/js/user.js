
function registerPost() {
    var params = $("#form").serializeArray();
    var values = {};
    for( x in params ){
        values[params[x].name] = params[x].value;
    }
    $.ajax({
        url: "../controller/user_action.php",
        type: "post",
        data: values,
        dataType: 'json',
        success: function (msg) {
            window.location.href = "login.html";
        },
        error: function (e) {
            alert("注册失败，请重新注册");
        }
    });

}

function loginPost() {
   var form = document.getElementById("form1");
    var obj = new Object();

    for (var i = 0; i < form.length; i++) {
        obj[form.elements[i].name] = form.elements[i].value;
    }


    $.ajax({
        url: "../controller/user_action.php?action=login",
        type: "post",
        data: obj,
        dataType: 'json',
        success: function (msg) {
            window.location.href = "home.html";
        },
        error: function (e) {
            alert("登录失败，请重新登录");
        }
    });
}