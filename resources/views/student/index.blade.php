@extends('layouts.app')

@section('content')
    @php
    $errors = $errors->toArray();
    @endphp
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Enrolment</span> - {{ __('common.students') }}</h4>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="/"><i class="icon-home2 position-left"></i>Enrolment</a></li>
                    <li><a href="/student">{{ __('common.students') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="panel">
                <div class="panel-heading" >
                    <h6 class="panel-title">{{ __('common.add_student') }}</h6>
                    <div class="heading-elements">
                        {{ __('common.add_student_ajax') }} <br/>
                        <button type="button" class="btn pull-right" data-toggle="modal" data-target="#modal-default">
                            <i class="icon-plus3 left"></i> {{ __('common.add_student') }}
                        </button>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="/student" id="form" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                            <label for="phone" class="col-md-3 control-label">{{ __('common.phone') }} <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="{{ __('common.phone') }}">
                                @if(isset($errors['phone']))
                                    @foreach($errors['phone'] as $error)
                                        <font color="red" >{{ $error }}</font>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country" class="col-md-3 control-label">{{ __('common.country') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="country" id="country" placeholder="{{ __('common.country') }}">
                                @if(isset($errors['country']))
                                    @foreach($errors['country'] as $error)
                                        <font color="red" >{{ $error }}</font>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">{{ __('common.email') }}</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('common.email') }}">
                                @if(isset($errors['email']))
                                    @foreach($errors['email'] as $error)
                                        <font color="red" >{{ $error }}</font>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-md-3 control-label">{{ __('common.image') }}</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="form-control-file" id="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="courses" class="col-md-3 control-label">{{ __('common.courses') }}</label>
                            <div class="col-md-9">
                                <select name="courses[]" id="courses" class="form-control" multiple="multiple" >
                                </select>
                                @if(isset($errors['courses']))
                                    @foreach($errors['courses'] as $error)
                                        <font color="red" >{{ $error }}</font>
                                    @endforeach
                                @endif
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
                    <div class="panel-title pull-left">{{ __('common.students') }}</div>
                </div>
                <div class="panel-body">

                    <div class="table-info">
                        <table class="table table-striped table-bordered" id="datatables">
                            <thead>
                            <tr>
                                <th>{{ __('common.name') }}</th>
                                <th>{{ __('common.email') }}</th>
                                <th>{{ __('common.phone') }}</th>
                                <th>{{ __('common.country') }}</th>
                                <th>{{ __('common.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $key=>$student)
                                <tr class="odd">
                                    <td>{{ $student['name'] }}</td>
                                    <td>{{ $student['email'] }}</td>
                                    <td>{{ $student['phone'] }}</td>
                                    <td>{{ $student['country'] }}</td>
                                    <td>
                                        <button type="button" class="view btn-info btn-sm" data-std-id="{{ $student['id'] }}" data-toggle="modal" data-target="#modal-option">
                                            <span class="btn-label-icon left"><i class="glyphicon glyphicon-eye-open"></i></span> {{ __('common.view') }}
                                        </button>
                                        <button type="button" class="edit btn-success btn-sm" data-std-id="{{ $student['id'] }}" data-toggle="modal" data-target="#modal-option">
                                            <span class="btn-label-icon left"><i class="glyphicon glyphicon-edit"></i></span> {{ __('common.edit') }}
                                        </button>
                                        <button type="button" data-type="" data-message="" id="delete_student_button" class="btn-danger btn-sm" data-std-id="{{ $student['id'] }}">
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

    <div class="modal fade" id="modal-default" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title" id="myModalLabel">{{ __('common.add_student') }}</h4>
                </div>
                <div class="modal-body">
                    @include('student.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">{{ __('common.close') }}</button>
                    <button type="button" id="save_student" class="btn ">{{ __('common.save') }}</button>
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

        $(document).on("click", "#save_student", function (e) {
            var data = $("#form-ajax").serializeArray(),
                urlStd = $("#form-ajax").attr('action');
            $.ajax({
                url: urlStd,
                type: 'POST',
                data: data,
                datatype: 'json',
            }).done(function(data) {
                if(data.status == false){
                    validation_messages(data);
                }else{
                    window.location.reload();
                }
            }).fail(function (data) {
            });
            e.preventDefault();
        });

        function validation_messages(data) {
            $('.validation').html('');
            $.each(data.message, function (index, data2) {

                var field_name = index + '_validation',
                    messages = data2;
                var html = '';
                $.each(messages, function (index3, data3) {
                    if(html != '') {
                        html = html + '<br/>';
                    }
                    html += data3;
                });
                $('#'+field_name).html(html);
            });
        }

        $(document).on("click", "#delete_student_button", function (e) {

            var delete_student_button = $(this);
            var id = delete_student_button.attr('data-std-id');
            $.ajax({
                url: "/student/"+id,
                type: 'DELETE',
                datatype: 'json',
            }).done(function(data) {
                if(data.status == false){
                    alert(data.message);
                }else {
                    delete_student_button.closest("tr").remove();
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
                },
                phone: {
                    required: true,
                    number: true,
                },
                country: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                image: {
                    required: true,
                    extension: "png|jpeg|jpg"
                }

            }
        });


        $(document).ready(function () {
            $('#courses').select2({
                ajax : {
                    url: '/course',
                    dataType: 'json',
                    data: function (params) {
                        return{
                            q: params.term,
                            page: params.page
                        }
                    },
                    processResults: function(data, params){
                        params.page = params.page || 1;
                        return{
                            results: data.data,
                            pagination: {
                                more: (params.page * 10) < data.total
                            }
                        };
                    }
                },
                minimumInputLength: 1,
                templateResult: function (repo) {
                    if(repo.loading) return repo.name;
                    var markup = repo.name;
                    return markup;
                },
                templateSelection: function (repo) {
                    return repo.name;
                },
                escapeMarkup: function (markup) {
                    return markup;
                }
            });
        });
    </script>

@endsection