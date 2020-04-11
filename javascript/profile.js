// Get the modal
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.classList.add("is-active");
}

span.onclick = function() {
  console.log('test aaaaaah');
  modal.classList.remove("is-active");
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.classList.remove("is-active");
  }
} 

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var dataURL = reader.result;
            var output = document.getElementById('c-img');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    }
}