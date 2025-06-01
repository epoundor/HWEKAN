document.addEventListener("DOMContentLoaded", function () {
    const lis = document.querySelectorAll(".menu-item.menu-item-has-children");
    const img = document.createElement("img");
    img.classList.add("arrow");
    img.setAttribute("alt", "arrow");
    img.src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAICAYAAADJEc7MAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAABzSURBVHgBhZGxDoAgDESvGBMWDSMjv8KX8yky+gkkBlBIHFRaO7b3LpcrrYvdagGODJ/SHiGMMdaVjND0qm8Ibp4QtLbuF6roGqUmeCJECX5AFbGlI+5wx+ZuJLlqDXCGJEWiq4ER9AFHJYygIfiunXvTCR1NeRp6SAFkAAAAAElFTkSuQmCC";
    lis.forEach((li) => {
        li.querySelector("a").appendChild(img.cloneNode());
        li.addEventListener("click", function () {
            li.querySelector(".sub-menu").classList.toggle("show");
        });

    })

})