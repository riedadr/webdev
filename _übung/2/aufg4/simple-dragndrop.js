const figures = document.querySelectorAll("figure");
const fieldsets = document.querySelectorAll("fieldset");

figures.forEach((figure) => {
    figure.draggable = true;
	figure.ondragstart = () => {
		figure.classList.add("dragged");
	};

	figure.ondragend = () => {
		figure.classList.remove("dragged");
	};
});

fieldsets.forEach(fieldset => {
    fieldset.ondragover = (e) => {
        e.preventDefault();
        let figure = document.querySelector(".dragged");
        fieldset.appendChild(figure);
    }
})