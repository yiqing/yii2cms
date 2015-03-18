<?php
/**
 * Created by PhpStorm.
 * User: wm
 * Date: 2015/3/18
 * Time: 17:30
 */
$str = '';
foreach($categorys as $category)
{
    if($category['parentid']==0)
    {
        $str.= "<li><a href='/article/index?id={$category['id']}'>".$category['cname']."</a></li>";
    }
}
echo $str;
?>
