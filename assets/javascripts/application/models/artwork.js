App.Artwork = DS.Model.extend({
  title:       DS.attr('string'),
  medium:      DS.attr('string'),
  description: DS.attr('string'),
  thumbnail:   DS.belongsTo('imageObject'),
  image:       DS.belongsTo('imageObject'),
  categories:  DS.attr('categories'),
  bookTitle:   DS.attr('string')
});

App.ArtworkSerializer = App.ApplicationSerializer.extend({
  extractArray: function(store, type, payload, id, requestType){
    var images = payload.artworks.mapProperty('image');
    var thumbnails = payload.artworks.mapProperty('thumbnail');

    payload.image_object = images.concat(thumbnails);
    payload.artworks.forEach(function(art){
      art.image_id = art.image.id;
      art.thumbnail_id = art.thumbnail.id;
      delete art.image;
      delete art.thumbnail;
    });
    return this._super(store, type, payload, id, requestType);
  }
});
