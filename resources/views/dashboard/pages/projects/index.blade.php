@extends("dashboard.layouts.dashboard")

@section('page_title', 'المشاريع')

@section('style')
    <style>
        .content .index-project .card .card-body .table tbody tr > td {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content .index-project .card .card-body .table tbody tr > td img {
            max-width: 100%;
        }

        .content .index-project .card .card-body .pagination {
            margin-top: 25px;
            margin-bottom: 0;
            justify-content: center;
        }
    </style>
@stop

@section('dashboard-content')
    <!-- Main content -->
    <section class="content">
        <div class="index-project">
            <div class="container-fluid">
                <!-- Default box -->
                <div class="card main-content-card">
                    <div class="card-header">
                        <h3 class="card-title">مشاريع ابداع تك</h3>

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
                        @include("dashboard.includes.messages")
                        @if(count($projects))
                                <a class="btn btn-primary mb-3" href="{{ route('projects.create') }}" role="button">
                                    <i class="fas fa-plus"></i>
                                    انشاء مشروع جديد
                                </a>
                            <table class="table table-bordered text-center">
                                <thead class="thead-dark">
                                <tr class="d-flex">
                                    <th class="col-1">#</th>
                                    <th class="col-5">العنوان</th>
                                    <th class="col-3">الصوره</th>
                                    <th class="col-3">التفاصيل</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr class="d-flex">
                                        <td class="col-1"><strong>{{$loop->iteration}}</strong></td>
                                        <td class="col-5">
                                            <h5 class="mb-0 text-bold">{{$project->title}}</h5>
                                        </td>
                                        <td class="col-3">
                                            <img src="{{asset('storage/' .$project->image)}}" alt="...">
                                        </td>
                                        <td class="col-3">
                                            <a class="btn btn-primary"
                                               href="{{ route('projects.show', $project->id) }}"
                                               role="button" data-toggle="tooltip"
                                               data-placement="top" title="فتح المشروع">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="btn btn-success mx-3"
                                               href="{{ route('projects.edit', $project->id) }}"
                                               role="button" data-toggle="tooltip"
                                               data-placement="top" title="تعديل المشروع"
                                            >
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger "
                                                    data-toggle="modal" data-target="#exampleModal"
                                                    data-tooltip="tooltip"
                                                    data-placement="top" title="حذف المقاله"
                                            >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                <strong>تحذير هام</strong>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 class="mb-0">
                                                                سوف يتم حذف المشروع نهائيا <br>
                                                                هل انت متأكد إنك تريد حذف المشروع ؟
                                                            </h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">إلغاء</button>
                                                            <form action="{{ route('projects.destroy', $project->id) }}" method="post" class="mb-0">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">حذف</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $projects->links() }}
                        @else
                            <div class="text-center">
                                <h3 class="mb-3">
                                    لا توجد مشاريع حاليا
                                </h3>
                                <a class="btn btn-primary" href="{{ route('projects.create') }}" role="button">
                                    <i class="fas fa-plus"></i>
                                    انشاء مشروع جديد
                                </a>
                            </div>
                        @endif
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
