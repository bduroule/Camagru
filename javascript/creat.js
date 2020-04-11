let login = document.getElementById('login');
let email = document.getElementById('email');
let mdp = document.getElementById('passwd');
let verif_mdp = document.getElementById('verif_passwd');
let btn = document.getElementById('valid');
btn.disabled = true;


function passwdMetter() {
    var passwd = document.getElementById('passwd');
    var meter = document.getElementById('meter');
    isCharSet();

    if (passwd.value == "") {
        meter.style.display = "none";
    }
    else if (passwd.value != "") {
        meter.style.display = "block";
        meter.value = 0;
    }
    if (/((?=.*[a-z])(?=.*[A-Z])(?=.{3,}))/.test(passwd.value) || /(?=.{5,})/.test(passwd.value)){
            meter.classList.add('is-danger');
            meter.value = 25;
            mdp.classList.add('is-danger');
    }
    if (/((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{5,}))/.test(passwd.value) ||  /(?=.{11,})/.test(passwd.value)){
        meter.classList.add('is-warning');
        meter.classList.remove('is-danger');
        meter.value = 50;
        mdp.classList.add('is-danger');
    }
    if (/((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{7,}))/.test(passwd.value) ||  /(?=.{19,})(?=.*[a-z])(?=.*[A-Z])/.test(passwd.value)){
        meter.classList.add('is-info');
        meter.classList.remove('is-warning');
        meter.value = 75;
        mdp.classList.remove('is-danger');
    }
    if (/((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{12,})(?=.*[!@#$\-%^&*]))/.test(passwd.value) || /(?=.{27,})(?=.*[a-z])(?=.*[A-Z])/.test(passwd.value)){
        meter.classList.add('is-primary');
        meter.classList.remove('is-info');
        meter.value = 100;
        mdp.classList.remove('is-danger');
    }
}

function isCharSet() {
    var regex_o = new RegExp('(?=.{19,})(?=.*[a-z])(?=.*[A-Z])');
    var regex = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{7,}))');

    if (/(?=.{3,})/.test(login.value)) {
        login.classList.remove('is-danger');
    }
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)) {
        email.classList.remove('is-danger');
    }
    if (mdp.value == verif_mdp.value) {
        verif_mdp.classList.remove('is-danger');
    }
    if (login.value != "" && (regex.test(mdp.value) || regex_o.test(mdp.value)) && mdp.value == verif_mdp.value && /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value) && /(?=.{19,})/.test(login.value) == false) {
        btn.disabled = false;
    }
    else {
        if ((mdp.value != verif_mdp.value) && verif_mdp.value != "") {
            verif_mdp.classList.add('is-danger');
        }
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value) == false && email.value != "") {
            email.classList.add('is-danger');
        }
        if (/(?=.{3,})/.test(login.value) == false) {
            login.classList.add('is-danger');
        }
      btn.disabled = true;
    }  
}