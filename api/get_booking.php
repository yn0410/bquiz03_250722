<?php include_once "db.php";?>
<style>
    .booking-box{
        width: 540px;
        height: 370px;
        background: url("./icon/03D04.png") no-repeat center;
        margin: 0 auto;
    }
    .info-box{
        background: #ddd;
        width: 540px;
        margin: 10px auto;
        padding: 10px 70px;
        box-sizing: border-box;
    }
    #seats{
        display: flex;
        flex-wrap: wrap;
        /* 64*5=320; 86*4=344 */
        width: 320px;
        height: 344px;
        margin: 0 auto;
        padding: 18px;
    }
    .seat{
        width: 64px;
        height: 86px;
        box-sizing: border-box;
        /* background: #ddd; */
        text-align: center;
        padding: 2px;
        position: relative;
    }
    .seat input[type="checkbox"]{
        position: absolute;
        bottom: 5px;
        right: 5px;
    }
    .seat:nth-child(odd){
        width: 64px;
        height: 86px;
        box-sizing: border-box;
        /* background: #eee; */
    }

    .booked{ /* 已被訂位了 */
        background: url("./icon/03D03.png") no-repeat center;
    }

    .null{ /* 還未被訂位 */
        background: url("./icon/03D02.png") no-repeat center;
    }
</style>


<!-- for loop
0 -> 1排1號 =>0/5=0...0
1 -> 1排2號 =>1/5=0...1
2 -> 1排3號 =>2/5=0...2
3 -> 1排4號 =>3/5=0...3
4 -> 1排5號 =>4/5=0...4
5 -> 2排1號 =>5/5=1...0
6 -> 2排2號 =>6/5=1...1
7 -> 2排3號 =>7/5=1...2
8 -> 2排4號 =>8/5=1...3
9 -> 2排5號 =>9/5=1...4
10 -> 3排1號 =>10/5=1...0
11 -> 3排2號 =>11/5=1...1
12 -> 3排3號
13 -> 3排4號
14 -> 3排5號
15 -> 4排1號
16 -> 4排2號
17 -> 4排3號
18 -> 4排4號
19 -> 4排5號 -->
<div class="booking-box">
    <div id="seats">
        <?php 
        for($i=0; $i<20; $i++):
            $booked='null'; //預設都未被訂位
        ?>
            <div class="seat <?=$booked;?>">
                <div>
                    <?=floor($i/5)+1;?>排<?=($i%5)+1;?>號
                </div>
                <input type="checkbox" name="seat" value="<?=$i;?>">
            </div>
        <?php 
        endfor;
        ?>
    </div>


</div>

<div class="info-box">
    <div class="order-info">
        <div>您選擇的電影是：<?=$Movie->find($_GET['id'])['name'];?></div>
        <div>您選擇的時刻是：<?=$_GET['date'];?> <?=$_GET['session'];?></div>
        <div>您已經勾選<span id="tickets">0</span>張票，最多可以購買四張票</div>
    </div>
    <div class="ct">
        <button class="btn-prev">上一步</button>
        <button class="btn-order">訂購</button>
    </div>
</div>

<script>
    let selectedSeats=[];
    $(".seat input[type='checkbox']").on("change", function(){
        // console.log($(this).prop("checked"), $(this).val());

        if($(this).prop("checked")){
            if(selectedSeats.length < 4){ //點完(checkbox)的當下 是否<4
                selectedSeats.push($(this).val());
                // $(this).parent().removeClass("null").addClass("booked"); //圖示對換，有閒再做
            }else{
                alert("最多只能選擇四張票");
                $(this).prop("checked", false); //把多勾選的取消掉
            }
        }else{
            selectedSeats.splice(selectedSeats.indexOf($(this).val()), 1);
            // $(this).parent().removeClass("booked").addClass("null"); //圖示對換，有閒再做
        }
        // console.log(selectedSeats);
        $("#tickets").text(selectedSeats.length);
    });

    $(".btn-order").on("click", function(){
        $.post("./api/booking.php", {
            movie:"<?=$Movie->find($_GET['id'])['name'];?>",
            date:"<?=$_GET['date'];?>",
            session:"<?=$_GET['session'];?>",
            seats:selectedSeats
        },(no)=>{
            console.log(no);
            location.href=`?do=result&no=${no}`;
        });
    });
</script>