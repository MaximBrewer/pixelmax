@extends('layouts.app')
@section('content')
<div class="container">
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
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Account settings') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $model->name ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $model->email }}" readonly>
                        </div>
                        <div class="form-check">
                            <input onchange="document.getElementById('password').disabled = !this.checked; document.getElementById('password').value = '';document.getElementById('password-confirm').disabled = !this.checked; document.getElementById('password-confirm').value = ''" class="form-check-input" type="checkbox" name="password_change" id="change-password" {{ old('password_change') ? 'checked' : '' }}>
                            <label class="form-check-label" for="change-password">
                                {{ __('Change password') }}
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" {{ !old('password_change') ? 'disabled' : '' }} class="form-control" id="password" name="password" value=""
                                autocomplete="new-password">
                            <small>{{ __('To save the same value, leave the field empty') }}</small>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input type="password" {{ !old('password_change') ? 'disabled' : '' }} class="form-control" id="password-confirm"
                                name="password_confirmation" value="" autocomplete="new-password">
                        </div>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-header">{{ __('Reports Email') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="mail">{{ __('Email for sending reports') }}</label>
                            <input type="email" class="form-control" id="mail" name="mail"
                                value="{{ $model->mail && $model->mail != $model->email ? old('mail', $model->mail ?? '') : '' }}"
                                {{ $model->mail == $model->email || !$model->mail ? 'disabled' : '' }}>
                        </div>
                        <div class="form-check">
                            <input onchange="document.getElementById('mail').disabled = this.checked; document.getElementById('mail').value = ''" class="form-check-input" type="checkbox" name="the_same_email" id="the-same-email"
                                {{ $model->mail == $model->email || !$model->mail ? 'checked' : '' }}>
                            <label class="form-check-label" for="the-same-email">
                                {{ __('The same') }}
                            </label>
                        </div>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-header">{{ __('Reports type') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="type_id">{{ __('Type') }}</label>
                                <select name="type_id" class="form-control" id="type_id">
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}"{{ $model->type_id == $type->id ? ' selected' : '' }}>{{ $type->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="activity_id">{{ __('Activity') }}</label>
                            <select name="activity_id" class="form-control" id="activity_id">
                                @foreach($activities as $activity)
                                <option value="{{ $activity->id }}"{{ $model->activity_id == $activity->id ? ' selected' : '' }}>{{ $activity->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div><br>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Reports Telegram') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="telegram">{{ __('Telegram') }}</label>
                            <input type="text" class="form-control" id="telegram" name="telegram"
                                value="{{ old('telegram', $model->telegram ?? '') }}">
                        </div>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-header">{{ __('Reports S3') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="s3_address">{{ __('S3 Address') }}</label>
                            <input type="text" class="form-control" id="s3_address" name="s3_address"
                                value="{{ old('s3_address', $model->s3_address ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="s3_access_key">{{ __('S3 Access Key') }}</label>
                            <input type="text" class="form-control" id="s3_access_key" name="s3_access_key"
                                value="{{ old('s3_access_key', $model->s3_address ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="s3_access_secret">{{ __('S3 Access Secret') }}</label>
                            <input type="text" class="form-control" id="s3_access_secret" name="s3_access_secret"
                                value="{{ old('s3_access_secret', $model->s3_access_secret ?? '') }}">
                        </div>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-header">{{ __('Reports Slack') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="slack_address">{{ __('Slack Address') }}</label>
                            <input type="text" class="form-control" id="slack_address" name="slack_address"
                                value="{{ old('slack_address', $model->slack_address ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="slack_name">{{ __('Slack name') }}</label>
                            <input type="text" class="form-control" id="slack_name" name="slack_name"
                                value="{{ old('slack_name', $model->slack_name ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="slack_token">{{ __('Slack Token') }}</label>
                            <input type="text" class="form-control" id="slack_token" name="slack_token"
                                value="{{ old('slack_token', $model->slack_token ?? '') }}">
                        </div>
                    </div>
                </div><br>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection