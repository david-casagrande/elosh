App.ApplicationController = Ember.ObjectController.extend({
  windowObject: jQuery(window),
  windowHeight: 0,
  //artworkCategories: [],
  
  //bind the windowHeight to when the window resizes and set the windowHeight object
  init: function() {
    this._super();

    var self = this;
    //check of their is an adminBar and subtract the height of it
    var adminTopBarHeight = app.isAdmin ? 28 : 0;
    self.set( 'windowHeight', self.get('windowObject').outerHeight() - adminTopBarHeight );
    self.get('windowObject').on('resize', function(){
      self.set( 'windowHeight', self.get('windowObject').outerHeight() - adminTopBarHeight );
    });
  },
  
  closeArtModal: function(){
    this.send('closeModal')
  },

  loadingScreenHeight: function(){
    return 'height:'+this.get('windowHeight')+'px;';
  }.property('windowHeight')
});