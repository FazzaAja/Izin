<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title>@yield('tittle')</title>
    <link rel="icon" type="image/png" href="../../dist/img/logoizin.png">

</head>
<body>
    <form method="POST" action="{{ route('foto', $izin->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <video id="video" width="640" height="480" autoplay></video>
        <canvas id="webcamCanvas" width="640" height="480" style="border: 1px black solid; display: none;"></canvas>
        <input type="hidden" name="image" id="image">
        <button type="button" onclick="ambilGambar();" id="capture">Capture</button>
        <button type="submit">Save</button>
		
    </form>

    
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script>
        const video = document.querySelector('#video');
        const imageInput = document.querySelector('#image');
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        var wCanvas = document.querySelector("#webcamCanvas");

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
            });

        document.querySelector('#capture').addEventListener('click', () => {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

            const dataUrl = canvas.toDataURL();
            imageInput.value = dataUrl;
        });

        function ambilGambar(){
				wCanvas.getContext("2d").drawImage(video, 0, 0, 720, 480);
				var imageData = wCanvas.toDataURL("image/jpg");
				console.log(imageData);
				
				toggleCanvasVideo();
			}
    </script>
</body>
</html>