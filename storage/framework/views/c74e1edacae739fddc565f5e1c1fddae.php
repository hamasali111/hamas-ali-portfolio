<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>
<?php $__env->startSection('page-subtitle', 'Welcome back! Here\'s an overview of your portfolio.'); ?>

<?php $__env->startSection('content'); ?>
<!-- Stats Grid -->
<div class="grid grid-cols-2 lg:grid-cols-4 xl:grid-cols-8 gap-4 mb-8">
  <?php
  $statItems = [
    ['label'=>'Skills','value'=>$stats['skills'],'icon'=>'fa-code','color'=>'rgba(99,102,241,0.2)','iconColor'=>'#a5b4fc'],
    ['label'=>'Experiences','value'=>$stats['experiences'],'icon'=>'fa-briefcase','color'=>'rgba(6,182,212,0.2)','iconColor'=>'#67e8f9'],
    ['label'=>'Projects','value'=>$stats['projects'],'icon'=>'fa-folder-open','color'=>'rgba(244,114,182,0.2)','iconColor'=>'#f9a8d4'],
    ['label'=>'Testimonials','value'=>$stats['testimonials'],'icon'=>'fa-star','color'=>'rgba(251,191,36,0.2)','iconColor'=>'#fde68a'],
    ['label'=>'Messages','value'=>$stats['messages'],'icon'=>'fa-envelope','color'=>'rgba(34,197,94,0.2)','iconColor'=>'#86efac'],
    ['label'=>'Unread','value'=>$stats['unread'],'icon'=>'fa-bell','color'=>'rgba(239,68,68,0.2)','iconColor'=>'#fca5a5'],
    ['label'=>'Today','value'=>$todayVisits,'id'=>'liveToday','icon'=>'fa-eye','color'=>'rgba(168,85,247,0.2)','iconColor'=>'#d8b4fe'],
    ['label'=>'All Visits','value'=>number_format($totalVisits),'id'=>'liveTotal','icon'=>'fa-chart-line','color'=>'rgba(20,184,166,0.2)','iconColor'=>'#5eead4'],
  ];
  ?>
  <?php $__currentLoopData = $statItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="stat-mini">
    <div class="stat-mini-icon" style="background:<?php echo e($s['color']); ?>">
      <i class="fas <?php echo e($s['icon']); ?>" style="color:<?php echo e($s['iconColor']); ?>"></i>
    </div>
    <div>
      <div style="font-size:1.4rem;font-weight:800;color:#f1f5f9;line-height:1" <?php echo e(isset($s['id']) ? 'id='.$s['id'] : ''); ?>><?php echo e($s['value']); ?></div>
      <div style="font-size:0.7rem;color:#475569;margin-top:2px"><?php echo e($s['label']); ?></div>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- Visitor Chart -->
<div class="card mb-8">
  <div class="card-header">
    <div class="flex items-center gap-3 flex-1">
      <div style="width:32px;height:32px;border-radius:8px;background:rgba(99,102,241,0.15);display:flex;align-items:center;justify-content:center">
        <i class="fas fa-chart-area" style="color:#a5b4fc;font-size:0.85rem"></i>
      </div>
      <div>
        <div class="font-semibold text-white text-sm">Portfolio Visitors</div>
        <div style="font-size:0.72rem;color:#475569">Daily page hits — last 30 days</div>
      </div>
    </div>
    <div style="text-align:right">
      <span style="color:#a5b4fc;font-weight:800;font-size:1.25rem"><?php echo e(number_format($totalVisits)); ?></span>
      <div style="font-size:0.7rem;color:#475569">total visits</div>
    </div>
  </div>
  <div class="card-body" style="padding-top:8px">
    <div style="position:relative;height:220px">
      <canvas id="visitChart"></canvas>
    </div>
  </div>
</div>

<!-- Quick Actions + Recent Messages -->
<div class="grid md:grid-cols-2 gap-6 mb-8">
  <div class="card">
    <div class="card-header">
      <div class="font-semibold text-white flex-1">Quick Actions</div>
    </div>
    <div class="card-body">
      <div class="grid grid-cols-2 gap-3">
        <a href="<?php echo e(route('admin.skills.create')); ?>" class="btn btn-secondary justify-center"><i class="fas fa-plus"></i> Add Skill</a>
        <a href="<?php echo e(route('admin.experiences.create')); ?>" class="btn btn-secondary justify-center"><i class="fas fa-plus"></i> Add Experience</a>
        <a href="<?php echo e(route('admin.projects.create')); ?>" class="btn btn-secondary justify-center"><i class="fas fa-plus"></i> Add Project</a>
        <a href="<?php echo e(route('admin.testimonials.create')); ?>" class="btn btn-secondary justify-center"><i class="fas fa-plus"></i> Add Testimonial</a>
        <a href="<?php echo e(route('admin.settings.index')); ?>" class="btn btn-secondary justify-center"><i class="fas fa-cog"></i> Settings</a>
        <a href="<?php echo e(route('portfolio')); ?>" target="_blank" class="btn btn-secondary justify-center"><i class="fas fa-eye"></i> View Site</a>
      </div>
    </div>
  </div>

  <!-- Recent Messages -->
  <div class="card">
    <div class="card-header">
      <div class="font-semibold text-white flex-1">Recent Messages</div>
      <a href="<?php echo e(route('admin.messages.index')); ?>" class="btn btn-sm btn-secondary">View All</a>
    </div>
    <?php if($recentMessages->count()): ?>
    <div>
      <?php $__currentLoopData = $recentMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div style="padding:12px 20px;border-bottom:1px solid rgba(255,255,255,0.04);display:flex;align-items:center;gap:12px">
        <div style="width:36px;height:36px;border-radius:10px;background:rgba(99,102,241,0.1);display:flex;align-items:center;justify-content:center;color:#a5b4fc;font-size:0.85rem;flex-shrink:0">
          <?php echo e(strtoupper(substr($msg->name,0,1))); ?>

        </div>
        <div class="flex-1 min-w-0">
          <div class="text-sm font-medium text-gray-200 truncate"><?php echo e($msg->name); ?></div>
          <div class="text-xs text-gray-500 truncate"><?php echo e(Str::limit($msg->message, 45)); ?></div>
        </div>
        <?php if(!$msg->is_read): ?>
        <span class="badge badge-primary">New</span>
        <?php endif; ?>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <div class="card-body text-center text-gray-600 py-8">
      <i class="fas fa-inbox text-3xl mb-2"></i>
      <p class="text-sm">No messages yet</p>
    </div>
    <?php endif; ?>
  </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
<script>
(function () {
  const labels = <?php echo json_encode($visitChart['labels'], 15, 512) ?>;
  const data   = <?php echo json_encode($visitChart['data'], 15, 512) ?>;
  const max    = Math.max(...data, 1);
  const ctx    = document.getElementById('visitChart').getContext('2d');

  const gradient = ctx.createLinearGradient(0, 0, 0, 220);
  gradient.addColorStop(0, 'rgba(99,102,241,0.35)');
  gradient.addColorStop(1, 'rgba(99,102,241,0.01)');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels,
      datasets: [{
        label: 'Visits',
        data,
        fill: true,
        backgroundColor: gradient,
        borderColor: '#6366f1',
        borderWidth: 2,
        pointBackgroundColor: '#6366f1',
        pointBorderColor: '#fff',
        pointBorderWidth: 1.5,
        pointRadius: 3,
        pointHoverRadius: 5,
        tension: 0.45,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      interaction: { mode: 'index', intersect: false },
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: '#0d1428',
          borderColor: 'rgba(99,102,241,0.4)',
          borderWidth: 1,
          titleColor: '#e2e8f0',
          bodyColor: '#94a3b8',
          padding: 10,
          callbacks: {
            label: ctx => ` ${ctx.parsed.y} visit${ctx.parsed.y !== 1 ? 's' : ''}`
          }
        }
      },
      scales: {
        x: {
          grid: { color: 'rgba(255,255,255,0.04)' },
          ticks: { color: '#475569', font: { size: 10 }, maxTicksLimit: 10, maxRotation: 0 }
        },
        y: {
          beginAtZero: true,
          suggestedMax: max + Math.ceil(max * 0.2) + 1,
          grid: { color: 'rgba(255,255,255,0.04)' },
          ticks: { color: '#475569', font: { size: 10 }, precision: 0 }
        }
      }
    }
  });
})();

// ── Real-time visitor counter (polls every 30 s) ──────────────────────────────
(function startLivePoll() {
  const todayEl = document.getElementById('liveToday');
  const totalEl = document.getElementById('liveTotal');
  if (!todayEl && !totalEl) return;

  async function poll() {
    try {
      const res  = await fetch('<?php echo e(route("admin.live.visitors")); ?>', { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
      if (!res.ok) return;
      const json = await res.json();
      if (todayEl) {
        const prev = parseInt(todayEl.textContent) || 0;
        todayEl.textContent = json.today;
        if (json.today > prev) {
          todayEl.style.transition = 'color 0.4s';
          todayEl.style.color = '#a5b4fc';
          setTimeout(() => todayEl.style.color = '', 1200);
        }
      }
      if (totalEl) totalEl.textContent = json.total.toLocaleString();
    } catch (_) {}
  }

  setInterval(poll, 30000);
})();
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Downloads\portfolio-laravel (1)\laravel\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>