let figures = document.querySelectorAll("figure");

figures.forEach((item) => {
    item.draggable = true;
    item.ondragstart = (e) => {
        e.dataTransfer.setData('application/my-app', item.id);
        e.dataTransfer.effectAllowed = "move";
        console.log(
            "moin", e);
    };

    item.ondragend = (e) => {
        console.log(e);
    };

    let fieldsets = document.querySelectorAll("fieldset");
    fieldsets.forEach((fieldset , index) => {
        console.log("fieldset", index);
        fieldset.ondrop = (e) => {
            e.preventDefault();
            let id = e.dataTransfer.getData('application/my-app');
            let figure = document.getElementById(id);
            if (figure !== null) {
                fieldset.appendChild(figure);
            }
            console.log(e.dataTransfer.getData('application/my-app'));
        } 
        fieldset.ondragover = (e) => {
            e.preventDefault();

        }
        fieldset.ondragenter = (e) => {
            console.log(e);
            item.style.borderWidth = 4;
        }
        fieldset.ondragleave = (e) => {
            console.log(e);
            item.style.borderWidth = 2;
        }
    })
});
