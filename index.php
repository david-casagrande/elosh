<?php get_header(); ?>

<!-- <script type="text/x-handlebars">
  <div id="left-nav">
    <div class="brand clear-fix">
      {{#link-to 'index'}}<img src="<?php echo get_template_directory_uri().'/assets/images/elosh-logo.jpg'; ?>" alt="<?php bloginfo('name'); ?>"/>{{/link-to}}
    </div>

    {{#view App.NavigationView}}
      <div class="artwork-nav">
        <div class="section">
          {{#link-to 'artwork' classNames="parent-link artwork"}}Artwork{{/link-to}}
          <div class="links">
            {{#each artworkCategories}}
              {{#link-to 'category' this.slug}}{{name}}{{/link-to}}
            {{/each}}
          </div>
        </div>
        <div class="border artwork"></div>

        <div class="section">
          {{#link-to 'books_main' classNames="parent-link books"}}Books{{/link-to}}
          <div class="links books">
            {{#each books}}
              {{#link-to 'books' this.slug}}{{title}}{{/link-to}}
            {{/each}}
          </div>
        </div>
        <div class="border books"></div>

        <div class="section">
          {{#link-to 'about' classNames="parent-link about"}}About{{/link-to}}
          <div class="links about">
            {{partial 'contact_nav'}}
          </div>
        </div>
        <div class="border about"></div>

        <div class="section">
          <a {{bind-attr href="contact.storeLink"}} class="parent-link shop" target="_blank">Shop</a>
        </div>
        <div class="border shop"></div>

      </div>
    {{/view}}

    <div class="footer clear-fix">
      <img src="<?php echo get_template_directory_uri().'/assets/images/elosh-footer.jpg'; ?>" alt="Copyright <?php echo date("Y"); ?> Eric Losh"/>
      <p>Web by <a href="https://github.com/david-casagrande" target="_blank" title="David Casagrande">David Casagrande</a></p>
    </div>
  </div>


  <div id="app-window">
    <div class="margin">
      <div class="page clear-fix">
      {{outlet}}
      </div>
    </div>
  </div>

  <div id="modal">
    <div class="margin">
      {{outlet 'modal'}}
    </div>
  </div>

  <div id="loading-screen">
    <div class="margin" {{bind-attr style="loadingScreenHeight"}}>
      <div class="loading-screen-content"></div>
    </div>
  </div>

</script>

<script type="text/x-handlebars" data-template-name='contact_nav'>
  {{narrative contact.contactNarrative}}
  {{#if contact.email}}<p><a {{bind-attr href="contact.mailTo"}} title="Email Eric Losh" target="_blank">{{contact.email}}</a></p>{{/if}}
</script>

<script type="text/x-handlebars" id='artwork'>
  {{outlet}}
</script>

<script type="text/x-handlebars" id='category'>
  <h1 class="artwork-category-title">{{artworkCategory.name}}</h1>
  {{#if artworkCategory.categoryDescription}}
    <div class="artwork-category-image clear-fix"><img {{bind-attr src="artworkCategory.categoryDescription" alt="artworkCategory.name"}} /></div>
  {{/if}}

  {{partial 'art_thumbs'}}
</script>

<script type="text/x-handlebars" id='_art_thumbs'>
  <ul class="art-thumbs large-block-grid-5 small-block-grid-2">
    {{#each controller}}
      <li>
        <img {{bind-attr src='thumbnail.url' alt='title' }} {{action 'show' this}}/>
        <p class="art-thumb-title">{{#link-to 'category.show' this}}{{title}}{{/link-to}}</p>
      </li>
    {{/each}}
  </ul>
</script>

<script type="text/x-handlebars" id='artwork_modal'>
  <div class="art-modal">
    <div class="art-modal-image">
      <img {{bind-attr src='image.url' alt='title' }}/>
    </div>
    <div class="artwork-details">
      {{#if title}}<p class="art-title">{{title}}</p>{{/if}}
      {{#if bookTitle}}<p class="book-title">{{bookTitle}}</p>{{/if}}
      {{#if medium}}<p class="art-medium">{{medium}}</p>{{/if}}
      {{#if description}}<div class="art-description">{{narrative description}}</div>{{/if}}
    </div>
    <div class="loading-overlay"></div>
    <a href="#" class="modal-navigation previous" {{action 'previousItem'}}>Previous</a>
    <a href="#" class="modal-navigation next" {{action 'nextItem'}}>Next</a>
    <a href="#" class="modal-navigation close" {{action 'closeArtModal'}}>Close Modal</a>
  </div>
</script>

<script type="text/x-handlebars" id='about'>
  <div id="about">
    <img {{bind-attr src="image.url"}} alt="About Eric Losh"/>
    <div class="about-narratives" {{bind-attr style="narrativeWidth"}}>
      <div class="contact-info clear-fix">
        <p><strong>ERIC LOSH</strong></p>
        {{#if contact.email}}
          <p><a {{bind-attr href="contact.mailTo"}} title="Email Eric Losh" target="_blank">{{contact.email}}</a></p>
        {{/if}}
        {{#if contact.phone}}
          <p>{{contact.phone}}</p>
        {{/if}}
        {{#if contact.twitter}}
          <p>Twitter: <a {{bind-attr href="contact.twitterLink"}} target="_blank" title="Eric Losh's Twitter">@{{contact.twitter}}</a></p>
        {{/if}}
      </div>

      {{#if narrativeOne}}
        <div class="narrative-one">
          {{narrative narrativeOne}}
        </div>
      {{/if}}

      {{#if narrativeTwo}}
        <div class="mini-border"></div>
        <div class="narrative-two">
          {{narrative narrativeTwo}}
        </div>
      {{/if}}
    </div>
  </div>
</script>

<script type="text/x-handlebars" id='books'>
<div id="books">
  <h1 class="book-title">{{#if title}}{{title}} {{/if}}{{#if titleNotes}}<span>- {{titleNotes}}{{/if}}</span></h1>

  <div class="book-images clear-fix">
    <div class="book-banner-image">
      <img {{bind-attr src="bannerImage.url"}}/>
    </div>
    <div class="book-cover-image large-5-columns">
      <img {{bind-attr src="coverImage.url"}}/>
    </div>
  </div>

  <div id="book-narrative-and-pages" class="clear-fix">
    <div class="book-narrative">
      <div class="padding">
        {{narrative narrative}}
      </div>
    </div>
    {{render 'book_pages' bookPages}}
  </div>
</div>
</script>

<script type="text/x-handlebars" id='book_pages'>
  <div class="book-pages">
    <div class="padding">
      <ul class="large-block-grid-2 small-block-grid-1">
        {{#each}}
          <li>
            <img {{bind-attr src='thumbnail.url' alt='title'}} {{action 'show' this}}/>
          </li>
        {{/each}}
      </ul>
    </div>
  </div>
</script>

<script type="text/x-handlebars" id='loading'>
  <div id="loading-route"><h1>Loading<span class="first">.</span><span class="second">.</span><span class="third">.</span></h1></div>
</script> -->
<?php get_footer(); ?>
