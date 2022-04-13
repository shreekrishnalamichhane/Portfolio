var mode = 'light';
mode = document.documentElement.getAttribute("data-theme") ? document.documentElement.getAttribute("data-theme") : mode;
mode = window.matchMedia ? (window.matchMedia("(prefers-color-scheme: light)").matches ? 'light' : 'dark') : mode;
mode = localStorage.getItem('data-theme') ? localStorage.getItem('data-theme') : mode;

let svgIcon = {
    light: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="cus_theme_btn_stroke" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>',
    dark: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="cus_theme_btn_stroke" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>'
}
let themeBtn = document.querySelector('#color-mode-switcher');
document.documentElement.setAttribute("data-theme", mode);
localStorage.setItem('data-theme', mode);
themeBtn.innerHTML = svgIcon[mode];
try {
    renderFooter(mode);
} catch (error) {
    console.log("Something is not right.");
}

document.querySelector('#color-mode-switcher').addEventListener('click', () => {
    mode = document.documentElement.getAttribute("data-theme");
    mode = mode == 'light' ? 'dark' : 'light';
    document.documentElement.setAttribute("data-theme", mode);
    localStorage.setItem('data-theme', mode);
    themeBtn.innerHTML = svgIcon[mode];
    try {
        playSound(mode);
        renderFooter(mode);
    } catch (error) {
        console.log("Something is not right.");
    }
});

let playSound = (mode) => {
    let audio = document.querySelector('.theme-audio-' + mode);
    audio.currentTime = 0;
    audio.play();
}


