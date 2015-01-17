App.AboutRoute = Ember.Route.extend(App.loadingScreen, {
  model: function() {
    return this.get('store').find('about', 1);
  },
  setupController: function(controller, model){
    controller.setProperties({
      'model':   model,
      'contact': this.get('store').find('contact', 1)
    });
  }
});