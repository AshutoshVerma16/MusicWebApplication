<?php
include_once "../session/session_start.php";
include_once "../class/query.php";
$URL_ID = trim($_POST['musicid']);

$_MUSIC_URL = QUERY::c("select url from music where music like '{$URL_ID}____'");

$URL = "http://saavan.com/$_MUSIC_URL";
$URL_ENCODE = urlencode($URL);
?>
<div style="width: 400px;margin: 0 auto;">
<h2>Share Music</h2>
<div>
    <ul class="vl">
        <li style="margin-bottom: 25px;">
            <a href="<?php echo $URL_ENCODE;?>"><input type="button" value="Twitter" class="input" style="background: #55acee;color:#FFF;border: none;padding: 20px;cursor: pointer;"/></a>
        </li>

        <li style="margin-bottom: 25px;">
            <a href="<?php echo $URL;?>"><input type="button" value="Google Plus" class="input" style="background:#dc4e41 ;color:#FFF;border: none;padding: 20px;cursor: pointer;"/></a>
        </li>
    </ul>
</div>
</div>
