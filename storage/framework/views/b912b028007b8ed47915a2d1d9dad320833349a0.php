<?php $__empty_1 = true; $__currentLoopData = $summaryByCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $summaryByCat=>$summaryOutput): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
    <div class="content-area-sub brdr-top">
        <div class="col-sm-12 paragraph">
          <b class="display-block mrgn-btm-10"><?php echo $summaryByCat; ?></b>             
            <p><?php echo $summaryOutput; ?></p>              
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
    <div class="content-area-sub brdr-top"><p>No Summary</p></div>
<?php endif; ?>