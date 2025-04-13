<x-layout>
<x-slot:heading>Job page</x-slot:heading>
<form method="POST" action='/job'>
@csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Profile</h2>
                <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-lable for="title">title:</x-form-lable>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <x-form-input type="text" name="title" id="title" placeholder="software engineer"/>
                            </div>
                    </x-form-field>
                    <x-form-error name="title"/>
                </div>
                <div class="sm:col-span-4">
                    <x-form-lable for="salary">salary:</x-form-lable>
                    <div class="mt-2">
                        <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <x-form-input type="text" name="salary" id="salary" placeholder="$ 15 000"/>
                        </div>
                    </div>
                    <x-form-error name="salary"/>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <x-form-button>submit</x-form-button>
            </div>
            </form>
            </x-layout>
