<?php
if (!isset($_SESSION['userid'])) {
    echo "<h3>Login First</h3>";
    exit();
}
$GROUP_ID = $_SESSION['groups'];
if (QUERY::c("select count(*) from groups where groupid=$GROUP_ID && permission IN ('*','home')")=="0") {
    echo "<h3>Permission Denied.</h3>";
    exit();
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="language" content="english"/>
        <title>Admin - Initedit Music</title>
        <link rel="icon" href="/favicon.ico"/>
        <script type="text/javascript"  src="/js/index.js"></script>
        <style>
            html,body{
                background: #FFF;
                color:#000;
                padding: 0px;
                margin: 0px;
                width: 100%;
                height: 100%;
            }

            a{
                text-decoration: none;
                color:#000;
            }
            .vl,.hl{
                list-style: none;
                padding: 0px;
                margin: 0px;
            }
            .hl > li{
                float: left;
                list-style: none;

            }
            .clearFix{
                clear: both;   
            }
            .body{
                min-height: 75%;
                min-width: 95%;
                background: #DDD;
                margin: 0 auto;
                max-width: 98%;
                overflow: hidden;
            }
            .header{
                height: 50px;
                border-bottom: 1px solid #18F3AD;
                background:#FFF;
                color:#000;
            }
            .footer{
                height: 50px;
                border-top: 1px solid #18F3AD;
                background:#FFF;
                color:#000;
                line-height: 50px;
            }
            .footer ul li a{
                padding: 0px 10px;
                margin-right: 10px; 
            }
            .footer> ul{
                width: 70%;
                margin: 0 auto;
                min-width: 950px;
            }
            .header > ul{
                width: 70%;
                margin: 0 auto;
                min-width: 950px;
            }
            .header > ul {
                line-height: 50px;   
            }

            .header  .headerSearch{
                outline:none;
                border: 1px solid #18F3AD;
                padding:2px 10px;
                margin-top: 10px;
            }
            .input{
                width: 98%;
                padding: 1%;
            }
            .adminMenu{
                width: 15%;
                min-width: 150px;
                border-right: 2px solid #111;
                background: #333;
                color: #FFF;
            }
            .adminMenu .menu,.adminMenu .menuLabel{
                padding: 10px;
            }
            .adminMenu .menu:hover{
                background: #222;
                color: #18F3AD;
            }
            .adminMenu .menuLabel{
                font-weight: bold;  
                border-bottom: 2px solid #222;
            }
            .adminMain{
                padding-left: 1%;
                width: 83%;
                min-width: 800px;
            }
            .stats{

            }
            .stats > .statItem{
                overflow: hidden;
            }
            stats > .statItem > .itemContainer{
                overflow: hidden;
            }
            .stats > .statItem > .itemContainer > li{
                overflow: hidden;
                padding-right: 20px;
                min-width: 150px;
                text-align: left;
                background: #333;
                color: #FFF;
                margin-bottom:5px;
                padding: 10px;
                margin-right: 5px;
            }

            .table{

            }
            .table > .tableItem{
                overflow: hidden;
            }
            .table > .tableItem > .itemContainer{
                overflow: hidden;
            }
            .table > .tableItem > .itemContainer > tr > td{
                overflow: hidden;
                padding-right: 20px;
                min-width: 150px;
                text-align: left;
                background: #333;
                color: #FFF;
                margin-bottom:5px;
                padding: 10px;
                margin-right: 5px;
            }

        </style>
    </head>
    <body>
        <div class="header">
            <ul class="hl">
                <li class="homeButton"><a href="/">Initedit</a></li>
            </ul>
        </div>
        <div class="clearFix"></div>
        <div class="body" style="position: relative;">
            <ul class="hl">
                <li class="adminMenu">
                    <ul class="vl">
                        <li class="menuLabel">Menu's</li>
                        <li class="menu" onclick="loadAdminPage('stats')">Stats</li>
                        <li class="menu" onclick="loadAdminPage('adminuser/1')">User</li>
                        <li class="menu" onclick="loadAdminPage('adminmusic/1')">Music</li>
                        <li class="menu" onclick="loadAdminPage('adminerror/1')">Error</li>
                    </ul>
                </li>
                <li class="adminMain">
                    <div id="adminData">

                    </div>
                </li>
            </ul>
        </div>
        <script>
            window.addEventListener("load",loadAdminPage("stats"));
            function loadAdminPage(page) {
                var tmp = post("/administrator/adminAjaxHandler.php", "page=" + page, true, function() {
                    if (this.readyState === 4 && this.status === 200) {
                        $("#adminData").text(this.responseText);
                    }
                });
            }
            function editMusic(id) {
                title = $("#editMusicTitle").val();
                desc = $("#editMusicDesc").val();
                url = $("#editMusicURL").val();
                tag = $("#editMusicTag").val();
                editMuscXML = post("/administrator/db/editmusic.php",
                        "musicid=" + id + "&title=" + title + "&description=" + desc + "&url=" + url + "&tag=" + tag,
                        true,
                        function() {
                            if (this.readyState === 4 && this.status === 200) {
                                jsonObjectResponse = JSON.parse(this.responseText);
                                alert(jsonObjectResponse.message);
                            }
                        }
                );
            }
            function deleteMusic(id) {
                var deleteConfirm = confirm("Are You Sure?");
                if (deleteConfirm) {
                    var deleteMusicXML = post("/administrator/db/deletemusic.php",
                            "musicid=" + id,
                            true,
                            function() {
                                if (this.readyState === 4 && this.status === 200) {
                                    jsonObjectResponse = JSON.parse(this.responseText);
                                    alert(jsonObjectResponse.message);
                                }
                            }
                    );
                }
            }


            function editUser(username) {
                status = $("#accountStatus").val();
                adminship = $("#adminshipLevel").val();
                ;
                editMuscXML = post("/administrator/db/edituser.php",
                        "username=" + username + "&status=" + status + "&adminship=" + adminship,
                        true,
                        function() {
                            if (this.readyState === 4 && this.status === 200) {
                                jsonObjectResponse = JSON.parse(this.responseText);
                                alert(jsonObjectResponse.message);
                            }
                        }
                );
            }
        </script>
        <div class="clearFix"></div>
        <div class="footer" id="footer">
            <ul class="hl">
                <li><a href="/about">About us</a></li>
                <li><a href="/help">Help</a></li>
                <li><a href="/privacy">Privacy</a></li>
                <li><a href="/cookie">Cookie</a></li>
            </ul>
        </div>
    </body>
</html>
