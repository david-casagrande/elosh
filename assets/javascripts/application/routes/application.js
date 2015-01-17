App.ApplicationRoute = Ember.Route.extend({
  
  actions: {
    openModal: function(options) {
      if(typeof options.modal !== 'undefined') {
        this.render(options.modal, {
          into: 'application',
          outlet: 'modal'
        }); 
        jQuery('#modal, .modal-bg').addClass('show');
      }
    },
    closeModal: function(options) {
      this.disconnectOutlet({
        outlet: 'modal',
        parentView: 'application'
      });
      jQuery('#modal, .modal-bg').removeClass('show');
    }
  },
  
  model: function(){
    return Ember.RSVP.all([
      this.get('store').find('book', {'action': 'get_books'}), 
      this.get('store').find('artworkCategory', {'action': 'get_artwork_categories'}),
      this.get('store').find('contact', 1)
    ]);
  },

  setupController: function(controller, model){
    controller.setProperties({
      'model':             {},
      'books':             model[0],
      'artworkCategories': model[1],
      'contact':           model[2]
    });
  }
});