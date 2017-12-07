@extends('layouts.app')

@section('content')
    @php
    $errors = $errors->toArray();
    @endphp
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Enrolment</span> - {{ __('common.courses') }}</h4>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="/"><i class="icon-home2 position-left"></i>Enrolment</a></li>
                    <li><a href="/course">{{ __('common.courses') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="panel">
                <div class="panel-heading" >
                    <h6 class="panel-title">{{ __('common.add_course') }}</h6>
                </div>
                <div class="panel-body">
                    <form action="/course" id="form" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">{{ __('common.name') }} <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('common.name') }}">
                                @if(isset($errors['name']))
                                    @foreach($errors['name'] as $error)
                                        <font color="red" >{{ $error }}</font>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-3 control-label">{{ __('common.description') }} <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                           <div class="col-md-9">
                                <input type="submit" class="btn" value="{{ __('common.save') }}" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading" >
                    <div class="panel-title pull-left">{{ __('common.courses') }}</div>
                </div>
                <div class="panel-body">

                    <div class="table-info">
                        <table class="table table-striped table-bordered" id="datatables">
                            <thead>
                            <tr>
                                <th>{{ __('common.name') }}</th>
                                <th>{{ __('common.description') }}</th>
                                <th>{{ __('common.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $key=>$course)
                                <tr class="odd">
                                    <td>{{ $course['name'] }}</td>
                                    <td>{{ $course['description'] }}</td>
                                    <td>
                                        <button type="button" class="view btn-info btn-sm" data-course-id="{{ $course['id'] }}" data-toggle="modal" data-target="#modal-option">
                                            <span class="btn-label-icon left"><i class="glyphicon glyphicon-eye-open"></i></span> {{ __('common.view') }}
                                        </button>
                                        <button type="button" class="edit btn-success btn-sm" data-course-id="{{ $course['id'] }}" data-toggle="modal" data-target="#modal-option">
                                            <span class="btn-label-icon left"><i class="glyphicon glyphicon-edit"></i></span> {{ __('common.edit') }}
                                        </button>
                                        <button type="button" data-type="" data-message="" id="delete_course_button" class="btn-danger btn-sm" data-course-id="{{ $course['id'] }}">
                                            <span class="btn-label-icon left"><i class="glyphicon glyphicon-trash"></i></span> {{ __('common.delete') }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('scripts')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on("click", "#delete_course_button", function (e) {

            var delete_course_button = $(this);
            var id = delete_course_button.attr('data-course-id');
            $.ajax({
                url: "/course/"+id,
                type: 'DELETE',
                datatype: 'json',
            }).done(function(data) {
                if(data.status == false){
                    alert(data.message);
                }else {
                    delete_course_button.closest("tr").remove();
                    alert(data.message);
                }
            });
            e.preventDefault();
        });


        jQuery.validator.setDefaults({
            debug: false,
            success: "valid"
        });

        $( "#form" ).validate({
            rules: {
                name: {
                    required: true
                }

            }
        });

    </script>

@endsection