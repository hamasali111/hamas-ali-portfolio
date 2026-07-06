<?php $__env->startSection('title', 'Experience'); ?>
<?php $__env->startSection('page-title', 'Experience'); ?>
<?php $__env->startSection('page-subtitle', 'Manage your work history and education'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header" style="justify-content:space-between">
    <div class="font-semibold text-white">All Experiences (<?php echo e($experiences->count()); ?>)</div>
    <a href="<?php echo e(route('admin.experiences.create')); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Experience</a>
  </div>
  <div class="table-wrap">
    <?php if($experiences->count()): ?>
    <table>
      <thead>
        <tr>
          <th>Position / Degree</th>
          <th>Company / School</th>
          <th>Type</th>
          <th>Period</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td class="font-medium text-gray-200"><?php echo e($exp->title); ?></td>
          <td class="text-gray-400"><?php echo e($exp->company); ?></td>
          <td>
            <?php if($exp->type === 'work'): ?>
            <span class="badge badge-primary">💼 Work</span>
            <?php else: ?>
            <span class="badge badge-warning">🎓 Education</span>
            <?php endif; ?>
          </td>
          <td class="text-gray-400 text-sm"><?php echo e($exp->date_range); ?></td>
          <td>
            <?php if($exp->is_current): ?>
            <span class="badge badge-success">Current</span>
            <?php else: ?>
            <span class="badge badge-muted">Past</span>
            <?php endif; ?>
          </td>
          <td>
            <div class="flex gap-2">
              <a href="<?php echo e(route('admin.experiences.edit', $exp)); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
              <form method="POST" action="<?php echo e(route('admin.experiences.destroy', $exp)); ?>" onsubmit="return confirm('Delete this experience?')">
                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
              </form>
            </div>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    <?php else: ?>
    <div class="text-center py-12 text-gray-600">
      <i class="fas fa-briefcase text-4xl mb-3"></i>
      <p>No experience added yet. <a href="<?php echo e(route('admin.experiences.create')); ?>" class="text-indigo-400">Add one →</a></p>
    </div>
    <?php endif; ?>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Downloads\portfolio-laravel (1)\laravel\resources\views/admin/experiences/index.blade.php ENDPATH**/ ?>