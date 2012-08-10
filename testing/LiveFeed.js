/*------------------------------------------
LiveFeed 1.1
created by Benjamin Thomas on August 6, 2012
54% my code

updates in 1.1:
- created new id system for feed elemments
- added new "oldFeed" option, allowing you to have "past" feed elements
------------------------------------------*/
WebFontConfig = {
    google: { families: [ 'Source+Sans+Pro::latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();

function scroll(obj, distance, speed) {
	obj = document.getElementById(obj);
	if( !obj.style.top )
		obj.style.top = 0 + 'px';

	var timer = null,
		startTime = (new Date).getTime(),
		elapsed = null,
		d = null;
		obj.style.top = (obj.style.top.replace('px', '') - distance) + "px";
		current_distance = obj.style.top.replace('px', '');
	timer = setInterval(function() {
		elapsed = (new Date).getTime() - startTime;
		if(elapsed < speed){
			d = elapsed /speed * distance;
			d = (current_distance/1) + d;
			obj.style.top = d + "px";
		}
		else { // Stop the animation
			clearInterval(timer);
			obj.style.top = '0px';
		}
	}, 5);
}
/*My code starts here

customizable section.*/
var noFeed = "There is nothing in this feed.";
var textColor = "gray";
var backgroundColor = "#c3c3c3";
var borderColor = "gray";
// End of customizable section.

var feed = [];
var feedArea = "<div id=\"feedArea\" style=\"width:inherit;\"><div style=\"padding:10px 0 0 0;text-align:center;height:30px;color:" + textColor + ";background-color:" + backgroundColor + ";border:3px solid " + borderColor + ";border-radius:10px;font-family:Source Sans Pro;\">"+noFeed+"</div>" ;

function start(loc,ht,wid,fed,scr){
	var location = document.getElementById(loc);
	location.style.height = (ht > 30 ? ht+"px":"30px");
	location.style.width = ( wid > 400 ? wid+"px": "400px");
	location.style.overflow= (scr == "no" ? "hidden":"scroll");
	location.style.position = "relative";
	if(fed.length > 1){
		feedArea = "<div id=\"feedArea\" style=\"width:inherit;\">";
		feed = fed;
		for(f=0;feed.length > f; f++){
			a = feed[f].split("_-_");
			var height = (a[1] > 30 ? a[1]:30);
		 	var newFeed = "<div id='"+ a[0].slice(0,15) + "..._-_" + height + "_-_" + "feed" + "' style=\"overflow:scroll;padding:10px 0 0 0;margin:0 0 10px 0;text-align:center;color:" + textColor + ";background-color:" + backgroundColor + ";border:3px solid " + borderColor + "; border-radius:10px;font-family:Source Sans Pro;height:" + height + "px;'\">" + a[0] +"</div>";
			feedArea = newFeed + feedArea;
		}
	}
	location.innerHTML = feedArea + "</div>"; 
}

function update(loc,ht,con){
	var location = document.getElementById(loc);
	var height = (ht > 30 ? ht+"px":"30px");
	var content = (con == "" || con == null ? "No content was submitted":con);
	if(feed.length == 0)
		feedArea = "";
	var newFeed = "<div id='"+ content.slice(0,15) + "..._-_" + height + "_-_" + "feed" + "' style=\"overflow:scroll;padding:10px 0 0 0;margin:0 0 10px 0;text-align:center;color:" + textColor + ";background-color:" + backgroundColor + ";border:3px solid " + borderColor + "; border-radius:10px;font-family:Source Sans Pro;height:"+height+";'\">" + content +"</div>";
	feedArea = newFeed + feedArea;
	feed.push(content + "_-_" + (height));
	location.innerHTML = "<div id=\"feedArea\" style=\"width:inherit;position:absolute;top:"+(-10*feed.length)+"\">" + feedArea + "</div>";
	scroll("feedArea",(ht+20),400);	
}