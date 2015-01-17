App.Book = DS.Model.extend({
  title:       DS.attr('string'),
  titleNotes:  DS.attr('string'),
  bannerImage: DS.belongsTo('imageObject'),
  coverImage:  DS.belongsTo('imageObject'),
  narrative:   DS.attr('string'),
  slug:        DS.attr('string'),
  bookPages:   DS.hasMany('artwork')
});

App.BookSerializer = App.ApplicationSerializer.extend({
  extractArray: function(store, type, payload, id, requestType){
    var banner_image = payload.books.mapProperty('banner_image');
    var cover_image = payload.books.mapProperty('cover_image');
    payload.image_object = banner_image.concat(cover_image);

    var book_pages = [];
    payload.books.forEach(function(book){
      book.banner_image_id = book.banner_image ? book.banner_image.id : null;
      book.cover_image_id = book.cover_image ? book.cover_image.id : null;
      book.book_page_ids = book.book_pages ? book.book_pages.mapProperty('id') : [];
      book.book_pages.forEach(function(book_page){
        payload.image_object.push(book_page.image);
        book_page.image_id = book_page.image.id;
        payload.image_object.push(book_page.thumbnail);
        book_page.thumbnail_id = book_page.thumbnail.id;
      });
      book_pages.push(book.book_pages ? book.book_pages : []);
    });
    var merged_book_pages = [];
    payload.artwork = merged_book_pages.concat.apply(merged_book_pages, book_pages);
    return this._super(store, type, payload, id, requestType);    
  }
});