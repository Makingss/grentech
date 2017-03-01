<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/2/22
 * Time: 17:18
 */

namespace App\Admin\Controllers;


use App\Admin\Models\Image;
use App\Admin\Models\Image_attach;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class ToolsbaseController extends Controller
{
    public function fileUpload(Request $request)
    {
        if ($request->hasFile('img')) {
            $files = $request->file('img');
            $folderName = config('config.uploads.imageUploadPath');
            if (!Storage::disk('local')->exists($folderName)) {
                Storage::makeDirectory($folderName);
            }
            foreach ($files as $file) {
                $path = $file->store($folderName, 'uploadimage');
                $image_id=md5(uniqid());
                $imagePath[] = Image::create([
                    'image_id' => $image_id,
                    'url' => "/uploads/" . $path,
                    'ident' => $path
                ])->toArray();
            }
            return json_encode(['path' => $imagePath,'image_id'=>$image_id], true);
        } else {
            return response()->json(['status' => 'true', 'msg' => '没有图片']);
        }
    }

    public function remove(Request $request)
    {
        $keys = $request->all();
        if ($keys['key']) {
            $res=Image_attach::where('image_id',$keys['key'])->delete();
                if($res) {
                    Image::destroy($keys);
                    return json_encode(['succ' => '删除成功']);
                }
        }
        return json_encode(['fial' => '删除失败']);
    }
}

