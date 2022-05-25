//! OBACHT: Code entspricht nicht zu 100% dem aus der Übung

const okBtn = document.getElementById("ok");
const noBtn = document.getElementById("no");
const output = document.getElementById("output-container");
let labels = document.querySelectorAll("label");
let inputs = document.querySelectorAll("input");

noBtn.addEventListener("click", (e) => {
	e.preventDefault();
	let wantToReset = confirm("Sollen alle Daten gelöscht werden?");
	if (wantToReset) {
		form.reset();
	}
});

function submit() {
	const formular = new FormData(form);
	const formData = Object.fromEntries(formular.entries());
	console.log(formData);
}


