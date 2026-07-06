<?php $__env->startSection('title', 'Testimonials'); ?>
<?php $__env->startSection('page-title', 'Testimonials'); ?>
<?php $__env->startSection('page-subtitle', 'Manage client reviews and feedback'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header" style="justify-content:space-between">
    <div class="font-semibold text-white">All Testimonials (<?php echo e($testimonials->count()); ?>)</div>
    <a href="<?php echo e(route('admin.testimonials.create')); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Testimonial</a>
  </div>
  <div class="table-wrap">
    <?php if($testimonials->count()): ?>
    <table>
      <thead>
        <tr>
          <th>Client</th>
          <th>Review</th>
          <th>Rating</th>
          <th>Featured</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td>
            <div class="flex items-center gap-3">
              <img src="<?php echo e($t->avatar_url); ?>" class="w-9 h-9 rounded-full object-cover" alt="">
              <div>
                <div class="font-medium text-gray-200"><?php echo e($t->name); ?></div>
                <div class="text-xs text-gray-500"><?php echo e($t->role); ?><?php echo e($t->company ? ' @ '.$t->company : ''); ?></div>
              </div>
            </div>
          </td>
          <td>
            <div class="text-sm text-gray-400" style="max-width:300px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap"><?php echo e($t->content); ?></div>
          </td>
          <td>
            <div style="color:#fbbf24;font-size:0.8rem">
              <?php for($i=0;$i<$t->rating;$i++): ?><i class="fas fa-star"></i><?php endfor; ?>
            </div>
          </td>
          <td>
            <?php if($t->is_featured): ?>
            <span class="badge badge-success">Shown</span>
            <?php else: ?>
            <span class="badge badge-muted">Hidden</span>
            <?php endif; ?>
          </td>
          <td>
            <div class="flex gap-2">
              <a href="<?php echo e(route('admin.testimonials.edit', $t)); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
              <form method="POST" action="<?php echo e(route('admin.testimonials.destroy', $t)); ?>" onsubmit="return confirm('Delete this testimonial?')">
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
      <i class="fas fa-star text-4xl mb-3"></i>
      <p>No testimonials yet. <a href="<?php echo e(route('admin.testimonials.create')); ?>" class="text-indigo-400">Add one →</a></p>
    </div>
    <?php endif; ?>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Downloads\portfolio-laravel (1)\laravel\resources\views/admin/testimonials/index.blade.php ENDPATH**/ ?>