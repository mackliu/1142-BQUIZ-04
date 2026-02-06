<h2 class="ct">商品分類</h2>
<div class="ct">
    新增大分類
    <input type="text" name="big" id="big">
    <button onclick="saveType('big')">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="bigs" id="bigs"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="saveType('mid')">新增</button>
</div>
<table class="all">
    <?php 
        $bigs=$Type->all(['big_id'=>0]);
        foreach($bigs as $big):
    ?>
    <tr class='tt'>
        <td><?=$big['name'];?></td>
        <td class='ct'>
            <button class="edit-btn" data-id="<?=$big['id'];?>">修改</button>
            <button class="del-btn" data-id="<?=$big['id'];?>">刪除</button>
        </td>
    </tr>
    <?php 
        if($Type->count(['big_id'=>$big['id']])>0):
          $mids=$Type->all(['big_id'=>$big['id']]);
          foreach($mids as $mid):
    ?>
    <tr class='pp ct'>
        <td><?=$mid['name'];?></td>
        <td>
            <button class="edit-btn" data-id="<?=$mid['id'];?>">修改</button>
            <button class="del-btn" data-id="<?=$mid['id'];?>">刪除</button>
        </td>
    </tr>

    <?php
        endforeach;
    endif;
    ?>





    <?php
        endforeach;
    ?>
</table>


<h2 class="ct">商品管理</h2>
<div class="ct"><button onclick="location.href='?do=add_item'">新增商品</button></div>






<script>
getBigs();
function saveType(type){
    let name='';
    let big_id=0;
    switch(type){
        case 'big':
            name=$("#big").val();
        break;
        case 'mid':
            name=$("#mid").val();
            big_id=$("#bigs").val();

        break;
    }
    $.post("api/save_type.php",{name,big_id},()=>{
        location.reload();
    })
}
function getBigs(){
    $.get('api/get_bigs.php',(bigs)=>{
            $("#bigs").html(bigs);
    })
}

$(".del-btn").on("click",function(){
    let id=$(this).data('id');
    $.post("api/del.php",{id,table:'Type'},()=>{
        location.reload()
    })
})

$(".edit-btn").on('click',function(){
    let id=$(this).data('id');
    let text=$(this).parent().prev().text();
    let name=prompt("請輸入分類名稱",text);
    $.post("api/save_type.php",{id,name},()=>{
        location.reload();
    })

})
</script>
