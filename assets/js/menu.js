let menu_wrapper = document.querySelector(".menu-wrapper");

fetch("../../menu.json")
  .then((response) => response.json())
  .then((data) => {
    data.forEach((d) => {
      if (d.disabled == false) {
        menu_wrapper.innerHTML += `
          <li>
            <a href="${d.link}" target="_blank">${d.text}</a>
          </li>`;
      }
    });
  });
