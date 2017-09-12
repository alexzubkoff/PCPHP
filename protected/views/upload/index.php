<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <style>    
        .upload-drop-zone {
            height: 100px;
            width: 550px;
            border-width: 2px;
            margin-bottom: 20px;
        }
        .upload-drop-zone { 
            color: #ccc;
            border-style: dashed;
            border-color: #ccc;
            line-height: 100px;
            text-align: center
        }
        .upload-drop-zone.drop {
            color: #222;
            border-color: #222;
        }
    </style>
    <body>

        <div class="container">
            <h2>Upload test</h2>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Student list edit</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container">

                                <h4>Select photo or/and CV files from your computer</h4>
                                <?php if ($uploaded): ?>
                                    <p>File was uploaded. Check </br><?php echo $dir ?>.</p>
                                <?php endif ?>
                                <?php echo CHtml::beginForm('', 'post', array('enctype' => 'multipart/form-data', 'id' => 'js-upload-form')) ?>
                                <div class="form-inline">
                                    <?php echo CHtml::error($model, 'file') ?>
                                    <?php echo CHtml::hiddenField('student_id', 1, array('id' => 'hiddenInput')) ?>                                   
                                    <div class="form-group">
                                        <?php echo CHtml::activeFileField($model, 'file[]', array('multiple' => true)) ?>
                                    </div>
                                    <?php echo CHtml::submitButton('Browse Photo/CV', array('class' => 'btn btn-sm btn-primary', 'id' => 'js-upload-submit')) ?>
                                </div>
                                <?php echo CHtml::endForm() ?>

                                <!--   <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
                                              <div class="form-inline">
                                                  <div class="form-group">
                                                      <input type="file" name="files[]" id="js-upload-files" multiple>
                                                  </div>
                                                  <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Browse Photo/CV</button>
                                              </div>
                                          </form>-->

                                <h4>Or drag and drop CV file below</h4>                            
                                    <div class="upload-drop-zone" id="drop-zone">
                                        Just drag and drop files here
                                    </div>                              
                            </div> 
                        </div>                          
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <script>
            +function ($) {
                'use strict';

                var dropZone = document.getElementById('drop-zone');
                var uploadForm = document.getElementById('js-upload-form');

                var startUpload = function (files) {
                    console.log(files);
                }

                uploadForm.addEventListener('submit', function (e) {
                    var uploadFiles = document.getElementById('js-upload-files').files;
                    e.preventDefault();
                    startUpload(uploadFiles);
                })

                dropZone.ondrop = function (e) {
                    e.preventDefault();
                    this.className = 'upload-drop-zone';
                    var file = e.dataTransfer.files;
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener('progress', uploadProgress, false);
                    xhr.onreadystatechange = stateChange;
                    xhr.open('POST', 'http://localhost/FullCaesar/Full_Ceasar/upload');
                    xhr.setRequestHeader('X-FILE-NAME', file.name);
                    xhr.send(file);

                    startUpload(e.dataTransfer.files);
                }

                dropZone.ondragover = function () {
                    this.className = 'upload-drop-zone drop';
                    return false;
                }

                dropZone.ondragleave = function () {
                    this.className = 'upload-drop-zone';
                    return false;
                }

                function uploadProgress(event) {
                    var percent = parseInt(event.loaded / event.total * 100);
                    dropZone.text('Downloading: ' + percent + '%');
                }

                function stateChange(event) {
                    if (event.target.readyState == 4) {
                        if (event.target.status == 200) {
                            dropZone.text('Upload is successfull!');
                        } else {
                            dropZone.text('Upload is not successfull!');
                            dropZone.addClass('error');
                        }
                    }
                }
            }(jQuery);
        </script>
    </body>
</html>

