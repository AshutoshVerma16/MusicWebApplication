<?php

include_once "class/query.php";
;

$PAGE = $_GET["page"];
$PAGE_NO = $_GET["pageno"];
$POST_PER_PAGE = 10;

if ($PAGE == "home") {
    $START_FROM = $POST_PER_PAGE * ($PAGE_NO - 1);
    $myArray = array();
    $result = QUERY::query("select m.musicid,u.username as username,u.img as profileimg,u.cover as profilecover,m.music as musicurl,m.title,m.img as musicimage,m.time,m.view,m.url from music m,usersignup u where m.privacy=0 && u.userid=m.userid order by m.view desc limit $START_FROM,$POST_PER_PAGE");
    //$result = QUERY::query("select  * from music limit 10");
    if (mysqli_num_rows($result) == 0) {
        $myArray = array();
        $myNewArray = array();
        $myNewArray['code'] = 404;
        $myNewArray['message'] = "Page Not Found";
        $myArray[] = $myNewArray;
        echo json_encode(array("error" => $myArray));
        exit;
    }
    while ($row = $result->fetch_array(MYSQL_ASSOC)) {
        $row['musicurl'] = "http://music.initedit.com/upload/audio/public/" . $row['musicurl'];
        $row['musicimage'] = "http://music.initedit.com/upload/image/" . $row['musicimage'];
        $row['profileimg'] = "http://music.initedit.com/upload/profile/pic/" . $row['profileimg'];
        $row['profilecover'] = "http://music.initedit.com/upload/profile/cover/" . $row['profilecover'];

        $row['musiclike'] = QUERY::c("select count(*) from music_like where musicid=" . $row['musicid']);
        $myArray[] = $row;
    }
    echo json_encode(array("musics" => $myArray));
} else if ($PAGE == "related") {
    $_URL = $_GET['url'];
    $START_FROM = $POST_PER_PAGE * ($PAGE_NO - 1);
    $myArray = array();
    $result = QUERY::query("select m.musicid,u.username as username,u.img as profileimg,u.cover as profilecover,m.music as musicurl,m.title,m.img as musicimage,m.time,m.view,m.url from music m,usersignup u where m.privacy=0 && u.userid=m.userid  order by m.time desc limit $START_FROM,$POST_PER_PAGE");
    //$result = QUERY::query("select  * from music limit 10");
    if (mysqli_num_rows($result) == 0) {
        $myArray = array();
        $myNewArray = array();
        $myNewArray['code'] = 404;
        $myNewArray['message'] = "Page Not Found";
        $myArray[] = $myNewArray;
        echo json_encode(array("error" => $myArray));
        exit;
    }
    while ($row = $result->fetch_array(MYSQL_ASSOC)) {
        $row['musicurl'] = "http://music.initedit.com/upload/audio/public/" . $row['musicurl'];
        $row['musicimage'] = "http://music.initedit.com/upload/image/" . $row['musicimage'];
        $row['profileimg'] = "http://music.initedit.com/upload/profile/pic/" . $row['profileimg'];
        $row['profilecover'] = "http://music.initedit.com/upload/profile/cover/" . $row['profilecover'];
        $row['musiclike'] = QUERY::c("select count(*) from music_like where musicid=" . $row['musicid']);
        $myArray[] = $row;
    }
    echo json_encode(array("musics" => $myArray));
}else if ($PAGE == "search") {
    $_URL = $_GET['url'];
    $START_FROM = $POST_PER_PAGE * ($PAGE_NO - 1);
    $myArray = array();
    $result = QUERY::query("select m.musicid,u.username as username,u.img as profileimg,u.cover as profilecover,m.music as musicurl,m.title,m.img as musicimage,m.time,m.view,m.url from music m,usersignup u where m.privacy=0 && u.userid=m.userid  order by m.time desc limit $START_FROM,$POST_PER_PAGE");
    //$result = QUERY::query("select  * from music limit 10");
    if (mysqli_num_rows($result) == 0) {
        $myArray = array();
        $myNewArray = array();
        $myNewArray['code'] = 404;
        $myNewArray['message'] = "Page Not Found";
        $myArray[] = $myNewArray;
        echo json_encode(array("error" => $myArray));
        exit;
    }
    while ($row = $result->fetch_array(MYSQL_ASSOC)) {
        $row['musicurl'] = "http://music.initedit.com/upload/audio/public/" . $row['musicurl'];
        $row['musicimage'] = "http://music.initedit.com/upload/image/" . $row['musicimage'];
        $row['profileimg'] = "http://music.initedit.com/upload/profile/pic/" . $row['profileimg'];
        $row['profilecover'] = "http://music.initedit.com/upload/profile/cover/" . $row['profilecover'];
        $row['musiclike'] = QUERY::c("select count(*) from music_like where musicid=" . $row['musicid']);
        $myArray[] = $row;
    }
    echo json_encode(array("musics" => $myArray));
} else if ($PAGE == "new") {

    $START_FROM = $POST_PER_PAGE * ($PAGE_NO - 1);
    $myArray = array();
    $result = QUERY::query("select m.musicid,u.username as username,u.img as profileimg,u.cover as profilecover,m.music as musicurl,m.title,m.img as musicimage,m.time,m.view,m.url from music m,usersignup u where m.privacy=0 && u.userid=m.userid  order by m.time desc limit $START_FROM,$POST_PER_PAGE");
    //$result = QUERY::query("select  * from music limit 10");
    if (mysqli_num_rows($result) == 0) {
        $myArray = array();
        $myNewArray = array();
        $myNewArray['code'] = 404;
        $myNewArray['message'] = "Page Not Found";
        $myArray[] = $myNewArray;
        echo json_encode(array("error" => $myArray));
        exit;
    }
    while ($row = $result->fetch_array(MYSQL_ASSOC)) {
        $row['musicurl'] = "http://music.initedit.com/upload/audio/public/" . $row['musicurl'];
        $row['musicimage'] = "http://music.initedit.com/upload/image/" . $row['musicimage'];
        $row['profileimg'] = "http://music.initedit.com/upload/profile/pic/" . $row['profileimg'];
        $row['profilecover'] = "http://music.initedit.com/upload/profile/cover/" . $row['profilecover'];
        $row['musiclike'] = QUERY::c("select count(*) from music_like where musicid=" . $row['musicid']);
        $myArray[] = $row;
    }
    echo json_encode(array("musics" => $myArray));
}else if ($PAGE == "random") {

    $START_FROM = $POST_PER_PAGE * ($PAGE_NO - 1);
    $myArray = array();
    $result = QUERY::query("select m.musicid,u.username as username,u.img as profileimg,u.cover as profilecover,m.music as musicurl,m.title,m.img as musicimage,m.time,m.view,m.url from music m,usersignup u where m.privacy=0 && u.userid=m.userid  order by RAND() limit $START_FROM,$POST_PER_PAGE");
    //$result = QUERY::query("select  * from music limit 10");
    if (mysqli_num_rows($result) == 0) {
        $myArray = array();
        $myNewArray = array();
        $myNewArray['code'] = 404;
        $myNewArray['message'] = "Page Not Found";
        $myArray[] = $myNewArray;
        echo json_encode(array("error" => $myArray));
        exit;
    }
    while ($row = $result->fetch_array(MYSQL_ASSOC)) {
        $row['musicurl'] = "http://music.initedit.com/upload/audio/public/" . $row['musicurl'];
        $row['musicimage'] = "http://music.initedit.com/upload/image/" . $row['musicimage'];
        $row['profileimg'] = "http://music.initedit.com/upload/profile/pic/" . $row['profileimg'];
        $row['profilecover'] = "http://music.initedit.com/upload/profile/cover/" . $row['profilecover'];
        $row['musiclike'] = QUERY::c("select count(*) from music_like where musicid=" . $row['musicid']);
        $myArray[] = $row;
    }
    echo json_encode(array("musics" => $myArray));
} else if ($PAGE == "overview" || $PAGE == "like" || $PAGE == "music") {
    $PROFILE_USERNAME = $_GET['username'];
    $START_FROM = $POST_PER_PAGE * ($PAGE_NO - 1);
    $myArray = array();
    if ($PAGE == "overview" || $PAGE == "music")
        $result = QUERY::query("select m.musicid,u.username as username,u.img as profileimg,u.cover as profilecover,m.music as musicurl,m.title,m.img as musicimage,m.time,m.view,m.url from music m,usersignup u where m.privacy=0 && u.userid=m.userid && u.username='{$PROFILE_USERNAME}' order by m.time desc limit $START_FROM,$POST_PER_PAGE");
    else if ($PAGE == "like")
        $result = QUERY::query("select m.musicid,u.username as username,u.img as profileimg,u.cover as profilecover,m.music as musicurl,m.title,m.img as musicimage,m.time,m.view,m.url from music m,usersignup u where m.privacy=0 && u.userid=m.userid && m.musicid IN (select ml.musicid from music_like ml where ml.userid=(select us.userid from usersignup us where us.username='{$PROFILE_USERNAME}')) order by m.time desc limit $START_FROM,$POST_PER_PAGE");
    //$result = QUERY::query("select  * from music limit 10");
    if (mysqli_num_rows($result) == 0) {
        $myArray = array();
        $myNewArray = array();
        $myNewArray['code'] = 404;
        $myNewArray['message'] = "Page Not Found";
        $myArray[] = $myNewArray;
        echo json_encode(array("error" => $myArray));
        exit;
    }
    while ($row = $result->fetch_array(MYSQL_ASSOC)) {
        $row['musicurl'] = "http://music.initedit.com/upload/audio/public/" . $row['musicurl'];
        $row['musicimage'] = "http://music.initedit.com/upload/image/" . $row['musicimage'];
        $row['profileimg'] = "http://music.initedit.com/upload/profile/pic/" . $row['profileimg'];
        $row['profilecover'] = "http://music.initedit.com/upload/profile/cover/" . $row['profilecover'];
        $row['musiclike'] = QUERY::c("select count(*) from music_like where musicid=" . $row['musicid']);
        $myArray[] = $row;
    }
    echo json_encode(array("musics" => $myArray));
}
?>
