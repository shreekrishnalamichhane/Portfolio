let footerDiv = document.querySelector(".footer-div");

if (
  window.matchMedia &&
  window.matchMedia("(prefers-color-scheme: light)").matches
) {
  fetch("../../social_links.json")
    .then((response) => response.json())
    .then((data) => {
      data.forEach((d) => {
        footerDiv.innerHTML += `<a href="${d.link}" class="footer-link" target="_blank">
        <img src="${d.icon_light}" class="footer-img" alt="${d.name}"></img>
      </a>`;
      });
    });
}
if (
  window.matchMedia &&
  window.matchMedia("(prefers-color-scheme: dark)").matches
) {
  fetch("../../social_links.json")
    .then((response) => response.json())
    .then((data) => {
      data.forEach((d) => {
        footerDiv.innerHTML += `<a href="${d.link}" class="footer-link" target="_blank">
        <img src="${d.icon_dark}" class="footer-img" alt="${d.name}"></img>
      </a>`;
      });
    });
}
