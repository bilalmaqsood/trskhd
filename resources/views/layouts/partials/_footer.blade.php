<div class="clear50"></div>
<div class="container">
    <footer class="footer">
        <!-- <img src="{{asset('')}}/assets/images/{{isset($footer->name) ? $footer->name : 'footer_logo.png' }}" align="footer_logo"> -->
        <p class="text-center copy_right">© 2017, . All Rights Reserved The Right School.</p>
    </footer>
</div>
</div>
<!-- Scripts Start -->
{{--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>--}}

<script language="javascript" type="text/javascript" src="{{asset('/assets/js/handlebars/handlebars.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>

<script language="javascript" type="text/javascript" src="{{asset('/assets/scripts/jquery.flexslider.js')}}"></script>
<script language="javascript" type="text/javascript" src="{{asset('/assets/scripts/bootstrap.min.js')}}"></script>
<script language="javascript" type="text/javascript" src="{{asset('/assets/scripts/bootsnav.js')}}"></script>
<script language="javascript" type="text/javascript" src="{{asset('/assets/js/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.js"></script>

<script language="javascript" type="text/javascript" src="{{asset('/assets/js/sweetalert/sweet-alert.min.js')}}"></script>
<script language="javascript" type="text/javascript" src="{{asset('/assets/scripts/bootstrap-imageupload.min.js')}}"></script>
<script language="javascript" type="text/javascript" src="{{asset('/assets/js/toastr/toastr.min.js')}}"></script>
<script language="javascript" type="text/javascript" src="{{asset('/assets/scripts/custom.js')}}"></script>
<script language="javascript" type="text/javascript" src="{{asset('/assets/scripts/select2.full.min.js')}}"></script>
<script language="javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Scripts End -->

@if (count($errors) > 0)
    @foreach($errors->getMessages() as $key => $message)
        <script>   toastr["error"]('<div><p class="m-0"><b>  {{ ucfirst($key)  }}: </b></p><p class="m-0">{{$message[0]}}</p></div>');</script>
    @endforeach
@endif

@if(Session::has('flash_message'))
    {{ Session::get('flash_message') }}
    <script>   toastr["success"]('<div><p class="m-0"><b> Success! </b></p><p class="m-0">{{ Session::get('flash_message') }}</p></div>');</script>

@endif
@if(Session::has('warning_message'))
    <script>   toastr["warning"]('<div><p class="m-0">{{ Session::get('warning_message') }}</p></div>');</script>

@endif
@if(Session::has('error_message'))
    <script>   toastr["error"]('<div><p class="m-0">{{ Session::get('error_message') }}</p></div>');</script>
@endif
