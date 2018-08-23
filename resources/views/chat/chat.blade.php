<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chat聊天室</title>

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
      	<div class="col-md-6 col-md-offset-6">
      		
			<div class="page-header">
				<h1>Chat<img style="width: 30px;" src="https://png.icons8.com/ios/50/000000/speech-bubble-with-dots.png"></h1>
				<p class="">当前聊天室人数  <span class="badge" id="chatCountPeople">...</span></p>
			</div>

			<div id="chatShow" style="overflow:auto;overflow-x:hidden;height:400px;">
				
			</div>

			<div style="padding-bottom: 15px;">
				<textarea class="form-control" id="chatMsg" rows="3" placeholder="请输入聊天内容"></textarea>
				<br/>
				<button type="button" id="chatSend" class="btn btn-default form-control">发送</button>
			</div>

      	</div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="//v3.bootcss.com/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="//v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>
	
	<script>
		var wsClice  = new WebSocket("{{$data->socketPath or 'ws://127.0.0.1:8000'}}");
		var chatShow = $("#chatShow");//消息框
		var chatMsg  = $("#chatMsg");//聊天输入框
		var chatSend = $("#chatSend");//发送按钮
		var chatCountPeople = $("#chatCountPeople");//当前会话人数

		// init javascript
		(function (env){
			chatSend.attr("disabled");
		}(this));

		// 
		function getSendMsgHtml(str=''){
			return '<div class="selfMsg text-right"><span class="bg-success">'+ str +'</span></div>';
		}

		function getServeMsgHtml(str=''){
			return '<div class="otherMsg"><span class="bg-info">'+ str +'</span></div>';
		}

		function sendServeMsg(){ 
			var msgText = chatMsg.val(); 
			var msg = getSendMsgHtml(msgText);
			wsClice.send(msgText);
			chatShow.append(msg); 
 			chatShow.scrollTop(chatShow[0].scrollHeight);
 			chatMsg.val('');
		}

		wsClice.onopen = function(evt) { 
		  chatSend.removeAttr("disabled");
		};

		wsClice.onclose = function(evt) {
		  chatSend.attr("disabled");
		};

		wsClice.onerror = function(event) {
		  	console.log('error:'+ event)
		  	//发送错误信息到http服务器
		};

		wsClice.onmessage = function(evt) {
			console.log(evt);
			var objRes = JSON.parse(evt.data);
			//如果有人数更新
			if (objRes.contPeople) {
				chatCountPeople.text(objRes.contPeople);
			}
			//如果有聊天消息
			if (objRes.message) {
				var msg = getServeMsgHtml(objRes.message);
				chatShow.append(msg);
	 			chatShow.scrollTop(chatShow[0].scrollHeight); 
			}
		};

		chatSend.click(function(){
			sendServeMsg();
		})
		// ws.close();
	</script>

	<style type="text/css">

		.selfMsg , .otherMsg{
			margin-top:15px;
			padding: 5px;
		}
		.selfMsg span{
			border:1px solid #909090;
			border-radius: 9px 9px 0px 9px;
			padding: 5px; 
			margin-top:15px;
		} 
		.otherMsg span{
			border:1px solid #909090;
			border-radius: 9px 9px 9px 0px;
			padding: 5px; 
			margin-top:15px;
		} 
	</style>
	
  </body>
</html>