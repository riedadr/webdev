console.group(" +++ Eins +++ ");

class Eins {
	#name; //# -> private
	#age;

	constructor() {
		this.#name = "Otto";
	}

	get name() {
		return this.#name;
	}

	set name(data) {
		this.#name = data;
	}

	get age() {
		return this.#age;
	}

	set age(data) {
		this.#age = data;
	}

	#surname() {
		//private function
		return "Nachname";
	}
}

let m = new Eins();
m.pet = "Goldfisch";
console.log(m); //Eins {pet: "Goldfisch", #name: 'Otto',}
m.age = { alter: 33, gewicht: 80 };
console.log("age =", m.age); //age = { alter: 33, gewicht: 80}

class Under extends Eins {
	get name() {
		return "Karl";
	}

	toString() {
		return this.name + " von " + super.name;
	}
}

console.log(new Under("Walther").toString());
//Karl von Otto

console.groupEnd();

//2
console.group(" +++ Zwei +++ ");

class My2 {
	static a;
	a;

	get value() {
		return this.a * My2.a;
	}

	static addNumber(num) {
		My2.a += num;
	}

	static {
		console.log("Moin!");
	}
}
console.log(My2);

My2.a = 10;
let a = new My2();
a.a = 11;
console.log(My2.a);
console.log(a);
console.log(a.value);

console.groupEnd();

//3
console.group(" +++ Drei +++ ");

class Drei {}

Drei.a = "static prop";
Drei.prototype.a = "obj attr";

let k3 = new Drei();
console.log(k3.a);
console.log(Drei.a);

console.log(k3);

console.groupEnd();

//4
console.group(" +++ Vier +++ ");

function Vier() {
	this.name = "Mein Name";
	this.age = function () {
		return 42;
	};
}
console.log(Vier);

let k4 = new Vier();
console.log(k4);
console.log(k4.age());

console.groupEnd();

//5
console.group(" +++ Fünf +++ ");

class Fünf {
	name = "Fünf";
	value() {
		return 0;
	}
}

class KleinesFünf extends Fünf {}

let k51 = new Fünf();
let k52 = new KleinesFünf();

console.log(typeof k51);
console.log(k52 instanceof Fünf);

console.log("alle Attribute:");
for (let attr of Object.keys(k51)) {
	console.log(k51[attr]);
}

/* funktioniert ned, auch bei Schaller

Object.keys(k51)
	.filter((item) => {
		item == "name";
	})
	.forEach((item) => {
		console.log(item);
	});
*/

console.groupEnd();

//6
console.group(" +++ Sechs +++ ");

const text = "The quick brown fox jumps over the lazy dog.";
let regex = /quick/;
console.log(text, regex);

let result = regex.exec(text);

console.log("exec", result); //["quick"]
console.log("match", text.match(regex)); //["quick"]

console.log("search", text.search(regex)); //4

console.groupEnd();
