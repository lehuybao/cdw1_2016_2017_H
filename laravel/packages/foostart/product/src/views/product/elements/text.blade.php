<!DOCTYPE html>
<html>
    <head>
        <script src='//cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script>
            tinymce.init({
                selector: 'textarea', // change this value according to your HTML
                plugin: 'a_tinymce_plugin',
                a_plugin_option: true,
                a_configuration_option: 400
            });
        </script>
    </head>

    <body>
     
    </body>
</html>

<div class="form-group">
    <?php $product_name = $request->get('product_titlename') ? $request->get('product_name') : @$product->product_name ?>
    {!! Form::label($name, trans('product::product_admin.name').':') !!}
    {!! Form::textarea($name, $product_name, ['class' => 'form-control', 'placeholder' => trans('product::product_admin.name').'']) !!}
      <?php $product_des = $request->get('product_titledes') ? $request->get('product_des') : @$product->product_des ?>
    {!! Form::label($des, trans('product::product_admin.des').':') !!}
    {!! Form::textarea($des, $product_des, ['class' => 'form-control', 'placeholder' => trans('product::product_admin.des').'']) !!}
</div>
<!-- /SAMPLE NAME -->