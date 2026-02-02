<h2 class="ct">會員管理</h2>
<table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="tt ct">會員帳號</td>
        <td class="tt ct">註冊日期</td>
        <td class="tt ct">操作</td>
    </tr>
    <?php
    $rows=$Mem->all();
    foreach($rows as $row):
    ?>
    <tr>
        <td class="pp ct">
            <?=$row['name'];?>
        </td>
        <td class="pp ct">
          <?=$row['acc'];?>
        </td>
        <td class="pp ct">
            <?=str_replace("-","/",$row['reg_date']);?>
        </td>
        <td class="pp ct">
            <button class='edit-btn' data-id='<?=$row['id'];?>'>修改</button>
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
    $.post('api/del.php',{id,table:'Mem'},()=>{
        location.reload()
    })
})
$(".edit-btn").on("click",function(){
    let id=$(this).data('id');
    location.href=`?do=edit_mem&id=${id}`;
})
</script>