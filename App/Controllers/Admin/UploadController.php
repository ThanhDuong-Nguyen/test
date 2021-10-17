<?php

namespace App\Controllers\Admin;

use App\Core\Auth;

class UploadController extends Auth
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $fileName = basename($_FILES["file"]["name"]);
                if ($fileName == '') {
                    return json([
                        'error' => true,
                        'message' => 'Vui lòng chọn file Ảnh'
                    ]);
                }

                $getPath = getFolder();
                $pathFull = $getPath . '/' . $fileName;

                if (move_uploaded_file($_FILES['file']['tmp_name'], $pathFull)) {
                    return json([
                        'error' => false,
                        'url' => $pathFull
                    ]);
                }

                return json([
                    'error' => true,
                    'message' => 'Có lỗi vui lòng thử lại'
                ]);
            }

            return json([
                'error' => true,
                'message' => 'Method not exit'
            ]);
            
    }

    
}