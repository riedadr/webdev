let scrollArea = document.getElementById("main");

scrollArea.onscroll = () => {
    var winScroll = scrollArea.scrollTop;
    var height = scrollArea.scrollHeight - scrollArea.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("scoll-progress").value = scrolled;
    if (scrolled === 0) {
        document.getElementById("scrollUp").style.display = "none";
    } else {
        document.getElementById("scrollUp").style.display = "flex";
    }
};

function scrollToSection(area) {
    let element = document.getElementById(area);
    element.scrollIntoView({ behavior: "smooth" });
}