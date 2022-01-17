if (document.getElementById('header-burger-container')) {
    document.getElementById('header-burger-container').addEventListener('click', () => {
        document.getElementById('header-buttons-screen').style.display = "flex";
    })
    document.getElementById('header-burger-container-close').addEventListener('click', () => {
        document.getElementById('header-buttons-screen').style.display = "none";
    })
}