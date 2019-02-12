<<<<<<< HEAD
<?php

namespace Crocodicstudio\Crudbooster\Controllers;

use Crocodicstudio\Crudbooster\CBCoreModule\FileUploader;
use Crocodicstudio\Crudbooster\Controllers\Helpers\IndexImport;
use Crocodicstudio\Crudbooster\Modules\ModuleGenerator\ControllerGenerator\FieldDetector;
use Storage;
use Response;
use Image;
use File;
use Illuminate\Support\Facades\Request;

class FileController extends Controller
{
    
    public function uploadSummernote()
    {
        echo asset(app( FileUploader::class)->uploadFile('userfile'));
    }

    public function uploadFile()
    {
        echo app(FileUploader::class)->uploadFile('userfile');
    }

    public function doUploadImportData()
    {
        $import = app(IndexImport::class);
   
        if (! Request::hasFile('userfile')) {
            backWithMsg('Please select a file for first!','warning');
        }
        $file = Request::file('userfile');
        $validator = $import->validateForImport($file);
        if ($validator->fails()) {
            backWithMsg(implode('<br/>', $validator->errors()->all()), 'warning');
        }
        $url = $import->uploadImportData($file);

        return redirect($url);
    }

    public function getPreview($one, $two = null, $three = null, $four = null, $five = null)
    {
        // array_filter() filters out the falsy values from array.
        $params = array_filter([$one, $two, $three, $four, $five]);        
        $filename = array_pop($params);
        $fullFilePath = implode(DIRECTORY_SEPARATOR, array_filter(['uploads', $one, $two, $three, $four, $five]));

        $fullStoragePath = storage_path('app/'.$fullFilePath);

=======
<?php namespace crocodicstudio\crudbooster\controllers;

use File;
use Image;
use Request;
use Response;
use Storage;

class FileController extends Controller
{
    public function getPreview($one, $two = null, $three = null, $four = null, $five = null)
    {

        if ($two) {
            $fullFilePath = 'uploads'.DIRECTORY_SEPARATOR.$one.DIRECTORY_SEPARATOR.$two;
            $filename = $two;
            if ($three) {
                $fullFilePath = 'uploads'.DIRECTORY_SEPARATOR.$one.DIRECTORY_SEPARATOR.$two.DIRECTORY_SEPARATOR.$three;
                $filename = $three;
                if ($four) {
                    $fullFilePath = 'uploads'.DIRECTORY_SEPARATOR.$one.DIRECTORY_SEPARATOR.$two.DIRECTORY_SEPARATOR.$three.DIRECTORY_SEPARATOR.$four;
                    $filename = $four;
                    if ($five) {
                        $fullFilePath = 'uploads'.DIRECTORY_SEPARATOR.$one.DIRECTORY_SEPARATOR.$two.DIRECTORY_SEPARATOR.$three.DIRECTORY_SEPARATOR.$four.DIRECTORY_SEPARATOR.$five;
                        $filename = $five;
                    }
                }
            }
        } else {
            $fullFilePath = 'uploads'.DIRECTORY_SEPARATOR.$one;
            $filename = $one;
        }

        $fullStoragePath = storage_path('app/'.$fullFilePath);
        $lifetime = 31556926; // One year in seconds

        $handler = new \Symfony\Component\HttpFoundation\File\File(storage_path('app/'.$fullFilePath));
>>>>>>> 5.4.0

        if (! Storage::exists($fullFilePath)) {
            abort(404);
        }
<<<<<<< HEAD
        $hasImageExtension = $this->isImage($fullStoragePath);
        $imageFileSize = 0;
        $imgRaw = '';
        if ($hasImageExtension) {
            list($imgRaw, $imageFileSize) = $this->resizeImage($fullStoragePath);
        }

        list($headers, $isCachedByBrowser) = $this->prepareHeaders($imageFileSize, $fullFilePath, $filename);

        if ($hasImageExtension) {
            if ($isCachedByBrowser) {
                return Response::make('', 304, $headers); // File (image) is cached by the browser, so we don't have to send it again
            }

            return Response::make($imgRaw, 200, $headers);
        }

        if (request('download')) {
            return Response::download($fullStoragePath, $filename, $headers);
        }

        return Response::file($fullStoragePath, $headers);
    }

    /**
     * @param $fullStoragePath
     * @return array
     */
    private function resizeImage($fullStoragePath)
    {
        $w = request('w', cbConfig('DEFAULT_THUMBNAIL_WIDTH', 300));
        $h = request('h', $w);
        $imgRaw = Image::cache(function ($image) use ($fullStoragePath, $w, $h) {
            $im = $image->make($fullStoragePath);
            if (! $w) {
                return $im;
            }
            if (! $h) {
                $im->fit($w);
            } else {
                $im->fit($w, $h);
            }
        });

        $imageFileSize = mb_strlen($imgRaw, '8bit') ?: 0;

        return [$imgRaw, $imageFileSize];
    }

    /**
     * @param $fullStoragePath
     * @return bool
     */
    private function isImage($fullStoragePath)
    {
        $extension = strtolower(File::extension($fullStoragePath));

        return FieldDetector::isWithin($extension, 'IMAGE_EXTENSIONS');;
    }

    /**
     * @param $imageFileSize
     * @param $fullFilePath
     * @param $filename
     * @return array
     */
    private function prepareHeaders($imageFileSize, $fullFilePath, $filename)
    {
        $lifetime = 31556926; // One year in seconds
        $fullStoragePath = storage_path('app/'.$fullFilePath);
        /**
         * Prepare some header variables
         */
        $handler = new \Symfony\Component\HttpFoundation\File\File($fullStoragePath);
=======

        $extension = strtolower(File::extension($fullStoragePath));
        $images_ext = config('crudbooster.IMAGE_EXTENSIONS', 'jpg,png,gif,bmp');
        $images_ext = explode(',', $images_ext);
        $imageFileSize = 0;

        if (in_array($extension, $images_ext)) {
            $defaultThumbnail = config('crudbooster.DEFAULT_THUMBNAIL_WIDTH');
            if ($defaultThumbnail != 0) {
                $w = Request::get('w') ?: $defaultThumbnail;
                $h = Request::get('h') ?: $w;
            } else {
                $w = Request::get('w');
                $h = Request::get('h') ?: $w;
            }

            $imgRaw = Image::cache(function ($image) use ($fullStoragePath, $w, $h) {
                $im = $image->make($fullStoragePath);
                if ($w) {
                    if (! $h) {
                        $im->fit($w);
                    } else {
                        $im->fit($w, $h);
                    }
                }

                return $im;
            });

            $imageFileSize = mb_strlen($imgRaw, '8bit') ?: 0;
        }

        /**
         * Prepare some header variables
         */
>>>>>>> 5.4.0
        $file_time = $handler->getMTime(); // Get the last modified time for the file (Unix timestamp)

        $header_content_type = $handler->getMimeType();
        $header_content_length = ($imageFileSize) ?: $handler->getSize();
        $header_etag = md5($file_time.$fullFilePath);
        $header_last_modified = gmdate('r', $file_time);
        $header_expires = gmdate('r', $file_time + $lifetime);

        $headers = [
            'Content-Disposition' => 'inline; filename="'.$filename.'"',
            'Last-Modified' => $header_last_modified,
            'Cache-Control' => 'must-revalidate',
            'Expires' => $header_expires,
            'Pragma' => 'public',
            'Etag' => $header_etag,
        ];

<<<<<<< HEAD
        // return Response::download($fullStoragePath, $filename, $headers);
=======
        /**
         * Is the resource cached?
         */
        $h1 = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $header_last_modified;
        $h2 = isset($_SERVER['HTTP_IF_NONE_MATCH']) && str_replace('"', '', stripslashes($_SERVER['HTTP_IF_NONE_MATCH'])) == $header_etag;
>>>>>>> 5.4.0

        $headers = array_merge($headers, [
            'Content-Type' => $header_content_type,
            'Content-Length' => $header_content_length,
        ]);

<<<<<<< HEAD
        /**
         * Is the resource cached?
         */
        $h1 = Request::server('HTTP_IF_MODIFIED_SINCE') && Request::server('HTTP_IF_MODIFIED_SINCE') == $header_last_modified;
        $h2 = Request::server('HTTP_IF_NONE_MATCH') && str_replace('"', '', stripslashes(Request::server('HTTP_IF_NONE_MATCH'))) == $header_etag;
        $isCachedByBrowser = ($h1 || $h2);

        return [$headers, $isCachedByBrowser];
    }

    /**
     * @return mixed
     */
    public function doneImport()
    {
        return app(IndexImport::class)->doneImport();
=======
        if (in_array($extension, $images_ext)) {
            if ($h1 || $h2) {
                return Response::make('', 304, $headers); // File (image) is cached by the browser, so we don't have to send it again
            } else {
                return Response::make($imgRaw, 200, $headers);
            }
        } else {
            if (Request::get('download')) {
                return Response::download(storage_path('app/'.$fullFilePath), $filename, $headers);
            } else {
                return Response::file(storage_path('app/'.$fullFilePath), $headers);
            }
        }
>>>>>>> 5.4.0
    }
}
