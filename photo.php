<br /><br /><br />
<div class="container">
    <div class="tile is-ancestor">
      <div class="tile is-vertical is-9">
        <div class="tile is-parent is-vertical is-12">
        <!-- WEB-CAM -->

          <article class="tile is-child box">
            <canvas hidden id="canvas"></canvas>
            <button id="startbutton" class="button"></button>
            <video id="video" autoplay="true" style="border-radius: 3px;"></video>
          </article>

          <!-- END WEB-CAM -->
        </div>
        <div class="tile is-parent is-vertical is-12">
            <div class="tile is-child box">Montage part</div>
        </div>
      </div>
        <div class="tile is-parent is-3">
          <div class="tile is-child box">
             <img id="photo" alt="photo">
         </div>
        </div>
      </div>
    <div class="field">
      <button class="button is-dark is-pulled-right">Publier l'image</button>
    </div>
  <div class="field">
    <div class="file has-name">
      <label class="file-label">
        <input onchange="readURL(this);" name="input-file" class="file-input" type="file" accept=".png, .jpg" name="resume" >
        <span class="file-cta">
          <span class="file-icon">
          <span style="display:inline-block; width:14px; height: 14px; background-color: grey; mask-image: url('icone/upload.svg'); mask-size: contain;"></span>
          </span>
          <span class="file-label">
            Normal file…
          </span>
        </span>
        <span class="file-name">
          Screen Shot 2017-07-29 at 15.54.25.png
        </span>
      </label>
    </div>

<!--<input id="input-file" type='file' onchange="readURL(this);" />-->
<img id="blah" alt="your image" />
<script src="video.js"></script>

</div>
</div>