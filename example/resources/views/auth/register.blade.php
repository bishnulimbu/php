
<x-layout>
<x-slot:heading>Register Page</x-slot:heading>
<form method="POST" action='/register'>
@csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-lable for="first_name">First Name</x-form-lable>
                        <div class="mt-2">
                                <x-form-input type="text" name="first_name" id="first_name" />
                            </div>
                    </x-form-field>
                    <x-form-error name="title"/>
                    <x-form-field>
                        <x-form-lable for="last_name">Last Name</x-form-lable>
                        <div class="mt-2">
                                <x-form-input type="text" name="last_name" id="last_name" />
                            </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-lable for="email">E-mail</x-form-lable>
                        <div class="mt-2">
                                <x-form-input type="email" name="email" id="email" />
                            </div>
                    </x-form-field>
                    <x-form-error name="email"/>
                    <x-form-field>
                        <x-form-lable for="password">Password</x-form-lable>
                        <div class="mt-2">
                                <x-form-input type="password" name="password" id="password" />
                            </div>
                    </x-form-field>
                    <x-form-error name="password_confirmation"/>
                    <x-form-field>
                        <x-form-lable for="password_confirmation">Confirm Password</x-form-lable>
                        <div class="mt-2">
                                <x-form-input type="text" name="title" id="password_confirmation" />
                            </div>
                    </x-form-field>
                    <x-form-error name="password_confirmation"/>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <x-form-button>submit</x-form-button>
            </div>
            </form>
            </x-layout>
