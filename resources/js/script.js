'use strict';

let comments = document.getElementsByClassName("comments");
let content = document.getElementById("content");

var myFunction = function() {
    if (content.className === "hide") {
		 content.className = "";
	 }
	 else {
		 content.className = "hide";
	 }
};

for (var i = 0; i < comments.length; i++) {
    comments[i].addEventListener('click', myFunction, false);
}
