
<x-layout>
<x-slot:heading>Login Page</x-slot:heading>
<form method="POST" action='/login'>
@csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
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
                                <x-form-input type="password" name="password" id="passowrd" />
                            </div>
                    </x-form-field>
                    <x-form-error name="password"/>
                </div>
                <div class="mt-6 flex items-center  gap-x-6">

                    <x-form-button>submit</x-form-button>
                </div>
            </div>
            </div>
            </form>
            </x-layout>
