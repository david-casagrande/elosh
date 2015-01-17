App.BooksMainRoute = Ember.Route.extend({
  redirect: function(){
    this.transitionTo('books', 'the_chorus_of_kibale');
  }
});