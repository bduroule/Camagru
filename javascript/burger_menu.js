let btn_bu = document.getElementById('button');
let menu = document.getElementById('menu');

function clickButton() {
    if (btn_bu.value == 0) {
        btn_bu.classList.add("is-active");
        btn_bu.value = 1;
        menu.style.display = 'block';
    } else {
        btn_bu.classList.remove("is-active");
        btn_bu.value = 0;
        menu.style.display = 'none';
    }

}