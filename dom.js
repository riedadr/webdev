const headline = document.createElement("Hi");
/*
const greeting = document.setTextNode("Hello JS DOM")
console.log(greeting);
headline.appendChild(greeting);
document.body.apendChild(greeting);
*/

let list = document.getElementsByTagName("h1");
console.log(list);
console.log(Array.from(list));

for (const item of list) {
	console.log(item);
}

const btn = document.createElement("button");
btn.innerText = "Moin";
function btnClick() {
	alert("Servus!");
}
btn.setAttribute("onclick", "btnClick()");
document.body.appendChild(btn);

headline.setAttribute("id", "headline");

const comment = document.createComment("Das lesen nur die Profis");
document.body.appendChild(comment);

console.log(document.getElementById("headline"));
//liefert erstes Element mit dieser ID [element]

console.log(document.getElementsByTagName("div"));
//liefert alle divs [HTMLCollection]

console.log(document.querySelector("section"));
//liefert erstes Element, mit dieser Eigenschaft [element]

console.log(document.querySelectorAll("*"));
//liefert alle Elemente, mit dieser Eigenschaft [NodeList]
//css-selektierbar: tag, .class, #id, ::after, ::before, ...

const html = document.querySelector("html").innerHTML;
const eineH1 = html.match(/h1/);
const alleH1 = html.matchAll(/h1/g);

for (const item of document.querySelectorAll("section", "h1")) {
	console.log(item);
}
