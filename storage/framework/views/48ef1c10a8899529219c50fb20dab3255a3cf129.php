<?php $__env->startSection('content'); ?>
    <h1>Editar Produto</h1>
    <div class='card'>
        <div class='card-body'>
            <form method="POST" action="/productUpdate">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
                <div class="form-group">         
                    <label for="name">Nome do produto</label>
                    <input value='<?php echo e($updateProduct ->name); ?>' type="text" class="form-control " id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea type="text" rows='5' class="form-control" id="description" name="description"><?php echo e($updateProduct ->description); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input value='<?php echo e($updateProduct ->price); ?>' type="text" class="form-control" id="price" placeholder="100,00 ou maior" name="price">
                </div>
                <input value='<?php echo e($updateProduct ->id); ?>'id="id" name="id" readonly= "true" readonly style='visibility:hidden;'>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\perfect-test-backend-master\resources\views//crud_products_edit.blade.php ENDPATH**/ ?>