<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div style="display: flex; justify-content: center; align-items: center; height: 100px; background-color: #f0f0f0; border-bottom: 1px solid #ccc;">
        <h1 style="font-size: 2rem; color: #333; text-align: center;"> My Profile</h1>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <i class="fas fa-user-circle fa-5x text-primary"></i>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" id="name" class="form-control" value="{{ $user->name }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
