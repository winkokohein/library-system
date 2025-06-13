<?php

Breadcrumbs::for('admin.deliveryfee.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('deliveryfee::labels.backend.deliveryfee.management'), route('admin.deliveryfee.index'));
});

Breadcrumbs::for('admin.deliveryfee.create', function ($trail) {
    $trail->parent('admin.deliveryfee.index');
    $trail->push(__('deliveryfee::labels.backend.deliveryfee.create'), route('admin.deliveryfee.create'));
});

Breadcrumbs::for('admin.deliveryfee.show', function ($trail, $id) {
    $trail->parent('admin.deliveryfee.index');
    $trail->push(__('deliveryfee::labels.backend.deliveryfee.show'), route('admin.deliveryfee.show', $id));
});

Breadcrumbs::for('admin.deliveryfee.edit', function ($trail, $id) {
    $trail->parent('admin.deliveryfee.index');
    $trail->push(__('deliveryfee::labels.backend.deliveryfee.edit'), route('admin.deliveryfee.edit', $id));
});
