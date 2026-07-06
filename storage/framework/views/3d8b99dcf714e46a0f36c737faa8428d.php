<?php $__env->startSection('title', 'Projects'); ?>
<?php $__env->startSection('page-title', 'Projects'); ?>
<?php $__env->startSection('page-subtitle', 'Manage your portfolio projects with images'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header" style="justify-content:space-between">
    <div class="font-semibold text-white">All Projects (<?php echo e($projects->count()); ?>)</div>
    <a href="<?php echo e(route('admin.projects.create')); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Project</a>
  </div>
  <?php if($projects->count()): ?>
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4" style="padding:1.5rem">
    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div style="background:#080d1e;border:1px solid rgba(255,255,255,0.06);border-radius:14px;overflow:hidden">
      <div style="position:relative;height:160px;overflow:hidden">
        <img src="<?php echo e($project->image_url); ?>" alt="<?php echo e($project->name); ?>" style="width:100%;height:100%;object-fit:cover">
        <div style="position:absolute;top:8px;right:8px;display:flex;gap:6px">
          <span style="background:rgba(99,102,241,0.9);color:#fff;padding:3px 10px;border-radius:50px;font-size:0.7rem;font-weight:700"><?php echo e($project->category); ?></span>
          <?php if($project->is_featured): ?>
          <span style="background:rgba(244,114,182,0.9);color:#fff;padding:3px 8px;border-radius:50px;font-size:0.7rem;font-weight:700">⭐</span>
          <?php endif; ?>
        </div>
      </div>
      <div style="padding:1rem">
        <div class="font-semibold text-gray-200 mb-1"><?php echo e($project->name); ?></div>
        <div class="text-xs text-gray-500 mb-3" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden"><?php echo e($project->description); ?></div>
        <?php if($project->technologies): ?>
        <div style="font-size:0.7rem;color:#6366f1;margin-bottom:10px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap"><?php echo e($project->technologies); ?></div>
        <?php endif; ?>
        <div class="flex gap-2">
          <a href="<?php echo e(route('admin.projects.edit', $project)); ?>" class="btn btn-sm btn-secondary flex-1 justify-center"><i class="fas fa-edit"></i> Edit</a>
          <form method="POST" action="<?php echo e(route('admin.projects.destroy', $project)); ?>" onsubmit="return confirm('Delete this project?')">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
          </form>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <?php else: ?>
  <div class="text-center py-12 text-gray-600" style="padding:3rem">
    <i class="fas fa-folder-open text-4xl mb-3"></i>
    <p>No projects yet. <a href="<?php echo e(route('admin.projects.create')); ?>" class="text-indigo-400">Add your first project →</a></p>
  </div>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Downloads\portfolio-laravel (1)\laravel\resources\views/admin/projects/index.blade.php ENDPATH**/ ?>