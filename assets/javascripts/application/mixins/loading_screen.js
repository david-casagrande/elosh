App.loadingScreen = Ember.Mixin.create({
  beforeModel: function(){
    //console.log(this.container.lookup('controller:application'))
    //jQuery('#loading-screen').css({'opacity' : '1', 'display' : 'block'});
    //jQuery('#loading-screen').addClass('visible');
    jQuery('#loading-screen').fadeIn(0);
  },
  afterModel: function(){
    //console.log('after');
    jQuery('#loading-screen').fadeOut(400);
    /*
    jQuery('#loading-screen').animate({'opacity' : '0'}, 400, function(){
      jQuery(this).css('display', 'none');
    });
    */
  }
});