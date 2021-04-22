function singleQuantity() {
	document.getElementById("starter").innerText = "1";
	document.getElementById("water").innerHTML = "&frac34;";
	document.getElementById("yeast").innerHTML = "&half;";
	document.getElementById("flour").innerHTML = "2&half;";
	document.getElementById("salt").innerText = "1";
}

function doubleQuantity() {
	document.getElementById("starter").innerText = "2";
	document.getElementById("water").innerHTML = "1&half;";
	document.getElementById("yeast").innerText = "1";
	document.getElementById("flour").innerText = "5";
	document.getElementById("salt").innerText = "2";
}

function trippleQuantity() {
	document.getElementById("starter").innerText = "3";
	document.getElementById("water").innerHTML = "2&frac14;";
	document.getElementById("yeast").innerHTML = "1&half;";
	document.getElementById("flour").innerHTML = "7&half;";
	document.getElementById("salt").innerText = "3";
}

function attachHandlers() {
	let singleButtonElement = document.querySelector("button[value='1']");
	let doubleButtonElement = document.querySelector("button[value='2']");
	let trippleButtonElement = document.querySelector("button[value='3']");
	if (singleButtonElement) {
		singleButtonElement.addEventListener("click", singleQuantity);
	}
	if (doubleButtonElement) {
		doubleButtonElement.addEventListener("click", doubleQuantity);
	}
	if (trippleButtonElement) {
		trippleButtonElement.addEventListener("click", trippleQuantity)
	}
}

window.addEventListener("load", attachHandlers);