<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $news_category_name = $request->get('news_titlename') ? $request->get('news_name') : @$news->news_category_name ?>
    {!! Form::label($name, trans('news::news_admin.name').':') !!}
    {!! Form::text($name, $news_category_name, ['class' => 'form-control', 'placeholder' => trans('news::news_admin.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->