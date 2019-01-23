<div class="content-sub mrgn-btm-20 pdng-0">
    <div class="content-sub-heading">
        <div class="col-sm-12">
            <b>Medical Records</b>
        </div>
        <div class="clearfix"></div>
    </div>


    <div class="content-area-sub brdr-top content-medical-record">
        <div class="col-sm-12">
            <h5 class="txt-blue">Allergies</h5>
            <ul>
                <?php $__empty_1 = true; $__currentLoopData = $medicalHistoryDetails['patient_allergies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $medicalHistory): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>             
                <li>
                    <h5><?php echo e(++$key); ?> . <?php echo $medicalHistory['type']; ?></h5> 
                    <p><?php echo $medicalHistory['description']; ?></p>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                <li>No Record</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    
    <div class="content-area-sub brdr-top content-medical-record">
        <div class="col-sm-12">
            <h5 class="txt-blue">Medications</h5>
            <ul>
                <?php $__empty_1 = true; $__currentLoopData = $medicalHistoryDetails['medications']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $medication): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>             
                <li>
                    <h5><?php echo e(++$key); ?> . <?php echo $medication['type']; ?></h5> 
                    <p><?php echo $medication['description']; ?></p>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                <li>No Record</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="content-area-sub brdr-top content-medical-record">
        <div class="col-sm-12">
            <h5 class="txt-blue">Past Medical History</h5>
            <ul>
                <?php $__empty_1 = true; $__currentLoopData = $medicalHistoryDetails['past_medical_history']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $medicalHistory): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>             
                <li>
                    <h5><?php echo e(++$key); ?> . <?php echo $medicalHistory['type']; ?></h5>
                    <p><?php echo $medicalHistory['description']; ?></p>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                <li>No Record</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="content-area-sub brdr-top content-medical-record">
        <div class="col-sm-12">
            <h5 class="txt-blue">Past Surgical History</h5>
            <ul>
                <?php $__empty_1 = true; $__currentLoopData = $medicalHistoryDetails['surgical_history']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $medicalHistory): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>             
                <li>
                    <span><b><?php echo e(++$key); ?> . <?php echo $medicalHistory['surgery']; ?></b></span> done on <?php echo Carbon\Carbon::parse($medicalHistory['surgery_date'])->format('m-d-Y'); ?>

                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                <li>No Record</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="content-area-sub brdr-top content-medical-record">
        <div class="col-sm-12">
            <h5 class="txt-blue">Family History</h5>
            <ul>
                <?php $__empty_1 = true; $__currentLoopData = $medicalHistoryDetails['family_history']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $medicalHistory): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>             
                <li>
                    <h5><?php echo e(++$key); ?> . <?php echo $medicalHistory['relation']; ?></h5>
                    <p><?php echo $medicalHistory['illness']; ?></p>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                <li>No Record</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>    

    <div class="content-area-sub brdr-top content-medical-record">
        <div class="col-sm-12">
            <h5 class="txt-blue">Social History</h5>
            <ul>
                <?php $__empty_1 = true; $__currentLoopData = $medicalHistoryDetails['social_history']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicalHistory): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>           
                <li>Smoking - <?php if($medicalHistory['smoke']): ?> <?php echo e("Yes"); ?> <?php else: ?> <?php echo e("No"); ?> <?php endif; ?></li>
                <li>Drinking - <?php if($medicalHistory['drink']): ?> <?php echo e("Yes"); ?> <?php else: ?> <?php echo e("No"); ?> <?php endif; ?></li>
                <li>Drug - <?php if($medicalHistory['drug']): ?> <?php echo e("Yes"); ?> <?php else: ?> <?php echo e("No"); ?> <?php endif; ?></li>
                <li><h5 class="txt-blue">Other Comments</h5><p><?php echo $medicalHistory['comments']; ?></li></p></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                <li>No Record</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <?php if($clinicalReport): ?>
    <div class="content-area-sub brdr-top content-medical-record">
            <div class="col-sm-12">
                <h5 class="txt-blue">Clinical Question information</h5>
                <ul>
                    <?php $__empty_1 = true; $__currentLoopData = $clinicalReport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clinicalQs=>$clinicalAns): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>          
                    <li>
                        <h5><?php echo $loop->iteration; ?> . <?php echo $clinicalQs; ?></h5>
                        <p><?php echo $clinicalAns; ?></p>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                    <li>No Record</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

</div>