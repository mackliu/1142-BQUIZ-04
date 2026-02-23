<h2 class="ct">訂單管理</h2>
<table class="all">
    <tr>
        <td class="tt ct">訂單編號</td>
        <td class="tt ct">金額</td>
        <td class="tt ct">會員帳號</td>
        <td class="tt ct">姓名</td>
        <td class="tt ct">下單時間</td>
        <td class="tt ct">操作</td>
    </tr>
    <?php
    $rows=$Order->all();
    foreach($rows as $row):
    ?>
    <tr>
        <td class="pp ct">
            <span style='cursor:pointer' class='edit-btn' data-id='<?=$row['id'];?>'><?=$row['no'];?></span>
        </td>
        <td class="pp ct">
            <?=$row['sum'];?>
        </td>
        <td class="pp ct">
          <?=$row['acc'];?>
        </td>
        <td class="pp ct">
            <?=$row['name'];?>
        </td>
        <td class="pp ct">
            <?=$row['order_date'];?>
        </td>
        <td class="pp ct">
            <button class='del-btn' data-id='<?=$row['id'];?>'>刪除</button>
        </td>
    </tr>
    <?php
    endforeach;
    ?>
</table>
<script>
$(".del-btn").on("click",function(){
    let id=$(this).data('id');
    $.post('api/del.php',{id,table:'Order'},()=>{
        location.reload()
    })
})
$(".edit-btn").on("click",function(){
    let id=$(this).data('id');
    location.href=`?do=edit_order&id=${id}`;
})
</script>