<h3 class="ct">訂單管理</h3>
<div class="quick-del">
    快速刪除：
    <!-- input:radio[name='type'] -->
     <input type="radio" name="type" id="date" value="date" checked>依日期
     <input type="text" name="date">
     <input type="radio" name="type" id="movie" value="movie">依電影
     <select name="movie"> <!-- 訂單裡有被訂的電影 -->
        <?php
        $movies = q("select `movie` from `orders` group by `movie`");
        foreach($movies as $movie){
            echo "<option value='{$movie['movie']}'>{$movie['movie']}</option>";
        }
        ?>

     </select>
</div>