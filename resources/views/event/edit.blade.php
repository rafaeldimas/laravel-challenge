@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('event.edit_event') }}</div>

                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ session('success') }}</li>
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('event.update', $event) }}" method="post">
                            {{ method_field('put') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="control-label" for="title">{{ trans('event.title') }}</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $event->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="control-label" for="description">{{ trans('event.description') }}</label>
                                <input type="text" class="form-control" name="description" id="description" value="{{ $event->description }}" required>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                                <label class="control-label" for="start">{{ trans('event.start') }}</label>
                                <input type="datetime-local" class="form-control" name="start" id="start" value="{{ $event->start->format('Y-m-d\TH:i') }}" required>

                                @if ($errors->has('start'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                                <label class="control-label" for="end">{{ trans('event.end') }}</label>
                                <input type="datetime-local" class="form-control" name="end" id="end" value="{{ $event->end->format('Y-m-d\TH:i') }}" required>

                                @if ($errors->has('end'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">{{ trans('event.button_save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
