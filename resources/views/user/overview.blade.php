@extends('user.layouts.app')

@push('styles')
<style>
    /* Modern Glassmorphism Design */
    .bot-usage-container {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 15px 50px rgba(108, 99, 255, 0.15);
        padding: 2rem;
        overflow: hidden;
        position: relative;
    }

    /* Floating Particles Background */
    .bot-usage-container::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle at 30% 30%, 
            rgba(108, 99, 255, 0.05) 0%, 
            transparent 50%),
            radial-gradient(circle at 70% 70%, 
            rgba(72, 187, 120, 0.05) 0%, 
            transparent 50%);
        animation: float 20s infinite alternate ease-in-out;
        z-index: -1;
    }

    @keyframes float {
        0% { transform: translate(0, 0); }
        50% { transform: translate(-5%, 5%); }
        100% { transform: translate(5%, -5%); }
    }

    /* Header Section */
    .bot-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid rgba(108, 99, 255, 0.1);
    }

    .bot-info {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .bot-avatar {
        width: 100px;
        height: 100px;
        border-radius: 24px;
        object-fit: cover;
        border: 3px solid white;
        box-shadow: 0 10px 30px rgba(108, 99, 255, 0.2);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .bot-avatar:hover {
        transform: rotate(5deg) scale(1.05);
        box-shadow: 0 15px 40px rgba(108, 99, 255, 0.3);
    }

    .bot-meta h2 {
        margin: 0;
        font-weight: 800;
        color: #1a202c;
        font-size: 2rem;
        letter-spacing: -0.5px;
        background: linear-gradient(90deg, #6c63ff, #4d44db);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        text-shadow: 0 2px 10px rgba(108, 99, 255, 0.1);
    }

    .bot-status {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1.5rem;
        border-radius: 24px;
        font-size: 0.9rem;
        font-weight: 700;
        margin-top: 0.8rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .status-active {
        background: linear-gradient(135deg, rgba(72, 187, 120, 0.2) 0%, rgba(72, 187, 120, 0.1) 100%);
        color: #2b6cb0;
        border: 1px solid rgba(72, 187, 120, 0.3);
    }

    .bot-actions {
        display: flex;
        gap: 1rem;
    }

    .action-btn {
        padding: 0.8rem 1.8rem;
        border-radius: 14px;
        font-weight: 700;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.7rem;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: none;
        cursor: pointer;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        position: relative;
        overflow: hidden;
    }

    .action-btn::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(255,255,255,0.2), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .action-btn:hover::after {
        opacity: 1;
    }

    .btn-clone {
        background: linear-gradient(135deg, rgba(108, 99, 255, 0.2) 0%, rgba(108, 99, 255, 0.1) 100%);
        color: #6c63ff;
        border: 1px solid rgba(108, 99, 255, 0.3);
    }

    .btn-clone:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(108, 99, 255, 0.2);
    }

    .btn-inactive {
        background: linear-gradient(135deg, rgba(245, 158, 11, 0.2) 0%, rgba(245, 158, 11, 0.1) 100%);
        color: #dd6b20;
        border: 1px solid rgba(245, 158, 11, 0.3);
    }

    .btn-inactive:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(245, 158, 11, 0.2);
    }

    .btn-delete {
        background: linear-gradient(135deg, rgba(245, 101, 101, 0.2) 0%, rgba(245, 101, 101, 0.1) 100%);
        color: #c53030;
        border: 1px solid rgba(245, 101, 101, 0.3);
    }

    .btn-delete:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(245, 101, 101, 0.2);
    }

    /* Chart Container - Glass Panel */
    .chart-container {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 
            8px 8px 16px rgba(209, 213, 219, 0.5),
            -8px -8px 16px rgba(255, 255, 255, 0.8);
        margin-bottom: 3.5rem;
        border: 1px solid rgba(255, 255, 255, 0.3);
        position: relative;
        overflow: hidden;
    }

    .chart-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(to right, #6c63ff, #4d44db);
    }

    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .chart-title {
        font-weight: 800;
        color: #1a202c;
        margin: 0;
        font-size: 1.5rem;
        position: relative;
        display: inline-block;
    }

    .chart-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 50px;
        height: 4px;
        background: linear-gradient(to right, #6c63ff, #4d44db);
        border-radius: 2px;
    }

    .chart-period {
        display: flex;
        gap: 0.5rem;
        background: rgba(108, 99, 255, 0.1);
        padding: 0.5rem;
        border-radius: 14px;
        backdrop-filter: blur(5px);
    }

    .period-btn {
        padding: 0.7rem 1.5rem;
        border-radius: 10px;
        font-size: 0.9rem;
        font-weight: 700;
        background: transparent;
        border: none;
        color: #4a5568;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .period-btn.active {
        background: linear-gradient(to right, #6c63ff, #4d44db);
        color: white;
        box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
    }

    .period-btn:hover:not(.active) {
        background: rgba(108, 99, 255, 0.2);
    }

    .chart-wrapper {
        height: 400px;
        position: relative;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 14px;
        overflow: hidden;
    }

    /* Dummy Chart Visualization */
    .dummy-chart {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: flex-end;
        justify-content: space-around;
        padding: 2rem;
    }

    .chart-bar {
        width: 40px;
        background: linear-gradient(to top, #6c63ff, #a78bfa);
        border-radius: 8px 8px 0 0;
        position: relative;
        box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
        transition: height 1s ease;
    }

    .chart-bar::after {
        content: attr(data-value);
        position: absolute;
        top: -30px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 0.8rem;
        font-weight: 600;
        color: #6c63ff;
    }

    .chart-bar:nth-child(2n) {
        background: linear-gradient(to top, #4d44db, #8b5cf6);
    }

    /* Activity Log - Timeline Design */
    .activity-title {
        font-weight: 800;
        color: #1a202c;
        margin-bottom: 2.5rem;
        font-size: 1.5rem;
        position: relative;
        display: inline-block;
    }

    .activity-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 50px;
        height: 4px;
        background: linear-gradient(to right, #6c63ff, #4d44db);
        border-radius: 2px;
    }

    .activity-list {
        position: relative;
    }

    .activity-list::before {
        content: '';
        position: absolute;
        top: 0;
        left: 120px;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, 
            transparent 0%, 
            rgba(108, 99, 255, 0.3) 10%, 
            rgba(108, 99, 255, 0.3) 90%, 
            transparent 100%);
    }

    .activity-item {
        display: flex;
        padding: 1.8rem 0;
        position: relative;
        transition: all 0.3s ease;
    }

    .activity-item:hover {
        transform: translateX(10px);
    }

    .activity-time {
        font-size: 0.9rem;
        color: #4a5568;
        min-width: 120px;
        font-weight: 600;
        padding-right: 1.5rem;
        text-align: right;
    }

    .activity-content {
        flex: 1;
        position: relative;
        padding-left: 2.5rem;
    }

    .activity-content::before {
        content: '';
        position: absolute;
        left: 1.5rem;
        top: 25px;
        width: 12px;
        height: 12px;
        background: linear-gradient(135deg, #6c63ff, #4d44db);
        border-radius: 50%;
        box-shadow: 0 0 0 4px rgba(108, 99, 255, 0.2);
    }

    .activity-message {
        margin: 0;
        font-weight: 700;
        color: #1a202c;
        font-size: 1.1rem;
    }

    .activity-detail {
        font-size: 0.9rem;
        color: #4a5568;
        margin-top: 0.7rem;
        line-height: 1.6;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .bot-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1.5rem;
        }
        
        .bot-actions {
            width: 100%;
            flex-wrap: wrap;
        }
    }

    @media (max-width: 768px) {
        .activity-item {
            flex-direction: column;
        }
        
        .activity-time {
            text-align: left;
            padding-bottom: 0.5rem;
            min-width: auto;
        }
        
        .activity-content {
            padding-left: 1.5rem;
        }
        
        .activity-list::before {
            left: 6px;
        }
        
        .activity-content::before {
            left: 0;
        }
    }
</style>
<style>
    /* Compact Stats Cards with Full Gradient Backgrounds */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .stat-card {
        background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%);
        border-radius: 8px;
        padding: 1rem;
        box-shadow: 0 2px 8px rgba(108, 99, 255, 0.1);
        border: 1px solid rgba(108, 99, 255, 0.1);
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    /* Optional subtle shine effect on hover */
    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(108, 99, 255, 0.15);
    }

    .stat-title {
        font-size: 1rem;
        color: #4a5568;
        font-weight: 600;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .stat-title i {
        font-size: 1.1rem;
        color: #6c63ff;
    }

    .stat-content {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2d3748;
        margin: 0;
        line-height: 1.2;
    }

    .stat-change {
        font-size: 0.8rem;
        font-weight: 600;
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        background: rgba(255, 255, 255, 0.7);
    }

    .change-up {
        color: #38a169;
    }

    .change-down {
        color: #e53e3e;
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }
        
        .stat-card {
            padding: 1rem;
        }
        
        .stat-value {
            font-size: 1.4rem;
        }
    }
</style>

@section('content')
<div class="container-fluid">
    <div class="bot-usage-container">
        <!-- Header Section -->
        <div class="bot-header">
            <div class="bot-info">
                <img src="{{ asset('/') }}assets/images/extra/P9aqUeKFvc.gif" class="bot-avatar" alt="Bot Avatar">
                <div class="bot-meta">
                    <h2>Support Assistant Pro</h2>
                    <span class="bot-status status-active">
                        Active <i class="fas fa-bolt ml-1"></i>
                    </span>
                </div>
            </div>
            <div class="bot-actions">
                <button class="action-btn btn-clone">
                    <i class="fas fa-copy"></i> Clone Bot
                </button>
                <button class="action-btn btn-inactive">
                    <i class="fas fa-power-off"></i> Deactivate
                </button>
                <button class="action-btn btn-delete">
                    <i class="fas fa-trash"></i> Delete Bot
                </button>
            </div>
        </div>

        <!-- Stats Cards - Compact Version -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-title">
                    <i class="fas fa-exchange-alt"></i> Total Interactions
                </div>
                <div class="stat-content">
                    <h3 class="stat-value">15,842</h3>
                    <div class="stat-change change-up">
                        <i class="fas fa-arrow-up"></i> 24%
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-title">
                    <i class="fas fa-microphone"></i> Voice Minutes
                </div>
                <div class="stat-content">
                    <h3 class="stat-value">2,156</h3>
                    <div class="stat-change change-up">
                        <i class="fas fa-arrow-up"></i> 18%
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-title">
                    <i class="fas fa-comment-alt"></i> Messages
                </div>
                <div class="stat-content">
                    <h3 class="stat-value">11,487</h3>
                    <div class="stat-change change-up">
                        <i class="fas fa-arrow-up"></i> 12%
                    </div>
                </div>
            </div>
        </div>

        <!-- Usage Chart -->
        <div class="chart-container">
            <div class="chart-header">
                <h3 class="chart-title">Monthly Usage Analytics</h3>
                <div class="chart-period">
                    <button class="period-btn active">7D</button>
                    <button class="period-btn">1M</button>
                    <button class="period-btn">3M</button>
                    <button class="period-btn">1Y</button>
                </div>
            </div>
            <div class="chart-wrapper">
                <div class="dummy-chart">
                    <div class="chart-bar" style="height: 30%;" data-value="1,245"></div>
                    <div class="chart-bar" style="height: 50%;" data-value="2,156"></div>
                    <div class="chart-bar" style="height: 70%;" data-value="3,487"></div>
                    <div class="chart-bar" style="height: 90%;" data-value="4,892"></div>
                    <div class="chart-bar" style="height: 60%;" data-value="3,156"></div>
                    <div class="chart-bar" style="height: 40%;" data-value="2,045"></div>
                    <div class="chart-bar" style="height: 80%;" data-value="3,842"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Animate the chart bars on load
    document.addEventListener('DOMContentLoaded', function() {
        // Simple animation for demo bars
        const bars = document.querySelectorAll('.chart-bar');
        bars.forEach(bar => {
            const targetHeight = bar.style.height;
            bar.style.height = '0%';
            setTimeout(() => {
                bar.style.height = targetHeight;
            }, 100);
        });

        // Period buttons functionality
        const periodButtons = document.querySelectorAll('.period-btn');
        periodButtons.forEach(button => {
            button.addEventListener('click', function() {
                periodButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                // In a real implementation, this would fetch new data
                console.log('Selected period:', this.textContent);
                
                // Animate the change
                bars.forEach(bar => {
                    bar.style.height = '0%';
                    setTimeout(() => {
                        const newHeight = Math.floor(Math.random() * 80) + 10 + '%';
                        bar.style.height = newHeight;
                        bar.setAttribute('data-value', Math.floor(Math.random() * 5000).toLocaleString());
                    }, 300);
                });
            });
        });

        // Action buttons functionality
        document.querySelector('.btn-clone').addEventListener('click', function() {
            alert('Clone functionality will be implemented when connected to API');
        });

        const toggleStatusBtn = document.querySelector('.btn-inactive');
        const statusElement = document.querySelector('.bot-status');
        
        toggleStatusBtn.addEventListener('click', function() {
            if (statusElement.classList.contains('status-active')) {
                statusElement.classList.remove('status-active');
                statusElement.classList.add('status-inactive');
                statusElement.innerHTML = 'Inactive <i class="fas fa-moon ml-1"></i>';
                this.innerHTML = '<i class="fas fa-power-off"></i> Activate';
                
                // Change button style
                this.classList.remove('btn-inactive');
                this.classList.add('btn-active');
            } else {
                statusElement.classList.remove('status-inactive');
                statusElement.classList.add('status-active');
                statusElement.innerHTML = 'Active <i class="fas fa-bolt ml-1"></i>';
                this.innerHTML = '<i class="fas fa-power-off"></i> Deactivate';
                
                // Change button style
                this.classList.remove('btn-active');
                this.classList.add('btn-inactive');
            }
        });

        document.querySelector('.btn-delete').addEventListener('click', function() {
            if (confirm('Are you sure you want to delete this bot? This action cannot be undone.')) {
                alert('Delete functionality will be implemented when connected to API');
            }
        });
    });
</script>
@endpush