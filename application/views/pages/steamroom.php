<div class="rooms">
    <div class="row">
        <div class="col-10 mx-auto">
            <h1 class="text-center"><?= $title ?></h1>
        </div>

    </div>

    <div class="row">
        <div class="col-md-5 col-sm-5 col-5 ml-auto bg-custom-light-brown text-center menu-select " id="kitchen">
            <div class="shell">
                <p class='hover-effect'>
                    <a href="<?php echo base_url(); ?>rooms/show/steamroom1">Баня 1</a>
                    <br>
                    <small class="cat_description">Баня с чаном.</small>
                </p>
            </div>
        </div>
        <div class="col-md-5 col-sm-5 col-5 mr-auto bg-custom-light-brown text-center menu-select " id="rooms">
            <div class="shell">
                <p class='hover-effect'>
                    <a href="<?php echo base_url(); ?>rooms/show/steamroom2">Баня 2</a>
                    <br>
                    <small class="cat_description">Баня с крытым бассейном.</small>
                </p>
            </div>
        </div>

    </div>
</div>