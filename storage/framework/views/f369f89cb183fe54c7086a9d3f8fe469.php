<?php $__env->startSection('title', 'Edit Experience'); ?>
<?php $__env->startSection('page-title', 'Edit Experience'); ?>
<?php $__env->startSection('page-subtitle', 'Update experience details'); ?>

<?php $__env->startSection('content'); ?>
<div class="card" style="max-width:720px">
  <div class="card-header">
    <div class="font-semibold text-white flex-1">Edit: <?php echo e($experience->title); ?></div>
    <a href="<?php echo e(route('admin.experiences.index')); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
  </div>
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('admin.experiences.update', $experience)); ?>">
      <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
      <div class="grid sm:grid-cols-2 gap-5">
        <div>
          <label class="form-label">Job Title / Degree *</label>
          <input type="text" name="title" value="<?php echo e(old('title', $experience->title)); ?>" class="form-input" required>
          <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-400 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
          <label class="form-label">Company / Institution *</label>
          <input type="text" name="company" value="<?php echo e(old('company', $experience->company)); ?>" class="form-input" required>
        </div>
        <div>
          <label class="form-label">Location</label>
          <input type="text" name="location" value="<?php echo e(old('location', $experience->location)); ?>" class="form-input">
        </div>
        <div>
          <label class="form-label">Type *</label>
          <select name="type" class="form-input" required>
            <option value="work" <?php echo e(old('type', $experience->type) === 'work' ? 'selected' : ''); ?>>💼 Work</option>
            <option value="education" <?php echo e(old('type', $experience->type) === 'education' ? 'selected' : ''); ?>>🎓 Education</option>
          </select>
        </div>
        <div>
          <label class="form-label">Start Date *</label>
          <input type="date" name="start_date" value="<?php echo e(old('start_date', $experience->start_date?->format('Y-m-d'))); ?>" class="form-input" required>
        </div>
        <div id="endDateWrap" style="opacity:<?php echo e($experience->is_current ? '0.4' : '1'); ?>">
          <label class="form-label">End Date</label>
          <input type="date" name="end_date" value="<?php echo e(old('end_date', $experience->end_date?->format('Y-m-d'))); ?>" class="form-input" id="endDate" <?php echo e($experience->is_current ? 'disabled' : ''); ?>>
        </div>
        <div>
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" value="<?php echo e(old('sort_order', $experience->sort_order)); ?>" class="form-input">
        </div>
        <div class="flex items-center">
          <label class="flex items-center gap-3 cursor-pointer mt-4">
            <input type="hidden" name="is_current" value="0">
            <input type="checkbox" name="is_current" value="1" <?php echo e(old('is_current', $experience->is_current) ? 'checked' : ''); ?> id="isCurrent" style="accent-color:#6366f1;width:16px;height:16px" onchange="toggleEndDate(this)">
            <span class="text-sm text-gray-300">Currently working here</span>
          </label>
        </div>
        <div class="sm:col-span-2">
          <label class="form-label">Description *</label>
          <textarea name="description" rows="4" class="form-input resize-none" required><?php echo e(old('description', $experience->description)); ?></textarea>
          <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-400 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
      </div>
      <div class="flex gap-3 mt-6">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Experience</button>
        <a href="<?php echo e(route('admin.experiences.index')); ?>" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
<script>
function toggleEndDate(cb) {
  document.getElementById('endDate').disabled = cb.checked;
  document.getElementById('endDateWrap').style.opacity = cb.checked ? '0.4' : '1';
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Downloads\portfolio-laravel (1)\laravel\resources\views/admin/experiences/edit.blade.php ENDPATH**/ ?>