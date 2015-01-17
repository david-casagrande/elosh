App.AboutController = Ember.ObjectController.extend({
  narrativeWidth: function() {
    var width = this.get('image') ? this.get('image.width') : 0;
    return 'max-width:'+width+'px;';
  }.property('image.width')
});