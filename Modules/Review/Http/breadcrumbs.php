<?php

Breadcrumbs::for('admin.review.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('review::labels.backend.review.management'), route('admin.review.index'));
});

Breadcrumbs::for('admin.review.create', function ($trail) {
    $trail->parent('admin.review.index');
    $trail->push(__('review::labels.backend.review.create'), route('admin.review.create'));
});

Breadcrumbs::for('admin.review.show', function ($trail, $id) {
    $trail->parent('admin.review.index');
    $trail->push(__('review::labels.backend.review.show'), route('admin.review.show', $id));
});

Breadcrumbs::for('admin.review.edit', function ($trail, $id) {
    $trail->parent('admin.review.index');
    $trail->push(__('review::labels.backend.review.edit'), route('admin.review.edit', $id));
});
