    let video = document.querySelector('#video');
    let cover = document.querySelector('#cover');
    let canvas = document.querySelector('#canvas');
    let photo = document.querySelector('#photo');
    let options = { audio: false, video: {width : 1280, height : 720} };
    let width = 320;
    let height = 0;
    let streaming = false;

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
        photo.setAttribute('src', data);
    }

    startbutton.addEventListener('click', function(ev) {
        takepicture();
        ev.preventDefault();
    }, false);


    
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var dataURL = reader.result;
            var output = document.getElementById('blah');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    }
}


    /*
    (function() {

        var streaming = false,
            video = document.querySelector('#video'),
            cover = document.querySelector('#cover'),
            canvas = document.querySelector('#canvas'),
            photo = document.querySelector('#photo'),
            startbutton = document.querySelector('#startbutton'),
            width = 320,
            height = 0;

        navigator.getMedia = (navigator.getUserMedia ||
            navigator.webkitGetUserMedia ||
            navigator.mozGetUserMedia ||
            navigator.msGetUserMedia ||
            navigator.oGetUserMedia);

        navigator.getMedia({
                video: true,
                audio: false
            },
            function(stream) {
                if (navigator.mozGetUserMedia) {
                    video.mozSrcObject = stream;
                } else {
                    var vendorURL = window.URL || window.webkitURL;
                    video.src = vendorURL.createObjectURL(stream);
                }
                video.play();
            },
            function(err) {
                console.log("An error occured! " + err);
            }
        );

        video.addEventListener('canplay', function(ev) {
            if (!streaming) {
                height = video.videoHeight / (video.videoWidth / width);
                video.setAttribute('width', width);
                video.setAttribute('height', height);
                canvas.setAttribute('width', width);
                canvas.setAttribute('height', height);
                streaming = true;
            } else
                console.log("kesta");
        }, false);

        function takepicture() {
            canvas.width = width;
            canvas.height = height;
            canvas.getContext('2d').drawImage(video, 0, 0, width, height);
            var data = canvas.toDataURL('image/png');
            photo.setAttribute('src', data);
        }

        startbutton.addEventListener('click', function(ev) {
            takepicture();
            ev.preventDefault();
        }, false);

    })();
    */