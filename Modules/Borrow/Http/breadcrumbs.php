<?php

Breadcrumbs::for('admin.borrow.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('borrow::labels.backend.borrow.management'), route('admin.borrow.index'));
});

Breadcrumbs::for('admin.borrow.create', function ($trail) {
    $trail->parent('admin.borrow.index');
    $trail->push(__('borrow::labels.backend.borrow.create'), route('admin.borrow.create'));
});

Breadcrumbs::for('admin.borrow.show', function ($trail, $id) {
    $trail->parent('admin.borrow.index');
    $trail->push(__('borrow::labels.backend.borrow.show'), route('admin.borrow.show', $id));
});

Breadcrumbs::for('admin.borrow.edit', function ($trail, $id) {
    $trail->parent('admin.borrow.index');
    $trail->push(__('borrow::labels.backend.borrow.edit'), route('admin.borrow.edit', $id));
});
