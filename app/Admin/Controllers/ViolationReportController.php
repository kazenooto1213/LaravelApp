<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Models\ViolationReport;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Admin;
use League\CommonMark\Node\Block\Document;

class ViolationReportController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '違反投稿確認';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ViolationReport());

        $grid->column('id', __('Id'));
        $grid->column('advice_id', __('通報対象<br>Advice id'));
        $grid->column('user_id', __('通報者<br>User id'));
        $grid->column('title', __('タイトル<br>Title'));
        $grid->column('advice', __('通報投稿内容<br>Advice'));
        $grid->column('reason', __('理由<br>Reason'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(ViolationReport::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('advice_id', __('通報対象:.Advice id'));
        $show->field('user_id', __('通報者:.User id'));
        $show->field('title', __('Title'));
        $show->field('advice', __('Advice'));
        $show->field('reason', __('Reason'));
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
        
        $form = new Form(new ViolationReport());

        $id = request()->route()->parameter('violation_report'); //違反投稿が登録された際のidは取得出来ました。

        $form->display('advice_id', __('通報対象:.Advice id'));
        $form->display('user_id', __('通報者:.User id'));
        $form->display('title', __('Title'));
        $form->display('advice', __('Advice'));
        $form->display('reason', __('Reason'));
        $form->tools(function(Form\Tools $tools) use($id){
            $tools->disableDelete();
            $tools->append('<a href="http://localhost/household-account-book/public/admin/admin_violation_report?id='.$id.'" class="btn btn-sm btn-danger hidden-xs"style="margin-right:5px;font-fa"><i class="fa fa-street-view"></i>&nbsp;&nbsp;違反投稿者処置</a>');
        });
        return $form;
    }

    public function destroy($id)
    {
        ViolationReport::findOrFail($id)->delete();
        return redirect('/admin/violation_report');
    }
}
