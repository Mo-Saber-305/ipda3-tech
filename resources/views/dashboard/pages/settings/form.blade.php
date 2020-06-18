@extends("dashboard.layouts.dashboard")

@section('page_title')
    {{ isset($service) ? 'تعديل الاعدادات' : 'انشاء اعدادات جديده' }}
@stop

@section('style')
    <style>
        .content form .form-control.is-invalid {
            padding-right: 12px;
        }
    </style>
@stop

@section('dashboard-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                <!-- Default box -->
                <div class="card main-content-card">
                    <div class="card-header">
                        <h3 class="card-title">{{ isset($setting) ? 'تعديل الاعدادات' : 'انشاء اعدادات جديده' }}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-9">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <form action="{{ isset($setting) ? route('settings.update', $setting->id) : route('settings.store') }}"
                                              method="post"
                                              enctype="multipart/form-data"
                                        >
                                            @csrf
                                            @isset($setting)
                                                @method('put')
                                            @endisset

                                            <div class="form-group">
                                                <label for="slogan">محتوي slogan</label>
                                                <textarea
                                                    class="form-control @error('slogan') is-invalid @enderror"
                                                    name="slogan" id="slogan" rows="5"
                                                    placeholder="اكتب المحتوي ..."
                                                >{{ isset($setting) ? $setting->slogan : old('slogan') }}</textarea>
                                                @error('slogan')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="intro_image">صورة intro</label>
                                                <input type="file"
                                                       class="form-control-file @error('intro_image') is-invalid @enderror"
                                                       name="intro_image" id="intro_image"
                                                       aria-describedby="fileHelpId">
                                                @error('intro_image')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            @isset($setting)
                                                <div class="form-group text-center">
                                                    <img src="{{ asset('storage/' .$setting->intro_image) }}"
                                                         style="max-width: 100%; max-height: 200px">
                                                </div>
                                            @endisset

                                            <div class="form-group">
                                                <label for="header_logo">صورة header logo</label>
                                                <input type="file"
                                                       class="form-control-file @error('header_logo') is-invalid @enderror"
                                                       name="header_logo" id="header_logo"
                                                       aria-describedby="fileHelpId">
                                                @error('header_logo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            @isset($setting)
                                                <div class="form-group text-center">
                                                    <img src="{{ asset('storage/' .$setting->header_logo) }}"
                                                         style="max-width: 100%; max-height: 200px">
                                                </div>
                                            @endisset

                                            <div class="form-group">
                                                <label for="footer_logo">صورة header logo</label>
                                                <input type="file"
                                                       class="form-control-file @error('footer_logo') is-invalid @enderror"
                                                       name="footer_logo" id="footer_logo"
                                                       aria-describedby="fileHelpId">
                                                @error('footer_logo')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            @isset($setting)
                                                <div class="form-group text-center">
                                                    <img src="{{ asset('storage/' .$setting->footer_logo) }}"
                                                         style="max-width: 100%; max-height: 200px">
                                                </div>
                                            @endisset

                                            <div class="form-group mb-0 text-center">
                                                <button type="submit" class="btn btn-primary @isset($setting) btn-success @endisset">
                                                    {{ isset($setting) ? 'تعديل الاعدادات' : 'انشاء الاعدادات' }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
</div>
    </section>
    <!-- /.content -->
@endsection
