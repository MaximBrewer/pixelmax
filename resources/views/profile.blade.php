@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Profile') }}</div>
        <div class="card-body">
            @if (Session::has('flash message'))
            <div class="alert alert-{{ Session::get('flash message')['type'] }}">
                {{ Session::get('flash message')['message'] }}
                <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Close') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Close') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{ route('profile') }}">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Name') }}"
                                value="{{ old('name', $model->name ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="{{ __('Email') }}" value="{{ old('email', $model->email ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="type_id">{{ __('Type') }}</label>
                            <select name="type_id" class="form-control" id="type_id"
                                value="{{ old('type_id', $model->type_id ?? '') }}">
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="activity_id">{{ __('Activity') }}</label>
                            <select name="activity_id" class="form-control" id="activity_id"
                                value="{{ old('activity_id', $model->activity_id ?? '') }}">
                                @foreach($activities as $activity)
                                <option value="{{ $activity->id }}">{{ $activity->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mail">{{ __('Email for sending reports') }}</label>
                            <input type="email" class="form-control" id="mail" name="mail"
                                placeholder="{{ __('Email for sending reports') }}"
                                value="{{ old('mail', $model->mail ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="telegram">{{ __('Telegram') }}</label>
                            <input type="text" class="form-control" id="telegram" name="telegram"
                                placeholder="{{ __('Telegram') }}"
                                value="{{ old('telegram', $model->telegram ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="slack_address">{{ __('Slack Address') }}</label>
                            <input type="text" class="form-control" id="slack_address" name="slack_address"
                                placeholder="{{ __('Slack Address') }}"
                                value="{{ old('slack_address', $model->slack_address ?? '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="slack_name">{{ __('Slack name') }}</label>
                            <input type="text" class="form-control" id="slack_name" name="slack_name"
                                placeholder="{{ __('Slack name') }}"
                                value="{{ old('slack_name', $model->slack_name ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="slack_token">{{ __('Slack Token') }}</label>
                            <input type="text" class="form-control" id="slack_token" name="slack_token"
                                placeholder="{{ __('Slack Token') }}"
                                value="{{ old('slack_token', $model->slack_token ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="s3_address">{{ __('S3 Address') }}</label>
                            <input type="text" class="form-control" id="s3_address" name="s3_address"
                                placeholder="{{ __('S3 Address') }}"
                                value="{{ old('s3_address', $model->s3_address ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="s3_access_key">{{ __('S3 Access Key') }}</label>
                            <input type="text" class="form-control" id="s3_access_key" name="s3_access_key"
                                placeholder="{{ __('S3 Access Key') }}"
                                value="{{ old('s3_access_key', $model->s3_address ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="s3_access_secret">{{ __('S3 Access Secret') }}</label>
                            <input type="text" class="form-control" id="s3_access_secret" name="s3_access_secret"
                                placeholder="{{ __('S3 Access Secret') }}"
                                value="{{ old('s3_access_secret', $model->s3_access_secret ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('voyager::generic.password') }}</label>
                            <input type="password" class="form-control" id="password" name="password" value=""
                                autocomplete="new-password">
                            @if(isset($model->password))
                            <small>{{ __('voyager::profile.password_hint') }}</small>
                            @endif
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection