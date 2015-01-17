App.Contact = DS.Model.extend({
  contactNarrative: DS.attr('string'),
  email:            DS.attr('string'),
  phone:            DS.attr('string'),
  twitter:          DS.attr('string'),
  storeLink:        DS.attr('string'),
  mailTo: function(){
    return this.get('email') ? 'mailto:'+this.get('email') : null;
  }.property('email'),
  twitterLink: function(){
    return this.get('twitter') ? 'https://twitter.com/'+this.get('twitter') : null;
  }.property('twitter')

});

App.ContactAdapter = App.ApplicationAdapter.extend({
  buildURL: function(type, id){
    var url = this._super(type, id) + '?action=get_contact';
    return url;
  }
});

App.ContactSerializer = App.ApplicationSerializer.extend({
  extractSingle: function(store, type, payload, id, requestType){
    payload.contact.id = id;
    return this._super(store, type, payload, id, requestType);    
  }
});
