<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploader - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>


    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>File Uploader</h3>
                    <p class="text-subtitle text-muted">File uploader that makes user easier to upload their files</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">File Uploader</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">


                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Multiple Files</h5>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Using the basic table up, upload here to see how
                                    <code>.multiple-files-filepond</code>-based basic file uploader look. You can use
                                    <code>allowMultiple</code> or <code>multiple</code> attribute too to implement
                                    multiple upload.
                                </p>
                                <!-- File uploader with multiple files upload -->
                                <input type="file" class="multiple-files-filepond" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">With Validation</h5>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Using the basic table up, upload here to see how
                                    <code>.with-validation-filepond</code>-based basic file uploader look. You can use
                                    <a href="https://pqina.nl/filepond/docs/patterns/plugins/file-validate-size/#properties"
                                        target="_blank">see here</a>
                                    or <code>required (to make your input required), data-max-file-size (to limit your
                                        input file size),
                                        data-max-files (to limit your uploaded files), etc (start with data-)</code>
                                    attribute too to implement validation.
                                </p>
                                <!-- File uploader with validation -->
                                <input type="file" class="with-validation-filepond" required multiple
                                    data-max-file-size="1MB" data-max-files="3">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Image Preview</h5>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Using the basic table up, upload here to see how
                                    <code>.image-preview-filepond</code>-based basic file uploader look. This
                                    preview for uploaded or dropped images.
                                </p>
                                <!-- File uploader with image preview -->
                                <input type="file" class="image-preview-filepond">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Image Auto Resize</h5>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Using the basic table up, upload here to see how
                                    <code>.image-resize-filepond</code>-based basic file uploader look.
                                </p>
                                <!-- Auto resize image file uploader -->
                                <input type="file" class="image-resize-filepond">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- filepond validation -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <!-- image editor -->
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>

    <!-- toastify -->
    <script src="assets/vendors/toastify/toastify.js"></script>

    <!-- filepond -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        // register desired plugins...
        FilePond.registerPlugin(
            // validates the size of the file...
            FilePondPluginFileValidateSize,
            // validates the file type...
            FilePondPluginFileValidateType,
            // preview the image file type...
            FilePondPluginImagePreview,
            // filter the image file
            FilePondPluginImageFilter,
            // calculates & adds resize information...
            FilePondPluginImageResize,
        );


        // Filepond: Multiple Files
        FilePond.create(document.querySelector('.multiple-files-filepond'), {
            allowImagePreview: false,
            allowMultiple: true,
            allowFileEncode: false,
            required: false
        });

        // Filepond: With Validation
        FilePond.create(document.querySelector('.with-validation-filepond'), {
            allowImagePreview: false,
            allowMultiple: true,
            allowFileEncode: false,
            required: true,
            acceptedFileTypes: ['image/png'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });


        // Filepond: Image Preview
        FilePond.create(document.querySelector('.image-preview-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });


        // Filepond: Image Resize
        FilePond.create(document.querySelector('.image-resize-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            allowImageResize: true,
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            imageResizeMode: 'cover',
            imageResizeUpscale: true,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });
    </script>

    <script src="assets/js/main.js"></script>
</body>

</html>
