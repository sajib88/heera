<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * This class is written based entirely on the work found below
 * www.techbytes.co.in/blogs/2006/01/15/consuming-rss-with-php-the-simple-way/
 * All credit should be given to the original author
 *
 * Example:

    $this->load->library('rssparser');
    $this->rssparser->set_feed_url('http://example.com/feed');
    $this->rssparser->set_cache_life(30);
    $rss = $this->rssparser->getFeed(6);  // Get six items from the feed

    // Using a callback function to parse addictional XML fields

    $this->load->library('rssparser', array($this, 'parseFile')); // parseFile method of current class

    function parseFile($data, $item)
    {
        $data['summary'] = (string)$item->summary;
        return $data;
    }
*/


class Resizeimg {


        public function __construct ()
        {
            $this->CI = & get_instance ();
            log_message ( 'debug', 'MY File Processing Class Initialized' );
        }

    public $path ='./assets/file/project';

    public function make_upload($fieldName, $path, $type, $file_name, $width = 0, $height = 0) {
        $config['file_name'] = $file_name;
        $config['upload_path'] = $path;
        $config['allowed_types'] = $type;
        $config['max_size'] = '400000';
        $config['max_width'] = $width; // 0 for no limit
        $config['max_height'] = $height; // 0 for no limit
        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        unset($config);
        if (!$this->CI->upload->do_upload($fieldName)) {
            return array('status' => 0,
                'error' => $this->CI->upload->display_errors());
        } else {
            return array('status' => 1,
                'upload_data' => $this->CI->upload->data());
        }
    }

    public function resize_image($sourcePath, $width = '100', $height = '100', $desPath = '') {
        // load the image libraby
        $this->CI->load->library('image_lib');
        // clear the privios configuration
        $this->CI->image_lib->clear();
        // set the new configuration
        $config['image_library'] = 'gd2';
        $config['source_image'] = $sourcePath;
        $config['new_image'] = $desPath;
        $config['quality'] = '100%';
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width;
        $config['height'] = $height;
        // initlize the image library
        $this->CI->image_lib->initialize($config);

        // make the image to specific size
        if ($this->CI->image_lib->resize()) {
            return TRUE;
        } else {
            echo $this->CI->image_lib->display_errors();
        }

        return FALSE;
    }

    public function image_upload($fieldName, $path, $size = '', $type = '', $file_name = '') {
        // check the file path and make sure the is current or not
        // get all size that user want
        if ($size != '') {
            $sizeParams = str_replace(']', '', str_replace('size[', '', $size));
            $allSize = explode('|', $sizeParams);
        } else {
            $allSize = array('800,600');
        } // default size
        // check the is set or not
        if ($type == '') {
            $type = 'jpg|jpeg|png';
        }
        // check file name is set or not
        if ($file_name == '') {
            $file_name = time();
        }
        // first upload the row file
        $result = $this->make_upload($fieldName, $path, $type, $file_name);
        // if upload then then resize
        if ($result['status']) {
            foreach ($allSize as $key => $size) {
                $reSize = explode(',', $size);
                // set the main image path then set the thumbs path
                if ($key == 0) {
                    $savePath = '';
                } else {
                    if ($key == 1) { // check the first thumbs folder
                        $folder = 'thumbs';
                    } else {
                        $folder = 'thumbs' . $key;
                    }

                    $savePath = $result['upload_data']['file_path'] . $folder . "/";
                    // if folder is exists then create it
                    if (!is_dir($savePath)) {
                        mkdir($savePath, 0755);
                    }
                    $savePath .= $result['upload_data']['file_name'];
                }
                $this->resize_image($result['upload_data']['full_path'], $reSize[0], $reSize[1], $savePath);
            }
            return $result['upload_data']['file_name'];
        } else {
            $data['error'] = $result['error'];
        }
    }

    
}

/* End of file RSSParser.php */
/* Location: ./application/libraries/RSSParser.php */