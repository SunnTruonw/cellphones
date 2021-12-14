<?php


namespace App\Helpers;

use Illuminate\Support\Str;

class Helper{

    public static function category($categories, $parent_id = 0 , $char=''){
        $html='';
        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parent_id) {
                $html .= '
                    <tr>
                        <td>' . $category->id . '</td>
                        <td>' . $char . $category->name . '</td>
                        <td>' . self::active($category->active) . '</td>
                        <td>' . $category->updated_at . '</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/category/' . $category->id . '/edit">
                                edit
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow(' . $category->id . ', \'/admin/category/destroy\')">
                               delete
                            </a>
                        </td>
                    </tr>
                ';

                unset($categories[$key]);

                $html .= self::category($categories, $category->id, $char . '|--');
            }
        }
        return $html;
    }

    public static function active($active = 0): string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-sm">NO</span>'
            : '<span class="btn btn-success btn-sm">YES</span>';
    }

    public static function price($price = 0, $discount = 0)
    {
        if ($discount != 0) return number_format($discount);
        if ($price != 0)  return number_format($price);
        return '<a href="/lien-he.html">Liên Hệ</a>';
    }
}