<?php

Breadcrumbs::for('admin.bookcategory.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('bookcategory::labels.backend.bookcategory.management'), route('admin.bookcategory.index'));
});

Breadcrumbs::for('admin.bookcategory.create', function ($trail) {
    $trail->parent('admin.bookcategory.index');
    $trail->push(__('bookcategory::labels.backend.bookcategory.create'), route('admin.bookcategory.create'));
});

Breadcrumbs::for('admin.bookcategory.show', function ($trail, $id) {
    $trail->parent('admin.bookcategory.index');
    $trail->push(__('bookcategory::labels.backend.bookcategory.show'), route('admin.bookcategory.show', $id));
});

Breadcrumbs::for('admin.bookcategory.edit', function ($trail, $id) {
    $trail->parent('admin.bookcategory.index');
    $trail->push(__('bookcategory::labels.backend.bookcategory.edit'), route('admin.bookcategory.edit', $id));
});
