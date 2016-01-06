<?php

app::uses('Component','Controller');

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class UploadComponent extends Component{
            
    public function upload( $data = null, $file_path, $allowed ){
        if(!empty($data)){            
            
            $file_tmp_name = $data['tmp_name'];
            $file_path_abs = $file_path . DS . String::uuid() . '.' . substr( strrchr( $data['name'],'.'),1);
            
            if( !in_array( substr( strrchr( $data['name'],'.'),1),$allowed)){
                return False;
            }else{
                $dir = new Folder($file_path, true, 0755);
                move_uploaded_file($file_tmp_name, $file_path_abs);
                return $file_path_abs;
            }               
        }
    } 
    
} 