App.CategoryController = Ember.ArrayController.extend(App.showArtModal, {
  artworkCategory: function(){
    return this.get('category.firstObject') ? this.get('category.firstObject') : false;
  }.property('category.length')
});
