App.ApplicationAdapter = DS.ActiveModelAdapter.extend({
  buildURL: function(){
    return 'wp-admin/admin-ajax.php';
  }
});