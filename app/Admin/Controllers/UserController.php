<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class UserController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('用户')
            ->description('列表')
            ->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->id('ID')->sortable();
        $grid->nickname('昵称');
        $grid->avatar_url('头像')->image('http://39.108.180.53', 80, 80);
        $grid->status('类型')->using([1 => '家长', 2 => '认证中', 3 => '园长'])->sortable();
        $grid->phone('手机号');
        $grid->email('邮箱');
        $grid->image_url('执照图片')->display(function ($url) {
            return explode(";", $url);
        })->image('http://39.108.180.53', 100, 100);
        $grid->openid('OpenID');

        // $grid->created_at('Created at');
        // $grid->updated_at('Updated at');

        $grid->tools(function ($tools) {
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });

        $grid->filter(function ($filter) {
            $filter->like('nickname', '昵称');
        });

        $grid->disableCreateButton();
        $grid->disableActions(); //禁用操作

        return $grid;
    }
}
