<?php $__env->startSection('title', 'Messages'); ?>
<?php $__env->startSection('page-title', 'Messages'); ?>
<?php $__env->startSection('page-subtitle', 'Contact form submissions from your portfolio'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header" style="justify-content:space-between;flex-wrap:wrap;gap:8px">
    <div class="font-semibold text-white">All Messages (<?php echo e($messages->count()); ?>)</div>
    <?php $repliedCount = $messages->where('is_replied', true)->count() ?>
    <?php if($repliedCount > 0): ?>
    <span style="font-size:0.75rem;color:#86efac;background:rgba(34,197,94,0.08);border:1px solid rgba(34,197,94,0.2);padding:3px 10px;border-radius:50px">
      <i class="fas fa-check-circle mr-1"></i><?php echo e($repliedCount); ?> replied
    </span>
    <?php endif; ?>
  </div>
  <?php if($messages->count()): ?>
  <div>
    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div style="padding:1.25rem 1.5rem;border-bottom:1px solid rgba(255,255,255,0.04)<?php echo e($msg->is_replied ? ';border-left:3px solid rgba(34,197,94,0.35)' : ''); ?>">
      <div style="display:flex;align-items:flex-start;gap:1rem">
        <!-- Avatar -->
        <div style="width:42px;height:42px;border-radius:12px;background:rgba(99,102,241,0.1);border:1px solid rgba(99,102,241,0.15);display:flex;align-items:center;justify-content:center;color:#a5b4fc;font-size:1rem;font-weight:700;flex-shrink:0">
          <?php echo e(strtoupper(substr($msg->name, 0, 1))); ?>

        </div>
        <div style="flex:1;min-width:0">
          <!-- Header row -->
          <div style="display:flex;flex-wrap:wrap;align-items:center;gap:8px;margin-bottom:6px">
            <span class="font-semibold text-gray-200"><?php echo e($msg->name); ?></span>
            <a href="mailto:<?php echo e($msg->email); ?>" class="text-indigo-400 text-sm hover:text-indigo-300" style="word-break:break-all"><?php echo e($msg->email); ?></a>
            <?php if($msg->subject): ?>
            <span class="text-gray-500 text-sm">— <?php echo e($msg->subject); ?></span>
            <?php endif; ?>
            <!-- Badges -->
            <div style="display:flex;gap:6px;margin-left:auto;align-items:center;flex-wrap:wrap">
              <?php if($msg->is_replied): ?>
              <span style="display:inline-flex;align-items:center;gap:4px;background:rgba(34,197,94,0.1);border:1px solid rgba(34,197,94,0.3);color:#86efac;padding:2px 9px;border-radius:50px;font-size:0.72rem;font-weight:700;white-space:nowrap">
                <i class="fas fa-check-circle"></i> Replied
              </span>
              <?php endif; ?>
              <span class="text-gray-600 text-xs" style="white-space:nowrap"><?php echo e($msg->created_at->diffForHumans()); ?></span>
            </div>
          </div>
          <!-- Message body -->
          <p class="text-sm text-gray-400 leading-relaxed"><?php echo e($msg->message); ?></p>
          <!-- Actions -->
          <div style="display:flex;flex-wrap:wrap;gap:8px;margin-top:12px;align-items:center">
            <button
              class="btn btn-sm <?php echo e($msg->is_replied ? 'btn-secondary' : 'btn-primary'); ?>"
              onclick="openReply(<?php echo e($msg->id); ?>,'<?php echo e(addslashes($msg->name)); ?>','<?php echo e(addslashes($msg->email)); ?>','<?php echo e(addslashes($msg->subject ?? '')); ?>')"
            >
              <i class="fas fa-reply"></i> <?php echo e($msg->is_replied ? 'Reply Again' : 'Reply via Email'); ?>

            </button>
            <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/','',$msg->email)); ?>" target="_blank"
              class="btn btn-sm"
              style="background:rgba(37,211,102,0.08);border:1px solid rgba(37,211,102,0.2);color:#4ade80"
              title="Open WhatsApp">
              <i class="fab fa-whatsapp"></i> WhatsApp
            </a>
            <form method="POST" action="<?php echo e(route('admin.messages.destroy', $msg)); ?>" onsubmit="return confirm('Delete this message?')" style="margin-left:auto">
              <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
              <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <?php else: ?>
  <div class="text-center py-16 text-gray-600">
    <i class="fas fa-inbox text-5xl mb-4"></i>
    <p class="text-lg font-medium text-gray-500">No messages yet</p>
    <p class="text-sm mt-1">When visitors contact you, their messages will appear here.</p>
  </div>
  <?php endif; ?>
</div>

<!-- ===== Reply Modal ===== -->
<div id="replyModal"
  style="display:none;position:fixed;inset:0;z-index:2000;background:rgba(0,0,0,0.65);backdrop-filter:blur(4px);padding:1rem;overflow-y:auto"
  onclick="if(event.target===this)closeReply()">
  <div style="max-width:580px;margin:50px auto;background:#0d1428;border:1px solid rgba(255,255,255,0.1);border-radius:20px;overflow:hidden;box-shadow:0 40px 80px rgba(0,0,0,0.6)">
    <!-- Modal Header -->
    <div style="padding:1.25rem 1.5rem;border-bottom:1px solid rgba(255,255,255,0.06);display:flex;align-items:center;justify-content:space-between">
      <div>
        <div class="font-semibold text-white" style="font-size:1rem"><i class="fas fa-paper-plane mr-2" style="color:#a5b4fc"></i>Reply to Message</div>
        <div id="replyToLabel" style="font-size:0.78rem;color:#475569;margin-top:3px"></div>
      </div>
      <button onclick="closeReply()" style="background:none;border:none;color:#475569;font-size:1.5rem;cursor:pointer;line-height:1;padding:4px">&times;</button>
    </div>
    <!-- Modal Form -->
    <form id="replyForm" method="POST" style="padding:1.5rem">
      <?php echo csrf_field(); ?>
      <div style="margin-bottom:1rem">
        <label class="form-label">Subject</label>
        <input type="text" name="subject" id="replySubject" class="form-input" required placeholder="Re: Your inquiry">
      </div>
      <div style="margin-bottom:1.25rem">
        <label class="form-label">Message <span style="color:#475569;font-weight:400">(editable before sending)</span></label>
        <textarea name="body" id="replyBody" rows="9" class="form-input" required style="resize:vertical;line-height:1.75;font-size:0.9rem"></textarea>
        <p style="font-size:0.72rem;color:#475569;margin-top:6px"><i class="fas fa-info-circle mr-1"></i>This message will be sent to the visitor's email. Customise the default template in <a href="<?php echo e(route('admin.settings.index')); ?>" style="color:#a5b4fc">Settings → Auto-Reply Template</a>.</p>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end">
        <button type="button" onclick="closeReply()" class="btn btn-secondary">Cancel</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Reply</button>
      </div>
    </form>
  </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
const _replyTemplate = <?php echo json_encode($replyTemplate, 15, 512) ?>;
const _fromName      = <?php echo json_encode($fromName, 15, 512) ?>;

function openReply(id, name, email, subject) {
  document.getElementById('replyModal').style.display = 'block';
  document.body.style.overflow = 'hidden';
  document.getElementById('replyToLabel').textContent = 'To: ' + name + '  <' + email + '>';
  document.getElementById('replySubject').value = subject ? 'Re: ' + subject : 'Re: Your message';
  document.getElementById('replyBody').value = _replyTemplate + '\n\n' + _fromName;
  document.getElementById('replyForm').action = '/admin/messages/' + id + '/reply';
}
function closeReply() {
  document.getElementById('replyModal').style.display = 'none';
  document.body.style.overflow = '';
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeReply(); });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Downloads\portfolio-laravel (1)\laravel\resources\views/admin/messages/index.blade.php ENDPATH**/ ?>