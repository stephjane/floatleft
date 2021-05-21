<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head();?>
  <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;600;700&family=Noto+Sans+JP:wght@400;500&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link href="<?php echo get_bloginfo('template_directory'); ?>/dist/style.css" rel="stylesheet">
  <!-- <link href="<?php echo get_bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="m-scene">

<div id="app" class="flicast-builder">

  <div class="screen-nav">
    <div
      v-for="screen in screens"
      v-bind:key="screen"
      v-bind:class="['tab-button', { active: currentTab === screen }]"
      v-on:click="currentTab = screen"
    >
      {{ screen }}
    </div>
  </div>

  <div class="screen-container">
    <div
      v-for="screen in screens"
      :is="screen"
      :key="screen"
      :title="screen"
      :class="[{ active: currentTab === screen }]"
      :id="screen"
    >
    </div>

  </div>

</div>


<script type="text/x-template" id="featured-template">
  <div class="screen">
    <div
      v-show="componentMenu"
      class="component-menu"
    >
      <div class="relative">
        <div>
          <h4>Featured</h4>
          <div class="component-fields">
            <div class="field">
              <label for="featured-aspect">Aspect Ratio</label>
              <div class="select">
                <select name="aspect" id="featured-aspect" v-model="featured.aspect">
                  <option value="16x9">16x9</option>
                  <option value="21x9">21x9</option>
                  <option value="2x1">2x1</option>
                  <option value="full">full</option>
                </select>
              </div>
            </div>
            <div class="field" v-show="featured.aspect != 'full'">
              <label for="featured-layout">Layout</label>
              <div class="select">
                <select name="layout" id="featured-layout" v-model="featured.layout">
                  <option value="single">Single</option>
                  <option value="wide">Wide</option>
                  <option value="standard">Standard</option>
                </select>
              </div>
            </div>
            <div class="field" v-show="featured.aspect != 'full'">
              <label for="featured-data">Data Display</label>
              <div class="select">
                <select name="display" id="featured-data" v-model="featured.data">
                  <option value="bottom">Bottom</option>
                  <option value="top">Top</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div>
          <h4>Playlists</h4>
          <div
            v-for="(playlist,index) in playlists"
            :key="`playlist-${index}`"
            class="component-fields"
            :id="`playlist-fields-${index}`"
          >
            <div class="field">
              <label :for="`playlist-name-${index}`">Playlist Name</label>
              <input type="text" :id="`playlist-name-${index}`" value="New Playlist" v-model="playlist.title">
            </div>
            <div class="field">
              <label :for="`playlist-aspect-${index}`">Aspect Ratio</label>
              <div class="select">
                <select name="aspect" :id="`playlist-aspect-${index}`" v-model="playlist.aspect">
                  <option value="16x9">16x9</option>
                  <option value="4x3">4x3</option>
                  <option value="2x3">2x3</option>
                  <option value="1x1">1x1</option>
                </select>
              </div>
            </div>
            <div 
              class="field"
              v-show="playlist.aspect === '16x9' || playlist.aspect === '4x3'"
            >
              <label :for="`playlist-size-${index}`">Size</label>
              <div class="select">
                <select name="aspect" :id="`playlist-size-${index}`" v-model="playlist.size">
                  <option value="large">large</option>
                  <option value="small">small</option>
                </select>
              </div>
            </div>
          </div>
          <div
            @click="addrow"
            class="icon__add"
          >
            <i class="material-icons">add</i>
          </div>
        </div>
        
        <i 
          @click="componentMenu = !componentMenu"
          class="material-icons icon__close"
        >close</i>
      </div>
    </div>
  
    <div class="screen__content">
      <div
        @click="componentMenu = !componentMenu"
        class="icon__edit"
        :class="[{active: componentMenu }]"
      >
        <i class="material-icons">edit</i>
      </div>
      <featured-row
        :aspect="featured.aspect"
        :layout="featured.layout"
        :data="featured.data"
      ></featured-row>
      <playlist-row
        v-for="(playlist,index) in playlists"
        :key="`playlist-${index}`"
        :title="playlist.title"
        :aspect="playlist.aspect"
        :size="playlist.size"
      >
      </playlist-row>
    </div>
  </div>
</script>

<script type="text/x-template" id="playlist-template">
  <div class="row__playlist">
    <h4 class="playlist__title">{{title}}</h4>
    <img v-if="aspect === '16x9' & size === 'large'" src="<?php echo get_bloginfo('template_directory'); ?>/img/16x9large.png" alt="">
    <img v-if="aspect === '16x9' & size === 'small'" src="<?php echo get_bloginfo('template_directory'); ?>/img/16x9small.png" alt="">
    <img v-if="aspect === '4x3' & size === 'large'" src="<?php echo get_bloginfo('template_directory'); ?>/img/4x3large.png" alt="">
    <img v-if="aspect === '4x3' & size === 'small'" src="<?php echo get_bloginfo('template_directory'); ?>/img/4x3small.png" alt="">
    <img v-if="aspect === '2x3'" src="<?php echo get_bloginfo('template_directory'); ?>/img/2x3.png" alt="">
    <img v-if="aspect === '1x1'" src="<?php echo get_bloginfo('template_directory'); ?>/img/1x1.png" alt="">
  </div>
</script>

<script type="text/x-template" id="featured-row-template">
  <div class="row__featured">
    <img v-if="aspect === '21x9' & layout === 'standard'" src="<?php echo get_bloginfo('template_directory'); ?>/img/21x9-standard.png">
    <img v-if="aspect === '21x9' & layout === 'wide'" src="<?php echo get_bloginfo('template_directory'); ?>/img/21x9-wide.png">
    <img v-if="aspect === '21x9' & layout === 'single'" src="<?php echo get_bloginfo('template_directory'); ?>/img/21x9-single.png">
    <img v-if="aspect === '2x1' & layout === 'standard'" src="<?php echo get_bloginfo('template_directory'); ?>/img/2x1-standard.png">
    <img v-if="aspect === '2x1' & layout === 'wide'" src="<?php echo get_bloginfo('template_directory'); ?>/img/2x1-wide.png">
    <img v-if="aspect === '2x1' & layout === 'single'" src="<?php echo get_bloginfo('template_directory'); ?>/img/2x1-single.png">
    <img v-if="aspect === '16x9' & layout === 'standard'" src="<?php echo get_bloginfo('template_directory'); ?>/img/16x9-standard.png">
    <img v-if="aspect === '16x9' & layout === 'wide'" src="<?php echo get_bloginfo('template_directory'); ?>/img/16x9-wide.png">
    <img v-if="aspect === '16x9' & layout === 'single'" src="<?php echo get_bloginfo('template_directory'); ?>/img/16x9-single.png">
    <img v-if="aspect === 'full'" src="<?php echo get_bloginfo('template_directory'); ?>/img/full.png">
  </div>
</script>

<?php wp_footer(); ?>
</html>
