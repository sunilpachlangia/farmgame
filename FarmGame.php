<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
    <table border="1px">
    	<thead>
        	<tr>
        		<th>Round</th>
        		<th>Farmer</th>
        		<th>Cow 1</th>
        		<th>Cow 2</th>
        		<th>Bunny 1</th>
        		<th>Bunny 2</th>
        		<th>Bunny 3</th>
        		<th>Bunny 4</th>
        	</tr>
    	</thead>
    	<tbody>
    	<?php for($i=1;$i<=50;$i++){ ?>
        	<tr>
        		<td><?= $i;?></td>
        		<td id="f_<?= $i;?>"></td>
        		<td id="c1_<?= $i;?>"></td>
        		<td id="c2_<?= $i;?>"></td>
        		<td id="b1_<?= $i;?>"></td>
        		<td id="b2_<?= $i;?>"></td>
        		<td id="b3_<?= $i;?>"></td>
        		<td id="b4_<?= $i;?>"></td>
        	</tr>
    	<?php } ?>
    	</tbody>
	</table>
	<br><br>
	<input type="button" value="Start new game" id="newGame" onclick="javascript:location.reload();" />
	<input type="button" value="Feed" id="feed" onclick="feed();"/>
	<br><br>
</body>
</html>
<script type="text/javascript">
var count = 0;
var feedStr = [];
function feed(){
    count++;
	$.ajax({
        url: "decideToFeed.php?count="+count+"&feedStr="+feedStr.toString(),
        type: "GET",
        success: function (response) {
        	var res = $.trim(response.toLowerCase());
            if(res === 'gameover'){
                $("#feed").attr("disabled","disabled");
                alert("Game over. Please start a new game.");
            } else {
                $("#"+response).text("Feeded").css("background-color", "#7ce861");
                feedStr.push(response);
                if(count == 50){
                    $("#feed").attr("disabled","disabled");
                    alert("Congrats! You won.");
                }
            }
            //alert(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
    
}
</script>
