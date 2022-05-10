document.write("<div class='block'>");

var count = 0;
document.write(`<p>Zähler is ${++count}<p>`);
document.write(`<p>Zähler is ${++count}<p>`);
document.write(`<p>Zähler is ${++count}<p>`);

var feld = [0, 1, 2, "3", 4, 5, [6, 7], {}];
console.log(feld);

//? überprüft, ob alle Elemente des Array vom Typ "number" sind
console.log(feld.every((item) => typeof item == "number"));
//? filtert alle Elemente heraus, die keine "number" sind
console.log(feld.filter((item) => typeof item == "number"));

document.write("<h3>for-each-Schleife</h3>");
document.write("<ol start='10'>");
feld.forEach((item, index) => {
	document.write(`<li key=${index}>Wert: ${item}</li>`);
});
document.write("</ol>");

document.write("<h3>for-in-Schleife</h3>");
document.write("<ul type='disc'>");
for (const index in feld) {
	document.write(`<li>${feld[index]}</li>`);
}
document.write("</ul>");

document.write("<h3>for-of-Schleife</h3>");
document.write("<ul type='square'>");
for (const item of feld) {
	if (typeof item == "number") {
		document.write(`<li>${item}</li>`);
	} else if (item instanceof Array) {
		document.write(`<li>${item} (vom Typ Array)</li>`);
	} else {
		document.write(`<li>${item} (${typeof item})</li>`);
	}
}
document.write("</ul>");

//Object
let x = { name: "Jürgen", alter: 404 };
console.log(Object.values(x)); //gibt die Werte (ohne Key) in einem Array zurück

//String
let s = "abcdefg";
let i = 0;

do {
	console.log(s[i++]);
} while (i < s.length);

var feld2 = new Array("A", "B", "C", "D");
document.write(feld2.join("-"));

var feld3 = Array();

feld3[5] = "x";
console.log(feld3.map((item) => typeof item));

feld3.push("A");
console.table(feld3);

console.log(feld3.pop() + " entfernt", feld3);

function f1(a, b, c) {
	console.table(arguments);
	console.log("Funktion aufgerufen");
}

const F1 = f1;

F1("heyo");
f1("moin", "allo");
f1(undefined, 8, "c", null)

f1(feld)

document.write("</div>");