<div class="ct">
    <button onclick="location.href='?do=add_admin'">新增管理員</button>  
</div>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="tt ct">密碼</td>
        <td class="tt ct">管理</td>
    </tr>
    <?php
    $rows=$Admin->all();
    foreach($rows as $row):
    ?>
    <tr>
        <td class="pp ct">
            <?=$row['acc'];?>
        </td>
        <td class="pp ct">
          <?=str_repeat("*",mb_strlen($row['pw']));?>
        </td>
        <td class="pp ct">
            <?php 
                if($row['acc']=='admin'){
                    echo "此帳號為最高權限";
                }else{
                    echo "<button class='edit-btn' data-id='{$row['id']}'>修改</button>";
                    echo "<button class='del-btn' data-id='{$row['id']}'>刪除</button>";
                }

            ?>

        </td>
    </tr>
    <?php
    endforeach;
    ?>
</table>
<script>
$(".del-btn").on("click",function(){
    let id=$(this).data('id');
    $.post('api/del.php',{id,table:'Admin'},()=>{
        location.reload()
    })
})
$(".edit-btn").on("click",function(){
    let id=$(this).data('id');
    location.href=`?do=edit_admin&id=${id}`;
})
</script>