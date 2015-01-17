App.ArtworkModalController = Ember.ObjectController.extend({
  needs: ['application'],
  artIndex: 0,
  actions: {
    closeArtModal: function(){
      this.send('closeModal')
    },
    
    nextItem: function(){
      var index = ( this.get('artIndex') + 1 ) >= this.get('parent.length') ? 0 : this.get('artIndex') + 1;
      this.setProperties({ 
        model:    this.get('parent').objectAt(index),
        artIndex: index,
        parent:   this.get('parent')
      });
    },

    previousItem: function(){
      var index = this.get('artIndex') <= 0 ? this.get('parent.length') - 1 : this.get('artIndex') - 1;
      this.setProperties({ 
        model:    this.get('parent').objectAt(index),
        artIndex: index,
        parent:   this.get('parent')
      });
    }
  }
});