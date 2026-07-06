<?php $__env->startSection('title', 'Add Project'); ?>
<?php $__env->startSection('page-title', 'Add Project'); ?>
<?php $__env->startSection('page-subtitle', 'Showcase a new project in your portfolio'); ?>

<?php $__env->startSection('content'); ?>
<div class="card" style="max-width:760px">
  <div class="card-header">
    <div class="font-semibold text-white flex-1">New Project</div>
    <a href="<?php echo e(route('admin.projects.index')); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
  </div>
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('admin.projects.store')); ?>" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="grid sm:grid-cols-2 gap-5">
        <div class="sm:col-span-2">
          <label class="form-label">Project Name *</label>
          <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="e.g. E-Commerce Platform" class="form-input" required>
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
          <input type="text" name="category" value="<?php echo e(old('category','Web')); ?>" class="form-input" list="cats" required>
          <datalist id="cats"><option value="Web"><option value="Mobile"><option value="Dashboard"><option value="API"><option value="Design"><option value="Other"></datalist>
        </div>
        <div>
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" value="<?php echo e(old('sort_order', 0)); ?>" class="form-input">
        </div>

        <!-- Image Upload -->
        <div class="sm:col-span-2">
          <label class="form-label">Project Image</label>
          <div id="imageDropzone" onclick="document.getElementById('imageInput').click()" style="border:2px dashed rgba(99,102,241,0.3);border-radius:12px;padding:2rem;text-align:center;cursor:pointer;transition:all 0.2s;background:rgba(99,102,241,0.02)">
            <img id="imagePreview" src="" style="max-height:200px;border-radius:8px;margin:0 auto 1rem;display:none;object-fit:cover">
            <div id="uploadPrompt">
              <i class="fas fa-cloud-upload-alt" style="font-size:2rem;color:rgba(99,102,241,0.4);margin-bottom:8px"></i>
              <div class="text-sm text-gray-400">Click to upload project image</div>
              <div class="text-xs text-gray-600 mt-1">PNG, JPG up to 4MB</div>
            </div>
          </div>
          <input type="file" name="image" accept="image/*" id="imageInput" class="hidden" onchange="previewImage(this)">
          <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-400 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
          <label class="form-label">Live URL</label>
          <input type="url" name="url" value="<?php echo e(old('url')); ?>" placeholder="https://example.com" class="form-input">
          <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-400 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
          <label class="form-label">GitHub URL</label>
          <input type="url" name="github_url" value="<?php echo e(old('github_url')); ?>" placeholder="https://github.com/user/repo" class="form-input">
          <?php $__errorArgs = ['github_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-400 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="sm:col-span-2">
          <label class="form-label">Technologies Used</label>
          <input type="text" name="technologies" value="<?php echo e(old('technologies')); ?>" placeholder="Laravel, Vue.js, MySQL, Tailwind CSS" class="form-input">
          <p class="text-xs text-gray-600 mt-1">Comma-separated list of technologies</p>
        </div>
        <div class="sm:col-span-2">
          <label class="form-label">Description *</label>
          <textarea name="description" rows="4" placeholder="Describe what this project does, your role, and key features..." class="form-input resize-none" required><?php echo e(old('description')); ?></textarea>
          <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-400 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="sm:col-span-2">
          <label class="flex items-center gap-3 cursor-pointer">
            <input type="hidden" name="is_featured" value="0">
            <input type="checkbox" name="is_featured" value="1" <?php echo e(old('is_featured') ? 'checked' : ''); ?> style="accent-color:#6366f1;width:16px;height:16px">
            <span class="text-sm text-gray-300">⭐ Featured Project (highlighted on portfolio)</span>
          </label>
        </div>
      </div>
      <div class="flex gap-3 mt-6">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Project</button>
        <a href="<?php echo e(route('admin.projects.index')); ?>" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
<script>
function previewImage(input) {
  if (input.files && input.files[0]) {
    const prev = document.getElementById('imagePreview');
    const prompt = document.getElementById('uploadPrompt');
    prev.src = URL.createObjectURL(input.files[0]);
    prev.style.display = 'block';
    prompt.style.display = 'none';
  }
}
const dz = document.getElementById('imageDropzone');
dz.addEventListener('dragover', e => { e.preventDefault(); dz.style.borderColor = '#6366f1'; });
dz.addEventListener('dragleave', () => { dz.style.borderColor = 'rgba(99,102,241,0.3)'; });
dz.addEventListener('drop', e => {
  e.preventDefault();
  const fi = document.getElementById('imageInput');
  fi.files = e.dataTransfer.files;
  previewImage(fi);
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Downloads\portfolio-laravel (1)\laravel\resources\views/admin/projects/create.blade.php ENDPATH**/ ?>