<?php
/**
 * Created by PhpStorm.
 * User: GT_hang
 * Date: 2017/4/18
 * Time: 20:33
 */
namespace App\Common;

    Class Info
    {
//        输出错误信息
         public static function info($info,$css = '')
         {
             return '<div class="col-md-offset-2 '.$css.'" style="display:inline-block; color:red;">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    '.$info.'
                </div>';
         }

//         获取封面图片    1.用户id   2.作品id  3.图片名
        public function getCoverImg($user,$cartoon,$imgName)
        {
//            封面图片存放路径  用户id/用户id+作品id/
            return 'uploads/'.$user.'/'.($user+$cartoon).'/'.$imgName;
        }


//        获取作品文件夹   1.用户id   2.作品id
        public function getFile($user,$cartoon)
        {
            return '/'.$user.'/'.($user+$cartoon).'/';
        }


//        获取章节文件夹     1.用户id  2.作品id  3.章节id
        public function getChapterFile($id,$opus,$chapter)
        {
            return $id.'/'.($id+$opus).'/'.($id+$chapter).'/';
        }



    }