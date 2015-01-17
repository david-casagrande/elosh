App.Router.map(function(){
  this.resource('artwork', function(){
    this.resource('category', {path: ':category_slug'}, function() {
      this.route('show', {path: ':artwork_id'});
    });
  });

  //this.resource('artwork_category', {path: 'artwork/:category_slug'})

  //this.resource('artwork_main', { path: '/artwork' });
  //this.resource('artwork', { path: '/artwork/:category_slug' });
  this.resource('about');
  this.resource('books_main', { path: '/books' });
  this.resource('books', { path: '/books/:book_slug' });
});
