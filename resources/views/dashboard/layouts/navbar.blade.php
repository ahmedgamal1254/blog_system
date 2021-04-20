<header class="bmd-layout-header ">
    <div class="navbar navbar-light bg-faded animate__animated animate__fadeInDown">
        <button class="navbar-toggler animate__animated animate__wobble animate__delay-2s" type="button"
            data-toggle="drawer" data-target="#dw-s1">
            <span class="navbar-toggler-icon"></span>
            <!-- <i class="material-Animation">menu</i> -->
        </button>
        <ul class="nav navbar-nav ">
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn dropdown-toggle m-0 btn_msg" type="button" id="dropdownMenu2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-envelope fa-lg"></i>
                        <span class="badge badge-pill badge-danger animate__animated animate__flash 
                        animate__repeat-3 animate__slower animate__delay-2s response_msg">{{ $count }}</span>    
                    </button>
                    <div aria-labelledby="dropdownMenu2"
                        class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right-lg">
                        @forelse ($message as $item)
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('show_msg',$item->id) }}" class="dropdown-item">
                                <i class="fa fa-user mr-1"></i> you will recieve msg from {{ $item->username }}
                            </a>
                        @empty
                            <div class="dropdown-divider"></div>
                            <span>no message</span>
                        @endforelse
                        <a href="{{ route('show_contact_us') }}" class="dropdown-item dropdown-footer">See All Message</a>
                    </div>
                </div>
            </li>
            {{-- <li class="nav-item">
                <div class="dropdown">
                    <button class="btn dropdown-toggle m-0" type="button" id="dropdownMenu3"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-bell  fa-lg "></i><span
                            class="badge badge-pill badge-warning animate__animated animate__flash animate__repeat-3 animate__slower animate__delay-2s">5</span>
                    </button>
                    <div aria-labelledby="dropdownMenu2"
                        class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right-lg">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-envelope c-main mr-2"></i> 4 new messages
                            <span class="float-right-rtl text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-user c-main mr-2"></i> 8 friend requests
                            <span class="float-right-rtl text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-file c-main mr-2"></i> 3 new reports
                            <span class="float-right-rtl text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </div>
            </li> --}}
            <li class="nav-item"> 
                @foreach ($profile as $pro)
                    @if ($pro->img)
                        <img src="{{ asset('frontend/img/user-profile.jpg') }}" alt="..."
                        class="rounded-circle screen-user-profile">
                    @else
                        <span class="profile" id="span_profile"></span>
                    @endif
                @endforeach
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn  dropdown-toggle m-0" type="button" id="dropdownMenu4"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @foreach ($profile as $pro)
                            {{ $pro->name }}
                        @endforeach
                    </button>
                    <div aria-labelledby="dropdownMenu4"
                        class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right"
                        aria-labelledby="dropdownMenu2">
                        <a href="{{ route('profile') }}" class="dropdown-item"><i
                            class="far fa-user fa-sm c-main mr-2"></i>Profile</a>
                        <a href="{{ route('signout') }}" class="dropdown-item"><i
                            class="fas fa-sign-out-alt c-main fa-sm mr-2"></i>Sign Out</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>

@section('script')
    @foreach ($profile as $item)
        <script>
            let txt='{{ $item->name}}';
            var arr=txt.split(" "),
            name1=arr[0][0]
            name2=arr[1][0]
            name3=name1.concat(name2);
            $('#span_profile').html(name3.toUpperCase());

            $('.nav-item .btn_msg').click(function (){
                $.ajax({
                    type: "get",
                    url: "{{ route('see_msg') }}",
                    success: function (response) {
                        $('.nav-item span.response_msg').html(response);
                    }
                });
            })
        </script>
    @endforeach
@endsection