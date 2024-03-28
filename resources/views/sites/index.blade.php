@extends('Layouts.master')
@section('content')
  <div class="vr-main-content">
    <div class="vr-head-content">
      <div class="vr-head-content-top">
        <div class="vr-head-content-top-title">SITE CONFIGURATION </div>
        <a href="/dashboard/site_config" class="autoSave superLink" id="autoSave"></a>
      </div>
    </div>
    <div class="vr-body-content">
        <form class="form-card updateSite" action="/dashboard/site_update" method="post" enctype="multipart/form-data">
          @csrf
          @php
            $email      = $item!=null?$item->email:"";
            $phone_number=$item!=null?$item->phone_number:"";
            $telegram   = $item!=null?$item->telegram:"";
            $header_logo= $item!=null?$item->header_logo:"";
            $footer_logo= $item!=null?$item->footer_logo:"";
            $address    = $item!=null?$item->address:"";
          @endphp
          <label class="form-control-label ">Email<span class="text-danger"> *</span></label><br>
          <input type="email" placeholder="Email Address" value="{{ $email }}" name="email">
          <label class="form-control-label ">Phone Number<span class="text-danger"> *</span></label><br>
          <input type="text" placeholder="Phone Number" value="{{ $phone_number }}" name="phone_number">
          <label class="form-control-label ">Telegram<span class="text-danger"> *</span></label><br>
          <input type="text" placeholder="Telegram" value="{{ $telegram }}" name="telegram">
          <div style="display: flex; justify-content:space-between; width:100%;">
            <div style="width:49%;">
              <label class="form-control-label ">Header Logo<span class="text-danger"> *</span></label> <br>
              <input type="file" name="header_logo"><br>
              <input type="hidden" name="header_logo_hidden" value="{{ $header_logo }}">
              <div class="vr-site-img">
                <img src="{{ getPhoto("sites",$header_logo) }}" alt="">
              </div>
            </div>
            <div style="width:49%;">
              <label class="form-control-label ">Footer Logo<span class="text-danger"> *</span></label><br>
              <input type="file" name="footer_logo"><br>
              <input type="hidden" name="footer_logo_hidden" value="{{ $footer_logo }}">
              <div class="vr-site-img">
                <img src="{{ getPhoto("sites",$footer_logo) }}" alt="">
              </div>
            </div>
          </div>
          <br>
          <label class="form-control-label ">Address<span class="text-danger"> *</span></label><br>
          <textarea placeholder="Address" rows="10" cols="30" name="address">{{ $address }}</textarea>

          <button type="submit">Update</button>
      </form>
    </div>
  </div>
@endsection
