//window.alert("hello world");

function switchOne(showE,hiddenE){
	document.querySelector(showE).style.display = "";
	document.querySelector(hiddenE).style.display = "none";
}

function plsInputCode(urlPath) {
	var code = prompt("请输入下载码！");
	$.post("/ticket/verify",{'number':code,'urlPath':urlPath},function(data){
		window.alert(data);
	});
}
