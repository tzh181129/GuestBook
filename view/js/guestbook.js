
function publishPost() {
    var form = document.getElementById("form");
    var obj = new Object();

    for (var i = 0; i < form.length; i++) {
        obj[form.elements[i].name] = form.elements[i].value;
    }
    $.ajax({
        url: "../controller/guestbook_action.php",
        type: "post",
        data: obj,
        dataType: 'json',
        success: function (msg) {
            alert('发表留言成功');
        },
        error: function () {
            alert("发表留言失败");
        }
    });

}
function replyPost() {
    var form = document.getElementById("form");
    var obj = new Object();

    for (var i = 0; i < form.length; i++) {
        obj[form.elements[i].name] = form.elements[i].value;
    }
    $.ajax({
        url: "../controller/guestbook_action.php",
        type: "post",
        data: obj,
        dataType: 'json',
        success: function (msg) {
            window.location.href = "allreply.html";
        },
        error: function () {
            alert("发表回复失败");
        }
    });
}
function look(){
    $.ajax({
        type: "GET",
        url: "../controller/look.php?action=look",
        success: function (data) {
            var str = "<table align='center'>";
            $.each(data, function (i, n) {
                str += "<tr>" + "<td width='50' align='center'>" + n.user_id + "</td>";
                str += "<td width='350' align='center'>" + n.content + "</td>";
                str += "<td width='200' align='center'>" + n.createtime + "</td>";
                str += "<td width='50' align='center'>" + "<a href='reply.html'>回复</a>" + "</td>";
                str += "<td width='50' align='center'>" + "<a href=../controller/look.php?action=delete && id=n.id>删除</a>" + "</td>" + "</tr>";
            });
            str += "</table>";
            $("#mess").append(str);
        }
    });
}

function allReply(){
    $.ajax({
        type:"GET",
        url:"../controller/look.php?action=allreply",
        success: function(data){
            var str="<table align='center'>";
            $.each(data,function(i,n) {
                str += "<tr>" + "<td width='50' align='center'>" + n.reply_id + "</td>";
                str += "<td width='350' align='center'>" + n.recontent + "</td>";
                str += "<td width='200' align='center'>" + n.retime + "</td>" + "</tr>";
            })
            str+="</table>";
            $("#test").append(str);
        }
    });
}
