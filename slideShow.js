var Home = ["01.jpg","02.jpg","03.jpg"];
var Robots = ["03.jpg","12.jpg"];
var Pics = [];
var place = 0;
function changeShow(array){
	Pics = [];
	for(i = 0; array.length > i; i++){
		Pics[i] = new Image();
		Pics[i].src = "images/" + array[i];
	}
}

function Change(){
	place = (Pics.length > place ? place:0);
	document.images.slide.src=eval("Pics[" + place + "].src");
	place++;
	setTimeout("Change()",5000);
}

changeShow(Home);