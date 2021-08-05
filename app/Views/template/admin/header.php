<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Lefebvre harold">
    <title>Admin | Lefebvre harold</title>
    <!-- Custom fonts for this template-->

    <link href="<?= base_url('assets/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.css'); ?>">
    <script src="<?= base_url('assets/tinymce/tinymce.min.js'); ?>"></script>
    <script>tinymce.init({
            language: 'fr_FR',
            selector: 'textarea#local-upload',
            browser_spellcheck: true,
            contextmenu: false,
            plugins: 'visualblocks,codesample,emoticons,help,code,image,link,lists',
            toolbar: "code| undo redo | styleselect | bold italic | link image | numlist bullist",
            image_class_list: [
                {title: 'img-fluid', value: 'img-fluid'},
                {title: 'rounded', value: 'rounded'},
                {title: 'w-100', value: 'w-100'},
            ],
            /* without images_upload_url set, Upload tab won't show up*/
            images_upload_url: '<?= base_url('fileupload/upload'); ?>',

            /* we override default upload handler to simulate successful upload*/
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '<?= base_url('fileupload/upload'); ?>');

                xhr.upload.onprogress = function (e) {
                    progress(e.loaded / e.total * 100);
                };

                xhr.onload = function() {
                    var json;

                    if (xhr.status === 403) {
                        failure('HTTP Error: ' + xhr.status, { remove: true });
                        return;
                    }

                    if (xhr.status < 200 || xhr.status >= 300) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                xhr.onerror = function () {
                    failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);

            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });</script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css?id=3'); ?>" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('assets/img/apple-icon-57x57.png'); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url('assets/img/apple-icon-60x60.png'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('assets/img/apple-icon-72x72.png'); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon-76x76.png'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('assets/img/apple-icon-114x114.png'); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('assets/img/apple-icon-120x120.png'); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('assets/img/apple-icon-144x144.png'); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('assets/img/apple-icon-152x152.png'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/img/android-icon-192x192.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/img/favicon-96x96.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?= base_url('manifest.json'); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url('assets/img/ms-icon-144x144.png'); ?>">
    <meta name="theme-color" content="#ffffff">
</head>

<body id="page-top">


