<?php

namespace App\Admin\Controllers;

use App\Event;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EventController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Event';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Event());

        $grid->column('titre', __('Titre'));
        $grid->column('date_creation', __('Date creation'));
        $grid->column('original_name', __('Original name'));

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
        $show = new Show(Event::findOrFail($id));

        $show->field('titre', __('Titre'));
        $show->field('date_creation', __('Date creation'));
        $show->field('original_name', __('File name'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Event());

        $form->text('titre', __('Titre'));
        $form->datetime('date_creation', __('Date creation'))->default(date('Y-m-d H:i:s'));
        $form->textarea('original_name', __('File name'));

        return $form;
    }
}
