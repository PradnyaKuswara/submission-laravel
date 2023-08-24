@extends('layouts.application')

@section('title-page')
    Categories
@endsection

@section('content')
    <div class="max-w-screen-xl mx-auto pt-28 pb-52 p-5">
        <div>
            <h1 class="sans text-xl text-extrabold animate__animated animate__fadeInDown">Manage Category</h1>
        </div>

        <div class="mt-4 relative overflow-x-auto shadow-lg sm:rounded-lg animate__animated animate__fadeIn">
            <div class="my-4">
                <a href="{{ route('categories.create') }}"
                    class="md:float-right text-xs md:text-sm mb-4 py-2 px-3 bg-teal-900 text-white hover:opacity-75  font-medium text-center border border-gray-300 rounded-lg  focus:ring-4 focus:ring-gray-100">
                    <i class="fas fa-plus"></i> Create New Category
                </a>
            </div>

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="border-b text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 border-r">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3 border-r">
                            Category Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 border-r">
                                {{ $item->id }}
                            </td>
                            <td class="px-6 py-4 border-r">
                                {{ $item->category_name }}
                            </td>
                            <td class="px-6 py-4 flex ">
                                <a href="{{ route('categories.edit', Crypt::encrypt($item->id)) }}"
                                    class="font-medium text-green-600 mr-2">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <form onsubmit="return confirm('Are you sure delete this data ?');"
                                    action="{{ route('categories.destroy', Crypt::encrypt($item->id)) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600  hover:underline"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                Data Category is Empty
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="m-2 ">
                {{ $data->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
@endsection
