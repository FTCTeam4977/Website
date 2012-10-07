function Browser(){
	
}

function GetDirContent(dir){
	$.ajax({
		url"../php/getDir.php",
		type:"post",
		data:"dir="+dir,
		success:return result;
	});
}