<?php

class Upload extends CFormModel
{

    public $file;

    public function rules()
    {
        return array(
            array('file', 'file', 'types' => 'jpg, jpeg, tiff, png, doc, docx, pdf, rtf ', 'maxSize' => 1048576)
        );
    }
}
