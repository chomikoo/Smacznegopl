<div class="custom-search custom-search--page">
  <form class="custom-search__container" method="get" action="<?php echo esc_url(site_url('/')); ?>">
    <div class="form-group">
      <span class="fas fa-search" aria-hidden="true"></span>
      <input id="s" name="s" type="search" class="custom-search__input">
      <label class="custom-search__label" for="s"><?php echo __('Czego szukasz ?') ?></label>
      <button class="btn btn--submit" type="submit">Szukaj</button>
    </div>
  </form>
</div>
