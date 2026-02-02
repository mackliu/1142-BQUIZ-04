<h2 class="ct">會員註冊</h2>
<!-- table.all>tr*6>td.tt.ct+td.pp>input:text -->
 <table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp">
            <input type="text" name="name" id="name">
        </td>
    </tr>
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
            <input type="button" value="檢測帳號" onclick="chkAcc()">
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp">
            <input type="password" name="pw" id="pw">
        </td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp">
            <input type="text" name="tel" id="tel">
        </td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp">
            <input type="text" name="address" id="address">
        </td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp">
            <input type="text" name="email" id="email">
        </td>
    </tr>
 </table>
 <div class="ct">
    <input type="button" value="註冊" onclick="regs()">
    <input type="reset" value="重置">
</div>

<script>
function chkAcc(){
    let acc=$("#acc").val()
    $.get("api/chk_acc.php",{acc},(res)=>{
      if(parseInt(res) || acc=='admin'){
        alert("此帳號已存在,請重設其他帳號")
      }else{
        alert("此帳號可使用")
      }
    })
}

function regs(){
    let data={acc:$("#acc").val(),
              pw:$("#pw").val(),
              name:$("#name").val(),
              tel:$("#tel").val(),
              address:$("#address").val(),
              email:$("#email").val()
    }

    $.get("api/chk_acc.php",{acc:data.acc},(res)=>{
      if(parseInt(res) || data.acc=='admin'){
        alert("此帳號已存在,請重設其他帳號")
        $("#acc").val("");
      }else{
        $.post("api/regs.php",data,()=>{
            location.href='index.php?do=login';

        })
      }
    })
}
</script>