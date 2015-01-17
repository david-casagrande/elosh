App.showArtModal = Ember.Mixin.create({
  needs: ['artwork_modal'],
  actions: {
    show: function(art){
      var self = this;

      this.send('openModal', {
        modal: 'artwork_modal'
      });
      
      this.get('controllers.artwork_modal').setProperties({
        model: art,
        parent: self,
        artIndex: self.getIndex(art)
      });

    }
  },

  getIndex: function(selectedArt){
    var artIndex = 0;
    this.forEach(function(art, index){
      if(art.get('id') === selectedArt.get('id')) {
        artIndex = index;
      }
    });
    return artIndex;
  }
});