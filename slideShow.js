var Home = ["01.jpg","02.jpg","03.jpg","04.jpg","05.jpg"];
var Robots = ["03.jpg","12.jpg"];
var Pics = [];
var place = 0;
var showType = "change";	

var display;
var slide;
function changeShow(array){
	Pics = [];
	for(i = 0; array.length > i; i++){
		Pics[i] = new Image();
		Pics[i].src = "images/" + array[i];
	}
}

function ClearShow(){
	display = "";
	slide = "";
	document.getElementById("photoArea").innerHTML="";
	clearTimeout(NextChange);
}

function change(){
	if(!display){
		display = new Image();
		display.name = "slide";
		display.alt = "An error has occurred";
		display.class = "slide";
		document.getElementById("photoArea").appendChild(display);
	}
	place = (Pics.length > place ? place:0);
	document.images.slide.src=eval("Pics[" + place + "].src");
	place++;
	showType = "change";
	NextChange = setTimeout("change()",3000);
}

function fadeInAndOut(){
	if(!display){
		display = new Image();
		display.name = "slide";
		display.alt = "An error has occurred";
		display.id = "slide";
		document.getElementById("photoArea").appendChild(display);
		$("#slide").addClass("slide");
		$("#slide").hide();
	}
	$("#slide").fadeTo(1000,0,function(){
		place = (Pics.length > place ? place:0);
		document.images.slide.src=eval("Pics[" + place + "].src");
		place++;
		setTimeout('fadeIn()', 400);
	});
}

function fadeIn(){
	$("#slide").fadeTo(1000,1,function(){
		NextChange = setTimeout("fadeInAndOut();",3000);
	});
}


changeShow(Home);