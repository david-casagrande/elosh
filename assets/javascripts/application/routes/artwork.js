App.ArtworkRoute = Ember.Route.extend({
  model: function(params){
    if(typeof this.get('artwork') === 'undefined') {
      this.set('artwork', this.get('store').findQuery('artwork', {'action': 'get_artwork'}));
    }
    return this.get('artwork');
  }
});

App.ArtworkIndexRoute = Ember.Route.extend(App.showArtModal, {
  redirect: function(){
    this.transitionTo('category', 'illustration');
  }
});

App.CategoryRoute = Ember.Route.extend(App.showArtModal, {
  model: function(params){
    return Ember.RSVP.all([
      this.modelFor('artwork').filter(function(artwork){
        return artwork.get('categories').contains(params.category_slug);
      }),
      this.get('store').filter('artworkCategory', function(category){
        return category.get('slug') === params.category_slug;
      })
    ]);
  },
  setupController: function(controller, model){
    controller.setProperties({
      model:    model[0],
      category: model[1]
    });
  }
});

App.CategoryShowRoute = Ember.Route.extend(App.showArtModal, {
  model: function(params){
    console.log(params.artwork_id);
    return {};
  },

  renderTemplate: function() {

    this.send('openModal', {
      modal: 'artwork_modal'
    });

    this.get('controllers.artwork_modal').setProperties({
      // model: art,
      // parent: self,
      // artIndex: self.getIndex(art)
    });


  }

});
