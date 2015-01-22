App.NavigationView = Ember.View.extend({
  classNames: ['nav'],
  elementInserted: false,

  didInsertElement: function() {
    this.set('elementInserted', true);
    this.showNavLinks( this.routeEl() );
  },

  routeTransition: function(){
    var el = this.routeEl();
    if(!el.hasClass('open')) {
      this.closeAll();
      this.showNavLinks(el);
    }
    this.get('controller').closeArtModal();
  }.observes('controller.currentPath'),

  routeEl: function(){
    var routeName = this.get('controller.currentPath').split('.')[0];
    return this.$().find('.parent-link.'+routeName);
  },

  showNavLinks: function(el){
    var parent = el.parent();
    var height = el.next().outerHeight();
    el.addClass('open');
    parent.css({ 'height' : '+='+height+'px' });
  },

  closeNavLinks: function(el){
    var parent = el.parent();
    el.removeClass('open');
    parent.css({ 'height' : 20 });
  },

  closeAll: function() {
    var self = this;
    self.$().find('.section .parent-link').each(function(){
      var el = jQuery(this);
      if( el.hasClass('open') ) {
        self.closeNavLinks(el);
      }
    })
  }

});
