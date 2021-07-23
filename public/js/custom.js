var date = new Date();
var year = date.getFullYear();
var month = date.getMonth()+1;
var day = date.getDate();
var d = day.toString().concat("/",month.toString()).concat('/',year.toString());
document.getElementById("todaydate").value = d;
document.getElementById("session").value = year.toString().concat("-",year+4);

var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
