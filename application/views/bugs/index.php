<!doctype html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>CodeIgniter Bug Tracker</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light"><nav class="navbar navbar-dark bg-dark"><div class="container"><span class="navbar-brand">Bug Tracker</span><span class="text-white small">CodeIgniter 3</span></div></nav>
<div class="container py-4">
<?php if ($this->session->flashdata('success')): ?><div class="alert alert-success"><?= html_escape($this->session->flashdata('success')); ?></div><?php endif; ?>
<?php if ($this->session->flashdata('error')): ?><div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div><?php endif; ?>
<div class="row g-4"><div class="col-lg-4"><div class="card"><div class="card-header fw-semibold">Report a bug</div><div class="card-body">
<?= form_open('bugs/create'); ?>
<div class="mb-3"><label class="form-label">Title</label><input class="form-control" name="title" maxlength="180" required></div>
<div class="mb-3"><label class="form-label">Description</label><textarea class="form-control" name="description" rows="4"></textarea></div>
<div class="mb-3"><label class="form-label">Priority</label><select class="form-select" name="priority"><option>Low</option><option selected>Medium</option><option>High</option></select></div>
<button class="btn btn-primary w-100">Create ticket</button><?= form_close(); ?></div></div></div>
<div class="col-lg-8"><div class="card"><div class="card-header"><form class="d-flex gap-2" method="get" action="<?= site_url('bugs'); ?>"><input class="form-control" name="q" value="<?= html_escape($q); ?>" placeholder="Search tickets"><button class="btn btn-outline-primary">Search</button></form></div>
<div class="table-responsive"><table class="table table-hover align-middle mb-0"><thead><tr><th>Ticket</th><th>Priority</th><th>Status</th><th>Update status</th></tr></thead><tbody>
<?php foreach ($bugs as $bug): ?><tr><td><strong><?= html_escape($bug['title']); ?></strong><div class="small text-secondary"><?= html_escape($bug['description'] ?? ''); ?></div></td><td><?= html_escape($bug['priority']); ?></td><td><?= html_escape($bug['status']); ?></td><td><?= form_open('bugs/update_status/' . (int) $bug['id'], array('class' => 'd-flex gap-1')); ?><select class="form-select form-select-sm" name="status"><option <?= $bug['status']==='Open'?'selected':''; ?>>Open</option><option <?= $bug['status']==='In Progress'?'selected':''; ?>>In Progress</option><option <?= $bug['status']==='Resolved'?'selected':''; ?>>Resolved</option></select><button class="btn btn-sm btn-dark">Save</button><?= form_close(); ?></td></tr><?php endforeach; ?>
<?php if (!$bugs): ?><tr><td colspan="4" class="text-center text-secondary py-4">No tickets found.</td></tr><?php endif; ?>
</tbody></table></div></div></div></div>
<p class="small text-secondary mt-4">Starter module: enable CI3 CSRF protection and restrict write actions to authenticated users before production use.</p>
</div></body></html>
