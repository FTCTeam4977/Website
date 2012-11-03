var CurrentDir = "./";
var DisplayPath = "";
var DisplayFile = "";
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

function UpdatePic(pic){
	var Src = "media" + DisplayDir[1] + "/" + pic;
	$("#photoArea").html("<img id=\"Image\" alt=\"An ERROR has occurred.\" src=\"" + Src + "\" >");
	document.getElementById("Image").style.marginLeft = ((600-document.getElementById("Image").width)/2)+"px";
	document.getElementById("Image").style.marginRight = ((600-document.getElementById("Image").width)/2)+"px";
}

function Browser(content){
	var data = content.split(String.fromCharCode(29));
	var Path = ".";
	DisplayPath = "";
	DisplayFile = "";
	CurrentDir = data[0];
	DisplayDir = CurrentDir.split("/media");
	var Folders = DisplayDir[1].split("/");
	for(i=0; i<Folders.length;i++){
		Path = Path + Folders[i] + "/";
		DisplayPath = DisplayPath + ClickLink("LinkContent('" + Path + "')", "<p class=\"Path\">"  + Folders[i] + " </p>");
	}
	Files = data[1].split(String.fromCharCode(28));
	for(i=1; i<Files.length;i++){
		FileName = Files[i].split(".");
		if(FileName[1] == null || FileName[1] == "png" || FileName[1] == "jpg" || FileName[1] == "gif")
			DisplayFile = DisplayFile + "<a onclick=\""+ (FileName[1] == null? "GetDirContent":"UpdatePic") + "('" + Files[i] + "')\"><img height=\"120\" src=\"" + (FileName[1] == null ? "images/Folder.png":"media" + DisplayDir[1] + "/" + Files[i]) + "\" alt=\"" + Files[i] + "\"><p>"+ FileName[0] +"</p></a>";
	}
	$("#Path").html(( DisplayDir[1] != "" ? ClickLink("GetDirContent('..')", "<img alt=\"back\" src=\"images/Back.png\">"):"<a><img alt=\"back\" src=\"images/HiddenBack.png\"></a>") + ClickLink("LinkContent('.')","<p class=\"Path\"> media//:<p>") + DisplayPath);
	$("#Browser").html(DisplayFile);
	
}
