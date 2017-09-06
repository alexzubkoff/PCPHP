<?php

class UploadController extends Controller
{

    function actionIndex()
    {
        $dir;
        $uploaded = false;
        $model = new Upload();
        if (isset($_POST['Upload'])){
            $model->attributes = $_POST['Upload'];
            $model->file = CUploadedFile::getInstance($model, 'file');
            if ($model->validate()){
                if ($model->file->getExtensionName() === 'jpg' || $model->file->getExtensionName() === 'jpeg' || $model->file->getExtensionName() === 'tiff' || $model->file->getExtensionName() === 'png'){
                    $dir = Yii::getPathOfAlias('application.uploads.photo');
                    $uploaded = $model->file->saveAs($dir . '/' . $model->file->getName());
                }elseif ($model->file->getExtensionName() === 'doc' || $model->file->getExtensionName() === 'docx' || $model->file->getExtensionName() === 'pdf' || $model->file->getExtensionName() === 'rtf'){
                    $dir = Yii::getPathOfAlias('application.uploads.cv');
                    $uploaded = $model->file->saveAs($dir . '/' . $model->file->getName());
                }
            }
        }
        $this->render('index', array(
            'model' => $model,
            'uploaded' => $uploaded,
            'dir' => $dir,
        ));
    }
}
