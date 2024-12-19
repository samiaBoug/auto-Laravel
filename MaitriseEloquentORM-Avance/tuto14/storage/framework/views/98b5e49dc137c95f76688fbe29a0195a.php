<?php $__env->startSection('content'); ?>
    <table class="table">
       <tr>
        <td>Nom</td>
        <td>Email</td>
       </tr>
       <tr>
        <td><?php echo e($user->name); ?></td>
        <td><?php echo e($user->email); ?></td>
       </tr>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projects\auto-Laravel\MaitriseEloquentORM-Avance\tuto14\resources\views/dashboard.blade.php ENDPATH**/ ?>