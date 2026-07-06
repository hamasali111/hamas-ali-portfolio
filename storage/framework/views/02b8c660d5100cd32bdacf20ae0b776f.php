<?php $__env->startSection('title', 'Skills'); ?>
<?php $__env->startSection('page-title', 'Skills'); ?>
<?php $__env->startSection('page-subtitle', 'Manage your technical and soft skills'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header" style="justify-content:space-between">
    <div class="font-semibold text-white">All Skills (<?php echo e($skills->count()); ?>)</div>
    <a href="<?php echo e(route('admin.skills.create')); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Skill</a>
  </div>
  <div class="table-wrap">
    <?php if($skills->count()): ?>
    <table>
      <thead>
        <tr>
          <th>Skill</th>
          <th>Category</th>
          <th>Level</th>
          <th>Featured</th>
          <th>Order</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td>
            <div class="flex items-center gap-3">
              <div style="width:36px;height:36px;border-radius:8px;background:rgba(99,102,241,0.1);display:flex;align-items:center;justify-content:center;color:#a5b4fc">
                <i class="<?php echo e($skill->icon ?: 'fas fa-code'); ?>"></i>
              </div>
              <span class="font-medium text-gray-200"><?php echo e($skill->name); ?></span>
            </div>
          </td>
          <td><span class="badge badge-primary"><?php echo e($skill->category); ?></span></td>
          <td>
            <div class="flex items-center gap-3">
              <div style="flex:1;height:6px;background:rgba(255,255,255,0.06);border-radius:50px;overflow:hidden;max-width:80px">
                <div style="height:100%;width:<?php echo e($skill->level); ?>%;background:linear-gradient(90deg,#6366f1,#06b6d4);border-radius:50px"></div>
              </div>
              <span class="text-sm text-gray-400"><?php echo e($skill->level); ?>%</span>
            </div>
          </td>
          <td>
            <?php if($skill->is_featured): ?>
            <span class="badge badge-success">Featured</span>
            <?php else: ?>
            <span class="badge badge-muted">Hidden</span>
            <?php endif; ?>
          </td>
          <td class="text-gray-400"><?php echo e($skill->sort_order); ?></td>
          <td>
            <div class="flex gap-2">
              <a href="<?php echo e(route('admin.skills.edit', $skill)); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
              <form method="POST" action="<?php echo e(route('admin.skills.destroy', $skill)); ?>" onsubmit="return confirm('Delete this skill?')">
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
      <i class="fas fa-code text-4xl mb-3"></i>
      <p>No skills yet. <a href="<?php echo e(route('admin.skills.create')); ?>" class="text-indigo-400 hover:text-indigo-300">Add your first skill →</a></p>
    </div>
    <?php endif; ?>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Downloads\portfolio-laravel (1)\laravel\resources\views/admin/skills/index.blade.php ENDPATH**/ ?>