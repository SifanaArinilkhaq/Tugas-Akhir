@extends('dashboard.layouts.app')
@section('title', 'Dashboard')

@section('content')
<h1>Admin</h1>
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="info-box bg-yellow">
      <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Inventory</span>
        <span class="info-box-number">5,200</span>

        <div class="progress">
          <div class="progress-bar" style="width: 50%"></div>
        </div>
        <span class="progress-description">
          50% Increase in 30 Days
        </span>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="info-box bg-green">
      <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Mentions</span>
        <span class="info-box-number">92,050</span>

        <div class="progress">
          <div class="progress-bar" style="width: 20%"></div>
        </div>
        <span class="progress-description">
          20% Increase in 30 Days
        </span>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="info-box bg-red">
      <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Downloads</span>
        <span class="info-box-number">114,381</span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
        <span class="progress-description">
          70% Increase in 30 Days
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="info-box bg-aqua">
      <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Direct Messages</span>
        <span class="info-box-number">163,921</span>

        <div class="progress">
          <div class="progress-bar" style="width: 40%"></div>
        </div>
        <span class="progress-description">
          40% Increase in 30 Days
        </span>
      </div>
    </div>
  </div>
</div>
@endsection

@push('header')

@endpush

@push('footer')

@endpush