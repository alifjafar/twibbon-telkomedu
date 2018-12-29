(function () {

    function getRoundedCanvas(sourceCanvas) {
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        var width = sourceCanvas.width;
        var height = sourceCanvas.height;
        var imageTwibbon = new Image();

        imageTwibbon.src = "img/twibbon.png";

        canvas.width = width;
        canvas.height = height;

        context.imageSmoothingEnabled = true;
        context.drawImage(sourceCanvas, 0, 0, width, height);
        context.drawImage(imageTwibbon, 0, 0, width, height);
        context.globalCompositeOperation = 'destination-in';
        context.beginPath();
        context.fill();


        return canvas;
    }

    function iCropper() {
        $(".cropper").show();
        $("#cropperx").hide();
        var image = document.getElementById('image');
        var button = document.getElementById('button');
        var downloadButton = document.getElementById('download-button');
        var result = document.getElementById('result');
        var croppable = false;
        var cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            cropperFaceImage: "img/twibbon.png",
            dragMode: 'move',
            autoCropArea: 0.65,
            restore: false,
            guides: false,
            center: false,
            highlight: false,

            cropBoxMovable: true,
            cropBoxResizable: true,
            toggleDragModeOnDblclick: false,
            ready: function () {
                croppable = true;
            }
        });

        function resize() {
            var croppedCanvas = cropper.getCroppedCanvas();
            var canvas = getRoundedCanvas(croppedCanvas);
            console.log('resize');
            var photo = new Image();
            photo.src = canvas.toDataURL();
            photo.onload = function () {
                if (photo.width > 300) {
                    var width = 512,
                        height = 512;

                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext('2d');
                    canvas.width = width;
                    canvas.height = height;

                    context.drawImage(photo, 0, 0, width, height);
                    context.globalCompositeOperation = 'destination-in';
                    context.beginPath();
                    context.fill();
                    render(canvas);
                }
            }
        }

        function render(canvas) {
            $("#cropperx").show();
            var croppedCanvas;
            var roundedCanvas;
            var roundedImage;

            if (!croppable) {
                return;
            }
            // Crop
            //croppedCanvas = cropper.getCroppedCanvas();

            // Round
            roundedCanvas = canvas;

            // Show
            roundedImage = document.createElement('img');
            downloadButton.setAttribute('href', roundedCanvas.toDataURL('image/jpeg', 1.0));
            roundedImage.src = roundedCanvas.toDataURL('image/jpeg', 1.0);
            roundedImage.setAttribute('class', 'img-fluid result');
            result.innerHTML = '';
            result.appendChild(roundedImage);
            $("#download-button").show();
            $('.loading-alert').hide();
        }

        button.onclick = function () {
            $('#cropperz').hide();
            $('.loading-alert').show();
            $('.btn-generate').hide(resize);
        };
    }

    $('#upload').on('change', function () {
        $(".preview").hide();
        $('.loading-alert-file').show();
        var input = this;
        setTimeout(function () {
            readFile(input);
        }, 500);
    });

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
                $('.loading-alert-file').hide();
                iCropper();
            }
        } else {
        }
    }
})();