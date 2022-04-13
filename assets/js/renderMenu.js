
let menu = document.querySelector(".cus-menu");

if (menu) {
    fetch("../../data/menu.json")
        .then((response) => response.json())
        .then((data) => {
            data.forEach((d) => {
                if (d.disabled == false) {
                    menu.innerHTML += `
                        <li>
                        <a href="${d.link}" target="${d.target}">${d.text}</a>
                        </li>`;
                }
            });
        });
}