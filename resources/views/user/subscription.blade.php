@extends('user.layouts.app')
@push('styles')
  <style>
    .pricing-card {
      border: 1px solid #e0e0e0;
      border-radius: 10px;
      padding: 15px;
      background-color: #fff;
      transition: all 0.3s ease-in-out;
      height: 100%;
    }
    .pricing-card.popular {
      border: 2px solid #6f42c1;
      background-color: #f5f0ff;
    }
    .check-icon {
      color: #6f42c1;
      font-weight: bold;
    }
    .btn-purple {
      background-color: #6f42c1;
      color: white;
    }
    .btn-purple:hover {
      background-color: #5a379f;
    }
    .plan-title {
      font-size: 16px;
      font-weight: 600;
    }
    .plan-price {
      font-size: 17px;
      font-weight: bold;
    }
    .most-popular-badge {
      font-size: 12px;
      background-color: #6f42c1;
      color: white;
      padding: 2px 8px;
      border-radius: 20px;
      margin-bottom: 10px;
      display: inline-block;
    }
    table {
      margin-top: 30px;
    }
  </style>
@endpush

@section('content')
<div class="container-fluid"> 
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Pricing</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Creative AI</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item"><a href="#">Pages</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item active">Pricing</li>
                    </ol>
                </div>                                
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->                   

    <div class="row justify-content-center">
      
        <!-- Feature Table -->
        <div class="table-responsive mt-5">
            <table class="table table-bordered align-middle text-center">
            <thead class="table-light">
                <tr>
                <th>
                     <h2 class="text-center fw-bold mb-2">Pick your plan</h2>
                    <p class="text-center text-muted">Select the plan that best matches your goals and usage needs.</p>
                </th>
                <th>
                    <div class="pricing-card h-100">
                    <div class="plan-title">Free</div>
                    <div class="text-muted">Exploring Creative AI</div>
                    <div class="plan-price my-3">SAR 0/month</div>
                    <button class="btn btn-secondary w-100">Current Plan</button>
                    </div>
               </th>
                <th>
                    <div class="pricing-card h-100">
                        <div class="plan-title">Starter</div>
                        <div class="text-muted">For small teams</div>
                        <div class="plan-price my-3">SAR 299/month</div>
                        <button class="btn btn-dark w-100">Upgrade your plan</button>
                    </div>
                </th>
                <th>
                    <div class="pricing-card popular h-100">
                        <div class="most-popular-badge">Most popular</div>
                        <div class="plan-title">Business</div>
                        <div class="text-muted">Perfect for growing teams</div>
                        <div class="plan-price my-3">SAR 999/month</div>
                        <button class="btn btn-purple w-100">Upgrade your plan</button>
                    </div>
                </th>
                <th>
                    <div class="pricing-card h-100">
                        <div class="plan-title">Premium</div>
                        <div class="text-muted">Perfect for growing teams</div>
                        <div class="plan-price my-3">SAR 2,999/month</div>
                        <button class="btn btn-dark w-100">Upgrade your plan</button>
                    </div>
                </th>
                <th>
                    <div class="pricing-card h-100">
                        <div class="plan-title">Enterprise</div>
                        <div class="text-muted">Tailored for large orgs</div>
                        <div class="plan-price my-3">Custom pricing</div>
                        <button class="btn btn-dark w-100">Request a call</button>
                    </div>
                </th>
                </tr>
            </thead>
            <tbody>
                <tr><td>No. of Text Responses</td><td>100</td><td>2,000</td><td>7,500</td><td>30,000</td><td>Unlimited</td></tr>
                <tr><td>No. of Voice Minutes</td><td>50</td><td>500</td><td>1,500</td><td>5,500</td><td>Unlimited</td></tr>
                <tr><td>No. of AI Agents</td><td>1</td><td>2</td><td>5</td><td>15</td><td>Unlimited</td></tr>
                <tr><td>Voice Conversations Recordings</td><td>–</td><td>–</td><td class="check-icon">✓</td><td class="check-icon">✓</td><td class="check-icon">✓</td></tr>
                <tr><td>Integrations</td><td>Basic</td><td>Basic</td><td>Advanced</td><td>Advanced</td><td>Custom</td></tr>
                <tr><td>White Labeled</td><td>200</td><td>–</td><td>–</td><td class="check-icon">✓</td><td class="check-icon">✓</td></tr>
                <tr><td>Analytics & Reporting</td><td>75</td><td>Basic</td><td>Advanced</td><td>Advanced</td><td>Custom</td></tr>
                <tr><td>API Access</td><td>5</td><td>–</td><td class="check-icon">✓</td><td class="check-icon">✓</td><td class="check-icon">✓</td></tr>
                <tr><td>Onboarding & Training</td><td>–</td><td>–</td><td class="check-icon">✓</td><td class="check-icon">✓</td><td class="check-icon">✓</td></tr>
                <tr><td>Support</td><td>AI</td><td>Email</td><td>Priority</td><td>Priority</td><td>Dedicated</td></tr>
                <tr><td>SLAs</td><td>–</td><td>–</td><td>–</td><td>–</td><td class="check-icon">✓</td></tr>
            </tbody>
            </table>
        </div>
                                                                
    </div>        
</div>
@endsection

@push('scripts')

@endpush