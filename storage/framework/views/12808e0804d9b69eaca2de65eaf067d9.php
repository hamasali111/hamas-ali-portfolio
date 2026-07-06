<?php $__env->startSection('title', 'Edit Skill'); ?>
<?php $__env->startSection('page-title', 'Edit Skill'); ?>
<?php $__env->startSection('page-subtitle', 'Update skill information'); ?>

<?php $__env->startSection('content'); ?>
<div class="card" style="max-width:640px">
  <div class="card-header">
    <div class="font-semibold text-white flex-1">Edit: <?php echo e($skill->name); ?></div>
    <a href="<?php echo e(route('admin.skills.index')); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
  </div>
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('admin.skills.update', $skill)); ?>">
      <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
      <div class="grid sm:grid-cols-2 gap-5">
        <div class="sm:col-span-2">
          <label class="form-label">Skill Name *</label>
          <input type="text" name="name" value="<?php echo e(old('name', $skill->name)); ?>" class="form-input" required>
          <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-400 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
          <label class="form-label">Category *</label>
          <input type="text" name="category" value="<?php echo e(old('category', $skill->category)); ?>" class="form-input" list="cats" required>
          <datalist id="cats"><option value="Frontend"><option value="Backend"><option value="Database"><option value="DevOps"><option value="Mobile"><option value="Design"></datalist>
        </div>
        <div>
          <label class="form-label">Level (1–100) *</label>
          <input type="number" name="level" value="<?php echo e(old('level', $skill->level)); ?>" min="1" max="100" class="form-input" required id="levelInput" oninput="document.getElementById('levelPrev').textContent=this.value+'%'">
          <div class="mt-2">
            <div style="height:6px;background:rgba(255,255,255,0.06);border-radius:50px;overflow:hidden">
              <div id="levelBar" style="height:100%;background:linear-gradient(90deg,#6366f1,#06b6d4);border-radius:50px;width:<?php echo e($skill->level); ?>%;transition:width 0.2s"></div>
            </div>
            <span id="levelPrev" class="text-xs text-gray-500 mt-1 inline-block"><?php echo e($skill->level); ?>%</span>
          </div>
        </div>
        <div>
          <label class="form-label">Icon (Font Awesome)</label>
          <input type="text" name="icon" value="<?php echo e(old('icon', $skill->icon)); ?>" placeholder="fab fa-laravel" class="form-input">
        </div>
        <div>
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" value="<?php echo e(old('sort_order', $skill->sort_order)); ?>" class="form-input">
        </div>
        <div class="sm:col-span-2">
          <label class="flex items-center gap-3 cursor-pointer">
            <input type="hidden" name="is_featured" value="0">
            <input type="checkbox" name="is_featured" value="1" <?php echo e(old('is_featured', $skill->is_featured) ? 'checked' : ''); ?> style="accent-color:#6366f1;width:16px;height:16px">
            <span class="text-sm text-gray-300">Show on portfolio (Featured)</span>
          </label>
        </div>
      </div>
      <div class="flex gap-3 mt-6">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Skill</button>
        <a href="<?php echo e(route('admin.skills.index')); ?>" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
<script>
const inp = document.getElementById('levelInput');
const bar = document.getElementById('levelBar');
inp.addEventListener('input', () => bar.style.width = inp.value + '%');
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Downloads\portfolio-laravel (1)\laravel\resources\views/admin/skills/edit.blade.php ENDPATH**/ ?>