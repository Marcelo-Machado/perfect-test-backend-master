<?php $__env->startSection('content'); ?>
    <h1>Editar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form method="POST" action="/salesUpdate">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
                <h5 class='mt-5'>Informações da venda</h5>
                <div class="form-group">
                    <label for="product">Produto</label>
                    <input value="<?php echo e($updateSale ->product); ?>" type="text" class="form-control" id="product" name="product">
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input value="<?php echo e($updateSale ->date_of_sale); ?>" type="text" class="form-control single_date_picker" id="date_of_sale" name="date_of_sale">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantidade</label>
                    <input value="<?php echo e($updateSale ->quantity_of_product); ?>" type="text" class="form-control" id="quantity_of_product" name="quantity_of_product" maxlength='2' min="0" max="10" placeholder="1 a 10">
                </div>
                <div class="form-group">
                    <label for="discount">Desconto</label>
                    <input value="<?php echo e($updateSale ->discount); ?>" type="text" class="form-control" id="discount"  name="discount" min="0" max="100" maxlength='3' placeholder="100,00 ou menor">
                </div>
                <div class="form-group">
                    <label for="value">Valor total</label>
                    <input value="<?php echo e($updateSale ->value); ?>" type="text" class="form-control" id="value"  name="value" min="0" max="100" maxlength='3' placeholder="100,00 ou menor">
                </div>
                <div class="form-group">
                    <label for="status">Status</label><br>                
                    <input type="radio" id="Aprovado" name="status_of_sale" value="Aprovado"> Aprovado&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="Cancelado" name="status_of_sale" value="Cancelado"> Cancelado&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="Devolvido" name="status_of_sale" value="Devolvido"> Devolvido
                </div>
                <input value='<?php echo e($updateSale ->id); ?>' id="id" name="id" readonly= "true" readonly style='visibility:hidden;'>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('<?php echo e($updateSale ->status_of_sale); ?>').checked = true;
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\perfect-test-backend-master\resources\views//crud_sales_edit.blade.php ENDPATH**/ ?>