App.BooksRoute = Ember.Route.extend({
  model: function(params){
    var filter = this.get('store').filter('book', function(book){
      return book.get('slug') === params.book_slug;
    });
    return filter ? filter.objectAt(0) : false;
  }
});