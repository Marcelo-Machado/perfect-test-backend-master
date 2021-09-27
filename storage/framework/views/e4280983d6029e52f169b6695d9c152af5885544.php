<?php $__env->startSection('content'); ?>
    <h1>Adicionar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form method="POST" action="/salesSave">
            <?php echo csrf_field(); ?>
                <h5>Informações do cliente</h5>
                <div class="form-group">
                    <label for="name">Nome do cliente</label>
                    <input type="text" class="form-control " id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" maxlength= '11' placeholder="99999999999">
                </div>
                <h5 class='mt-5'>Informações da venda</h5>
                <div class="form-group">
                    <label for="product">Produto</label>
                    <select id="idproduct" name="idproduct" class="form-control">
                        <option disabled selected>Escolha...</option>
                    <?php $__currentLoopData = $eventsProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventsProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                        <option value="<?php echo e($eventsProduct ->id); ?>"><?php echo e($eventsProduct ->name); ?></option>                      
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input type="text" class="form-control single_date_picker" id="date" name="date">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantidade</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" maxlength='2' min="0" max="10" placeholder="1 a 10">
                </div>
                <div class="form-group">
                    <label for="discount">Desconto</label>
                    <input type="text" class="form-control" id="discount"  name="discount" min="0" max="100" maxlength='3' placeholder="100,00 ou menor">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status"  name="status"class="form-control">
                        <option selected>Escolha...</option>
                        <option>Aprovado</option>
                        <option>Cancelado</option>
                        <option>Devolvido</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\perfect-test-backend-master\resources\views/crud_sales.blade.php ENDPATH**/ ?>