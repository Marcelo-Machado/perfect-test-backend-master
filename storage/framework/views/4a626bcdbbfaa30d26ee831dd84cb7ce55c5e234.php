<?php $__env->startSection('content'); ?>
    <h1>Dashboard de vendas</h1>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Tabela de vendas            
            <a href='/sales' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Nova venda</a>
            <a href='/clientRegistration' class='btn btn-secondary float-right btn-sm rounded-pill' style='margin-right:10px;'><i class='fa fa-plus'></i>  Novo Cliente</a></h5>

            <form method="POST" action="/client">
            <?php echo csrf_field(); ?>
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Clientes</div>
                            </div>
                            <select class="form-control" id="inlineFormInputName" name='idClient'>
                                <option>Clientes</option>
                                <?php if(isset($eventsClient)): ?>
                                    <?php $__currentLoopData = $eventsClient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventsClient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value='<?php echo e($eventsClient ->id); ?>'><?php echo e($eventsClient ->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <?php if(isset($checkSale)): ?>                                
                                    <option value="<?php echo e($checkClient[0] ->id); ?>" selected><?php echo e($checkClient[0] ->name); ?></option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 my-1">
                        <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Período</div>
                            </div>
                            <?php if(isset($dateSearch)): ?>                                
                                <input value='<?php echo e($dateSearch); ?>' type="text" class="form-control date_range" id="date_of_sale" name="date_of_sale" placeholder="Username">
                            <?php else: ?>
                                <input type="text" class="form-control date_range" id="date_of_sale" name="date_of_sale" placeholder="Username">
                            <?php endif; ?>
                            </div>
                    </div>
                    <div class="col-sm-1 my-1">
                        <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
                            <i class='fa fa-search'></i></button>
                    </div>
                </div>
            </form>

            <table class='table'>
                <tr>
                    <th scope="col">
                        Produto
                    </th>
                    <th scope="col">
                        Data
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>
                <?php if(isset($checkSale)): ?>
                <?php $__currentLoopData = $checkSale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checkSale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>                        
                        <?php echo e($checkSale ->product); ?>                        
                    </td>
                    <td>
                        <?php echo e($checkSale ->date_of_sale); ?>  
                    </td>
                    <td>
                        R$ <?php echo e($checkSale ->value); ?>  
                    </td>
                    <td>
                        <a href='/salesEdit/<?php echo e($checkSale ->id); ?>' class='btn btn-primary'>Editar</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Resultado de vendas</h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Status
                    </th>
                    <th scope="col">
                        Quantidade
                    </th>
                    <th scope="col">
                        Valor Total
                    </th>
                </tr>
                <tr>
                    <td>
                        Vendidos
                    </td>
                    <td>
                        <?php if(isset($quantityApproved)): ?>
                            <?php echo e($quantityApproved); ?>  
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(isset($valueTotalApproved)): ?>
                            R$ <?php echo e($valueTotalApproved); ?>  
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Cancelados
                    </td>
                    <td>
                        <?php if(isset($quantityCanceled)): ?>
                            <?php echo e($quantityCanceled); ?>  
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(isset($valueTotalCanceled)): ?>
                            R$ <?php echo e($valueTotalCanceled); ?>  
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Devoluções
                    </td>
                    <td>
                    <?php if(isset($quantityReturned)): ?>
                        <?php echo e($quantityReturned); ?>  
                    <?php endif; ?>
                    </td>
                    <td>
                        <?php if(isset($valueTotalReturned)): ?>
                            R$ <?php echo e($valueTotalReturned); ?>  
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos
                <a href='/products' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Novo produto</a></h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Nome
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>
                <?php if(isset($eventsProduct)): ?>
                <?php $__currentLoopData = $eventsProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventsProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>                        
                        <?php echo e($eventsProduct ->name); ?>                        
                    </td>
                    <td>
                        R$ <?php echo e($eventsProduct ->price); ?>  
                    </td>
                    <td>
                        <a href='/productsEdit/<?php echo e($eventsProduct ->id); ?>' class='btn btn-primary'>Editar</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\perfect-test-backend-master\resources\views/dashboard.blade.php ENDPATH**/ ?>