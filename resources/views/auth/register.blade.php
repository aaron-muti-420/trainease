<x-guest-layout>
    <x-authentication-card class="max-w-xl">
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <div class="max-w-4xl mx-auto"> <!-- Widen the form container -->
            <form method="POST" action="{{ route('register') }}" class="space-y-8">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6"> <!-- Wider grid -->

                    <!-- First Name -->
                    <div>
                        <x-label for="first_name" value="First Name" />
                        <x-input id="first_name" class="block w-full" type="text" name="first_name"
                            :value="old('first_name')" required autofocus autocomplete="given-name" />
                    </div>

                    <!-- Last Name -->
                    <div>
                        <x-label for="last_name" value="Last Name" />
                        <x-input id="last_name" class="block w-full" type="text" name="last_name"
                            :value="old('last_name')" required autocomplete="family-name" />
                    </div>

                    <!-- Salary Reference Number -->
                    <div>
                        <x-label for="salary_ref_number" value="Salary Reference Number" />
                        <x-input id="salary_ref_number" class="block w-full" type="number"
                            name="salary_ref_number" :value="old('salary_ref_number')" required />
                    </div>

                    <!-- Gender -->
                    <div>
                        <x-label for="gender" value="Gender" />
                        <select id="gender" name="gender" class="block w-full rounded-lg border px-3 py-2 bg-white" required>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Non-binary" {{ old('gender') == 'Non-binary' ? 'selected' : '' }}>Non-binary</option>
                        </select>
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <x-label for="dob" value="Date of Birth" />
                        <x-input id="dob" class="block w-full" type="date" name="dob"
                            :value="old('dob')" required />
                    </div>

                    <!-- Department -->
                    <div>
                        <x-label for="department_id" value="Department" />
                        <select id="department_id" name="department_id" class="block w-full rounded-lg border px-3 py-2 bg-white" required>
                            <option value="">Select a Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Supervisor -->
                    <div>
                        <x-label for="supervisor_id" value="Supervisor" />
                        <select id="supervisor_id" name="supervisor_id" class="block w-full rounded-lg border px-3 py-2 bg-white">
                            <option value="">Select a Supervisor</option>
                            @foreach ($supervisors as $supervisor)
                                <option value="{{ $supervisor->id }}"
                                    {{ old('supervisor_id') == $supervisor->id ? 'selected' : '' }}>
                                    {{ $supervisor->first_name }} {{ $supervisor->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Email -->
                    <div>
                        <x-label for="email" value="Email" />
                        <x-input id="email" class="block w-full" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-label for="password" value="Password" />
                        <x-input id="password" class="block w-full" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-label for="password_confirmation" value="Confirm Password" />
                        <x-input id="password_confirmation" class="block w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4 flex items-center">
                        <x-checkbox name="terms" id="terms" required />
                        <div class="ms-2 text-sm text-gray-600">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' =>
                                    '<a target="_blank" href="' .
                                    route('terms.show') .
                                    '" class="underline text-indigo-600 hover:text-indigo-800">' .
                                    __('Terms of Service') .
                                    '</a>',
                                'privacy_policy' =>
                                    '<a target="_blank" href="' .
                                    route('policy.show') .
                                    '" class="underline text-indigo-600 hover:text-indigo-800">' .
                                    __('Privacy Policy') .
                                    '</a>',
                            ]) !!}
                        </div>
                    </div>
                @endif

                <div class="flex flex-col items-center space-y-6 mt-6">
                    <a class="text-sm text-gray-600 hover:text-indigo-800" href="{{ route('login') }}">
                        Already registered?
                    </a>

                    <x-button class="w-1/2 md:w-1/3 lg:w-1/4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
