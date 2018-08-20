<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>聊天室</title>

    <!-- Bootstrap core CSS -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="//v3.bootcss.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="//v3.bootcss.com/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="//v3.bootcss.com/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="row">
      	<div class="col-md-6">
      		
			<div class="page-header">
				<h1><small>Chat详情</small></h1>
			</div>
			<div id="chatC">
				<div class="panel ">您好我是小C^.^</div>
				<div class="panel text-right">...</div>
			</div>
			<textarea class="form-control" id="sendMsg" rows="3" placeholder="请输入聊天内容"></textarea>
			<!-- <div class="form-group"> -->
			<br/>
			<button type="button" id="send" class="btn btn-default form-control">发送</button>
			<br/>				
			<!-- </div> -->
      	</div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="//v3.bootcss.com/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="//v3.bootcss.com/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="//v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>
	<script>
	var ws = new WebSocket("ws://127.0.0.1:9501");

	ws.onopen = function(evt) { 
	  console.log("Connection open ..."); 
	};
	
	ws.onclose = function(evt) {
	  console.log("Connection closed.");
	};

	ws.onerror = function(event) {
	  console.log('error:'+ event)
	};

	ws.onmessage = function(evt) {
	  var msg =	'<div class="panel">'+evt.data+'</div>';
	  $("#chatC").append(msg);
	};

	$("#send").click(function(){
		var send = $("#sendMsg");
		ws.send(send.val());
		var msg =	'<div class="panel text-right">'+send.val()+'</div>';
		$("#chatC").append(msg);
		send.val('');
	})

	// ws.close();	
	// ws.send('your message');
	</script>	

  </body>
</html>