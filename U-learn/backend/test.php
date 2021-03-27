<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<video width="400" id="view" style="display: none;" controls >
    <source src="mov_bbb.mp4" id="video_here">
    Your browser does not support HTML5 video.
</video>

<input type="file" name="media" class="file_multi_video" accept="video/*">

<script>

    $(document).on("change", ".file_multi_video", function(evt) {
        document.getElementById("view").style.display = "block";

        var $source = $('#video_here');
        $source[0].src = URL.createObjectURL(this.files[0]);
        $source.parent()[0].load();
    });


</script>

