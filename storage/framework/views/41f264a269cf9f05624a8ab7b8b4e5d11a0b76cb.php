<script data-exec-on-popstate>

    $(function () {
        <?php $__currentLoopData = $script; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $s; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    });
</script><?php /**PATH /homepages/7/d421602321/htdocs/ENT/DOCS20/vendor/encore/laravel-admin/src/../resources/views/partials/script.blade.php ENDPATH**/ ?>