     
        <!-- Start Navigation -->

         <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="{{route('home')}}"><img src="{{asset('')}}/assets/images/{{isset($header->name)? $header->name : 'logo.png' }}" class="logo" alt=""></a>
                </div>
                  @if(isset(Auth::user()->id))
                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('super-admin'))
                    <!-- Start Admin Side Menu -->
                        @include('layouts.partials._side_menu')
                    <!-- End admin Side Menu -->
                @elseif(Auth::user()->hasRole('student'))
                    <!-- Start Student Side Menu -->
                        @include('layouts.partials._student_side_menu')
                    <!-- End admin Side Menu -->
                @elseif('teacher')
                    <!-- Start Student Side Menu -->
                        @include('layouts.partials._staff_side_menu')
                    <!-- End admin Side Menu -->
                @endif
                
            @endif
                <!-- <ul class="list-unstyled CTAs">
                    <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
                    <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>
                </ul> -->
            </nav>



             <nav class="navbar navbar-default navbar-fixed-top left_top_menu">
                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right margin-top-10">
                                <li><a href="{{route('home')}}" class="btn btn-primary btn-wide">Home</a></li>
                                <li><a href="{{route('logo')}}" class="btn btn-success btn-wide">Change Logo</a></li>
                            </ul>
                        </div>
                </nav>
              <div class="main_content_area">
        <!-- End Navigation -->
