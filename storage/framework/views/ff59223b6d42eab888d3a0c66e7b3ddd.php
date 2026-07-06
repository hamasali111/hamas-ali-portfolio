<?php $__env->startSection('title', 'Edit Testimonial'); ?>
<?php $__env->startSection('page-title', 'Edit Testimonial'); ?>

<?php $__env->startSection('content'); ?>
<div class="card" style="max-width:720px">
  <div class="card-header">
    <div class="font-semibold text-white flex-1">Edit: <?php echo e($testimonial->name); ?></div>
    <a href="<?php echo e(route('admin.testimonials.index')); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
  </div>
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('admin.testimonials.update', $testimonial)); ?>" enctype="multipart/form-data">
      <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
      <div class="grid sm:grid-cols-2 gap-5">
        <div>
          <label class="form-label">Client Name *</label>
          <input type="text" name="name" value="<?php echo e(old('name', $testimonial->name)); ?>" class="form-input" required>
        </div>
        <div>
          <label class="form-label">Role *</label>
          <input type="text" name="role" value="<?php echo e(old('role', $testimonial->role)); ?>" class="form-input" required>
        </div>
        <div>
          <label class="form-label">Company</label>
          <input type="text" name="company" value="<?php echo e(old('company', $testimonial->company)); ?>" class="form-input">
        </div>
        <div>
          <label class="form-label">Rating *</label>
          <select name="rating" class="form-input" required>
            <?php for($i=5;$i>=1;$i--): ?>
            <option value="<?php echo e($i); ?>" <?php echo e(old('rating', $testimonial->rating) == $i ? 'selected' : ''); ?>><?php echo e(str_repeat('★', $i)); ?> (<?php echo e($i); ?>)</option>
            <?php endfor; ?>
          </select>
        </div>
        <div>
          <label class="form-label">Avatar Photo</label>
          <input type="file" name="avatar" accept="image/*" class="form-input" onchange="previewImg(this,'avatarPrev')">
          <img id="avatarPrev" src="<?php echo e($testimonial->avatar_url); ?>" class="mt-2 w-16 h-16 rounded-full object-cover">
        </div>
        <div>
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" value="<?php echo e(old('sort_order', $testimonial->sort_order)); ?>" class="form-input">
        </div>
        <div class="sm:col-span-2">
          <label class="form-label">Testimonial Content *</label>
          <textarea name="content" rows="4" class="form-input resize-none" required><?php echo e(old('content', $testimonial->content)); ?></textarea>
        </div>
        <div class="sm:col-span-2">
          <label class="flex items-center gap-3 cursor-pointer">
            <input type="hidden" name="is_featured" value="0">
            <input type="checkbox" name="is_featured" value="1" <?php echo e(old('is_featured', $testimonial->is_featured) ? 'checked' : ''); ?> style="accent-color:#6366f1;width:16px;height:16px">
            <span class="text-sm text-gray-300">Show on portfolio</span>
          </label>
        </div>
      </div>
      <div class="flex gap-3 mt-6">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Testimonial</button>
        <a href="<?php echo e(route('admin.testimonials.index')); ?>" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
<script>
function previewImg(input, previewId) {
  const prev = document.getElementById(previewId);
  if (input.files && input.files[0]) {
    prev.src = URL.createObjectURL(input.files[0]);
  }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Downloads\portfolio-laravel (1)\laravel\resources\views/admin/testimonials/edit.blade.php ENDPATH**/ ?>