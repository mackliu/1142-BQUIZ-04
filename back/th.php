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
            <button class="del-btn" data-table="Type" data-id="<?=$big['id'];?>">刪除</button>
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
            <button class="del-btn" data-table="Type" data-id="<?=$mid['id'];?>">刪除</button>
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
<table class="all">
<tr class="tt ct">
    <td>編號</td>
    <td>商品名稱</td>
    <td>庫存量</td>
    <td>狀態</td>
    <td>操作</td>
</tr>
<?php
$items=$Item->all();

foreach($items as $item):

?>
<tr class="pp ct">
    <td><?=$item['no'];?></td>
    <td><?=$item['name'];?></td>
    <td><?=$item['stock'];?></td>
    <td><?=($item['sh']==1)?'販售中':'已下架';?></td>
    <td>
        <button data-table="Item"  onclick="location.href='?do=edit_item&id=<?=$item['id'];?>'">修改</button>
        <button class='del-btn' data-table="Item" data-id="<?=$item['id'];?>">刪除</button>
        <button class='on-btn' data-table="Item" data-sh='1' data-id="<?=$item['id'];?>">上架</button>
        <button class='off-btn' data-table="Item" data-sh='0' data-id="<?=$item['id'];?>">下架</button>
    </td>
</tr>

<?php
endforeach;
?>

</table>



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
    let table=$(this).data('table');
    $.post("api/del.php",{id,table},()=>{
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

$(".on-btn,.off-btn").on('click',function(){
    let id=$(this).data('id');
    let sh=$(this).data('sh');
    $.post("api/save_sh.php",{id,sh},()=>{
        //location.reload()
        //console.log(sh,id)
        switch(sh){
            case 1:
                $(this).parent().prev().text('販售中')
            break;
            case 0:
                $(this).parent().prev().text('已下架')
            break;
        }

})
})
</script>
