<html lang='pt-br'>
<head>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Perfect Pay - Teste - <?php echo $__env->yieldContent('title'); ?></title>
    <link href="<?php echo e(asset('/images/brand/favicon.png')); ?>" rel="icon" type="image/png"/>
    <link rel='stylesheet' href="<?php echo e(url('/css/app.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        .wrapper #wrapperContent, .wrapper #wrapperContent.closed {
            padding: 0;
        }
    </style>
</head>
<body>
<!-- NAVBAR TOP -->
<?php echo $__env->make('layout_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class='wrapper'>
    <div id='wrapperContent' class='content container-fluid'>
        <div id='main'>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>
<script src="<?php echo e(url('/js/app.js')); ?>"></script>
<script src="https://kit.fontawesome.com/d712964458.js" crossorigin="anonymous"></script>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH C:\wamp\www\perfect-test-backend-master\resources\views/layout.blade.php ENDPATH**/ ?>