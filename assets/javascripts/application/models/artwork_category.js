App.ArtworkCategory = DS.Model.extend({
  name:                DS.attr('string'),
  categoryDescription: DS.attr('string'),
  slug:                DS.attr('string')
});

App.ArtworkCategorySerializer = App.ApplicationSerializer.extend({
  extractArray: function(store, type, payload, id, requestType){
    payload.artwork_categories.forEach(function(category){
      category.id = category.term_id;
    });
    return this._super(store, type, payload, id, requestType);
  }
});
