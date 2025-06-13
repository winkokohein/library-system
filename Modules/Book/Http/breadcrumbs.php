<?php

Breadcrumbs::for('admin.book.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('book::labels.backend.book.management'), route('admin.book.index'));
});

Breadcrumbs::for('admin.book.create', function ($trail) {
    $trail->parent('admin.book.index');
    $trail->push(__('book::labels.backend.book.create'), route('admin.book.create'));
});

Breadcrumbs::for('admin.book.show', function ($trail, $id) {
    $trail->parent('admin.book.index');
    $trail->push(__('book::labels.backend.book.show'), route('admin.book.show', $id));
});

Breadcrumbs::for('admin.book.edit', function ($trail, $id) {
    $trail->parent('admin.book.index');
    $trail->push(__('book::labels.backend.book.edit'), route('admin.book.edit', $id));
});
