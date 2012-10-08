CurrentDir = "./";
function GetDirContent(dir){
	$.ajax({
			url:"media/getDir.php",
				type:"post",
				data:"dir="+CurrentDir+"/"+dir,
				success:function (result){
					Browser(result);
				}
			});
}

function Browser(content){
	var data = content.split(String.fromCharCode(29));
	CurrentDir = data[0];
	DisplayDir = CurrentDir.split("/media");
	$("#Browser").html("/media" + DisplayDir[1] +" " + ClickLink("GetDirContent('../')", "Go back") + "<br>" + data[1]);
}

function ClickLink(link, inner){
	return "<a onclick=\"" + link + "\">" + inner + "</a>";
}
