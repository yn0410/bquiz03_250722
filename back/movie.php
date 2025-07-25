<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<style>
    .movie{
        display: flex;
        width: 95%;
        height: 100px;
        margin: auto;
        box-shadow: 0 0 3px #999;
        align-items: center;
        padding: 2px;
    }

    .movie > div:nth-child(1){ /* 縮圖(?) */
        width: 10%;
        /* height: 100px; */
    }

    .movie > div:nth-child(2){ /* 分級 */
        width: 10%;
        /* height: 100px; */
    }

    .movie > div:nth-child(3){ /* 橫向第三格 */
        width: 80%;
    }

    .movie > div:nth-child(3) > div:nth-child(1){ /* "片名,片長,上映時間"的上一層 */
        display: flex;
    }

    .movie > div:nth-child(3) > div:nth-child(1) div{ /* 指'片名','片長','上映時間'這三個div */
        width: 33%;
    }
</style>
<?php
$movies = $Movie->all(" order by `rank`");
foreach($movies as $movie):
?>
<div class="movie">
    <div>
        <img src="./image/<?=$movie['poster']?>" style="width:60px; height:80px;">
    </div>
    <div>
        分級: <img src="./icon/03C0<?=$movie['level']?>.png" style="width:20px;">
    </div>
    <div>
        <div>
            <div>片名：<?=$movie['name'];?></div>
            <div>片長：<?=$movie['length'];?></div>
            <div>上映時間：<?=$movie['ondate'];?></div>
        </div>
        <div>
            <button>顯示</button>
            <button>往上</button>
            <button>往下</button>
            <button>編輯電影</button>
            <button>刪除電影</button>
        </div>
        <div>
            劇情介紹：<?=$movie['intro'];?>
        </div>
    </div>
</div>
<hr>
<?php endforeach; ?>