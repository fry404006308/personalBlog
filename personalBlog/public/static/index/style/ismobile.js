var userAgentInfo = navigator.userAgent;  
var Agents = new Array("Android", "iPhone", "Nokia", "SymbianOS", "Windows Phone", "iPod");  
var thisURL = document.URL;
if (thisURL.indexOf("zhuanti")<0){
   for (var v = 0; v < Agents.length; v++) {
	   if (userAgentInfo.indexOf(Agents[v]) > 0 && userAgentInfo.indexOf("iPad") < 0) { location.href= thisURL.replace("www.wed114.cn/jiehun","m.zx.wed114.cn"); break; }
   }
}