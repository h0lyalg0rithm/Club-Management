<!DOCTYPE html>
<html>
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
        <script src="js/jquery.fileupload.js"></script>
        <script src="js/jquery.iframe-transport.js"></script>
        <script src="js/json_parse.js"></script>
        <script>
            $(document).ready(function(){
                $('#file_upload').fileupload({
                    url: 'php/index.php',
                    done: function (e, data) {
                        $.each(data.result, function (index, file) {
                            $('<p/>').text(file.name).appendTo('body');
                        });
                    }
                });
            });
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style/default.css" media="screen" />
        <title>JavaScript File API and Ajax uploading Demo</title>
    </head>
    <body>
        <div id="wrap">
            <h1>JavaScript File API and Ajax uploading Demo</h1>
            <h2>Choose a file to upload:</h2>
            <input id="file_upload" type="file" name="files[]" />

            <div id="files">
                <h2>File Preview</h2>
                <ul id="filePreview"></ul>
                <a id="remove" href="#" title="Remove file">Remove file</a>
            </div>
        </div>
    </body>
</html>