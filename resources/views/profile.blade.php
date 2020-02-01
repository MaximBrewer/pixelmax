@extends('layouts.app')

@section('content')
<div class="container">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
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
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('Email') }}"
                                   value="{{ old('email', $model->email ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="type">{{ __('Type') }}</label>
                            @php
                                // $dataTypeRows = $dataType->{(isset($model->id) ? 'editRows' : 'addRows' )};

                                // $row     = $dataTypeRows->where('field', 'user_belongsto_type_relationship')->first();
                                // $options = $row->details;
                            @endphp
                        </div>

                        <div class="form-group">
                            <label for="activity">{{ __('Activity') }}</label>
                            @php
                                // $row     = $dataTypeRows->where('field', 'user_belongsto_activity_relationship')->first();
                                // $options = $row->details;
                            @endphp
                        </div>

                        <div class="form-group">
                            <label for="mail">{{ __('Email for sending reports') }}</label>
                            <input type="email" class="form-control" id="mail" name="mail" placeholder="{{ __('Email for sending reports') }}"
                                   value="{{ old('mail', $model->mail ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="telegram">{{ __('Telegram') }}</label>
                            <input type="text" class="form-control" id="telegram" name="telegram" placeholder="{{ __('Telegram') }}"
                                   value="{{ old('telegram', $model->telegram ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="slack_address">{{ __('Slack Address') }}</label>
                            <input type="text" class="form-control" id="slack_address" name="slack_address" placeholder="{{ __('Slack Address') }}"
                                   value="{{ old('slack_address', $model->slack_address ?? '') }}">
                                </div>
                            </div>
                        <div class="col-md-6">

                        <div class="form-group">
                            <label for="slack_name">{{ __('Slack name') }}</label>
                            <input type="text" class="form-control" id="slack_name" name="slack_name" placeholder="{{ __('Slack name') }}"
                                   value="{{ old('slack_name', $model->slack_name ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="slack_token">{{ __('Slack Token') }}</label>
                            <input type="text" class="form-control" id="slack_token" name="slack_token" placeholder="{{ __('Slack Token') }}"
                                   value="{{ old('slack_token', $model->slack_token ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="s3_address">{{ __('S3 Address') }}</label>
                            <input type="text" class="form-control" id="s3_address" name="s3_address" placeholder="{{ __('S3 Address') }}"
                                   value="{{ old('s3_address', $model->s3_address ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="s3_access_key">{{ __('S3 Access Key') }}</label>
                            <input type="text" class="form-control" id="s3_access_key" name="s3_access_key" placeholder="{{ __('S3 Access Key') }}"
                                   value="{{ old('s3_access_key', $model->s3_address ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="s3_access_secret">{{ __('S3 Access Secret') }}</label>
                            <input type="text" class="form-control" id="s3_access_secret" name="s3_access_secret" placeholder="{{ __('S3 Access Secret') }}"
                                   value="{{ old('s3_access_secret', $model->s3_access_secret ?? '') }}">
                        </div>
                            

                        <div class="form-group">
                            <label for="password">{{ __('voyager::generic.password') }}</label>
                            @if(isset($model->password))
                                <br>
                                <small>{{ __('voyager::profile.password_hint') }}</small>
                            @endif
                            <input type="password" class="form-control" id="password" name="password" value="" autocomplete="new-password">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>

                </div>
            </div>
                    </form>
        </div>
    </div>
</div>
@endsection
