<h3><span style="" class="hashTagsTitle">#</span><span style="font-size: 70px;opacity: 0.6;"><?php echo $HASH_STRING;?></span></h3>
<?php
$query = "select musicid,userid,music,img,waveimg,title,name,time,url,privacy from music where privacy=0";
$COUNT_QUERY = $query;
$result = QUERY::query("$query order by time desc limit $START_FROM,$MUSIC_PER_PAGE");
$musicModel = new MusicModel;
while($res = mysqli_fetch_array($result))
{
    extract($res);
    $musicModel->id=$musicid;
    $musicModel->userid=$userid;
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
$TOTAL_COUNT = QUERY::c("select count(*) from ($COUNT_QUERY) as temp");
?>
<div class="clearFix"></div>
<p></p>
<div>
    <ul class="hl" style="float:right;">
        <?php if ($PAGE_NUMBER > 1) { ?>
        <li><a href="/hash/<?php echo $HASH_STRING;?>/<?php echo $PAGE_NUMBER-1;?>" class="pagingButton">Previous</a></li>
        <?php } ?>
        <?php if ($PAGE_NUMBER*$MUSIC_PER_PAGE < $TOTAL_COUNT) { ?>
        <li><a href="/hash/<?php echo $HASH_STRING;?>/<?php echo $PAGE_NUMBER+1;?>" class="pagingButton">Next</a></li>
        <?php } ?>
    </ul>
</div>
<div class="clearFix"></div>
<p></p>