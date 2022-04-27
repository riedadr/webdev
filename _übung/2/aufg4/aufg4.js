const figures = document.querySelectorAll("figure");

figures.forEach((item) => {
    console.log(item);
    item.draggable = true;
    item.ondragstart = (e) => {
        console.log(e);
    };

    item.ondragend = (e) => {
        console.log(e);
    };

    const fieldsets = document.querySelectorAll("fieldset");
    fieldsets.forEach((fieldset) => {
        fieldset.ondrop = (e) => {
            console.log(e);
        } 
        fieldset.ondragover = (e) => {
            console.log(e);
        }
        fieldset.ondragenter = (e) => {
            console.log(e);
        }
        fieldset.ondragleave = (e) => {
            console.log(e);
        }
    })
});
