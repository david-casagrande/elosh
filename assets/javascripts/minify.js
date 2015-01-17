var compressor = require('node-minify');
var filePath = '/Applications/XAMPP/htdocs/eric/wp-content/themes/elosh/assets/javascripts/';
// Array
new compressor.minify({
    type: 'gcc',
    fileIn: [
      //filePath+'libs/handlebars.min.js',
      //filePath+'libs/ember.min.js',
      //filePath+'libs/ember-data.min.js',
      //filePath+'libs/foundation.min.js',
      filePath+'helpers/narrative.js',
      filePath+'application/application.js',
      filePath+'application/config/router.js',
      filePath+'application/config/adapter.js',
      filePath+'application/config/serializer.js',

      filePath+'application/transformations/categories.js',
      filePath+'application/mixins/show_art_modal.js',
      filePath+'application/mixins/loading_screen.js',

      filePath+'application/routes/application.js',
      filePath+'application/routes/loading.js',
      filePath+'application/routes/about.js',
      filePath+'application/routes/artwork.js',
      filePath+'application/routes/books.js',
      filePath+'application/routes/books_main.js',
      filePath+'application/routes/index.js',

      filePath+'application/controllers/application.js',
      filePath+'application/controllers/artwork_category.js',
      filePath+'application/controllers/artwork_modal.js',
      filePath+'application/controllers/about.js',
      filePath+'application/controllers/book_pages.js',

      filePath+'application/views/navigation.js',
      filePath+'application/views/artwork_modal.js',

      filePath+'application/models/artwork_category.js',
      filePath+'application/models/artwork.js',
      filePath+'application/models/about.js',
      filePath+'application/models/contact.js',
      filePath+'application/models/book.js',
      filePath+'application/models/image_object.js'
    ],
    fileOut: filePath+'/elosh_app.js',
    callback: function(err){
        console.log(err);
    }
});