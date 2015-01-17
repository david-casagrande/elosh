App.ArtworkModalView = Ember.View.extend({
  isRendered: false,

  didInsertElement: function(){
    this.set('isRendered', true);
    this.setModalDimensions();
    this.imageLoaded();
  },

  elementChanged: function(){
    this.fadeInLoadingOverlay();
    this.imageLoaded();
  }.observes('controller.model'),

  windowSizeChanged: function(){
    this.setModalDimensions();
  }.observes('controller.controllers.application.windowHeight'),

  setModalDimensions: function() {
    if( this.get('isRendered') ) {
      var marginTotal   = 80; //80 for outside margin
      var modalPadding  = 40;
      var windowHeight  = this.get('controller.controllers.application.windowHeight');
      var detailsHeight = this.$().find('.artwork-details').outerHeight();

      var modalHeight = windowHeight - marginTotal - modalPadding - detailsHeight;

      this.$().find('.art-modal').css({ height: windowHeight - marginTotal });
      this.$().find('.art-modal-image').css({ 
        height: modalHeight,
        'line-height' : modalHeight+'px'
      });

    }
  },

  imageLoaded: function() {
    var self = this;
    if( this.get('isRendered') ) {
      var img = new Image();
      img.src = this.get('controller.image.url');
      img.onload = function(){
        self.fadeOutLoadingOverlay();
        self.setModalDimensions();
      };
    }
  },

  fadeOutLoadingOverlay: function() {
    var self = this;
    var overlay = self.$().find('.loading-overlay');
    if( this.get('isRendered') ) {
      //setTimeout(function(){
        overlay.animate({'opacity' : 0}, 500, function(){
          overlay.css({'display' : 'none'});
        });
      //}, 1000)
    }
  },

  fadeInLoadingOverlay: function() {
    if( this.get('isRendered') ) {
      this.$().find('.loading-overlay').css({'opacity' : 1, 'display': 'block'});
    }
  }

});