<div class="row">
    <div class="col-12 mx-auto">
      <h1 class="text-center page-heading custom-border-radius"><?= $title ?></h1>  
    </div>
</div>
<section class="gallery-block cards-gallery">
          <div class="row">
            <?php foreach ($images as $image): ?>
              <div class="col-6 col-lg-4">
                <div class="card border-0 transform-on-hover">
                  <a class="lightbox" href="<?php echo base_url(); ?>assets/images/posts/<?php echo $image['url']; ?>">
                      <img src="<?php echo base_url(); ?>assets/images/posts/<?php echo $image['url']; ?>" alt="Card Image" class="card-img-top">
                  </a>
                </div>
              </div>
            <?php endforeach ?>
          </div>

    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.cards-gallery', { animation: 'slideIn'});
    </script>

    