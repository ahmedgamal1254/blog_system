@extends('../dashboard/layouts.master')

@section('content')
    <main class="bmd-layout-content">
        <div class="row  m-1 pb-4 mb-3 ">
            <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                <div class="page-header breadcrumb-header ">
                    <div class="row align-items-end ">
                        <div class="col-lg-8">
                            <div class="page-header-title text-left-rtl">
                                <div class="d-inline">
                                    <h3 class="lite-text ">Page</h3>
                                    <span class="lite-text text-gray">Pages information</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="alert alert-primary" role="alert">
                this page is contain about catogeries which it add by admins
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-dark text-center">
                <h4 class="text-center">Catogeries</h4>
            </div>

            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
               
            <form action="{{ route('save_cat') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="enter name catogery" id="">
                </div>      
                <div class="form-group">
                    <textarea class="form-control" id="" placeholder="enter content of catogery" name="description" rows="3"></textarea>              
                </div>
                <button type="submit" class="btn btn-primary">add</button>
            </form>
        </div>
    </main>
@endsection

@section('css')
    <link href="{{ asset('css/trix.css') }}" rel="stylesheet">
@endsection

@section('script')
    <script src="{{ asset('js/trix.js') }}"></script>
@endsection