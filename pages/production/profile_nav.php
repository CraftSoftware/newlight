<?php
    echo '
         <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                      <span class="hidden-xs">'.$user_name.'</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                        <p>
                          '.$user_name.' - '.$user_position.'
                          <!--<small>Member since Nov. 2012</small>-->
                        </p>
                      </li>
                      <!-- Menu Body -->
                      <!--<li class="user-body">
                        <div class="row">
                          <div class="col-xs-4 text-center">
                            <a href="#">Followers</a>
                          </div>
                          <div class="col-xs-4 text-center">
                            <a href="#">Sales</a>
                          </div>
                          <div class="col-xs-4 text-center">
                            <a href="#">Friends</a>
                          </div>
                        </div>
                        <!-- /.row -->
                      <!--</li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right btn btn-default btn-flat" id="btn_sign_out">
                          Sign out
                        </div>
                      </li>
                    </ul>
                  </li>
    ';
?>