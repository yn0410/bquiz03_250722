<style>
  .lists {
    width: 210px;
    height: 240px;
    margin: 0 auto;
    position: relative;
    overflow: hidden;
  }

  .btns {
    width: 320px;
    height: 120px;
    overflow: hidden;
    display: flex;
  }
  .left, .right{
    width: 0;
    height: 0;
    border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;

  }
  .left{
    border-left: 0px solid black;
    border-right: 33px solid black;

  }
  .right{
    border-left: 33px solid black;
    border-right: 0px solid black;

  }
  .controls{
    display: flex;
    align-items: center;
    justify-content: space-around;
  }
  .poster{
    text-align:center;
    position:absolute;
    width:210px;
    height:240px;
    display:none;
  }
  .poster img{
    width: 200px;
    height: 220px;
  }

  .poster-btn{
    width: 80px;
    height: 100px;
    display: inline-block;
    flex-shrink: 0;
    font-size: 12px;
    position: relative;
  }

  .poster-btn img{
    width: 70px;
    height: 90px;
  }
</style>
<?php
$posters=$Poster->all(['sh'=>1]," order by `rank`");

?>

<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
    <div>
      <div class="lists">
        <?php
        foreach($posters as $poster):
        ?>
        <div class="poster" data-ani="<?=$poster['ani'];?>" data-id="<?=$poster['id'];?>">
          <img src="./image/<?=$poster['img'];?>">
          <div><?=$poster['name'];?></div>
        </div>
        <?php
        endforeach;?>
      </div>
        
        <div class="controls">
          <div class="left"></div>
          <div class="btns">
            <?php
            foreach($posters as $key => $poster):
              ?>
            <div class="poster-btn ct" data-ani="<?=$poster['ani'];?>" data-id="<?=$poster['id'];?>">
              <img src="./image/<?=$poster['img'];?>">
              <div><?=$poster['name'];?></div>
            </div>
            <?php
            endforeach;?>
          </div>
          <div class="right"></div>
        </div>
      </div>
  </div>
</div>

<script>
  let rank = 0; //順序?
  $(".poster").eq(rank).show();

  let slider = setInterval(()=>{ //每2秒 換一個"預告片"顯示
    animater();
    /* rank++;
    if(rank>$(".poster").length-1){
      rank=0;
    }
    $(".poster").hide();
    $(".poster").eq(rank).show(); */
  },2000);

  function animater(){
    let now=$(".poster:visible"); //現在正在顯示的那個"預告片"
    rank++;
    if(rank>$(".poster").length-1){
      rank=0;
    }
    let next=$(".poster").eq(rank);
    // console.log($(now).data('ani'), $(now).index(), $(now).eq());
    let ani = $(now).data('ani');
    // console.log('ani', ani);
    

    switch(ani){
      case 1:
        // 淡入淡出
        $(now).fadeOut(1000);
        $(next).fadeIn(1000);
        break;
      case 2:
        $(now).hide(1000);
        $(next).show(1000);
        break;
      case 3:
        $(now).slideUp(1000);
        $(next).slideDown(1000);
        break;
      
    }
  }

  // 首頁 預告片介紹 的 下方按鈕的水平移動功能
  let p = 0; //記錄 點按鈕 幾下了?
  $(".left, .right").on("click", function(){
    let arrow = $(this).attr('class'); //左 或 右 鍵被點選
    // console.log(arrow);
    switch(arrow){
      case 'left':
        if(p>0){
          p--;
        }
        break;
      case 'right':
        if(p < $(".poster-btn").length-4){ //只能移動 有的資料量-4 的次數(?); 因為顯示4張
          p++;
        }
        break;
    }

    $(".poster-btn").animate({right:p*80}, 500); //80 單位=px; 500毫秒=0.5秒
    
  });

</script>

<div class="half">
  <h1>院線片清單</h1>
  <div class="rb tab" style="width:95%;">
    <table>
      <tbody>
        <tr> </tr>
      </tbody>
    </table>
    <div class="ct"> </div>
  </div>
</div>