<?php

Breadcrumbs::for('admin.author.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('author::labels.backend.author.management'), route('admin.author.index'));
});

Breadcrumbs::for('admin.author.create', function ($trail) {
    $trail->parent('admin.author.index');
    $trail->push(__('author::labels.backend.author.create'), route('admin.author.create'));
});

Breadcrumbs::for('admin.author.show', function ($trail, $id) {
    $trail->parent('admin.author.index');
    $trail->push(__('author::labels.backend.author.show'), route('admin.author.show', $id));
});

Breadcrumbs::for('admin.author.edit', function ($trail, $id) {
    $trail->parent('admin.author.index');
    $trail->push(__('author::labels.backend.author.edit'), route('admin.author.edit', $id));
});
