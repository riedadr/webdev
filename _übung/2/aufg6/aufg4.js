//! OBACHT: Code entspricht nicht zu 100% dem aus der Übung

const okBtn = document.getElementById("ok");
const noBtn = document.getElementById("no");
const output = document.getElementById("output-container");
const form = document.querySelector("form");
let labels = document.querySelectorAll("label");
let inputs = document.querySelectorAll("input");

okBtn.addEventListener("click", () => submit());
noBtn.addEventListener("click", (e) => {
    e.preventDefault();
    resetForm();
});

function resetForm() {
	let wantToReset = confirm("Sollen alle Daten gelöscht werden?");
	if (wantToReset) {
		form.reset();
		closeOutput();
	}
}

function submit() {
	const formular = new FormData(form);
	const formData = Object.fromEntries(formular.entries());
	console.log(formData);
	showResults();
}

function showResults() {
	output.style.display = "flex";

	const dl = document.querySelector("dl");
	dl.innerHTML = "";

	labels.forEach((label, index) => {
		dl.innerHTML += `<dt>${label.innerText}</dt><dd>${inputs[index].value}</dd>`;
	});
}

function writeToForm(json) {
	form.vorname.value = json.vorname;
	form.nachname.value = json.nachname;
	form.alter.value = json.alter;
	form.geschlecht.value = json.geschlecht;
	form.straße.value = json.straße;
	form.ort.value = json.ort;
	form.plz.value = json.plz;
}

function closeOutput() {
	output.style.display = "none";
}

function exportFile() {
	let data = getJSON();

	showSaveFilePicker()
		.then((result) => result.createWritable())
		.then((result) => {
			result.write(data);
			result.close();
		});
}

function getJSON() {
	let obj = {};
	labels.forEach((label, index) => {
		obj[label.innerText.toLowerCase()] = inputs[index].value;
	});

	return JSON.stringify(obj);
}

function openFile() {
	if (window.showOpenFilePicker) {
		showOpenFilePicker({ multiple: false })
			.then((result) => result[0].getFile())
			.then((file) => file.text())
			.then((text) => {
				let json = JSON.parse(text);

				writeToForm(json);
				showResults();
			});
	} else {
		window.alert(
			"FilePicker wird nicht unterstützt. \nhttps://developer.mozilla.org/en-US/docs/Web/API/File_System_Access_API#browser_compatibility"
		);
	}
}

/* Code aus Übung, wird aber nicht verwendet
function writePerson(text) {
    let str = text.split("\n");
    str.forEach((item, index) => {
        let value = item.split(":");
        if (value[1] !== undefined) {
            console.log(`${index}. ${value[0]}: ${value[1]}`);
        }
    });
}
*/
