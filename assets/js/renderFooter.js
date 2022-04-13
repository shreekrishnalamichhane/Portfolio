var footer = document.querySelector('.cus-footer');

let renderFooter = (mode) => {
    if (footer) {
        fetch("../../data/social_links.json")
            .then((response) => response.json())
            .then((data) => {
                var ret = "";
                data.forEach((d) => {
                    ret += `<a href="${d.link}" class="footer-link" target="_blank">
                        <img src="/assets/icons/${mode}/${d.icon}" class="footer-img" alt="${d.name}"></img>
                    </a>`;
                });
                footer.innerHTML = ret;
            });
    }
}