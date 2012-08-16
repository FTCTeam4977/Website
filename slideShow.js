var Home = ["01.jpg","02.jpg","03.jpg"];
var Robots = ["11.jpg","12.jpg","13.jpg"];
var Pics = [];
function changeShow(array){
	for(i = 0; array.length > i; i++){
		Pics[i] = new Image();
		Pics[i].src = "images/" + array[i];
	}
}

changeShow(Home);

function onload(){
document.images.slide.src=eval("Pics[" + 2 + "].src");
}