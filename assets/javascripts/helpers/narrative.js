Ember.Handlebars.helper('narrative', function(value) {
  return value ? new Ember.Handlebars.SafeString(value) : null;
});