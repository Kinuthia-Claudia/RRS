<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 30px; border: 3px solid #4CAF50; border-radius: 12px; background: linear-gradient(45deg, #e8f5e9, #c8e6c9); font-family: Arial, sans-serif; color: #2e7d32; font-size: 24px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); animation: flash 1.5s infinite; text-align: center;">
            <div style="animation: scaleUp 1s ease-in-out;">
                <i class="fas fa-check-circle fa-bounce" style="color: #63E6BE;"></i>
            </div>

            <span style="margin-top: 20px; animation: slideIn 1s ease-in-out;">Thank you! Your reservation has been confirmed.You will be contacted shortly for confirmation by the restaurant and emailed a reminder the day before.</span>
        </div>

        <style>
        @keyframes flash {
            0%, 100% { border-color: #4CAF50; }
            50% { border-color: #81C784; }
        }

        @keyframes scaleUp {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        @keyframes slideIn {
            0% { transform: translateY(20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        </style>


    </div>
    </div>
</x-guest-layout>

