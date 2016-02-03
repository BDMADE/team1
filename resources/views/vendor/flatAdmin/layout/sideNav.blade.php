<div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  
                  <li>
                      <a href="{{action('FileController@index')}}">
                          <i class="fa fa-group"></i>
                          <span>Team1 Shared</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{action('FileController@create')}}">
                          <i class="fa fa-upload"></i>
                          <span>Drop Box</span>
                      </a>
                  </li>
                  
                  

                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-laptop"></i>
                          <span>Message</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{action('MailController@index')}}">Inbox</a></li>
                          <li><a  href="{{action('MailController@mailSendAll')}}">Sent Box</a></li>
                         
                      </ul>
                  </li>
                  
                  <li>
                      <a href="{{url('auth/logout')}}">
                          <i class="fa fa-sign-out"></i>
                          <span>Sign Out</span>
                      </a>
                  </li>

                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      