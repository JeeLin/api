<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Admin\Extensions\Pass;

class AuthencationController extends Controller
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
            ->header('园长认证')
            ->description('审核列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
     public function show($id, Content $content)
     {
         return $content
             ->header('详细')
             ->description('内容')
             ->body($this->detail($id));
     }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑')
            ->description('')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('新增')
            ->description('')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);
        $grid->model()->where('status',2);

        // $grid->id('ID')->sortable();
        $grid->nickname('昵称');
        $grid->phone('手机号');
        $grid->email('邮箱');
        $grid->image_url('营业执照')->display(function($url){
            return explode(";",$url);
        })->image('http://39.108.180.53',100,100);
        // $grid->id('ID')->color('#ccc');
        // $grid->id('通过')->pass();
        // $grid->created_at('Created at');
        // $grid->updated_at('Updated at');

        $grid->filter(function($filter){
            $filter->like('nickname','昵称');
        });

        //通过按钮
        // $grid->id('通过')->pass();

        $grid->disableCreateButton();
        $grid->disableActions();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
     protected function detail($id)
     {
         $show = new Show(User::findOrFail($id));

         $show->id('ID')->sortable();
         $show->nickname('昵称');
         $show->phone('手机号');
         $show->email('邮箱');
         $show->image_url('营业执照')->display(function($url){
            return explode(";",$url);
         })->image('http://39.108.180.53',100,100);

         $show->filter(function($filter){
            $filter->like('nickname','昵称');
         });
         return $show;
     }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User);

        $form->text('openid', 'OpenID');
        $form->text('nickname', '昵称');
        $form->image('avatar_url','头像图片')->uniqueName()->move('upload/avatars');
        $form->number('status', '认证状态码')->default(1);

        return $form;
    }
}
