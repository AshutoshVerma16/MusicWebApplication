<div style="position: relative;min-height:300px;max-width:100%;">
    <div id="homebanner1" class="homebanner" style="position: absolute;width: 100%;height:100%;left:0%;">
        <div style="background: url(/image/background/banner1.jpg?1);width:100%;height:100%;background-repeat: no-repeat;background-size: cover;position: absolute;"></div>
        <a href="/playlist/ashish/top-2015-songs">
            <!--
            <div style="position: absolute;top:50px;left:100px;color:#18F3AD;font-size: 2em;font-family: fantasy;">
                The <br/>Best Song's Of 2015 2
            </div>
            -->
        </a>
    </div>

    <div id="homebanner2" class="homebanner" style="position: absolute;width: 100%;height:100%;left:100%;">
        <div style="background: url(/image/background/banner2.jpg?4);width:100%;height:100%;background-repeat: no-repeat;background-size: cover;position: absolute;"></div>
        <a href="/playlist/ashish/top-2015-songs" class="bannerText" >

             The <br/>Best Songs till date
        </a>
    </div>

    <div id="homebanner3" class="homebanner" style="position: absolute;width: 100%;height:100%;left:-100%;">
        <div style="background: url(/image/background/banner3.jpg?2);width:100%;height:100%;background-repeat: no-repeat;background-size: cover;position: absolute;"></div>
        <a href="/surprise" class="bannerText">
            Surprise Me <br/> <span style="font-family: sans-serif;">: )</span>
        </a>
    </div>
    <div id="homeBannerIndicator1" style="position: absolute;left:45%;top:90%;border-radius: 5px;width:10px;height:10px;" class="bannerNumberHighlight">

    </div>
    <div id="homeBannerIndicator2" style="position: absolute;left:50%;top:90%;border-radius: 5px;width:10px;height:10px;" class="bannerNumber">

    </div>
    <div id="homeBannerIndicator3" style="position: absolute;left:55%;top:90%;border-radius: 5px;width:10px;height:10px;" class="bannerNumber">

    </div>
</div>

<h3 style="padding-left: 10px;"><a href="/trending" style="margin-right: 25px;padding-bottom: 10px;" class="trendingBorder">Trending</a> <a href="/new">New</a></h3>
<?php
$result = QUERY::query("select musicid,userid,music,img,waveimg,title,name,time,url,privacy from music where privacy=0 order by view desc limit 0,10");
$musicModel = new MusicModel;
while ($res = mysqli_fetch_array($result)) {
    extract($res);
    $musicModel->id = $musicid;
    $musicModel->userid = $userid;
    $musicModel->userName = QUERY::c("select username from usersignup where userid=$userid");
    $musicModel->filename = $music;
    $musicModel->imageName = $img;
    $musicModel->imageWave = $music;
    $musicModel->title = $title;
    $musicModel->name = $name;
    $musicModel->time = $time;
    $musicModel->url = $url;
    $musicModel->privacy = $privacy;
    $musicModel->playlistClass = "TRENDING";

    MusicView::output($musicModel);
}
?>
<div class="clearFix"></div>
<p></p>
<!--
<hr/>
<h3 style="padding-left: 10px;"><a href="/new">New</a></h3>
<?php
/*
  $result = QUERY::query("select musicid,userid,music,img,waveimg,title,name,time,url,privacy from music where privacy=0 order by time desc limit 0,10");
  $musicModel = new MusicModel;
  while ($res = mysqli_fetch_array($result)) {
  extract($res);
  $musicModel->id = $musicid;
  $musicModel->userid = $userid;
  $musicModel->userName = QUERY::c("select username from usersignup where userid=$userid");
  $musicModel->filename = $music;
  $musicModel->imageName = $img;
  $musicModel->imageWave = $music;
  $musicModel->title = $title;
  $musicModel->name = $name;
  $musicModel->time = $time;
  $musicModel->url = $url;
  $musicModel->privacy = $privacy;
  $musicModel->playlistClass = "NEW";
  MusicView::output($musicModel);
  }
 *
 */
?>
-->
<!--
<div style="margin-top: 20px;font-family: sans-serif;text-align: center;">
    <h1>Thanks for listening. Now join in.</h1>
    <h3 style="color:#777;">Save musics and create playlists. All  for free. </h3>
    <p></p>
    <p><input type="button" class="loginButton" style="padding:10px 20px;" value="Create account"/></p>
    <p></p>
    <h3 style="opacity: 0.6;">Already have account? <input type="button" style="background: #DDD;" value="Log in"/></h3>
</div>
-->
