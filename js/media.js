var CurrentDir = "./";
var DisplayPath = "";
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

function LinkContent(dir){
	$.ajax({
			url:"media/getDir.php",
				type:"post",
				data:"dir="+dir,
				success:function (result){
					Browser(result);
				}
			});
}

function ClickLink(link, inner){
	return "<a onclick=\"" + link + "\">" + inner + "</a>";
}

function Browser(content){
	var data = content.split(String.fromCharCode(29));
	var Path = "";
	DisplayPath = "";
	CurrentDir = data[0];
	DisplayDir = CurrentDir.split("/media");
	var Folders = DisplayDir[1].split("/");
	for(i=1; i<Folders.length;i++){
		Path = Path + Folders[i] + "/";
		DisplayPath = DisplayPath + ClickLink("LinkContent('" + Path + "')", Folders[i] + "/");
	}
	$("#Browser").html( ClickLink("LinkContent('.')","media//:") + DisplayPath +" " + ClickLink("GetDirContent('..')", "Go back") + "<br>" + data[1]);
}
