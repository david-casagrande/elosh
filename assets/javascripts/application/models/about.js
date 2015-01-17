App.About = DS.Model.extend({
  image:       DS.belongsTo('imageObject'),
  narrativeOne:  DS.attr('string'),
  narrativeTwo:  DS.attr('string')
});

App.AboutAdapter = App.ApplicationAdapter.extend({
  buildURL: function(type, id){
    var url = this._super(type, id) + '?action=get_about';
    return url;
  }
});

App.AboutSerializer = App.ApplicationSerializer.extend({
  extractSingle: function(store, type, payload, id, requestType){
    payload.about.id = id;
    payload.image_object = [payload.about.image];
    payload.about.image_id = payload.image_object[0].id;
    return this._super(store, type, payload, id, requestType);    
  }
});