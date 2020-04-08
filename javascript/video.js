    let video = document.querySelector('#video');
    let cover = document.querySelector('#cover');
    let canvas = document.querySelector('#canvas');
    let photo = document.querySelector('#photo');
    let options = { audio: false, video: {width : 1076, height : 720} };
    let width = 320;
    let height = 0;
    let streaming = false;
    let inputElt = document.getElementById('filtre_in');
    let btn = document.getElementById('startbutton');
    btn.disabled = true;

    try {
        if (navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia(options)
                .then(function(stream) {
                    console.log("Ok")
                    video.srcObject = stream;
                })
                .catch(function(err) {
                    console.log("Impossibru: ", err)
                });
        }
    } catch (e) {
        console.log("error : ", e)
    }

    video.addEventListener('canplay', function(ev) {
        if (!streaming) {
            width = video.videoWidth
            height = video.videoHeight
            streaming = true;
        }
    }, false);

    function takepicture() {
        canvas.width = width;
        canvas.height = height;
        canvas.getContext('2d').drawImage(video, 0, 0, width, height);
        var data = canvas.toDataURL('image/png');
        // récupération du contenue du canvas sous la forme d'une string
        data = data.replace("data:image/png base64;", "");
        var formul = document.getElementById('form_push');
        var champCache = document.createElement('input');
        champCache.setAttribute('type', 'hidden');
        champCache.setAttribute('name', 'image');
        champCache.setAttribute('value', data);
        formul.appendChild(champCache);
        formul.submit();

        //photo.setAttribute('src', data);
        //document.getElementById("webcam-img").value = photo.value;
    }

    startbutton.addEventListener('click', function(ev) {
        takepicture();
        ev.preventDefault();
    }, false);


    function stopStreamedVideo(videoElem) {
        const stream = videoElem.srcObject;
        const tracks = stream.getTracks();
      
        tracks.forEach(function(track) {
          track.stop();
        });
      
        videoElem.srcObject = null;
      }

    
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var dataURL = reader.result;
            var output = document.getElementById('blah');
          //  output.src = dataURL;
            output.style.backgroundImage = "url('"+dataURL+"')";
            output.style.backgroundSize = "cover";
            output.style.backgroundPosition = "center";
            console.log(output);
            video.style.display = "none";
            output.style.display = "block";
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function viewImage(id, src_id) {
    var filtr = document.getElementById(id);
    var src = document.getElementById(src_id).src;
    if (src_id === 'none') {
        filtr.setAttribute("src", false);
        filtr.style.display = "none";
        document.getElementById('filtre_in').value = src_id;
    } else {
        filtr.style.display = "block";
        document.getElementById('filtre_in').value = src_id;
        filtr.setAttribute("src", src);
    }
}

function zoomImage(id) {
    var percent = document.getElementById(id);
    var filter = document.getElementById("filtre");
    filter.style.width = percent.value * 3+'px';
    filter.style.height = 'auto';
}


// ajout d'une fonction appelee des qu'une touche est enfoncee
function isCharSet() {
  // on verifie si le champ n'est pas vide alors on desactive le bouton sinon on l'active
    if (inputElt.value != "") {
      btn.disabled = false;
    } else {
      btn.disabled = true;
    }  
}


// value / 100 * %  == 