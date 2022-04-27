const svg = document.querySelector("svg");
let target = undefined;

//andere Möglichkeit um Kontextmenü zu unterdrücken
svg.oncontextmenu = () => false;

svg.addEventListener("click", (event) => {
    console.log(event);

    const circle = document.createElementNS(
        "http://www.w3.org/2000/svg",
        "circle"
    );

    circle.setAttribute("cx", event.offsetX);
    circle.setAttribute("cy", event.offsetY);
    circle.setAttribute("r", 10);
    circle.setAttribute("fill", "white");

    circle.addEventListener("contextmenu", (e) => {
        e.preventDefault();
        svg.removeChild(circle);
        return true;
    });

    circle.addEventListener("mousedown", () => {
        target = circle;
    });

    circle.addEventListener("mouseup", () => {
        target = undefined;
    });

    circle.addEventListener("click", (e) => {
        e.stopPropagation();
    });

    svg.appendChild(circle);
});

svg.addEventListener("mousemove", (e) => {
    if (target !== undefined) {
        target.setAttribute("cx", e.offsetX);
        target.setAttribute("cy", e.offsetY);
    }
});
