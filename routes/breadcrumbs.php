<?php

// Subject
// Subject List
Breadcrumbs::for('test.subject.index', function ($trail) {
    $trail->push('Subject List', route('test.subject.index'));
});

// Subject List > {Subject Name}
Breadcrumbs::for('test.subject.show', function ($trail,$subject) {
    $trail->parent('test.subject.index');
    $trail->push($subject->name, route('test.subject.show',$subject->id));
});

// Subject List > {Subject Name} > Edit Subject
Breadcrumbs::for('test.subject.edit', function ($trail,$subject) {
    $trail->parent('test.subject.index');
    $trail->push($subject->name, route('test.subject.show',$subject->id));
    $trail->push('Edit Subject', route('test.subject.edit',""));
});


// Content
// Subject List > {Subject Name} > {Content Name}
Breadcrumbs::for('test.content.show', function ($trail,$subject,$content) {
	 $trail->parent('test.subject.index');
     $trail->push($subject->name, route('test.subject.show',$subject->id));
     $trail->push($content->name, route('test.subject.show',$content->id));
});


// Subject List > {Subject Name} > {Content Name} >> Edit Content
Breadcrumbs::for('test.content.edit', function ($trail,$subject,$content) {
    $trail->parent('test.subject.index');
    $trail->push($subject->name, route('test.subject.show',$subject->id));
    $trail->push($content->name, route('test.content.show',$content->id));
    $trail->push('Edit Content', route('test.content.edit','',''));
});




// Ex.
// // Home
// Breadcrumbs::for('home', function ($trail) {
//     $trail->push('Home', route('home'));
// });

// // Home > About
// Breadcrumbs::for('about', function ($trail) {
//     $trail->parent('home');
//     $trail->push('About', route('about'));
// });

// // Home > Blog
// Breadcrumbs::for('blog', function ($trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category->id));
// });

// // Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });