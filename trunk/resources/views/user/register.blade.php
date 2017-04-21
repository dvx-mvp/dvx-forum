@extends('layouts.app')
@php
    /*
      +------------------------------------------------------------------------+
      | Phosphorum                                                             |
      +------------------------------------------------------------------------+
      | Copyright (c) 2013-2016 Phalcon Team and contributors                  |
      +------------------------------------------------------------------------+
      | This source file is subject to the New BSD License that is bundled     |
      | with this package in the file LICENSE.txt.                             |
      |                                                                        |
      | If you did not receive a copy of the license and are unable to         |
      | obtain it through the world-wide-web, please send an email             |
      | to license@phalconphp.com so we can send you a copy immediately.       |
      +------------------------------------------------------------------------+
    */
    $timezones =  array(
        'Pacific/Wake'                   => '(GMT-12:00) International Date Line West',
        'Pacific/Apia'                   => '(GMT-11:00) Midway Island/Samoa',
        'Pacific/Honolulu'               => '(GMT-10:00) Hawaii',
        'America/Anchorage'              => '(GMT-09:00) Alaska',
        'America/Los_Angeles'            => '(GMT-08:00) Pacific Time (US &amp; Canada); Tijuana',
        'America/Phoenix'                => '(GMT-07:00) Arizona',
        'America/Chihuahua'              => '(GMT-07:00) La Paz/Chihuahua/Mazatlan',
        'America/Denver'                 => '(GMT-07:00) Mountain Time (US &amp; Canada)',
        'America/Managua'                => '(GMT-06:00) Central America',
        'America/Chicago'                => '(GMT-06:00) Central Time (US &amp; Canada)',
        'America/Mexico_City'            => '(GMT-06:00) Ciudad de México',
        'America/Regina'                 => '(GMT-06:00) Saskatchewan',
        'America/Bogota'                 => '(GMT-05:00) Bogotá/Lima/Quito',
        'America/New_York'               => '(GMT-05:00) Eastern Time (US &amp; Canada)',
        'America/Indiana/Indianapolis'   => '(GMT-05:00) Indiana (East)',
        'America/Halifax'                => '(GMT-04:00) Atlantic Time (Canada)',
        'America/Caracas'                => '(GMT-04:00) Caracas/La Paz',
        'America/Santiago'               => '(GMT-04:00) Santiago',
        'America/St_Johns'               => '(GMT-03:30) Newfoundland',
        'America/Sao_Paulo'              => '(GMT-03:00) Brasilia',
        'America/Argentina/Buenos_Aires' => '(GMT-03:00) Buenos Aires/Georgetown',
        'America/Godthab'                => '(GMT-03:00) Greenland',
        'America/Noronha'                => '(GMT-02:00) Mid-Atlantic',
        'Atlantic/Azores'                => '(GMT-01:00) Azores',
        'Atlantic/Cape_Verde'            => '(GMT-01:00) Cape Verde Is.',
        'Africa/Casablanca'              => '(GMT) Casablanca/Monrovia',
        'Europe/London'                  => '(GMT) London/Edinburgh/Greenwich Mean Time : Dublin/Lisbon',
        'Europe/Berlin'                  => '(GMT+01:00) Amsterdam/Berlin/Bern/Rome/Stockholm/Vienna',
        'Europe/Belgrade'                => '(GMT+01:00) Belgrade/Budapest/Bratislava/Prague/Ljubljana',
        'Europe/Paris'                   => '(GMT+01:00) Paris/Madrid/Copenhagen/Brussels',
        'Europe/Sarajevo'                => '(GMT+01:00) Sarajevo/Skopje/Warsaw/Zagreb',
        'Africa/Lagos'                   => '(GMT+01:00) West Central Africa',
        'Europe/Istanbul'                => '(GMT+02:00) Athens/Istanbul/Minsk',
        'Europe/Bucharest'               => '(GMT+02:00) Bucharest',
        'Africa/Cairo'                   => '(GMT+02:00) Cairo',
        'Africa/Johannesburg'            => '(GMT+02:00) Harare/Pretoria',
        'Europe/Helsinki'                => '(GMT+02:00) Helsinki/Kyiv/Riga/Sofia/Tallinn/Vilnius',
        'Asia/Jerusalem'                 => '(GMT+02:00) Jerusalem',
        'Asia/Baghdad'                   => '(GMT+03:00) Baghdad',
        'Asia/Riyadh'                    => '(GMT+03:00) Kuwait/Riyadh',
        'Europe/Moscow'                  => '(GMT+03:00) Moscow/St. Petersburg/Volgograd',
        'Africa/Nairobi'                 => '(GMT+03:00) Nairobi',
        'Asia/Tehran'                    => '(GMT+03:30) Tehran',
        'Asia/Muscat'                    => '(GMT+04:00) Abu Dhabi/Muscat',
        'Asia/Tbilisi'                   => '(GMT+04:00) Tbilisi/Yerevan/Baku',
        'Asia/Kabul'                     => '(GMT+04:30) Kabul',
        'Asia/Yekaterinburg'             => '(GMT+05:00) Ekaterinburg',
        'Asia/Karachi'                   => '(GMT+05:00) Islamabad/Karachi/Tashkent',
        'Asia/Calcutta'                  => '(GMT+05:30) Chennai/Kolkata/Mumbai/New Delhi',
        'Asia/Katmandu'                  => '(GMT+05:45) Kathmandu',
        'Asia/Dhaka'                     => '(GMT+06:00) Astana/Dhaka',
        'Asia/Novosibirsk'               => '(GMT+06:00) Novosibirsk/Almaty',
        'Asia/Colombo'                   => '(GMT+06:00) Sri Jayawardenepura',
        'Asia/Rangoon'                   => '(GMT+06:30) Rangoon',
        'Asia/Bangkok'                   => '(GMT+07:00) Bangkok/Hanoi/Jakarta',
        'Asia/Krasnoyarsk'               => '(GMT+07:00) Krasnoyarsk',
        'Asia/Hong_Kong'                 => '(GMT+08:00) Beijing/Chongqing/Hong Kong/Urumqi',
        'Asia/Irkutsk'                   => '(GMT+08:00) Irkutsk/Ulaan Bataar',
        'Asia/Singapore'                 => '(GMT+08:00) Singapore/Kuala Lumpur',
        'Australia/Perth'                => '(GMT+08:00) Perth',
        'Asia/Taipei'                    => '(GMT+08:00) Taipei',
        'Asia/Tokyo'                     => '(GMT+09:00) Tokyo/Osaka/Sapporo',
        'Asia/Seoul'                     => '(GMT+09:00) Seoul',
        'Asia/Yakutsk'                   => '(GMT+09:00) Yakutsk',
        'Australia/Adelaide'             => '(GMT+09:30) Adelaide',
        'Australia/Darwin'               => '(GMT+09:30) Darwin',
        'Australia/Brisbane'             => '(GMT+10:00) Brisbane',
        'Pacific/Guam'                   => '(GMT+10:00) Guam/Port Moresby',
        'Australia/Hobart'               => '(GMT+10:00) Hobart',
        'Australia/Sydney'               => '(GMT+10:00) Sydney',
        'Asia/Vladivostok'               => '(GMT+10:00) Vladivostok/Melbourne/Canberra',
        'Asia/Magadan'                   => '(GMT+11:00) Magadan/New Caledonia/Solomon Is.',
        'Pacific/Auckland'               => '(GMT+12:00) Auckland/Wellington',
        'Pacific/Fiji'                   => '(GMT+12:00) Fiji/Kamchatka/Marshall Is.',
        'Pacific/Tongatapu'              => '(GMT+13:00) Nuku\'alofa'
    );


@endphp

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading" style="font-size: 22px;">New Account</div>
                <div class="panel-body" style="padding-bottom: 3px;">
                    <form class="form-horizontal" role="form" method="POST" action="register">
                        {{ csrf_field() }}
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Required Information</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group{{ $errors->has('Username') ? ' has-error' : '' }}" style="margin-bottom: 3px;">
                                    <label for="Username" class="col-sm-4 control-label input-sm">Username</label>

                                    <div class="col-sm-6">
                                        <input id="Username" type="text" class="form-control input-sm" name="Username" value="{{ old('Username') }}" required autofocus>

                                        @if ($errors->has('Username'))
                                            <span class="help-block" style="color: #701817;">
                                                <strong>{{ $errors->first('Username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 0px; padding-bottom: 0px; text-align: justify;">
                                    <div class="col-sm-4">&nbsp;</div>
                                    <div class="col-sm-6" style="padding-left: 15px; font-size: 10px;">
                                        <span class="help-block" style="color: #404040;" style="margin-bottom: 0px; padding-bottom: 0px;">
                                            Please enter the nickname or alias by which you would like to log-in and be known on this site. This is permanent and CANNOT be changed later. <span style="color: darkred;">Do not use obscene username, or very similar to other member's username. Your account will be banned later if you do so.</span>
                                        </span>
                                    </div>
                                </div>

                                <hr/>

                                <div class="form-group{{ $errors->has('Password') ? ' has-error' : '' }} ">
                                    <label for="Password" class="col-sm-4 control-label input-sm">Password</label>

                                    <div class="col-sm-6">
                                        <input id="Password" type="password" class="form-control input-sm" name="Password" required>

                                        @if ($errors->has('Password'))
                                            <span class="help-block" style="color: #701817;">
                                                <strong>{{ $errors->first('Password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group" style="margin-bottom: 3px; text-align: justify;">
                                    <label for="Password_confirmation" class="col-sm-4 control-label input-sm">Confirm Password</label>

                                    <div class="col-sm-6">
                                        <input id="Password_confirmation" type="password" class="form-control input-sm" name="Password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-bottom: 0px; padding-bottom: 0px; text-align: justify;">
                                    <div class="col-sm-4">&nbsp;</div>
                                    <div class="col-sm-6" style="padding-left: 15px; font-size: 10px;">
                                        <span class="help-block" style="color: #707070; margin-bottom: 0px; padding-bottom: 0px;">
                                        Please enter a password for your user account. Note that passwords are case-sensitive.
                                        </span>
                                    </div>
                                </div>

                                <hr/><!---------------------------------------HR--------------------------------------->


                                <div class="form-group{{ $errors->has('Email') ? ' has-error' : '' }}">
                                    <label for="Email" class="col-sm-4 control-label input-sm">Email Address</label>

                                    <div class="col-sm-6">
                                        <input id="Email" type="email" class="form-control input-sm" name="Email" value="{{ old('Email') }}" required>

                                        @if ($errors->has('Email'))
                                            <span class="help-block" style="color: #701817;">
                                                <strong>{{ $errors->first('Email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group" style="margin-bottom: 3px;">
                                    <label for="Email_confirmation" class="col-sm-4 control-label input-sm">Confirm Email Address</label>

                                    <div class="col-sm-6">
                                        <input id="Email_confirmation" autocomplete="off" type="email" class="form-control input-sm" name="Email_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-bottom: 0px; padding-bottom: 0px; text-align: justify;">
                                    <div class="col-sm-4">&nbsp;</div>
                                    <div class="col-sm-6" style="padding-left: 15px; font-size: 10px;">
                                        <span class="help-block" style="color: #707070; margin-bottom: 0px; padding-bottom: 0px;">
                                            Please enter your valid email address for confirmation purposes. Don't forget to include .ph only if your email address has .ph at the end. We do not send spam or sell email addresses. Your email address will be kept private. <span style="color: darkred;">Do not use Hotmail, Outlook, or disposable email accounts.</span>
                                        </span>
                                    </div>
                                </div>

                                <hr/><!---------------------------------------HR--------------------------------------->

                                <div class="form-group{{ $errors->has('DisplayName') ? ' has-error' : '' }}" style="margin-bottom: 0px; padding-bottom: 0px; text-align: justify;">
                                    <label for="DisplayName" class="col-sm-4 control-label input-sm">Display Name</label>

                                    <div class="col-sm-6">
                                        <input id="DisplayName" type="text" class="form-control input-sm" name="DisplayName" value="{{ old('DisplayName') }}" required>

                                        @if ($errors->has('DisplayName'))
                                            <span class="help-block" style="color: #701817;">
                                                <strong>{{ $errors->first('DisplayName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group" style="margin-bottom: 0px; padding-bottom: 0px; text-align: justify;">
                                    <div class="col-sm-4">&nbsp;</div>
                                    <div class="col-sm-6" style="padding-left: 15px; font-size: 10px;">
                                        <span class="help-block" style="color: #404040;" style="margin-bottom: 0px; padding-bottom: 0px;">
                                        Please enter a password for your user account. Note that passwords are case-sensitive.
                                        </span>
                                    </div>
                                </div>

                                <hr/><!---------------------------------------HR--------------------------------------->

                                <div class="form-group" style="margin-bottom: 0px; padding-bottom: 0px; text-align: justify;">
                                    <label for="BirthDate" class="col-sm-4 control-label input-sm">Date of Birth</label>

                                    <div class="col-sm-6 input-group date" style="padding-left: 15px; padding-right: 15px; overflow-x: hidden;">
                                        <input name="BirthDate" id="BirthDate" type="text" class="form-control input-sm" readonly required>
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-th"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 0px; padding-bottom: 0px; text-align: justify;">
                                    <div class="col-sm-4">&nbsp;</div>
                                    <div class="col-sm-6" style="padding-left: 15px; font-size: 10px;">
                                        <span class="help-block" style="color: #404040 margin-bottom: 0px; padding-bottom: 0px;">
                                        There are certain forums that is only available for individuals with above a certain age. Please provide this information truthfully.
                                        </span>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!-- end of required info panel-->

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Additional Information</h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="Gender" class="col-sm-4 control-label input-sm">Gender</label>
                                    <div class="col-sm-6 input-group-sm">
                                        <select id="Gender" name="Gender" class="form-control input-sm" required>
                                            <option selected="selected">- Select Gender - </option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Location" class="col-sm-4 control-label input-sm">Location</label>

                                    <div class="col-sm-6">
                                        <input id="Location" type="text" class="form-control input-sm" name="Location" value="{{ old('Location') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Timezone" class="col-sm-4 control-label input-sm">Timezone</label>
                                    <div class="col-sm-6">
                                        <select id="Timezone" name="Timezone" class="form-control input-sm" required>
                                            @foreach($timezones as $tz=>$value)
                                                @if($tz=='Asia/Taipei')
                                                    <option selected='selected' value="{{ $tz }}">{{ $value }}</option>
                                                @else
                                                    <option value="{{ $tz }}">{{ $value }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-primary" style="padding-bottom: 10px;">
                            <div class="panel-heading">
                                <h3 class="panel-title">Forum Rules</h3>
                            </div>
                            <div class="panel-body" style="margin-bottom: 10px; padding-bottom: 10px;">
                                <textarea rows="5" class="col-sm-12" style="resize: none; margin: 0px 0px 10px 0px" readonly>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida euismod pharetra. Suspendisse cursus mi nec ante laoreet tincidunt. Praesent rhoncus tortor turpis, tincidunt dictum est luctus mattis. Duis eu consequat metus. Proin facilisis, odio et lacinia tempus, ante nisi maximus est, non posuere enim mauris quis elit. Nulla ornare eleifend lectus ut molestie. Ut et massa sed magna maximus viverra. Nam rhoncus a ipsum malesuada finibus. Sed fermentum tempor felis, id elementum arcu mattis a. Pellentesque scelerisque aliquet sagittis. Donec felis nulla, eleifend ut laoreet ac, fermentum fermentum nibh. Nam fringilla mi venenatis, pellentesque mi nec, aliquam lacus.
                                    Aenean ut gravida nisi, quis finibus eros. Suspendisse ut neque elementum, vestibulum nulla sed, fermentum nulla. Sed vel odio dapibus, viverra dui imperdiet, rutrum nunc. Ut sit amet commodo urna. Nunc ante mi, elementum et nisl ac, suscipit congue leo. Duis vel quam interdum, bibendum justo nec, congue dolor. Donec et porta turpis. Integer vel laoreet sem, id volutpat risus. Donec lacinia orci eget imperdiet laoreet. Duis a enim vel nisi porta mattis sed nec odio. Morbi rutrum faucibus pellentesque. Curabitur faucibus lectus quis est fermentum sagittis. Praesent in velit vel mi interdum iaculis eu in leo. Morbi ac gravida arcu.
                                    Morbi massa purus, sagittis at faucibus ut, varius eu eros. In vestibulum ut lorem vel ornare. Nulla sed ex arcu. Proin nulla odio, mollis at bibendum elementum, elementum eu ligula. Proin at libero a nunc vehicula mattis. Mauris placerat est ut nunc auctor pretium. Duis in ultricies ante.
                                   In condimentum facilisis tincidunt. Vivamus sed arcu diam. Integer vitae imperdiet justo, eget mollis lorem. Vivamus eleifend, turpis hendrerit sagittis ultrices, turpis enim lacinia arcu, a rhoncus diam lacus sit amet elit. Aliquam erat volutpat. Vestibulum sollicitudin purus ligula, quis accumsan dui consectetur sit amet. Morbi porttitor non sapien ut imperdiet.Maecenas suscipit augue sit amet mauris pharetra luctus. Aliquam ut eros varius, blandit ligula iaculis, volutpat erat. Cras eget venenatis velit. Sed vel risus vitae lacus vestibulum condimentum. Vivamus ultrices eu leo at viverra. Donec pulvinar mollis neque. Phasellus id libero semper, venenatis lorem ac, dictum massa. Donec pulvinar quam quis libero efficitur, et lacinia odio euismod. Donec id luctus enim.
                                </textarea>
                                <div class="checkbox input-sm">
                                    <label style="vertical-align: middle;"><input type="checkbox" style="vertical-align: middle;">&nbsp;&nbsp;I have read, and agree to abide by the Forum rules.</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block btn-sm">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection