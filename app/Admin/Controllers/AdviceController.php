<?php

namespace App\Admin\Controllers;

use App\Models\Advice;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AdviceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Advice';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Advice());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('投稿者<br>User id'))->sortable();
        $grid->column('category', __('Category'));
        $grid->column('title', __('Title'));
        $grid->column('advice', __('Advice'));
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        $grid->filter(function($filter) {
            $filter->like('user_id', '投稿者');
            $filter->like('title', 'タイトル');
            $filter->like('advice', 'アドバイス');
            $filter->like('created_at', '投稿日')->datetime();
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
        $show = new Show(Advice::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('category', __('Category'));
        $show->field('title', __('Title'));
        $show->field('advice', __('Advice'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Advice());

        $form->number('user_id', __('User id'));
        $form->text('category', __('Category'));
        $form->text('title', __('Title'));
        $form->textarea('advice', __('Advice'));

        return $form;
    }
}
