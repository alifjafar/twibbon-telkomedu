<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Frame Telkom Edu 2019</title>
    <link rel="stylesheet" href="css/cropper.css">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">Telkom Edutainment 2019</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="loading-alert-file" style="display:none">
                <div class="alert alert-warning">
                    Sedang Memuat Gambar
                </div>
            </div>
            <div class="card preview">
                <div class="card-header">
                    Twibbon Telkom Edu 2019
                </div>
                <div class="card-body">
                    <img class="img-fluid" src="img/twibbon.png">
                </div>
            </div>

            <div class="cropper" style="display:none">
                <div id="cropperz">
                    <div class="card">
                        <div class="card-header">
                            Sesuikan Fotomu
                        </div>
                        <div class="card-body">
                            <div class="twib">
                                <img id="image" class="img-fluid" alt="img">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary pull-right btn-generate" type="button" id="button">Generate
                            </button>
                        </div>
                    </div>
                </div>
                <div class="loading-alert" style="display:none">
                    <div class="alert alert-warning">
                        Gambar Sedang di Proses !
                    </div>
                </div>
                <div id="cropperx">
                    <div class="card">
                        <div class="card-header">
                            Hasil
                        </div>
                        <div class="card-body">
                            <div id="result"></div>
                        </div>
                        <div class="card-footer">
                            <a href="/" class="btn btn-info">Reset</a>
                            <a class="btn btn-primary float-right" id="download-button"
                               download="twibbon-telkomedu2k19.jpg"
                               style="display:none">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Upload
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input " id="upload" accept="image/*"/>
                            <label class="custom-file-label" for="upload">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="js/cropper.js" type="text/javascript"></script>
<script src="js/cropper.common.js" type="text/javascript"></script>
<script src="js/process.js"></script>
<script>
    $('#upload').on('change', function (e) {
        var fileName = e.target.files[0].name;
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
</body>
</html>
