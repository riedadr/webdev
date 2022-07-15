document.write("<div class='block'>");

console.log("=== Objekte ===");





var obj = {a: 10, b: "Hallo Welt!" , f: function () {
    console.log("you called me!");
}};

console.log(obj.b); //Hallo Welt!

delete obj.b;
console.log(obj);

obj.f()


function area(param) {
    if (param == undefined) {
        throw Error("Param undefined!")
    }
    return param.width * param.height;
}
let a = area({width: 100, height: 13})
document.write("100 * 13 = " + a);
try {
    document.write("100 * 13 = " + area());
} catch (error) {
    console.log(error.message);
}


let person = {name: "Peter", age: 69}

let person2 = Object.create(person);
console.log(person.name, person2.name); //Peter Peter

person2["name"] = "Dave";
person2["neu"] = "Ich bin neu!";

console.log(person2);

Object.freeze(person2);
person2.age = 22; //wird nicht mehr geändert

console.log(person2);


document.write("</div>");