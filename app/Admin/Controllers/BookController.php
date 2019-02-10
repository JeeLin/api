<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Type;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BookController extends Controller
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
            ->header('图书')
            ->description('列表')
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
            ->description('信息')
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
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Book);

        $grid->id('编号')->sortable();
        $grid->column('title', '书名')->editable();
        $grid->cover_url('封面')->image('http://39.108.180.53', 80, 80);
        $grid->author('作者')->editable();
        $grid->ISBN('ISBN')->editable();
        $grid->press('出版社')->sortable()->editable();
        $grid->price('价格')->sortable()->editable();
        $grid->published_date('出版时间')->sortable()->editable();
        $states = [
            'on' => ['value' => 1, 'text' => '公开', 'color' => 'primary'],
            'off' => ['value' => 0, 'text' => '不公开', 'color' => 'default'],
        ];
        $grid->status()->switch($states);
        $grid->type_id('分类')->display(function ($id) {
            return Type::find($id)->class;
        });

        $grid->filter(function ($filter) {
            $filter->like('title', '书名');
            $filter->like('author', '作者');
            $filter->like('press', '出版社');
            $filter->between('published_date', '出版时间')->date();
        });

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
        $show = new Show(Book::findOrFail($id));

        $show->id('编号')->sortable();
        $show > title('书名');
        $show->cover_url('封面')->image('http://39.108.180.53', 100, 100);
        $show->author('作者');
        $show->ISBN('ISBN');
        $show->press('出版社');
        $show->price('价格')->sortable();
        $show->published_date('出版时间')->sortable();
        $show->type_id('分类')->display(function ($id) {
            return Type::find($id)->class;
        });
        $show->updated_at('更新时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Book);

        $form->text('title', '书名');
        $form->image('cover_url', '封面')->uniqueName()->move('upload/covers');
        $form->text('author', '作者');
        $form->decimal('price', '价格');
        $form->text('press', '出版社');
        $form->date('published_date', '出版时间');
        $form->text('ISBN', 'ISBN');
        $form->number('type_id', '分类编号');
        $form->text('introduction', '简介');

        return $form;
    }
}
