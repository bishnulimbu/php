@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach(['todo' => 'Todo', 'doing' => 'Doing', 'done' => 'Done'] as $statusKey => $statusName)
            <div class="space-y-4 p-4 bg-gray-100 rounded-md min-h-[500px] overflow-y-auto" id="{{$statusKey}}-column">
                <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">{{ $statusName }}</h2>
                @forelse ($todos->where('status', $statusKey) as $todo)
                    <div data-id="{{$todo->id}}" class="bg-white p-4 rounded-md border border-gray-300 shadow-sm hover:shadow-md cursor-move">
                        <div>
                            <p class="mb-1 text-sm text-gray-700">
                                <strong class="font-semibold">Title:</strong> {{ Str::limit($todo->title, 40) }}
                            </p>
                            <p class="text-sm text-gray-500">
                                <strong class="font-semibold">Order:</strong> {{ $todo->order }}
                            </p>
                        </div>
                        <div class="flex justify-end gap-2 mt-3">
                            {{-- View Button --}}
                            <a href="{{ route('todos.show', $todo->id) }}"
                               class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md shadow transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </a>

                            {{-- Edit Button --}}
                            <a href="{{ route('todos.edit', $todo->id) }}"
                               class="inline-flex items-center justify-center bg-green-500 hover:bg-green-600 text-white p-2 rounded-md shadow transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M11 5h6m2 2l-9 9H4v-6l9-9z"/>
                                </svg>
                            </a>

                            {{-- Delete Button --}}
                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center justify-center bg-red-500 hover:bg-red-600 text-white p-2 rounded-md shadow transition duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-4 rounded-md border border-gray-300 shadow-sm text-gray-500 text-center">
                        No tasks in this status.
                    </div>
                @endforelse
            </div>
        @endforeach
    </div>
    <script>
        const todoColumn = document.getElementById('todo-column');
        const doingColumn = document.getElementById('doing-column');
        const doneColumn = document.getElementById('done-column');
        
        [todoColumn,doingColumn,doneColumn].forEach(column=>{
            Sortable.create(column,{
                group:'shared',
                animation:150,
                onEnd:function(evt){
                    const todoId=evt.item.dataset.id;
                    const newStatus=evt.to.id.replace('-column','');
                    updateTodoStatus(todoId,newStatus);
                }
            });
        });
        function updateTodoStatus(todoId,newStatus){
            fetch(`/todos/${todoId}/update-status`,{
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'X-CSRF-TOKEN':'{{csrf_token()}}'
                },
                body:JSON.stringify({status:newStatus})
            })
            .then(response=>response.json())
            .then(data=>{
                console.log('Todo status updated',data);
            })
            .catch(err=>{
                console.error('Error updating todo status',err);
            });
        }
    </script>
@endsection