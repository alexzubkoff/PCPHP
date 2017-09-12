<?php

class UploadController extends Controller
{

    public function actionIndex()
    {

        $uploaded = false;
        $model = new Upload();
        
        
        if (isset($_POST['Upload'])) {
            $student_id = $_POST['student_id'];
            $model->attributes = $_POST['Upload'];
            $files = CUploadedFile::getInstances($model, 'file');
            if ($model->validate()) {
                foreach ($files as $file) {
                    if ($file->getExtensionName() === 'jpg' || $file->getExtensionName() === 'jpeg' || $file->getExtensionName() === 'tiff' || $file->getExtensionName() === 'png') {
                        $dir = Yii::getPathOfAlias('application.uploads.photo');
                        $uploaded = $file->saveAs($dir . '/' . $student_id . 'photo.' . $file->getExtensionName());
                        //$uploaded = $file->saveAs($dir . '/' . $file->getName());
                    } elseif ($file->getExtensionName() === 'doc' || $file->getExtensionName() === 'docx' || $file->getExtensionName() === 'pdf' || $file->getExtensionName() === 'rtf') {
                        $dir = Yii::getPathOfAlias('application.uploads.cv');
                        $uploaded = $file->saveAs($dir . '/' . $student_id . 'cv.' . $file->getExtensionName());
                        //$uploaded = $file->saveAs($dir . '/' . $file->getName());
                    }
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
