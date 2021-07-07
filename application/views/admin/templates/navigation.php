<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">Shato</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo base_url(); ?>admin/index">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Страницы">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Страницы</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="<?php echo base_url(); ?>pages/edit/kitchen">Кухня</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>pages/edit/territory">Территория</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>pages/edit/occasions">Мероприятия</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>pages/edit/gallery">Галерея</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>pages/edit/about">Про нас</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Номера">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Номера</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents2">
           <?php foreach ( $rooms as $room ) { ?>
              <li>
                <a href="<?php echo base_url(); ?>rooms/edit/<?php echo $room['type']; ?>"><?php echo $room['type_rus']; ?></a>
              </li>
           <?php } ?>  
          </ul> 
        </li>
        
        
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            Signed in as <?php echo $this->session->userdata('username'); ?> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="<?php echo base_url(); ?>admin/logout">
            <i class="fa fa-fw fa-sign-out"></i>Выйти</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">