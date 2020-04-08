  <div class="container">
    <div class="tile is-ancestor">
      <div class="tile is-vertical is-10">
        <div class="tile is-parent is-vertical is-12">
        <!-- WEB-CAM -->

         <article class="tile is-child box">
          <div style="display: block; width: 100%; height: 100%; min-height: 720px;">
            <div style="display: none; width: 100%; height: 100%;" id="blah" >
                <img src="sticker/dabdog.png" style="width: 180%;" id="filtre">
            </div>
            <canvas hidden id="canvas" style="width: 100%; height: 100%;"></canvas>
            <video id="video" autoplay="true" style="width: 100%; height: 100%; border-radius: 3px; postion= absolute; bot: 20px;">
            </video>
          </div>
          </article>

          <!-- END WEB-CAM -->
          <form id="form_push" action="index.php?page=upload_post" method="post" enctype="multipart/form-data">
        </div>
      </div>
        <div class="tile is-parent is-2">
          <div class="tile is-child box" style="height:760px; overflow-x: auto;">
            <input id="filtre_in" hidden name="filtre" onkeyup='javascript:isCharSet()'></input>
             <img id="press" name="press" onclick="javascript:viewImage('filtre', 'press');isCharSet();" style="height: 165px;" src="sticker/press.png">
             <img id="goat" onclick="javascript:viewImage('filtre', 'goat');isCharSet();" style="height: 165px;" src="sticker/goat.png">
             <img id="cat" onclick="javascript:viewImage('filtre', 'cat');isCharSet();" style="height: 165px;" src="sticker/cat.png">
             <img id="yato" onclick="javascript:viewImage('filtre', 'yato');isCharSet();" style="height: 165px;" src="sticker/yato.png">
             <img id="dabdog" onclick="javascript:viewImage('filtre', 'dabdog');isCharSet();" style="height: 165px;" src="sticker/dabdog.png" >
             <img id="duo" onclick="javascript:viewImage('filtre', 'duo');isCharSet();" style="height: 165px;" src="sticker/duo.png" >
             <img id="laink" onclick="javascript:viewImage('filtre', 'laink');isCharSet();" style="height: 165px;" src="sticker/laink.png" >
             <img id="tera" onclick="javascript:viewImage('filtre', 'tera');isCharSet();" style="width: 165px;" src="sticker/tera.png" >
             <img id="none" onclick="javascript:viewImage('filtre', 'none');isCharSet();" style="width: 155px;" src="sticker/none.png" >
             <img id="photo">
         </div>
        </div>
      </div>
    <div class="field">
      <button id="startbutton" class="button is-dark is-pulled-right" type="submit" value="OK" >Publier l'image</button>
      <input oninput="zoomImage(this.id)" id="percent" name="slider" class="slider is-pulled-right is-fullwidth" step="1" min="0" max="100" value="28" type="range">
    </div>
  <div class="field">
    <div class="file has-name">
      <label class="file-label">
        <input onchange="readURL(this);" name="input-file" class="file-input" type="file" accept=".png, .jpg">
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
    </form>

<!--<input id="input-file" type='file' onchange="readURL(this);" />-->
<script src="javascript/video.js"></script>

</div>
</div> 