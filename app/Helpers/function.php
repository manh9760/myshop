<?php

if (!function_exists('upload_image')) {
    /**
     * @param $file [tên file trùng tên input]
     * @param array $extend [ định dạng file có thể upload được]
     * @return array|int [ tham số trả về là 1 mảng - nếu lỗi trả về int ]
     */
    function upload_image($file , $folder = '',array $extend  = array() ) {
        $code = 1;
        // Lấy đường dẫn ảnh
        $baseFilename = public_path() . '/uploads/' . $_FILES[$file]['name'];

        // Thông tin file ảnh
        $info = new SplFileInfo($baseFilename);

        // Lấy đuôi file
        $ext = strtolower($info->getExtension());

        // Kiểm tra định dạng file ảnh
        if ( ! $extend )
            $extend = ['png','jpg','jpeg','webp'];

        if( !in_array($ext,$extend))
            return $data['code'] = 0;

        // Tên file mới
        $nameFile = trim(str_replace('.'.$ext,'',strtolower($info->getFilename())));
        $filename = date('Y-m-d__').\Illuminate\Support\Str::slug($nameFile) . '.' . $ext;;
        
        // Thư mục gốc để upload ảnh
        $path = public_path().'/uploads/'.date('Y/m/d/');
        if ($folder)
            $path = public_path().'/uploads/'.$folder.'/'.date('Y/m/d/');

        if ( !\File::exists($path))
            mkdir($path,0777,true);

        // Chuyển file vào thư mục uploads
        move_uploaded_file($_FILES[$file]['tmp_name'], $path. $filename);

        $data = [
            'name' => $filename,
            'code' => $code,
            'path' => $path,
            'path_img' => 'uploads/'.$filename
        ];

        return $data;
    }
}

// Lấy địa chỉ IP của khách hàng
if (!function_exists('get_client_ip')) {
    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}

if (!function_exists('parse_url_file')) {
	function parse_url_file($image, $folder='') {
		if (!$image)
			return '/public/uploads/images/no-image.png';
		$explode = explode('__', $image);
		if (isset($explode[0])) {
			$time = str_replace('_', '/', $explode[0]);
			return '/public/uploads'.$folder.'/'.date('Y/m/d', strtotime($time)).'/'.$image;
		}
	}
}

if (!function_exists('get_user_data')) {
    function get_user_data($type, $field='id') {
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->field : '';
    }
}