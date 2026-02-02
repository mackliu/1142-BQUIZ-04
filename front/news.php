<!-- 最新消息1
標題
年終特賣會開跑了

內容
即日期至年底，凡會員購物滿仟送佰，買越多送越多~




最新消息2
標題
情人節特惠活動


內容
為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~ -->


<h2 class="ct">最新消息</h2>
<div id="newsTitle">
    <div style='color:red' class='ct'>*點擊標題觀看詳細資訊</div>
    <table class="all">
        <tr class="tt ct">
            <td>標題</td>
        </tr>
        <tr class="pp">
            <td style='cursor:pointer' onclick="$('#newsTitle').hide();$('#news1').show();$('#news2').hide()">情人節特惠活動</td>
        </tr>
        <tr class="pp">
            <td style='cursor:pointer' onclick="$('#newsTitle').hide();$('#news1').hide();$('#news2').show()">年終特賣會開跑了</td>
        </tr>
    </table>
</div>

<div id="news1" style='display:none'>
<table class='all'>
    <tr>
        <td class="tt ct">標題</td>
        <td class="pp">情人節特惠活動</td>
    </tr>
    <tr>
        <td class="tt ct">內容</td>
        <td class="pp">為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</td>
    </tr>
</table>  
<div class="ct"><button onclick="$('#newsTitle').show();$('#news1').hide();$('#news2').hide()">返回</button></div>  
</div>
<div id="news2" style='display:none'>
<table class='all'>
    <tr>
        <td class="tt ct">標題</td>
        <td class="pp">年終特賣會開跑了</td>
    </tr>
    <tr>
        <td class="tt ct">內容</td>
        <td class="pp">即日期至年底，凡會員購物滿仟送佰，買越多送越多~</td>
    </tr>
</table> 
<div class="ct"><button  onclick="$('#newsTitle').show();$('#news1').hide();$('#news2').hide()">返回</button></div>  
</div>
