@extends('user.layouts.app')
@push('styles')
<style>
    /* Main Container */
    .bot-config-container {
        background: linear-gradient(135deg, #f8fafc 0%, #f0f4ff 100%);
        padding: 1.5rem;
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    /* Form Elements */
    .form-label {
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 0.5rem;
        font-size: 0.85rem;
    }
    .form-control, .form-select {
        border-radius: 8px;
        padding: 0.6rem 0.8rem;
        font-size: 0.85rem;
        border: 1px solid #e2e8f0;
    }
    .form-control:focus, .form-select:focus {
        border-color: #6c63ff;
        box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.1);
    }

    /* Avatar Upload */
    .avatar-upload {
        width: 70px;
        height: 70px;
        border-radius: 12px;
        border: 2px dashed #e2e8f0;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        background-color: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .avatar-upload img {
        width: 60%;
        height: 60%;
        object-fit: contain;
    }

    /* Voice Selection */
    .voice-options {
        display: flex;
        gap: 0.5rem;
    }
    .voice-option {
        padding: 0.5rem;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        cursor: pointer;
        font-size: 0.8rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }
    .voice-option.active {
        border-color: #6c63ff;
        background: rgba(108, 99, 255, 0.05);
    }

    /* Color Picker */
    .color-picker {
        width: 70px;
        height: 70px;
        border-radius: 8px;
        cursor: pointer;
        border: 2px solid #fff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* Position Selector */
    .position-selector {
        display: flex;
        gap: 1rem;
        margin-top: 0.5rem;
    }
    .position-option {
        flex: 1;
        text-align: center;
        cursor: pointer;
    }
    .position-visualization {
        position: relative;
        height: 60px;
        background: #f8f9fa;
        border-radius: 6px;
        margin-bottom: 0.5rem;
        border: 1px solid #e2e8f0;
    }
    .browser-mock {
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
        background: white;
        border-radius: 4px;
    }
    .widget-marker {
        position: absolute;
        bottom: 15px;
        width: 20px;
        height: 20px;
        background: #6c63ff;
        border-radius: 50%;
        z-index: 2;
    }
    .position-option.active .widget-marker {
        background: #4d44db;
        box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.2);
    }
    .position-option.active .position-visualization {
        border-color: #6c63ff;
    }

    /* Knowledge Base */
    .knowledge-tabs .nav-link {
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
        color: #64748b;
        border: none;
    }
    .knowledge-tabs .nav-link.active {
        color: #6c63ff;
        border-bottom: 2px solid #6c63ff;
    }
    .faq-item {
        background: #f8fafc;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 0.5rem;
    }
    .add-faq-btn {
        background: #6c63ff;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
        margin-top: 0.5rem;
    }

    /* Submit Button */
    .submit-btn {
        background: linear-gradient(135deg, #6c63ff 0%, #4d44db 100%);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(108, 99, 255, 0.3);
    }

    /* Typing indicator animation */
    @keyframes typing {
        0% { opacity: 0.4; transform: translateY(0); }
        50% { opacity: 1; transform: translateY(-2px); }
        100% { opacity: 0.4; transform: translateY(0); }
    }
    .badge + span span {
        display: inline-block;
        width: 4px;
        height: 4px;
        background-color: white;
        border-radius: 50%;
        margin: 0 1px;
        animation: typing 1.4s infinite ease-in-out;
    }
    .badge + span span:nth-child(2) {
        animation-delay: 0.2s;
    }
    .badge + span span:nth-child(3) {
        animation-delay: 0.4s;
    }
</style>
<style>
    .pulse-animation {
        animation: pulse 2s infinite;
        color: #6c63ff;
    }
    
    @keyframes pulse {
        0% {
            transform: scale(1);
            opacity: 1;
        }
        50% {
            transform: scale(1.2);
            opacity: 0.8;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <form action="{{ route('user.bot.store') }}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="page-title-box d-flex justify-content-between align-items-center mb-3">
                    <h4 class="page-title">Bot Configuration</h4>
                    <a href="{{ route('user.bot.store') }}" class="submit-btn">
                        <i class="fas fa-save me-2"></i> Save
                    </a>
                </div>

                <div class="bot-config-container">
                    <div class="row g-3">
                        <!-- Basic Settings -->
                        <div class="col-md-6">
                            <label class="form-label">Bot Name</label>
                            <input type="text" name="bot_name" class="form-control" placeholder="Support Assistant" value="{{ old('bot_name') ?? $config->bot_name ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Language</label>
                            <select class="form-select" name="language">
                                <option value="english" {{ (old('language') ?? $config->language ?? '') == 'english' ? 'selected' : '' }}>English</option>
                                <option value="arabic" {{ (old('language') ?? $config->language ?? '') == 'arabic' ? 'selected' : '' }}>Arabic</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Core Instructions</label>
                            <textarea class="form-control" name="core_instructions" rows="3" placeholder="How your bot should behave">{{ old('core_instructions') ?? $config->core_instructions ?? '' }}</textarea>
                        </div>

                        <!-- Appearance -->
                        <div class="col-md-3">
                            <label class="form-label">Company Avatar (Widget Logo)</label>
                            <div class="avatar-upload">
                                <img src="{{ asset($config->company_avatar ?? '/assets/images/extra/P9aqUeKFvc.gif') }}" alt="Company Avatar" id="company-avatar-preview">
                                <input type="file" name="company_avatar" id="company-avatar-input" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Bot Avatar (Chat Icon)</label>
                            <div class="avatar-upload">
                                <img src="{{ asset($config->bot_avatar ?? '/assets/images/extra/P9aqUeKFvc.gif') }}" alt="Bot Avatar" id="bot-avatar-preview">
                                <input type="file" name="bot_avatar" id="bot-avatar-input" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Widget Color</label>
                            <div>
                                <input type="color" class="color-picker" name="widget_color" value="{{ old('widget_color') ?? $config->widget_color ?? '#6c63ff' }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label">Voice Preference</label>
                            <div class="voice-options">
                                <label class="voice-option {{ (old('voice_preference') ?? $config->voice_preference ?? 'male') == 'male' ? 'active' : '' }}">
                                    <input type="radio" name="voice_preference" value="male" {{ (old('voice_preference') ?? $config->voice_preference ?? 'male') == 'male' ? 'checked' : '' }} hidden>
                                    <i class="fas fa-male"></i> Male
                                </label>
                                <label class="voice-option {{ (old('voice_preference') ?? $config->voice_preference ?? '') == 'female' ? 'active' : '' }}">
                                    <input type="radio" name="voice_preference" value="female" {{ (old('voice_preference') ?? $config->voice_preference ?? '') == 'female' ? 'checked' : '' }} hidden>
                                    <i class="fas fa-female"></i> Female
                                </label>
                            </div>
                        </div>
                        
                        <!-- Widget Position -->
                        <div class="col-12">
                            <label class="form-label">Widget Position</label>
                            <div class="position-selector">
                                <!-- Left Position -->
                                <label class="position-option {{ (old('widget_position') ?? $config->widget_position ?? 'left') == 'left' ? 'active' : '' }}">
                                    <input type="radio" name="widget_position" value="left" {{ (old('widget_position') ?? $config->widget_position ?? 'left') == 'left' ? 'checked' : '' }} hidden>
                                    <div class="position-visualization">
                                        <div class="widget-marker" style="left: 10%;"></div>
                                        <div class="browser-mock"></div>
                                    </div>
                                    <small>Left</small>
                                </label>
                                
                                <!-- Center Position -->
                                <label class="position-option {{ (old('widget_position') ?? $config->widget_position ?? '') == 'center' ? 'active' : '' }}">
                                    <input type="radio" name="widget_position" value="center" {{ (old('widget_position') ?? $config->widget_position ?? '') == 'center' ? 'checked' : '' }} hidden>
                                    <div class="position-visualization">
                                        <div class="widget-marker" style="left: 50%; transform: translateX(-50%);"></div>
                                        <div class="browser-mock"></div>
                                    </div>
                                    <small>Center</small>
                                </label>
                                
                                <!-- Right Position -->
                                <label class="position-option {{ (old('widget_position') ?? $config->widget_position ?? '') == 'right' ? 'active' : '' }}">
                                    <input type="radio" name="widget_position" value="right" {{ (old('widget_position') ?? $config->widget_position ?? '') == 'right' ? 'checked' : '' }} hidden>
                                    <div class="position-visualization">
                                        <div class="widget-marker" style="right: 10%;"></div>
                                        <div class="browser-mock"></div>
                                    </div>
                                    <small>Right</small>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Knowledge Base -->
                        <div class="col-12">
                            <ul class="nav knowledge-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#documents">Documents</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#faq">FAQ</a>
                                </li>
                            </ul>

                            <div class="tab-content mt-2">
                                <div class="tab-pane active" id="documents">
                                    <input type="file" name="knowledge_documents[]" class="form-control" accept=".pdf" multiple>
                                    @if(isset($config->knowledge_documents) && count($config->knowledge_documents) > 0)
                                        <div class="mt-2">
                                            <small>Uploaded documents:</small>
                                            <ul>
                                                @foreach($config->knowledge_documents as $doc)
                                                    <li>{{ basename($doc) }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane" id="faq">
                                    <div id="faq-container">
                                        @if(isset($config->faqs) && count($config->faqs) > 0)
                                            @foreach($config->faqs as $index => $faq)
                                                <div class="faq-item mb-2">
                                                    <div class="row g-2">
                                                        <div class="col-md-6">
                                                            <input type="text" name="faqs[{{ $index }}][question]" class="form-control form-control-sm" placeholder="Question" value="{{ $faq['question'] }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" name="faqs[{{ $index }}][answer]" class="form-control form-control-sm" placeholder="Answer" value="{{ $faq['answer'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="faq-item mb-2">
                                                <div class="row g-2">
                                                    <div class="col-md-6">
                                                        <input type="text" name="faqs[0][question]" class="form-control form-control-sm" placeholder="Question">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="faqs[0][answer]" class="form-control form-control-sm" placeholder="Answer">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" class="add-faq-btn" id="add-faq">
                                        <i class="fas fa-plus me-1"></i> Add FAQ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="mb-3">Widget Preview</h5>
                    
                    <!-- Chat Widget Mockup -->
                    <div class="rounded shadow-sm" style="width: 100%; max-width: 320px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden;">
                        <!-- Chat Header -->
                        <div class="p-3 d-flex align-items-center" style="background-color: #6c63ff; color: white;">
                            <img src="{{ asset($config->company_avatar ?? '/assets/images/extra/P9aqUeKFvc.gif') }}" 
                                id="widget-avatar-preview"
                                style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%; margin-right: 10px;">
                            <div>
                                <h6 class="mb-0" id="bot-name-preview">{{ $config->bot_name ?? 'Support Bot' }}</h6>
                                <small class="d-flex align-items-center">
                                    <span class="badge bg-white text-success me-2">Online</span>
                                    <span>Typing<span>.</span><span>.</span><span>.</span></span>
                                </small>
                            </div>
                        </div>
                        
                        <!-- Chat Messages -->
                        <div class="p-3" style="height: 250px; overflow-y: auto; background-color: #f8f9fa;">
                            <div class="mb-3 text-end">
                                <div class="d-inline-block p-2 rounded" style="background-color: #e3f2fd; max-width: 80%;">
                                    Hello, I need help
                                    <div class="text-muted text-start small mt-1">Just now</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex">
                                    <img src="{{ asset($config->bot_avatar ?? '/assets/images/extra/P9aqUeKFvc.gif') }}" 
                                         id="chat-avatar-preview"
                                        style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%; margin-right: 8px;">
                                    <div class="p-2 rounded" style="background-color: white; max-width: 80%;">
                                        Hi there! How can I assist you today?
                                        <div class="text-muted small mt-1">Just now</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Message Input -->
                        <div class="p-2 border-top" style="background-color: white; height: 60px;">
                            <div class="input-group h-100">
                                <button class="btn btn-sm btn-link text-muted align-self-center" style="font-size: 1.5rem;">
                                    <i class="fas fa-microphone pulse-animation"></i>
                                </button>
                                <input type="text" class="form-control border-0 align-self-center" placeholder="Type your message..." readonly>
                            </div>
                        </div>
                    </div>
                    
                    <p class="text-muted mt-3">This is how your chat widget will appear</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Image preview for avatar uploads
    document.getElementById('company-avatar-input').addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const src = URL.createObjectURL(e.target.files[0]);
            document.getElementById('company-avatar-preview').src = src;
            document.getElementById('widget-avatar-preview').src = src;
        }
    });

    document.getElementById('bot-avatar-input').addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const src = URL.createObjectURL(e.target.files[0]);
            document.getElementById('bot-avatar-preview').src = src;
            document.getElementById('chat-avatar-preview').src = src;
        }
    });

    // Add new FAQ item
    document.getElementById('add-faq').addEventListener('click', function() {
        const container = document.getElementById('faq-container');
        const index = container.children.length;
        
        const newFaq = document.createElement('div');
        newFaq.className = 'faq-item mb-2';
        newFaq.innerHTML = `
            <div class="row g-2">
                <div class="col-md-6">
                    <input type="text" name="faqs[${index}][question]" class="form-control form-control-sm" placeholder="Question">
                </div>
                <div class="col-md-6">
                    <input type="text" name="faqs[${index}][answer]" class="form-control form-control-sm" placeholder="Answer">
                </div>
            </div>
        `;
        
        container.appendChild(newFaq);
    });

    // Update bot name preview
    document.querySelector('input[name="bot_name"]').addEventListener('input', function() {
        document.getElementById('bot-name-preview').textContent = this.value || 'Support Bot';
    });

    // Update widget color
    document.querySelector('.color-picker').addEventListener('input', function() {
        document.querySelector('.card-body > div > div:first-child').style.backgroundColor = this.value;
    });
</script>
@endpush